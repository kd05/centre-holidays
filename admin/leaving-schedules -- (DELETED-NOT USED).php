<?php ob_start(); ?>
<?php
$currenttime=time();
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

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
table th {text-align:center !important; padding-left:0px; max-width:100px}
table td {text-align:center !important; padding-left:0px; max-width:100px}
textarea {white-space:pre-wrap !important}
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

<h3>Leaving Schedule</h3>
<p>Gray background means that agent is on leave schedule.</p>


<div style="max-width:100%; overflow-y:scroll; height:400px; margin-bottom:20px; background:none !important;" class="col-md-12 col-xs-12 col-sm-12">


<table>
<tbody>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Country</th>
<th>Leave (MM/DD/YYYY)</th>
<th>Return (MM/DD/YYYY)</th>
<th>Action</th>
</tr>
<?php

$sql2 = "SELECT * FROM leaving_schedule ORDER BY FirstName ASC";
$result2 = mysqli_query($conn, $sql2);
$rowcounter2=mysqli_num_rows($result2);
if ($rowcounter2 > 0) {
// output data of each row
while($row2 = mysqli_fetch_assoc($result2)) {
$LID=$row2['LID'];
$AgentID2=$row2['AgentID'];
$FirstName2=$row2['FirstName'];
$LastName2=$row2['LastName'];	
$country_name2=$row2['country_name'];
$leavedate2=$row2['leavedate'];
$returndate2=$row2['returndate'];

?>	
<tr style="background:#999">
<td><?php echo $AgentID2 ?></td>
<td><?php echo $FirstName2 ?></td>
<td><?php echo $LastName2 ?></td>
<td><?php echo $country_name2 ?></td>
<td><?php echo date('m/d/Y', $leavedate2); ?></td>
<td><?php echo date('m/d/Y', $returndate2); ?></td>
<td><a href="leaving-schedules/delete-leaving.php?LID=<?php echo $LID ?>"  onclick="return confirm_delete()" class="btn btn-danger">Cancel</a></td>
</tr>

<?php

	
}
} else {
echo "0 results";
}		
		
?>

</tbody>
</table>

</div>

<div style="max-width:100%; overflow-y:scroll; height:400px; margin-bottom:100px; background:none !important;" class="col-md-12 col-xs-12 col-sm-12">

<table style="background:#FFF">
<tbody>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Business Email</th>
<th>Action</th>
</tr>
<?php

$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID ORDER BY ch_agents_1.AgentID ASC";
$result = mysqli_query($conn, $sql);
$rowcounter=mysqli_num_rows($result);
if ($rowcounter > 0) {
	
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$MID=$row['MID'];
$AgentID=$row['AgentID'];
$FirstName=$row['FirstName'];
$LastName=$row['LastName'];	
$BusinessEmail=$row['BusinessEmail'];	

/*$sql3 = "SELECT * FROM leaving_schedule WHERE AgentID ='$AgentID'";
$result3 = mysqli_query($conn, $sql3);
$rowcounter3=mysqli_num_rows($result3);
if ($rowcounter3 < 1) {*/

?>	
<tr>
<td><?php echo $AgentID ?></td>
<td><?php echo $FirstName ?></td>
<td><?php echo $LastName ?></td>
<td><?php echo $BusinessEmail ?></td>
<td><a href="schedule-leaving.php?AgentID=<?php echo $AgentID ?>" class="btn btn-primary">Schedule</a></td>
</tr>

<?php	
//		}

	}
} 
else 
{
echo "0 results";
}		
		
?>

</tbody>
</table>

</div>



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