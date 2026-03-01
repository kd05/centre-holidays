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

<h3>Agents Certificates</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<h4>Search for Certificate based on Agent's ID</h4> 

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

<select id="AgentID" name="AgentID" >
<option>Select an Agent</option>
<?php	
$sql22 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID ORDER BY ch_agents_1.AgentID ASC";	  
  
$result22 = mysqli_query($conn, $sql22);	
while($row22 = mysqli_fetch_assoc($result22)) {


if (empty($row22['CloseDate']))
		{
			
if ($row22['active']==0)
$backgound='#666';

if ($row22['active']==1)
$backgound='#fff';

{
?>
<option style="background:<?php echo $backgound ?> !important" value="<?php echo $row22['AgentID']?>"><?php echo $row22['AgentID'].'-'.$row22['FirstName'].' '.$row22['LastName'].$status ?></option>
<?php
	}

		}
}
?>

</select>

<br /><br />

<input type="submit" value="Search" class="btn btn-primary" />

</form>

<?php
if (isset($_POST['AgentID']))
{
//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM ch_agents_certs INNER JOIN ch_certifications 
		on ch_certifications.Title = ch_agents_certs.Certification 
		INNER JOIN ch_agents on ch_agents.AgentID = ch_agents_certs.AgentID WHERE ch_agents.AgentID='".$_POST['AgentID']."' AND (ch_agents_certs.active=1 || ch_agents_certs.active='')
		ORDER BY ch_agents_certs.AgentID ASC, ch_certifications.Title ASC LIMIT $offset, 300";

		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_agents_certs INNER JOIN ch_certifications 
		on ch_certifications.Title = ch_agents_certs.Certification 
		INNER JOIN ch_agents on ch_agents.AgentID = ch_agents_certs.AgentID  WHERE ch_agents.AgentID='".$_POST['AgentID']."' AND (ch_agents_certs.active=1 || ch_agents_certs.active='')
		ORDER BY ch_agents_certs.AgentID ASC, ch_certifications.Title ASC";
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
            $y=$y+300;
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
<th>Certification</th>
<th>ThumbImageURL</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>

<tr class="selectedtr">

<td><?php echo $row['AgentID']; ?></td>
<td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td><?php echo $row['Certification']; ?></td>
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

<td><a href="certificates/delete-agents_certs.php?ACID=<?php echo $row['ACID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php

		}
?>

</table>
</div>

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