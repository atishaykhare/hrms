<?php
session_start();
/* if($_SESSION['username']=="")
{
	
	header('location:index.php');

} */


//include('config.php');
$con=mysqli_connect("localhost","root","","csinffze_lmss");
extract($_POST);

if(isset($submit))
{
	 /* if($pf_applicable==""||$pf_no=="")
	{
		$que=mysqli_query($con,"INSERT INTO company_details(company_id,company_name,
		company_code,fiscal_year,company_print_name,domain_name,email,ip_address,
		corporte_identity_no,tax_deduction,service_tax,pan_no,vat_no,tan_no,esi_applicable,
		esi_no,salary_calculation,offfice_address,city,country,state,pincode,telephone,fax)  
		VALUES('$company_id','$company_name','$company_code','$fiscal_year','$company_print_name',
		'$domain_name','$email','$ip_address','$corporte_identity_no','$tax_deduction',
		'$service_tax','$pan_no','$vat_no','$tan_no','$esi_applicable','$esi_no','$salary_calculation',
		'$offfice_address','$city','$country','$state','$pincode','$telephone','$fax')");
	
	$err="<div class='alert alert-success'>Company Details Successfully Added ..1.</div>";
	}
	elseif($esi_applicable==""||$esi_no=="")
	{
			$que=mysqli_query($con,"INSERT INTO company_details(company_id,company_name,company_code,fiscal_year,company_print_name,domain_name,email,ip_address,corporte_identity_no,tax_deduction,service_tax,pan_no,vat_no,tan_no,pf_applicable,pf_no,salary_calculation,offfice_address,city,country,state,pincode,telephone,fax) 
			                                            VALUES ('$company_id','$company_name','$company_code','$fiscal_year','$company_print_name','$domain_name','$email','$ip_address','$corporte_identity_no','$tax_deduction','$service_tax','$pan_no','$vat_no','$tan_no','$pf_applicable','$pf_no','$salary_calculation','$offfice_address','$city','$country','$state','$pincode','$telephone','$fax')");
	
	$err="<div class='alert alert-success'>Company Details Successfully Added ..2.</div>";
	}
	else
	{  */
			$que=mysqli_query($con,"INSERT INTO 'company_details'('company_id','company_name','fiscal_year','company_print_name','email,corporte_identity_no')  
			                                             VALUES('$company_id','$company_name','$fiscal_year','$company_print_name','$email','$corporte_identity_no')");
	
	$err="<div class='alert alert-success'>Company Details Successfully Added ..3.</div>";
	 
	 //,'$service_tax','$pan_no','$tan_no','$pf_applicable','$pf_no','$esi_applicable','$esi_no','$salary_calculation','$offfice_address','$city','$country','$state','$pincode','$telephone','$fax'
	 //,'service_tax,pan_no','tan_no','pf_applicable','pf_no','esi_applicable','esi_no','salary_calculation','offfice_address','city','country','state','pincode','telephone','fax'
	
	//company_code,domain_name,ip_address,tax_deduction,vat_no,
	//'$company_code','$domain_name','$ip_address','$tax_deduction','$vat_no',
	//}
	header('refresh:2');
}
/*if(isset($add_department))
{
	
	
}*/

	
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