<?php
$emp_desi = $_POST['emp_desi'];
//echo $emp_desi;
include('config.php');
$query = mysqli_query($con,"Select employee_designation from add_employee where employee_code = '$emp_desi'");
$result = mysqli_fetch_array($query);

echo $result[0];
?>