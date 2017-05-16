<?php
$month=$_POST['month'];

$amount=$_POST['amount'];
//echo $amount;

include("config.php");

mysqli_query($con,"INSERT INTO amount VALUES ('','$month','$amount')");
echo "Expense Assigned ";
?>