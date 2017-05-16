<?php
//error_reporting(0);
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}

$id=$_REQUEST['id'];

//echo $id;

include('config.php');	
$que=mysqli_query($con,"select * from lms_table where lead_id = $id");		


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LMS Admin Panel</title>
<link href="css/style.default.css" rel="stylesheet">  
<link href="css/stylemanual.css" rel="stylesheet"> <!-- my css  -->
        <link href="http://themepixels.com/demo/webpage/chain/css/style.default.css" rel="stylesheet">
		      
			<link href="css/jquery.gritter.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
		<link href="css/style.datatables.css" rel="stylesheet">
        <link href="http://cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
        

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
                             <a href=""><i style="color:white" class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard_lms"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard_lms">Home</a></li>
                                    <li>Assign Lead</li>
                                </ul>
                                <h4>Assign Leads</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					
				 <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">Assign Leads :</h4>
                             
                            </div><!-- panel-heading -->
                            
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                       
										
                                        <th>Lead Type</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone No.</th>
										<th>Customer Alter No.</th>
                                        <th>Customer Email</th>
										<th>Customer Add</th>
										<th>City</th>
                                        <th>Property Type</th>
										<th>Property Location</th>
										<th>Assigned</th>
										<th>Assign To</th>
										<th>Assign</th>
										
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php
									while($res=mysqli_fetch_array($que))
								{
									$customer_name = $res['customer_name'];
									//echo $customer_name;
									?>
                                    <tr>
										<td align="center"><?php echo $res['lead_type'];?></td>
										<td align="center"><?php echo $res['customer_name'];?></td>
                                        <td align="center"><?php echo $res['customer_no'];?></td>
                                        <td align="center"><?php echo $res['customer_alter_no'];?></td>
                                        <td align="center"><?php echo $res['customer_email'];?></td>
                                        <td align="center"><?php echo $res['customer_add'];?></td>
                                        <td align="center"><?php echo $res['customer_city'];?></td>
                                        <td align="center"><?php echo $res['required_property_type'];?></td>
                                        <td align="center"><?php echo $res['property_required_location'];?></td>                                     
										<?php
										$que5=mysqli_query($con,"Select `employee_id` from assign where cust_name = '$customer_name'");
										if($res3=mysqli_fetch_array($que5))
										{
											$emp_id= $res3['employee_id'];
											//echo $emp_id;
										}
										$que6=mysqli_query($con,"Select `employee_first_name` from add_employee where employee_code = '$emp_id'");
										if($res7=mysqli_fetch_array($que6))
										{
											$emp_name= $res7['employee_first_name'];
										}
										?>
										<td align="center"><?php echo @$emp_name; ?></td>
										<form method="POST" action="assign_code.php">
										<td><select class="form-control select1 "  name="employee">
														<option selected value="">Select Employee</option>
												<?php
												$que1=mysqli_query($con,"select * from add_employee");
													while($r=mysqli_fetch_array($que1))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid'>".$r['employee_first_name']."</option>";
													}
													?>
												</select>
									</td>
										
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="lead" value="<?php echo $res['lead_type'] ?>">
										<input type="hidden" name="cust_name" value="<?php echo $res['customer_name']?>">
										<input type="hidden" name="cust_no" value="<?php echo $res['customer_no']?>">
										<input type="hidden" name="cust_alter_no" value="<?php echo $res['customer_alter_no']?>">
										<input type="hidden" name="cust_email" value="<?php echo $res['customer_email']?>">
										<input type="hidden" name="cust_add" value="<?php echo $res['customer_add']?>">
										<input type="hidden" name="cust_city" value="<?php echo $res['customer_city']?>">
										<input type="hidden" name="req_prop_type" value="<?php echo $res['required_property_type']?>">
										<input type="hidden" name="prop_req_loc" value="<?php echo $res['property_required_location']?>">
										
										<td align="center"><input type="submit" Value="Assign" class="btn btn-success button1 btn-group-sm""></td>
										</form>
									</tr>
								<?php
								}
								?>
                               
                                </tbody>
                            </table>
						
                        </div><!-- panel -->
                        </div>
						
						
                </div>
            </div><!-- mainwrapper -->
        </section>
        
        <!-- Modal -->
       


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="http://cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function(){
                
                jQuery('#basicTable').DataTable({
                    responsive: true
                });
                
                var shTable = jQuery('#shTable').DataTable({
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    responsive: true
                });
                
                // Show/Hide Columns Dropdown
                jQuery('#shCol').click(function(event){
                    event.stopPropagation();
                });
                
                jQuery('#shCol input').on('click', function() {

                    // Get the column API object
                    var column = shTable.column($(this).val());
 
                    // Toggle the visibility
                    if ($(this).is(':checked'))
                        column.visible(true);
                    else
                        column.visible(false);
                });
                
                var exRowTable = jQuery('#exRowTable').DataTable({
                    responsive: true,
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                    },
                    "ajax": "ajax/objects.txt",
                    "columns": [
                        {
                            "class":          'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "name" },
                        { "data": "position" },
                        { "data": "office" },
                        { "data": "salary" }
                    ],
                    "order": [[1, 'asc']] 
                });
                
                // Add event listener for opening and closing details
                jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = exRowTable.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                });
               
                
                // DataTables Length to Select2
                jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                jQuery('div.dataTables_length select').css({width: '60px'});
                jQuery('div.dataTables_length select').select2({
                    minimumResultsForSearch: -1
                });
    
            });
            
            function format (d) {
                // `d` is the original data object for the row
                return '<table class="table table-bordered nomargin">'+
                    '<tr>'+
                        '<td>Full name:</td>'+
                        '<td>'+d.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extension number:</td>'+
                        '<td>'+d.extn+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extra info:</td>'+
                        '<td>And any further details here (images etc)...</td>'+
                    '</tr>'+
                '</table>';
            }
        </script>
    </body>
</html>

