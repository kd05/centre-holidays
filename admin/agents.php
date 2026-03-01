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
    $(".spandax2").slice(0, 10).show(); // select the first ten
    $("#load2").click(function(e){ // click event for load more
        e.preventDefault();
        $(".spandax2:hidden").slice(0, 10).show(); // select next 8 hidden divs and show them
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

<h3>Agent only Inquiries</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM agents ORDER BY agency ASC";
		
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
<th>Client Type</th>
<th>Agency</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Country</th>
<th>State/Province</th>
<th>City</th>
<th>Subscribed (1=Yes/0=No)</th>
<th>Status</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>
<form action="clients/update-agents.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr spandax2">
<td><?php echo $row['agentid']; ?><input type="hidden" id="agentid" name="agentid" value="<?php echo $row['agentid']; ?>"/></td>
<td><input type="text" id="enqnumber" name="enqnumber" value="<?php echo $row['enqnumber']; ?>" class="form-control" readonly /></td>
<td><input type="text" id="client" name="client" value="<?php echo $row['client']; ?>" class="form-control" /></td>
<td><input type="text" id="agency" name="agency" value="<?php echo $row['agency']; ?>" class="form-control"/></td>
<td><input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"/></td>
<td><input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"/></td>

<td><input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" /></td>
<td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"/></td>

<td><input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" class="form-control" /></td>
<td><input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" class="form-control"/></td>
<td><input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" class="form-control"/></td>

<td><input type="text" id="subscription" name="subscription" value="<?php echo $row['subscription']; ?>" class="form-control"/></td>

<?php
$active=$row['active'];
if ($active==1)
{
?>
<td><a href="clients/deactivate-client.php?agentid=<?php echo $row['agentid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="clients/activate-client.php?agentid=<?php echo $row['agentid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

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