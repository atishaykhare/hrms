<?php
//echo "<script>alert('Hello');</script>";
if(isset($_POST["from_date"], $_POST["to_date"]))
{
	include('config.php');
	$output = '';
	$date=$_POST['from_date'];
	$tdate=$_POST['to_date'];
	
	
	
	//echo  "<script>alert('$date');</script>";die;
	
	 $query = "SELECT * FROM attendance_table WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' GROUP BY employee_code";
	$result = mysqli_query($con, $query);
	
	$output .='
	  <div class="panel-heading">
                                <h4 class="panel-title">View Attendance :</h4>
                             
                            </div><!-- panel-heading -->
		<table  id="basicTable" class="table table-striped table-bordered responsive">
		<tr>
										<th>Employee ID</th>
                                        <th>Name</th>
										 <th>'.$date.'</th>
                                        <th>'.date('d/m/y' ,strtotime ($date. '+ 1 days')).'</th>
                                        <th>'.date('d/m/y' ,strtotime ($date. '+ 2 days')).'</th>
                                        <th>'.date('d/m/y' ,strtotime ($date. '+ 3 days')).'</th>
                                        <th>'.date('d/m/y' ,strtotime ($date. '+ 4 days')).'</th>
                                        <th>'.date('d/m/y' ,strtotime ($date. '+ 5 days')).'</th>
                                       
                                                                           
                                     
		</tr>
	';
	if(mysqli_num_rows($result)>0)
	{
		while($row= mysqli_fetch_array($result))
		{
			$emp_code = $row["employee_code"];
			$ques1=mysqli_query($con,"select shift_id from add_employee where employee_code = '$emp_code' ");
							if($res1=mysqli_fetch_array($ques1))
							{
								
							$shift_emp_id=$res1['shift_id'];
							}
							$query3=mysqli_query($con,"select * from shift_time where id = '$shift_emp_id' ");
							if($result3=mysqli_fetch_array($query3))
							{
								$sintime=$result3['intime'];
								$souttime=$result3['outtime'];
							}
		$output .= ' 
			<tr>
				<td>'.$emp_code.'</td>
				<td>'.$row["name"].'</td>
				';		
	$query4=mysqli_query($con,"select * from attendance_table WHERE employee_code = '$emp_code' AND date BETWEEN '$date' AND '$tdate' LIMIT 6 ");
	while($result5=mysqli_fetch_array($query4))
	{
		
		//$chkdate=date('y-m-d' , strtotime($date. '+ 1 days'));
		$ddate=$result5['intime'];
		$attendance=$result5['attendance'];
		$result_msg = '';
		 $result7=mysqli_query($con,"select * from holiday1 where msg = '$ddate' ");
										  while($result10=mysqli_fetch_array($result7))
										  {
											  $result_msg=$result10['msg'];
										  }
		
		if($result_msg != '')
		{
			$alert = $result_msg;
		}
		else{
		if($attendance == 'Sunday')
		{
			$alert = "<span style='color:blue';>Sunday</span>";
		}
		else
		{
		if($attendance == 'A')
									   {
										  $alert="<span style='color:red;'>absent</span>";
									   }
									   else
									   {
									   if ($sintime < $result5['intime'] or $souttime > $result5['outtime'])
									   {
									   $alert= "<span style='color:yellow'>Half Day</span><br>In Time: ".$result5['intime'];
									  
									  
									   }
									   else
									   {
										   $alert= "<span style='color:green'>On Time</span>";
										   $alert= "<br>";
										   $alert= 'In Time: '.$result5['intime'];
										   $alert= "<br>";
										   $alert= 'Out Time: '.$result5['outtime'];
									   }
									   }
		}
		}
		$output .= '<td>'.$alert.'</td>';

														
					
	}
	
			'</tr>
				';	
		}
	}
	else
	{
		$output .= '
			<tr>
				<td>No Date Found</td>
			</tr>
		';
	}
	$output .= '</table>';
	echo $output;
}
?>