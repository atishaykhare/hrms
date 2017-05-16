<?php

$eid=$_POST['id'];
//echo $eid . "<br>";
$id=$_POST['eid'];
$check = "0";
//echo $id . "<br>";
include('config.php');
  $que1 = mysqli_query($con,"Select * from lms_table where lead_id = '$id'"); 
										if($res3=mysqli_fetch_array($que1))
										{
											$lead_id=$res3['lead_id'];
											$title=$res3['title'];
											$lead_status=$res3['lead_status'];
											$lead_type= $res3['lead_type'];
											$cust_name= $res3['customer_name'];
											$cust_no= $res3['customer_no'];
											$cust_alter_num= $res3['customer_alter_no'];
											$cust_mail= $res3['customer_email'];
											$cust_add= $res3['customer_add'];
											$city= $res3['customer_city'];
											$required_property_type= $res3['required_property_type'];
											$property_location= $res3['property_required_location'];
											//echo $cust_mail;
											
										}
$que2=mysqli_query($con,"Select `employee_id` from assign where lead_id = '$lead_id'");
										if($res=mysqli_fetch_array($que2))
										{
											$emp_id= $res['employee_id'];
											//echo $emp_id;
										}
if(@$emp_id != "")
	{
		mysqli_query($con,"Update assign set employee_id = '$eid', checked = '$check' Where cust_mail = '$cust_mail'");
		echo "Lead Updated sucessfull";
	
	}
else
{
mysqli_query($con,"INSERT INTO `assign`(`a_id`, `lead_id` , `lead`, `cust_name`, `cust_num`, `cust_alter_num`, `cust_mail`, `cust_add`, `city`, `required_property_type`, `property_location`, `employee_id`,`Title`,`lead_status`,`date`) VALUES ('','$lead_id','$lead_type','$cust_name','$cust_no','$cust_alter_num','$cust_mail','$cust_add','$city','$required_property_type','$property_location','$eid' , '$title' , '$lead_status' ,  NOW())");			
		echo "Lead Assigned Sucessfully";					
}

?>