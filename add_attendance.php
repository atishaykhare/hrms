<?php 
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
include('config.php');
$x=$_POST['chklist'];
$ar=explode(".",$x);

//echo $x;

 $emp_id= "emp id ".$ar[1]."<br>";
 $att="attenance ".$ar[0];
  $empp_id="$ar[1]";
  $atte_id="$ar[0]";
  $date=date("Y/m/d");
  
  $quee=mysqli_query($con,"select * from attendance_table where employee_code='$empp_id' and date='$date'");
  $ress=mysqli_fetch_array($quee);
  //echo $resss= implode ($ress);
  if($ress)
  {
	  echo  "Your Attendance allredey Added..";
	   header('location:my_attendance.php');
  }
  else
  {
	$tquery=mysqli_query($con,"select * from try where emp_id ='$empp_id'");
	while($tres=mysqli_fetch_array($tquery))
	{
		$intime=$tres['intime'];
		echo $intime;
		$outtime=$tres['outtime'];
		echo $outtime;
	}
    $que=mysqli_query($con,"select * from add_employee where employee_code='$empp_id'");
    $res=mysqli_fetch_array($que);
    if ($res)
	{  
     
    $name= $res['employee_first_name']." ".$res['employee_last_name'];
	 
	$que=mysqli_query($con,"INSERT INTO `attendance_table` (`employee_code`, `name`, `date`, `intime` ,`outtime` , `attendance`) 
		                                                VALUES ( '$empp_id', '$name', '$date', '$intime' , '$outtime' ,'$atte_id')"); 
				
	         mysqli_query($con,"Delete from try where emp_id = '$empp_id' ");
	       echo  "Employee Attendance Successfully Added..";
		   header('location:my_attendance.php');
    	//header("refresh:0;url=my_attendance.php");
	
	}					
						
  }					
?>