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
<h3>Add Cruise Ships</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue99" name="myvalue99" placeholder="ie. Cruise ship name/title" class="form-control"/>
<input type="hidden" value="cruiseships" name="filter" id="filter" />
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>
<hr />
<h3>Current Departure Cruise Ships</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM cruiseships ORDER BY cruiseships ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {

		// Ssign color to each website
	$website=$row['contwebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	
/*	if ($row['cruiseshipsarts']==1)
	$cruiseshipsarts='checked';
	else
	$cruiseshipsarts='';*/
	
	if ($row['cruiseshipstrips']==1)
	$cruiseshipstrips='checked';
	else
	$cruiseshipstrips='';
	
/*	if ($row['cruiseshipspromos']==1)
	$cruiseshipspromos='checked';
	else
	$cruiseshipspromos='';
	
	if ($row['cruiseshipsarts2']==1)
	$cruiseshipsarts2='checked';
	else
	$cruiseshipsarts2='';*/
	
	if ($row['cruiseshipstrips2']==1)
	$cruiseshipstrips2='checked';
	else
	$cruiseshipstrips2='';
	
/*	if ($row['cruiseshipspromos2']==1)
	$cruiseshipspromos2='checked';
	else
	$cruiseshipspromos2='';	*/	
	
	
?>
    
	<form action="filter/set-cruiseships.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['cruiseshipsactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><?php echo $row['cruiseships']; ?></td>
    
    <td><input type="checkbox" name="cruiseshipstrips" value="cruiseshipstrips" <?php echo $cruiseshipstrips ?>>&nbsp;CH Trips</td>
<!--    <td><input type="checkbox" name="cruiseshipsarts" value="cruiseshipsarts" <?php //echo $cruiseshipsarts ?>>&nbsp;CH Articles </td>  -->  
<!--	<td><input type="checkbox" name="cruiseshipspromos" value="cruiseshipspromos" <?php //echo $cruiseshipspromos ?>>&nbsp;CH Promos</td> 
-->    
    <td><input type="checkbox" name="cruiseshipstrips2" value="cruiseshipstrips2" <?php echo $cruiseshipstrips2 ?>>&nbsp;EPK Trips</td>
 <!--   <td><input type="checkbox" name="cruiseshipsarts2" value="cruiseshipsarts2" <?php // echo $cruiseshipsarts2 ?>>&nbsp;EPK Articles </td>   --> 
<!--	<td><input type="checkbox" name="cruiseshipspromos2" value="cruiseshipspromos2" <?php //echo $cruiseshipspromos2 ?>>&nbsp;EPK Promos</td>       
-->    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['cruiseshipsid']; ?>" name="cruiseshipsid" id="cruiseshipsid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['cruiseshipsid']; ?>&filter=cruiseships" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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