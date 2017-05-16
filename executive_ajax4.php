<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];

$chain=$emp_id;
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$q=mysqli_fetch_array($que);
$n=mysqli_num_rows($que);
$underwriter=$q['employee_underwriter'];
$emp_id=$q['employee_code'];
$rsult=get_chain($underwriter,$chain,$con);
//echo $rsult;
$arr=explode('+',$rsult);

//echo $arr[1]."kumarbrother";

$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$q=mysqli_fetch_array($que);
$underwriter=$q['employee_underwriter'];

function get_chain($underwriter,$chain,$con)
{
	
	
	$que=mysqli_query($con,"select * from add_employee where employee_code='$underwriter'");
$q=mysqli_fetch_array($que);
$n=mysqli_num_rows($que);
$underwriter=$q['employee_underwriter'];
$emp_id=$q['employee_code'];
if($n==1)
{
	$chain=$chain.'+'.$emp_id;
	return get_chain($underwriter,$chain,$con);
}
return $chain;
}


?>


												
									
									<div class="row paddbottom">
											 <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Director :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" onChange="seldirector(this.value)" name="sales_director" id="l11">
													
													<?php
														foreach($arr as $v)
														{
															$quee=mysqli_query($con,"select * from add_employee where employee_code='$v'");
														$qq=mysqli_fetch_array($quee);
														$awriter=$qq['employee_underwriter'];
															$name=$qq['employee_first_name'];
$employeeid=$qq['employee_code'];
														$adesignation=$qq['employee_designation'];
														
														if($adesignation=="Director")
														{
														echo "<option>".$name."</option>";
														$sdl=mysqli_query($con,"select * from add_employee where employee_code!='$employeeid' AND `employee_designation`='$adesignation'");
														while($row455=mysqli_fetch_assoc($sdl)){
															?>
															<option value="<?php echo $row455['employee_code']; ?>"><?php echo $row455['employee_first_name']; ?></option>
															<?php
														}
														
														}
													
														}
														
														
														

													?>
												</select>
												
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Director Code :</b> <span style="color:red;">*</span></label>
													<select class="form-control select1"  readonly name="sales_director_code"  id="l12">
													<?php
														foreach($arr as $v)
														{
															$quee=mysqli_query($con,"select * from add_employee where employee_code='$v'");
														$qq=mysqli_fetch_array($quee);
														$awriter=$qq['employee_underwriter'];
															$name=$qq['employee_first_name'];
															$employeeid=$qq['employee_code'];

$code=$qq['employee_code'];
														$adesignation=$qq['employee_designation'];
														
														if($adesignation=="Director")
														{
														echo "<option>".$code."</option>";
														$sdl=mysqli_query($con,"select * from add_employee where employee_code!='$employeeid' AND `employee_designation`='$adesignation'");
														while($row455=mysqli_fetch_assoc($sdl)){
															?>
															<option value="<?php echo $row455['employee_code']; ?>"><?php echo $row455['employee_first_name']; ?></option>
															<?php
														}
														
														}
													
														}
														
														
														

													?>
													
												</select>
                                                 
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->   														
						

									
											
									</div>  