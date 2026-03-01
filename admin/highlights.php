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

<h3>Highlights</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php //include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code-meaning.php'); ?>
<?php


//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM highlights ORDER BY highlightstime DESC, pintotop DESC LIMIT $offset, 100";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM highlights ORDER BY highlightstime DESC, pintotop DESC";
		$Tresult  = mysqli_query($conn, $Tsql);
		$Trow_cnt = mysqli_num_rows($Tresult);		
	
		if (isset($_GET['pages']))
		$pages=$_GET['pages'];
		else
		$pages=ceil($Trow_cnt/$row_cnt);
  
		$Net_cnt=$Trow_cnt-$offset;
	
	?>
	   <ul class="pagination">
        <?php 
        $x = 1; 
        $y = 0;
        do {
			?>
            <li style="list-style:none; float:left; margin-left:5px">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>&ord=<?php echo $_GET['ord'] ?>"><?php echo $x ?></a>
            </li>     
            
            <?php
            $y=$y+100;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>

            
<table style="margin-top:10px; width:98%">
<tr>
<th>hid</th>
<th>Thumb</th>
<th>Website</th>
<th>Type</th>
<th>Title</th>
<th>Continent</th>
<th>Expiry Date</th>
<th>Agent</th>
<th>Edit</th>
<th>Status</th>
<th>Pin To Top</th>
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
<td><?php echo $row['highlightsid']; ?></td>
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
echo $highlightstype='VR Travel and YouTube URL';
elseif ($row['highlightstype']==3)
echo $highlightstype='Link to url'; ?>
</td>
<td style="text-align:left !important"><?php echo $row['highlightstitle'];?></td>
<td style="text-align:left !important"><?php echo $row['highlightscontinent']; ?></td>
<td>
<?php 
if (!empty($row['highlightsexpirydate']))
echo date('F d Y', ($row['highlightsexpirydate']));
else
echo '';
?>
</td>
<td><?php echo str_replace(",","", $row['AgentID']) ;?></td>
<td><a href="highlights-edit.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$highlightsactive=$row['highlightsactive'];
if ($highlightsactive==1)
{
?>
<a href="highlights/deactivate-highlights1.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($highlightsactive==0)
{
?>
<a href="highlights/activate-highlights1.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>


<td>
<?php
$pintotop=$row['pintotop'];
if ($pintotop==1)
{
?>
<a href="highlights/deactivate-pintotop.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Unpin</a>
<?php
}
elseif ($pintotop==0)
{
?>
<a href="highlights/activate-pintotop.php?highlightsid=<?php echo $row['highlightsid']; ?>" class="btn btn-success" title="Click here to Activate">Pin</a>
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