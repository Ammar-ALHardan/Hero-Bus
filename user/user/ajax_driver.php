<?php
$conn = mysqli_connect('localhost','root','','hero_bus')
or die('Could Not Connect');
$id=$_GET['id'];

$q="SELECT * FROM driver where address_id=$id";
$res=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($res)){
    $q="SELECT COUNT(*) from student where `status`=1 AND driver_id=".$row['id'];
    $e=	mysqli_query($conn,$q);
    $r=mysqli_fetch_array($e);
    if($r[0]<$row['passengers_no']){
    echo '<option value="'.$row['id'].'">'.$row['full_name'].'</option>';
    }
}

?>