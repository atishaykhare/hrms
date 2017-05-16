<?php 
session_start();
if(!empty($_SESSION['username']))
{
include('config.php');
$lead_id=$_GET['id'];
$empid=$_SESSION['username'];
$empque=mysqli_query($con,"select * from add_employee where employee_code='$empid'");
$emprw=mysqli_fetch_array($empque);
$emppic = $emprw['emp_pic'];
$empfname = $emprw['employee_first_name'];
$emplname = $emprw['employee_last_name'];
$empname = $empfname." ".$emplname;
$date=date("Y/m/d");

extract($_POST);
if(isset($_POST['submit1']))
{   
  if($comment=="")
  {
	$err="<div class='alert alert-danger'>insert comment...</div>";
	header('refresh:1');
  }
  else
  {

   mysqli_query($con,"INSERT INTO `comment_table`(`c_id`, `lead_id`, `emp_id`, `emp_name`, `comment`, `emp_pic`, `date`)
                                     VALUES ('','$lead_id','$empid','$empname','$comment','$emppic','$date')"); 
    $err="<div class='alert alert-success'>Information Successfully Genrated...</div>";
		header('refresh:2');
  }
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".comment_button").click(function(){

var element = $(this);
var I = element.attr("id");

$("#slidepanel"+I).slideToggle(300);
$(this).toggleClass("active"); 

return false;});});
</script>
<style type="text/css">


	
	.panel
	{
	margin-left:180px; margin-right:50px; margin-bottom:5px; background-color:white; height:auto; padding:6px; width:400px;
	display:none;
	}
</style>

		<!--    This is the offline CSS File           <link href="css/style.default.css" rel="stylesheet">      -->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
		
    </head>

    <body>
        
       <?php include('include/headerlms.php');?>
          <?php include('include/sidebarlms.php');?>   
        <section>
           
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <a href=""><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="media-body mediabody1">
                                <ul class="breadcrumb">
                                    <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
									<li><a href="index.php">Home</a></li>
                                    <li>Comment Details</li>
                                </ul>
                                <h4>Comment Details</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader  style= width="130px" height="130px" -->
                    
					 <div class="contentpanel">
					
					<div class="row">
					<div class="col-sm-6" id="error"><?php echo @$err; ?></div>
					</div>
				       <div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Comment Details : </h5>
					</div>
					</div> 
				    						        
                   
						<div class="contentpanel1">
						<?php
					$sql = mysql_query("SELECT * FROM comment_table Where lead_id='$lead_id'");
while($row=mysql_fetch_array($sql))
{
$msg=$row['comment'];
$msg_id=$row['c_id'];
$empname1 = $row['emp_name'];
$emppic1 = $row['emp_pic'];
$date1 = $row['date'];
?>

<li>
<div class="row paddtop" style="margin-top:1px">
		<div class="col-sm-2">
			<div id="imagePreview">
					<img src="profile/<?php echo $emppic1; ?>" alt="<?php echo $emppic1; ?>">
					
			</div>
        </div>
		<div class="col-sm-6">		
						<div id="name" name="empname"><?php echo $empname1; ?></div>
					</div>																			
		<div class="col-sm-4">	
					<div id="date"><?php echo $date1; ?></div>
		</div>
		<div class="col-sm-10">
		<div id="commentbox" placeholder="comment..."><?php echo $msg;  ?></div>
		</div>
<a href="#" class="comment_button" id="<?php echo $msg_id; ?>">Comment</a>
</div>
</li>
<div class='panel' id="slidepanel<?php echo $msg_id; ?>">
<?php
$sql1 = mysql_query("SELECT reply,r_id FROM reply_table where c_id = '$msg_id' ");
while($row1=mysql_fetch_array($sql1))
{
	?>
	<div><?php echo $row1['reply']; ?></div>
<?php
	}
?>
	
<form action="cmnt_code.php" method="post">
<input type="hidden" value="<?php echo $msg_id; ?>" name="cmntid" />
					<input type="hidden" value="<?php echo $lead_id; ?>" name="leadid" />
					<input type="hidden" value="<?php echo $empid; ?>" name="empid" />
<textarea style="width:390px;height:23px" name="reply" id="commentbox"></textarea><br />
<input type="submit" value=" Comment "   class="comment_submit" />
</form>
</div>
<?php } ?>
				    </div>
				     </div><!-- contentpanel -->	
				   </div>
				   
				   
				   
				   
                    <div class="contentpanel">
					<form method="post" enctype="multipart/form-data">
					<!--<div class="row">
					<div class="col-sm-6" id="error"><?php //echo @$err; ?></div>
					</div>-->
				     <!--  <div class="row">
					<div class="col-sm-12" style="color:white;font-weight:bold;font-size:14px;background-color:#428BCA">
					<h5 style="padding-top:5px; padding-bottom:5px">Comment Details : </h5>
					</div>
					</div> -->  
				    <div class="row paddtop" style="margin-top:40px">
					<!--<div class="col-sm-3">
					<div id="imagePreview">
					<img src="../profile/<?php //echo "$emppic" ?>" width="180px" height="180px"  alt="John Doe">
					
					</div>
                     </div>															
					<div class="col-sm-4">		
						<div id="name" name="empname"><?php// echo $empfname." ".$emplname; ?></div>
					</div>																			
					<div class="col-sm-5">	
					<div id="date"><?php// echo $date; ?></div>
					</div>	-->			
						<div class="col-md-2">
						</div>
                    <div class="col-md-10">
					
					<textarea class="form-control" name="comment" id="commentbox" placeholder="comment..."></textarea>
					
					</div>
				</div>
						
					<div class="row">
					<div class="col-sm-offset-4 col-sm-4 ">
					<input type="submit" class="btn btn-success button1" name="submit1" id="submit" value="Submit">
					<!--<input type="reset" class="btn btn-danger resetbutt" value="Reset All">-->
					</div>
					</div>
							   
						
						
						</form>
                        <!--   form end   -->
                    </div><!-- contentpanel -->
					
					
					
                
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
		
		<script src="js/jquery.city-autocomplete.js"></script>
<!--        this is auto complete city name start    -->
		<script>
		function showtextarea(){
			document.getElementById("textarea").style.display='block'; 
		}
			$('#l12').cityAutocomplete();
		</script>
<!--        this is auto complete city name end    -->

		<script>
		$(document).ready(function () {
  $('#submit').click(function (e) {
            var isValid = true;
			
            //$('#l1,#l2,#l3,#l4,#l5,#l6,#l7,#l8,#l9,#l10,#l11,#l12,#l13,#l14,#l15,#l16,#l17,#l18,#l19,#l20,#l21,#l22,#l23,#l24,#l25,#l26,#l27,#l28,#l29,#l34,#l39,#l44,#l49,#l54').each(function () {
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
        
    </body>
</html>
<?php
}
else
{	
	header('location:index.php');
}
?>
