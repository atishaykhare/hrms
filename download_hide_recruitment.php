<?php 

 include('config.php');
//$conn=mysql_connect('localhost','root',''); 
//$db=mysql_select_db('csinffze_lmss',$conn);
//$db=$con;


$setCounter = 0;

$setExcelName = "download_hide_recuriment_excal_file";


$setSql = mysql_query("select * from hide_recuriment");

//$setRec = mysql_query($setSql);

$setCounter = mysql_num_fields($setSql);

for ($i = 0; $i < $setCounter; $i++) {
    @$setMainHeader .= mysql_field_name($setSql, $i)."\t";
}

while($rec = mysql_fetch_row($setSql))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  @$setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}

$setCounter = mysql_num_fields($setSql);



//This Header is used to make data download instead of display the data
 header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=".$setExcelName."_Reoprt.xls");

header("Pragma: no-cache");
header("Expires: 0");

//It will print all the Table row as Excel file row with selected column name as header.
echo ucwords($setMainHeader)."\n".$setData."\n";
?>