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

<h3>Partners</h3>
<a href="export-employees.php" class="btn btn-primary"> <span>List of Partners (Excel)</span> </a>
<br /><br />
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<h4>Assign a Partner to an Agent</h4> 
<p>(First check if the selected Agent is already connected with the selected Partner)</p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<select id="AgentID" name="AgentID" >
<option>Select an Agent</option>
<?php
$sql44 = "SELECT * FROM ch_agents_1 ORDER BY AgentID ASC";	  
$result44 = mysqli_query($conn, $sql44);	
while($row44 = mysqli_fetch_assoc($result44)) {
?>
<option value="<?php echo $row44['AgentID']?>"><?php echo $row44['AgentID'].'-'.$row44['FirstName'].' '.$row44['LastName'] ?></option>
<?php
	}
?>

</select>

<select id="PartnerID" name="PartnerID" >
<option>Select a Partner</option>
<?php
$sql22 = "SELECT * FROM ch_agents_1 ORDER BY AgentID ASC";	  
$result22 = mysqli_query($conn, $sql22);	
while($row22 = mysqli_fetch_assoc($result22)) {
?>
<option value="<?php echo $row22['AgentID']?>"><?php echo $row22['AgentID'].'-'.$row22['FirstName'].' '.$row22['LastName'] ?></option>
<?php
	}
?>

</select>

<br /><br />

<input type="submit" value="Check" class="btn btn-primary" />

</form>

<?php

//====================display this warning if agent id and partner is is the same
if (isset($_POST['AgentID']) && isset($_POST['PartnerID']) && ($_POST['AgentID'] ==$_POST['PartnerID']))
echo "<br /><strong>You can NOT assign the same Agent to itself!</strong><br />";
elseif (isset($_POST['AgentID']) && isset($_POST['PartnerID']) && ($_POST['AgentID'] !=$_POST['PartnerID']))
{
	
$sql77 = "SELECT * FROM ch_partner_connections WHERE PartnerID='".$_POST['PartnerID']."' AND 
AgentID=".$_POST['AgentID']." LIMIT 1";

$result77 = mysqli_query($conn, $sql77);
$row_cnt77 = mysqli_num_rows($result77);	

if ($row_cnt77==0)
{
?>
<hr />

<strong>This Agent is not assigned to the selected Partner.</strong>
<br />
<form action="ch-agents/assign-agents-partners.php" method="post" enctype="multipart/form-data">
Agent ID #: <input type="text" value="<?php echo $_POST['AgentID'] ?>" id="AgentID" name="AgentID" readonly style="background:#E4E4E4; border:none" />
-
Partner ID #: <input type="text" value="<?php echo $_POST['PartnerID'] ?>" id="PartnerID" name="PartnerID" readonly  style="background:#E4E4E4; border:none" />
<br /><br />
<input type="submit" value="Assign a Partner" class="btn btn-success" />

</form>
<?php
}
else
echo "<br /><strong>Agent ID # ".$_POST['AgentID']." is already assigned to Partner ID # ".$_POST['PartnerID']."</strong>";
?>


<hr />

<?php

}

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM ch_partner_connections 
		INNER JOIN ch_agents_1 on ch_agents_1.AgentID = ch_partner_connections.AgentID WHERE ch_partner_connections.active=1 
		ORDER BY ch_agents_1.AgentID ASC, ch_partner_connections.PartnerID ASC LIMIT $offset, 200";

		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_partner_connections 
		INNER JOIN ch_agents_1 on ch_agents_1.AgentID = ch_partner_connections.AgentID WHERE ch_partner_connections.active=1
		ORDER BY ch_agents_1.AgentID ASC, ch_partner_connections.PartnerID ASC";
		$Tresult  = mysqli_query($conn, $Tsql);
		$Trow_cnt = mysqli_num_rows($Tresult);		
	
		if (isset($_GET['pages']))
		$pages=$_GET['pages'];
		else
		$pages=ceil($Trow_cnt/$row_cnt);
  
		$Net_cnt=$Trow_cnt-$offset;
	
	?>
	   <ul class="pagination">
        <?php 
        $x = 1; 
        $y = 0;
        do {
			?>
            <li style="list-style:none; float:left; margin-left:5px">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>&ord=<?php echo $_GET['ord'] ?>"><?php echo $x ?></a>
            </li>     
            
            <?php
            $y=$y+100;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
        
<table style="margin-top:10px">
<tr>
<th>Agent ID</th>
<th>Agent Name</th>
<th>Agent Type</th>
<th>Partner ID</th>
<th>Partner Name</th>
<th>Partner Type</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

//=======================Get the partner information from the ch_agents_1 DB tabale
$sql55 = "SELECT * FROM ch_agents_1 WHERE AgentID='".$row['PartnerID']."' LIMIT 1";	  
$result55 = mysqli_query($conn, $sql55);	
while($row55 = mysqli_fetch_assoc($result55)) {
	$PartnerFName=$row55['FirstName'];
	$PartnerLName=$row55['LastName'];
	$PartnerFullName=$PartnerFName.' '.$PartnerLName;	
	$PartnerType=$row55['AgentType'];	
}


?>

<tr class="selectedtr">

<td><?php echo $row['AgentID']; ?></td>

<td>
<a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-warning" title="<?php echo $row['FirstName'].' '.$row['LastName'] ?>" style="width:100%">
<?php echo $row['FirstName'].' '.$row['LastName']; ?>
</a>
</td>

<td><?php echo $row['AgentType']; ?></td>

<td><?php echo $row['PartnerID']; ?></td>

<td>
<a href="ch-agent-details.php?AgentID=<?php echo $row['PartnerID']; ?>" class="btn btn-info" title="<?php echo $PartnerFullName ?>" style="width:100%">
<?php echo $PartnerFullName; ?>
</a>
</td>

<td><?php echo $PartnerType; ?></td>

<td><a href="ch-agents/delete-agents-partners.php?ConID=<?php echo $row['ConID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
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