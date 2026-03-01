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

<style>
.custom-radio {margin:0 10px 0  10px}
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

 <h3>Search for a Promo</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
<input type="text" value="<?php echo trim($_GET['codelook']) ?>" id="codelook" name="codelook" placeholder="Search for a Promo by Promo Code, or Title or Departure From" class="form-control" />
<br />
<input type="submit" class="btn-primary btn-lg btn" value="Search" />
</form>
    
    <hr />


<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM promos WHERE ";		
		$sql .= " promocode LIKE '%".trim($_GET['codelook'])."%' ||";	
		$sql .= " promodepartfrom LIKE '%".trim($_GET['codelook'])."%' ||";			
		$sql .= " promotitle LIKE '%".trim($_GET['codelook'])."%' ";					
		$sql .= "ORDER BY promotitle DESC";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{
		
		echo 'Results found '.$row_cnt;

?>
            
<table style="margin-top:10px">
<tr>
<th>Thumb</th>
<th>Website</th>
<th>Promo Code</th>
<th>Promo Title</th>
<th>Depart From</th>
<th>Expiry Date</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

// expiry time and active or not change background color====================
$promoexptime=$row['promoexptime'];// expiry timestamp
$differtimestamps=$promoexptime-$todaystimestamp; // difference in timestamps
//==========================================================================
$promoactive=$row['promoactive'];

if ($promoactive==0 || ($differtimestamps < 0 && !empty($promoexptime)))
$mybakg='style="background:#666 !important"';
else
$mybakg='style="background:#fff !important"';


	// identify the website and properly display the images.
	if ($row['promowebsites']=='2')
	{
		$url='https://www.centreholidays.com';
	}
	else
	{
		$url='https://'.$_SERVER[HTTP_HOST];
	}

?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td>
<?php if (!empty($row['promosquarethumb'])) { ?>
<img src="<?php echo $url ?>/img/special-offers/<?php echo $row['promosquarethumb']; ?>" style="max-width:100px; max-height:100px; margin-bottom:10px" />
<?php } ?>
</td>
<td><?php 

if ($row['promowebsites'] == 1)
echo '<strong>Epik</strong>';
elseif ($row['promowebsites'] == 2)
echo '<strong>CH</strong>';
elseif ($row['promowebsites'] == 3)
echo '<strong>Epik & CH</strong>'; 


?></td>
<td><?php echo $row['promocode']; ?></td>
<td style="text-align:left !important"><?php echo $row['promotitle']; ?></td>
<td style="text-align:left !important"><?php echo $row['promodepartfrom']; ?></td>
<td><?php echo $row['promoexpirydate']; ?></td>
<td><a href="promos-edit.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$promoactive=$row['promoactive'];
if ($promoactive==1)
{
?>
<a href="promos/deactivate-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($promoactive==0)
{
?>
<a href="promos/activate-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="promos/delete-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php

		}
?>

</table>
</div>

<?php
	}
?>

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