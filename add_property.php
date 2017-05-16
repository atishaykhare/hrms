<?php

session_start();
require_once('config.php');

	$name=$_POST['required_property'];
	$n=ucfirst($name);

	$que=mysqli_query($con,"select * from add_property_type where property_type='$n'");
	$rows=mysqli_num_rows($que);
	if($n=="")
	{
echo " Please Enter Property Type...";	
}
elseif($rows)
	{
echo " Property Type Already Exists...";	
}
else
{
mysqli_query($con,"insert into add_property_type values('','$n')");	
echo "Property Type Successfully Added...";
}


echo $n;

 ?>