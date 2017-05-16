<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
include('config.php');
extract($_POST);
if(isset($update))
{
	$qqu=mysqli_query($con,"select * from admin where password='$old_password'");
	$rows=mysqli_num_rows($qqu);
	if($rows)
	{
		if($new_password!=$con_password)
		{
			$err="<div class='alert alert-danger'>Confirm Password Doesn't Match.</div>";
			//header('refresh:2');
		}
		else
		{
			mysqli_query($con,"UPDATE `admin` SET `password`='$new_password'");
			$err="<div class='alert alert-success'> ! Password Successfully Change.</div>";
			//header('refresh:2');	
		}
	}
	else
{
			
	$err="<div class='alert alert-danger'>Old Password Doesn't Match.</div>";
	//header('refresh:2');
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
			
		
    </head>

    <body>
        <?php include('include/header.php');?>        
        <section>
            <?php include('include/sidebar.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                              <a href="admindashboard.php"><i style="color:white" class="fa fa-key"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Change Password</li>
                                </ul>
                                <h4>Change Password</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" >
					<div class="row">
					<div class="col-md-6" id="error"><?php echo @$err;?></div>
					</div>
					
					<div class="row">
					<div class="col-md-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Change Password : </h5>
					</div>
					</div>
                        <div class="row paddtop paddbottom">
											<div class="col-md-4">
                                               </div>                                            
                                            <div class="col-md-4" style="background-color:#ddd;margin-bottom:15px;padding-bottom:12px;box-shadow: 10px 10px 5px #888888;border: 1px rgba(0, 20, 255, 0.62) solid;padding-top: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Old Password :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="old_password" id="e1" class="form-control" placeholder="Enter Old Password" />
                                                </div><!-- form-group -->
												 <div class="form-group">
                                                    <label class="control-label"><b>New Password :</b> <span style="color:red;">*</span></label>
                                                    <input type="password" name="new_password" id="e2" class="form-control" placeholder="Enter New Password" />
                                                </div><!-- form-group -->
												 <div class="form-group">
                                                    <label class="control-label"><b>Confirm Password :</b> <span style="color:red;">*</span></label>
                                                    <input type="password" name="con_password" id="e3" class="form-control" placeholder="Re-Enter Password" />
                                                </div><!-- form-group -->
                                            </div>
											
						</div><!--  Row   -->						
						<div class="row">
											<div class="col-md-offset-5 col-md-4 ">
											<input type="submit" name="update" value="Change Password" id="submit" class="btn btn-success button1">
											<button type="reset" class="btn btn-danger resetbutt">Reset</button>
                                                </div>
						</div><!-- Row  -->
						
                        </div>
						</form>
                </div>
            </div><!-- mainwrapper -->
        </section>
        

<!--                                         This script Conflict  start   -->
<script src="js/jquery-1.9.1.js"></script>
   
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
            $('#e1,#e2,#e3').each(function () {
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
	
<!-- Modal for Add branch End -->

    </body>
</html>

