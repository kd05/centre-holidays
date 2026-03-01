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

<h3>Centre Holidays Agents</h3>
<a href="export-terminated.php" class="btn btn-primary"> <span>List of terminated Agents (Excel)</span> </a>
<br /><br />
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<?php

switch ($_GET['ord']) {
    case "1":
        $ord='FirstName';
        $ordvalue='First Name &uarr;';		
        break;
    case "2":
        $ord='AgentID';
        $ordvalue='Agent ID &uarr;';		
        break;
    case "3":
        $ord='BusinessName';
        $ordvalue='Business Name &uarr;';		
        break;												
    default:
        $ord='FirstName';
        $ordvalue='First Name  &uarr;';	
		$_GET['ord']=1;	
}


//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	 
		$sql = "SELECT * FROM ch_agents_1 WHERE active !=1 AND CloseDate !='' ORDER BY ".$ord." ASC LIMIT $offset, 500";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_agents_1 ORDER BY ".$ord." ASC";
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
		$cpage=$offset/100+1;
		
        $x = 1; 
        $y = 0;
        do {
		if ($cpage==$x)
		$background='style="background:#ccc"';
		else
		$background='style="background:#fff"';
			?>
            <li style="list-style:none; float:left; margin-left:5px;">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>&ord=<?php echo $_GET['ord'] ?>" <?php echo $background ?>><?php echo $x ?></a>
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
<p>Currently Ordered By </p>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
<select onchange="this.form.submit()" name="ord" id="ord">
<option value="<?php echo $_GET['ord']; ?>"><?php echo $ordvalue ?></option>
<?php if ($_GET['ord'] !=1 && isset($_GET['ord'])) echo "<option value='1'>First Name  &uarr;</option>"; ?>
<?php if ($_GET['ord'] !=2) echo "<option value='2'>Agent ID  &uarr;</option>"; ?>
<?php if ($_GET['ord'] !=3) echo "<option value='3'>Business Name  &uarr;</option>"; ?>
</select>
</form>
<hr />
            
<table style="margin-top:10px">
<tr>
<th>Agent ID</th>
<th>Type</th>
<th>Contact Name</th>
<th>Address</th>
<th>JoinDate</th>
<th>Edit</th>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<th>Status</th>
<th>Delete</th>
<?php } ?>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$active=$row['active'];
$CloseDate=$row['CloseDate'];
if ($active==0 && empty($CloseDate))
$mybakg='style="background:#666 !important"';
elseif ($active==0 && !empty($CloseDate))
$mybakg='style="background:#C30 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';


if ($row['AgentType']=='Primary')
$bgcolor='#FF3';
elseif ($row['AgentType']=='Partner')
$bgcolor='#CFF';
else
$bgcolor='#fff';


?>

<tr class="selectedtr" <?php echo $mybakg ?>>
<td><?php echo $row['AgentID']; ?></td>
<td style="background:<?php echo $bgcolor ?>"><?php echo $row['AgentType']; ?></td>
<td style="text-align:left !important"><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td style="text-align:left !important">
<?php echo $row['Unit']; if(!empty($row['Unit'])) echo ","; ?> 
<?php echo $row['Street']; if(!empty($row['Street'])) echo ","; ?> 
<?php echo $row['City']; if(!empty($row['City'])) echo ","; ?> 
<?php echo trim($row['Province']); if(!empty($row['PostalCode'])) echo ", ";  echo $row['PostalCode']; ?>
</td>
<td><?php echo $row['JoinDate']; ?></td>
<td><a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>

<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<td>
<?php
$active=$row['active'];
if ($active==1)
{
?>
<a href="ch-agents/deactivate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
<?php
}
elseif ($active==0)
{
?>
<a href="ch-agents/activate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-success" title="Click here to Activate">Activate</a>
<?php
}
?>
</td>
<td><a href="ch-agents/delete-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>

<?php } ?>

</tr>

<?php

		}
?>

</table>
	   <ul class="pagination">
        <?php 
		$cpage=$offset/100+1;
		
        $x = 1; 
        $y = 0;
        do {
		if ($cpage==$x)
		$background='style="background:#ccc"';
		else
		$background='style="background:#fff"';
			?>
            <li style="list-style:none; float:left; margin-left:5px;">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>&ord=<?php echo $_GET['ord'] ?>" <?php echo $background ?>><?php echo $x ?></a>
            </li>     
            <?php
            $y=$y+100;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 
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