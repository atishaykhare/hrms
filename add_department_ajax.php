<?php
session_start();
include('config.php');


//  first name
$qu=mysqli_query($con,"select * from department ");


//   second name

?>
<select class="form-control select1"  name="emp_department" id="e11">
<option value="">Select Department</option>
<?php 
while($rw=mysqli_fetch_array($qu))
{

$name=$rw['department_name'];

?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
<?php } ?>
	</select>