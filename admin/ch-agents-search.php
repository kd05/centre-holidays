<?php ob_start(); ?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>
<?php 
$codelook=trim($_GET['codelook']); 
$favcolor = $_GET['favcolor'];


switch ($favcolor) {
  case "12":
    $disfavcolor='AgentID';
    break;
  case "1":
    $disfavcolor='First or Last Name';
    break;
  case "2":
    $disfavcolor='First and Last Name';
    break;	
  case "3":
    $disfavcolor='Nick Name';
    break;
  case "4":
    $disfavcolor='Business Name';
    break;
  case "5":
    $disfavcolor='Display Name';
    break;
  case "6":
    $disfavcolor='Business Email';
    break;	
  case "7":
    $disfavcolor='Business Number';
    break;
  case "8":
    $disfavcolor='Cell Number';
    break;
  case "9":
    $disfavcolor='Toll Free Number';
    break;
  case "10":
    $disfavcolor='SkypeID';
    break;	
  case "11":
    $disfavcolor='Website';
    break;
  case "13":
    $disfavcolor='Personal Email';
    break;
  case "14":
    $disfavcolor='Commission';
    break;
  case "15":
    $disfavcolor='City';
    break;	
  case "16":
    $disfavcolor='Province';
    break;
  case "17":
    $disfavcolor='Agent Type';
    break;
  case "18":
    $disfavcolor='Notes and Shipping Notes';
    break;
  case "19":
    $disfavcolor='License / Tico / BC Number';
    break;		
  case "20":
    $disfavcolor='Join Date Range';
    break;
  case "21":
    $disfavcolor='Birth Year';
    break;
  case "27":
    $disfavcolor='Birth Month';
    break;	
  case "22":
    $disfavcolor='Community Pod';
    break;
  case "30":
    $disfavcolor='Monthly Plan';
    break;
  case "31":
    $disfavcolor='Monthly Recurring Fee';
    break;		
  default:
    $disfavcolor='Filter Your Search';
}

?>

<?php
$pizza=str_replace("'", '', $codelook);
$pieces = explode(" ", $pizza);
?>


<style>
.custom-radio {margin:0 10px 0  10px}
</style>

</head>
 
<body class="fix-header">

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/top-navigation.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/side-panel.php');?>
  <!-- Page Content -->
  <div id="page-wrapper" style="overflow-y:scroll; max-height: 100vh;">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
                    

<?php
//---------------display results in case of unpdate--------------
if (isset($_GET['results']))
{
	if ($_GET['results']=='success')
	{
	?>
    <div class="alert alert-success">
  	<strong>Success!</strong>
	</div>
	<?
	}
	elseif ($_GET['results']=='error')
	{
	?>
    <div class="alert alert-danger">
  	<strong>Warning, Error!</strong>
	</div>
	<?php	
	}
}
?>

 <h3>Search for a Centre Holidays Agent</h3>
<a id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </a>
<a href="export.php" class="btn btn-primary"> <span>List of Agents (Excel)</span> </a>
<br /><br />
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<p>Join Date Range Searching?</p>
<ul>
<li>For a range of years for example 2014 to 2020 you type <strong>2014 2020</strong> with <strong>single space</strong> between them.</li>
<li>For the same year for example 2020 you type <strong>2020 2020</strong> with<strong> single space</strong> between them.</li>
</ul>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?codelook=&BirthDate=&AgentPlan=" method="get" enctype="multipart/form-data">

<select name="favcolor" class="form-control" required onchange="this.form.submit()">
<?php if (!empty($_GET['favcolor'])) { ?>
<option value="<?php echo $_GET['favcolor']; ?>"><?php echo $disfavcolor; ?></option>
<?php } else { ?>
<option value="">Filter Your Search</option>
<?php } ?>
<option value="12">AgentID</option>
<option value="1">First Name</option>
<option value="1">Last Name</option>
<option value="2">First Name and Last Name</option>
<option value="3">Nick Name</option>
<option value="4">Business Name</option>
<option value="5">Display Name</option>
<option value="6">Business Email</option>
<option value="7">Business Number</option>

<option value="8">Cell Number</option>
<option value="9">Toll Free Number</option>
<option value="10">SkypeID</option>
<option value="11">Website</option>
<option value="13">Personal Email</option>
<option value="14">Commission</option>
<option value="15">City</option>
<option value="16">Province</option>

<option value="17">Agent Type</option>
<option value="18">Notes and Shipping Notes</option>
<option value="19">License / Tico / BC Number</option>
<option value="20">Join Date Range</option>
<option value="21">Birth Year</option>
<option value="27">Birth Month</option>
<option value="22">Community Pod</option>

<option value="30">Agent Plan</option>
<option value="31">Monthly Recurring Fee</option>

</select>


<br />
<?php if ($_GET['favcolor'] !=27 && $_GET['favcolor'] !=30) { ?>
<input type="text" value="<?php echo $_GET['codelook'] ?>" id="codelook" name="codelook" placeholder="Search" class="form-control" />   
<br />
<?php } ?>


<?php if ($_GET['favcolor']==30) { ?>
<select name="AgentPlan" class="form-control">
<?php if (!empty($_GET['AgentPlan'])) { ?>
<option value="<?php echo $_GET['AgentPlan'] ?>"><?php echo $_GET['AgentPlan'] ?></option>
<?php } else { ?>
<option value="">Select A Plan</option>
<?php } ?>
<option value="Starter Plan">Starter Plan</option>
<option value="Starter Plus Plan">Starter Plus Plan</option>
<option value="Value Plan">Value Plan</option>
<option value="Value Plus Plan">Value Plus Plan</option>
<option value="Premium Plan">Premium Plan</option>
<option value="Premium Plus Plan">Premium Plus Plan</option>
<option value="Professional Plan">Professional Plan</option>
<option value="Professional Plus Plan">Professional Plus Plan</option>
<option value="Sub-Agent Plan">Sub-Agent Plan</option>
</select>
<?php } ?>



<?php if ($_GET['favcolor']==27) { ?>
<select name="BirthDate" class="form-control">
<?php if (!empty($_GET['BirthDate'])) { ?>
<option value="<?php echo $_GET['BirthDate'] ?>"><?php echo $_GET['BirthDate'] ?></option>
<?php } else { ?>
<option value="">Select A Month</option>
<?php } ?>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>
<?php } ?>


<hr />
<input type="submit" class="btn btn-primary btn-lg" value="Filter" />

</form>

<hr />

<div class="printableArea">

<?php

//echo $pieces[0];
//echo ' '.$pieces[1];


if (empty($_GET['BirthDate']))
{

$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID AND ( ";

switch ($favcolor) {
	
case "1": 
$sql .= " (ch_agents_1.FirstName) LIKE '%".$codelook."%' || (ch_agents_1.LastName) LIKE '%".$codelook."%'";
break;

case "2":
$sql .= " (ch_agents_1.FirstName) LIKE '%".$pieces[0]."%' AND (ch_agents_1.LastName) LIKE '%".$pieces[1]."%' ";
break;

case "3":

if (isset($pieces[1]))
$sql .= " (ch_agents_1.NickName) LIKE '%".$pieces[0]."%' || (ch_agents_1.NickName) LIKE '%".$pieces[1]."%' ";
else
$sql .= " ch_agents_1.NickName LIKE '%".$codelook."%' ";

$sql .= " AND ch_agents_1.NickName !=''";


break;

case "4":
$sql .= " (ch_agents_2.BusinessName) LIKE '%".$codelook."%' AND ch_agents_2.BusinessName !=''"; 
break;

case "5":
$sql .= " (ch_agents_2.DisplayName) LIKE '%".$codelook."%' AND ch_agents_2.DisplayName !=''"; 
break;

case "6":
$sql .= " (ch_agents_2.BusinessEmail) LIKE '%".$codelook."%' AND ch_agents_2.BusinessEmail !=''"; 
break;

case "7":
$sql .= " (ch_agents_2.BusinessNum) LIKE '%".$codelook."%' AND ch_agents_2.BusinessNum !=''";
break;

case "8":
$sql .= " ch_agents_1.CellNum LIKE '%".$codelook."%' || (ch_agents_2.DisplayUseCell) LIKE '%".$codelook."%' AND ch_agents_2.DisplayUseCell !=''";
break;

case "9":
$sql .= " (ch_agents_2.TollFreeNum) LIKE '%".$codelook."%' AND ch_agents_2.TollFreeNum !=''";
break;

case "10":
$sql .= " (ch_agents_2.SkypeID) LIKE '%".$codelook."%' AND ch_agents_2.SkypeID !=''";
break;

case "11":
$sql .= " (ch_agents_2.Website) LIKE '%".$codelook."%' AND ch_agents_2.Website !=''";
break;

case "12":
$sql .= " ch_agents_1.AgentID LIKE '%".$codelook."%' ";
break;

case "13":
$sql .= " ch_agents_1.PersonalEmail LIKE '%".$codelook."%' AND ch_agents_1.PersonalEmail !=''";
break;

case "14":
$sql .= " ch_agents_1.Commission LIKE '%".$codelook."%' AND ch_agents_1.Commission !=''";
break;

case "15":
$sql .= " (ch_agents_1.City) LIKE '%".$codelook."%' AND ch_agents_1.City !=''"; 
break;

case "16":
$sql .= " (ch_agents_1.Province) LIKE '%".$codelook."%'";		
break;

case "17":
$sql .= " (ch_agents_1.AgentType) LIKE '%".$codelook."%' ";
break;


case "18":
$sql .= " ((ch_agents_1.Notes) LIKE '%".$codelook."%' || (ch_agents_1.ShippingNotes) LIKE '%".$codelook."%') ";			
break;

case "19":
$sql .= " ((ch_agents_1.License) LIKE '%".$codelook."%' || (ch_agents_1.TICOcert) LIKE '%".$codelook."%' 
|| (ch_agents_1.BCNumber) LIKE '%".$codelook."%') ";			
break;

//==================================================================================
case "20":
$yearstart=$pieces[0];
$yeramax=$pieces[1];

$sql .= " ch_agents_1.JoinDate LIKE '%".$codelook."%' || ";
$sql .= " ch_agents_1.JoinDate LIKE '%".$yearstart."%' ||";
for ($x = $yearstart; $x <= $yeramax; $x++) {
$sql .= " ch_agents_1.JoinDate LIKE '%".$x."%' ||";	   
}
$sql .= " ch_agents_1.JoinDate LIKE '%".$yeramax."%'";


/*$sql .= " ch_agents_1.JoinDate LIKE '%".$codelook."%' || 
ch_agents_1.JoinDate LIKE '%".$yearstart."%' || 
ch_agents_1.JoinDate LIKE '%".$yeramax."%' 
"*/;	
break;


case "21":
$sql .= " ch_agents_1.BirthDate LIKE '%".$codelook."%' ";
break;

//case "22":
//$sql .= " ch_agents_1.PODLeader LIKE '%".$codelook."%' ";
//break;

case "22":
    $sql .= "  ";
break;


case "30":
$sql .= " ch_agents_1.AgentPlan LIKE '%".$_GET['AgentPlan']."%' ";
break;

case "31":
$sql .= " ch_agents_1.MonthlyRecurringFee LIKE '%".$codelook."%' ";
break;

}

$sql .= " ) ORDER BY ch_agents_1.AgentID DESC";
}
else
{
$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID  ORDER BY ch_agents_1.AgentID DESC";	
}

//==========custom paginatnion===================

$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);
			
if ($row_cnt > 0)// display results in case the feedback table is not empty
{

echo '<h4>Results for '.$_GET['codelook'].$_GET['AgentPlan'].$_GET['BirthDate'].'</h4><hr />';
//=====================================================
if ($row['AgentType']=='Primary')
$bgcolor='#FF3';
elseif ($row['AgentType']=='Partner')
$bgcolor='#CFF';
else
$bgcolor='#fff';

?>
            
<table style="margin-top:10px; width:99%">
<tr>
<th>#</th>
<th>ID</th>
<th>Type</th>
<th>Business Name</th>
<th>Contact Name</th>
<th>Nick Name</th>
<!--<th>Birth Year</th>-->
<th>City</th>
<th>Business Number</th>
<th>Cell Phone</th>
<th>Province</th>
<th>JoinDate</th>
<th class="hidden-print">Edit</th>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<th class="hidden-print">Status</th>
<th class="hidden-print">Delete</th>
<?php } ?>
</tr>
<?php
$counting=1;
// output data of each row
while($row = mysqli_fetch_assoc($result)) {

$showsubagents=$row['showsubagents'];
$AgentID=$row['AgentID']; //
$AgentUniqID=$row['AgentUniqID']; //	
$AgentTitle=$row['AgentTitle'];	//
$FirstName=$row['FirstName']; //
$LastName=$row['LastName']; //
$BusinessName=$row['BusinessName']; //	
$DisplayName=$row['DisplayName'];	//	
$NickName=$row['NickName']; //	
$BirthDate=$row['BirthDate'];//
$JoinDate=$row['JoinDate'];//
$CloseDate=$row['CloseDate'];//
$Commission=$row['Commission'];//			
$Street=$row['Street'];//
$Unit=$row['Unit'];//		
$City=$row['City']; //
$Province=$row['Province'];	//	
$DisplayUseCity=$row['DisplayUseCity'];	//		
$PostalCode=$row['PostalCode']; //
$ShippingNotes=$row['ShippingNotes']; //	
$AgentType=$row['AgentType']; //	
$HomeNum=$row['HomeNum']; //	
$BusinessNum=$row['BusinessNum']; //
$CellNum=$row['CellNum']; //
$DisplayUseCell=$row['DisplayUseCell'];	//
$FaxNum=$row['FaxNum']; //
$TollFreeNum=$row['TollFreeNum']; //
$PersonalEmail=$row['PersonalEmail'];	//
$SkypeID=$row['SkypeID']; //
$BusinessEmail=$row['BusinessEmail']; //
$OtherWebsite=$row['OtherWebsite'];//
$Website=$row['Website'];//	
$MyAccount=$row['MyAccount'];//
$HoursOp=$row['HoursOp'];//	
$Password=$row['Password']; //
$PasswordHashed=$row['PasswordHashed'];	//	
$AboutImg=$row['AboutImg']; //
$License=$row['License']; //	
$TICOcert=$row['TICOcert'];	 //	
$BCNumber=$row['BCNumber']; //	
$Recruiter=$row['Recruiter']; //
$GoogleDriveURL=$row['GoogleDriveURL']; //													
$Notes=$row['Notes'];	//	
$AgentAnalytics=$row['AgentAnalytics'];	//								
$Image=$row['Image'];	//
$LogoImage=$row['LogoImage'];	//
$LogoIcon=$row['LogoIcon'];	//
$LogoTextImage=$row['LogoTextImage'];	//								
$Description=$row['Description'];	//								
$EmailID=$row['EmailID'];	//															
$HoursOpHTML=$row['HoursOpHTML']; //
$TimeZone=$row['TimeZone'];		//														
$GooglePlus=$row['GooglePlus'];		//							
$YouTube=$row['YouTube'];				//					
$FaceBook=$row['FaceBook'];//
$Twitter=$row['Twitter'];	//								
$LinkedIn=$row['LinkedIn'];		//							
$Blog=$row['Blog'];					//		
$Pinterest=$row['Pinterest'];			//														
$Instagram=$row['Instagram'];//
$TikTok=$row['TikTok'];//
$mailchimpuser=$row['mailchimpuser'];	//
$mailchimpid=$row['mailchimpid'];			//						
$active=$row['active'];					//				
$mainnumber=$row['mainnumber'];	
$OtherAddress=$row['OtherAddress'];					//				
$BOLNumber=$row['BOLNumber'];
$RegisteredBusinessName=$row['RegisteredBusinessName'];	//	
$OtherEmail=$row['OtherEmail'];	//
$IndexPageTitle=$row['IndexPageTitle'];	//
$IndexH1=$row['IndexH1'];	//
$IndexMetaDescription=$row['IndexMetaDescription'];	//
$IndexCoverImage=$row['IndexCoverImage'];	//
$IndexHorizontalImage=$row['IndexHorizontalImage'];	//
$IndexSquareImage=$row['IndexSquareImage'];	//	
$ACTASaskatchewanLicence=$row['ACTASaskatchewanLicence'];	//	

$AboutPageTitle=$row['AboutPageTitle'];	//
$AboutH1=$row['AboutH1'];	//
$AboutMetaDescription=$row['AboutMetaDescription'];	//
$AboutCoverImage=$row['AboutCoverImage'];	//
$AboutHorizontalImage=$row['AboutHorizontalImage'];	//
$AboutSquareImage=$row['AboutSquareImage'];	//	

$AgentPositionTitle=$row['AgentPositionTitle'];	//	

$Slider1Title=$row['Slider1Title'];
$Slider1Description=$row['Slider1Description'];
$Slider1Button=$row['Slider1Button'];	
$Slider2Image=$row['Slider2Image'];
$Slider2Title=$row['Slider2Title'];
$Slider2Description=$row['Slider2Description'];
$Slider2Button=$row['Slider2Button'];								
$Slider3Image=$row['Slider3Image'];
$Slider3Title=$row['Slider3Title'];
$Slider3Description=$row['Slider3Description'];
$Slider3Button=$row['Slider3Button'];								

$UrlColor=$row['UrlColor'];	
$AgentChat=$row['AgentChat'];	
$MondayToFriday=$row['MondayToFriday'];
$Saturday=$row['Saturday'];
$Sunday=$row['Sunday'];
$Holidays=$row['Holidays'];

$mailchimp=$row['mailchimp'];

$AgentProfile=$row['AgentProfile'];	
$AdditionalAgentProfiles=$row['AdditionalAgentProfiles'];		
	
$AgentLanguage=$row['AgentLanguage'];	

$BOStreet=$row['BOStreet'];
$BOCity=$row['BOCity'];
$BOProvince=$row['BOProvince'];
$BOPostalcode=$row['BOPostalcode'];	
$HOGMap=$row['HOGMap'];	
$BOGMap=$row['BOGMap'];		

$AboutImageDescription=$row['AboutImageDescription'];
$IndexImageDescription=$row['IndexImageDescription'];
							

if ($row['AgentType']=='Primary')
$bgcolor='#FF3';
elseif ($row['AgentType']=='Partner')
$bgcolor='#CFF';
else
$bgcolor='#fff';


$active=$row['active'];
$CloseDate=$row['CloseDate'];
if ($active==0 && empty($CloseDate))
$mybakg='style="background:#666 !important"';
elseif ($active==0 && !empty($CloseDate))
$mybakg='style="background:#C30 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';


$birthdate = $row['BirthDate'];
$birthtime = explode("/", $birthdate);
$birthyear = $birthtime[2];

$joindate = $row['JoinDate'];
$joindate = explode("/", $joindate);
$joinyear = $joindate[2];


//if (($birthyear <= $lastyear && $birthyear >= $firstyear) && ($joinyear <= $lastyear1 && $joinyear >= $firstyear1))
$FilteBirthDate=$_GET['BirthDate'];

$dbbirthdate = strtotime( $birthdate );
$mysqldate = date( 'F', $dbbirthdate );

if ($FilteBirthDate==$mysqldate)
{
?>
<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $counting++; ?></td>
<td><?php echo $row['AgentID'] ?></td>
<td style="background:<?php echo $bgcolor ?>"><strong><?php echo $row['AgentType']; ?></strong></td>
<td><?php echo $row['BusinessName'] ?></td>
<td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td><?php echo $row['NickName']; ?></td>
<td><?php echo $row['City']; ?></td>
<td><?php echo $BusinessNum; ?></td>
<td><?php echo $DisplayUseCell; ?></td>
<td><?php echo $row['Province']; ?></td>
<td><?php echo $row['JoinDate']; ?></td>
<td><a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-primary hidden-print" title="Edit Details">Edit</a></td>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="ch-agents/deactivate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-warning hidden-print" title="Click her to Deactivate">Deact.</a>
<?php
}
elseif ($active==0)
{
?>
<a href="ch-agents/activate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-success hidden-print" title="Click here to Activate">Act.</a>
<?php
}
?>
</td>
<td><a href="ch-agents/delete-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-danger hidden-print" title="Delete" onclick="return confirm_delete()">Del.</a></td>

<?php } ?>

</tr>

<?php
}	
elseif (!empty($_GET['AgentPlan']) || !empty($_GET['codelook']))
{
?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $counting++; ?></td>
<td><?php echo $row['AgentID'] ?></td>
<td style="background:<?php echo $bgcolor ?>"><strong><?php echo $row['AgentType']; ?></strong></td>
<td><?php echo $row['BusinessName'] ?></td>
<td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td><?php echo $row['NickName']; ?></td>
<td><?php echo $row['City']; ?></td>
<td><?php echo $BusinessNum; ?></td>
<td><?php echo $DisplayUseCell; ?></td>
<td><?php echo $row['Province']; ?></td>
<td><?php echo $row['JoinDate']; ?></td>
<td><a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-primary hidden-print" title="Edit Details">Edit</a></td>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="ch-agents/deactivate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-warning hidden-print" title="Click her to Deactivate">Deact.</a>
<?php
}
elseif ($active==0)
{
?>
<a href="ch-agents/activate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-success hidden-print" title="Click here to Activate">Act.</a>
<?php
}
?>
</td>
<td><a href="ch-agents/delete-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-danger hidden-print" title="Delete" onclick="return confirm_delete()">Del.</a></td>

<?php } ?>

</tr>

<?php
}
	
}
?>

</table>
</div>

<?php
	}
if ($row_cnt < 1 && (!empty($_GET['codelook'])))
echo "<h3>No results to display. If this is a name make sure the first letters are all upper case ie. Luna not luna</h3>";
?>

</div>
</div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/right-panel.php');?>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>

</body>
</html>

</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>