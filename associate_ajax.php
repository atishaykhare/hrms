<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_code=$r['employee_code'];

//   second name

?>

	<input type="text" name="emp_code" style="height:35px;" id="l18" readonly value="<?php echo $emp_code;?>" readonly class="form-control" placeholder="Employee Code"/>