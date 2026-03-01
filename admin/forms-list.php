<?php ob_start(); ?>
<?php
include 'geoplugin.class/index.php';
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
.custom-radio {margin:0 10px 0  10px;}
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
                    

 		<h3>Forms Senders List</h3>
<hr />
<p>Suspecious senders are added to the blacklist.</p> 
<a href="home.php" class="btn btn-primary">Home page</a>
&nbsp;&nbsp;        
<a href="black-list.php" class="btn btn-danger">View Black List</a>
<hr />
<p>Below List of latest forms senders.</p>
<table>
<tr>
    <th>#</th>
    <th>IP</th>
    <th>Time</th>
    <th>Name</th>
    <th>Country</th>
    <th>Area</th>
    <th>City</th>
    <th>Form</th>
    <th>Info</th>
    <th></th>
</tr>
<?php
$coun=1;
		$sql = "SELECT * FROM  formsiplist ORDER BY fltimestamp DESC LIMIT 200";	
		//$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			if ($row['flcountry'] !='Canada')
			$back='#ccc';
			else
			$back='#fff';
		
	?>
    <tr style="background:<?php echo $back ?>">
    <form action="block-form-senders.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $row['flname'] ?>" name="flname" id="flname" readonly />
    <input type="hidden" value="<?php echo $row['flip'] ?>" name="flip" id="flip" readonly />
    <input type="hidden" value="<?php echo $row['flcountry'] ?>" name="flcountry" id="flcountry" readonly />
    <input type="hidden" value="<?php echo $row['flarea'] ?>" name="flarea" id="flarea" readonly />
    <input type="hidden" value="<?php echo $row['flcity'] ?>" name="flcity" id="flcity" readonly />    
    
    <td><?php echo $coun++ ?></td>
    <td><?php echo $row['flip'] ?></td>
    <td><?php echo date('d/m/Y h:i:sa', $row['fltimestamp']) ?></td>
    <td><?php echo $row['flname'] ?></td>
    <td><?php echo $row['flcountry'] ?></td>
    <td><?php echo $row['flarea']; ?></td>
    <td><?php echo $row['flcity'] ?></td>
    <td><?php echo $row['flpage'] ?></td>
    <td style="font-size:10px !important"><?php echo $row['flinfo'] ?></td>
    <td><input type="submit" value="Block" class="btn btn-danger" onclick="return confirm_delete()" /></td>    
    </form>                           
    </tr>
    <?php				

	}
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');


?>
</table>

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