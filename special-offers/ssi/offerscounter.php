<?php 
session_start();  #start a session 

$AgentID=$_SESSION['AgentID'];
$currenttime=time();

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

if (empty($_GET['term']))
{
		
	$sql = "SELECT * FROM promos WHERE (promowebsites LIKE '%2%' ||  promowebsites LIKE '%3%') AND promoactive=1 AND ( $currenttime < promoexptime)";		
	
	if ($currentpage=='index.php')
	$sql .= " AND promoshow='Yes' ";
	else
	$sql .= " AND (promoshow ='No' || promoshow ='Yes') ";

	if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	
	if(empty($AgentID))
	$sql .= " AND (AgentID='' || (AgentID !='' AND promoshowcor='Yes'))";
	
	if (isset($_GET['tags']))	
	$sql .= " AND promotags LIKE '%".$_GET['tags']."%'";	// Tag ie Africa, sia etc...
	
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

		$sql .=" ) ";		
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
		
		
		$sql .=" ) ";		
	}

	//============FILTER DATABSE BASED ON destination=================
	if (!empty($offerscontinent))
	$sql .=" AND (promocontinent LIKE '%".$offerscontinent."%') ";
	
	//============FILTER DATABSE BASED ON operators=================
	if (!empty($offersoperators))
	$sql .=" AND (promooperators LIKE '%".$offersoperators."%') ";	
	
	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($offersinterests))
	$sql .=" AND (promosinterests LIKE '%".$offersinterests."%') ";

}
elseif (!empty($_GET['term']))// Filter based on search results=================
{

	$term=trim($_GET['term']);
	
	$sql = "SELECT * FROM promos WHERE promoactive=1 ";	
	
	if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	
	if(empty($AgentID))
	$sql .= " AND (AgentID='' || (AgentID !='' AND promoshowcor='Yes'))";	
	
	$sql .= " AND ($currenttime < promoexptime) AND (promowebsites='2' OR promowebsites='3') AND (promotitle LIKE '%$term%'  OR promodetails LIKE '%$term%' OR promotags LIKE '%$term%' OR promocontinent LIKE '%$term%' OR promocountry LIKE '%$term%' OR promoothercountries LIKE '%$term%' OR departuregateways LIKE '%$term%' OR promosinterests LIKE '%$term%' OR promocode LIKE '%$term%' ) ";		
}
	
	//=====================Filter based on departing location====================
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


$result = mysqli_query($conn, $sql);
$offerscount=mysqli_num_rows($result);
	
mysqli_close($conn);
?>