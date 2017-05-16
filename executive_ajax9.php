<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_associate_employee where ass_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_code=$r['ass_code'];
?>
<input type="text" name="sales_associate_code" style="height:35px;" id="l22" readonly value="<?php echo $emp_code;?>" readonly class="form-control" placeholder="Sales Associate Code"/>