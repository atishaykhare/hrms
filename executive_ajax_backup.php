<?php
session_start();
include('config.php');
$emp_id=$_GET['id'];
$que=mysqli_query($con,"select * from add_employee where employee_code='$emp_id'");
$q=mysqli_fetch_array($que);
$underwriter=$q['employee_underwriter'];
$quee=mysqli_query($con,"select * from add_employee where employee_first_name='$underwriter'");
$qq=mysqli_fetch_array($quee);
$awriter=$qq['employee_underwriter'];
$adesignation=$qq['employee_designation'];

$acode=$qq['employee_code'];


$quuee=mysqli_query($con,"select * from add_employee where employee_first_name='$awriter'");
$qqu=mysqli_fetch_array($quuee);
$bwriter=$qqu['employee_underwriter'];
$bcode=$qqu['employee_code'];
$bdesignation=$qqu['employee_designation'];

$quueec=mysqli_query($con,"select * from add_employee where employee_first_name='$bwriter'");
$qquu=mysqli_fetch_array($quueec);
$cwriter=$qquu['employee_underwriter'];
$ccode=$qquu['employee_code'];
$cdesignation=$qquu['employee_designation'];

$quueed=mysqli_query($con,"select * from add_employee where employee_first_name='$cwriter'");
$qqud=mysqli_fetch_array($quueed);
$dwriter=$qqud['employee_underwriter'];
$dcode=$qqud['employee_code'];

$arr=array($adesignation,$bdesignation,$cdesignation);


?>
<div class="col-sm-3" >
                                                <div class="form-group" >
                                                    <label class="control-label"><b>Sales Executive Code :</b> <span style="color:red;">*</span></label>
                                                   <div id="auto" ><input type="text" name="sales_exective_code" readonly id="exec_code" class="form-control" placeholder="Sales Executive Code"/></div> 
                                                </div><!-- form-group -->
                                                </div>
												  <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Manager :</b> <span style="color:red;">*</span></label>
												<div id="auto1"><select class="form-control select1"  name="sales_manger" id="l17">
													
													
													
												</select></div>
												
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Manager Code :</b> <span style="color:red;">*</span></label>
                                                    <div id="auto2"><input type="text" readonly name="sales_manger_code"  id="l18" class="form-control" placeholder="Sales Manager Code"/></div>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
					</div>
					<div class="row">
                                          
													
						</div>
							<div class="row">
                                            
											<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales ZSH :</b> <span style="color:red;">*</span></label>
												<div id="auto3"><select class="form-control select1" style="height:35px;" name="sales_zsh" id="l15">
													
												</select></div>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales ZSH Code :</b> <span style="color:red;">*</span></label>
                                                   <div id='auto4'> <input type="text" name="sales_zsh_code" readonly style="height:35px;" id="l16" class="form-control" placeholder="Sales ZSH Code"/></div>
                                                </div><!-- form-group -->
                                                </div>	
<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales VP :</b> <span style="color:red;">*</span></label>
												<div id="auto5"><select class="form-control select1" style="height:35px;" name="sales_vp" id="l13">
													<option value="">Select VP</option>
													
												</select>
												</div>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales VP Code :</b> <span style="color:red;">*</span></label>
                                                  <div id="auto6">  <input type="text" name="sales_vp_code" style="height:35px;"id="l14" readonly class="form-control" placeholder="Sales VP Code"/></div>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 												
						</div>
							<div class="row">
                                            
									
											 <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Director :</b> <span style="color:red;">*</span></label>
												<div id="auto7"><select class="form-control select1" style="height:35px;" name="sales_director" id="l11">
													<option value="">Select Director</option>
													
												</select>
												</div>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Director Code :</b> <span style="color:red;">*</span></label>
                                                    <div id="auto8"><input type="text" readonly name="sales_director_code" style="height:35px;" id="l12" class="form-control" placeholder="Sales Director Code"/></div>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->   														
						</div>
