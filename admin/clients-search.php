<?php ob_start(); ?>
<?php
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
    <h3>Search for a Client</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
    <input type="text" value="<?php echo $_GET['look'] ?>" id="look" name="look" placeholder="Search by inquiry number, or name, or email, or trip code" class="form-control" />
	<br />
    <input type="submit" class="btn-primary btn-lg btn" value="Search" />
	</form>
    <br />
    </div>
    
    
    <div class="col-md-12 col-xs-12 col-sm-12">
                    
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:20px">
<?php

		$look=trim($_GET['look']);	
		$look=sanitize_sql_string($look);
		
		$sql = "SELECT * FROM agents WHERE agentid LIKE '%$look%' || agency LIKE '%$look%' || fname LIKE '%$look%' || email LIKE '%$look%' || phone LIKE '%$look%' ORDER BY fname ASC, client DESC LIMIT 10";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);	
			
	if ($row_cnt > 0 && !empty($look))// display results in case the feedback table is not empty
	{
		?>
        <h3>Agents</h3>
        <?php

?>
<table style="margin-top:10px">
<tr>
<th>ID</th>
<th>Client Type</th>
<th>Agency</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Subscribed (1=Yes/0=No)</th>
<th>Status</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>
<form action="update-agents.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr">
<td><?php echo $row['agentid']; ?><input type="hidden" id="agentid" name="agentid" value="<?php echo $row['agentid']; ?>"/></td>
<td><input type="text" id="client" name="client" value="<?php echo $row['client']; ?>" class="form-control" /></td>
<td><input type="text" id="agency" name="agency" value="<?php echo $row['agency']; ?>" class="form-control"/></td>
<td><input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"/></td>
<td><input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"/></td>

<td><input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" /></td>
<td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"/></td>

<td><input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" class="form-control" /></td>
<td><input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" class="form-control"/></td>
<td><input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" class="form-control"/></td>

<td><input type="text" id="subscription" name="subscription" value="<?php echo $row['subscription']; ?>" class="form-control"/></td>

<?php
$active=$row['active'];
if ($active==1)
{
?>
<td><a href="deactivate-client.php?agentid=<?php echo $row['agentid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="activate-client.php?agentid=<?php echo $row['agentid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

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


<div class="col-md-12 col-xs-12 col-sm-12">
                    
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

		$look=trim($_GET['look']);	
		$look=sanitize_sql_string($look);
		
		$sql = "SELECT * FROM consumers WHERE consumerid LIKE '%$look%' || fname LIKE '%$look%' || email LIKE '%$look%' || phone LIKE '%$look%' ORDER BY fname ASC, client DESC LIMIT 10";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);	
			
	if ($row_cnt > 0 && !empty($look))// display results in case the feedback table is not empty
	{
		?>
        <h3>Consumers</h3>
        <?php

?>
<table style="margin-top:10px">
<tr>
<th>ID</th>
<th>Client Type</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Subscribed (1=Yes/0=No)</th>
<th>Status</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>
<form action="update-consumers.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr">
<td><?php echo $row['consumerid']; ?><input type="hidden" id="consumerid" name="consumerid" value="<?php echo $row['consumerid']; ?>"/></td>
<td><input type="text" id="client" name="client" value="<?php echo $row['client']; ?>" class="form-control" /></td>
<td><input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"/></td>
<td><input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"/></td>

<td><input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" /></td>
<td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"/></td>

<td><input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" class="form-control" /></td>
<td><input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" class="form-control"/></td>
<td><input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" class="form-control"/></td>

<td><input type="text" id="subscription" name="subscription" value="<?php echo $row['subscription']; ?>" class="form-control"/></td>

<?php
$active=$row['active'];
if ($active==1)
{
?>
<td><a href="deactivate-client.php?consumerid=<?php echo $row['consumerid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="activate-client.php?consumerid=<?php echo $row['consumerid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

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