<?php ob_start(); 
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
$ptime=time()-(60*60*24*30);// how far in the past change 7 to any number of days
$_GET['bq']='6035d189a0fec1614139789';
$bq=trim($_GET['bq']); //trim($_GET['tm']);//booking unique number
?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<title>Booking Authorization Form | Centre Holidays</title>
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?>    
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
    1: [0, 1],
    2: [0, 1, 2],
    3: [0, 1, 2, 3],
    4: [0, 1, 2, 3, 4],
    5: [0, 1, 2, 3, 4, 5],
    6: [0, 1, 2, 3, 4, 5, 6],
    7: [0, 1, 2, 3, 4, 5, 6, 7],
    8: [0, 1, 2, 3, 4, 5, 6, 7, 8],
    21: [21, 25],
    22: [22],
    23: [23],
    24: [24],
	50: [50],
    51: [51]				 
    }
	function selectChanged50() {
    var sel = document.getElementById("select50");
    for (var i = 50; i < 52; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }	
	function selectChanged1() {
    var sel = document.getElementById("select1");
    for (var i = 1; i < 9; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
	function selectChanged21() {
    var sel = document.getElementById("select21");
    for (var i = 21; i < 26; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
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
<body id="kt_body" class="print-content-only header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
<?php if ($_GET['results']==1) { ?>
<!--begin::Modal-->
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-success">
<h3 class="mb-0 font-weight-bolder text-light">Booking Authorization Form Submitted</h3>
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?bq=<?php echo $bq ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
<i aria-hidden="true" class="ki ki-close text-light"></i>
</a>
</div>
<div class="modal-body">
<p class="lead">Your form has been sent to your agent.<br>
<br>
To ensure that they receive it, send them an email letting them to know to look out for it and if they do not see the email in their inbox, they are to check their spam folder.</p>
</div>
<div class="modal-footer">
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?bq=<?php echo $bq ?>" type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</a>
</div>
</div>
</div>
</div>
<!--end::Modal--> 	
<?php } ?>
<!--begin::Main-->
<form action="booking-authorization-clients-insert.php" enctype="multipart/form-data" method="post">
<div class="d-flex flex-column-fluid pt-10 pb-10">
<!--begin::Container-->
<div class="container">
<!-- begin::Card-->
<div class="card card-custom overflow-hidden">
<?php
//=======================recall information===========================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
//=================================Update status to 2 aka seen========
$sql32 = "UPDATE booking_1 SET BookingStatus='3' WHERE BookUnique='$bq'";
if (mysqli_query($conn, $sql32)) {
 // echo "Record updated successfully";
} else {
 // echo "Error updating record: " . mysqli_error($conn);
}

//=================================Get information from DB============
$sql = "SELECT * FROM booking_1 WHERE BookingTime > $ptime  AND (BookingStatus=1 || BookingStatus=2 || BookingStatus=3) AND BookUnique='$bq' LIMIT 1";
//$sql = "SELECT * FROM booking_1 ORDER BY BookID DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
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
	<?php } else { ?>
    <script>
	function totalIt() {
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
    document.getElementsByName("TotalAmountDue")[0].value = total.toFixed(2);
	document.getElementsByName("TotalAmountDue3")[0].value = total.toFixed(2);
    }
    </script>
    <?php } else { ?>
    <script>
	function totalIt2() {
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
<h4 class="text-white font-weight-boldest mb-5 align-items-md-end">BOOKING AUTHORIZATION FORM</h4>														
<span>For Assistance, Please Call <b><?php echo $row["BusinessPhone"] ?></b></span>
</span>
</div>
<div class="border-bottom w-100 opacity-20"></div>
<div class="d-flex justify-content-between text-white pt-6">
<div class="d-flex flex-column flex-root lead">
<p>This booking authorization form consists of multiple sections. Please review the details provided, fill in anything that is required and submit the form to your travel advisor, <b><?php echo $row["BusinessFullName"] ?></b>.</p>
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
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->


<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading1">
<div class="card-title font-size-h2 font-weight-bolder text-warning" data-toggle="collapse" data-target="#baf1" aria-expanded="true" aria-controls="baf1" role="button">
<div class="card-label">Primary Traveller</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf1" class="collapse show" aria-labelledby="baf-heading1" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">State your details as it is on your passport. Your contact details will be submitted to the airline for notifications.</p>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Primary Traveller Title-->
<div class="col-xl-3">
<div class="form-group">
<input type="hidden" value="<?php echo $bq ?>" name="bq" />
<input type="hidden" value="<?php echo $row['BookID'] ?>" name="BookID" />
<label>Title</label>
<select class="form-control  form-control-lg" name="PTravellerTitle">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="PTravellerFName" value="" class="form-control  form-control-lg" placeholder="First Name" />
</div>
</div>
<!--end::Primary Traveller First Name-->
<!--begin::Primary Traveller Middle Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Middle Name</label>
<input type="text" value="" name="PTravellerMName" class="form-control  form-control-lg" placeholder="Middle Name" />
</div>
</div>
<!--end::Primary Traveller Middle Name-->
<!--begin::Primary Traveller Last Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Last Name</label>
<input type="text" value="" name="PTravellerLName" class="form-control  form-control-lg" placeholder="Last Name" />
</div>
</div>
<!--end::Primary Traveller Last Name-->
<!--begin::Primary Traveller DOB-->
<div class="col-xl-3">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="" name="PTravellerDOB" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date">
</div>
</div>
<!--end::Primary Traveller DOB-->
<!--begin::Primary Traveller Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Phone</label>
<input type="text" value="" name="PTravellerPhone" class="form-control  form-control-lg" placeholder="Phone" />
</div>
</div>
<!--end::Primary Traveller Phone-->
<!--begin::Primary Traveller Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Email</label>
<input type="text" value="" name="PTravellerEmail" class="form-control  form-control-lg" placeholder="Email" />
</div>
</div>
<!--end::Primary Traveller Email-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-6">
<div class="form-group">
<label>Home Address (Street)</label>
<input type="text" value="" name="PTravellerStreet" class="form-control form-control-lg" placeholder="Street Address" />
</div>
</div>
<!--end::Primary Traveller Street-->
<!--begin::Primary Traveller Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" value="" name="PTravellerUnit" class="form-control form-control-lg" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Primary Traveller Unit-->
<!--begin::Primary Traveller City-->
<div class="col-xl-3">
<div class="form-group">
<label>City</label>
<input type="text" name="PTravellerCity" value="" class="form-control form-control-lg" placeholder="City" />
</div>
</div>
<!--end::Primary Traveller City-->
<!--begin::Primary Traveller Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province/State</label>
<input type="text" name="PTravellerProvince" value="" class="form-control form-control-lg" placeholder="Province/State" />
</div>
</div>
<!--end::Primary Traveller Province-->
<!--begin::Primary Traveller Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code</label>
<input type="text" name="PTravellerPostal" value="" class="form-control form-control-lg" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Primary Traveller Postal Code-->
<!--begin::Primary Traveller Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country</label>
<input type="text" name="PTravellerCountry" value="" class="form-control form-control-lg" placeholder="Country" />
</div>
</div>
<!--end::Primary Traveller Country-->
<!--begin::Primary Traveller Additional Travellers-->
<div class="col-xl-3">
<div class="form-group">
<label>Additional Travellers In Party</label>
<select class="form-control  form-control-lg" name="PTravellerParty" id="select1" onchange="selectChanged1()" required> 
<option value="">None</option>
<option value="1">1 Additional Traveller</option>
<option value="2">2 Additional Travellers</option>
<option value="3">3 Additional Travellers</option>
<option value="4">4 Additional Travellers</option>
<option value="5">5 Additional Travellers</option>
<option value="6">6 Additional Travellers</option>
<option value="7">7 Additional Travellers</option>
<option value="8">8 Additional Travellers</option>
</select>
</div>
</div>
<!--end::Primary Traveller Additional Travellers-->
<!--begin::Primary Traveller Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="PTravellerNotes" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Primary Traveller Notes-->
<!--begin::Step 1 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="PTravellerConsent1" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hearby certify that the details provided are correct as per my passport.</small></label>
</div>
<!--end::Step 1 - Agree Checkbox 1-->
<!--begin::Step 1 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="PTravellerConsent2" value="Yes">
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
<?php if (!empty( $row["ServiceNumberPersons"]) && !empty( $row["ServiceFeePerPerson"]) && (!empty( $row["ServiceDetails"]) || !empty( $row["ServicePDF"]))) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['ServiceAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['ServiceAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading2">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf2" aria-expanded="false" aria-controls="baf2" role="button">
<div class="card-label">Service Fee Agreement</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf2" class="collapse" aria-labelledby="baf-heading2" data-parent="#baf">
<div class="card-body lead pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
<div class="row mt-10">
<!--begin::SFA - Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" name="ServiceNumberPersons" value="<?php echo $row["ServiceNumberPersons"] ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" readonly />
</div>
</div>
<!--end::SFA - Number Of Persons-->
<!--begin::SFA - Fee PP-->
<div class="col-xl-4">
<div class="form-group">
<label>Service Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="ServiceFeePerPerson" value="<?php echo number_format($row["ServiceFeePerPerson"], 2, '.', ''); ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Fee Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Fee PP-->
<!--begin::SFA - Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Service Fee Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php
if (!empty($row["ServiceGrandTotal"]))
$ServiceGrandTotal=$row["ServiceGrandTotal"];
else
$ServiceGrandTotal=0.00;
$ServiceGrandTotal=number_format($ServiceGrandTotal, 2, '.', '')
?>
<input name="ServiceGrandTotal" value="<?php echo $ServiceGrandTotal ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Service Fee Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Grand Total-->

<?php if (!empty( $row["ServiceDetails"] )) { ?>
<!--begin::SFA - Details-->
<div class="col-xl-12">
<label>Service Fee Details</label>										
<div class="card card-custom card-border bg-light mb-7">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $row["ServiceDetails"] ?>
</div>
</div>
</div>
</div>
<!--end::SFA - Details-->
<?php } ?>

<?php if (!empty( $row["ServicePDF"] )) { ?>
<!--begin::SFA Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["ServicePDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Service Fee Agreement</a>
</div>
<?php } ?>
<!--end::SFA Document-->
<!--begin::Step 2 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-outline-2x radio-success radio-lg">
<input type="radio" name="ServiceAccepted" value="Yes" id="myCheck736" onclick="myFunction736()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Service Fee Agreement.</small></label>
</div>
<!--end::Step 2 - Agree Checkbox 1-->
<!--begin::Step 2 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="radio radio-outline radio-outline-2x radio-danger radio-lg">
<input type="radio" id="myCheck737" name="ServiceAccepted" value="No" onclick="myFunction737()">
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
<!--begin::SFA - Reason-->
<div class="col-xl-12 mt-2" id="text737" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="ServiceNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
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
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['CovidAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['CovidAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading3">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf3" aria-expanded="false" aria-controls="baf3" role="button">
<div class="card-label">COVID-19 Waiver</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf3" class="collapse" aria-labelledby="baf-heading3" data-parent="#baf">
<div class="card-body lead pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
<div class="row mt-10">
<!--begin::COVID Waiver Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p>By providing my signature below, it is my confirmation that I requested that my Centre Holidays Travel Advisor, an independently owned and operated travel business ("Agency"), book travel arrangements on my behalf. Due to the ongoing COVID-19 pandemic, I acknowledge and fully understand that these travel arrangements may be interrupted or cancelled by the associated travel supplier, a government entity, or another third party outside of the Agency's control for reasons that are unforeseeable at this time. I also understand and acknowledge that travel involves the risk of a variety of hazards to health and/or safety, including but not limited to, injury, illness, disease, epidemics, and/or pandemics. I expressly understand and agree that I assume all such risks associated with travel whether or not specified herein. I further understand and acknowledge that the Agency has no control over the associated supplier's policies which, in addition to applicable law, will solely govern any cancellation, rebooking, and refund related to these travel arrangements.
<br>
<br>
I also understand and acknowledge that the purchase of travel insurance is highly recommended and that coverage for circumstances such as these depends on the specific policy I purchase. Should I elect to obtain coverage, the travel insurance policy obtained by me to cover these travel arrangements will dictate any coverage for financial loss resulting from these circumstances.
<br>
<br>
As such, by signing below, I hereby agree to hold the Agency harmless and release it from any and all liability for any damages including, without limitation, monetary losses, damage to person or property, illness/disease, delays, negligence, or inconvenience, that I may incur as a result of the circumstances described herein.</p>
</div>
</div>
</div>
</div>
<!--end::COVID Waiver Text-->
<!--begin::Step 3 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="CovidConsent1" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I acknowledge and fully understand that these travel arrangements may be interrupted or cancelled by the associated travel supplier, a government entity, or another third party outside of the agency's control for reasons that are unforeseeable at this time.</small></label>
</div>
<!--end::Step 3 - Agree Checkbox 1-->
<!--begin::Step 3 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-7">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="CovidConsent2" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that I will be signing on behalf of myself and any other travellers on this trip. The signature provided below will serve as my digital signature.</small></label>
</div>
<!--end::Step 3 - Agree Checkbox 2-->
<!--begin::COVID Waiver Full Name-->
<div class="col-xl-12">
<div class="form-group">
<label>Full Name (Primary Traveller)</label>
<input type="text" name="CovidConsentName" value="" class="form-control form-control-lg" placeholder="Full Name (Primary Traveller)" />
</div>
</div>
<!--end::COVID Waiver Full Name-->
<!--begin::COVID Waiver Signature-->
<div class="col-xl-12">
<div class="form-group">
<label>Signature (Primary Traveller)</label>
<br />
<canvas id="sig-canvas" width="620" height="160">
  Please download Chrome browser.
</canvas>
<br />
<button type="button" id="sig-clearBtn" class="btn btn-light-warning text-uppercase font-weight-bolder mt-2">Clear Signature</button>
<textarea id="sig-dataUrl" name="sig-dataUrl" rows="5" class="hidden">
<?php echo $_POST['sig-dataUrl'] ?>
</textarea>
<?php if (!empty($_POST['sig-dataUrl'])) { ?>
<img src="<?php echo $_POST['sig-dataUrl'] ?>" alt="Signature" style="width:300px; height:auto; max-height:300px">
<?php } ?>
</div>
</div>
<!--end::COVID Waiver Signature-->
<!--begin::Step 3 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" name="CovidAccepted" id="myCheck76600" value="Yes" onClick="myFunction76700()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the COVID-19 Waiver.</small></label>
</div>
<!--begin::Step 3 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" id="myCheck747" name="CovidAccepted" value="No" onclick="myFunction747()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the COVID-19 Waiver.</small></label>
</div>
<script>
function myFunction747() {
  var checkBox = document.getElementById("myCheck747");
  var text = document.getElementById("text747");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
<script>
function myFunction76700() {
  var checkBox = document.getElementById("myCheck76700");
  var text = document.getElementById("text747");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
<!--end::Step 3 - Do Not Agree Checkbox-->
<!--begin::COVID Waiver Reason-->
<div class="col-xl-12 mt-2" id="text747" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="CovidNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
</div>
</div>
<!--end::COVID Waiver Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->


<?php if (!empty($row["TripDetails"]) || !empty($row["TripDetailsPDF"])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['TripAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['TripAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading4">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf4" aria-expanded="false" aria-controls="baf4" role="button">
<div class="card-label">Trip Details</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf4" class="collapse" aria-labelledby="baf-heading4" data-parent="#baf">
<div class="card-body lead pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
<div class="row mt-10">

<?php if (!empty( $row["TripDetails"] )) { ?>
<!--begin::Trip Details Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $row['TripDetails'] ?>
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

<!--begin::Step 4 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" name="TripAccepted" id="myCheck766" value="Yes" onClick="myFunction767()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Details.</small></label>
</div>
<!--end::Step 4 - Agree Checkbox-->

<!--begin::Step 4 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="TripAccepted" id="myCheck767" value="No" onClick="myFunction767()">
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

<!--end::Step 4 - Do Not Agree Checkbox-->
<!--begin::Trip Details Reason-->
<div class="col-xl-12 mt-2" id="text767" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TripNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
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
if (!empty($row['PricePerPerson1']) && !empty($row['NumberOfPersons1']))
{
?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['TripPricingAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['TripPricingAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading5">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf5" aria-expanded="true" aria-controls="baf5" role="button">
<div class="card-label">Trip Pricing &amp; Payment Schedule</div>
</div>
</div>
<!--end::Header-->

<!--begin::Body-->
<div id="baf5" class="collapse" aria-labelledby="baf-heading5" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided and select the pricing options that pertain to you. Your grand total will be adjusted accordingly.
</p>
<!--begin::Row-->


<?php 
if (!empty($row['PricePerPerson1']) || !empty($row['PricePerPerson2']) || !empty($row['PricePerPerson3']) || !empty($row['PricePerPerson4']) || !empty($row['PricePerPerson5']))
{
?>
<div class="row mt-10">
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
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson1" value="<?php echo $row['PricePerPerson1'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice1" value="<?php echo $row['TotalPrice1'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->
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
<!--begin::Pricing Option 1 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" value="<?php echo $row['TotalPrice1'] ?>" type="checkbox" onclick="totalIt(),totalIt2(),subtrIt()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
</div>
<!--end::Pricing Option 1 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php
}
?>


<?php 
if (!empty($row['PricePerPerson2']) && !empty($row['NumberOfPersons2']))
{
?>
<div class="row mt-10">
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
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson2" value="<?php echo $row['PricePerPerson2'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice2" value="<?php echo $row['TotalPrice2'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
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
<!--begin::Pricing Option 2 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" value="<?php echo $row['TotalPrice2'] ?>" type="checkbox" onclick="totalIt(),totalIt2(),subtrIt()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
</div>
<!--end::Pricing Option 2 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php
}
?>
<?php 
if (!empty($row['PricePerPerson3']) && !empty($row['NumberOfPersons3']))
{
?>
<div class="row mt-10">
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
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson3" value="<?php echo $row['PricePerPerson3'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice3" value="<?php echo $row['TotalPrice3'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
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
<!--begin::Pricing Option 3 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" value="<?php echo $row['TotalPrice3'] ?>" type="checkbox" onclick="totalIt(),totalIt2(),subtrIt()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
</div>
<!--end::Pricing Option 3 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php
}
?>
<?php 
if (!empty($row['PricePerPerson4']) && !empty($row['NumberOfPersons4']))
{
?>
<div class="row mt-10">
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
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson4" value="<?php echo $row['PricePerPerson4'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice4" value="<?php echo $row['TotalPrice4'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
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
<!--begin::Pricing Option 4 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" value="<?php echo $row['TotalPrice4'] ?>" type="checkbox" onclick="totalIt(),totalIt2(),subtrIt()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
</div>
<!--end::Pricing Option 4 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php
}
?>
<?php 
if (!empty($row['PricePerPerson5']) && !empty($row['NumberOfPersons5']))
{
?>
<div class="row mt-10">
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
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PricePerPerson5" value="<?php echo $row['PricePerPerson5'] ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Price Per Person" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalPrice5" value="<?php echo $row['TotalPrice5'] ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
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
<!--begin::Pricing Option 5 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="PricingOption5" value="Yes">
<input name="product[]" value="<?php echo $row['TotalPrice5'] ?>" type="checkbox" onclick="totalIt(),totalIt2(),subtrIt()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
</div>
<!--end::Pricing Option 5 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<?php
}
?>
<?php if (!empty($row['FullPaymentDate'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule - Full Payment-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="FullPayment" value="<?php echo $row['FullPayment']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule - Full Payment-->
<!--begin::Pricing Schedule - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text"  name="FullPaymentDate" value="<?php echo $row['FullPaymentDate']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule - Due Date-->
<!--begin::Pricing Schedule - Total Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Total Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalAmountDue" id="TotalAmountDue" value="0.00" class="form-control form-control-lg bg-light-success" placeholder="Total Amount Due (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule - Total Amount-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (!empty($row['PaymentDue1'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 1 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType1" value="<?php echo $row['PaymentType1']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Payment Type-->
<!--begin::Pricing Schedule 1 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate1" value="<?php echo $row['PaymentDate1']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Due Date-->
<!--begin::Pricing Schedule 1 - Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue1" id="PaymentDue1" value="<?php echo $row['PaymentDue1']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount Due (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 1 - Amount-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (!empty($row['PaymentDue2'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 2 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType2" value="<?php echo $row['PaymentType2']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Payment Type-->
<!--begin::Pricing Schedule 2 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate2" value="<?php echo $row['PaymentDate2']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Due Date-->
<!--begin::Pricing Schedule 2 - Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue2" id="PaymentDue2" value="<?php echo $row['PaymentDue2']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount Due (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 2 - Amount-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (!empty($row['PaymentDue3'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 3 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType3" value="<?php echo $row['PaymentType3']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Payment Type-->
<!--begin::Pricing Schedule 3 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate3" value="<?php echo $row['PaymentDate3']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Due Date-->
<!--begin::Pricing Schedule 3 - Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue3" id="PaymentDue3" value="<?php echo $row['PaymentDue3']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount Due (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 3 - Amount-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (!empty($row['PaymentDue4'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 4 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType4" value="<?php echo $row['PaymentType4']; ?>" class="form-control form-control-lg bg-light" placeholder="Payment Type" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Payment Type-->
<!--begin::Pricing Schedule 4 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate4" value="<?php echo $row['PaymentDate4']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Due Date-->
<!--begin::Pricing Schedule 4 - Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue4" id="PaymentDue4" value="<?php echo $row['PaymentDue4']; ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount Due (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 4 - Amount-->
</div>
<!--end::Row-->
<?php } ?>
<?php if (!empty($row['PaymentDate5'])) { ?>
<!--begin::Row-->
<div class="row">
<script>
function subtrIt() {
var y = document.getElementById("total").value;
<?php if (!empty($row['PaymentDue1'])) { ?>
var a = document.getElementById("PaymentDue1").value;
<?php } if (!empty($row['PaymentDue2'])) { ?>
var b = document.getElementById("PaymentDue2").value;
<?php } if (!empty($row['PaymentDue3'])) { ?>
var c = document.getElementById("PaymentDue3").value;
<?php } if (!empty($row['PaymentDue4'])) { ?>
var d = document.getElementById("PaymentDue4").value;
<?php }  ?>
var x = Number(y) 
<?php if (!empty($row['PaymentDue1'])) { ?>
- Number(a) 
<?php } if (!empty($row['PaymentDue2'])) { ?>
- Number(b)
<?php } if (!empty($row['PaymentDue3'])) { ?>
- Number(c)
<?php } if (!empty($row['PaymentDue4'])) { ?>
- Number(d)
<?php }  ?>
;
document.getElementById("PaymentDue5").value = x;
}
</script>
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
<label>Final Payment Due Date (M/D/Y)</label>
<input type="text" name="PaymentDate5" value="<?php echo $row['PaymentDate5']; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 5 - Due Date-->
<!--begin::Pricing Schedule 5 - Amount-->
<div class="col-xl-4">
<div class="form-group">
<label>Final Amount Due (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue5" id="PaymentDue5" value="0.00" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Amount Due (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 5 - Amount-->
</div>
<!--end::Row-->
<?php } ?>
<!--begin::Row-->
<div class="row">
<!--begin::Step 5 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" id="myCheck226" name="TripPricingAccepted" value="Yes" onClick="myFunction226()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Pricing and Payment Schedule.</small></label>
</div>
<!--end::Step 5 - Agree Checkbox-->
<!--begin::Step 5 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" id="myCheck227" name="TripPricingAccepted" value="No" onClick="myFunction227()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Pricing and Payment Schedule.</small></label>
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
<!--begin::Trip Pricing Reason-->
<div class="col-xl-12 mt-2" id="text227" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TripPricingNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
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

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['TermAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['TermAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading6">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf6" aria-expanded="false" aria-controls="baf6" role="button">
<div class="card-label">Trip Terms & Conditions</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf6" class="collapse" aria-labelledby="baf-heading6" data-parent="#baf">
<div class="card-body lead pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
<div class="row mt-10">
<!--begin::T&C Text-->
<div class="col-xl-12">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<?php
if (!empty($row["TermsAndConditions"]))
echo $row["TermsAndConditions"];
else
{
?>
<p>Centre Holidays' terms and conditions apply to all Centre Holidays trips. 
They are a binding agreement between the travel advisor, traveller and Centre Holidays Inc.</p>
<?php
}
?>
</div>
</div>
</div>
</div>
<!--end::T&C Text-->
<?php
if (!empty($row["TermsAndConditionsPDF"]))
{
?>
<!--begin::Travel Advisor T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $row["TermsAndConditionsPDF"] ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Trip Terms & Conditions</a>
</div>
<!--end::Travel Advisor T&C-->
<?php
}
?>
<!--begin::CH T&C-->
<div class="col-xl-12 mb-7">
<a href="#" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase" type="button">See Centre Holidays' Terms & Conditions</a>
</div>
<!--end::CH T&C-->
<!--begin::Step 6 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio"  name="TermAccepted" value="Yes" id="myCheck776" onClick="myFunction776()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to all the Terms & Conditions.</small></label>
</div>
<!--end::Step 6 - Agree Checkbox-->
<!--begin::Step 6 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="TermAccepted" value="No" id="myCheck777" onClick="myFunction777()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to all the Terms & Conditions.</small></label>
</div>

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
<!--begin::T&C Reason-->
<div class="col-xl-12 mt-2" id="text777" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="TermNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
</div>
</div>
<!--end::T&C Reason-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->


<?php if (!empty($row["CancellationPolicy"]) || !empty($row["CancellationPolicyPDF"])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">

<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['CancelAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['CancelAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading7">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf7" aria-expanded="false" aria-controls="baf7" role="button">
<div class="card-label">Trip Cancellation Policy</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf7" class="collapse" aria-labelledby="baf-heading7" data-parent="#baf">
<div class="card-body lead pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
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
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" name="CancelAccepted" id="myCheck976" onClick="myFunction976()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Cancellation Policy.</small></label>
</div>
<!--end::Step 7 - Agree Checkbox-->
<!--begin::Step 7 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="CancelAccepted" id="myCheck977" onClick="myFunction977()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Cancellation Policy.</small></label>
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

<!--begin::Cancellation Policy Reason-->
<div class="col-xl-12 mt-2" id="text977" style="display:none">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea name="CancelNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
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
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['InsuranceAccepted'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['InsuranceAccepted'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading8">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf8" aria-expanded="true" aria-controls="baf8" role="button">
<div class="card-label">Travel Insurance</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf8" class="collapse" aria-labelledby="baf-heading8" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided and select the pricing options that pertain to you. Your grand total will be adjusted accordingly.
</p>
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
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice1" value="<?php echo $row['InsuranceTotalPrice1']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->

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
<!--begin::Pricing Option 1 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="product77[]" value="<?php echo $row['InsuranceTotalPrice1']; ?>" onclick="totalIt77()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
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
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice2" value="<?php echo $row['InsuranceTotalPrice2']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
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
<!--begin::Pricing Option 2 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="product77[]" value="<?php echo $row['InsuranceTotalPrice2']; ?>" onclick="totalIt77()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
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
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice3" value="<?php echo $row['InsuranceTotalPrice3']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
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
<!--begin::Pricing Option 3 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="product77[]" value="<?php echo $row['InsuranceTotalPrice3']; ?>" onclick="totalIt77()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
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
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice4" value="<?php echo $row['InsuranceTotalPrice4']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
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
<!--begin::Pricing Option 4 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="product77[]" value="<?php echo $row['InsuranceTotalPrice4']; ?>" onclick="totalIt77()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
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
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceTotalPrice5" value="<?php echo $row['InsuranceTotalPrice5']; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
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
<!--begin::Pricing Option 5 - Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="product77[]" value="<?php echo $row['InsuranceTotalPrice5']; ?>" onclick="totalIt77()" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
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

<!--begin::Step 8 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" onClick="myFunction444()" id="myCheck444" name="InsuranceAccepted" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Travel Insurance details.</small></label>
</div>
<!--end::Step 8 - Agree Checkbox-->

<!--begin::Step 8 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="InsuranceAccepted" id="myCheck445" onClick="myFunction445()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Travel Insurance details.</small></label>
</div>
<!--end::Step 8 - Do Not Agree Checkbox-->
<!--begin::Step 8 - Do Not Purchase Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="InsuranceAccepted" id="myCheck446" onClick="myFunction446()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not wish to purchase Travel Insurance.</small></label>
</div>
<!--end::Step 8 - Do Not Purchase Checkbox-->
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
<textarea name="InsuranceNoAccepted" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason"></textarea>
</div>
</div>
<!--end::Travel Insurance Reason-->
</div>
<!--end::Row-->

<?php } ?>

<!--begin::Row-->
<div class="row">
<!--begin::Purchase Travel Insurance-->
<?php if (empty( $row['InsurancePricePerPerson1']) && empty( $row['InsurancePricePerPerson2']) && empty( $row['InsurancePricePerPerson3']) && empty( $row['InsurancePricePerPerson4']) && empty( $row['InsurancePricePerPerson5'])) { ?>
<div class="col-xl-12">
<label>Would You Like To Purchase Travel Insurance?</label>
</div>
<!--begin::Step 8 - Send Insurance Quote-->
<div class="col-xl-12">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" onClick="myFunction4447()" id="myCheck4447"  name="PurchaseInsurance" value="Yes, Please Send Me A Quote">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Yes, Please Send Me A Quote.</small></label>
</div>
<!--end::Step 8 - Send Insurance Quote-->
<!--end::Step 8 - Do Not Purchase Insurance-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input type="radio" name="PurchaseInsurance" id="myCheck4447" onClick="myFunction4447()" value="No, I Do Not Wish To Purchase Travel Insurance">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">No, I Do Not Wish To Purchase Travel Insurance.</small></label>
</div>
<!--end::Step 8 - Do Not Purchase Insurance-->
<script>
function myFunction4447() {
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
<div id="box446" style="display:none">
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
<!--end::Travel Insurance Waiver-->
<!--begin::Step 8 - Insurance Waiver Checkbox-->
<div class="col-xl-12 mt-3 mb-7">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="InsuranceWeaverConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that I have chosen to decline purchasing travel insurance for myself and any other travellers in my party. The signature I provide below will serve as my digital signature.</small></label>
</div>
<!--end::Step 8 - Insurance Waiver Checkbox-->
<!--begin::Insurance Waiver Primary Traveller Full Name-->
<div class="col-xl-12">
<div class="form-group">
<label>Full Name (Primary Traveller)</label>
<input type="text" name="InsuranceWeaverConsentName" value="" class="form-control form-control-lg" placeholder="Full Name (Primary Traveller)" />
</div>
</div>
<!--end::Insurance Waiver Primary Traveller Full Name-->
<!--begin::Insurance Waiver Primary Traveller Signature-->
<div class="col-xl-12">
<div class="form-group">
<label>Signature (Primary Traveller)</label>
<br />
<canvas id="sig-canvas1" width="620" height="160">
  Please download Chrome browser.
</canvas>
<br />
<button type="button" id="sig-clearBtn1" class="btn btn-light-warning text-uppercase font-weight-bolder mt-2">Clear Signature</button>

<textarea id="sig-dataUrl" name="sig-dataUrl1" rows="5" class="hidden">
<?php echo $_POST['sig-dataUrl1'] ?>
</textarea>
<?php if (!empty($_POST['sig-dataUrl1'])) { ?>
<img src="<?php echo $_POST['sig-dataUrl1'] ?>" alt="Signature" style="width:300px; height:auto; max-height:300px">
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


<?php if (!empty($row['AdditionalTitle1'])) { ?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['BookingStatus'] ==1 || $row['BookingStatus'] ==2) { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
<?php if ($row['AdditionalConsent'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($row['AdditionalConsent'] =='No') { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading9">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf9" aria-expanded="true" aria-controls="baf9" role="button">
<div class="card-label">Additional Information</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf9" class="collapse" aria-labelledby="baf-heading9" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">Please review the details provided.</p>
<!--begin::Table-->
<div class="table-responsive lead">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-center align-middle">
<tr>
  <th class="lead" scope="col" style="min-width: 250px">Title</th>
  <th class="lead" style="min-width: 75px" scope="col">Go</th>
</tr>
</thead>
<tbody>
<?php if (!empty($row['AdditionalTitle1']) && !empty($row['AdditionalTitle2']) && !empty($row['AdditionalTitle3'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle1'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL1'])) { ?>
  <a href="<?php echo $row["AdditionalURL1"] ?>" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
  <?php } if (!empty($row['AdditionalPDF1'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF1"] ?>"  title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
  <?php } ?>
  </td>
</tr>
<?php } ?>
<?php if (!empty($row['AdditionalTitle2'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle2'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL2'])) { ?>
  <a href="<?php echo $row["AdditionalURL2"] ?>" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
  <?php } if (!empty($row['AdditionalPDF2'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF2"] ?>"  title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
  <?php } ?>
  </td>
</tr>
<?php } ?>
<?php if (!empty($row['AdditionalTitle3'])) { ?>
<tr>
  <td class="align-middle"><?php echo $row['AdditionalTitle3'] ?></td>
  <td class="text-center align-middle">
  <?php if (!empty($row['AdditionalURL3'])) { ?>
  <a href="<?php echo $row["AdditionalURL3"] ?>" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
  <?php } if (!empty($row['AdditionalPDF3'])) { ?>
  <a href="../img/agents/booking-authorization-email-form/<?php echo $row["AdditionalPDF3"] ?>"  title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a>
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
<input type="checkbox" name="AdditionalConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I have reviewed the details provided.</small></label>
</div>
<!--end::Step 9 - Checkbox 1-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>


<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--BELOW SEPARATE DATABASE--------------------------------------------------------->
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['AddTravelConsent1'] =='Yes' && $row['AddTravelConsent2'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>	
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6 hidden" id="box0"><!--begin::Header-->
<div class="card-header" id="baf-heading10">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf10" aria-expanded="true" aria-controls="baf10" role="button">
<div class="card-label">Additional Travellers In Party</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf10" class="collapse" aria-labelledby="baf-heading10" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">State your details as it is on your passport. Your contact details will be submitted to the airline for notifications.</p>
<!--begin::Row-->
<div class="row mt-10 hidden"  id="box1">
<!--begin::Additional Traveller 1 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle1">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName1" value="" class="form-control  form-control-lg" placeholder="Traveller 1" />
</div>
</div>
<!--end::Additional Traveller 1 First Name-->
<!--begin::Additional Traveller 1 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName1" value="" class="form-control  form-control-lg" placeholder="Traveller 1" />
</div>
</div>
<!--end::Additional Traveller 1 Middle Name-->
<!--begin::Additional Traveller 1 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName1" value="" class="form-control  form-control-lg" placeholder="Traveller 1" />
</div>
</div>
<!--end::Additional Traveller 1 Last Name-->
<!--begin::Additional Traveller 1 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB1" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 1 DOB-->
<!--begin::Additional Traveller 1 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes1" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 1 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden"  id="box2">
<!--begin::Additional Traveller 2 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle2">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName2" value="" class="form-control  form-control-lg" placeholder="Traveller 2" />
</div>
</div>
<!--end::Additional Traveller 2 First Name-->
<!--begin::Additional Traveller 2 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName2" value="" class="form-control  form-control-lg" placeholder="Traveller 2" />
</div>
</div>
<!--end::Additional Traveller 2 Middle Name-->
<!--begin::Additional Traveller 2 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName2" value="" class="form-control  form-control-lg" placeholder="Traveller 2" />
</div>
</div>
<!--end::Additional Traveller 2 Last Name-->
<!--begin::Additional Traveller 2 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB2" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 2 DOB-->
<!--begin::Additional Traveller 2 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes2" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 2 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden" id="box3">
<!--begin::Additional Traveller 3 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle3">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName3" value="" class="form-control  form-control-lg" placeholder="Traveller 3" />
</div>
</div>
<!--end::Additional Traveller 3 First Name-->
<!--begin::Additional Traveller 3 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName3" value="" class="form-control  form-control-lg" placeholder="Traveller 3" />
</div>
</div>
<!--end::Additional Traveller 3 Middle Name-->
<!--begin::Additional Traveller 3 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName3" value="" class="form-control  form-control-lg" placeholder="Traveller 3" />
</div>
</div>
<!--end::Additional Traveller 3 Last Name-->
<!--begin::Additional Traveller 3 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB3" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 3 DOB-->
<!--begin::Additional Traveller 3 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes3" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 3 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden"  id="box4">
<!--begin::Additional Traveller 4 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle4">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName4" value="" class="form-control  form-control-lg" placeholder="Traveller 4" />
</div>
</div>
<!--end::Additional Traveller 4 First Name-->
<!--begin::Additional Traveller 4 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName4" value="" class="form-control  form-control-lg" placeholder="Traveller 4" />
</div>
</div>
<!--end::Additional Traveller 4 Middle Name-->
<!--begin::Additional Traveller 4 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName4" value="" class="form-control  form-control-lg" placeholder="Traveller 4" />
</div>
</div>
<!--end::Additional Traveller 4 Last Name-->
<!--begin::Additional Traveller 4 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB4" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 4 DOB-->
<!--begin::Additional Traveller 4 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes4" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 4 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden"  id="box5">
<!--begin::Additional Traveller 5 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle5">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName5" value="" class="form-control  form-control-lg" placeholder="Traveller 5" />
</div>
</div>
<!--end::Additional Traveller 5 First Name-->
<!--begin::Additional Traveller 5 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName5" value="" class="form-control  form-control-lg" placeholder="Traveller 5" />
</div>
</div>
<!--end::Additional Traveller 5 Middle Name-->
<!--begin::Additional Traveller 5 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName5" value="" class="form-control  form-control-lg" placeholder="Traveller 5" />
</div>
</div>
<!--end::Additional Traveller 5 Last Name-->
<!--begin::Additional Traveller 5 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB5" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 5 DOB-->
<!--begin::Additional Traveller 5 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes5" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 5 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden"  id="box6">
<!--begin::Additional Traveller 6 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle6">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName6" value="" class="form-control  form-control-lg" placeholder="Traveller 6" />
</div>
</div>
<!--end::Additional Traveller 6 First Name-->
<!--begin::Additional Traveller 6 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName6" value="" class="form-control  form-control-lg" placeholder="Traveller 6" />
</div>
</div>
<!--end::Additional Traveller 6 Middle Name-->
<!--begin::Additional Traveller 6 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName6" value="" class="form-control  form-control-lg" placeholder="Traveller 6" />
</div>
</div>
<!--end::Additional Traveller 6 Last Name-->
<!--begin::Additional Traveller 6 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB6" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 6 DOB-->
<!--begin::Additional Traveller 6 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes6" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 6 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden"  id="box7">
<!--begin::Additional Traveller 7 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle7">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName7" value="" class="form-control  form-control-lg" placeholder="Traveller 7" />
</div>
</div>
<!--end::Additional Traveller 7 First Name-->
<!--begin::Additional Traveller 7 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName7" value="" class="form-control  form-control-lg" placeholder="Traveller 7" />
</div>
</div>
<!--end::Additional Traveller 7 Middle Name-->
<!--begin::Additional Traveller 7 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName7" value="" class="form-control  form-control-lg" placeholder="Traveller 7" />
</div>
</div>
<!--end::Additional Traveller 7 Last Name-->
<!--begin::Additional Traveller 7 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB7" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 7 DOB-->
<!--begin::Additional Traveller 7 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes7" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 7 Notes-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden" id="box8">
<!--begin::Additional Traveller 8 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Title</label>
<select class="form-control  form-control-lg" name="AddTravelTitle8">
<option value="" selected="selected">Select</option>
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
<label>First Name</label>
<input type="text" name="AddTravelFName8" value="" class="form-control  form-control-lg" placeholder="Traveller 8" />
</div>
</div>
<!--end::Additional Traveller 8 First Name-->
<!--begin::Additional Traveller 8 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Middle Name</label>
<input type="text" name="AddTravelMName8" value="" class="form-control  form-control-lg" placeholder="Traveller 8" />
</div>
</div>
<!--end::Additional Traveller 8 Middle Name-->
<!--begin::Additional Traveller 8 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="AddTravelLName8" value="" class="form-control  form-control-lg" placeholder="Traveller 8" />
</div>
</div>
<!--end::Additional Traveller 8 Last Name-->
<!--begin::Additional Traveller 8 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" onChange="" name="AddTravelDOB8" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 8 DOB-->
<!--begin::Additional Traveller 8 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea name="AddTravelNotes8" class="form-control form-control-lg" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."></textarea>
</div>
</div>
<!--end::Additional Traveller 8 Notes-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row">
<!--begin::Step 10 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="AddTravelConsent1">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hearby certify that the details provided are correct as per each traveller's passport.</small></label>
</div>
<!--end::Step 10 - Agree Checkbox 1-->
<!--begin::Step 10 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox"  name="AddTravelConsent2">
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

<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($row['DetailsCorrectConsent'] =='Yes' && $row['VerificationPurposesConsent'] =='Yes' && $row['CreditCardProcessConsent'] =='Yes') { ?>	
<div class="ribbon-target bg-success" style="top: -2px; left: 29px;">Approved</div>
<?php } else { ?>
<div class="ribbon-target bg-danger" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6" onClick="grossIt()"><!--begin::Header-->
<div class="card-header" id="baf-heading11">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf11" aria-expanded="true" aria-controls="baf11" role="button">
<div class="card-label">Payment & Documents</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf11" class="collapse" aria-labelledby="baf-heading11" data-parent="#baf">
<div class="card-body pb-0 pt-3">
<p class="lead font-weight-bold">Review The Pricing, Select Your Payment Option And Upload Your Document(s).</p>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Service Fee Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Service Fee Grand Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>

<?php 
if (!empty($ServiceGrandTotal)) 
$ServiceGrandTotal=$ServiceGrandTotal;
else
$ServiceGrandTotal='0.00';
?>
<input name="ServiceGrandTotal" id="sgt" value="<?php echo $ServiceGrandTotal ?>" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Service Fee Grand Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Service Fee Grand Total-->
<!--begin::Trip Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Trip Grand Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php if (empty($row['FullPaymentDate'])) { ?>
<input value="0.00" name="total" id="total" onChange="totalIt()" class="form-control form-control-lg bg-light-warning" placeholder="Trip Grand Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
<?php } else { ?>
<input value="0.00" name="TotalAmountDue3" id="TotalAmountDue3" onChange="totalIt2()" class="form-control form-control-lg bg-light-warning" placeholder="Trip Grand Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
<?php }  ?>
</div>																		
</div>
</div>
<!--end::Service Fee Grand Total-->
<!--begin::Travel Insurance Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Travel Insurance Grand Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="InsuranceGrandTotal" id="igt" value="0.00" type="text" class="form-control form-control-lg bg-light-warning" placeholder="Travel Insurance Grand Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Travel Insurance Grand Total-->
<!--begin::Overall Grand Total-->
<div class="col-xl-6">
<div class="form-group">


<script>
function grossIt() {
<?php if (empty($row['FullPaymentDate'])) { ?>
var y1 = document.getElementById("total").value;
<?php } else { ?>
var m1 = document.getElementById("TotalAmountDue3").value;
<?php } ?>
var a1 = document.getElementById("sgt").value;
var v1 = document.getElementById("igt").value;
var x1 = 
<?php if (empty($row['FullPaymentDate'])) { ?>
Number(y1) + 
<?php } else { ?>
Number(m1) + 
<?php } ?>
Number(a1) + 
Number(v1) ;
document.getElementById("ogt").value = x1.toFixed(2);
}
</script>

<label>Overall Grand Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="OverallGrandTotal" id="ogt" value="0.00" type="text" class="form-control form-control-lg bg-light-success" placeholder="Overall Grand Total (Tax Included)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $row['ServiceCurrency'] ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Overall Grand Total-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row-->
<div class="row">
<!--begin::Method Of Payment-->
<div class="col-xl-12">
<div class="form-group">
<label>Method Of Payment</label>

<?php  
$MethodOfPayment=$row['MethodOfPayment'];
switch ($MethodOfPayment) {
  case "Credit Card":
   $MethodOfPayment1='21';
    break;
  case "Deposit Money Into Centre Holidays Bank Account":
   $MethodOfPayment1='22';
    break;
  case "Email Transfer":
   $MethodOfPayment1='23';
    break;
  case "Trip Financing Through Uplift":
   $MethodOfPayment1='24';
    break;			
}
 ?>

<select class="form-control  form-control-lg" name="MethodOfPayment" id="select21" onChange="selectChanged21()">
<?php if (!empty($MethodOfPayment)) { ?>
<option value="<?php echo $MethodOfPayment1 ?>"><?php echo $MethodOfPayment ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="21">Credit Card</option>
<option value="22">Deposit Money Into Centre Holidays' Bank Account</option>
<option value="23">Email Transfer</option>
<option value="24">Trip Financing Through Uplift</option>
</select>

</div>
</div>
<!--end::Method Of Payment-->
<!--begin::Deposit Money-->
<div class="col-xl-12 hidden" id="box22">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Steps to deposit money.</p>
</div>
</div>
</div>
</div>
<!--end::Deposit Money-->
<!--begin::E-Transfer-->
<div class="col-xl-12 hidden" id="box23">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Steps for email transfer.</p>
</div>
</div>
</div>
</div>
<!--end::E-Transfer-->
<!--begin::Trip Financing-->
<div class="col-xl-12 hidden" id="box24">
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Steps for trip financing through Uplift.</p>
</div>
</div>
</div>
</div>
<!--end::Trip Financing-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row hidden" id="box21">
<!--begin::Credit Card Owner-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Owner</label>
<select class="form-control  form-control-lg" id="select50" name="CCOwner" onChange="selectChanged50()">
<option value="50" selected="selected">Select</option>
<option value="50">I Am Travelling</option>
<option value="51">I Am Not Travelling</option>
</select>
</div>
</div>
<!--end::Credit Card Owner-->
<!--begin::Credit Card Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Type</label>
<select class="form-control  form-control-lg" name="">
<option value="CCType" selected="selected">Select</option>
<option value="AMEX">AMEX</option>
<option value="VISA / VISA Debit">VISA / VISA Debit</option>
<option value="Mastercard">Mastercard</option>
</select>
</div>
</div>
<!--end::Credit Card Type-->
<!--begin::Credit Card Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Name On Credit Card</label>
<input type="text" name="CCName" value="" class="form-control  form-control-lg" placeholder="Name On Credit Card" />
</div>
</div>
<!--end::Credit Card Name-->
<!--begin::Credit Card Number-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Number</label>
<input type="text" name="CCNumber" value="" class="form-control  form-control-lg" placeholder="Credit Card Number" />
</div>
</div>
<!--end::Credit Card Number-->
<!--begin::Expiry Date-->
<div class="col-xl-2">
<div class="form-group">
<label>Expiry Date (MM/YY)</label>
<input type="text" name="CCExpiry" value="" class="form-control form-control-lg" placeholder="Expiry Date" />
</div>
</div>
<!--end::Expiry Date-->
<!--begin::CVV Number-->
<div class="col-xl-2">
<div class="form-group">
<label>CVV Number</label>
<input type="text" name="CCVV" value="" class="form-control  form-control-lg" placeholder="CVV Number" />
</div>
</div>
<!--end::CVV Number-->
<!--begin::Card Holder's Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Card Holder's Phone</label>
<input type="text" name="CCPhone" value="" class="form-control  form-control-lg" placeholder="Card Holder's Phone" />
</div>
</div>
<!--end::Card Holder's Phone-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-5">
<div class="form-group">
<label>Card Holder's Email</label>
<input type="text" name="CCEmail" value="" class="form-control form-control-lg" placeholder="Card Holder's Email" />
</div>
</div>
<!--end::Card Holder's Email-->
<!--begin::Step 11 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" name="CCAddressSame" id="myCheck246" onClick="myFunction246()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Credit card billing address is the same as the home address provided in Step 1.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 1-->
<!--begin::Step 11 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input type="radio" name="CCAddressSame" id="myCheck247" onClick="myFunction247()" value="No">
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
  } else {
     text.style.display = "none";
  }
}
</script>
<!--begin::Row-->
<div id="box25" style="display:none" >
<div class="row mt-3">
<!--begin::Billing Address (Street)-->
<div class="col-xl-9">
<div class="form-group">
<label>Billing Address (Street)</label>
<input type="text" name="CCAddress" value="" class="form-control  form-control-lg" placeholder="Billing Address (Street)" />
</div>
</div>
<!--end::Billing Address (Street)-->
<!--begin::Billing Address Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" name="CCUnit" value="" class="form-control  form-control-lg" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Billing Address Unit-->
<!--begin::Billing Address City-->
<div class="col-xl-3">
<div class="form-group">
<label>City</label>
<input type="text" name="CCCity" value="" class="form-control form-control-lg" placeholder="City" />
</div>
</div>
<!--end::Billing Address City-->
<!--begin::Billing Address Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province / State</label>
<input type="text" name="CCProvince" value="" class="form-control  form-control-lg" placeholder="Province / State" />
</div>
</div>
<!--end::Billing Address Province-->
<!--begin::Billing Address Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code</label>
<input type="text" name="CCPostal" value="" class="form-control  form-control-lg" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Billing Address Postal Code-->
<!--begin::Billing Address Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country</label>
<input type="text" name="CCCountry" value="" class="form-control form-control-lg" placeholder="Country" />
</div>
</div>
<!--end::Billing Address Country-->
</div>
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<!--begin::First Party Credit Card Text-->
<p class="lead font-weight-bold" id="box50">We Require A Photo Or Scan Of Each Traveller's Passport.</p>
<!--end::First Party Credit Card Text-->
<!--begin::Third Party Credit Card Text-->
<p class="lead font-weight-bold hidden" id="box51">We Require A Photo Or Scan Of Each Traveller's Passport, The Front And Back of The Credit Card As Well As One Additional Government Issued ID Of The Card Holder.</p>
<!--end::Third Party Credit Card Text-->
<!--begin::Upload Documents-->
<div class="form-group mt-10">
<label>Upload Documents (PDF, JPG, PNG)</label>

<div class="dropzone dropzone-multi" id="kt_dropzone_4">
<div class="dropzone-panel mb-lg-0 mb-2">
<a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm dz-clickable">Attach files</a>
<a class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm" style="display: none;">Upload All</a>
<a class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm" style="display: inline-block;">Remove All</a>
</div>
<div class="dropzone-items">

<div class="dropzone-item dz-image-preview dz-processing dz-error dz-complete" style="">
<div class="dropzone-file">
<div class="dropzone-filename" title="some_image_file_name.jpg">
<span data-dz-name="">Chasaren.jpg</span>
<strong>( 
<span data-dz-size=""><strong>1</strong> MB</span>)</strong>
</div>
<div class="dropzone-error" data-dz-errormessage="">Server responded with 0 code.</div>
</div>
<div class="dropzone-progress">
<div class="progress" style="opacity: 0;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress="" style="opacity: 0;"></div>
</div>
</div>
<div class="dropzone-toolbar">
<span class="dropzone-start" disabled="disabled" style="opacity: 0;">
<i class="flaticon2-arrow"></i>
</span>
<span class="dropzone-cancel" data-dz-remove="" style="display: none;">
<i class="flaticon2-cross"></i>
</span>
<span class="dropzone-delete" data-dz-remove="">
<i class="flaticon2-cross"></i>
</span>
</div>
</div></div>
<div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>

<!--<ol>
<li>To upload multiple files. Click the first file, and then press and hold the Ctrl key.</li>
<li>While holding Ctrl , click each of the other files you want to select.</li>
</ol>

<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input class="dropzone-msg-title" type="file" id="TravelerDocuments" multiple name="TravelerDocuments[]" onchange="ValidateSize(this)" accept="application/pdf, image/jpg, image/png" />
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$("#TravelerDocuments").on("change", function() {
    if ($("#TravelerDocuments")[0].files.length > 15) {
        alert("You can select only 15 files, please remove the rest and re-upload again.");
    } 

});
</script>-->

</div>
<!--end::Upload Documents-->
<!--begin::Row-->
<div class="row">
<!--begin::Step 11 - Agree Checkbox 3-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="DetailsCorrectConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hearby certify that the details I have provided are correct.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 3-->
<!--begin::Step 11 - Agree Checkbox 4-->
<div class="col-xl-12 mt-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="VerificationPurposesConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the card holder is not one of the travellers, they will be contacted for verification purposes.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 4-->
<!--begin::Step 11 - Agree Checkbox 5-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" name="CreditCardProcessConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that by providing my credit card details, it will not be processed automatically upon submission of this form</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 5-->
</div>
<!--end::Row-->
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
<!-- begin: Invoice action-->
<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
<div class="col-md-11">
<div class="d-flex justify-content-between">
<button type="button" class="btn btn-lg btn-warning font-weight-bolder text-uppercase" onclick="window.print();">Print</button>
<button type="submit" id="sig-submitBtn" class="btn btn-lg btn-success font-weight-bolder text-uppercase" onclick="DisplayFunction()">Submit Form</button>
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
<!-- end: Invoice action-->
<!-- end: Invoice-->
</div>
<?php
}
} else {
  echo "This booking no longer valid";
}
?> 
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>
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
  var sigText = document.getElementById("sig-dataUrl");
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
  var sigText = document.getElementById("sig-dataUrl1");
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
</body>
<!--end::Body-->
</html>
<?php ob_flush(); ?>