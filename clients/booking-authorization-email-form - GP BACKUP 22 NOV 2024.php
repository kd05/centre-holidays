<?php ob_start(); 

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');

$today=time();

$ORBookID=trim($_GET['BookID']);
$ORBookID=strip_tags($ORBookID);

$outh=trim($_GET['outh']);
$outh=strip_tags($outh);

$shatim=trim($_GET['shatim']);
$shatim=strip_tags($shatim);

$BookUnique=trim($_GET['bq']); 
$BookUnique=strip_tags($BookUnique);

//============================================================================================
$numdays=7;

$ptime=time()-(60*60*24*$numdays);// how far in the past change 10 to any number of days

$BookingTime=time();
$BookingTime2=time();
if (!empty($BookUnique))
{
?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<title>Booking Authorization Email Form | Centre Holidays</title>
<?php include($_SERVER['DOCUMENT_ROOT'].'/clients/ssi/head-scripts.php');?>    
<!--::CSS for printing-->

    <!--::CSS for printing-->
    <style>
    @media print {
    .collapse {
    display:block !important;
    }
    }
    .hidden {
    display: none
    }
    @media print {
    .col-xl-1,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12 {
    float: left;
    }
    .col-xl-12 {
    width: 100%;
    }
    .col-xl-11 {
    width: 91.66666666666666%;
    }
    .col-xl-10 {
    width: 83.33333333333334%;
    }
    .col-xl-9 {
    width: 75%;
    }
    .col-xl-8 {
    width: 66.66666666666666%;
    }
    .col-xl-7 {
    width: 58.333333333333336%;
    }
    .col-xl-6 {
    width: 50%;
    }
    .col-xl-5 {
    width: 41.66666666666667%;
    }
    .col-xl-4 {
    width: 33.33333333333333%;
    }
    .col-xl-3 {
    width: 25%;
    }
    .col-xl-2 {
    width: 16.666666666666664%;
    }
    .col-xl-1 {
    width: 8.333333333333332%;
    }
    .col-xl-pull-12 {
    right: 100%;
    }
    .col-xl-pull-11 {
    right: 91.66666666666666%;
    }
    .col-xl-pull-10 {
    right: 83.33333333333334%;
    }
    .col-xl-pull-9 {
    right: 75%;
    }
    .col-xl-pull-8 {
    right: 66.66666666666666%;
    }
    .col-xl-pull-7 {
    right: 58.333333333333336%;
    }
    .col-xl-pull-6 {
    right: 50%;
    }
    .col-xl-pull-5 {
    right: 41.66666666666667%;
    }
    .col-xl-pull-4 {
    right: 33.33333333333333%;
    }
    .col-xl-pull-3 {
    right: 25%;
    }
    .col-xl-pull-2 {
    right: 16.666666666666664%;
    }
    .col-xl-pull-1 {
    right: 8.333333333333332%;
    }
    .col-xl-pull-0 {
    right: 0;
    }
    .col-xl-push-12 {
    left: 100%;
    }
    .col-xl-push-11 {
    left: 91.66666666666666%;
    }
    .col-xl-push-10 {
    left: 83.33333333333334%;
    }
    .col-xl-push-9 {
    left: 75%;
    }
    .col-xl-push-8 {
    left: 66.66666666666666%;
    }
    .col-xl-push-7 {
    left: 58.333333333333336%;
    }
    .col-xl-push-6 {
    left: 50%;
    }
    .col-xl-push-5 {
    left: 41.66666666666667%;
    }
    .col-xl-push-4 {
    left: 33.33333333333333%;
    }
    .col-xl-push-3 {
    left: 25%;
    }
    .col-xl-push-2 {
    left: 16.666666666666664%;
    }
    .col-xl-push-1 {
    left: 8.333333333333332%;
    }
    .col-xl-push-0 {
    left: 0;
    }
    .col-xl-offset-12 {
    margin-left: 100%;
    }
    .col-xl-offset-11 {
    margin-left: 91.66666666666666%;
    }
    .col-xl-offset-10 {
    margin-left: 83.33333333333334%;
    }
    .col-xl-offset-9 {
    margin-left: 75%;
    }
    .col-xl-offset-8 {
    margin-left: 66.66666666666666%;
    }
    .col-xl-offset-7 {
    margin-left: 58.333333333333336%;
    }
    .col-xl-offset-6 {
    margin-left: 50%;
    }
    .col-xl-offset-5 {
    margin-left: 41.66666666666667%;
    }
    .col-xl-offset-4 {
    margin-left: 33.33333333333333%;
    }
    .col-xl-offset-3 {
    margin-left: 25%;
    }
    .col-xl-offset-2 {
    margin-left: 16.666666666666664%;
    }
    .col-xl-offset-1 {
    margin-left: 8.333333333333332%;
    }
    .col-xl-offset-0 {
    margin-left: 0;
    }
    }	
    
    @media print {
	
	.bg-light, input, textarea {background:#FFF !important}	
    
	#hideprint {
    visibility: hidden;
	display: none !important;
    }
    #formfooter {
    visibility: hidde !important;
	display: none !important;
    }
    #infoboxes {
    visibility: hidde !important;
	display: none !important;
    }	
    #kt_header {
    visibility: hidden !important;
	display: none !important;
    }	
    #kt_header_mobile {
    visibility: hidden !important;
	display: none !important;
    }	
    #kt_footer {
    visibility: hidden !important;
	display: none !important;
    }		
    #kt_body, #kt_body * {
    visibility: visible;
    }
    #kt_body {
    position: absolute;
    left: 0;
    top: 0;
	background: none !important;
    }
	
	body {
	background: none !important;
	padding: 0 !important;
	margin-top:-40px !important;
	}
	
	@page { 
	size: auto;
	margin: 20px !important;
	}
    }
    </style>  

<!--::CSS for signature-->
<style>
#sig-canvas {
  border: 2px dotted #CCCCCC;
  border-radius: 15px;
  cursor: crosshair;
}
#sig-canvas1 {
  border: 2px dotted #CCCCCC;
  border-radius: 15px;
  cursor: crosshair;
}
</style>
    <!--JAVASCRIPT DISPALY TRIP PRICING PERSONS-->
    <script>
    var display = {
    1: [0, 1, 9],
    2: [0, 1, 2, 9],
    3: [0, 1, 2, 3, 9],
    4: [0, 1, 2, 3, 4, 9],
    5: [0, 1, 2, 3, 4, 5, 9],
    6: [0, 1, 2, 3, 4, 5, 6, 9],
    7: [0, 1, 2, 3, 4, 5, 6, 7, 9],
    8: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
    21: [21, 25],
    22: [22],
    23: [23],
    24: [24],
	50: [50, 51, 52],
    51: [50, 51, 52, 53, 54]				 
    }
	
	function selectChanged50() {
    var sel = document.getElementById("select50");	
    for (var i = 50; i < 55; i++) {
    document.getElementById("box" + i).classList.add("hidden");
	document.getElementById("VerificationPurposesConsent").checked = false;
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
	document.getElementById("VerificationPurposesConsent").checked = true;
    });
    }
	

	function selectChanged1() {
    var sel = document.getElementById("select1");
    for (var i = 1; i < 10; i++) {
/*	document.getElementById("AddTravelConsent1").checked = false;
	document.getElementById("AddTravelConsent2").checked = false;*/
	document.getElementById("AddTravelConsent1").checked = true;
	document.getElementById("AddTravelConsent2").checked = true;		
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
	document.getElementById("AddTravelConsent1").checked = true;
	document.getElementById("AddTravelConsent2").checked = true;	
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
	<?php 
	//if ($row['AddTravelConsent1']=='Yes')  
		$AddTravelConsent1Check='checked';	
		
	//if ($row['AddTravelConsent2']=='Yes')  
		$AddTravelConsent2Check='checked';
	?>
	
	function selectChanged21() {
    var sel = document.getElementById("select21");
    for (var i = 21; i < 26; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }	
	</script>
    <!--VALIDATE FILE SIZE-->
    <script>
    function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MiB
        if (FileSize > 10) {
            alert('File size exceeds 10 MiB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
    }
	</script>
	<script>
    function totalIt77() {
      var input = document.getElementsByName("product77[]");
      var total = 0;
      for (var i = 0; i < input.length; i++) {
        if (input[i].checked) {
          total += parseFloat(input[i].value);
        }
      }
      document.getElementsByName("InsuranceGrandTotal")[0].value = total.toFixed(2);
    }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="print-content-only header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<form action="booking-authorization-clients-insert.php" id="booking-authorization-clients-form" enctype="multipart/form-data" method="post">
<div class="d-flex flex-column-fluid pt-10 pb-10">
<!--begin::Container-->
<div class="container">
<!-- begin::Card-->
<div class="card card-custom overflow-hidden">

<?php
//=======================recall information===========================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
//====================================================================


if ($outh=='P8ez7FHxJcy0hwMnd9HEv8CgWM29x')
{
	$sql55 = "UPDATE booking_1 SET BookingTime='".$today."' WHERE BookID='".$ORBookID."'";
	
	if (mysqli_query($conn, $sql55)) {
	  //echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . mysqli_error($conn);
	}
}



//=================================Get information from DB============
$sql = "SELECT * FROM booking_1, booking_2 WHERE booking_1.BookingTime > $ptime  AND (booking_1.BookingStatus=1 || booking_1. BookingStatus=2 || booking_1. BookingStatus=3) AND booking_1.BookUnique='".$BookUnique."' AND booking_1.BookID=booking_2.BookID2 LIMIT 1"; 

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  

if ($row['PurchaseInsurance']=='No')	
{  
$NoPurchaseInsurance='checked';	 
$box446=''; 
$InsuranceWeaverConsent='checked';
}
else  
{
$YesPurchaseInsurance='checked';
$box446='none'; 
$InsuranceWeaverConsent='';
}


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
	  
	  
if ($row['BookingStatus'] < 2) {
	
	//====================================================================
	//=================================Update status to 2 aka seen========
	//=====================================================================
	$sql32 = "UPDATE booking_1 SET BookingStatus='2' WHERE BookUnique='$BookUnique'";
	if (mysqli_query($conn, $sql32)) {
	// echo "Record updated successfully";
	} else {
	// echo "Error updating record: " . mysqli_error($conn);
	}	  
	 
		//====================================================================
	//=================================Update status to 2 aka seen========
	//=====================================================================
	$sql329 = "UPDATE booking_2 SET BookingTime2='$BookingTime2' WHERE BookUnique='$BookUnique'";
	if (mysqli_query($conn, $sql329)) {
	// echo "Record updated successfully";
	} else {
	// echo "Error updating record: " . mysqli_error($conn);
	}  
	  
	  
	}
	
//============================================================================================

if (!empty($row['BookingTime5'])) {

$BookingTime6=time();

	$sql329 = "UPDATE booking_2 SET BookingTime6='$BookingTime6' WHERE BookUnique='$BookUnique'";
	if (mysqli_query($conn, $sql329)) {
	// echo "Record updated successfully";
	} else {
	// echo "Error updating record: " . mysqli_error($conn);
	} 	
	
}

	?>
    
    
    
    <!-- GET TOTAL ONCE A CHECKBOX IS SELECTED-->
	<?php if (empty($row['FullPaymentDate'])) { ?> 
	<script>
    function totalIt() {
    var input = document.getElementsByName("product[]");
    var total = 0;
    for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
    }
    document.getElementsByName("total")[0].value = total.toFixed(2);
    }
    </script>
    
	<script>
    function totalIt7() {
    var input = document.getElementsByName("product7[]");
    var total = 0;
    for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
    }
    document.getElementsByName("total7")[0].value = total.toFixed(2);
    }
    </script>    
    
	<?php } else { ?>
    <script>
	function totalIt() {
	}
	</script>
    
    <script>
	function totalIt7() {
	}
	</script>
        
	<?php } ?>
	<?php if (!empty($row['FullPaymentDate'])) { ?>
	<script>
    function totalIt2() {
    var input = document.getElementsByName("product[]");
    var total = 0;
    for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
    }
	document.getElementsByName("TotalAmountDue3")[0].value = total.toFixed(2);
	document.getElementsByName("TotalAmountDue")[0].value = total.toFixed(2);
    }
    </script>
    
<!--<script>
    function totalIt27() {
    var input = document.getElementsByName("product7[]");
    var total = 0;
    for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
    }
    
    }
    </script>-->
        
    <?php } else { ?>
    <script>
	function totalIt2() {
	}
	</script>
    
    <script>
	function totalIt27() {
	}
	</script>    
	<?php } ?>
<div class="card-body p-0">
<!-- begin: Invoice-->
<!-- begin: Invoice header-->
<div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-20 px-md-0 bg-dark">
<div class="col-md-11">
<div class="d-flex justify-content-between pb-10 pb-md-10 flex-column flex-md-row">
<!--end::Logo-->												
<div class="d-flex flex-column px-0">
<!--begin::Logo-->
<img src="/img/centre-holidays-logo-footer.png" class="max-w-275px mb-5" alt="Centre Holidays">
<!--end::Logo-->
</div>
<span class="text-white d-flex flex-column align-items-md-end">
<h4 class="text-white font-weight-boldest mb-5 align-items-md-end">BOOKING AUTHORIZATION E-FORM</h4>														
<span>For Assistance, Please Call <b><?php echo $row["BusinessPhone"] ?></b></span>
</span>
</div>
<div class="border-bottom w-100 opacity-20"></div>
<div class="d-flex justify-content-between text-white pt-6">
<div class="d-flex flex-column flex-root lead">
<p>This booking authorization email form consists of multiple sections. Please review the details provided, fill in all the required details and submit it back to <b><?php echo $row["BusinessFullName"] ?></b>, your travel advisor.</p>
</div>
</div>
</div>
</div>
<!-- end: Invoice header-->
<!-- begin: Invoice body-->
<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
<div class="col-md-11">
<!--begin::Accordion-->
<div class="accordion accordion-solid accordion-panel accordion-toggle-plus text-dark mt-7" id="baf">


<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['PTravellerConsent1'] =='Yes' && $row['PTravellerConsent2'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->


<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading1" onClick="covid333(); this.onclick=null;">
<div class="card-title" data-toggle="collapse" data-target="#baf1" aria-expanded="true" aria-controls="baf1" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Primary Traveller</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf1" class="collapse show" aria-labelledby="baf-heading1" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please state the primary traveller's details as per their passport. If requested, please upload a copy of the primary traveller's passport in order to avoid any errors during the booking process. Once the trip is booked, the primary traveller's phone number and email will be submitted to the airline for notifications. All items marked with a red asterisk<span class="text-danger"> *</span> are required.</p>
<!--begin::Row-->

<script>
function covid333() {
  alert("Primary Traveller: Please Fill In All The Required Fields.");
  /*document.getElementById("CovidConsentName").focus();*/
}
</script>


<div class="row mt-10">
<!--begin::Primary Traveller Title-->
<div class="col-xl-3">
<div class="form-group">
<input type="hidden" value="<?php echo $shatim ?>" name="shatim" />
<input type="hidden" value="<?php echo $BookUnique ?>" name="bq" />
<input type="hidden" value="<?php echo $row['BookID2'] ?>" name="BookID" />
<input type="hidden" value="<?php echo $row['BusinessFullName'] ?>" name="BusinessFullName" />
<input type="hidden" value="<?php echo $row['BusinessPhone'] ?>" name="BusinessPhone" />
<input type="hidden" value="<?php echo $row['BusinessName'] ?>" name="BusinessName" />
<input type="hidden" value="<?php echo $row['BusinessEmail'] ?>" name="BusinessEmail" />
<input type="hidden" value="<?php echo $row['EmaiToSubject'] ?>" name="EmaiToSubject" />


<label>Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="PTravellerTitle" required>

<?php if (!empty($row['PTravellerTitle'])){  ?>
<option value="<?php echo $row['PTravellerTitle'] ?>" selected="selected">
<?php echo $row['PTravellerTitle'] ?>
</option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Primary Traveller Title-->
<!--begin::Primary Traveller First Name-->
<div class="col-xl-3">
<div class="form-group">
<label>First Name <span class="text-danger">*</span></label>
<input type="text" required name="PTravellerFName" value="<?php echo $row['PTravellerFName'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Primary Traveller First Name-->
<!--begin::Primary Traveller Middle Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Middle Name </label>
<input type="text" value="<?php echo $row['PTravellerMName'] ?>" name="PTravellerMName" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Primary Traveller Middle Name-->
<!--begin::Primary Traveller Last Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Last Name <span class="text-danger">*</span></label>
<input type="text" required value="<?php echo $row['PTravellerLName'] ?>" name="PTravellerLName" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Primary Traveller Last Name-->
<!--begin::Primary Traveller DOB-->
<div class="col-xl-3">
<div class="form-group">
<label>Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" required value="<?php echo $row['PTravellerDOB'] ?>" name="PTravellerDOB" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date">
</div>
</div>
<!--end::Primary Traveller DOB-->
<!--begin::Primary Traveller Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Phone <span class="text-danger">*</span></label>
<input type="text" required value="<?php echo $row['PTravellerPhone'] ?>" name="PTravellerPhone" class="form-control  form-control-lg" placeholder="Phone" />
</div>
</div>
<!--end::Primary Traveller Phone-->
<!--begin::Primary Traveller Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Email <span class="text-danger">*</span></label>
<input type="text" required value="<?php echo $row['PTravellerEmail'] ?>" name="PTravellerEmail" class="form-control  form-control-lg" placeholder="Email" />
</div>
</div>
<!--end::Primary Traveller Email-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-6">
<div class="form-group">
<label>Home Address (Street) <span class="text-danger">*</span></label>
<input type="text" required value="<?php echo $row['PTravellerStreet'] ?>" name="PTravellerStreet" class="form-control form-control-lg" placeholder="Street Address" />
</div>
</div>
<!--end::Primary Traveller Street-->
<!--begin::Primary Traveller Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" value="<?php echo $row['PTravellerUnit'] ?>" name="PTravellerUnit" class="form-control form-control-lg" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Primary Traveller Unit-->
<!--begin::Primary Traveller City-->
<div class="col-xl-3">
<div class="form-group">
<label>City <span class="text-danger">*</span></label>
<input type="text" required name="PTravellerCity" value="<?php echo $row['PTravellerCity'] ?>" class="form-control form-control-lg" placeholder="City" />
</div>
</div>
<!--end::Primary Traveller City-->
<!--begin::Primary Traveller Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province/State <span class="text-danger">*</span></label>
<input type="text" required name="PTravellerProvince" value="<?php echo $row['PTravellerProvince'] ?>" class="form-control form-control-lg" placeholder="Province/State" />
</div>
</div>
<!--end::Primary Traveller Province-->
<!--begin::Primary Traveller Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code <span class="text-danger">*</span></label>
<input type="text" required name="PTravellerPostal" value="<?php echo $row['PTravellerPostal'] ?>" class="form-control form-control-lg" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Primary Traveller Postal Code-->
<!--begin::Primary Traveller Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country <span class="text-danger">*</span></label>
<input type="text" required name="PTravellerCountry" value="<?php echo $row['PTravellerCountry'] ?>" class="form-control form-control-lg" placeholder="Country" />
</div>
</div>
<!--end::Primary Traveller Country-->
<!--begin::Primary Traveller Additional Travellers-->
<div class="col-xl-3">
<div class="form-group">
<label>Additional Travellers In The Party <span class="text-danger">*</span></label>
<?php

$box1='hidden';
$box2='hidden';
$box3='hidden';
$box4='hidden';
$box5='hidden';
$box6='hidden';
$box7='hidden';
$box8='hidden';

if (empty($row['PTravellerParty']) || $row['PTravellerParty']==10) 
$addtravelclass='hidden';
else
$addtravelclass='';

//================================================================

$PTravellerParty=$row['PTravellerParty'];
switch ($PTravellerParty) {
  case "1":
   $DPTravellerParty='1 Additional Traveller';
   $box1='';
   break;
  case "2":
   $DPTravellerParty='2 Additional Travellers';
   $box1='';
   $box2='';
   break;
  case "3":
   $DPTravellerParty='3 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   break;   
  case "4":
   $DPTravellerParty='4 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   $box4='';
   break;
  case "5":
   $DPTravellerParty='5 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   $box4='';
   $box5='';
   break;
  case "6":
   $DPTravellerParty='6 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   $box4='';
   $box5='';
   $box6='';
   break; 
  case "7":
   $DPTravellerParty='7 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   $box4='';
   $box5='';
   $box6='';
   $box7='';
   break;
  case "8":
   $DPTravellerParty='8 Additional Travellers';
   $box1='';
   $box2='';
   $box3='';
   $box4='';
   $box5='';
   $box6='';
   $box7='';
   $box8='';
   break;   
  case "10":
   $DPTravellerParty='None';
   break;  
   
}


?>
<select class="form-control  form-control-lg" name="PTravellerParty" id="select1" onchange="myFunction(event);selectChanged1();this.onclick=null" required > 
<?php if (!empty($row['PTravellerParty'])){  ?>
<option value="<?php echo $row['PTravellerParty'] ?>"><?php echo $DPTravellerParty ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="10">None</option>
<option value="1">1 Additional Traveller</option>
<option value="2">2 Additional Travellers</option>
<option value="3">3 Additional Travellers</option>
<option value="4">4 Additional Travellers</option>
<option value="5">5 Additional Travellers</option>
<option value="6">6 Additional Travellers</option>
<option value="7">7 Additional Travellers</option>
<option value="8">8 Additional Travellers</option>
</select>

<script>
function myFunction(e) {
	var wise = e.target.value;	
    if (wise < 10) {
	var x = 1;
	
	<?php if (!empty($row["BookingFeeNumberPersons"])) { ?>
	wisem = parseInt(wise) + parseInt(x);
	var twise = wisem * <?php echo $row["BookingFeePerPerson"]; ?>;
	document.getElementById("BookingFeeNumberPersons").value = wisem;
	document.getElementById("BookingTotalFee").value = twise.toFixed(2);
	document.getElementById("sgt0").value = twise.toFixed(2);
	<?php } ?>
	<?php if (!empty($row["QuoteNumberPersons"])) { ?>
	wisem2 = parseInt(wise) + parseInt(x);
	var twise2 = wisem2 * <?php echo $row["QuoteFeePerPerson"]; ?>;
	document.getElementById("QuoteNumberPersons").value = wisem2;
	document.getElementById("QuoteTotalFee").value = twise2.toFixed(2);
	document.getElementById("sgt").value = twise2.toFixed(2);
	<?php } ?>
	
	} else {
	<?php if (!empty($row["BookingFeeNumberPersons"])) { ?>	
	var twise = 1 * <?php echo $row["BookingFeePerPerson"] ?>;	
	document.getElementById("BookingFeeNumberPersons").value = 1;
	document.getElementById("BookingTotalFee").value = twise.toFixed(2);	
	document.getElementById("sgt0").value = twise.toFixed(2);
	<?php } ?>
	<?php if (!empty($row["QuoteNumberPersons"])) { ?>
	var twise2 = 1 * <?php echo $row["QuoteFeePerPerson"]; ?>;
	document.getElementById("QuoteNumberPersons").value = 1;
	document.getElementById("QuoteTotalFee").value = twise2.toFixed(2);
	document.getElementById("sgt").value = twise2.toFixed(2);
	<?php } ?>
	}
}
</script>

</div>
</div>

<!--end::Primary Traveller Additional Travellers-->
<!--begin::Primary Traveller Notes-->

<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="PTravellerNotes" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['PTravellerNotes'] ?></textarea>
</div>
</div>
<!--end::Primary Traveller Notes-->

<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_prime_passport_already_uploaded = !empty($row['PrimePassport']) ? true: false;
    ?>
<!--begin::Primary Traveller Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation1()" name="PrimePassport" id="PrimePassport" <?php if(!$is_prime_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload your passport." '; ?> />
<input type="hidden" value="<?php echo $row['PrimePassport'] ?>" name="PrimePassportDB" id="PrimePassportDB" />
<script>
Filevalidation1 =() => {
	const fi1 = document.getElementById('PrimePassport');
		if (fi1.files.length > 0) {
			for (const i = 0; i <= fi1.files.length - 1; i++) {
				const fsize = fi1.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>


<?php if($is_prime_passport_already_uploaded) echo "<p style='color: #005c36;'>Passport already uploaded.</p>" ?>


<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>


</div>
<!--end::Primary Traveller Passport-->
<?php } ?>

<!--begin::Step 1 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" required name="PTravellerConsent1" id="PTravellerConsent1" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hereby certify that the details provided are correct as per my passport.</small></label>
</div>
<!--end::Step 1 - Agree Checkbox 1-->
<!--begin::Step 1 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" required name="PTravellerConsent2" id="PTravellerConsent2" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the details provided are incorrect and my trip is booked, it can lead to an additional change fee ($).</small></label>
</div>
<!--end::Step 1 - Agree Checkbox 2-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->


<?php if (!empty($row["QuoteFeePerPerson"]) && !empty($row["QuoteNumberPersons"]) || (!empty($row["BookingFeeNumberPersons"]) && !empty($row["BookingFeePerPerson"]))) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['ServiceAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading2">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf2" aria-expanded="false" aria-controls="baf2" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Service Fee Agreement</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf2" class="collapse" aria-labelledby="baf-heading2" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided.</p>
<div class="row mt-10">


<?

if (!empty($row["QuoteFeePerPerson"]) && !empty($row["QuoteNumberPersons"]))
{
?>
<!--begin::SFA - Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" id="QuoteNumberPersons" name="QuoteNumberPersons" value="<?php echo $row["QuoteNumberPersons"] ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::SFA - Number Of Persons-->
<!--begin::SFA - Fee PP-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="QuoteFeePerPerson" value="<?php echo $row["QuoteFeePerPerson"]; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Fee Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row["ServiceCurrency"] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Fee PP-->
<!--begin::SFA - Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php

$QuoteTotalFee=$row["QuoteFeePerPerson"]*$row["QuoteNumberPersons"];
$QuoteTotalFee=number_format($QuoteTotalFee, 2, '.', '');

if (empty($QuoteTotalFee) || $QuoteTotalFee < 1)
{
$QuoteTotalFee=0.00;
}

?>
<input id="QuoteTotalFee" name="QuoteTotalFee" value="<?php echo $QuoteTotalFee; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Service Fee Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row["ServiceCurrency"] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Grand Total-->
<?php
}

if (!empty($row["BookingFeeNumberPersons"]) && !empty($row["BookingFeePerPerson"]))
{
?>
<!--begin::SFA - Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" id="BookingFeeNumberPersons" name="BookingFeeNumberPersons" value="<?php echo $row["BookingFeeNumberPersons"] ?>" class="form-control form-control-lg bg-light" placeholder="Booking Number Of Persons" <?php echo $Servicereadonly ?> />
</div>
</div>
<!--end::SFA - Number Of Persons-->

<!--begin::SFA - Fee PP-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="BookingFeePerPerson" name="BookingFeePerPerson" value="<?php echo $row["BookingFeePerPerson"]; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Booking Fee Per Person" <?php echo $Servicereadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Fee PP-->

<!--begin::SFA - Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php

$BookingTotalFee=$row["BookingFeeNumberPersons"]*$row["BookingFeePerPerson"];
$BookingTotalFee=number_format($BookingTotalFee, 2, '.', '');

if (empty($BookingTotalFee) || $BookingTotalFee < 1)
{
$BookingTotalFee=0.00;
}

?>
<input id="BookingTotalFee" name="BookingTotalFee" value="<?php echo $BookingTotalFee; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Booking Fee Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Grand Total-->
<?php } ?>




<!--begin::SFA - Details-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>										
<div class="card card-custom card-border bg-light mb-7">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php if (empty( $row["ServiceDetails"] )) { ?>
<p>In order to plan and arrange your trip, a <b>quote fee</b> and/or <b>booking fee</b> may be required by Centre Holidays Inc. These fees will include up to three personalized quotes or recommendations with options that meet or exceed expectations. These fees are non-refundable. Should you decide to cancel your trip or are unable to travel for any other reason, Centre Holidays Inc. will retain these fees.<br>
  <br>
  This Service Fee Agreement only applies to trip planning provided by Centre Holidays Inc. This Service Fee Agreement does not represent resorts, airlines or any other travel vendor's policies.
</p>
<?php } else {echo $row["ServiceDetails"];} ?>
</div>
</div>
</div>
</div>
</div>
<!--end::SFA - Details-->


<?php if (!empty( $row["ServicePDF"] )) { ?>
<!--begin::SFA Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["ServicePDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Service Fee Agreement</a>
</div>
<?php } ?>
<!--end::SFA Document-->


<!-- BY DEFAULT IT'S SELECTED AGREED -->
<?php
//YOU MUST SELCT ONE OF THE OPTIONS IF THIS SERVICE AGREEMENT IS SENT BY THE AGENT
//if (!empty($row["QuoteFeePerPerson"]) || !empty($row["BookingFeeNumberPersons"]) || !empty($row["ServiceDetails"]) || !empty( $row["ServicePDF"]))
//$ServiceAcceptedchecked='checked';

//if ($row['ServiceAccepted']=='No')
//$ServiceAcceptedcheckedNo='checked';
//else
$ServiceAcceptedchecked='checked';


?>
<!--begin::Step 2 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-outline-2x radio-success radio-lg">
<input type="radio" <?php echo $ServiceAcceptedchecked ?> name="ServiceAccepted" value="Yes" id="myCheck736" onclick="myFunction736()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Service Fee Agreement.</small></label>
</div>
<!--end::Step 2 - Agree Checkbox 1-->
<!--begin::Step 2 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="radio radio-outline radio-outline-2x radio-danger radio-lg">
<input type="radio" <?php echo $ServiceAcceptedcheckedNo ?> id="myCheck737" name="ServiceAccepted" value="No" onclick="myFunction737(), myFunctionReason()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Service Fee Agreement.</small></label>
</div>
<script>
function myFunction736() {
  var checkBox = document.getElementById("myCheck736");
  var text = document.getElementById("text737");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction737() {
  var checkBox = document.getElementById("myCheck737");
  var text = document.getElementById("text737");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
<!--end::Step 2 - Agree Checkbox 2-->

<?php if (!empty($row["QuoteFeePerPerson"]) || !empty($row["BookingFeeNumberPersons"]) || !empty($row["ServiceDetails"]) || !empty( $row["ServicePDF"])) { ?>
<script>
function myFunctionReason() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("servicereason").focus();
}
</script>
<?php } ?>

<!--begin::SFA - Reason-->
<?php 
//if (empty($row["ServiceNoReason"]))
$text737='none';
//else
//$text737='';
?>


<div class="col-xl-12 mt-2" id="text737" style="display:<?php echo $text737 ?>">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="ServiceNoReason" id="servicereason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason">
<?php //echo $row["ServiceNoReason"] ?>
</textarea>
</div>
</div>
<!--end::SFA - Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->

<?php } ?>





<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['CovidAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['CovidAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading3">
<div onClick="covid19(); this.onclick=null;" class="card-title collapsed" data-toggle="collapse" data-target="#baf3" aria-expanded="false" aria-controls="baf3" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">COVID-19 Waiver</div>
</div>
</div>
<!--end::Header-->

<script>
function covid19() {
  alert("COVID-19 Waiver: Please Fill In Your Full Name And Sign The Waiver.");
  document.getElementById("CovidConsentName").focus();
}
</script>


<!--begin::Body-->
<div id="baf3" class="collapse" aria-labelledby="baf-heading3" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided and sign the waiver. All items marked with a red asterisk<span class="text-danger"> *</span> are required.</p>
<div class="row mt-10">
<!--begin::COVID Waiver Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p>As the worldwide COVID-19 pandemic remains ongoing at this time, I acknowledge that for this reason, and other reasons not reasonably foreseeable at this time, these travel plans may be interrupted or canceled by the supplier that is providing them, a government entity or other third party over which Centre Holidays Inc. has no control. 
I further acknowledge that the supplier's own cancellation, re-booking and refund policies, subject to any 
applicable law that is now or may later be in effect, will govern my rights and remedies, including my right to 
receive a refund, in such an event. Moreover, I understand that should I elect to purchase travel insurance, the terms of the policy will dictate whether, and to what extent, coverage for any financial loss may exist under the 
circumstances. By signing below, I hereby agree to hold Centre Holidays Inc. harmless and release the agency from any and all liability for any damages, including but not limited to monetary losses, I may incur as a result of such interruption or cancellation of these travel plans.  
<br>
<br>
By signing this agreement, I acknowledge the contagious nature of COVID-19 and voluntarily assume the risk that I may be exposed to or infected by COVID-19 while traveling. Such exposure or infection may result in personal injury, illness, permanent disability, and possible death. I voluntarily agree to assume all of the foregoing risks and accept sole responsibility for any injury to myself (including, but not limited to, personal injury, disability, and death), illness, damage, loss, claim, liability, or expense, of any kind, that I may experience or incur in connection with Centre Holidays Inc.  
<br>
<br>
As travel opens around the world, all destinations, airports, air carriers, hotels, restaurants, transfer companies, car rental companies, shops and excursions have established COVID-19 safety measures and precautions which may change from day to day. These safety measures may include, but are not limited to: curfews, attraction closings and reduced hours, size of group gatherings, social distancing requirements, health screenings, self-quarantine requirements and COVID test results. By signing this agreement, I accept ultimate responsibility for myself and my travelling party to have all the necessary provisions for travel (such as COVID test results, pre-travel questionnaires, etc.) Moreover, I understand that I should assume responsibility for the necessary documents (such as COVID test results, pre-travel questionnaires, etc.) considering COVID-19, in order to travel to my specific destination.
<br>
<br>
By signing this agreement, I acknowledge that the signature provided below will serve as my digital signature if signed through a third-party website.</p>
</div>
</div>
</div>
</div>
<!--end::COVID Waiver Text-->

<div class="col-xl-12" id="text3667">
<!--begin::COVID Waiver Full Name-->
<div class="col-xl-12 p-0">
<div class="form-group">
<label>Full Name (Primary Traveller) <span class="text-danger">*</span></label>
<input type="text" required name="CovidConsentName" id="CovidConsentName" value="<?php echo $row["CovidConsentName"] ?>" class="form-control form-control-lg" placeholder="Full Name (Primary Traveller)" />
</div>
</div>
<!--end::COVID Waiver Full Name-->
<!--begin::COVID Waiver Signature-->
<div class="col-xl-12 p-0">
<div class="form-group">
<label>Signature (Primary Traveller) <span class="text-danger">*</span></label>
<br />

<?php if (empty($row['sigdataUrl'])) { ?>
<canvas id="sig-canvas" style="touch-action: none; width:100%; height:160px; max-width:300px">
  Please download Chrome browser.
</canvas>
<br />
<button type="button" id="sig-clearBtn" on class="btn btn-outline-warning btn-light-warning text-uppercase font-weight-bolder mt-2">Clear Signature</button>
<?php } ?>

<textarea id="sigdataUrl" name="sigdataUrl" rows="5" class="hidden">
<?php echo $row['sigdataUrl'] ?>
</textarea>


<?php if (!empty($row["sigdataUrl"])) { ?>
<img src="<?php echo $row['sigdataUrl'] ?>" alt="Signature" style="width:300px; height:auto; max-height:300px">
<?php } ?>
</div>
</div>
<!--end::COVID Waiver Signature-->
</div>

<!--begin::Step 3 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" checked name="CovidAccepted" id="myCheck7470" value="Yes" onClick="myFunctiondivs(), myFunction7470()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the COVID-19 Waiver.</small></label>
</div>

<script>
myCheck7470.addEventListener('click', function(event){
	if(this.checked) {
  	CovidConsentName.setAttribute('required', 'required')
	sigdataUrl.setAttribute('required', 'required')
   }
});
</script>

<!--begin::Step 3 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" id="myCheck747" name="CovidAccepted" value="No" onclick="myFunctiondivs(), myFunction747(), Covidnotaccepted()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the COVID-19 Waiver.</small></label>
</div>

<script>
myCheck747.addEventListener('click', function(event){
	if(this.checked) {
  	CovidConsentName.removeAttribute('required');
	sigdataUrl.removeAttribute('required');
   }
});
</script>

<script>
function myFunctiondivs() {
  var checkBox = document.getElementById("myCheck747");
  var text = document.getElementById("bookingdivs");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }   
}
function myFunctiondivs() {
  var checkBox = document.getElementById("myCheck7470");
  var text = document.getElementById("bookingdivs");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }   
}
</script>


<script>
function myFunction747() {
  var checkBox = document.getElementById("myCheck747");
  var text = document.getElementById("text747");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
  var text = document.getElementById("text3667");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }  
}
</script>

<script>
function myFunction7470() {
  var checkBox = document.getElementById("myCheck7470");
  var text = document.getElementById("text747");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
  var text = document.getElementById("text3667");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }    
}
</script>

<script>
function Covidnotaccepted() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("CovidNoReason").focus();
}
</script>

<!--end::Step 3 - Do Not Agree Checkbox-->
<!--begin::COVID Waiver Reason-->
<div class="col-xl-12 mt-2" id="text747" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="CovidNoReason" id="CovidNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
</div>
</div>
<!--end::COVID Waiver Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->

<!--START OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->
<div id="bookingdivs">
<!--START OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->

<?php if (!empty($row["BookingNumber"]) || !empty($row["Supplier"]) || !empty($row["TripDetails"]) || !empty($row["TripDetailsPDF"])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">

<?php if ($row['TripAccepted'] =='Yes' && (!empty($row['TripDetailsPDF']) || !empty($row['TripDetails']))) { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } elseif ($row['TripAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } elseif ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2 || !empty($row['BookingTime5'])) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading4">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf4" aria-expanded="false" aria-controls="baf4" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Details</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf4" class="collapse" aria-labelledby="baf-heading4" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided.</p>
<div class="row mt-10">


<?php if ($row['CheckSupplier']=='Yes') { ?>
<!--begin::Supplier-->
<div class="col-xl-6">
<div class="form-group">
<label>Supplier</label>
<input type="text" name="Supplier" value="<?php echo $row['Supplier']; ?>" class="form-control form-control-lg bg-light" placeholder="Supplier" />
</div>
</div>
<!--end::Supplier-->

<!--begin::Booking Quote Number-->
<div class="col-xl-6">
<div class="form-group">
<label>Booking/Quote Number</label>
<input type="text" value="<?php echo $row['BookingNumber']; ?>" name="BookingNumber" class="form-control  form-control-lg bg-light" placeholder="Booking/Quote Number" />
</div>
</div>

<?php } ?>



<!--end::Booking Quote Number-->
<?php if (!empty( $row["TripDetails"] )) { ?>
<!--begin::Trip Details Text-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $row['TripDetails'] ?>
</div>
</div>
</div>
</div>
</div>
<!--end::Trip Details Text-->
<?php } ?>

<!--begin::Trip Details Document-->
<?php if (!empty( $row["TripDetailsPDF"] )) { ?>
<!--begin::SFA Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["TripDetailsPDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Trip Details</a>
</div>
<?php } ?>
<!--end::Trip Details Document-->

<?php
//if (!empty( $row["TripDetails"]) || !empty( $row["TripDetailsPDF"]))
//$TripAcceptedchecked='checked';

/*if ($row["TripAccepted"]=='No')
$TripAcceptedcheckedNo='checked';
else*/
$TripAcceptedchecked='checked';
?>

<!--begin::Step 4 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" <?php echo $TripAcceptedchecked ?> name="TripAccepted" id="myCheck766" value="Yes" onClick="myFunction767()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Details.</small></label>
</div>
<!--end::Step 4 - Agree Checkbox-->

<!--begin::Step 4 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" <?php echo $TripAcceptedcheckedNo ?> name="TripAccepted" id="myCheck767" value="No" onClick="myFunction767(), myFunctionReason2()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Details.</small></label>
</div>

<script>
function myFunction766() {
  var checkBox = document.getElementById("myCheck766");
  var text = document.getElementById("text767");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction767() {
  var checkBox = document.getElementById("myCheck767");
  var text = document.getElementById("text767");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<?php if (!empty( $row["TripDetails"]) || !empty( $row["TripDetailsPDF"])) { ?>
<script>
function myFunctionReason2() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("tripreason").focus();
}
</script>
<?php } ?>

<!--end::Step 4 - Do Not Agree Checkbox-->
<!--begin::Trip Details Reason-->
<?php 
//if (empty($row["TripNoReason"]))
$text767='none';
//else
//$text767='';
?>
<div class="col-xl-12 mt-2" id="text767" style="display:<?php echo $text767 ?>">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TripNoReason" id="tripreason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason">
<?php //echo $row["TripNoReason"] ?>
</textarea>
</div>
</div>
<!--end::Trip Details Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>


<?php 
if (($row['PricePerPerson1'] !='0.00') || !empty($row['NumberOfPersons1']) || !empty($row['PricingType1']))
{
	
//=============================================================Trips price options check==================

if ($row['pricing1'] > 0 && $row['TripPricingAccepted'] =='Yes')
{
$chproduct17='checked';
$TotalPersons1=$row['NumberOfPersons1'];
$ATotalPrice1=$row['TotalPrice1'];
$chproduct1='checked';
}

if ($row['pricing2'] > 0 && $row['TripPricingAccepted'] =='Yes')
{
$chproduct27='checked';
$TotalPersons2=$row['NumberOfPersons2'];
$ATotalPrice2=$row['TotalPrice2'];
$chproduct2='checked';
}

if ($row['pricing3'] > 0 && $row['TripPricingAccepted'] =='Yes')
{
$chproduct37='checked';
$TotalPersons3=$row['NumberOfPersons3'];
$ATotalPrice3=$row['TotalPrice3'];
$chproduct3='checked';
}

if ($row['pricing4'] > 0 && $row['TripPricingAccepted'] =='Yes')
{
$chproduct47='checked';
$TotalPersons4=$row['NumberOfPersons4'];
$ATotalPrice4=$row['TotalPrice4'];
$chproduct4='checked';
}

if ($row['pricing5'] > 0 && $row['TripPricingAccepted'] =='Yes')
{
$chproduct57='checked';
$TotalPersons5=$row['NumberOfPersons5'];
$ATotalPrice5=$row['TotalPrice5'];
$chproduct5='checked';
}	
	
$PricingOptionDisplay='';
if (!empty($row['FullPayment']) && !empty($row['FullPaymentDate']))
$PricingOptionDisplay='none';	


$TotalPersons=$TotalPersons1+$TotalPersons2+$TotalPersons3+$TotalPersons4+$TotalPersons5;
$TripGrandTotal=$ATotalPrice1+$ATotalPrice2+$ATotalPrice3+$ATotalPrice4+$ATotalPrice5;
$TripGrandTotal=$TripGrandTotal.'.00' ;
?>

	
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['TripPricingAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['TripPricingAccepted'] =='No' || $row['TripPricingAccepted'] =='') { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->


<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading5" onclick="pricingoptions(); this.onclick=null;">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf5" aria-expanded="true" aria-controls="baf5" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Pricing &amp; Payment Schedule</div>
</div>
</div>
<!--end::Header-->

<script>
function pricingoptions() {
  alert("Trip Pricing & Payment Schedule: At Least One Pricing Option Is Required To Be Selected.");
}
</script>

<!--begin::Body-->
<div id="baf5" class="collapse" aria-labelledby="baf-heading5" data-parent="">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bolder">Please review the details provided and select at least one pricing option. All items marked with a red asterisk<span class="text-danger"> *</span> that pertain to your pricing option selection(s) are required.</p>
<!--begin::Row-->

<?php 
if (($row['PricePerPerson1'] !='0.00') || !empty($row['NumberOfPersons1']) || !empty($row['PricingType1']))
$option1class='';	
else
$option1class='hidden';	
?>

<div class="row mt-10 <?php echo $option1class ?>">
<!--begin::Pricing Option 1 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="PricingType1" value="<?php echo $row['PricingType1'] ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 1 - Type-->
<!--begin::Pricing Option 1 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="NumberOfPersons1" value="<?php echo $row['NumberOfPersons1'] ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 1 - Persons-->
<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson1" value="<?php echo $row['PricePerPerson1'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice1" value="<?php echo $row['TotalPrice1'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->
<?php
if (!empty($row["PricingDescription1"])) { ?>
<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['PricingDescription1'] ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 1 - Description-->
<?php } ?>
<?php if (empty($row['FullPaymentDate'])) { ?> 
<!--begin::Pricing Option 1 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct17 ?> id="product17" value="<?php echo $row['PricePerPerson1'] ?>" type="checkbox" onclick="multiply(), totalIt7(),totalIt27(),subtrIt(),toggle17(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct17 ?>  name="pricing17" value="<?php echo $row['PricePerPerson1'] ?>" style="display:none">
<script>
function toggle17(source) {
checkboxes = document.getElementsByName('pricing17');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 1 - Checkbox 1-->
<?php } ?>
<!--begin::Pricing Option 1 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct1 ?> id="product1" value="<?php echo $row['TotalPrice1'] ?>" type="checkbox" onclick="toggle1(this), totalIt(),totalIt2(),fmultiply()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct1 ?>  name="pricing1" value="<?php echo $row['TotalPrice1'] ?>" style="display:none">
<script>
function toggle1(source) {
checkboxes = document.getElementsByName('pricing1');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 1 - Checkbox 2-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->



<?php 
if (($row['PricePerPerson2'] !='0.00') || !empty($row['NumberOfPersons2']) || !empty($row['PricingType2']))
$option2class='';	
else
$option2class='hidden';	
?>

<div class="row mt-10 <?php echo $option2class ?>">
<!--begin::Pricing Option 2 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="PricingType2" value="<?php echo $row['PricingType2'] ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 2 - Type-->
<!--begin::Pricing Option 2 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="NumberOfPersons2" value="<?php echo $row['NumberOfPersons2'] ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 2 - Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson2" value="<?php echo $row['PricePerPerson2'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice2" value="<?php echo $row['TotalPrice2'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<?php
if (!empty($row["PricingDescription2"])) { ?>
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['PricingDescription2'] ?></p>
</div>
</div>
</div>
</div>
</div> 
<!--end::Pricing Option 2 - Description-->
<?php } ?>
<?php if (empty($row['FullPaymentDate'])) { ?> 
<!--begin::Pricing Option 2 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct27 ?> id="product27" value="<?php echo $row['PricePerPerson2'] ?>" type="checkbox" onclick="multiply(), totalIt7(),totalIt27(),subtrIt(),toggle27(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct27 ?>  name="pricing27" value="<?php echo $row['PricePerPerson2'] ?>" style="display:none">
<script>
function toggle27(source) {
checkboxes = document.getElementsByName('pricing27');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 2 - Checkbox 1-->
<?php } ?>
<!--begin::Pricing Option 2 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct2 ?> id="product2" value="<?php echo $row['TotalPrice2'] ?>" type="checkbox" onclick="toggle2(this), totalIt(),totalIt2(),fmultiply()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct2 ?>  name="pricing2" value="<?php echo $row['TotalPrice2'] ?>" style="display:none">
<script>
function toggle2(source) {
checkboxes = document.getElementsByName('pricing2');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 2 - Checkbox 2-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->


<?php 
if (($row['PricePerPerson3'] !='0.00') || !empty($row['NumberOfPersons3']) || !empty($row['PricingType3']))
$option3class='';	
else
$option3class='hidden';	
?>

<div class="row mt-10 <?php echo $option3class ?>">
<!--begin::Pricing Option 3 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="PricingType3" value="<?php echo $row['PricingType3'] ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 3 - Type-->
<!--begin::Pricing Option 3 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="NumberOfPersons3" value="<?php echo $row['NumberOfPersons3'] ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 3 - Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson3" value="<?php echo $row['PricePerPerson3'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice3" value="<?php echo $row['TotalPrice3'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
<?php
if (!empty($row["PricingDescription3"])) { ?>
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['PricingDescription3'] ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 3 - Description-->
<?php } ?>
<?php if (empty($row['FullPaymentDate'])) { ?> 
<!--begin::Pricing Option 3 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct37 ?> id="product37" value="<?php echo $row['PricePerPerson3'] ?>" type="checkbox" onclick="multiply(), totalIt7(),totalIt27(),subtrIt(),toggle37(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct37 ?>  name="pricing37" value="<?php echo $row['PricePerPerson3'] ?>" style="display:none">
<script>
function toggle37(source) {
checkboxes = document.getElementsByName('pricing37');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 3 - Checkbox 1-->
<?php } ?>
<!--begin::Pricing Option 3 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct3 ?> id="product3" value="<?php echo $row['TotalPrice3'] ?>" type="checkbox" onclick="toggle3(this), totalIt(),totalIt2(),fmultiply()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct3 ?>  name="pricing3" value="<?php echo $row['TotalPrice3'] ?>" style="display:none">
<script>
function toggle3(source) {
checkboxes = document.getElementsByName('pricing3');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 3 - Checkbox 2-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->

<?php 
if (($row['PricePerPerson4'] !='0.00') || !empty($row['NumberOfPersons4']) || !empty($row['PricingType4']))
$option4class='';	
else
$option4class='hidden';	
?>

<div class="row mt-10 <?php echo $option4class ?>">
<!--begin::Pricing Option 4 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="PricingType4" value="<?php echo $row['PricingType4'] ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 4 - Type-->
<!--begin::Pricing Option 4 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="NumberOfPersons4" value="<?php echo $row['NumberOfPersons4'] ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 4 - Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson4" value="<?php echo $row['PricePerPerson4'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice4" value="<?php echo $row['TotalPrice4'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<?php
if (!empty($row["PricingDescription4"])) { ?>
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['PricingDescription4'] ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 4 - Description-->
<?php } ?>
<?php if (empty($row['FullPaymentDate'])) { ?> 
<!--begin::Pricing Option 4 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct47 ?> id="product47" value="<?php echo $row['PricePerPerson4'] ?>" type="checkbox" onclick="multiply(), totalIt7(),totalIt27(),subtrIt(),toggle47(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct47 ?> name="pricing47" value="<?php echo $row['PricePerPerson4'] ?>" style="display:none">
<script>
function toggle47(source) {
checkboxes = document.getElementsByName('pricing47');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 4 - Checkbox 1-->
<?php } ?>
<!--begin::Pricing Option 4 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct4 ?> id="product4" value="<?php echo $row['TotalPrice4'] ?>" type="checkbox" onclick="toggle4(this), totalIt(),totalIt2(),fmultiply()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox"<?php echo $chproduct4 ?> name="pricing4" value="<?php echo $row['TotalPrice4'] ?>" style="display:none">
<script>
function toggle4(source) {
checkboxes = document.getElementsByName('pricing4');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 4 - Checkbox 2-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->



<?php 
if (($row['PricePerPerson5'] !='0.00') || !empty($row['NumberOfPersons5']) || !empty($row['PricingType5']))
$option5class='';	
else
$option5class='hidden';	
?>

<div class="row mt-10 <?php echo $option5class ?>">
<!--begin::Pricing Option 5 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="PricingType5" value="<?php echo $row['PricingType5'] ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 5 - Type-->
<!--begin::Pricing Option 5 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="NumberOfPersons5" value="<?php echo $row['NumberOfPersons5'] ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 5 - Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson5" value="<?php echo $row['PricePerPerson5'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice5" value="<?php echo $row['TotalPrice5'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<?php
if (!empty($row["PricingDescription5"])) { ?>
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['PricingDescription5'] ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 5 - Description-->
<?php } ?>
<?php if (empty($row['FullPaymentDate'])) { ?> 
<!--begin::Pricing Option 5 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]"  <?php echo $chproduct57 ?> id="product57" value="<?php echo $row['PricePerPerson5'] ?>" type="checkbox" onclick="multiply(), totalIt7(),totalIt27(),subtrIt(),toggle57(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct57 ?> name="pricing57" value="<?php echo $row['PricePerPerson5'] ?>" style="display:none">
<script>
function toggle37(source) {
checkboxes = document.getElementsByName('pricing37');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>

</div>
<!--end::Pricing Option 5 - Checkbox 1-->
<?php } ?>
<!--begin::Pricing Option 5 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct5 ?> id="product5" value="<?php echo $row['TotalPrice5'] ?>" type="checkbox" onclick="toggle5(this), totalIt(),totalIt2(),fmultiply()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct5 ?> name="pricing5" value="<?php echo $row['TotalPrice5'] ?>" style="display:none">

<script>
function toggle5(source) {
checkboxes = document.getElementsByName('pricing5');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 5 - Checkbox 2-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->

<?php if (!empty($row['FullPaymentDate'])) { ?>
<!--begin::Row-->
<div class="row">
<div class="col-xl-12 mt-9">
<p class="font-weight-bolder mb-10">As per your selection(s), please review your payment schedule.</p>
</div>
<!--begin::Pricing Schedule - Full Payment-->
<div class="col-xl-3">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="FullPayment" value="<?php echo $row['FullPayment']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>

<!--end::Pricing Schedule - Full Payment-->
<!--begin::Pricing Schedule - Due Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text"  name="FullPaymentDate" value="<?php echo $row['FullPaymentDate']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule - Due Date-->
<!--begin::Pricing Schedule - Total Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">

<label>Total Number Of Persons</label>
<input type="text" id="gresultdiv0" name="gresultdiv0" value="<?php echo $TotalPersons ?>" class="form-control form-control-lg bg-light" placeholder="Total Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Schedule - Total Number Of Persons-->
<!--begin::Pricing Schedule - Total Amount-->
<div class="col-xl-3">
<div class="form-group">
<label>Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalAmountDue" id="TotalAmountDue" value="<?php echo $TripGrandTotal ?>" class="form-control form-control-lg bg-light-success" placeholder="Grand Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule - Total Amount-->
</div>
<!--end::Row-->
<?php } ?>

<!--JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--JAVASCRIPT FOR SCHEDUAL------------------------------->

<input type="hidden" value="<?php echo $row['NumberOfPersons1'] ?>" id="firstNum1" name="firstNum1">
<input type="hidden" value="<?php echo $row['NumberOfPersons2'] ?>" id="firstNum2" name="firstNum2">
<input type="hidden" value="<?php echo $row['NumberOfPersons3'] ?>" id="firstNum3" name="firstNum3">
<input type="hidden" value="<?php echo $row['NumberOfPersons4'] ?>" id="firstNum4" name="firstNum4">
<input type="hidden" value="<?php echo $row['NumberOfPersons5'] ?>" id="firstNum5" name="firstNum5">

<input type="hidden" value="<?php echo $row['PaymentDue1']; ?>" id="secondNum1" name="secondNum1">
<input type="hidden" value="<?php echo $row['PaymentDue2']; ?>" id="secondNum2" name="secondNum2">
<input type="hidden" value="<?php echo $row['PaymentDue3']; ?>" id="secondNum3" name="secondNum3">
<input type="hidden" value="<?php echo $row['PaymentDue4']; ?>" id="secondNum4" name="secondNum4">
<input type="hidden" value="<?php echo $row['PaymentDue5']; ?>" id="secondNum5" name="secondNum5">

<input type="hidden" value="<?php echo $row['PricePerPerson1']*$row['NumberOfPersons1']; ?>" id="ThirdNum1" name="ThirdNum1">
<input type="hidden" value="<?php echo $row['PricePerPerson2']*$row['NumberOfPersons2']; ?>" id="ThirdNum2" name="ThirdNum2">
<input type="hidden" value="<?php echo $row['PricePerPerson3']*$row['NumberOfPersons3']; ?>" id="ThirdNum3" name="ThirdNum3">
<input type="hidden" value="<?php echo $row['PricePerPerson4']*$row['NumberOfPersons4']; ?>" id="ThirdNum4" name="ThirdNum4">
<input type="hidden" value="<?php echo $row['PricePerPerson5']*$row['NumberOfPersons5']; ?>" id="ThirdNum5" name="ThirdNum5">

<script>
function fmultiply(){
	var lfckv10 = document.getElementById("product1").checked;
	var lfckv20 = document.getElementById("product2").checked;
	var lfckv30 = document.getElementById("product3").checked;	
	var lfckv40 = document.getElementById("product4").checked;
	var lfckv50 = document.getElementById("product5").checked;	
	
	num10 = document.getElementById("firstNum1").value;
	num20 = document.getElementById("firstNum2").value;
	num30 = document.getElementById("firstNum3").value;	
	num40 = document.getElementById("firstNum4").value;
	num50 = document.getElementById("firstNum5").value;
	
	if (lfckv10 == true) {	
	gresultdiv10=num10*1;		
	}
	if (lfckv10 == false) {	
	gresultdiv10 = 0;
	}
	
	if (lfckv20 == true) {	
	gresultdiv20=num20*1;		
	}
	if (lfckv20 == false) {	
	gresultdiv20 = 0;
	}
	
	if (lfckv30 == true) {	
	gresultdiv30=num30*1;		
	}
	if (lfckv30 == false) {	
	gresultdiv30 = 0;
	}
	
	if (lfckv40 == true) {	
	gresultdiv40=num40*1;		
	}
	if (lfckv40 == false) {	
	gresultdiv40 = 0;
	}
	
	if (lfckv50 == true) {	
	gresultdiv50=num50*1;		
	}
	if (lfckv50 == false) {	
	gresultdiv50 = 0;
	}				
	
	
	<?php if (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4']) && !empty($row['PricePerPerson5'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30+gresultdiv40+gresultdiv50;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30+gresultdiv40;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20;		
	<?php } elseif (!empty($row['PricePerPerson1'])) { ?>
	gresultdiv0=gresultdiv10;		
	<?php } ?>	


	document.getElementById("gresultdiv0").value = gresultdiv0; // Number of persons
	
}
</script>

<script>
function multiply(){
	var lfckv1 = document.getElementById("product17").checked;
	var lfckv2 = document.getElementById("product27").checked;
	var lfckv3 = document.getElementById("product37").checked;	
	var lfckv4 = document.getElementById("product47").checked;
	var lfckv5 = document.getElementById("product57").checked;				
	
	num1 = document.getElementById("firstNum1").value;
	num2 = document.getElementById("firstNum2").value;
	num3 = document.getElementById("firstNum3").value;	
	num4 = document.getElementById("firstNum4").value;
	num5 = document.getElementById("firstNum5").value;		
	
	snum1 = document.getElementById("secondNum1").value;
	snum2 = document.getElementById("secondNum2").value;
	snum3 = document.getElementById("secondNum3").value;
	snum4 = document.getElementById("secondNum4").value;
	snum5 = document.getElementById("secondNum5").value;
	
	tsnum1 = document.getElementById("ThirdNum1").value;
	tsnum2 = document.getElementById("ThirdNum2").value;
	tsnum3 = document.getElementById("ThirdNum3").value;
	tsnum4 = document.getElementById("ThirdNum4").value;
	tsnum5 = document.getElementById("ThirdNum5").value;				
	
	if (lfckv1 == true) {
	result11 = num1 * snum1;
	result12 =  num1 * snum2;	
	result13 =  num1 * snum3;	
	result14 =  num1 * snum4;	
	result15 =  num1 * snum5;	
	gresultdiv1=num1*1;	
	gresultba1=tsnum1*1;	
	}
	if (lfckv1 == false) {
	result11 = 0;
	result12 = 0;	
	result13 = 0;	
	result14 = 0;	
	result15 = 0;	
	gresultdiv1 = 0;
	gresultba1 = 0;
	}
	
	if (lfckv2 == true) {	
	result21 =  num2 * snum1;			
	result22 =  num2 * snum2;	
	result23 =  num2 * snum3;	
	result24 =  num2 * snum4;	
	result25 =  num2 * snum5;
	gresultdiv2=num2*1;
	gresultba2=tsnum2*1;			
	}
	if (lfckv2 == false) {	
	result21 = 0;			
	result22 = 0;	
	result23 = 0;	
	result24 = 0;	
	result25 = 0;		
	gresultdiv2 = 0;
	gresultba2 = 0;			
	}	
	
	if (lfckv3 == true) {
	result31 =  num3 * snum1;			
	result32 =  num3 * snum2;	
	result33 =  num3 * snum3;	
	result34 =  num3 * snum4;	
	result35 =  num3 * snum5;
	gresultdiv3=num3*1;	
	gresultba3=tsnum3*1;			
	}
	if (lfckv3 == false) {	
	result31 = 0;			
	result32 = 0;	
	result33 = 0;	
	result34 = 0;	
	result35 = 0;	
	gresultdiv3 = 0;
	gresultba3 = 0;			
	}
	
	if (lfckv4 == true) {
	result41 =  num4 * snum1;			
	result42 =  num4 * snum2;	
	result43 =  num4 * snum3;	
	result44 =  num4 * snum4;	
	result45 =  num4 * snum5;
	gresultdiv4=num4*1;	
	gresultba4=tsnum4*1;			
	}
	if (lfckv4 == false) {	
	result41 = 0;			
	result42 = 0;	
	result43 = 0;	
	result44 = 0;	
	result45 = 0;
	gresultdiv4 = 0;	
	gresultba4 = 0;			
	}
	
	if (lfckv5 == true) {
	result51 =  num5 * snum1;			
	result52 =  num5 * snum2;	
	result53 =  num5 * snum3;	
	result54 =  num5 * snum4;	
	result55 =  num5 * snum5;	
	gresultdiv5=num5*1;
	gresultba5=tsnum5*1;			
	}
	if (lfckv5 == false) {	
	result51 = 0;			
	result52 = 0;	
	result53 = 0;	
	result54 = 0;	
	result55 = 0;
	gresultdiv5 = 0;
	gresultba5 = 0;				
	}			
	
	result1=result11+result21+result31+result41+result51;
	result2=result12+result22+result32+result42+result52;
	result3=result13+result23+result33+result43+result53;
	result4=result14+result24+result34+result44+result54;
	result5=result15+result25+result35+result45+result55;
	
	<?php if (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4']) && !empty($row['PricePerPerson5'])) { ?>
	gresult = result1+result2+result3+result4+result5;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3+gresultdiv4+gresultdiv5;
	gresultba=gresultba1+gresultba2+gresultba3+gresultba4+gresultba5;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4'])) { ?>
	gresult = result1+result2+result3+result4;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3+gresultdiv4;
	gresultba=gresultba1+gresultba2+gresultba3+gresultba4;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3'])) { ?>
	gresult = result1+result2+result3;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3;
	gresultba=gresultba1+gresultba2+gresultba3;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2'])) { ?>
	gresult = result1+result2;
	gresultdiv=gresultdiv1+gresultdiv2;
	gresultba=gresultba1+gresultba2;		
	<?php } elseif (!empty($row['PricePerPerson1'])) { ?>
	gresult = result1;
	gresultdiv=gresultdiv1;
	gresultba=gresultba1;		
	<?php } ?>

	
	document.getElementById("gresult").value = gresult.toFixed(2);
	
	document.getElementById("gresultdiv").value = gresultdiv; // Number of persons
	document.getElementById("gresultba").value = gresultba.toFixed(2);// Grand total
	
	/*Total Balanace*/
	bgresultba=gresultba-gresult;
	/*Balanace per person*/
	averperperson= bgresultba/gresultdiv; 
	
	document.getElementById("bgresultba").value = bgresultba.toFixed(2);// Total Balanace
	document.getElementById("averperperson").value = averperperson.toFixed(2);// Balanace per person
	
	document.getElementById("result1").value = result1.toFixed(2);
	document.getElementById("result2").value = result2.toFixed(2);
	document.getElementById("result3").value = result3.toFixed(2);
	document.getElementById("result4").value = result4.toFixed(2);
	document.getElementById("result5").value = result5.toFixed(2);
	

		
}
</script>

<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->


<?php if (($row['PaymentDue1'] !=0.00)) { ?>
<!--begin::Row-->
<div class="row">
<div class="col-xl-12 mt-9">
<input type="hidden" readonly id="gresult" name="gresult" value="0.00"/>
<input type="hidden" readonly id="averperperson" style="color:#C00" name="averperperson" value="0.00"/>
<input type="hidden" readonly id="gresultdiv" name="gresultdiv" value="0" style="color:#C00"/>
<input type="hidden" readonly id="gresultba" name="gresultba" value="0.00" style="color:#C00"/>
<p class="lead font-weight-bolder mb-10">As per your selection(s), please review your payment schedule.</p>
</div>
<!--begin::Pricing Schedule 1 - Payment Type-->
<div class="col-xl-3">
<div class="form-group">

<label>Payment Type</label>
<input type="text" name="PaymentType1" value="<?php echo $row['PaymentType1']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Payment Type-->
<!--begin::Pricing Schedule 1 - Due Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate1" value="<?php echo $row['PaymentDate1']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Due Date-->
<!--begin::Pricing Schedule 1 - Amount PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue1" id="PaymentDue1" value="<?php echo $row['PaymentDue1']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 1 - Amount PP-->
<!--begin::Pricing Schedule 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result1" name="result1" value="0.00" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 1 - Total-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (($row['PaymentDue2'] !=0.00)) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 2 - Payment Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType2" value="<?php echo $row['PaymentType2']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Payment Type-->
<!--begin::Pricing Schedule 2 - Due Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate2" value="<?php echo $row['PaymentDate2']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Due Date-->
<!--begin::Pricing Schedule 2 - Amount PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue2" id="PaymentDue2" value="<?php echo $row['PaymentDue2']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 2 - Amount PP-->
<!--begin::Pricing Schedule 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result2" name="result2" value="0.00" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 2 - Total-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (($row['PaymentDue3'] !=0.00)) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 3 - Payment Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType3" value="<?php echo $row['PaymentType3']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Payment Type-->
<!--begin::Pricing Schedule 3 - Due Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate3" value="<?php echo $row['PaymentDate3']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Due Date-->
<!--begin::Pricing Schedule 3 - Amount PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue3" id="PaymentDue3" value="<?php echo $row['PaymentDue3']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 3 - Amount PP-->
<!--begin::Pricing Schedule 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result3" name="result3" value="0.00" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 3 - Total-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (($row['PaymentDue4'] !=0.00)) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 4 - Payment Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType4" value="<?php echo $row['PaymentType4']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Payment Type-->
<!--begin::Pricing Schedule 4 - Due Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate4" value="<?php echo $row['PaymentDate4']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Due Date-->
<!--begin::Pricing Schedule 4 - Amount PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue4" id="PaymentDue4" value="<?php echo $row['PaymentDue4']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 4 - Amount PP-->
<!--begin::Pricing Schedule 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result4" name="result4" value="0.00" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 4 - Total-->
</div>
<!--end::Row-->
<?php } ?>

<!--begin::Row-->
<div class="row">

<script>
function subtrIt() {
var y = document.getElementById("total7").value;
<?php if ($row['PaymentDue1'] !=0.00) { ?>
var a = document.getElementById("PaymentDue1").value;
<?php } if ($row['PaymentDue2'] !=0.00) { ?>
var b = document.getElementById("PaymentDue2").value;
<?php } if ($row['PaymentDue3'] !=0.00) { ?>
var c = document.getElementById("PaymentDue3").value;
<?php } if ($row['PaymentDue4'] !=0.00) { ?>
var d = document.getElementById("PaymentDue4").value;
<?php }  ?>
var x = Number(y) 
<?php if ($row['PaymentDue1'] !=0.00) { ?>
- Number(a) 
<?php } if ($row['PaymentDue2'] !=0.00) { ?>
- Number(b)
<?php } if ($row['PaymentDue3'] !=0.00) { ?>
- Number(c)
<?php } if ($row['PaymentDue4'] !=0.00) { ?>
- Number(d)
<?php }  ?>
;
document.getElementById("PaymentDue5").value = x.toFixed(2);
}
</script>

<input value="0.00" name="total7" id="total7" onChange="totalIt7()" readonly style="display:none" >

<?php if (!empty($row['PaymentDate5'])) { ?>

<!--begin::Pricing Schedule 5 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType5" value="Final Payment" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 5 - Payment Type-->
<!--begin::Pricing Schedule 5 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate5" value="<?php echo $row['PaymentDate5']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 5 - Due Date-->
<!--begin::Pricing Schedule 5 - Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Total Balance (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input class="form-control form-control-lg bg-light-success" type="text" id="bgresultba" name="bgresultba" value="0.00" placeholder="Total Balance" readonly/>
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 5 - Total-->
<?php } ?>
</div>
<!--end::Row-->
<?php
if (($row['PricePerPerson1'] !='0.00') && !empty($row['NumberOfPersons1']))
$TripPricingchecked='checked';
?>
<!--begin::Row-->
<div class="row">
<!--begin::Step 5 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" <?php echo $TripPricingchecked ?> id="myCheck226" name="TripPricingAccepted" value="Yes" onClick="myFunction226()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Pricing &amp; Payment Schedule.</small></label>
</div>
<!--end::Step 5 - Agree Checkbox-->
<!--begin::Step 5 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" id="myCheck227" name="TripPricingAccepted" value="No" onClick="myFunction227(), myFunctionReason3()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Pricing &amp; Payment Schedule.</small></label>
</div>
<!--end::Step 5 - Do Not Agree Checkbox-->
<script>
function myFunction226() {
  var checkBox = document.getElementById("myCheck226");
  var text = document.getElementById("text227");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction227() {
  var checkBox = document.getElementById("myCheck227");
  var text = document.getElementById("text227");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<?php if (($row['PricePerPerson1'] !='0.00') && !empty($row['NumberOfPersons1'])) { ?>
<script>
function myFunctionReason3() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("pricingreason").focus();
}
</script>
<?php } ?>

<!--begin::Trip Pricing Reason-->
<div class="col-xl-12 mt-2" id="text227" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TripPricingNoReason" id="pricingreason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
</div>
</div>
<!--end::Trip Pricing Reason-->
</div>
<!--end::Row-->


</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>



<?php if (!empty($row["TermsType"])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if (empty($row['TermAccepted']) && ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2 || $row['BookingStatus'] ==3 || $row['BookingStatus'] ==4)) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['TermAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['TermAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading6">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf6" aria-expanded="false" aria-controls="baf6" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Terms & Conditions</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf6" class="collapse" aria-labelledby="baf-heading6" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided.</p>
<div class="row mt-10">
<!--begin::T&C Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<?php
if ($row["TermsType"]=='Custom Terms and Conditions')
echo $row["TermsAndConditions"];

if ($row["TermsType"] !='Custom Terms and Conditions' || empty($row["TermsAndConditions"]))
{	
?>
<p>Centre Holidays' terms and conditions apply to all trips. They are a binding agreement between the travel advisor, traveller and Centre Holidays Inc.</p>
<?php
}
?>
</div>
</div>
</div>
</div>
<!--end::T&C Text-->



<?php

//echo $row["TermsType"];

if ($row["TermsType"]=='Custom Terms and Conditions')
{

    if(isset($row["TermsAndConditionsPDF"]) && !empty($row["TermsAndConditionsPDF"])){

?>
<!--begin::Travel Advisor T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["TermsAndConditionsPDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Trip Terms & Conditions</a>
</div>
<!--end::Travel Advisor T&C-->
<?php
    }
}

if ($row["TermsType"] !='Custom Terms and Conditions')
{


if(isset($row["TermsType"]) && !empty($row["TermsType"])){
?>
<!--begin::CH T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["TermsType"] ?>.pdf" title="<?php echo $row["TermsType"] ?> Terms And Conditions - Centre Holidays" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Trip Terms & Conditions</a>
</div>
<!--end::CH T&C-->
<?php
}
}
?>

<!--begin::Step 6 - Agree Checkbox-->

<?php
//if (!empty($row["TermsAndConditions"]) || !empty($row["TermsAndConditionsPDF"]))
//$TripTermschecked='checked';

//if ($row['TermAccepted']=='No')
//$TripTermscheckedNo='checked';
//else
$TripTermschecked='checked';
?>

<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" <?php echo $TripTermschecked ?> name="TermAccepted" value="Yes" id="myCheck776" onClick="myFunction776()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Terms & Conditions.</small></label>
</div>
<!--end::Step 6 - Agree Checkbox-->
<!--begin::Step 6 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" <?php echo $TripTermscheckedNo ?> name="TermAccepted" value="No" id="myCheck777" onClick="myFunction777(), myFunctionReason45()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Terms & Conditions.</small></label>
</div>

<script>
function myFunctionReason45() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("TermNoReason").focus();
}
</script>

<script>
function myFunction776() {
  var checkBox = document.getElementById("myCheck776");
  var text = document.getElementById("text777");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction777() {
  var checkBox = document.getElementById("myCheck777");
  var text = document.getElementById("text777");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
<!--end::Step 6 - Do Not Agree Checkbox-->

<?php if (!empty($row["TermsAndConditions"]) || !empty($row["TermsAndConditionsPDF"])) { ?>

<?php } ?>

<!--begin::T&C Reason-->
<?php 
//if (empty($row["TermNoReason"]))
$text777='none';
//else
//$text777='';
?>
<div class="col-xl-12 mt-2" id="text777" style="display:<?php echo $text777 ?>">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TermNoReason" id="TermNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason">
<?php echo $row['TermNoReason']; ?>
</textarea>
</div>
</div>
<!--end::T&C Reason-->
</div>


</div>
</div>
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($row["CancellationPolicy"]) || !empty($row["CancellationPolicyPDF"])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">

<?php if (empty($row['CancelAccepted']) && ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2 || $row['BookingStatus'] ==3 || $row['BookingStatus'] ==4)) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['CancelAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['CancelAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading7">
<div onClick="covid1999(); this.onclick=null;" class="card-title collapsed" data-toggle="collapse" data-target="#baf7" aria-expanded="false" aria-controls="baf7" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Cancellation Policy</div>
</div>
</div>
<!--end::Header-->

<!--<script>
function covid1999() {
  alert("Trip Cancellation Policy. Please make sure to read the cancellation policy and select to either agree or not.");
  document.getElementById("CovidConsentName").focus();
}
</script>-->

<!--begin::Body-->
<div id="baf7" class="collapse" aria-labelledby="baf-heading7" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided.</p>
<div class="row mt-10">

<?php
if (!empty($row["CancellationPolicy"])) { ?>
<!--begin::Cancellation Policy Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $row['CancellationPolicy']; ?>
</div>
</div>
</div>
</div>
<!--end::Cancellation Policy Text-->
<?php } ?>

<!--begin::Cancellation Policy Document-->
<?php
if (!empty($row["CancellationPolicyPDF"])) { ?>
<!--begin::CH T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["CancellationPolicyPDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Cancellation Policy</a>
</div>
<!--end::CH T&C-->
<?php } ?>
<!--end::Cancellation Policy Document-->


<!--begin::Step 7 - Agree Checkbox-->
<?php 
//if (!empty($row["CancellationPolicy"]) || !empty($row["CancellationPolicyPDF"]))
//$CancelAcceptedchecked='checked';

if ($row['CancelAccepted']=='No')
$CancelAcceptedcheckedNo='checked';
else
$CancelAcceptedchecked='checked';
?>
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" <?php echo $CancelAcceptedchecked ?> name="CancelAccepted" id="myCheck976" onClick="myFunction976()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Cancellation Policy.</small></label>
</div>
<!--end::Step 7 - Agree Checkbox-->
<!--begin::Step 7 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="CancelAccepted" <?php echo $CancelAcceptedcheckedNo ?> id="myCheck977" onClick="myFunction977(), myFunctionReason5()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Cancellation Policy.</small></label>
</div>
<!--end::Step 7 - Do Not Agree Checkbox-->

<script>
function myFunction976() {
  var checkBox = document.getElementById("myCheck976");
  var text = document.getElementById("text977");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction977() {
  var checkBox = document.getElementById("myCheck977");
  var text = document.getElementById("text977");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<?php if (!empty($row["CancellationPolicy"]) || !empty($row["CancellationPolicyPDF"])) { ?>
<script>
function myFunctionReason5() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("CancelNoReason").focus();
}
</script>
<?php } ?>

<!--begin::Cancellation Policy Reason-->
<?php 
//if (empty($row["CancelNoReason"]))
$text977='none';
//else
//$text977='';
?>
<div class="col-xl-12 mt-2" id="text977" style="display:<?php echo $text977 ?>">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="CancelNoReason" id="CancelNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason">
<?php //echo $row["CancelNoReason"] ?>
</textarea>
</div>
</div>
<!--end::Cancellation Policy Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>		
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['InsuranceAccepted'] =='Yes' || $row['PurchaseInsurance']=='No') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } if (($row['PurchaseInsurance']=='Yes' || $row['PurchaseInsurance']=='') && ($row['InsuranceAccepted'] =='No' || $row['InsuranceAccepted'] =='')) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading8" onClick="insuranceoptions(); this.onclick=null;">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf8" aria-expanded="true" aria-controls="baf8" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Travel Insurance</div>
</div>
</div>
<!--end::Header-->

<script>
function insuranceoptions() {
  alert("Travel Insurance: Please Fill In All The Required Fields. If Requested For, At Least One Pricing Option Will Be Required To Be Selected.");
}
</script>

<!--begin::Body-->
<div id="baf8" class="collapse" aria-labelledby="baf-heading8" data-parent="">
<div class="lead card-body pb-0 pt-3">
<p class="font-weight-bolder">Please review the details provided and select at least one pricing option. All items marked with a red asterisk<span class="text-danger"> *</span> that pertain to your pricing option selection(s) are required.</p>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Travel Insurance Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p>Purchasing travel insurance is highly recommended. You are covering yourself against unexpected and unforseen travel risks that occur both in your country/province of residence and in destination (including our of country and out of province trips), as outlined by the policy puchased such as; Cancellation (should you not be able to travel due to unexpected and unforseen covered reasons); Interruption (should your trip be interrupted due to unexpected and unforseen covered reasons); Baggage (lost, delayed or stolen) and Unexpected Medical Emergency costs abroad; along with protecting the financial investment you have made.
<br>
<br>
Without the benefits, as outlined in the insurance policy purchased, you can easily be out of pocket over thousands of dollars in additional expenses.
<br>
<br>
It is important to keep in mind:</p>
<ul>
<li>Provincial Health Insurance Plans cover none or minimal out of province and country emergency medical expenses. Please consult your Provincial Health Insurance Plan for further details.</li>
<li>Credit Card and Employer Group Benefits may provide limited and restrictive coverage.</li>
<li>Unforeseen and Unexpected Global Events that cause a cancellation and/or an interruption of travel plans may not result in a refund of monies paid for travel and appropriate travel insurance coverage is important in these areas.</li>
<li>Your policy's coverage is effective on the date of purchase of your travel start date, depending on the coverage.</li>
</ul>
</div>
</div>
</div>
</div>
<!--end::Travel Insurance Text-->
</div>
<!--end::Row-->

<?php
if ($row['insurance1'] > 0 && $row['InsuranceAccepted'] =='Yes')
{
$chinsurance1='checked';
}

if ($row['insurance2'] > 0 && $row['InsuranceAccepted'] =='Yes')
{
$chinsurance2='checked';
}

if ($row['insurance3'] > 0 && $row['InsuranceAccepted'] =='Yes')
{
$chinsurance3='checked';
}

if ($row['insurance4'] > 0 && $row['InsuranceAccepted'] =='Yes')
{
$chinsurance4='checked';
}

if ($row['insurance5'] > 0 && $row['InsuranceAccepted'] =='Yes')
{
$chinsurance5='checked';
}

?>

<!--begin::Row-->
<div class="row">

<?php if (!empty($row['InsuranceProvider'])) { ?>
<!--begin::Travel Insurance Provider-->
<div class="col-xl-12">
<div class="form-group">
<label>Travel Insurance Provider</label>
<input type="text" name="InsuranceProvider" value="<?php echo $row['InsuranceProvider']; ?>" class="form-control form-control-lg bg-light" placeholder="Travel Insurance Provider" readonly />
</div>
</div>
<!--end::Travel Insurance Provider-->
<?php } ?>

</div>
<!--begin::Separator-->
<div class="separator separator-dashed mt-3 mb-9 separator-border-3"></div>
<!--end::Separator-->
<!--end::Row-->
<?php if (!empty( $row['InsurancePersonType1'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 1 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="InsurancePersonType1" value="<?php echo $row['InsurancePersonType1']; ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 1 - Type-->
<!--begin::Pricing Option 1 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="InsuranceNumberPersons1" value="<?php echo $row['InsuranceNumberPersons1']; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 1 - Persons-->

<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsurancePricePerPerson1" value="<?php echo $row['InsurancePricePerPerson1']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice1" value="<?php echo $row['InsuranceTotalPrice1']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->
<?php
if (!empty($row["InsuranceDescription1"])) { ?>
<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['InsuranceDescription1']; ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 1 - Description-->
<?php } ?>
<!--begin::Pricing Option 1 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $chinsurance1 ?> name="product77[]" value="<?php echo $row['InsuranceTotalPrice1']; ?>"onclick="totalIt77(),toggle11(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chinsurance1 ?> name="insurance1" value="<?php echo $row['InsuranceTotalPrice1'] ?>" style="display:none">
<script>
function toggle11(source) {
checkboxes = document.getElementsByName('insurance1');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 1 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>

<?php if (!empty( $row['InsurancePersonType2'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 2 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="InsurancePersonType2" value="<?php echo $row['InsurancePersonType2']; ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 2 - Type-->
<!--begin::Pricing Option 2 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="InsuranceNumberPersons2" value="<?php echo $row['InsuranceNumberPersons2']; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 2 - Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsurancePricePerPerson2" value="<?php echo $row['InsurancePricePerPerson2']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice2" value="<?php echo $row['InsuranceTotalPrice2']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<?php
if (!empty($row["InsuranceDescription2"])) { ?>
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['InsuranceDescription2']; ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 2 - Description-->
<?php } ?>
<!--begin::Pricing Option 2 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $chinsurance2 ?> name="product77[]" value="<?php echo $row['InsuranceTotalPrice2']; ?>"onclick="totalIt77(),toggle12(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chinsurance2 ?> name="insurance2" value="<?php echo $row['InsuranceTotalPrice2'] ?>" style="display:none">
<script>
function toggle12(source) {
checkboxes = document.getElementsByName('insurance2');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 2 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>


<?php if (!empty( $row['InsurancePersonType3'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 3 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="InsurancePersonType3" value="<?php echo $row['InsurancePersonType3']; ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 3 - Type-->
<!--begin::Pricing Option 3 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="InsuranceNumberPersons3" value="<?php echo $row['InsuranceNumberPersons3']; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 3 - Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsurancePricePerPerson3" value="<?php echo $row['InsurancePricePerPerson3']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice3" value="<?php echo $row['InsuranceTotalPrice3']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
<?php
if (!empty($row["InsuranceDescription3"])) { ?>
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['InsuranceDescription3']; ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 3 - Description-->
<?php } ?>
<!--begin::Pricing Option 3 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $chinsurance3 ?> name="product77[]" value="<?php echo $row['InsuranceTotalPrice3']; ?>"onclick="totalIt77(),toggle13(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chinsurance3 ?> name="insurance3" value="<?php echo $row['InsuranceTotalPrice3'] ?>" style="display:none">
<script>
function toggle13(source) {
checkboxes = document.getElementsByName('insurance3');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 3 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>
<?php if (!empty( $row['InsurancePersonType4'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 4 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="InsurancePersonType4" value="<?php echo $row['InsurancePersonType4']; ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 4 - Type-->
<!--begin::Pricing Option 4 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="InsuranceNumberPersons4" value="<?php echo $row['InsuranceNumberPersons4']; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 4 - Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsurancePricePerPerson4" value="<?php echo $row['InsurancePricePerPerson4']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice4" value="<?php echo $row['InsuranceTotalPrice4']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<?php
if (!empty($row["InsuranceDescription4"])) { ?>
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['InsuranceDescription4']; ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 4 - Description-->
<?php } ?>
<!--begin::Pricing Option 4 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $chinsurance4 ?> name="product77[]" value="<?php echo $row['InsuranceTotalPrice4']; ?>"onclick="totalIt77(),toggle14(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chinsurance4 ?> name="insurance4" value="<?php echo $row['InsuranceTotalPrice4'] ?>" style="display:none">
<script>
function toggle14(source) {
checkboxes = document.getElementsByName('insurance4');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 4 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>
<?php if (!empty( $row['InsurancePersonType5'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 5 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<input type="text" name="InsurancePersonType5" value="<?php echo $row['InsurancePersonType5']; ?>" class="form-control form-control-lg bg-light" placeholder="Type Of Person" readonly />
</div>
</div>
<!--end::Pricing Option 5 - Type-->
<!--begin::Pricing Option 5 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="InsuranceNumberPersons5" value="<?php echo $row['InsuranceNumberPersons5']; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Option 5 - Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsurancePricePerPerson5" value="<?php echo $row['InsurancePricePerPerson5']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice5" value="<?php echo $row['InsuranceTotalPrice5']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<?php
if (!empty($row["InsuranceDescription5"])) { ?>
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p><?php echo $row['InsuranceDescription5']; ?></p>
</div>
</div>
</div>
</div>
</div>
<!--end::Pricing Option 5 - Description-->
<?php } ?>
<!--begin::Pricing Option 5 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $chinsurance5 ?> name="product77[]" value="<?php echo $row['InsuranceTotalPrice5']; ?>"onclick="totalIt77(),toggle15(this)" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chinsurance5 ?> name="insurance5" value="<?php echo $row['InsuranceTotalPrice5'] ?>" style="display:none">
<script>
function toggle15(source) {
checkboxes = document.getElementsByName('insurance5');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 5 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>

<?php if (!empty($row['InsurancePricePerPerson1']) || !empty( $row['InsurancePricePerPerson2']) || !empty( $row['InsurancePricePerPerson3']) || !empty( $row['InsurancePricePerPerson5']) || !empty( $row['InsurancePricePerPerson5'])) { ?>
<div class="row">

<?php if (!empty($row['InsurancePDF'])) { ?>
<!--begin::Insurance Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row['InsurancePDF']; ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Travel Insurance Document</a>
</div>
<!--end::Insurance Document-->
<?php } ?>


<?php if (!empty($row['InsuranceProvider'])) { ?>
<!--begin::Step 8 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<?php 
if ($row['InsuranceAccepted']=='Yes')
$InsuranceAcceptedYes='checked';
else
$InsuranceAcceptedYes='';
?>
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input <?php echo $InsuranceAcceptedYes ?> type="radio" checked onClick="myFunction444(), insuranceagreed(), uncheckoptions1()" id="myCheck444" name="InsuranceAccepted" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Travel Insurance details.</small></label>
</div>

<script>
function uncheckoptions1() {
  document.getElementById("myCheck446").checked = false;
}
</script>

<script>
function insuranceagreed() {
  document.getElementById("InsuranceWeaverConsent").checked = false;
}
</script>

<!--end::Step 8 - Agree Checkbox-->


<!--begin::Step 8 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">

<?php 
if ($row['InsuranceAccepted']=='No')
$InsuranceAcceptedNo='checked';
else
$InsuranceAcceptedNo='';
?>
<input type="radio" <?php echo $InsuranceAcceptedNo ?> name="InsuranceAccepted" id="myCheck445" onClick="uncheckoptions2(), myFunction445(), thereason()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Travel Insurance details.</small></label>
</div>

<script>
function thereason() {
  alert("Please Provide A Reason. The Field Cannot Be Left Blank.");
  document.getElementById("InsuranceNoReason").focus();
  document.getElementById("InsuranceWeaverConsent").checked = false;
}
</script>

<script>
function uncheckoptions2() {
  document.getElementById("myCheck446").checked = false;
}
</script>

<!--end::Step 8 - Do Not Agree Checkbox-->
<!--begin::Step 8 - Do Not Purchase Checkbox-->
<div class="col-xl-12 mt-3 mb-5">

<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" <?php echo $NoPurchaseInsurance ?> name="PurchaseInsurance" id="myCheck446" onClick="uncheckoptions3(), myFunction446(), weaver()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not wish to purchase Travel Insurance.</small></label>
</div>


<script>
function uncheckoptions3() {
  document.getElementById("myCheck445").checked = false;
  document.getElementById("myCheck444").checked = false;
}
</script>

<script>
function weaver() {
  alert("Travel Insurance Waiver: Please Fill In Your Full Name And Sign The Waiver.");
  document.getElementById("InsuranceWeaverConsentName").focus();
  document.getElementById("InsuranceWeaverConsent").checked = true;
  /*document.getElementById("InsuranceWeaverConsentName").style.backgroundColor = "lightyellow";
  document.getElementById("sig-canvas1").style.backgroundColor = "lightyellow";*/
}
</script>

<!--end::Step 8 - Do Not Purchase Checkbox-->
<?php } ?>
<script>
function myFunction444() {
  var checkBox = document.getElementById("myCheck444");
  var text = document.getElementById("box445");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
  var text = document.getElementById("box446");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }  
}
</script>

<script>
function myFunction445() {
  var checkBox = document.getElementById("myCheck445");
  var text = document.getElementById("box445");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
  var text = document.getElementById("box446");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }   
}
</script>

<script>
function myFunction446() {
  var checkBox = document.getElementById("myCheck446");
  var text = document.getElementById("box446");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
  var text = document.getElementById("box445");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }
}
</script>

<!--begin::Travel Insurance Reason-->
<div class="col-xl-12 mt-2" id="box445" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="InsuranceNoReason" id="InsuranceNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"><?php echo $row['InsuranceNoReason'] ?></textarea>
</div>
</div>
<!--end::Travel Insurance Reason-->
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="row">
<!--begin::Purchase Travel Insurance-->
<?php if (empty($row['InsuranceProvider'])) { ?>
<div class="col-xl-12">
<label>Would You Like To Purchase Travel Insurance? <span class="text-danger">*</span></small></label>
</div>
<!--begin::Step 8 - Send Insurance Quote-->
<div class="col-xl-12">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" <?php echo $YesPurchaseInsurance ?> onClick="myFunction4447()" id="myCheck4447" name="PurchaseInsurance" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Yes, Please Send Me A Quote.</small></label>
</div>
<!--end::Step 8 - Send Insurance Quote-->
<!--end::Step 8 - Do Not Purchase Insurance-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" <?php echo $NoPurchaseInsurance ?> name="PurchaseInsurance" id="myCheck4447" onClick="myFunction4447()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">No, I Do Not Wish To Purchase Travel Insurance.</small></label>
</div>
<!--end::Step 8 - Do Not Purchase Insurance-->
<script>
function myFunction4447() {
  document.getElementById("InsuranceWeaverConsent").checked = true;
  var checkBox = document.getElementById("myCheck4447");
  var text = document.getElementById("box446");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
  var text = document.getElementById("box446");
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
     text.style.display = "block";
  }   
}
</script>
<?php } ?>
<!--end::Purchase Travel Insurance-->
<!--begin::Travel Insurance Waiver-->
<div id="box446" style="display:<?php echo $box446 ?>">
<div class="form-group">
<div class="col-xl-12 mt-2">
<label>Travel Insurance Waiver</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>I decline to purchase travel insurance eventhough my travel advisor has offered and explained it to me.<br>
<br>
I, the undersigned, will not hold my travel advisor or the travel agency, responsible for any expenses incurred from any sources as a result of:</p>
<ul>
<li>My refusal to purchase travel insurance for the full value and duration of the trip.</li>
<li>Credit card insurance coverage:</li>
<ol>
<li>Restricted benefits, conditions an/or exclusions related to my credit card insurance, or</li>
<li>Insufficient protection offered by my credit card insurance, or</li>
<li>Non-existing coverage of my credit card insurance.</li>
</ol>
<li>Private or public health care coverage.</li>
<li>Any additional single supplement costs if my travelling companion is unable to travel and I still choose to travel.</li>
<li>Other additional costs if insurance is not purchased at the time of initial trip deposit; such as:</li>
<ol>
<li>Change in medical condition.</li>
<li>Increased supplier penalties.</li>
</ol>
<li>The unforeseen financial default or bankruptcy of the tour operator, cruise line or airline carrier from which I have purchased my travel arrangements.</li>
<li>A force majure event that causes a cancellation or disruption to my travel plans which may not result in a full refund of my non-refundable trip costs.</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!--end::Travel Insurance Waiver-->
<!--begin::Step 8 - Insurance Waiver Checkbox-->
<div class="col-xl-12 mt-3 mb-7">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $InsuranceWeaverConsent ?> name="InsuranceWeaverConsent" id="InsuranceWeaverConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that I have chosen to decline purchasing travel insurance for myself and any other travellers in my party. The signature I provide below will serve as my digital signature.</small></label>
</div>
<!--end::Step 8 - Insurance Waiver Checkbox-->
<!--begin::Insurance Waiver Primary Traveller Full Name-->
<div class="col-xl-12">
<div class="form-group">
<label>Full Name (Primary Traveller) <span class="text-danger">*</span></label>
<input type="text" name="InsuranceWeaverConsentName" id="InsuranceWeaverConsentName" value="<?php echo $row['InsuranceWeaverConsentName'] ?>" class="form-control form-control-lg" placeholder="Full Name (Primary Traveller)" />
</div>
</div>
<!--end::Insurance Waiver Primary Traveller Full Name-->
<!--begin::Insurance Waiver Primary Traveller Signature-->
<div class="col-xl-12">
<div class="form-group">
<label>Signature (Primary Traveller) <span class="text-danger">*</span></label>
<br />
<?php if (empty($row['sigdataUrl'])) { ?>
<canvas id="sig-canvas1" style="touch-action: none; width:100%; height:160px; max-width:300px">
  Please download Chrome browser.
</canvas>
<br />
<button type="button" id="sig-clearBtn1" class="btn btn-outline-warning btn-light-warning text-uppercase font-weight-bolder mt-2">Clear Signature</button>

<textarea id="sigdataUrl1" name="sigdataUrl1" rows="5" class="hidden">
<?php echo $_POST['sigdataUrl'] ?>
</textarea>
<?php } ?>

<?php if (!empty($row["sigdataUrl"])) { ?>
<img src="<?php echo $row['sigdataUrl'] ?>" alt="Signature" style="width:300px; height:auto; max-height:300px">
<?php } ?>



</div>
</div>
</div>
<!--end::Insurance Waiver Primary Traveller Signature-->

</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->


<div class="<?php echo $addtravelclass ?>" id="box9">
<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">

<?php if ($row['AddTravelConsent1'] =='Yes' && $row['AddTravelConsent2'] =='Yes') { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>

</div>
<!--end::Ribbon-->

<script>
function alert222(){
    
	
	if (sel1 == 8) {
	document.getElementById("AddTravelTitle8").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle8").required;	
	document.getElementById("AddTravelFName8").setAttribute("required", ""); 
	document.getElementById("AddTravelFName8").required;	
	document.getElementById("AddTravelMName8").setAttribute("required", ""); 
	document.getElementById("AddTravelMName8").required;	
	document.getElementById("AddTravelLName8").setAttribute("required", ""); 
	document.getElementById("AddTravelLName8").required;	
	document.getElementById("AddPassport8").setAttribute("required", ""); 
	document.getElementById("AddPassport8").required;	
	document.getElementById("AddTravelDOB8").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB8").required;					
    }	    
	
	if (sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle7").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle7").required;	
	document.getElementById("AddTravelFName7").setAttribute("required", ""); 
	document.getElementById("AddTravelFName7").required;	
	document.getElementById("AddTravelMName7").setAttribute("required", ""); 
	document.getElementById("AddTravelMName7").required;	
	document.getElementById("AddTravelLName7").setAttribute("required", ""); 
	document.getElementById("AddTravelLName7").required;	
	document.getElementById("AddPassport7").setAttribute("required", ""); 
	document.getElementById("AddPassport7").required;	
	document.getElementById("AddTravelDOB7").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB7").required;					
    }    
	
	if (sel1 == 6 || sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle6").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle6").required;	
	document.getElementById("AddTravelFName6").setAttribute("required", ""); 
	document.getElementById("AddTravelFName6").required;	
	document.getElementById("AddTravelMName6").setAttribute("required", ""); 
	document.getElementById("AddTravelMName6").required;	
	document.getElementById("AddTravelLName6").setAttribute("required", ""); 
	document.getElementById("AddTravelLName6").required;	
	document.getElementById("AddPassport6").setAttribute("required", ""); 
	document.getElementById("AddPassport6").required;
	document.getElementById("AddTravelDOB6").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB6").required;						
    }
        
	if (sel1 == 5 || sel1 == 6 || sel1 == 7 || sel1 == 8) {		
	document.getElementById("AddTravelTitle5").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle5").required;	
	document.getElementById("AddTravelFName5").setAttribute("required", ""); 
	document.getElementById("AddTravelFName5").required;	
	document.getElementById("AddTravelMName5").setAttribute("required", ""); 
	document.getElementById("AddTravelMName5").required;	

	document.getElementById("AddTravelLName5").setAttribute("required", ""); 
	document.getElementById("AddTravelLName5").required;		
	document.getElementById("AddPassport5").setAttribute("required", ""); 
	document.getElementById("AddPassport5").required;	
	document.getElementById("AddTravelDOB5").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB5").required;					
    }    
	
	if (sel1 == 4 || sel1 == 5 || sel1 == 6 || sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle4").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle4").required;	
	document.getElementById("AddTravelFName4").setAttribute("required", ""); 
	document.getElementById("AddTravelFName4").required;	
	document.getElementById("AddTravelMName4").setAttribute("required", ""); 
	document.getElementById("AddTravelMName4").required;	
	document.getElementById("AddTravelLName4").setAttribute("required", ""); 
	document.getElementById("AddTravelLName4").required;	
	document.getElementById("AddPassport4").setAttribute("required", ""); 
	document.getElementById("AddPassport4").required;	
	document.getElementById("AddTravelDOB4").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB4").required;					
    }
	   
	if (sel1 == 3  || sel1 == 4 || sel1 == 5 || sel1 == 6 || sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle3").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle3").required;	
	document.getElementById("AddTravelFName3").setAttribute("required", ""); 
	document.getElementById("AddTravelFName3").required;	
	document.getElementById("AddTravelMName3").setAttribute("required", ""); 
	document.getElementById("AddTravelMName3").required;	
	document.getElementById("AddTravelLName3").setAttribute("required", ""); 
	document.getElementById("AddTravelLName3").required;		
	document.getElementById("AddPassport3").setAttribute("required", ""); 
	document.getElementById("AddPassport3").required;
	document.getElementById("AddTravelDOB3").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB3").required;						
    }	
	
	if (sel1 == 2 || sel1 == 3  || sel1 == 4 || sel1 == 5 || sel1 == 6 || sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle2").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle2").required;		
	document.getElementById("AddTravelFName2").setAttribute("required", ""); 
	document.getElementById("AddTravelFName2").required;	
	document.getElementById("AddTravelMName2").setAttribute("required", ""); 
	document.getElementById("AddTravelMName2").required;	
	document.getElementById("AddTravelLName2").setAttribute("required", ""); 
	document.getElementById("AddTravelLName2").required;		
	document.getElementById("AddPassport2").setAttribute("required", ""); 
	document.getElementById("AddPassport2").required;
	document.getElementById("AddTravelDOB2").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB2").required;							
    }
	
	if (sel1 == 1 || sel1 == 2 || sel1 == 3  || sel1 == 4 || sel1 == 5 || sel1 == 6 || sel1 == 7 || sel1 == 8) {
	document.getElementById("AddTravelTitle1").setAttribute("required", ""); 
	document.getElementById("AddTravelTitle1").required;		
	document.getElementById("AddTravelFName1").setAttribute("required", ""); 
	document.getElementById("AddTravelFName1").required;	
	document.getElementById("AddTravelMName1").setAttribute("required", ""); 
	document.getElementById("AddTravelMName1").required;	
	document.getElementById("AddTravelLName1").setAttribute("required", ""); 
	document.getElementById("AddTravelLName1").required;	
	document.getElementById("AddPassport1").setAttribute("required", ""); 
	document.getElementById("AddPassport1").required;
	document.getElementById("AddTravelDOB1").setAttribute("required", ""); 
	document.getElementById("AddTravelDOB1").required;						
    } 
		
}
</script>
<!--begin::Item-->
<div class="card border p-6 <?php echo $addtravelclass ?>" id="box0"><!--begin::Header-->
<div class="card-header" id="baf-heading10" onClick="alert222(); this.onclick=null;">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf10" aria-expanded="true" aria-controls="baf10" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Additional Travellers In The Party</div>
</div>
</div>

<script>
function alert222() {
  alert("Additional Travellers In Party: Please Fill In All The Required Fields.");
}
</script>
<!--end::Header-->
<!--begin::Body-->
<div id="baf10" class="collapse" aria-labelledby="baf-heading10" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please state each additional traveller's details as per their passport. If requested, please upload a copy of each additional traveller's passport in order to avoid any errors during the booking process. All items marked with a red asterisk<span class="text-danger"> *</span> are required.</p>
<!--begin::Row-->
<div class="row mt-10 <?php echo $box1 ?>"  id="box1">
<!--begin::Additional Traveller 1 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle1" id="AddTravelTitle1">
<?php if (!empty($row['AddTravelTitle1'])) { ?>
<option value="<?php echo $row['AddTravelTitle1'] ?>" selected="selected"><?php echo $row['AddTravelTitle1'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 1 Title-->
<!--begin::Additional Traveller 1 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName1" id="AddTravelFName1" value="<?php echo $row['AddTravelFName1'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 1 First Name-->
<!--begin::Additional Traveller 1 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 Middle Name</label>
<input type="text" name="AddTravelMName1" id="AddTravelMName1" value="<?php echo $row['AddTravelMName1'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 1 Middle Name-->
<!--begin::Additional Traveller 1 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 1 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName1" id="AddTravelLName1" value="<?php echo $row['AddTravelLName1'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 1 Last Name-->
<!--begin::Additional Traveller 1 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 1 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB1'] ?>" name="AddTravelDOB1" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 1 DOB-->
<!--begin::Additional Traveller 1 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 1 Notes Or Special Requests</label>
<textarea name="AddTravelNotes1" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes1'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 1 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_1_passport_already_uploaded = !empty($row['AddPassport1']) ? true: false;
    ?>
<!--begin::Additional Traveller 1 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 1 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation2()" name="AddPassport1" id="AddPassport1"
    <?php if(!$is_traveller_1_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 1 Passport." '; ?> />
<input type="hidden" value="<?php echo $row['AddPassport1'] ?>" name="AddPassport1DB" id="AddPassport1DB" />
<script>
Filevalidation2 =() => {
	const fi2 = document.getElementById('AddPassport1');
		if (fi2.files.length > 0) {
			for (const i = 0; i <= fi2.files.length - 1; i++) {
				const fsize = fi2.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>
<?php if($is_traveller_1_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 1 already uploaded.</p>" ?>


<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>

</div>
<!--end::Additional Traveller 1 Passport-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->




<!--begin::Row-->
<div class="row <?php echo $box2 ?>"  id="box2">
<!--begin::Additional Traveller 2 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle2" id="AddTravelTitle2">
<?php if (!empty($row['AddTravelTitle2'])) { ?>
<option value="<?php echo $row['AddTravelTitle2'] ?>" selected="selected"><?php echo $row['AddTravelTitle2'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 2 Title-->
<!--begin::Additional Traveller 2 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName2" id="AddTravelFName2" value="<?php echo $row['AddTravelFName2'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 2 First Name-->
<!--begin::Additional Traveller 2 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 Middle Name</label>
<input type="text" name="AddTravelMName2" id="AddTravelMName2" value="<?php echo $row['AddTravelMName2'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 2 Middle Name-->
<!--begin::Additional Traveller 2 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 2 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName2" id="AddTravelLName2" value="<?php echo $row['AddTravelLName2'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 2 Last Name-->
<!--begin::Additional Traveller 2 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 2 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB2'] ?>" name="AddTravelDOB2" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 2 DOB-->
<!--begin::Additional Traveller 2 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 2 Notes Or Special Requests</label>
<textarea name="AddTravelNotes2" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes2'] ?></textarea>
</div>

</div>
<!--end::Additional Traveller 2 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_2_passport_already_uploaded = !empty($row['AddPassport2']) ? true: false;
    ?>
<!--begin::Additional Traveller 2 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 2 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation3()" name="AddPassport2" id="AddPassport2"
    <?php if(!$is_traveller_2_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 2 Passport." '; ?> />
<input type="hidden" value="<?php echo $row['AddPassport2'] ?>" name="AddPassport2DB" id="AddPassport2DB" />
<script>
Filevalidation3 =() => {
	const fi3 = document.getElementById('AddPassport2');
		if (fi3.files.length > 0) {
			for (const i = 0; i <= fi3.files.length - 1; i++) {
				const fsize = fi3.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>
<?php if($is_traveller_2_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 2 already uploaded.</p>" ?>


<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 2 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->



<!--begin::Row-->
<div class="row <?php echo $box3 ?>" id="box3">
<!--begin::Additional Traveller 3 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle3" id="AddTravelTitle3">
<?php if (!empty($row['AddTravelTitle3'])) { ?>
<option value="<?php echo $row['AddTravelTitle3'] ?>" selected="selected"><?php echo $row['AddTravelTitle3'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 3 Title-->
<!--begin::Additional Traveller 3 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName3" id="AddTravelFName3" value="<?php echo $row['AddTravelFName3'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 3 First Name-->
<!--begin::Additional Traveller 3 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 Middle Name</label>
<input type="text" name="AddTravelMName3" id="AddTravelMName3" value="<?php echo $row['AddTravelMName3'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 3 Middle Name-->
<!--begin::Additional Traveller 3 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 3 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName3" id="AddTravelLName3" value="<?php echo $row['AddTravelLName3'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 3 Last Name-->
<!--begin::Additional Traveller 3 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 3 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB3'] ?>" name="AddTravelDOB3" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 3 DOB-->
<!--begin::Additional Traveller 3 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 3 Notes Or Special Requests</label>
<textarea name="AddTravelNotes3" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes3'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 3 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_3_passport_already_uploaded = !empty($row['AddPassport3']) ? true: false;

    ?>
<!--begin::Additional Traveller 3 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 3 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation4()" name="AddPassport3" id="AddPassport3"
    <?php if(!$is_traveller_3_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 3 Passport." '; ?> />

</div>
<input type="hidden" value="<?php echo $row['AddPassport3'] ?>" name="AddPassport3DB" id="AddPassport3DB" />
<script>
Filevalidation4 =() => {
	const fi4 = document.getElementById('AddPassport3');
		if (fi4.files.length > 0) {
			for (const i = 0; i <= fi4.files.length - 1; i++) {
				const fsize = fi4.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
<?php if($is_traveller_3_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 3 already uploaded.</p>" ?>

<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 3 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->




<!--begin::Row-->
<div class="row <?php echo $box4 ?>"  id="box4">
<!--begin::Additional Traveller 4 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle4" id="AddTravelTitle4">
<?php if (!empty($row['AddTravelTitle4'])) { ?>
<option value="<?php echo $row['AddTravelTitle4'] ?>" selected="selected"><?php echo $row['AddTravelTitle4'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 4 Title-->
<!--begin::Additional Traveller 4 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName4" id="AddTravelFName4" value="<?php echo $row['AddTravelFName4'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 4 First Name-->
<!--begin::Additional Traveller 4 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 Middle Name</label>
<input type="text" name="AddTravelMName4" id="AddTravelMName4" value="<?php echo $row['AddTravelMName4'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 4 Middle Name-->
<!--begin::Additional Traveller 4 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 4 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName4" id="AddTravelLName4" value="<?php echo $row['AddTravelLName4'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 4 Last Name-->
<!--begin::Additional Traveller 4 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 4 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB4'] ?>" name="AddTravelDOB4" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 4 DOB-->
<!--begin::Additional Traveller 4 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 4 Notes Or Special Requests</label>
<textarea name="AddTravelNotes4" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes4'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 4 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_4_passport_already_uploaded = !empty($row['AddPassport4']) ? true: false;
    ?>
<!--begin::Additional Traveller 4 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 4 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation5()" name="AddPassport4" id="AddPassport4"
    <?php if(!$is_traveller_4_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 4 Passport." '; ?> />

</div>
<input type="hidden" value="<?php echo $row['AddPassport4'] ?>" name="AddPassport4DB" id="AddPassport4DB" />
<script>
Filevalidation5 =() => {
	const fi5 = document.getElementById('AddPassport4');
		if (fi5.files.length > 0) {
			for (const i = 0; i <= fi5.files.length - 1; i++) {
				const fsize = fi5.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
    <?php if($is_traveller_4_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 4 already uploaded.</p>" ?>

<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 4 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->





<!--begin::Row-->
<div class="row <?php echo $box5 ?>"  id="box5">
<!--begin::Additional Traveller 5 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle5" id="AddTravelTitle5">
<?php if (!empty($row['AddTravelTitle5'])) { ?>
<option value="<?php echo $row['AddTravelTitle5'] ?>" selected="selected"><?php echo $row['AddTravelTitle5'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 5 Title-->
<!--begin::Additional Traveller 5 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName5" id="AddTravelFName5" value="<?php echo $row['AddTravelFName5'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 5 First Name-->
<!--begin::Additional Traveller 5 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 Middle Name</label>
<input type="text" name="AddTravelMName5" id="AddTravelMName5" value="<?php echo $row['AddTravelMName5'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 5 Middle Name-->
<!--begin::Additional Traveller 5 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 5 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName5" id="AddTravelLName5" value="<?php echo $row['AddTravelLName5'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 5 Last Name-->
<!--begin::Additional Traveller 5 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 5 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB5'] ?>" name="AddTravelDOB5" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 5 DOB-->
<!--begin::Additional Traveller 5 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 5 Notes Or Special Requests</label>
<textarea name="AddTravelNotes5" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes5'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 5 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){
    $is_traveller_5_passport_already_uploaded = !empty($row['AddPassport5']) ? true: false;

    ?>
<!--begin::Additional Traveller 5 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 5 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation6()" name="AddPassport5" id="AddPassport5"
    <?php if(!$is_traveller_5_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 5 Passport." '; ?> />
</div>
<input type="hidden" value="<?php echo $row['AddPassport5'] ?>" name="AddPassport5DB" id="AddPassport5DB" />
<script>
Filevalidation6 =() => {
	const fi6 = document.getElementById('AddPassport5');
		if (fi6.files.length > 0) {
			for (const i = 0; i <= fi6.files.length - 1; i++) {
				const fsize = fi6.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
<?php if($is_traveller_5_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 5 already uploaded.</p>" ?>


<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 5 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->






<!--begin::Row-->
<div class="row <?php echo $box6 ?>"  id="box6">
<!--begin::Additional Traveller 6 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle6">
<?php if (!empty($row['AddTravelTitle6'])) { ?>
<option value="<?php echo $row['AddTravelTitle6'] ?>" selected="selected"><?php echo $row['AddTravelTitle6'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 6 Title-->
<!--begin::Additional Traveller 6 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName6" value="<?php echo $row['AddTravelFName6'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 6 First Name-->
<!--begin::Additional Traveller 6 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 Middle Name</label>
<input type="text" name="AddTravelMName6" value="<?php echo $row['AddTravelMName6'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 6 Middle Name-->
<!--begin::Additional Traveller 6 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 6 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName6" value="<?php echo $row['AddTravelLName6'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 6 Last Name-->
<!--begin::Additional Traveller 6 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 6 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" onChange="" value="<?php echo $row['AddTravelDOB6'] ?>" name="AddTravelDOB6" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 6 DOB-->
<!--begin::Additional Traveller 6 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 6 Notes Or Special Requests</label>
<textarea name="AddTravelNotes6" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes6'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 6 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_6_passport_already_uploaded = !empty($row['AddPassport6']) ? true: false;
    ?>
<!--begin::Additional Traveller 6 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 6 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation7()" name="AddPassport6" id="AddPassport6"
    <?php if(!$is_traveller_6_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 6 Passport." '; ?> />
</div>
<input type="hidden" value="<?php echo $row['AddPassport6'] ?>" name="AddPassport6DB" id="AddPassport6DB" />
<script>
Filevalidation7 =() => {
	const fi7 = document.getElementById('AddPassport6');
		if (fi7.files.length > 0) {
			for (const i = 0; i <= fi7.files.length - 1; i++) {
				const fsize = fi7.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
<?php if($is_traveller_6_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 6 already uploaded.</p>" ?>

<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 6 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->





<!--begin::Row-->
<div class="row <?php echo $box7 ?>" id="box7">
<!--begin::Additional Traveller 7 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle7">
<?php if (!empty($row['AddTravelTitle7'])) { ?>
<option value="<?php echo $row['AddTravelTitle7'] ?>" selected="selected"><?php echo $row['AddTravelTitle7'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 7 Title-->
<!--begin::Additional Traveller 7 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName7" value="<?php echo $row['AddTravelFName7'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 7 First Name-->
<!--begin::Additional Traveller 7 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 Middle Name</label>
<input type="text" name="AddTravelMName7" value="<?php echo $row['AddTravelMName7'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 7 Middle Name-->
<!--begin::Additional Traveller 7 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 7 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName7" value="<?php echo $row['AddTravelLName7'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 7 Last Name-->
<!--begin::Additional Traveller 7 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 7 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" value="<?php echo $row['AddTravelDOB7'] ?>" onChange="" name="AddTravelDOB7" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 7 DOB-->
<!--begin::Additional Traveller 7 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 7 Notes Or Special Requests</label>
<textarea name="AddTravelNotes7" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes7'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 7 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_7_passport_already_uploaded = !empty($row['AddPassport7']) ? true: false;
    ?>
<!--begin::Additional Traveller 7 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 7 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation8()" name="AddPassport7" id="AddPassport7"
    <?php if(!$is_traveller_7_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 7 Passport." '; ?> />

</div>
<input type="hidden" value="<?php echo $row['AddPassport7'] ?>" name="AddPassport7DB" id="AddPassport7DB" />
<script>
Filevalidation8 =() => {
	const fi8 = document.getElementById('AddPassport7');
		if (fi8.files.length > 0) {
			for (const i = 0; i <= fi8.files.length - 1; i++) {
				const fsize = fi8.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
<?php if($is_traveller_7_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 7 already uploaded.</p>" ?>


<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<?php } ?>
<!--end::Important Alert-->
</div>
<!--end::Additional Traveller 7 Passport-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->





<!--begin::Row-->
<div class="row <?php echo $box8 ?>" id="box8">
<!--begin::Additional Traveller 8 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 Title <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="AddTravelTitle8">
<?php if (!empty($row['AddTravelTitle8'])) { ?>
<option value="<?php echo $row['AddTravelTitle8'] ?>" selected="selected"><?php echo $row['AddTravelTitle8'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>
<!--end::Additional Traveller 8 Title-->
<!--begin::Additional Traveller 8 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 First Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelFName8" value="<?php echo $row['AddTravelFName8'] ?>" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Additional Traveller 8 First Name-->
<!--begin::Additional Traveller 8 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 Middle Name</label>
<input type="text" name="AddTravelMName8" value="<?php echo $row['AddTravelMName8'] ?>" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Additional Traveller 8 Middle Name-->
<!--begin::Additional Traveller 8 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 8 Last Name <span class="text-danger">*</span></label>
<input type="text" name="AddTravelLName8" value="<?php echo $row['AddTravelLName8'] ?>" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Additional Traveller 8 Last Name-->
<!--begin::Additional Traveller 8 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 8 Date Of Birth (M/D/Y) <span class="text-danger">*</span></label>
<input type="text" value="<?php echo $row['AddTravelDOB8'] ?>" onChange="" name="AddTravelDOB8" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" >
</div>
</div>
<!--end::Additional Traveller 8 DOB-->
<!--begin::Additional Traveller 8 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 8 Notes Or Special Requests</label>
<textarea name="AddTravelNotes8" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $row['AddTravelNotes8'] ?></textarea>
</div>
</div>
<!--end::Additional Traveller 8 Notes-->
<?php if ($row['RequestTravellersPassport']	=='Yes'){

    $is_traveller_8_passport_already_uploaded = !empty($row['AddPassport8']) ? true: false;
    ?>
<!--begin::Additional Traveller 8 Passport-->
<div class="col-xl-12">
<div class="form-group">
<label>Traveller 8 Upload Passport (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation9()" name="AddPassport8" id="AddPassport8"
    <?php if(!$is_traveller_8_passport_already_uploaded) echo ' data-required="yes" validation-message="Please upload Traveller 8 Passport." '; ?> />

</div>
<input type="hidden" value="<?php echo $row['AddPassport8'] ?>" name="AddPassport8DB" id="AddPassport8DB" />
<script>
Filevalidation9 =() => {
	const fi9 = document.getElementById('AddPassport8');
		if (fi9.files.length > 0) {
			for (const i = 0; i <= fi9.files.length - 1; i++) {
				const fsize = fi9.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Passport file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
    <?php if($is_traveller_8_passport_already_uploaded) echo "<p style='color: #005c36;'>Traveller 8 already uploaded.</p>" ?>

<?php if (!empty($row['AgentPrevIP'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a passport, it will be replaced if you decide to upload a new passport.</div>
</div>
<!--end::Important Alert-->
<?php } ?>
</div>
<!--end::Additional Traveller 8 Passport-->
<?php } ?>
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row">
<!--begin::Step 10 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $AddTravelConsent1Check ?> name="AddTravelConsent1" id="AddTravelConsent1" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hereby certify that the details provided are correct as per each traveller's passport.</small></label>
</div>
<!--end::Step 10 - Agree Checkbox 1-->
<!--begin::Step 10 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $AddTravelConsent2Check ?> name="AddTravelConsent2" id="AddTravelConsent2" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the details provided are incorrect and my trip is booked, it can lead to an additional change fee ($) per traveller.</small></label>
</div>
<!--end::Step 10 - Agree Checkbox 2-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>


<?php if (!empty($row['AdditionalTitle1']) || !empty($row['AdditionalTitle2']) || !empty($row['AdditionalTitle3'])) { ?>
<div>
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if (empty($row['AdditionalConsent']) && ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2 || $row['BookingStatus'] ==3 || $row['BookingStatus'] ==4)) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if (($row['AdditionalConsent'] =='Yes') && ($row['chg']==0)) { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['AdditionalConsent'] =='No' || $row['AdditionalConsent'] =='' || ($row['chg'] !=0)) { ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading9">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf9" aria-expanded="true" aria-controls="baf9" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Additional Information</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf9" class="collapse" aria-labelledby="baf-heading9" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder mb-10">Please review the details provided.</p>
<!--begin::Table-->
<div class="table-responsive lead">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" scope="col" style="min-width: 250px">Title</th>
  <th class="lead" style="min-width: 75px" scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php if (!empty($row['AdditionalTitle1'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle1'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL1'])) { ?>
  <a href="<?php echo $row["AdditionalURL1"] ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
  <?php } if (!empty($row['AdditionalPDF1'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF1"] ?>"  title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Document</a>
  <?php } ?>
  </td>
</tr>
<?php } ?>
<?php if (!empty($row['AdditionalTitle2'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle2'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL2'])) { ?>
  <a href="<?php echo $row["AdditionalURL2"] ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
  <?php } if (!empty($row['AdditionalPDF2'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF2"] ?>"  title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" download>See Document</a>
  <?php } ?>
  </td>
</tr>
<?php } ?>
<?php if (!empty($row['AdditionalTitle3'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle3'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL3'])) { ?>
  <a href="<?php echo $row["AdditionalURL3"] ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
  <?php } if (!empty($row['AdditionalPDF3'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF3"] ?>"  title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" download>See Document</a>
  <?php } ?>
  </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!--end::Table-->

<!--begin::Row-->
<div class="row">
<!--begin::Step 9 - Checkbox 1-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked onChange="validatepricing290()" type="checkbox" name="AdditionalConsent" id="AdditionalConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I have reviewed the details provided.</small></label>
</div>

<?php if (!empty($row['AdditionalTitle1']) || !empty($row['AdditionalTitle2']) || !empty($row['AdditionalTitle3'])) { ?>
<script>
function validatepricing290() {
  if (document.getElementById("AdditionalConsent").checked == false) {
    alert("I have reviewed the details needs to be checked.");
	document.getElementById("AdditionalConsent").focus();
  }
}
</script>
<?php } ?>
<!--end::Step 9 - Checkbox 1-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>
<?php } ?>

</div>

<?php 

$DBTotal=$row["QuoteFeePerPerson"]+$row["PricePerPerson1"]+$row["PricePerPerson2"]
+ $row["PricePerPerson3"] + $row["PricePerPerson4"] + $row["PricePerPerson5"] 
+ $row["PricePerPerson6"] + $row["InsurancePricePerPerson1"] + $row["InsurancePricePerPerson2"] 
+ $row["InsurancePricePerPerson3"] + $row["InsurancePricePerPerson4"] + $row["InsurancePricePerPerson5"]
+ $row["BookingFeePerPerson"] + $row["pricing1"] + $row["pricing2"] + $row["pricing3"] + $row["pricing4"]
+ $row["pricing5"] + $row["insurance1"] + $row["insurance2"] + $row["insurance3"] + $row["insurance4"] 
+ $row["insurance5"] + $row["TotalPrice1"] + $row["TotalPrice2"] + $row["TotalPrice3"] + $row["TotalPrice4"]
+ $row["TotalPrice5"] + $row["InsuranceTotalPrice1"] + $row["InsuranceTotalPrice2"] + $row["InsuranceTotalPrice3"]
+ $row["InsuranceTotalPrice4"] + $row["InsuranceTotalPrice5"] + $row["BookingFeeTotal"] + $row["QuoteTotalFee"];

$DBTotal=trim($DBTotal.'.00');

if ($DBTotal > 0.00)
$PaymentDiv='';
else
$PaymentDiv='hidden';

?>


<div class="<?php echo $PaymentDiv ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['DetailsCorrectConsent'] =='Yes' && $row['VerificationPurposesConsent'] =='Yes' && empty($row['BookingTime5'])) { ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6" onClick="grossIt();"><!--begin::Header-->
<div class="card-header" id="baf-heading11" onClick="payment(); this.onclick=null;">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf11" aria-expanded="true" aria-controls="baf11" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Payment</div>
</div>
</div>


<script>
function payment() {
  alert("Payment: Select Up To Two Methods Of Payment And Fill In All The Required Fields.");
  /*document.getElementById("CovidConsentName").focus();*/
}
</script>

<!--end::Header-->
<!--begin::Body-->
<div id="baf11" class="collapse" aria-labelledby="baf-heading11" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Please review the pricing totals, select up to two methods of payment and fill in any required details. All items marked with a red asterisk<span class="text-danger"> *</span> are required.</p>
<!--begin::Row-->
<div class="row mt-10">

<!--begin::Quote Fee Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Quote Fee Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php 
if (!empty($QuoteTotalFee)) 
$QuoteTotalFee=$QuoteTotalFee;
else
$QuoteTotalFee='0.00';
?>
<input name="QuoteTotalFee" id="sgt" value="<?php echo $QuoteTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Quote Fee Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Quote Fee Grand Total-->


<!--begin::Booking Fee Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Booking Fee Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php 
if (!empty($BookingTotalFee)) 
$BookingTotalFee=$BookingTotalFee ;
else
$BookingTotalFee='0.00';
?>
<input name="BookingTotalFee" id="sgt0" value="<?php echo $BookingTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Booking Fee Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Booking Fee Grand Total-->
<!--begin::Trip Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Trip Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php if (empty($row['FullPaymentDate'])) { ?>

<?php
if ($row['TripGrandTotal'] > 0)
$TripGrandTotal=$row['TripGrandTotal'];
else
$TripGrandTotal="0.00";
?>

<input value="<?php echo $TripGrandTotal; ?>" name="total" id="total" onChange="totalIt()" class="form-control form-control-lg bg-light-success" placeholder="Trip Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
<?php } else { ?>
<input value="<?php echo $TripGrandTotal; ?>" name="TotalAmountDue3" id="TotalAmountDue3" onChange="totalIt2()" class="form-control form-control-lg bg-light-success" placeholder="Trip Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
<?php }  ?>
</div>																		
</div>
</div>
<!--end::Trip Grand Total-->
<!--begin::Travel Insurance Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Travel Insurance Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>

<?php 
if ($row['InsuranceGrandTotal'] > 0) 
$InsuranceGrandTotal=$row['InsuranceGrandTotal'];
else
$InsuranceGrandTotal="0.00";
?>

<input name="InsuranceGrandTotal" id="igt" value="<?php echo $InsuranceGrandTotal ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Travel Insurance Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Travel Insurance Grand Total-->
</div>
<!--end::Row-->


<script>
function grossIt() {
<?php if (empty($row['FullPaymentDate'])) { ?>
var y1 = document.getElementById("total").value;
<?php } else { ?>
var m1 = document.getElementById("TotalAmountDue3").value;
<?php } ?>
var a1 = document.getElementById("sgt").value;
var b1 = document.getElementById("sgt0").value;
var v1 = document.getElementById("igt").value;
var x1 = 
<?php if (empty($row['FullPaymentDate'])) { ?>
Number(y1) + 
<?php } else { ?>
Number(m1) + 
<?php } ?>
Number(a1) +
Number(b1) + 
Number(v1) ;
document.getElementById("ogt").value = x1.toFixed(2);
}
</script>
<input name="OverallGrandTotal" id="ogt" value="0.00" type="hidden" readonly >

<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Method Of Payment-->
<div class="col-xl-12">
<div class="form-group mb-0">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<label>Method Of Payment (Select Up To 2) <span class="text-danger">*</span></label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">

<?php 
//========================================NEW CHANGES ABOUR THE CREDIT CARD====================================
if (!empty($row['CCType']))
{
$creditcardbox='checked';
$creditcardshow='block';
}
else
{
$creditcardbox='';
$creditcardshow='none';
}
//==============================================================================================================
?>

<input value="" <?php echo $creditcardbox ?> type="checkbox" name="MethodOfPayment" id="myCheck9991" onclick="myFunction99917(), myFunction9991(), toggle199(this), my1Function9991()"><span></span>Credit Card</label>


<script>
function myFunction9991() {
  var checkBox = document.getElementById("myCheck9991");
  var text = document.getElementById("text9991");
  if (checkBox.checked == true){
	alert("Credit Card: Please Select All The Items You Will Be Paying For And Fill In All The Required Fields."); 
	document.getElementById("CreditCardProcessConsent").checked = true; 				
    text.style.display = "block";
	document.getElementById("select50").setAttribute("required", "");
	document.getElementById("CCType").setAttribute("required", "");
	document.getElementById("CCName").setAttribute("required", "");
	document.getElementById("CCNumber").setAttribute("required", "");
	document.getElementById("CCExpiry").setAttribute("required", "");
	document.getElementById("CCVV").setAttribute("required", "");	
	document.getElementById("select50").required;	
	document.getElementById("CCType").required;		
	document.getElementById("CCName").required;
	document.getElementById("CCNumber").required;	
	document.getElementById("CCExpiry").required;		
	document.getElementById("CCVV").required;		
  } else {
	 alert("Credit Card: You Unselected This Method.");  
     text.style.display = "none"; 
	document.getElementById("select50").removeAttribute("required", "");
	document.getElementById("CCType").removeAttribute("required", "");
	document.getElementById("CCName").removeAttribute("required", "");
	document.getElementById("CCNumber").removeAttribute("required", "");
	document.getElementById("CCExpiry").removeAttribute("required", "");
	document.getElementById("CCVV").removeAttribute("required", "");	
	document.getElementById("select50").required = false;	
	document.getElementById("CCType").required = false;		
	document.getElementById("CCName").required = false;
	document.getElementById("CCNumber").required = false;	
	document.getElementById("CCExpiry").required = false;		
	document.getElementById("CCVV").required = false;		 
  }
}
</script> 

<script>
function myFunction99917() {
  var checkBox = document.getElementById("myCheck9991");
  var text = document.getElementById("text99917");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none"; 
  }
}
</script> 

<input <?php echo $creditcardbox ?> type="checkbox" name="MethodOfPayment1" value="Credit Card" style="display:none">
<script>
function toggle199(source) {
checkboxes = document.getElementsByName('MethodOfPayment1');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>


<?php 
//========================================BANK DEPOST====================================
if (!empty($row['MethodOfPayment2']))
{
$MethodOfPayment2box='checked';
$bankshow='block';
}
else
{
$MethodOfPayment2box='';
$bankshow='none';
}
//==============================================================================================================
?>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input value="" <?php echo $MethodOfPayment2box ?> type="checkbox" name="MethodOfPayment" id="myCheck9992" onclick="myFunction9992(), toggle299(this), my2Function9992(), toggle171(this), toggle172(this), toggle173(this), toggle174(this)"><span></span>Bank Deposit Into Centre Holidays' Account</label>


<script>
function myFunction9992() {
  var checkBox = document.getElementById("myCheck9992");
  var text = document.getElementById("text9992");
  if (checkBox.checked == true){
	alert("Bank Deposit: Please Select All The Items You Will Be Paying For.");  
    text.style.display = "block";
  } else {
	alert("Bank Deposit: You Unselected This Method.");  
     text.style.display = "none";
  }
}
</script> 

<input type="checkbox" <?php echo $MethodOfPayment2box ?> name="MethodOfPayment2" value="Deposit Money Into Centre Holidays Bank Account" style="display:none">
<script>
function toggle299(source) {
checkboxes = document.getElementsByName('MethodOfPayment2');
for (var ii = 0, nn = checkboxes.length; ii < nn; ii++) {
checkboxes[ii].checked = source.checked;
}
}
</script>


<?php 
//========================================Email Transfer====================================
if (!empty($row['MethodOfPayment3']))
{
$MethodOfPayment3box='checked';
$emailshow='block';
}
else
{
$MethodOfPayment3box='';
$emailshow='none';
}
//==============================================================================================================
?>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input value="" <?php echo $MethodOfPayment3box ?> type="checkbox" name="MethodOfPayment" id="myCheck9993" onclick="myFunction9993(), toggle399(this), my3Function9993()"><span></span>Email Transfer</label>


<script>
function myFunction9993() {
  var checkBox = document.getElementById("myCheck9993");
  var text = document.getElementById("text9993");
  if (checkBox.checked == true){
  alert("Email Transfer: Please Select All The Items You Will Be Paying For.");	  
    text.style.display = "block"; 
  } else {
	 alert("Email Transfer: You Unselected This Method."); 
     text.style.display = "none";
  }
}
</script>

<input type="checkbox" <?php echo $MethodOfPayment3box ?> name="MethodOfPayment3" value="Email Transfer" style="display:none">
<script>
function toggle399(source) {
checkboxes = document.getElementsByName('MethodOfPayment3');
for (var iii = 0, nnn = checkboxes.length; iii < nnn; iii++) {
checkboxes[iii].checked = source.checked;
}
}
</script>


<?php 
//========================================UPLIFT====================================
if (!empty($row['MethodOfPayment4']))
{
$MethodOfPayment4box='checked';
$upliftshow='block';
}
else
{
$MethodOfPayment4box='';
$upliftshow='none';
}
//==============================================================================================================
?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input value="" <?php echo $MethodOfPayment4box ?> type="checkbox" name="MethodOfPayment" id="myCheck9994" onclick=" myFunction9994(), toggle499(this), my4Function9994()"><span></span>Trip Financing Through Uplift</label>


<script>
function myFunction9994() {
  var checkBox = document.getElementById("myCheck9994");
  var text = document.getElementById("text9994");
  if (checkBox.checked == true){
    alert("Trip Financing: Please Select All The Items You Will Be Paying For.");  
    text.style.display = "block";
  } else {
	 alert("Trip Financing: You Unselected This Method."); 
     text.style.display = "none";
  }
}
</script>

<input type="checkbox" <?php echo $MethodOfPayment4box ?> name="MethodOfPayment4" value="Trip Financing Through Uplift" style="display:none">

<script>
function toggle499(source) {
checkboxes = document.getElementsByName('MethodOfPayment4');
for (var iiii = 0, nnnn = checkboxes.length; iiii < nnnn; iiii++) {
checkboxes[iiii].checked = source.checked;
}
}
</script>


<!------------------------JS FOR METHEROD OF PAYMENT LIMIT 2 OPTIONS-------------------->
<script>
$("input[name=MethodOfPayment]").change(function(){
    var max= 2;
    if( $("input[name=MethodOfPayment]:checked").length == max ){
        $("input[name=MethodOfPayment]").attr('disabled', 'disabled');
        $("input[name=MethodOfPayment]:checked").removeAttr('disabled');
    }else{
         $("input[name=MethodOfPayment]").removeAttr('disabled');
    }
})
</script>
</div>
</div>
<!--end::Method Of Payment-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row" id="text9992" style="display:<?php echo $bankshow ?>"">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Bank Deposit Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For By Bank Deposit? <span class="text-danger">*</span></label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">
<?php 
if (!empty($row['QuoteFee1']))
$QuoteFee1check='checked';
else
$QuoteFee1check='';
?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $QuoteFee1check ?> onclick="toggle171(this)" class="example2" name="PayingFor" id="myCheck1" value="Quote Fee">
<span></span>Quote Fee</label>
<input type="checkbox" <?php echo $QuoteFee1check ?> name="QuoteFee1" id="QuoteFee1" value="Quote Fee With Bank Deposit" style="display:none">
<script>
function toggle171(source) {
checkboxes = document.getElementsByName('QuoteFee1');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>
<?php 
if (!empty($row['BookingFee1']))
$BookingFee1check='checked';
else
$BookingFee1check='';
?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $BookingFee1check ?> onclick="toggle172(this)" class="example2" name="PayingFor" id="myCheck2" value="Booking Fee">
<span></span>Booking Fee</label>
<input type="checkbox" <?php echo $BookingFee1check ?> name="BookingFee1" id="BookingFee1" value="Booking Fee With Bank Deposit" style="display:none">
<script>
function toggle172(source) {
checkboxes = document.getElementsByName('BookingFee1');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

<?php 
if (!empty($row['TripFee1']))
$TripFee1check='checked';
else
$TripFee1check='';
?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $TripFee1check ?> type="checkbox" onclick="toggle173(this)" class="example2" name="PayingFor" id="myCheck3" value="Trip">
<span></span>Trip</label>
<input <?php echo $TripFee1check ?> type="checkbox" name="TripFee1" id="TripFee1" value="Trip With Bank Deposit" style="display:none">
<script>
function toggle173(source) {
checkboxes = document.getElementsByName('TripFee1');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

<?php 
if (!empty($row['TravelInsuranceFee1']))
$TravelInsuranceFee1check='checked';
else
$TravelInsuranceFee1check='';
?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $TravelInsuranceFee1check ?> type="checkbox" onclick="toggle174(this)" class="example2" name="PayingFor" id="myCheck4" value="Travel Insurance">
<span></span>Travel Insurance</label>
<input <?php echo $TravelInsuranceFee1check ?> type="checkbox" name="TravelInsuranceFee1" id="TravelInsuranceFee1" value="Travel Insurance With Bank Deposit" style="display:none">
<script>
function toggle174(source) {
checkboxes = document.getElementsByName('TravelInsuranceFee1');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


</div>
</div>


<!--end::Bank Deposit Paying For-->
<!--begin::Bank Deposit-->
<div class="col-xl-12" >
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Upon submission of this email form, the steps to make a bank deposit will be emailed to you.</p>
</div>
</div>
</div>
</div>
<!--end::Bank Deposit-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row" id="text9993" style="display:<?php echo $emailshow ?>">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::E-Transfer Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For By Email Transfer? <span class="text-danger">*</span></label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">

<?php 
if (!empty($row['QuoteFee2']))
$QuoteFee2check='checked';
else
$QuoteFee2check='';
?>
<input type="checkbox" <?php echo $QuoteFee2check ?> onclick="toggle181(this)" class="example3" name="PayingFor" id="myCheck5" value="Quote Fee">
<span></span>Quote Fee</label>
<input type="checkbox" <?php echo $QuoteFee2check ?> name="QuoteFee2" id="QuoteFee2" value="Quote Fee With Email Transfer" style="display:none">
<script>
function toggle181(source) {
checkboxes = document.getElementsByName('QuoteFee2');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>



<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['BookingFee2']))
$BookingFee2check='checked';
else
$BookingFee2check='';
?>
<input type="checkbox" <?php echo $BookingFee2check ?> onclick="toggle182(this)" class="example3" name="PayingFor" id="myCheck6" value="Booking Fee">
<span></span>Booking Fee</label>
<input type="checkbox" <?php echo $BookingFee2check ?> name="BookingFee2" id="BookingFee2" value="Booking Fee With Email Transfer" style="display:none">
<script>
function toggle182(source) {
checkboxes = document.getElementsByName('BookingFee2');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TripFee2']))
$TripFee2check='checked';
else
$TripFee2check='';
?>
<input type="checkbox" <?php echo $TripFee2check ?> class="example3" onclick="toggle183(this)" name="PayingFor" id="myCheck7" value="Trip">
<span></span>Trip</label>
<input type="checkbox" <?php echo $TripFee2check ?> name="TripFee2" id="TripFee2" value="Trip With Email Transfer" style="display:none">
<script>
function toggle183(source) {
checkboxes = document.getElementsByName('TripFee2');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TravelInsuranceFee2']))
$TravelInsuranceFee2check='checked';
else
$TravelInsuranceFee2check='';
?>
<input type="checkbox" <?php echo $TravelInsuranceFee2check ?> class="example3" onclick="toggle184(this)" name="PayingFor" id="myCheck8" value="Travel Insurance">
<span></span>Travel Insurance</label>
<input type="checkbox" <?php echo $TravelInsuranceFee2check ?> name="TravelInsuranceFee2" id="TravelInsuranceFee2" value="Travel Insurance With Email Transfer" style="display:none">
<script>
function toggle184(source) {
checkboxes = document.getElementsByName('TravelInsuranceFee2');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>



</div>
</div>

<!--end::E-Transfer Paying For-->
<!--begin::E-Transfer-->
<div class="col-xl-12" id="box23">
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Upon submission of this email form, the steps to make an email transfer will be emailed to you.</p>
</div>
</div>
</div>
</div>
<!--end::E-Transfer-->
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="row" id="text9994" style="display:<?php echo $upliftshow ?>">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Trip Financing Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For Through Trip Financing? <span class="text-danger">*</span></label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['QuoteFee3']))
$QuoteFee3check='checked';
else
$QuoteFee3check='';
?>
<input type="checkbox" <?php echo $QuoteFee3check ?> onclick="toggle191(this)" class="example4" name="PayingFor" id="myCheck9" value="Quote Fee">
<span></span>Quote Fee</label>
<input type="checkbox" <?php echo $QuoteFee3check ?> name="QuoteFee3" id="QuoteFee3" value="Quote Fee With Trip Financing" style="display:none">
<script>
function toggle191(source) {
checkboxes = document.getElementsByName('QuoteFee3');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['BookingFee3']))
$BookingFee3check='checked';
else
$BookingFee3check='';
?>
<input type="checkbox" <?php echo $BookingFee3check ?> onclick="toggle192(this)" class="example4" name="PayingFor" id="myCheck10" value="Booking Fee">
<span></span>Booking Fee</label>
<input type="checkbox" <?php echo $BookingFee3check ?> name="BookingFee3" id="BookingFee3" value="Booking Fee With Trip Financing" style="display:none">
<script>
function toggle192(source) {
checkboxes = document.getElementsByName('BookingFee3');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TripFee3']))
$TripFee3check='checked';
else
$BookingFee3check='';
?>
<input type="checkbox" <?php echo $TripFee3check ?> class="example4" onclick="toggle193(this)" name="PayingFor" id="myCheck11" value="Trip">
<span></span>Trip</label>
<input type="checkbox" <?php echo $TripFee3check ?> name="TripFee3" id="TripFee3" value="Trip With Trip Financing" style="display:none">
<script>
function toggle193(source) {
checkboxes = document.getElementsByName('TripFee3');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TravelInsuranceFee3']))
$TravelInsuranceFee3check='checked';
else
$TravelInsuranceFee3check='';
?>
<input type="checkbox" <?php echo $TravelInsuranceFee3check ?> class="example4" onclick="toggle194(this)" name="PayingFor" id="myCheck12" value="Travel Insurance">
<span></span>Travel Insurance</label>
<input type="checkbox" <?php echo $TravelInsuranceFee3check ?> name="TravelInsuranceFee3" id="TravelInsuranceFee3" value="Travel Insurance With Trip Financing" style="display:none">
<script>
function toggle194(source) {
checkboxes = document.getElementsByName('TravelInsuranceFee3');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


</div>
</div>

<!--begin::Trip Financing-->
<div class="col-xl-12" id="box24">
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Your travel advisor will contact you with the necessary steps for trip financing. Please note that in order to apply for Uplift, you are required to be one of the travellers.</p>
</div>
</div>
</div>
</div>
<!--end::Trip Financing-->
</div>
<!--end::Row-->
<!--begin::Row-->

<!-----------------------------------STRAT OF CREDIT CARD AREA HIDDING------------------------>
<div id="text9991" style="display:<?php echo $creditcardshow ?>">
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Credit Card Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For By Credit Card? <span class="text-danger">*</span></label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['QuoteFee4']))
$QuoteFee4check='checked';
else
$QuoteFee4check='';
?>
<input type="checkbox" <?php echo $QuoteFee4check ?> class="example1" onClick="toggle1101(this)" name="PayingFor" id="myCheck13">
<span></span>Quote Fee</label>
<input type="checkbox" <?php echo $QuoteFee4check ?> name="QuoteFee4" id="QuoteFee4" value="Quote Fee With Credit Card" style="display:none">
<script>
function toggle1101(source) {
checkboxes = document.getElementsByName('QuoteFee4');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['BookingFee4']))
$BookingFee4check='checked';
else
$BookingFee4check='';
?>
<input type="checkbox" <?php echo $BookingFee4check ?> class="example1" onClick="toggle1102(this)" name="PayingFor" id="myCheck14">
<span></span>Booking Fee</label>
<input type="checkbox" <?php echo $BookingFee4check ?> name="BookingFee4" id="BookingFee4" value="Booking Fee With Credit Card" style="display:none">
<script>
function toggle1102(source) {
checkboxes = document.getElementsByName('BookingFee4');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TripFee4']))
$TripFee4check='checked';
else
$TripFee4check='';
?>
<input type="checkbox" <?php echo $TripFee4check ?> onClick="toggle1103(this)" class="example1" name="PayingFor" id="myCheck15">
<span></span>Trip</label>
<input type="checkbox" <?php echo $TripFee4check ?> name="TripFee4" id="TripFee4" value="Trip With Credit Card" style="display:none">
<script>
function toggle1103(source) {
checkboxes = document.getElementsByName('TripFee4');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<?php 
if (!empty($row['TravelInsuranceFee4']))
$TravelInsuranceFee4check='checked';
else
$TravelInsuranceFee4check='';
?>
<input type="checkbox" <?php echo $TravelInsuranceFee4check ?> onClick="toggle1104(this)" class="example1" name="PayingFor" id="myCheck16">
<span></span>Travel Insurance</label>
<input type="checkbox" <?php echo $TravelInsuranceFee4check ?> name="TravelInsuranceFee4" id="TravelInsuranceFee4" value="Travel Insurance With Credit Card" style="display:none">
<script>
function toggle1104(source) {
checkboxes = document.getElementsByName('TravelInsuranceFee4');
	for (var i = 0, n = checkboxes.length; i < n; i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>

</div>
<script>
$("input[name=PayingFor]").change(function(){
    var max= 4;
    if( $("input[name=PayingFor]:checked").length == max ){
        $("input[name=PayingFor]").attr('disabled', 'disabled');
        $("input[name=PayingFor]:checked").removeAttr('disabled');
    }else{
         $("input[name=PayingFor]").removeAttr('disabled');
    }
})
</script>

</div>
<!--end::Credit Card Paying For-->
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-6 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Credit Card Owner-->
<div class="col-xl-3">
<div class="form-group">


<label>Credit Card Owner <span class="text-danger">*</span></label>
<?php
$CCOwner=$row['CCOwner'];
switch ($CCOwner) {
  case "I Am Travelling":
    $VCCOwner=50;
	$ccbox50='';
	$ccbox51='hidden';
    break;
  case "I Am Not Travelling":
    $VCCOwner=51;
	$ccbox50='';
	$ccbox51='';
    break;
  default:
    $VCCOwner=50;
	$ccbox50='hidden';
	$ccbox51='hidden';
}
?>
<select class="form-control form-control-lg" id="select50" name="CCOwner" onChange="selectChanged50(), getSelectValue()">

<?php if (!empty($row['CCOwner'])) { ?>
<option value="<?php echo $VCCOwner ?>"><?php echo $row['CCOwner'] ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php 

	if ($row['RequestPrimaryTravellerCC']=='Yes')
	{
	?>
	<option value="50">I Am Travelling</option>
	<?php	
	}
	else
	{
	?>
	<option value="700">I Am Travelling</option><!--700-->
	<?php	
	}

?>
<option value="51">I Am Not Travelling</option>
<?php
}
?>

</select>

</div>
</div>


<script>
function getSelectValue()
{
var e = document.getElementById("select50").value;


if (e == 51) {
alert ("Third Party Credit Card: Please Upload A Copy Of The Credit Card (Front And Back) And A Government Issued ID.");
}

<?php if ($row['RequestPrimaryTravellerCC']=='Yes') { ?>
if (e == 50) {
alert ("First Party Credit Card: Please Upload A Copy Of The Credit Card (Front And Back).");
}
<?php } ?>

}
</script>

<!--end::Credit Card Owner-->
<!--begin::Credit Card Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Type <span class="text-danger">*</span></label>
<select class="form-control  form-control-lg" name="CCType" id="CCType">
<?php if (!empty($row['CCType'])) { ?>
<option value="<?php echo $row['CCType']; ?>"><?php echo $row['CCType'] ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="AMEX">AMEX</option>
<option value="VISA / VISA Debit">VISA / VISA Debit</option>
<option value="Mastercard">Mastercard</option>
</select>
</div>
</div>
<!--end::Credit Card Type-->


<?php
//GP EDITED -- START
include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php');

$row['CCNumber']=decryptData($row['CCNumber']);
$row['CCExpiry']=decryptData($row['CCExpiry']);
$row['CCVV']=decryptData($row['CCVV']);

//GP EDITED -- END
?>


<!--begin::Credit Card Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Name On Credit Card <span class="text-danger">*</span></label>
<input type="text" name="CCName" id="CCName" value="<?php echo $row['CCName'] ?>" class="form-control  form-control-lg" placeholder="Name On Credit Card" />
</div>
</div>
<!--end::Credit Card Name-->
<!--begin::Credit Card Number-->
<div class="col-xl-3">
<div class="form-group">

<label>Credit Card Number <span class="text-danger">*</span></label>

<?php 
if (!empty($row['CCNumber'])) { 
$CCNSHOW=$row['CCNumber'];
$CCNSHOW = 'xxxxxxxxxx'.substr($CCNSHOW, -4);
}
?>

<input type="text" onChange="myFunction835()" name="CCNSHOW" id="CCNSHOW" value="<?php echo $CCNSHOW ?>" class="form-control form-control-lg" placeholder="Credit Card Number" />
<input type="hidden" name="CCNumber" id="CCNumber" value="<?php echo $row['CCNumber'] ?>"/>
<script>
function myFunction835() {
  var x = document.getElementById("CCNSHOW").value;
  document.getElementById("CCNumber").value = x;
}
</script>


</div>
</div>
<!--end::Credit Card Number-->
<!--begin::Expiry Date-->
<div class="col-xl-3">
<div class="form-group">
<label>Expiry Date (MM/YY) <span class="text-danger">*</span></label>
<input type="text" name="CCExpiry" id="CCExpiry" value="<?php echo $row['CCExpiry'] ?>" class="form-control form-control-lg" placeholder="Expiry Date" />
</div>
</div>
<!--end::Expiry Date-->
<!--begin::CVV Number-->
<div class="col-xl-2">
<div class="form-group">
<label>CVV Number <span class="text-danger">*</span></label>

<?php 
if (!empty($row['CCVV'])) { 

if ($row['CCType']=='AMEX')
$CCVVSHOW = 'xxxx';
else
$CCVVSHOW = 'xxx';

}
?>

<input type="text" onChange="myFunction909()" maxlength="4" max="4" name="CCVVSHOW" id="CCVVSHOW" value="<?php echo $CCVVSHOW ?>" class="form-control  form-control-lg" placeholder="CVV Number" />
<input type="hidden" name="CCVV" id="CCVV" value="<?php echo $row['CCVV'] ?>"/>
<script>
function myFunction909() {
  var x = document.getElementById("CCVVSHOW").value;
  document.getElementById("CCVV").value = x;
}
</script>

</div>
</div>
<!--end::CVV Number-->
<!--begin::Card Holder's Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Card Holder's Phone <span class="text-danger">*</span></label>
<input type="text" name="CCPhone" id="CCPhone" value="<?php echo $row['CCPhone'] ?>" class="form-control  form-control-lg" placeholder="Card Holder's Phone" />
</div>
</div>
<!--end::Card Holder's Phone-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-4">
<div class="form-group">
<label>Card Holder's Email <span class="text-danger">*</span></label>
<input type="text" name="CCEmail" id="CCEmail" value="<?php echo $row['CCEmail'] ?>" class="form-control form-control-lg" placeholder="Card Holder's Email" />
</div>
</div>
<!--end::Card Holder's Email-->
<!--begin::Step 11 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<?php
$CCAddressSame=$row['CCAddressSame'];
switch ($CCAddressSame) {
  case "Yes":
    $CCAddressSameyes='checked';
	$CCAddressSame='none';
    break;
  case "No":
    $CCAddressSameno='checked';
	$CCAddressSame='';
    break;
  default:
    $CCAddressSameno='';
	$CCAddressSame='none';
}
?>
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" <?php echo $CCAddressSameyes ?> name="CCAddressSame" id="myCheck246" onClick="myFunction246()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Credit card billing address is the same as the primary traveller's home address.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 1-->
<!--begin::Step 11 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" <?php echo $CCAddressSameno ?> name="CCAddressSame" id="myCheck247" onClick="myFunction247()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Credit card billing address is a different address.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 2-->
</div>
<!--end::Row-->

<script>
function myFunction246() {
  var checkBox = document.getElementById("myCheck246");
  var text = document.getElementById("box25");
  if (checkBox.checked == true){
    text.style.display = "none";
	document.getElementById("CCPhone").required = false;	
	document.getElementById("CCEmail").required = false;
	document.getElementById("CCAddress").required = false;
	document.getElementById("CCCity").required = false;
	document.getElementById("CCProvince").required = false;
	document.getElementById("CCPostal").required = false;		
	document.getElementById("CCCountry").required = false;
  } else {
     text.style.display = "block";
  }
}
</script>
<script>
function myFunction247() {
  var checkBox = document.getElementById("myCheck247");
  var text = document.getElementById("box25");
  if (checkBox.checked == true){	  
    text.style.display = "block";
	document.getElementById("CCPhone").setAttribute("required", "");
	document.getElementById("CCEmail").setAttribute("required", "");
	document.getElementById("CCAddress").setAttribute("required", "");
	document.getElementById("CCCity").setAttribute("required", "");
	document.getElementById("CCProvince").setAttribute("required", "");
	document.getElementById("CCPostal").setAttribute("required", "");
	document.getElementById("CCCountry").setAttribute("required", "");	
	document.getElementById("CCPhone").required;	
	document.getElementById("CCEmail").required;		
	document.getElementById("CCAddress").required;
	document.getElementById("CCCity").required;
	document.getElementById("CCProvince").required;	
	document.getElementById("CCPostal").required;		
	document.getElementById("CCCountry").required;	
  } else {
     text.style.display = "none";
  }
}
</script>
<div id="box25" style="display:<?php echo $CCAddressSame ?>">
<!--begin::Row-->
<div class="row mt-3">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-6 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Billing Address (Street)-->
<div class="col-xl-9">
<div class="form-group">
<label>Billing Address (Street) <span class="text-danger">*</span></label>
<input type="text" name="CCAddress" id="CCAddress" value="<?php echo $row['CCAddress'] ?>" class="form-control  form-control-lg" placeholder="Billing Address (Street)" />
</div>
</div>
<!--end::Billing Address (Street)-->
<!--begin::Billing Address Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" name="CCUnit" value="<?php echo $row['CCUnit'] ?>" class="form-control  form-control-lg" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Billing Address Unit-->
<!--begin::Billing Address City-->
<div class="col-xl-3">
<div class="form-group">
<label>City <span class="text-danger">*</span></label>
<input type="text" name="CCCity" id="CCCity" value="<?php echo $row['CCCity'] ?>" class="form-control form-control-lg" placeholder="City" />
</div>
</div>
<!--end::Billing Address City-->
<!--begin::Billing Address Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province / State <span class="text-danger">*</span></label>
<input type="text" name="CCProvince" id="CCProvince" value="<?php echo $row['CCProvince'] ?>" class="form-control  form-control-lg" placeholder="Province / State" />
</div>
</div>
<!--end::Billing Address Province-->
<!--begin::Billing Address Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code <span class="text-danger">*</span></label>
<input type="text" name="CCPostal" id="CCPostal" value="<?php echo $row['CCPostal'] ?>" class="form-control  form-control-lg" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Billing Address Postal Code-->
<!--begin::Billing Address Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country <span class="text-danger">*</span></label>
<input type="text" name="CCCountry"  id="CCCountry" value="<?php echo $row['CCCountry'] ?>" class="form-control form-control-lg" placeholder="Country" />
</div>
</div>
<!--end::Billing Address Country-->
</div>
<!--end::Row-->
</div>
<div class="row">
<!--begin::First Party Credit Card Text-->
<div class="col-xl-12 mt-1">


<div class="lead font-weight-bold <?php echo $ccbox50 ?>" id="box50">
<div class="row" id="box52">

<div class="col-xl-12">
<!--begin::Separator-->
<div class="separator separator-dashed mb-6 separator-border-3"></div>
<!--end::Separator-->
<p class="mb-10">Please Upload A Photo Or Scan Of The Required Documentation</p>
</div>

<!--begin::Upload CC Front-->

<?php
$is_cc_front_already_uploaded = !empty($row['CCFront']) ? true: false;

?>

<div class="col-xl-6">
<div class="form-group">
<label>Upload Front Of Credit Card ID (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation10()" name="CCFront" id="CCFront"
    <?php if(!$is_cc_front_already_uploaded) echo ' data-required="yes" validation-message="Please upload Front Of Credit Card." '; ?> />
<input type="hidden" name="CCCFront1" id="CCCFront1" value="<?php echo $row['CCFront'] ?>" />
<script>
Filevalidation10 =() => {
	const fi10 = document.getElementById('CCFront');
		if (fi10.files.length > 0) {
			for (const i = 0; i <= fi10.files.length - 1; i++) {
				const fsize = fi10.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Front Of Credit Card  file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>
    <?php if($is_cc_front_already_uploaded) echo "<p style='color: #005c36;'>Front already uploaded.</p>" ?>
</div>
<!--end::Upload CC Front-->



<!--begin::Upload CC Back-->
<?php
$is_cc_back_already_uploaded = !empty($row['CCBack']) ? true: false;

?>
<div class="col-xl-6">
<div class="form-group">
<label>Upload Back Of Credit Card (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation11()"  name="CCBack" id="CCBack" <?php if(!$is_cc_back_already_uploaded) echo ' data-required="yes" validation-message="Please upload Back Of Credit Card." '; ?> />
<input type="hidden" name="CCCBack1" id="CCCBack1" value="<?php echo $row['CCBack'] ?>" />
<script>
Filevalidation11 =() => {
	const fi11 = document.getElementById('CCBack');
		if (fi11.files.length > 0) {
			for (const i = 0; i <= fi11.files.length - 1; i++) {
				const fsize = fi11.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"Back Of Credit Card file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>
    <?php if($is_cc_back_already_uploaded) echo "<p style='color: #005c36;'>Back already uploaded.</p>" ?>
</div>


<!--end::Upload CC Back-->
</div>


</div>
<!--end::First Party Credit Card Text-->



<!--begin::Third Party Credit Card Text-->
<div class="lead font-weight-bold <?php echo $ccbox51 ?>" id="box51">

<!--begin::Row-->
<div class="row <?php echo $ccbox51 ?>" id="box53">


<?php
$is_government_id_already_uploaded = !empty($row['GovernmentID']) ? true: false;
?>

    <!--begin::Upload Government Issued ID-->
<div class="col-xl-12">
<div class="form-group">
<label>Upload Government Issued ID (PDF, JPG, PNG) <span class="text-danger">*</span></label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="Filevalidation12()" name="GovernmentID" id="GovernmentID"
    <?php if(!$is_government_id_already_uploaded) echo ' data-required="yes" validation-message="Please upload Government Issued ID." '; ?> />
<input type="hidden" name="CGovernmentID1" id="CGovernmentID1" value="<?php echo $row['GovernmentID'] ?>" />
<script>
Filevalidation12 =() => {
	const fi12 = document.getElementById('GovernmentID');
		if (fi12.files.length > 0) {
			for (const i = 0; i <= fi12.files.length - 1; i++) {
				const fsize = fi12.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert(
					"GovernmentID file too Big, please select a file less than 2mb");
				}  
			}
		}
		
	}
</script>
</div>
</div>
</div>
    <?php if($is_government_id_already_uploaded) echo "<p style='color: #005c36;'>Government Issued ID already uploaded.</p>" ?>
</div>
<!--end::Upload Government Issued ID-->
</div>
<!--end::Row-->

</div>



</div>
</div>
<!--end::Third Party Credit Card Text-->
</div>
<!-----------------------------------END OF CREDIT CARD AREA HIDDING------------------------>
<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-5 separator-border-3 mt-1"></div>
</div>
<!--end::Separator-->

<!--begin::Step 11 - Agree Checkbox 3-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" name="DetailsCorrectConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hereby certify that the details I have provided are correct.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 3-->


<!--begin::Step 11 - Agree Checkbox 4-->
<div class="col-xl-12 mt-3 hidden" id="box54" >
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="VerificationPurposesConsent" id="VerificationPurposesConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the card holder is not one of the travellers, they will be contacted for verification purposes.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 4-->

<!--begin::Step 11 - Agree Checkbox 5-->
<div class="col-xl-12 mt-5" id="text99917" style="display:<?php echo $creditcardshow ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $creditcardbox ?> name="CreditCardProcessConsent" id="CreditCardProcessConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that by providing the mentioned credit card details, it will not be processed automatically upon submission of this email form.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 5-->

<!--begin::Step 11 - Agree Checkbox 6-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" name="AdditionalTravelConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if I choose to purchase additional travel options (seat selection, excursions, etc.), I will provide payment authorization to my travel advisor via email.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 6-->
</div>
<!--end::Row-->
</div>





</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->





</div>
<!--end::Accordion-->
</div>
</div>
<!-- end: Invoice body-->
</div>

<!-- begin: Invoice action-->
<div class="row justify-content-center text-center py-8 px-8 py-md-2 px-md-0" id="hideprint">
<div class="col-md-11 text-dark">
<h3 class="font-weight-bolder mb-10" id="">Before Submitting This Email Form, Please Print A Copy For Your Records.</h3>
<div class="d-flex justify-content-center">
<button type="button" class="btn btn-outline-warning btn-light-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mr-5" onclick="window.print();">Print</button>
<!--, validatepricing() onclick="DisplayFunction()"-->
<button type="submit" id="sig-submitBtn" class="btn btn-lg btn-warning px-7 py-5 text-uppercase font-weight-bolder">Submit</button>
<script>
function DisplayFunction() {
  var x = document.getElementById("HiddenDiv");
    x.style.display = "block";
}
</script>
</div>
</div>
</div>
<div class="row justify-content-center mb-10">
<div class="col-md-11">
<div class="spinner spinner-danger spinner-right"  style="display:none" id="HiddenDiv">
<input class="form-control bg-light-danger font-weight-bolder h5 text-danger" value="Please Wait While Your Document(s) Upload. Do Not Close This Window!" readonly/>
</div>
</div>
</div>
<!--end: Invoice action-->
<!--end: Invoice-->
</div>
<?php
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/clients/ssi/email-form-footer.php');?>
</div>
<!-- end::Card-->
</div>
<!--end::Container-->
</div>              
</form>                        
<!--end::Main-->
<!--begin::Sticky Toolbar-->
<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/clients/ssi/footer-scripts.php');?>
<!--end::Global Theme Bundle-->
<!--::JS for signeture-->
<script>
(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sigdataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
</script>
<script>
(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas1");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }
  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }
  // Set up the UI
  var sigText = document.getElementById("sigdataUrl1");
  var sigImage = document.getElementById("sig-image1");
  var clearBtn = document.getElementById("sig-clearBtn1");
  var submitBtn = document.getElementById("sig-submitBtn1");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
</script>
<?php
  }
?>



    <script>
        jQuery(document).ready(function($) {

            $('#booking-authorization-clients-form').on('submit', function(event) {
                // Prevent the form from submitting
                event.preventDefault();

                // Flag to track if the form is valid
                let isValid = true;

                // Iterate over each file input with data-required="yes"
                $('input[type="file"][data-required="yes"]').each(function() {
                    // Check if the input is not within a div with class hidden
                    if (!$(this).closest('div.hidden').length) {
                        if (!this.files.length) {
                            // If no file is selected, get the validation message and alert it
                            const validationMessage = $(this).attr('validation-message');
                            alert(validationMessage);

                            // Set isValid to false since a required file is missing
                            isValid = false;

                            // Exit the each loop
                            return false;
                        }
                    }
                });

                // If the form is valid, proceed with form submission
                if (isValid) {
                    this.submit();
                }
            });
        });
    </script>




</body>
<!--end::Body-->
</html>
<?php 
} else {
  echo "This booking no longer valid!";
}

} 

ob_flush(); ?>