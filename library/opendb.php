<?php
$con = mysql_connect("localhost","centreho_centre","sas.243");
if(!$con)
  {
  die('Could not connect: ' . mysql_error());
  echo "could not connect";
  }
mysql_select_db("centreho_centre", $con);
?>
 