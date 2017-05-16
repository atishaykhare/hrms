<?php 
session_start();
if(!empty($_SESSION['username']))
{
include('config.php');
extract($_POST);
if(isset($submit))
{
	//validation start
	if (!ctype_alpha(str_replace(array("'", " "), "",$project_name))) { 
			$errors = 'Project name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", "-"), "",$sub_project_name))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$saleable_area))) { 
			$errors = 'City should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$remarks))) { 
			$errors = 'Address should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$customer_name))) { 
			$errors = 'State should be alpha characters only.';
}	


if (!ctype_alpha(str_replace(array("'", " "), "",$customer_city))) { 
			$errors = 'State should be alpha characters only.';
}	

if (!ctype_alpha(str_replace(array("'", " "), "",$customer_state))) { 
			$errors = 'State should be alpha characters only.';
}	

# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) { 
			$errors = 'Enter a valid email address.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($customer_contact_no) OR strlen($customer_contact_no) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($alernate_contact_no) OR strlen($alernate_contact_no) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Pin Code #
		// if phone is invalid, throw error
		if (!ctype_digit($cust_pin) OR strlen($cust_pin) != 6) {
			$errors = 'Enter a valid pin Code.';
		}
if ((!ctype_digit($unit_type) )) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($bsp_psf))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($bsp_rupees) )) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($deal_ratio) )) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($agent_discount_amount))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($counter_discount))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($nsp_rupees) )) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($nsp_psf))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($charge_type))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($calculate_on))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($charge_calculate_on))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($company_rate))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($waiver_any_type))) { 
$errors = 'Unit should be correct.';
}	

if ((!ctype_digit($net_chargeable))) { 
$errors = 'Unit should be correct.';
}	
if ((!ctype_digit($customer_discount))) { 
$errors = 'Unit should be correct.';
}	

	//validation ends
	if(sizeof(@$errors) == 0) 
	{
	if($customer_name=="")
	{
			$err= "<div class='alert alert-danger'>* Please Fill The All Fields</div>";
	}
	else
	{
		mysqli_query($con,"INSERT INTO provisional_quotation(quotation_id,project_name,sub_project_name,unit_type,unit_no,saleable_area,remarks,customer_name,customer_contact_no,alernate_contact_no,customer_email,customer_address,customer_city,customer_state,customer_pincode,bsp_psf,bsp_rupees,deal_ratio,agent_discount,agent_discount_amount,counter_discount,nsp_rupees,nsp_psf,charge_type,calculate_on,charge_calculate_on,company_rate,waiver_any_type,net_chargeable,sales_associate,brokerage_type,total_brokerage,customer_discount,net_brokerage,sales_director,director_incentive_type,director_total_incentive,director_discount,director_net_incentive,sales_vp,vp_incentive_type,vp_total_incentive,vp_discount,vp_net_incentive,sales_zsh,zsh_incentive_type,zsh_total_incentive,zsh_discount,zsh_net_incentive,sales_manager,manager_incentive_type,manager_total_incentive,manager_discount,manager_net_incentive,sales_executive,executive_incentive_type,executive_total_incentive,executive_discount,executive_net_incentive)
		VALUES ('','$project_name','$sub_project_name','$unit_type','$unit_no','$saleable_area','$remarks','$customer_name','$customer_contact_no','$alernate_contact_no','$customer_email','$customer_address','$customer_city','$customer_state','$customer_pincode','$bsp_psf','$bsp_rupees','$deal_ratio','$agent_discount','$agent_discount_amount','$counter_discount','$nsp_rupees','$nsp_psf','$charge_type','$calculate_on','$charge_calculate_on','$company_rate','$waiver_any_type','$net_chargeable','$sales_associate','$brokerage_type','$total_brokerage','$customer_discount','$net_brokerage','$sales_director','$director_incentive_type','$director_total_incentive','$director_discount','$director_net_incentive','$sales_vp','$vp_incentive_type','$vp_total_incentive','$vp_discount','$vp_net_incentive','$sales_zsh','$zsh_incentive_type','$zsh_total_incentive','$zsh_discount','$zsh_net_incentive','$sales_manager','$manager_incentive_type','$manager_total_incentive','$manager_discount','$manager_net_incentive','$sales_executive','$executive_incentive_type','$executive_total_incentive','$executive_discount','$executive_net_incentive')");
		$err="<div class='alert alert-success'>Provisional Quotation Successfully Added..</div>";
       header('refresh:2'); 
	}
	}
}
mysqli_query($con,"select");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LMS Admin Panel</title>
				    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->

		 <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/city-autocomplete.css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>


		<!--    This is the offline CSS File           <link href="css/style.default.css" rel="stylesheet">      -->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		<script>
		function chkeid()
{
var e=document.getElementById("l10").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<3 || dotpos<atpos+3)
{
//alert("Invalid Email Format");
  document.getElementById('l10').style.borderColor="red";
}
else
{
document.getElementById('l10').style.borderColor="green";
document.getElementById("error").innerHTML="";
}
}

function isNumber(evt,errn) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              document.getElementById(errn).innerHTML="<font color='red'>It must be contain Number only</font>";
            return false;
        }
else
{
         document.getElementById(errn).innerHTML=" ";
    }
}
	
</script>
<script type="text/javascript">
function chkAplha(event,err)
	{
		if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8 || event.which==32))
		{
			document.getElementById(err).innerHTML="<font color='red'>It must be contain alphabets only</font>";
			 return false;
		}
			else
			  {
				  document.getElementById(err).innerHTML=" ";
			  }
	}
	function chekval(event)
{
	if((event.which>=34 && event.which<=43) || (event.which>=58 && event.which<=64))
	{
		//alert("Please Just Don't");
		return false;
	}
}
</script>
    </head>

    <body>
        
       <?php include('include/headerlms.php');?>
        
        <section>
            <?php include('include/sidebarlms.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <a href=""><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
									<li><a href="admindashboard_lms.php">Home</a></li>
                                    
									<li><a href="download/download6.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Provisional Quotation</span></a></li>
                                </ul>
                                <h4>Provisional Quotation</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err; ?></div>
					</div>
				       <div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Project Details : </h5>
					</div>
					</div>   
							<div class="row paddtop">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Project Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="project_name" style="height:35px;" id="l1" class="form-control" placeholder="Project Name" onkeypress="return chkAplha(event,'error1')"  />
                                                </div><!-- form-group -->
												<div id="error1"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sub Project Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sub_project_name" style="height:35px;"  id="l2" class="form-control" placeholder="Sub Project " onkeypress="return chkAplha(event,'error2')"/>
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div><!-- col-sm-6 --> 
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Unit Type :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="unit_type" style="height:35px;"  id="l3" class="form-control" placeholder="Unit Type" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>	
												
						</div>
<div class="row paddbottom">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Unit No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="unit_no" style="height:35px;" id="l4"  class="form-control" placeholder="Unit no." onkeypress="return isNumber(event,'error3')"/>
                                                </div><!-- form-group -->
												<div id="error3"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Saleable Area:</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="saleable_area" style="height:35px;"  id="l5" class="form-control" placeholder="Saleable Area"onkeypress="return chkAplha(event,'error4')"/>
                                                </div><!-- form-group -->
												<div id="error4"></div>
                                            </div><!-- col-sm-6 --> 
											
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Remarks :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="remarks" style="height:35px;"  id="l6" class="form-control" placeholder="Remarks" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>	
												
						</div>						
					
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Customer Details : </h5>
					</div>
					</div>
					 <div class="row paddtop">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_name" style="height:35px;" id="l7" class="form-control" placeholder="Customer Name" onkeypress="return chkAplha(event,'error5')"/>
                                                </div><!-- form-group -->
												<div id="error5"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_contact_no" style="height:35px;" onkeypress="return isNumber(event,'error6')" id="l8" class="form-control" placeholder="Customer Contact No."/>
                                                </div><!-- form-group -->
												<div id="error6"></div>
                                            </div><!-- col-sm-6 --> 
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Alternate Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="alernate_contact_no" style="height:35px;" onkeypress="return isNumber(event,'error7')" id="l9" class="form-control" placeholder="Alternate Contact No."/>
                                                </div><!-- form-group -->
												<div id="error7"></div>
                                            </div>	
												
						</div>
						<div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="customer_email" id="l10" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="Customer Email"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Customer Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="3" name="customer_address" id="l11" placeholder="Customer Address" onkeypress="return chekval(event)"></textarea>
												</div>
                                                </div><!-- col-sm-6 --> 
													<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_city" id="l12"  style="height:35px;"  class="form-control"  autocomplete="off" data-country="in" placeholder="Customer City" onkeypress="return chkAplha(event,'error8')"/>
                                                </div><!-- form-group -->
												<div id="error8"></div>
                                            </div>
						</div>
						<div class="row paddbottom">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_state" id="l13" style="height:35px;"  class="form-control" placeholder="Customer State"onkeypress="return chkAplha(event,'error9')"/>
                                                </div><!-- form-group -->
												<div id="error9"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer PinCode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_pincode" id="l14" style="height:35px;" maxlength="8" onkeypress="return isNumber(event,'error10')" class="form-control" placeholder="Customer Code"/>
                                                </div><!-- form-group -->
												<div id="error10"></div>
                                            </div>
													
						</div>
					<!--       Cost details    -->	
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Cost Details : </h5>
					</div>
					</div>
					<div class="row paddtop">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>BSP(PSF)</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="bsp_psf" id="l15" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="BSP(PSF)" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>BSP(Rupees)</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="bsp_rupees" id="l16" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="BSP(Rupees)"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Deal Ratio (%)</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="deal_ratio" id="l17" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="Deal Ratio"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-2">
                                               <div class="form-group">
												<label><b>Agent Discount :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="agent_discount" id="l18">
													<option value="">Select Discount</option>
													<option value="1">Percent(%)</option>
													<option value="2">Fixed</option>
													
												</select>
											</div>
                                            </div>
											<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Agent Discount Amt</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="agent_discount_amount" id="l19" style="height:35px;"  class="form-control" placeholder="Discount amount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											          
						</div>
					<div class="row paddbottom">
					<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Counter Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="counter_discount" id="l20" style="height:35px;"  class="form-control" placeholder="Counter Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>NSP Rupees</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="nsp_rupees" id="l21" style="height:35px;"  class="form-control" placeholder="NSP Rupees" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>NSP(PSF)</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="nsp_psf" id="l22" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="NSP(PSF)" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
																				 
						</div>
					
					
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px"> Other Charges Details : </h5>
					</div>
					</div>
					<div class="row paddtop" style="width:auto;">
											<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Charge Type</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="charge_type" style="height:35px;" id="l23" class="form-control" placeholder="Charge Type" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												 
											<div class="col-sm-2" >
                                                <div class="form-group">
                                                    <label class="control-label"><b>Calculate on:</b><span style="color:red;">*</span></label>
                                                    <input type="text" name="calculate_on" style="height:35px;" id="l24" class="form-control" placeholder="PSF / % / Fixed Amount" onkeypress="return chekval(event)"/>
													<span style="color:red;"><small>PSF / % / Fixed Amount</small> </span>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
												<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Charge Calculate On:</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="charge_calculate_on" style="height:35px;" id="l25" class="form-control" placeholder="Dropdown" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
												<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Rate :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="company_rate" style="height:35px;" id="l26" class="form-control" placeholder="Comopany Rate" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
												<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Waiver Any Type :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="waiver_any_type" style="height:35px;" id="l27" class="form-control" placeholder="Waiver Any Type" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
												<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Chargeable :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="net_chargeable" style="height:35px;" id="l28" class="form-control" placeholder="Net Chargeable" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
												
					</div>
					
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Associate Details : </h5>
					</div>
					</div>
                        						
						<div class="row paddtop paddbottom">
                                            <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales Associate :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_associate" id="l29">
													<option value="">Select Associate</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE 'associate%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
														
														
														/* $empid=$r['emp_code'];
														echo "<option value='$empid'>".$r['firstname']." ".$r['lastname']."</option>"; */
													}
													//add_employee where employee_designation
													//add_associate_employee where emp_designation
													?>
												</select>
											</div>
											</div>
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Brokerage Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="brokerage_type" id="l30">
													<option value="">Select Brokerage</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Brokerage</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="total_brokerage" style="height:35px;" name="l31" class="form-control" placeholder="Total Brokerage" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_discount" style="height:35px;" name="l32" class="form-control" placeholder="Customer Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Brokerage</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="net_brokerage" style="height:35px;" name="l33" class="form-control" placeholder="Net Brokerage" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
						</div>
											
							<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px"> Sales Person Details : </h5>
					</div>
					</div>
					<div class="row paddtop">
                                            
											 <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales Director :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_director" id="l34">
													<option value="">Select Director</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation like '%director%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
													}
													?>
												</select>
											</div>
											</div>
											
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Incentive Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="director_incentive_type" id="l35">
													<option value="">Select Incentive</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="director_total_incentive" style="height:35px;" name="l36" class="form-control" placeholder="Total Incentive" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="director_discount" style="height:35px;" name="l37" class="form-control" placeholder="Discount" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="director_net_incentive" style="height:35px;" name="l38" class="form-control" placeholder="Net Incentive" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											 
						</div>
						<div class="row">
                                            
									
											 <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales VP :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_vp" id="l39">
													<option value="">Select VP</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%vp%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
													}
													?>
												</select>
											</div>
											</div>
											
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Incentive Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="vp_incentive_type" id="l40">
													<option value="">Select Incentive</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="vp_total_incentive" style="height:35px;" name="l41" class="form-control" placeholder="Total Incentive" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="vp_discount" style="height:35px;" name="l42" class="form-control" placeholder="Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="vp_net_incentive" style="height:35px;" name="l43" class="form-control" placeholder="Net Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											 
						</div>
						<div class="row">
                                            
									
											 <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales ZSH :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_zsh" id="l44">
													<option value="">Select ZSH</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%zsh%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
													}
													?>
												</select>
											</div>
											</div>
											
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Incentive Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="zsh_incentive_type" id="l45">
													<option value="">Select Incentive</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="zsh_total_incentive" style="height:35px;" name="l46" class="form-control" placeholder="Total Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="zsh_discount" style="height:35px;" name="l47" class="form-control" placeholder="Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="zsh_net_incentive" style="height:35px;" name="l48" class="form-control" placeholder="Net Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											 
						</div>
						<div class="row">
                                            
									
											 <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales Manager :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_manager" id="l49">
													<option value="">Select Manager</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%manager%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
													}
													?>
												</select>
											</div>
											</div>
											
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Incentive Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="manager_incentive_type" id="l50">
													<option value="">Select Incentive</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="manager_total_incentive" style="height:35px;" name="l51" class="form-control" placeholder="Total Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="manager_discount" style="height:35px;" name="l52" class="form-control" placeholder="Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="manager_net_incentive" style="height:35px;" name="l53" class="form-control" placeholder="Net Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											 
						</div>
						<div class="row paddbottom">
                                            
									
											 <div class="col-sm-2">
                                                <div class="form-group">
												<label><b>Sales Executive :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_executive" id="l54">
													<option value="">Select Executive</option>
													<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%executive%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
													}
													?>
												</select>
											</div>
											</div>
											
											   
													 <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label><b>Incentive Type :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="executive_incentive_type" id="l55">
													<option value="">Select Incentive</option>
													<option value="1">Percent</option>
													<option value="2">Fixed</option>
													<option value="2">PSF</option>
												</select>
												   </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->  
												
													<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="executive_total_incentive" style="height:35px;" id="l56" class="form-control" placeholder="Total Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											   <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Discount</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="executive_discount" style="height:35px;" id="l57" class="form-control" placeholder="Discount"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Net Incentive</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="executive_net_incentive" style="height:35px;" id="l58" class="form-control" placeholder="Net Incentive"onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                                </div>
											 
						</div>
						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" class="btn btn-success button1" name="submit" id="submit" value="Submit">
											<input type="reset" class="btn btn-danger resetbutt" value="Reset All">
                                                </div>
						</div>
						</form>
                        <!--   form end   -->
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
		
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
			$('#l12').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->

		<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
			
            $('#l1,#l2,#l3,#l4,#l5,#l6,#l7,#l8,#l9,#l10,#l11,#l12,#l13,#l14,#l15,#l16,#l17,#l18,#l19,#l20,#l21,#l22,#l23,#l24,#l25,#l26,#l27,#l28,#l29,#l34,#l39,#l44,#l49,#l54').each(function () {
                if ($.trim($(this).val()) == '') {
                    isValid = false;
                    $(this).css({
                       // "border": "1px solid red",
                        "background": "#FFCECE"
                    });
                }
                else {
                    $(this).css({
                        "border": "",
                        "background": ""
                    });
                }
            });
            if (isValid == false)
                e.preventDefault();

        });
});
		</script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/jquery-jvectormap-us-aea-en.js"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/gmaps.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function(){
                
                new GMaps({
                    div: '#gmap',
                    lat: -12.043333,
                    lng: -77.028333
                });
                
                var map_marker = new GMaps({
                    div: '#gmap-marker',
                    lat: -12.043333,
                    lng: -77.028333
                });
                
                map_marker.addMarker({
                    lat: -12.043333,
                    lng: -77.028333,
                    click: function(e) {
                      alert('You clicked in this marker');
                    }
                });
                
                jQuery('#vectormap-world').vectorMap({
                    map: 'world_mill_en',
                    regionStyle: {
                        initial: {
                            fill: '#a5a7aa'
                        },
                        hover: {
                            fill: '#6e7072'
                        }     
                    },
                    backgroundColor: '#fff'
                });
                
                jQuery('#vectormap-country').vectorMap({
                    map: 'us_aea_en',
                    regionStyle: {
                        initial: {
                            fill: '#a5a7aa'
                        },
                        hover: {
                            fill: '#6e7072'
                        }     
                    },
                    backgroundColor: '#fff'
                });
                
            });
        </script>
    </body>
</html>
<?php
}
else
{	
	header('location:index.php');
}
?>
