<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

//  first name
$qu=mysqli_query($con,"select * from add_category where property_id='$id' ");


//   second name

?>

	<div class="form-group">
    <label class="control-label"><b>Property Category :</b> <span style="color:red;">*</span></label>
	<select class="form-control select1"  name="required_property_type" id="ll25">
	<option value="">Select Category</option>
														
<?php 
while($rw=mysqli_fetch_array($qu))
{

$name=$rw['category_name'];

?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>	
<?php } ?>
</select>
</div>