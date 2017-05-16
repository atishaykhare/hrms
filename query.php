<?php

session_start();
require_once('config.php');

	$name=$_POST['depart_name'];
	$n=ucfirst($name);
$que=mysqli_query($con,"select * from department where department_name='$n'");
	$rows=mysqli_num_rows($que);
	if($n=="")
	{
		echo "Please Fill The Fields..";
	}
	elseif($rows)
	{
		echo "Department Already Exists..";
	}
	else
	{
mysqli_query($con,"insert into department values('','$n')");	
echo "Department Successfully Added...";
	}

echo $n;

 ?>