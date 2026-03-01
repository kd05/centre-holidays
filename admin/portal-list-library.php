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

<h3>Filter Library by Category <strong><?php echo $_GET['cat']; ?></strong></h3>

<?php

	$sql = "SELECT * FROM ch_agents_collections_categories ORDER BY category ASC";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	
			$dbcategory=$row['category'];
			$sql1 = "SELECT * FROM library WHERE category='$dbcategory'";	  
			$result1 = mysqli_query($conn, $sql1);
			$row_cnt = mysqli_num_rows($result1);
	
	?>
	<a href="<?php echo $_SERVER['PHP_SELF']; ?>?cat=<?php echo $row['category']; ?>">
      <div class="white-box col-md-2" style="margin:10px; text-align:center" title="Number of <?php echo $row['category']; ?>">
          <h3 class="box-title"><?php echo $row['category']; ?></h3>
          <ul class="list-inline two-part">
          <li><i class="icon-folder-alt text-info" style="margin-left:10px"></i></li>
          <li class="text-right"><span class="counter"><?php echo $row_cnt ?></span></li>
          </ul>
      </div>
    </a>  
    <?php
			
		}
	}

?>

</div></div>

<div class="row">
<div class="col-md-12 col-xs-12 col-sm-12">
<hr />
<h3>Or Search Library by Keyword</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
<tr>
<td><input type="text" id="keyword" name="keyword" value="" class="form-control" placeholder="Key word ie. url" /></td>
</tr>
<tr>
<td><br /><input type="submit" value="Search" class="btn btn-primary btn-lg" /></td>
</tr>
</form>
</table>
</div></div>



<div class="row" style="margin-bottom:80px">
<div class="col-md-12 col-xs-12 col-sm-12">

<?php
if (isset($_GET['keyword']) || isset($_GET['cat']))
{
?>

<hr />
<table style="width:100%">
<?php

	$sql = "SELECT * FROM library ";
	
	if (isset($_GET['cat']))
	$sql .= " WHERE category='".$_GET['cat']."' ";	
	elseif (isset($_GET['keyword']))
	{
	$sql .= " WHERE author LIKE '%".$_GET['keyword']."%' ";
	$sql .= " OR title LIKE '%".$_GET['keyword']."%' ";	
	$sql .= " OR subcategory = '".$_GET['keyword']."' ";	
	$sql .= " OR internalurl LIKE '%".$_GET['keyword']."%' ";	
	$sql .= " OR externalurl LIKE '%".$_GET['keyword']."%' ";	
	$sql .= " OR documenturl LIKE '%".$_GET['keyword']."%' ";	
	$sql .= " OR videourl LIKE '%".$_GET['keyword']."%' ";
	$sql .= " OR audiourl LIKE '%".$_GET['keyword']."%' ";	
	$sql .= " OR tags LIKE '%".$_GET['keyword']."%' ";									
	}
	$sql .= " ORDER BY category ASC, title ASC";	
	 
	$result66 = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result66) > 0) {
		// output data of each row
		while($row66 = mysqli_fetch_assoc($result66)) {
	
	$active=$row66['active'];
	if ($active==0)
	$mybakg='style="background:#666 !important"';
	elseif ($active==1)
	$mybakg='style="background:#fff !important"';
				
	?>
	   
    
	<tr class="selectedtr" <?php echo $mybakg ?> style="width:100%">
    <td>
    <?php echo $row66['title']; ?>
    </td>
    <td>
    <?php echo $row66['category']; ?>
    </td>
    <td>
    <?php echo $row66['subcategory']; ?>
    </td>        
    <td>
    <a href="portal-library-edit.php?libid=<?php echo $row66['libid']; ?>" class="btn btn-primary">Edit</a>
    </td>
    
    <?php if ($row66['active']==1) { ?>
    <td>
    <a href="library/deactivate-library.php?libid=<?php echo $row66['libid']; ?>" onclick="return confirm_delete()" class="btn btn-warning">Deactivate</a>
    </td>
    <?php }else{ ?>
        <td>
    <a href="library/activate-library.php?libid=<?php echo $row66['libid']; ?>" onclick="return confirm_delete()" class="btn btn-info">Activate</a>
    </td>
    <?php
	}
	?>
           
    <td>
    <a href="library/delete-library.php?libid=<?php echo $row66['libid']; ?>" onclick="return confirm_delete()" class="btn btn-danger">Delete</a>
    </td></tr>   
	<?php
	
		} 
	}
	?>
</table>

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