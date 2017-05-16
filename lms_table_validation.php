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

        <title>LMS Admin Panel</title>
		 <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/morris.css" rel="stylesheet">
        <link href="http://themepixels.com/demo/webpage/chain/css/select2.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		<script>
		function chkeid()
{
var e=document.getElementById("l6").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<4 || dotpos<atpos+3)
{
alert("Invalid Email Format");
}
else
{
document.getElementById("error").innerHTML="";
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
	
	
function insertlms()
{
	var l1 = $('#l1').val();
	var l2 = $('#l2').val();
	var l3 = $('#l3').val();
	var l4 = $('#l4').val();
	var l5 = $('#l5').val();
	var l6 = $('#l6').val();
	var l7 = $('#l7').val();
	var l8 = $('#l8').val();
	var l9 = $('#l9').val();
	var l10 = $('#l10').val();
	var l11 = $('#l11').val();
	var l12 = $('#l12').val();
	var l13 = $('#l13').val();
	var l14 = $('#l14').val();
	var l15 = $('#l15').val();
	var l16 = $('#l16').val();
	var l17 = $('#l17').val();
	var l18 = $('#l18').val();
	var l19 = $('#l19').val();
	var l20 = $('#l20').val();
	var l21 = $('#l21').val();
	var l22 = $('#l22').val();
	var l23 = $('#l23').val();
	var l24 = $('#l24').val();
	var l25 = $('#l25').val();
	var l26 = $('#l26').val();
	var l27 = $('#l27').val();
	var l28 = $('#l28').val();
	var l29 = $('#l29').val();



if(l1==""||l2==""||l3==""||l4==""||l5==""||l6==""||l7==""||l8==""||l9==""||l10==""||l11==""||l12==""||l13==""||l14==""||l15==""||l16==""||l17==""||l18==""||l19==""||l20==""||l21==""||l22==""||l23==""||l24==""||l25==""||l26==""||l27==""||l28==""||l29=="")
{
	//document.getElementById("error").innerHTML="<div class='alert alert-danger'>* Please Fill The All Fields</div>";
	alert("Please Fill The All Fields");
	return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("error").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","insertlms.php?l1="+l1+"&l2="+l2+"&l3="+l3+"&l4="+l4+"&l5="+l5+"&l6="+l6+"&l7="+l7+"&l8="+l8+"&l9="+l9+"&l10="+l10+"&l11="+l11+"&l12="+l12+"&l13="+l13+"&l14="+l14+
"&l15="+l15+"&l16="+l16+"&l17="+l17+"&l18="+l18+"&l19="+l19+"&l20="+l20+"&l21="+l21+"&l22="+l22+"&l23="+l23+"&l24="+l24+"&l25="+l25+"&l26="+l26+"&l27="+l27+"&l28="+l28+"&l29="+l29,true);
xmlhttp.send();
}
</script>
    </head>

    <body>
        
       <?php include('include/header.php');?>
        
        <section>
            <?php include('include/sidebar.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-bars"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href="lms_table.php"><i class="fa fa-table" aria-hidden="true"></i></a></li>
                                    <li>LMS Table</li>
                                </ul>
                                <h4>LMS Table</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<div class="row">
					<div class="col-sm-6" id="error"></div>
					</div>
					<div class="row">
											<div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Lead Type :</b> <span style="color:red;">*</span></label>
													</div>
													</div>
													<div class="col-sm-2">
                                                    <div class="checkbox block"><label><input type="checkbox"> Direct Sales <span style="color:red;">*</span> </label></div>
                                  			    </div>
												<div class="col-sm-2">
												<div class="checkbox block"><label><input type="checkbox"> Channel Sales </label></div>
												</div><!-- form-group -->
					</div>
                    
					
					<div class="row">
					<div class="col-sm-12" style="height:30px;color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5>Customer Details : </h5>
					</div>
					</div>
					 <div class="row" >
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Name :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_name" style="height:35px;" id="l3" class="form-control" placeholder="Customer Name" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="customer_contact_no" style="height:35px;" onkeypress="return isNumber(event)" id="l4" class="form-control" placeholder="Customer Contact No."/>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 --> 
											<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Alternate Contact No. :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="alernate_contact_no" style="height:35px;" onkeypress="return isNumber(event)" id="l5" class="form-control" placeholder="Alternate Contact No."/>
                                                </div><!-- form-group -->
                                            </div>	
												
						</div>
						<div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Email :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="customer_email" id="l6" style="height:35px;" onblur="chkeid()" class="form-control" placeholder="Customer Email"/>
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-4">
											<div class="form-group">
                                                    <label class="control-label"><b>Customer Address :</b> <span style="color:red;">*</span></label>
													<textarea class="form-control" rows="3" name="customer_address" id="l10" placeholder="Customer Address"></textarea>
												</div>
                                                </div><!-- col-sm-6 -->   
													<div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="email" name="customer_email" id="l6" style="height:35px;"  class="form-control" placeholder="Customer Code"/>
                                                </div><!-- form-group -->
                                            </div>
						</div>
						<div class="row">
					<div class="col-sm-12" style="height:30px;color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5> Lead Allocation : </h5>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Executive :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_executive" id="l19">
													<option value="">Select Executive</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Executive Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_executive_code" style="height:35px;" name="l20" class="form-control" placeholder="Sales Executive Code"/>
                                                </div><!-- form-group -->
                                                </div>
												  <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Manager :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_manager" id="l17">
													<option value="">Select Manager</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Manager Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_manager_code" style="height:35px;" id="l18" class="form-control" placeholder="Sales Manager Code"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 
					</div>
					<div class="row">
                                          
													
						</div>
							<div class="row">
                                            
											<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales ZSH :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_zsh" id="l15">
													<option value="">Select ZSH</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales ZSH Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_zsh_code" style="height:35px;" id="l16" class="form-control" placeholder="Sales ZSH Code"/>
                                                </div><!-- form-group -->
                                                </div>	
<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales VP :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_vp" id="l13">
													<option value="">Select VP</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales VP Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_vp_code" style="height:35px;"id="l14" class="form-control" placeholder="Sales VP Code"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 --> 												
						</div>
							<div class="row">
                                            
									
											 <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Director :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_director" id="l11">
													<option value="">Select Director</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Director Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_director_code" style="height:35px;" id="l12" class="form-control" placeholder="Sales Director Code"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->   														
						</div>
						<div class="row">
					<div class="col-sm-12" style="height:30px;color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5>Sales Associate Allocation Details : </h5>
					</div>
					</div>
                        						
						<div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Associate :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_associate" id="l21">
													<option value="">Select Associate</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Associate Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_associate_code" style="height:35px;" id="l22" class="form-control" placeholder="Sales Associate Code"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->    
													 <div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Sales Subassociate :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;" name="sales_subassociate" id="l23">
													<option value="">Select Subassociate</option>
													<option value="1">Sanjay Kumar</option>
													<option value="2">Ajit Singh</option>
													<option value="2">Mohit Singh</option>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Sales Subassociate Code :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="sales_subassociate_code" style="height:35px;" id="l24" class="form-control" placeholder="Sales Subassociate Code"/>
                                                </div><!-- form-group -->
                                                </div><!-- col-sm-6 -->   
						</div>
						<div class="row">
					<div class="col-sm-12" style="height:30px;color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5> Customer Requirement Details : </h5>
					</div>
					</div>
						
						
						 <div class="row">
						 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Required Property Type :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="required_property_type" style="height:35px;" id="l25" class="form-control" placeholder="Required Property Type" />
                                                </div><!-- form-group -->
                                            </div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Property Required Location :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="property_required_location" style="height:35px;" id="l26" class="form-control" placeholder="Property Required Location"/>
                                                </div><!-- form-group -->
                                            </div>		
								
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Customer Budget  :</b> <span style="color:red;">*</span></label>
													<div class="row">
													<div class="col-sm-3">
                                                    <input type="text" name="customer_budget" id="l7" style="height:35px;" class="form-control" placeholder="Min" />
														</div>	
													<div class="col-sm-3">

													<input type="text" name="customer_budget" id="l7" style="height:35px;" class="form-control" placeholder="Max" />
													</div>
													</div>
												</div><!-- form-group -->
                                            </div>
											 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>Lead Source :</b> <span style="color:red;">*</span></label>
                                                    <input type="text" name="lead_source" style="height:35px;" id="l1" class="form-control" placeholder="Lead Source" />
                                                </div><!-- form-group -->
                                            </div>
											
                                            
											<!-- col-sm-6 --> 
																				
						</div>

						<div class="row">
											<div class="col-sm-3">
                                                <div class="form-group">
												<label><b>Lead Status :</b> <span style="color:red;">*</span></label>
												<select class="form-control select1" style="height:35px;"id="l2">
													<option value=""  selected="selected">Select Status</option>
													<option value="1">Hot </option>
													<option value="2">Warm</option>
													<option value="3">Close</option>
													<option value="4">Follow UP</option>
												</select>
											</div><!-- form-group -->
                                            </div>
										           
						</div>
						
						
						<div class="row">
											<div class="col-sm-offset-4 col-sm-4 ">
											<button type="button" class="btn btn-success" onclick="insertlms()">Submit</button>
											<button type="reset" class="btn btn-danger">Reset All</button>
                                                </div>
						</div>
						
                        
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
