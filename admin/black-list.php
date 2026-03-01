<?php ob_start(); ?>
<?php
include 'geoplugin.class/index.php';
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

<style>
.custom-radio {margin:0 10px 0  10px;}
</style>

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
  	<strong>Success! That IP no longer blocked</strong>
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

 		<h3>Black List</h3>
        
        <hr />
        
        <a href="home.php" class="btn btn-primary">Home page</a>
        &nbsp;&nbsp;
		<a href="forms-list.php" class="btn btn-info">View Form Senders List</a>
        
		<hr />
<?php
$counting=1;
?>
    <table style="width:100%">
	<tr>
	<th>#</th>
    <th>IP Address</th>
    <th>Timestamp</th>    
    <th>Name</th>
    <th>Country</th>
    <th>Email</th>
    <th></th>
    
</tr>
		<?php

		$sql = "SELECT * FROM blacklist ORDER BY bltime DESC, blcountry ASC, blarea ASC, blcity ASC";	
		//$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			if ($row['blcountry'] !='Canada')
			$back='#ccc';
			else
			$back='#fff';
		?>
	<tr style="background:<?php echo $back ?>">
	<td><?php echo $counting++ ?></td>
    <td><?php echo $row['blip'] ?></td>
    <td><?php echo date('d/m/Y h:i:sa', $row['bltime']) ?></td>
    <td><?php echo $row['blname'] ?></td>
    <td><?php echo $row['blcountry'] ?></td>
    <td><?php echo $row['bemail'] ?></td>
    <td><a href="unblock.php?blip=<?php echo $row['blip'] ?>" class="btn btn-success" onclick="return confirm_delete()">Unblock</a></td>                               
	</tr>
		<?php				
	
		}
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');


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