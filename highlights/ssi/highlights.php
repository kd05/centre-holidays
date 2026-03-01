<?php
// Start the session
session_start();
$AgentID=$_SESSION['AgentID'];

$link = $_SERVER['PHP_SELF'];// get the url value
$link_array = explode('/',$link);//expolsion
$Pagetitle = end($link_array);//get url page names


if ($highlitscount !=0)
{
?>
<style>
.load-more-items-highlights { display:none; }
</style>
<div class="row mb-20">
<?php
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
else
$sql .= " AND (highlightslabel !='bg-warning') ";

$sql .= " AND (highlightsshow='Yes' || highlightsshow ='No')";

$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
if ($currentpage=='index.php')
$sql .= " AND highlightsshow='Yes' ";
else
$sql .= " AND (highlightsshow='Yes' || highlightsshow ='No')";


if (!empty($urlend[0]) && $urlend[0] !='index')
$sql .= " AND (highlightsinterests LIKE '%".$urlend[0]."%' || highlightscontinent LIKE '%".$urlend[0]."%' || highlightsoperators LIKE '%".$urlend[0]."%')"; 

if (!empty($AgentID))
$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') AND (chighlightsshowcor ='No' || chighlightsshowcor ='')"; 

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
	
	$currentpage=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
	if ($currentpage=='index.php')
	$sql .= " AND highlightsshow='Yes' ";
	else
	$sql .= " AND (highlightsshow='Yes' || highlightsshow ='No')";	

	if (!empty($AgentID))
	$sql .= " AND (AgentID LIKE '%$AgentID%' || AgentID='') "; 
	
	if (empty($AgentID))
	$sql .= " AND (AgentID='' || (AgentID !='' AND highlightsshowcor='Yes'))"; 

	$sql .= " AND (highlightswebsite='2' OR highlightswebsite='3') AND (highlightstitle LIKE '%$term%' OR highlightsdetails LIKE '%$term%' OR highlightscontinent LIKE '%$term%' OR highlightstags LIKE '%$term%' OR highlightsmeta LIKE '%$term%' OR highlightscountry LIKE '%$term%' OR highlightsinterests LIKE '%$term%') ";

}

	//============FILTER DATABSE BASED ON selected values====================	
/*	if (!empty($AgentInterest1) || !empty($AgentInterest2) || !empty($AgentInterest3) || !empty($AgentInterest4)|| !empty($AgentInterest5) || !empty($AgentInterest6) || !empty($AgentInterest7) || !empty($AgentInterest8)|| !empty($AgentInterest9) || !empty($AgentInterest10) || !empty($AgentInterest11)|| !empty($AgentInterest12))
	{
	$sql .=" AND (highlightsoperators LIKE '%".$AgentInterest1."%' || highlightsoperators LIKE '%".$AgentInterest2."%' || highlightsoperators LIKE '%".$AgentInterest3."%' || highlightsoperators LIKE '%".$AgentInterest4."%' || highlightsoperators LIKE '%".$AgentInterest5."%' || highlightsoperators LIKE '%".$AgentInterest6."%' || highlightsoperators LIKE '%".$AgentInterest7."%' || highlightsoperators LIKE '%".$AgentInterest8."%' || highlightsoperators LIKE '%".$AgentInterest9."%' || highlightsoperators LIKE '%".$AgentInterest10."%' || highlightsoperators LIKE '%".$AgentInterest11."%' || highlightsoperators LIKE '%".$AgentInterest12."%') ";
	$sql .=" AND (highlightsinterests LIKE '%".$AgentInterest1."%' || highlightsinterests LIKE '%".$AgentInterest2."%' || highlightsinterests LIKE '%".$AgentInterest3."%' || highlightsinterests LIKE '%".$AgentInterest4."%' || highlightsinterests LIKE '%".$AgentInterest5."%' || highlightsinterests LIKE '%".$AgentInterest6."%' || highlightsinterests LIKE '%".$AgentInterest7."%' || highlightsinterests LIKE '%".$AgentInterest8."%' || highlightsinterests LIKE '%".$AgentInterest9."%' || highlightsinterests LIKE '%".$AgentInterest10."%' || highlightsinterests LIKE '%".$AgentInterest11."%' || highlightsinterests LIKE '%".$AgentInterest12."%') ";	
	$sql .=" AND (highlightscontinent LIKE '%".$AgentInterest1."%' || highlightscontinent LIKE '%".$AgentInterest2."%' || highlightscontinent LIKE '%".$AgentInterest3."%' || highlightscontinent LIKE '%".$AgentInterest4."%' || highlightscontinent LIKE '%".$AgentInterest5."%' || highlightscontinent LIKE '%".$AgentInterest6."%' || highlightscontinent LIKE '%".$AgentInterest7."%' || highlightscontinent LIKE '%".$AgentInterest8."%' || highlightscontinent LIKE '%".$AgentInterest9."%' || highlightscontinent LIKE '%".$AgentInterest10."%' || highlightscontinent LIKE '%".$AgentInterest11."%' || highlightscontinent LIKE '%".$AgentInterest12."%') ";
	$sql .=" AND (highlightscountry LIKE '%".$AgentInterest1."%' || highlightscountry LIKE '%".$AgentInterest2."%' || highlightscountry LIKE '%".$AgentInterest3."%' || highlightscountry LIKE '%".$AgentInterest4."%' || highlightscountry LIKE '%".$AgentInterest5."%' || highlightscountry LIKE '%".$AgentInterest6."%' || highlightscountry LIKE '%".$AgentInterest7."%' || highlightscountry LIKE '%".$AgentInterest8."%' || highlightscountry LIKE '%".$AgentInterest9."%' || highlightscountry LIKE '%".$AgentInterest10."%' || highlightscountry LIKE '%".$AgentInterest11."%' || highlightscountry LIKE '%".$AgentInterest12."%') ";	
	}*/


$sql .= " ORDER BY ";  

if (!empty($AgentID))
{
	$sql .= " AgentID DESC, pintotop DESC, " ;
	
	$sql .=" highlightsinterests LIKE '%".$AgentInterest1."%' DESC, highlightscontinent LIKE '%".$AgentInterest1."%' DESC, highlightscountry LIKE '%".$AgentInterest1."%' DESC, highlightsoperators LIKE '%".$AgentInterest1."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest2."%' DESC, highlightscontinent LIKE '%".$AgentInterest2."%' DESC, highlightscountry LIKE '%".$AgentInterest2."%' DESC, highlightsoperators LIKE '%".$AgentInterest2."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest3."%' DESC, highlightscontinent LIKE '%".$AgentInterest3."%' DESC, highlightscountry LIKE '%".$AgentInterest3."%' DESC, highlightsoperators LIKE '%".$AgentInterest3."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest4."%' DESC, highlightscontinent LIKE '%".$AgentInterest4."%' DESC, highlightscountry LIKE '%".$AgentInterest4."%' DESC, highlightsoperators LIKE '%".$AgentInterest4."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest5."%' DESC, highlightscontinent LIKE '%".$AgentInterest5."%' DESC, highlightscountry LIKE '%".$AgentInterest5."%' DESC, highlightsoperators LIKE '%".$AgentInterest5."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest6."%' DESC, highlightscontinent LIKE '%".$AgentInterest6."%' DESC, highlightscountry LIKE '%".$AgentInterest6."%' DESC, highlightsoperators LIKE '%".$AgentInterest6."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest7."%' DESC, highlightscontinent LIKE '%".$AgentInterest7."%' DESC, highlightscountry LIKE '%".$AgentInterest7."%' DESC, highlightsoperators LIKE '%".$AgentInterest7."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest8."%' DESC, highlightscontinent LIKE '%".$AgentInterest8."%' DESC, highlightscountry LIKE '%".$AgentInterest8."%' DESC, highlightsoperators LIKE '%".$AgentInterest8."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest9."%' DESC, highlightscontinent LIKE '%".$AgentInterest9."%' DESC, highlightscountry LIKE '%".$AgentInterest9."%' DESC, highlightsoperators LIKE '%".$AgentInterest9."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest10."%' DESC, highlightscontinent LIKE '%".$AgentInterest10."%' DESC, highlightscountry LIKE '%".$AgentInterest10."%' DESC, highlightsoperators LIKE '%".$AgentInterest10."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest11."%' DESC, highlightscontinent LIKE '%".$AgentInterest11."%' DESC, highlightscountry LIKE '%".$AgentInterest11."%' DESC, highlightsoperators LIKE '%".$AgentInterest11."%' DESC, ";
	$sql .=" highlightsinterests LIKE '%".$AgentInterest12."%' DESC, highlightscontinent LIKE '%".$AgentInterest12."%' DESC, highlightscountry LIKE '%".$AgentInterest12."%' DESC, highlightsoperators LIKE '%".$AgentInterest12."%' DESC, ";
			
	$sql .= " highlightstime DESC "; 
}
else
$sql .= " pintotop DESC, highlightstime DESC "; 
 

$result = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result);// number of results

	switch ($rowcount) {
  case "1":
    $pdiv='col-xl-12 col-md-12';
    break;
  case "2":
    $pdiv='col-xl-6 and col-md-6';
    break;
  default:
    $pdiv='col-xl-4 and col-md-6';
}

if ($rowcount > 0) {

// output data of each row
 while($row = mysqli_fetch_assoc($result)) {
	$AgentID1=$row['AgentID'];
	
	//==========================strip commas==========================================
	$CAgentID1=str_replace( ',', '', $AgentID1 );// current AgentID without commas
	
	if (!empty($CAgentID1))
	$CAgentIDcheck1='checked';
	else
	$CAgentIDcheck1='';	
	
	$AgentID1=str_replace( ',', '', $AgentID1 );// current AgentID without commas	
	
	$highlightsid1=$row['highlightsid'];
	$highlightsid='highlights-'.$row['highlightsid'];
	$highlightstime=$row['highlightstime'];
	$highlightstype=$row['highlightstype'];
	$highlightstitle=$row['highlightstitle'];
	$highlightsdetails=$row['highlightsdetails'];
	$highlightsvideourl=$row['highlightsvideourl'];					
	$highlightsinternalurl=$row['highlightsinternalurl'];
	$highlightsexternalurl=$row['highlightsexternalurl'];
	$highlightspreviewimage=$row['highlightspreviewimage'];
	$highlightscolor=$row['highlightscolor'];
	$highlightshovercolor=$row['highlightshovercolor'];
	$highlightscontinent=$row['highlightscontinent'];
	$highlightsinterests=$row['highlightsinterests'];
	$highlightsoperators=$row['highlightsoperators'];
	$highlightsexpirydate=$row['highlightsexpirydate'];
	$highlightswebsite=$row['highlightswebsite'];
	$highlightshorizimage=$row['highlightshorizimage'];	
	
	$highlightstags=$row['highlightstags'];	
	$highlightsauthor=$row['highlightsauthor'];	
	$highlightsreadtime=$row['highlightsreadtime'];	
	$highlightsmeta=$row['highlightsmeta'];	
	$highlightscoverimage=$row['highlightscoverimage'];
	
	$highlightslabel=$row['highlightslabel'];	
	$highlightsshowcor=$row['highlightsshowcor'];
	$chighlightsshowcor=$row['chighlightsshowcor'];
	
	$highlightscoverimagealt=$row['highlightscoverimagealt'];			
	
	$hpageurl=$row['hpageurl'];		
	
	$counter3++;
								
	?>
<!--begin::Item-->
	<div class="<?php echo $pdiv ?> load-more-items-highlights mb-10">
    <?php
	
	if (!empty($AgentID))
	$HWebsite=$Website.'/';	
	else
	$HWebsite='centreholidays.com/';
	
	//=========================get the agent URL====
	$sql77 = "SELECT * FROM ch_agents WHERE AgentID='".$CAgentID1."' and active=1 LIMIT 1";
	//$sql77 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE (ch_agents_1.AgentID='".$CAgentID1."' AND ch_agents_2.AgentID='".$AgentID1."') and ch_agents_1.active=1 LIMIT 1";
	$result77 = mysqli_query($conn, $sql77);
	// output data of each row
	while($row77 = mysqli_fetch_assoc($result77)) {
	
	$HAgentWebsite=trim($row77['Website']); //	
	
	if (!empty($HAgentWebsite))// If this highlight displayed in Corp. website link it to the agent URL
	$HWebsite=$HAgentWebsite.'/';
	}
	//==============================================

	
    if (!empty($highlightsexternalurl))
    {	
	$highlightsurl=$highlightsexternalurl;
	$target='_new';
    }
    elseif (!empty($highlightsinternalurl))
    {
	$highlightsurl=$highlightsinternalurl;
	$target='_parent';
	}  
    else
    {
	$highlightsurl='https://'.$HWebsite.'highlights/highlight.php?his='.$hpageurl.'&hid='.$highlightsid1;
	$target='_parent';
	}  	  
    ?>

	<!--begin::Highlight-->
	<?php 
    if (empty($highlightshorizimage))
    {	
    $E6='';	
    $C4D='';
    $background='#'.$highlightscolor;
    }
    else
    {
	$background='url(https://centreholidays.com/img/highlights/'.$highlightshorizimage.')';
	}
	?>
	<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-top" style="background:<?php echo $background ?> no-repeat center center /cover; min-height:225px;">
	<?php if (!empty($highlightslabel)) { 


	if ($highlightslabel=='bg-dark') 
	$highlightslabelfor='Book Online';
	elseif ($highlightslabel=='bg-info') 
	$highlightslabelfor='Travel Partner';
	elseif ($highlightslabel=='bg-primary') 
	$highlightslabelfor='News';
	elseif ($highlightslabel=='bg-danger') 
	$highlightslabelfor='Trip';
	elseif ($highlightslabel=='bg-success')
	$highlightslabelfor='Special Offer';
	elseif ($highlightslabel=='bg-secondary')
	$highlightslabelfor='Media Centre';
	elseif ($highlightslabel=='bg-warning')
	$highlightslabelfor='Press Release';		
	elseif ($highlightslabel=='')
	$highlightslabelfor='None';


if (($highlightslabel !='bg-secondary'))
{
?>
<!--begin::Label-->
<div class="ribbon-target <?php echo $highlightslabel ?> font-weight-bolder text-uppercase" style="top: -2px; right: 20px;"><?php echo $highlightslabelfor ?></div>
<!--end::Label-->
<?php 
} 
}
?>
<!--begin::Body-->
<a class="text-white flex-grow-1" href="<?php echo $highlightsurl ?>" onclick="ChangeUrl('', '?hid=<?php echo $highlightsid1 ?>&hit=<?php echo $highlightstitle ?>');" title="<?php echo $highlightstitle ?>" target="<?php echo $target ?>">													
<div class="card-body custom-overlay d-flex flex-column align-items-start justify-content-start">								<div class="flex-grow-1 mt-3">									
<h2 class="font-weight-boldest mb-5 text-white text-uppercase"><?php echo $highlightstitle ?></h2>
</div>
<span class="label label-outline-light label-inline label-xl font-weight-bolder text-white text-uppercase" style="background-color: rgba(0, 0, 0, 0.4);">Highlight Details</span>													
</div>
</a>
<!--end::Body-->
</div>
<!--end::Highlight-->
</div>
<!--end::Item-->
<?php } if ($counter3 > 12) { ?> 
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 loadbutton-highlights" id="load-more-button-highlights" title="See More Highlights"><span><i class="fas fa-angle-double-down"></i></span>See More Highlights</button>
</div>
<?php
}
}
?>
</div>
<?php
mysqli_close($conn);
}

?>