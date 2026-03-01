<?php ob_start(); ?>


<?php

		$enqid=trim($_GET['enqid']);		
			
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
		
		
		//ADD TO BLACK LIST

		// sql to delete a record
		$sql = "DELETE FROM inquiries WHERE enqid='$enqid'";
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
				

		mysqli_close($conn);

		header('Location: online-inquiries.php');
		
?>

<?php ob_flush(); ?>