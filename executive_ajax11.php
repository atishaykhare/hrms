<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_associate_employee where ass_code='$emp_id'");
$r=mysqli_fetch_array($que);
$emp_underwriter=$r['firstname'];

//  first name
$qu=mysqli_query($con,"select * from add_associate_employee where emp_underwriter='$emp_underwriter'");
$rw=mysqli_fetch_array($qu);
$name=$rw['firstname'];
$code=$rw['ass_code'];


//   second name

?>

	<input type="text" name="sales_subassociate_code" style="height:35px;" id="l18" readonly value="<?php echo $code;?>" readonly class="form-control" placeholder="Sales Director Code"/>