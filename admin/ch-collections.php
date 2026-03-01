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
	.table-condensed {margin-left:0 !important}
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
    <!--Adding a collection-->
    <!--=======================-->
    
	<div style="width:100%; background:none !important;">
	
	<h3>Add a Centre Holidays Collections</h3>
    <p>If you leave the Agent ID field empty, it will by default select Centre Holidays.</p>
	<table style="margin-top:10px">
	<form action="ch_collections/add-collections.php" method="post" enctype="multipart/form-data">
	<tr>
    <th>Title</th>
	<td><input type="text" id="colltitle" name="colltitle" value="" placeholder="Title" class="form-control" /></td>
	</tr><tr>
    <th>Description</th>
    <td><textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"></textarea></td>
	</tr><tr>
 	<th>Image</th>  
    <td><input type="text" id="collimage" name="collimage" value="" placeholder="Image with extension" class="form-control" /></td>
	</tr>
    <tr>
    <th>External Link</th>
	<td><input type="text" id="colExternalURL" name="colExternalURL" value="" placeholder="External Link" class="form-control" /></td>
	</tr>
    <tr>
    <th>Internal Link</th>
	<td><input type="text" id="colInternalURL" name="colInternalURL" value="" placeholder="Internal Link" class="form-control" /></td>
	</tr>    
    <tr>   
    <th>Tags (In case no external or internal links these tags to filter the Trips ie. Discover Tours, African Safari)</th>
    <td><input type="text" id="colTags" name="colTags" value="" placeholder="Tags" class="form-control" /></td>
	</tr>
    <tr>   
    <th>Page Tags (ie. Vacations, Tours) </th>
    <td><input type="text" id="colPageTags" name="colPageTags" value="" placeholder="Page Tags" class="form-control" /></td>
	</tr> 
    <tr>
    <th>Agent ID</th>
    <td>
    <select id="AgentID" name="AgentID" >
    <option value="">Select an Agent</option>
    <?php
    //$sql22 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	
	$sql22 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID ORDER BY ch_agents_1.AgentID ASC";	  
  
    $result22 = mysqli_query($conn, $sql22);	
    while($row22 = mysqli_fetch_assoc($result22)) {
        
    $DisplayName22=trim($row22['DisplayName']);
    $BusinessName22=trim($row22['BusinessName']);
    $FullName22=trim($row22['FirstName'].' '.$row22['LastName']);
    
    if (!empty($DisplayName22))// ================= first option
    $AgentName=$DisplayName22;
    elseif (!empty($BusinessName22))//=============== next option
    $AgentName=$BusinessName22;
    else
    $AgentName=$BusinessName22;
    
    
    ?>
    <option value="<?php echo $row22['AgentID']?>"><?php echo $row22['AgentID'].' - '.$FullName22.' - '.$AgentName; ?></option>
    <?php
        }
    ?>
    
    </select>
    
    </td>
    </tr>
    

    <tr>
    <th>Expiry Date (MM/DD/YYYY)</th>
    <td>
    <div class="input-group">
    <input type="text" name="colexpirydate" value="" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
    <span class="input-group-addon"><i class="icon-calender"></i></span></div>
    </td>
    </tr>    
    
    
    
    
    <tr>
	<th>Submit</th>     
    <td><input type="submit" value="Submit" class="btn btn-primary" style="width:100%"/></td>
	</tr>
	
	</form>
	</table>
	
	</div>

	<!--=======================-->
    <!--for displayed list-->
    <!--=======================-->

	<?php
	
	
	//===============================list==================================
	
	if (isset($_GET['offset']))
	$offset=trim($_GET['offset']);
	else
	$offset=0;	
	
	$sql = "SELECT * FROM ch_collections WHERE collhome=1 ORDER BY coltimestamp DESC LIMIT $offset, 8";
	
	//==========custom paginatnion===================
	
	$ttcount = mysqli_num_rows($result);
	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
	
	$Tsql = "SELECT * FROM ch_collections WHERE collhome=1 ORDER BY coltimestamp DESC";
	$Tresult  = mysqli_query($conn, $Tsql);
	$Trow_cnt = mysqli_num_rows($Tresult);		
	
	if (isset($_GET['pages']))
	$pages=$_GET['pages'];
	else
	$pages=ceil($Trow_cnt/$row_cnt);
	
	$Net_cnt=$Trow_cnt-$offset;
	
	?>
	
	<div class="row">
	
	<?php
	
	if ($row_cnt > 0){// display results in case the feedback table is not empty
		?>
	
    <hr />
	
	<h3> Active Centre Holidays Collections</h3>
    <p>If you leave the Agent ID field empty, it will by default select Centre Holidays.</p>
    
	<hr />
	
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
	$y=$y+8;
	$x++;
	} while ($x <= $pages);
	?>
	</ul> 

	<div style="width:100%; background:none !important; margin-bottom:100px">
	<?php
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {

	?>
	
	<form action="ch_collections/update-collections.php" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $row['collid']; ?>" name="collid" id="collid" />
	<div class="col-sm-6 col-md-3 col-lg-3">
	<div class="white-box pro-box p-0">
	<div class="pro-list-img" style="background: url('https://www.centreholidays.com/collections/img/<?php echo $row['collimage']; ?>') center center / cover no-repeat;"></div>
	<br />
	<input type="hidden" value="<?php echo $row['collimage']; ?>" name="collimage" id="collimage" />   
    <div class="panel-body p-t-0">
    <input type="text" id="ncollimage" name="ncollimage" value="" placeholder="New image with extension" class="form-control" />
    </div>
    <div class="pro-content-3-col" style="min-height:180px">
	<div class="pro-list-details">
	
	<div class="panel-heading h4 text-center p-t-10 p-b-0">
    <input type="text" id="colltitle" name="colltitle" value="<?php echo $row['colltitle']; ?>" placeholder="Title" class="form-control" />
    </div>
	
    <div class="panel-body p-t-0">
	<p class="m-b-0 text-center">
	<textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"><?php echo $row['colldescription']; ?></textarea>
	</p>
	</div>    
    
    <div class="panel-body p-t-0">
    <input type="text" id="colExternalURL" name="colExternalURL" value="<?php echo $row['colExternalURL']; ?>" placeholder="External Link" class="form-control" />
    </div>
    <div class="panel-body p-t-0">
	<input type="text" id="colInternalURL" name="colInternalURL" value="<?php echo $row['colInternalURL']; ?>" placeholder="Internal Link" class="form-control" />
    </div>
    <div class="panel-body p-t-0">
    <textarea  id="colTags" name="colTags" placeholder="Tags" class="form-control" ><?php echo $row['colTags']; ?></textarea>    
    </div>
    <div class="panel-body p-t-0">
    <input type="text" id="colPageTags" name="colPageTags" value="<?php echo $row['colPageTags']; ?>" placeholder="Page Tags" class="form-control" />
    </div>   
    
    <div class="panel-body p-t-0">
    Expiry Date (MM/DD/YYYY)<br />
    <input type="text" name="colexpirydate" value="<?php echo date('m/d/Y', $row['colexpirydate']); ?>" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
	</div>      
    

    <div class="panel-body p-t-0">
    <select id="AgentID" name="AgentID" style="border:1px solid #CCC">
    <?php if (!empty($row['AgentID'])) { ?>
    <option value="<?php echo $row['AgentID']; ?>"><?php echo $row['AgentID']; ?></option>
    <option value="">No Agent</option>
    <?php } ?>
    <option value="">Select an Agent</option>
    <?php
	$sql22 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID ORDER BY ch_agents_1.AgentID ASC";	  
  
    $result22 = mysqli_query($conn, $sql22);	
    while($row22 = mysqli_fetch_assoc($result22)) {
        
    $DisplayName22=trim($row22['DisplayName']);
    $BusinessName22=trim($row22['BusinessName']);
    $FullName22=trim($row22['FirstName'].' '.$row22['LastName']);
    
    if (!empty($DisplayName22))// ================= first option
    $AgentName=$DisplayName22;
    elseif (!empty($BusinessName22))//=============== next option
    $AgentName=$BusinessName22;
    else
    $AgentName=$BusinessName22;
    
    
    ?>
    <option value="<?php echo $row22['AgentID']?>"><?php echo $row22['AgentID'].' - '.$FullName22.' - '.$AgentName; ?></option>
    <?php
        }
    ?>
    
    </select>
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
	<a href='ch_collections/deactivate-collections.php?collid=<?php echo $row['collid']; ?>' class='btn btn-warning' title='Click her to Deactivate'>Deactivate</a>
	</td>
	<?php
	}
	elseif ($active==0)
	{
	?>
	<td>
	<a href="ch_collections/activate-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
	</td>
	<?php
	}
	?>
	<td>
	<a href="ch_collections/delete-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Del</a>
	</td>                            
	</tr>
    <tr><td colspan="3"><a href="ch_collections/homepage-remove-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-default" title="Remove" onclick="return confirm_delete()" style="width:100%; background:#900; color:#FFF">Remove from Home Page</a></td></tr>
    <tr><td colspan="3"><a href="ch_collections/duplicate-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-default" title="Remove" onclick="return confirm_delete()" style="width:100%; background:#808000; color:#FFF">Duplicate this Colletion</a></td></tr>    
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


	<!--=======================-->
    <!--for not displayed list-->
    <!--=======================-->
    
    
    	<?php
	
	
	//===============================list==================================
	
	if (isset($_GET['offset1']))
	$offset1=trim($_GET['offset1']);
	else
	$offset1=0;	
	
	$sql1 = "SELECT * FROM ch_collections WHERE collhome !=1 ORDER BY coltimestamp DESC LIMIT $offset1, 8";
	
	//==========custom paginatnion===================
	
	$ttcount1 = mysqli_num_rows($result1);
	$result1 = mysqli_query($conn, $sql1);
	$row_cnt1 = mysqli_num_rows($result1);
	
	$Tsql1 = "SELECT * FROM ch_collections WHERE collhome !=1 ORDER BY coltimestamp DESC";
	$Tresult1  = mysqli_query($conn, $Tsql1);
	$Trow_cnt1 = mysqli_num_rows($Tresult1);		
	
	if (isset($_GET['pages1']))
	$pages1=$_GET['pages1'];
	else
	$pages1=ceil($Trow_cnt1/$row_cnt1);
	
	$Net_cnt1=$Trow_cnt1-$offset1;
	
	?>
	
	<div class="row">
	
	<?php
	
	if ($row_cnt1 > 0){// display results in case the feedback table is not empty
		?>
	
    <hr />
    
	<h3>Collections below are Not Displayed in the Website Home Page</h3>
    <p>If you leave the Agent ID field empty, it will by default select Centre Holidays.</p>
	<div style="width:100%; background:none !important; margin-bottom:100px">    
    
	<hr />
	
	<ul class="pagination">
	<?php 
	$x1 = 1; 
	$y1 = 0;
	do {
	?>
	<li style="list-style:none; float:left; margin-left:5px">
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset1=<?php echo $y1 ?>&pages1=<?php echo $pages1 ?>&pagenumber1=<?php echo $x1 ?>"><?php echo $x1 ?></a>
	</li>     
	
	<?php
	$y1=$y1+8;
	$x1++;
	} while ($x1 <= $pages1);
	?>
	</ul> 

	<?php
	// output data of each row
	while($row = mysqli_fetch_assoc($result1)) {

	?>
	
	<form action="ch_collections/update-collections.php" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $row['collid']; ?>" name="collid" id="collid" />
	<div class="col-sm-6 col-md-3 col-lg-3">
	<div class="white-box pro-box p-0">
	<div class="pro-list-img" style="background: url('https://www.centreholidays.com/collections/img/<?php echo $row['collimage']; ?>') center center / cover no-repeat;"></div>
	<br />
	<input type="hidden" value="<?php echo $row['collimage']; ?>" name="collimage" id="collimage" />   
    <div class="panel-body p-t-0">
    <input type="text" id="ncollimage" name="ncollimage" value="" placeholder="New image with extension" class="form-control" />
    </div>
    <div class="pro-content-3-col" style="min-height:180px">
	<div class="pro-list-details">
	
	<div class="panel-heading h4 text-center p-t-10 p-b-0">
    <input type="text" id="colltitle" name="colltitle" value="<?php echo $row['colltitle']; ?>" placeholder="Title" class="form-control" />
    </div>
	
    <div class="panel-body p-t-0">
	<p class="m-b-0 text-center">
	<textarea name="colldescription" id="colldescription" class='scrollable form-control' placeholder="Description"><?php echo $row['colldescription']; ?></textarea>
	</p>
	</div>    
    
    <div class="panel-body p-t-0">
    <input type="text" id="colExternalURL" name="colExternalURL" value="<?php echo $row['colExternalURL']; ?>" placeholder="External Link" class="form-control" />
    </div>
    <div class="panel-body p-t-0">
	<input type="text" id="colInternalURL" name="colInternalURL" value="<?php echo $row['colInternalURL']; ?>" placeholder="Internal Link" class="form-control" />
    </div>
    <div class="panel-body p-t-0">
    <textarea  id="colTags" name="colTags" placeholder="Tags" class="form-control" ><?php echo $row['colTags']; ?></textarea>    
    </div>
    <div class="panel-body p-t-0">
    <input type="text" id="colPageTags" name="colPageTags" value="<?php echo $row['colPageTags']; ?>" placeholder="Page Tags" class="form-control" />
    </div>

    <div class="panel-body p-t-0">
    Expiry Date (MM/DD/YYYY)<br />
    <input type="text" name="colexpirydate" value="<?php echo date('m/d/Y', $row['colexpirydate']); ?>" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
	</div> 



    <div class="panel-body p-t-0">
    <select id="AgentID" name="AgentID" style="border:1px solid #CCC">
    <?php if (!empty($row['AgentID'])) { ?>
    <option value="<?php echo $row['AgentID']; ?>"><?php echo $row['AgentID']; ?></option>
    <option value="">No Agent</option>
    <?php } ?>
    <option value="">Select an Agent</option>
    <?php
    //$sql22 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";
	$sql22 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID ORDER BY ch_agents_1.AgentID ASC";	  
	  
    $result22 = mysqli_query($conn, $sql22);	
    while($row22 = mysqli_fetch_assoc($result22)) {
        
    $DisplayName22=trim($row22['DisplayName']);
    $BusinessName22=trim($row22['BusinessName']);
    $FullName22=trim($row22['FirstName'].' '.$row22['LastName']);
    
    if (!empty($DisplayName22))// ================= first option
    $AgentName=$DisplayName22;
    elseif (!empty($BusinessName22))//=============== next option
    $AgentName=$BusinessName22;
    else
    $AgentName=$BusinessName22;
    
    
    ?>
    <option value="<?php echo $row22['AgentID']?>"><?php echo $row22['AgentID'].' - '.$FullName22.' - '.$AgentName; ?></option>
    <?php
        }
    ?>
    
    </select>
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
	<a href='ch_collections/deactivate-collections.php?collid=<?php echo $row['collid']; ?>' class='btn btn-warning' title='Click her to Deactivate'>Deactivate</a>
	</td>
	<?php
	}
	elseif ($active==0)
	{
	?>
	<td>
	<a href="ch_collections/activate-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
	</td>
	<?php
	}
	?>
	<td>
	<a href="ch_collections/delete-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Del</a>
	</td>                            
	</tr>
    <tr><td colspan="3"><a href="ch_collections/homepage-add-collections.php?collid=<?php echo $row['collid']; ?>" class="btn btn-info" title="Delete" onclick="return confirm_delete()" style="width:100%">Display in Home Page</a></td></tr>
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