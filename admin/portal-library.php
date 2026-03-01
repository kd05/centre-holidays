	<?php ob_start(); ?>
	<?php
	$currenttime=time();
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
	input, select {width:100%; border:none;}
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
  <div id="page-wrapper">
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

	<!--=======================-->
    <!--Adding a library-->
    <!--=======================-->
    
	<div style="width:100%; background:none !important;">
	
	<h3>Add to Library</h3>
	<table style="margin-top:10px">
	<form action="library/add-library.php" method="post" enctype="multipart/form-data">
	<tr>
    <th>Author</th>
	<td><input type="text" id="author" name="author" value="" placeholder="Author" class="form-control" /></td>
	</tr>	
    
    <tr>
    <th>Title</th>
	<td><input type="text" id="title" name="title" value="" placeholder="Title" class="form-control" /></td>
	</tr>
    
	<tr>
    <th>Description</th>
    <td><textarea name="description" id="description" class='scrollable form-control' placeholder="Description"></textarea></td>
	</tr> 
    
    <tr>
    <th>Cover Image</th>
    <td><input type="text" id="coverimage" name="coverimage" value="" placeholder="Cover Image" class="form-control" /></td>
	</tr><tr>
 	<th>Horizontal Image</th>  
    <td><input type="text" id="horimage" name="horimage" value="" placeholder="Horizontal Image" class="form-control" /></td>
	</tr>
    <tr>
    <th>Square Image</th>
	<td><input type="text" id="squareimage" name="squareimage" value="" placeholder="Square Image" class="form-control" /></td>
	</tr>
    <tr>
    <th>Internal Link</th>
	<td><input type="text" id="internalurl" name="internalurl" value="" placeholder="Internal Link" class="form-control" /></td>
	</tr>
    <tr>
    <th>External Link</th>
	<td><input type="text" id="externalurl" name="externalurl" value="" placeholder="External Link" class="form-control" /></td>
	</tr>

    <tr>
    <th>Document Link</th>
	<td><input type="text" id="documenturl" name="documenturl" value="" placeholder="Document Link" class="form-control" /></td>
	</tr>
    
     <tr>
    <th>Video Link</th>
	<td><input type="text" id="videourl" name="videourl" value="" placeholder="Video Link" class="form-control" /></td>
	</tr>
    
    <tr>
    <th>Audio Link</th>
	<td><input type="text" id="audiourl" name="audiourl" value="" placeholder="Audio Link" class="form-control" /></td>
	</tr>           
    
    <tr>       
    <th>Tags</th>
    <td><textarea id="tags" name="tags" placeholder="Tags" class="form-control"></textarea></td>
	</tr>      
    <tr>
    <th>Category</th>
    <td>
    <select id="category" name="category" >
    <option value="">Select a Category</option>
    <?php
    $sql22 = "SELECT * FROM ch_agents_collections_categories ORDER BY category ASC";	  
    $result22 = mysqli_query($conn, $sql22);	
    while($row22 = mysqli_fetch_assoc($result22)) {

    ?>
    <option value="<?php echo $row22['category']?>"><?php echo $row22['category'] ?></option>
    <?php
        }
    ?>
    
    </select>
    
    </td>
    </tr>
	
	<tr>
    <th>Sub Category <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p></th>
    <td>
    <br /><h6 style="text-decoration:underline"><strong>Select sub-categories</strong></h6> 
    <select id="subcategory" name="subcategory[]" multiple >
    <?php
    $sql223 = "SELECT * FROM ch_agents_collections_subcategories ORDER BY category ASC";	  
    $result223 = mysqli_query($conn, $sql223);	
    while($row223 = mysqli_fetch_assoc($result223)) {

    ?>
    <option value="<?php echo $row223['subcategory']?>"><?php echo $row223['category'].'-'.$row223['subcategory'] ?></option>
    <?php
        }
    ?>
    
    </select>
    
    </td>
    </tr>   
    
      
    <tr>
	<th>Expirty Date</th>
    <td><input type="text" name="schedule" value="" class="form-control datepicker-autoclose" id="schedule" placeholder="mm/dd/yyyy"/></td>  
    </tr>
    <tr>
	<th>Submit</th>     
    <td><input type="submit" value="Submit" class="btn btn-primary" style="width:100%"/></td>
	</tr>
	
	</form>
	</table>
	
	</div>
	
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

	
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
	<? ob_flush(); ?>