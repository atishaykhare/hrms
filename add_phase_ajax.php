<?php
include('config.php');
$query=mysqli_query($con,"Select * from salary_phase");
?>
<select class="form-control select1"  name="salary_paid_phase" class="form-control"  id="e12">
													<option value="">Select Phase</option>
													<?php
													
													while($roow1=mysqli_fetch_array($query))
													{
														
													echo "<option>".$roow1['id'] .' ['.$roow1['department'].']'."</option>";
													}
													
													?>
													
												</select>