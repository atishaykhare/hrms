<?php

session_start();
require_once('config.php');

	$name=$_POST['property_location'];
	$n=ucfirst($name);

	$que=mysqli_query($con,"select * from add_property_location where property_location='$n'");
	$rows=mysqli_num_rows($que);
	if($n=="")
	{
echo " Please Enter Property Required Location.";	
}
elseif($rows)
	{
echo " Property Required Location Already Exists...";	
}
else
{
mysqli_query($con,"INSERT INTO add_property_location values('','$n')");	
echo "Property Required Location Successfully Created...";
}


echo $n;

 ?>