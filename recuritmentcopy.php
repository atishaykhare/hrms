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


//echo "hello".$n;
		//echo "<script>alert($n)</script>";
	$que=mysqli_query($con,"INSERT INTO `add_employee`(`employee_first_name`,`emp_middle_name`, `employee_last_name`, `employee_mobile_no`, `employee_email`, `employee_address`, `employee_city`, `employee_state`, `employee_pincode`, `employee_department`, `employee_designation`, `employee_branch_name`, `company_code`, `emp_pic`, `id_proof`, `add_proof`, `interviewer_name`) VALUES ('$fname','$mname','$lname','$emp_contact','$emp_email','$emp_address','$emp_city','$emp_state','$emp_pincode','$emp_department','$emp_designation','$emp_branch','$company_code','$im','$imm','$imi','$interviewer_name')");
		move_uploaded_file($_FILES['image']['tmp_name'],"profile/".$im);
		move_uploaded_file($_FILES['id_proof']['tmp_name'],"documents/".$imm);
		move_uploaded_file($_FILES['add_proof']['tmp_name'],"documents/".$imi);

	$err="<div class='alert alert-success'>Recuritment Successfully Added..</div>";
	header('refresh:2'); 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LMS Admin Panel</title>

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
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter only Numbers.");
            return false;
        }

        return true;
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
                                    <li>Recuritment</li>
                                </ul>
                                <h4> Recuriment</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err;?></div>
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
													<option selected >Nivesh Group</option>
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
											<div class="col-sm-4"style="display:none;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_code" id="e0" style="height:35px;"  class="form-control" placeholder="Employee Code"/>
                                                </div><!-- form-group -->
                                            </div>                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>First Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="fname" id="e1" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Middle Name :</b></label>
                                                    <input type="text" name="mname" id="e111" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Last Name :</b></label>
                                                    <input type="text" name="lname" id="e2" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee Last Name" />
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
                                                    <input type="text" name="emp_contact" style="height:35px;"  id='e3' maxlength="12"class="form-control" onkeypress="return isNumber(event)" placeholder="Employee Contact No" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="emp_email" style="height:35px;" id="e4"   class="form-control" placeholder="Employee Email" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Employee Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="emp_address" id="e5" style="text-transform:capitalize;" placeholder="Employee Address"></textarea>
												</div>
                                                </div>
											                                        
						</div><!--  Row   -->
						<div class="row paddbottom" >
											                                         										
										  
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee City :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_city" id="e6" style="height:35px;" class="form-control" placeholder="Employee City" autocomplete="off" data-country="in"/>
                                                </div>
												</div>
												<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee State :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_state" id="e7" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee State"/>
                                                </div><!-- form-group -->
												</div>
												 <!-- form-group --><div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Pincode :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_pincode" id="e8" style="height:35px;" maxlength="8" class="form-control" onkeypress="return isNumber(event)" placeholder="Employee Pincode"/>
                                                </div>
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
                                                    <input class="form-control" id="uploadFile" type="file" name="image" class="img" />
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
                                                    
                                                    <input type="file" name="id_proof" id="e15" style="height:35px;" class="form-control" placeholder="PF No"/>
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
                                                    
                                                    <input type="file" name="add_proof" id="e15" style="height:35px;" class="form-control" placeholder="PF No"/>
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
                                                    <input class="form-control" id="i8" type="text" name="interviewer_name" class="img" placeholder="Interviewer Name" />
                                                </div><!-- form-group -->
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
            $('#e1,#e3,#e4,#e5,#e6,#e7,#e8,#e11,#e12,#e13,#e14,#e23,#i8').each(function () {
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

