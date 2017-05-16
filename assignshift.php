<?php
$emp_id=$_POST['employee'];
echo $emp_id;
$time=$_POST['time'];
echo $time;
$url=$_POST['url'];

include('config.php');
 
mysqli_query($con,"update add_employee SET shift_id = '$time'  WHERE employee_code = '$emp_id' ");
Header('Location:'.$url);


?>