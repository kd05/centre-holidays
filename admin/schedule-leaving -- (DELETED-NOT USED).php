<?php ob_start(); ?>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/ch-agent-db-details.php');
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?> 
<style>
table {width:97% !important}
table th {text-align:left !important; padding-left:20px; max-width:100px}
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
  <div id="page-wrapper" style="overflow-y:scroll; max-height: 100vh;">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
                    


<h3>Add a Leave Schedule for agent ID:  <?php echo $AgentID ?></h3>

<div>
<table style="margin-top:10px">

<form action="leaving-schedules/add-leaving.php" method="post" enctype="multipart/form-data" id="trips">
<input type="hidden" value="<?php echo $AgentID ?>" name="AgentID" id="AgentID" />
<tr class="selectedtr">
<th>First Name</th>

<td><input type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName ?>" placeholder="First Name" readonly class="form-control" /></td>
</tr>

<tr>
<th>Last Name</th>
<td><input type="text" id="LastName" name="LastName" value="<?php echo $LastName ?>" placeholder="Last Name" readonly class="form-control" /></td>
</tr>

<tr>
<th>Business Email</th>
<td><input type="text" id="BusinessEmail" name="BusinessEmail" value="<?php echo $BusinessEmail ?>" placeholder="Business Email" readonly class="form-control" /></td>
</tr>



<tr>
<th>Country</th>

<td>
<select id="country_name" name="country_name" class="form-control">
<option value="">Select Country</option>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


$sql211 = "SELECT * FROM list_of_countries ORDER BY country ASC";

$result211 = mysqli_query($conn, $sql211);

$rowcounter211=mysqli_num_rows($result211);

if ($rowcounter211 > 0) {
// output data of each row
while($row211 = mysqli_fetch_assoc($result211)) {
?>
<option value="<?php echo $row211['country'] ?>"><?php echo $row211['country'] ?></option>
<?php	
    }
}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); 
?>
</select>
</td>
</tr>

<tr>
<th>Leave Date (MM/DD/YYYY)</th>
<td>
<div class="input-group">
<input type="text" name="leavedate" value="" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
</td>
</tr>

<tr>
<th>Return Date (MM/DD/YYYY)</th>
<td>
<div class="input-group">
<input type="text" name="returndate" value="" class="form-control" id="datepicker-autoclose1" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div></td>
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

<? ob_flush(); ?>