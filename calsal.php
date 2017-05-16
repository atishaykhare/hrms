<?php
$month= $_POST['empid'];
//echo $empid;
$empid = $_POST['mon'];
//echo $month;
$first_counted_days_sal = 0;
$second_counted_days_sal = 0;
include('config.php');

$total_salary = mysqli_query($con,"select total_salary,employee_code from add_employee Where e_id = '$empid'");
$tSalary = mysqli_fetch_array($total_salary);
$a=0;
//echo $tSalary['employee_code'];
$tSalaryEmpCode=$tSalary['employee_code'];
//echo $tSalaryEmpCode;	
$emp_attendace= mysqli_query($con,"Select COUNT(date) AS num from attendance_table Where employee_code = '$tSalaryEmpCode' and date LIKE '_____$month%' and attendance != 'A' ");

$counted = mysqli_fetch_assoc($emp_attendace);

$counted_days = $counted['num'];
 $counted_days;
 $SalaryTotal = $tSalary['total_salary']/31;

$first = mysqli_query($con,"Select COUNT(date) AS num1 from attendance_table WHERE employee_code = '$tSalaryEmpCode' and date LIKE '_____$month%' and intime BETWEEN '09:45' and '10:15' ");
$first_counted = mysqli_fetch_assoc($first);
$first_counted_days = $first_counted['num1'];
	if($first_counted_days > 1)
	{
		$first_counted_days = $first_counted_days - 1;
	   $first_counted_days_sal = ($SalaryTotal/4) * $first_counted_days;
	}
$second = mysqli_query($con,"SELECT COUNT(date) AS num2 from attendance_table WHERE employee_code = '$tSalaryEmpCode' and date LIKE '_____$month%' and intime BETWEEN '10:16' and '11:30'");
$second_counted = mysqli_fetch_assoc($second);
$second_counted_days = $second_counted['num2'];
	if($second_counted_days > 0)
	{
	 $second_counted_days_sal = ($SalaryTotal/4) * $second_counted_days;
	}
$third = mysqli_query($con,"Select COUNT(date) AS num3 from attendance_table WHERE employee_code = '$tSalaryEmpCode' and date LIKE '_____$month%' and intime BETWEEN '11:30' and '14:00'");
$third_counted = mysqli_fetch_assoc($third);
$third_counted_days = $third_counted['num3'];
	if($third_counted_days > 0)
	{
		$third_counted_days_sal = ($SalaryTotal/2) * $third_counted_days;
	}
 echo round(($SalaryTotal * $counted_days) - $first_counted_days_sal - $second_counted_days_sal - $third_counted_days_sal , 2);
?>
