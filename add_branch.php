<?php

session_start();
require_once('config.php');

	$code=$_POST['branch_code'];
	$name=$_POST['branch_name'];
	$n=ucfirst($name);

	$que=mysqli_query($con,"select * from add_branch where branch_code='$code'");
	$rows=mysqli_num_rows($que);
	if($n=="" || $code=="")
	{
echo " Please Enter Branch Code And Branch Name...";	
}
elseif($rows)
	{
echo " Branch Already Exists...";	
}
else
{
mysqli_query($con,"insert into add_branch values('','$code','$n')");	
echo "Branch Successfully Added...";
}

//echo $name;

 ?>