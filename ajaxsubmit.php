<?php
// Establishing connection with server..
 include('config.php');

//Fetching Values from URL  
$name2=$_POST['name1'];
$email2=$_POST['email1'];
$url2=$_POST['url1'];
$contact2=$_POST['contact1'];


//Insert query 
  mysqli_query($con,"insert into `reminder` (`rem_id`, `name` , `msg` , `date` , `url`) values ('' , '$name2' , '$email2' , '$contact2', '$url2')");
  echo "Form Submitted succesfully";  
//connection closed

?>