<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
	
	//=====================in case admin make updates the below code will exicute==========
		$texpiry=sanitize_sql_string($texpiry);// expiry date
		echo $texpiry=$_POST['texpiry'];	
		echo $texpiry=strtotime($texpiry);// convet date to timestamp format
		echo $tgroup=trim($_POST['tgroup']);
		echo $tunique_id=time();
		echo $tdays=$_POST['tdays'];
		echo $ttitle=$_POST['ttitle'];
		$tcode=sanitize_sql_string($tcode);
		echo $tcode=$_POST['tcode'];
		$ttitle=sanitize_sql_string($ttitle);
		echo $tsubtitle=$_POST['tsubtitle'];
		$tsubtitle=sanitize_sql_string($tsubtitle);
		echo $tdetails=$_POST['tdetails'];
		$tdetails=sanitize_sql_string($tdetails);
		echo $tprice=$_POST['tprice'];	
		$tprice=sanitize_sql_string($tprice);
		echo $tcurrency=trim($_POST['tcurrency']);	
		echo $tpace=$_POST['tpace'];
		echo $tcontinent=$_POST['tcontinent'];
		
		echo $tcountry=$_POST['tcountry'];
		
		echo $tstartarea=$_POST['tstartarea'];
		$tstartarea=sanitize_sql_string($tstartarea);
		
		echo $tendarea=$_POST['tendarea'];
		$tendarea=sanitize_sql_string($tendarea);	
		
		echo $numcountries=$_POST['numcountries'];
		echo $tstyle=$_POST['tstyle'];
		echo $tsubstyle=$_POST['tsubstyle'];
		
		
		echo $taddsubstyle=$_POST['taddsubstyle'];	
		foreach($taddsubstyle as $item) {	
		$taddsubstyle2=$item.', '.$taddsubstyle2;
		}						
		
/*		if (!empty($_POST['toperators']))
		echo $toperators=$_POST['toperators'];
		else
		echo $toperators='Epik Escapes';	*/
		
		
		echo $toperators=$_POST['toperators'];	
		foreach($toperators as $item344) {	
		$toperators244=$item344.', '.$toperators244;
		}		

		echo $duration2=$_POST['duration'];	
/*		foreach($duration as $item66) {	
		$duration2=$item66.', '.$duration2;
		}*/
		
		echo $cruiseships=$_POST['cruiseships'];	
		foreach($cruiseships as $item99) {	
		$cruiseships2=$item99.', '.$cruiseships2;
		}
		
		echo $timage=$_POST['timage'];
		echo $squarethumb=$_POST['squarethumb'];		
		echo $turl=$_POST['turl'];
		echo $tfile=$_POST['tfile'];		
		echo $tags=$_POST['tags'];	
				
		$tags=sanitize_sql_string($tags);		
		
		echo $tothercontinents=$_POST['tothercontinents'];	
		foreach($tothercontinents as $item3) {	
		$tothercontinents2=$item3.', '.$tothercontinents2;
		}		
		
		echo $tothercountries=$_POST['tothercountries'];	
		foreach($tothercountries as $item1) {	
		$tothercountries2=$item1.', '.$tothercountries2;
		}	
		
		echo $tnotes=$_POST['tnotes'];
		$tnotes=sanitize_sql_string($tnotes);	
		
		echo $ch_agent=$_POST['ch_agent'];
		$ch_agent=sanitize_sql_string($ch_agent);
		
		echo $twebsite=$_POST['twebsite'];
		$twebsite=sanitize_sql_string($twebsite);		
		
		echo $thorizontalimage=$_POST['thorizontalimage'];
		$thorizontalimage=sanitize_sql_string($thorizontalimage);		
		
		echo $tstartdate=$_POST['tstartdate'];
		$tstartdate=sanitize_sql_string($tstartdate);
		
		
		echo $tmeta=$_POST['tmeta'];
		$tmeta=sanitize_sql_string($tmeta);			
		
		echo $tenddate=$_POST['tenddate'];
		$tenddate=sanitize_sql_string($tenddate);	
		
		echo $departuregateways=$_POST['departuregateways'];	
		foreach($departuregateways as $item77) {	
		$departuregateways2=$item77.', '.$departuregateways2;
		}	
		
		echo $tbody=$_POST['tbody'];
		$tbody=sanitize_sql_string($tbody);														
		
		$sql = "INSERT INTO trips (tid, tunique_id, tcode, ttitle, tsubtitle, tdetails, tprice, tcurrency, tpace, tcontinent, tcountry, tstartarea, tendarea, numcountries, tstyle, tsubstyle, taddsubstyle, tduration, toperators, timage, squarethumb, thorizontalimage, turl, tags, tothercountries, tothercontinents, active, tdays, tnotes, twebsite, ch_agent, texpiry, tgroup, tstartdate, tenddate, tdeparturegateways, tcruiseships, tbody, tmeta) 
		VALUES ('', '$tunique_id', '$tcode','$ttitle', '$tsubtitle', '$tdetails', '$tprice', '$tcurrency', '$tpace', '$tcontinent', '$tcountry', '$tstartarea', '$tendarea', '$numcountries', '$tstyle', '$tsubstyle', '$taddsubstyle2', '$duration2', '$toperators244','$timage', '$squarethumb', '$thorizontalimage', '$turl', '$tags', '$tothercountries2', '$tothercontinents2', '0', '$tdays', '$tnotes', '$twebsite', '$ch_agent', '$texpiry', '$tgroup', '$tstartdate', '$tenddate', '$departuregateways2', '$cruiseships2', '$tbody', '$tmeta')";

		if (mysqli_query($conn, $sql)) {
    		echo "<h4>Success</h4>";
			header('Location: ../trips-add.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../trips-add.php?results=error');
		}
	
		// INSERT timestamp to the shared timestamp table between trips, collections, promos, and articles
		$sql999 = "INSERT INTO shared_time (sharedid, sharedtype, sharedtime) VALUES ('', 'trips', '$tunique_id')";
		if (mysqli_query($conn, $sql999)) {
		} else {
		}
	
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>