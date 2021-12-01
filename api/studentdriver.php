<?php
header("Content-Type: application/json");
require_once 'conn.php';
$id = $_POST['id']; 
$query = "SELECT student.*,address.address,school.name as school_name,school.lat as school_lat,school.lon as school_lon from student 
INNER JOIN address on student.address_id=address.id 
INNER JOIN school on student.school_id=school.id  
where student.driver_id=$id ";
$result =mysqli_query($conn,$query);

$output = [];
while($item =$result->fetch_assoc()){
    $output[] = $item;

}
echo json_encode($output);
?>