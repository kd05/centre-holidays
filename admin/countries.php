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
<h3>Add countries to your destinations filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<!--  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="js/countries-countries-1.0-utf8.js"></script>
  <script type="text/javascript">
  $(function() {
    new dgcountriessCountries({
      countriesVal: document.getElementById("countries").val,
      countryVal: document.getElementById("country").val,
      countries: document.getElementById("countries"),
      country: document.getElementById("country"),
      change: true
    });
  });
  </script>-->
<select id="myvalue" name="myvalue" class="form-control" >
<option>Select a continent/region</option>
<?php
	$sql3 = "SELECT * FROM continent ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result3)) {
			// Ssign color to each website
	//$website=$row['contwebsite'];
	//include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	?>
    <option value="<?php echo $row['continent']; ?>" <?php //echo $webbakg ?>><?php echo $row['continent']; ?></option>
    <?php
			
		}
	}
?>
</select>
<br />

<input type="text" value="" id="myvalue1" name="myvalue1" placeholder="Country ie. India, Kenya etc" class="form-control" />

<!--<br />
<input type="text" value="" id="countrieswebsite" name="countrieswebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>
    

<select id="countries" name="myvalue" style="height:30px; width:400px; padding:2px"></select>
<select id="country" name="myvalue1" style="height:30px; width:400px; padding:2px"></select>-->

<input type="hidden" value="countries" name="filter" id="filter" />
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>




<hr />
<h3>Current Countries</h3>
<br />
<table style="width:100%">
<?php

	$sql = "SELECT * FROM countries ORDER BY continent ASC, countries ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	// Ssign color to each website
	$website=$row['countrieswebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');	
	
	
	if ($row['countriesarts']==1)
	$countriesarts='checked';
	else
	$countriesarts='';
	
	if ($row['countriestrips']==1)
	$countriestrips='checked';
	else
	$countriestrips='';
	
	if ($row['countriespromos']==1)
	$countriespromos='checked';
	else
	$countriespromos='';
	
	if ($row['countriesarts2']==1)
	$countriesarts2='checked';
	else
	$countriesarts2='';
	
	if ($row['countriestrips2']==1)
	$countriestrips2='checked';
	else
	$countriestrips2='';
	
	if ($row['countriespromos2']==1)
	$countriespromos2='checked';
	else
	$countriespromos2='';	
	
	if ($row['countrieshighlights']==1)
	$countrieshighlights='checked';
	else
	$countrieshighlights='';			
	
	?>

	<form action="filter/set-countries.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    
    <td>
    <?php
	if ($row['countriesactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td>
    
    <td><?php echo $row['continent']; ?></td>
    <td><strong><?php echo $row['countries']; ?></strong></td>
    
    <td><input type="checkbox" name="countriestrips" value="countriestrips" <?php echo $countriestrips ?>>&nbsp;CH Trips</td>
    <td><input type="checkbox" name="countriesarts" value="countriesarts" <?php echo $countriesarts ?>>&nbsp;CH Articles </td>    
	<td><input type="checkbox" name="countriespromos" value="countriespromos" <?php echo $countriespromos ?>>&nbsp;CH Promos</td>
    <td><input type="checkbox" name="countrieshighlights" value="countrieshighlights" <?php echo $countrieshighlights ?>>&nbsp;CH Highlights</td> 
    
    <td><input type="checkbox" name="countriestrips2" value="countriestrips2" <?php echo $countriestrips2 ?>>&nbsp;EPK Trips</td>
    <td><input type="checkbox" name="countriesarts2" value="countriesarts2" <?php echo $countriesarts2 ?>>&nbsp;EPK Articles </td>    
	<td><input type="checkbox" name="countriespromos2" value="countriespromos2" <?php echo $countriespromos2 ?>>&nbsp;EPK Promos</td>       
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 

    <td>
    <input type="hidden" value="<?php echo $row['countid']; ?>" name="countid" id="countid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['countid']; ?>&filter=countries" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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