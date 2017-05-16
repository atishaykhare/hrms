<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_associate_employee where ass_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_underwriter=$r['firstname'];

//  first name
$qu=mysqli_query($con,"select * from add_associate_employee where emp_underwriter='$emp_underwriter'");


//   second name

?>
<select class="form-control select1"  name="sales_subassociate" id="l23">
<?php 
while($rw=mysqli_fetch_array($qu))
{

$name=$rw['firstname'];

?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
<?php } ?>
	</select>