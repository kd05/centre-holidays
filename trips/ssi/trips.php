<?php
// Start the session
session_start();

if ($tripscount !=0)
{
	
$AgentID=$_SESSION['AgentID'];

if (empty($linkpieces[4]))
$displaynumber=4;
elseif (!empty($linkpieces[4]))
$displaynumber=12;

?>
<style>
.load-more-items-trips { display:no0ne; }
</style>
<div class="row mb-20">
<?php

//========sanatize===================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');


//====================================================
//=========Types array============
//====================================================

if (isset($_GET['types']))
{	
$types=$_GET['types'];
for($x=0; $x <= 20; $x++) {
	${'ccccco' . $x}=$types[$x];
	$ccvalues=${'ccccco' . $x}.$ccvalues;
	$typess=str_replace($ccvalues,"",$typess);	
	if (!empty($types[$x]))
		{	
	$counter6=$counter6+1;	
	$typespag='&types%5B%5D='.${'ccccco' . $x}.$typespag;//------------value for pagination url------------
	$typesss1=" OR types LIKE '%".${'ccccco' . $x}."%'".$typesss1;//-------------------values for database-----------------
	$typesss2=" types LIKE '%".${'ccccco' . $x}."%'";
		}
	}
}

if ($counter6 < 2)
$typesss=$typesss2;
else	
$typesss=preg_replace('/OR/', '', $typesss1, 1);

//====================================================
//=========duration array============
//====================================================

if (isset($_GET['duration']))
{
$duration=$_GET['duration'];
for($n=0; $n <= 20; $n++) {
	${'cccco' . $n}=$duration[$n];
	$cccvalues=${'cccco' . $n}.$cccvalues;
	$durations=str_replace($cccvalues,"",$durations);	
	if (!empty($duration[$n]))
		{	
	$counter4=$counter4+1;	
	$durationpag='&duration%5B%5D='.${'cccco' . $n}.$durationpag;//------------value for pagination url------------
	$durations1=" OR tduration='".${'cccco' . $n}."'".$durations1;//-------------------values for database-----------------
	$durations2=" tduration='".${'cccco' . $n}."'";
		}
	}
}

if ($counter4 < 2)
$tdurationss=$durations2;
else	
$tdurationss=preg_replace('/OR/', '', $durations1, 1);

//====================================================
//====================rest of values==============================================
//====================================================
$tags = trim(sanitize_sql_string($_GET['tags']));// tags
$ttitle = trim(sanitize_sql_string($_GET['ttitle']));// title
$tprice = trim(sanitize_sql_string($_GET['tprice']));// price
$tpace = trim(sanitize_sql_string($_GET['tpace']));// pace

//==========================================================================================

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

if (empty($_GET['term']))// if search NOT used==============================================
{	

	$sql = "SELECT * FROM trips WHERE (twebsite='2' OR twebsite='3') AND (active ='1' ";	
	
	$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

if ($currentpage=='index.php')

$sql .= " AND tshow='Yes' ";
else
$sql .= " AND (tshow='Yes' || tshow ='No')";

if (!empty($AgentID))
$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') "; 

if (empty($AgentID))
$sql .= " AND (AgentID='' || (AgentID !='' AND tshowcor='Yes'))"; 

	
	//=============FILTER DATABSE BASED ON AGENT==============================
	if(isset($tcontinent))
	$sql .=" AND ch_agent ='".$_COOKIE['ch_agent']."' ";	
	
	//=============FILTER DATABSE BASED ON Destination/Continent==============================
	if(!empty($tcontinent))
	$sql .=" AND (tcontinent LIKE '%".$tcontinent."%' || tothercontinents LIKE '%".$tcontinent."%' ) ";	
	
	//=============FILTER DATABSE BASED ON operators==============================
	if (!empty($operators))
	$sql .=" AND toperatorss LIKE '%".$operators."%' ";	
	
	//=============FILTER DATABSE BASED ON Styles ie Ecenomy, luxry etc.==============
	if (!empty($tstyle))
	$sql .=" AND tstyle LIKE '%".$tstyle."%' ";		
		
	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($interests))
	$sql .=" AND (interests LIKE '%".$interests."%') ";	

	//=============FILTER DATABSE BASED ON duration================================
	if (!empty($_GET['duration']))
		$sql .=" AND ($tdurationss) ";					
	
	//=============FILTER DATABSE BASED ON TAG===================================
	if (!empty($_GET['tags']))
		$sql .= " AND tags LIKE '%$tags%' ";
	

}
elseif (!empty($_GET['term']))// if search is used===========================================================
{

$term=trim($_GET['term']);
	
$sql = "SELECT * FROM trips WHERE active=1 ";	
	
$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

if ($currentpage=='index.php')

$sql .= " AND tshow='Yes' ";
else
$sql .= " AND (tshow='Yes' || tshow ='No')";

if (!empty($AgentID))
$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') "; 

if (empty($AgentID))
$sql .= " AND (AgentID='' || (AgentID !='' AND tshowcor='Yes'))"; 

$sql .= "AND (twebsite='2' OR twebsite='3') AND (ttitle LIKE '%$term%' OR interests LIKE '%$term%' OR tmeta LIKE '%$term%' OR tmeta LIKE '%$term%' OR types LIKE '%$term%' OR tags LIKE '%$term%' OR interests LIKE '%$term%' OR tcode LIKE '%$term%' ";	


}
	
	$sql .= ") ";
	
	

	//=============Display Trip associated with this agent only ====
	//echo $AgentID ;
	
	//if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	//elseif(empty($AgentID))
	//$sql .=" AND AgentID='' ";	
	
	//=============FILTER DATABSE BASED ON types==============================
	if (!empty($_GET['types']))
	{
	$sql .=" AND ($typesss) ";				
	}	

	if(!empty($DTypes))
	$sql .=" AND types LIKE '%$DTypes%' ";

	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($interests))
	$sql .=" AND (interests LIKE '%".$interests."%') ";
	
	
	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($interests))
	$sql .=" AND (interests LIKE '%".$interests."%') ";
	
	//============FILTER DATABSE BASED ON selected values====================	
	if (!empty($interests))
	$sql .=" AND (interests LIKE '%".$interests."%') ";
	
	
	$sql .= " ORDER BY "; 
	
	if(!empty($AgentID))
	{	
	$sql .= " AgentID DESC, tripspintop DESC, ";
	
	$sql .=" interests LIKE '%".$AgentInterest1."%' DESC, tcontinent LIKE '%".$AgentInterest1."%' DESC, tcountry LIKE '%".$AgentInterest1."%' DESC, toperators LIKE '%".$AgentInterest1."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest2."%' DESC, tcontinent LIKE '%".$AgentInterest2."%' DESC, tcountry LIKE '%".$AgentInterest2."%' DESC, toperators LIKE '%".$AgentInterest2."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest3."%' DESC, tcontinent LIKE '%".$AgentInterest3."%' DESC, tcountry LIKE '%".$AgentInterest3."%' DESC, toperators LIKE '%".$AgentInterest3."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest4."%' DESC, tcontinent LIKE '%".$AgentInterest4."%' DESC, tcountry LIKE '%".$AgentInterest4."%' DESC, toperators LIKE '%".$AgentInterest4."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest5."%' DESC, tcontinent LIKE '%".$AgentInterest5."%' DESC, tcountry LIKE '%".$AgentInterest5."%' DESC, toperators LIKE '%".$AgentInterest5."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest6."%' DESC, tcontinent LIKE '%".$AgentInterest6."%' DESC, tcountry LIKE '%".$AgentInterest6."%' DESC, toperators LIKE '%".$AgentInterest6."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest7."%' DESC, tcontinent LIKE '%".$AgentInterest7."%' DESC, tcountry LIKE '%".$AgentInterest7."%' DESC, toperators LIKE '%".$AgentInterest7."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest8."%' DESC, tcontinent LIKE '%".$AgentInterest8."%' DESC, tcountry LIKE '%".$AgentInterest8."%' DESC, toperators LIKE '%".$AgentInterest8."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest9."%' DESC, tcontinent LIKE '%".$AgentInterest9."%' DESC, tcountry LIKE '%".$AgentInterest9."%' DESC, toperators LIKE '%".$AgentInterest9."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest10."%' DESC, tcontinent LIKE '%".$AgentInterest10."%' DESC, tcountry LIKE '%".$AgentInterest10."%' DESC, toperators LIKE '%".$AgentInterest10."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest11."%' DESC, tcontinent LIKE '%".$AgentInterest11."%' DESC, tcountry LIKE '%".$AgentInterest11."%' DESC, toperators LIKE '%".$AgentInterest11."%' DESC, ";
	$sql .=" interests LIKE '%".$AgentInterest12."%' DESC, tcontinent LIKE '%".$AgentInterest12."%' DESC, tcountry LIKE '%".$AgentInterest12."%' DESC, toperators LIKE '%".$AgentInterest12."%' DESC, ";	
	
	$AgentGateCountry;// ie Canada
	$AgentGateProvince;// ie Ontario
	$AgentGateCity;// ie Toronto
	$AgentGateWayArea;// ie Eastern Canada 
	$sql .=" tdeparturegateways LIKE '%".$AgentGateCity."%' DESC, tdepartfrom LIKE '%".$AgentGateWayArea."%' DESC, tdepartfrom LIKE '%National Departures%' DESC, ";

	
	$sql .= " tunique_id DESC" ;
	
	}
	else
	{
	$sql .= " tripspintop DESC, ";	
	$sql .=" tdepartfrom LIKE '%National Departures%' DESC, ";	
	$sql .= " tunique_id DESC ";
	}
	
	$result = mysqli_query($conn, $sql);
		
	if (mysqli_num_rows($result) > 0) {
  	// output data of each row
  	while($row = mysqli_fetch_assoc($result)) {
	
	$counter388++;
	
	if (!empty($row['AgentID']))
	{	
	$sql776 = "SELECT * FROM ch_agents WHERE AgentID='".$row['AgentID']."' LIMIT 1";
	//$sql776 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE (ch_agents_1.AgentID='".$row['AgentID']."' AND ch_agents_2.AgentID='".$row['AgentID']."') LIMIT 1";
	$result776 = mysqli_query($conn, $sql776);
		while($row776 = mysqli_fetch_assoc($result776)) {
			$Website=$row776['Website'];
			$twebsite=$row776['twebsite'];
		}
	}
	else
	{
		if (empty($Website))
		$Website='centreholidays.com';// if the website assigned to CH
		else
		$Website=$Website;
	}
	
	$tripsurl='https://'.$Website.'/trips/trip.php?trp='.$row['trp'].'&tid='.$row['tid'];

	// counter
	$counting++;
	
	
	?>
<!--begin::Item-->
<div class="col-xl-4 col-md-6 mb-10 load-more-items-trips">

    <!--begin::Tiles Widget 15-->
    <div class="card card-custom card-border card-stretch">

											<!--begin::Body-->
<div class="card-body p-0 d-flex flex-column">
<img class="img-responsive card-rounded-top" src="https://centreholidays.com/img/trips/<?php echo $row['thorizontalimage'] ?>" alt="<?php echo $row['ttitle']; ?>">
<div class="row">
<!--begin::Label-->
<div class="col-xl-12 d-flex flex-center mt-n6">

<?php 
if ($row['numcountries'] > 1) 
$Country='Countries';
else
$Country='Country';
?>

<span class="label label-xl label-inline label-white px-5 py-3 text-uppercase font-weight-bolder text-danger"><?php echo $row['numcountries'].' '.$Country; ?> • <?php echo $row['tdays']; ?> Days</span>
</div>
<!--end::Label-->
</div>												<!--begin::Items-->
<div class="flex-grow-1 card-spacer mt-n5">
<div>
<!--begin::Title-->
<h2 class="font-weight-boldest text-uppercase text-dark"><?php echo $row['ttitle'] ?></h2>
<!--end::Title-->
</div>													<!--begin::Item-->												
<div class="d-flex align-items-center mb-8 mt-8">
<!--begin::Symbol-->
<div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
<div class="symbol-label">
<span>
<!--begin::Icon-->
<i class="fas fa-star"></i>																<!--end::Icon-->
</span>
</div>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65"><?php 
if (!empty($row['tratesdatesyear1']))
echo $row['tratesdatesyear1'];

if (!empty($row['tratesdatesyear2']))
echo ', '.$row['tratesdatesyear2'];

if (!empty($row['tratesdatesyear3']))
echo ', '.$row['tratesdatesyear3']; 
?></span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $row['thlights']; ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
<div class="symbol-label">
<span>

<!--begin::Icon-->

<?php
$tcurrency=$row['tcurrency'];

switch ($tcurrency) {
  case "¥":
    $sign="<i class='fas fa-yen-sign'></i>";
    break;
  case "€":
    $sign="<i class='fas fa-euro-sign'></i>";
    break;
  case "£":
    $sign="<i class='fas fa-pound-sign'></i>";
    break;
  default:
    $sign="<i class='fas fa-dollar-sign'></i>";
}

echo $sign; 

?>																
<!--end::Icon-->

</span>
</div>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65 mt-1">Starts At</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $row['tcurrency']; ?><?php echo $row['tprice']; ?> Per Person</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
</div>										
<!--end::Items-->								
<!--begin::Action-->
<div class="d-flex flex-center card-spacer mt-n5">

<!--URLs Internal and External-->
<?php if (!empty($row['exttrp'])) { ?>
<a href="<?php echo $row['exttrp'] ?>" title="Trip Details" target="_new" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100">Trip Details</a>
<?php } else { ?>
<?php if (!empty($row['trp'])) { ?>
<a href="<?php echo $tripsurl ?>" title="Trip Details" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100" onclick="ChangeUrl('', '?tid=<?php echo $row['tid'] ?>&trp=<?php echo $row['trp'] ?>');">Trip Details</a>
<?php } ?>
<?php } ?>
<?php if (!empty($row['tfilech'])) { ?>
<!--PDF-->
<a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $row['tfilech']; ?>" title="PDF" target="_blank" class="ml-3 btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100" download>PDF</a>
<?php } ?>

</div>
<!--end::Action-->
</div>
<!--end::Body-->
</div>
<!--end::Tiles Widget 15-->
			</div>
<!--end::Item-->
<?php 

					}
            
	}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closedb.php');


if ($counter388 > 6) { ?> 
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 loadbutton-trips" id="load-more-button-trips" title="See More Trips"><span><i class="fas fa-angle-double-down"></i></span>See More Trips</button>
</div>
<?php
}
?>                                  
</div>

<?php
}
?>