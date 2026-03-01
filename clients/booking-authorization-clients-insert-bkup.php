<?php ob_start(); ?>

<?php
//Import PHPMailer classes into the global namespace
include "../agents/ssi/phpmailer/src/PHPMailer.php";
include "../agents/ssi/phpmailer/src/SMTP.php";
include "../agents/ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$BookUnique=$_POST['bq'];
echo $BookID=$_POST['BookID']; 

$BookingFeeNumberPersons=$_POST['BookingFeeNumberPersons']; 
$BookingFeeTotal=$_POST['BookingTotalFee'];
$QuoteTotalFee=$_POST['QuoteTotalFee'];
$QuoteNumberPersons=$_POST['QuoteNumberPersons'];

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$BookingTime2=time();
$BookingCIP=$_SERVER['REMOTE_ADDR'];

//============================================================================

if ($_FILES['GovernmentID']['size'] > 0)
{
	echo basename($_FILES["GovernmentID"]["name"]);// pdf file ==========
	$string90 = rand(0000000, 99999999999);		
	$random90 =rand(100000, 9999999999999);		
	$random90 ='GovernmentID_'.$filestring.'_'.$random90.'_'.$string90;
	$file90 = $_FILES["GovernmentID"]["tmp_name"];
	$filename90 = $_FILES['GovernmentID']['name'];
	$allowed90 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension90 = end(explode('.',$filename90));
	if(in_array($extension90,$allowed90) ) {
	$new_file90 = $random90;
	$new_file90=$new_file90.'.'.$extension90;	
	$tmp_name90 = $_FILES["GovernmentID"]["tmp_name"];
	move_uploaded_file($tmp_name90, "../img/agents/booking-authorization-email-form/".$new_file90);		
	$GovernmentID=$new_file90;
	}
}
else
{
	$GovernmentID=$_POST['CGovernmentID1'];
}

//============================================================================


if ($_FILES['CCFront']['size'] > 0)
{
	echo basename($_FILES["CCFront"]["name"]);// pdf file ==========
	$string91 = rand(0000000, 99999999999);		
	$random91 =rand(100000, 9999999999999);		
	$random91 ='CCFront_'.$filestring.'_'.$random91.'_'.$string91;
	$file91 = $_FILES["CCFront"]["tmp_name"];
	$filename91 = $_FILES['CCFront']['name'];
	$allowed91 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension91 = end(explode('.',$filename91));
	if(in_array($extension91,$allowed91) ) {
	$new_file91 = $random91;
	$new_file91=$new_file91.'.'.$extension91;	
	$tmp_name91 = $_FILES["CCFront"]["tmp_name"];
	move_uploaded_file($tmp_name91, "../img/agents/booking-authorization-email-form/".$new_file91);		
	$CCFront=$new_file91;
	}
}
else
{
	$CCFront=$_POST['CCCFront1'];
}



//==============================================================================

if ($_FILES['CCBack']['size'] > 0)
{
	echo basename($_FILES["CCBack"]["name"]);// pdf file ==========
	$string92 = rand(0000000, 99999999999);		
	$random92 =rand(100000, 9999999999999);		
	$random92 ='CCBack_'.$filestring.'_'.$random92.'_'.$string92;
	$file92 = $_FILES["CCBack"]["tmp_name"];
	$filename92 = $_FILES['CCBack']['name'];
	$allowed92 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension92 = end(explode('.',$filename92));
	if(in_array($extension92,$allowed92) ) {
	$new_file92 = $random92;
	$new_file92=$new_file92.'.'.$extension92;	
	$tmp_name92 = $_FILES["CCBack"]["tmp_name"];
	move_uploaded_file($tmp_name92, "../img/agents/booking-authorization-email-form/".$new_file92);		
	$CCBack=$new_file92;
	}
}
else
{
	$CCBack=$_POST['CCCBack1'];
}


//=========================PASSPORTS========================================

$PrimePassportDB=$_POST['PrimePassportDB'];// Prime traveller passport info. if already in the database!

if (!empty($_FILES["PrimePassport"]["name"]))
{
	basename($_FILES["PrimePassport"]["name"]);
	$string601 = rand(0000000, 99999999999);		
	$random601 =rand(100000, 9999999999999);		
	$random601 ='PrimePassport_'.$filestring.'_'.$random601.'_'.$string601;
	$file601 = $_FILES["PrimePassport"]["tmp_name"];
	$filename601 = $_FILES['PrimePassport']['name'];
	$allowed601 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension601 = end(explode('.',$filename601));
	if(in_array($extension601,$allowed601) ) {
	$new_file601 = $random601;
	$new_file601=$new_file601.'.'.$extension601;	
	$tmp_name601 = $_FILES["PrimePassport"]["tmp_name"];
	move_uploaded_file($tmp_name601, "../img/agents/booking-authorization-email-form/".$new_file601);		
	$PrimePassport=$new_file601;
	}
}
else
{
	$PrimePassport=$PrimePassportDB;
}

//================= 
$AddPassport1DB=$_POST['AddPassport1DB'];// add traveller passport info. if already in the database!
	if (!empty($_FILES["AddPassport1"]["name"])){
	basename($_FILES["AddPassport1"]["name"]);
	$string602 = rand(0000000, 99999999999);		
	$random602 =rand(100000, 9999999999999);		
	$random602 ='AddPassport1_'.$filestring.'_'.$random602.'_'.$string602;
	$file602 = $_FILES["AddPassport1"]["tmp_name"];
	$filename602 = $_FILES['AddPassport1']['name'];
	$allowed602 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension602 = end(explode('.',$filename602));
	if(in_array($extension602,$allowed602) ) {
	$new_file602 = $random602;
	$new_file602=$new_file602.'.'.$extension602;	
	$tmp_name602 = $_FILES["AddPassport1"]["tmp_name"];
	move_uploaded_file($tmp_name602, "../img/agents/booking-authorization-email-form/".$new_file602);		
	$AddPassport1=$new_file602;
	}
}
else
{
	$AddPassport1=$AddPassport1DB;
}
//=====================
$AddPassport2DB=$_POST['AddPassport2DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport2"]["name"])){
	basename($_FILES["AddPassport2"]["name"]);
	$string603 = rand(0000000, 99999999999);		
	$random603 =rand(100000, 9999999999999);		
	$random603 ='AddPassport2_'.$filestring.'_'.$random603.'_'.$string603;
	$file603 = $_FILES["AddPassport2"]["tmp_name"];
	$filename603 = $_FILES['AddPassport2']['name'];
	$allowed603 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension603 = end(explode('.',$filename603));
	if(in_array($extension603,$allowed603) ) {
	$new_file603 = $random603;
	$new_file603=$new_file603.'.'.$extension603;	
	$tmp_name603 = $_FILES["AddPassport2"]["tmp_name"];
	move_uploaded_file($tmp_name603, "../img/agents/booking-authorization-email-form/".$new_file603);		
	$AddPassport2=$new_file603;
	}
}
else
{
	$AddPassport2=$AddPassport2DB;
}

$AddPassport3DB=$_POST['AddPassport3DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport3"]["name"])){
	echo basename($_FILES["AddPassport3"]["name"]);
	$string604 = rand(0000000, 99999999999);		
	$random604 =rand(100000, 9999999999999);		
	$random604 ='AddPassport3_'.$filestring.'_'.$random604.'_'.$string604;
	$file604 = $_FILES["AddPassport3"]["tmp_name"];
	$filename604 = $_FILES['AddPassport3']['name'];
	$allowed604 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension604 = end(explode('.',$filename604));
	if(in_array($extension604,$allowed604) ) {
	$new_file604 = $random604;
	$new_file604=$new_file604.'.'.$extension604;	
	$tmp_name604 = $_FILES["AddPassport3"]["tmp_name"];
	move_uploaded_file($tmp_name604, "../img/agents/booking-authorization-email-form/".$new_file604);		
	$AddPassport3=$new_file604;
}
}
else
{
	$AddPassport3=$AddPassport3DB;
}

//========================

$AddPassport4DB=$_POST['AddPassport4DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport4"]["name"])){
	echo basename($_FILES["AddPassport4"]["name"]);
	$string605 = rand(0000000, 99999999999);		
	$random605 =rand(100000, 9999999999999);		
	$random605 ='AddPassport4_'.$filestring.'_'.$random605.'_'.$string605;
	$file605 = $_FILES["AddPassport4"]["tmp_name"];
	$filename605 = $_FILES['AddPassport4']['name'];
	$allowed605 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension605 = end(explode('.',$filename605));
	if(in_array($extension605,$allowed605) ) {
	$new_file605 = $random605;
	$new_file605=$new_file605.'.'.$extension605;	
	$tmp_name605 = $_FILES["AddPassport4"]["tmp_name"];
	move_uploaded_file($tmp_name605, "../img/agents/booking-authorization-email-form/".$new_file605);		
	$AddPassport4=$new_file605;
}
}
else
{
	$AddPassport4=$AddPassport4DB;
}

//=====================

$AddPassport5DB=$_POST['AddPassport5DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport5"]["name"])){
	echo basename($_FILES["AddPassport5"]["name"]);
	$string606 = rand(0000000, 99999999999);		
	$random606 =rand(100000, 9999999999999);		
	$random606 ='AddPassport5_'.$filestring.'_'.$random606.'_'.$string606;
	$file606 = $_FILES["AddPassport5"]["tmp_name"];
	$filename606 = $_FILES['AddPassport5']['name'];
	$allowed606 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension606 = end(explode('.',$filename606));
	if(in_array($extension606,$allowed606) ) {
	$new_file606 = $random606;
	$new_file606=$new_file606.'.'.$extension606;	
	$tmp_name606 = $_FILES["AddPassport5"]["tmp_name"];
	move_uploaded_file($tmp_name606, "../img/agents/booking-authorization-email-form/".$new_file606);		
	$AddPassport5=$new_file606;
}
}
else
{
	$AddPassport5=$AddPassport5DB;
}

//=================================

$AddPassport6DB=$_POST['AddPassport6DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport6"]["name"])){
	echo basename($_FILES["AddPassport6"]["name"]);
	$string607 = rand(0000000, 99999999999);		
	$random607 =rand(100000, 9999999999999);		
	$random607 ='AddPassport6_'.$filestring.'_'.$random607.'_'.$string607;
	$file607 = $_FILES["AddPassport6"]["tmp_name"];
	$filename607 = $_FILES['AddPassport6']['name'];
	$allowed607 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension607 = end(explode('.',$filename607));
	if(in_array($extension607,$allowed607) ) {
	$new_file607 = $random607;
	$new_file607=$new_file607.'.'.$extension607;	
	$tmp_name607 = $_FILES["AddPassport6"]["tmp_name"];
	move_uploaded_file($tmp_name607, "../img/agents/booking-authorization-email-form/".$new_file607);		
	$AddPassport6=$new_file607;
}
}
else
{
	$AddPassport6=$AddPassport6DB;
}

//===============================

$AddPassport7DB=$_POST['AddPassport7DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport7"]["name"])){
	echo basename($_FILES["AddPassport7"]["name"]);
	$string608 = rand(0000000, 99999999999);		
	$random608 =rand(100000, 9999999999999);		
	$random608 ='AddPassport7_'.$filestring.'_'.$random608.'_'.$string608;
	$file608 = $_FILES["AddPassport7"]["tmp_name"];
	$filename608 = $_FILES['AddPassport7']['name'];
	$allowed608 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension608 = end(explode('.',$filename608));
	if(in_array($extension608,$allowed608) ) {
	$new_file608 = $random608;
	$new_file608=$new_file608.'.'.$extension608;	
	$tmp_name608 = $_FILES["AddPassport7"]["tmp_name"];
	move_uploaded_file($tmp_name608, "../img/agents/booking-authorization-email-form/".$new_file608);		
	$AddPassport7=$new_file608;
	}
}
else
{
	$AddPassport7=$AddPassport7DB;
}


$AddPassport8DB=$_POST['AddPassport8DB'];// add traveller passport info. if already in the database!
if (!empty($_FILES["AddPassport8"]["name"])){
echo basename($_FILES["AddPassport8"]["name"]);
	$string609 = rand(0000000, 99999999999);		
	$random609 =rand(100000, 9999999999999);		
	$random609 ='AddPassport8_'.$filestring.'_'.$random609.'_'.$string609;
	$file609 = $_FILES["AddPassport8"]["tmp_name"];
	$filename609 = $_FILES['AddPassport8']['name'];
	$allowed609 =  array('pdf','PDF', 'jpg', 'JPG', 'png', 'PNG');
	$extension609 = end(explode('.',$filename609));
	if(in_array($extension609,$allowed609) ) {
	$new_file609 = $random609;
	$new_file609=$new_file609.'.'.$extension609;	
	$tmp_name609 = $_FILES["AddPassport8"]["tmp_name"];
	move_uploaded_file($tmp_name609, "../img/agents/booking-authorization-email-form/".$new_file609);		
	$AddPassport8=$new_file609;
	}
}
else
{
	$AddPassport8=$AddPassport8DB;
}

//===============================================================
echo '<br />';
echo $MethodOfPayment1=$_POST['MethodOfPayment1'];
echo '<br />';
echo $MethodOfPayment2=$_POST['MethodOfPayment2'];
echo '<br />';
echo $MethodOfPayment3=$_POST['MethodOfPayment3'];
echo '<br />';
echo $MethodOfPayment4=$_POST['MethodOfPayment4'];
echo '<br />';

//====================================================================

echo $TravelInsuranceFee1=$_POST['TravelInsuranceFee1'];
echo '<br />';
echo $TripFee1=$_POST['TripFee1'];
echo '<br />';
echo $BookingFee1=$_POST['BookingFee1'];
echo '<br />';
echo $QuoteFee1=$_POST['QuoteFee1'];
echo '<br />';
echo $TravelInsuranceFee2=$_POST['TravelInsuranceFee2'];
echo '<br />';
echo $TripFee2=$_POST['TripFee2'];
echo '<br />';
echo $BookingFee2=$_POST['BookingFee2'];
echo '<br />';
echo $QuoteFee2=$_POST['QuoteFee2'];
echo '<br />';
echo $TravelInsuranceFee3=$_POST['TravelInsuranceFee3'];
echo '<br />';
echo $TripFee3=$_POST['TripFee3'];
echo '<br />';
echo $BookingFee3=$_POST['BookingFee3'];
echo '<br />';
echo $QuoteFee3=$_POST['QuoteFee3'];
echo '<br />';
echo $TravelInsuranceFee4=$_POST['TravelInsuranceFee4'];
echo '<br />';
echo $TripFee4=$_POST['TripFee4'];
echo '<br />';
echo $BookingFee4=$_POST['BookingFee4'];
echo '<br />';
echo $QuoteFee4=$_POST['QuoteFee4'];
echo '<br />';

$BookingStatus=sanitize_sql_string($_POST['BookingStatus']);
$PTravellerParty=sanitize_sql_string($_POST['PTravellerParty']);
$PTravellerTitle=sanitize_sql_string($_POST['PTravellerTitle']);
$PTravellerFName=sanitize_sql_string($_POST['PTravellerFName']);
$PTravellerMName=sanitize_sql_string($_POST['PTravellerMName']);
$PTravellerLName=sanitize_sql_string($_POST['PTravellerLName']);
$PTravellerDOB=sanitize_sql_string($_POST['PTravellerDOB']);
$PTravellerPhone=sanitize_sql_string($_POST['PTravellerPhone']);
$PTravellerEmail=sanitize_sql_string($_POST['PTravellerEmail']);
$PTravellerStreet=sanitize_sql_string($_POST['PTravellerStreet']);
$PTravellerUnit=sanitize_sql_string($_POST['PTravellerUnit']);
$PTravellerCity=sanitize_sql_string($_POST['PTravellerCity']);
$PTravellerProvince=sanitize_sql_string($_POST['PTravellerProvince']);
$PTravellerPostal=sanitize_sql_string($_POST['PTravellerPostal']);
$PTravellerCountry=sanitize_sql_string($_POST['PTravellerCountry']);
$PTravellerNotes=sanitize_sql_string($_POST['PTravellerNotes']);
$PTravellerConsent1=sanitize_sql_string($_POST['PTravellerConsent1']);
$PTravellerConsent2=sanitize_sql_string($_POST['PTravellerConsent2']);
$ServiceAccepted=sanitize_sql_string($_POST['ServiceAccepted']);
$ServiceNoReason=sanitize_sql_string($_POST['ServiceNoReason']);
$CovidConsent1=sanitize_sql_string($_POST['CovidConsent1']);
$CovidConsent2=sanitize_sql_string($_POST['CovidConsent2']);
$CovidConsentName=sanitize_sql_string($_POST['CovidConsentName']);
$CovidAccepted=sanitize_sql_string($_POST['CovidAccepted']);
$CovidNoReason=sanitize_sql_string($_POST['CovidNoReason']);
$TripAccepted=($_POST['TripAccepted']);
$TripNoReason=sanitize_sql_string($_POST['TripNoReason']);
$TermAccepted=sanitize_sql_string($_POST['TermAccepted']);
$TermNoReason=sanitize_sql_string($_POST['TermNoReason']);
$CancelAccepted=sanitize_sql_string($_POST['CancelAccepted']);
$CancelNoReason=sanitize_sql_string($_POST['CancelNoReason']);

if($_POST['AdditionalConsent']=='Yes')
$AdditionalConsent='Yes';
else
$AdditionalConsent='No';

$TripPricingAccepted=sanitize_sql_string($_POST['TripPricingAccepted']);
$TripPricingNoReason=sanitize_sql_string($_POST['TripPricingNoReason']);
$pricing1=($_POST['pricing1']);
$pricing2=($_POST['pricing2']);
$pricing3=($_POST['pricing3']);
$pricing4=($_POST['pricing4']);
$pricing5=($_POST['pricing5']);
$insurance1=($_POST['insurance1']);
$insurance2=($_POST['insurance2']);
$insurance3=($_POST['insurance3']);
$insurance4=($_POST['insurance4']);
$insurance5=($_POST['insurance5']);
$InsuranceAccepted=sanitize_sql_string($_POST['InsuranceAccepted']);
$InsuranceNoReason=sanitize_sql_string($_POST['InsuranceNoReason']);
$PurchaseInsurance=($_POST['PurchaseInsurance']);
$InsuranceWeaverConsent=sanitize_sql_string($_POST['InsuranceWeaverConsent']);
$InsuranceWeaverConsentName=sanitize_sql_string($_POST['InsuranceWeaverConsentName']);

$AddTravelTitle1=sanitize_sql_string($_POST['AddTravelTitle1']);
$AddTravelFName1=sanitize_sql_string($_POST['AddTravelFName1']);
$AddTravelMName1=sanitize_sql_string($_POST['AddTravelMName1']);
$AddTravelLName1=sanitize_sql_string($_POST['AddTravelLName1']);
$AddTravelDOB1=sanitize_sql_string($_POST['AddTravelDOB1']);
$AddTravelNotes1=sanitize_sql_string($_POST['AddTravelNotes1']);
$AddTravelTitle2=sanitize_sql_string($_POST['AddTravelTitle2']);
$AddTravelFName2=sanitize_sql_string($_POST['AddTravelFName2']);
$AddTravelMName2=sanitize_sql_string($_POST['AddTravelMName2']);
$AddTravelLName2=sanitize_sql_string($_POST['AddTravelLName2']);
$AddTravelDOB2=sanitize_sql_string($_POST['AddTravelDOB2']);
$AddTravelNotes2=sanitize_sql_string($_POST['AddTravelNotes2']);
$AddTravelTitle3=sanitize_sql_string($_POST['AddTravelTitle3']);
$AddTravelFName3=sanitize_sql_string($_POST['AddTravelFName3']);
$AddTravelMName3=sanitize_sql_string($_POST['AddTravelMName3']);
$AddTravelLName3=sanitize_sql_string($_POST['AddTravelLName3']);
$AddTravelDOB3=sanitize_sql_string($_POST['AddTravelDOB3']);
$AddTravelNotes3=sanitize_sql_string($_POST['AddTravelNotes3']);
$AddTravelTitle4=sanitize_sql_string($_POST['AddTravelTitle4']);
$AddTravelFName4=sanitize_sql_string($_POST['AddTravelFName4']);
$AddTravelMName4=sanitize_sql_string($_POST['AddTravelMName4']);
$AddTravelLName4=sanitize_sql_string($_POST['AddTravelLName4']);
$AddTravelDOB4=sanitize_sql_string($_POST['AddTravelDOB4']);
$AddTravelNotes4=sanitize_sql_string($_POST['AddTravelNotes4']);
$AddTravelTitle5=sanitize_sql_string($_POST['AddTravelTitle5']);
$AddTravelFName5=sanitize_sql_string($_POST['AddTravelFName5']);
$AddTravelMName5=sanitize_sql_string($_POST['AddTravelMName5']);
$AddTravelLName5=sanitize_sql_string($_POST['AddTravelLName5']);
$AddTravelDOB5=sanitize_sql_string($_POST['AddTravelDOB5']);
$AddTravelNotes5=sanitize_sql_string($_POST['AddTravelNotes5']);
$AddTravelTitle6=sanitize_sql_string($_POST['AddTravelTitle6']);
$AddTravelFName6=sanitize_sql_string($_POST['AddTravelFName6']);
$AddTravelMName6=sanitize_sql_string($_POST['AddTravelMName6']);
$AddTravelLName6=sanitize_sql_string($_POST['AddTravelLName6']);
$AddTravelDOB6=sanitize_sql_string($_POST['AddTravelDOB6']);
$AddTravelNotes6=sanitize_sql_string($_POST['AddTravelNotes6']);
$AddTravelTitle7=sanitize_sql_string($_POST['AddTravelTitle7']);
$AddTravelFName7=sanitize_sql_string($_POST['AddTravelFName7']);
$AddTravelMName7=sanitize_sql_string($_POST['AddTravelMName7']);
$AddTravelLName7=sanitize_sql_string($_POST['AddTravelLName7']);
$AddTravelDOB7=sanitize_sql_string($_POST['AddTravelDOB7']);
$AddTravelNotes7=sanitize_sql_string($_POST['AddTravelNotes7']);
$AddTravelTitle8=sanitize_sql_string($_POST['AddTravelTitle8']);
$AddTravelFName8=sanitize_sql_string($_POST['AddTravelFName8']);
$AddTravelMName8=sanitize_sql_string($_POST['AddTravelMName8']);
$AddTravelLName8=sanitize_sql_string($_POST['AddTravelLName8']);
$AddTravelDOB8=sanitize_sql_string($_POST['AddTravelDOB8']);
$AddTravelNotes8=sanitize_sql_string($_POST['AddTravelNotes8']);
$AddTravelConsent1=sanitize_sql_string($_POST['AddTravelConsent1']);
$AddTravelConsent2=sanitize_sql_string($_POST['AddTravelConsent2']);
$TripGrandTotal=($_POST['TripGrandTotal']);
$InsuranceGrandTotal=($_POST['InsuranceGrandTotal']);
$OverallGrandTotal=($_POST['OverallGrandTotal']);
$MethodOfPayment=sanitize_sql_string($_POST['MethodOfPayment']);
$TravelerDocuments1=($_POST['TravelerDocuments1']);
$TravelerDocuments2=($_POST['TravelerDocuments2']);
$TravelerDocuments3=($_POST['TravelerDocuments3']);
$TravelerDocuments4=($_POST['TravelerDocuments4']);
$TravelerDocuments5=($_POST['TravelerDocuments5']);
$CCOwner=sanitize_sql_string($_POST['CCOwner']);
$CCType=sanitize_sql_string($_POST['CCType']);
$CCName=sanitize_sql_string($_POST['CCName']);
$CCNumber=sanitize_sql_string($_POST['CCNumber']);
$CCExpiry=sanitize_sql_string($_POST['CCExpiry']);
$CCVV=sanitize_sql_string($_POST['CCVV']);
$CCPhone=sanitize_sql_string($_POST['CCPhone']);
$CCEmail=sanitize_sql_string($_POST['CCEmail']);
$CCAddress=sanitize_sql_string($_POST['CCAddress']);
$CCUnit=sanitize_sql_string($_POST['CCUnit']);
$CCCity=sanitize_sql_string($_POST['CCCity']);
$CCProvince=sanitize_sql_string($_POST['CCProvince']);
$CCPostal=sanitize_sql_string($_POST['CCPostal']);
$CCCountry=sanitize_sql_string($_POST['CCCountry']);


//==============signetures====================================================
$sigdataUrl=$_POST['sigdataUrl'];
$sigdataUrl1=$_POST['sigdataUrl1'];

echo $EmaiToSubject=sanitize_sql_string($_POST['EmaiToSubject']);
//========================agent details========================================
echo $BusinessFullName=sanitize_sql_string($_POST['BusinessFullName']);
echo $BusinessPhone=($_POST['BusinessPhone']);
echo $BusinessName=sanitize_sql_string($_POST['BusinessName']);
echo $BusinessEmail=sanitize_sql_string($_POST['BusinessEmail']);

//=======================promary traveler======================================
echo $PTravellerEmail=($_POST['PTravellerEmail']);
echo $PTravellerFName=sanitize_sql_string($_POST['PTravellerFName']);
echo $PTravellerMName=sanitize_sql_string($_POST['PTravellerMName']);
echo $PTravellerLName=sanitize_sql_string($_POST['PTravellerLName']);
echo $PTravellerFullName=$PTravellerFName.' '.$PTravellerMName.' '.$PTravellerLName;
$SendPTravellerFullNamee=$_POST['PTravellerFName'].' '.$_POST['PTravellerMName'].' '.$_POST['PTravellerLName'];

//==========================PRICING================================

$PaymentDue5=$_POST['PaymentDue5'];

//==========================DOCUMENTS BY CLIENT======================

/*$total = count($_FILES['TravelerDocuments']['name']); // documents
for( $i=0 ; $i < $total ; $i++ ) {
echo basename($_FILES["TravelerDocuments"]["name"][$i]);
echo "<br />";	
}*/

/*$TravelerDocuments1=basename($_FILES["TravelerDocuments"]["name"][0]);
$TravelerDocuments2=basename($_FILES["TravelerDocuments"]["name"][1]);
$TravelerDocuments3=basename($_FILES["TravelerDocuments"]["name"][2]);
$TravelerDocuments4=basename($_FILES["TravelerDocuments"]["name"][3]);
$TravelerDocuments5=basename($_FILES["TravelerDocuments"]["name"][4]);*/


//==========================PAYMENT=========================================

if (!empty($_POST['total']))
$TripGrandTotal=$_POST['total'];
else
$TripGrandTotal=$_POST['TotalAmountDue3'];

$InsuranceGrandTotal=$_POST['InsuranceGrandTotal'];
$QuoteTotalFee=$_POST['QuoteTotalFee'];
$OverallGrandTotal=$_POST['OverallGrandTotal'];


//========================Insurance===========================
$PurchaseInsurance1=$_POST['PurchaseInsurance'];
//============================CC INFORMATION==========================
$CCOwner1=$_POST['CCOwner'];
switch ($CCOwner1) {
  case "700":
   $CCOwner='I Am Travelling';
    break;	
  case "50":
   $CCOwner='I Am Travelling';
    break;
  case "51":
   $CCOwner='I Am Not Travelling';
    break;
}

$CCType=$_POST['CCType'];

$CCPhone=$_POST['CCPhone'];
$CCEmail=$_POST['CCEmail'];

//==============================Main Address===============================
$PTravellerStreet=sanitize_sql_string($_POST['PTravellerStreet']);
$PTravellerUnit=sanitize_sql_string($_POST['PTravellerUnit']);
$PTravellerCity=sanitize_sql_string($_POST['PTravellerCity']);
$PTravellerProvince=sanitize_sql_string($_POST['PTravellerProvince']);
$PTravellerPostal=$_POST['PTravellerPostal'];
$PTravellerCountry=sanitize_sql_string($_POST['PTravellerCountry']);

//===========================CC Address if Different=======================
$CCAddressSame=$_POST['CCAddressSame'];// IF DIFFERENT
$CCAddress=sanitize_sql_string($_POST['CCAddress']);
$CCUnit=sanitize_sql_string($_POST['CCUnit']);
$CCCity=sanitize_sql_string($_POST['CCCity']);
$CCProvince=sanitize_sql_string($_POST['CCProvince']);
$CCCountry=sanitize_sql_string($_POST['CCCountry']);

//==================================CONSENT============================
$DetailsCorrectConsent=$_POST['DetailsCorrectConsent'];
$VerificationPurposesConsent=$_POST['VerificationPurposesConsent'];
$CreditCardProcessConsent=$_POST['CreditCardProcessConsent'];
$ProcessedAutomaticallyConsent=$_POST['ProcessedAutomaticallyConsent'];
$AdditionalTravelConsent=$_POST['AdditionalTravelConsent'];
//========================$BookingStatus================================
if ($DetailsCorrectConsent =='Yes' && $VerificationPurposesConsent =='Yes' && $ServiceAccepted =='Yes' && $CovidAccepted =='Yes' && $TripAccepted =='Yes' && $TripPricingAccepted =='Yes' && $TermAccepted =='Yes' && $CancelAccepted =='Yes' && ($InsuranceAccepted =='Yes' || $PurchaseInsurance=='No') && $DetailsCorrectConsent =='Yes' && $AddTravelConsent1 =='Yes' && $AddTravelConsent2 =='Yes' && $AdditionalConsent =='Yes' && $PTravellerConsent1 =='Yes' && $PTravellerConsent2 =='Yes')
{
$BookingStatus=4;
$BookingTime4=$BookingTime;
}
else
{
$BookingTime3=$BookingTime;
$BookingStatus=3;
}

//=============================================================================

if ($PurchaseInsurance=='No')
{
$sigdataUrl1=$sigdataUrl;
$InsuranceAccepted='';
}
else
{
$sigdataUrl1='';
}


//===============send agent from customer================================================

$pieces = explode("@", $PTravellerEmail);

echo $emailext=strtolower($pieces[1]);

$urllink='https://centreholidays.com/agents/booking-authorization-email-form-preview.php?BookID='.$BookID.'&allow=no';

	$subject1  = $EmaiToSubject;	
	$from1     = $PTravellerEmail;	
	
	$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/booking-authorization-email-form.php");// embed php values in HTML file
	$message1  = str_replace("_EmaiToFullName_", $EmaiToFullName, $message); 
	$message1  = str_replace("_BusinessEmail_", $BusinessEmail, $message); 
	$message1  = str_replace("_BusinessPhone_", $BusinessPhone, $message); 
	$message1  = str_replace("_BusinessFullName_", $BusinessFullName, $message); 
	$message1  = str_replace("_BusinessName_", $BusinessName, $message); 
	$message1  = str_replace("_PTravellerFullName_", $SendPTravellerFullNamee, $message); 
	$message1  = str_replace("_urllink_", $urllink, $message); 
	$message1  = str_replace("_EmaiToSubject_", $EmaiToSubject, $message);				
	
	
if ($emailext !='gmail.com' && $emailext !='yahoo.com' && $emailext !='hotmail.com' && $emailext !='outlook.com' && $emailext !='shaw.ca' && $emailext !='shaw.com')
{  
$headers1  = "From: $from\r\n";
$headers1 .= "Content-type: text/html\r\n";
$to1 = $BusinessEmail;
mail($to1, $subject1, $message1, $headers1);    
}

if ($emailext=='gmail.com' || $emailext=='yahoo.com' || $emailext=='hotmail.com' || $emailext=='outlook.com' || $emailext=='shaw.ca' || $emailext=='shaw.com')
{ 
 
if (!empty($BusinessName))
$BusinessName=$BusinessName;
else
$BusinessName='Centre Holidays';

echo "third email";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;
//
try {
//Server settings

$mail->SMTPDebug = 1;                      					//Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'donotreply@centreholidays.com';//'centre_holidays@yahoo.com';                     //SMTP username
$mail->Password   = 'ffdfkjkayimmzifd';                               //SMTP password
//$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`    
$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->From = 'donotreply@centreholidays.com';
$mail->FromName = $SendPTravellerFullNamee; //'client name';// from name
$mail->AddAddress($BusinessEmail, $BusinessName);  // Add a recipient  to name	

//$mail->addCC('cc@example.com'); // CC 
//$mail->addBCC($BusinessEmail); // BCC 
$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $subject1;//'Test gmail via CH';
$mail->Body    = $message1;//'Test gmail via <strong>CH</strong>';
//$mail->AltBody = 'Test gmail via Center holidays';

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


//=================================================================================================
//=====================================SEND METHOD OF PAYMENT BANK EMAIL===========================
//=================================================================================================

	$pieces2 = explode("@", $PTravellerEmail);
	
	echo $emailext2=strtolower($pieces2[1]);
	
	$subject2  = 'Payment By Bank Deposit / Email Transfer';	
	$from     = $BusinessEmail;//'donotreply@centreholidays.com';	
	
	$message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/booking-authorization-email-form-cash-payments-client.php");// embed php values in HTML file
	$message2  = str_replace("_BusinessEmail_", $BusinessEmail, $message2); 
	$message2  = str_replace("_BusinessPhone_", $BusinessPhone, $message2); 
	$message2  = str_replace("_BusinessFullName_", $BusinessFullName, $message2); 
	$message2  = str_replace("_BusinessName_", $BusinessName, $message2); 		
	$message2  = str_replace("_PTravellerFullName_", $PTravellerFullName, $message2);
	
	$headers2  = "From: $from\r\n";
	$headers2 .= "Content-type: text/html\r\n";

if ($emailext2 !='gmail.com' && $emailext2 !='yahoo.com' && $emailext2 !='hotmail.com' && $emailext2 !='outlook.com' && $emailext2 !='shaw.ca' && $emailext2 !='shaw.com')
{ 	
if (!empty($MethodOfPayment2) || !empty($MethodOfPayment3))
mail($PTravellerEmail, $subject2, $message2, $headers2);
else
echo "";
}

//=============================OTHER EMAILS===================================

if ($emailext2=='gmail.com' || $emailext2=='yahoo.com' || $emailext2=='hotmail.com' || $emailext2=='outlook.com' || $emailext2=='shaw.ca' || $emailext2=='shaw.com')
{   

if (!empty($MethodOfPayment2) || !empty($MethodOfPayment3))
{
//==========================================================================================
//===========BELOW FOR YAHOO, OUTLOOK, SHAW, HOTMAIL========================================
//==========================================================================================

if (!empty($BusinessName))
$BusinessName=$BusinessName;
else
$BusinessName='Centre Holidays';

echo "seconed email";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;
//
try {
//Server settings

$mail->SMTPDebug = 1;                      					//Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'donotreply@centreholidays.com';//'centre_holidays@yahoo.com';                     //SMTP username
$mail->Password   = 'ffdfkjkayimmzifd';                               //SMTP password
//$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`    
$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->From = 'donotreply@centreholidays.com';
$mail->FromName = $BusinessName; //'Centre Holidays';// from name
$mail->AddAddress($PTravellerEmail, $PTravellerFullName);  // additional to emails

//$mail->addCC('cc@example.com'); // CC 
//$mail->addBCC($BusinessEmail); // BCC 
$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $subject2;//'Test gmail via CH';
$mail->Body    = $message2;//'Test gmail via <strong>CH</strong>';
//$mail->AltBody = 'Test gmail via Center holidays';

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

}


//==========================FIRST TABE=========================================
$sql = "UPDATE booking_1 SET 
PaymentDue5='$PaymentDue5',
BookingStatus='$BookingStatus',
PTravellerParty='$PTravellerParty',
PTravellerTitle='$PTravellerTitle',
PTravellerFName='$PTravellerFName',
PTravellerMName='$PTravellerMName',
PTravellerLName='$PTravellerLName',
PTravellerDOB='$PTravellerDOB',
PTravellerPhone='$PTravellerPhone',
PTravellerEmail='$PTravellerEmail',
PTravellerStreet='$PTravellerStreet',
PTravellerUnit='$PTravellerUnit',
PTravellerCity='$PTravellerCity',
PTravellerProvince='$PTravellerProvince',
PTravellerPostal='$PTravellerPostal',
PTravellerCountry='$PTravellerCountry',
PTravellerNotes='$PTravellerNotes',
PTravellerConsent1='$PTravellerConsent1',
PTravellerConsent2='$PTravellerConsent2',
ServiceAccepted='$ServiceAccepted',
ServiceNoReason='$ServiceNoReason',
CovidConsent1='$CovidConsent1',
CovidConsent2='$CovidConsent2',
CovidConsentName='$CovidConsentName',
sigdataUrl='$sigdataUrl',
CovidAccepted='$CovidAccepted',
CovidNoReason='$CovidNoReason',
TripAccepted='$TripAccepted',
TripNoReason='$TripNoReason',
TermAccepted='$TermAccepted',
TermNoReason='$TermNoReason',
CancelAccepted='$CancelAccepted',
CancelNoReason='$CancelNoReason',
AdditionalConsent='$AdditionalConsent',
TripPricingAccepted='$TripPricingAccepted',
TripPricingNoReason='$TripPricingNoReason',
pricing1='$pricing1',
pricing2='$pricing2',
pricing3='$pricing3',
pricing4='$pricing4',
pricing5='$pricing5',
insurance1='$insurance1',
insurance2='$insurance2',
insurance3='$insurance3',
insurance4='$insurance4',
insurance5='$insurance5',
InsuranceAccepted='$InsuranceAccepted',
InsuranceNoReason='$InsuranceNoReason',
PurchaseInsurance='$PurchaseInsurance',
InsuranceWeaverConsent='$InsuranceWeaverConsent',
InsuranceWeaverConsentName='$InsuranceWeaverConsentName',
sigdataUrl1='$sigdataUrl1',
BookingFeeNumberPersons='$BookingFeeNumberPersons',
BookingFeeTotal='$BookingFeeTotal',
QuoteNumberPersons='$QuoteNumberPersons',
QuoteTotalFee='$QuoteTotalFee',
BookingTimeRep='' 
WHERE BookID='$BookID'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}


//=============================SECONED TABLE=========================================

$sql2 = "UPDATE booking_2 SET 
BookID='$BookID',
BookingCIP='$BookingCIP',
AddTravelTitle1='$AddTravelTitle1',
AddTravelFName1='$AddTravelFName1',
AddTravelMName1='$AddTravelMName1',
AddTravelLName1='$AddTravelLName1',
AddTravelDOB1='$AddTravelDOB1',
AddTravelNotes1='$AddTravelNotes1',
AddTravelTitle2='$AddTravelTitle2',
AddTravelFName2='$AddTravelFName2',
AddTravelMName2='$AddTravelMName2',
AddTravelLName2='$AddTravelLName2',
AddTravelDOB2='$AddTravelDOB2',
AddTravelNotes2='$AddTravelNotes2',
AddTravelTitle3='$AddTravelTitle3',
AddTravelFName3='$AddTravelFName3',
AddTravelMName3='$AddTravelMName3',
AddTravelLName3='$AddTravelLName3',
AddTravelDOB3='$AddTravelDOB3',
AddTravelNotes3='$AddTravelNotes3',
AddTravelTitle4='$AddTravelTitle4',
AddTravelFName4='$AddTravelFName4',
AddTravelMName4='$AddTravelMName4',
AddTravelLName4='$AddTravelLName4',
AddTravelDOB4='$AddTravelDOB4',
AddTravelNotes4='$AddTravelNotes4',
AddTravelTitle5='$AddTravelTitle5',
AddTravelFName5='$AddTravelFName5',
AddTravelMName5='$AddTravelMName5',
AddTravelLName5='$AddTravelLName5',
AddTravelDOB5='$AddTravelDOB5',
AddTravelNotes5='$AddTravelNotes5',
AddTravelTitle6='$AddTravelTitle6',
AddTravelFName6='$AddTravelFName6',
AddTravelMName6='$AddTravelMName6',
AddTravelLName6='$AddTravelLName6',
AddTravelDOB6='$AddTravelDOB6',
AddTravelNotes6='$AddTravelNotes6',
AddTravelTitle7='$AddTravelTitle7',
AddTravelFName7='$AddTravelFName7',
AddTravelMName7='$AddTravelMName7',
AddTravelLName7='$AddTravelLName7',
AddTravelDOB7='$AddTravelDOB7',
AddTravelNotes7='$AddTravelNotes7',
AddTravelTitle8='$AddTravelTitle8',
AddTravelFName8='$AddTravelFName8',
AddTravelMName8='$AddTravelMName8',
AddTravelLName8='$AddTravelLName8',
AddTravelDOB8='$AddTravelDOB8',
AddTravelNotes8='$AddTravelNotes8',
AddTravelConsent1='$AddTravelConsent1',
AddTravelConsent2='$AddTravelConsent2',
TripGrandTotal='$TripGrandTotal',
InsuranceGrandTotal='$InsuranceGrandTotal',
OverallGrandTotal='$OverallGrandTotal',
TravelerDocuments1='$TravelerDocuments1',
TravelerDocuments2='$TravelerDocuments2',
TravelerDocuments3='$TravelerDocuments3',
TravelerDocuments4='$TravelerDocuments4',
TravelerDocuments5='$TravelerDocuments5',
CCOwner='$CCOwner',
CCType='$CCType',
CCName='$CCName',
CCNumber='$CCNumber',
CCExpiry='$CCExpiry',
CCVV='$CCVV',
CCPhone='$CCPhone',
CCEmail='$CCEmail',
CCAddressSame='$CCAddressSame',
CCAddress='$CCAddress',
CCUnit='$CCUnit',
CCCity='$CCCity',
CCProvince='$CCProvince',
CCPostal='$CCPostal',
CCCountry='$CCCountry',
DetailsCorrectConsent='$DetailsCorrectConsent',
VerificationPurposesConsent='$VerificationPurposesConsent',
CreditCardProcessConsent='$CreditCardProcessConsent',
BookingTime2='$BookingTime2',
BookingTime3='$BookingTime3',
BookingTime4='$BookingTime4',
QuoteFee1='$QuoteFee1',
BookingFee1='$BookingFee1',
TripFee1='$TripFee1',
TravelInsuranceFee1='$TravelInsuranceFee1',
QuoteFee2='$QuoteFee2',
BookingFee2='$BookingFee2',
TripFee2='$TripFee2',
TravelInsuranceFee2='$TravelInsuranceFee2',
QuoteFee3='$QuoteFee3',
BookingFee3='$BookingFee3',
TripFee3='$TripFee3',
TravelInsuranceFee3='$TravelInsuranceFee3',
QuoteFee4='$QuoteFee4',
BookingFee4='$BookingFee4',
TripFee4='$TripFee4',
TravelInsuranceFee4='$TravelInsuranceFee4',
GovernmentID='$GovernmentID',
CCBack='$CCBack',
CCFront='$CCFront',
AdditionalTravelConsent='$AdditionalTravelConsent',
MethodOfPayment1='$MethodOfPayment1',
MethodOfPayment2='$MethodOfPayment2',
MethodOfPayment3='$MethodOfPayment3',
MethodOfPayment4='$MethodOfPayment4',
PrimePassport='$PrimePassport',
AddPassport1='$AddPassport1',
AddPassport2='$AddPassport2',
AddPassport3='$AddPassport3',
AddPassport4='$AddPassport4',
AddPassport5='$AddPassport5',
AddPassport6='$AddPassport6',
AddPassport7='$AddPassport7',
AddPassport8='$AddPassport8'
WHERE BookID2='$BookID'";

if (mysqli_query($conn, $sql2)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);



//=================================================================================================


	header('Location: email-form-submitted.php?results=1&bq='.$BookUnique);
?>

<?php ob_flush(); ?>