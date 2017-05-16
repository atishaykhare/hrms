<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}

$msg=$_REQUEST['msg'];
if($msg !='')
{
	$err="<div class='alert alert-success'>Lead Information Successfully Genrated...</div>";
	//header('refresh:1;url=manage-lms.php');
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
			
		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


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
                                    <li><a href="admindashboard_lms.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                    <li><a href="admindashboard_lms.php">Home</a></li>
                                    <li>Manage Lead</li>
                                </ul>

                               <h4>View Leads</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
					<h5 id="mydiv"><?php echo $err; ?></h5>
					
				 <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">Manage Leads :</h4>
                             
                            </div><!-- panel-heading -->
                           
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>S.No</th>
										<th>Title</th>
                                        <th>Lead Type</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone No.</th>
                                        <th>Customer Email</th>
                                       <th>Property Type</th>
										<th>Property Location</th>
										<th>Active</th>
										<th>Edit</th>
										<th>Assign</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php
								$que=mysqli_query($con,"select * from lms_table");
								$number=1;
								while($res=mysqli_fetch_array($que))
								{
								$id=$res['lead_id'];
								$pt=$res['required_property_type'];
								?>
                                    <tr>
									<form action="hi.php" method="POST">
										<td align="center"><input type="checkbox" value="<?php echo $id; ?>" name="chk" class="messageCheckbox" onclick=check(this.value)><?php echo "  "; echo $number;?></td>
										 <td align="center"><a href="comment?id=<?php echo $id; ?>"><?php echo $res['title']; ?></a></td>
                                        <td align="center"><?php echo $res['lead_type']; ?></td>
                                        <td align="center"><?php echo $res['customer_name']; ?></td>
                                        <td align="center"><?php echo $res['customer_no']; ?></td>
                                        <td align="center"><?php echo $res['customer_email']; ?></td>
										
										<?php 	$qe=mysqli_query($con,"SELECT * FROM `add_property_type` WHERE property_id='$pt'"); 
												$re=mysqli_fetch_array($qe); ?>
                                       <!-- <td align="center"><?php// echo $re['property_type']; ?></td>-->
                                             <td align="center"><?php echo $res['required_property_type']; ?>
                                        <td align="center"><?php echo $res['property_required_location']; ?></td>
										<?php
										if($res['lead_status']==1)
										{
											?>
											<td align="center"> <a class="tooltips" data-toggle="tooltip" title="Active" href="lead-active.php?l_id='<?php echo $id; ?>'&id=2"><i class="fa fa-user text-success"></i></a></td>
											<?php
										} else
										{
										?>
										 <td align="center"> <a  class="tooltips" data-toggle="tooltip" title="Inactive" href="lead-active.php?l_id='<?php echo $id; ?>'&id=1"><i class="fa fa-user text-danger"></i></a></td>
										<?php  } ?>
										 <td align="center"><a href="update-lms-table?id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></td>
										 <!--<td align="center"> <button type="button" class="btn btn-default " name ='but' id="myBtn" value="<?php echo $id['lead_id']; ?>" onclick='get_id(this.value)'>Assign</button> </td>-->
										 <td ><select name="eid" class="form_control">
														<option selected value="" disabled selected>Assign</option>
												<?php
												$que1 =mysqli_query($con,"select * from add_employee");
													while($r=mysqli_fetch_array($que1))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid' >".$r['employee_first_name']. '-' . $empid. "</option>";
													}
													
													?>
												</select><input type="hidden" value="<?php echo $id; ?>" name="id"><input type="submit" name="sub" Value="submit" class="btn btn-default btn-md "></td>
													
												
									</tr>
								 </form>
                                  <?php $number++; } ?>
                                </tbody>
                            </table>
                            </div>
                       
						<div>
						
						<p id="demo"></p>
						<form action="no.php" METHOD="POST">
						<div class="row">
						<div class="col-md-4">&nbsp; &nbsp; &nbsp; &nbsp; ^-------------------------------------------------------------------------</div>
						<div class="col-md-2"><span><select name="eid" class="form-control" style="width:100px;">
														<option selected value="" disabled selected>Assign</option>
												<?php
												$que1 =mysqli_query($con,"select * from add_employee");
													while($r=mysqli_fetch_array($que1))
													{
														$empid=$r['employee_code'];
														echo "<option value='$empid' >".$r['employee_first_name']."</option>";
													}
													
													?>
												</select></div>
						<div class="col-md-2"><input type="submit" id="btnbox" value="assign" class="btn btn-default btn-md "></div>
   <div class="col-md-0"><input type="hidden" id="res" name="arr"></div>
  
 
</div>
							
						
						</form>
						</span>
												

						</div>
                        </div>
						 </div><!-- panel -->
                </div>
            </div><!-- mainwrapper -->
        </section>
        <script>
	 $(document).ready(function(){
$("#btnbox").click(function(){
        var car_type_arr = [];

        $("input:checkbox[name=chk]:checked").each(function() {                
            car_type_arr.push($(this).val());
            //alert(car_type_arr);
			document.getElementById("res").value = car_type_arr;
    }); 
});
});
setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 1500); // <-- time in milliseconds
     </script>
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

