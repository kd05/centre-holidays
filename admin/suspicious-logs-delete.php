<? ob_start(); 


		$agentlogid=trim($_GET['agentlogid']);
		
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

		
		$sql2 = "Delete from ch_agents_log_in_suspicious WHERE agentlogid=$agentlogid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: home.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: home.php?results=error');
		}

	
	mysqli_close($conn);
 
ob_flush(); 

?>