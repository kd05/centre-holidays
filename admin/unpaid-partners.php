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

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	 
		$sql = "SELECT * FROM ch_partners ORDER BY AgentID ASC LIMIT $offset, 100";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_partners ORDER BY AgentID ASC";
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
<h3>Non-Paying Partners</h3>
<a href="export-partners.php" class="btn btn-primary"> <span>List of Non-Paying Partners (Excel)</span> </a>
<br /><br />
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<table style="background:#FFF">
<tr>
<th>PID</th>
<th>Title</th>
<th>First Name</th>
<th>Last Name</th>
<th>Business Phone</th>
<th>Business Email</th>
<th>TICO</th>
<th>Assigned Agent ID and Full Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
?>
<tr>
<td><?php echo $row['PID']; ?></td>
<td><?php echo $row['PTitle']; ?></td>
<td><?php echo $row['PFirstName']; ?></td>
<td><?php echo $row['PLastName']; ?></td>
<td><?php echo $row['PBusinessPhone']; ?></td>
<td><?php echo $row['PBusinessEmail']; ?></td>
<td><?php echo $row['PTICOLicenceNumber']; ?></td>
<td>
<a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID'] ?>" class="btn btn-info">
<?php echo 'Agent ID # '.$row['AgentID'].', '.$row['FirstName'].' '.$row['LastName']; ?>
</a>
</td>
<td><a href="unpaid-partners-editdetails.php?PUniqID=<?php echo $row['PUniqID']; ?>" class="btn btn-primary" title="Edit" style="width:100%">Edit</a></td>
<td><a href="partners/delete-unpaid-partner.php?PID=<?php echo $row['PID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()" style="width:100%">Delete</a></td>
</tr>
<?php
		}
	}
?>
</table>
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