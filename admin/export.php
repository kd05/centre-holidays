<?php ob_start(); ?>
<?php 

$time=time();

$counter=1; // counter

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

 
?>

<table>
    <thead>
      <tr>
      	<th>#</th>
        <th>Agent ID</th>
        <th>Business Number</th>        
        <th>TICO Manager Lic. Number</th>        
        <th>TICO Lic. Number</th>        
        <th>Type</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Business Email</th>
        <th>City</th>
        <th>Province</th>        
        <th>Join Date</th>                          
      </tr>
    </thead>
    <tbody> 

<?php

//OLD QUERY (BEFORE GP UPDATES)
//$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE  ch_agents_1.AgentID=ch_agents_2.AgentID and ch_agents_1.CloseDate='' and ch_agents_1.active=1 ORDER BY ch_agents_1.AgentID ASC";


//Updated query so now will get Active and suspended agents
$sql = "SELECT * FROM ch_agents_1, ch_agents_2 
            WHERE  ch_agents_1.AgentID=ch_agents_2.AgentID 
              and ch_agents_1.CloseDate='' 
              and ( ch_agents_1.active=1 OR ch_agents_1.active !=1) 
            ORDER BY ch_agents_1.AgentID ASC";

$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result)) {
	$AgentID=$row['AgentID']; //	
	$AgentUniqID=$row['AgentUniqID']; //	
	$AgentTitle=$row['AgentTitle'];	//
	$FirstName=$row['FirstName']; //
	$LastName=$row['LastName']; //
	$BusinessName=$row['BusinessName']; //	
	$DisplayName=$row['DisplayName'];	//	
	$NickName=$row['NickName']; //	
	$JoinDate=$row['JoinDate'];//
	$CloseDate=$row['CloseDate'];//
	$Commission=$row['Commission'];//			
	$Street=$row['Street'];//
	$Unit=$row['Unit'];//		
	$City=$row['City']; //
	$Province=$row['Province'];	//	
	$DisplayUseCity=$row['DisplayUseCity'];	//		
	$PostalCode=$row['PostalCode']; //
	$ShippingNotes=$row['ShippingNotes']; //	
	$AgentType=$row['AgentType']; //	
	$HomeNum=$row['HomeNum']; //	
	$BusinessNum=$row['BusinessNum']; //
	$CellNum=$row['CellNum']; //
	$DisplayUseCell=$row['DisplayUseCell'];	//
	$FaxNum=$row['FaxNum']; //
	$TollFreeNum=$row['TollFreeNum']; //
	$PersonalEmail=$row['PersonalEmail'];	//
	$SkypeID=$row['SkypeID']; //
	$BusinessEmail=$row['BusinessEmail']; //
	$OtherWebsite=$row['OtherWebsite'];//
	$Website=$row['Website'];//	
	$MyAccount=$row['MyAccount'];//
	$HoursOp=$row['HoursOp'];//	
	$Password=$row['Password']; //
	$PasswordHashed=$row['PasswordHashed'];	//	
	$AboutImg=$row['AboutImg']; //
	$License=$row['License']; // TICO Lic. Number	
	$TICOcert=$row['TICOcert'];	 //	TICO Manager Lic. Number
	$BCNumber=$row['BCNumber']; //	
	$Recruiter=$row['Recruiter']; //
	$GoogleDriveURL=$row['GoogleDriveURL']; //													
	$Notes=$row['Notes'];	//	
	$AgentAnalytics=$row['AgentAnalytics'];	//								
	$Image=$row['Image'];	//
	$LogoImage=$row['LogoImage'];	//
	$LogoIcon=$row['LogoIcon'];	//
	$LogoTextImage=$row['LogoTextImage'];	//								
	$Description=$row['Description'];	//								
	$EmailID=$row['EmailID'];	//															
	$HoursOpHTML=$row['HoursOpHTML']; //
	$TimeZone=$row['TimeZone'];		//														
	$GooglePlus=$row['GooglePlus'];		//							
	$YouTube=$row['YouTube'];				//					
	$FaceBook=$row['FaceBook'];//
	$Twitter=$row['Twitter'];	//								
	$LinkedIn=$row['LinkedIn'];		//							
	$Blog=$row['Blog'];					//		
	$Pinterest=$row['Pinterest'];			//														
	$Instagram=$row['Instagram'];//
	$TikTok=$row['TikTok'];//
	$mailchimpuser=$row['mailchimpuser'];	//
	$mailchimpid=$row['mailchimpid'];			//						
	$active=$row['active'];
	$mainnumber=$row['mainnumber'];	
	$OtherAddress=$row['OtherAddress'];
	$BOLNumber=$row['BOLNumber'];	//Branch Office Licence Number	
	$RegisteredBusinessName=$row['RegisteredBusinessName'];	
	
	//=====================================================================================================================
	$IndexPageTitle=$row['IndexPageTitle'];	// at the top 
	$IndexH1=$row['IndexH1'];	// the agent bold descp
	$IndexMetaDescription=$row['IndexMetaDescription'];	//
	$IndexCoverImage=$row['IndexCoverImage'];	//
	$IndexHorizontalImage=$row['IndexHorizontalImage'];	//
	$IndexSquareImage=$row['IndexSquareImage'];	//		
	
	//=======================================================================================================================
	$Name=$row['FirstName'].' '.$row['LastName']; //================= full name 
	//$Address= $row['Unit']." ".$row['Street'].", ".$row['City'].", ".$row['Province']." ".$row['PostalCode']; // full address
	

?>
<tr>
<td>
<?php echo $counter++ ?> 
</td>
<td>
<?php echo $AgentID ?>
</td>
<td>
<?php echo $BusinessNum ?>
</td>
<td>
<?php echo $TICOcert ?>
</td>
<td>
<?php echo $License ?>
</td>
<td>
<?php echo $AgentType ?>
</td>
<td>
<?php echo $FirstName ?>
</td>
<td>
<?php echo $LastName ?>
</td>
<td>
<?php echo $BusinessEmail ?>
</td>
<td>
<?php echo $City ?>
</td>
<td>
<?php echo $Province ?>
</td>
<td>
<?php echo $JoinDate ?>
</td>
</tr>

<?

$fsubtotal=$fsubtotal+$subtotal;
								  	
			  }

mysqli_close($conn);	

?>
</tbody></table> 
 
<?php
// The function header by sending raw excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=agents_list_".date("Y_m_d").".xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
 

 
mysqli_close($conn);

?>

<? ob_flush(); ?>