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
table {width:97% !important}
table td {text-align:left !important; padding-left:20px;}
table th {text-align:left !important; padding-left:20px; max-width:100px}
textarea {white-space:pre-wrap !important}
input, select {width:100%; border:none;}
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

<h3>Certifications</h3>
<p>If you leave the Agent ID field empty, it will by default select Centre Holidays.</p>
<div style="max-width:100%; overflow-x:hidden; margin-bottom:100px">


<?php
//---------------display results in case of unpdate--------------
if (isset($_GET['results']))
{
	if ($_GET['results']='success')
	echo "<h4>Success, changes done</h4>";
	elseif ($_GET['results']='error')
	echo "<h4>Error, could not make changes</h4>";
}
//----------------------------Connect to database-------------------------

		$sql = "SELECT * FROM ch_certifications WHERE CID=".$_GET['CID']."";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>

<table style="background:#fff !important; margin-top:50px; width:100%">
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	if ($row['AgentID'] !='457')// if this is someone other than centre holidays display their id
	$AgentID=$row['AgentID'];		

?>
<form action="certificates/update-certificates.php" method="post" enctype="multipart/form-data">
<tr>
<input type="hidden" id="CID" name="CID" value="<?php echo $row['CID']; ?>" /> 
</tr><tr>
<th>Title</th>
<td><input id="Title" name="Title" value="<?php echo $row['Title']; ?>" style="text-transform:uppercase" /></td>
</tr><tr>
<th>Sub Title</th>
<td>
<textarea name="SubTitle" id="SubTitle" class='scrollable'>
<?php echo $row['SubTitle']; ?>
</textarea>
</td>
</tr><tr>
<th>Alt. Tag</th>
<td><input type="text" id="AltTag" name="AltTag" value="<?php echo $row['AltTag']; ?>"/></td>
</tr>

<tr>
<th>ThumbUrl (folder location)</th>
<td>
<div style="width:100%; text-align:center" >
<?php if (!empty($row['ThumbImageURL'])) {  

$ThumbImageURL=$row['ThumbImageURL']; // example /img/certifications/adventure-island.jpg

$certimage='https://centreholidays.com//'.$ThumbImageURL; 

$newcertimage='https://centreholidays.com/img/agents/certifications/'.$row['ThumbImageURL'];

?>
<img src="<?php echo $certimage ?>" onError="this.onerror=null;this.src='<?php echo $newcertimage ?>';" alt="<?php echo $row['AltTag']; ?>" style="width:150px; height:150px; border:1px solid #CCC" />
<?php 
} 
?>
</div>
</td>
</tr><tr>
<th></th>
<td>
<input type="text" id="ThumbImageURL" name="ThumbImageURL" placeholder="Thumb Image URL" value="<?php echo $row['ThumbImageURL']; ?>"/>
</td>
</tr>

<tr>
<th>Status</th>
<td>
<select id="active" name="active" >
<?php
if ($row['active']==1)
$active='Active';
else
$active='Not Active';
?>
<option value="<?php echo $row['active']; ?>"><?php echo $active; ?></option>
<option value="">---</option>
<option value="0">Deactivate</option>
<option value="1">Activate</option>
</select></td>
</tr><tr>
<th></th>
<td><input type="submit" value="update" class="btn btn-primary" style="width:100%"/></td>
</tr><tr>
<th></th>
<td><a href="certificates/delete-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>
</form>
<?php

		}
?>

</table>

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