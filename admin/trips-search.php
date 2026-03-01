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
    
 	<div class="col-md-12 col-xs-12 col-sm-12">
    <h3>Search Trips by Trip Code or Title</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
    <input type="text" value="<?php echo $_GET['codelook'] ?>" id="codelook" name="codelook" placeholder="Search by inquiry number, or name, or email, or trip code" class="form-control" />
	<br />
    <input type="submit" class="btn-primary btn-lg btn" value="Search" />
	</form>
    
    <br />
    </div>   

<div class="col-md-12 col-xs-12 col-sm-12">
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM trips WHERE tcode LIKE '%".$_GET['codelook']."%' || ttitle LIKE '%".$_GET['codelook']."%' || tags LIKE '%".$_GET['codelook']."%' ORDER BY twebsite DESC, ttitle ASC LIMIT 100";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			

	if ($row_cnt > 0 && (!empty($_GET['codelook'])))// display results in case the feedback table is not empty
	{

?>
            
<table style="margin-top:10px">
<tr>
<th>ID</th>
<th>Website</th>
<th>Trip Code</th>
<th>Title</th>
<th>Square Thumbnail</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	// identify the website and properly display the images.
	if ($row['twebsite']=='1' || $row['twebsite']=='2' || $row['twebsite']=='3')
	{
		$url='https://www.centreholidays.com/';
	}
/*	else
	{
		$url='https://www.epikescapes.com/';
	}*/

// expiry time and active or not change background color====================
$texpiry=$row['texpiry'];// expiry timestamp
$differtimestamps=$texpiry-$todaystimestamp; // difference in timestamps
//==========================================================================
$active=$row['active'];

if ($active==0 || ($differtimestamps < 0 && !empty($texpiry)))
$mybakg='style="background:#666 !important"';
else
$mybakg='style="background:#fff !important"';
		
	// asign color to each website
	$website=$row['twebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');
?>
<form action="trips-editdetails.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr" <?php echo $mybakg ?> >
<td><?php echo $row['tid']; ?><input type="hidden" id="tid" name="tid" value="<?php echo $row['tid']; ?>" placeholder="#"/></td>
<td><?php 

if ($row['twebsite'] == 1)
{
echo '<strong>Epik</strong>';
$mainlink='https://www.epikescapes.com/';
}
elseif ($row['twebsite'] == 2)
{
echo '<strong>CH</strong>';
$mainlink='https://www.centreholidays.com/';

}
elseif ($row['twebsite'] == 3)
{
echo '<strong>Epik & CH</strong>';
$mainlink='https://www.epikescapes.com/'; 
}


?></td>
<td><input type="text" id="tcode" readonly name="tcode" value="<?php echo $row['tcode']; ?>" class="form-control" placeholder="Trip Code" /></td>
<td><input type="text" id="ttitle" readonly name="ttitle" value="<?php echo $row['ttitle']; ?>" class="form-control" placeholder="Title"/></td>

<td>
<?php


if (!empty($row['squarethumb']))
{
?>
<br />
<a href="<?php echo $mainlink."/img/trips/".$row['timage']; ?>">
<img src="<?php echo $mainlink."/img/trips/".$row['timage']; ?>" style="max-width:50px; height:50px; max-height:50px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>

<td>
<a href="trips-editdetails.php?tid=<?php echo $row['tid']; ?>" class="btn btn-primary">Edit</a>
</td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<td><a href="trips/deactivate-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="trips/activate-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

<td><a href="trips/delete-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>
</form>
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


<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>