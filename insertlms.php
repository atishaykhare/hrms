<?php
session_start();
require_once('config.php');
$ee1=$_REQUEST['l1'];
$ee2=$_REQUEST['l2'];
$ee3=$_REQUEST['l3'];
$ee4=$_REQUEST['l4'];
$ee5=$_REQUEST['l5'];
$ee6=$_REQUEST['l6'];
$ee7=$_REQUEST['l7'];
$ee8=$_REQUEST['l8'];
$ee9=$_REQUEST['l9'];
$ee10=$_REQUEST['l10'];
$ee11=$_REQUEST['l11'];
$ee12=$_REQUEST['l12'];
$ee13=$_REQUEST['l13'];
$ee14=$_REQUEST['l14'];
$ee15=$_REQUEST['l15'];
$ee16=$_REQUEST['l16'];
$ee17=$_REQUEST['l17'];
$ee18=$_REQUEST['l18'];
$ee19=$_REQUEST['l19'];
$ee20=$_REQUEST['l20'];
$ee21=$_REQUEST['l21'];
$ee22=$_REQUEST['l22'];
$ee23=$_REQUEST['l23'];
$ee24=$_REQUEST['l24'];
$ee25=$_REQUEST['l25'];
$ee26=$_REQUEST['l26'];
$ee27=$_REQUEST['l27'];
$ee28=$_REQUEST['l28'];
$ee29=$_REQUEST['l29'];


	$que=mysqli_query($con,"insert into lms_table (lead_source,lead_status,sales_director,sales_director_code,sales_vp,sales_vp_code,sales_zsh,sales_zsh_code,sales_manager,sales_manager_code,
	sales_executive,sales_executive_code,sales_associate,sales_associate_code,sales_subassociate,sales_subassociate_code,customer_name,contact_no,alternate_contact_no,
	customer_email,customer_budget,visiting_at,visit_address,customer_address,branch_name,branch_code,property_classification,required_property_type,property_required_location) values('$ee1',
	'$ee2','$ee11','$ee12','$ee13','$ee14','$ee15','$ee16','$ee17','$ee18','$ee19','$ee20','$ee21','$ee22','$ee23','$ee24','$ee3','$ee4','$ee5','$ee6','$ee7','$ee8'
	,'$ee9','$ee10','$ee27','$ee28','$ee29','$ee25','$ee26')");
	if($que)
	{
	echo "<div class='alert alert-success'>Employee Successfully Added..manage</div>";
	}

//echo $e1;

?>