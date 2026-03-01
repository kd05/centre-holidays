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

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<style>
.star-rating {
  font-family: 'FontAwesome';
}
.star-rating > fieldset {
  border: none;
  display: inline-block;
}
.star-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.star-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #c1984b;
}
.star-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.star-rating > fieldset:not(:checked) > label:hover,
.star-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #c1984b;
}
.star-rating > fieldset:not(:checked) > label:hover:before,
.star-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.star-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.star-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}


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

<h3>Customer Reviews </h3>
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

		$sql = "SELECT * FROM ch_feedback WHERE FeedID=".$_GET['UFeedID']."";

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
<form action="feedback/update-feedback-agent.php" method="post" enctype="multipart/form-data">
<tr>
<input type="hidden" id="UFeedID" name="UFeedID" value="<?php echo $row['FeedID']; ?>" /> 
</tr><tr>
<th>Title</th>
<td><input id="FeedTitle" name="FeedTitle" value="<?php echo $row['FeedTitle']; ?>" /></td>
</tr><tr>
<th>Category</th>
<td><input id="FeedProduct" name="FeedProduct" value="<?php echo $row['FeedProduct']; ?>" /></td>
</tr><tr>
<th>Departure Date</th>
<td><input id="FeedDeparture" name="FeedDeparture" value="<?php echo $row['FeedDeparture']; ?>" /></td>
</tr><tr>
<th>Agent</th>
<td><input id="FeedAgent" name="FeedAgent" value="<?php echo $row['FeedAgent']; ?>"/></td>
</tr><tr>
<th>Agent ID</th>
<td><input type="text" id="UAgentID" name="UAgentID" value="<?php echo $AgentID; ?>" style="width:30px"/></td>
</tr><tr>
<th>Star Rating</th>
<td>

    <?php  
	$fas=$row['FeedExperience']-1; 
	$far=5-$row['FeedExperience']-1;
	for ($x = 0; $x <= $fas; $x++) {
    ?>
    <i class="fas fa-star fa-lg kt-font-warning"></i>&nbsp;
    <?php
	}
	for ($y = 0; $y <= $far; $y++) {
    ?>
    <i class="far fa-star fa-lg kt-font-warning"></i>&nbsp;
    <?php
	}
	?>

<input type="text" id="FeedExperience" name="FeedExperience" value="<?php echo $row['FeedExperience']; ?>" style="width:80px; background:#CCC" /></td>
</tr><tr>
<th>Message</th>
<td>
<textarea name="FeedMessage" id="FeedMessage" class='scrollable textarea_editor' style="width:100%">
<?php echo $row['FeedMessage']; ?>
</textarea>
</td>
</tr><tr>
<th>Customer Name</th>
<td><input id="FeedName" name="FeedName" value="<?php echo $row['FeedName']; ?>" /></td>
</tr><tr>
<th>Customer Phone</th>
<td><input id="FeedPhone" name="FeedPhone" value="<?php echo $row['FeedPhone']; ?>" /></td>
</tr><tr>
<th>Customer Email</th>
<td><input id="FeedEmail" name="FeedEmail" value="<?php echo $row['FeedEmail']; ?>" /></td>
</tr><tr>
<th>Location</th>
<td><input id="FeedLocation" name="FeedLocation" value="<?php echo $row['FeedLocation']; ?>" /></td>
</tr><tr>
<th>Date Posted</th>
<td><input id="FeedDate" name="FeedDate" value="<?php echo $row['FeedDate']; ?>" /></td>
</tr><tr>
<th>Status</th>
<td>
<select id="FeedStatus" name="FeedStatus" >
<?php
if ($row['FeedStatus']==1)
$FeedStatus='Active';
else
$FeedStatus='Not Active';
?>
<option value="<?php echo $row['FeedStatus']; ?>"><?php echo $FeedStatus; ?></option>
<option value="">---</option>
<option value="0">Deactivate</option>
<option value="1">Activate</option>
</select></td>
</tr><tr>
<th></th>
<td><input type="submit" value="update" class="btn btn-primary" style="width:100%"/></td>
</tr><tr>
<th></th>
<td><a href="feedback/delete-feedback.php?UFeedID=<?php echo $row['FeedID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>
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