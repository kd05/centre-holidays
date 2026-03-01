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
<h3>Add types to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue26" name="myvalue26" placeholder="Add a Type" class="form-control" />
<input type="hidden" value="types" name="filter" id="filter" />
<!--<br />
<input type="text" value="" id="typeswebsite" name="typeswebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>-->
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current types</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM types ORDER BY types ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	// Ssign color to each website
	$website=$row['typeswebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	
	if ($row['typestrips1']==1)
	$typestrips1='checked';
	else
	$typestrips1='';
	
	if ($row['typespromos1']==1)
	$typespromos1='checked';
	else
	$typespromos1='';
	
	
	if ($row['typestrips2']==1)
	$typestrips2='checked';
	else
	$typestrips2='';
	
	if ($row['typeshighlights1']==1)
	$typeshighlights1='checked';
	else
	$typeshighlights1='';		
	
	?>
	<form action="filter/set-types.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    <td>
    <?php
	if ($row['typesactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td> 
    <td><?php echo $row['types']; ?></td>
	<td>
    <a href="edit-filter.php?typesid=<?php echo $row['typesid']; ?>&filter=types" class="btn btn-warning">Change</a>    
    </td>     
    <form action="filter/set-types.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <td><input type="checkbox" name="typestrips1" value="typestrips1" <?php echo $typestrips1 ?>>&nbsp;CH Trips</td>
<!--    <td><input type="checkbox" name="typesarts" value="typesarts" <?php echo $typesarts ?>>&nbsp;CH Articles </td> -->   
	<td><input type="checkbox" name="typespromos1" value="typespromos1" <?php echo $typespromos1 ?>>&nbsp;CH Promos</td> 
	<td><input type="checkbox" name="typeshighlights1" value="typeshighlights1" <?php echo $typeshighlights1 ?>>&nbsp;CH Highlights</td>      
    <td><input type="checkbox" name="typestrips2" value="typestrips2" <?php echo $typestrips2 ?>>&nbsp;EPK Trips</td>
<!--    <td><input type="checkbox" name="typesarts2" value="typesarts2" <?php //echo $typesarts2 ?>>&nbsp;EPK Articles </td>  
	<td><input type="checkbox" name="typespromos2" value="typespromos2" <?php //echo $typespromos2 ?>>&nbsp;EPK Promos</td>      -->  
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['typesid']; ?>" name="typesid" id="typesid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['typesid']; ?>&filter=types" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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