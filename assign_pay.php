<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
include('config.php');
@$msg=$_REQUEST['mid'];
if($msg == "msg")
{
	  echo  "<script>alert('Your Attendance allredey Added..');</script>";
}
  extract($_POST);
if(isset($submi))
{


}
	
 
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
        
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
			 <script src="js/jquery.cookies.js"></script>
		  <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
        <script src="js/bootstrap-wizard.min.js"></script>



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
                                    <li><a href="admindashboard"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard">Home</a></li>
                                    <li>Pay Assign</li>
									<li><a href="download/download15.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Pay</span></a></li>
                                </ul>
                                <h4>Assign Pay</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    <form method="post"action="add_attendance.php">
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err;?></div>
					</div>
                    <div class="contentpanel">
				 <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">Manage Pay :</h4>
                             
                            </div><!-- panel-heading -->
                            
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Employee Department</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
										<th>Basic Amount</th>
										<th>Hra</th>
										<th>Conveyance</th>
										<th>Mobile No</th>
										<th>Other No</th>
										<th>Total Salary</th>
                                        
                                       
										 <th>Add Attendance</th>
										
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php 
								
						$que=mysqli_query($con,"select * from add_employee");
						  
						 while($res=mysqli_fetch_array($que))
						{
							$id=$res['employee_code'];
							$shift_id=$res['shift_id'];
							
								?>
								
                                    <tr>
                                        <td align="center" name="empid" ><?php echo $employee_id= $res['employee_code']; ?></td>
                                        <td align="center" name="empname"><?php echo $name= $res['employee_first_name']." ".$res['employee_last_name']; ?></td>
                                        <td align="center" name="empdepartment"><?php echo $employee_department= $res['employee_department']; ?></td>
									<?php
									$query1=mysqli_query($con,"select * from shift_time WHERE id = '$shift_id'");
									if($result1=mysqli_fetch_array($query1))
									{
									?>
                                        <td align="center" name="attdate"><?php echo $result1['intime']; ?></td>
                                        <td align="center" name="attdate"><?php echo $result1['outtime']; ?></td>
									<?php
									}
									?>
									<td align="center" name="basic"><?php echo $res['basic_amount'];?></td>
									<td align="center" name="hra"><?php echo $res['hra'];?></td>
									<td align="center" name="Conveyance"><?php echo $res['conveyance'];?></td>
									<td align="center" name="Mobile"><?php echo $res['mobile_allo'];?></td>
									<td align="center" name="Other"><?php echo $res['other_allo'];?></td>
									<td align="center" name="Total"><?php echo $res['total_salary'];?></td>
									<input type="hidden" name="employee_id[]" value="<?php $res['employee_code']; ?>"  />
										<input type="hidden" name="name[]" value="<?php $res['employee_first_name']." ".$res['employee_last_name']; ?>"  />	
								
										
  
 
                       
                        <div class="row">
     


	                                 
									<td align="center">
											<a href="assign_pay_code?id=<?php echo $id;?>" class="btn btn-success button1">Assign Pay</a>
											</td>
										<!-- <td align="center"><a href="update_employee.php?id='<?php //echo $id; ?>'"><i class="fa fa-edit"></i></a></td>-->
                                  
									</tr>
									
                                  <?php } ?>
								  
                                </tbody>
								
                            </table>
							<div class="row">
											
						</div><!-- Row  -->
                        </div><!-- panel -->
                        </div>
						</form>
                </div>
            </div><!-- mainwrapper -->
        </section>
         <!-- button start -->

		
     	
				<div class="modal fade" id="myModala" ?role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Assign Shifts</h4>
				</div>
			<div class="modal-body">
					
			
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#quick" aria-controls="campaign" role="tab" data-toggle="tab" aria-expanded="true">Assign Shifts</a>
    </li>
    <li>
      <a href="#advancefilter" aria-controls="subscriptions" role="tab" data-toggle="tab" aria-expanded="false">Shift Time</a>
    </li>    
  </ul>
  <div class="clearfix"></div>
			

  <div class="tab-content viewevents">
    <div id="quick" class="tab-pane fade in active">
     <form Method="POST" action="assignshift.php">
										 <div class="row paddtop">
				
											
											<div class="col-sm-6">
											 <div class="form-group">
											<label class="control-label"><b>Select Employee:</b> <span style="color:red;">*</span></label>
											<select  class="form-control select1" name="employee">
											<option>Select Employee</option>
												<?php
												$emp_res=mysqli_query($con,"Select * from add_employee");
												while($emp_res1=mysqli_fetch_array($emp_res))
												{
												
													$emp_id=$emp_res1['employee_code'];
														echo "<option value='$emp_id'>".$emp_res1['employee_first_name']." - ".$emp_id."</option>";
													
												

												}
												?>
											</select>
											</div>
											</div>
												
															
											<div class="col-sm-6">
                                               
                                           
											 <div class="form-group">
                                                    <label class="control-label"><b>Shifts :</b> <span style="color:red;">*</span></label>
													<br/>
													<input type="hidden" value="<?php echo $emp_url;?>" name="url">
                                                  <select  class="form-control select1" name="time">
											<option>Select Shift</option>
												<?php
												$emp_res2=mysqli_query($con,"Select * from shift_time");
												while($emp_res3=mysqli_fetch_array($emp_res2))
												{
												
													$id=$emp_res3['id'];
													
														echo "<option value='$id'>".$emp_res3['intime']." - ".$emp_res3['outtime']."</option>";
													
												

												}
												?>
											</select>
											
                                                </div><!-- form-group -->
												 </div><!-- col-sm-6 --> 
						</div>
						<div class="modal-footer">
		  <input type="submit" class="btn btn-success btn-default" />
          <button type="button" class="btn btn-danger btn-default pull-right" data-dismiss="modal">Cancel</button>
		 
        </div>
			</form>			
				</div>
   
		<div id="advancefilter" class="tab-pane fade">
      
	  
				 <form class="form-horizontal clearfix"  method="POST" action="shifttime.php">
				 <div class="row paddtop">
				 <div class="col-sm-1">
</div>
                 <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><b>In Time :</b> <span style="color:red;"></span></label>
                                                  <input type="hidden" value="<?php echo $emp_url;?>" name="url">
											 <input type="time" class="form-control " name="intime"/>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-4 -->
<div class="col-sm-2">
</div>											
				  <div class="col-sm-3">
				  <div class="form-group">
                                                    <label class="control-label"><b>Out Time :</b> <span style="color:red;"></span></label>
                                                  
											 <input type="time" class="form-control " name="outtime"/>
                                                </div><!-- form-group -->
												</div><!-- col-sm-4 --> 
												</div>
										  <div class="modal-footer">
		  <input type="submit" class="btn btn-success btn-default"  >
          <button type="button" class="btn btn-danger btn-default pull-right" data-dismiss="modal">Cancel</button>
		  </form>
        </div>		
                  </div><!-- col-sm-6 --> 
				 
             
	  
	  
       </div>
   
  </div>
</div>
      
    </div>
  </div>   
       
		<!-- button end -->
<script>
$(document).ready(function(){
    $("#myBtnra").click(function(){
		
        $("#myModala").modal();
		
  });
  });
</script>

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

