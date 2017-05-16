<?php
// Establishing connection with server..
 include('config.php');

//Fetching Values from URL  
$chk=$_POST['chk1'];
$customer_name = $_POST['name'];
$customer_no = $_POST['contact'];
$customer_alter_no = $_POST['acontact'];
$customer_email = $_POST['mail'];
$customer_add = $_POST['Add'];
$customer_city = $_POST['city'];
$customer_state = $_POST['state'];
$customer_pincode = $_POST['pin'];
$user_id = $_POST['user_id'];
//Insert query 
  mysqli_query($con, "INSERT INTO temp(lead_id,lead_type,customer_name,customer_no,customer_alter_no,customer_email,customer_add,customer_city,customer_state,customer_pincode,lead_by)VALUES('','$chk','$customer_name','$customer_no','$customer_alter_no','$customer_email','$customer_add','$customer_city','$customer_state','$customer_pincode','$user_id')");
	
  echo "Form Submitted succesfully";  
//connection closed

?>