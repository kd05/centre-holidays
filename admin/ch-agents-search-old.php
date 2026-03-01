<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


$pizza=strtolower(trim($_GET['codelook']));

$pizza2 = explode("'", $pizza);// Names like O'Leary

if (isset($pizza2[1]))
$pizza=$pizza2[1];
else
$pizza=strtolower(trim($_GET['codelook']));

$pizza=str_replace("'", '', $pizza);
$pieces = explode(" ", $pizza);

/*echo $pieces[0];
echo "<br />";
echo $pieces[1];
echo "<br />";
echo $pieces[2];
echo "<br />";
echo $compined=$pieces[0].' '.$pieces[1];*/

$pieces3 = explode(" ", $pizza2[0]);// Names like O'Leary
//echo $pieces3[0];

?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>

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

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
    <input type="text" value="<?php echo $_GET['codelook'] ?>" id="codelook" name="codelook" placeholder="Search for an Agent" class="form-control" required />

	<br />

<p>Refine your search</p>

<?php

switch ($_GET['radio']) {
    case "1":
        $checked1='checked';
		$lookingfort='First or Last or Display or Nickname';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1='1900';
	   $lastyear1='2100';		   		
        break;
    case "22":
        $checked22='checked';
		$lookingfort='First and Last Names ';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1='1900';
	   $lastyear1='2100';		   		
        break;		
    case "2":
        $checked2='checked';
		$lookingfort='Email';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "3":
        $checked3='checked';
		$lookingfort='Commission';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "4":
        $checked4='checked';
		$lookingfort='Province';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "5":
        $checked5='checked';
		$lookingfort='Agent Type';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "6":
        $checked6='checked';
		$lookingfort='Phone (Home or Cell or Business/Toll)';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   	        
		break;
    case "7":
        $checked7='checked';
		$lookingfort='';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "8":
       $checked8='checked';
	   $lookingfort='Website or Other Websites';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   		   
        break;
    case "9":
       $checked9='checked';
	   $lookingfort='Notes';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   		   
        break;
    case "10":
        $checked10='checked';
		$lookingfort='';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   			
        break;
    case "11":
       $checked11='checked';
	   $lookingfort='';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   		   
        break;
    case "12":
       $checked12='checked';
	   $lookingfort='Business Name';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1='1900';
	   $lastyear1='2100';	   	   
        break;
    case "13":
       $checked13='checked';
	   $lookingfort='Agent ID';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1='1900';
	   $lastyear1='2100';	   	   
        break;	
    case "14":
       $checked14='checked';
	   $lookingfort='City';
	   $firstyear='1900';
	   $lastyear='2100';
	   $firstyear1='1900';
	   $lastyear1='2100';	   		   
        break;		
    case "15":
       $checked15='checked';
	   $lookingfort='Join Date Year';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1=$pieces[0];
	   $lastyear1=$pieces[1];	   	   
        break;	
    case "16":
       $checked16='checked';
	   $lookingfort='Birth Date Year';
	   $firstyear=$pieces[0];
	   $lastyear=$pieces[1];
	   $firstyear1='1900';
	   $lastyear1='2100';	   
        break;														
    default:
        $checked1='checked';
		$lookingfort='First or Last or Display or Nickname';
	   $firstyear='1900';
	   $lastyear='2100';	
	   $firstyear1='1900';
	   $lastyear1='2100';		   	   
}

?>
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="1" class="custom-control-input" <?php echo $checked1 ?>>
<span class="custom-control-description">First or Last or Display or Nickname</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio22" name="radio" type="radio" value="22" class="custom-control-input" <?php echo $checked22 ?>>
<span class="custom-control-description">First and Last Names</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio1" name="radio" type="radio" value="13" class="custom-control-input" <?php echo $checked13 ?>>
<span class="custom-control-description">Agent ID</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio1" name="radio" type="radio" value="12" class="custom-control-input" <?php echo $checked12 ?>>
<span class="custom-control-description">Business Name</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="2" class="custom-control-input" <?php echo $checked2 ?>>
<span class="custom-control-description">Email</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="3" class="custom-control-input" <?php echo $checked3 ?>>
<span class="custom-control-description">Commission</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="14" class="custom-control-input" <?php echo $checked14 ?>>
<span class="custom-control-description">City</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="4" class="custom-control-input" <?php echo $checked4 ?>>
<span class="custom-control-description">Province in this format AB, ON etc...</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="5" class="custom-control-input" <?php echo $checked5 ?>>
<span class="custom-control-description">Agent Type</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="6" class="custom-control-input" <?php echo $checked6 ?>>
<span class="custom-control-description">Phone (Home or Cell or Business or Toll) in this format 905-000-0000</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="8" class="custom-control-input" <?php echo $checked8 ?>>
<span class="custom-control-description">Website or Other Websites</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="9" class="custom-control-input" <?php echo $checked9 ?>>
<span class="custom-control-description">Notes</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="15" class="custom-control-input" <?php echo $checked15 ?>>
<span class="custom-control-description">Join Date Year range ie. 2010 2016</span>
</label>
<br />
<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="16" class="custom-control-input" <?php echo $checked16 ?>>
<span class="custom-control-description">Birth Date Year range ie. 1978 1990</span>
</label>
<br />

<br />
<input type="submit" class="btn-primary btn-lg btn" value="Search" />
</form>
    
    <hr />

<div class="printableArea">

<?php
$counting=1;

	
		$sql = "SELECT * FROM ch_agents WHERE ";
		
		//================================================================================================		
		if ($_GET['radio']=='1'){		 
		$sql .= " lower(FirstName) LIKE '%".$pizza."%' || lower(LastName) LIKE '%".$pizza."%' 
		||  lower(NickName) LIKE '%".$pizza."%' || lower(DisplayName) LIKE '%".$pizza."%'";
		}
		// First AND Last Names===========================================================================
		if (($_GET['radio']=='22') && ((!empty($pieces[0]) && !empty($pieces[1]) && empty($pieces[2])) ) ) {
		$sql .= " (FirstName LIKE '%".$pieces[0]."%' && LastName LIKE '%".$pieces[1]."%') ";		
		}
		// First AND Last Names===========================================================================
		if (($_GET['radio']=='22') && ((!empty($pieces[2])) ) ) {	 
		$sql .= " (FirstName LIKE '%".$pieces3[0]."%' && LastName LIKE '%".$pieces[2]."%') ";			
		}		

		// First AND Last Names===========================================================================
		if (($_GET['radio']=='22') && (!empty($pizza2[1]) ) ) {
		$sql .= " (LastName LIKE '%".$pizza."%') ";		
		}		

		//================================================================================================		
		if ($_GET['radio']=='12') {		
		$sql .= " lower(BusinessName) LIKE '%".$pizza."%' "; ;
		}
		//================================================================================================		
		if ($_GET['radio']=='13'){
		$sql .= " AgentID LIKE '%".$pizza."%' ";
		}
		//================================================================================================				
		if ($_GET['radio']=='2')	{	
		$sql .= " lower(BusinessEmail) LIKE '%".$pizza."%' ";
		}
		//================================================================================================		
		if ($_GET['radio']=='3')	{	 
		$sql .= " Commission LIKE '%".$pizza."%' ";
		}
		//================================================================================================		
		if ($_GET['radio']=='14') {		 
		$sql .= " lower(City) LIKE '%".$pizza."%' "; 
		}
		//================================================================================================				
		if ($_GET['radio']=='4') {		
		$sql .= " lower(Province) LIKE '%".$pizza."%'";		
		}
		//================================================================================================			
		if ($_GET['radio']=='5')	{	 
		$sql .= " lower(AgentType) LIKE '%".$pizza."%' ";
		}
		//================================================================================================		
		if ($_GET['radio']=='6')	{	
		$sql .= " (BusinessNum LIKE '%".$pizza."%' ||  CellNum LIKE '%".$pizza."%' || 
		DisplayUseCell LIKE '%".$pizza."%' ||  TollFreeNum LIKE '%".$pizza."%') ";
		}
		//================================================================================================			
		if ($_GET['radio']=='7')	{		
		$sql .= " lowerSkypeID) LIKE '%".$pizza."%' ";
		}
		//================================================================================================				
		if ($_GET['radio']=='8')	{	 	
		$sql .= " lower(Website) LIKE '%".$pizza."%' ";
		}
		//================================================================================================				
		if ($_GET['radio']=='9')	{	 
		$sql .= " (lower(Notes) LIKE '%".$pizza."%' || lower(ShippingNotes) LIKE '%".$pizza."%') ";			
		}
		//================================================================================================				
		if ($_GET['radio']=='11') {		 
		$sql .= " (lower(License) LIKE '%".$pizza."%' || lower(TICOcert) LIKE '%".$pizza."%' 
		|| lower(BCNumber) LIKE '%".$pizza."%') ";			
		}
		//================================================================================================				
		if ($_GET['radio']=='15' || $_GET['radio']=='0') {		 
		$sql .= " JoinDate LIKE '%%' ";	
		}
		//================================================================================================				
		if ($_GET['radio']=='16') {
		$sql .= " BirthDate LIKE '%%' ";
		}
		//================================================================================================				
		//$sql .= " AND active='1' ";			
		//================================================================================================		
		$sql .= " ORDER BY AgentID DESC ";
		
		
		
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			
	if ($row_cnt > 0 && !empty($_GET['codelook']))// display results in case the feedback table is not empty
	{
		echo 'Results for <strong>'.$lookingfort.' ('.trim($_GET['codelook']).')</strong>';


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

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

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


if (($birthyear <= $lastyear && $birthyear >= $firstyear) && ($joinyear <= $lastyear1 && $joinyear >= $firstyear1))
{
	
?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $counting++; ?></td>
<td><?php echo $row['AgentID'] ?></td>
<td style="background:<?php echo $bgcolor ?>"<strong></strong><?php echo $row['AgentType']; ?></td>
<td><?php echo $row['BusinessName']; ?></td>
<td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td><?php echo $row['NickName']; ?></td>
<!--<td><?php //echo $birthyear; ?></td>-->
<td><?php echo $row['City']; ?></td>
<td><?php echo $row['BusinessNum']; ?></td>
<td><?php echo $row['DisplayUseCell']; ?></td>
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
if ($row_cnt < 1 && !empty($_GET['codelook']))
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