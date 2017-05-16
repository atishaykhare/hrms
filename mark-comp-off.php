<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');
extract($_POST);

if(isset($submit))
{
			$doc_name=$n=$_FILES['upload_document']['name'];
			$que=mysqli_query($con,"INSERT INTO `mark_comp_off`(`mark_id`, `emp_code`, `emp_name`, `emp_department`, `emp_designation`, `present_date`, `from_date`, `upload_document`, `reason`) VALUES ('','$emp_code','$emp_name','$emp_department','$emp_designation','$present_date','$from_date','$doc_name','$reason')");
			move_uploaded_file($_FILES['upload_document']['tmp_name'],"documents/Comp-Off/".$doc_name);
			$err="<div class='alert alert-success'>Successfully Data Saved..</div>";
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
    else return true;
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
                              <a href="admindashboard.php"><i style="color:white"  class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Mark of Comp-Off</li>
									<li><a href="download/download18.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Company-Off</span></a></li>
                                </ul>
                                <h4>Mark of Comp-Off</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err;?></div>
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
                                                    <input type="text" name="emp_code" id="e0" style="height:35px;"  class="form-control" placeholder="Employee Code" onkeypress="return chekval(event)"/>
                                                </div><!-- form-group -->
                                            </div>                                   
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Employee Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="emp_name" id="e1" style="text-transform:capitalize;" class="form-control" placeholder="Employee Name" onkeypress="return chkAplha(event,'error1')"/>
                                                </div><!-- form-group -->
												<div id="error1"></div>
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
											

						</div><!--  Row   -->
						<div class="row paddbottom">
						 
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Dated :</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="present_date" id="e4" style="height:35px;text-transform:capitalize;" class="form-control" placeholder="Employee First Name" />
                                                </div><!-- form-group -->
                                            </div>
						</div>
									


				<div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Mark Comp-Off : </h5>
					</div>
					</div>
					<div class="row paddtop">
											
								<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Date :</b> <span style="color:red;">*</span></label>
                                                    <input type="date" name="from_date" style="height:35px;"class="form-control" id="e5" onkeyup="calculateDate()" placeholder="Employee Designation"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Upload Document :</b> <span style="color:red;">*</span></label>
                                                    <input type="file" name="upload_document" style="height:35px;"class="form-control"  id="filedocxpdf" onchange="checkfile(this);" accept="application/pdf"/>
                                                </div><!-- form-group -->
                                            </div>	              	
								
																	
						</div><!--  Row   -->
						<div class="row paddbottom">
						<div class="col-sm-6">
											<div class="form-group">
                                                    <label class="control-label"><b>Reason / Comments:</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="2" name="reason" value="" id="e7" style="text-transform:capitalize;" placeholder="Reason"onkeypress="return chekval(event)" ></textarea>
											</div>
                                         </div>	
						
						</div>
																
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" name="submit" value="Submit" id="submit"  class="btn btn-success button1">
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
            $('#e0,#e1,#e2,#e3,#e4,#e5,#e6,#e7').each(function () {
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

