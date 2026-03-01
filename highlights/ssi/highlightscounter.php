<?php
// Start the session
session_start();

$link = $_SERVER['PHP_SELF'];// get the url value
$link_array = explode('/',$link);//expolsion
$Pagetitle = end($link_array);//get url page names


//==================================================
//=========countries array============
//====================================================
if (isset($_GET['highlightscountry']))
{	
$highlightscountry=$_GET['highlightscountry'];
for($y=0; $y <= 20; $y++) {
	${'cco' . $y}=$highlightscountry[$y];
	$cvalues=${'cco' . $y}.$cvalues;
	$highlightscountrys=str_replace($cvalues,"",$highlightscountrys);	
	if (!empty($highlightscountry[$y]))
		{	
	$counter2=$counter2+1;	
	$highlightscountrypag='&highlightscountry%5B%5D='.${'cco' . $y}.$highlightscountrypag;//------------value for pagination url------------
	$highlightscountrys1=" OR highlightscountry LIKE '%".${'cco' . $y}."%'".$highlightscountrys1;//-------------------values for database-----------------
	$highlightscountrys2=" highlightscountry LIKE '%".${'cco' . $y}."%'";
		}
	}
}

if ($counter2 < 2)
$highlightscountrys=$highlightscountrys2;
else	
$highlightscountrys=preg_replace('/OR/', '', $highlightscountrys1, 1);

//====================================================
//=========operators array============
//====================================================
if (isset($_GET['highlightsoperators']))
{
$highlightsoperators=$_GET['highlightsoperators'];
for($ii=0; $ii <= 20; $ii++) {
	${'cooooooo' . $ii}=$highlightsoperators[$ii];
	$values6=${'cooooooo' . $ii}.$values6;
	$highlightsoperatorss=str_replace($values6,"",$highlightsoperatorss);	
	if (!empty($highlightsoperators[$ii]))
		{
	$counter6=$counter6+1;		
	$highlightsoperatorspag='&highlightsoperators%5B%5D='.${'cooooooo' . $ii}.$highlightsoperatorspag;
	$highlightsoperatorss16=" OR highlightsoperators LIKE '%".${'cooooooo' . $ii}."%'".$highlightsoperatorss16;
	$highlightsoperatorss26=" highlightsoperators like '%".${'cooooooo' . $ii}."%'";
		}
	}

}

if ($counter6 < 2)
$highlightsoperatorss=$highlightsoperatorss26;
else	
$highlightsoperatorss=preg_replace('/OR/', '', $highlightsoperatorss16, 1);


//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');


if (empty($_GET['term']))
{

$sql = "SELECT * FROM highlights WHERE highlightsactive=1 AND (highlightswebsite=2 || highlightswebsite=3) ";

if ($Pagetitle=='media-centre.php')
$sql .= " AND (highlightslabel='bg-warning' || highlightslabel='bg-secondary') ";

$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
if ($currentpage=='index.php')
$sql .= " AND highlightsshow='Yes' ";
else
$sql .= " AND (highlightsshow='Yes' || highlightsshow ='No')";


if (!empty($urlend[0]) && $urlend[0] !='index')
$sql .= " AND (highlightsinterests LIKE '%".$urlend[0]."%' || highlightscontinent LIKE '%".$urlend[0]."%' || highlightsoperators LIKE '%".$urlend[0]."%')"; 

if (!empty($AgentID))
$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') AND chighlightsshowcor !='Yes'"; 

if (empty($AgentID))
$sql .= " AND (AgentID='' || (AgentID !='' AND highlightsshowcor='Yes'))"; 

//=============FILTER DATABSE BASED ON operators==============================
if (!empty($highlightsoperators))
$sql .=" AND (highlightsoperators LIKE '%".$highlightsoperators."%') ";

//============FILTER DATABSE BASED ON interest====================	
if (!empty($highlightsinterests))
$sql .=" AND (highlightsinterests LIKE '%".$highlightsinterests."%') ";

//============FILTER DATABSE BASED ON destination name if exist====================	
if (!empty($highlightscontinent))
$sql .=" AND (highlightscontinent LIKE '%".$highlightscontinent."%') ";


}
elseif (!empty($_GET['term']))
{
	
	$term=trim($_GET['term']);
	
	$sql = "SELECT * FROM highlights WHERE highlightsactive=1";	

	if (!empty($AgentID))
	$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') "; 
	
	if (empty($AgentID))
	$sql .= " AND (AgentID='' || (AgentID !='' AND highlightsshowcor='Yes'))"; 

	$sql .= " AND (highlightswebsite='2' OR highlightswebsite='3') AND (highlightstitle LIKE '%$term%' OR highlightsdetails LIKE '%$term%' OR highlightscontinent LIKE '%$term%' OR highlightstags LIKE '%$term%' OR highlightsmeta LIKE '%$term%' OR highlightscountry LIKE '%$term%' OR highlightsinterests LIKE '%$term%') ";
	
}



$sql .= " ORDER BY ";  

if (!empty($AgentID))
$sql .= " AgentID DESC, pintotop DESC, highlightstime DESC "; 
else
$sql .= " pintotop DESC, highlightstime DESC "; 
 

$result = mysqli_query($conn, $sql);
$highlitscount=mysqli_num_rows($result);// number of results

?>
