<?php
$conn = mysqli_connect('localhost','root','','hero_bus')
or die('Could Not Connect');
$id=$_GET['id'];

$q="SELECT * FROM school where address=$id";
$res=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($res)){
    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>