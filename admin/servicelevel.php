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
<h3>Add service level to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue988" name="myvalue988" placeholder="Add service level" class="form-control" />
<input type="hidden" value="servicelevel" name="filter" id="filter" />
<!--<br />
<input type="text" value="" id="servicelevelwebsite" name="servicelevelwebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>-->
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current service level</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM servicelevel ORDER BY servicelevel ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	// Ssign color to each website
	$website=$row['servicelevelwebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	if ($row['servicelevelarts']==1)
	$servicelevelarts='checked';
	else
	$servicelevelarts='';
	
	if ($row['serviceleveltrips']==1)
	$serviceleveltrips='checked';
	else
	$serviceleveltrips='';
	
	if ($row['servicelevelpromos']==1)
	$servicelevelpromos='checked';
	else
	$servicelevelpromos='';
	
	if ($row['servicelevelarts2']==1)
	$servicelevelarts2='checked';
	else
	$servicelevelarts2='';
	
	if ($row['serviceleveltrips2']==1)
	$serviceleveltrips2='checked';
	else
	$serviceleveltrips2='';
	
	if ($row['servicelevelpromos2']==1)
	$servicelevelpromos2='checked';
	else
	$servicelevelpromos2='';	
	
	if ($row['servicelevelhighlights']==1)
	$servicelevelhighlights='checked';
	else
	$servicelevelhighlights='';		
	
	?>
	<form action="filter/set-style.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    <td>
    <?php
	if ($row['servicelevelactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td> 
    <td><?php echo $row['servicelevel']; ?></td>
	<td>
    <a href="edit-filter.php?servicelevelid=<?php echo $row['servicelevelid']; ?>&filter=servicelevel" class="btn btn-warning">Change</a>    
    </td>    
    <form action="filter/set-servicelevel.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <td><input type="checkbox" name="serviceleveltrips" value="serviceleveltrips" <?php echo $serviceleveltrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="servicelevelarts" value="servicelevelarts" <?php echo $servicelevelarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="servicelevelpromos" value="servicelevelpromos" <?php echo $servicelevelpromos ?>>&nbsp;CH Promos</td> 
	<td><input type="checkbox" name="servicelevelhighlights" value="servicelevelhighlights" <?php echo $servicelevelhighlights ?>>&nbsp;CH Highlights</td>      
    <td><input type="checkbox" name="serviceleveltrips2" value="serviceleveltrips2" <?php echo $serviceleveltrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="servicelevelarts2" value="servicelevelarts2" <?php echo $servicelevelarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="servicelevelpromos2" value="servicelevelpromos2" <?php echo $servicelevelpromos2 ?>>&nbsp;EPK Promos</td>      
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['servicelevelid']; ?>" name="servicelevelid" id="servicelevelid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['servicelevelid']; ?>&filter=servicelevel" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
    </td> 
    </form>   
    </tr> 
    <?php
			
		}
	}

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