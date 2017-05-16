<?php
session_start();
require_once('config.php');

	$name=$_REQUEST['n'];
	//mysqli_query($con,"insert into department values('','$name')");	
//echo "<script>alert('Department Successfully Added...')</script>";

echo $name;

?>