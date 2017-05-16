<?php 
session_start();
if(!empty($_SESSION['username']))
{
	include('config.php');
$que=mysqli_query($con,"select count(*) from add_employee ");
$res=mysqli_fetch_array($que);

$quee=mysqli_query($con,"select count(*) from add_associate_employee ");
$ress=mysqli_fetch_array($quee);

$queee=mysqli_query($con,"select count(*) from lms_table ");
$resss=mysqli_fetch_array($queee);

$user_name=$_SESSION['username'];
//echo $user_name;

$que11=mysqli_query($con,"Select * from reminder where name = '$user_name' ");
date_default_timezone_set('Asia/Kolkata');
/*function get_date($time=null, $format='Y-m-d H:i:')
{
    if(empty($time))return date($format);
    return date($format, strtotime($time));
}

// Example #1: Return current date in default format
$curdate = get_date(); 
$date = get_date("+5 minutes"); 
echo $curdate;
*/

$curdate= date("Y-m-d H:i:s " , strtotime("+5 minutes")) ;
//echo $curdate . "<br>";
$curdate1=date("Y-m-d");
$jan=0;
$feb=0;
$mar=0;
$apr=0;
$may=0;
$jun=0;
$jul=0;
$aug=0;
$sep=0;
$oct=0;
$nov=0;
$dec=0;
$chart_bar=mysqli_query($con,"Select Date from lms_table");
while($total=mysqli_fetch_array($chart_bar))
{
	$total_no=$total['Date'];

//print_r($total_no);
switch ($total_no) {
    case "01":
        $jan = $jan + 1;
        break;
    case "02":
        $feb = $feb + 1;
        break;
    case "03":
        $mar = $mar + 1;
        break;
	case "04":
        $apr = $apr + 1;
        break;
    case "05":
        $may = $may + 1;
        break;
    case "06":
        $jun = $jun + 1;
        break;
    case "07":
        $jul = $jul + 1;
        break;
    case "08":
        $aug = $aug + 1;
        break;
    case "09":
        $sep = $sep + 1;
        break;
    case "10":
        $oct = $oct + 1;
        break;
    case "11":
        $nov = $nov + 1;
        break;
    case "12":
        $dec = $dec + 1;
        break;
    
    default:
        echo "";
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LMS Admin Panel</title>

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
				    <!--<link href="css/lms-style.css" rel="stylesheet">   -->
<?php
include('css/lms-style.php');
?>					
		    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 550, height: 350});
    }

    </script>
    </head>

    <body>
    
       <?php include('include/headerlms.php');?> 
        <section>
        <?php include('include/sidebarlms.php');?>
                
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
<!--
                            <div class="pageicon pull-left">
                              <a href="admindashboard_lms.php"> 
                              <i style="color:white" class="fa fa-home"></i></a>
                            </div>
-->
                            <div class="media-body mediabody1" >
<!--
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard_lms.php">Dashboard</a></li>
                                </ul>
-->
                                <h4 style="float:left">Dashboard</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
         <div class="background">
	
	<div class="card">
		<div class="photo"></div>
		<h2>TOTAL</h2>
		<p>THIS YEAR</p>
		<div class="chart">
			<div class="bar bar1"><span><?php echo $jan; ?></span></div>
			<div class="bar bar2"><span><?php echo $feb; ?></span></div>
			<div class="bar bar3"><span><?php echo $mar; ?></span></div>
			<div class="bar bar4"><span><?php echo $apr; ?></span></div>
			<div class="bar bar5"><span><?php echo $may; ?></span></div>
			<div class="bar bar6"><span><?php echo $jun; ?></span></div>
			<div class="bar bar7"><span><?php echo $jul; ?></span></div>
			<div class="bar bar8"><span><?php echo $aug; ?></span></div>
			<div class="bar bar9"><span><?php echo $sep; ?></span></div>
			<div class="bar bar10"><span><?php echo $oct; ?></span></div>
			<div class="bar bar11"><span><?php echo $nov; ?></span></div>
			<div class="bar bar12"><span><?php echo $dec; ?></span></div>
		</div>
		<h3>LEADS</h3>
	</div>
	
	<div class="info">Click to toggle details view</div>
</div>
		  
		<!--<script src='js/zbvakw.js'></script>	-->
<script src="js/lms-index.js"></script>		
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
      
        <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
		<?php
 
    //include database connection
    include 'config.php';
 
    //query all records from the database
    $query = "select * from total_lead";
 
    //execute the query
    $result = mysqli_query($con,$query );
 
    //get number of rows returned
    $num_results = $result->num_rows;

 
    ?>

      <script src="js/canvasjs.min.js"></script>
       
       <!--
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
-->
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/dashboard.js"></script>

    </body>
</html>
<?php
$a=0;
while($row_member1 = mysqli_fetch_array($que11,MYSQL_BOTH))
		                 {
						   $rem_id = $row_member1['rem_id'];
						   $name = $row_member1['name'];
						   $msg = $row_member1['msg'];
						   $date = $row_member1['date'];
						   $check1 = $row_member1['check'];
						   $url = $row_member1['url'];
						   //echo $rem_id . "<br>";
						   
						  // echo $name . "<br>";
						   
						   //echo $msg . "<br>" ;
						   
						  // echo $date  . "<br>";
						 //  echo $check1 . "<br>";
						  // echo $user_name . "<br>";
						  
						   if($name == $user_name)
						   {
								if($date <= $curdate && $check1 == '0')
								{
								
								echo  "<script type='text/javascript'>
										
										setTimeout(function(){alert(' $msg  $name  ')}, 2000);
										setTimeout(function(){window.location = ('$url')},2000);
									   </script>";
									//echo "DONE";
									mysqli_query($con,"Update reminder set `check` = 1 Where rem_id = '$rem_id'");
								}
						   }
						   $a++;
						 }
}
else
{	
	header('location:index.php');
}
?>