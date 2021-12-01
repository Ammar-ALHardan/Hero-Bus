<?php
header("Content-Type: application/json");
include 'conn.php';
$email=$_POST['email'];
$password=$_POST['password'];

# query --1--
$query = "select * from driver where email = '$email' AND password = '$password'";
$resultd =mysqli_query($conn,$query);
$rowcount=mysqli_num_rows($resultd);
# query --2--
$queryparent="select * from parents where email = '$email' AND password = '$password'";
$resultp =mysqli_query($conn,$queryparent);
$rowcountp=mysqli_num_rows($resultp);

if($rowcount>0){
    $output = [];
    $output['Token']="Driver";
    $item =$resultd->fetch_assoc();
    $output['data'] = $item;
    $id = $output['data']['id'];
    echo json_encode($output);
}
 
elseif($rowcountp>0){
    $outputt = [];
    $outputt['Token']="Parents";
    $items =$resultp->fetch_assoc();
    $outputt['data'] = $items;
    echo json_encode($outputt);
}  
else{

    echo json_encode(['error'=>'Email or Password invaild']);
}


?>