<?php
session_start();
if($_SESSION['username']=="")
{	
	header('location:index.php');
}
include('config.php');
global $con;
extract($_POST);

 $id=$_REQUEST['id'];

  
if(isset($id))
{
	 $que=mysqli_query($con,"select * from recuriment where r_id=$id");
$res=mysqli_fetch_array($que);

$oldr_id = $res['r_id'];
$emp_code = $res['emp_code'];
$fname = $res['fname'];
$mname = $res['mname'];
$lname = $res['lname'];
$emp_contact = $res['emp_contact'];
$emp_email = $res['emp_email'];
$emp_address = $res['emp_address'];
$emp_city = $res['emp_city'];
$emp_state = $res['emp_state'];
$emp_pincode = $res['emp_pincode'];
$emp_department = $res['emp_department'];
$emp_designation = $res['emp_designation'];
$emp_branch = $res['emp_branch'];
$company_code = $res['company_code'];
$emp_pic = $res['emp_pic'];
$id_proof = $res['id_proof'];
$add_proof = $res['add_proof'];
$interviewer_name = $res['interviewer_name'];
 
 
 
$que=mysqli_query($con,"INSERT INTO `hide_recuriment`(`r_id`, `oldr_id`, `emp_code`, `fname`, `mname`, `lname`, `emp_contact`, `emp_email`, `emp_address`, `emp_city`, `emp_state`, `emp_pincode`, `emp_department`, `emp_designation`, `emp_branch`, `company_code`, `emp_pic`, `id_proof`, `add_proof`, `interviewer_name`) 
                                                 VALUES ('','$oldr_id','$emp_code','$fname','$mname','$lname','$emp_contact','$emp_email','$emp_address','$emp_city','$emp_state','$emp_pincode','$emp_department','$emp_designation','$emp_branch','$company_code','$emp_pic','$id_proof','$add_proof','$interviewer_name')");
 
	
	
	
mysqli_query($con,"DELETE from recuriment where r_id= $id");
//unlink("profile/".$emp_pic);
//unlink("documents/".$id_proof);
//unlink("documents/".$add_proof);

header('location:manage_recruitment.php');
}
        
?>