<?php
header("Content-Type: application/json");
require_once 'conn.php';
$email=$_POST['email'];
$password=$_POST['password'];


$query = "select * from driver where email = '$email' AND password = '$password'";
$query2 ="SELECT student.*,driver.full_name as 'driver_name' from student INNER JOIN driver ON student.driver_id = driver.id   where student.email = '$email' AND student.password = '$password' ";
# query --1--
       $resultd =mysqli_query($conn,$query);
       $rowcount=mysqli_num_rows($resultd);

if($rowcount>0){
    $output = [];
    $output['Token']="Driver";
    $item =$resultd->fetch_assoc();
        $output['data'] = $item;
    
        $id = $output['data']['id'];
$q="SELECT student.*,address.address,school.name as 'school_name',school.lon,school.lat  from student INNER JOIN address ON student.address_id = address.id  INNER JOIN school ON student.school_id = school.id ";       
$query = "select * from student where driver_id=$id ";
$result =mysqli_query($conn,$q);

$output2 = [];
while($item2 =$result->fetch_assoc()){
    $output2[] = $item2;


}
    $output['users']=$output2;
    
echo json_encode($output);


}
else {

  # query --2--
  $q="SELECT student.*,address.address,school.name as 'school_name',school.lon,school.lat  from student INNER JOIN address ON student.address_id = address.id  INNER JOIN school ON student.school_id = school.id ";
$results =mysqli_query($conn,$q);
$rowcountt=mysqli_num_rows($results);
if($rowcountt>0){

    $outputt = [];
    $outputt['Token']="Student";
    $items =$results->fetch_assoc();
        $outputt['data'] = $items;

    echo json_encode($outputt);
}  

else{

    echo json_encode(['error'=>'Email or Password invaild']);
}
}

?>