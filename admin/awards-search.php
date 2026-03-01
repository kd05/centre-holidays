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
.custom-radio {margin:0 10px 0  10px}
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

 <h3>Search for a Centre Holidays Agent</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data">
    <input type="text" value="<?php echo $_GET['codelook'] ?>" id="codelook" name="codelook" placeholder="Search for an Agent" class="form-control" />

	<br />

<p>Refine your search</p>

<?php

switch ($_GET['radio']) {
    case "1":
        $checked1='checked';
        break;
    case "2":
        $checked2='checked';
        break;
    case "3":
        $checked3='checked';
        break;
    case "4":
        $checked4='checked';
        break;
    case "5":
        $checked5='checked';
        break;
    case "6":
        $checked6='checked';
        break;
    case "7":
        $checked7='checked';
        break;
    case "8":
       $checked8='checked';
        break;
    case "9":
       $checked9='checked';
        break;
    case "10":
        $checked10='checked';
        break;
    case "11":
       $checked11='checked';
        break;
    case "12":
       $checked12='checked';
        break;
    case "13":
       $checked13='checked';
        break;	
    case "14":
       $checked14='checked';
        break;		
    case "15":
       $checked15='checked';
        break;												
    default:
        $checked0='checked';
}

?>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="0" class="custom-control-input" <?php echo $checked0 ?>>
<span class="custom-control-description">Everything</span>
</label>

<label class="custom-control custom-radio">
<input id="radio1" name="radio" type="radio" value="13" class="custom-control-input" <?php echo $checked13 ?>>
<span class="custom-control-description">Agent ID</span>
</label>

<label class="custom-control custom-radio">
<input id="radio1" name="radio" type="radio" value="12" class="custom-control-input" <?php echo $checked12 ?>>
<span class="custom-control-description">Business Name</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="1" class="custom-control-input" <?php echo $checked1 ?>>
<span class="custom-control-description">Name (First/Last/Display/Nickname) </span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="2" class="custom-control-input" <?php echo $checked2 ?>>
<span class="custom-control-description">Email</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="3" class="custom-control-input" <?php echo $checked3 ?>>
<span class="custom-control-description">Commission</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="14" class="custom-control-input" <?php echo $checked14 ?>>
<span class="custom-control-description">City</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="4" class="custom-control-input" <?php echo $checked4 ?>>
<span class="custom-control-description">Province</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="5" class="custom-control-input" <?php echo $checked5 ?>>
<span class="custom-control-description">Agent Type</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="6" class="custom-control-input" <?php echo $checked6 ?>>
<span class="custom-control-description">Phone (Home/Cell/Business/Toll)</span>
</label>

<!--<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="7" class="custom-control-input" <?php //echo $checked7 ?>>
<span class="custom-control-description">Skyp ID</span>
</label>-->

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="8" class="custom-control-input" <?php echo $checked8 ?>>
<span class="custom-control-description">Website/Other Websites</span>
</label>

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="9" class="custom-control-input" <?php echo $checked9 ?>>
<span class="custom-control-description">Notes</span>
</label>

<!--<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="10" class="custom-control-input" <?php //echo $checked10 ?>>
<span class="custom-control-description">Shipping Notes</span>
</label>-->

<label class="custom-control custom-radio">
<input id="radio2" name="radio" type="radio" value="15" class="custom-control-input" <?php echo $checked15 ?>>
<span class="custom-control-description">Join Date</span>
</label>


<br /><br />
<input type="submit" class="btn-primary btn-lg btn" value="Search" />
</form>
    
    <hr />


<?php

//===============================list trips==================================
	
		$sql = "SELECT * FROM ch_agents WHERE ";
		
		if ($_GET['radio']=='13' || $_GET['radio']=='0')
		$sql .= " AgentID LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";
				
		if ($_GET['radio']=='1' || $_GET['radio']=='0')		 
		$sql .= " FirstName LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0' || $_GET['radio']=='1')
		$sql .= " || ";		
		
		if ($_GET['radio']=='1' || $_GET['radio']=='0')		 
		$sql .= "LastName LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		 
		
		if ($_GET['radio']=='12' || $_GET['radio']=='0')		
		$sql .= " BusinessName LIKE '%".$_GET['codelook']."%' "; 
		
		if ($_GET['radio']=='0' || $_GET['radio']=='1')
		$sql .= " || ";
				
		if ($_GET['radio']=='1' || $_GET['radio']=='0')		
		$sql .= " DisplayName LIKE '%".$_GET['codelook']."%' "; 
		
		if ($_GET['radio']=='0' || $_GET['radio']=='1')
		$sql .= " || ";		
		
		if ($_GET['radio']=='1' || $_GET['radio']=='0')			
		$sql .= " NickName LIKE '%".$_GET['codelook']."%' "; 
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='2' || $_GET['radio']=='0')		
		$sql .= " BusinessEmail LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='3' || $_GET['radio']=='0')		 
		$sql .= " Commission LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='14' || $_GET['radio']=='0')		 
		$sql .= " City LIKE '%".$_GET['codelook']."%'	 "; 
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='4' || $_GET['radio']=='0')		
		$sql .= " Province LIKE '%".$_GET['codelook']."%'";			
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='5' || $_GET['radio']=='0')		 
		$sql .= " AgentType LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='6' || $_GET['radio']=='0')		 	
		$sql .= " HomeNum LIKE '%".$_GET['codelook']."%' "; 
		
		if ($_GET['radio']=='0' || $_GET['radio']=='6')
		$sql .= " || ";		
		
		if ($_GET['radio']=='6' || $_GET['radio']=='0')		
		$sql .= " BusinessNum LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0' || $_GET['radio']=='6')
		$sql .= " || ";		
		
		if ($_GET['radio']=='6' || $_GET['radio']=='0')		 	
		$sql .= " CellNum LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0' || $_GET['radio']=='6')
		$sql .= " || ";		
		
		if ($_GET['radio']=='6' || $_GET['radio']=='0')		 
		$sql .= " DisplayUseCell LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0' || $_GET['radio']=='6')
		$sql .= " || ";		
		
		if ($_GET['radio']=='6' || $_GET['radio']=='0')		 	
		$sql .= " TollFreeNum LIKE '%".$_GET['codelook']."%' "; 
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='7' || $_GET['radio']=='0')			
		$sql .= " SkypeID LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='8' || $_GET['radio']=='0')		 	
		$sql .= " Website LIKE '%".$_GET['codelook']."%' ";
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='9' || $_GET['radio']=='0')		 
		$sql .= " Notes LIKE '%".$_GET['codelook']."%' ";			
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='10' || $_GET['radio']=='0')		 
		$sql .= " ShippingNotes LIKE '%".$_GET['codelook']."%' ";			
		
		if ($_GET['radio']=='0')
		$sql .= " || ";		
		
		if ($_GET['radio']=='11' || $_GET['radio']=='0')		 
		$sql .= " License LIKE '%".$_GET['codelook']."%' ";			
		
		if ($_GET['radio']=='0' || $_GET['radio']=='11')
		$sql .= " || ";		
		
		if ($_GET['radio']=='11' || $_GET['radio']=='0')		 
		$sql .= " TICOcert LIKE '%".$_GET['codelook']."%' ";			
		
		if ($_GET['radio']=='0' || $_GET['radio']=='11')
		$sql .= " || ";		
		
		if ($_GET['radio']=='11' || $_GET['radio']=='0')		 
		$sql .= " BCNumber LIKE '%".$_GET['codelook']."%' ";		
	
		if ($_GET['radio']=='0')
		$sql .= " || ";	
	
		if ($_GET['radio']=='15' || $_GET['radio']=='0')		 
		$sql .= " JoinDate LIKE '%".$_GET['codelook']."%' ";																								 	
		
		if ($_GET['radio']=='4'  || $_GET['radio']=='14')	
		$sql .= " AND active='1' ";			
		
		$sql .= "ORDER BY AgentID DESC";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			
	if ($row_cnt > 0 && !empty($_GET['codelook']))// display results in case the feedback table is not empty
	{
		echo 'Results found '.$row_cnt;

?>
            
<table style="margin-top:10px">
<tr>
<th>Agent ID</th>
<th>Business Name</th>
<th>Contact Name</th>
<th>City</th>
<th>Province</th>
<th>JoinDate</th>
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
<td><?php echo $row['AgentID']; ?></td>
<td><?php echo $row['BusinessName']; ?></td>
<td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
<td><?php echo $row['City']; ?></td>
<td><?php echo $row['Province']; ?></td>
<td><?php echo $row['JoinDate']; ?></td>
<td><a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-primary" title="Edit Details">Edit</a></td>

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