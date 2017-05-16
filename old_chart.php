				<div class="row">
						 <div class="col-sm-1">
						<div id="visualization" style="width: 500px; height: 400px;"></div>
 
    <?php
 
    //include database connection
    include 'config.php';
 
    //query all records from the database
    $query = "select * from total_lead";
 
    //execute the query
    $result = mysqli_query($con,$query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
           /*  function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
                        echo "['{$lead_month}', {$total_lead}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Genrate Leads in 2016 Per Months."});
            }
 
            google.setOnLoadCallback(drawVisualization); */
        </script>
    <?php
 
    }else{
        echo "No programming languages found in the database.";
    }
    ?>
	</div>
	                            
								<div class="col-sm-7">
								    <!--Div that will hold the pie chart-->
									<div id="chart_div"></div>
								</div>
	</div>