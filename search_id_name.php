<?php
include('config.php');

$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $con->query("SELECT * FROM add_employee WHERE  employee_first_name LIKE '$searchTerm%' or employee_code LIKE '$searchTerm%'");
while ($row = $query->fetch_assoc()) {
    //$data[] = $row['employee_code'];
$data[] = $row['employee_first_name']." ".$row['employee_last_name']."/".$row['employee_code'];
}
//return json data
echo json_encode($data);
?>