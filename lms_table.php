<?php 
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
$user_id=$_SESSION['username'];
date_default_timezone_set('Asia/Kolkata');
$curdate1=date("m");

//echo $user_id;
$id;
$lead_type= "";
	$cust_name ="" ;
	$cust_no = "";
	$cust_alter_no  = "";
	$cust_mail = "";
	$cust_add= "";
	$cust_city = "";
	$cust_state = "";
	$cust_pin = "";
	$title = "";
include('config.php');
error_reporting(0);
extract($_POST);
$que1=mysqli_query($con,"select * from temp where lead_by = '$user_id' ORDER BY lead_id DESC");
if ($ress=mysqli_fetch_array($que1))
{
	$ress['lead_id'];
	$ress['lead_type'];
	$ress['customer_name'];
	$ress['customer_no'];
	$ress['customer_alter_no'];
	$ress['customer_email'];
	$ress['customer_add'];
	$ress['customer_city'];
	$ress['customer_state'];
	$ress['customer_pincode'];


}
if($ress['customer_name'] != "" )
{
     $id = $ress['lead_id'];
	 $lead_type = $ress['lead_type'];
	 $cust_name = $ress['customer_name'];
	 $cust_no = $ress['customer_no'];
	 $cust_alter_no = $ress['customer_alter_no'];
	 $cust_mail = $ress['customer_email'];
	 $cust_add = $ress['customer_add'];
	 $cust_city = $ress['customer_city'];
	 $cust_state = $ress['customer_state'];
	 $cust_pin = $ress['customer_pincode'];
	
}

// First UPDATE Button
/*if(isset($_POST['Csub']))
{
	mysqli_query($con, "INSERT INTO temp(lead_id,lead_type,customer_name,customer_no,customer_alter_no,customer_email,customer_add,customer_city,customer_state,customer_pincode,lead_by)VALUES('','$chk','$customer_name','$customer_no','$customer_alter_no','$customer_email','$customer_add','$customer_city','$customer_state','$customer_pincode','$user_id')");
	echo "<script>alert ('Data Updated Sucessfully');</script>";
}
*/

//                       submit buttom start
if(isset($submit))
{
	//validation start
	if (!ctype_alpha(str_replace(array("'", "-"), "",$cust_name))) { 
			$errors = 'First name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", "-"), "",$title))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$cust_city))) { 
			$errors = 'City should be alpha characters only.';
}	

if (!ctype_alpha(str_replace(array("'", " "), "",$cust_state))) { 
			$errors = 'State should be alpha characters only.';
}	
# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($cust_mail, FILTER_VALIDATE_EMAIL)) { 
			$errors = 'Enter a valid email address.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($cust_no) OR strlen($cust_no) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($cust_alter_no) OR strlen($cust_alter_no) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Pin Code #
		// if phone is invalid, throw error
		if (!ctype_digit($cust_pin) OR strlen($cust_pin) != 6) {
			$errors = 'Enter a valid pin Code.';
		}

	//validation ends
if(sizeof(@$errors) == 0) 
	{
  
	if(@$sales_associate!=""||@$sales_subassociate!="")
	{
		
		mysqli_query($con,"INSERT INTO lms_table(lead_id,lead_type,customer_name,customer_no,customer_alter_no,customer_email,customer_add,customer_city,customer_state,customer_pincode,sales_executive,sales_executive_code,sales_manager,sales_manger_code,sales_zsh,sales_zsh_code,sales_vp,sales_vp_code,sales_director,sales_director_code,sales_associate,sales_associate_code,sales_subassociate,sales_subassociate_code,required_property_type,property_required_location,cutomer_budget_min,cutomer_budget_max,lead_source,title,lead_status,lead_by,Date) 
		                                 VALUES ('','$lead_type','$cust_name','$cust_no','$cust_alter_no','$cust_mail','$cust_add','$cust_city','$cust_state','$cust_pin','$sales_executive','$sales_exective_code','$sales_manger','$sales_manger_code','$sales_zsh','$sales_zsh_code','$sales_vp','$sales_vp_code','$sales_director','$sales_director_code','$sales_associate','$sales_associate_code','$sales_subassociate','$sales_subassociate_code','$required_property_type','$property_required_location','$customer_budget_min','$customer_budget_max','$lead_source','$title','$lead_status','$user_id','$curdate1')");
		mysqli_query($con,"delete from `temp` WHERE lead_by = '$user_id'");
			$err="<div class='alert alert-success'>Lead Information Successfully Genrated...</div>";
			header('refresh:2');
			//property_category,
			//,'$property_category'
	}
	else
	{
	    	
	mysqli_query($con,"INSERT INTO lms_table(lead_id,lead_type,customer_name,customer_no,customer_alter_no,customer_email,customer_add,customer_city,customer_state,customer_pincode,sales_executive,sales_executive_code,sales_manager,sales_manger_code,sales_zsh,sales_zsh_code,sales_vp,sales_vp_code,sales_director,sales_director_code,required_property_type,property_required_location,cutomer_budget_min,cutomer_budget_max,lead_source,title,lead_status,lead_by,Date)  
		                                     VALUES('','$chk','$cust_name','$cust_no','$cust_alter_no','$cust_mail','$cust_add','$cust_city','$cust_state','$cust_pin','$sales_executive','$sales_exective_code','$sales_manger','$sales_manger_code','$sales_zsh','$sales_zsh_code','$sales_vp','$sales_vp_code','$sales_director','$sales_director_code','$required_property_type','$property_required_location','$customer_budget_min','$customer_budget_max','$lead_source','$title','$lead_status','$user_id','$curdate1')"); 
	mysqli_query($con,"delete from `temp` WHERE lead_by = '$user_id'");
			$err="<div class='alert alert-success'>Lead Information Successfully Genrated...</div>";
			header('refresh:2');
	}
	}
}
//                  submit button end
//,customer_email,customer_add,customer_city,customer_state,customer_pincode,sales_executive,sales_executive_code,sales_manager,sales_manger_code,sales_zsh,sales_zsh_code,sales_vp,sales_vp_code,sales_director,sales_director_code,required_property_type,property_category,property_required_location,cutomer_budget_min,cutomer_budget_max,lead_source,lead_status
//,'$customer_email','$customer_add','$customer_city','$customer_state','$customer_pincode','$sales_executive','$sales_exective_code','$sales_manger','$sales_manger_code','$sales_zsh','$sales_zsh_code','$sales_vp','$sales_vp_code','$sales_director','$sales_director_code','$required_property_type','$property_category','$property_required_location','$customer_budget_min','$customer_budget_max','$lead_source','$lead_status'




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

			<script src="js/jquery-1.11.1.min.js"></script>
			

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		<script>
		function chkeid()
{
var e=document.getElementById("l6").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<3 || dotpos<atpos+3)
{
 //alert("Invalid Email Format");
  document.getElementById('l6').style.borderColor="red";
}
else
{
	document.getElementById('l6').style.borderColor="green";
document.getElementById("error").innerHTML="";
}
}

function isNumber(evt,errn) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            //alert("Please enter only Numbers.");
           document.getElementById(errn).innerHTML="<font color='red'>It must be contain Number only</font>";
			return false;
        }
else
{
		
        document.getElementById(errn).innerHTML=" ";
    }
}
	
function ShowData(str)
{

$("#show2").load('executive_ajax.php?id='+str);

}

function selmanager(str)
{

$("#show3").load('executive_ajax1.php?id='+str);

}
function selzsh(str)
{

$("#show4").load('executive_ajax2.php?id='+str);

}
function selvp(str)
{

$("#show5").load('executive_ajax3.php?id='+str);

}
function seldirector(str)
{

$("#show10").load('executive_ajax4.php?id='+str);

}

function datas(str)
{
$("#auto9").load('executive_ajax9.php?id='+str);
$("#auto10").load('executive_ajax10.php?id='+str);
$("#auto11").load('executive_ajax11.php?id='+str);
}

				//         check box validation

function check()
 {
	 
    if (document.getElementById('chk1').checked==true) 
	{
		//alert("sanjay");
       // document.getElementById('hide').style.visibility = 'hidden';
	    document.getElementById('hide').style.display = 'none';
    }
	else
	{
        //document.getElementById('hide').style.visibility = 'visible';
		 document.getElementById('hide').style.display = 'block';
    }
 }
 
/* function check()
{

	if(document.getElementById("chk1").checked==true)
	{
document.getElementById("l21").disabled=true;
document.getElementById("l22").disabled=true;
document.getElementById("l23").disabled=true;
document.getElementById("l24").disabled=true;

}
 
else{
document.getElementById("l21").disabled=false;
document.getElementById("l22").disabled=false;
document.getElementById("l23").disabled=false;
document.getElementById("l24").disabled=false;
if(document.getElementById("chk2").checked==true)
{
	alert("Please Select Sales Associate Allocation Details..");
}

}
		
} */


function moveTo()
 {
	 //alert(document.getElementById('d1').value);
	 var x=document.getElementById('d1').value;
    if(x=="close")
	{		//return false;
    window.location='provisional_quotation_form.php';
	}
}

function click1(str)
 {
	 //alert(document.getElementById('d1').value);
	 //var x=document.getElementById('d1').value;
	// alert(str);
	$("#auto99").load('add_category.php?id='+str);

    
}
</script>
<script type="text/javascript">
function chkAplha(event,err)
	{
		if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8 || event.which==32))
		{
			 //alert("Please enter character only.");
			 /*document.getElementById('l3').style.borderColor = "red";
			 document.getElementById('l8').style.borderColor = "red";
			 document.getElementById('l9').style.borderColor = "red";*/
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
<script>
$(document).ready(function() {
    $('#showmenu').click(function() {
            $('#menu').toggle("slide");
    });
});
</script>
<script>
$(document).ready(function() {
    $('#showmenua').click(function() {
            $('#menua').toggle("slide");
    });
});
</script>
<script>
$(document).ready(function() {
    $('#showmenub').click(function() {
            $('#menub').toggle("slide");
    });
});
</script>
<script>
$(document).ready(function() {
    $('#showmenuc').click(function() {
            $('#menuc').toggle("slide");
    });
});
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
                               <a href="lms_table.php"> <i class="fa fa-bars"></i></a>
                            </div>

                            <div class="media-body">

                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
									 <li><a href="admindashboard_lms.php">Home</a></li>
                                    <li>LMS Table</li>
									<li><a href="download/download3.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export LMS Details</span></a></li>
                                </ul>

                                <h4 class="plus">LMS Table</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" >
					<div class="row">
					<div class="col-sm-6 text" id="error"><?php echo @$err;?></div>
					</div>
					<div class="row">
<div class="col-md-2 col-sm-3">
<div class="form-group">
<label class="control-label"><b>Lead Type :</b> <span style="color:red;">*</span></label>
</div>
</div>

<div class="col-md-2 col-sm-3 leadtype">
<div class="radio"><label><input type="radio" name="chk" required onchange="check()" class="chkl" id="chk1" value="Direct Sales" <?php echo ($lead_type=='Direct Sales')?'checked':'' ?>> Direct Sales <span style="color:red;">*</span></label></div>  
</div>
<div class="col-md-2 col-sm-3 leadtype">
<div class="radio"><label><input type="radio" name="chk" required id="chk2" onchange="check()" class="chkl" value="Channel Sales" <?php echo ($lead_type=='Channel Sales')?'checked':'' ?>> Channel Sales </label></div> 
</div><!-- form-group -->
					</div>
                    
					
				<div class="m-b">
					<div class="col-sm-12" style="background-color:#428BCA;" id="showmenu" >
					<h5 style="color:white;font-weight:bold;font-size:14px; padding-top:15px; padding-bottom:15px;margin:0;">Customer Details : </h5>
				    </div>
                        <div class="clearfix"></div>
					    <div class="white-bg clearfix" id="menu" style="display: none;">
                        <div class="row paddtop">
                         <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_name" style="height:35px;text-transform:capitalize;" id="l3" class="form-control" placeholder="Customer Name" required onkeypress="return chkAplha(event,'error1')" value="<?php echo $cust_name; ?>"/>
													<input type="hidden" value="<?Php echo $user_id; ?>" id="l0">
                                                </div><!-- form-group -->
												<div id="error1"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_no" style="height:35px;" onkeypress="return isNumber(event,'error4')" maxlength="12"  id="l4" class="form-control" value="<?php echo $cust_no; ?>" required placeholder="Customer Contact No."/>
                                                </div><!-- form-group -->
												<div id="error4"></div>
                                            </div><!-- col-sm-6 --> 
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Alternate Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_alter_no" style="height:35px;" onkeypress="return isNumber(event,'error5')" id="l5" maxlength="12"class="form-control"  value="<?php echo $cust_alter_no; ?>"  placeholder="Alternate Contact No."/>
                                                </div><!-- form-group -->
												<div id="error5"></div>
                                            </div>	
												
						</div>
						<div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" required name="customer_email" id="l6" style="height:35px;" onblur="chkeid()" class="form-control" value="<?php echo $cust_mail; ?>" placeholder="Customer Email" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Customer Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" required style="text-transform:capitalize;" name="customer_add" id="l7"  placeholder="Customer Address" onkeypress="return chekval(event)" ><?php echo $cust_add; ?></textarea>
												</div>
                                                </div><!-- col-sm-6 -->   
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_city" id="l8" style="height:35px;"  class="form-control" placeholder="Customer City" autocomplete="off" data-country="in" value="<?php echo $cust_city;?>" required onkeypress="return chkAplha(event,'error2')" />
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div>
						</div>
						<div class="row paddbottom">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_state" id="l9" style="height:35px;"  class="form-control" placeholder="Customer State"  required value="<?php echo $cust_state;?>"onkeypress="return chkAplha(event,'error3')" />
                                                </div><!-- form-group -->
												<div id="error3"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer PinCode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_pincode" id="l10" required style="height:35px;" maxlength="6" onkeypress="return isNumber(event,'error6')" class="form-control" value="<?php echo $cust_pin; ?>" placeholder="Customer Code"/>
                                                </div><!-- form-group -->
												<div id="error6"></div>
                                            </div>
<div class="col-sm-4">
<div class="form-group" style="margin:15px 0 0;float:right;">
<input type="button" class="button1" name="Csub" id="update" onclick="" value="UPDATE" data-toggle="button" aria-pressed="false" autocomplete="off">
</form>
</div><!-- form-group -->
</div>
													
						</div>
                        </div>
                        </div>
						
					<div class="m-b">
					<form method="post">	
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA"  id="showmenua">
					<h5 style="padding-top:15px; padding-bottom:15px;margin:0;"> Lead Allocation : </h5>
					</div>	
                        <div class="clearfix"></div>
               <div class="white-bg clearfix" id="menua" style="display: none;">
                <div id="show2">
                <div id="show3">
                <div class="row text paddtop">
                <div class="col-sm-3 ">
                <div class="form-group text">
                <label><b>Sales Executive :</b> <span style="color:red;">*</span></label>

                <select class="form-control select1 "  name="sales_executive" onChange="ShowData(this.value)" id="l19" >
                <option selected value="">Select Executive</option>
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




                <!--   this is the conatiner    -->

                <div class="col-sm-3" >
                <div class="form-group" >
                <label class="control-label"><b>Sales Executive Code :</b> <span style="color:red;">*</span></label>
                <input type="text" name="sales_exective_code" readonly id="exec_code" class="form-control" value="<?php echo $empid; ?>" placeholder="Sales Executive Code"/> 
                </div><!-- form-group -->
                </div>



                <div class="col-sm-3">
                <div class="form-group">
                <label><b>Sales Manager :</b> <span style="color:red;">*</span></label>
                <div id="auto1"><select class="form-control select1"  name="sales_manger" onChange="selmanager(this.value)" id="l17">
                <option selected value="">Select Manager</option>
                <?php
                $que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%manager%'");
                while($r=mysqli_fetch_array($que))
                {
                $empid=$r['employee_code'];
                echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
                }
                ?>
                </select></div>

                </div>
                </div>

                <div class="col-sm-3">
                <div class="form-group">
                <label class="control-label"><b>Sales Manager Code :</b> <span style="color:red;">*</span></label>
                <div id="auto1"><select class="form-control select1"  readonly  name="sales_manger_code" id="l18">


                </select></div>



                </div><!-- form-group -->
                </div><!-- col-sm-6 --> 
      
                </div>
                <div id="show4">
                <div id="show5">
                <div class="row">                  
                <div class="col-sm-3">
                <div class="form-group">
                <label><b>Sales ZSH :</b> <span style="color:red;">*</span></label>
                <select class="form-control select1"  name="sales_zsh" onChange="selzsh(this.value)" id="l15">
                <option selected value="">Select ZSH</option>	
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
                <div class="col-sm-3">
                <div class="form-group">
                <label class="control-label"><b>Sales ZSH Code :</b> <span style="color:red;">*</span></label>
                <div id="auto1"><select class="form-control select1" name="sales_zsh_code" readonly  id="l16">

                </select></div>

                </div><!-- form-group -->
                </div>	



                <div class="col-sm-3">
                <div class="form-group">
                <label><b>Sales VP :</b> <span style="color:red;">*</span></label>
                <select class="form-control select1"  name="sales_vp" onChange="selvp(this.value)" id="l13">
                <option selected value="">Select VP</option>
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
                <div class="col-sm-3">
                <div class="form-group">
                <label class="control-label"><b>Sales VP Code :</b> <span style="color:red;">*</span></label>
                <select class="form-control select1"  name="sales_vp_code" id="l14" readonly>


                </select>

                </div><!-- form-group -->
                </div><!-- col-sm-6 --> 												
                </div>

                <div id="show10">
                <div class="row paddbottom">
                <div class="col-sm-3">
                <div class="form-group">
                <label><b>Sales Director :</b> <span style="color:red;">*</span></label>
                <select class="form-control select1"  style="height:35px;" name="sales_director" onChange="seldirector(this.value)" id="l11">
                <option selected value="">Select Director</option>
                <?php
                $que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%director%'");
                while($r=mysqli_fetch_array($que))
                {
                $empid=$r['employee_code'];
                echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
                }
                ?>

                </select>

                </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                <label class="control-label"><b>Sales Director Code :</b> <span style="color:red;">*</span></label>
                <select class="form-control select1"  readonly name="sales_director_code"  id="l12">
                </select>
                </div><!-- form-group -->
                </div><!-- col-sm-6 -->   									
<div class="col-sm-offset-3 col-sm-3">
<div class="form-group" style="margin:15px 0 0;float:right;">
<!--<input type="submit" class="button1" name="leadsub" id="submit" value="UPDATE">-->
</div><!-- form-group -->


</div>		

	


                </div>
                </div>
                </div>
   
                </div>
                </div><!-- executive her -->
                </div>
                </div>  									
                </div>  									
				
                <div class="m-b">	
			
				<div id="hide">
				<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA" id="showmenub">
				<h5 style="padding-top:15px; padding-bottom:15px;margin:0;">Sales Associate Allocation Details : </h5>				
				</div>
                    <div class="clearfix"></div>
                <div class="white-bg clearfix" id="menub" style="display: none;">
				<div class="row paddtop paddbottom">
                                            <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Associate :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1"  style="height:35px;" name="sales_associate" onChange="datas(this.value)" id="l21">
													<option value="">Select Associate</option>
												<?php
													$que=mysqli_query($con,"select * from add_employee where employee_designation LIKE '%associate%'");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']." ".$r['employee_last_name']."</option>";
														
														
														
														/* $empid=$r['emp_code'];
														echo "<option value='$empid'>".$r['firstname']." ".$r['lastname']."</option>"; */
													} 
													//add_associate_employee where emp_designation
													
													?>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Associate Code :</b> <span style="color:red;">*</span></label>
                                               <div id="auto9"> <input type="text" name="sales_associate_code" style="height:35px;" id="l22" class="form-control" readonly placeholder="Sales Associate Code"/></div>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->    
												<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Subassociate :</b> <span style="color:red;">*</span></label>
												<div id="auto10"><select class="form-control select1" style="height:35px;" name="sales_subassociate" id="l23">
													<option value="">Select Subassociate</option>
													
												</select></div>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Subassociate Code :</b> <span style="color:red;">*</span></label>
                                                  <div id="auto11">  <input type="text" readonly name="sales_subassociate_code" style="height:35px;" id="l24" class="form-control" placeholder="Sales Subassociate Code"/></div>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->   
						</div>
				</div>
				</div>
				</div>
						
					<div class="m-b">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA;" id="showmenuc">
					<h5 style="padding-top:15px; padding-bottom:15px;margin:0;"> Customer Requirement Details : </h5>
					</div>
                        <div class="clearfix"></div>
						<div class="white-bg clearfix" id="menuc" style="display: none;">
						 <div class="row paddtop">
						 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Property Type :</b> <span style="color:red;">*</span></label>
												<div id="so1">	<select class="form-control select1" required name="required_property_type" onchange="click1(this.value)" id="l25">
														<option value="">Select Property</option>
														<?php 
														$qu1=mysqli_query($con,"select * from add_property_type");
														while($rw1=mysqli_fetch_array($qu1))
															{
																$name=$rw1['property_type'];
																$id=$rw1['property_id'];

														?>
														<option value= "<?php echo $id; ?>"> <?php echo  $name; ?></option>	
														<?php } ?>
													</select></div>
													<!--<span style="float:left;padding-top:5px"><a href="" data-toggle="modal" data-target="#examModal" data-whatever="@mdo">Add Property</a></span> -->
                                                </div><!-- form-group -->

                                            </div>
											
											 <div class="col-sm-3">
											 <div id="auto99">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Property Category :</b> <span style="color:red;">*</span></label>
												<div id="so1">	<select class="form-control select1" required name="property_category" id="ll25">
														<option value="">Select Category</option>
																												
													</select></div>
												<!--	<span style="float:left;padding-top:5px"><a href="" data-toggle="modal" data-target="#examModal2" data-whatever="@mdo">Add Category</a></span> -->
                                                </div><!-- form-group -->

                                            </div>
											</div>
											<div class="col-sm-3">
											
                                                <div class="form-group">
                                                    <label class="control-label"><b>Lead Source :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="lead_source" required style="height:35px;text-transform:capitalize;" id="l88" class="form-control" placeholder="Lead Source" onkeypress="return chekval(event)"/>
                                               	
												</div><!-- form-group -->
												 
											
                                            </div>
											
											<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Lead Status :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" required style="height:35px;" onchange="moveTo(this.value)" name="lead_status" id="d1">
													<option value=""  selected="selected">Select Status</option>
													<option value="1">Hot </option>
													<option value="2">Warm</option>
													<option value="close">Close</option>
													<option value="4">Follow UP</option>
												</select>
											</div><!-- form-group -->
                                            </div>
											
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Property Location :</b> <span style="color:red;">*</span></label>										
													<div id="so2"><select class="form-control select1" required name="property_required_location" id="l26">
														<option value="">Select Location</option>
														<?php 
														$qu2=mysqli_query($con,"select * from add_property_location");
														while($rw2=mysqli_fetch_array($qu2))
															{
																$name=$rw2['property_location'];
														?>
														<option value="<?php echo $name; ?>"><?php echo $name; ?></option>	
														<?php } ?>
													</select></div>
															<span style="float:left;padding-top:5px"><a href="" data-toggle="modal" data-target="#examModal1" data-whatever="@mdo">Add Location</a></span>
                                                </div><!-- form-group -->
												
                                            </div>		
								           <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Title:</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="title" required style="height:35px;text-transform:capitalize;" id="l89" class="form-control" placeholder="Title"  onkeypress="return chekval(event)" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Budget  :</b> <span style="color:red;">*</span></label>
													<div class="row">
													<div class="col-sm-3">
                                                    <input type="text" name="customer_budget_min" required id="l77" style="height:35px;" onkeypress="return isNumber(event)" class="form-control" placeholder="Min" onkeypress="return chekval(event)"/>
														</div>	
													<div class="col-sm-3">

													<input type="text" name="customer_budget_max" required id="l87" style="height:35px;" onkeypress="return isNumber(event)" class="form-control" placeholder="Max" onkeypress="return chekval(event)" />
													</div>
													</div>
												</div><!-- form-group -->
                                            </div>
											
											
                                            
											<!-- col-sm-6 --> 
																				
						</div>						
                        <div class="row">
                        <div class="col-sm-offset-4 col-sm-4 ">
                        <input type="submit" class="button1" name="submit" id="submit" value="Submit">
                        <button type="reset" class="resetbutt">Reset All</button>
                        </div>
                        </div>
						</div>
						</div>
                        
                    </div><!-- contentpanel -->
					</form>
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
		
		
		
<!-- Modal for Add Designation start -->
<div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="property_form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Required Property Type :</label>
            <input type="text" class="form-control" style="text-transform:capitalize;" id="property_name" placeholder="Property Name " name="required_property">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_property">Add Property</button>
       
      </div>
	   </form>
    </div>
  </div>
</div>

<!-- Modal for Add Designation End -->

<!-- Modal for Add Designation start -->
<div class="modal fade" id="examModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="location_form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Property Required Location :</label>
            <input type="text" class="form-control" style="text-transform:capitalize;" id="location_name" placeholder="Location Name" name="property_location">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_property_location">Add Property Location</button>
       
      </div>
	   </form>
    </div>
  </div>
</div>

<!-- Modal for Add Designation End -->

<!-- Modal for Add Designation start -->
<div class="modal fade" id="examModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="location_form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Add Category :</label>
            <input type="text" class="form-control" style="text-transform:capitalize;" id="category_name" placeholder="Category Name" name="cate">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_property_location">Add Category</button>
       
      </div>
	   </form>
    </div>
  </div>
</div>

<!-- Modal for Add Designation End -->


        <script src="js/jquery-1.11.1.min.js"></script>
		
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script src="js/jquery.city-autocomplete.js"></script>

		
		<!--        this is auto complete city name start    -->
		<script>
			$("#l8").cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->
	


	<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
			
            $('#l3,#l4,#l5,#l6,#l7,#l8,#l10,#l9,#l77,#l87,#l25,#l26,#l88,#d1,#l19,#ll25').each(function () {
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

	 //      Add Required Property Type  
	  
	   $(function () {

        $('#add_property').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'add_property.php',
            data: $('form').serialize(),
            success: function (str) {
			alert(str);
			$('#so1').load('add_property_ajax.php');
			// $("#exampleModal").model('toggle');
            }
          });

        });

      });
	  
	   //      Add Required Property Type  
	  
	   $(function () {

        $('#add_property_location').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'add_property_location.php',
            data: $('form').serialize(),
            success: function (str) {
			alert(str);
			$('#so2').load('add_property_location_ajax.php');
			// $("#exampleModal").model('toggle');
            }
          });

        });

      });
		</script>
<!-- Script for submit the customer details -->
		<script>
$(document).ready(function(){
	$("#update").click(function(){
		//var chk1 = $(".chkl").val();
		var chk1 = $('input[name="chk"]:checked').val();
		var user_id = $("#l0").val();
		var name = $("#l3").val();
		var contact = $("#l4").val();
		var acontact = $("#l5").val();
		var mail = $("#l6").val();
		var Add = $("#l7").val();
		var city = $("#l8").val();
		var state = $("#l9").val();
		var pin = $("#l10").val();
		//alert(chk1);
		var dataString =  '&chk1=' + chk1 + '&user_id=' + user_id + '&name=' + name + '&contact=' + contact + '&acontact=' + acontact + '&mail=' + mail + '&Add=' + Add + '&city=' + city + '&state=' + state + '&pin=' + pin ;
		if(chk1 =='' || name =='' || contact =='' || acontact =='' || mail =='' || Add =='' || city =='' || state =='' || pin =='' )
		{
			alert("Please Fill All Fields");
		}
		else{
		$.ajax({
			type: "POST",
			url: "lms_table_submit.php",
			data: dataString,
			cache: false,
			success: function(result){
				alert(result);
			}
		})
		}
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

?>