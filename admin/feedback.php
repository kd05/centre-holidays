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
th {padding:0 10px 0 10px}
input, textarea {border:none}
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

<h3>Customer Reviews </h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">


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
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM ch_feedback ORDER BY FeedID DESC LIMIT $offset,30";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_feedback ORDER BY FeedID DESC";
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
            $y=$y+30;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>

<table style="margin-top:50px">
<tr>
<th>Review ID</th>
<th>Departure Date</th>
<th>Agent</th>
<th>Agent ID</th>
<th>Star Rating</th>
<th>Message</th>
<th></th>
<th></th>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$promoactive=$row['FeedStatus'];
if ($promoactive==0)
$mybakg='style="background:#666 !important"';
elseif ($promoactive==1)
$mybakg='style="background:#fff !important"';

//=======================================================================

	if ($row['AgentID'] !='457')// if this is someone other than centre holidays display their id
	$AgentID=$row['AgentID'];		

?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $row['FeedID']; ?></td>
<td><input id="FeedDeparture" name="FeedDeparture" value="<?php echo $row['FeedDeparture']; ?>" readonly /></td>
<td><input id="FeedAgent" name="FeedAgent" value="<?php echo $row['FeedAgent']; ?>" readonly /></td>
<input type="hidden" id="UFeedID" name="UFeedID" value="<?php echo $row['FeedID']; ?>" readonly /> 
<td><input type="text" id="UAgentID" name="UAgentID" value="<?php echo $AgentID; ?>" style="width:30px" readonly /></td>


<td><input id="FeedExperience" name="FeedExperience" value="<?php echo $row['FeedExperience']; ?>" style="width:50px"  readonly/></td>
<td>
<textarea name="FeedMessage" id="FeedMessage" class='scrollable' readonly>
<?php echo $row['FeedMessage']; ?>
</textarea>
</td>
<td><a href="feedback-details.php?UFeedID=<?php echo $row['FeedID']; ?>" class="btn btn-primary" title="Edit">Edit</a></td>
<td><a href="feedback/delete-feedback.php?UFeedID=<?php echo $row['FeedID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>

<?php

		}
?>

</table>

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