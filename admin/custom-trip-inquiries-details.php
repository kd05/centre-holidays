<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


$formid=trim($_GET['formid']);



$sendertitle=$salutation;
$senderfname=$travfname;
$senderlname=$travlname;
$senderphone=$travphone;
$senderemail=$travemail;
$sendermessage=$addnotes;
$senderreferd=$hearaboutus;	
$chagent=$agentname;

$type;//======================not used

$departcountry='Canada';
$departfrom;
$tripfinancing;
$destination; 
$departuredate; 
$triplength;  				                  
$numadults;
$numchildren;			
$budget;
$triptype;
$interests;	
$agentemail;
$AgentID;

?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>

<style>
table {width:97% !important}
table td {text-align:left !important; padding-left:20px;}
table th {text-align:left !important; padding-left:20px; max-width:100px}
textarea {white-space:pre-wrap !important}
input, select {width:100%; border:none;}
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

<h3>Custom Trip Inquiries Details</h3>

<div style="max-width:100%; overflow-x:hidden; margin-bottom:100px">

<?php

	$sql = "SELECT * FROM forms WHERE formtype='custom-trip-inquiries' AND formid=".$formid." LIMIT 1";

	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
		
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

while($row = mysqli_fetch_assoc($result)) {
$formtime=$row['formtime'];	
?>

<table style="background:#fff !important; margin-top:50px; width:100%">

<tr>
<th>Inquiry Date</th>
<td colspan="4">
<?php echo date('F d, Y',$row['formtime']); ?>
</td>
</tr>


<tr>
<th>Title and Full Name</th>
<td colspan="4">
<?php echo $row['sendertitle'].' '.$row['senderfname'].' '.$row['senderlname']; ?>
</td>
</tr>

<tr>
<th>Phone</th>
<td colspan="4">
<?php echo $row['senderphone']; ?>
</td>
</tr>

<tr>
<th>Email</th>
<td colspan="4">
<?php echo $row['senderemail']; ?>
</td>
</tr>


<tr>
<th>Departing From</th>
<td colspan="4">
<?php echo $row['departfrom'].', '.$row['departcountry']; ?>
</td>
</tr>

<tr>
<th>Departing Date (MM/DD/YYYY)</th>
<td colspan="4">
<?php echo $row['departuredate']; ?>
</td>
</tr>


<tr>
<th>Destination</th>
<td colspan="4">
<?php echo $row['destination']; ?>
</td>
</tr>


<tr>
<th>Trip Length</th>
<td colspan="4">
<?php echo $row['triplength']; ?>
</td>
</tr>


<tr>
<th>Number of Travellers</th>
<td colspan="2">
Adults (<?php echo $row['numadults']; ?>)
</td>
<td colspan="2">
Children (<?php echo $row['numchildren']; ?>)
</td>
</tr>

<tr>
<th>Budget</th>
<td colspan="4">
<?php echo $row['budget']; ?>
</td>
</tr>

<tr>
<th>Trip Financing</th>
<td colspan="4">
<?php echo $row['tripfinancing']; ?>
</td>
</tr>

<tr>
<th>Interests</th>
<td colspan="4">
<?php echo $row['interests']; ?>
</td>
</tr>

<tr>
<th>Message</th>
<td colspan="4">
<textarea readonly name="sendermessage" id="sendermessage" class='scrollable' placeholder="Message">
<?php echo $row['sendermessage']; ?>
</textarea></td>
</tr>

<tr>
<th>Referred By</th>
<td colspan="4">
<?php echo $row['senderreferd']; ?>
</td>
</tr>


<tr>
<th>Agent Name and ID</th>
<td colspan="4">
<?php echo '('.$row['AgentID'].') '.$row['chagent']; ?>
</td>
</tr>


</table>


<?php 
}
	}
?>

</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
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