<?php
$db = new mysqli("localhost","centreho_centre","sas.243","centreho_centre");
	if ($db->connect_errno) {
	echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
?>
