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
	
	<style>
	table {width:100% !important}
	table th {text-align:left !important; padding-left:20px; max-width:100px}
	table tr td {padding:2px !important; border:none !important; background:#FFF !important}
	</style>
	
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
  <div id="page-wrapper" style="overflow-y:scroll;overflow-x:hidden; max-height: 100vh;">
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


	<div style="width:100%; background:none !important;">
	
	<h3>Add Epik Escapes Collections</h3>
	<table style="margin-top:10px">
	<form action="collections/add-collections.php" method="post" enctype="multipart/form-data">
	<tr class="selectedtr">
    <th>Title</th>
	<td><input type="text" id="colltitle" name="colltitle" value="" placeholder="Title" class="form-control" /></td>
	</tr><tr>
    <th>Description</th>
    <td><textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"></textarea></td>
	</tr><tr>
 	<th>Image</th>  
    <td><input type="text" id="collimage" name="collimage" value="" placeholder="Image with extension" class="form-control" /></td>
	</tr><tr>
	<th>Submit</th>     
    <td><input type="submit" value="Submit" class="btn btn-primary" style="width:100%"/></td>
	</tr>
	
	</form>
	</table>
	
	</div>

	<?php
	
	//===============================list of home collections==================================
	
	$sql = "SELECT * FROM collections WHERE collhome=1 ORDER BY collid DESC LIMIT 8";
	
	//==========custom paginatnion===================
	
	$ttcount = mysqli_num_rows($result);
	$result = mysqli_query($conn, $sql);
	$row_cnt1 = mysqli_num_rows($result);
	
	?>
	 
	
	<div class="row">
	
	<?php
	
	if ($row_cnt1 > 0){// display results in case the feedback table is not empty
		?>
	
	<hr />
	
	<h3> Active Epik Escapes Collections</h3>
	<div style="width:100%; background:none !important; margin-bottom:100px">
	<?php
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
	?>
	
	<form action="collections/update-collections.php" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $row['collid']; ?>" name="collid" id="collid" />
	<div class="col-sm-6 col-md-3 col-lg-3">
	<div class="white-box pro-box p-0">
	<div class="pro-list-img" style="background: url('<?php 'http://'.$_SERVER[HTTP_HOST] ?>/collections/img/<?php echo $row['collimage']; ?>') center center / cover no-repeat;"></div>
	<br />
	<input type="hidden" value="<?php echo $row['collimage']; ?>" name="collimage" id="collimage" />   
    <!--new image valuse if new image url is being added--> 
    <input type="text" id="ncollimage" name="ncollimage" value="" placeholder="New image with extension" class="form-control" />
    <div class="pro-content-3-col" style="min-height:180px">
	<div class="pro-list-details">
	
	<div class="panel-heading h4 text-center p-t-10 p-b-0"><input type="text" id="colltitle" name="colltitle" value="<?php echo $row['colltitle']; ?>" placeholder="Title" class="form-control" /></div>
	<div class="panel-body p-t-0">
	<p class="m-b-0 text-center">
	<textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"><?php echo $row['colldescription']; ?></textarea>
	</p>
	</div>                                     
	</div>
	</div>
	
	
	<div class="clearfix">
	
	<table style="margin-left:1px !important">
	<tr> 
	<td>
	<input type="submit" class="btn btn-primary" value="Update" />
	</td>                           
	<?php
	$active=$row['active'];
	if ($active==1)
	{
	?>
	<td>
	<a href='collections/deactivate-collections.php?collid=<?php echo $row['collid']; ?>' class='btn btn-warning' title='Click her to Deactivate'>Deactivate</a>
	</td>
	<?php
	}
	elseif ($active==0)
	{
	?>
	<td>
	<a href="collections/activate-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
	</td>
	<?php
	}
	?>
	<td>
	<a href="collections/delete-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Del</a>
	</td>                            
	</tr>
    <tr><td colspan="3"><a href="collections/homepage-remove-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-default" title="Remove" onclick="return confirm_delete()" style="width:100%; background:#900; color:#FFF">Remove from Home Page</a></td></tr>
    </table>                           
	
	
	</div>
	</div>
	
	</div>
	</form>
	<?php
	
		}
	}
	?>
	
	</div>
	
	</div>


	<?php
	
	//===============================list==================================
	
	if (isset($_GET['offset']))
	$offset=trim($_GET['offset']);
	else
	$offset=0;	
	
	$sql = "SELECT * FROM collections WHERE collhome !=1 ORDER BY collid DESC LIMIT $offset, 12";
	
	//==========custom paginatnion===================
	
	$ttcount = mysqli_num_rows($result);
	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
	
	$Tsql = "SELECT * FROM collections WHERE collhome !=1 ORDER BY collid DESC";
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
	$y=$y+12;
	$x++;
	} while ($x <= $pages);
	?>
	</ul> 
	
	<div class="row">
	
	<?php
	
	if ($row_cnt > 0){// display results in case the feedback table is not empty
	
	?>
	
	<hr />
	
	<h3>Collections below are Not Displayed in the Website Home Page</h3>
	<div style="width:100%; background:none !important; margin-bottom:100px">
	<?php
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
	?>
	
	<form action="collections/update-collections.php" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $row['collid']; ?>" name="collid" id="collid" />
	<div class="col-sm-6 col-md-3 col-lg-3">
	<div class="white-box pro-box p-0">
	<div class="pro-list-img" style="background: url('<?php 'http://'.$_SERVER[HTTP_HOST] ?>/collections/img/<?php echo $row['collimage']; ?>') center center / cover no-repeat;"></div>
	<br />
	<input type="hidden" value="<?php echo $row['collimage']; ?>" name="collimage" id="collimage" />   
    <!--new image valuse if new image url is being added--> 
    <input type="text" id="ncollimage" name="ncollimage" value="" placeholder="New image with extension" class="form-control" />
    <div class="pro-content-3-col" style="min-height:180px">
	<div class="pro-list-details">
	
	<div class="panel-heading h4 text-center p-t-10 p-b-0"><input type="text" id="colltitle" name="colltitle" value="<?php echo $row['colltitle']; ?>" placeholder="Title" class="form-control" /></div>
	<div class="panel-body p-t-0">
	<p class="m-b-0 text-center">
	<textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"><?php echo $row['colldescription']; ?></textarea>
	</p>
	</div>                                     
	</div>
	</div>
	
	
	<div class="clearfix">
	
	<table style="margin-left:1px !important">
	<tr> 
	<td>
	<input type="submit" class="btn btn-primary" value="Update" />
	</td>                           
	<?php
	$active=$row['active'];
	if ($active==1)
	{
	?>
	<td>
	<a href='collections/deactivate-collections.php?collid=<?php echo $row['collid']; ?>' class='btn btn-warning' title='Click her to Deactivate'>Deactivate</a>
	</td>
	<?php
	}
	elseif ($active==0)
	{
	?>
	<td>
	<a href="collections/activate-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
	</td>
	<?php
	}
	?>
	<td>
	<a href="collections/delete-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Del</a>
	</td>                            
	</tr>
    <?php
	if ($row_cnt1 < 8)// display results in case the feedback table is not empty
	{
	?>
	<tr><td colspan="3"><a href="collections/homepage-add-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-info" title="Delete" onclick="return confirm_delete()" style="width:100%">Display in Home Page</a></td></tr>
    <?php
	}
	?>
    </table>                           
	
	
	</div>
	</div>
	
	</div>
	</form>
	<?php
	
		}
	}
	?>
	
	</div>
	
	</div>
	
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