<?php ob_start(); ?>


<?php

		$ipadd=trim($_GET['ipadd']);
		$blcountry=trim($_GET['blcountry']); 
		$blarea=trim($_GET['blarea']);
		$blcity=trim($_GET['blcity']);
		$bltime=time();
		
		
			
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
		
		
		//ADD TO BLACK LIST

		$sql1 = "INSERT INTO blacklist (blid, blip, bltime, blcountry, blarea, blcity)
		VALUES ('', '$ipadd', '$bltime', '$blcountry', '$blarea', '$blcity')";
		
		if (mysqli_query($conn, $sql1)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}
				
		
		// DELET FROM DATABASE	
		
		$sql = "DELETE FROM inquiries WHERE ip='$ipadd'";
		
		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}

			
		
		mysqli_close($conn);

		header('Location: online-inquiries.php');
		
?>

<?php ob_flush(); ?>