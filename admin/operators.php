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

<h3>Add Suppliers</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue7" name="myvalue7" placeholder="Add Suppliers" class="form-control" />
<input type="hidden" value="operators" name="filter" id="filter" />
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%"/>
</form>

<hr />
<h3>Current Suppliers</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM operators ORDER BY operators ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	if ($row['operatorsarts']==1)
	$operatorsarts='checked';
	else
	$operatorsarts='';
	
	if ($row['operatorstrips']==1)
	$operatorstrips='checked';
	else
	$operatorstrips='';
	
	if ($row['operatorspromos']==1)
	$operatorspromos='checked';
	else
	$operatorspromos='';
	
	if ($row['operatorsarts2']==1)
	$operatorsarts2='checked';
	else
	$operatorsarts2='';
	
	if ($row['operatorstrips2']==1)
	$operatorstrips2='checked';
	else
	$operatorstrips2='';
	
	if ($row['operatorspromos2']==1)
	$operatorspromos2='checked';
	else
	$operatorspromos2='';			
	
	if ($row['operatorshighlights']==1)
	$operatorshighlights='checked';
	else
	$operatorshighlights='';	
	?>

	<form action="filter/set-operators.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['operatorsactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><strong><?php echo $row['operators']; ?></strong></td>
   
    <td><input type="checkbox" name="operatorstrips" value="operatorstrips" <?php echo $operatorstrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="operatorsarts" value="operatorsarts" <?php echo $operatorsarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="operatorspromos" value="operatorspromos" <?php echo $operatorspromos ?>>&nbsp;CH Promos</td> 
	<td><input type="checkbox" name="operatorshighlights" value="operatorshighlights" <?php echo $operatorshighlights ?>>&nbsp;CH Highlights</td>     
    <td><input type="checkbox" name="operatorstrips2" value="operatorstrips2" <?php echo $operatorstrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="operatorsarts2" value="operatorsarts2" <?php echo $operatorsarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="operatorspromos2" value="operatorspromos2" <?php echo $operatorspromos2 ?>>&nbsp;EPK Promos</td> 
           
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
     <td>
    <input type="hidden" value="<?php echo $row['opid']; ?>" name="opid" id="opid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['opid']; ?>&filter=operators" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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