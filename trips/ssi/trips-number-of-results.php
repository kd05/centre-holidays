<?php
// Start the session
session_start();


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
	$sql .=" AND tcontinent LIKE '%".$tcontinent."%' ";	
	
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
	
	//=============ORDER BY trip id ascending==============================	
	
	$sql .= " ORDER BY "; 
	
	if(!empty($AgentID))
	$sql .= " AgentID DESC, " ;
	//$sql .= " FIELD(AgentID, '$AgentID') DESC, tripspintop DESC, tunique_id DESC" ;
	//else
	$sql .= " tripspintop DESC, tunique_id DESC ";
	
	$result = mysqli_query($conn, $sql);
		
	$tripscount=mysqli_num_rows($result);


include_once($_SERVER['DOCUMENT_ROOT'].'/library/closedb.php');
   
