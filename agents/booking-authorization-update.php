<?php ob_start(); ?>

<?php
//Import PHPMailer classes into the global namespace
include "ssi/phpmailer/src/PHPMailer.php";
include "ssi/phpmailer/src/SMTP.php";
include "ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$BookingTimeRep=time();
$BookingIP=$_SERVER['REMOTE_ADDR'];
echo '==================>>>';
echo $BookID=trim($_POST['BookID']);
echo '<<<==================';
echo $BookUnique=trim($_POST['BookUnique']);


include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');


echo $EmaiToEmail=$_POST['EmaiToEmail'];
echo "<br />";
echo $BusinessEmail=$_POST['BusinessEmail'];
echo "<br />";
echo $EmaiToSubject=$_POST['EmaiToSubject'];
echo "<br />";
echo $BusinessPhone=$_POST['BusinessPhone'];
echo "<br />";
echo $BusinessFullName=$_POST['BusinessFullName'];
echo "<br />";
echo $BusinessName=$_POST['BusinessName'];
echo "<br />";
echo $EmaiToFullName=$_POST['EmaiToFullName'];


$CovidAccepted=sanitize_sql_string($_POST['AgentUniqID']);
$CovidNoReason=sanitize_sql_string($_POST['CovidNoReason']);

if ($CovidAccepted=='No')
{
	$CovidAccepted='';
	$CovidNoReason='';
}


echo $AgentUniqID=sanitize_sql_string($_POST['AgentUniqID']);
echo $AgentID=sanitize_sql_string($_POST['AgentID']);

echo $BusinessFullName=sanitize_sql_string($_POST['BusinessFullName']);
echo $BusinessPhone=($_POST['BusinessPhone']);
echo $BusinessName=sanitize_sql_string($_POST['BusinessName']);
echo $BusinessEmail=sanitize_sql_string($_POST['BusinessEmail']);

echo $EmaiToEmail=sanitize_sql_string($_POST['EmaiToEmail']);
echo $EmaiToFullName=sanitize_sql_string($_POST['EmaiToFullName']);


/*echo $EmaiToFullName1=sanitize_sql_string($_POST['EmaiToFullName1']);
echo $EmaiToEmail1=sanitize_sql_string($_POST['EmaiToEmail1']);
echo $EmaiToFullName2=sanitize_sql_string($_POST['EmaiToFullName2']);
echo $EmaiToEmail2=sanitize_sql_string($_POST['EmaiToEmail2']);*/

/*if (!empty($EmaiToFullName1))
$EmaiToFullName=$EmaiToFullName1;
else
$EmaiToFullName=$EmaiToFullName2;*/

$filestring = str_replace(' ', '', $EmaiToFullName);
$filestring = str_replace("\'", '', $filestring);
$filestring = str_replace('"', '', $filestring);
$filestring = str_replace("", '', $filestring);

/*if (!empty($EmaiToEmail1))
$EmaiToEmail=$EmaiToEmail1; 
else
$EmaiToEmail=$EmaiToEmail2;*/ 

echo $EmaiToSubject=sanitize_sql_string($_POST['EmaiToSubject']);
echo $EmailToBCC=sanitize_sql_string($_POST['EmailToBCC']);
echo $EmailToType1=sanitize_sql_string($_POST['EmailToType']);
switch ($EmailToType1) {
  case "81":
   $EmailToType='Single';
    break;
  case "82":
   $EmailToType='Multiple';
    break;	
}
//EmailToType if 81 selected send to single person if 82 selected send to Multiple people


// Service Agreement
$ServiceAgreementType1=($_POST['ServiceAgreementType']);
switch ($ServiceAgreementType1) {
  case "11":
   $ServiceAgreementType='Centre Holidays Service Fee Agreement';
    break;
  case "12":
   $ServiceAgreementType='My Service Fee Agreement';
    break;	
  default:
   $ServiceAgreementType='Centre Holidays Service Fee Agreement';
}
echo $ServiceAgreementType;
echo $ServiceCurrency=($_POST['ServiceCurrency']);
echo "------------------------------------";
echo $QuoteNumberPersons=sanitize_sql_string($_POST['QuoteNumberPersons']);
echo "----------------------------------";
echo $QuoteFeePerPerson=sanitize_sql_string($_POST['QuoteFeePerPerson']);
echo $QuoteTotalFee=sanitize_sql_string($_POST['QuoteTotalFee']);

echo $BookingFeeNumberPersons=sanitize_sql_string($_POST['BookingFeeNumberPersons']);
echo $BookingFeePerPerson=sanitize_sql_string($_POST['BookingFeePerPerson']);
echo $BookingFeeTotal=sanitize_sql_string($_POST['BookingFeeTotal']);

echo $ServiceDetails=sanitize_sql_string($_POST['ServiceDetails']);

echo $NServicePDF=basename($_FILES["ServicePDF"]["name"]);// pdf file ==========
if (!empty($NServicePDF)) {
	echo basename($_FILES["ServicePDF"]["name"]);// my service agreement pdf
	$string1 = rand(0000000, 99999999999);		
	$random1 =rand(100000, 9999999999999);		
	$random1 ='ServicePDF_'.$filestring.'_'.$random1.'_'.$string1;
	$file1 = $_FILES["ServicePDF"]["tmp_name"];
	$filename1 = $_FILES['ServicePDF']['name'];
	$allowed1 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension1 = end(explode('.',$filename1));
	if(in_array($extension1,$allowed1) ) {
	$new_file1 = $random1;
	$new_file1=$new_file1.'.'.$extension1;	
	$tmp_name1 = $_FILES["ServicePDF"]["tmp_name"];
	move_uploaded_file($tmp_name1, "../img/agents/booking-authorization-email-form/".$new_file1);		
	$ServicePDF=$new_file1;
	}
}

if (!empty($new_file1))
$ServicePDF=$new_file1;
else
$ServicePDF=$_POST['CServicePDF'];

//Trip Details
echo $Supplier=sanitize_sql_string($_POST['Supplier']);
echo $BookingNumber=sanitize_sql_string($_POST['BookingNumber']);
echo $TripDetails=sanitize_sql_string($_POST['TripDetails']);

echo $CheckSupplier=sanitize_sql_string($_POST['CheckSupplier']);


echo $NTripDetailsPDF=basename($_FILES["TripDetailsPDF"]["name"]);// pdf file ==========
if (!empty($NTripDetailsPDF)) {
	basename($_FILES["TripDetailsPDF"]["name"]);// pdf file ==========
	$string2 = rand(0000000, 99999999999);		
	$random2 =rand(100000, 9999999999999);		
	$random2 ='TripDetailsPDF_'.$filestring.'_'.$random2.'_'.$string2;
	$file2 = $_FILES["TripDetailsPDF"]["tmp_name"];
	$filename2 = $_FILES['TripDetailsPDF']['name'];
	$allowed2 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension2 = end(explode('.',$filename2));
	if(in_array($extension2,$allowed2) ) {
	$new_file2 = $random2;
	$new_file2=$new_file2.'.'.$extension2;	
	$tmp_name2 = $_FILES["TripDetailsPDF"]["tmp_name"];
	move_uploaded_file($tmp_name2, "../img/agents/booking-authorization-email-form/".$new_file2);		
	}
}

if (!empty($new_file2))
$TripDetailsPDF=$new_file2;
else
$TripDetailsPDF=$_POST['CTripDetailsPDF'];

//===============================================================================================

echo $InsurancePricing=($_POST['InsurancePricing']);

if ($InsurancePricing==1)
{
$InsurancePersonType2='';
$InsurancePersonType3='';
$InsurancePersonType4='';
$InsurancePersonType5='';
}

if ($InsurancePricing==2)
{
$InsurancePersonType3='';
$InsurancePersonType4='';
$InsurancePersonType5='';
}

if ($InsurancePricing==3)
{
$InsurancePersonType4='';
$InsurancePersonType5='';
}

if ($InsurancePricing==4)
{
$InsurancePersonType5='';
}


//===============================================================================================
//Pricing 
echo $TripPricingCurrency=($_POST['TripPricingCurrency']);
echo $TripPricingOptions=($_POST['TripPricingOptions']);
$TripPaymentSchedule1=($_POST['TripPaymentSchedule']);
switch ($TripPaymentSchedule1) {
  case "20":
   $TripPaymentSchedule='Full Payment';
    break;
  case "22":
   $TripPaymentSchedule='2 Payments';
    break;	
  case "23":
   $TripPaymentSchedule='3 Payments';
    break;
  case "24":
   $TripPaymentSchedule='4 Payments';
    break;
  case "25":
   $TripPaymentSchedule='5 Payments';
    break;	
}
echo $TripPaymentSchedule;

if ($TripPricingOptions==1)
{
// Pricing Option 1
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=$_POST['NumberOfPersons1'];
echo $PricePerPerson1=$_POST['PricePerPerson1'];
echo $TotalPrice1= $NumberOfPersons1*$PricePerPerson1;
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);

$PricingType2='';
$PricingType3='';
$PricingType4='';
$PricingType5='';

echo $NumberOfPersons4='';
echo $PricePerPerson4='';
echo $TotalPrice4= '';
echo $PricingDescription4='';

echo $NumberOfPersons5='';
echo $PricePerPerson5='';
echo $TotalPrice5= '';
echo $PricingDescription5='';

echo $NumberOfPersons3='';
echo $PricePerPerson3='';
echo $TotalPrice3='';
echo $PricingDescription3='';

echo $NumberOfPersons2='';
echo $PricePerPerson2='';
echo $TotalPrice2= '';
echo $PricingDescription2='';
}

if ($TripPricingOptions==2)
{
// Pricing Option 2
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=$_POST['NumberOfPersons1'];
echo $PricePerPerson1=$_POST['PricePerPerson1'];
echo $TotalPrice1= $NumberOfPersons1*$PricePerPerson1;
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);
echo $PricingType2=sanitize_sql_string($_POST['PricingType2']);
echo $NumberOfPersons2=$_POST['NumberOfPersons2'];
echo $PricePerPerson2=$_POST['PricePerPerson2'];
echo $TotalPrice2= $NumberOfPersons2*$PricePerPerson2;
echo $PricingDescription2=sanitize_sql_string($_POST['PricingDescription2']);

$PricingType3='';
$PricingType4='';
$PricingType5='';

echo $NumberOfPersons4='';
echo $PricePerPerson4='';
echo $TotalPrice4= '';
echo $PricingDescription4='';

echo $NumberOfPersons5='';
echo $PricePerPerson5='';
echo $TotalPrice5= '';
echo $PricingDescription5='';

echo $NumberOfPersons3='';
echo $PricePerPerson3='';
echo $TotalPrice3= '';
echo $PricingDescription3='';

}

if ($TripPricingOptions==3)
{
// Pricing Option 3
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=$_POST['NumberOfPersons1'];
echo $PricePerPerson1=$_POST['PricePerPerson1'];
echo $TotalPrice1= $NumberOfPersons1*$PricePerPerson1;
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);
echo $PricingType2=sanitize_sql_string($_POST['PricingType2']);
echo $NumberOfPersons2=$_POST['NumberOfPersons2'];
echo $PricePerPerson2=$_POST['PricePerPerson2'];
echo $TotalPrice2= $NumberOfPersons2*$PricePerPerson2;
echo $PricingDescription2=sanitize_sql_string($_POST['PricingDescription2']);
echo $PricingType3=sanitize_sql_string($_POST['PricingType3']);
echo $NumberOfPersons3=$_POST['NumberOfPersons3'];
echo $PricePerPerson3=$_POST['PricePerPerson3'];
echo $TotalPrice3= $NumberOfPersons3*$PricePerPerson3;
echo $PricingDescription3=sanitize_sql_string($_POST['PricingDescription3']);

$PricingType4='';
$PricingType5='';

echo $NumberOfPersons4='';
echo $PricePerPerson4='';
echo $TotalPrice4= '';
echo $PricingDescription4='';

echo $NumberOfPersons5='';
echo $PricePerPerson5='';
echo $TotalPrice5= '';
echo $PricingDescription5='';
}

if ($TripPricingOptions==4)
{
// Pricing Option 4
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=$_POST['NumberOfPersons1'];
echo $PricePerPerson1=$_POST['PricePerPerson1'];
echo $TotalPrice1= $NumberOfPersons1*$PricePerPerson1;
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);
echo $PricingType2=sanitize_sql_string($_POST['PricingType2']);
echo $NumberOfPersons2=$_POST['NumberOfPersons2'];
echo $PricePerPerson2=$_POST['PricePerPerson2'];
echo $TotalPrice2= $NumberOfPersons2*$PricePerPerson2;
echo $PricingDescription2=sanitize_sql_string($_POST['PricingDescription2']);
echo $PricingType3=sanitize_sql_string($_POST['PricingType3']);
echo $NumberOfPersons3=$_POST['NumberOfPersons3'];
echo $PricePerPerson3=$_POST['PricePerPerson3'];
echo $TotalPrice3= $NumberOfPersons3*$PricePerPerson3;
echo $PricingDescription3=sanitize_sql_string($_POST['PricingDescription3']);
echo $PricingType4=sanitize_sql_string($_POST['PricingType4']);
echo $NumberOfPersons4=$_POST['NumberOfPersons4'];
echo $PricePerPerson4=$_POST['PricePerPerson4'];
echo $TotalPrice4= $NumberOfPersons4*$PricePerPerson4;
echo $PricingDescription4=sanitize_sql_string($_POST['PricingDescription4']);

$PricingType5='';

echo $NumberOfPersons5='';
echo $PricePerPerson5='';
echo $TotalPrice5= '';
echo $PricingDescription5='';
}


if ($TripPricingOptions==5)
{
// Pricing Option 5
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=$_POST['NumberOfPersons1'];
echo $PricePerPerson1=$_POST['PricePerPerson1'];
echo $TotalPrice1= $NumberOfPersons1*$PricePerPerson1;
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);
echo $PricingType2=sanitize_sql_string($_POST['PricingType2']);
echo $NumberOfPersons2=$_POST['NumberOfPersons2'];
echo $PricePerPerson2=$_POST['PricePerPerson2'];
echo $TotalPrice2= $NumberOfPersons2*$PricePerPerson2;
echo $PricingDescription2=sanitize_sql_string($_POST['PricingDescription2']);
echo $PricingType3=sanitize_sql_string($_POST['PricingType3']);
echo $NumberOfPersons3=$_POST['NumberOfPersons3'];
echo $PricePerPerson3=$_POST['PricePerPerson3'];
echo $TotalPrice3= $NumberOfPersons3*$PricePerPerson3;
echo $PricingDescription3=sanitize_sql_string($_POST['PricingDescription3']);
echo $PricingType4=sanitize_sql_string($_POST['PricingType4']);
echo $NumberOfPersons4=$_POST['NumberOfPersons4'];
echo $PricePerPerson4=$_POST['PricePerPerson4'];
echo $TotalPrice4= $NumberOfPersons4*$PricePerPerson4;
echo $PricingDescription4=sanitize_sql_string($_POST['PricingDescription4']);
echo $PricingType5=sanitize_sql_string($_POST['PricingType5']);
echo $NumberOfPersons5=$_POST['NumberOfPersons5'];
echo $PricePerPerson5=$_POST['PricePerPerson5'];
echo $TotalPrice5= $NumberOfPersons5*$PricePerPerson5;
echo $PricingDescription5=sanitize_sql_string($_POST['PricingDescription5']);
}

//================================================================

//Full Payment
echo $FullPayment=sanitize_sql_string($_POST['FullPayment']);
echo $FullPaymentDate=sanitize_sql_string($_POST['FullPaymentDate']);
echo $TotalAmountDue=$_POST['TotalAmountDue'];

//Payment Schedule 1
echo $PaymentType1=sanitize_sql_string($_POST['PaymentType1']);
echo $PaymentDate1=sanitize_sql_string($_POST['PaymentDate1']);
echo $PaymentDue1=$_POST['PaymentDue1'];

//Payment Schedule 2
echo $PaymentType2=sanitize_sql_string($_POST['PaymentType2']);
echo $PaymentDate2=sanitize_sql_string($_POST['PaymentDate2']);
echo $PaymentDue2=$_POST['PaymentDue2'];

//Payment Schedule 3
echo $PaymentType3=sanitize_sql_string($_POST['PaymentType3']);
echo $PaymentDate3=sanitize_sql_string($_POST['PaymentDate3']);
echo $PaymentDue3=$_POST['PaymentDue3'];

//Payment Schedule 4
echo $PaymentType4=sanitize_sql_string($_POST['PaymentType4']);
echo $PaymentDate4=sanitize_sql_string($_POST['PaymentDate4']);
echo $PaymentDue4=$_POST['PaymentDue4'];

//Payment Schedule 5
echo $PaymentType5=sanitize_sql_string($_POST['PaymentType5']);
echo $PaymentDate5=sanitize_sql_string($_POST['PaymentDate5']);
echo $PaymentDue5=$_POST['PaymentDue5'];


//======================================================================

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

//=====================================================================

$TripGrandTotal=($_POST['TripGrandTotal']);
$InsuranceGrandTotal=($_POST['InsuranceGrandTotal']);
$OverallGrandTotal=($_POST['OverallGrandTotal']);
$MethodOfPayment=($_POST['MethodOfPayment']);
$TravelerDocuments1=($_POST['TravelerDocuments1']);
$TravelerDocuments2=($_POST['TravelerDocuments2']);
$TravelerDocuments3=($_POST['TravelerDocuments3']);
$TravelerDocuments4=($_POST['TravelerDocuments4']);
$TravelerDocuments5=($_POST['TravelerDocuments5']);


//======================================================================

//Trip Terms & Conditions
echo $TermsType1=sanitize_sql_string($_POST['TermsType']);
switch ($TermsType1) {
  case "91":
   $TermsType='All-Inclusive Vacations';
    break;
  case "92":
   $TermsType='All-Inclusive Group Vacations';
    break;	
  case "93":
   $TermsType='Cruises';
    break;
  case "94":
   $TermsType='Flights';
    break;	
  case "95":
   $TermsType='Custom Terms and Conditions';
    break;		
}
echo $TermsAndConditions=sanitize_sql_string($_POST['TermsAndConditions']);

echo $NTermsAndConditionsPDF=basename($_FILES["TermsAndConditionsPDF"]["name"]);// pdf file ==========
if (!empty($NTermsAndConditionsPDF)) {
	echo basename($_FILES["TermsAndConditionsPDF"]["name"]);// pdf file ==========
	$string3 = rand(0000000, 99999999999);		
	$random3 =rand(100000, 9999999999999);		
	$random3 ='TermsAndConditionsPDF_'.$filestring.'_'.$random3.'_'.$string3;
	$file3 = $_FILES["TermsAndConditionsPDF"]["tmp_name"];
	$filename3 = $_FILES['TermsAndConditionsPDF']['name'];
	$allowed3 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension3 = end(explode('.',$filename3));
	if(in_array($extension3,$allowed3) ) {
	$new_file3 = $random3;
	$new_file3=$new_file3.'.'.$extension3;	
	$tmp_name3 = $_FILES["TermsAndConditionsPDF"]["tmp_name"];
	move_uploaded_file($tmp_name3, "../img/agents/booking-authorization-email-form/".$new_file3);		
	$TermsAndConditionsPDF=$new_file3;
	}
}

if (!empty($new_file3))
$TermsAndConditionsPDF=$new_file3;
else
$TermsAndConditionsPDF=$_POST['CTermsAndConditionsPDF'];
 
//Cancellation Policy
echo $CancellationPolicy=sanitize_sql_string($_POST['CancellationPolicy']);

echo $NCancellationPolicyPDF=basename($_FILES["CancellationPolicyPDF"]["name"]);// pdf file ==========
if (!empty($NCancellationPolicyPDF)) {
	echo basename($_FILES["CancellationPolicyPDF"]["name"]);// pdf file ==========
	$string4 = rand(0000000, 99999999999);		
	$random4 =rand(100000, 9999999999999);		
	$random4 ='CancellationPolicyPDF_'.$filestring.'_'.$random4.'_'.$string4;
	$file4 = $_FILES["CancellationPolicyPDF"]["tmp_name"];
	$filename4 = $_FILES['CancellationPolicyPDF']['name'];
	$allowed4 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension4 = end(explode('.',$filename4));
	if(in_array($extension4,$allowed4) ) {
	$new_file4 = $random4;
	$new_file4=$new_file4.'.'.$extension4;	
	$tmp_name4 = $_FILES["CancellationPolicyPDF"]["tmp_name"];
	move_uploaded_file($tmp_name4, "../img/agents/booking-authorization-email-form/".$new_file4);		
	$CancellationPolicyPDF=$new_file4;
	}
}

if (!empty($new_file4))
$CancellationPolicyPDF=$new_file4;
else
$CancellationPolicyPDF=$_POST['CCancellationPolicyPDF'];

//Insurance Provider
echo $InsuranceProvider=sanitize_sql_string($_POST['InsuranceProvider']);
echo $InsuranceCurrency=($_POST['InsuranceCurrency']);

echo $NInsurancePDF=basename($_FILES["InsurancePDF"]["name"]);// pdf file ==========
if (!empty($NInsurancePDF)) {
	echo basename($_FILES["InsurancePDF"]["name"]);// pdf file ==========
	$string5 = rand(0000000, 99999999999);		
	$random5 =rand(100000, 9999999999999);		
	$random5 ='InsuranceProvider_'.$filestring.'_'.$random5.'_'.$string5;
	$file5 = $_FILES["InsurancePDF"]["tmp_name"];
	$filename5 = $_FILES['InsurancePDF']['name'];
	$allowed5 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension5 = end(explode('.',$filename5));
	if(in_array($extension5,$allowed5) ) {
	$new_file5 = $random5;
	$new_file5=$new_file5.'.'.$extension5;	
	$tmp_name5 = $_FILES["InsurancePDF"]["tmp_name"];
	move_uploaded_file($tmp_name5, "../img/agents/booking-authorization-email-form/".$new_file5);		
	$InsurancePDF=$new_file5;
	}
}

if (!empty($new_file5))
$InsurancePDF=$new_file5;
else
$InsurancePDF=$_POST['CInsurancePDF'];

//================================================================================

//Insurance Pricing Option 1
echo $InsuranceNumberPersons1=sanitize_sql_string($_POST['InsuranceNumberPersons1']);
echo $InsurancePricePerPerson1=$_POST['InsurancePricePerPerson1'];
echo $InsuranceTotalPrice1=$_POST['InsuranceTotalPrice1'];
echo $InsuranceDescription1=sanitize_sql_string($_POST['InsuranceDescription1']);

//Insurance Pricing Option 2
echo $InsuranceNumberPersons2=sanitize_sql_string($_POST['InsuranceNumberPersons2']);
echo $InsurancePricePerPerson2=$_POST['InsurancePricePerPerson2'];
echo $InsuranceTotalPrice2=$_POST['InsuranceTotalPrice2'];
echo $InsuranceDescription2=sanitize_sql_string($_POST['InsuranceDescription2']);

//Insurance Pricing Option 3
echo $InsuranceNumberPersons3=sanitize_sql_string($_POST['InsuranceNumberPersons3']);
echo $InsurancePricePerPerson3=$_POST['InsurancePricePerPerson3'];
echo $InsuranceTotalPrice3=$_POST['InsuranceTotalPrice3'];
echo $InsuranceDescription3=sanitize_sql_string($_POST['InsuranceDescription3']);

//Insurance Pricing Option 4
echo $InsuranceNumberPersons4=sanitize_sql_string($_POST['InsuranceNumberPersons4']);
echo $InsurancePricePerPerson4=$_POST['InsurancePricePerPerson4'];
echo $InsuranceTotalPrice4=$_POST['InsuranceTotalPrice4'];
echo $InsuranceDescription4=sanitize_sql_string($_POST['InsuranceDescription4']);

//Insurance Pricing Option 5
echo $InsuranceNumberPersons5=sanitize_sql_string($_POST['InsuranceNumberPersons5']);
echo $InsurancePricePerPerson5=$_POST['InsurancePricePerPerson5'];
echo $InsuranceTotalPrice5=$_POST['InsuranceTotalPrice5'];
echo $InsuranceDescription5=sanitize_sql_string($_POST['InsuranceDescription5']);

//=============================Additional Documents & URLs===============================

$Checkboxes91=$_POST['Checkboxes91'];
$Checkboxes92=$_POST['Checkboxes92'];
$Checkboxes93=$_POST['Checkboxes93'];

//================CURRENT ADDITIONAL FILES=================

$CMAdditionalPDF1= $_POST['CMAdditionalPDF1'];
$CMAdditionalTitle1= $_POST['CMAdditionalTitle1'];
$CMAdditionalURL1= $_POST['CMAdditionalURL1'];

$CMAdditionalPDF2= $_POST['CMAdditionalPDF2'];
$CMAdditionalTitle2= $_POST['CMAdditionalTitle2'];
$CMAdditionalURL2= $_POST['CMAdditionalURL2'];

$CMAdditionalPDF3= $_POST['CMAdditionalPDF3'];
$CMAdditionalTitle3= $_POST['CMAdditionalTitle3'];
$CMAdditionalURL3= $_POST['CMAdditionalURL3'];

//====================================NEW ADDITIONAL FILES======================

echo $AdditionalType1=($_POST['AdditionalType1']);
echo $AdditionalTitle1=sanitize_sql_string($_POST['AdditionalTitle1']);
echo $AdditionalURL1=($_POST['AdditionalURL1']);

//=============================compare current to new of any changes?=============

if ($AdditionalTitle1 !=$CMAdditionalTitle1){$chg=1;} else {$chg=0;}
if ($AdditionalURL1 !=$CMAdditionalURL1){$chg=1;} else {$chg=0;}

//==========================UPLAOD NEW FILE======================================

if (!empty($_FILES["AdditionalPDF1"]["name"])) {
	echo basename($_FILES["AdditionalPDF1"]["name"]);// pdf file ==========
	$string6 = rand(0000000, 99999999999);		
	$random6 =rand(100000, 9999999999999);		
	$random6 ='AdditionalPDF1_'.$filestring.'_'.$random6.'_'.$string6;
	$file6 = $_FILES["AdditionalPDF1"]["tmp_name"];
	$filename6 = $_FILES['AdditionalPDF1']['name'];
	$allowed6 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension6 = end(explode('.',$filename6));
	if(in_array($extension6,$allowed6) ) {
	$new_file6 = $random6;
	$new_file6=$new_file6.'.'.$extension6;	
	$tmp_name6 = $_FILES["AdditionalPDF1"]["tmp_name"];
	move_uploaded_file($tmp_name6, "../img/agents/booking-authorization-email-form/".$new_file6);		
	$AdditionalPDF1=$new_file6;
	$chg=1;
	}
}
else
{
$AdditionalPDF1=$CMAdditionalPDF1;
$chg=0;
}

//==========================

echo $AdditionalType2=($_POST['AdditionalType2']);
echo $AdditionalTitle2=sanitize_sql_string($_POST['AdditionalTitle2']);
echo $AdditionalURL2=($_POST['AdditionalURL2']);

if ($AdditionalTitle2 !=$CMAdditionalTitle2){$chg=1;} else {$chg=0;}
if ($AdditionalURL2 !=$CMAdditionalURL2){$chg=1;} else {$chg=0;}

if (!empty($_FILES["AdditionalPDF2"]["name"])) {
	echo basename($_FILES["AdditionalPDF2"]["name"]);// pdf file ==========
	$string7 = rand(0000000, 99999999999);		
	$random7 =rand(100000, 9999999999999);		
	$random7 ='AdditionalPDF2_'.$filestring.'_'.$random7.'_'.$string7;
	$file7 = $_FILES["AdditionalPDF2"]["tmp_name"];
	$filename7 = $_FILES['AdditionalPDF2']['name'];
	$allowed7 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension7 = end(explode('.',$filename7));
	if(in_array($extension7,$allowed7) ) {
	$new_file7 = $random7;
	$new_file7=$new_file7.'.'.$extension7;	
	$tmp_name7 = $_FILES["AdditionalPDF2"]["tmp_name"];
	move_uploaded_file($tmp_name7, "../img/agents/booking-authorization-email-form/".$new_file7);		
	$AdditionalPDF2=$new_file7;
	$chg=1;
	}
}
else
{
$AdditionalPDF2=$CMAdditionalPDF2;
$chg=0;
}

//=====================================
	
echo $AdditionalType3=($_POST['AdditionalType3']);
echo $AdditionalTitle3=sanitize_sql_string($_POST['AdditionalTitle3']);
echo $AdditionalURL3=($_POST['AdditionalURL3']);

if ($AdditionalTitle3 !=$CMAdditionalTitle3){$chg=1;} else {$chg=0;}
if ($AdditionalURL3 !=$CMAdditionalURL3){$chg=1;} else {$chg=0;}

if (!empty($_FILES["AdditionalPDF3"]["name"])) {
	echo basename($_FILES["AdditionalPDF3"]["name"]);// pdf file ==========
	$string8 = rand(0000000, 99999999999);		
	$random8 =rand(100000, 9999999999999);		
	$random8 ='AdditionalPDF3_'.$filestring.'_'.$random8.'_'.$string8;
	$file8 = $_FILES["AdditionalPDF3"]["tmp_name"];
	$filename8 = $_FILES['AdditionalPDF3']['name'];
	$allowed8 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
	$extension8 = end(explode('.',$filename8));
	if(in_array($extension8,$allowed8) ) {
	$new_file8 = $random8;
	$new_file8=$new_file8.'.'.$extension8;	
	$tmp_name8 = $_FILES["AdditionalPDF3"]["tmp_name"];
	move_uploaded_file($tmp_name8, "../img/agents/booking-authorization-email-form/".$new_file8);		
	$AdditionalPDF3=$new_file8;
	$chg=1;
	}
}
else
{
$AdditionalPDF3=$CMAdditionalPDF3;
$chg=0;
}


//===================================================================================
//===============send agent to customer==============================================
//===================================================================================
echo $BookID; 
echo $BookUnique;
echo $EmaiToEmail;
echo "<br />";
echo $BusinessEmail;
echo "<br />";
echo $EmaiToSubject;
echo "<br />";
echo $BusinessPhone;
echo "<br />";
echo $BusinessFullName;
echo "<br />";
echo $BusinessName;
echo "<br />";
echo $EmaiToFullName; 

//===================================================================================
//=============================Table 1===============================================
//===================================================================================
$sql1 = "UPDATE booking_1 SET 
EmaiToSubject='$EmaiToSubject',
ServiceAgreementType='$ServiceAgreementType',
ServiceCurrency='$ServiceCurrency',
QuoteNumberPersons='$QuoteNumberPersons',
QuoteFeePerPerson='$QuoteFeePerPerson',
QuoteTotalFee='$QuoteTotalFee',
BookingFeeNumberPersons='$BookingFeeNumberPersons',
BookingFeePerPerson='$BookingFeePerPerson',
BookingFeeTotal='$BookingFeeTotal',
ServiceDetails='$ServiceDetails',
ServicePDF='$ServicePDF',
Supplier='$Supplier',
CheckSupplier='$CheckSupplier',
BookingNumber='$BookingNumber',
TripDetails='$TripDetails',
TripDetailsPDF='$TripDetailsPDF',
TripPricingCurrency='$TripPricingCurrency',
TripPaymentSchedule='$TripPaymentSchedule',
NumberOfPersons1='$NumberOfPersons1',
PricePerPerson1='$PricePerPerson1',
TotalPrice1='$TotalPrice1',
PricingDescription1='$PricingDescription1',
NumberOfPersons2='$NumberOfPersons2',
PricePerPerson2='$PricePerPerson2',
TotalPrice2='$TotalPrice2',
PricingDescription2='$PricingDescription2',
NumberOfPersons3='$NumberOfPersons3',
PricePerPerson3='$PricePerPerson3',
TotalPrice3='$TotalPrice3',
PricingDescription3='$PricingDescription3',
NumberOfPersons4='$NumberOfPersons4',
PricePerPerson4='$PricePerPerson4',
TotalPrice4='$TotalPrice4',
PricingDescription4='$PricingDescription4',
NumberOfPersons5='$NumberOfPersons5',
PricePerPerson5='$PricePerPerson5',
TotalPrice5='$TotalPrice5',
PricingDescription5='$PricingDescription5',
FullPayment='$FullPayment',
FullPaymentDate='$FullPaymentDate',
TotalAmountDue='$TotalAmountDue',
PaymentType1='$PaymentType1',
PaymentDate1='$PaymentDate1',
PaymentDue1='$PaymentDue1',
PaymentType2='$PaymentType2',
PaymentDate2='$PaymentDate2',
PaymentDue2='$PaymentDue2',
PaymentType3='$PaymentType3',
PaymentDate3='$PaymentDate3',
PaymentDue3='$PaymentDue3',
PaymentType4='$PaymentType4',
PaymentDate4='$PaymentDate4',
PaymentDue4='$PaymentDue4',
PaymentType5='$PaymentType5',
PaymentDate5='$PaymentDate5',
PaymentDue5='$PaymentDue5',
PricingType1='$PricingType1',
PricingType2='$PricingType2',
PricingType3='$PricingType3',
PricingType4='$PricingType4',
PricingType5='$PricingType5',
TermsType='$TermsType',
TermsAndConditions='$TermsAndConditions',
TermsAndConditionsPDF='$TermsAndConditionsPDF',
CancellationPolicy='$CancellationPolicy',
CancellationPolicyPDF='$CancellationPolicyPDF',
InsuranceProvider='$InsuranceProvider',
InsuranceCurrency='$InsuranceCurrency',
InsurancePDF='$InsurancePDF',
InsurancePersonType1='$InsurancePersonType1',
InsuranceNumberPersons1='$InsuranceNumberPersons1',
InsurancePricePerPerson1='$InsurancePricePerPerson1',
InsuranceTotalPrice1='$InsuranceTotalPrice1',
InsuranceDescription1='$InsuranceDescription1',
InsurancePersonType2='$InsurancePersonType2',
InsuranceNumberPersons2='$InsuranceNumberPersons2',
InsurancePricePerPerson2='$InsurancePricePerPerson2',
InsuranceTotalPrice2='$InsuranceTotalPrice2',
InsuranceDescription2='$InsuranceDescription2',
InsurancePersonType3='$InsurancePersonType3',
InsuranceNumberPersons3='$InsuranceNumberPersons3',
InsurancePricePerPerson3='$InsurancePricePerPerson3',
InsuranceTotalPrice3='$InsuranceTotalPrice3',
InsuranceDescription3='$InsuranceDescription3',
InsurancePersonType4='$InsurancePersonType4',
InsuranceNumberPersons4='$InsuranceNumberPersons4',
InsurancePricePerPerson4='$InsurancePricePerPerson4',
InsuranceTotalPrice4='$InsuranceTotalPrice4',
InsuranceDescription4='$InsuranceDescription4',
InsurancePersonType5='$InsurancePersonType5',
InsuranceNumberPersons5='$InsuranceNumberPersons5',
InsurancePricePerPerson5='$InsurancePricePerPerson5',
InsuranceTotalPrice5='$InsuranceTotalPrice5',
InsuranceDescription5='$InsuranceDescription5',
AdditionalTitle1='$AdditionalTitle1',
AdditionalURL1='$AdditionalURL1',
AdditionalPDF1='$AdditionalPDF1',
AdditionalTitle2='$AdditionalTitle2',
AdditionalURL2='$AdditionalURL2',
AdditionalPDF2='$AdditionalPDF2',
AdditionalTitle3='$AdditionalTitle3',
AdditionalURL3='$AdditionalURL3',
AdditionalPDF3='$AdditionalPDF3',
AdditionalConsent='',
BookingTime='$BookingTimeRep',
BookingTimeRep='$BookingTimeRep',
AdditionalType1='$AdditionalType1',
AdditionalType2='$AdditionalType2',
AdditionalType3='$AdditionalType3',
chg='$chg'
WHERE BookID='".$BookID."'";
if (mysqli_query($conn, $sql1)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

/*
$sql2 = "UPDATE booking_2 SET 
TripGrandTotal='$TripGrandTotal',
InsuranceGrandTotal='$InsuranceGrandTotal',
OverallGrandTotal='$OverallGrandTotal',
TravelerDocuments1='$TravelerDocuments1',
TravelerDocuments2='$TravelerDocuments2',
TravelerDocuments3='$TravelerDocuments3',
TravelerDocuments4='$TravelerDocuments4',
TravelerDocuments5='$TravelerDocuments5'
WHERE BookID2='".$BookID."'";

if (mysqli_query($conn, $sql2)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
*/

$pieces = explode("@", $EmaiToEmail);//EmaiToEmail
echo $emailext=strtolower($pieces[1]);

$urllink='https://centreholidays.com/clients/booking-authorization-email-form.php?BookID='.$BookID.'&bq='.$BookUnique;
	
$subject  = $EmaiToSubject;	
$from     = $BusinessEmail;	

$message = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/booking-authorization-email-form-client.php");// embed php values in HTML file
$message  = str_replace("_BusinessEmail_", $BusinessEmail, $message); 
$message  = str_replace("_BusinessPhone_", $BusinessPhone, $message); 
$message  = str_replace("_BusinessFullName_", $BusinessFullName, $message); 
$message  = str_replace("_BusinessName_", $BusinessName, $message); 
$message  = str_replace("_EmaiToFullName_", $EmaiToFullName, $message); 
$message  = str_replace("_urllink_", $urllink, $message); 
$message  = str_replace("_EmaiToSubject_", $EmaiToSubject, $message);				

if ($emailext !='gmail.com' && $emailext !='yahoo.com' && $emailext !='hotmail.com' && $emailext !='outlook.com' && $emailext !='shaw.ca' && $emailext !='shaw.com')
{  
//===============agent send to customer================================================

echo "first email";
	
	$headers  = "From: $from\r\n";
	$headers .= "Content-type: text/html\r\n";	
	$headers .= 'Bcc: '.$BusinessEmail . "\r\n";
	$to = $EmaiToEmail;
	mail($to, $subject, $message, $headers);    
            
}


if ($emailext=='yahoo.com')
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
    $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'centre_holidays@yahoo.com';                     //SMTP username
    $mail->Password   = 'fwklyiezvefcisjp';                               //SMTP password
  	$mail2->SMTPSecure = 'ssl';	//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail2->Port       = '465';     
	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->From = 'centre_holidays@yahoo.com';
	$mail->FromName = $BusinessName; //'Centre Holidays';// from name
	$mail->AddAddress($EmaiToEmail, $EmaiToFullName);  // Add a recipient  to name
	$mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails
	
	//$mail->addCC('cc@example.com'); // CC 
	//$mail->addBCC($BusinessEmail); // BCC 
	
	$mail->addReplyTo('centre_holidays@yahoo.com', 'no-reply');// reply to email yahoo only since host/smtp is yahoo
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test Yahoo via CH';
    $mail->Body    = $message;//'Test Yahoo via <strong>CH</strong>';
    //$mail->AltBody = 'Test Yahoo via Center holidays';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}



if ($emailext=='gmail.com' || $emailext=='hotmail.com' || $emailext=='outlook.com' || $emailext=='shaw.ca' || $emailext=='shaw.com')
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
	$mail->FromName = $BusinessName; //'Centre Holidays';// from name
	$mail->AddAddress($EmaiToEmail, $SendEmaiToFullName);  // Add a recipient  to name
	$mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails
	
	//$mail->addCC('cc@example.com'); // CC 
	$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test gmail via CH';
    $mail->Body    = $message;//'Test gmail via <strong>CH</strong>';
    //$mail->AltBody = 'Test gmail via Center holidays';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


//========================================================================================
header('Location: manage-email-forms.php');// Success

?>

<?php ob_flush() ?>