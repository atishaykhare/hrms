<?php
$con=mysqli_connect("localhost","root","","my_database");

 extract($_POST);
 if(isset($sub))
 {
	$sql1="SELECT * FROM employee WHERE Email='$em'"; 
	
	$q=mysqli_query($con,$sql1);
	
	$r=mysqli_num_rows($q);
	if($r==true)
	{
		echo "<h1><font color='red'>This Employee Already Exists</font></h1>";
	}
	 else
	 {
		 $dob=$yy."-".$mm."-".$dd;
		
	     $hob=implode(",",@$arr);
		
		 $img=$_FILES['img']['name'];
		 
		 $sql="INSERT INTO employee VALUES('','$n','$em','$m','$a','$c','$s','$g','$dob','$hob','$img')";
		 mysqli_query($con,$sql);
		
		 move_uploaded_file($_FILES['img']['tmp_name'],"image/".$img);
		
		 echo "Data Saved";
	 }
 }
 
 
 if(isset($disall))
 {
   $d="select * from employee";
   $sa=mysqli_query($con,$d);
   
   echo "<table border='1px'>";
   echo "<tr>
          <th>Emp_ID </th><th>Name </th><th>Email </th><th>Mobile </th><th>address </th><th>city </th>
		  <th>state</th><th>gender</th><th>DOB</th><th>hobbis</th><th>image</th>
		  <th>Delete</th>
		  <th>Update</th>
       </tr>";
	 while($res=mysqli_fetch_array($sa))            // $res= result
	{
		echo  "<tr>";
	    echo  "<td>".$res['Emp_ID']."</td>"; 
	    echo  "<td>".$res['Name']."</td>";
		echo  "<td>".$res['Email']."</td>";
	    echo  "<td>".$res['Mobile']."</td>";
		echo  "<td>".$res['Address']."</td>";
		echo  "<td>".$res['City']."</td>";
		echo  "<td>".$res['State']."</td>";
		echo  "<td>".$res['Gender']."</td>";
		echo  "<td>".$res['DOB']."</td>";
		echo  "<td>".$res['Hobbies']."</td>";
		$img=$res['Image'];
	    
		echo  "<td><img src='image/$img' width='100' height'100'/></td>";
       $e=$res['Email'];
           echo  "<td><a href='delete.php?eid=$e&img=$img'>Delete</a></td>";
            echo  "<td><a href='update.php?emid=$e'>Update</a></td>";
		
		 echo "</tr>";
	  
	}
	 echo "</table>";
 }
 if(isset($disem))
  {
   $d="SELECT * FROM `employee` WHERE Email='$em'";
   $sa=mysqli_query($con,$d);
   
   echo "<table border='1px'>";
   echo "<tr>
          <th>Emp_ID </th><th>Name </th><th>Email </th><th>Mobile </th><th>address </th><th>city </th>
		  <th>state</th><th>gender</th><th>DOB</th><th>hobbis</th><th>image</th>
		  
       </tr>";
	 while($res=mysqli_fetch_array($sa))            // $res= result
	{
		echo  "<tr>";
	    echo  "<td>".$res['Emp_ID']."</td>"; 
	    echo  "<td>".$res['Name']."</td>";
		echo  "<td>".$res['Email']."</td>";
	    echo  "<td>".$res['Mobile']."</td>";
		echo  "<td>".$res['Address']."</td>";
		echo  "<td>".$res['City']."</td>";
		echo  "<td>".$res['State']."</td>";
		echo  "<td>".$res['Gender']."</td>";
		echo  "<td>".$res['DOB']."</td>";
		echo  "<td>".$res['Hobbies']."</td>";
		$img=$res['Image'];
	    echo  "<td><img src='image/$img' width='100' height'100'/></td>";
		 echo "</tr>";
	  
	}
	 echo "</table>";
 }
 
 if(isset($disid))
 {
   $d="SELECT * FROM `employee` WHERE Emp_ID='$emp'";
   $sa=mysqli_query($con,$d);
   
   echo "<table border='1px'>";
   echo "<tr>
          <th>Emp_ID </th><th>Name </th><th>Email </th><th>Mobile </th><th>address </th><th>city </th>
		  <th>state</th><th>gender</th><th>DOB</th><th>hobbis</th><th>image</th>
       </tr>";
	$res=mysqli_fetch_array($sa);            // $res= result
			echo  "<tr>";
	    echo  "<td>".$res['Emp_ID']."</td>"; 
	    echo  "<td>".$res['Name']."</td>";
		echo  "<td>".$res['Email']."</td>";
	    echo  "<td>".$res['Mobile']."</td>";
		echo  "<td>".$res['Address']."</td>";
		echo  "<td>".$res['City']."</td>";
		echo  "<td>".$res['State']."</td>";
		echo  "<td>".$res['Gender']."</td>";
		echo  "<td>".$res['DOB']."</td>";
		echo  "<td>".$res['Hobbies']."</td>";
		$img=$res['Image'];
	    echo  "<td><img src='image/$img' width='100' height'100'/></td>";
		 echo "</tr>";
	  
	
	 echo "</table>";
}





/*  if(isset($upd))
 {
   $d="UPDATE `my_database`.`employee` SET `Name` = '$n',`Email` = '$em',`Mobile` = '$m',
  `Address` = '$a' WHERE `employee`.`Emp_ID` = '$emp'";
     
   $sa=mysqli_query($con,$d);
 
   
   echo "<table border='1px'>";
   echo "<tr>
          <th>Emp_ID </th><th>Name </th><th>Email </th><th>Mobile </th><th>address </th><th>city </th>
		  <th>state</th><th>gender</th><th>DOB</th><th>hobbis</th><th>image</th>
       </tr>";
	 
	 while($res=mysqli_fetch_array($sa))            // $res= result
	{
		echo  "<tr>";
	    echo  "<td>".$res['Emp_ID']."</td>"; 
	    echo  "<td>".$res['Name']."</td>";
		echo  "<td>".$res['Email']."</td>";
	    echo  "<td>".$res['Mobile']."</td>";
		echo  "<td>".$res['Address']."</td>";
		echo  "<td>".$res['City']."</td>";
		echo  "<td>".$res['State']."</td>";
		echo  "<td>".$res['Gender']."</td>";
		echo  "<td>".$res['DOB']."</td>";
		echo  "<td>".$res['Hobbies']."</td>";
		$img=$res['Image'];
	    echo  "<td><img src='image/$img' width='100' height'100'/></td>";
		 echo "</tr>";
	  
	}
	 echo "</table>";
 } */
   
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Connect with Mysql</title>
</head>
<body>
	<Form method="post" enctype="multipart/form-data">
	    <table border="1px" align="center">
		 <tr>
			    <th>Emp_ID</th>
			    <td><input type="number" name="emp"></td>
		    </tr>
			 <tr>
			    <th>Name</th>
			    <td><input type="text" name="n"></td>
		    </tr>
			 <tr>
			    <th>Email</th>
			    <td><input type="email" name="em"></td>
		    </tr>
			 <tr>
			    <th>Mobile</th>
			    <td><input type="number" name="m"></td>
		    </tr>
			<tr>
			    <th>Address</th>
			    <td><input type="text" name="a"></td>
		    </tr>
			<tr>
			    <th>City</th>
			    <td><input type="text" name="c"></td>
		    </tr>
			<tr>
			    <th>State</th>
			    <td><input type="text" name="s"></td>
		    </tr>
			<tr>
			    <th>Gender</th>
			    <td>Male<input type="radio" name="g" value="Male">
				    Female<input type="radio" name="g" value="Female"></td>
		    </tr>
			<tr>
			<th>DOB</th>
			<td>
			  <select name="yy"><option value="o">yyyy</option>
			    <?php
				  for($i=1990; $i<=2016; $i++)
				    {
					 echo '<option>'.$i.'</option>';
					}
				?>
			  </select>
			  <select name="mm"><option value="o">mm</option>
			    <?php
				  for($i=1; $i<=12; $i++)
				    {
					 echo '<option>'.$i.'</option>';
					}
				?>
			  </select>
			  <select name="dd"><option value="o">dd</option>
			    <?php
				  for($i=1; $i<=31; $i++)
				    {
					 echo '<option>'.$i.'</option>';
					}
				?>
			  </select>
			 
			</td>
			</tr>
			<tr>
			    <th>Hobbies</th>
			    <td>Reading<input type="checkbox" name="arr[]" value="Reading">
			        Playing<input type="checkbox" name="arr[]" value="Playing">
			        Singing<input type="checkbox" name="arr[]" value="Singing">
			    </td>
			</tr>
			<tr>
			    <th>Image</th>
				<td><input type="file" name="img"></td>
			</tr>
			
			<tr>
			    
				<td colspan="2" align="center"><input type="submit" name="sub" value="Submit">
			                                   <input type="submit" name="disall" value="Display All">
											   <input type="submit" name="disem" value="Display BY Email">
											   <input type="submit" name="disid" value="Display BY ID">
											   
				</td>
			
			</tr>
		</table>
	</Form>
</body>
</html>