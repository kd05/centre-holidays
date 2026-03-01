<?php 
session_start();  #start a session 
$AgentID=$_SESSION['AgentID'];
$currenttime=time();


if ($offerscount !=0)
{

?>
<style>
.load-more-items-offers {display:none; }
</style>
<?php

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

if (empty($_GET['term']))
{
		
	$sql = "SELECT * FROM promos WHERE (promowebsites LIKE '%2%' ||  promowebsites LIKE '%3%') AND promoactive=1 AND ( $currenttime < promoexptime)";		


	$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
	
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
	
	//============FILTER DATABSE BASED ON destination=================
	if (!empty($offerscontinent))
	$sql .=" || (promoothercontinents LIKE '%".$offerscontinent."%') ";	
	
	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($offersinterests))
	$sql .=" AND (promosinterests LIKE '%".$offersinterests."%') ";

}
elseif (!empty($_GET['term']))// Filter based on search results=================
{
	
	$sql = "SELECT * FROM promos WHERE promoactive=1 ";	
	
	$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
	
	if ($currentpage=='index.php')
	$sql .= " AND promoshow='Yes' ";
	else
	$sql .= " AND (promoshow ='No' || promoshow ='Yes') ";

	if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	
	if(empty($AgentID))
	$sql .= " AND (AgentID='' || (AgentID !='' AND promoshowcor='Yes'))";	
	
	$sql .= " AND ($currenttime < promoexptime) AND (promowebsites='2' OR promowebsites='3') AND (promotitle LIKE '%$term%'  OR promodetails LIKE '%$term%' OR promotags LIKE '%$term%' OR promocontinent LIKE '%$term%' OR promocountry LIKE '%$term%' OR promoothercountries LIKE '%$term%' OR departuregateways LIKE '%$term%' OR promosinterests LIKE '%$term%' OR promocode LIKE '%$term%' ) ";		
}

	//=====================Filter based on Agent's gatways location====================
	
		//$sql .= " AND (promodepartfrom LIKE '%".$DepartLoc."%') ";// departure assigned by geolocation
		
		
		//if(!empty($AgentID))
		//{		
		//$sql .= " FIELD(AgentID, '".$AgentID."') DESC, ";
		//$sql .= " FIELD(promocontinent, '".$AgentInterest1."') DESC,"; 
/*
	$sql .=" promosinterests LIKE '%".$AgentInterest1."%' DESC, promocontinent LIKE '%".$AgentInterest1."%' DESC, promocountry LIKE '%".$AgentInterest1."%' DESC, promooperators LIKE '%".$AgentInterest1."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest2."%' DESC, promocontinent LIKE '%".$AgentInterest2."%' DESC, promocountry LIKE '%".$AgentInterest2."%' DESC, promooperators LIKE '%".$AgentInterest2."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest3."%' DESC, promocontinent LIKE '%".$AgentInterest3."%' DESC, promocountry LIKE '%".$AgentInterest3."%' DESC, promooperators LIKE '%".$AgentInterest3."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest4."%' DESC, promocontinent LIKE '%".$AgentInterest4."%' DESC, promocountry LIKE '%".$AgentInterest4."%' DESC, promooperators LIKE '%".$AgentInterest4."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest5."%' DESC, promocontinent LIKE '%".$AgentInterest5."%' DESC, promocountry LIKE '%".$AgentInterest5."%' DESC, promooperators LIKE '%".$AgentInterest5."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest6."%' DESC, promocontinent LIKE '%".$AgentInterest6."%' DESC, promocountry LIKE '%".$AgentInterest6."%' DESC, promooperators LIKE '%".$AgentInterest6."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest7."%' DESC, promocontinent LIKE '%".$AgentInterest7."%' DESC, promocountry LIKE '%".$AgentInterest7."%' DESC, promooperators LIKE '%".$AgentInterest7."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest8."%' DESC, promocontinent LIKE '%".$AgentInterest8."%' DESC, promocountry LIKE '%".$AgentInterest8."%' DESC, promooperators LIKE '%".$AgentInterest8."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest9."%' DESC, promocontinent LIKE '%".$AgentInterest9."%' DESC, promocountry LIKE '%".$AgentInterest9."%' DESC, promooperators LIKE '%".$AgentInterest9."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest10."%' DESC, promocontinent LIKE '%".$AgentInterest10."%' DESC, promocountry LIKE '%".$AgentInterest10."%' DESC, promooperators LIKE '%".$AgentInterest10."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest11."%' DESC, promocontinent LIKE '%".$AgentInterest11."%' DESC, promocountry LIKE '%".$AgentInterest11."%' DESC, promooperators LIKE '%".$AgentInterest11."%' DESC, ";
	$sql .=" promosinterests LIKE '%".$AgentInterest12."%' DESC, promocontinent LIKE '%".$AgentInterest12."%' DESC, promocountry LIKE '%".$AgentInterest12."%' DESC, promooperators LIKE '%".$AgentInterest12."%' DESC, ";
		*/
		//$sql .= " promodepartfrom ".$Direction.", promotimestamp DESC ";
		//}
		//else
	
	//Winnipeg, Victoria, Vancouver, Toronto, Saskatoon, Regina, Ottawa, Moncton, London, Kelowna, Hamilton, Halifax, Fredericton, Edmonton, Calgary, 
	
		$AgentGateCountry;// ie Canada
		$AgentGateProvince;// ie Ontario
		$AgentGateCity;// ie Toronto
		$AgentGateWayArea;// ie Eastern Canada 
	
		$sql .= " ORDER BY ";
		
		if (!empty($AgentID))
		$sql .= " AgentID DESC, ";
		
		$sql .= " promopintop DESC ";
		//$sql .=" departuregateways LIKE '%".$AgentGateCity."%' DESC, promodepartfrom LIKE '%".$AgentGateWayArea."%' DESC, promodepartfrom LIKE '%National Departures%' DESC, ";


//=====================================================================================================

$result = mysqli_query($conn, $sql);
$offerscount=mysqli_num_rows($result);
			
?>
<div class="row mb-20">
<!--begin::Item-->
<?php			
			
if ($offerscount > 0)
{

//===================================================================================
//===================the COL-SIZE 3, 6 or 12=========================================
//===================================================================================
switch ($offerscount) {
  case "1":
    $pdiv='col-xl-12 col-md-12';
    break;
  case "2":
    $pdiv='col-xl-6 and col-md-6';
    break;
  default:
    $pdiv='col-xl-4 and col-md-6';
}	


while($row = mysqli_fetch_assoc($result)) {
$counter44++;

$AgentID2=str_replace(',', "", $row['AgentID']);

	if (!empty($AgentID2) || !empty($AgentID))
	{
	
	if (!empty($AgentID))
	$AgentID3=$AgentID;
	else
	$AgentID3=$AgentID2;
	
	//=========================get the agent URL====
	$sql717 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE (ch_agents_1.AgentID='".$AgentID3."' AND ch_agents_2.AgentID='".$AgentID2."') and ch_agents_1.active=1 LIMIT 1";
	$result717 = mysqli_query($conn, $sql717);
	// output data of each row
	while($row717 = mysqli_fetch_assoc($result717)) {
	
	$Website=trim($row717['Website']); //		
	
	if (empty($AgentID))
	$AgentID3='';
	
	}
	//==============================================	
	
		
	$PWebsite=$Website.'/';	
	}
	else
	$PWebsite='centreholidays.com/';
	
	
?>

<div class="<?php echo $pdiv ?> load-more-items-offers mb-10">
<!--begin::Offer-->
<div class="card card-border card-custom mb-8 mb-lg-0 card-stretch" style="min-height:225px;">
<!--begin::Ribbon-->
<div class="ribbon ribbon-clip ribbon-right">	
<div class="ribbon-target" style="top: 15px; height: 45px;">
<span class="ribbon-inner bg-success"></span>
<i class="fa fa-tag text-white"></i>
</div>
</div>
<!--end::Ribbon-->
<div class="card-body d-flex flex-column">
<div class="flex-grow-1 text-dark lead">														
<h2 class="font-weight-boldest text-uppercase"><?php echo $row['promotitle']; ?></h2>														
<p><?php echo $row['promodetails']; ?></p>
<?php $promodepartfrom=trim($row['promodepartfrom']); ?>
<small class="font-size-xs">Valid Till <?php echo date('F j, Y', strtotime($row['promoexpirydate'])); ?></small>
</div>

<div class="mt-10 d-flex">
<a href="<?php echo 'https://'.$PWebsite ?>special-offers/featured-offer.php?pro=<?php echo $row['promourl']; ?>&promocode=<?php echo $row['promocode']; ?>" title="Special Offer Details" class="btn btn-warning px-5 py-3 text-uppercase font-weight-bolder">
Special Offer Details
</a>

</div>


</div>
</div>
<!--end::Offer-->
</div>


<?php } if ($counter44 > 6) { ?> 

<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 loadbutton-offers" id="load-more-button-offers" title="See More Special Offers"><span><i class="fas fa-angle-double-down"></i></span>See More Special Offers</button>
</div>

<?php } ?>

</div>
  
<?php
}
mysqli_close($conn);

}
?>