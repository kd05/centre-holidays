<?php

//$urlend[0]='beach';
//echo $urlend[0]; 
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "SELECT * FROM highlights WHERE highlightsid='".$_GET['hid']."'";

$result = mysqli_query($conn, $sql);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) {
	$highlightsid1=$row['highlightsid'];
	$highlightsid='highlights-'.$row['highlightsid'];
	$AgentID=$row['AgentID'];	
	$highlightstime=$row['highlightstime'];
	$highlightstype=$row['highlightstype'];
	
	if ($highlightstype==1)
	$display='Read';
	else
	$display='View';
	
	$highlightstitle=$row['highlightstitle'];
	$highlightsdetails=$row['highlightsdetails'];
	$highlightsvideourl=$row['highlightsvideourl'];					
	$highlightsinternalurl=$row['highlightsinternalurl'];
	$highlightsexternalurl=$row['highlightsexternalurl'];
	$highlightspreviewimage=$row['highlightspreviewimage'];
	$highlightscolor=$row['highlightscolor'];
	$highlightshovercolor=$row['highlightshovercolor'];
	$highlightscontinent=$row['highlightscontinent'];
	$highlightssubstyle=$row['highlightssubstyle'];
	$highlightsoperators=$row['highlightsoperators'];
	$highlightsexpirydate=$row['highlightsexpirydate'];
	$highlightswebsite=$row['highlightswebsite'];
	$highlightshorizimage=$row['highlightshorizimage'];	
	$highlightsauthor=$row['highlightsauthor'];	
	$highlightsreadtime=$row['highlightsreadtime'];
	$highlightsmeta=$row['highlightsmeta'];	
	$highlightscoverimage=$row['highlightscoverimage'];						
	$highlightsmeta	=$row['highlightsmeta'];
	$highlightsvrtravel	=$row['highlightsvrtravel'];
	$highlightssource	=$row['highlightssource'];
	$highlightscoverimagealt	=$row['highlightscoverimagealt'];
 }
 
//==========================strip commas===========================================
	$CAgentID=str_replace( ',', '', $AgentID );// current AgentID without commas
	if (!empty($CAgentID))
	$CAgentIDcheck='checked';
	else
	$CAgentIDcheck='';

 
mysqli_close($conn);

?>