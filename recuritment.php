<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
include('config.php');
extract($_POST);
//$under_name=mysqli_query($con,"select * from add_employee");
if(isset($submit))
{
	$d=date("ymd");
	$t=time();
	
	$r=rand(55,90);
	$s=rand(30,50);
	$t=rand(5,25);

	 $imgid=($d+$t)*$r;
	 $imid=($d+$t)*$s;
	 $imgi=($d+$t)*$t;
	
		$image=$_FILES['image']['name'];
		$im=$imgid.'-'.$image;
		
		$id_proof=$_FILES['id_proof']['name'];
		$imm=$imid.'-'.$id_proof;

		$add_proof=$_FILES['add_proof']['name'];
		$imi=$imgi.'-'.$add_proof;

//validation server side start		
if (!ctype_alpha(str_replace(array("'", "-"), "",$fname))) { 
			$errors = 'First name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", "-"), "",$lname))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$emp_city))) { 
			$errors = 'City should be alpha characters only.';
}	

if (!ctype_alpha(str_replace(array("'", " "), "",$emp_state))) { 
			$errors = 'State should be alpha characters only.';
}	
# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) { 
			$errors = 'Enter a valid email address.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($emp_contact) OR strlen($emp_contact) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Pin Code #
		// if phone is invalid, throw error
		if (!ctype_digit($emp_pincode) OR strlen($emp_pincode) != 6) {
			$errors = 'Enter a valid pin Code.';
		}
		//validation server side ends
	//for auto emp code-----			
	$chkid=mysqli_query($con,"select * from add_employee");
$chkrows=mysqli_num_rows($chkid);

$ques2=mysqli_query($con,"select * from company_details where company_code='$company_code'");
$rw2=mysqli_fetch_array($ques2);
$com_emp2 = $rw2['company_emp_code']; 
$com_emp4 = $com_emp2.'-';
$chkid2=mysqli_query($con,"select * from add_employee where employee_code LIKE '$com_emp4%' ORDER BY employee_code DESC ");
$rows2=mysqli_num_rows($chkid2);
if($chkrows == 0)
{
$ques=mysqli_query($con,"select * from company_details where company_code='$company_code'");
$rw=mysqli_fetch_array($ques);
$com_emp = $rw['company_emp_code'];	
	
	$seq = 1;
    $a1 = sprintf("%03d", $seq);
	$emp_id2 = $com_emp.'-'.$a1;

}
elseif($rows2 == 0)
{
	$seq = 1;
    $a2 = sprintf("%03d", $seq);
	$emp_id2 = $com_emp2.'-'.$a2;
	
}
else
{
$ques3=mysqli_query($con,"select * from company_details where company_code='$company_code'");
$rw3=mysqli_fetch_array($ques3);
$com_emp3 = $rw3['company_emp_code']; 
	$com_emp5 = $com_emp3.'-';
	$chkid3=mysqli_query($con,"select * from add_employee where employee_code LIKE '$com_emp5%' ORDER BY employee_code DESC ");
	
	$rows1=mysqli_fetch_array($chkid3);
	$last_id = $rows1['employee_code']; 
	// $restid2  = substr("$last_id",0,3); //for first 3 lick csi
	
	 $restid  = substr("$last_id", -3); //for last 3 like oo1
	
	 $b = "$restid" + 1;  //for last id +1 like 001 +1 
	 $a3 = sprintf("%03d", $b); //for 001,002
	
	$emp_id2 = $com_emp3.'-'.$a3;
	
}			
		
				
	//end for auto emp code-----				

         //echo "hello".$n;
		//echo "<script>alert($n)</script>";
	if(sizeof(@$errors) == 0) 
{	
    $que=mysqli_query($con,"INSERT INTO `recuriment`(`r_id`, `fname`, `lname`, `emp_contact`, `emp_email`, `emp_address`, `emp_city`, `emp_state`, `emp_pincode`, `emp_department`, `emp_designation`, `emp_branch`, `company_code`, `emp_pic`, `id_proof`, `add_proof`, `interviewer_name`) VALUES ('','$fname','$lname','$emp_contact','$emp_email','$emp_address','$emp_city','$emp_state','$emp_pincode','$emp_department','$emp_designation','$emp_branch','$company_code','$im','$imm','$imi','$interviewer_name')");
						
	//$que=mysqli_query($con,"INSERT INTO `add_employee`(`employee_code`,`employee_first_name`,`employee_last_name`,`emp_password`, `employee_mobile_no`, `employee_email`, `employee_address`, `employee_city`, `employee_state`, `employee_pincode`, `employee_department`, `employee_designation`, `employee_branch_name`, `company_code`, `emp_pic`, `id_proof`, `add_proof`, `interviewer_name`) VALUES ('$emp_id2','$fname','$lname','$password','$emp_contact','$emp_email','$emp_address','$emp_city','$emp_state','$emp_pincode','$emp_department','$emp_designation','$emp_branch','$company_code','$im','$imm','$imi','$interviewer_name')");
		
		move_uploaded_file($_FILES['image']['tmp_name'],"profile/".$im);
		move_uploaded_file($_FILES['id_proof']['tmp_name'],"documents/".$imm);
		move_uploaded_file($_FILES['add_proof']['tmp_name'],"documents/".$imi);

	$err="<div class='alert alert-success'>Recuritment Successfully Added...</div>";
	header('refresh:2'); 
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HRMS Admin Panel</title>

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
		    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/jquery.gritter.css" rel="stylesheet">
			<link href="css/stylemanual.css" rel="stylesheet">   <!--    my css     -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/city-autocomplete.css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>
        
		
		<!--	search-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">


  $(function() {
    $( "#searchid" ).autocomplete({
      source: 'search_id_name.php'
    });
  });


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
var e=document.getElementById("e4").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<3 || dotpos<atpos+3)
{
 //alert("Invalid Email Format");
  document.getElementById('e4').style.borderColor="red";
}
else
{
	document.getElementById('e4').style.borderColor="green";
document.getElementById("error").innerHTML="";
}
}
</script>

		<!--	search-->
		
		
		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		<!--                      Upload Image Code Start                          -->
		<script src="js/jquery-1.9.1.js"></script>
		
<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
function checkfile2(sender) {
    var validExts = new Array( ".x-png",".gif",".jpeg",".jpg");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid files are of " +
               validExts.toString() + " types.");
			   document.getElementById("uploadFile").value="";
      return false;
    }
    else 
	{return true;
	}
}
function checkfile(sender) {
    var validExts = new Array( ".pdf");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid files are of " +
               validExts.toString() + " types.");
			   document.getElementById("filedocxpdf").value="";
			   document.getElementById("filedocxpdf2").value="";
      return false;
    }
    else 
	{return true;
	}
}
</script>
<style>
#imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
	-webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
  box-shadow:         3px 3px 5px 6px #ccc; 
}
</style>			
			<!--                     Upload Image Code End          -->
		<script>
		
		function sum() {
      var txtFirstNumberValue = document.getElementById('e17').value;
      var txtSecondNumberValue = document.getElementById('e18').value;
	  var txtthirdNumberValue = document.getElementById('e19').value;
	  var fourth = document.getElementById('ee19').value;
	  var five = document.getElementById('eee19').value;

      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue)+parseInt(txtthirdNumberValue)+parseInt(fourth)+parseInt(five);
      if (!isNaN(result)) {
         document.getElementById('e20').value = result;
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
function chekval(event)
{
	if((event.which>=34 && event.which<=43) || (event.which>=58 && event.which<=63))
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
                              <a href="admindashboard.php"><i style="color:white" class="fa fa-plus"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Recruitment</li>
									<li><a href="download/download_recruitment.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Recruitment</span></a></li>
                                </ul>
                                <h4> Recruitment</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data">
					<div class="row">
					<div class="col-sm-6" id="error">
					<?php echo @$errors;?>
					<?php echo @$err;?></div>
					</div>
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Company Details : </h5>
					</div>
					</div>
					<div class="row paddtop paddbottom">
											<div class="col-sm-4">
											<div class="form-group">
												<label><b>Company Name :</b> <span style="color:red;">*</span> </label>
												<select class="form-control select1"  name="company_code"   id="e23">
													<option value="">Select Company</option>
													<?php
													$ques=mysqli_query($con,"select * from company_details");
													while($rw=mysqli_fetch_array($ques))
													{
														$code=$rw['company_code'];
													echo "<option value='$code'>".$rw['company_name']."</option>";
													}
													
													?>
												</select>
											</div>
                                            </div>	
						</div><!--  Row   -->
						
									


					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Details : </h5>
					</div>
					</div>
                        <div class="row paddtop paddbottom">
											<!--<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_code" id="e0" style="height:35px;"  class="form-control" placeholder="Employee Code"/>
                                                </div><!-- form-group 
                                            </div> -->                                           
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>First Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="fname" id="e1" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" onkeypress="return chkAplha(event,'error1')" />
                                                </div><!-- form-group -->
												<div id="error1"></div>
                                            </div>
											<div class="col-sm-4"style="display:none;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Middle Name :</b></label>
                                                    <input type="text" name="mname" id="e111" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Last Name :</b></label>
                                                    <input type="text" name="lname" id="e2" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee Last Name" onkeypress="return chkAplha(event,'error2')"/>
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div>
											<!--<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>password :</b></label>
                                                    <input type="password" name="password" id="e01" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee password" />
                                                </div>
                                            </div>-->
                                                     <!-- form-group -->
						</div><!--  Row   -->
						
									


				<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Personal Details : </h5>
					</div>
					</div>
					<div class="row paddtop">
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Contact No :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_contact" style="height:35px;"  id='e3' maxlength="10"class="form-control" onkeypress="return isNumber(event,'error3')" placeholder="Employee Contact No" />
                                                </div><!-- form-group -->
												<div id="error3"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="emp_email" style="height:35px;" id="e4" onblur="chkeid()"  class="form-control" placeholder="Employee Email" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Employee Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="emp_address" id="e5" style="text-transform:capitalize;" placeholder="Employee Address" onkeypress="return chekval(event)"></textarea>
												</div>
                                                </div>
											                                        
						</div><!--  Row   -->
						<div class="row paddbottom" >
											                                         										
										  
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_city" id="e6" style="height:35px;" class="form-control" placeholder="Employee City" autocomplete="off" data-country="in" onkeypress="return chkAplha(event,'error4')"/>
                                                </div>
												<div id="error4"></div>
												</div>
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_state" id="e7" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee State" onkeypress="return chkAplha(event,'error5')"/>
                                                </div><!-- form-group -->
												<div id="error5"></div>
												</div>
												 <!-- form-group --><div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Pincode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_pincode" id="e8" style="height:35px;" maxlength="6" class="form-control" onkeypress="return isNumber(event,'error6')" placeholder="Employee Pincode" />
                                                </div>
												<div id="error6"></div>
												</div>
						</div>
						
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Offically/Hireachy Details : </h5>
					</div>
					</div>
						<div class="row paddtop">
												
											<div class="col-sm-4">
											<div class="form-group">
												<label><b>Employee Department :</b><span style="color:red;">*</span> </label> <span style="float:right"><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Department</a></span>
												<div id="aut1"><select class="form-control select1"  name="emp_department"   id="e11">
													<option value="">Select Department</option>
													<?php
													$quee=mysqli_query($con,"select * from department");
													while($rw=mysqli_fetch_array($quee))
													{
														echo "<option>".$rw['department_name']."</option>";
													}
													
													?>
													
												</select></div>
											</div>
                                            </div>	
 <div class="col-sm-4">
											 <div class="form-group">
												<label><b>Employee Designation :</b><span style="color:red;">*</span> </label><span style="float:right"><a href="" data-toggle="modal" data-target="#examModal" data-whatever="@mdo">Add Designation</a></span>
												<div id="aut2"><select class="form-control select1"  name="emp_designation" class="form-control"  id="e12"> 
													<option value="">Select Designation</option>
													<?php
													$q=mysqli_query($con,"select * from designation");
													while($roow=mysqli_fetch_array($q))
													{
														
													echo "<option>".$roow['designation_name']."</option>";
													}
													
													?>
													
												</select></div>
											</div>
											</div>
                                                <!--<div class="form-group">
                                                    <label class="control-label"><b>Employee Designation :</b> <span style="color:red;">*</span></label><span style="float:right"><a href="" data-toggle="modal" data-target="#examModal" data-whatever="@mdo">Add Designation</a></span>
                                                    <input type="text" name="emp_designation" style="height:35px;"class="form-control" id="e12" placeholder="Employee Designation"/>
                                                </div> form-group -->
                                            
	
											
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Branch Name :</b> <span style="color:red;">*</span></label><span style="float:right"><a href="" data-toggle="modal" data-target="#exaModal" data-whatever="@mdo">Add Branch</a></span>
                                                  <div id="brnh">  <select class="form-control select1" name="emp_branch" style="height:35px;text-transform:capitalize;"  class="form-control" id="e14" placeholder="Employee Branch">
													<option value="">Select Branch Name</option>
													<?php
												$qq=mysqli_query($con,"select * from add_branch");
													while($row=mysqli_fetch_array($qq))
													{
														$id=$row['b_id'];
														$code=$row['branch_code'];
														$name=$row['branch_name'];
													echo "<option>".$name."</option>";
													}
													
													?>
													

												</select></div>
													
                                                </div><!-- form-group -->
                                            </div>											
						</div>
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Profile Image : </h5>
					</div>
					</div>
					<div class="row paddtop paddbottom">
											<div class="col-sm-3" style="margin-top: 48px;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Upload Image :</b> <span style="color:red;">*</span></label>
                                                    <input class="form-control" id="uploadFile" onchange="checkfile2(this);" required type="file" name="image" class="img" accept="image/x-png,image/gif,image/jpeg" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											</div>
											<div class="col-sm-4">
											<div id="imagePreview"></div>

											</div>
											                                 
						</div><!--  Row   -->
					
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Documents : </h5>
					</div>
					</div>
					<div class="row paddtop paddbottom">
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>Upload ID Proof :</b> <span style="color:red;">*</span></label>
													</div>
												</div>
												
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                    
                                                    <input type="file" name="id_proof" id="filedocxpdf" style="height:35px;" onchange="checkfile(this);" class="form-control" placeholder="PF No" accept="application/pdf"/>
                                                </div><!-- form-group -->
												</div>                           
						</div><!--  Row   -->
					<div class="row paddtop paddbottom">
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>Upload Address Proof :</b> <span style="color:red;">*</span></label>
													</div>
												</div>
												
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                    
                                                    <input type="file" name="add_proof" id="filedocxpdf2" style="height:35px;" class="form-control" placeholder="PF No" accept="application/pdf" onchange="checkfile(this);"/>
                                                </div><!-- form-group -->
												</div>                           
						</div><!--  Row   -->
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Interview Details : </h5>
					</div>
					</div>
					<div class="row paddtop paddbottom">
											<div class="col-sm-3" >
                                                <div class="form-group">
                                                    <label class="control-label"><b>Interview Taken By :</b> <span style="color:red;">*</span></label>
                                                    <input class="form-control search" id="searchid" type="text" name="interviewer_name" placeholder="Interviewer Name" onkeypress="return chekval(event)" />
                                                     <div id="result" VALUE="<?php echo $final_username;?>">
												</div><!-- form-group -->
                                            </div>
											  
                                              
                                              </div>
                                                                         
						</div><!--  Row   -->
					
					
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success button1">
											<button type="reset" class="btn btn-danger resetbutt">Reset All</button>
                                                </div>
						</div><!-- Row  -->
						
                        </div>
						</form>
                </div>
            </div><!-- mainwrapper -->
        </section>
        
       <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                Content goes here...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->

<!--                                         This script Conflict  start   -->
<script src="js/jquery-1.9.1.js"></script>
    <script>
		//   Add Department
	
      $(function () {

        $('#save').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'query.php',
            data: $('form').serialize(),
            success: function (str) {
			alert(str);
			$('#aut1').load('add_department_ajax.php');
			// $("#exampleModal").model('toggle');
            }
          });

        });

      });
	  
	  //      Add Designation 
	  
	   $(function () {

        $('#add_designation').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'add_designation.php',
            data: $('form').serialize(),
            success: function (str) {
			alert(str);
			$('#aut2').load('add_designation_ajax.php');
			// $("#exampleModal").model('toggle');
            }
          });

        });

      });
	  
	    //      Add Branch 
	  
	   $(function () {

        $('#add_new_branch').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'add_branch.php',
            data: $('form').serialize(),
            success: function (str) {
			alert(str);
			$('#brnh').load('executive_ajax12.php');
			// $("#exampleModal").model('toggle');
            }
          });

        });

      });
	  
    </script>
<!--                                         This script Conflict  End   -->
       
<!--                                         This script Conflict  start   -->
  <!--                                         This script Conflict  End   -->
        <script src="js/jquery-1.11.1.min.js"></script>
		
<!--        this is auto complete state name start    -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		
  <!--        this is auto complete state name end    -->

  <!--        this is validation on show fields start    -->
  <script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
          $('#e1,#e3,#e4,#e5,#e6,#e7,#e8,#e11,#e12,#e13,#e14,#e15,#e23,#i8,#searchid').each(function () {
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
		
				<!--        this is validation on show fields start    -->
	
		
		
		
		
		
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
			
				<!--   pop up -->
					<!--   pop up -->
				<!-- Modal for Add Department start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
	  <?php echo @$er;?>
        <form method="post" id="formfield">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Department Name :</label>
            <input type="text" class="form-control" style="text-transform:uppercase;" id="recipient-name" name="depart_name" id="d1" placeholder="Enter Department">
          </div>
          
        
      </div>
      <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal" id="save">Add Department</button>

        
      </div>
	  </form>
    </div>
  </div>
</div>
<!-- Modal for Add Department end -->
<!-- Modal for Add Designation start -->
<div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="designation_form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Designation Name :</label>
            <input type="text" class="form-control" style="text-transform:uppercase;" id="designation_name"placeholder="Enter Designation" name="degisnat_name">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_designation">Add Designation</button>
       
      </div>
	   </form>
    </div>
  </div>
</div>

<!-- Modal for Add Designation End -->

<!-- Modal for Add Branch start -->
<div class="modal fade" id="exaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Branch code :</label>
            <input type="text" class="form-control" id="recipient-name" name="branch_code" style="text-transform:uppercase;" placeholder="Enter branch code">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="control-label">Branch Name :</label>
            <input type="text" class="form-control" id="recipient-name" name="branch_name" style="text-transform:uppercase;"  placeholder="Enter branch Name">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_new_branch">Add Branch</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal for Add branch End -->

    </body>
</html>

