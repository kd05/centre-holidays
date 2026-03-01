<?php ob_start(); ?>
<?php
$PUniqID=trim($_GET['PUniqID']);
//----------------------------Connect to database-------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
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
table th {text-align:left !important; padding-left:20px; max-width:100px}
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

<h3>Edit/Delete Unpaid Partner</h3>
<div>
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM ch_partners WHERE PUniqID='".$PUniqID."'";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
            
<table style="margin-top:10px">
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>
<form action="partners/update-unpaid-partners.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr" <?php echo $mybakg ?> >
<input type="hidden" value="<?php echo $row['PUniqID']; ?>" name="PUniqID" id="PUniqID" />
<th>Partner ID</th><td><?php echo $row['PID']; ?><input type="hidden" id="PID" name="PID" value="<?php echo $row['PID']; ?>" placeholder="#"/></td>
</tr>

<tr>
<th>Title</th>
<td>
<select id="PTitle" name="PTitle"  class="form-control" placeholder="Title">
<?php
if (!empty($row['PTitle']))
{
?>
<option value="<?php echo $row['PTitle']; ?>"><?php echo $row['PTitle']; ?></option>
<?php
}
?>
<option value="">Select a Title</option>
<option value="Mr">Mr</option>
<option value="Miss">Miss</option>
<option value="Mrs">Mrs</option>
<option value="Ms"><Ms/option>
</select>
</td>
</tr>

<tr>
<th>First Name</th>
<td><input type="text" id="PFirstName" name="PFirstName" value="<?php echo $row['PFirstName']; ?>" class="form-control" placeholder="First Name" /></td>
</tr>

<tr>
<th>Last Name</th>
<td><input type="text" id="PLastName" name="PLastName" value="<?php echo $row['PLastName']; ?>" class="form-control" placeholder="Last Name" /></td>
</tr>

<tr>
<th>Home Phone</th>
<td><input type="text" id="PHomePhone" name="PHomePhone" value="<?php echo $row['PHomePhone']; ?>" class="form-control" placeholder="Home Phone Number" /></td>
</tr>

<tr>
<th>Business Phone</th>
<td><input type="text" id="PBusinessPhone" name="PBusinessPhone" value="<?php echo $row['PBusinessPhone']; ?>" class="form-control" placeholder="Business Phone Number" /></td>
</tr>

<tr>
<th>Personal Email</th>
<td><input type="text" id="PPersonalEmail" name="PPersonalEmail" value="<?php echo $row['PPersonalEmail']; ?>" class="form-control" placeholder="Personal Email" /></td>
</tr>

<tr>
<th>Business Email</th>
<td><input type="text" id="PBusinessEmail" name="PBusinessEmail" value="<?php echo $row['PBusinessEmail']; ?>" class="form-control" placeholder="Business Email" /></td>
</tr>

<tr>
<th>TICO Licence Number</th>
<td><input type="text" id="PTICOLicenceNumber" name="PTICOLicenceNumber" value="<?php echo $row['PTICOLicenceNumber']; ?>" class="form-control" placeholder="TICO Licence Number" /></td>
</tr>


<tr>
<th>Assigned Agent</th>

<td>
<select id="CHAgent" name="CHAgent" class="form-control">
<?php
if (!empty($row['AgentID']))
{
?>
<option value="<?php echo $row['AgentID'].'-'.$row['FirstName'].'-'.$row['LastName']; ?>"><?php echo 'Agent ID # '.$row['AgentID'].', '.$row['FirstName'].' '.$row['LastName']; ?></option>
<?php
}
?>
<option value="">Select an Agent</option>
<?php
	$sql212 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
	$result212 = mysqli_query($conn, $sql212);	
	if (mysqli_num_rows($result212) > 0) {
		// output data of each row
		while($row212 = mysqli_fetch_assoc($result212)) {
	
	?>
    <option value="<?php echo $row212['AgentID'].'-'.$row212['FirstName'].'-'.$row212['LastName']; ?>"><?php echo 'Agent ID # '.$row212['AgentID'].', '.$row212['FirstName'].' '.$row212['LastName'];  ?></option>
    <?php
			
		}
	}
?>	
</select>		
</td>
</tr>




<tr>
<th>Submit</th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%" /></td>
</tr>

<tr>
<th>Delete</th>
<td><a href="partners/delete-unpaid-partner.php?PID=<?php echo $row['PID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()" style="width:100%">Delete</a></td>
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

</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>