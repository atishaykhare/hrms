<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
	header('location:index');

}
$a=1;
include('config.php');
date_default_timezone_set('Asia/Kolkata');
$curdate = date('Y-m-d');
$checkdate = date("l");
$holidaycurdate=date('Y-m-d' , strtotime($curdate.'-1 days'));
//echo $checkdate;
$query5=mysqli_query($con,"select employee_code , employee_first_name , employee_last_name from add_employee");
$query6=mysqli_query($con,"select employee_code , employee_first_name , employee_last_name from add_employee");
$holiday_query=mysqli_query($con,"Select * from holiday order by date ASC");
$queryyy=mysqli_query($con,"Select date from attendance_table order by date DESC");
$resulttt=mysqli_fetch_array($queryyy);
$holidayresult=mysqli_fetch_array($holiday_query);
$finaldate=mysqli_query($con,"Select date from attendance_table Where date = '$curdate'");
$finaldate1=mysqli_fetch_array($finaldate);
//echo $finaldate1[0];
if($finaldate1[0]== '')
{
do
{
if($holidaycurdate == $holidayresult['date'])
{
	$date=$resulttt['date'];
	$chkdate1=date('Y-m-d' , strtotime($curdate. '- 0 days'));
	if($date == $chkdate1)
		{
		 //echo "<script>alert('one');</script>";
		 break;
		}
	//echo "<script>alert('Hello');</script>";
	$msg=$holidayresult['msg'];
	while($result0=mysqli_fetch_array($query5))
{
	$empcode=$result0['employee_code'];
	$empname=$result0['employee_first_name']. " ". $result0['employee_last_name'];
	//echo $empcode;
	//echo $empname . " - ";
			mysqli_query($con,"Insert into attendance_table (attendance_id,employee_code,name,date,intime,outtime,attendance) VALUES ('','$empcode','$empname','$holidaycurdate','$msg' , '$msg','$msg' )");
			
}
mysqli_query($con,"Insert into holiday1 (hid, msg, date) VALUES ('', '$msg', '$holidaycurdate')");
mysqli_query($con,"Delete  from holiday where date = '$holidaycurdate' ");
while($result7=mysqli_fetch_array($query6))
{
	$empcode=$result7['employee_code'];
	$empname=$result7['employee_first_name']. " ". $result7['employee_last_name'];
	//echo $empcode;
	//echo $empname . " - ";
			mysqli_query($con,"Insert into attendance_table (attendance_id,employee_code,name,date,intime,outtime,attendance) VALUES ('','$empcode','$empname','$curdate','00:00' , '00:00','A' )");
}
	break;
}

else
{
if($checkdate == "Monday")
{
	$chkdate=date('Y-m-d' , strtotime($curdate. '- 1 days'));
	//echo $chkdate;
	//echo $checkdate;
	$query0=mysqli_query($con,"select employee_code , employee_first_name , employee_last_name from add_employee");

	$query=mysqli_query($con,"Select date from attendance_table order by date DESC");
	$result=mysqli_fetch_array($query);
	do 
	{	
		$chkdate1=date('Y-m-d' , strtotime($curdate. '- 0 days'));
	 	$date=$result['date'];
		//echo $chkdate1;
		//echo $date;
		if($date == $chkdate1)
		{
		 //echo "<script>alert('one');</script>";
		 break;
		}
		else
		{
			while($result0=mysqli_fetch_array($query0))
{
	$empcode=$result0['employee_code'];
	$empname=$result0['employee_first_name']. " ". $result0['employee_last_name'];
	//echo $empcode;
	//echo $empname . " - ";
			mysqli_query($con,"Insert into attendance_table (attendance_id,employee_code,name,date,intime,outtime,attendance) VALUES ('','$empcode','$empname','$chkdate','Sunday' , 'Sunday','Sunday' )");
			//echo "<script>alert('two');</script>";
}
		break;
		}
	}
	while($result);
}
if ($checkdate != "Sunday")
{
$query0=mysqli_query($con,"select employee_code , employee_first_name , employee_last_name from add_employee");

	$query=mysqli_query($con,"Select date from attendance_table order by date DESC");
	$result=mysqli_fetch_array($query);
	do 
	{	
	 	$date=$result['date'];
		//echo $checkdate;
		//echo $date;
		//echo $curdate;
		if($date == $curdate)
		{
		 //echo "<script>alert('three');</script>";
		 break;
		}
		else
		{
			while($result0=mysqli_fetch_array($query0))
{
	$empcode=$result0['employee_code'];
	$empname=$result0['employee_first_name']. " ". $result0['employee_last_name'];
	//echo $empcode;
	//echo $empname . " - ";
			mysqli_query($con,"Insert into attendance_table (attendance_id,employee_code,name,date,intime,outtime,attendance) VALUES ('','$empcode','$empname','$curdate','00:00' , '00:00','A' )");
			//echo "<script>alert('$a+1');</script>";

}
		break;
		}
	}
	while($result);
}
break;
}
}
while($holidayresult);
}
else
{

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>HRMS LMS Panel</title>
     	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		    <link href="css/lms.css" rel="stylesheet">    
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    
	</head>

    <body>
	
    <div class="overlay"></div>	
	<button type="button" class="btn pull-right logout" onClick="window.location.href='signout.php';">Logout</button> 
      
	  <div class="wrapper">	   	   
       <div class="container">   
       <div class="col-md-6 hrms">
       <h2>Human Resource Management System</h2>
       <p>Human Resource (HR) Management involves managing an organization’s human capital (i.e., its employees and all their knowledge, skills, and abilities that contribute to the organization’s success). HR Professionals act as a conduit between the employees and the organization, helping managers in other business areas attract, deploy, and retain an effective workforce. </p>
       <a href="admindashboard"><div class="text-center">
       <button type="button" class="btn">GET STARTED</button>
       </div></a>
       </div>
       <div class="or-message">
		<span>Or</span>
		</div>
       <div class="col-md-6 lms">
       <h2>Lead Management System</h2>
       <p>Lead management System built for sales people to easily manage their tasks and give Right Attention to the Right Leads at the Right Time and conver them to Customers without a miss.This product helps you easily Capture,Process,Track,Nurture and Respond to your leads from anywhere at any time.</p>
      <a href="admindashboard_lms"> <div class="text-center">
       
	   <button type="button" class="btn1">GET STARTED</button>
       </div></a>
       </div>       
    
       </div>
       </div> 
        
        


        <script src="js/jquery-1.11.1.min.js"></script>     
        <script src="js/bootstrap.min.js"></script>
     

    </body>
</html>
