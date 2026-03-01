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

<h3>Consumer only Inquiries</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM consumers ORDER BY fname ASC LIMIT $offset, 10";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM consumers ORDER BY fname ASC";
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
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>"><?php echo $x ?></a>
            </li>     
            
            <?php
            $y=$y+10;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
<table style="margin-top:10px" id="mytable">
<tr>
<th>ID</th>
<th>Inquiry Number</th>
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
<form action="clients/update-consumers.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr">
<td><?php echo $row['consumerid']; ?><input type="hidden" id="consumerid" name="consumerid" value="<?php echo $row['consumerid']; ?>"/></td>
<td><input type="text" id="enqnumber" name="enqnumber" value="<?php echo $row['enqnumber']; ?>" class="form-control" readonly /></td>
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
<td><a href="clients/deactivate-client.php?consumerid=<?php echo $row['consumerid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="clients/activate-client.php?consumerid=<?php echo $row['consumerid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

</tr>

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