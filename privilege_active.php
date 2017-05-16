<?php
$id=$_REQUEST['quer_id'];
echo $id;
$eid=$_REQUEST['id'];
echo $eid;

include('config.php');
if($eid == 1)
{
	mysqli_query($con,"UPDATE `privilege` SET `edit`= '0' WHERE id = $id");
header('location:privilage.php');
}
else
{
	mysqli_query($con,"UPDATE `privilege` SET `edit`= '1' WHERE id = $id");
header('location:privilage.php');
}
?>