<?php ob_start(); ?>


<?php

		$flip=trim($_POST['flip']);
		$flname=trim($_POST['flname']);
		$flcountry=trim($_POST['flcountry']); 
		$flarea=trim($_POST['flarea']);
		$flcity=trim($_POST['flcity']);
		$fltime=time();

			
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
		
		
		//ADD TO BLACK LIST.

		$sql1 = "INSERT INTO blacklist (blid, blip, bltime, blcountry, blarea, blcity, blname)
		VALUES ('', '$flip', '$fltime', '$flcountry', '$flarea', '$flcity', '$flname')";
		
		if (mysqli_query($conn, $sql1)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}
				
		
		// DELET FROM DATABASE	
		
		$sql = "DELETE FROM formsiplist WHERE flip='$flip'";
		
		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}

			
		
		mysqli_close($conn);

		header('Location: black-list.php');
		
?>

<?php ob_flush(); ?>