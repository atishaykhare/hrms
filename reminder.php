<?php
session_start();
if(!empty($_SESSION['username']))
{
	include('config.php');
	
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Reminder</title>

        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
				    <link href="css/style.default.css" rel="stylesheet">    
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
	<script type="text/javascript">
function chkAplha(event,err)
	{
		if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8 || event.which==32))
		{
			 alert("Please enter character only.");return false;
		}
			else
			  {
				  document.getElementById(err).innerHTML=" ";
			  }
	}
	
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter only Numbers.");
            return false;
        }

        return true;
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
                            <div class="pageicon pull-left">
                               <a href="lms_table.php"> <i class="fa fa-bars"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
									 <li><a href="admindashboard_lms.php">Home</a></li>
                                    <li>Reminder</li>
									<li><a href="download/download.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Reminder Details</span></a></li>
                                </ul>
                                <h4>Reminder</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form action="code.php" method="post">
					<div class="row">
					<div class="col-sm-6 text" id="error"><?php echo @$err;?></div>
					</div>
				
                    
					
					<div class="row">
					<div class="col-sm-12" style="background-color:#428BCA;" >
					<h5 style="color:white;font-weight:bold;font-size:14px; padding-top:5px; padding-bottom:5px;">Reminder Details : </h5>
					</div>
					</div>
					 <div class="row paddtop">
				
											
											<div class="col-sm-4">
											  <label class="control-label"><b>Title:</b> <span style="color:red;">*</span></label>
											<select class="form-control Select"  name="title" onChange="selmanager(this.value)" style="height:35px;text-transform:capitalize;" id="l3">
												<option selected value="">Select Title</option>
													<?php
													$que=mysqli_query($con,"select DISTINCT `title` from lms_table");
													while($r=mysqli_fetch_array($que))
													{
														$empid=$r['title'];
														echo "<option value='$empid'>".$r['title']."</option>";
													}
													?>
												</select>
												</div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Person Name :</b> <span style="color:red;">*</span></label>
                                                   <select class="form-control Select"  name="person_name" onclick="FillBilling(this.form)" style="height:35px;text-transform:capitalize;" id="l3">
												<option selected value="">Select Person</option>
													<?php
													$que=mysqli_query($con,"select  `customer_name` , `customer_no` from lms_table");
													while($r1=mysqli_fetch_array($que))
													{
														$empid1=$r1['customer_name'];
														echo "<option value='$empid1'>".$r1['customer_name']."</option>";
														$cust_no=$r1['customer_no'];
														
													}
													?>
												</select>
                                                </div><!-- form-group -->
                                            </div>
											 <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Phone No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_no" style="height:35px;text-transform:capitalize;" id="l3" class="form-control" onkeypress="return isNumber(event)" placeholder="Customer Contact No." />
                                                </div><!-- form-group -->
                                            </div>
				
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Message :</b> <span style="color:red;">*</span></label>
                                                   <textarea class="form-control" rows="2" style="text-transform:capitalize;" name="Message" id="l7" placeholder="Message"></textarea>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 --> 
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Reminder Date :</b> <span style="color:red;">*</span></label>
                                                   	 <input type="Date" name="date" style="height:35px;text-transform:capitalize;" id="l3" class="form-control" placeholder="DD/MM/YYYY" />
                                                </div><!-- form-group -->
                                            </div>	
												
						</div>
						
						
						
				
						
						
						
						

						<div class="row">
						
										           
						</div>
						
						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" class="btn btn-success button1" name="submit" value="Submit">
											<button type="reset" class="btn btn-danger resetbutt">Reset All</button>
                                                </div>
						</div>
						
                        
                    </div><!-- contentpanel -->
					</form>
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