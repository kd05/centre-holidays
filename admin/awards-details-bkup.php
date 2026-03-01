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

<h3>Awards</h3>
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

		$sql = "SELECT * FROM ch_awards WHERE AwardsID=".$_GET['AwardsID']."";

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
<form action="awards/update-awards.php" method="post" enctype="multipart/form-data">
<tr>
<input type="hidden" id="AwardsID" name="AwardsID" value="<?php echo $row['AwardsID']; ?>" /> 
</tr>



<!--AGENT ID------------------------------------------------>

<tr>
<th>Agent ID</th>


<td>

<div class="dropdown">
<button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Agents<span class="caret"></span></button>

<ul class="dropdown-menu" style="width:100%;">
<?php

$AgentID=$row['AgentID'];

$sql2213 = "SELECT * FROM ch_agents_1 ORDER BY AgentID ASC";	  
$result2213 = mysqli_query($conn, $sql2213);	
if (mysqli_num_rows($result2213) > 0) {
// output data of each row
while($row2213 = mysqli_fetch_assoc($result2213)) {
	
$strlen1=strlen(trim($row['AgentID']));
$strlen2=strlen(trim($row2213['AgentID']));

if (strpos(trim($row['AgentID']), trim($row2213['AgentID'])) !== false && ($strlen1==$strlen2)) {
$AgentIDcheck='checked';
}
else
$AgentIDcheck='';

?>
<li style="background:#eee; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="AgentID" id="AgentID" value="<?php echo $row2213['AgentID'] ?>" 
<?php echo $AgentIDcheck ?> style="width:50px !important">     
<?php echo $row2213['AgentID'].' - '.$row2213['FirstName'].' '.$row2213['LastName'].'-'.$row2213['BusinessName']; ?>
</li>

<?php

} 
}
?>

</ul>
</div>

</td>


</tr>



<!--PARTNER 1----------------------------------------------->
<tr>
<th>Partner 1 ID</th>


<td>

<div class="dropdown">
<button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Partner 1<span class="caret"></span></button>

<ul class="dropdown-menu" style="width:100%;">

<li style="background:#eee; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="partner1" id="partner1" style="width:50px !important" value=""> <strong>Remove Partner 1</strong>
</li>


<?php
$sql22135 = "SELECT * FROM ch_agents_1 WHERE AgentID !='".$AgentID."' ORDER BY AgentID ASC";	  
$result22135 = mysqli_query($conn, $sql22135);	
if (mysqli_num_rows($result22135) > 0) {
// output data of each row
while($row22135 = mysqli_fetch_assoc($result22135)) {
	
$strlen15=strlen(trim($row['partner1']));
$strlen25=strlen(trim($row22135['AgentID']));

if (strpos(trim($row['partner1']), trim($row22135['AgentID'])) !== false && ($strlen15==$strlen25)) {
$AgentIDcheck5='checked';
}
else
$AgentIDcheck5='';

?>
<li style="background:#eee; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="partner1" id="partner1" value="<?php echo $row22135['AgentID'] ?>" 
<?php echo $AgentIDcheck5 ?> style="width:50px !important">     
<?php echo $row22135['AgentID'].' - '.$row22135['FirstName'].' '.$row22135['LastName'].'-'.$row22135['BusinessName']; ?>
</li>

<?php

} 
}
?>

</ul>
</div>

</td>


</tr>


<!--Partner 2--------------------------------->

<tr>
<th>Partner 2 ID</th>


<td>

<div class="dropdown">
<button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Partner 2<span class="caret"></span></button>

<ul class="dropdown-menu" style="width:100%;">

<li style="background:#eee; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="partner2" id="partner2" style="width:50px !important" value=""> <strong>Remove Partner 2</strong>
</li>


<?php
$sql221356 = "SELECT * FROM ch_agents_1 WHERE AgentID !='".$AgentID."' ORDER BY AgentID ASC";  
$result221356 = mysqli_query($conn, $sql221356);	
if (mysqli_num_rows($result221356) > 0) {
// output data of each row
while($row221356 = mysqli_fetch_assoc($result221356)) {
	
$strlen15=strlen(trim($row['partner2']));
$strlen25=strlen(trim($row221356['AgentID']));

if (strpos(trim($row['partner2']), trim($row221356['AgentID'])) !== false && ($strlen156==$strlen256)) {
$AgentIDcheck56='checked';
}
else
$AgentIDcheck56='';

?>
<li style="background:#eee; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="partner2" id="partner2" value="<?php echo $row221356['AgentID'] ?>" 
<?php echo $AgentIDcheck56 ?> style="width:50px !important">     
<?php echo $row221356['AgentID'].' - '.$row221356['FirstName'].' '.$row221356['LastName'].'-'.$row221356['BusinessName']; ?>
</li>

<?php

} 
}
?>

</ul>
</div>

</td>
</tr>


<tr>
<th>Select Website</th>
<td style="text-align:left">
<?php
$AwardsWebsite = $row['AwardsWebsite'];

switch ($AwardsWebsite) {
  case 1:
    $Awardschecked1='checked';
    break;
  case 2:
    $Awardschecked2='checked';
    break;
  case 3:
    $Awardschecked3='checked';
    break;
  default:
    $Awardschecked1='checked';
}

?>
<ul style="list-style:none; text-align:left; padding:0 !important">
<li><input type="radio" id="Option1" <?php echo $Awardschecked1 ?> name="AwardsWebsite" value="1" style="width:20px !important; vertical-align:-2px"> Show On CH And Agent Website
</li><li><input type="radio" id="Option2" <?php echo $Awardschecked2 ?> name="AwardsWebsite" value="2" style="width:20px !important; vertical-align:-2px"> Show On Agent Website  
</li><li><input type="radio" id="Option3" <?php echo $Awardschecked3 ?> name="AwardsWebsite" value="3" style="width:20px !important; vertical-align:-2px"> Show On CH Website
</li>
</ul>
</td>
</tr>


<tr>
<th>Awards Title</th>
<td><input id="AwardsTitle" name="AwardsTitle" value="<?php echo $row['AwardsTitle']; ?>"/></td>
</tr>

<tr>
<th>Awards Year</th>
<td><input id="AwardsYear" name="AwardsYear" value="<?php echo $row['AwardsYear']; ?>"/></td>
</tr>


<tr>
<th>Recognized By</th>
<td><input type="text" id="RecognizedBy" name="RecognizedBy" value="<?php echo $row['RecognizedBy']; ?>"/></td>
</tr><tr>
<th>Awards Description</th>
<td>
<textarea name="AwardsDescription" id="AwardsDescription" class='scrollable'>
<?php echo $row['AwardsDescription']; ?>
</textarea>
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
</tr>


<tr>
<th></th>
<td><input type="submit" value="update" class="btn btn-primary" style="width:100%"/></td>
</tr>

<tr>
<th></th>
<td><a href="awards/delete-awards.php?AwardsID=<?php echo $row['AwardsID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>
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