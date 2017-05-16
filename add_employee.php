<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="")
{	
	header('location:index.php');
}
include('config.php');
extract($_POST);
$under_name=mysqli_query($con,"select * from add_employee");
/* 
$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 */
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
	
	//echo $image;
		$image=$_FILES['image']['name'];
		$im=$imgid."-".$image;
		
		$id_proof=$_FILES['id_proof']['name'];
		$imm=$imid."-".$id_proof;

		$add_proof=$_FILES['add_proof']['name'];
		$imi=$imgi."-".$add_proof;
	
/* if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} */	
	
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
	
	
	@$emp_period_to=$emp_period_to;
	$qqu=mysqli_query($con,"select * from add_employee where employee_code='$emp_id2'");
	$rows=mysqli_num_rows($qqu);
	if($rows)
	{
	$err="<div class='alert alert-danger'>This Employee Id .$emp_id2 Already Exists..</div>";
    header('refresh:2');
	}
	else
    {
	if(sizeof(@$errors) == 0) 
	{
			$que=mysqli_query($con,"INSERT INTO `add_employee`(`employee_code`,`emp_type`,`employee_first_name`, `employee_last_name`,`emp_password`, `company_code`, `employee_city`, `employee_address`, `employee_state`, `employee_pincode`, `employee_email`, `offically_email_id`, `employee_mobile_no`, `offically_mobile_no`, `employee_department`, `employee_designation`, `employee_underwriter`, `employee_branch_name`, `joining_date`, `period_to`, `basic_amount`, `hra`, `conveyance`, `mobile_allo`, `other_allo`, `total_salary`, `employee_status`, `emp_pic`, `id_proof`, `add_proof`) 
					VALUES ('$emp_id2','$emp_type','$firstname','$lastname','$password','$company_code','$emp_city','$emp_add','$emp_state','$emp_pincode','$emp_email','$offically_email','$emp_mobileno','$offically_mobileno','$emp_department','$emp_designation','$emp_underwriter','$emp_branch_name','$emp_period_from',
					'$emp_period_to','$emp_basic_amount','$emp_hra','$emp_conveyance','$mobile_allo','$other_allo','$emp_total_salary','$emp_status','$im','$imm','$imi')");
	
	    move_uploaded_file($_FILES['image']['tmp_name'],"profile/".$im);
		move_uploaded_file($_FILES['id_proof']['tmp_name'],"documents/".$imm);
		move_uploaded_file($_FILES['add_proof']['tmp_name'],"documents/".$imi);

	
	$err="<div class='alert alert-success'>Employee Successfully Added with Employee Id= $emp_id2 and Password= $password </div>";
	header('refresh:2');
   }
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
  
  
  <!--	search-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">


  /* $(function() {
    $( "#searchid" ).autocomplete({
      source: 'search_id_name.php'
    });
  });
 */

</script>
	<!--	//search-->			
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>
<script src="js/jquery.table2excel.js"></script>
<script>
		 $(document).ready(function(){
    $("#export-btn").click(function(){
    	 $("#example1").find('[style*="display: none"]').remove();
		$("#example1").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Employee-" + Date(),
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
		    });
});
		
		</script>
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
		
function getdata()
{
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("exec_code").innerHTML=xmlhttp.responseText;
}
}
var x=document.getElementById("d1").value;
//alert(str);

xmlhttp.open("GET","insertemp.php?n="+x,true);
xmlhttp.send();
}


function showpfno(str)
{
	//var x=document.getElementById("e14").value;
	if(str==1)
	{
	
		//alert("hiiiiii");
       document.getElementById("ee256").disabled = true;
	}
	else if(str==2)
	{
		document.getElementById("ee256").disabled = false;

	}
	
}


</script>

<script type="text/javascript" language="javascript">
/*function checkfile(sender) {
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
    else return true;
}

function checkfile2(sender) {
	   
    var validExts = new Array( ".PNG",".gif",".jpeg",".jpg","png");
    var fileExt = sender.value;

    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid files are of " +
               validExts.toString() + " types.");
			   document.getElementById("uploadFile").value="";
			 
      return false;
    }
    else return true;
}*/
function ValidateFileUpload() {

var fuData = document.getElementById('uploadFile');
var FileUploadPath = fuData.value;


if (FileUploadPath == '') {
    alert("Please upload an image");

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



    if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;
			//alert(size);
			var MAX_SIZE = 1024000;
                if(size > MAX_SIZE){
                    alert("Maximum file size exceeds");
                     document.getElementById("uploadFile").value="";
		return false;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

    } 


else {
        alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
		 document.getElementById("uploadFile").value="";
		return false;
    }
}}

//validation for pdf
function ValidateFileUploadPdf() {

var fuData = document.getElementById('filedocxpdf');
var FileUploadPath = fuData.value;


if (FileUploadPath == '') {
    alert("Please upload an Pdf");

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



    if (Extension == "pdf") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;
			//alert(size);
			var MAX_SIZE = 2048000;
                if(size > MAX_SIZE){
                    alert("Maximum file size exceeds");
                     document.getElementById("filedocxpdf").value="";
		return false;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

    } 


else {
        alert("Please Upload Pdf Only ");
		 document.getElementById("filedocxpdf").value="";
		return false;
    }
}}
//validation ends
//validation for pdf2
function ValidateFileUploadPdf2() {

var fuData = document.getElementById('filedocxpdf2');
var FileUploadPath = fuData.value;


if (FileUploadPath == '') {
    alert("Please upload an Pdf");

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



    if (Extension == "pdf") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;
			//alert(size);
			var MAX_SIZE = 2048000;
                if(size > MAX_SIZE){
                    alert("Maximum file size exceeds");
                     document.getElementById("filedocxpdf2").value="";
		return false;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

    } 


else {
        alert("Please Upload Pdf Only ");
		 document.getElementById("filedocxpdf2").value="";
		return false;
    }
}}
//validation ends
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
                                    <li>Employee</li>
									<li><a href="download/download2.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Employee</span></a></li>
                                </ul>
                                <h4>Add Employee</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data" >
					<div class="row">
					<div class="col-sm-6" id="error">
					<?php echo @$errors;?>
					<?php echo @$err;?>
					</div>	
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
												<div class="col-sm-4">
											<div class="form-group">
												<label><b>Employee Type :</b><span style="color:red;">*</span> </label> 
												<select class="form-control select1"  name="emp_type"   id="e50">
													<option value="">Select Type</option>
													<option value="Full Time">Full Time</option>
													<option value="Intern">Intern</option>
													
													
													
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
                                            </div>-->                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>First Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="firstname" id="e1" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" onkeypress="return chkAplha(event,'error1')" />
                                                </div><!-- form-group -->
												<div id="error1"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Last Name :</b></label>
                                                    <input type="text" name="lastname" id="e2" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee Last Name" autocomplete="off" onkeypress="return chkAplha(event,'error2')" />
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Password :</b></label>
                                                    <input type="password" name="password" id="e01" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee password" />
                                                </div><!-- form-group -->
                                            </div>

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
                                                    <input type="text" name="emp_mobileno" style="height:35px;"  id='e3'  maxlength="10"class="form-control" onkeypress="return isNumber(event,'error3')" placeholder="Employee Contact No" />
                                                </div><!-- form-group -->
												<div id="error3"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="emp_email" style="height:35px;" id="e4"   class="form-control" onblur="return chkeid()"  placeholder="Employee Email" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Employee Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="emp_add" id="e5" style="text-transform:capitalize;" placeholder="Employee Address" onkeypress="return chekval(event)" ></textarea>
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
                                                    <input type="text" name="emp_state" id="e7" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee State"onkeypress="return chkAplha(event,'error5')" />
                                                </div><!-- form-group -->
												<div id="error5"></div>
												</div>
												 <!-- form-group --><div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Pincode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_pincode" id="e8" style="height:35px;" maxlength="6" class="form-control" onkeypress="return isNumber(event,'error6')" placeholder="Employee Pincode"/>
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
                                                    <label class="control-label"><b>Offically Contact No :</b> </label>
                                                    <input type="text" name="offically_mobileno" style="height:35px;" onkeypress="return isNumber(event,'error7')" id="e9" maxlength="10"class="form-control" placeholder="Offically Contact No"/>
                                                </div><!-- form-group -->
												<div id="error7"></div>
                                            </div>    
											
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Offically Email :</b> </label>
                                                    <input type="email" name="offically_email"style="height:35px;" id="e10" onkeypress="return chekval(event)"  class="form-control" placeholder="Offically Email"/>
                                                </div><!-- form-group -->
                                            </div>	
												<div class="col-sm-4">
											<div class="form-group">
												<label><b>Employee Reporting To :</b><span style="color:red;">*</span> </label> <!--<span style="float:right"><a href="">View Details</a></span>-->
												<select class="form-control select1" name="emp_underwriter"  class="form-control" id="e13" placeholder="Employee Underwriter" >
													<option value="">Select Reporting To</option>
													
													<?php
													while($row=mysqli_fetch_array($under_name))
													{
														$id=$row['employee_code'];
														$name=$row['employee_first_name'];
														$designation=$row['employee_designation'];
														$under_r=$row['employee_underwriter'];
													echo "<option value='$id'>[".$id."] ".$name."  [".$designation."] </option>";
													}
													
													?>
													

												</select>
											</div>
                                            </div>	
																					
						</div>
						<div class="row paddtop paddbottom">
						
											 <div class="col-sm-4">
											 <div class="form-group">
												<label><b>Employee Designation :</b><span style="color:red;">*</span> </label> <span style="float:right"><a href="" data-toggle="modal" data-target="#examModal" data-whatever="@mdo">Add Designation</a></span>
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
                                                    <label class="control-label"><b>Employee Branch Name :</b> <span style="color:red;">*</span></label><span style="float:right"><a href="" data-toggle="modal" data-target="#exaModal" data-whatever="@mdo">Add Branch</a></span>
                                                  <div id="brnh">  <select class="form-control select1" name="emp_branch_name" style="height:35px;text-transform:capitalize;"  class="form-control" id="e14" placeholder="Employee Branch">
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
						<!-- uplode -->
							<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Profile Image : </h5>
					</div>
					</div>
					<div class="row paddtop paddbottom">
											<div class="col-sm-3" style="margin-top: 48px;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Upload Image :</b> <span style="color:red;"></span></label>
                                                    <input class="form-control" id="uploadFile" onchange="return ValidateFileUpload()" type="file" name="image" class="img" accept="image/x-png,image/gif,image/jpeg" />
													<span style="color:red;">Upload Png Jpeg gif only max Size 1 mb</span></label>
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
                                                    <label class="control-label" class="col-sm-4 control-label"><b>Upload ID Proof :</b> <span style="color:red;"></span></label>
													</div>
												</div>
												
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                    
                                                    <input type="file" name="id_proof"  style="height:35px;" class="form-control" id="filedocxpdf" onchange="return ValidateFileUploadPdf()" accept="application/pdf"/>
													<span style="color:red;">Upload Pdf only max Size 2 mb</span></label>
                                                </div><!-- form-group    id="e1"-->
												</div>                           
						</div><!--  Row   -->
					<div class="row paddtop paddbottom">
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>Upload Address Proof :</b> <span style="color:red;"></span></label>
													</div>
												</div>
												
												<div class="col-sm-3 col-xs-11">
                                                <div class="form-group">
                                                    
                                                    <input type="file" name="add_proof"  style="height:35px;" class="form-control" id="filedocxpdf2" onchange="return ValidateFileUploadPdf2()"  accept="application/pdf" />
													<span style="color:red;">Upload Pdf only max Size 2 mb</span></label>
                                                </div><!-- form-group -->
												</div>                           
						</div><!--  Row   -->
						
						
						
						
						
						<!--/uplode-->
						
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Payable Details : </h5>
					</div>
					</div>
					<div class="row paddtop">
						
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Date of Joining :</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="emp_period_from" style="height:35px;"class="form-control" id="e15" placeholder="Employee Designation"/>
                                                </div><!-- form-group -->
                                            </div>
										<!--	<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Working Period :</b> </label>
                                                    <input type="date" name="emp_period_to" style="height:35px;" disabled class="form-control" id="ee256" placeholder="" />
                                                </div><!-- form-group -->
                                           <!-- </div>-->
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Basic Salary:</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_basic_amount" style="height:35px;" class="form-control" id="e17" onkeypress="return isNumber(event,'error8')" onkeyup="sum()" maxlength="7" placeholder="Amount" />
                                                </div><!-- form-group -->
												<div id="error8"></div>
                                            </div>
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>HRA  :</b></label>
                                                    <input type="text" name="emp_hra" style="height:35px;"class="form-control" id="e18" onkeypress="return isNumber(event,'error9')" onkeyup="sum()" maxlength="7" placeholder="Amount"/>
                                                </div><!-- form-group -->
												<div id="error9"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Conveyance :</b> </label>
                                                    <input type="text" name="emp_conveyance" style="height:35px;" class="form-control" id="e19" onkeypress="return isNumber(event,'errorl10')" onkeyup="sum()" maxlength="7" placeholder="Amount" />
                                                </div><!-- form-group -->
												<div id="errorl10"></div>
                                            </div>
						</div>
						<div class="row">
						
											
											
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Mobile Allowance  :</b> </label>
                                                    <input type="text" name="mobile_allo" style="height:35px;"class="form-control" id="ee19" onkeypress="return isNumber(event,'errorl11')" onkeyup="sum()" maxlength="7" placeholder="Amount"/>
                                                </div><!-- form-group -->
												<div id="errorl11"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Other Allowance :</b> </label>
                                                    <input type="text" name="other_allo" style="height:35px;" class="form-control"  id="eee19" onkeypress="return isNumber(event,'errors')" onkeyup="sum()" maxlength="7" placeholder="Amount" />
                                                </div><!-- form-group -->
												<div id="errors"></div>
                                            </div>

											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Total Salary:</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_total_salary" style="height:35px;" readonly class="form-control"  id="e20" placeholder="Amount" />
                                                </div><!-- form-group -->
                                            </div>
											 <div class="col-sm-3">
											<div class="form-group">
												<label><b>Employee Status :</b> </label> 
												<select class="form-control select1" style="height:35px;" name="emp_status" onchange="showpfno(this.value)" id="e22">
													<option value="0">Select Status</option>
													<option value="1">Active</option>
													<option value="2">Inactive</option>
												</select>
											</div>
                                            </div>
											<!--<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Target Amount :</b> </label>
                                                    <input type="number" name="emp_target_amount" style="height:35px;" id="e21"  onkeypress="return isNumber(event)" class="form-control" maxlength="7" placeholder="Employee Target Amount"/>
                                                </div><!-- form-group -->
                                           <!-- </div>-->
						</div>
						
						 
						 
						<div class="row">
											                                         										
										  <!-- form-group -->
										  
											<!--<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Target Type :</b> <span style="color:red;">*</span></label>
                                                  <div id="brnh">  <select class="form-control select1" name="employee_target_type" style="height:35px;text-transform:capitalize;"  class="form-control" id="ee25" placeholder="Employee Branch">
													<option value="">Select Type</option>
													<option>Square Feet</option>
													<option>Square Yard</option>
												</select></div>
													
                                                </div>
                                            </div>-->
											<!-- form-group -->
										 <!-- <div class="col-sm-3">
											<div class="form-group">
												<label><b>Employee Status :</b> </label> 
												<select class="form-control select1" style="height:35px;" name="emp_status" onchange="showpfno(this.value)" id="e22">
													<option value="0">Select Status</option>
													<option value="1">Active</option>
													<option value="2">Inactive</option>
												</select>
											</div>
                                            </div>-->
											<!--<div class="col-sm-3" >
                                                <div class="form-group">
                                                    <label class="control-label"><b>Interview Taken By :</b> <span style="color:red;">*</span></label>
                                                    <input class="form-control search" id="searchid" type="text" name="interviewer_name" placeholder="Interviewer Name" onkeypress="return chkAplha(event,'error')"/>
                                                     <div id="result" VALUE="<?php //echo $final_username;?>"onkeypress="return chkAplha(event,'error')">
												</div><!-- form-group -->
                                            <!--</div>
											  
                                              
                                              </div>-->
												
						</div>						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" name="submit" value="Add Employe" id="submit" class="btn btn-success button1">
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
        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
			$('#e6').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->

<!--        this is auto complete state name start    -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		
  <!--        this is auto complete state name end    -->

  <!--        this is validation on show fields start    -->
  <script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
            $('#e1,#e01,#e3,#e4,#e5,#e6,#e7,#e8,#e11,#e12,#e13,#e14,#e15,#e17,#e23,#e50').each(function () {
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
function upperCaseF(a,b,c){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

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
            <input type="text" class="form-control" style="text-transform:uppercase;" id="recipient-name" name="depart_name" id="d1" placeholder="Enter Department" onkeydown="upperCaseF(this)">
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
            <input type="text" class="form-control" style="text-transform:uppercase;" id="designation_name" placeholder="Enter Designation" name="degisnat_name" onkeydown="upperCaseF(this)>
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
            <input type="text" class="form-control" id="recipient-name" name="branch_code" style="text-transform:uppercase;" placeholder="Enter branch code" onkeydown="upperCaseF(this)>
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="control-label">Branch Name :</label>
            <input type="text" class="form-control" id="recipient-name" name="branch_name" style="text-transform:uppercase;"  placeholder="Enter branch Name" onkeydown="upperCaseF(this)>
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

