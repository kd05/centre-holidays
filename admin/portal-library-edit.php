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
    <!--Editting a library-->
    <!--=======================-->
    <?php
 	$sql = "SELECT * FROM library WHERE libid='".$_GET['libid']."' LIMIT 1";	  
	$result = mysqli_query($conn, $sql);	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
				
		$author=$row['author'];
		$title=$row['title'];
		$description=$row[''];
		$description=$row['description'];
		$category=$row['category'];		
		$subcategory=$row['subcategory'];
		$coverimage=$row['coverimage'];
		$horimage=$row['horimage'];
		$squareimage=$row['squareimage'];
		$internalurl=$row['internalurl'];
		$externalurl=$row['externalurl'];
		$documenturl=$row['documenturl'];
		$videourl=$row['videourl'];
		$audiourl=$row['audiourl'];
		$tags=$row['tags'];
		$lexpiry=$row['lexpiry'];
		}
	}
	?>
	
	<div style="width:100%; background:none !important;">
	
	<h3>Edit a Library</h3>
	<table style="margin-top:10px">
	<form action="library/update-library.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="libid" name="libid" value="<?php echo $_GET['libid']; ?>" />
	<tr>
    <th>Author</th>
	<td><input type="text" id="author" name="author" value="<?php echo $author; ?>" placeholder="Author" class="form-control" /></td>
	</tr>	
    
    <tr>
    <th>Title</th>
	<td><input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="Title" class="form-control" /></td>
	</tr>
    
	<tr>
    <th>Description</th>
    <td><textarea name="description" id="description" class='scrollable form-control' placeholder="Description"><?php echo $description; ?></textarea></td>
	</tr> 
    
    <tr>
    <th>Cover Image</th>
    <td><input type="text" id="coverimage" name="coverimage" value="<?php echo $coverimage; ?>" placeholder="Cover Image" class="form-control" /></td>
    </tr>
	<?php if (!empty($coverimage)) { ?>
    <tr>
    <th></th><td style="text-align:center"><img src="https://www.centreholidaysagents.com/archives/img/<?php echo $coverimage ?>" style="width:auto; height:100px" /></td>
    </tr>
	<?php } ?>	
    <tr>
 	<th>Horizontal Image</th>  
    <td><input type="text" id="horimage" name="horimage" value="<?php echo $horimage; ?>" placeholder="Horizontal Image" class="form-control" /></td>
    </tr>
	<?php if (!empty($horimage)) { ?>
    <tr>
    <th></th><td style="text-align:center"><img src="https://www.centreholidaysagents.com/archives/img/<?php echo $horimage ?>" style="width:auto; height:100px" /></td>
    </tr>
	<?php } ?>	
    <tr>
    <th>Square Image</th>
	<td><input type="text" id="squareimage" name="squareimage" value="<?php echo $squareimage; ?>" placeholder="Square Image" class="form-control" /></td>
    </tr>
	<?php if (!empty($squareimage)) { ?>
    <tr>
    <th></th><td style="text-align:center"><img src="https://www.centreholidaysagents.com/archives/img/<?php echo $squareimage ?>" style="width:auto; height:100px" /></td>
    </tr>
	<?php } ?>	
    <tr>
    <th>Internal Link</th>
	<td><input type="text" id="internalurl" name="internalurl" value="<?php echo $internalurl; ?>" placeholder="Internal Link" class="form-control" /></td>
	</tr>
    <tr>
    <th>External Link</th>
	<td><input type="text" id="externalurl" name="externalurl" value="<?php echo $externalurl; ?>" placeholder="External Link" class="form-control" /></td>
	</tr>

    <tr>
    <th>Document Link</th>
	<td><input type="text" id="documenturl" name="documenturl" value="<?php echo $documenturl; ?>" placeholder="Document Link" class="form-control" /></td>
	</tr>
    
     <tr>
    <th>Video Link</th>
	<td><input type="text" id="videourl" name="videourl" value="<?php echo $videourl; ?>" placeholder="Video Link" class="form-control" /></td>
	</tr>
    
    <tr>
    <th>Audio Link</th>
	<td><input type="text" id="audiourl" name="audiourl" value="<?php echo $audiourl; ?>" placeholder="Audio Link" class="form-control" /></td>
	</tr>           
    
    <tr>       
    <th>Tags</th>
    <td>
    <textarea id="tags" name="tags" placeholder="Tags" class="form-control"> <?php echo $tags; ?></textarea>
    </td>
	</tr>      
    <tr>
    <th>Category</th>
    <td>
    <select id="category" name="category" >
    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
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
    <h6><strong>Currently this is listed under the following sub-categories</strong></h6> 
    <textarea name="subcategory2" id="subcategory2" style="width:100%; height:auto; background:#E5E5E5"><?php echo $subcategory; ?></textarea>
    <input type="checkbox" value="selectcub" name="selectcub" id="selectcub" checked /> Reserve value?
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
    <td><input type="text" name="schedule" value="<?php echo date('m/d/Y', $lexpiry); ?>" class="form-control datepicker-autoclose" id="schedule" placeholder="mm/dd/yyyy"/></td>  
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