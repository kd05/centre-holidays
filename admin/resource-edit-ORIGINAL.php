<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


if (!empty($_GET['inchTime']))
$inchTime=trim($_GET['inchTime']);
else
$inchTime=trim($_POST['inchTime']);

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

<h3>Resource Centre Holidays Edit</h3>

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

	$sql = "SELECT * FROM resource WHERE inchTime=".$inchTime." LIMIT 1";

	$result = mysqli_query($conn, $sql);
	$row_cnt = mysqli_num_rows($result);
		
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

while($row = mysqli_fetch_assoc($result)) {
$inchID=$row['inchID'];	
?>

<table style="background:#fff !important; margin-top:50px; width:100%">

<form action="resource/update-resource.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="inchTime" name="inchTime" value="<?php echo $inchTime; ?>" />
<input type="hidden" id="inchID" name="inchID" value="<?php echo $row['inchID']; ?>" />


<tr>
<th>Title</th>
<td colspan="4">
<input type="text" id="inchTitle" name="inchTitle" value="<?php echo $row['inchTitle']; ?>" placeholder="Title" />
</td>
</tr>

<tr>
<th>Meta Description</th>
<td colspan="4">
<input type="text" id="inchMetaDescription" name="inchMetaDescription" value="<?php echo $row['inchMetaDescription']; ?>" placeholder="Meta Description" />
</td>
</tr>


<tr>
<th>Resource Centre Holidays Filter</th>
<td colspan="4">


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

<?php

	$sql3 = "SELECT * FROM resourcefilter ORDER BY inchFilter ASC";
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['inchFilter'], $row3['inchFilter']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input style="width:auto !important" type="checkbox" <?php echo $stylecheck3 ?> name="inchFilter[]" value="<?php echo $row3['inchFilter']; ?>">&nbsp;<strong><?php echo $row3['inchFilter']; ?></strong> </li>
	<?php
			
		}
	}
?>

</ul>

</div>


</td>
</tr>

<tr>
<th>Horizontal Image</th>
<td colspan="4">
<input type="text" id="inchHorizontalImage" name="inchHorizontalImage" value="<?php echo $row['inchHorizontalImage']; ?>" placeholder="Horizontal Image" />
<?php
if (!empty($row['inchHorizontalImage']))
{
?>
<br />
<img src="https://centreholidays.com/img/agents/inside-ch-details/<?php echo $row['inchHorizontalImage']; ?>" style="max-width:400px; max-height:400px;" />
<?php
}
?>
</td>
</tr>

<tr>
<th>Cover Image</th>
<td colspan="4">
<input type="text" id="inchImage" name="inchImage" value="<?php echo $row['inchImage']; ?>" placeholder="Image" />
<?php
if (!empty($row['inchImage']))
{
?>
<br />
<img src="https://centreholidays.com/img/agents/inside-ch-details/<?php echo $row['inchImage']; ?>" style="max-width:400px; max-height:400px;" />
<?php
}
?>
</td>
</tr>

<tr>
<th>Resource Centre Holidays Content</th>
<td colspan="4">
<textarea name="inchContent" id="inchContent" class='scrollable' placeholder="Resource Centre Holidays Content">
<?php echo $row['inchContent']; ?>
</textarea></td>
</tr>

<tr>
<th>Video URL</th>
<td colspan="4">
<textarea name="inchVideoUrl" id="inchVideoUrl" class='scrollable' placeholder="Video URL">
<?php echo $row['inchVideoUrl']; ?>
</textarea></td>
</tr>

<tr>
<th>External URL</th>
<td colspan="4">
<textarea name="inchExternalURL" id="inchExternalURL" class='scrollable' placeholder="External URL">
<?php echo $row['inchExternalURL']; ?>
</textarea></td>
</tr>

<tr>
<th>Resource Centre Holidays Tags</th>
<td colspan="4">
<textarea name="inchTags" id="inchTags" class='scrollable' placeholder="Resource Centre Holidays Tags">
<?php echo $row['inchTags']; ?>
</textarea></td>
</tr>


    <tr>
        <th>Internal Notes</th>
        <td colspan="4">
            <textarea name="inchInternalNotes" id="inchInternalNotes" class='scrollable' placeholder="Internal Notes"><?php echo trim($row['inchInternalNotes']); ?></textarea>
        </td>
    </tr>


    <tr>
        <th>Learn more</th>
        <td colspan="4">
            <textarea name="inchLearnMore" id="inchLearnMore" class='scrollable' placeholder="Learn more"><?php echo trim($row['inchLearnMore']); ?></textarea>
        </td>
    </tr>


    <tr>
        <th>Suppliers</th>
        <td colspan="4">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

                    <?php
                    // Fetch the stored suppliers for the specific record (assuming $row contains the record data)
                    $storedInchSuppliers = isset($row['inchSuppliers']) ? $row['inchSuppliers'] : '';

                    // Fetch affiliates
                    $sql4 = "SELECT * FROM affiliates ORDER BY afid DESC";
                    $result_suppliers = mysqli_query($conn, $sql4);

                    if (mysqli_num_rows($result_suppliers) > 0) {
                        // Output data of each row
                        while ($row3 = mysqli_fetch_assoc($result_suppliers)) {
                            // Check if the current supplier's ID is stored in inchSuppliers
                            $stylecheck3 = (strpos($storedInchSuppliers, ',' . $row3['afid'] . ',') !== false) ? 'checked' : '';
                            ?>
                            <li>
                                <input style="width:auto !important" type="checkbox" <?php echo $stylecheck3; ?> name="inchSuppliers[]"
                                       value="<?php echo $row3['afid']; ?>">&nbsp;
                                <strong><?php echo $row3['affiliatename']; ?></strong>
                            </li>
                            <?php
                        }
                    }
                    ?>


                </ul>

            </div>
        </td>
    </tr>





    <tr>
    <th>Expiry Date (Events & Contests)</th>
    <td colspan="4">
    <div class="input-group">
    <input type="text" name="inchEXPTime" value="<?php echo date('m/d/Y', ($row['inchEXPTime'])); ?>" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy"/>
    <span class="input-group-addon"><i class="icon-calender"></i></span></div>
    </td>
    </tr>

<tr>
<th></th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%"/></td>

<?php
if ($row['inchActive']==0)
{
?>
<td><a href="resource/activate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-success" style="width:100%" title="Activate" onclick="return confirm_delete()">Activate</a></td>
<?php
}
elseif ($row['inchActive']==1)
{
?>
<td><a href="resource/deactivate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-warning" style="width:100%" title="Deactivate" onclick="return confirm_delete()">deactivate</a></td>
<?php
}
?>


<td><a href="resource/delete-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>


</tr>

</form>


</table>


<?php 
}
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