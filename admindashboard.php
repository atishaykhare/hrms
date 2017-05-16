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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HRMS Admin Panel</title>
         <link href="css_chart/bootstrap.css" rel="stylesheet">
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
				   
				    <link href="css/stylechart.css" rel="stylesheet">    
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
   /*  
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
      chart.draw(data, {width: 800, height: 350});
    } */

    </script>
	  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
     

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>

    <body>
    <?php include ('employee_chart.php');?>
       <?php include('include/header.php');?> 
        <section>
        <?php include('include/sidebar.php');?>
             
                <div class="mainpanel">
                    <div class="pageheader" >
                        <div class="media">
                            <div class="pageicon pull-left">
                              <a href="admindashboard.php">  <i style="color:white" class="fa fa-home"></i></a>
                            </div>
                            <div class="media-body mediabody1"  >
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Dashboard</a></li>
                                </ul>
                                <h4>Dashboard</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                    <!-- <div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Overviews : </h5>
					</div>
					</div> -->  
		   <div class="row">
		    <center><h4>Employee</h4></center>
                <div class="col-lg-12">                  
                        <div class="panel panel-primary">
						 <div class='chart' id='p1'>
    <canvas id='c1'></canvas>
  </div>
					<!--	<div id="chartContainer" style="height: 400px; width: 100%;"></div>-->
                           <!-- <div class="panel-heading">
                                <h3 class="panel-title color"><i class="fa fa-long-arrow-right"></i>Employee</h3>
								
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>                      
                            </div>-->
                        </div>                   
                </div>
                </div>
                        <div class="row row-stat">
                            <div class="col-md-6">
                                <div class="panel panel-success-alt noborder">
                                    <div class="panel-heading noborder">
                                     
                                        <div class="panel-icon"><a href="manage_employee.php"><i class="fa fa-users"></i></a></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin">Total Employee</h5>
                                            <h1 class="mt5"><?php echo $res['count(*)']; ?></h1>
                                        </div><!-- media-body -->
                        <!--                  <hr>
                                      <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Yesterday</h5>
                                                <h4 class="nomargin">$29,009.17</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">This Week</h5>
                                                <h4 class="nomargin">$99,103.67</h4>
                                            </div>
                                        </div>                                  -->
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                     <div class="col-md-6">
                                <div class="panel panel-primary noborder">
                                    <div class="panel-heading noborder">
                                        
                                           <div class="panel-icon"><a href="manage-associate.php"><i class="fa fa-users"></i></a></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin">Total Associate</h5>
                                            <h1 class="mt5"><?php echo $ress['count(*)']; ?></h1>
                                        </div><!-- media-body -->
                   <!--                 <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Yesterday</h5>
                                                <h4 class="nomargin">10,009</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">This Week</h5>
                                                <h4 class="nomargin">178,222</h4>
                                            </div>
                                        </div>
                                        -->
                                    </div><!-- panel-body -->
                          </div><!-- panel -->
                     </div>
                            
                  <!--  <div class="col-md-4">
                                <div class="panel panel-dark noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns">
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                               <!-- <div class="panel-icon"><a href="manage-lms.php"><i class="fa fa-lastfm"></a></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin">Total Lead</h5>
                                            <h1 class="mt5"><?php// echo $resss['count(*)']; ?></h1>
                                        </div>-->
										<!-- media-body -->
							<!--      <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Yesterday</h5>
                                                <h4 class="nomargin">144,009</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">This Week</h5>
                                                <h4 class="nomargin">987,212</h4>
                                            </div>
                                        </div>
                                        -->
                                  <!--  </div>
								</div>
                     </div>  -->
                        </div><!-- row -->
						
    
					
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
<!--<script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Employee"
				},
				data: [{
					type: "column",
					dataPoints: [
						{ y: <?php if(!@$jan){echo "0";}else{echo $jan;} ?>, label: "January" },
						{ y: <?php if(!@$feb){echo "0";}else{echo $feb;} ?>, label: "Febuary" },
						{ y: <?php if(!@$mar){echo "0";}else{echo $mar;} ?>, label: "March" },
						{ y: <?php if(!@$apr){echo "0";}else{echo $apr;} ?>, label: "April" },
						{ y: <?php if(!@$may){echo "0";}else{echo $may;} ?>, label: "May" },
						{ y: <?php if(!@$june){echo "0";}else{echo $june;} ?>, label: "June" },
						{ y: <?php if(!@$july){echo "0";}else{echo $july;} ?>, label: "July" },
						{ y: <?php if(!@$aug){echo "0";}else{echo $aug;} ?>, label: "August" },
						{ y: <?php if(!@$sep){echo "0";}else{echo $sep;} ?>, label: "September" },
						{ y: <?php if(!@$oct){echo "0";}else{echo $oct;} ?>, label: "October" },
						{ y: <?php if(!@$nov){echo "0";}else{echo $nov;} ?>, label: "November" },
						{ y: <?php if(!@$dec){echo "0";}else{echo $dec;} ?>, label: "December" },
						
					]
				}]
			});
			chart.render();
		}
	</script>-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js'></script>

    <script>
	var c1 = document.getElementById("c1");
var parent = document.getElementById("p1");
c1.width = parent.offsetWidth - 40;
c1.height = parent.offsetHeight - 40;

var data1 = {
  labels : ["January","Feburary","March","April","May","June","July","August","September","October","November","December"],
  datasets : [
    {
      fillColor : "rgba(255,255,255,.1)",
      strokeColor : "rgba(255,255,255,1)",
      pointColor : "#123",
      pointStrokeColor : "rgba(255,255,255,1)",
      data : [<?php if(!@$jan){echo "0";}else{echo $jan;} ?>,<?php if(!@$feb){echo "0";}else{echo $feb;} ?>,<?php if(!@$mar){echo "0";}else{echo $mar;} ?>,<?php if(!@$apr){echo "0";}else{echo $apr;} ?>,<?php if(!@$may){echo "0";}else{echo $may;} ?>,<?php if(!@$jun){echo "0";}else{echo $jun;} ?>,<?php if(!@$jul){echo "0";}else{echo $jul;} ?>,<?php if(!@$aug){echo "0";}else{echo $aug;} ?>,<?php if(!@$sep){echo "0";}else{echo $sep;} ?>,<?php if(!@$oct){echo "0";}else{echo $oct;} ?>,<?php if(!@$nov){echo "0";}else{echo $nov;} ?>,<?php if(!@$dec){echo "0";}else{echo $dec;} ?>]
    }
  ]
}

var options1 = {
  scaleFontColor : "rgba(255,255,255,1)",
  scaleLineColor : "rgba(255,255,255,1)",
  scaleGridLineColor : "transparent",
  bezierCurve : false,
  scaleOverride : true,
  scaleSteps : 5,
  scaleStepWidth : 10,
  scaleStartValue : 0
}

new Chart(c1.getContext("2d")).Line(data1,options1)
	</script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js_chart/canvasjs.min.js"></script>
		<!--<script src="js_chart/raphael.min.js"></script>
		<script src="js_chart/morris.min.js"></script>-->
		
<script>
	/* $(function() {
	   Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            year: 'January',
            percent: 10
        }, {
            year: 'Febuary',
            percent: 20
        }, {
            year: 'March',
            percent: 35
        }, {
            year: 'April',
            percent: 45
        }, {
            year: 'May',
            percent: 65
        }, {
            year: 'June',
            percent: 75
        }, {
            year: 'July',
            percent: 100
        
        }, {
            year: 'August',
            percent: 60       
        }, {
            year: 'September',
            percent: 40
        }, {
            year: 'October',
            percent: 20
        }, {
            year: 'November',
            percent: 75
        }, {
            year: 'December',
            percent: 40
        }],
        xkey: 'year',
        ykeys: ['percent'],
        labels: ['Employee'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });


}); */
</script>
	
		
		
		
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/dashboard.js"></script>
		
		
    </body>
</html>
<?php
}
else
{	
	header('location:index.php');
}
?>