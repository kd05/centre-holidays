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

<h3>Trip Inquiry</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM trip_inquiry ORDER BY titime DESC";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
<table style="margin-top:10px" id="mytable">
<tr>
<th>ID</th>
<th>Inquiry Number</th>
<th>Code</th>
<th>Continent</th>
<th>Trip</th>
<th>Length (Days)</th>
<th>Year</th>
<th>Month</th>
<th>Adults</th>
<th>Children</th>
<th>Budget</th>
<th>Salutation</th>

<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Type</th>
<th>Depart Country</th>
<th>Depart City</th>
<th>Additional Notes</th>

<th>Referred By</th>

<th>IP</th>


<th>Internal Notes</th>
<th>Date</th>
<th>Update</th>
<th>Approve/Suspend</th>
<th>Block</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
if ($row['tiactive']==1)
$back='#fff';
elseif ($row['tiactive'] !=1)
$back='#666';		

?>
<form action="trip-inquers/update-trip-inquers.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr spandax2" style="background:<?php echo $back ?> !important">
<td><?php echo $row['tiid']; ?><input type="hidden" id="tiid" name="tiid" value="<?php echo $row['tiid']; ?>"/></td>
<td><input type="text" id="tiuniquenumber" name="tiuniquenumber" value="<?php echo $row['tiuniquenumber']; ?>" class="form-control"/></td>
<td><input type="text" id="tripcode" name="tripcode" value="<?php echo $row['tripcode']; ?>" class="form-control"/></td>
<td><input type="text" id="ticontinent" name="ticontinent" value="<?php echo $row['ticontinent']; ?>" class="form-control" /></td>
<td><input type="text" id="titrip" name="titrip" value="<?php echo $row['titrip']; ?>" class="form-control" /></td>
<td><input type="text" id="titriplength" name="titriplength" value="<?php echo $row['titriplength']; ?>" class="form-control"/></td>
<td><input type="text" id="tiyear" name="tiyear" value="<?php echo $row['tiyear']; ?>" class="form-control"/></td>
<td><input type="text" id="timonth" name="timonth" value="<?php echo $row['timonth']; ?>" class="form-control"/></td>
<td><input type="text" id="tinumadults" name="tinumadults" value="<?php echo $row['tinumadults']; ?>" class="form-control"/></td>
<td><input type="text" id="tinumchildren" name="tinumchildren" value="<?php echo $row['tinumchildren']; ?>" class="form-control"/></td>
<td><input type="text" id="tibudget" name="tibudget" value="<?php echo $row['tibudget']; ?>" class="form-control" /></td>

<td style="background:#FF6"><input type="text" id="tisalutation" name="tisalutation" value="<?php echo $row['tisalutation']; ?>" class="form-control" /></td>
<td style="background:#FF6"><input type="text" id="titravfname" name="titravfname" value="<?php echo $row['titravfname']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="titravlname" name="titravlname" value="<?php echo $row['titravlname']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="titravphone" name="titravphone" value="<?php echo $row['titravphone']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="titravemail" name="titravemail" value="<?php echo $row['titravemail']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="titype" name="titype" value="<?php echo $row['titype']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tidepartcountry" name="tidepartcountry" value="<?php echo $row['tidepartcountry']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tidepartcity" name="tidepartcity" value="<?php echo $row['tidepartcity']; ?>" class="form-control"/></td>
<td style="background:#FF6"><textarea id="tiaddnotes" name="tiaddnotes" class="form-control"><?php echo $row['tiaddnotes']; ?></textarea></td>
<td style="background:#FF6"><input type="text" id="tihearaboutus" name="tihearaboutus" value="<?php echo $row['tihearaboutus']; ?>" class="form-control"/></td>
<td style="background:#FF6"><input type="text" id="tiip" name="tiip" value="<?php echo $row['tiip']; ?>" class="form-control"/></td>
<td style="background:#FF6"><textarea id="tiintnotes" name="tiintnotes" class="form-control"><?php echo $row['tiintnotes']; ?></textarea></td>

<td style="background:#EBEBEB"><?php echo date('M/d/Y', $row['titime']); ?></td>

<td><input type="submit" value="Update" class="btn btn-primary"/></td>

<?php
if ($row['tiactive']==1 && !empty($row['tiuniquenumber']))
{
?>
<td><a href="trip-inquers/deactivate-trip-inquers.php?tiid=<?php echo $row['tiid']; ?>&titravemail=<?php echo $row['titravemail']; ?>&fulllname=<?php echo $row['titravfname'].'&nbsp;'.$row['titravlname']; ?>" class="btn btn-default" title="Click here to Suspend">Suspend</a></td>

<?php
}
elseif ($row['tiactive']==0 || empty($row['tiuniquenumber']))
{
?>
<td><a href="trip-inquers/activate-trip-inquers.php?tiid=<?php echo $row['tiid']; ?>&titravemail=<?php echo $row['titravemail']; ?>&fulllname=<?php echo $row['titravfname'].'&nbsp;'.$row['titravlname']; ?>" class="btn btn-success" title="Click here to Activate">Approve</a></td>
<?php
}
?>

<td><a href="trip-inquers/block-trip-inquers.php?tiid=<?php echo $row['tiid']; ?>&tiip=<?php echo $row['tiip']; ?>" class="btn btn-danger" title="Block" onclick="return confirm_delete()">Block</a></td>


<td><a href="trip-inquers/delete-trip-inquers.php?tiid=<?php echo $row['tiid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>

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