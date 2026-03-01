<?php
	$con = mysql_connect("localhost","epikesca_admin","Q1!W2@e3r4t5");
		if(!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
	mysql_select_db("epikesca_epiktour", $con);
?>
