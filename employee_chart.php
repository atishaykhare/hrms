<?php
	include('config.php');
$que1=mysqli_query($con,"select count(*) from add_employee ");
$res1=mysqli_fetch_array($que1);

// $jan= $res1['count(*)'];


 
         $curYear = date('Y');
        $query1 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-01-01'  and '$curYear-01-31'");
		$jan = mysqli_num_rows($query1);
		$query2 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-02-01'  and '$curYear-02-29'");
		$feb = mysqli_num_rows($query2);
		$query3 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-03-01'  and '$curYear-03-31'");
		$mar = mysqli_num_rows($query3);
        $query4 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-04-01'  and '$curYear-04-31'");
		$apr = mysqli_num_rows($query4); 
		$query5 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-05-01'  and '$curYear-05-31'");
		$may = mysqli_num_rows($query5);
		$query6 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-06-01'  and '$curYear-06-31'");
		$june = mysqli_num_rows($query6);
		$query7 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-07-01'  and '$curYear-07-31'");
		$july = mysqli_num_rows($query7);
		$query8 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-08-01'  and '$curYear-08-31'");
		$aug = mysqli_num_rows($query8);
		$query9 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-09-01'  and '$curYear-09-31'");
		$sep = mysqli_num_rows($query9);
		$query10 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-10-01'  and '$curYear-10-31'");
		$oct = mysqli_num_rows($query10);
        $query11 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-11-01'  and '$curYear-11-31'");
		$nov = mysqli_num_rows($query11);
		$query12 = mysqli_query($con ,"select * from add_employee where joining_date between '$curYear-12-01'  and '$curYear-12-31'");
		$dec = mysqli_num_rows($query12);
   
    
 
?>