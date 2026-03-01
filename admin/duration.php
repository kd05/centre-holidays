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

<h3>Add Trip Length to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue3" name="myvalue3" placeholder="Add a Trip Length in this format 01-07 Days no spaces between numbers and dash" class="form-control" />
<input type="hidden" value="duration" name="filter" id="filter"  />
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current Trip Length</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM duration ORDER BY duration ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			
	if ($row['durationarts']==1)
	$durationarts='checked';
	else
	$durationarts='';
	
	if ($row['durationtrips']==1)
	$durationtrips='checked';
	else
	$durationtrips='';
	
	if ($row['durationpromos']==1)
	$durationpromos='checked';
	else
	$durationpromos='';
	
	if ($row['durationarts2']==1)
	$durationarts2='checked';
	else
	$durationarts2='';
	
	if ($row['durationtrips2']==1)
	$durationtrips2='checked';
	else
	$durationtrips2='';
	
	if ($row['durationpromos2']==1)
	$durationpromos2='checked';
	else
	$durationpromos2='';			
	
	?>

	<form action="filter/set-duration.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['durationactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><strong><?php echo $row['duration']; ?></strong></td>
    
    <td><input type="checkbox" name="durationtrips" value="durationtrips" <?php echo $durationtrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="durationarts" value="durationarts" <?php echo $durationarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="durationpromos" value="durationpromos" <?php echo $durationpromos ?>>&nbsp;CH Promos</td> 
    
    <td><input type="checkbox" name="durationtrips2" value="durationtrips2" <?php echo $durationtrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="durationarts2" value="durationarts2" <?php echo $durationarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="durationpromos2" value="durationpromos2" <?php echo $durationpromos2 ?>>&nbsp;EPK Promos</td>       
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['durationid']; ?>" name="durationid" id="durationid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['durationid']; ?>&filter=duration" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
    </td>
    </tr> 
    </form>       
    
    
    
    
    
    
    <?php
			
		}
	}


include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');
?>

</table>


</div></div><?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
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