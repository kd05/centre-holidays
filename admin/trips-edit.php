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

<h3>Edit/Delete/Activate/Deactivate Trips</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM trips ORDER BY tripspintop DESC, tunique_id DESC LIMIT $offset, 60";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM trips ORDER BY tripspintop DESC, tunique_id DESC ";
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
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>"><?php echo $x ?></a>
            </li>     
            
            <?php
            $y=$y+60;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{


?>
            
<table style="margin-top:10px">
<tr>
<th>Trip Code</th>
<th>Square Thumbnail</th>
<th>Website</th>
<th>Title</th>
<th>Assigned CH Agent</th>
<th>Edit</th>
<th>Status</th>
<th>Pin to Top</th>
<th>Delete</th>
</tr>
<?php

$todaystimestamp=time();// current timestamp

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

// expiry time and active or not change background color====================
$texpiry=$row['texpiry'];// expiry timestamp
$differtimestamps=$texpiry-$todaystimestamp; // difference in timestamps
//==========================================================================
$active=$row['active'];

if ($active==0 || ($differtimestamps < 0 && !empty($texpiry)))
$mybakg='style="background:#666 !important"';
else
$mybakg='style="background:#fff !important"';


	// Ssign color to each website
	$website=$row['twebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');

?>
<form action="trips-editdetails.php" method="post" enctype="multipart/form-data">

<tr class="selectedtr" <?php echo $mybakg ?> >
<input type="hidden" id="tid" name="tid" value="<?php echo $row['tid']; ?>"/>
<td>
<strong><?php echo $row['tcode']; ?></strong>
<input type="hidden" id="tcode" name="tcode" value="<?php echo $row['tcode']; ?>" class="form-control" placeholder="Trip Code"/></td>
<td>
<?php 

if ($row['twebsite'] == 1)
$mainlink='https://www.epikescapes.com/';
elseif ($row['twebsite'] == 2)
$mainlink='https://www.centreholidays.com/';
elseif ($row['twebsite'] == 3)
$mainlink='https://www.epikescapes.com/'; 

//=======================================================
if (!empty($row['squarethumb']))
{
?>
<a href="<?php echo $mainlink."img/trips/".$row['squarethumb']; ?>">
<img src="<?php echo $mainlink."img/trips/".$row['squarethumb']; ?>" style="width:100px; height:100px;" />
</a>
<?php
}
?>

</td>

<td>

<?php 

if ($row['twebsite'] == 1)
echo '<strong>Epik</strong>';
elseif ($row['twebsite'] == 2)
echo '<strong>CH</strong>';
elseif ($row['twebsite'] == 3)
echo '<strong>Epik & CH</strong>';
?>
</td>
<td><input type="text" id="ttitle" readonly name="ttitle" value="<?php echo $row['ttitle']; ?>" class="form-control" placeholder="Title"/></td>
<td><input type="text" id="AgentID" readonly name="AgentID" value="<?php echo $row['AgentID']; ?>" class="form-control" placeholder="Agent ID" /></td>

<td><a href="trips-editdetails.php?tid=<?php echo $row['tid']; ?>" class="btn btn-primary" title="Click her to Edit">Edit</a></td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<td><a href="trips/deactivate-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a></td>
<?php
}
elseif ($active==0)
{
?>
<td><a href="trips/activate-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a></td>
<?php
}
?>

<td>
<?php
$tripspintop=$row['tripspintop'];
if ($tripspintop==1)
{
?>
<a href="trips/deactivate-pintotop.php?tid=<?php echo $row['tid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Unpin</a>
<?php
}
elseif ($tripspintop==0)
{
?>
<a href="trips/activate-pintotop.php?tid=<?php echo $row['tid']; ?>" class="btn btn-success" title="Click here to Activate">Pin</a>
<?php
}
?>
</td>

<td><a href="trips/delete-trip.php?tid=<?php echo $row['tid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>
</form>
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