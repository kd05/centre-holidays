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

<h3>List of all Inquiries</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM inquiries ORDER BY etime DESC LIMIT $offset, 10";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM inquiries ORDER BY etime DESC";
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
<th>Client Type</th>
<th>Agency</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Trip Code</th>
<th>Trip Customization</th>
<th>Departure Month</th>
<th>Departure Year</th>
<th>No. of Adults</th>
<th>No. of Children</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Additional Notes</th>
<th>Subscribed (1=Yes/0=No)</th>
<th>Inquiry Time </th>
<th>IP</th>
<th>Inquiry Number</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$client=$row['client'];
if ($client=='Travel Agent')
$mybakg='style="background:#FF9 !important"';
elseif ($client=='Consumer')
$mybakg='style="background:#fff !important"';

?>
<form action="../update-inquiries.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $row['enqid']; ?><input type="hidden" id="enqid" name="enqid" value="<?php echo $row['enqid']; ?>"/></td>
<td><input type="text" id="client" name="client" value="<?php echo $row['client']; ?>" class="form-control" /></td>
<td><input type="text" id="agency" name="agency" value="<?php echo $row['agency']; ?>" class="form-control"/></td>
<td><input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"/></td>
<td><input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"/></td>

<td><input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" /></td>
<td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"/></td>
<td><input type="text" id="tcode" name="tcode" value="<?php echo $row['tcode']; ?>" class="form-control"/></td>
<td><input type="text" id="tcustome" name="tcustome" value="<?php echo $row['tcustome']; ?>" class="form-control"/></td>

<td><input type="text" id="depmonth" name="depmonth" value="<?php echo $row['depmonth']; ?>" class="form-control" /></td>
<td><input type="text" id="depyear" name="depyear" value="<?php echo $row['depyear']; ?>" class="form-control"/></td>
<td><input type="text" id="adults" name="adults" value="<?php echo $row['adults']; ?>" class="form-control"/></td>
<td><input type="text" id="children" name="children" value="<?php echo $row['children']; ?>" class="form-control"/></td>

<td><input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" class="form-control" /></td>
<td><input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" class="form-control"/></td>
<td><input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" class="form-control"/></td>

<td><textarea name="notes" id="notes" class='scrollable form-control'><?php echo $row['notes']; ?></textarea></td>

<td><input type="text" id="subscription" name="subscription" value="<?php echo $row['subscription']; ?>" class="form-control"/></td>

<td><?php echo date('l jS \of F Y h:i:s A', $row['etime']) ;?></td>
<td><?php echo $row['ip']; ?></td>
<td><?php echo $row['enqnumber'];?></td>




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