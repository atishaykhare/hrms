<?php
session_start();
include('config.php');
$que=mysqli_query($con,"select * from add_branch");

?>
 <select class="form-control select1" name="emp_branch_name" style="height:35px;text-transform:capitalize;"  class="form-control" id="e14" placeholder="Employee Branch">
	<option value="">Select Branch Name</option>
 <?php 
while($rw=mysqli_fetch_array($que))
{

$name=$rw['branch_name'];

?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
<?php } ?>
	</select>