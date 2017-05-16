<?php   
session_start();
include('config.php');
$id=$_REQUEST['id'];

$lid=$_REQUEST['l_id'];
//echo $lid;
if($id==2)
	{
		mysqli_query($con,"UPDATE `lms_table` SET `lead_status`='$id' WHERE lead_id=$lid");
		header('location:manage-lms.php');
	}
elseif($id==1)
	{
	mysqli_query($con,"UPDATE `lms_table` SET `lead_status`='$id' WHERE lead_id=$lid");
	header('location:manage-lms.php');
	}
?>