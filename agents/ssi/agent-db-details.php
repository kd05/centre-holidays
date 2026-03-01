<? ob_start(); ?>
<?php
session_start();

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


$AgentID=$_COOKIE['AgentUniqID'];

//-----------------------GET THE AGENT ID BASED ON SUB-DOMAIN-----------------------------
$sql809 = "SELECT * FROM ch_agents_1 WHERE AgentUniqID='".$_COOKIE['AgentUniqID']."' LIMIT 1";
$result809 = mysqli_query($conn, $sql809);
while($row809 = mysqli_fetch_assoc($result809)) {
	 $AgentID=$row809['AgentID']; //
 }

//-----------------------------read from the first table----------------------------------
$sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID='".$AgentID."' AND ch_agents_2.AgentID=ch_agents_1.AgentID LIMIT 1";
$result = mysqli_query($conn, $sql);
// output data of each row
 while($row = mysqli_fetch_assoc($result)) {
	$showsubagentsdb=$row['showsubagents']; //
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
	$AgentPlan=$row['AgentPlan'];//
	$Commission=$row['Commission'];//
	$MonthlyRecurringFee=$row['MonthlyRecurringFee'];//			
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
	$PODLeader=$row['PODLeader']; //	
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
	$mailchimpuser=$row['mailchimpuser'];	//								
	$mailchimpid=$row['mailchimpid'];			//						
	$active=$row['active'];
	$mainnumber=$row['mainnumber'];	
	$OtherAddress=$row['OtherAddress'];
	$BOLNumber=$row['BOLNumber'];	//Branch Office Licence Number	
	$RegisteredBusinessName=$row['RegisteredBusinessName'];
	$MondayToFriday=$row['MondayToFriday'];	//Hours Of Operation
	$Saturday=$row['Saturday'];	//Hours Of Operation
	$Sunday=$row['Sunday'];	//Hours Of Operation
	$Holidays=$row['Holidays'];	//Hours Of Operation
	
	$IndexPageTitle=$row['IndexPageTitle'];	// at the top 
	$IndexH1=$row['IndexH1'];	// the agent bold descp
	$IndexMetaDescription=$row['IndexMetaDescription'];	//
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
	
	//=======================slider part========================
	$IndexCoverImage=$row['IndexCoverImage'];	//	
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
	$AgentChat=trim($row['AgentChat']);	
	
	$AgentProfile=$row['AgentProfile'];	
	$AdditionalAgentProfiles=$row['AdditionalAgentProfiles'];	
	
	$mailchimp=$row['mailchimp'];
	$mailchimpname=$row['mailchimpname'];


	if (empty($row['AgentLanguage']))	
	$AgentLanguage='English';	
	else
	$AgentLanguage=$row['AgentLanguage'];	
	
	$BOStreet=$row['BOStreet'];
	$BOCity=$row['BOCity'];
	$BOProvince=$row['BOProvince'];
	$BOPostalcode=$row['BOPostalcode'];	
	
	$HOGMap=$row['HOGMap'];// Home office map
	$BOGMap=$row['BOGMap'];// Branch office map
	
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
	$OtherEmail=$row['OtherEmail'];	//	
	
					
}


//=========================================================================================
//===================CODES ADDED AFTER OCTOBER 20, 2020====================================
//=========================================================================================
//=======================================change the customer-reviews.php title=============


//=======================Page name ie index.php============================================
$currentpage=trim(basename($_SERVER['PHP_SELF']));


//================================Pages Titles=============================================
if (!empty($BusinessName))
$TagTitle=$BusinessName;
elseif (!empty($DisplayName))
$TagTitle=$DisplayName;
else
$TagTitle='Centre Holidays';


//==================================For Index Page Index Page Title=========================	
if (empty($AgentID))
$IndexPageTitle='Vacations, Cruises, Tours, Flights & More!';
elseif (!empty($AgentID) && empty($IndexPageTitle))
$IndexPageTitle='Vacations, Cruises, Tours, Flights & More!';
elseif (!empty($AgentID) && !empty($IndexPageTitle))
$IndexPageTitle=$IndexPageTitle;


//IndexH1====================================================================================
if (!empty($IndexH1))
$NewIndexH1=$IndexH1;
elseif (!empty($BusinessName))
$NewIndexH1='A World Of Wonder & Discovery Awaits You With '.$BusinessName;
elseif (!empty($DisplayName))
$NewIndexH1=' A World Of Wonder & Discovery Awaits You With '.$DisplayName;
else
$NewIndexH1='A World Of Wonder & Discovery Awaits You!';

//H1, Meta Description and Facebook Meta Description==========================================
if (empty($AgentID))
$NewIndexMetaDescription="Since 2003, we've been helping Canadian travellers get away on their dream trips. We are truly committed to making your travel experience the best it can be.";
elseif (!empty($AgentID) && empty($IndexMetaDescription))
$NewIndexMetaDescription='When travelling, dare to be different and try something new! From beach holidays to tailor made trips in exotic places, there is so much out there to discover.';
elseif (!empty($AgentID) && !empty($IndexMetaDescription))
$NewIndexMetaDescription=$IndexMetaDescription;


//Facebook image===============================================================================
if (empty($AgentID))
$FacebookImage='https://centreholidays.com/img/index-h01-mauritius-africa.jpg';
elseif (!empty($AgentID) && !empty($IndexHorizontalImage))
$FacebookImage='https://centreholidays.com/img/agents/'.$AgentID.'/'.$IndexHorizontalImage;
elseif (!empty($AgentID) && empty($IndexHorizontalImage))
$FacebookImage='https://centreholidays.com/img/index-h01-mauritius-africa.jpg';


//Profile <TITLE> Tag===========================================================================
if (empty($AgentID))
$AboutPageTitle='Company Profile | Centre Holidays';
elseif (!empty($AgentID) && empty($AboutPageTitle))
$AboutPageTitle='Profile | '.$TagTitle;
elseif (!empty($AgentID) && !empty($AboutPageTitle))
$AboutPageTitle=$AboutPageTitle;


//Check if this agent has assigned partners other than Non-Paying Partner=====================
$sql09003 = "SELECT * FROM ch_agents, ch_partner_connections WHERE ch_agents.AgentID='".$AgentID."' and ch_agents.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 and ch_agents.AgentType !='Non-Paying Sub-Agent' and ch_agents.AgentType !='Non-Paying Partner'";
$result09003 = mysqli_query($conn, $sql09003);
$counter09003=mysqli_num_rows($result09003);// number of results

if ($counter09003 > 0) {
	
while($row09003 = mysqli_fetch_assoc($result09003)) {
	
$PartnerID0900=$row09003['PartnerID']; //
$sql99999 = "SELECT * FROM ch_agents WHERE AgentID ='".$PartnerID0900."' AND (showsubagents=1 || showsubagents='') AND AgentType !='Non-Paying Sub-Agent' AND AgentType !='Non-Paying Partner' LIMIT 1";
$result99999 = mysqli_query($conn, $sql99999);
	}
if (mysqli_num_rows($result99999) > 0) {
	$countsub=1;
	}
}



//Meta Description And Facebook Meta Description================================================
if (empty($AgentID))
$NewAboutMetaDescription='Centre Holidays is a host travel agency consisting of over 300 home based travel agents who help travellers on a daily basis get away on their dream trip.';
elseif (!empty($AgentID) && empty($AboutMetaDescription) && $countsub < 1)
$NewAboutMetaDescription='As a licenced travel advisor, I can provide expert advice and personalized service. I serve various customer groups by pursuing a multi-specialty travel focus.';
elseif (!empty($AgentID) && empty($AboutMetaDescription) && $countsub > 0)
$NewAboutMetaDescription='As licenced travel advisors, we can provide expert advice and personalized service. We serve various customer groups by pursuing a multi-specialty travel focus.';
elseif (!empty($AgentID) && !empty($AboutMetaDescription))
$NewAboutMetaDescription=$AboutMetaDescription;


//Agent and coprporate Profile==================================================================================
if (empty($AgentID)) {// CORPORATE WEBSITE
$NewAgentProfile="<p>Centre Holidays was created in March 2003 by Carlton Montaut and Barbara Sasiadek and has been a retail travel agency since its inception. In 2009, Centre Holidays established itself as a host travel agency for travel agents across Canada.
<br>
<br>
Since 2010, Centre Holidays has grown from a 2-person organization to having over 300 home based travel agents across Canada.
<br>
<br>
The hard work, determination and service provided by Centre Holidays' home based travel agents have made the company become one of the most awarded host travel agencies in Canada.
<br>
<br>
Centre Holidays redefines the way the world views travel and as the company reaches new milestones and travellers, they will continue to raise their standard of excellence and level of service.</p>";
}
elseif (!empty($AgentID) && empty($AgentProfile) && $countsub < 1)// NO SUB-AGENTS
{
$NewAgentProfile='<p>When it comes to planning your trip, you want everything to go smoothly every step of the way. In case there is an issue while on your trip, you want to be able to deal with a person directly on the other end of the phone instead of an automated voice or a call centre somewhere in the world.
<br>
<br>
This is where I come in. I can assist you from start to finish with the planning of your trip, offer you insight on hotels, destinations, excursions and more. I can provide you with competitive pricing while keeping your needs in mind.<br>
<br>
Whatever your interests or needs, let me know and I will be happy to work with you. To setup a free travel consultation, please feel free to contact me.</p>';
}
elseif (!empty($AgentID) && empty($AgentProfile) && $countsub > 0)// HAS SUB-AGENTS
{
$NewAgentProfile='<p>When it comes to planning your trip, you want everything to go smoothly every step of the way. In case there is an issue while on your trip, you want to be able to deal with a person directly on the other end of the phone instead of an automated voice or a call centre somewhere in the world.
<br />
<br />
This is where we come in. We can assist you from start to finish with the planning of your trip, offer you insight on hotels, destinations, excursions and more. We can provide you with competitive pricing while keeping your needs in mind.
<br />
<br />
Whatever your interests or needs, let us know and we will be happy to work with you. To setup a free travel consultation, please feel free to contact us.</p>';
}
elseif (!empty($AgentID) && !empty($AgentProfile))
{
$NewAgentProfile=$AgentProfile;
}


//Profile Cover Image and Alt Description==========================================================
if (empty($AgentID))
{
$NewAboutCoverImage='https://centreholidays.com/img/company/profile-c01.jpg';
$AboutImageDescription='Moorea, French Polynesia';// blue box
}
elseif (!empty($AgentID) && empty($AboutCoverImage))
{
$NewAboutCoverImage='https://centreholidays.com/img/company/profile-c01.jpg';
$AboutImageDescription='Moorea, French Polynesia'; // blue box
}
elseif (!empty($AgentID) && !empty($AboutCoverImage))
{
$NewAboutCoverImage='https://centreholidays.com/img/agents/'.$AgentID.'/'.$AboutCoverImage;
$AboutImageDescription=$AboutImageDescription;
}

//About Facebook Image====================================================================
if (empty($AgentID))
{
$AboutFacebookImage='https://centreholidays.com/img/company/profile-h01.jpg';
}
elseif (!empty($AgentID) && empty($AboutHorizontalImage))
{
$AboutFacebookImage='https://centreholidays.com/img/company/profile-h01.jpg';
}
elseif (!empty($AgentID) && !empty($AboutHorizontalImage))
{
$AboutFacebookImage='https://centreholidays.com/img/agents/'.$AgentID.'/'.$AboutHorizontalImage;
}


//===============================================================================================
//Index Cover Image and Index Image Description and Alt==========================================
//===============================================================================================
if (empty($AgentID))
$NewIndexCoverImage='https://centreholidays.com/img/index-c01-mauritius-africa.jpg';// corporate index cover image
elseif (!empty($AgentID) && empty($IndexCoverImage))
$NewIndexCoverImage='https://centreholidays.com/img/index-c01-mauritius-africa.jpg';
elseif (!empty($AgentID) && !empty($IndexCoverImage))
$NewIndexCoverImage='https://centreholidays.com/img/agents/'.$AgentID.'/'.$IndexCoverImage;

if (empty($AgentID))
$IndexImageDescription='Mauritius, Africa';// corporate index cover description and Alt
elseif (!empty($AgentID) && empty($IndexImageDescription))
$IndexImageDescription='Mauritius, Africa';
elseif (!empty($AgentID) && !empty($IndexImageDescription))
$IndexImageDescription=$IndexImageDescription;
//===============================================================================================


//=============================highlights Title and Meta=========================================
$his=ucwords(str_replace('-', " ", $_GET['his']));
$highlightsPageTitle=$his.' | '.$TagTitle;

//=============================SpecialOffers Title and Meta======================================
$pro=ucwords(str_replace('-', " ", $_GET['pro']));
$SpecialOffersPageTitle=$pro.' | '.$TagTitle;


//=============================Logos and Page Title===============================

if (!empty($LogoIcon))
$TopLogoIcon="/img/agents/".$AgentID."/".$LogoIcon;
else
$TopLogoIcon='/img/centre-holidays-logo.png';


if (!empty($LogoImage))
$FrontLogoImageNew="/img/agents/".$AgentID."/".$LogoImage;// /img/agents/id/filename
elseif (!empty($Image))
$FrontLogoImageNew="/img/agents/".$AgentID."/".$Image;
else
$FrontLogoImageNew='';///img/centre-holidays-icon-page-loader.png


if (!empty($Image))
$ContImage="/img/agents/".$AgentID."/".$Image;
else
$ContImage='/img/contact-s01.jpg';

//===========================Main Number=========================================

switch ($mainnumber) {
    case "1":
        $TopNumber=$BusinessNum;
        break;
    case "2":
        $TopNumber=$DisplayUseCell;
        break;
    case "3":
        $TopNumber=$TollFreeNum;	
	     break;	
    default:
        $TopNumber='1-888-823-8801';
}

//===============================chat=============================================
if (!empty($AgentID)) {

if (!empty($AgentChat)) {
$WebsiteChat=$AgentChat;
} else {
$WebsiteChat='-';
	}
}
else
$WebsiteChat='ozcvetuaub0waxmnb3b2luuhl3tnqv9y.js';

//==========================================mailchimp================================

if (!empty($AgentID))
{
	if (!empty($mailchimp))
	{
	$mailchimp=$mailchimp;
	$mailchimpname=$mailchimpname;
	}
	else
	{
	$mailchimp='https://centreholidays.us4.list-manage.com/subscribe/post?u=88e8236bb378bb68c4e74eeca&amp;id=2ee4c3bcc9';
	$mailchimpname='b_88e8236bb378bb68c4e74eeca_2ee4c3bcc9';
	}
}
else
{
	$mailchimp='https://centreholidays.us4.list-manage.com/subscribe/post?u=88e8236bb378bb68c4e74eeca&amp;id=2ee4c3bcc9';	
	$mailchimpname='b_88e8236bb378bb68c4e74eeca_2ee4c3bcc9';
}
	

//===============================AgentAnalytics==================================
if (!empty($AgentAnalytics))
	$AgentAnalyticsHeader=$AgentAnalytics;
else
	$AgentAnalyticsHeader='UA-15048588-1';

//=================================Email=========================================
if (!empty($BusinessEmail))
	$agentemail=$BusinessEmail;
else
	$agentemail='andre@centreholidays.com';

//================================Title==========================================

$titlename=$TagTitle;

if (!empty($titlename))
	$agentname=$titlename;
else
	$agentname='Andre Montaut';


//================top tile in contact page========================================
	$PTopTitle=$TopTitle;

//====================time zone===================================================
if (!empty($TimeZone))
$WebTimeZone=$TimeZone;
else
$WebTimeZone='EDT';

$WebTimeZone=substr($WebTimeZone, 0, 3);

//==========================social media and Blog===============================

if (!empty($YouTube))
	$FrontYouTube='https://youtube.com/c/'.$YouTube;
else
	$FrontYouTube='https://youtube.com/c/centreholidays';

if (!empty($FaceBook))
	$FrontFaceBook='https://facebook.com/'.$FaceBook;
else
	$FrontFaceBook='https://facebook.com/centreholidays';

if (!empty($Twitter))
	$FrontTwitter='https://twitter.com/'.$Twitter;
else
	$FrontTwitter='https://twitter.com/centreholidays';

if (!empty($LinkedIn))
	$FrontLinkedIn='https://linkedin.com/'.$LinkedIn;
else
{
	$LinkedIn='';
	$FrontLinkedIn='https://linkedin.com/company/centreholidays/';
}

if (!empty($Pinterest))
	$FrontPinterest='https://pinterest.com/'.$Pinterest;
else
	$FrontPinterest='https://pinterest.com/centreholidays/';

if (!empty($Instagram))
	$FrontInstagram='https://instagram.com/'.$Instagram;
else
	$FrontInstagram='https://instagram.com/centreholidays/';

if (!empty($Blog))
{
	$FrontBlog=$Blog;
	$BlogTarget="_blank";
}


//======================================Agent Departure Gatways regions===============================

switch ($AgentGateProvince) {
  case "Alberta":
    $AgentGateWayArea="Western Canada Departures";
    break;
  case "British Columbia":
    $AgentGateWayArea="Western Canada Departures";
    break;
  case "Manitoba":
    $AgentGateWayArea="Western Canada Departures";
    break;
  case "Saskatchewan":
    $AgentGateWayArea="Western Canada Departures";	
    break;		
  case "New Brunswick":
    $AgentGateWayArea="Atlantic Canada Departures";
    break;
  case "Newfoundland and Labrador":
    $AgentGateWayArea="Atlantic Canada Departures";
    break;
  case "Nova Scotia":
    $AgentGateWayArea="Atlantic Canada Departures";
    break;
  case "Prince Edward Island":
    $AgentGateWayArea="Atlantic Canada Departures";	
    break;	
  case "Quebec":
    $AgentGateWayArea="Eastern Canada Departures";	
    break;	
  case "Ontario":
    $AgentGateWayArea="Eastern Canada Departures";
	break;					
  default:
    $AgentGateWayArea="National Departures";
}




$_SESSION['AgentID']=$AgentID;


//mysqli_close($conn);
?>  