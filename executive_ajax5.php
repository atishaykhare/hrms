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
$desi=$rw['employee_designation'];
$naam=$rw['employee_first_name'];


//   second name
$quu=mysqli_query($con,"select * from add_employee where employee_first_name='$name'");
$rrw=mysqli_fetch_array($quu);
$under_name=$rrw['employee_underwriter'];
$under_des=$rrw['employee_designation'];
$qquu=mysqli_query($con,"select * from add_employee where employee_first_name='$under_name'");


$rows=mysqli_fetch_array($qquu);


$namee=$rows['employee_first_name'];
$names=$rows['employee_designation'];
$qqsuu=mysqli_query($con,"select * from designation where designation_name='$names'");
$rrws=mysqli_fetch_array($qqsuu);
$o=$rrws['designation_name'];
if($desi=="VP")
{
?>
<input type="text" name="" readonly style="height:35px;" id="l13" value="<?php echo $desi; ?>" class="form-control" placeholder="Sales Manager Code"/>
<?php } else { ?>
<input type="text" name="" readonly style="height:35px;" id="l13" value="<?php echo "sabjay"; ?>" class="form-control" placeholder="Sales Manager Code"/>
<?php } ?>