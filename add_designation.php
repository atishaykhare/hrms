<?php

session_start();
require_once('config.php');

	$name=$_POST['degisnat_name'];
	$n=ucfirst($name);

	$que=mysqli_query($con,"select * from designation where designation_name='$n'");
	$rows=mysqli_num_rows($que);
	if($n=="")
	{
echo " Please Enter Designation Name...";	
}
elseif($rows)
	{
echo " Designation Already Exists...";	
}
else
{
mysqli_query($con,"insert into designation values('','$n')");	
echo "Designation Successfully Created...";
}


echo $n;

 ?>