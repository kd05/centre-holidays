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
<tr>
<th></th>
<td>Current Agent ID: <?php echo $_GET['AgentID'] ?>, <?php echo $_GET['AgentName']; ?></td>
</tr>

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
$backgr='#F60';
}
else
{
$AgentIDcheck='';
$backgr='#eee';
}

?>
<li style="background:<?php echo $backgr ?>; margin-bottom:2px; padding:1px 0 1px 5px">   
<input type="radio" name="AgentID" id="AgentID" value="<?php echo $row2213['AgentID'] ?>" 
<?php echo $AgentIDcheck ?> style="width:50px !important">     
<?php echo $row2213['AgentID'].' - '.$row2213['FirstName'].' '.$row2213['LastName'].' <strong style="float:right; margin-right:20px">'.$row2213['AgentType'].'</strong>'; ?>
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
<th>Select Agent Website Type</th>
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
  case 4:
    $Awardschecked4='checked';
    break;
  case 5:
    $Awardschecked5='checked';
    break;
  case 6:
    $Awardschecked6='checked';
    break;
  case 7:
    $Awardschecked7='checked';
    break;				
  default:
    $Awardschecked5='checked';
}

?>
<ul style="list-style:none; text-align:left; padding:0 !important">
<!--<li><input type="radio" id="Option3" <?php //echo $Awardschecked3 ?> name="AwardsWebsite" value="3" style="width:20px !important; vertical-align:-2px"> Corporate Website.</li>-->
<li><input type="radio" id="Option1" <?php echo $Awardschecked1 ?> name="AwardsWebsite" value="1" style="width:20px !important; vertical-align:-2px"> Commission Agent and Corporate Website (awards will not appear on sub-agent websites).</li>
<?php //if (!empty($_GET['AgentID'])) { ?>
<li><input type="radio" id="Option2" <?php echo $Awardschecked2 ?> name="AwardsWebsite" value="2" style="width:20px !important; vertical-align:-2px"> Commission Agent Website (awards assigned to the commission agent will not appear on the corporate or all sub-agent websites).</li>
<li><input type="radio" id="Option4" <?php echo $Awardschecked4 ?> name="AwardsWebsite" value="4" style="width:20px !important; vertical-align:-2px"> Sub-Agent Website (awards assigned to sub-agent will not appear on the corporate or commission agent website).</li>
<?php //} ?>
<li><input type="radio" id="Option5" <?php echo $Awardschecked5 ?> name="AwardsWebsite" value="5" style="width:20px !important; vertical-align:-2px"> Commission Agent, Sub Agent (All) and Corporate website (awards assigned to the commission agent will appear on the corporate website and all sub-agent websites)</li>
<li><input type="radio" id="Option6" <?php echo $Awardschecked6 ?> name="AwardsWebsite" value="6" style="width:20px !important; vertical-align:-2px"> Sub-Agent (One), Commission Agent and Corporate Website (awards assigned to one sub-agent will not appear only on the other sub-agent websites)</li>
<li><input type="radio" id="Option7" <?php echo $Awardschecked7 ?> name="AwardsWebsite" value="7" style="width:20px !important; vertical-align:-2px"> Sub-Agent (One) and Corporate Website (awards assigned to one sub-agent will not appear on the commission agent and other sub-agent websites)</li>
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