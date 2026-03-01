<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
	
	//=====================in case admin make updates the below code will exicute==========
	if (isset($_POST['tid']))
	{	
		echo $tunique_id=time();
		echo $tgroup=trim($_POST['tgroup']);
		echo $tid=trim($_POST['tid']);
		echo $tdays=$_POST['tdays'];
		$texpiry=sanitize_sql_string($texpiry);// expiry date
		echo $texpiry=$_POST['texpiry'];	
		echo $texpiry=strtotime($texpiry);// convet date to timestamp format
				
		$tcode=sanitize_sql_string($tcode);
		echo $tcode=$_POST['tcode'];				
		echo $ttitle=$_POST['ttitle'];
		$ttitle=sanitize_sql_string($ttitle);
		echo $tsubtitle=$_POST['tsubtitle'];
		$tsubtitle=sanitize_sql_string($tsubtitle);
		echo $tdetails=$_POST['tdetails'];
		$tdetails=sanitize_sql_string($tdetails);
		echo $tprice=$_POST['tprice'];	
		$tprice=sanitize_sql_string($tprice);	
		echo $tpace=$_POST['tpace'];
		echo $tcurrency=trim($_POST['tcurrency']);
		echo $tcontinent=$_POST['tcontinent'];
		
		echo $tcountry=$_POST['tcountry'];
		
		echo $tcommission=$_POST['tcommission'];		
		
		echo $tstartarea=$_POST['tstartarea'];
		$tstartarea=sanitize_sql_string($tstartarea);
		
		echo $tendarea=$_POST['tendarea'];
		$tendarea=sanitize_sql_string($tendarea);		
		
		echo $numcountries=$_POST['numcountries'];
		//echo $tstyle=$_POST['tstyle'];
		echo $tsubstyle=$_POST['tsubstyle'];	
		
		echo $taddsubstyle=$_POST['taddsubstyle'];	
		foreach($taddsubstyle as $item) {	
		$taddsubstyle2=$item.', '.$taddsubstyle2;
		}
		
		//echo $toperators=$_POST['toperators'];	
		
/*		if (!empty($_POST['toperators']))
		echo $toperators=$_POST['toperators'];
		else	
		echo $toperators='Epik Escapes';*/			

/*		echo $toperators=$_POST['toperators'];	
		foreach($toperators as $item344) {	
		$toperators244=$item344.', '.$toperators244;
		}*/	
		$toperators244=$_POST['toperators'];
		
		
		echo $timage=$_POST['timage'];
		echo $squarethumb=$_POST['squarethumb'];		
		echo $turl=$_POST['turl'];
		echo $tfilech=$_POST['tfilech'];
		echo $tfilechagents=$_POST['tfilechagents'];
		echo $tfileepik=$_POST['tfileepik'];
		echo $tags=$_POST['tags'];			
		$tags=sanitize_sql_string($tags);


		echo $tothercontinents=$_POST['tothercontinents'];	
		foreach($tothercontinents as $item3) {	
		$tothercontinents2=$item3.', '.$tothercontinents2;
		}		
		
		echo $tothercountries=$_POST['tothercountries'];	
		foreach($tothercountries as $item4) {	
		$tothercountries2=$item4.', '.$tothercountries2;
		}
	
		echo $duration2=$_POST['duration'];	
		foreach($duration as $item66) {	
		$duration2=$item66.', '.$duration2;
		}

		echo $cruiseships=$_POST['cruiseships'];	
		foreach($cruiseships as $item99) {	
		$cruiseships2=$item99.', '.$cruiseships2;
		}	

		echo $ch_agent=$_POST['ch_agent'];
		$ch_agent=sanitize_sql_string($ch_agent);
		
		echo $twebsite=$_POST['twebsite'];
		$twebsite=sanitize_sql_string($twebsite);	
		
		echo $tnotes=$_POST['tnotes'];
		$tnotes=sanitize_sql_string($tnotes);		
		
		echo $AgentID=trim($_POST['AgentID']);
		$AgentID2=sanitize_sql_string($AgentID);	
		
/*		echo $AgentID=$_POST['AgentID'];	
		foreach($AgentID as $item789) {	
		$AgentID2=$item789.', '.$AgentID2;
		}*/
		
		
		
		echo $thorizontalimage=$_POST['thorizontalimage'];
		$thorizontalimage=sanitize_sql_string($thorizontalimage);	
		
		echo $tstartdate=$_POST['tstartdate'];
		$tstartdate=sanitize_sql_string($tstartdate);	
		
		echo $tenddate=$_POST['tenddate'];
		$tenddate=sanitize_sql_string($tenddate);											
		
		
		echo $departuregateways=$_POST['departuregateways'];	
		foreach($departuregateways as $item77) {	
		$departuregateways2=$item77.', '.$departuregateways2;
		}
		
		
		//===============================================================================================================
		//========================================OTHER COUNTRIES========================================================
		//===============================================================================================================
						
		if ($_POST['changecountriesorder']=='yes')		
		{
		//================= OTHER COUNTRIES to be (modified) by ORDER======================
		$newtothercountries=$_POST['newtothercountries'];	
		foreach($newtothercountries as $item9999) {	
		$newtothercountries2=$item9999.', '.$newtothercountries2;
		}	
		$newtothercountries2;
		$newtothercountries3=explode(',' , $newtothercountries2);
		
		//================= OTHER COUNTRIES ORDER======================
		$tothercountriesorder=$_POST['tothercountriesorder'];	
		foreach($tothercountriesorder as $i => $item5599) {	
		$tothercountriesorder2=$item5599.', '.$tothercountriesorder2;
		}	
		$tothercountriesorder2;
		$tothercountriesorder3=explode(',' , $tothercountriesorder2);

		//===================LOOP and cretae array=====================
		for ($x = 0; $x <= $i; $x++) {	
		$v[] = trim($tothercountriesorder3[$x].$newtothercountries3[$x]);			
		}

		$numbers = $v; 

		rsort($numbers);// re-arrange the values from start to end by reversing above order
		
		//==========================create new order of othercountries
		$arrlength = count($numbers);
		for($x = 0; $x < $arrlength; $x++) {
			$tags1=$numbers[$x];
			$tags2 = $tags1.', '.$tags2;
		}

		$tothercountries22 = preg_replace('/[0-9]+/', '', $tags2);// Final results to store in DB
		
		}
		else
		$tothercountries22=$tothercountries2;
		
		//===============================================================================================================
		//===============================================================================================================
		//===============================================================================================================
		

		//===============================================================================================================
		//===========================================OTHER CONTINENTS====================================================
		//===============================================================================================================
						
		if ($_POST['changecontinentsorder']=='yes')		
		{
		//================= OTHER COUNTRIES to be (modified) by ORDER======================
		$newtothercontinents=$_POST['newtothercontinents'];	
		foreach($newtothercontinents as $item999900) {	
		$newtothercontinents2=$item999900.', '.$newtothercontinents2;
		}	
		$newtothercontinents2;
		$newtothercontinents3=explode(',' , $newtothercontinents2);
	
		//================= OTHER COUNTRIES ORDER======================
		$tothercontinentsorder=$_POST['tothercontinentsorder'];	
		foreach($tothercontinentsorder as $ii => $item559900) {	
		$tothercontinentsorder2=$item559900.', '.$tothercontinentsorder2;
		}	
		$tothercontinentsorder2;
		$tothercontinentsorder3=explode(',' , $tothercontinentsorder2);
		
														
		//===================LOOP and cretae array=====================
		for ($xx = 0; $xx <= $ii; $xx++) {	
		$vv[] = trim($tothercontinentsorder3[$xx].$newtothercontinents3[$xx]);			
		}

		$numbers2 = $vv; 
		
		rsort($numbers2);// re-arrange the values from start to end by reversing above order
		
		//==========================create new order of othercountries
		$arrlength2 = count($numbers2);
		for($x2 = 0; $x2 < $arrlength2; $x2++) {
			$tags12=$numbers2[$x2];
			$tags22 = $tags12.', '.$tags22;
		}

		$tothercontinents22 = preg_replace('/[0-9]+/', '', $tags22);// Final results to store in DB
		
		}
		else
		$tothercontinents22=$tothercontinents2;
		
		echo $tbody=$_POST['tbody'];
		$tbody=sanitize_sql_string($tbody);
		
		echo $extension1=$_POST['extension1'];
		$extension1=sanitize_sql_string($extension1);
		
		echo $extension2=$_POST['extension2'];
		$extension2=sanitize_sql_string($extension2);				
		
		echo $tmeta=sanitize_sql_string($_POST['tmeta']);
		echo $trp=$_POST['trp'];
		echo $tvideo=$_POST['tvideo'];
		
		echo $thlights=$_POST['thlights'];
		$thlights=sanitize_sql_string($thlights);
		
		echo $tinclusions=$_POST['tinclusions'];
		$tinclusions=sanitize_sql_string($tinclusions);
		
		echo $activities=$_POST['activities'];
		$activities=sanitize_sql_string($activities);
		
		echo $accommodation=$_POST['accommodation'];
		$accommodation=sanitize_sql_string($accommodation);				
		
		echo $tratesdates=$_POST['tratesdates'];
		$tratesdates=sanitize_sql_string($tratesdates);	
		
		echo $tratesdates2=$_POST['tratesdates2'];
		$tratesdates2=sanitize_sql_string($tratesdates2);	
		
		echo $tratesdates3=$_POST['tratesdates3'];
		$tratesdates3=sanitize_sql_string($tratesdates3);	
		
		echo $tratesdatesyear1=$_POST['tratesdatesyear1'];
		echo $tratesdatesyear2=$_POST['tratesdatesyear2'];
		echo $tratesdatesyear3=$_POST['tratesdatesyear3'];											
		
		
		
$texperiences=sanitize_sql_string($_POST['texperiences']);
$texclusions=sanitize_sql_string($_POST['texclusions']);
$tadditionalnotes=sanitize_sql_string($_POST['tadditionalnotes']);

$tslidercap1=sanitize_sql_string($_POST['tslidercap1']);
$tslidercap2=sanitize_sql_string($_POST['tslidercap2']);
$tslidercap3=sanitize_sql_string($_POST['tslidercap3']);
$tslidercap4=sanitize_sql_string($_POST['tslidercap4']);
$tslidercap5=sanitize_sql_string($_POST['tslidercap5']);
$tslidercap6=sanitize_sql_string($_POST['tslidercap6']);
$tslidercap7=sanitize_sql_string($_POST['tslidercap7']);
$tslidercap8=sanitize_sql_string($_POST['tslidercap8']);
$tslidercap9=sanitize_sql_string($_POST['tslidercap9']);
$tslidercap10=sanitize_sql_string($_POST['tslidercap10']);
$tslidercap11=sanitize_sql_string($_POST['tslidercap11']);
$tslidercap12=sanitize_sql_string($_POST['tslidercap12']);

$tslider1=($_POST['tslider1']);
$tslider2=($_POST['tslider2']);
$tslider3=($_POST['tslider3']);
$tslider4=($_POST['tslider4']);
$tslider5=($_POST['tslider5']);
$tslider6=($_POST['tslider6']);
$tslider7=($_POST['tslider7']);
$tslider8=($_POST['tslider8']);
$tslider9=($_POST['tslider9']);
$tslider10=($_POST['tslider10']);
$tslider11=($_POST['tslider11']);
$tslider12=($_POST['tslider12']);


$troutmap=($_POST['troutmap']);						
		
		
		
		echo $tothercountries=$_POST['tothercountries'];	
		foreach($tothercountries as $item4) {	
		$tothercountries2=$item4.', '.$tothercountries2;
		}
		
		echo $types=$_POST['types'];	
		foreach($types as $item43) {	
		$types2=$item43.', '.$types2;
		}
		
		echo $interests=$_POST['interests'];	
		foreach($interests as $item45) {	
		$interests2=$item45.', '.$interests2;
		}
		
		echo $activitylevel2=$_POST['activitylevel'];	
/*		foreach($activitylevel as $item46) {	
		$activitylevel2=$item46.', '.$activitylevel2;
		}*/
		
		echo $styles=$_POST['styles'];	
		foreach($styles as $item47) {	
		$styles2=$item47.', '.$styles2;
		}	
		
		echo $tcoverimgalt=$_POST['tcoverimgalt'];
		$tcoverimgalt=sanitize_sql_string($tcoverimgalt);
		
		echo $tshowcor=$_POST['tshowcor'];
		
		echo $tshow=$_POST['tshow'];			
//===============================================================================================================
//===============================================================================================================
//===============================================================================================================		



// UPADET THE OPERATORS TABLE============================================================
foreach($toperators as $newitem1) {	
	$sql200 = "UPDATE operators SET	operatorstrips='1' WHERE operators='$newitem1'";
	if (mysqli_query($conn, $sql200)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}


// UPADET THE STYLES TABLE============================================================
foreach($styles as $newitem2) {	
	$sql202 = "UPDATE styles SET stylestrips='1' WHERE styles='$newitem2'";
	if (mysqli_query($conn, $sql202)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE SUB-STYLES TABLE============================================================
foreach($tsubstyle as $newitem3) {	
	$sql203 = "UPDATE substyles SET substylestrips='1' WHERE substyles='$newitem3'";
	if (mysqli_query($conn, $sql203)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE CONTINENT TABLE============================================================
foreach($tcontinent as $newitem4) {	
	$sql204 = "UPDATE continent SET continenttrips='1' WHERE continent='$newitem4'";
	if (mysqli_query($conn, $sql204)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

// UPADET THE COUNTRIES TABLE============================================================
foreach($tcountry as $newitem5) {	
	$sql205 = "UPDATE countries SET countriestrips='1' WHERE countries='$newitem5'";
	if (mysqli_query($conn, $sql205)) {
	echo "<h4>Success</h4>";
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	}			
}

//========================================================================================
		echo $tdepartfrom=$_POST['tdepartfrom'];	
		foreach($tdepartfrom as $item59) {	
		$tdepartfrom2=$item59.', '.$tdepartfrom2;
		}	
		
//========================================================================================		
echo $exttrp=$_POST['exttrp'];
//=========================================================================================

						
		$sql2 = "UPDATE trips SET 
		tunique_id='$tunique_id',
		ttitle='$ttitle', 
		tcode='$tcode',
		tsubtitle='$tsubtitle', 
		tdetails='$tdetails', 
		tprice='$tprice', 
		tpace='$tpace',
		tcontinent='$tcontinent', 
		tcountry='$tcountry', 
		tstartarea='$tstartarea',
		tendarea='$tendarea',		 
		numcountries='$numcountries', 
		tsubstyle='$tsubstyle',		
		tduration='$duration2', 
		toperators='$toperators244', 		
		timage='$timage',
		squarethumb='$squarethumb',
		thorizontalimage='$thorizontalimage',
		tfilech='$tfilech',
		tfilechagents='$tfilechagents',
		tfileepik='$tfileepik', 
		turl='$turl', 
		tothercountries='$tothercountries22',
		active='0',
		tothercontinents='$tothercontinents22',		
		tags='$tags',
		tcurrency='$tcurrency',
		tdays='$tdays',
		twebsite='$twebsite',
		ch_agent='$ch_agent',
		tnotes='$tnotes',				
		texpiry='$texpiry',
		tgroup='$tgroup',
		AgentID='$AgentID2',
		tstartdate='$tstartdate',
		taddsubstyle='$taddsubstyle2',		
		tenddate='$tenddate',
		tdeparturegateways='$departuregateways2',
		tcruiseships='$cruiseships2',
		tbody='$tbody',
		trp='$trp',
		tmeta='$tmeta',
		tvideo='$tvideo',
		thlights='$thlights',
		tinclusions='$tinclusions',	
		activities='$activities',	
		accommodation='$accommodation',	
		texperiences='$texperiences',
		texclusions='$texclusions',
		tadditionalnotes='$tadditionalnotes',		
		tslider1='$tslider1',
		tslider2='$tslider2',
		tslider3='$tslider3',
		tslider4='$tslider4',
		tslider5='$tslider5',
		tslider6='$tslider6',
		tslider7='$tslider7',
		tslider8='$tslider8',
		tslider9='$tslider9',
		tslider10='$tslider10',
		tslider11='$tslider11',
		tslider12='$tslider12',																			
		tslidercap1='$tslidercap1',
		tslidercap2='$tslidercap2',
		tslidercap3='$tslidercap3',	
		tslidercap4='$tslidercap4',
		tslidercap5='$tslidercap5',
		tslidercap6='$tslidercap6',	
		tslidercap7='$tslidercap7',
		tslidercap8='$tslidercap8',
		tslidercap9='$tslidercap9',	
		tslidercap10='$tslidercap10',
		tslidercap11='$tslidercap11',
		tslidercap12='$tslidercap12',
		extension1='$extension1',
		extension2='$extension2',
		troutmap='$troutmap',												
		tratesdates='$tratesdates',
		tratesdatesyear1='$tratesdatesyear1',		
		tratesdates2='$tratesdates2',
		tratesdatesyear2='$tratesdatesyear2',		
		tratesdates3='$tratesdates3',
		tratesdatesyear3='$tratesdatesyear3',		
		types='$types2',
		interests='$interests2',
		tstyle='$styles2',
		activitylevel='$activitylevel2',
		tcoverimgalt='$tcoverimgalt',
		tshowcor='$tshowcor',
		tshow='$tshow',
		tdepartfrom='$tdepartfrom2',
		tcommission='$tcommission',
		exttrp='$exttrp'		 										 		
		WHERE tid=$tid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../trips-editdetails.php?tid='.$_POST['tid'].'&results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../trips-editdetails.php?tid='.$_POST['tid'].'&results=error');
		}
	}
	
		// INSERT timestamp to the shared timestamp table between trips, collections, promos, and articles
		$sql999 = "INSERT INTO shared_time (sharedid, sharedtype, sharedtime) VALUES ('', 'trips', '$tunique_id')";
		if (mysqli_query($conn, $sql999)) {
		} else {
		}
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>