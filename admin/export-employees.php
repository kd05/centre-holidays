<?php ob_start(); ?>
<?php 

$time=time();

$counter=1; // counter

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/opendbi.php');


?>

<table>
    <thead>
      <tr>
        <th>#</th>
        <th>Employee ID</th>
        <th>TICO Licence Number</th>        
        <th>Full Name</th>
        <th>Business Email</th>
        <th>City</th>
        <th>Province</th>
        <th>Join Date</th>                        
        <th>Assigned Agent ID and Full Name</th>                       
      </tr>
    </thead>
    <tbody> 

<?php

$sql = "SELECT * FROM ch_partner_connections 
INNER JOIN ch_agents_1 on ch_agents_1.AgentID = ch_partner_connections.AgentID WHERE ch_partner_connections.active=1 
ORDER BY ch_agents_1.AgentID ASC, ch_partner_connections.PartnerID ASC";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
	
//=======================Get the partner information from the ch_agents DB tabale
//$sql55 = "SELECT * FROM ch_agents WHERE AgentID='".$row['PartnerID']."' LIMIT 1";	
$sql55 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID=ch_agents_2.AgentID AND ch_agents_1.AgentID='".$row['PartnerID']."' LIMIT 1";	  
  
$result55 = mysqli_query($conn, $sql55);	
while($row55 = mysqli_fetch_assoc($result55)) {
	$PartnerTitle=$row55['Title'];	
	$PartnerFName=$row55['FirstName'];
	$PartnerLName=$row55['LastName'];
	
	$PartnerLicense=$row55['License'];
	$PartnerBusinessEmail=$row55['BusinessEmail'];
	$PartnerCity=$row55['City'];
	$PartnerProvince=$row55['Province'];
	$PartnerJoinDate=$row55['JoinDate'];					
		
	$PartnerFullName=$PartnerFName.' '.$PartnerLName;		
}
	
?>
<tr>
<td><?php echo $counter++ ?></td>
<td><?php echo $row['PartnerID']; ?></td>
<td><?php echo $PartnerLicense; ?></td>
<td><?php echo $PartnerFullName; ?></td>
<td><?php echo $PartnerBusinessEmail; ?></td>
<td><?php echo $PartnerCity; ?></td>
<td><?php echo $PartnerProvince; ?></td>
<td><?php echo $PartnerJoinDate; ?></td>
<td><?php echo $row['AgentID'].', '.$row['FirstName'].' '.$row['LastName']; ?></td>
</tr>

<?

$fsubtotal=$fsubtotal+$subtotal;
								  	
			  }

mysqli_close($conn);	

?>
</tbody></table> 
 
<?php
// The function header by sending raw excel
header("Content-type: application/vnd.ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=employee-list-".$time.'-'.date("Y-m-d").".xls");
 
mysqli_close($conn);

?>

<? ob_flush(); ?>