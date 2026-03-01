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
.spandax2 { display:none; }
</style>

<script>
$(function(){
    $(".spandax2").slice(0, 40).show(); // select the first ten
    $("#load2").click(function(e){ // click event for load more
        e.preventDefault();
        $(".spandax2:hidden").slice(0, 40).show(); // select next 8 hidden divs and show them
        if($(".spandax2:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton").hide();
        }
    });
});
</script>

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

<h3>Tavel Agency</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM travel_agencies ORDER BY tabusinessname ASC";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
<table style="margin-top:10px" id="mytable">
<tr>
<th>ID</th>

<th>Legal Business Name</th>
<th>Address</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Postal/Zip</th>

<th>Phone</th>
<th>Email</th>
<th>IATA/TIDS</th>
<th>Host Agency</th>
<th>Consortia</th>


<th>Salutation</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Type</th>
<th>Country</th>
<th>Province</th>
<th>City</th>
<th>Address</th>

<th>Postal Code</th>

<th>Internal Notes</th>

<th>Date</th>
<th>IP</th>


<th>Update Info.</th>
<th>Approve/Suspend</th>
<th>Block</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
if ($row['taactive']==1)
$back='#fff';
elseif ($row['taactive'] !=1)
$back='#666';		

?>
<form action="travel-agents/update-travel_agents.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr spandax2" style="background:<?php echo $back ?> !important">
<td><?php echo $row['taid']; ?><input type="hidden" id="taid" name="taid" value="<?php echo $row['taid']; ?>"/></td>
<td><input type="text" id="tabusinessname" name="tabusinessname" value="<?php echo $row['tabusinessname']; ?>" class="form-control" /></td>
<td><input type="text" id="taaddress" name="taaddress" value="<?php echo $row['taaddress']; ?>" class="form-control" /></td>
<td><input type="text" id="tacountry" name="tacountry" value="<?php echo $row['tacountry']; ?>" class="form-control" /></td>
<td><input type="text" id="tastate" name="tastate" value="<?php echo $row['tastate']; ?>" class="form-control"/></td>
<td><input type="text" id="tacity" name="tacity" value="<?php echo $row['tacity']; ?>" class="form-control"/></td>
<td><input type="text" id="tapostal" name="tapostal" value="<?php echo $row['tapostal']; ?>" class="form-control"/></td>
<td><input type="text" id="taphone" name="taphone" value="<?php echo $row['taphone']; ?>" class="form-control"/></td>
<td><input type="text" id="taemail" name="taemail" value="<?php echo $row['taemail']; ?>" class="form-control"/></td>
<td><input type="text" id="talicense" name="talicense" value="<?php echo $row['talicense']; ?>" class="form-control"/></td>
<td><input type="text" id="tahostagency" name="tahostagency" value="<?php echo $row['tahostagency']; ?>" class="form-control" /></td>
<td><input type="text" id="taconsortia" name="taconsortia" value="<?php echo $row['taconsortia']; ?>" class="form-control"/></td>



<td style="background:#FF6"><input type="text" id="tasalutation" name="tasalutation" value="<?php echo $row['tasalutation']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tafname" name="tafname" value="<?php echo $row['tafname']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="talname" name="talname" value="<?php echo $row['talname']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadierctemail" name="tadierctemail" value="<?php echo $row['tadierctemail']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadierctphone" name="tadierctphone" value="<?php echo $row['tadierctphone']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tatype" name="tatype" value="<?php echo $row['tatype']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadirectcountry" name="tadirectcountry" value="<?php echo $row['tadirectcountry']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadirectstate" name="tadirectstate" value="<?php echo $row['tadirectstate']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadierctcity" name="tadierctcity" value="<?php echo $row['tadierctcity']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadirectaddress" name="tadirectaddress" value="<?php echo $row['tadirectaddress']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tadirectpostal" name="tadirectpostal" value="<?php echo $row['tadirectpostal']; ?>" class="form-control"/></td>

<td><textarea id="tanotes" name="tanotes" class="form-control"><?php echo $row['tanotes']; ?></textarea></td>
<td style="background:#EBEBEB"><?php echo date('M/d/Y', $row['tatime']); ?></td>
<td style="background:#EBEBEB"><?php echo $row['taip']; ?></td>

<td><input type="submit" value="Update" class="btn btn-primary"/></td>

<?php
if ($row['taactive']==1 && !empty($row['tauniquenumber']))
{
?>
<td><a href="travel-agents/deactivate-travel-agents.php?taid=<?php echo $row['taid']; ?>&tamanageremail=<?php echo $row['tamanageremail']; ?>&fulllname=<?php echo $row['tamanagerfn'].'&nbsp;'.$row['tamanagerln']; ?>" class="btn btn-default" title="Click here to Suspend">Suspend</a></td>

<?php
}
elseif ($row['taactive']==0 || empty($row['tauniquenumber']))
{
?>
<td><a href="travel-agents/activate-travel-agents.php?taid=<?php echo $row['taid']; ?>&tamanageremail=<?php echo $row['tamanageremail']; ?>&fulllname=<?php echo $row['tamanagerfn'].'&nbsp;'.$row['tamanagerln']; ?>" class="btn btn-success" title="Click here to Activate">Approve</a></td>
<?php
}
?>

<td><a href="travel-agents/block-travel-agents.php?taid=<?php echo $row['taid']; ?>&blip=<?php echo $row['taip']; ?>" class="btn btn-danger" title="Block" onclick="return confirm_delete()">Block</a></td>


<td><a href="travel-agents/delete-travel-agents.php?taid=<?php echo $row['taid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>

</tr>
</form>
<?php

		}
?>

</table>
<a href="#" id="load2" class="btn btn-warning loadbutton text-uppercase p-10 m-b-20" style="width:100%">Load More <i class="fa fa-arrow-down"></i></a>

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