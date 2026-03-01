<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_2.AgentID='".$_GET['AgentID']."' AND ch_agents_1.AgentID='".$_GET['AgentID']."' LIMIT 1";

		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) {
	$showsubagents=$row['showsubagents'];
	
	$AgentPlan=$row['AgentPlan']; //
	$MonthlyRecurringFee=$row['MonthlyRecurringFee']; //
	
	$AgentID=$row['AgentID']; //
	$AgentUniqID=$row['AgentUniqID']; //	
	$AgentTitle=$row['AgentTitle'];	//
	$FirstName=$row['FirstName']; //
	$LastName=$row['LastName']; //
	$BusinessName=$row['BusinessName']; //	
	$DisplayName=$row['DisplayName'];	//	
	$NickName=$row['NickName']; //	
	$BirthDate=$row['BirthDate'];//
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
	$License=$row['License']; //	
	$TICOcert=$row['TICOcert'];	 //	
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
	$active=$row['active'];					//				
	$mainnumber=$row['mainnumber'];	
	$OtherAddress=$row['OtherAddress'];					//				
	$BOLNumber=$row['BOLNumber'];
	$RegisteredBusinessName=$row['RegisteredBusinessName'];	//	
	$OtherEmail=$row['OtherEmail'];	//
	$IndexPageTitle=$row['IndexPageTitle'];	//
	$IndexH1=$row['IndexH1'];	//
	$IndexMetaDescription=$row['IndexMetaDescription'];	//
	$IndexCoverImage=$row['IndexCoverImage'];	//
	$IndexHorizontalImage=$row['IndexHorizontalImage'];	//
	$IndexSquareImage=$row['IndexSquareImage'];	//	
	$ACTASaskatchewanLicence=$row['ACTASaskatchewanLicence'];	//	
	
	$AboutPageTitle=$row['AboutPageTitle'];	//
	$AboutH1=$row['AboutH1'];	//
	$AboutMetaDescription=$row['AboutMetaDescription'];	//
	$AboutCoverImage=$row['AboutCoverImage'];	//
	$AboutHorizontalImage=$row['AboutHorizontalImage'];	//
	$AboutSquareImage=$row['AboutSquareImage'];	//	
	
	$AgentPositionTitle=$row['AgentPositionTitle'];	//	
	
	$Slider1Title=$row['Slider1Title'];
	$Slider1Description=$row['Slider1Description'];
	$Slider1Button=$row['Slider1Button'];	
	$Slider2Image=$row['Slider2Image'];
	$Slider2Title=$row['Slider2Title'];
	$Slider2Description=$row['Slider2Description'];
	$Slider2Button=$row['Slider2Button'];								
	$Slider3Image=$row['Slider3Image'];
	$Slider3Title=$row['Slider3Title'];
	$Slider3Description=$row['Slider3Description'];
	$Slider3Button=$row['Slider3Button'];								
	
	$UrlColor=$row['UrlColor'];	
	$AgentChat=$row['AgentChat'];	
	$MondayToFriday=$row['MondayToFriday'];
	$Saturday=$row['Saturday'];
	$Sunday=$row['Sunday'];
	$Holidays=$row['Holidays'];
	
	$mailchimp=$row['mailchimp'];
	
	$AgentProfile=$row['AgentProfile'];	
	$AdditionalAgentProfiles=$row['AdditionalAgentProfiles'];		
		
	$AgentLanguage=$row['AgentLanguage'];	
	
	$BOStreet=$row['BOStreet'];
	$BOCity=$row['BOCity'];
	$BOProvince=$row['BOProvince'];
	$BOPostalcode=$row['BOPostalcode'];	
	$HOGMap=$row['HOGMap'];	
	$BOGMap=$row['BOGMap'];		
	
	$AboutImageDescription=$row['AboutImageDescription'];
	$IndexImageDescription=$row['IndexImageDescription'];
	$AgentInterest1=$row['AgentInterest1'];
	$AgentInterest2=$row['AgentInterest2'];
	$AgentInterest3=$row['AgentInterest3'];
	$AgentInterest4=$row['AgentInterest4'];
	$AgentInterest5=$row['AgentInterest5'];
	$AgentInterest6=$row['AgentInterest6'];
	$AgentInterest7=$row['AgentInterest7'];
	$AgentInterest8=$row['AgentInterest8'];
	$AgentInterest9=$row['AgentInterest9'];
	$AgentInterest10=$row['AgentInterest10'];
	$AgentInterest11=$row['AgentInterest11'];
	$AgentInterest12=$row['AgentInterest12'];
	
	$AgentGateCountry=$row['AgentGateCountry'];
	$AgentGateProvince=$row['AgentGateProvince'];
	$AgentGateCity=$row['AgentGateCity'];	
	$AgentPlacesTravelled=$row['AgentPlacesTravelled'];	
//	$PODLeader=$row['PODLeader'];
	$EmalMarketingURL=$row['EmalMarketingURL'];


     $CommunityCircleRewards=$row['CommunityCircleRewards'];	//
}


include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');


//===============check the selected number=========

	if ($mainnumber==1)//business number
	$che1='checked';
	elseif ($mainnumber==2)// cell number
	$che2='checked';
	else // toll free
	$che3='checked';

//===============displayed cell phone===============
if (!empty($DisplayUseCell))
	$WebNumber=$DisplayUseCell;
else
	$WebNumber=$CellNum;

//==============displayed name=====================
if (!empty($DisplayName))
	$WebName=$DisplayName;
else
	$WebName=$FirstName.' '.$LastName;


//==============displayed city=====================
if (!empty($DisplayUseCity))
	$WebCity=$DisplayUseCity;
else
	$WebCity=$City.', '.$Province;

ob_flush(); 
?>