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
<h3>Add interests to your filter</h3>
<form action="filter/add-filter.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
<input type="text" value="" id="myvalue69" name="myvalue69" placeholder="Add interests" class="form-control" />
<input type="hidden" value="interests" name="filter" id="filter" />
<!--<br />
<input type="text" value="" id="interestswebsite" name="interestswebsite" class="form-control"  placeholder="Associated Website ie 1, 2 or 3"/>-->
<br /><br />
<input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
</form>

<hr />
<h3>Current interests</h3>
<table style="width:100%">
<?php

	$sql = "SELECT * FROM interests ORDER BY interests ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
	// Ssign color to each website
	$website=$row['interestswebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
	
	if ($row['interestsarts']==1)
	$interestsarts='checked';
	else
	$interestsarts='';
	
	if ($row['intereststrips']==1)
	$intereststrips='checked';
	else
	$intereststrips='';
	
	if ($row['interestspromos']==1)
	$interestspromos='checked';
	else
	$interestspromos='';
	
	if ($row['interestsarts2']==1)
	$interestsarts2='checked';
	else
	$interestsarts2='';
	
	if ($row['intereststrips2']==1)
	$intereststrips2='checked';
	else
	$intereststrips2='';
	
	if ($row['interestspromos2']==1)
	$interestspromos2='checked';
	else
	$interestspromos2='';	
	
	if ($row['interestshighlights']==1)
	$interestshighlights='checked';
	else
	$interestshighlights='';		
	
	?>
	<form action="filter/set-interests.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <tr <?php //echo $webbakg ?>>
    <td>
    <?php
	if ($row['interestsactive']=='1')
	echo $status='<strong>ACTIVE</strong>';
	else
	echo $status='NOT ACTIVE';
	?>
    </td> 
    <td><?php echo $row['interests']; ?></td>
	<td>
    <a href="edit-filter.php?interestsid=<?php echo $row['interestsid']; ?>&filter=interests" class="btn btn-warning">Change</a>    
    </td>    
    <form action="filter/set-interests.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <td><input type="checkbox" name="intereststrips" value="intereststrips" <?php echo $intereststrips ?>>&nbsp;CH Trips</td>
<!--    <td><input type="checkbox" name="interestsarts" value="interestsarts" <?php echo $interestsarts ?>>&nbsp;CH Articles </td> -->   
	<td><input type="checkbox" name="interestspromos" value="interestspromos" <?php echo $interestspromos ?>>&nbsp;CH Promos</td> 
	<td><input type="checkbox" name="interestshighlights" value="interestshighlights" <?php echo $interestshighlights ?>>&nbsp;CH Highlights</td>      
    <td><input type="checkbox" name="intereststrips2" value="intereststrips2" <?php echo $intereststrips2 ?>>&nbsp;EPK Trips</td>
<!--    <td><input type="checkbox" name="interestsarts2" value="interestsarts2" <?php echo $interestsarts2 ?>>&nbsp;EPK Articles </td>  -->  
	<td><input type="checkbox" name="interestspromos2" value="interestspromos2" <?php echo $interestspromos2 ?>>&nbsp;EPK Promos</td>      
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <td>
    <input type="hidden" value="<?php echo $row['interestsid']; ?>" name="interestsid" id="interestsid" />
    <a href="filter/delete-filter.php?id=<?php echo $row['interestsid']; ?>&filter=interests" onclick="return confirm_delete()"><i class="fa fa-times btn btn-danger btn-circle"></i></a>
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