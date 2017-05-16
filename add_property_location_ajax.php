<?php
session_start();
include('config.php');


//  first name

$qu2=mysqli_query($con,"select * from add_property_location");
//   second name

?>
	<select class="form-control select1"  name="property_required_location" id="l26">
	<option value="">Select Location</option>
	<?php 
	
	while($rw2=mysqli_fetch_array($qu2))
      {
		$name=$rw2['property_location'];
	?>
		<option value="<?php echo $name; ?>"><?php echo $name; ?></option>	
<?php } ?>
	</select>