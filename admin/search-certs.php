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

<h3>Search and Add Certificates</h3>
<p>(First search to make sure the new Certificate does not exist, and then add it.)</p>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<form method="get" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="text" value="" id="look" name="look"  class="form-control" placeholder="Certificate Title" />
<br />
<input type="submit" value="Search" class="btn btn-primary" />
</form>

<hr />

<?php

if (!empty($_GET['look']))
{
//===============================list trips==================================

		$sql = "SELECT * FROM ch_certifications WHERE (Title LIKE '%".$_GET['look']."%' || SubTitle LIKE '%".$_GET['look']."%') ORDER BY Title ASC LIMIT 60";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);


	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
        
<table style="margin-top:10px">
<tr>
<th>Certificate ID</th>
<th>Title</th>
<th>ThumbImageURL</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$active=$row['active'];
if ($active==0)
$mybakg='style="background:#666 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';


?>

<tr class="selectedtr" <?php echo $mybakg ?>>

<td><?php echo $row['CID']; ?></td>
<td><?php echo $row['Title']; ?></td>
<td>
<?php if (!empty($row['ThumbImageURL'])) {  
$ThumbImageURL=$row['ThumbImageURL']; // example /img/certifications/adventure-island.jpg

$certimage='https://centreholidays.com//'.$ThumbImageURL; 

$newcertimage='https://centreholidays.com/img/agents/certifications/'.$row['ThumbImageURL'];
?>
<img src="<?php echo $certimage ?>" onError="this.onerror=null;this.src='<?php echo $newcertimage ?>';" alt="<?php echo $row['AltTag']; ?>" style="width:100px; height:100px; border:1px solid #CCC" />
<?php 
} 
?>
</td>

<td><a href="certificates-details.php?CID=<?php echo $row['CID']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="certificates/deactivate-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($active==0)
{
?>
<a href="certificates/activate-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="certificates/delete-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php

		}
?>

</table>
</div>

<?php
	}
	else
	{
	?>
    <strong>This Certificate does not exist, do you want to add it?</strong><br />
	<a href="certificates-add.php?Title=<?php echo $_GET['look']; ?>" onclick="return confirm_delete()" class="btn btn-primary">Add a New Certificate</a>
	<?php
	}
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