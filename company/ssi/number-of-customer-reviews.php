<?php session_start();  #start a session 

//====================================================
//===================CONNECT TO EPIK DATABSE=========================================
//====================================================

	include($_SERVER['DOCUMENT_ROOT'].'/library/open_db_epik.php');
	
	$sql2626= "SELECT * FROM ch_feedback ";	
	
	$sql2626.=" WHERE FeedStatus=1 ";
	
	if (!empty($AgentID))
	$sql2626.=" AND AgentID='$AgentID' ";
	
	$sql2626.= " ORDER BY FeedID DESC";	


	//======================================================================================
	//Use $ttcount to Check if anything avilable to display if results = 0 display nothing==
	//======================================================================================
	$ttcount2626 = mysql_num_rows(mysql_query($sql2626));
		    
?>