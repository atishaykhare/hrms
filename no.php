<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}

$msg=$_REQUEST['msg'];
include('config.php');




$eid = $_POST['eid'];
$id = $_POST['arr'];
$checked = "0";
$arr = explode("," , $id);
$numericOnlyArray = array_filter($arr,'is_numeric');
print_r($numericOnlyArray);


/*$integerIDs = array_map('intval', explode(',', $id));
var_dump($intergerIDs);*/
/*$intArray = array_map(
    function($value) { return (int)$value; },
    $id
);

var_dump($intArray);*/


/*$newArray = array_map( create_function('$value', 'return (int)$value;'),
            $id);
print_r($newArray);*/
			

/*$intArray = array();

$str = explode(',', $id);
foreach ($str as $value) 
$intArray [] = intval ($value);
print_r($intArray);*/

for($i=0;$i<count($numericOnlyArray);$i++)
{
echo $i;
echo "<pre>";	

  $que1 = mysqli_query($con,"Select * from lms_table where lead_id = ('$numericOnlyArray[$i]')"); 
										while($res3=mysqli_fetch_array($que1))
										{
											$lead_id=$res3['lead_id'];
											$title=$res3['title'];
											$lead_status=$res3['lead_status'];
											$lead_type= $res3['lead_type'];
											$cust_name= $res3['customer_name'];
											echo $cust_name;
											echo "<pre>";
											$cust_no= $res3['customer_no'];
											$cust_alter_num= $res3['customer_alter_no'];
											$cust_mail= $res3['customer_email'];
											echo $cust_mail;
											echo "<pre>";
											$cust_add= $res3['customer_add'];
											$city= $res3['customer_city'];
											$required_property_type= $res3['required_property_type'];
											$property_location= $res3['property_required_location'];
											//echo $cust_mail;
		}									
										
$que2=mysqli_query($con,"Select `cust_mail` from assign where lead_id = '$lead_id'");
										if($res=mysqli_fetch_array($que2))
										{
											$emp_id= $res['employee_id'];
											$customer_mail=$res['cust_mail'];
											echo $customer_mail;
											echo "<pre>";
											//echo $emp_id;
										}
if($customer_mail != "")
	{
		mysqli_query($con,"Update assign set employee_id = '$eid', checked = '$checked' Where cust_mail = '$customer_mail'");
		echo "Lead Updated sucessfull";
		unset($customer_mail);
		echo $customer_mail;
		echo "<pre>";
	}
else
{
mysqli_query($con,"INSERT INTO `assign`(`a_id`,`lead_id`, `lead`, `cust_name`, `cust_num`, `cust_alter_num`, `cust_mail`, `cust_add`, `city`, `required_property_type`, `property_location`, `employee_id`,`Title`,`lead_status`,`date`) VALUES ('','$lead_id','$lead_type','$cust_name','$cust_no','$cust_alter_num','$cust_mail','$cust_add','$city','$required_property_type','$property_location','$eid' , '$title' , '$lead_status' ,  NOW())");			
		echo "Lead Assigned Sucessfully";					
}

		
}
header('location:manage-lms.php');
?>
  