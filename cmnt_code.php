<?php
$c_id=$_POST['cmntid'];
$lead_id=$_POST['leadid'];
echo $lead_id;
$emp_id=$_POST['empid'];
echo $emp_id;
echo $c_id;
$reply=$_POST['reply'];
echo $reply;
include('config.php');
mysqli_query($con,"INSERT INTO `reply_table`(`r_id`, `c_id`, `lead_id`, `employee_code`, `reply`)
                                     VALUES ('','$c_id','$lead_id','$emp_id','$reply')"); 
		header('location:comment.php?id='.$lead_id);
?>