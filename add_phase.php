<?php
$emp_department = $_POST['emp_department'];
$pay_date = $_POST['pay_date'];
require_once('config.php');
mysqli_query($con,"INSERT INTO `salary_phase`(`id`, `department`, `phase`) VALUES (NUll,'$emp_department','$pay_date')");
echo "add Sucessfully"; 
?>