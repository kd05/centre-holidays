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


$BookingIP=$_SERVER['REMOTE_ADDR'];

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

echo $RequestTravellersPassport=sanitize_sql_string($_POST['RequestTravellersPassport']);
echo $RequestPrimaryTravellerCC=sanitize_sql_string($_POST['RequestPrimaryTravellerCC']);

//Email From=======================================================
echo $AgentUniqID=sanitize_sql_string($_POST['AgentUniqID']);
echo $AgentID=sanitize_sql_string($_POST['AgentID']);

echo $BusinessFullName=sanitize_sql_string($_POST['BusinessFullName']);
echo $SendBusinessFullName=($_POST['BusinessFullName']);

echo $BusinessPhone=($_POST['BusinessPhone']);
echo $BusinessName=sanitize_sql_string($_POST['BusinessName']);
echo $BusinessEmail=sanitize_sql_string($_POST['BusinessEmail']);

//Email To
echo $EmaiToFullName1=sanitize_sql_string($_POST['EmaiToFullName1']);//Also Group Or Trip Name
echo $EmaiToEmail1=sanitize_sql_string($_POST['EmaiToEmail1']);// Also Primary Customer's Email

if (!empty($_POST['EmaiToFullName2']))
    echo $EmaiToFullName2=sanitize_sql_string($_POST['EmaiToFullName2']);//Also Group Or Trip Name

if (!empty($_POST['EmaiToFullName3']))
    echo $EmaiToFullName2=sanitize_sql_string($_POST['EmaiToFullName3']);//Also Group Or Trip Name

if (!empty($_POST['EmaiToEmail2']))
    echo $EmaiToEmail2=sanitize_sql_string($_POST['EmaiToEmail2']);// Also Primary Customer's Email

if (!empty($_POST['EmaiToEmail3']))
    echo $EmaiToEmail2=sanitize_sql_string($_POST['EmaiToEmail3']);// Also Primary Customer's Email


if (!empty($EmaiToFullName1))
{
    $SendEmaiToFullName=$_POST['EmaiToFullName1'];
    $EmaiToFullName=$EmaiToFullName1;// single person
//$GroupName='';//rand().time();//============================<<<<<<<<<<<<<<<<<<=========================
}
else
{
    $SendEmaiToFullName=$EmaiToFullName2;
    $EmaiToFullName=$EmaiToFullName2;// several people
    $GroupName=$EmaiToFullName2.'-'.time();
    $UGroupName=rand();
}

$SendEmaiToFullName= str_replace("\'", "'", $SendEmaiToFullName);


$GroupName= str_replace(' ', '', $GroupName);
$GroupName=str_replace('"', "", $GroupName);
$GroupName=str_replace("'", "", $GroupName);
$GroupName=str_replace("&", "and", $GroupName);

//=================================================================
if (!empty($_POST['DBGroupName']))
{
    $GroupName1=$_POST['DBGroupName'];
}
else
{
    $GroupName1=$GroupName;
}

//========================================================================
if (!empty($_POST['DBUGroupName']))
{
    $UGroupName1=$_POST['DBUGroupName'];
}
else
{
    $UGroupName1=$UGroupName;
}
//============================================================================

$filestring = str_replace(' ', '', $EmaiToFullName);
$filestring = str_replace("\'", '', $filestring);
$filestring = str_replace('"', '', $filestring);
$filestring = str_replace("", '', $filestring);

if (!empty($EmaiToEmail1))
    $EmaiToEmail=$EmaiToEmail1; // customer email
else
    $EmaiToEmail=$EmaiToEmail2; // primary email

echo $EmaiToSubject=sanitize_sql_string($_POST['EmaiToSubject']);

if (!empty($_POST['EmailToBCC']))
    echo $EmailToBCC=($_POST['EmailToBCC']);// GROUP EMAILS LIST

if (!empty($_POST['EmailToBCC3']))
    echo $EmailToBCC=($_POST['EmailToBCC3']);// GROUP EMAILS LIST

echo $EmailToType1=sanitize_sql_string($_POST['EmailToType']);
switch ($EmailToType1) {
    case "81":
        $EmailToType='Single';
        break;
    case "82":
        $EmailToType='Multiple';
        break;
    case "83":
        $EmailToType='Shareable Link';
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
        $ServiceAgreementType='Custom Service Fee Agreement';
        break;
    //default:
    //$ServiceAgreementType='Centre Holidays Service Fee Agreement';
}
echo $ServiceAgreementType;
echo $ServiceCurrency=($_POST['ServiceCurrency']);

echo $QuoteNumberPersons=sanitize_sql_string($_POST['QuoteNumberPersons']);
echo $QuoteFeePerPerson=sanitize_sql_string($_POST['QuoteFeePerPerson']);
echo $QuoteTotalFee=sanitize_sql_string($_POST['QuoteTotalFee']);

echo $BookingFeeNumberPersons=sanitize_sql_string($_POST['BookingFeeNumberPersons']);
echo $BookingFeePerPerson=sanitize_sql_string($_POST['BookingFeePerPerson']);
echo $BookingFeeTotal=sanitize_sql_string($_POST['BookingFeeTotal']);

echo $ServiceDetails=sanitize_sql_string($_POST['ServiceDetails']);

echo basename($_FILES["ServicePDF"]["name"]);// my service agreement pdf
$string1 = rand(0000000, 99999999999);
$random1 =rand(100000, 9999999999999);
$random1 ='ServicePDF'.$filestring.$random1;
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

$ServicePDF1=$_POST['ServicePDF1'];
if (!empty($ServicePDF))
    $ServicePDF=$ServicePDF;
else
    $ServicePDF=$ServicePDF1;


//Trip Details
echo $Supplier=sanitize_sql_string($_POST['Supplier']);
echo $BookingNumber=sanitize_sql_string($_POST['BookingNumber']);
echo $TripDetails=sanitize_sql_string($_POST['TripDetails']);
echo $CheckSupplier=sanitize_sql_string($_POST['CheckSupplier']);

echo basename($_FILES["TripDetailsPDF"]["name"]);// pdf file ==========
$string2 = rand(0000000, 99999999999);
$random2 =rand(100000, 9999999999999);
$random2 ='TripDetailsPDF'.$filestring.$random2;
$file2 = $_FILES["TripDetailsPDF"]["tmp_name"];
$filename2 = $_FILES['TripDetailsPDF']['name'];
$allowed2 =  array('pdf','PDF', 'png','PNG','jpg','JPG','jpeg','JPEG');
$extension2 = end(explode('.',$filename2));
if(in_array($extension2,$allowed2) ) {
    $new_file2 = $random2;
    $new_file2=$new_file2.'.'.$extension2;
    $tmp_name2 = $_FILES["TripDetailsPDF"]["tmp_name"];
    move_uploaded_file($tmp_name2, "../img/agents/booking-authorization-email-form/".$new_file2);
    $TripDetailsPDF=$new_file2;
}

$TripDetailsPDF1=$_POST['TripDetailsPDF1'];
if (!empty($TripDetailsPDF))
    $TripDetailsPDF=$TripDetailsPDF;
else
    $TripDetailsPDF=$TripDetailsPDF1;

//Pricing 
echo $TripPricingCurrency=($_POST['TripPricingCurrency']);
echo $TripPricingOptions=sanitize_sql_string($_POST['TripPricingOptions']);
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

// Pricing Option 1
echo $PricingType1=sanitize_sql_string($_POST['PricingType1']);
echo $NumberOfPersons1=sanitize_sql_string($_POST['nop1']);
echo $PricePerPerson1=$_POST['ppp1'];
echo $TotalPrice1=$_POST['tp1'];
echo $PricingDescription1=sanitize_sql_string($_POST['PricingDescription1']);

// Pricing Option 2
echo $PricingType2=sanitize_sql_string($_POST['PricingType2']);
echo $NumberOfPersons2=sanitize_sql_string($_POST['nop2']);
echo $PricePerPerson2=$_POST['ppp2'];
echo $TotalPrice2=$_POST['tp2'];
echo $PricingDescription2=sanitize_sql_string($_POST['PricingDescription2']);

// Pricing Option 3
echo $PricingType3=sanitize_sql_string($_POST['PricingType3']);
echo $NumberOfPersons3=sanitize_sql_string($_POST['nop3']);
echo $PricePerPerson3=$_POST['ppp3'];
echo $TotalPrice3=$_POST['tp3'];
echo $PricingDescription3=sanitize_sql_string($_POST['PricingDescription3']);

// Pricing Option 4
echo $PricingType4=sanitize_sql_string($_POST['PricingType4']);
echo $NumberOfPersons4=sanitize_sql_string($_POST['nop4']);
echo $PricePerPerson4=$_POST['ppp4'];
echo $TotalPrice4=$_POST['tp4'];
echo $TotalPrice4=sanitize_sql_string($_POST['tp4']);
echo $PricingDescription4=sanitize_sql_string($_POST['PricingDescription4']);

// Pricing Option 5
echo $PricingType5=sanitize_sql_string($_POST['PricingType5']);
echo $NumberOfPersons5=sanitize_sql_string($_POST['nop5']);
echo $PricePerPerson5=$_POST['ppp5'];
echo $TotalPrice5=$_POST['tp5'];
echo $PricingDescription5=sanitize_sql_string($_POST['PricingDescription5']);

echo $PricingType1=($_POST['PricingType1']);
echo $PricingType2=($_POST['PricingType2']);
echo $PricingType3=($_POST['PricingType3']);
echo $PricingType4=($_POST['PricingType4']);
echo $PricingType5=($_POST['PricingType5']);

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
echo basename($_FILES["TermsAndConditionsPDF"]["name"]);// pdf file ==========
$string3 = rand(0000000, 99999999999);
$random3 =rand(100000, 9999999999999);
$random3 ='TermsAndConditionsPDF'.$filestring.$random3;
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

$TermsAndConditionsPDF1=$_POST['TermsAndConditionsPDF1'];
if (!empty($TermsAndConditionsPDF))
    $TermsAndConditionsPDF=$TermsAndConditionsPDF;
else
    $TermsAndConditionsPDF=$TermsAndConditionsPDF1;

//Cancellation Policy
echo $CancellationPolicy=sanitize_sql_string($_POST['CancellationPolicy']);

echo basename($_FILES["CancellationPolicyPDF"]["name"]);// pdf file ==========
$string4 = rand(0000000, 99999999999);
$random4 =rand(100000, 9999999999999);
$random4 ='CancellationPolicyPDF'.$filestring.$random4;
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

$CancellationPolicyPDF1=$_POST['CancellationPolicyPDF1'];
if (!empty($CancellationPolicyPDF))
    $CancellationPolicyPDF=$CancellationPolicyPDF;
else
    $CancellationPolicyPDF=$CancellationPolicyPDF1;

//Insurance Provider
echo $InsuranceProvider=sanitize_sql_string($_POST['InsuranceProvider']);
echo $InsuranceCurrency=($_POST['InsuranceCurrency']);
echo basename($_FILES["InsurancePDF"]["name"]);// pdf file ==========
$string5 = rand(0000000, 99999999999);
$random5 =rand(100000, 9999999999999);
$random5 ='InsuranceProvider'.$filestring.$random5;
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

$InsurancePDF1=$_POST['InsurancePDF1'];
if (!empty($InsurancePDF))
    $InsurancePDF=$InsurancePDF;
else
    $InsurancePDF=$InsurancePDF1;

//================================================================================

//Insurance Pricing Option 1
echo $InsurancePersonType1=sanitize_sql_string($_POST['InsurancePersonType1']);
echo $InsuranceNumberPersons1=sanitize_sql_string($_POST['InsuranceNumberPersons1']);
echo $InsurancePricePerPerson1=$_POST['InsurancePricePerPerson1'];
echo $InsuranceTotalPrice1=$_POST['InsuranceTotalPrice1'];
echo $InsuranceDescription1=sanitize_sql_string($_POST['InsuranceDescription1']);

//Insurance Pricing Option 2
echo $InsurancePersonType2=sanitize_sql_string($_POST['InsurancePersonType2']);
echo $InsuranceNumberPersons2=sanitize_sql_string($_POST['InsuranceNumberPersons2']);
echo $InsurancePricePerPerson2=$_POST['InsurancePricePerPerson2'];
echo $InsuranceTotalPrice2=$_POST['InsuranceTotalPrice2'];
echo $InsuranceDescription2=sanitize_sql_string($_POST['InsuranceDescription2']);

//Insurance Pricing Option 3
echo $InsurancePersonType3=sanitize_sql_string($_POST['InsurancePersonType3']);
echo $InsuranceNumberPersons3=sanitize_sql_string($_POST['InsuranceNumberPersons3']);
echo $InsurancePricePerPerson3=$_POST['InsurancePricePerPerson3'];
echo $InsuranceTotalPrice3=$_POST['InsuranceTotalPrice3'];
echo $InsuranceDescription3=sanitize_sql_string($_POST['InsuranceDescription3']);

//Insurance Pricing Option 4
echo $InsurancePersonType4=sanitize_sql_string($_POST['InsurancePersonType4']);
echo $InsuranceNumberPersons4=sanitize_sql_string($_POST['InsuranceNumberPersons4']);
echo $InsurancePricePerPerson4=$_POST['InsurancePricePerPerson4'];
echo $InsuranceTotalPrice4=$_POST['InsuranceTotalPrice4'];
echo $InsuranceDescription4=sanitize_sql_string($_POST['InsuranceDescription4']);

//Insurance Pricing Option 5
echo $InsurancePersonType5=sanitize_sql_string($_POST['InsurancePersonType5']);
echo $InsuranceNumberPersons5=sanitize_sql_string($_POST['InsuranceNumberPersons5']);
echo $InsurancePricePerPerson5=$_POST['InsurancePricePerPerson5'];
echo $InsuranceTotalPrice5=$_POST['InsuranceTotalPrice5'];
echo $InsuranceDescription5=sanitize_sql_string($_POST['InsuranceDescription5']);

//=============================================================================

//Additional Documents & URLs
echo $AdditionalType1=sanitize_sql_string($_POST['AdditionalType1']);
echo $AdditionalTitle1=sanitize_sql_string($_POST['AdditionalTitle1']);
echo $AdditionalURL1=sanitize_sql_string($_POST['AdditionalURL1']);

echo basename($_FILES["AdditionalPDF1"]["name"]);// pdf file ==========
$string6 = rand(0000000, 99999999999);
$random6 =rand(100000, 9999999999999);
$random6 ='AdditionalPDF1'.$filestring.$random6;
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
}

$AdditionalPDF11=$_POST['AdditionalPDF11'];
if (!empty($AdditionalPDF1))
    $AdditionalPDF1=$AdditionalPDF1;
else
    $AdditionalPDF1=$AdditionalPDF11;

echo $AdditionalType2=sanitize_sql_string($_POST['AdditionalType2']);
echo $AdditionalTitle2=sanitize_sql_string($_POST['AdditionalTitle2']);
echo $AdditionalURL2=sanitize_sql_string($_POST['AdditionalURL2']);

echo basename($_FILES["AdditionalPDF2"]["name"]);// pdf file ==========
$string7 = rand(0000000, 99999999999);
$random7 =rand(100000, 9999999999999);
$random7 ='AdditionalPDF2'.$filestring.$random7;
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
}

$AdditionalPDF21=$_POST['AdditionalPDF21'];
if (!empty($AdditionalPDF2))
    $AdditionalPDF2=$AdditionalPDF2;
else
    $AdditionalPDF2=$AdditionalPDF21;

echo $AdditionalType3=sanitize_sql_string($_POST['AdditionalType3']);
echo $AdditionalTitle3=sanitize_sql_string($_POST['AdditionalTitle3']);
echo $AdditionalURL3=sanitize_sql_string($_POST['AdditionalURL3']);

echo basename($_FILES["AdditionalPDF3"]["name"]);// pdf file ==========
$string8 = rand(0000000, 99999999999);
$random8 =rand(100000, 9999999999999);
$random8 ='AdditionalPDF3'.$filestring.$random8;//$filestring is the client name
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
}

$AdditionalPDF31=$_POST['AdditionalPDF31'];
if (!empty($AdditionalPDF3))
    $AdditionalPDF3=$AdditionalPDF3;
else
    $AdditionalPDF3=$AdditionalPDF31;

//==========================================================================================
//==========================================================================================
//==========================================================================================

$EmailToBCC=$EmaiToEmail2.','.$EmailToBCC;// all the emails in that group

switch ($EmailToType1) {
    case "81":
        $SetOfEmails=$EmaiToEmail1;
        break;
    case "82":
        $SetOfEmails=$EmailToBCC;
        break;
    case "83":
        $SetOfEmails='';
        break;
}


$SetOfEmails=rtrim($SetOfEmails, ',');// Remove last comma right side
$SetOfEmails_array = explode(",", $SetOfEmails);// Explode values based on comma
$result = count($SetOfEmails_array);// Count number of values in array

for( $i=0 ; $i < $result ; $i++ ) {//========================LOOP==========

    $pieces = explode(",", $SetOfEmails);
    $EmaiToEmail=trim($pieces[$i]);// each email

    $BookingTime=time();
    $BookUnique=uniqid().time();

    if ($EmailToType=='Shareable Link')
    {
        $BookingTime=$BookingTime + (86400 * 1095);
    }

    $sql = "INSERT INTO booking_1 
(
BookID, BookUnique, AgentID, AgentUniqID, 
BusinessName, BusinessFullName, BusinessPhone, BusinessEmail, EmaiToFullName, 
EmaiToEmail, GroupName, UGroupName, EmaiToSubject, EmailToBCC, EmailToType, ServiceAgreementType, 
ServiceCurrency, QuoteNumberPersons, QuoteFeePerPerson, QuoteTotalFee, 
ServiceDetails, ServicePDF, Supplier, BookingNumber, CheckSupplier, TripDetails, 
TripDetailsPDF, TripPricingCurrency, TripPaymentSchedule, NumberOfPersons1, 
PricePerPerson1, TotalPrice1, PricingDescription1, NumberOfPersons2, PricePerPerson2, 
TotalPrice2, PricingDescription2, NumberOfPersons3, PricePerPerson3, 
TotalPrice3, PricingDescription3, NumberOfPersons4, PricePerPerson4, TotalPrice4, 
PricingDescription4, NumberOfPersons5, PricePerPerson5, TotalPrice5, PricingDescription5, FullPayment, 
FullPaymentDate, TotalAmountDue, PaymentType1, PaymentDate1, PaymentDue1, PaymentType2, PaymentDate2, 
PaymentDue2, PaymentType3, PaymentDate3, PaymentDue3, PaymentType4, PaymentDate4, PaymentDue4, 
PaymentType5, PaymentDate5, PaymentDue5, 
PricingType1, PricingType2,
PricingType3, PricingType4, PricingType5,TermsType,
TermsAndConditions, TermsAndConditionsPDF, CancellationPolicy, 
CancellationPolicyPDF, InsuranceProvider, InsuranceCurrency, InsurancePDF, InsurancePersonType1, 
InsuranceNumberPersons1, InsurancePricePerPerson1, InsuranceTotalPrice1, InsuranceDescription1, 
InsurancePersonType2, InsuranceNumberPersons2, InsurancePricePerPerson2, InsuranceTotalPrice2, 
InsuranceDescription2, InsurancePersonType3, InsuranceNumberPersons3, InsurancePricePerPerson3, 
InsuranceTotalPrice3, InsuranceDescription3, InsurancePersonType4, InsuranceNumberPersons4, 
InsurancePricePerPerson4, InsuranceTotalPrice4, InsuranceDescription4, InsurancePersonType5, 
InsuranceNumberPersons5, InsurancePricePerPerson5, InsuranceTotalPrice5, InsuranceDescription5, 
AdditionalTitle1, AdditionalURL1, AdditionalPDF1, 
AdditionalTitle2, AdditionalURL2, AdditionalPDF2, AdditionalTitle3, 
AdditionalURL3, AdditionalPDF3, BookingTime, BookingStatus, BookingIP, BookingFeeNumberPersons, 
BookingFeePerPerson, BookingFeeTotal, RequestPrimaryTravellerCC, RequestTravellersPassport, 
AdditionalType1, AdditionalType2, AdditionalType3
)
VALUES 
(
'', '$BookUnique', '$AgentID', '$AgentUniqID', 
'$BusinessName', '$BusinessFullName', '$BusinessPhone', '$BusinessEmail', '$EmaiToFullName', 
'$EmaiToEmail', '$GroupName1','$UGroupName1','$EmaiToSubject', '$SetOfEmails', '$EmailToType', '$ServiceAgreementType', 
'$ServiceCurrency', '$QuoteNumberPersons', '$QuoteFeePerPerson', '$QuoteTotalFee', 
'$ServiceDetails', '$ServicePDF', '$Supplier', '$BookingNumber', '$CheckSupplier', '$TripDetails', 
'$TripDetailsPDF', '$TripPricingCurrency', '$TripPaymentSchedule', '$NumberOfPersons1', 
'$PricePerPerson1', '$TotalPrice1', '$PricingDescription1', '$NumberOfPersons2', '$PricePerPerson2', 
'$TotalPrice2', '$PricingDescription2', '$NumberOfPersons3', '$PricePerPerson3', 
'$TotalPrice3', '$PricingDescription3', '$NumberOfPersons4', '$PricePerPerson4', '$TotalPrice4', 
'$PricingDescription4', '$NumberOfPersons5', '$PricePerPerson5', '$TotalPrice5', '$PricingDescription5', 
'$FullPayment', '$FullPaymentDate', '$TotalAmountDue', '$PaymentType1', '$PaymentDate1', '$PaymentDue1', 
'$PaymentType2', '$PaymentDate2', '$PaymentDue2', '$PaymentType3', '$PaymentDate3', '$PaymentDue3', 
'$PaymentType4', '$PaymentDate4', '$PaymentDue4', '$PaymentType5', '$PaymentDate5', '$PaymentDue5',
'$PricingType1', '$PricingType2',
'$PricingType3', '$PricingType4', '$PricingType5','$TermsType', 
'$TermsAndConditions', '$TermsAndConditionsPDF', '$CancellationPolicy', '$CancellationPolicyPDF', 
'$InsuranceProvider', '$InsuranceCurrency', '$InsurancePDF', '$InsurancePersonType1', '$InsuranceNumberPersons1', 
'$InsurancePricePerPerson1', '$InsuranceTotalPrice1', '$InsuranceDescription1', '$InsurancePersonType2', 
'$InsuranceNumberPersons2', '$InsurancePricePerPerson2', '$InsuranceTotalPrice2', '$InsuranceDescription2', 
'$InsurancePersonType3', '$InsuranceNumberPersons3', '$InsurancePricePerPerson3', '$InsuranceTotalPrice3', 
'$InsuranceDescription3', '$InsurancePersonType4', '$InsuranceNumberPersons4', '$InsurancePricePerPerson4', 
'$InsuranceTotalPrice4', '$InsuranceDescription4', '$InsurancePersonType5', '$InsuranceNumberPersons5', 
'$InsurancePricePerPerson5', '$InsuranceTotalPrice5', '$InsuranceDescription5', 
'$AdditionalTitle1', '$AdditionalURL1', '$AdditionalPDF1', '$AdditionalTitle2', 
'$AdditionalURL2', '$AdditionalPDF2', '$AdditionalTitle3', '$AdditionalURL3', 
'$AdditionalPDF3', '$BookingTime', '1', '$BookingIP', '$BookingFeeNumberPersons', 
'$BookingFeePerPerson', '$BookingFeeTotal', '$RequestPrimaryTravellerCC', '$RequestTravellersPassport',
'$AdditionalType1','$AdditionalType2','$AdditionalType3' 
)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


//===================================================================================
//=============================Table 2===============================================
//===================================================================================

    $sql2 = "INSERT INTO booking_2 
(BookID2, BookUnique, AgentID) VALUES ('','$BookUnique', '$AgentID')";

    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        //header('Location: booking-authorization-email-form.php?results=2');// Error
    }

//=============================DELETE OLD DRAFT========================================

    if (!empty($_POST['DelBookID'])) {

        $DelBookID=$_POST['DelBookID'];

        $sql77 = "DELETE FROM booking_1 WHERE BookID='".$DelBookID."' AND BookUnique=''";
        if (mysqli_query($conn, $sql77)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql777 = "DELETE FROM booking_2 WHERE BookID2='".$DelBookID."' AND BookUnique=''";
        if (mysqli_query($conn, $sql777)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

    }

//==================CHECK WHETHER THE EMAIL IS ANYTHING NONE YAHOO, HOTMAIL, OUTLOOK, SHAW==========

//$EmaiToEmail='ash.naser@hotmail.com';
//$SendEmaiToFullName='Ash';

    $pieces = explode("@", $EmaiToEmail);
    echo $emailext=strtolower($pieces[1]);//hotmail.com


    $urllink='https://centreholidays.com/clients/booking-authorization-email-form.php?bq='.$BookUnique;

    $subject  = $EmaiToSubject;
    $from     = $BusinessEmail;

    $message = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/booking-authorization-email-form-client.php");// embed php values in HTML file
    $message  = str_replace("_BusinessEmail_", $BusinessEmail, $message);
    $message  = str_replace("_BusinessPhone_", $BusinessPhone, $message);
    $message  = str_replace("_BusinessFullName_", $SendBusinessFullName, $message);
    $message  = str_replace("_BusinessName_", $BusinessName, $message);
    $message  = str_replace("_EmaiToFullName_", $SendEmaiToFullName, $message);
    $message  = str_replace("_urllink_", $urllink, $message);
    $message  = str_replace("_EmaiToSubject_", $EmaiToSubject, $message);


    if ($emailext !='gmail.com' && $emailext !='yahoo.com' &&  $emailext !='hotmail.com' && $emailext !='outlook.com' && $emailext !='shaw.ca' && $emailext !='shaw.com')
    {
//===============agent send to customer================================================

        echo "first email";

        $headers1  = "From: $from\r\n";
        $headers1 .= "Content-type: text/html\r\n";
        $headers1 .= 'Bcc: '.$BusinessEmail . "\r\n";
        $to1 = $EmaiToEmail;

        mail($to1, $subject, $message, $headers1);

    }
//==========================================================================================
//===========================ALL YAHOO EMAILS===============================================
    if ($emailext=='yahoo.com')
    {

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
            //$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            //$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->From = 'centre_holidays@yahoo.com';
            $mail->FromName = $BusinessName; //'Centre Holidays';// from name
            $mail->AddAddress($EmaiToEmail, $SendEmaiToFullName);  // Add a recipient  to name
            $mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails

            //$mail->addCC('cc@example.com'); // CC
            $mail->addBCC($BusinessEmail); // BCC
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

//===============================================================================================
//===========================ALL OTHER GMAIL, HOTMAL ETC... EMAILS===============================
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


//======================================================================================
}
//========================================================================================
header('Location: booking-authorization-email-form.php?results=1');// Success
?>

<?php ob_flush() ?>