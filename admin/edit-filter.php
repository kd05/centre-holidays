<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


if (!empty($_GET['typesid']))
$typesid=$_GET['typesid'];

if (!empty($_GET['activitylevelid']))
$typesid=$_GET['activitylevelid'];

if (!empty($_GET['servicelevelid']))
$typesid=$_GET['servicelevelid'];

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

if (!empty($typesid))
{
	$sql2 = "UPDATE types SET types='".$types."' WHERE typesid='".$typesid."'";
	
	if (mysqli_query($conn, $sql2)) {
		echo "<h4>Success</h4>";
		header('Location: types.php?results=success');
	} else {
		echo "Error updating record: " . mysqli_error($conn);
		header('Location: types.php?results=error');
	}
}
?>




<h3>Update a Type</h3>
<hr />
<table style="width:100%;">
<?php

	$sql = "SELECT * FROM types WHERE typesid='".$typesid."'";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {		
	
	?>
    <tr>
    <td>Current type: <strong><?php echo $row['types']; ?></strong></td>   
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
    <td><input required type="text" value="" id="types" name="types" placeholder="New Type" class="form-control" /></td>     
    <td><input type="submit" value="Update" class="btn btn-primary" /></td> 
    <input type="hidden" value="<?php echo $row['typesid']; ?>" name="typesid" id="typesid" />
    </form>   
    </tr> 
    <?php
			
		}
	}

?>
</table>

</div></div><?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
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