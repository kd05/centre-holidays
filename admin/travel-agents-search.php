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
    
 	<div class="col-md-12 col-xs-12 col-sm-12">
    <h3>Search for a Travel Agency</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
    <input type="text" value="<?php echo $_GET['codelook'] ?>" id="codelook" name="codelook" placeholder="Search by PIN number, Agency name, Telephone, Postal Code/Zip Code, Email, IATA/TIDS or CLIA number" class="form-control" />
	<br />
    <input type="submit" class="btn-primary btn-lg btn" value="Search" />
	</form>
    
    <br />
    </div>   

<div class="col-md-12 col-xs-12 col-sm-12">

<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM travel_agencies WHERE tabusinessname LIKE '%".$_GET['codelook']."%' 
		||  tauniquenumber LIKE '%".$_GET['codelook']."%'
		||  tapostal LIKE '%".$_GET['codelook']."%'
		||  taiatatids LIKE '%".$_GET['codelook']."%'
		||  taclia LIKE '%".$_GET['codelook']."%'
		||  tamanagerfn LIKE '%".$_GET['codelook']."%'
		||  tamanagerln LIKE '%".$_GET['codelook']."%'
		||  tamanagerphone LIKE '%".$_GET['codelook']."%'	
		||  tamanageremail LIKE '%".$_GET['codelook']."%'								 
		ORDER BY tabusinessname DESC LIMIT 20";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			

	if ($row_cnt > 0 && (!empty($_GET['codelook'])))// display results in case the feedback table is not empty
	{

?>
<table style="margin-top:10px" id="mytable">
<tr>
<th>ID</th>
<th>Legal Business Name</th>
<th>Address</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Postal/Zip</th>
<th>IATA/TIDS</th>
<th>CLIA</th>
<th>Manager First Name</th>
<th>Manager Last Name</th>
<th>Manager Phone</th>
<th>Manager Email</th>
<th>Approval Date</th>
<th>PIN Number</th>
<th>Update Info.</th>
<th>Status</th>
<th>Generate New PIN</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>
<form action="travel-agents/update-travel_agents.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr">
<td><?php echo $row['taid']; ?><input type="hidden" id="taid" name="taid" value="<?php echo $row['taid']; ?>"/></td>
<td><input type="text" id="tabusinessname" name="tabusinessname" value="<?php echo $row['tabusinessname']; ?>" class="form-control" /></td>
<td><input type="text" id="taaddress" name="taaddress" value="<?php echo $row['taaddress']; ?>" class="form-control" /></td>
<td><input type="text" id="tacountry" name="tacountry" value="<?php echo $row['tacountry']; ?>" class="form-control" /></td>
<td><input type="text" id="tastate" name="tastate" value="<?php echo $row['tastate']; ?>" class="form-control"/></td>
<td><input type="text" id="tacity" name="tacity" value="<?php echo $row['tacity']; ?>" class="form-control"/></td>
<td><input type="text" id="tapostal" name="tapostal" value="<?php echo $row['tapostal']; ?>" class="form-control"/></td>
<td><input type="text" id="taiatatids" name="taiatatids" value="<?php echo $row['taiatatids']; ?>" class="form-control"/></td>
<td><input type="text" id="taclia" name="taclia" value="<?php echo $row['taclia']; ?>" class="form-control"/></td>
<td><input type="text" id="tamanagerfn" name="tamanagerfn" value="<?php echo $row['tamanagerfn']; ?>" class="form-control"/></td>
<td><input type="text" id="tamanagerln" name="tamanagerln" value="<?php echo $row['tamanagerln']; ?>" class="form-control"/></td>
<td><input type="text" id="tamanagerphone" name="tamanagerphone" value="<?php echo $row['tamanagerphone']; ?>" class="form-control" /></td>
<td><input type="text" id="tamanageremail" name="tamanageremail" value="<?php echo $row['tamanageremail']; ?>" class="form-control"/></td>
<td style="background:#EBEBEB"><?php echo date('M/d/Y', $row['tadate']); ?></td>
<td style="background:#EBEBEB"><?php echo $row['tauniquenumber']; ?></td>

<td><input type="submit" value="Update" class="btn btn-primary"/></td>

<?php
if ($row['taactive']==1 && !empty($row['tauniquenumber']))
{
?>
<td><a href="#" class="btn btn-info btn-circle disable" title="Approved"><i class="fa fa-check"></i></a></td>
<?php
}
elseif ($row['taactive']==0 || empty($row['tauniquenumber']))
{
?>
<td><a href="travel-agents/activate-travel-agents.php?taid=<?php echo $row['taid']; ?>&tamanageremail=<?php echo $row['tamanageremail']; ?>&fulllname=<?php echo $row['tamanagerfn'].'&nbsp;'.$row['tamanagerln']; ?>" class="btn btn-success" title="Click here to Activate">Approve</a></td>
<?php
}
?>

<td><a href="travel-agents/pin-travel-agents.php?taid=<?php echo $row['taid']; ?>&tamanageremail=<?php echo $row['tamanageremail']; ?>&fulllname=<?php echo $row['tamanagerfn'].'&nbsp;'.$row['tamanagerln']; ?>" class="btn btn-warning" title="Generate New PIN" onclick="return confirm_delete()">Generate New PIN</a></td>

<td><a href="travel-agents/delete-travel-agents.php?taid=<?php echo $row['taid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>

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