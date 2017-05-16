<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');
extract($_POST);

if(isset($submit))
{
	$esi_applicable="";
	$esi_no="";
	
if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $company_id)) 
 {               
  $error[] = 'not valid company_id Dont use ? <> " ';	 
 }
if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $company_name)) 
 {               
  $error[] = 'not valid company_name Dont use ? <> " ';	 
 }	
if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $company_code)) 
 {               
  $error[] = 'not valid company_code Dont use ? <> " ';	 
 }	
if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $company_emp_code)) 
 {               
  $error[] = 'not valid company_emp_code Dont use ? <> " ';	 
 }	
if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error[] = "not valid email !"; 
 }	
if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $corporte_identity_no)) 
 {               
  $error[] = 'not valid corporte_identity_no Dont use ? <> " ';	 
 }	
 if(!preg_match("/^[_\.0-9a-zA-Z ]{2,50}$/i", $service_tax)) 
 {           
   $error[] = 'not valid service_tax use a-b,A-B and 0-9 only! ';  
 } 	
if(!preg_match("/^[_\.0-9a-zA-Z ]{2,50}$/i", $pan_no)) 
 {           
   $error[] = 'not valid pan_no use a-b,A-B and 0-9 only! ';  
 }	
if(!preg_match("/^[_\.a-zA-Z ]{2,50}$/i", $company_print_name)) 
 {           
   $error[] = 'not valid company_print_name use a-b and A-B only! ';  
 }
if(!preg_match("/^[_\.0-9a-zA-Z ]{2,50}$/i", $tan_no)) 
 {           
   $error[] = 'not valid Tan_no use a-b,A-B and 0-9 only! ';  
 }
 if(!preg_match("/^[_\.0-9a-zA-Z.!@#$%^&* ()_\-]{2,50}$/i", $offfice_address)) 
 {               
  $error[] = 'not valid Offfice_address Dont use ? <> " ';	 
 }
 if(!preg_match("/^[_\.a-zA-Z ]{2,50}$/i", $city)) 
 {           
   $error[] = 'not valid city use a-b and A-B only! ';  
 }
  if(!preg_match("/^[_\.a-zA-Z ]{2,50}$/i", $state)) 
 {           
   $error[] = 'not valid state use a-b and A-B only! ';  
 }
  if(!preg_match("/^[_\.a-zA-Z ]{2,50}$/i", $country)) 
 {           
   $error[] = 'not valid country use a-b and A-B only! ';  
 }
 if(!preg_match("/^[_\.0-9]{6,6}$/i", $pincode)) 
 {           
   $error[] = 'not valid pincode use 0-9 only! ';  
 }
  if(!preg_match("/^[_\.0-9]{10,10}$/i", $telephone)) 
 {           
   $error[] = 'not valid telephone use 0-9 only! ';  
 }
  if(!preg_match("/^[_\.0-9]{5,10}$/i", $fax)) 
 {           
   $error[] = 'not valid fax use 0-9 only! ';  
 }
	
	
	 $ques=mysqli_query($con,"select * from company_details where company_id='$company_id'");
     $rw=mysqli_fetch_array($ques);

     $company_id1 = $rw['company_id'];
	 
	 $ques=mysqli_query($con,"select * from company_details where company_name='$company_name'");
     $rw=mysqli_fetch_array($ques);
	 $company_name1 = $rw['company_name'];
	 
	 $ques=mysqli_query($con,"select * from company_details where company_code='$company_code'");
     $rw=mysqli_fetch_array($ques);
	 $company_code1 = $rw['company_code'];
	 
	 $ques=mysqli_query($con,"select * from company_details where company_emp_code='$company_emp_code'");
     $rw=mysqli_fetch_array($ques);
	 $company_emp_code1 = $rw['company_emp_code'];
	 
	if($company_id1==$company_id)
	{
	$err="<div class='alert alert-success'>Company_id Already Exists ...</div>";	
	}
	elseif($company_name1==$company_name)
	{
	$err="<div class='alert alert-success'>Company_name Already Exists ...</div>";	
	}
	elseif($company_code1==$company_code)
	{
	$err="<div class='alert alert-success'>Company_code Already Exists ...</div>";	
	}
	elseif($company_emp_code1==$company_emp_code)
    {
		 
	 $err="<div class='alert alert-success'>Company_employee_code Details Already Exists ...</div>";
	  
	}
 else{
	
	
	   if(@$pf_applicable==""||$pf_no=="")
	{
		if(sizeof(@$error) == 0)  {
		$que=mysqli_query($con,"INSERT INTO `company_details` (`company_id`, `company_name`, `company_code`, `company_emp_code`, `fiscal_year`, `company_print_name`, `domain_name`, `email`, `ip_address`, `corporte_identity_no`, `tax_deduction`, `service_tax`, `pan_no`, `vat_no`, `tan_no`, `esi_applicable`, `esi_no`,`offfice_address`, `city`, `country`, `state`, `pincode`, `telephone`, `fax`) 
                                                           VALUES ('$company_id', '$company_name', '$company_code', '$company_emp_code', '$fiscal_year', '$company_print_name', '$domain_name', '$email', '$ip_address', '$corporte_identity_no', '$tax_deduction', '$service_tax', '$pan_no', '$vat_no', '$tan_no', '$esi_applicable', '$esi_no','$offfice_address', '$city', '$country', '$state', '$pincode', '$telephone', '$fax')");
	
	$err="<div class='alert alert-success'>Company Details Successfully Added ...</div>";
		}
	}
	elseif(@$esi_applicable==""||$esi_no=="")
	{
		    if(sizeof(@$error) == 0)  {
			$que=mysqli_query($con,"INSERT INTO `company_details` (`company_id`, `company_name`, `company_code`, `company_emp_code`, `fiscal_year`, `company_print_name`, `domain_name`, `email`, `ip_address`, `corporte_identity_no`, `tax_deduction`, `service_tax`, `pan_no`, `vat_no`, `tan_no`, `pf_applicable`, `pf_no`, `salary_calculation`, `offfice_address`, `city`, `country`, `state`, `pincode`, `telephone`, `fax`) 
                                                           VALUES ('$company_id', '$company_name', '$company_code','$company_emp_code', '$fiscal_year', '$company_print_name', '$domain_name', '$email', '$ip_address', '$corporte_identity_no', '$tax_deduction', '$service_tax', '$pan_no', '$vat_no', '$tan_no', '$pf_applicable', '$pf_no', '$salary_calculation', '$offfice_address', '$city', '$country', '$state', '$pincode', '$telephone', '$fax')");
	
	$err="<div class='alert alert-success'>Company Details Successfully Added ...</div>";
			}
	}
	
	
	
	else
	{    if(sizeof(@$error) == 0)  {
         $que=mysqli_query($con,"INSERT INTO `company_details` (`company_id`, `company_name`, `company_code`, `company_emp_code`, `fiscal_year`, `company_print_name`, `domain_name`, `email`, `ip_address`, `corporte_identity_no`, `tax_deduction`, `service_tax`, `pan_no`, `vat_no`, `tan_no`, `pf_applicable`, `pf_no`, `esi_applicable`, `esi_no`, `salary_calculation`, `offfice_address`, `city`, `country`, `state`, `pincode`, `telephone`, `fax`) 
                                                           VALUES ('$company_id', '$company_name', '$company_code','$company_emp_code', '$fiscal_year', '$company_print_name', '$domain_name', '$email', '$ip_address', '$corporte_identity_no', '$tax_deduction', '$service_tax', '$pan_no', '$vat_no', '$tan_no', '$pf_applicable', '$pf_no', '$esi_applicable', '$esi_no', '$salary_calculation', '$offfice_address', '$city', '$country', '$state', '$pincode', '$telephone', '$fax')");

			
	$err="<div class='alert alert-success'>Company Details Successfully Added ...</div>";
	}
	}
	
  } // header('refresh:2');
}
/*if(isset($add_department))
{
	
	
}*/

	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HRMS Admin Panel</title>
		    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
		<!--    This is the offline CSS File           <link href="css/style.default.css" rel="stylesheet">      -->
        <link href="css/jquery.gritter.css" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/city-autocomplete.css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
	
		<script>
		
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
	
		

function showpfno()
{
	if(document.getElementById("e14").checked)
	{
	
		//alert("hiiiiii");
       document.getElementById("e15").disabled = false;
	}
	else
	{
		document.getElementById("e15").disabled=true;	
	}
	
}


function showesino()
{
	if(document.getElementById("e16").checked)
	{
	
		//alert("hiiiiii");
       document.getElementById("e17").disabled = false;
	}
	else
	{
		document.getElementById("e17").disabled=true;	
	}
	
}

//   this is for the  copy the same as addresss    


/* function copydata()
{
	
	if(document.f1.esi.checked)
	{
		document.f1.offfice.value=document.f1.offfice_address.value;
		//alert("hiiii");

	}
	else
	{
			document.f1.offfice.value="";
	}
} */
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
function chkeid()
{
var e=document.getElementById("e6").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<3 || dotpos<atpos+3)
{
 //alert("Invalid Email Format");
  document.getElementById('e6').style.borderColor="red";
}
else
{
	document.getElementById('e6').style.borderColor="green";
document.getElementById("error").innerHTML="";
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
        <?php include('include/header.php');?>        
        <section>
            <?php include('include/sidebar.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                              <a href=""><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Company Details</li>
									<li><a href="download/download4.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Details</span></a></li>
                                </ul>
                                <h4>Add Company Details</h4><h6> <?php @$msg=implode(", ",@$error); echo @$msg; ?></h6>
                            </div>
                        </div><!-- media --><!--<li><a href="export_details.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Data</span></a></li>-->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err;?></div>
					</div>
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Certifying Company Details : </h5>
					</div>
					</div>
                      <div class="row paddtop">
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Id / Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="company_id" id="e0" style="height:35px;"  class="form-control" placeholder="Company Code" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
											
                                            </div>                                            
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="company_name" id="e1" style="height:35px;" class="form-control" placeholder="Company Name" onkeypress="return chkAplha(event,'error2')"/>
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="company_code" id="e2" style="height:35px;" class="form-control" placeholder="Company Code" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Employee Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="company_emp_code" id="e26" style="height:35px;" class="form-control" placeholder="Company Employee Code" onkeypress="return chekval(event)" />
                                                </div><!-- form-group -->
                                            </div>
											
											

						</div><!--  Row   -->
						<div class="row ">
											<div class="col-sm-3" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Domain Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="domain_name" style="height:35px;" id="e5"   class="form-control" placeholder="Domain Name" />
                                                </div><!-- form-group -->
                                            </div>
											
											<div class="col-sm-3" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label" ><b>Tally Server Host( IP Address) :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ip_address" style="height:35px;" id="e7"   class="form-control" placeholder="IP Address" />
                                                </div><!-- form-group -->
                                            </div>
											
						</div>
						<div class="row paddtop">
						<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Email :</b> </label>
                                                    <input type="email" name="email" style="height:35px;" id="e6"   class="form-control" placeholder="Email" onblur="chkeid()" />
                                                </div><!-- form-group -->
                                            </div>
						<div class="col-sm-3" style="position:relative">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Corporate Identity No :</b></label>
                                                    <input type="text" name="corporte_identity_no" style="height:35px;" id="e8"   class="form-control" placeholder="Corporate Identity No" onkeypress="return isNumber(event,'error6')"/>
                                                </div><!-- form-group -->
												<div id="error6" style="position:absolute;bottom:-2px;"></div>
                                            </div>
											<div class="col-sm-3" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Tax Deduction Acc No :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="tax_deduction" style="height:35px;" id="e9"   class="form-control" placeholder="Tax Deduction Acc No" onkeypress="return chekval(event)" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Service Tax No :</b> </label>
                                                    <input type="text" name="service_tax" style="height:35px;" id="e10"   class="form-control" placeholder="Service Tax No" onkeypress="return chekval(event)" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>PAN No :</b> </label>
                                                    <input type="text" name="pan_no" style="height:35px;" id="e11"   class="form-control" placeholder="PAN No" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Company Print Name :</b> </label>
                                                    <input type="text" name="company_print_name" style="height:35px;"  id='e4' class="form-control"  placeholder="Company Print Name" onkeypress="return chkAplha(event,'error7')"/>
                                                </div><!-- form-group -->
												<div id="error7"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Financial Year :</b> </label>
                                                    <input type="date" name="fiscal_year" id="e3" style="height:35px;" class="form-control" placeholder="Fiscal Year" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
						
						</div>
						<div class="row paddbottom" style="display: none;">
						<div class="col-sm-3" >
                                                <div class="form-group">
                                                    <label class="control-label"><b>VAT No :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="vat_no" style="height:35px;" id="e12"   class="form-control" placeholder="VAT No" />
                                                </div><!-- form-group -->
                                            </div>
						</div>
						
									


				<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Payroll Information : </h5>
					</div>
					</div>
					
						<div class="row paddtop">
											                                         										
										  
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>PF Applicable :</b> </label>
													</div>
												</div>
												<div class="col-sm-1 col-xs-1">
                                                <div class="form-group">
												<input type="checkbox" class="" name="pf_applicable" id="e14" value="pf applicable"  onclick="javascript:showpfno();"/>  
													</div>
												</div>
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                    
                                                    <input type="text" name="pf_no" id="e15" style="height:35px;"  disabled  class="form-control" placeholder="PF No" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
												</div>
												 <!-- form-group -->
						</div>
						<div class="row">
											                                         										
										  
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>ESI Applicable :</b> </label>
												  
													</div>
												</div>
												<div class="col-sm-1 col-xs-1">
                                                <div class="form-group">
                                                    
												<input type="checkbox" class="" name="esi_applicable" onclick="showesino()" id="e16" value="esi applicable" />  
													</div>
												</div>
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                   
                                                    <input type="text" name="esi_no" id="e17" style="height:35px;" disabled class="form-control" placeholder="ESI No" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
												</div>
												 <!-- form-group -->
						</div>
						<div class="row paddbottom">
						<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>TAN No :</b> </label>
                                                    <input type="text" name="tan_no" style="height:35px;"  id='e13' class="form-control"  placeholder="TAN No" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
						
											<!--	<div class="col-sm-3">
											 <div class="form-group">
                                                    <label class="control-label"><b>Salary Calculation :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="salary_calculation"style="height:35px;" id="e18"  class="form-control" placeholder="Salary Calculation"/>
                                                </div><!-- form-group -->
                                           <!-- </div>-->			
																											
						</div>
						
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Registered Office Address Details : </h5>
					</div>
					</div>
						<div class="row paddtop">
						<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Office Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="offfice_address" id="e19" placeholder="Office Address" onkeypress="return chekval(event)"></textarea>
												</div>
                                                </div>
												<div class="col-sm-4">
											 <div class="form-group">
                                                    <label class="control-label"><b>City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="city" style="height:35px;" id="e20" autocomplete="off" data-country="in"  class="form-control" placeholder="City" onkeypress="return chkAplha(event,'error8')"/>
                                                </div><!-- form-group -->
												<div id="error8"></div>
                                            </div>
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="state" style="height:35px;" id="e22"  class="form-control" placeholder="State" onkeypress="return chkAplha(event,'error9')"/>
                                                </div><!-- form-group -->
												<div id="error9"></div>
                                            </div>	
									   
											
											
												
																						
						</div>
					
					<div class="row paddbottom">
						<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Country :</b><span style="color:red;">*</span> </label>
                                                    <input type="text" name="country" style="height:35px;"  id="e21" class="form-control" placeholder="Country" onkeypress="return chkAplha(event,'errorl0')"/>
                                                </div><!-- form-group -->
												<div id="errorl0"></div>
                                            </div> 
						<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Pincode/Zipcode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="pincode" style="height:35px;" id="e23"   class="form-control" placeholder="Pin/Zip" onkeypress="return isNumber(event,'errorl1')"/>
                                                </div><!-- form-group -->
												<div id="errorl1"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Telephone/mobile no :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="telephone" style="height:35px;" id="e24"   class="form-control" placeholder="Telephone" onkeypress="return isNumber(event,'errorl2')"/>
                                                </div><!-- form-group -->
												<div id="errorl2"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Fax :</b> </label>
                                                    <input type="text" name="fax" style="height:35px;" id="e25"   class="form-control" placeholder="Fax" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											
						</div>
								
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<!--<input type="submit" name="submit" value="Save"  class="btn btn-success button1">-->
											<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success button1">
											<button type="reset" class="btn btn-danger resetbutt">Reset All</button>
                                                </div>
						</div><!-- Row  -->
						
                        </div>
						</form>
                </div>
            </div><!-- mainwrapper -->
        </section>
        
       

<script src="js/jquery-1.9.1.js"></script>

        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
			$('#e20').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->
		
		
		<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
            $('#e0,#e1,#e2,#e19,#e20,#e21,#e22,#e23,#e24,#e26').each(function () {
                if ($.trim($(this).val()) == '') {
                    isValid = false;
                    $(this).css({
                        //"border": "1px solid red",
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
        
        <script src="js/jquery.gritter.min.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {
                
              jQuery('#growl1').click(function(){
            
                     jQuery.gritter.add({
                            // (string | mandatory) the heading of the notification
                            title: 'This is a regular notice!',
                            // (string | mandatory) the text inside the notification
                            text: 'This will fade out after a certain amount of time.',
                            // (string | optional) the image to display on the left
                            image: 'images/screen.png',
                            // (bool | optional) if you want it to fade out on its own or just sit there
                            sticky: false,
                            // (int | optional) the time you want it to be alive for before fading out
                            time: ''
                     });
            
                     return false;
            
              });
              
              jQuery('#growl2').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
              
              jQuery('#growl-primary').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                  class_name: 'growl-primary',
                  image: 'images/screen.png',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
              
              jQuery('#growl-success').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                  class_name: 'growl-success',
                  image: 'images/screen.png',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
              
              jQuery('#growl-warning').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                  class_name: 'growl-warning',
                  image: 'images/screen.png',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
              
              jQuery('#growl-danger').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                  class_name: 'growl-danger',
                  image: 'images/screen.png',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
              
              jQuery('#growl-info').click(function(){
                     jQuery.gritter.add({
                            title: 'This is a regular notice!',
                            text: 'This will fade out after a certain amount of time.',
                  class_name: 'growl-info',
                  image: 'images/screen.png',
                            sticky: false,
                            time: ''
                     });
                     return false;
              });
            
            });
            </script>
			
				

   

    </body>
</html>

