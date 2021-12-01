<?php
header("Content-Type: application/json");
require_once 'conn.php';
$parent_id = $_POST['id'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$home_address = $_POST['home_address'];

$q="UPDATE student SET lat='$lat',lon='$lon',home_address='$home_address' where parent_id='$parent_id'";
$res=mysqli_query($conn,$q);
$check=mysqli_affected_rows($conn);
if($check>0){
    echo json_encode("Success");
}
else{
    echo json_encode("Failed");
}
?>