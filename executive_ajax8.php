<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_underwriter=$r['employee_underwriter'];
//     first name
$qu=mysqli_query($con,"select * from add_employee where employee_first_name='$emp_underwriter'");
$rw=mysqli_fetch_array($qu);
$name=$rw['employee_underwriter'];
//     second name
$quu=mysqli_query($con,"select * from add_employee where employee_first_name='$name'");
$rrw=mysqli_fetch_array($quu);
$under_name=$rrw['employee_underwriter'];
//   third name
$quee=mysqli_query($con,"select * from add_employee where employee_first_name='$under_name'");
$rrww=mysqli_fetch_array($quee);
$under=$rrww['employee_underwriter'];
//   third name
$quuee=mysqli_query($con,"select * from add_employee where employee_first_name='$under'");
$rrwwo=mysqli_fetch_array($quuee);
$dir_code=$rrwwo['employee_code'];
?>
<input type="text" name="sales_director_code" style="height:35px;" id="l18" readonly value="<?php echo $dir_code;?>" readonly class="form-control" placeholder="Sales Director Code"/>