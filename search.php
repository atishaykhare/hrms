<?php
include('config.php');

$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $con->query("SELECT * FROM add_employee WHERE employee_code LIKE '%".$searchTerm."%' ");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['employee_code'];
	//$data[] = $row['employee_code']."-".$row['employee_first_name'];
}
//return json data
echo json_encode($data);
?>