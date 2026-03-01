<div id="mytable">
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<br /><br />
<a href="partners.php" class="btn btn-primary">Add Additional Partner</a>
<?php } ?>
</hr />

<?php

//===============================list partners==================================

		$sql = "SELECT * FROM ch_partner_connections 
		INNER JOIN ch_agents_1 on ch_agents_1.AgentID = ch_partner_connections.AgentID 
		WHERE (ch_partner_connections.AgentID='".$_GET['AgentID']."' || ch_partner_connections.PartnerID='".$_GET['AgentID']."' ) AND ch_partner_connections.active=1
		ORDER BY ch_agents_1.AgentID ASC, ch_partner_connections.PartnerID ASC LIMIT 100";

		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result); 
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{
?>
 <hr />
<h3>Employees</h3>       
<table style="margin-top:10px">
<tr>
<th>ID</th>
<th>Name</th>
<th>Type</th>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<th>Delete</th>
<?php } ?>
</tr>
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

//=======================Get the partner information from the ch_agents_1 DB tabale
$sql731 = "SELECT * FROM ch_agents_1 WHERE AgentID='".$row['PartnerID']."' LIMIT 1";	  
$result731 = mysqli_query($conn, $sql731);	
while($row731 = mysqli_fetch_assoc($result731)) {
	$PartnerFName=$row731['FirstName'];
	$PartnerLName=$row731['LastName'];
	$PartnerType=$row731['AgentType'];	

}


//=======================Get the main agent information from the ch_agents_1 DB tabale
$sql731 = "SELECT * FROM ch_agents_1 WHERE AgentID='".$row['AgentID']."' LIMIT 1";	  
$result731 = mysqli_query($conn, $sql731);	
while($row731 = mysqli_fetch_assoc($result731)) {
	$MPartnerFName=$row731['FirstName'];
	$MPartnerLName=$row731['LastName'];
	$MPartnerType=$row731['AgentType'];	
}

?>

<tr class="selectedtr">

<?php
if ($_GET['AgentID']==$row['PartnerID']){
	$ConnectionID=$row['AgentID']; 
	$PartnerFullName=$MPartnerFName.' '.$MPartnerLName;	
	$type='<strong>'.$MPartnerType.'</strong>';
}else{
	$ConnectionID=$row['PartnerID'];
	$PartnerFullName=$PartnerFName.' '.$PartnerLName;		
	$type='<strong>'.$PartnerType.'</strong>';			
}
?>

<td><?php echo $ConnectionID ?></td>
<td>
<a href="ch-agent-details.php?AgentID=<?php echo $ConnectionID; ?>" class="btn btn-info" title="<?php echo $PartnerFullName ?>" style="width:100%; text-align:left">
<?php echo $PartnerFullName ?>
</a>
</td>
<td><?php echo $type ?></td>
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<td><a href="ch-agents/delete-agents-partners.php?ConID=<?php echo $row['ConID']; ?>&AgentID=<?php echo $_GET['AgentID'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
<?php } ?>
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


<?php
//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	 
		$sql = "SELECT * FROM ch_partners WHERE AgentID='".$_GET['AgentID']."'ORDER BY PFirstName";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = "SELECT * FROM ch_partners ORDER BY AgentID ASC";
		$Tresult  = mysqli_query($conn, $Tsql);
		$Trow_cnt = mysqli_num_rows($Tresult);		
	
		if (isset($_GET['pages']))
		$pages=$_GET['pages'];
		else
		$pages=ceil($Trow_cnt/$row_cnt);
  
		$Net_cnt=$Trow_cnt-$offset;
	
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<hr />
<h3>Non-Paying Partners</h3>
<table style="background:#FFF">
<tr>
<th>PID</th>
<th>Title</th>
<th>First Name</th>
<th>Last Name</th>
<th>Business Phone</th>
<th>Business Email</th>
<th>TICO</th>
<th>Assigned Agent ID and Full Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
?>
<tr>
<td><?php echo $row['PID']; ?></td>
<td><?php echo $row['PTitle']; ?></td>
<td><?php echo $row['PFirstName']; ?></td>
<td><?php echo $row['PLastName']; ?></td>
<td><?php echo $row['PBusinessPhone']; ?></td>
<td><?php echo $row['PBusinessEmail']; ?></td>
<td><?php echo $row['PTICOLicenceNumber']; ?></td>
<td>
<a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID'] ?>" class="btn btn-info">
<?php echo 'Agent ID # '.$row['AgentID'].', '.$row['FirstName'].' '.$row['LastName']; ?>
</a>
</td>
<td><a href="unpaid-partners-editdetails.php?PUniqID=<?php echo $row['PUniqID']; ?>" class="btn btn-primary" title="Edit" style="width:100%">Edit</a></td>
<td><a href="partners/delete-unpaid-partner.php?PID=<?php echo $row['PID']; ?>&AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()" style="width:100%">Delete</a></td>
</tr>
<?php
		}

?>
</table>
<?php		
		
	}
?>
</div>