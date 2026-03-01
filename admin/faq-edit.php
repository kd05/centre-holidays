<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


if (!empty($_GET['faqTime']))
$faqTime=trim($_GET['faqTime']);
else
$faqTime=trim($_POST['faqTime']);

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

<h3>FAQ Edit</h3>

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

	$sql = "SELECT * FROM faq WHERE faqTime=".$faqTime." LIMIT 1";

	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
		
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

while($row = mysqli_fetch_assoc($result)) {
$faqID=$row['faqID'];	
?>

<table style="background:#fff !important; margin-top:50px; width:100%">

<form action="faq/update-faq.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="faqTime" name="faqTime" value="<?php echo $faqTime; ?>" />
<input type="hidden" id="faqID" name="faqID" value="<?php echo $row['faqID']; ?>" />


<tr>
<th>Title</th>
<td colspan="4">
<textarea name="faqTitle" id="faqTitle" class='scrollable' placeholder="FAQ Title">
<?php echo $row['faqTitle']; ?>
</textarea>
</td>
</tr>


<tr>
<th>Filter</th>
<td colspan="4">


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

<?php

$faqFilter=trim(str_replace(",","",$row['faqFilter']));

	$sql3 = "SELECT * FROM faqfilter ORDER BY faqFilter ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
/*			if (strpos($row['faqFilter'], $row3['faqFilter']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';*/	

			
			if (($faqFilter == $row3['faqFilter'])) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';
	
	?>
    <li><input style="width:auto !important" type="checkbox" <?php echo $stylecheck3 ?> name="faqFilter[]" value="<?php echo $row3['faqFilter']; ?>">&nbsp;<strong><?php echo $row3['faqFilter']; ?></strong> </li>
	<?php
			
		}
	}
?>

</ul>

</div>


</td>
</tr>

<tr>
<th>Suppliers</th>
<td colspan="4">


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

<?php

	$sql7 = "SELECT * FROM affiliates ORDER BY affiliatename ASC";	  
	$result7 = mysqli_query($conn, $sql7);	
	if (mysqli_num_rows($result7) > 0) {
		// output data of each row
		while($row7 = mysqli_fetch_assoc($result7)) {
			
			if (strpos($row['affiliatename'], $row7['affiliatename']) !== false) {
			$stylecheck7='checked';
			}
			else
			$stylecheck7='';	
	
	?>
    <li><input style="width:auto !important" type="checkbox" <?php echo $stylecheck7 ?> name="affiliatename[]" value="<?php echo $row7['affiliatename']; ?>">&nbsp;<strong><?php echo $row7['affiliatename']; ?></strong> </li>
	<?php
			
		}
	}
?>

</ul>

</div>


</td>
</tr>


<tr>
<th>FAQ Content</th>
<td colspan="4">
<textarea name="faqContent" id="faqContent" class='scrollable' placeholder="FAQ Content">
<?php echo $row['faqContent']; ?>
</textarea></td>
</tr>


<tr>
    <th>Content URL</th>
    <td colspan="4">
        <input type="text" id="faqContentUrl" name="faqContentUrl" value="<?php echo $row['faqContentUrl']; ?>" placeholder="Content URL" />
    </td>
</tr>



<tr>
<th>Video URL</th>
<td colspan="4">
<input type="text" id="faqVideoUrl" name="faqVideoUrl" value="<?php echo $row['faqVideoUrl']; ?>" placeholder="Video URL" />
</td>
</tr>

<tr>
<th>FAQ Tags</th>
<td colspan="4">
<textarea name="faqTags" id="faqTags" class='scrollable' placeholder="FAQ Tags">
<?php echo $row['faqTags']; ?>
</textarea></td>
</tr>


<tr>
<th>Internal Notes</th>
<td colspan="4">
<textarea name="faqInternalNotes" id="faqInternalNotes" class='scrollable' placeholder="Internal Notes">
<?php echo $row['faqInternalNotes']; ?>
</textarea></td>
</tr>


<tr>
<th></th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%"/></td>

<?php
if ($row['faqActive']==0)
{
?>
<td><a href="faq/activate-faq.php?faqID=<?php echo $row['faqID']; ?>" class="btn btn-success" style="width:100%" title="Activate" onclick="return confirm_delete()">Activate</a></td>
<?php
}
elseif ($row['faqActive']==1)
{
?>
<td><a href="faq/deactivate-faq.php?faqID=<?php echo $row['faqID']; ?>" class="btn btn-warning" style="width:100%" title="Deactivate" onclick="return confirm_delete()">deactivate</a></td>
<?php
}
?>


<td><a href="faq/delete-faq.php?faqID=<?php echo $row['faqID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>


</tr>

</form>


</table>


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