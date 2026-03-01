<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

		$tid=trim($_GET['tid']);
		$tunique_id=time();		

//===================================recall all the current needed styles, substyles etc...========

		$sql000 = "SELECT * FROM trips WHERE tid='$tid'";
		$result000 = mysqli_query($conn, $sql000);
		$row_cnt000 = mysqli_num_rows($result000);

	if ($row_cnt000 > 0)// display results in case the feedback table is not empty
	{

		// output data of each row
		while($row000 = mysqli_fetch_assoc($result000)) {
			
		$continent=$row000['tcontinent'];
		$othercontinents=$row000['tothercontinents'];
		$countries=$row000['tcountry']; 
		$othercountries=$row000['tothercountries'];
		
		$styles=$row000['tstyle'];
		$substyles=$row000['tsubstyle'];
		$addsubstyle=$row000['taddsubstyle'];
		
		$duration=$row000['tduration']; 
		$operators=$row000['toperators']; 
		$departuregateways=$row000['tdeparturegateways']; 	
		$website=$row000['twebsite'];	
		
		}

	}
	
	
	echo $departuregateways;
	$departuregateways=explode(',', $departuregateways);	
	echo $website; 
	echo "<hr />";


//=============================================Styles=========================================================
		$sql12 = "UPDATE styles SET ";
		
			if ($website == 1)// epike only
		$sql12 .= " stylestrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql12 .= " stylestrips='1' ";													
			elseif ($website == 3) // epike and centre
		$sql12 .= " stylestrips='1', stylestrips2='1' ";															
			
		$sql12 .= " WHERE styles='$styles' ";			

		if (mysqli_query($conn, $sql12)) {echo "ok styles";} else {echo "error" . mysqli_error($conn);}

//=============================================Sub-Styles=========================================================
		$sql122 = "UPDATE substyles SET ";
		
			if ($website == 1)// epike only
		$sql122 .= " substylestrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql122 .= " substylestrips='1' ";													
			elseif ($website == 3) // epike and centre
		$sql122 .= " substylestrips='1', substylestrips2='1' ";															
			
		$sql22 .= " WHERE (substyles='$substyles' || substyles LIKE '%$addsubstyle%') ";			

		if (mysqli_query($conn, $sql122)) {echo "ok substyles";} else {echo "error" . mysqli_error($conn);}
		
//=============================================Continent=========================================================
		$sql1222 = "UPDATE continent SET ";
		
			if ($website == 1)// epike only
		$sql1222  .= " continenttrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql1222  .= " continenttrips='1' ";											
			elseif ($website == 3) // epike and centre
		$sql1222  .= " continenttrips='1', continenttrips2='1' ";														
			
		$sql222 .= " WHERE (continent='$continent' || continent LIKE '%$tothercontinents%') ";			

		if (mysqli_query($conn, $sql1222)) {echo "ok continent";} else {echo "error" . mysqli_error($conn);}		
		
//=============================================Countries=========================================================
		$sql12222 = "UPDATE countries SET ";
		
			if ($website == 1)// epike only
		$sql12222  .= " countriestrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql12222  .= " countriestrips='1' ";											
			elseif ($website == 3) // epike and centre
		$sql12222  .= " countriestrips='1', countriestrips2='1' ";															
			
		$sql2222 .= " where (countries='$countries' || countries LIKE '%$othercountries%') ";		

		if (mysqli_query($conn, $sql12222)) {echo "ok countries";} else {echo "error" . mysqli_error($conn);}		

//=============================================Duration=========================================================
		$sql33 = "UPDATE duration SET ";
		
			if ($website == 1)// epike only
		$sql33  .= "  durationtrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql33  .= " durationtrips='1' ";											
			elseif ($website == 3) // epike and centre
		$sql33  .= " durationtrips='1', durationtrips2='1' ";															
			
		$sql33 .= " where (duration='$duration') ";		

		if (mysqli_query($conn, $sql33)) {echo "ok durations";} else {echo "error" . mysqli_error($conn);}
		
//=============================================Operators=========================================================
		$sql333 = "UPDATE operators SET ";
		
			if ($website == 1)// epike only
		$sql333  .= " operatorstrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql333  .= " operatorstrips='1' ";											
			elseif ($website == 3) // epike and centre
		$sql333  .= " operatorstrips='1', operatorstrips2='1' ";															
			
		$sql333 .= " where (operators='$operators') ";		

		if (mysqli_query($conn, $sql333)) {echo "ok operators";} else {echo "error" . mysqli_error($conn);}		
		
//=============================================Departuregateways=========================================================
		$sql77 = "UPDATE departuregateways SET ";
		
			if ($website == 1)// epike only
		$sql77  .= "  departuregatewaystrips2='1' ";										
			elseif ($website == 2) // centre only
		$sql77  .= " departuregatewaystrips='1' ";											
			elseif ($website == 3) // epike and centre
		$sql77  .= " departuregatewaystrips='1', departuregatewaystrips2='1' ";															
			
		$sql77 .= " where (departuregateways LIKE '%$departuregateways%') ";		

		if (mysqli_query($conn, $sql77)) {echo "ok departuregateways";} else {echo "error" . mysqli_error($conn);}	
		
//=============================================Departuregateways=========================================================
		$sql88 = "UPDATE departuregateways SET ";
		
			if ($website == 1)
		$sql88 .= " departuregatewaystrips2='1' ";										
			elseif ($website == 2) 
		$sql88 .= " departuregatewaystrips='1' ";													
			elseif ($website == 3) 
		$sql88 .= " departuregatewaystrips='1', departuregatewaystrips2='1' ";															
			
		$sql88 .= " WHERE 
		(departuregateways LIKE '%departuregateways[0]%' ||
		(departuregateways LIKE '%departuregateways[1]%' ||
		(departuregateways LIKE '%departuregateways[2]%' ||
		(departuregateways LIKE '%departuregateways[3]%' ||
		(departuregateways LIKE '%departuregateways[4]%' ||
		(departuregateways LIKE '%departuregateways[5]%' ||
		(departuregateways LIKE '%departuregateways[6]%' ||
		) ";			

		if (mysqli_query($conn, $sql88)) {echo "ok departuregateways";} else {echo "error" . mysqli_error($conn);}				
					
//=============================================Activate Trip======================================================
		
	$sql = "UPDATE trips SET active='1' WHERE tid=$tid LIMIT 1";
		if (mysqli_query($conn, $sql)) {
		echo "<h4>Success trips active</h4>";
		header('Location: ../trips-edit.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		header('Location: ../trips-edit.php?results=error');
		}
		
	
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>