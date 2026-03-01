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

<style>
tr td {text-align:left !important}
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

<h3>Custom Trip Inquiries</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

		$sql = "SELECT * FROM forms WHERE formtype='custom-trip-inquiries' ORDER BY formid DESC";

		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

		echo '<h3>Number of Custom Trip Inquiries: '.$row_cnt.'</h3><hr />' ;
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{


?>
            
<table style="margin-top:10px; background:#FFF; width:90%">
<tr>
<th>Date</th>
<th>Agent ID</th>
<th>Agent Name</th>
<th>Departing From</th>
<th>Departing Date (M/D/Y) </th>
<th>Preview</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
	  
?>

<tr>

<td style="text-align:left !important">
<?php echo date('F d, Y', $row['formtime']); ?>
</td>

<td>
<?php echo $row['AgentID'] ?>
</td>


<td>
<?php echo $row['chagent']; ?>
</td>

<td>
<?php echo $row['departfrom']; ?>
</td>

<td>
<?php echo $row['departuredate']; ?>
</td>

<td>
<a href="custom-trip-inquiries-details.php?formid=<?php echo $row['formid']; ?>" class="btn btn-warning" style="width:100%" title="Preview">Preview</a>
</td>
<td>
<a href="ch-agents/custom-trip-inquiries-delete.php?formid=<?php echo $row['formid']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a>
</td>

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