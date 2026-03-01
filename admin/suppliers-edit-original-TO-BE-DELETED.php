<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


if (!empty($_GET['affiliatetime']))
$affiliatetime=trim($_GET['affiliatetime']);
else
$affiliatetime=trim($_POST['affiliatetime']);

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
table td {text-align:left !important; padding-left:20px;}
table th {text-align:left !important; padding-left:20px; max-width:100px}
textarea {white-space:pre-wrap !important}
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

<h3>Supplier Edit</h3>

<div style="max-width:100%; overflow-x:hidden; margin-bottom:100px">


<?php
//---------------display results in case of unpdate--------------
if (isset($_GET['results']))
{
	if ($_GET['results']='success')
	echo "<h4>Success, changes done</h4>";
	elseif ($_GET['results']='error')
	echo "<h4>Error, could not make changes</h4>";
}
//----------------------------Connect to database-------------------------

	$sql = "SELECT * FROM affiliates WHERE affiliatetime=".$affiliatetime." LIMIT 1";

	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
		
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

while($row = mysqli_fetch_assoc($result)) {
$afid=$row['afid'];	
?>

<table style="background:#fff !important; margin-top:50px; width:100%">

<form action="supplier/update-affiliate.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="affiliatetime" name="affiliatetime" 
value="<?php echo $affiliatetime; ?>" />
<input type="hidden" id="afid" name="afid" value="<?php echo $afid; ?>" />

<tr>
<th>Supplier Name</th>
<td colspan="4">

<input type="text" id="affiliatename" name="affiliatename" value="<?php echo $row['affiliatename']; ?>"  />

</td>
</tr>

<tr>
<th>Supplier Description</th>
<td colspan="4"><textarea name="affiliatedescreption" id="affiliatedescreption" class='scrollable'>
<?php echo $row['affiliatedescreption']; ?>
</textarea></td>
</tr>

<tr>
<th>Cover Image (Supplier Details)</th>
<td colspan="4"><input type="text" id="cafhimage" name="cafhimage" value="<?php echo $row['cafhimage']; ?>"/>

<?php
if (!empty($row['cafhimage']))
{
?>
<br /><br />
<img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['cafhimage']; ?>" style="max-width:300px; max-height:80px; margin-bottom:10px" />
<?php
}
?>

</td>
</tr>

<tr>
<th>Horizontal Image (Supplier List)</th>
<td colspan="4"><input type="text" id="afhimage" name="afhimage" value="<?php echo $row['afhimage']; ?>"/>

<?php
if (!empty($row['afhimage']))
{
?>
<br /><br />
<img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['afhimage']; ?>" style="max-width:300px; max-height:80px; margin-bottom:10px" />
<?php
}
?>

</td>
</tr>

<tr>
<th>Square Image (Admin List)</th>
<td colspan="4"><input type="text" id="affiliatesqimage" name="affiliatesqimage" value="<?php echo $row['affiliatesqimage']; ?>"/>

<?php
if (!empty($row['affiliatesqimage']))
{
?>
<br /><br />
<img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['affiliatesqimage']; ?>" style="max-width:80px; height:80px; max-height:80px; margin-bottom:10px" />
<?php
	}
?>


</td>
</tr>

<tr>
<th>Preferred Supplier</th>
<td colspan="4">
<select id="preferred" name="preferred" >
<?php
if ($row['preferred']==1)
$preferred='Yes';
elseif ($row['preferred']==0)
$preferred='No';
?>
<option value="<?php echo $row['preferred']; ?>"><?php echo $preferred; ?></option>
<option value="1">Yes</option>
<option value="0">No</option>
</select>

</td>
</tr>

<tr>
<th>Important Details (HTML Code)</th>
<td colspan="4">
<textarea name="affiliatdetails" id="affiliatdetails" class='scrollable'>
<?php echo $row['affiliatdetails']; ?>
</textarea>
</td>
</tr>








<tr>
<th>Filter</th>

<td colspan="4" style="text-align:left !important;">


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

<?php

	$sql3 = "SELECT * FROM affiliatefilter ORDER BY affilter ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['affilter'], $row3['affilter']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input style="width:auto !important" type="checkbox" <?php echo $stylecheck3 ?> name="affilter[]" value="<?php echo $row3['affilter']; ?>">&nbsp;<strong><?php echo $row3['affilter']; ?></strong> </li>
	<?php
			
		}
	}
?>

</ul>

</div>

</td>
</tr>


<tr>
<th>TAGS</th>
<td colspan="4">
<textarea name="affiliattags" id="affiliattags" class='scrollable'>
<?php echo $row['affiliattags']; ?>
</textarea>
</td>
</tr>

<tr>
<th>INTERNAL NOTES</th>
<td colspan="4">
<textarea name="affnotes" id="affnotes" class='scrollable form-control textarea_editor' rows="10" placeholder="Notes" style="width:100%"><?php echo $row['affnotes'] ?></textarea>
</td>
</tr>


<tr>
<th></th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%"/></td>

<td>
<?php
$affiliateactive=$row['affiliateactive'];
if ($affiliateactive==1)
{
?>
<a href="supplier/deactive-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=1" class="btn btn-warning" title="Click her to Deactivate" style="width:100%">Deactivate</a>
<?php
}
elseif ($affiliateactive==0)
{
?>
<a href="supplier/active-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=1" class="btn btn-success" title="Click her to Deactivate" style="width:100%">Activate</a>
<?php
}
?>
</td>

<td><a href="supplier/delete-affiliate.php?afid=<?php echo $afid; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>


<td><a href="add-modal.php?afid=<?php echo $afid; ?>&affiliatetime=<?php echo $affiliatetime ?>" class="btn btn-default" style="width:100%" title="Add Modal" onclick="return confirm_delete()">Add Modal</a></td>
</tr>

</form>


</table>


<!--Accordion wrapper-->
<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">



<?php
			}
		}


//=========================MODALS======================================================



	$sql1 = "SELECT * FROM affiliatemodals WHERE afid='".$afid."' ORDER BY modalid DESC";

	$result1 = mysqli_query($conn, $sql1);
	$row_cnt1 = mysqli_num_rows($result1);
	
	echo '<h3>Number of modals: '.$row_cnt1.'</h3><hr />' ;
		
	if ($row_cnt1 > 0)// display results in case the feedback table is not empty
	{

while($row1 = mysqli_fetch_assoc($result1)) {
	
$modalid=$row1['modalid'];
	
?>


<div class="card" style="border:1px solid #CCC; padding:5px; margin-bottom:5px; background:#FFF">

    <!-- Card header -->
    <div class="card-header" role="tab" id="headingOne<?php echo $row1['modalid']; ?>">
      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?php echo $row1['modalid']; ?>" aria-expanded="true"
        aria-controls="collapse<?php echo $row1['modaletitle']; ?>">
        <h3 class="mb-0">
          Modal <?php echo $row_cnt1--.' - '.$row1['modaletitle']; ?>
        </h3>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapse<?php echo $row1['modalid']; ?>" class="collapse" role="tabpane<?php echo $row1['modalid']; ?>" aria-labelledby="heading<?php echo $row1['modalid']; ?>"
      data-parent="#accordionEx">
      <div class="card-body">


<table style="background:#fff !important; margin-top:50px; width:100%">

<form action="supplier/update-modal.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="affiliatetime" name="affiliatetime" value="<?php echo $affiliatetime; ?>" />
<input type="hidden" id="afid" name="afid" value="<?php echo $afid; ?>" />
<input type="hidden" id="modalid" name="modalid" value="<?php echo $row1['modalid']; ?>" />

<tr>
<th>Title</th>
<td colspan="4">


<input type="text" id="modaletitle" name="modaletitle" value="<?php echo $row1['modaletitle']; ?>"  />

</td>
</tr>

<tr>
<th>Modal Description </th>
<td colspan="4">
<input type="text" id="modaldescription" name="modaldescription" value="<?php echo $row1['modaldescription']; ?>"  />
</td>
</tr>

<!--<tr>
<th>ID  (Example - companyprofile) - This is to activate the popup</th>
<td colspan="4">


<input type="text" id="modalidactive" name="modalidactive" value="<?php //echo $row1['modalidactive']; ?>"  />

</td>
</tr>-->


<tr>
<th>Size: </th>
<td colspan="4">

<select id="modalsize" name="modalsize" >
<?php if (!empty($row1['modalsize'])) { ?>
<?php
if ($row1['modalsize']=='modal-md')
$displayit1='Medium (Default)';
elseif ($row1['modalsize']=='modal-ms')
$displayit1='Small';
elseif ($row1['modalsize']=='modal-lg')
$displayit1='Large';
elseif ($row1['modalsize']=='modal-xl')
$displayit1='XL';
?>
<option value="<?php echo $row1['modalsize']; ?>"><?php echo $displayit1 ?></option>
<?php } ?>
<option value="modal-md">Medium (Default)</option>
<option value="modal-sm">Small</option>
<option value="modal-lg">Large</option>
<option value="modal-xl">XL</option>
</select>


</td>
</tr>

<tr>
<th>Header Colour</th>
<td colspan="4">


<select id="modalheadercolour" name="modalheadercolour" >
<?php if (!empty($row1['modalheadercolour'])) { ?>
<?php
if ($row1['modalheadercolour']=='bg-danger')
$displayit='Red (Important Details)';
elseif ($row1['modalheadercolour']=='bg-dark')
$displayit='Dark (Default)';
?>
<option value="<?php echo $row1['modalheadercolour'] ?>"><?php echo $displayit; ?></option>
<?php } ?>
<option value="bg-dark">Dark (Default)</option>
<option value="bg-danger">Red (Important Details)</option>
</select>

</td>
</tr>



<tr>
<th>Contents (HTML Code )</th>
<td colspan="4">
<textarea name="modalhtmlcontents" id="modalhtmlcontents" class='scrollable'>
<?php echo $row1['modalhtmlcontents']; ?>
</textarea>
</td>
</tr>

<tr>
<th></th>

<td colspan="2"><input type="submit" value="Update Modal" class="btn btn-primary" style="width:100%"/></td>


<td colspan="2"><a href="supplier/delete-modal.php?modalid=<?php echo $modalid; ?>&affiliatetime=<?php echo $affiliatetime ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete Modal</a></td>


</tr>

</form>


</table>


      </div>
    </div>

  </div>




<?php
			}
		}
?>

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