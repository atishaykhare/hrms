<?php 
session_start();
if(!empty($_SESSION['username']))
{
include('config.php');
extract($_POST);
if(isset($_POST['submit']))
{   
 require_once "msallenexcel.php"; 
    $xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] ); 
    list($cols,) = $xlsx->dimension(); 
    foreach( $xlsx->rows() as $k => $r)

	{ 
	$employee_code =  ( (isset($r[1])) ? $r[1] : '&nbsp;' );
	$employee_first_name =  ( (isset($r[2])) ? $r[2] : '&nbsp;' );
	$gender =  ( (isset($r[3])) ? $r[3] : '&nbsp;' );
	$joiningdate =  ( (isset($r[4])) ? $r[4] : '&nbsp;' );
	$status =  ( (isset($r[5])) ? $r[5] : '&nbsp;' );
	$lwp =  ( (isset($r[6])) ? $r[6] : '&nbsp;' );
	$designation =  ( (isset($r[7])) ? $r[7] : '&nbsp;' );
	$department =  ( (isset($r[8])) ? $r[8] : '&nbsp;' );
	$branch =  ( (isset($r[9])) ? $r[9] : '&nbsp;' );
	$reporting_head =  ( (isset($r[10])) ? $r[10] : '&nbsp;' );
	$basic =  ( (isset($r[11])) ? $r[11] : '&nbsp;' );
	$hra =  ( (isset($r[12])) ? $r[12] : '&nbsp;' );
	$conveyance =  ( (isset($r[13])) ? $r[13] : '&nbsp;' );
	$other_allowance =  ( (isset($r[14])) ? $r[14] : '&nbsp;' );
	$total_salary =  ( (isset($r[15])) ? $r[15] : '&nbsp;' );
	$epf =  ( (isset($r[16])) ? $r[16] : '&nbsp;' );
	$esic =  ( (isset($r[17])) ? $r[17] : '&nbsp;' );
	$contacts =  ( (isset($r[18])) ? $r[18] : '&nbsp;' );
	$panno =  ( (isset($r[19])) ? $r[19] : '&nbsp;' );
	$officallyemail =  ( (isset($r[20])) ? $r[20] : '&nbsp;' );
	$dob =  ( (isset($r[21])) ? $r[21] : '&nbsp;' );
	$fathername =  ( (isset($r[22])) ? $r[22] : '&nbsp;' );
	$mothername =  ( (isset($r[23])) ? $r[23] : '&nbsp;' );
	$marrital_status =  ( (isset($r[24])) ? $r[24] : '&nbsp;' );
	$spousename =  ( (isset($r[25])) ? $r[25] : '&nbsp;' );
	$permaaddress =  ( (isset($r[26])) ? $r[26] : '&nbsp;' );
	$correspondenceaddress =  ( (isset($r[27])) ? $r[27] : '&nbsp;' );
	$bank_account_name =  ( (isset($r[28])) ? $r[28] : '&nbsp;' );
	$account_no =  ( (isset($r[29])) ? $r[29] : '&nbsp;' );
	$bank_name =  ( (isset($r[30])) ? $r[30] : '&nbsp;' );
	$branch =  ( (isset($r[31])) ? $r[31] : '&nbsp;' );
	$ifsc_code =  ( (isset($r[32])) ? $r[32] : '&nbsp;' );
	$offer_letter_status =  ( (isset($r[33])) ? $r[33] : '&nbsp;' );
	$appointment_status =  ( (isset($r[34])) ? $r[34] : '&nbsp;' );
	
//echo $employee_code;
$sql = mysqli_query($con,"INSERT INTO `add_employee`(`employee_code`, `employee_first_name`,`gender`, `joining_date`, `employee_status`, `lwp`, `employee_designation`, `employee_department`, `employee_branch_name`, `employee_underwriter`, `basic_amount`, `hra`, `conveyance`, `other_allo`, `total_salary`, `pf_number`, `esic`, `employee_mobile_no`, `pan_no`, `offically_email_id`, `dob`, `father_name`, `mother_name`, `marital_status`, `spouse_name`, `employee_address`, `perma_address`, `account_no`, `bank_name`, `branch`, `ifsc_code`, `offer_letter_status`, `appointment_letter_status`) 
VALUES ('$employee_code','$employee_first_name','$gender','$joiningdate','$status','$lwp','$designation','$department','$branch','$reporting_head','$basic','$hra','$conveyance','$other_allowance','$total_salary','$epf','$esic','$contacts','$panno','$officallyemail','$dob','$fathername','$mothername','$marrital_status','$spousename','$permaaddress','$correspondenceaddress','$account_no','$bank_name','$branch','$ifsc_code','$offer_letter_status','$appointment_status')");
	}
			if(@$sql)
		{
			$err= "<div class='alert alert-success'>Your File Succesfully Uploaded !</div>";
		}
		else
		{
			$err= "<div class='alert alert-danger'>Sorry! There is some problem.</div>";
		}
		header('refresh:1');
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
				    <link href="css/style.default.css" rel="stylesheet">    
			<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->

		 <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/city-autocomplete.css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>


		<!--    This is the offline CSS File           <link href="css/style.default.css" rel="stylesheet">      -->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		
    </head>

    <body>
        
       <?php include('include/headerlms.php');?>
        
        <section>
            <?php include('include/sidebarlms.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <a href=""><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
									<li><a href="admindashboard_lms.php">Home</a></li>
                                    <li>Export Details</li>
                                </ul>
                                <h4>Export Details</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err; ?></div>
					</div>
				       <div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Dowload Employee Details : </h5>
					</div>
					</div>   
							<!--<div class="row paddtop" style="margin-top:20px">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label" class="col-sm-4 control-label"><b>Upload Employee Details :</b> <span style="color:red;">*</span></label>
													</div>
												</div>
												<div class="col-sm-3 col-xs-2">
                                                <div class="form-group">
                                                    <input type="file" name="file" style="height:35px;" id="e12"   class="form-control" placeholder="VAT No" />
													</div>
												</div>		
						</div>-->
						
						<!--<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<input type="submit" class="btn btn-success button1" name="submit" id="submit" value="Submit">
											<input type="reset" class="btn btn-danger resetbutt" value="Reset All">
                                                </div>
						</div>-->
						<!--<div class="row paddtop" style="margin-top:20px">
                                            <div class="col-sm-4" style="padding-left:15px">
											<h5 style="font-weight:bold;">NOTE <span style="color:red;">*</span></h5>
   												1. Download the format <a href="add_employees.xlsx">click here</a></br>
												</div>
                           </div>-->
                       <!--  <div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												2. Download Employee Details <a href="download2.php">click here</a></br>
												
												</div>
                                                												
						</div>	-->					   
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-4" style="padding-left:15px">
											     
											
   												1. Download LMS Details <a href="download/download3.php">click here</a></br>
												
												</div>												
						</div>
					<!--	<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												4. Download Company Details <a href="download4.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												5. Download Associate Employee Details <a href="download5.php">click here</a></br>
												
												</div>												
						</div>-->
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												2. Download Provisional Quotation Details <a href="download/download6.php">click here</a></br>
												
												</div>												
						</div>
						<!--<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												7. Download Apply Leave Details <a href="download7.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												8. Download Add Branch Details <a href="download8.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												9. Download Add Category Details <a href="download9.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												10. Download Add Com Details <a href="download10.php">click here</a></br>
												
												</div>												
						</div>-->
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												3. Download Add Property Location Details <a href="download/download11.php">click here</a></br>
												
												</div>	
                                                 <div class="col-sm-6" style="padding-right:15px">
											     
											
   												3. Download Add Property Location Details <a href="download_pdf/pdf_add_property_location.php">PDF</a></br>
												
												</div>													
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												4. Download Add Property Type Details <a href="download/download12.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-4" style="padding-left:15px">
											     
											
   												5. Download Admin Details <a href="download/download13.php">click here</a></br>
												
												</div>												
						</div>
						<!--<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												14. Download Associate Designation Details <a href="download14.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												15. Download Attendance Details <a href="download15.php">click here</a></br>
												
												</div>												
						</div>-->
						<!--<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-4" style="padding-left:15px">
											     
											
   												6. Download Charts Details <a href="download16.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												17. Download Department Details <a href="download17.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												18. Download Mark comp off Details <a href="download18.php">click here</a></br>
												
												</div>												
						</div>
						<div class="row paddtop" style="margin-top:20px">
                                                <div class="col-sm-6" style="padding-left:15px">
											     
											
   												7. Download Total Lead Details <a href="download19.php">click here</a></br>
												
												</div>-->	

                                           

												
						</div>
						
						</form>
                        <!--   form end   -->
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
		
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
			$('#l12').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->

		<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
			
            $('#l1,#l2,#l3,#l4,#l5,#l6,#l7,#l8,#l9,#l10,#l11,#l12,#l13,#l14,#l15,#l16,#l17,#l18,#l19,#l20,#l21,#l22,#l23,#l24,#l25,#l26,#l27,#l28,#l29,#l34,#l39,#l44,#l49,#l54').each(function () {
                if ($.trim($(this).val()) == '') {
                    isValid = false;
                    $(this).css({
                       // "border": "1px solid red",
                        "background": "#FFCECE"
                    });
                }
                else {
                    $(this).css({
                        "border": "",
                        "background": ""
                    });
                }
            });
            if (isValid == false)
                e.preventDefault();

        });
});
		</script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/jquery-jvectormap-us-aea-en.js"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/gmaps.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function(){
                
                new GMaps({
                    div: '#gmap',
                    lat: -12.043333,
                    lng: -77.028333
                });
                
                var map_marker = new GMaps({
                    div: '#gmap-marker',
                    lat: -12.043333,
                    lng: -77.028333
                });
                
                map_marker.addMarker({
                    lat: -12.043333,
                    lng: -77.028333,
                    click: function(e) {
                      alert('You clicked in this marker');
                    }
                });
                
                jQuery('#vectormap-world').vectorMap({
                    map: 'world_mill_en',
                    regionStyle: {
                        initial: {
                            fill: '#a5a7aa'
                        },
                        hover: {
                            fill: '#6e7072'
                        }     
                    },
                    backgroundColor: '#fff'
                });
                
                jQuery('#vectormap-country').vectorMap({
                    map: 'us_aea_en',
                    regionStyle: {
                        initial: {
                            fill: '#a5a7aa'
                        },
                        hover: {
                            fill: '#6e7072'
                        }     
                    },
                    backgroundColor: '#fff'
                });
                
            });
        </script>
    </body>
</html>
<?php
}
else
{	
	header('location:index.php');
}
?>
