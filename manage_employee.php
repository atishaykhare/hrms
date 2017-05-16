<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');
extract($_POST);
$under_name=mysqli_query($con,"select * from add_employee");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HRMS Admin Panel</title>
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
        <?php include('include/header.php');?>        
        <section>
            <?php include('include/sidebar.php');?>    
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                             <a href=""><i style="color:white" class="fa fa-edit"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Manage Employee</li>
                                </ul>
                                <h4>View Employee</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
				 <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">Manage Employee :</h4>
                             
                            </div><!-- panel-heading -->
                            
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Employee Department</th>
                                        <th>Employee Designation</th>
                                        <th>Employee Underwriter</th>
                                        <th>Branch Name</th>
										<th>Active</th>
										<th>Edit</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php
								$que=mysqli_query($con,"select * from add_employee");
								
								
						while($res=mysqli_fetch_array($que))
						{
							$id=$res['employee_code'];
							
							
							$underwriter_code=$res['employee_underwriter'];
								$quee=mysqli_query($con,"select * from add_employee where employee_code='$underwriter_code'");
                                $ress=mysqli_fetch_array($quee);
							
								?>
								
                                    <tr>
                                        <td align="center"><?php echo $res['employee_code']; ?></td>
                                        <td align="center"><?php echo $res['employee_first_name']." ".$res['employee_last_name']; ?></td>
                                        <td align="center"><?php echo $res['employee_department']; ?></td>
                                        <td align="center"><?php echo $res['employee_designation']; ?></td>
                                        <td align="center"><?php echo $ress['employee_first_name']." ".$ress['employee_last_name']; ?></td>
                                        <td align="center"><?php echo $res['employee_branch_name']; ?></td>
										<?php
										if($res['employee_status']==1)
										{
											?>
											<td align="center"> <a class="tooltips" data-toggle="tooltip" title="Active" href="employee_active.php?emp_id='<?php echo $id; ?>'&id=2"><i class="fa fa-user text-success"></i></a></td>
											<?php
										} else
										{
										?>
										 <td align="center"> <a  class="tooltips" data-toggle="tooltip" title="Inactive" href="employee_active.php?emp_id='<?php echo $id; ?>'&id=1"><i class="fa fa-user text-danger"></i></a></td>
										<?php  } ?>
										 <td align="center"><a href="update_employee.php?id='<?php echo $id; ?>'"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        </div>
						</form>
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

