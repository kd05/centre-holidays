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
.load-more-items-trips { display:none; }
</style>
<div class="row mb-20">
<?php

//========sanatize===================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');

//====================================================
//=========operators array============
//====================================================
if (isset($_GET['operators']))
{
$toperators=$_GET['operators'];
for($ii=0; $ii <= 20; $ii++) {
	${'cooooooo' . $ii}=$toperators[$ii];
	$values6=${'cooooooo' . $ii}.$values6;
	$toperatorss=str_replace($values6,"",$toperatorss);	
	if (!empty($toperators[$ii]))
		{
	$counter6=$counter6+1;		
	$toperatorspag='&toperators%5B%5D='.${'cooooooo' . $ii}.$toperatorspag;//------------value for pagination url------------
	$toperatorss16=" OR toperators LIKE '%".${'cooooooo' . $ii}."%'".$toperatorss16;//-------------------values for database-----------------
	$toperatorss26=" toperators LIKE '%".${'cooooooo' . $ii}."%'";
		}
	}

}

if ($counter6 < 2)
$toperatorss=$toperatorss26;
else	
$toperatorss=preg_replace('/OR/', '', $toperatorss16, 1);


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

	$sql = "SELECT * FROM trips WHERE (twebsite='1' OR twebsite='3') AND (active ='1' ";	
	
	$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

if ($currentpage=='index.php')
$sql .= " AND tshow='Yes' ";
else
$sql .= " AND (tshow='Yes' || tshow ='No')";

if (!empty($AgentID))
$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') "; 

if (empty($AgentID))
$sql .= " AND (AgentID='' || (AgentID !='' AND tshowcor='Yes'))"; 
	

	//=============FILTER DATABSE BASED ON operators==============================
	if (!empty($_GET['operators']))
	$sql .=" AND ($toperatorss) ";	
		
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

$sql .= "AND (twebsite='1' OR twebsite='3') AND (ttitle LIKE '%$term%' OR interests LIKE '%$term%' OR tmeta LIKE '%$term%' OR tmeta LIKE '%$term%' OR types LIKE '%$term%' OR tags LIKE '%$term%' OR interests LIKE '%$term%' OR tcode LIKE '%$term%' ";	


}
	
	$sql .= ") ";
	
	//=============FILTER DATABSE BASED ON Destination/Continent==============================
	if(!empty($continent))
	$sql .=" AND (tcontinent LIKE '%".$continent."%' || tothercontinents LIKE '%".$continent."%' ) ";		

	//=============Display Trip associated with this agent only ====
	//echo $AgentID ;
	
	//if(!empty($AgentID))
	$sql .=" AND (AgentID LIKE '%$AgentID%' || AgentID='') ";
	//elseif(empty($AgentID))
	//$sql .=" AND AgentID='' ";	
	
	//=============FILTER DATABSE BASED ON types==============================
/*	if (!empty($_GET['types']))
	{
	$sql .=" AND ($typesss) ";				
	}	

	if(!empty($DTypes))
	$sql .=" AND types LIKE '%$DTypes%' ";*/

	//============FILTER DATABSE BASED ON interest====================	
	if (!empty($interests))
	$sql .=" AND (interests LIKE '%".$interests."%') ";
	
	//=============FILTER DATABSE BASED ON TYPES==============================
	if(!empty($types))
	$sql .=" AND (types LIKE '%".$types."%') ";
	
	//=============ORDER BY trip id ascending==============================	
	
	$sql .= " ORDER BY "; 
	
	if(!empty($AgentID))
	$sql .= " AgentID DESC, " ;
	//$sql .= " FIELD(AgentID, '$AgentID') DESC, tripspintop DESC, tunique_id DESC" ;
	//else
	$sql .= " tripspintop DESC, tunique_id DESC ";
	
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
		$Website='epikescapes.com';// if the website assigned to CH
		else
		$Website=$Website;
	}
	
	$tripsurl='https://www.'.$Website.'/trips/trip.php?trp='.$row['trp'].'&tid='.$row['tid'];

	// counter
	$counting++;
	
	
	?>
<!--begin::Item-->
<div class="col-xl-4 col-md-6 mb-10 load-more-items-trips">

    <!--begin::Tiles Widget 15-->
    <div class="card card-custom card-border card-stretch">
<?php if (!empty($row['tcommission'])) { ?>
<!--begin::Ribbon-->
<div class="ribbon ribbon-top">	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; right: 20px;"><?php echo $row['tcommission']; ?> Commission</div>
</div>
<!--end::Ribbon-->
<?php } ?>  											<!--begin::Body-->
<div class="card-body p-0 d-flex flex-column">
<img class="img-responsive card-rounded-top" src="https://www.epikescapes.com/img/trips/<?php echo $row['thorizontalimage']; ?>" alt="<?php echo $row['ttitle']; ?>">
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
<span class="text-dark-65">
<?php 
if (!empty($row['tratesdatesyear1']))
echo $row['tratesdatesyear1'];

if (!empty($row['tratesdatesyear2']))
echo ', '.$row['tratesdatesyear2'];

if (!empty($row['tratesdatesyear3']))
echo ', '.$row['tratesdatesyear3']; 
?>
</span>														
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
<a href="<?php echo $tripsurl ?>" title="See Trip Details" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100" onclick="ChangeUrl('', '?tid=<?php echo $row['tid'] ?>&trp=<?php echo $row['trp'] ?>');">Trip Details</a>
<?php if (!empty($row['tfilechagents'])) { ?>
<a href="<?php echo $row['tfilechagents']; ?>" title="Access Drive" target="_blank" class="ml-3 btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100">Access Drive</a>
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
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-trips" title="See More"><span><i class="fas fa-angle-double-down"></i></span>See More Trips</button>
</div>
<?php
}
?>
                                     
</div>

<?php
}
?>