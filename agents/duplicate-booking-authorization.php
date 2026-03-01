<?php ob_start(); ?>

<?php
//include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');

$AgentID=$_GET['AgentID'];
$BookID=$_GET['BookID'];

//if (!empty($_GET['BookUnique']))
//$BookUnique=$_GET['BookUnique'];
//else
$BookUnique=uniqid().time();


$BookingTime=time();
$BookingIP=$_SERVER['REMOTE_ADDR'];


if (!empty($_GET['GroupName']))
$UGroupName=rand();
else
$UGroupName='';


include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql1 = "INSERT INTO booking_1 (BookUnique, AgentID, AgentUniqID, BusinessName, BusinessFullName, BusinessPhone, 
BusinessEmail, EmaiToFullName, EmaiToEmail, EmaiToSubject, EmailToBCC, EmailToType, GroupName, UGroupName, 
ServiceAgreementType, ServiceCurrency, QuoteNumberPersons, QuoteFeePerPerson, QuoteTotalFee, 
ServiceDetails, ServicePDF, Supplier, BookingNumber, CheckSupplier, TripDetails, TripDetailsPDF, TripPricingCurrency, 
TripPaymentSchedule, NumberOfPersons1, PricePerPerson1, TotalPrice1, PricingDescription1, NumberOfPersons2, 
PricePerPerson2, TotalPrice2, PricingDescription2, NumberOfPersons3, PricePerPerson3, TotalPrice3, 
PricingDescription3, NumberOfPersons4, PricePerPerson4, TotalPrice4, PricingDescription4, NumberOfPersons5, 
PricePerPerson5, TotalPrice5, PricingDescription5, FullPayment, FullPaymentDate, TotalAmountDue, 
PaymentType1, PaymentDate1, PaymentDue1, PaymentType2, PaymentDate2, PaymentDue2, PaymentType3, 
PaymentDate3, PaymentDue3, PaymentType4, PaymentDate4, PaymentDue4, PaymentType5, PaymentDate5, 
PaymentDue5, PricingType1, PricingType2, PricingType3, PricingType4, PricingType5, TermsType, 
TermsAndConditions, TermsAndConditionsPDF, CancellationPolicy, CancellationPolicyPDF, InsuranceProvider, 
InsuranceCurrency, InsurancePDF, InsurancePersonType1, InsuranceNumberPersons1, InsurancePricePerPerson1, 
InsuranceTotalPrice1, InsuranceDescription1, InsurancePersonType2, InsuranceNumberPersons2, 
InsurancePricePerPerson2, InsuranceTotalPrice2, InsuranceDescription2, InsurancePersonType3, 
InsuranceNumberPersons3, InsurancePricePerPerson3, InsuranceTotalPrice3, InsuranceDescription3, 
InsurancePersonType4, InsuranceNumberPersons4, InsurancePricePerPerson4, InsuranceTotalPrice4, 
InsuranceDescription4, InsurancePersonType5, InsuranceNumberPersons5, InsurancePricePerPerson5, 
InsuranceTotalPrice5, InsuranceDescription5, AdditionalTitle1, AdditionalURL1, AdditionalPDF1, 
AdditionalTitle2, AdditionalURL2, AdditionalPDF2, AdditionalTitle3, AdditionalURL3, AdditionalPDF3, 
BookingFeeNumberPersons, BookingFeePerPerson, BookingFeeTotal, 
PTravellerParty, PTravellerTitle, PTravellerFName, PTravellerMName, PTravellerLName, PTravellerDOB, 
PTravellerPhone, PTravellerEmail, PTravellerStreet, PTravellerUnit, PTravellerCity, PTravellerProvince, 
PTravellerPostal, PTravellerCountry, PTravellerNotes, pricing1, pricing2, pricing3, pricing4, pricing5, 
insurance1, insurance2, insurance3, insurance4, insurance5, RequestPrimaryTravellerCC, RequestTravellersPassport)


SELECT '$BookUnique', AgentID, AgentUniqID, BusinessName, BusinessFullName, BusinessPhone, BusinessEmail, 
EmaiToFullName, EmaiToEmail, EmaiToSubject, EmailToBCC, EmailToType, GroupName, '$UGroupName', ServiceAgreementType, 
ServiceCurrency, QuoteNumberPersons, QuoteFeePerPerson, QuoteTotalFee, ServiceDetails, 
ServicePDF, Supplier, BookingNumber, CheckSupplier, TripDetails, TripDetailsPDF, TripPricingCurrency, 
TripPaymentSchedule, NumberOfPersons1, PricePerPerson1, TotalPrice1, PricingDescription1, 
NumberOfPersons2, PricePerPerson2, TotalPrice2, PricingDescription2, NumberOfPersons3, 
PricePerPerson3, TotalPrice3, PricingDescription3, NumberOfPersons4, PricePerPerson4, 
TotalPrice4, PricingDescription4, NumberOfPersons5, PricePerPerson5, TotalPrice5, 
PricingDescription5, FullPayment, FullPaymentDate, TotalAmountDue, PaymentType1, 
PaymentDate1, PaymentDue1, PaymentType2, PaymentDate2, PaymentDue2, PaymentType3, 
PaymentDate3, PaymentDue3, PaymentType4, PaymentDate4, PaymentDue4, PaymentType5, 
PaymentDate5, PaymentDue5, PricingType1, PricingType2, PricingType3, PricingType4, 
PricingType5, TermsType, TermsAndConditions, TermsAndConditionsPDF, CancellationPolicy, 
CancellationPolicyPDF, InsuranceProvider, InsuranceCurrency, InsurancePDF, InsurancePersonType1, 
InsuranceNumberPersons1, InsurancePricePerPerson1, InsuranceTotalPrice1, InsuranceDescription1, 
InsurancePersonType2, InsuranceNumberPersons2, InsurancePricePerPerson2, InsuranceTotalPrice2, 
InsuranceDescription2, InsurancePersonType3, InsuranceNumberPersons3, InsurancePricePerPerson3, 
InsuranceTotalPrice3, InsuranceDescription3, InsurancePersonType4, InsuranceNumberPersons4, 
InsurancePricePerPerson4, InsuranceTotalPrice4, InsuranceDescription4, InsurancePersonType5, 
InsuranceNumberPersons5, InsurancePricePerPerson5, InsuranceTotalPrice5, InsuranceDescription5, 
AdditionalTitle1, AdditionalURL1, AdditionalPDF1, AdditionalTitle2, AdditionalURL2, AdditionalPDF2, 
AdditionalTitle3, AdditionalURL3, AdditionalPDF3, BookingFeeNumberPersons, BookingFeePerPerson, 
BookingFeeTotal, PTravellerParty, PTravellerTitle, 
PTravellerFName, PTravellerMName, PTravellerLName, PTravellerDOB, PTravellerPhone, 
PTravellerEmail, PTravellerStreet, PTravellerUnit, PTravellerCity, PTravellerProvince, 
PTravellerPostal, PTravellerCountry, PTravellerNotes, pricing1, pricing2, pricing3, pricing4, 
pricing5, insurance1, insurance2, insurance3, insurance4, insurance5, RequestPrimaryTravellerCC, 
RequestTravellersPassport FROM booking_1 WHERE BookID='$BookID'";

if (mysqli_query($conn, $sql1)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}



$sql2 = "INSERT INTO booking_2 (BookID2, BookUnique, AgentID, BookingCIP, AddTravelTitle1, AddTravelFName1, 
AddTravelMName1, AddTravelLName1, AddTravelDOB1, AddTravelNotes1, AddTravelTitle2, AddTravelFName2, 
AddTravelMName2, AddTravelLName2, AddTravelDOB2, AddTravelNotes2, AddTravelTitle3, AddTravelFName3, 
AddTravelMName3, AddTravelLName3, AddTravelDOB3, AddTravelNotes3, AddTravelTitle4, AddTravelFName4, 
AddTravelMName4, AddTravelLName4, AddTravelDOB4, AddTravelNotes4, AddTravelTitle5, AddTravelFName5, 
AddTravelMName5, AddTravelLName5, AddTravelDOB5, AddTravelNotes5, AddTravelTitle6, AddTravelFName6, 
AddTravelMName6, AddTravelLName6, AddTravelDOB6, AddTravelNotes6, AddTravelTitle7, AddTravelFName7, 
AddTravelMName7, AddTravelLName7, AddTravelDOB7, AddTravelNotes7, AddTravelTitle8, AddTravelFName8, 
AddTravelMName8, AddTravelLName8, AddTravelDOB8, AddTravelNotes8, TripGrandTotal, InsuranceGrandTotal, 
OverallGrandTotal, ServiceGrandTotal, TravelerDocuments1, TravelerDocuments2, TravelerDocuments3, 
TravelerDocuments4, TravelerDocuments5, QuoteFee1, BookingFee1, TripFee1, TravelInsuranceFee1, QuoteFee2, 
BookingFee2, TripFee2, TravelInsuranceFee2, QuoteFee3, BookingFee3, TripFee3, TravelInsuranceFee3, 
QuoteFee4, BookingFee4, TripFee4, TravelInsuranceFee4)

SELECT '', '$BookUnique', AgentID, BookingCIP, AddTravelTitle1, AddTravelFName1, AddTravelMName1, AddTravelLName1, 
AddTravelDOB1, AddTravelNotes1, AddTravelTitle2, AddTravelFName2, AddTravelMName2, AddTravelLName2, 
AddTravelDOB2, AddTravelNotes2, AddTravelTitle3, AddTravelFName3, AddTravelMName3, AddTravelLName3, 
AddTravelDOB3, AddTravelNotes3, AddTravelTitle4, AddTravelFName4, AddTravelMName4, AddTravelLName4, 
AddTravelDOB4, AddTravelNotes4, AddTravelTitle5, AddTravelFName5, AddTravelMName5, AddTravelLName5, 
AddTravelDOB5, AddTravelNotes5, AddTravelTitle6, AddTravelFName6, AddTravelMName6, AddTravelLName6, 
AddTravelDOB6, AddTravelNotes6, AddTravelTitle7, AddTravelFName7, AddTravelMName7, AddTravelLName7, 
AddTravelDOB7, AddTravelNotes7, AddTravelTitle8, AddTravelFName8, AddTravelMName8, AddTravelLName8, 
AddTravelDOB8, AddTravelNotes8, TripGrandTotal, InsuranceGrandTotal, OverallGrandTotal, ServiceGrandTotal, 
TravelerDocuments1, TravelerDocuments2, TravelerDocuments3, 
TravelerDocuments4, TravelerDocuments5, QuoteFee1, BookingFee1, TripFee1, TravelInsuranceFee1, QuoteFee2, 
BookingFee2, TripFee2, TravelInsuranceFee2, QuoteFee3, BookingFee3, TripFee3, TravelInsuranceFee3, 
QuoteFee4, BookingFee4, TripFee4, TravelInsuranceFee4 FROM booking_2 WHERE BookID2='$BookID'";

if (mysqli_query($conn, $sql2)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}


header('Location: manage-email-forms.php#email-forms-list');// Success

?>

<?php ob_flush() ?>