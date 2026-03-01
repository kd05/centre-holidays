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

<h3>Promos</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<?php //include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code-meaning.php'); ?>
<?php

switch ($_GET['ord']) {
    case "1":
        $ord='promocode';
        $ordvalue='Promo Code &uarr;';
		$Dir='ASC';					
        break;
    case "2":
        $ord='promotitle';
        $ordvalue='Title &uarr;';	
		$Dir='ASC';				
        break;	
    case "3":
        $ord='promotimestamp';
        $ordvalue='Recently Modified &darr;';	
		$Dir='DESC';		
        break;												
    default:
        $ord='promiid';
        $ordvalue='Recently Added &darr;';	
		$Dir='DESC';
		$_GET['ord']=3;	
}


//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM promos ORDER BY promopintop DESC, ".$ord." ".$Dir." LIMIT $offset, 60";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM promos ORDER BY promopintop DESC, ".$ord." ASC";
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
            $y=$y+60;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
<p>Currently Ordered By </p>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
<select onchange="this.form.submit()" name="ord" id="ord">
<option value="<?php echo $_GET['ord']; ?>"><?php echo $ordvalue ?></option>
<?php if ($_GET['ord'] !=1 && isset($_GET['ord'])) echo "<option value='1'>Promo Code  &uarr;</option>"; ?>
<?php if ($_GET['ord'] !=2) echo "<option value='2'>Title &uarr;</option>"; ?>
<?php if ($_GET['ord'] !=3) echo "<option value='3'>Recently Added or Modified &darr;</option>"; ?>
</select>
</form>
<hr />
            
<table style="margin-top:10px">
<tr>
<th>Thumb</th>
<th>Website</th>
<th>Promo Code</th>
<th>Promo Title</th>
<th>Depart From</th>
<th>Expiry Date</th>
<th>Agent ID</th>
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
$promoexptime=$row['promoexptime'];// expiry timestamp
$differtimestamps=$promoexptime-$todaystimestamp; // difference in timestamps
//==========================================================================
$promoactive=$row['promoactive'];

if ($promoactive==0 || ($differtimestamps < 0 && !empty($promoexptime)))
$mybakg='style="background:#666 !important"';
else
$mybakg='style="background:#fff !important"';



	// identify the website and properly display the images.
	if ($row['promowebsites']=='2')
	{
		$url='https://www.centreholidays.com';
	}
	else
	{
		$url='https://'.$_SERVER[HTTP_HOST];
	}


$promoactive=$row['promoactive'];
$promopintop=$row['promopintop'];
?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td>
<?php if (!empty($row['promosquarethumb'])) { ?>
<img src="<?php echo $url ?>/img/special-offers/<?php echo $row['promosquarethumb']; ?>" style="max-width:100px; max-height:100px; margin-bottom:10px" />
<?php } ?>
</td>
<td><?php echo $row['promocode']; ?></td>
<td><?php 

if ($row['promowebsites'] == 1)
echo '<strong>Epik</strong>';
elseif ($row['promowebsites'] == 2)
echo '<strong>CH</strong>';
elseif ($row['promowebsites'] == 3)
echo '<strong>Epik & CH</strong>'; 


?></td>
<td style="text-align:left !important"><?php echo $row['promotitle']; ?></td>
<td style="text-align:left !important"><?php echo $row['promodepartfrom']; ?></td>
<td><?php echo date('F dS Y', (strtotime($row['promoexpirydate'])))?></td>
<td><?php echo str_replace(',', "", $row['AgentID']) ?></td>
<td><a href="promos-edit.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>
<td>
<?php
if ($promoactive==1)
{
?>
<a href="promos/deactivate-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($promoactive==0)
{
?>
<a href="promos/activate-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>

<td>
<?php
if ($promopintop==1)
{
?>
<a href="promos/deactivate-promopintotop.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-warning" title="Click her to Deactivate">Unpin</a>
<?php
}
elseif ($promopintop==0)
{
?>
<a href="promos/activate-promopintotop.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-success" title="Click here to Activate">Pin</a>
<?php
}
?>
</td>



<td><a href="promos/delete-promos.php?promiid=<?php echo $row['promiid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
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