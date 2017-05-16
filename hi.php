
<?php 

$idg = $_POST['eid'];
$ids = $_POST['id'];
/*if($_POST['sub']){
	$check = $_POST['check'];
	
		foreach($check as $ch)
		{
			echo $ch."<br>";
		}
}*/
//echo $ids;
//echo $idg;
?>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
		 <script src="js/jquery.cookies.js"></script>
</head>
<body>
<input type="hidden" value="<?php echo $idg; ?>" id="idt">
<input type="hidden" value="<?php echo $ids; ?>" id="idf">

<script>
$(document).ready(function(){
		var id = $('#idt').val();
		//alert(id);
		var eid = $('#idf').val();
		//alert(eid);
	
var dataString='id='+ id + '&eid='+eid;
$.ajax({
type: "POST",
url: "ajax.php",
data: dataString ,
success: function (result) { 
			
          location='manage-lms.php?msg=Lead Assigned';
		
}
});
 });


</script>

</body>
</html>
		