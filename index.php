<?php
error_reporting(0);
session_start();
require_once('config.php');
extract($_POST);
$emp_hr='H.R.';

date_default_timezone_set('Asia/Kolkata');

if(isset($sign_in))
	

{
	$que=mysqli_query($con,"select * from admin where user_name='$username' and password='$password'");
	//$row=mysqli_num_rows($que);
	$rw=mysqli_fetch_array($que);
	$adminlog = $rw['user_name'];
	$adminpass = $rw['password'];
	
	
	$empque=mysqli_query($con,"select * from add_employee where employee_code='$username' and emp_password='$password'");
	$emprw=mysqli_fetch_array($empque);
	$employeelog = $emprw['employee_code'];
	$employeepass = $emprw['emp_password'];
	
	$emphr=mysqli_query($con,"select * from add_employee where employee_code='$username' and emp_password='$password' and employee_department='$emp_hr'");
	$emprws=mysqli_fetch_array($emphr);
	$emphrloyeelog = $emprws['employee_code'];
	$emphrloyeepass = $emprws['emp_password'];
	
	
	
	
	if($username=="" || $password=="")
	{
		$err="<div class='alert alert-danger'>Please Fill Username And Password</div>";
		
	}
	elseif($username==$adminlog || $password==$adminpass)
	{
		$_SESSION['username']=true;
		header('location:index1');
		//admindashboard.php
	}
	elseif($username==$emphrloyeelog || $password==$emphrloyeepass)
	{
		$_SESSION['username']=$employeelog;
		header('location:employeehr');
		//admindashboard.php
	}
	elseif($username==$employeelog || $password==$employeepass)
	{
		$_SESSION['username']=$employeelog;
		header('location:employee');
		//admindashboard.php
	}
	
	else
	{
		$err="<div class='alert alert-danger'>Wrong Login Details</div>";
		
	}
	
}
include('loader.html');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LMS HRMS Admin Panel</title>

         <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		    <link href="css/style.default.css" rel="stylesheet">    

		    <link href="css/stylemanual.css" rel="stylesheet">   

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin" background="img/index_back.jpg" onload="myFunction()" >
        <div id="loader"></div>
        
        <section  style="display:none;" id="myDiv" class="animate-bottom">
            
            <div class="panel panel-signin login-panel-box" >
                <div class="panel-body">
                    <div class="logo text-center">
                       <img src="img/lead-logo.png" alt="LMS Logo" > 
                    </div>
                    <br />
                    <h4 class="text-center mb5" style="color:rgba(9, 35, 68, 0.95);">Welcome To LMS-HRMS</h4>
                    <p class="text-center" style="color:rgba(9, 35, 68, 0.95);">Sign in to your account</p>
                    
                    <div class="mb30"><?php echo @$err;?></div>
                    
                    <form  method="post">
                        <div class="input-group mb15">
                            <span class="input-group-addon" style="background-color: rgba(247, 247, 247, 0.11);"><i class="fa fa-user" aria-hidden="true" style="color: rgba(9, 35, 68, 0.95);"></i></span>
                            <input type="text" name="username" style="background-color: rgba(255, 255, 255, 0.68);" class="form-control" placeholder="Username">
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon" style="background-color: rgba(247, 247, 247, 0.11);"><i class="fa fa-key" aria-hidden="true" style="color: rgba(9, 35, 68, 0.95);"></i></span>
                            <input type="password" name="password" style="background-color: rgba(255, 255, 255, 0.68);" class="form-control" placeholder="Password">
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            
                            <div class="pull-right">
                                <button type="submit" name="sign_in" class="btn btn-success" style="background-color:rgba(9, 35, 68, 0.95);">Sign In <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
                
            </div><!-- panel -->
            
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>

        <script src="js/custom.js"></script>

    </body>
</html>
