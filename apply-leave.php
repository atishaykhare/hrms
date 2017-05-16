<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');
extract($_POST);
$under_name=mysqli_query($con,"select * from add_employee");
if(isset($submit))
{
	//validation Start
if (!ctype_alpha(str_replace(array("'", "-"), "",$emp_name))) { 
			$errors = 'First name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$emp_lname))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_digit($casual_leave)) {
			$errors = ' Enter a valid Casual Leave.';
		}
		if (!ctype_digit($earned_Leave) ) {
			$errors = ' Enter a valid errend Leave.';
		}
		if (!ctype_digit($patenity_leave)) {
			$errors = ' Enter a valid patenity leave.';
		}
		if (!ctype_digit($sick_leave)) {
			$errors = ' Enter a valid Sick leave.';
		}
# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($landline_no) OR strlen($landline_no) != 10) {
			$errors = ' Enter a valid phone number.';
		}
		if (!ctype_alpha(str_replace(array("'", " "), "",$approve_autho))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$approver_name))) { 
			$errors = 'Last name should be alpha characters only.';
}	
if (!ctype_alpha(str_replace(array("'", " "), "",$reason))) { 
			$errors = 'Last name should be alpha characters only.';
}	

if (!ctype_alpha(str_replace(array("'", " "), "",$remark))) { 
			$errors = 'Last name should be alpha characters only.';
}	
//validation ends
	if(sizeof(@$errors) == 0) 
	{
			$que=mysqli_query($con,"INSERT INTO `apply_leave`(`leave_id`, `emp_code`, `emp_name`,`emp_lname`, `emp_department`, `emp_designation`, `present_date`, `casual_leave`, `earned_Leave`, `patenity_leave`, `sick_leave`, `leave_type`, `from_date`, `to_date`, `total_days`, `landline_no`, `approve_autho`, `approver_name`, `reason`, `leave_address`, `remark`)
			VALUES ('','$emp_code','$emp_name','$emp_lname','$emp_department','$emp_designation','$present_date','$casual_leave','$earned_Leave','$patenity_leave','$sick_leave','$leave_type','$from_date','$to_date','$total_days','$landline_no','$approve_autho','$approver_name','$reason','$leave_address','$remark')");
			
			$err="<div class='alert alert-success'>Successfully Apply For Leave</div>";
			
			header('refresh:2');
}
}
extract($_POST);
$under_name=mysqli_query($con,"select * from add_employee");	



		/* $que=mysqli_query($con,"select * from add_employee");
						while($res=mysqli_fetch_array($que))
						
							$id=$res['employee_code']; */
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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
			
	<script type="text/javascript">
function calculateDate()
{

 var x=document.getElementById("e10").value;
 var y=document.getElementById("e11").value;
alert(x+"-To-"+y);
  var startDay = new Date(x);
                  var endDay = new Date(y);
                  var millisecondsPerDay = 1000 * 60 * 60 * 24;

                  var millisBetween =  endDay.getTime()-startDay.getTime() ;
                  var days = millisBetween / millisecondsPerDay;

                  // Round down.
                  //alert( Math.floor(days));
				  var d=Math.floor(days);
				 // alert(d);
				  document.getElementById('e12').value = d;

}
 </script>
 
 
 <meta charset="utf-8">
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  
  $(function() {
    $( "#skills1" ).autocomplete({
      source: 'search1.php'
    });
  });
  
  $(function() {
    $( "#skills2" ).autocomplete({
      source: 'search_last_name.php'
    });
  });
  </script>
 <script type="text/javascript">
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
        <?php include('include/header.php');?>        
        <section>
            <?php include('include/sidebar.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                              <a href="admindashboard.php"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Apply Leave</li>
									<li><a href="download/download7.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Leave</span></a></li>
                                </ul>
                                <h4>Apply Leave</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" >
					<div class="row">
					<div class="col-sm-6" id="error">
									<?php echo @$errors;?>
					<?php echo @$err;?></div>
					</div>
					<div id="demo"></div>
					<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Employee Information : </h5>
					</div>
					</div>
                        <div class="row paddtop paddbottom">
											        <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_code" id="skills" style="height:35px;"  class="form-control" placeholder="Employee Code"  onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>                                   
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee First Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text"  name="emp_name" id="skills1" style="text-transform:capitalize;" class="form-control" placeholder="Employee First Name" onkeypress="return chkAplha(event,'error1')" />
													<!--<input type="text" class="search" id="searchid" name="emp_name"  style="text-transform:capitalize;" class="form-control" placeholder="Employee Name" />-->
                                                                                                      
											   </div><!-- form-group -->
											   <div id="error1"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Last Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text"  name="emp_lname" id="skills2" style="text-transform:capitalize;" class="form-control" placeholder="Employee Last Name" onkeypress="return chkAplha(event,'error2')" />
													<!--<input type="text" class="search" id="searchid" name="emp_name"  style="text-transform:capitalize;" class="form-control" placeholder="Employee Name" />-->
                                                                                                      
											   </div><!-- form-group -->
											   <div id="error2"></div>
                                            </div>
											<div class="col-sm-3">
											<div class="form-group">
												<label><b>Employee Department :</b><span style="color:red;">*</span> </label> 
												<div id="aut1"><select class="form-control select1"  name="emp_department"   id="e2">
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
																					
											

						</div><!--  Row   -->
						<div class="row paddbottom">
						                        <div class="col-sm-3">
											 <div class="form-group">
												<label><b>Employee Designation :</b><span style="color:red;">*</span> </label> 
												<div id="aut2"><select class="form-control select1"  name="emp_designation" class="form-control"  id="e3">
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
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Dated :</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="present_date" id="e4" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" />
                                                </div><!-- form-group -->
                                            </div>
											
											
					    </div>
	


				<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Leave Balance : </h5>
					</div>
					</div>
					<div class="row paddtop">
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Casual Leave :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="casual_leave" style="height:35px;"  id='e5' class="form-control" onkeypress="return isNumber(event,'error4')" placeholder="Casual Leave" />
                                                </div><!-- form-group -->
												<div id="error4"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Earned Leave :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="earned_Leave" style="height:35px;" id="e6"  onkeypress="return isNumber(event,'error5')" class="form-control" placeholder="Earned Leave" />
                                                </div><!-- form-group -->
												<div id="error5"></div>
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Paternity Leave :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="patenity_leave" id="e7" style="height:35px;text-transform:capitalize;" class="form-control" onkeypress="return isNumber(event,'error6')" placeholder="Paternity Leave"/>
                                                </div><!-- form-group -->
												<div id="error6"></div>
												</div>
												<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sick Leave :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sick_leave" id="e8" style="height:35px;"  class="form-control" onkeypress="return isNumber(event,'error7')" placeholder="Sick Leave"/>
                                                </div>
												<div id="error7"></div>
												</div>
											                                        
						</div><!--  Row   -->
												
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Leave Application For : </h5>
					</div>
					</div>
						<div class="row paddtop">
						<div class="col-sm-3">
											<div class="form-group">
												<label><b>Type of Leave :</b><span style="color:red;">*</span> </label> 
												<div id="aut1"><select class="form-control select1"  name="leave_type"   id="e9">
													<option value="0">Select Leave</option>
													<option>Paid Leave</option>
													<option>Casual Leave</option>	
													<option>Leave without pay</option>
													<option>Holiday</option>
													<option>Sick</option>
												</select></div>
											</div>
                                            </div>	
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>From Date :</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="from_date" style="height:35px;"class="form-control" id="e10" onkeyup="calculateDate()" placeholder="Employee Designation"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>To Date:</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="to_date" style="height:35px;" class="form-control" onkeyup="calculateDate()" id="e11" placeholder="" />
                                                </div><!-- form-group -->
                                            </div>											
									<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Total No. of Days :</b> </label>
                                                    <input type="text" name="total_days"  style="height:35px;" readonly id="e12" class="form-control" placeholder="Total No. of Days"/>
                                                </div><!-- form-group -->
                                            </div>    
											
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Landline No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="landline_no"style="height:35px;" id="e13"  class="form-control" onkeypress="return isNumber(event,'error8')" placeholder="Landline No."/>
                                                </div><!-- form-group -->
												<div id="error8"></div>
                                            </div>	
												
																				
						</div>
				
						
						<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Approver Hierarchy : </h5>
					</div>
					</div>
					
						<div class="row paddtop">
						
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Approval Authority  :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="approve_autho"  style="text-transform:capitalize;" class="form-control" id="e14"  placeholder="Approval Authority"  onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
										
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b> Approver Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="approver_name" style="text-transform:capitalize;" class="form-control" id="e15" placeholder="Approver Name" onkeypress="return chkAplha(event,'error10')"/>
                                                </div><!-- form-group -->
												<div id="error10"></div>
                                            </div>
											
						</div>
						
						 
						 
						<div class="row">
									<!-- form-group -->
										 <div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Reason :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="reason" value="" id="e16" style="text-transform:capitalize;" placeholder="Reason"  onkeypress="return chekval(event)"></textarea>
											</div>
                                         </div>
											            
										 <div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Address While on Leave :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="leave_address" value="" id="e16" style="text-transform:capitalize;" placeholder="Address While on Leave"  onkeypress="return chekval(event)" ></textarea>
											</div>
                                         </div>
										<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Remark(if any) :</b> </label>
													<textarea class="form-control" rows="2" name="remark" value="" id="e17" style="text-transform:capitalize;" placeholder="Remark(if any)"  onkeypress="return chekval(event)"></textarea>
											</div>
                                         </div>
											            
											            
											
												
						</div>						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" name="submit" value="Add Employe" id="submit" onclick="calculateDate()" class="btn btn-success button1">
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
	  
    </script>


        <script src="js/jquery-1.11.1.min.js"></script>
		
<!--        this is auto complete city name start    -->
		
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
            $('#e0,#e1,#e2,#e3,#e4,#e5,#e6,#e7,#e8,#e9,#e10,#e11,#e12,#e13,#e14,#e15,#e16').each(function () {
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
    </body>
</html>

