<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');
extract($_POST);
$under_name=mysqli_query($con,"select * from add_associate_employee");
if(isset($submit))
{
	//validation start
	if (!ctype_alpha(str_replace(array("'", "-"), "",$firstname))) { 
			$errors = 'First name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", "-"), "",$lastname))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$ass_city))) { 
			$errors = 'City should be alpha characters only.';
}	

if (!ctype_alpha(str_replace(array("'", " "), "",$ass_state))) { 
			$errors = 'State should be alpha characters only.';
}	
# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($ass_email, FILTER_VALIDATE_EMAIL)) { 
			$errors = 'Enter a valid email address.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($ass_mobileno) OR strlen($ass_mobileno) != 10) {
			$errors = ' Enter a valid phone number.';
		}
# Validate Pin Code #
		// if phone is invalid, throw error
		if (!ctype_digit($ass_pincode) OR strlen($ass_pincode) != 6) {
			$errors = 'Enter a valid pin Code.';
		}
	//validation ends
	
	$qqu=mysqli_query($con,"select * from add_associate_employee where ass_code='$ass_code'");
	$rows=mysqli_num_rows($qqu);
	if($rows)
	{
	$err="<div class='alert alert-danger'>Associate Employee Id .$ass_code Already Exists...</div>";

	}
	elseif($firstname!=""||$lastname!=""||$ass_code!=""||$ass_city!="")
{
		if(sizeof(@$errors) == 0) 
	{
			$que=mysqli_query($con,"INSERT INTO add_associate_employee(ass_code,firstname,lastname,ass_mobileno,ass_email,ass_add,ass_city,ass_state,ass_pincode,ass_pan,emp_underwriter,emp_period_from,emp_period_to,ass_status) VALUES ('$ass_code','$firstname','$lastname','$ass_mobileno','$ass_email','$ass_add','$ass_city','$ass_state','$ass_pincode','$ass_pan','$emp_underwriter','$emp_period_from','$emp_period_to','$ass_status')");
	$err="<div class='alert alert-success'>Associate Successfully Added with Associate Id .$ass_code...</div>";
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
		    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="css/jquery.gritter.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/city-autocomplete.css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>

			<!--    This is the offline CSS File           <link href="css/style.default.css" rel="stylesheet">      -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		
		
		<script>
		function sum() {
      var txtFirstNumberValue = document.getElementById('e17').value;
      var txtSecondNumberValue = document.getElementById('e18').value;
	  var txtthirdNumberValue = document.getElementById('e19').value;

      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue)+parseInt(txtthirdNumberValue);
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

function showdetails(str)
{
	$("#auto1").load("associate_ajax.php?id="+str);
	$("#auto2").load("associate_ajax1.php?id="+str);
	$("#auto3").load("associate_ajax2.php?id="+str);
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
                               <a href="add_associate.php"> <i style="color:white"  class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i  class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Add Associate</li>
									<li><a href="download/download5.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Associate</span></a></li>
                                </ul>
                                <h4>Add Associate</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post">
					<div class="row">
					<div class="col-sm-6" id="error">
					<?php echo @$errors;?>
					<?php echo @$err;?>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Associate Details : </h5>
					</div>
					</div>
                        <div class="row paddtop paddbottom">
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_code" id="e0" style="height:35px;"  class="form-control" placeholder="Employee Code" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>First Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="firstname" id="e1" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" onkeypress="return chkAplha(event,'error1')" />
                                                </div><!-- form-group -->
												<div id="error1"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Last Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="lastname" id="e2" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee Last Name" onkeypress="return chkAplha(event,'error2')" />
                                                </div><!-- form-group -->
												<div id="error2"></div>
                                            </div>
											

						</div><!--  Row   -->
						
									


				<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Associate Personal Details : </h5>
					</div>
					</div>
					<div class="row paddtop">
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate Contact No :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_mobileno" style="height:35px;"  id='e3' maxlength="12"class="form-control" onkeypress="return isNumber(event,'error3')" placeholder="Employee Contact No" />
                                                </div><!-- form-group -->
												<div id="error3"></div>
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="ass_email" style="height:35px;" id="e4" onblur="chkeid()"  class="form-control" placeholder="Employee Email" onkeypress="return chekval(event)" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Associate Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="ass_add" style="text-transform:capitalize;" id="e5" placeholder="Employee Address"onkeypress="return chekval(event)" ></textarea>
												</div>
                                                </div>
											                                        
						</div><!--  Row   -->
						<div class="row">
											                                         										
										  
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_city" id="e6" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee City" autocomplete="off" data-country="in" onkeypress="return chkAplha(event,'error4')"/>
                                                </div>
												<div id="error4"></div>
												</div>
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_state" id="e7" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee State" onkeypress="return chkAplha(event,'error5')"/>
                                                </div><!-- form-group -->
												<div id="error5"></div>
												</div>
												 <!-- form-group --><div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate Pincode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_pincode" id="e8" style="height:35px;" maxlength="8" class="form-control" onkeypress="return isNumber(event,'error6')" placeholder="Employee Pincode"/>
                                                </div>
												<div id="error6"></div>
												</div>
						</div>
						<div class="row paddbottom">
											                                         										
										  
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Associate PAN :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="ass_pan" id="e9" style="height:35px;" class="form-control" placeholder="Employee PAN"/>
                                                </div>
												</div>
												
						</div>
						
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Associate Allocation : </h5>
					</div>
					</div>
						
						
												 
						<div class="row paddtop">
									<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>From Date:</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="emp_period_from" style="height:35px;"class="form-control" id="e14" placeholder="Employee Designation"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>To Date :</b></label>
                                                    <input type="date" name="emp_period_to" style="height:35px;" class="form-control" id="e15" placeholder="" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											 <div class="form-group">
												<label><b>Associate UnderWriter:</b><span style="color:red;">*</span> </label>
												<select class="form-control select1"  name="emp_underwriter" class="form-control" onchange="showdetails(this.value)" id="e13">
													<option value="">Select UnderWriter</option>
													<?php
													$q=mysqli_query($con,"select * from add_employee where employee_status='1'");
													while($row=mysqli_fetch_array($q))
													{
													$emp_id=$row['employee_code'];
													$designation=$row['employee_designation'];
													$underwriter=$row['employee_underwriter'];
													echo "<option value='$emp_id'>[".$emp_id."] ".$row['employee_first_name']." ".$row['employee_last_name'].'['.$designation."] [".$underwriter."]</option>";
													}
													
													?>
													
												</select>
											</div>
											</div>
																										                                         										
										  <!-- form-group -->					
						</div>		
<div class="row">
<div class="col-sm-4">
											<div class="form-group">
												<label><b>Associate Status :</b> </label> 
												<select class="form-control select1" style="height:35px;" name="ass_status" id="e16">
													<option value="">Select Status</option>
													<option value="1">Active</option>
													<option value="2">Disabled</option>
												</select>
											</div>
                                            </div>
</div>						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" name="submit" value="Save" id="submit" class="btn btn-success button1">
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


        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
			$('#e6').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->

		<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
            $('#e0,#e1,#e2,#e3,#e4,#e5,#e6,#e7,#e8,#e9,#e10,#e11,#e12,#e13,#e14').each(function () {
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
        <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Department Name :</label>
            <input type="text" class="form-control" id="recipient-name" name="depart_name" id="d1" placeholder="Enter Department">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" onclick="getdata()" name="add_department" value="Add Department"/>
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
        <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Designation Name :</label>
            <input type="text" class="form-control" id="recipient-name"placeholder="Enter Designation" name="degt_name">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add_designation" value="Add Designation"/>
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
            <input type="text" class="form-control" id="recipient-name"placeholder="Enter branch code">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="control-label">Branch Name :</label>
            <input type="text" class="form-control" id="recipient-name"placeholder="Enter branch Name">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add Branch</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Add branch End -->



    </body>
</html>

