<? ob_start(); ?>
<?php
session_start();


//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$BookID=$_GET['BookID'];

//===============================HECK IF ADMIN USING MASTER PASSWORD====================
$mastpass=trim($_GET['mastpass']);
$mastpass=strip_tags($mastpass);

$sql1968 = "SELECT * FROM master_pass WHERE mastpass = '".$mastpass."' ORDER BY mastid DESC LIMIT 1";
$result1968 = mysqli_query($conn, $sql1968);
$dbcount1968=mysqli_num_rows($result1968);

if($dbcount1968 > 0){
$AgentID=$agid;
}


if (isset($_GET['agid'])) {
$AgentID=trim($_GET['agid']);
$AgentID=strip_tags($AgentID);
}

$outh=trim($_GET['outh']);
$outh=strip_tags($outh);

if ($outh=='P8ez7FHxJcy0hwMnd9HEv8CgWM29x')
$numdays=70000000000000;
else
$numdays=7;

//=========================IN CASE OF EDITING USING THE MANAGMENT==========================
if (isset($_GET['AgentID']))
{
$AgentID=$_GET['AgentID'];	
$numdays=70000000000000;
}
//=========================================================================================

$ptime=time()-(60*60*24*$numdays);// how far in the past change 10 to any number of day

//===========================================================================================

$access=$_GET['access'];
$accesslen=strlen($access);

//=========================================DB TABLES===================================================

$sql = "SELECT * FROM booking_1, booking_2 WHERE ";

if (!isset($access) || $accesslen !=10)
$sql .= " booking_1.BookingTime > $ptime AND ";

$sql .= "booking_1.AgentID='".$AgentID."' AND booking_1.BookID='".$BookID."' AND booking_1.BookID=booking_2.BookID2 LIMIT 1";


$result = mysqli_query($conn, $sql);

$dbcount=mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
	
while($row = mysqli_fetch_assoc($result)) {

$AgentPlan=$row['AgentPlan'];
$MonthlyRecurringFee=$row['MonthlyRecurringFee'];

// Bank Deposit		
$TravelInsuranceFee1=$row['TravelInsuranceFee1'];
$TripFee1=$row['TripFee1'];
$BookingFee1=$row['BookingFee1'];
$QuoteFee1=$row['QuoteFee1'];

//Email Transfer
$TravelInsuranceFee2=$row['TravelInsuranceFee2'];
$TripFee2=$row['TripFee2'];
$BookingFee2=$row['BookingFee2'];
$QuoteFee2=$row['QuoteFee2'];

//Trip Financing
$TravelInsuranceFee3=$row['TravelInsuranceFee3'];
$TripFee3=$row['TripFee3'];
$BookingFee3=$row['BookingFee3'];
$QuoteFee3=$row['QuoteFee3'];

//Credit Card
$TravelInsuranceFee4=$row['TravelInsuranceFee4'];
$TripFee4=$row['TripFee4'];
$BookingFee4=$row['BookingFee4'];
$QuoteFee4=$row['QuoteFee4'];

$GovernmentID=$row['GovernmentID'];//pdf
$CCBack=$row['CCBack'];// pdf
$CCFront=$row['CCFront'];// pdf 

$AdditionalTravelConsent=$row['AdditionalTravelConsent'];		
		
$BookingTime2=$row['BookingTime2']; // seen
$BookingTime3=$row['BookingTime3']; // not approved
$BookingTime4=$row['BookingTime4']; // approved	
$BookingTime5=$row['BookingTime5']; // reviewd by agent	
$BookingTime6=$row['BookingTime6']; // seen by client after revision	

$AgentPrevIP=$row['AgentPrevIP']; // Preview IP

$BookingCIP=$row['BookingCIP']; 
$BookID=$row['BookID']; 
$AgentID=$row['AgentID']; 
$AgentUniqID=$row['AgentUniqID']; 
$BusinessName=$row['BusinessName']; 
$BusinessFullName=$row['BusinessFullName']; 
$BusinessPhone=$row['BusinessPhone']; 
$BusinessEmail=$row['BusinessEmail']; 
 //==================================
$BookUnique=$row['BookUnique']; 
$EmaiToFullName=$row['EmaiToFullName']; 
$EmaiToEmail=$row['EmaiToEmail']; 
$GroupName=$row['GroupName']; 
$EmaiToSubject=$row['EmaiToSubject']; 
$EmailToBCC=$row['EmailToBCC']; 
$EmailToType=$row['EmailToType']; 

if ($EmailToType=='Single')
$EmailToTypeValue=81;
elseif ($EmailToType=='Multiple')
$EmailToTypeValue=82;
elseif ($EmailToType=='Shareable Link')
$EmailToTypeValue=83;


//===================================
$ServiceAgreementType=$row['ServiceAgreementType']; 


$ServiceCurrency=$row['ServiceCurrency']; 

if (!empty($row['QuoteNumberPersons']))
$QuoteNumberPersons=$row['QuoteNumberPersons']; 
else
$QuoteNumberPersons=0;

$QuoteFeePerPerson=$row['QuoteFeePerPerson']; 
$QuoteTotalFee=$row['QuoteTotalFee'];

if (!empty($row['BookingFeeNumberPersons']))
$BookingFeeNumberPersons=$row['BookingFeeNumberPersons']; 
else
$BookingFeeNumberPersons=0;

$BookingFeePerPerson=$row['BookingFeePerPerson']; 
$BookingFeeTotal=$row['BookingFeeTotal'];
 
$ServiceDetails=$row['ServiceDetails']; 
$ServicePDF=$row['ServicePDF']; 
//====================================
$Supplier=$row['Supplier']; 
$BookingNumber=$row['BookingNumber']; 
$CheckSupplier=$row['CheckSupplier'];

if ($CheckSupplier=='Yes')
$CheckSupplier='checked';
else
$CheckSupplier='';

$TripDetails=$row['TripDetails']; 
$TripDetailsPDF=$row['TripDetailsPDF']; 
$TripPricingCurrency=$row['TripPricingCurrency']; 
$TripPaymentSchedule=$row['TripPaymentSchedule']; 
//====================================
$NumberOfPersons1=$row['NumberOfPersons1']; 
$PricePerPerson1=$row['PricePerPerson1']; 
$TotalPrice1=$row['TotalPrice1']; 
$PricingDescription1=$row['PricingDescription1']; 
$NumberOfPersons2=$row['NumberOfPersons2']; 
$PricePerPerson2=$row['PricePerPerson2']; 
$TotalPrice2=$row['TotalPrice2']; 
$PricingDescription2=$row['PricingDescription2']; 
$NumberOfPersons3=$row['NumberOfPersons3']; 
$PricePerPerson3=$row['PricePerPerson3']; 
$TotalPrice3=$row['TotalPrice3']; 
$PricingDescription3=$row['PricingDescription3']; 
$NumberOfPersons4=$row['NumberOfPersons4']; 
$PricePerPerson4=$row['PricePerPerson4']; 
$TotalPrice4=$row['TotalPrice4']; 
$PricingDescription4=$row['PricingDescription4']; 
$NumberOfPersons5=$row['NumberOfPersons5']; 
$PricePerPerson5=$row['PricePerPerson5']; 
$TotalPrice5=$row['TotalPrice5']; 
$PricingDescription5=$row['PricingDescription5']; 
$FullPayment=$row['FullPayment']; 
$FullPaymentDate=$row['FullPaymentDate']; 
$TotalAmountDue=$row['TotalAmountDue']; 
//========================================
$PaymentType1=$row['PaymentType1']; 
$PaymentDate1=$row['PaymentDate1']; 
$PaymentDue1=$row['PaymentDue1']; 
$PaymentType2=$row['PaymentType2']; 
$PaymentDate2=$row['PaymentDate2']; 
$PaymentDue2=$row['PaymentDue2'];
$PaymentType3=$row['PaymentType3']; 
$PaymentDate3=$row['PaymentDate3']; 
$PaymentDue3=$row['PaymentDue3'];
$PaymentType4=$row['PaymentType4']; 
$PaymentDate4=$row['PaymentDate4']; 
$PaymentDue4=$row['PaymentDue4'];
$PaymentType5=$row['PaymentType5']; 
$PaymentDate5=$row['PaymentDate5']; 
$PaymentDue5=$row['PaymentDue5'];
//=======================================
$PricingType1=$row['PricingType1']; 
$PricingType2=$row['PricingType2']; 
$PricingType3=$row['PricingType3']; 
$PricingType4=$row['PricingType4']; 
$PricingType5=$row['PricingType5']; 
//=======================================
$TermsType=$row['TermsType'];
if ($TermsType=='All-Inclusive Vacations')
{
$TermsTypeValue=91;
$DTermsType='All-Inclusive Vacations';
}

if ($TermsType=='All-Inclusive Group Vacations')
{
$TermsTypeValue=92;
$DTermsType='All-Inclusive Group Vacations';
}

if ($TermsType=='Cruises')
{
$TermsTypeValue=93;
$DTermsType='Cruises';
}

if ($TermsType=='Flights')
{
$TermsTypeValue=94;
$DTermsType='Flights';
}

if ($TermsType=='Custom Terms and Conditions')
{
$TermsTypeValue=95;
$DTermsType='Custom Terms & Conditions';
}


$TermsAndConditions=$row['TermsAndConditions']; 


$TermsAndConditionsPDF=$row['TermsAndConditionsPDF']; 

$CancellationPolicy=$row['CancellationPolicy']; 
$CancellationPolicyPDF=$row['CancellationPolicyPDF']; 
//=======================================
$InsuranceProvider=$row['InsuranceProvider']; 
$InsuranceCurrency=$row['InsuranceCurrency']; 
$InsurancePDF=$row['InsurancePDF']; 
$InsurancePersonType1=$row['InsurancePersonType1']; 
$InsuranceNumberPersons1=$row['InsuranceNumberPersons1']; 
$InsurancePricePerPerson1=$row['InsurancePricePerPerson1']; 
$InsuranceTotalPrice1=$row['InsuranceTotalPrice1']; 
$InsuranceDescription1=$row['InsuranceDescription1']; 
$InsurancePersonType2=$row['InsurancePersonType2']; 
$InsuranceNumberPersons2=$row['InsuranceNumberPersons2']; 
$InsurancePricePerPerson2=$row['InsurancePricePerPerson2']; 
$InsuranceTotalPrice2=$row['InsuranceTotalPrice2']; 
$InsuranceDescription2=$row['InsuranceDescription2']; 
$InsurancePersonType3=$row['InsurancePersonType3']; 
$InsuranceNumberPersons3=$row['InsuranceNumberPersons3']; 
$InsurancePricePerPerson3=$row['InsurancePricePerPerson3']; 
$InsuranceTotalPrice3=$row['InsuranceTotalPrice3']; 
$InsuranceDescription3=$row['InsuranceDescription3']; 
$InsurancePersonType4=$row['InsurancePersonType4']; 
$InsuranceNumberPersons4=$row['InsuranceNumberPersons4']; 
$InsurancePricePerPerson4=$row['InsurancePricePerPerson4']; 
$InsuranceTotalPrice4=$row['InsuranceTotalPrice4']; 
$InsuranceDescription4=$row['InsuranceDescription4']; 
$InsurancePersonType5=$row['InsurancePersonType5']; 
$InsuranceNumberPersons5=$row['InsuranceNumberPersons5']; 
$InsurancePricePerPerson5=$row['InsurancePricePerPerson5']; 
$InsuranceTotalPrice5=$row['InsuranceTotalPrice5']; 
$InsuranceDescription5=$row['InsuranceDescription5']; 
//=======================================


$AdditionalURL1=$row['AdditionalURL1']; 
$AdditionalPDF1=$row['AdditionalPDF1']; 
$AdditionalPDF2=$row['AdditionalPDF2']; 
$AdditionalURL2=$row['AdditionalURL2'];  
$AdditionalURL3=$row['AdditionalURL3']; 
$AdditionalPDF3=$row['AdditionalPDF3']; 
$AdditionalTitle1=$row['AdditionalTitle1']; 
$AdditionalTitle2=$row['AdditionalTitle2']; 
$AdditionalTitle3=$row['AdditionalTitle3'];

$AdditionalType1=$row['AdditionalType1'];
if ($AdditionalType1==52)
$AdditionalTypeDesc1='PDF Document';
elseif ($AdditionalType1==51)
$AdditionalTypeDesc1='URL (Website Address)';

$AdditionalType2=$row['AdditionalType2'];
if ($AdditionalType2==62)
$AdditionalTypeDesc2='PDF Document';
elseif ($AdditionalType2==61)
$AdditionalTypeDesc2='URL (Website Address)';


$AdditionalType3=$row['AdditionalType3'];
if ($AdditionalType3==72)
$AdditionalTypeDesc3='PDF Document';
elseif ($AdditionalType3==71)
$AdditionalTypeDesc3='URL (Website Address)';

//======================================== 
$BookingTime=$row['BookingTime']; 
$BookingStatus=$row['BookingStatus']; 
$BookingIP=$row['BookingIP'];
//========================================
$PTravellerTitle=$row['PTravellerTitle']; 
$PTravellerFName=$row['PTravellerFName']; 
$PTravellerMName=$row['PTravellerMName']; 
$PTravellerLName=$row['PTravellerLName'];
$PTravellerDOB=$row['PTravellerDOB']; 
$PTravellerPhone=$row['PTravellerPhone']; 
$PTravellerEmail=$row['PTravellerEmail']; 
$PTravellerStreet=$row['PTravellerStreet']; 
$PTravellerUnit=$row['PTravellerUnit']; 
$PTravellerCity=$row['PTravellerCity']; 
$PTravellerProvince=$row['PTravellerProvince']; 
$PTravellerPostal=$row['PTravellerPostal']; 
$PTravellerCountry=$row['PTravellerCountry']; 
$PTravellerNotes=$row['PTravellerNotes']; 

$PTravellerConsent1=$row['PTravellerConsent1']; 
if ($PTravellerConsent1=='Yes')
$PTravellerConsent1check='checked';
else
$PTravellerConsent1check='';

$PTravellerConsent2=$row['PTravellerConsent2'];
if ($PTravellerConsent2=='Yes')
$PTravellerConsent2check='checked';
else
$PTravellerConsent2check='';

//=======================================
$ServiceAccepted=$row['ServiceAccepted']; 
$ServiceNoReason=$row['ServiceNoReason']; 
//=======================================
$CovidConsent1=$row['CovidConsent1'];
if ($CovidConsent1=='Yes')
$CovidConsent1='checked';
else
$CovidConsent1='';

$CovidConsent2=$row['CovidConsent2'];
if ($CovidConsent2=='Yes')
$CovidConsent2='checked';
else
$CovidConsent2='';

$CovidConsentName=$row['CovidConsentName']; 
$CovidAccepted=$row['CovidAccepted']; 
$CovidNoReason=$row['CovidNoReason']; 
//======================================
$TripAccepted=$row['TripAccepted']; 
$TripNoReason=$row['TripNoReason']; 
//======================================
$TermAccepted=$row['TermAccepted']; 
$TermNoReason=$row['TermNoReason']; 
//======================================
$CancelAccepted=$row['CancelAccepted']; 
$CancelNoReason=$row['CancelNoReason']; 
//=======================================
$AdditionalConsent=$row['AdditionalConsent']; 
if ($AdditionalConsent=='Yes')
$AdditionalConsentCheck='checked';
else
$AdditionalConsentCheck='';
//=======================================
$TripPricingAccepted=$row['TripPricingAccepted']; 
if ($TripPricingAccepted =='Yes')
$Tripreadonly='readonly';
else
$Tripreadonly='';
//=======================================
if ($ServiceAccepted =='Yes')
$Servicereadonly='readonly';
else
$Servicereadonly='';


$TripPricingNoReason=$row['TripPricingNoReason'];
//=======================================
$pricing1=$row['pricing1'];
$pricing2=$row['pricing2'];
$pricing3=$row['pricing3'];
$pricing4=$row['pricing4'];
$pricing5=$row['pricing5'];
//=======================================
$insurance1=$row['insurance1'];
$insurance2=$row['insurance2'];
$insurance3=$row['insurance3'];
$insurance4=$row['insurance4'];
$insurance5=$row['insurance5'];
//=======================================
$InsuranceAccepted=$row['InsuranceAccepted']; 
if ($InsuranceAccepted =='Yes')
$Inripreadonly='readonly';
else
$Inripreadonly='';

$InsuranceNoReason=$row['InsuranceNoReason']; 
$PurchaseInsurance=$row['PurchaseInsurance']; 
$InsuranceWeaverConsent=$row['InsuranceWeaverConsent']; 
$InsuranceWeaverConsentName=$row['InsuranceWeaverConsentName'];
//==========Signature info================
$sigdataUrl=$row['sigdataUrl'];
$sigdataUrl1=$row['sigdataUrl1'];
//=======================================

//==========================================

$text1='none';
$text2='none';
$text3='none';
$text4='none';
$text5='none';
$text6='none';
$text7='none';


//======================conditions client form=================================
if (!empty( $row["QuoteNumberPersons"]) && !empty( $row["QuoteFeePerPerson"]) && (!empty( $row["ServiceDetails"]) || !empty( $row["ServicePDF"])))
{$Checkboxes1='checked'; $text1='block';} else {$Checkboxes1=''; $text1='none';}

if (!empty($row["TripDetails"]) || !empty($row["TripDetailsPDF"])) 
{$Checkboxes2='checked'; $text2='block';} else {$Checkboxes2=''; $text2='none';}

if (($row['PricePerPerson1'] !=0.00) || ($row['PricePerPerson2'] !=0.00) ||($row['PricePerPerson3'] !=0.00) ||($row['PricePerPerson4'] !=0.00) ||($row['PricePerPerson5'] !=0.00))
{$Checkboxes3='checked'; $text3='block';} else {$Checkboxes3=''; $text3='none';}

if (!empty($row["TermsAndConditionsPDF"]) || !empty($row["TermsAndConditions"]) )
{$Checkboxes4='checked'; $text4='block';} else {$Checkboxes4=''; $text4='none';}

if (!empty($row["CancellationPolicy"]) || !empty($row["CancellationPolicyPDF"]))
{$Checkboxes5='checked'; $text5='block';} else {$Checkboxes5=''; $text5='none';}

if (!empty($row['InsuranceProvider']) || !empty($row["sigdataUrl1"]))
{$Checkboxes6='checked'; $text6='block';} else {$Checkboxes6=''; $text6='none';}

if (!empty($row['AdditionalTitle1']) || !empty($row['AdditionalTitle2']) || !empty($row['AdditionalTitle3']))
{$Checkboxes7='checked'; $text7='block';} else {$Checkboxes7=''; $text7='none';}


$TripGrandTotal=$row['TripGrandTotal'];
$InsuranceGrandTotal=$row['InsuranceGrandTotal'];
$OverallGrandTotal=$row['OverallGrandTotal'];

$MethodOfPayment1=$row['MethodOfPayment1'];//Credit Card
$MethodOfPayment2=$row['MethodOfPayment2'];//Deposit Money Into Centre Holidays Bank Account
$MethodOfPayment3=$row['MethodOfPayment3'];//Email Transfer
$MethodOfPayment4=$row['MethodOfPayment4'];//Trip Financing Through Uplift


$CCOwner=$row['CCOwner'];
$CCType=$row['CCType'];
$CCName=$row['CCName'];
$CCNumber=$row['CCNumber'];
$CCExpiry=$row['CCExpiry'];
$CCVV=$row['CCVV'];
$CCPhone=$row['CCPhone'];
$CCEmail=$row['CCEmail'];
$CCAddressSame=$row['CCAddressSame'];

$CCAddress=$row['CCAddress'];
$CCUnit=$row['CCUnit'];
$CCCity=$row['CCCity'];
$CCProvince=$row['CCProvince'];
$CCPostal=$row['CCPostal'];
$CCCountry=$row['CCCountry'];


$AdditionalTravelConsent=$row['AdditionalTravelConsent'];
if ($AdditionalTravelConsent=='Yes')
$checked88='checked';
else
$checked88='';

/*$ProcessedAutomaticallyConsent=$row['ProcessedAutomaticallyConsent'];
if ($ProcessedAutomaticallyConsent=='Yes')
$checked99='checked';
else
$checked99='';*/


$DetailsCorrectConsent=$row['DetailsCorrectConsent'];
if ($DetailsCorrectConsent=='Yes')
$checked33='checked';
else
$checked33='';

$VerificationPurposesConsent=$row['VerificationPurposesConsent'];
if ($VerificationPurposesConsent=='Yes')
$checked34='checked';
else
$checked34='';

$CreditCardProcessConsent=$row['CreditCardProcessConsent'];
if ($CreditCardProcessConsent=='Yes')
$checked35='checked';
else
$checked35='';


//============additional travellers===========================
$PTravellerParty=$row['PTravellerParty'];

$AddTravelTitle1=$row['AddTravelTitle1'];
$AddTravelFName1=$row['AddTravelFName1'];
$AddTravelMName1=$row['AddTravelMName1'];
$AddTravelLName1=$row['AddTravelLName1'];
$AddTravelDOB1=$row['AddTravelDOB1'];
$AddTravelNotes1=$row['AddTravelNotes1'];

$AddTravelTitle2=$row['AddTravelTitle2'];
$AddTravelFName2=$row['AddTravelFName2'];
$AddTravelMName2=$row['AddTravelMName2'];
$AddTravelLName2=$row['AddTravelLName2'];
$AddTravelDOB2=$row['AddTravelDOB2'];
$AddTravelNotes2=$row['AddTravelNotes2'];

$AddTravelTitle3=$row['AddTravelTitle3'];
$AddTravelFName3=$row['AddTravelFName3'];
$AddTravelMName3=$row['AddTravelMName3'];
$AddTravelLName3=$row['AddTravelLName3'];
$AddTravelDOB3=$row['AddTravelDOB3'];
$AddTravelNotes3=$row['AddTravelNotes3'];

$AddTravelTitle4=$row['AddTravelTitle4'];
$AddTravelFName4=$row['AddTravelFName4'];
$AddTravelMName4=$row['AddTravelMName4'];
$AddTravelLName4=$row['AddTravelLName4'];
$AddTravelDOB4=$row['AddTravelDOB4'];
$AddTravelNotes4=$row['AddTravelNotes4'];

$AddTravelTitle5=$row['AddTravelTitle5'];
$AddTravelFName5=$row['AddTravelFName5'];
$AddTravelMName5=$row['AddTravelMName5'];
$AddTravelLName5=$row['AddTravelLName5'];
$AddTravelDOB5=$row['AddTravelDOB5'];
$AddTravelNotes5=$row['AddTravelNotes5'];

$AddTravelTitle6=$row['AddTravelTitle6'];
$AddTravelFName6=$row['AddTravelFName6'];
$AddTravelMName6=$row['AddTravelMName6'];
$AddTravelLName6=$row['AddTravelLName6'];
$AddTravelDOB6=$row['AddTravelDOB6'];
$AddTravelNotes6=$row['AddTravelNotes6'];

$AddTravelTitle7=$row['AddTravelTitle7'];
$AddTravelFName7=$row['AddTravelFName7'];
$AddTravelMName7=$row['AddTravelMName7'];
$AddTravelLName7=$row['AddTravelLName7'];
$AddTravelDOB7=$row['AddTravelDOB7'];
$AddTravelNotes7=$row['AddTravelNotes7'];

$AddTravelTitle8=$row['AddTravelTitle8'];
$AddTravelFName8=$row['AddTravelFName8'];
$AddTravelMName8=$row['AddTravelMName8'];
$AddTravelLName8=$row['AddTravelLName8'];
$AddTravelDOB8=$row['AddTravelDOB8'];
$AddTravelNotes8=$row['AddTravelNotes8'];


$RequestPrimaryTravellerCC=$row['RequestPrimaryTravellerCC']; 
if (!empty($RequestPrimaryTravellerCC))
$myCheck277='checked';


$RequestTravellersPassport=$row['RequestTravellersPassport'];
if (!empty($RequestTravellersPassport))
$myCheck177='checked';

$AddTravelConsent1=$row['AddTravelConsent1'];
if ($AddTravelConsent1=='Yes')
$AddTravelConsent11='checked';
else
$AddTravelConsent11='';

$AddTravelConsent2=$row['AddTravelConsent2'];
if ($AddTravelConsent2=='Yes')
$AddTravelConsent21='checked';
else
$AddTravelConsent21='';

//==================Passports=================================================
$PrimePassport=$row['PrimePassport'];
$AddPassport1=$row['AddPassport1'];
$AddPassport2=$row['AddPassport2'];
$AddPassport3=$row['AddPassport3'];
$AddPassport4=$row['AddPassport4'];
$AddPassport5=$row['AddPassport5'];
$AddPassport6=$row['AddPassport6'];
$AddPassport7=$row['AddPassport7'];
$AddPassport8=$row['AddPassport8'];


//=========================currency==========================================


if (!empty($row['ServiceCurrency']))
$ServiceCurrency=$row['ServiceCurrency'];
else
$ServiceCurrency='CAD';

if (!empty($row['TripPricingCurrency']))
$TripPricingCurrency=$row['TripPricingCurrency'];
else
$TripPricingCurrency='CAD';

if (!empty($row['InsuranceCurrency']))
$InsuranceCurrency=$row['InsuranceCurrency'];
else
$InsuranceCurrency='CAD';

//-----------------------trip cancelled---------------------------------------
$FormCancelled=$row['FormCancelled'];

}

}


//========================Conditions agent form===============================


if (!empty( $ServiceAgreementType))
{$myCheck1='checked'; $text1='block';} else {$myCheck1=''; $text1='none';}

if (!empty($TripDetails) || !empty($TripDetailsPDF) || !empty($BookingNumber) || !empty($Supplier)) 
{$myCheck2='checked'; $text2='block';} else {$myCheck2=''; $text2='none';}

if (($PricePerPerson1 !=0.00) || ($PricePerPerson2 !=0.00) ||($PricePerPerson3 !=0.00) ||($PricePerPerson4 !=0.00) ||($PricePerPerson5 !=0.00))
{$myCheck3='checked'; $text3='block';} else {$myCheck3=''; $text3='none';}

if (!empty($TermsType) || !empty($TermsAndConditionsPDF) || !empty($TermsAndConditions) )
{$myCheck4='checked'; $text4='block';} else {$myCheck4=''; $text4='none';}

if (!empty($CancellationPolicy) || !empty($CancellationPolicyPDF))
{$myCheck5='checked'; $text5='block';} else {$myCheck5=''; $text5='none';}

if (!empty($PurchaseInsurance) || !empty($InsuranceNoReason) || !empty($InsuranceProvider) || $PurchaseInsurance=='Yes' || (!empty($sigdataUrl1)))
{$myCheck6='checked'; $text6='block';} else {$myCheck6=''; $text6='none';}

if (!empty($AdditionalTitle1) || !empty($AdditionalTitle2) || !empty($AdditionalTitle3))
{$myCheck7='checked'; $text7='block';} else {$myCheck7=''; $text7='none';}

//===========================================

$box1='hidden';
$box2='hidden';
$box3='hidden';
$box4='hidden';
$box5='hidden';

if (!empty($PricingType5))
{
$box1='block';
$box2='block';
$box3='block';
$box4='block';
$box5='block';
}

if (!empty($PricingType4))
{
$box1='block';
$box2='block';
$box3='block';
$box4='block';
}

if (!empty($PricingType3))
{
$box1='block';
$box2='block';
$box3='block';
}

if (!empty($PricingType2))
{
$box1='block';
$box2='block';
}

if (!empty($PricingType1))
{
$box1='block';
}

if (!empty($PricingType5))
{
$TripPricingOptions='5 Pricing Options';
$VTripPricingOptions=5;
}
elseif (!empty($PricingType4))
{
$TripPricingOptions='4 Pricing Options';
$VTripPricingOptions=4;
}
elseif (!empty($PricingType3))
{
$TripPricingOptions='3 Pricing Options';
$VTripPricingOptions=3;
}
elseif (!empty($PricingType2))
{
$TripPricingOptions='2 Pricing Options';
$VTripPricingOptions=2;
}
elseif (!empty($PricingType1))
{
$TripPricingOptions='1 Pricing Option';
$VTripPricingOptions=1;
}

//=============================
$box20='hidden';
$box21='hidden';
$box22='hidden';
$box23='hidden';
$box24='hidden';
$box25='hidden';

if ($TripPaymentSchedule=='Full Payment')
{
$VTripPaymentSchedule=20;
$box20='block';
}

if ($TripPaymentSchedule=='2 Payments')
{
$VTripPaymentSchedule=22;
$box21='block';
//$box22='block';
$box25='block';
}

if ($TripPaymentSchedule=='3 Payments')
{
$VTripPaymentSchedule=23;
$box21='block';
$box22='block';
//$box23='block';
$box25='block';
}

if ($TripPaymentSchedule=='4 Payments')
{
$VTripPaymentSchedule=24;
$box21='block';
$box22='block';
$box23='block';
//$box24='block';
$box25='block';
}

if ($TripPaymentSchedule=='5 Payments')
{
$VTripPaymentSchedule=25;
$box21='block';
$box22='block';
$box23='block';
$box24='block';
$box25='block';
}
//===========================================

$box31='hidden';
$box32='hidden';
$box33='hidden';
$box34='hidden';
$box35='hidden';

if (!empty($InsurancePersonType5))
{
$InsurancePricing='5 Pricing Options';
$VInsurancePricing=35;
$box31='block';
$box32='block';
$box33='block';
$box34='block';
$box35='block';
}
elseif (!empty($InsurancePersonType4))
{
$InsurancePricing='4 Pricing Options';
$VInsurancePricing=34;
$box31='block';
$box32='block';
$box33='block';
$box34='block';
}
elseif (!empty($InsurancePersonType3))
{
$InsurancePricing='3 Pricing Options';
$VInsurancePricing=33;
$box31='block';
$box32='block';
$box33='block';
}
elseif (!empty($InsurancePersonType2))
{
$InsurancePricing='2 Pricing Options';
$VInsurancePricing=32;
$box31='block';
$box32='block';
}
elseif (!empty($InsurancePersonType1))
{
$InsurancePricing='1 Pricing Option';
$VInsurancePricing=31;
$box31='block';
}

//=======================================================

if (!empty($AdditionalTitle1))
{
$ListAdditionalTitle1='&nbsp;Edit This Option';
//$myCheck91checked='checked';
}
else
{
$ListAdditionalTitle1='&nbsp;Add Options';
//$myCheck91checked='';
}

if (!empty($AdditionalTitle2))
{
$ListAdditionalTitle2='&nbsp;Edit This Option';
//$myCheck92checked='checked';
}
else
{
$ListAdditionalTitle2='&nbsp;Add Options';
//$myCheck92checked='';
}

if (!empty($AdditionalTitle3))
{
$ListAdditionalTitle3='&nbsp;Edit This Option';
//$myCheck93checked='checked';
}
else
{
$ListAdditionalTitle3='&nbsp;Add Options';
//$myCheck93checked='';
}


//==========================================================

if (isset($_GET['allow']))
{
$mood="Preview";
$ddowndisabled='disabled';
}
else
{
$mood="Edit";
$ddowndisabled='';
}

$box81='hidden';	
$box82='hidden';
$box83='hidden';

if ($EmailToType=='Single')
{
$EmailToType='Email A Single Person';
$box81='';
}


if ($EmailToType=='Multiple')
{
$EmailToType='Email Multiple People';
$box82='';
}


if ($EmailToType=='Shareable Link')
{
$EmailToType='Shareable Link';
$box83='';
}

if (!empty($EmaiToSubject))
$EmaiToSubject=$EmaiToSubject;
else
$EmaiToSubject='Centre Holidays - Booking Authorization Email Form';


//===========================================================================

if (!empty($AdditionalTitle3))
{
$Documentoptions='3 Document & URL Options';
$DocumentoptionsValue=43;
}
elseif (!empty($AdditionalTitle2))
{
$Documentoptions='2 Document & URL Options';
$DocumentoptionsValue=42;
}
elseif (!empty($AdditionalTitle1))
{
$Documentoptions='1 Document & URL Options';
$DocumentoptionsValue=41;
}
else
{
$Documentoptions='';
$DocumentoptionsValue='';
}

//=============================
$Doc1typeValue1='';
$Doc1typeValue1='';

$Doc1typeValue2='';
$Doc1typeValue2='';

$Doc1typeValue3='';
$Doc1typeValue3='';

if (!empty($AdditionalURL1))
{
$Doc1type1='URL (Website Address)';
$Doc1typeValue1=52;
}
elseif (!empty($AdditionalPDF1))
{
$Doc1type1='PDF Document';
$Doc1typeValue1=51;
}

if (!empty($AdditionalURL2))
{
$Doc1type2='URL (Website Address)';
$Doc1typeValue2=62;
}
elseif (!empty($AdditionalPDF1))
{
$Doc1type2='PDF Document';
$Doc1typeValue2=61;
}

if (!empty($AdditionalURL3))
{
$Doc1type3='URL (Website Address)';
$Doc1typeValue3=72;
}
elseif (!empty($AdditionalPDF1))
{
$Doc1type3='PDF Document';
$Doc1typeValue3=71;
}

//===============================================
$box41='hidden';
$box42='hidden';
$box43='hidden';


//===============================================
if (!empty($AdditionalURL1))
$box51='block';
else
$box51='hidden';

if (!empty($AdditionalPDF1))
$box52='block';
else
$box52='hidden';

if (!empty($AdditionalURL2))
$box61='block';
else
$box61='hidden';

if (!empty($AdditionalPDF2))
$box62='block';
else
$box62='hidden';

if (!empty($AdditionalURL3))
$box71='block';
else
$box71='hidden';

if (!empty($AdditionalPDF3))
$box72='block';
else
$box72='hidden';

//======================================================

if (!empty($AdditionalTitle1))
$box41='block';
if (!empty($AdditionalTitle2))
$box42='block';
if (!empty($AdditionalTitle3))
$box43='block';

//=================================================================

if ($TermsType=='Custom Terms and Conditions')
{
$box91='hidden';
$box92='block';
}
else
{
$box91='block';
$box92='hidden';
}

if (empty($TermsType)) {
$box91='hidden';
$box92='hidden';
}

//===============================
$box12='hidden';
$box11='hidden';
$box13='hidden';

if ($ServiceAgreementType=='Centre Holidays Service Fee Agreement')
{
$ServiceAgreementTypeValue=11;
$box12='hidden';
$box13='hidden';
$box11='block';
}
elseif ($ServiceAgreementType=='Custom Service Fee Agreement')
{
$ServiceAgreementTypeValue=12;
$box12='block';
$box13='block';
$box11='hidden';
}

if ($ServiceAgreementTypeValue==11)
$DServiceAgreementType="Centre Holidays' Service Fee Agreement";

if ($ServiceAgreementTypeValue==12)
$DServiceAgreementType="Custom Service Fee Agreement";


//================additional travellers in part preview 
  
switch ($PTravellerParty) {
	case "1":
	$PTravellerParty1='1 Additional Traveller';
	break;
	case "2":
	$PTravellerParty1='2 Additional Travellers';
	break;	
	case "3":
	$PTravellerParty1='3 Additional Travellers';
	break;
	case "4":
	$PTravellerParty1='4 Additional Travellers';
	break;	
	case "5":
	$PTravellerParty1='5 Additional Travellers';
	break;
	case "6":
	$PTravellerParty1='6 Additional Travellers';
	break;	
	case "7":
	$PTravellerParty1='7 Additional Travellers';
	break;
	case "8":
	$PTravellerParty1='8 Additional Travellers';
	break;
	default:	
	$PTravellerParty1='None';				
} 


//=============================================================Price options check===========
if ($pricing1 > 0 && $TripPricingAccepted =='Yes')
{
$chproduct17='checked';
$TotalPersons1=$NumberOfPersons1;
$ATotalPrice1=$TotalPrice1;
$chproduct1='checked';
}

if ($pricing2 > 0 && $TripPricingAccepted =='Yes')
{
$chproduct27='checked';
$TotalPersons2=$NumberOfPersons2;
$ATotalPrice2=$TotalPrice2;
$chproduct2='checked';
}

if ($pricing3 > 0 && $TripPricingAccepted =='Yes')
{
$chproduct37='checked';
$TotalPersons3=$NumberOfPersons3;
$ATotalPrice3=$TotalPrice3;
$chproduct3='checked';
}

if ($pricing4 > 0 && $TripPricingAccepted =='Yes')
{
$chproduct47='checked';
$TotalPersons4=$NumberOfPersons4;
$ATotalPrice4=$TotalPrice4;
$chproduct4='checked';
}

if ($pricing5 > 0 && $TripPricingAccepted =='Yes')
{
$chproduct57='checked';
$TotalPersons5=$NumberOfPersons5;
$ATotalPrice5=$TotalPrice5;
$chproduct5='checked';
}


$PricingOptionDisplay='';
if (!empty($FullPayment) && !empty($FullPaymentDate))
$PricingOptionDisplay='none';



//==============================================================
$TripGrandTotal=$ATotalPrice1+$ATotalPrice2+$ATotalPrice3+$ATotalPrice4+$ATotalPrice5;
$TripGrandTotal=number_format($TripGrandTotal, 2, '.', '');

//==========================amounts depost=================
$TotalPersons=$TotalPersons1+$TotalPersons2+$TotalPersons3+$TotalPersons4+$TotalPersons5;

$result1=number_format($PaymentDue1*$TotalPersons, 2, '.', '');
$result2=number_format($PaymentDue2*$TotalPersons, 2, '.', '');
$result3=number_format($PaymentDue3*$TotalPersons, 2, '.', '');
$result4=number_format($PaymentDue4*$TotalPersons, 2, '.', '');
$result5=number_format($PaymentDue5*$TotalPersons, 2, '.', '');

$Totaldeposit=$result1+$result2+$result3+$result4+$result5;
$Totaldeposit=number_format($Totaldeposit, 2, '.', '');

if ($Totaldeposit==0)
{
$depositclass='col-xl-4';
$deposithide='hidden';
}
else
{
$depositclass='col-xl-3';
$deposithide='';
}

$TotalBalanace=$TripGrandTotal-$Totaldeposit;
$TotalBalanace=number_format($TotalBalanace, 2, '.', '');

//========================display or hide based on COVID=====================
if ($CovidAccepted=='No')
{
$bookingdivs='none';
}
else
{
$bookingdivs='block';
}

//========================switch col-xl-4 to col-xl-6 CC part=================

if (!empty($CCBack) && !empty($CCFront) && !empty($GovernmentID))
$cclayout='col-xl-4';
else
$cclayout='col-xl-6';

?>

<?php ob_flush(); ?>