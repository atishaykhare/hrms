<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_underwriter=$r['employee_underwriter'];

//  first name
$qu=mysqli_query($con,"select * from add_employee where employee_first_name='$emp_underwriter'");
$rw=mysqli_fetch_array($qu);
$name=$rw['employee_underwriter'];
//   second name
$quu=mysqli_query($con,"select * from add_employee where employee_first_name='$name'");

$rrw=mysqli_fetch_array($quu);
$under_name=$rrw['employee_underwriter'];
$under_des=$rrw['employee_designation'];

$quuq=mysqli_query($con,"select * from add_employee where employee_first_name='$under_name'");
$rrqw=mysqli_fetch_array($quuq);

$undeqr_name=$rrqw['employee_underwriter'];
$undeqr_des=$rrqw['employee_designation'];
$ququq=mysqli_query($con,"select * from add_employee where employee_first_name='$undeqr_name'");



?>
<select class="form-control select1" name="sales_director" id="l17">
<?php 
while($rrqqw=mysqli_fetch_array($ququq))
{
$undeqqr_name=$rrqqw['employee_underwriter'];
$undeqqqr_des=$rrqqw['employee_designation'];
$undeqqqr_dees=$rrqqw['employee_first_name'];


$qquuq=mysqli_query($con,"select * from designation where designation_name='$undeqqqr_des'");
$rrqqww=mysqli_fetch_array($qquuq);

$undeqrr_name=$rrqqww['designation_name'];
$undeqer_des=$rrqqww['designation_id'];
if($undeqqqr_des==$undeqrr_name)
{
?>
<option value="<?php echo $emp_name; ?>"><?php echo $undeqrr_name; ?></option>
<?php } } ?>
	</select>