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

<h3>Certificates</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM ch_certifications ORDER BY Title ASC LIMIT $offset, 100";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_certifications ORDER BY Title ASC";
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
        
<table style="margin-top:10px">
<tr>
<th>Certificate ID</th>
<th>Title</th>
<th>ThumbImageURL</th>
<th>Edit</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$active=$row['active'];
if ($active==0)
$mybakg='style="background:#666 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';


?>

<tr class="selectedtr" <?php echo $mybakg ?>>

<td><?php echo $row['CID']; ?></td>
<td><?php echo $row['Title']; ?></td>
<td>
<?php if (!empty($row['ThumbImageURL'])) {  
$ThumbImageURL=$row['ThumbImageURL']; // example /img/certifications/adventure-island.jpg

$certimage='https://centreholidays.com//'.$ThumbImageURL; 

$newcertimage='https://centreholidays.com/img/agents/certifications/'.$row['ThumbImageURL'];
?>
<img src="<?php echo $certimage ?>" onError="this.onerror=null;this.src='<?php echo $newcertimage ?>';" alt="<?php echo $row['AltTag']; ?>" style="width:100px; height:100px; border:1px solid #CCC" />
<?php 
} 
?>
</td>

<td><a href="certificates-details.php?CID=<?php echo $row['CID']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="certificates/deactivate-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($active==0)
{
?>
<a href="certificates/activate-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="certificates/delete-certificates.php?CID=<?php echo $row['CID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
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