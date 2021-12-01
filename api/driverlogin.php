<?php
header("Content-Type: application/json");
require_once 'conn.php';
$email=$_POST['email'];
$password=$_POST['password'];
$query = "select email,password from driver where email = '$email' AND password = '$password'";

$result =mysqli_query($conn,$query);
$rowcount=mysqli_num_rows($result);
if($rowcount>0){
$output = [];
while($item =$result->fetch_assoc()){
    $output[] = $item;
  
}
echo json_encode(['Token'=>'valid']);
}
else{
    echo json_encode(['error'=>'Email or Password invaild']);
}
?>