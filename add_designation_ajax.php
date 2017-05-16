<?php
session_start();
include('config.php');


//  first name
$qu=mysqli_query($con,"select * from designation ");


//   second name

?>
<select name="emp_designation" class="form-control"  id="e12">
<option value="">Select Designation</option>
<?php 
while($rw=mysqli_fetch_array($qu))
{

$name=$rw['designation_name'];

?>
<option><?php echo $name; ?></option>
<?php } ?>
	</select>