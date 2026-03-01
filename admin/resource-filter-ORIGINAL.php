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
<h3>Resource Centre Holidays Filter</h3>
<form action="resource/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="inchFilter" name="inchFilter" placeholder="Add Resource CH filter" class="form-control" />

<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current Resource CH filters</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM resourcefilter ORDER BY inchFilter ASC";
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');

	?>
	<form action="resource/set-resource.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
	<input type="hidden" value="<?php echo $row['inFilterid']; ?>" id="inFilterid" name="inFilterid" />
    <tr>
    <td>
    <?php
	if ($row['inFilteractive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td> 
    <td>
	<input type="text" value="<?php echo $row['inchFilter']; ?>" id="inchFilter" name="inchFilter" style="width:100%; min-height:34px" /></td>
	<td>
    <input type="submit" class="btn btn-warning" value="Change" style="width:100%" />  
    </td> 
    
	<td>
    <a href="resource/delete-filter.php?inFilterid=<?php echo $row['inFilterid']; ?>" class="btn btn-danger" style="width:100%" >Delete</a>
    </td>         
       
    </tr> 
    </form>
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