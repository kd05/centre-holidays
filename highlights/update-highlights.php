<?php
ob_start();

if (!isset($_COOKIE['admin']))
header('Location: index.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/opendbi.php');
	
	//=====================in case admin make updates the below code will exicute==========
	if (isset($_POST['highlightsid']))
	{	
		$highlightstime=time();	
		
		$highlightscoverimagealt=sanitize_sql_string($_POST['highlightscoverimagealt']);
		
		$highlightsshowcor=trim($_POST['highlightsshowcor']);
		
		$chighlightsshowcor=trim($_POST['chighlightsshowcor']);
		
		$highlightsshow=trim($_POST['highlightsshow']);
				
		$highlightslabel=trim($_POST['highlightslabel']);
		$highlightslabel=($highlightslabel);	//		
	
		$highlightssource=trim($_POST['highlightssource']);
		$highlightssource=($highlightssource);	//
	
		$highlightsid=trim($_POST['highlightsid']);
		$highlightsid=($highlightsid);	//
		
		$highlightstype=trim($_POST['highlightstype']);
		$highlightstype=($highlightstype); //		
		
		$tadate=time();
		
		echo $highlightstitle=$_POST['highlightstitle'];	
		$highlightstitle = str_replace("'", '&rsquo;', $highlightstitle);		
		$highlightstitle=sanitize_sql_string($highlightstitle);	//

		echo $highlightsdetails=$_POST['highlightsdetails'];	
		$highlightsdetails = str_replace("'", '&rsquo;', $highlightsdetails);
		$highlightsdetails=sanitize_sql_string($highlightsdetails);//		

		echo $highlightsvideourl=$_POST['highlightsvideourl'];
		$highlightsvideourl=($highlightsvideourl);//

		echo $highlightsinternalurl=$_POST['highlightsinternalurl'];
		$highlightsinternalurl=($highlightsinternalurl);//		

		echo $highlightsexternalurl=$_POST['highlightsexternalurl'];
		$highlightsexternalurl=($highlightsexternalurl);//

		echo $highlightspreviewimage=$_POST['highlightspreviewimage'];
		$highlightspreviewimage=($highlightspreviewimage);//

		echo $highlightscolor=$_POST['highlightscolor'];
		$highlightscolor=($highlightscolor);//
		
		echo $highlightshovercolor=$_POST['highlightshovercolor'];
		$highlightshovercolor=($highlightshovercolor);	//	
				
				
		echo $highlightswebsites=$_POST['highlightswebsites'];
		$highlightswebsites=($highlightswebsites);//
				
				
		echo $highlightsexpirydate=$_POST['highlightsexpirydate'];		
		$highlightsexpirydate=($highlightsexpirydate);//	
		
		echo $highlightsexptime=strtotime($highlightsexpirydate);// convet date to timestamp format	
		
		echo $highlightsactive=$_POST['highlightsactive'];	
		$highlightsactive=($highlightsactive);	
		
		echo $AgentID2=$_POST['AgentID'];
		
/*		echo $AgentID=$_POST['AgentID'];	
		foreach($AgentID as $item789) {	
		$AgentID2=$item789.', '.$AgentID2;
		}*/		
									
		echo $highlightswebsite=$_POST['highlightswebsite'];
		$highlightswebsite=($highlightswebsite);	//
		
		echo $highlightstags=$_POST['highlightstags'];
		$highlightstags=addcslashes($highlightstags, "'");
	
		echo $highlightshorizimage=$_POST['highlightshorizimage'];
		
		echo $highlightsvrtravel=$_POST['highlightsvrtravel'];
//==========================================================================================
	
		//=========================================================
		//=========================================================
		echo $highlightscontinent=$_POST['highlightscontinent'];	
		foreach($highlightscontinent as $item3) {	
		$highlightscontinent2=$item3.', '.$highlightscontinent2;
		}	
		//==========================================================
		//==========================================================	
		
		
		
		echo $highlightsinterests=$_POST['highlightsinterests'];	
		foreach($highlightsinterests as $item) {	
		$highlightsinterests2=$item.', '.$highlightsinterests2;
		}
		
		echo $highlightscountry=$_POST['highlightscountry'];	
		foreach($highlightscountry as $item7) {	
		$highlightscountry7=$item7.', '.$highlightscountry7;
		}		

		echo $highlightsoperators=$_POST['highlightsoperators'];	
		foreach($highlightsoperators as $item997) {	
		$highlightsoperators9=$item997.', '.$highlightsoperators9;
		}		
		
				
		echo $highlightsauthor=$_POST['highlightsauthor'];
		echo $highlightsreadtime=$_POST['highlightsreadtime'];
		
		echo $highlightsmeta=$_POST['highlightsmeta'];	
		$highlightsmeta = str_replace("'", '&rsquo;', $highlightsmeta);		
		
		echo $highlightscoverimage=$_POST['highlightscoverimage'];		
		
		echo $hpageurl=$_POST['hpageurl'];		
		
		echo $highlightsinternotes=($_POST['highlightsinternotes']);
		$highlightsinternotes = str_replace ("'","\'",$highlightsinternotes);																										


// UPADET THE OPERATORS TABLE============================================================
foreach($highlightsoperators as $newitem1) {	
	$sql200 = "UPDATE operators SET	operatorshighlights='1' WHERE operators='$newitem1'";
	if (mysqli_query($conn, $sql200)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}


// UPADET THE STYLES TABLE============================================================
foreach($highlightssubstyle as $newitem2) {	
	$sql202 = "UPDATE styles SET styleshighlights='1' WHERE styles='$newitem2'";
	if (mysqli_query($conn, $sql202)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE SUB-STYLES TABLE============================================================
foreach($interestshighlights as $newitem3) {	
	$sql203 = "UPDATE interests SET interestshighlights='1' WHERE interests='$newitem3'";
	if (mysqli_query($conn, $sql203)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE CONTINENT TABLE============================================================
foreach($highlightscontinent as $newitem4) {	
	$sql204 = "UPDATE continent SET continenthighlights='1' WHERE continent='$newitem4'";
	if (mysqli_query($conn, $sql204)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE COUNTRIES TABLE============================================================
foreach($highlightscountry as $newitem5) {	
	$sql205 = "UPDATE countries SET countrieshighlights='1' WHERE countries='$newitem5'";
	if (mysqli_query($conn, $sql205)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}


		$sql2 = "UPDATE highlights SET		
		highlightstime='$highlightstime',		
		highlightstype='$highlightstype',			 
		highlightstitle='$highlightstitle',		
		highlightsdetails='$highlightsdetails',							
		highlightsvideourl='$highlightsvideourl',		
		highlightsinternalurl='$highlightsinternalurl',		
		highlightsexternalurl='$highlightsexternalurl',		
		highlightspreviewimage='$highlightspreviewimage',
		highlightshorizimage='$highlightshorizimage',				
		highlightscolor='$highlightscolor', 				
		highlightshovercolor='$highlightshovercolor',		
		highlightscontinent='$highlightscontinent2',
		highlightsinterests='$highlightsinterests2',		
		highlightsoperators='$highlightsoperators9',		
		AgentID='$AgentID2',						 
		highlightsexpirydate='$highlightsexptime',
		highlightswebsite='$highlightswebsite',
		highlightstags='$highlightstags',
		highlightsauthor='$highlightsauthor',
		highlightsreadtime='$highlightsreadtime',
		highlightsmeta='$highlightsmeta',
		highlightscoverimage='$highlightscoverimage',
		hpageurl='$hpageurl',
		highlightsactive='0',
		highlightscountry='$highlightscountry7',
		highlightsvrtravel='$highlightsvrtravel',
		highlightslabel='$highlightslabel',	
		highlightssource='$highlightssource',
		highlightsshow='$highlightsshow',
		highlightsshowcor='$highlightsshowcor',
		highlightscoverimagealt='$highlightscoverimagealt',
		highlightsinternotes='$highlightsinternotes',
		chighlightsshowcor='$chighlightsshowcor'											 		
		WHERE highlightsid='$highlightsid' LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>full Success</h4>";
			header('Location: ../highlights-edit.php?highlightsid='.$highlightsid.'&results=success');
		} else {
			echo "full Error updating record: " . mysqli_error($conn);
			header('Location: ../highlights-edit.php?highlightsid='.$highlightsid.'&results=error');
		}
	}
	

//================================================================================================


	
		// INSERT timestamp to the shared timestamp table between trips, collections, highlightss, and articles
/*		$sql999 = "INSERT INTO shared_time (sharedid, sharedtype, sharedtime) VALUES ('', 'highlightss', '$highlightstime')";
		if (mysqli_query($conn, $sql999)) {
		} else {
		}*/
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>