<?php session_start();  #start a session ?>

<?php

$AgentID=$_SESSION['AgentID'];


if (empty($linkpieces[4]))
$displaynumber=4;
elseif (!empty($linkpieces[4]))
$displaynumber=12;



$currenttime=time();

if (isset($_GET['promocontinent']))
{
$promoothercontinents=$_GET['promocontinent'];
for($iiixx=0; $iiixx <= 20; $iiixx++) {
	${'co' . $iiixx}=$promoothercontinents[$iiixx];
	$valuesiixx=${'co' . $iiixx}.$valuesiixx;
	$promoothercontinentss=str_replace($valuesiixx,"",$promoothercontinentss);	
	if (!empty($promoothercontinents[$iiixx]))
		{
	$counteriixx1=$counteriixx1+1;		
	$promoothercontinentspag='&promoothercontinents%5B%5D='.${'co' . $iiixx}.$promoothercontinentspag;//------------value for pagination url------------
	$promoothercontinentss1=" OR promoothercontinents LIKE '%".${'co' . $iiixx}."%'".$promoothercontinentss1;//----------values for database-----------------
	$promoothercontinentss2=" promoothercontinents LIKE '%".${'co' . $iiixx}."%'";
		}
	}

}

if ($counteriixx1 < 2)
$promoothercontinentss=$promoothercontinentss2;
else	
$promoothercontinentss=preg_replace('/OR/', '', $promoothercontinentss1, 1);

//echo $promoothercontinentss;
//====================================================
//=========continent array============
//====================================================
if (isset($_GET['promocontinent']))
{
$promocontinent=$_GET['promocontinent'];
for($ixx=0; $ixx <= 20; $ixx++) {
	${'co' . $ixx}=$promocontinent[$ixx];
	$valuesxx=${'co' . $ixx}.$valuesxx;
	$promocontinents=str_replace($valuesxx,"",$promocontinents);	
	if (!empty($promocontinent[$ixx]))
		{
	$counterxx1=$counterxx1+1;		
	$promocontinentpag='&promocontinent%5B%5D='.${'co' . $ixx}.$promocontinentpag;//------------value for pagination url------------
	$promocontinents1=" OR promocontinent='".${'co' . $ixx}."'".$promocontinents1;//----------values for database-----------------
	$promocontinents2=" promocontinent='".${'co' . $ixx}."'";
		}
	}

}

if ($counterxx1 < 2)
$promocontinents=$promocontinents2;
else	
$promocontinents=preg_replace('/OR/', '', $promocontinents1, 1);

//====================================================
//=========operatorspromos array============
//====================================================
if (isset($_GET['operatorspromos']))
{
$promooperators=$_GET['operatorspromos'];
for($ii=0; $ii <= 20; $ii++) {
	${'cooooooo' . $ii}=$promooperators[$ii];
	$values6=${'cooooooo' . $ii}.$values6;
	$promooperatorss=str_replace($values6,"",$promooperatorss);	
	if (!empty($promooperators[$ii]))
		{
	$counter6=$counter6+1;		
	$promooperatorspag='&promooperators%5B%5D='.${'cooooooo' . $ii}.$promooperatorspag;//------------value for pagination url------------
	$promooperatorss16=" OR promooperators='".${'cooooooo' . $ii}."'".$promooperatorss16;//-------------------values for database-----------------
	$promooperatorss26=" promooperators='".${'cooooooo' . $ii}."'";
		}
	}

}

if ($counter6 < 2)
$promooperatorss=$promooperatorss26;

else	
$promooperatorss=preg_replace('/OR/', '', $promooperatorss16, 1);
 

//==================================================
//=========countries array============
//====================================================


if (isset($_GET['promocountry']))
{	
$promocountry=$_GET['promocountry'];
for($y=0; $y <= 20; $y++) {
	${'cco' . $y}=$promocountry[$y];
	$cvalues=${'cco' . $y}.$cvalues;
	$promocountrys=str_replace($cvalues,"",$promocountrys);	
	if (!empty($promocountry[$y]))
		{	
	$counter2=$counter2+1;	
	$promocountrypag='&promocountry%5B%5D='.${'cco' . $y}.$promocountrypag;//------------value for pagination url------------
	$promocountrys1=" OR promocountry='".${'cco' . $y}."'".$promocountrys1;//-------------------values for database-----------------
	$promocountrys2=" promocountry='".${'cco' . $y}."'";
		}
	}
}

if ($counter2 < 2)
$promocountrys=$promocountrys2;
else	
$promocountrys=preg_replace('/OR/', '', $promocountrys1, 1);


//==================================================
//=========other countries array============
//====================================================

if (isset($_GET['promocountry']))
{	
$promoothercountries=$_GET['promocountry'];
for($y=0; $y <= 20; $y++) {
	${'cco' . $y}=$promoothercountries[$y];
	$cvalues=${'cco' . $y}.$cvalues;
	$promoothercountriess=str_replace($cvalues,"",$promoothercountriess);	
	if (!empty($promocountry[$y]))
		{	
	$counterxx2=$counterxx2+1;	
	$promoothercountriespag='&promoothercountries%5B%5D='.${'cco' . $y}.$promoothercountriespag;//------------value for pagination url------------
	$promoothercountriess1=" OR promoothercountries LIKE '%".${'cco' . $y}."%'".$promoothercountriess1;//-------------------values for database-----------------
	$promoothercountriess2=" promoothercountries LIKE '%".${'cco' . $y}."%'";
		}
	}
}

if ($counterxx2 < 2)
$promoothercountriess=$promoothercountriess2;
else	
$promoothercountriess=preg_replace('/OR/', '', $promoothercountriess1, 1);

//echo $promoothercountriess;
//====================================================
//=========stylespromos array============
//====================================================

if (isset($_GET['stylespromos']))
{	
$stylespromos=$_GET['stylespromos'];
for($x=0; $x <= 20; $x++) {
	${'ccco' . $x}=$stylespromos[$x];
	$ccvalues=${'ccco' . $x}.$ccvalues;
	$stylespromoss=str_replace($ccvalues,"",$stylespromoss);	
	if (!empty($stylespromos[$x]))
		{	
	$counter3=$counter3+1;	
	$stylespromospag='&stylespromos%5B%5D='.${'ccco' . $x}.$stylespromospag;//------------value for pagination url------------
	$stylespromosss1=" OR promostyle='".${'ccco' . $x}."'".$stylespromosss1;//-------------------values for database-----------------
	$stylespromosss2=" promostyle='".${'ccco' . $x}."'";
		}
	}
}

if ($counter3 < 2)
$stylespromosss=$stylespromosss2;
else	
$stylespromosss=preg_replace('/OR/', '', $stylespromosss1, 1);


//====================================================
//=========Sustylespromos array============
//====================================================

if (isset($_GET['substylespromos']))
{	
$substylespromos=$_GET['substylespromos'];
for($x=0; $x <= 20; $x++) {
	${'ccccco' . $x}=$substylespromos[$x];
	$ccvalues=${'ccccco' . $x}.$ccvalues;
	$substylespromoss=str_replace($ccvalues,"",$substylespromoss);	
	if (!empty($substylespromos[$x]))
		{	
	$counter6=$counter6+1;	
	$substylespromospag='&substylespromos%5B%5D='.${'ccccco' . $x}.$substylespromospag;//------------value for pagination url------------
	$substylespromosss1=" OR promosubstyle='".${'ccccco' . $x}."'".$substylespromosss1;//-------------------values for database-----------------
	$substylespromosss2=" promosubstyle='".${'ccccco' . $x}."'";
		}
	}
}

if ($counter6 < 2)
$substylespromosss=$substylespromosss2;
else	
$substylespromosss=preg_replace('/OR/', '', $substylespromosss1, 1);


//====================================================
//===================CONNECT TO EPIK DATABSE=========================================
//====================================================

 	include($_SERVER['DOCUMENT_ROOT'].'/library/open_db_epik.php');

if (empty($_GET['term']))
{
		
	$sql = "SELECT * FROM promos WHERE (promowebsites LIKE '%2%' ||  promowebsites LIKE '%3%') AND promoactive=1 AND ( $currenttime < promoexptime)";		
	
	if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	elseif(empty($AgentID))
	$sql .=" AND AgentID='' ";	
	
	if (isset($_GET['tags']))	
	$sql .= " AND promotags LIKE '%".$_GET['tags']."%'";	// Tag ie Africa, sia etc...
	
	//=============FILTER DATABSE BASED ON continent==============================
	if (!empty($_GET['promocontinent']))
	$sql .=" AND ($promocontinents OR $promoothercontinentss) ";
	
	//============FILTER DATABSE BASED ON country name if exist====================	
	if (!empty($_GET['promocountry']))
	$sql .=" AND ($promocountrys OR $promoothercountriess) ";
	
	//=============FILTER DATABSE BASED ON operatorspromos==============================
	if (!empty($_GET['operatorspromos']))
	$sql .=" AND ($promooperatorss) ";	
	
	//=============FILTER DATABSE BASED ON promoduration================================
	if (!empty($_GET['promoduration']))
	{
	$promoduration=$_GET['promoduration'];	
	
		$sql .=" AND ( "; 
		
			if (isset($promoduration[0]))
			$sql .=" promoduration LIKE '%".$promoduration[0]."%'";

			if (isset($promoduration[1]))
			$sql .=" OR promoduration LIKE '%".$promoduration[1]."%'";
			
			if (isset($promoduration[2]))
			$sql .=" OR promoduration LIKE '%".$promoduration[2]."%'";
			
			if (isset($promoduration[3]))
			$sql .=" OR promoduration LIKE '%".$promoduration[3]."%'";
			
			if (isset($promoduration[4]))
			$sql .=" OR promoduration LIKE '%".$promoduration[4]."%'";
			
			if (isset($promoduration[5]))
			$sql .=" OR promoduration LIKE '%".$promoduration[5]."%'";
			
			if (isset($promoduration[6]))
			$sql .=" OR promoduration LIKE '%".$promoduration[6]."%'";																		
		
			if (isset($promoduration[7]))
			$sql .=" OR promoduration LIKE '%".$promoduration[7]."%'";
			
			if (isset($promoduration[8]))
			$sql .=" OR promoduration LIKE '%".$promoduration[8]."%'";

		$sql .=" ) ";//================================================================================			
	}				
	
	//=============FILTER DATABSE BASED ON departure gateways================================
	if (!empty($_GET['departuregateways']))
	{
	$departuregateways=$_GET['departuregateways'];	

	for($xx=0; $xx <= 20; $xx++) {
	${'cccox' . $xx}=$departuregateways[$xx];
	$ccvaluesx=${'cccox' . $xx}.$ccvaluesx;
	$departuregatewayss=str_replace($ccvaluesx,"",$departuregatewayss);	
	if (!empty($departuregateways[$xx]))
		{		
	$departuregatewayspag='&departuregateways%5B%5D='.${'cccox' . $xx}.$departuregatewayspag;//------------value for pagination url------------
		}
	}

	
	
		$sql .=" AND ( "; 
		
			if (isset($departuregateways[0]))
			$sql .=" departuregateways LIKE '%".$departuregateways[0]."%'";

			if (isset($departuregateways[1]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[1]."%'";
			
			if (isset($departuregateways[2]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[2]."%'";
			
			if (isset($departuregateways[3]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[3]."%'";
			
			if (isset($departuregateways[4]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[4]."%'";
			
			if (isset($departuregateways[5]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[5]."%'";
			
			if (isset($departuregateways[6]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[6]."%'";																		
		
			if (isset($departuregateways[7]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[7]."%'";
			
			if (isset($departuregateways[8]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[8]."%'";
			
			if (isset($departuregateways[9]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[9]."%'";
			
			if (isset($departuregateways[10]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[10]."%'";
			
			if (isset($departuregateways[11]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[11]."%'";
			
			if (isset($departuregateways[12]))
			$sql .=" OR departuregateways LIKE '%".$departuregateways[12]."%'";																	
		
		
		$sql .=" ) ";//================================================================================			
	}


	//=============FILTER DATABSE BASED ON stylespromos ================================
	if (!empty($_GET['stylespromos']))
		$sql .=" AND ($stylespromosss) ";	

	//============FILTER DATABSE BASED ON destinatio====================	
	if (!empty($offerscontinent))
	$sql .=" AND (promocontinent LIKE '%".$offerscontinent."%') ";
	
	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($offersinterests))
	$sql .=" AND (promosinterests LIKE '%".$offersinterests."%') ";

	//=============FILTER DATABSE BASED ON substylespromos==============================
	if (!empty($_GET['substylespromos']))
	{
		$sql .=" AND ( $substylespromosss "; 
		
			if (isset($substylespromos[0]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[0]."%'";

			if (isset($substylespromos[1]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[1]."%'";
			
			if (isset($substylespromos[2]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[2]."%'";
			
			if (isset($substylespromos[3]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[3]."%'";
			
			if (isset($substylespromos[4]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[4]."%'";
			
			if (isset($substylespromos[5]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[5]."%'";
			
			if (isset($substylespromos[6]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[6]."%'";																		
		
			if (isset($substylespromos[7]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[7]."%'";
			
			if (isset($substylespromos[8]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[8]."%'";
			
			if (isset($substylespromos[9]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[9]."%'";
			
			if (isset($substylespromos[10]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[10]."%'";
			
			if (isset($substylespromos[11]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[11]."%'";
			
			if (isset($substylespromos[12]))
			$sql .=" OR promoaddsubstyle LIKE '%".$substylespromos[12]."%'";																	
		
		
		$sql .=" ) ";//================================================================================			
	}		


}
elseif (!empty($_GET['term']))
{
	$term=trim($_GET['term']);
	
	$sql = "SELECT * FROM promos WHERE promoactive=1 AND ( $currenttime < promoexptime) AND (promowebsites='2' OR promowebsites='3') AND (promotitle LIKE '%$term%'  OR promodetails LIKE '%$term%' OR promotags LIKE '%$term%' OR promocontinent LIKE '%$term%' OR promocountry LIKE '%$term%' OR promoothercountries LIKE '%$term%' OR departuregateways LIKE '%$term%' OR promosinterests LIKE '%$term%' OR promocode LIKE '%$term%' ) ";	
		
}
	

	if (!empty($DepartLoc))	
	{
		$sql .= " AND (promodepartfrom='".$DepartLoc."' || promodepartfrom='National Departures') ";// departure assigned by geolocation
		
		//if(!empty($AgentID))
		//$sql .= " ORDER BY promodepartfrom ".$Direction.", AgentID DESC, promotimestamp DESC ";
		//else
		$sql .= " ORDER BY promopintop DESC, promodepartfrom ".$Direction.", promotimestamp DESC ";
	}
	else
	{
		//$sql .= " AND promodepartfrom='National Departures' ";	// departure not assigned by geolocation	
		
		//if(!empty($AgentID))
		//$sql .= " ORDER BY AgentID DESC, promopintop DESC, promotimestamp DESC";
		//else
		$sql .= " ORDER BY promopintop DESC, promotimestamp DESC";	
	}	

	//======================================================================================
	//Use $offerscount to Check if anything avilable to display if results = 0 display nothing==
	//======================================================================================
	$offerscount = mysql_num_rows(mysql_query($sql));	
	$result = mysqli_query($conn, $sql);
			
                       
