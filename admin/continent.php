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
<h3>Add continents/regions to your destinations filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<!--<select id="myvalue" name="myvalue" style="height:30px; width:400px; padding:2px">
<option value="">Choose a continent</option>
    <option value="Africa">Africa</option>
    <option value="Antartica">Antartica</option>
    <option value="Arctic">Arctic</option>
    <option value="Asia">Asia</option>    
    <option value="Australia">Australia</option>
    <option value="Central America">Central America</option>
    <option value="Europe">Europe</option>
    <option value="Middle East">Middle East</option>    
    <option value="North Africa">North Africa</option>
    <option value="Oceania">Oceania</option>
    <option value="North America">North America</option>    
    <option value="South America">South America</option>   
</select>-->
<input type="text" value="" id="myvalue" name="myvalue" placeholder="Continent ie. Africa, North America etc" class="form-control"/>
<!--
<input type="text" value="" id="contwebsite" name="contwebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>
--><input type="hidden" value="continent" name="filter" id="filter" />
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>
<hr />
<h3>Current Continents/Regions</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM continent ORDER BY continent ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {

		// Ssign color to each website
	$website=$row['contwebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	
	if ($row['continentarts']==1)
	$continentarts='checked';
	else
	$continentarts='';
	
	if ($row['continenttrips']==1)
	$continenttrips='checked';
	else
	$continenttrips='';
	
	if ($row['continentpromos']==1)
	$continentpromos='checked';
	else
	$continentpromos='';
	
	if ($row['continentarts2']==1)
	$continentarts2='checked';
	else
	$continentarts2='';
	
	if ($row['continenttrips2']==1)
	$continenttrips2='checked';
	else
	$continenttrips2='';
	
	if ($row['continentpromos2']==1)
	$continentpromos2='checked';
	else
	$continentpromos2='';	
	
	if ($row['continenthighlights']==1)
	$continenthighlights='checked';
	else
	$continenthighlights='';		
	
	
?>
    
	<form action="filter/set-continent.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['continentactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><?php echo $row['continent']; ?></td>
    
    <td><input type="checkbox" name="continenttrips" value="continenttrips" <?php echo $continenttrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="continentarts" value="continentarts" <?php echo $continentarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="continentpromos" value="continentpromos" <?php echo $continentpromos ?>>&nbsp;CH Promos</td> 
    <td><input type="checkbox" name="continenthighlights" value="continenthighlights" <?php echo $continenthighlights ?>>&nbsp;CH Highlights</td>  
    
    <td><input type="checkbox" name="continenttrips2" value="continenttrips2" <?php echo $continenttrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="continentarts2" value="continentarts2" <?php echo $continentarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="continentpromos2" value="continentpromos2" <?php echo $continenthighlights ?>>&nbsp;EPK Promos</td>       
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['contid']; ?>" name="contid" id="contid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['contid']; ?>&filter=continent" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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