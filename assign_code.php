<?php
session_start();

$id=$_REQUEST['id'];
//echo $id;
$lead=$_POST['lead'];
//echo $lead;
//echo "<br/>";
$cname=$_POST['cust_name'];
//echo $cname;
//echo "<br/>";
$cnum=$_POST['cust_no'];
//echo $cnum;
//echo "<br/>";

$canum=$_POST['cust_alter_no'];
//echo $canum;
//echo "<br/>";
$cmail=$_POST['cust_email'];
//echo $cmail;
//echo "<br/>";
$cadd=$_POST['cust_add'];
//echo $cadd;
//echo "<br/>";
$city=$_POST['cust_city'];
//echo $city;
//echo "<br/>";
$req_prop_type=$_POST['req_prop_type'];
//echo $req_prop_type;
//echo "<br/>";
$prop_loc=$_POST['prop_req_loc'];
//echo $prop_loc;
//echo "<br/>";
$emp=$_POST['employee'];
echo $emp;

include('config.php');

	$que1=mysqli_query($con,"Select `employee_id` from assign where cust_name = '$cname'");
										if($res3=mysqli_fetch_array($que1))
										{
											$emp_id= $res3['employee_id'];
											echo $emp_id;
										}
if(@$emp_id!="")
	{
		mysqli_query($con,"Update assign set employee_id = '$emp' Where cust_name = '$cname'");
		echo "done";
	}
else
{
mysqli_query($con,"INSERT INTO `assign`(`a_id`, `lead`, `cust_name`, `cust_num`, `cust_alter_num`, `cust_mail`, `cust_add`, `city`, `required_property_type`, `property_location`, `employee_id`) VALUES ('','$lead','$cname','$cnum','$canum','$cmail','$cadd','$city','$req_prop_type','$prop_loc','$emp')");			
								
}
header("Location:manage-lms.php?msg='Lead Assigned '");
?> 
