<?php
session_start();
include('config.php');


//  first name
$qu=mysqli_query($con,"select * from add_property_type ");


//   second name

?>
<select class="form-control select1"  name="required_property_type" id="l25">
														<option value="">Select Required Property</option>
														<?php 
														$qu1=mysqli_query($con,"select * from add_property_type");
														while($rw1=mysqli_fetch_array($qu1))
															{
																$name=$rw1['property_type'];
																$id=$rw1['property_id'];
														?>
														<option value="<?php echo $name; ?>"><?php echo $name; ?></option>	
														<?php } ?>
													</select>