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

<h3>Resource Centre Holidays List</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

	
		$sql = "SELECT * FROM resource ORDER BY inchTime DESC";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

		echo '<h3>Number of results: '.$row_cnt.'</h3><hr />' ;
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{


?>
            
<table style="margin-top:10px; background:#FFF; width:99%">
<tr>
<th>ID</th>
<th>Title</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
	   
$inchActive=$row['inchActive'];
if ($inchActive==0)
$mybakg='style="background:#666 !important"';
elseif ($inchActive==1)
$mybakg='style="background:#fff !important"';	   


?>
<form action="resource-edit.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="inchTime" name="inchTime" value="<?php echo $row['inchTime'] ?>" />

<tr <?php echo $mybakg ?>>

    <td>
    <?php echo $row['inchID'] ?>
    </td>

    <td style="text-align:left !important">
    <?php echo $row['inchTitle']; ?>
    </td>


    <td><input type="submit" value="Edit" class="btn btn-primary" style="width:100%"/></td>

    <?php
    if ($row['inchActive']==0)
    {
    ?>
    <td><a href="resource/activate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-success" style="width:100%" title="Activate" onclick="return confirm_delete()">Activate</a></td>
    <?php
    }
    elseif ($row['inchActive']==1)
    {
    ?>
    <td><a href="resource/deactivate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-warning" style="width:100%" title="Deactivate" onclick="return confirm_delete()">deactivate</a></td>
    <?php
    }
    ?>

    <td><a href="resource/delete-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>

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