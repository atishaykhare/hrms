<?php
session_start();
if($_SESSION['username']=="")
{
	
	header('location:index.php');

}


include('config.php');


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Salary Panel</title>
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
                                    <li>Manage Salary</li>
                                </ul>
                                <h4>Monthly Salary</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
				 <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">View Salary :</h4>
                             
                            </div><!-- panel-heading -->
                            
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th align="center">Emp.Id.</th>
                                        <th align="center">Employee Name & Code</th>
                                        <th align="center">Month</th>
                                        <th align="center">Salary</th>
                                        
                                    </tr>
                                </thead>
                         
                                <tbody>
								<?php
								$query=mysqli_query($con,"select employee_first_name , employee_code ,e_id from add_employee");
								$a=01;
								while($result=mysqli_fetch_array($query))
								{
									$e_id = $result['e_id'];
									 $employee_first_name = $result['employee_first_name'];
									$employee_code = $result['employee_code'];
								?>
								
                                    <tr>
                                        <td align="center"><?php echo $a; ?></td>
										<td align="center"><?php echo $employee_first_name. ' : ' .$employee_code; ?></td>
										<td align="center">
										
											<select class="form-control select1" id="<?php echo $e_id; ?>" onchange="calSal(this.id,this.value);">
												<option value="01">January</option>
												<option value="02">Feburary</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
										</td>
										<td align="center"><span id="pid<?php echo $e_id; ?>"></span></td>
									
                                       
										
                                       
									</tr>
										<?php
									$a++;	 
										 }
										 ?>
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        </div>
						</form>
                </div>
            </div><!-- mainwrapper -->
        </section>
        
        <!-- Modal -->
       

	<script>

		function calSal(month,empid)
		
{
	//alert(empid);
//alert(month);

var dataString = 'mon=' + month + '&empid=' +empid;
		$.ajax({
				type:"POST",
				url:"calsal.php",
				data:dataString,
				cache: false,
				success: function(result)
				{
				$("#pid"+month).html(result);
					//alert(result);
				}
});
}

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

