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
                    

 		<h3>Welcome Admin</h3>
<hr />        
<a href="black-list.php" class="btn btn-danger">View Black List</a>
&nbsp;&nbsp;
<a href="forms-list.php" class="btn btn-info">View Form Senders List</a>
<hr />
<p>Please select from the left panel the task you wish to accomplish.</p> 
<hr />
<p>Below List of latest members logged in to Agent Portal.</p>
<table>
<tr>
    <th>counter</th>
    <th>IP</th>
    <th>Country</th>
    <th>Timestamp</th>
    <th>Date and Time (GMT)</th>
    <th>Agent ID</th>
    <th>Business Email</th>
    <th>Full Name</th>
</tr>
<?php
$coun=1;

//SHOULD BE A SEPRATE CROM JOB


		$sql1 = "SELECT * FROM  ch_agents_log_in_suspicious ORDER BY agentlogid DESC LIMIT 200";
		$result1 = mysqli_query($conn, $sql1);	
		$row_cnt = mysqli_num_rows($result1);	

		if ($row_cnt > 0)
		echo "<h3 style='color:#F00'>These emails are associated with several IP locations</h3>";
		else
		echo "";
		
		
		?>
        <ol>
        <?php
		// output data of each row
		while($row1 = mysqli_fetch_assoc($result1)) {
			
			$agentlogid1=$row1['agentlogid'];
			$BusinessEmail1=$row1['BusinessEmail'];
			$agentlogip1=$row1['agentlogip'];
			$agentlogdate1=$row1['agentlogdate'];
			$country_name1=$row1['country_name'];
			$AgentUniqID1=$row1['AgentUniqID'];	
			$FirstName=$row1['FirstName'];	
			$LastName=$row1['LastName'];	
			
		echo "<li style='color:#F00'> ".$BusinessEmail1.' ('.$FirstName.' '.$LastName.', ID: '.$AgentUniqID1.")
		<a href='suspicious-logs-delete.php?agentlogid=".$agentlogid1."' onclick='return confirm_delete()'>&nbsp;Remove</a>
		</li>";
				
		}

		?>
		</ol>
		<hr />
		<?

		$sql = "SELECT * FROM ch_agents_log_in ORDER BY agentlogid DESC LIMIT 200";	
		//$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			if ($row['country_name'] !='Canada')
			$back='#ccc';
			else
			$back='#fff';
		
	?>
    <tr style="background:<?php echo $back ?>">
    <td><?php echo $coun++ ?></td>
    <td><?php echo $row['agentlogip'] ?></td>
    <td><?php echo $row['country_name'] ?></td>
    <td><?php echo $row['agentlogdate'] ?></td>
    <td><?php echo date('d/m/Y - H:i:s', $row['agentlogdate']); ?></td>
    <td><?php echo $row['AgentUniqID'] ?></td>
    <td><?php echo $row['BusinessEmail'] ?></td>
    <td><?php echo $row['FirstName'].' '.$row['LastName'] ?></td>                               
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