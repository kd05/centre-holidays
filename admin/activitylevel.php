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
<h3>Add activity level to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue98" name="myvalue98" placeholder="Add activity level" class="form-control" />
<input type="hidden" value="activitylevel" name="filter" id="filter" />
<!--<br />
<input type="text" value="" id="activitylevelwebsite" name="activitylevelwebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>-->
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current activity level</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM activitylevel ORDER BY activitylevel ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	// Ssign color to each website
	$website=$row['activitylevelwebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	if ($row['activitylevelarts']==1)
	$activitylevelarts='checked';
	else
	$activitylevelarts='';
	
	if ($row['activityleveltrips']==1)
	$activityleveltrips='checked';
	else
	$activityleveltrips='';
	
	if ($row['activitylevelpromos']==1)
	$activitylevelpromos='checked';
	else
	$activitylevelpromos='';
	
	if ($row['activitylevelarts2']==1)
	$activitylevelarts2='checked';
	else
	$activitylevelarts2='';
	
	if ($row['activityleveltrips2']==1)
	$activityleveltrips2='checked';
	else
	$activityleveltrips2='';
	
	if ($row['activitylevelpromos2']==1)
	$activitylevelpromos2='checked';
	else
	$activitylevelpromos2='';	
	
	if ($row['activitylevelhighlights']==1)
	$activitylevelhighlights='checked';
	else
	$activitylevelhighlights='';		
	
	?>
	<form action="filter/set-style.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    <td>
    <?php
	if ($row['activitylevelactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td> 
    <td><?php echo $row['activitylevel']; ?></td>
	<td>
    <a href="edit-filter.php?activitylevelid=<?php echo $row['activitylevelid']; ?>&filter=activitylevel" class="btn btn-warning">Change</a>    
    </td>    
    <form action="filter/set-activitylevel.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <td><input type="checkbox" name="activityleveltrips" value="activityleveltrips" <?php echo $activityleveltrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="activitylevelarts" value="activitylevelarts" <?php echo $activitylevelarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="activitylevelpromos" value="activitylevelpromos" <?php echo $activitylevelpromos ?>>&nbsp;CH Promos</td> 
	<td><input type="checkbox" name="activitylevelhighlights" value="activitylevelhighlights" <?php echo $activitylevelhighlights ?>>&nbsp;CH Highlights</td>      
    <td><input type="checkbox" name="activityleveltrips2" value="activityleveltrips2" <?php echo $activityleveltrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="activitylevelarts2" value="activitylevelarts2" <?php echo $activitylevelarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="activitylevelpromos2" value="activitylevelpromos2" <?php echo $activitylevelpromos2 ?>>&nbsp;EPK Promos</td>      
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['activitylevelid']; ?>" name="activitylevelid" id="activitylevelid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['activitylevelid']; ?>&filter=activitylevel" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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