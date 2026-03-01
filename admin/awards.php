<?php ob_start(); ?>
<?php
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

<h3>Awards</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<?php

		$sql = "SELECT * FROM ch_awards ORDER BY AwardsID DESC ";
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
        
<table style="margin-top:10px">
<tr>
<th>Awards ID</th>
<th>Agent ID</th>
<th>Agent Name</th>
<th>Agent Type</th>
<th>Awards Title</th>
<th>Awards Year</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$active=$row['active'];
if ($active==0)
$mybakg='style="background:#666 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';

$AgentID=$row['AgentID'];
//===========================get information===========================


$sql22 = "SELECT * FROM ch_agents_1 WHERE AgentID='".$AgentID."' LIMIT 1";
$result22 = mysqli_query($conn, $sql22);
 while($row22 = mysqli_fetch_assoc($result22)) {
	 $Name=$row['FirstName'].' '.$row22['LastName'];
	 $AgentType=$row22['AgentType']; 
 }

if (empty($AgentID)) {
	$Name='';
	$AgentType='';
}
?>

<tr class="selectedtr" <?php echo $mybakg ?>>

<td><?php echo $row['AwardsID']; ?></td>
<td><?php echo $row['AgentID']; ?></td>
<td><?php echo $Name; ?> </td>
<td><?php echo $AgentType; ?></td>
<td><?php echo $row['AwardsTitle']; ?></td>
<td><?php echo $row['AwardsYear']; ?></td>

<?php 
if (!empty($Name))
$Name =$Name ;
else
$Name ='Centre Holidays';
?>
<td><a href="awards-details.php?AwardsID=<?php echo $row['AwardsID']; ?>&AgentID=<?php echo $row['AgentID']; ?>&AgentName=<?php echo $Name ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="awards/deactivate-awards.php?AwardsID=<?php echo $row['AwardsID']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($active==0)
{
?>
<a href="awards/activate-awards.php?AwardsID=<?php echo $row['AwardsID']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="awards/delete-awards.php?AwardsID=<?php echo $row['AwardsID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php


		}
?>

</table>
</div>

<?php
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