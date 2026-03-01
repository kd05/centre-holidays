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


<?php //include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code-meaning.php'); ?>
<h3>Add Departure Gateways to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue66" name="myvalue66" placeholder="ie. Toronto, Calgary etc." class="form-control"/>
<input type="hidden" value="departuregateways" name="filter" id="filter" />
<br />
<select id="departfrom" name="departfrom"  class="form-control">
<option value="Atlantic Canada Departures">Atlantic Canada Departures</option>
<option value="Eastern Canada Departures">Eastern Canada Departures</option>
<option value="Western Canada Departures">Western Canada Departures</option>
</select>

<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>
<hr />
<h3>Current Departure Gateways</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM departuregateways ORDER BY departuregateways ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {

		// Ssign color to each website
	$website=$row['contwebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	
/*	if ($row['departuregatewaysarts']==1)
	$departuregatewaysarts='checked';
	else
	$departuregatewaysarts='';*/
	
	if ($row['departuregatewaystrips']==1)
	$departuregatewaystrips='checked';
	else
	$departuregatewaystrips='';
	
	if ($row['departuregatewayspromos']==1)
	$departuregatewayspromos='checked';
	else
	$departuregatewayspromos='';
	
/*	if ($row['departuregatewaysarts2']==1)
	$departuregatewaysarts2='checked';
	else
	$departuregatewaysarts2='';*/
	
	if ($row['departuregatewaystrips2']==1)
	$departuregatewaystrips2='checked';
	else
	$departuregatewaystrips2='';
	
	if ($row['departuregatewayspromos2']==1)
	$departuregatewayspromos2='checked';
	else
	$departuregatewayspromos2='';		
	
	
?>
    
	<form action="filter/set-departuregateways.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['gateactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><?php echo $row['departuregateways']; ?></td>
    <td><?php echo $row['departfrom']; ?></td>
    
    <td><input type="checkbox" name="departuregatewaystrips" value="departuregatewaystrips" <?php echo $departuregatewaystrips ?>>&nbsp;CH Trips</td>
<!--    <td><input type="checkbox" name="departuregatewaysarts" value="departuregatewaysarts" <?php //echo $departuregatewaysarts ?>>&nbsp;CH Articles </td>  -->  
	<td><input type="checkbox" name="departuregatewayspromos" value="departuregatewayspromos" <?php echo $departuregatewayspromos ?>>&nbsp;CH Promos</td> 
    
    <td><input type="checkbox" name="departuregatewaystrips2" value="departuregatewaystrips2" <?php echo $departuregatewaystrips2 ?>>&nbsp;EPK Trips</td>
 <!--   <td><input type="checkbox" name="departuregatewaysarts2" value="departuregatewaysarts2" <?php // echo $departuregatewaysarts2 ?>>&nbsp;EPK Articles </td>   --> 
	<td><input type="checkbox" name="departuregatewayspromos2" value="departuregatewayspromos2" <?php echo $departuregatewayspromos2 ?>>&nbsp;EPK Promos</td>       
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['gatewayid']; ?>" name="gatewayid" id="gatewayid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['gatewayid']; ?>&filter=departuregateways" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
    </td>    
    </tr> 
    </form>      
    
    
    <?php
			
		}
	}

?>


</table>


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