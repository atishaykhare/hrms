<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_designation=$r['employee_designation'];



//   second name

?>

	<input type="text" name="emp_designation" style="height:35px;" id="l18" readonly value="<?php echo $emp_designation;?>" readonly class="form-control" placeholder="Employee Designation"/>