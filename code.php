<?php
session_start();
$user=$_SESSION['username'];
echo $user;
$title=$_POST['title'];
echo $title;
$name=$_POST['person_name'];
echo $name;
$cust_no=$_POST['customer_no'];
echo $cust_no;
$msg=$_POST['Message'];
echo $msg;
$date=$_POST['date'];
echo $date;


include('config.php');

mysqli_query($con,"Insert into reminder (rem_id,user,title,name,phone,msg,date) VALUES ('','$user','$title','$name','$cust_no','$msg','$date')");
$err="<div class='alert alert-success'>Provisional Quotation Successfully Added..</div>";
?>