<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','eyesoefq_lms');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM add_employee WHERE e_id = '".$q."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
   
    $id= $row['e_id'];
echo $id;
	}

 
?>
<input type="text" name="sales_associate_code" style="height:35px;" id="l22" class="form-control" value="<?php $id; ?>"; readonly placeholder="Sales Associate Code"/>
</body>
</html>