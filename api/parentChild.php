<?php

header("Content-Type: application/json");
require_once 'conn.php';
$id = $_POST['id']; 
$query = "SELECT student.*,school.name as school_name,school.lat as school_lat,school.lon as school_lon, driver.full_name as driver_name, driver.phone as driver_phone from student 
INNER JOIN driver on student.driver_id=driver.id 
INNER JOIN school on student.school_id=school.id  
where student.parent_id=$id ";
$result =mysqli_query($conn,$query);

$output = [];
while($item =$result->fetch_assoc()){
    $output[] = $item;

}
echo json_encode($output);


?>