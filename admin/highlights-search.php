<?php ob_start(); ?>
<?php
$look=trim($_GET['look']);
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
                    


<h3>Search Highlights</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<form method="get" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="text" value="<?php echo $_GET['look'] ?>" id="look" name="look"  class="form-control" placeholder="Highlight Title" />
<br />
<input type="submit" value="Search" class="btn btn-primary" />
</form>

<hr />


<?php


	
		$sql = "SELECT * FROM highlights WHERE highlightstitle LIKE '%".$look."%' || highlightsdetails LIKE '%".$look."%' ORDER BY highlightstype DESC, highlightstitle ASC";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		
		if (!empty($_GET['look'])) 
		{
		$row_cnt = mysqli_num_rows($result);
		echo '<p>Number of resultas '.$row_cnt.'</p>';
		}

	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>

            
<table style="margin-top:10px; width:98%">
<tr>
<th>Thumb</th>
<th>Website</th>
<th>Type</th>
<th>Title</th>
<th>Continent</th>
<th>Sub-Style</th>
<th>Expiry Date</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


// expiry time and active or not change background color====================
$highlightsexptime=$row['highlightsexptime'];// expiry timestamp
$differtimestamps=$highlightsexptime-$todaystimestamp; // difference in timestamps
//==========================================================================
$highlightsactive=$row['highlightsactive'];

if ($highlightsactive==0 || ($differtimestamps < 0 && !empty($highlightsexptime)))
$mybakg='style="background:#666 !important"';
else
$mybakg='style="background:#fff !important"';



	// identify the website and properly display the images.
	if ($row['highlightswebsites']=='2')
	{
		$url='https://www.centreholidays.com';
	}
	else
	{
		$url='https://'.$_SERVER[HTTP_HOST];
	}

?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td style="background:#<?php echo $row['highlightscolor']; ?>">
<?php if (!empty($row['highlightspreviewimage'])) { ?>
<img src="https://centreholidays.com/img/highlights/<?php echo $row['highlightspreviewimage']; ?>" style="max-width:100px; max-height:100px;" />
<?php } ?>
</td>
<td>
<?php 
if ($row['highlightswebsite'] == 1)
echo '<strong>Epik</strong>';
elseif ($row['highlightswebsite'] == 2)
echo '<strong>CH</strong>';
elseif ($row['highlightswebsite'] == 3)
echo '<strong>Epik & CH</strong>';  
?>
</td>
<td>
<?php 
if ($row['highlightstype']==1)
echo $highlightstype='Information';
elseif ($row['highlightstype']==2)
echo $highlightstype='Video';
elseif ($row['highlightstype']==3)
echo $highlightstype='Link to url'; ?>
</td>
<td style="text-align:left !important"><?php echo $row['highlightstitle'];?></td>
<td style="text-align:left !important"><?php echo $row['highlightscontinent']; ?></td>
<td style="text-align:left !important"><?php echo $row['highlightssubstyle']; ?></td>
<td>
<?php 
if (!empty($row['highlightsexpirydate']))
echo date('F d Y', ($row['highlightsexpirydate']));
else
echo '';
?>
</td>
<td><a href="highlights-edit.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$highlightsactive=$row['highlightsactive'];
if ($highlightsactive==1)
{
?>
<a href="highlights/deactivate-highlights.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($highlightsactive==0)
{
?>
<a href="highlights/activate-highlights.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="highlights/delete-highlights.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php

		}
?>

</table>
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