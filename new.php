<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}
include('config.php');

  extract($_POST);
$uid=$_REQUEST['id'];
//echo $uid;
extract($_POST);
 if(isset($submit))
 {
	 $quee=mysqli_query($con,"select * from attendance_table where employee_code='$tid' and date='$attdate'");
  $ress=mysqli_fetch_array($quee);
  //echo $resss= implode ($ress);
  $time=$ress['intime'];
  if($ress and $time != "00:00")
  {
	
	   header('location:my_attendance.php?mid=msg');
  }
  else
  {
	 mysqli_query($con,"UPDATE attendance_table SET intime = '$intime' , outtime = '$outtime' , attendance = '$chklist' WHERE employee_code = '$tid' and date = '$attdate' ");
	  header('location:my_attendance.php');
 }
 }
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
                                    <li><a href="admindashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard.php">Home</a></li>
                                    <li>Manage Attendance</li>
									<li><a href="download/download15.php"><i class="fa fa-cloud-download" style="color:#428bca;"></i> <span>Export Attendance</span></a></li>
                                </ul>
                                <h4>Attendance</h4>
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
                                <h4 class="panel-title">Manage Attendance :</h4>
                             
                            </div><!-- panel-heading -->
                            
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Employee Department</th>
                                        <th>Date</th>
                                        
										 <th>Add Attendance</th>
										
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php 
								
						$que=mysqli_query($con,"select * from add_employee");
						  
						 while($res=mysqli_fetch_array($que))
						{
							$id=$res['employee_code'];
	
							
								?>
								
                                    <tr>
                                        <td align="center" name="empid" ><?php echo $employee_id= $res['employee_code']; ?></td>
                                        <td align="center" name="empname"><?php echo $name= $res['employee_first_name']." ".$res['employee_last_name']; ?></td>
                                        <td align="center" name="empdepartment"><?php echo $employee_department= $res['employee_department']; ?></td>
                                        <td align="center" name="attdate"><?php echo $date=date("Y/m/d"); ?></td>
									
                                        <input type="hidden" name="employee_id[]" value="<?php $res['employee_code']; ?>"  />
										<input type="hidden" name="name" value="<?php $res['employee_first_name']." ".$res['employee_last_name']; ?>"  />	
								
  
 
                       
                        <div class="row">
     


									<td align="center">
												<a href="new.php?id=<?php echo $id;?>" class="btn btn-success button1">Add Attendance</a>
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
				<h4 class="modal-title">Add Attendance</h4>
				</div>
			<div class="modal-body">
					
			
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#quick" aria-controls="campaign" role="tab" data-toggle="tab" aria-expanded="true">Timing</a>
    </li>
   
  </ul>
  <div class="clearfix">
  </div>
			

  <div class="tab-content viewevents">
    <div id="quick" class="tab-pane fade in active">
     <form Method="POST" action="">
										 <div class="row paddtop">
				
											
											<div class="col-sm-4">
											 <div class="form-group">
											 <br/>
											<label class="control-label"><b>Employee:</b> <span style="color:red;">*</span></label>
										
											
												<?php
												$emp_res=mysqli_query($con,"Select * from add_employee where employee_code = '$uid' ");
												if($emp_res1=mysqli_fetch_array($emp_res))
												{
												
													$emp_id=$emp_res1['employee_code'];
												}
												?>
												 <input type="hidden" value="<?php echo $emp_id; ?>" name="tid">
											     <input type="text" value="<?php echo $emp_res1['employee_first_name']; ?>" name="empname" class="form-control" readonly />
											</div>
											</div>
												
															
											<div class="col-sm-4">
                                               
                                           
											 <div class="form-group">
                                                    
													<br/>
												    <label class="control-label"><b>In Time:</b> <span style="color:red;">*</span></label>
													<input type="time" name="intime" class="form-control">
												    <label class="control-label"><b>Out Time:</b> <span style="color:red;">*</span></label>
													<input type="time" name="outtime" class="form-control">
													<input type="hidden" name="attdate" value="<?php echo $date=date("Y/m/d"); ?>"/>
													<input type="hidden" name="name" value="<?php echo $name= $emp_res1['employee_first_name']." ".$emp_res1['employee_last_name']; ?>"/>
													
											
                                                </div><!-- form-group -->
												 </div><!-- col-sm-6 --> 
												
                             <div class="col-sm-4">
							 <br/>
							 <label class="control-label"><b>Employee:</b> <span style="color:red;">*</span></label>
							  <div class="form-group">
							

                                <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-default active">
                                      <input type="radio" id="q159" name="chklist" value="P" required /> P
                                   </label> 
                                  <label class="btn btn-default ">
                                      <input type="radio" id="q160" name="chklist"  value="A" required /> A
                                  </label>
                                </div>
                                </div>
                            </div>
                      
						</div>
						<div class="modal-footer">
		  <input type="submit" name="submit" class="btn btn-success btn-default" />
          <button type="button" class="btn btn-danger btn-default pull-right" onclick="window.location ='my_attendance.php';">Cancel</button>
		 
        </div>
			</form>			
				</div>
   
				 
             
	  
	  
       </div>
   
  </div>
</div>
      
    </div>
  </div>   
       
		<!-- button end -->
<script>

    $(window).load(function(){
		
        $("#myModala").modal({backdrop: 'static', keyboard: false});
		  	
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

