<?php   
session_start();
include('config.php');
$id=$_REQUEST['id'];

$empid=$_REQUEST['emp_id'];
//echo $empid;
if($id==2)
{
mysqli_query($con,"UPDATE `add_employee` SET `employee_status`='$id' WHERE employee_code=$empid");
header('location:manage_employee.php');
}
elseif($id==1)
{
	mysqli_query($con,"UPDATE `add_employee` SET `employee_status`='$id' WHERE employee_code=$empid");
header('location:manage_employee.php');
}

?>