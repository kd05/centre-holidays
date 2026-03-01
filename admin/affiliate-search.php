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

<h3>Suppliers Search</h3>
<p>Type the name or part of the name to search</p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">

<input type="text" required value="" name="affiliatename" id="affiliatename" style="width:100%; max-width:300px" placeholder='ie. Western' />
<br /><br />
<input type="submit" value="Search" class="btn btn-primary" />

</form>

<?php if (!empty($_GET['affiliatename'])) { ?>
<hr />

<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

	
		$sql = "SELECT * FROM affiliates WHERE affiliatename LIKE '%".$_GET['affiliatename']."%' ORDER BY affiliatename ASC";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

		echo '<h3>Number of Affiliates: '.$row_cnt.'</h3><hr />' ;
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{


?>
            
<table style="margin-top:10px; background:#FFF; width:99%">
<tr>
<th>ID Number</th>
<th>Thumbnail</th>
<th>Affiliate</th>
<th>Preferred Affiliate</th>
<th>Edit</th>
<th>Activate</th>
<!--<th>Pin to Top</th>-->
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
   while($row = mysqli_fetch_assoc($result)) {

$affiliateactive=$row['affiliateactive'];


?>
<form action="trips-editdetails.php" method="post" enctype="multipart/form-data">
<?php
$affiliateactive=$row['affiliateactive'];

if ($affiliateactive==0)
$background='#666';

if ($affiliateactive==1)
$background='#fff';

?>
<tr style="background:<?php echo $background ?>">
<td>
<?php echo $row['afid']; ?>
</td>
<td>
<?php
if (!empty($row['affiliatesqimage']))
{
?>
<img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['affiliatesqimage']; ?>" style="max-width:80px; height:80px; max-height:80px; margin:5px" />
<?php
	}
?>
</td>
<td>
<?php echo $row['affiliatename']; ?>
</td>
<td>
<?php
if ($row['preferred']==1)
echo $preferred='Yes';
else
echo $preferred='No';
?>
</td>

<td>
<a href="suppliers-edit.php?affiliatetime=<?php echo $row['affiliatetime'] ?>" class="btn btn-primary" title="Click her to Edit">Edit</a>

</td>

<td>
<?php

if ($affiliateactive==1)
{
?>
<a href="supplier/deactive-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=0" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($affiliateactive==0)
{
?>
<a href="supplier/active-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=0" class="btn btn-success" title="Click her to Deactivate">Activate</a>
<?php
}
?>
</td>


<td><a href="supplier/delete-affiliate.php?afid=<?php echo $row['afid']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>
</form>
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