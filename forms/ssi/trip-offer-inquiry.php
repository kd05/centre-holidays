<?php 
ob_start();
session_start();  #start a session ?>
<style>
.grecaptcha-badge { visibility: hidden; }
</style>
<?php

$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS

//======================Check if this IP already in the black list=========================
include($_SERVER['DOCUMENT_ROOT'].'/library/chck_blacklist.php');

//echo $Link = 'https://centreholidays.com/forms/email/insert-trip-offer-inquiry.php';//(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
//echo "<br />";
$Linkeds = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
//=============================================================================================
?>
<div class="card card-custom card-border mb-30">							
<!--begin::Body-->
<div class="card-body d-flex flex-column">
<!--begin::Items-->
<form id="userForm" action="https://centreholidays.com/forms/email/insert-trip-offer-inquiry.php" method="post" enctype="multipart/form-data">

<?php
if (!empty($AgentID))
$agentemail=$agentemail;
else
$agentemail='inquire@centreholidays.com';


//===============================================================================================
include($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');

$promocode=trim($_GET['promocode']);
$promocode=sanitize_system_string($promocode);
$promocode=str_replace ('"',"",$promocode);
$promocode=str_replace ("'","",$promocode);

$pro=trim($_GET['pro']);
$pro=sanitize_system_string($pro);
$pro=str_replace ('"',"",$pro);
$pro=str_replace ("'","",$pro);

$trp=trim($_GET['trp']);
$trp=sanitize_system_string($trp);
$trp=str_replace ('"',"",$trp);
$trp=str_replace ("'","",$trp);

$tid=trim($_GET['tid']);
$tid=sanitize_system_string($tid);
$tid=str_replace ('"',"",$tid);
$tid=str_replace ("'","",$tid);
?>


<input type="hidden" value="<?php echo $tid ?>" id="tid" name="tid" />
<input type="hidden" value="<?php echo $trp ?>" id="trp" name="trp" />

<input type="hidden" value="<?php echo $pro ?>" id="pro" name="pro" />
<input type="hidden" value="<?php echo $promocode ?>" id="promocode" name="promocode" />

<input type="hidden" value="<?php echo $AgentID ?>" id="AgentID" name="AgentID" />
<input type="hidden" value="<?php echo $agentemail ?>" id="AgentEmail" name="AgentEmail" />
<?php
if (!empty($agentname))
$agentname=$agentname;
else
$agentname='Centre Holidays';
?>
<input type="hidden" value="<?php echo $agentname ?>" id="AgentName" name="AgentName" />
<?php
if (!empty($promooperators))// Promo operator
$operator=rtrim($promooperators, ', ');
elseif (!empty($toperators888))// Trip operator
$operator=rtrim($toperators888, ', ');


if (!empty($promotitle))// Promo operator
{
$Title=$promotitle;
$returnpage='https://centreholidays.com/special-offers/featured-offer.php';
}
elseif (!empty($ttitle888))// Trip operator
{
$Title=$ttitle888;
$returnpage='https://centreholidays.com/trips/trip.php';
}
?>

<input type="hidden" value="<?php echo $Title ?>" id="Title" name="Title" />

<input type="hidden" value="<?php echo $operator ?>" id="Operator" name="Operator" />

<input type="hidden" value="<?php echo $Linkeds ?>" id="Linkeds" name="Linkeds" />

<input type="hidden" value="<?php echo $returnpage ?>" id="returnpage" name="returnpage" />

<div class="row">
<div class="col-xl-4">
<div class="form-group">														
<label>Title <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" id="salutation" name="salutation" required>
<option value="">Select</option>
<option value="Dr.">Dr.</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>	
<div class="col-xl-4">														
<div class="form-group">
<label>First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" placeholder="First Name" name="travfname" id="travfname" required>
</div>
</div>	
<div class="col-xl-4">														
<div class="form-group">
<label>Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" placeholder="Last Name" name="travlname" id="travlname" required>
</div>
</div>
<div class="col-xl-4">														
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control form-control-lg" placeholder="Phone" name="travphone" id="travphone">
</div>
</div>
<div class="col-xl-4">														
<div class="form-group">
<label>Email <span class="text-danger">*</span></label>
<input type="email" class="form-control form-control-lg" placeholder="Email" name="travemail" id="travemail" required>
</div>
</div>
<div class="col-xl-4">
  <div class="form-group">
<label>Departing From <span class="text-danger">*</span></label>													
<input type="text" class="form-control form-control-lg" placeholder="Departing From" name="departfrom" id="departfrom" required>
</div>
</div>

<div class="col-xl-3">
  <div class="form-group">
<label>Departure Date <span class="text-danger">*</span></label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
</div>														
<input type="text" class="form-control form-control-lg"  id="kt_datepicker_1" placeholder="Select A Date" name="departuredate" required>
</div>
</div>
</div>

<div class="col-xl-3">
<div class="form-group">
<label>Number Of Adults <span class="text-danger">*</span></label>													
<select class="form-control form-control-lg" id="numadults" name="numadults" required>
<option value="">Select</option>
<?php
for ($y = 1; $y <= 9; $y++) {
  ?>
  <option value="<?php echo $y ?>"><?php echo $y ?></option>
  <?php
}
?>
<option value="10 - 20">10 - 20</option>
<option value="21 - 30">21 - 30</option>
<option value="31 - 40">31 - 40</option>
<option value="40+">40+</option>
</select>
</div>
</div>
<div class="col-xl-3">	
<div class="form-group">
<label>Number Of Children <span class="text-danger">*</span></label>													
<select class="form-control form-control-lg" id="numchildren" name="numchildren" required>
<option value="">Select</option>
<?php
for ($z = 0; $z <= 9; $z++) {
  ?>
  <option value="<?php echo $z ?>"><?php echo $z ?></option>
  <?php
}
?>
<option value="10 - 20">10 - 20</option>
<option value="20+">20+</option>
</select>
</div>
</div>
<div class="col-xl-3">
<div class="form-group">														
<label>Flex Pay Trip Financing <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" id="tripfinancing" name="tripfinancing" required>
<option value="">Select</option>
<option value="Yes, I Am Interested">Yes, I Am Interested</option>
<option value="No, I Am Not Interested">No, I Am Not Interested</option>
</select>
</div>
</div>
<div class="col-xl-12">
  <div class="form-group">
<label>Trip Details <span class="text-danger">*</span></label>
<textarea class="form-control form-control-lg" id="addnotes" name="addnotes" rows="5" placeholder="Provide As Much Details As Possible" required></textarea>
</div>
</div>
<div class="col-xl-12">
<div class="form-group">													
<label>How Did You Hear About Us? <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" id="hearaboutus" name="hearaboutus" required>
<option value="">Select</option>
<option value="I Am A Current Customer">I Am A Current Customer</option>
<option value="Event Or Trade Show">Event Or Trade Show</option>
<option value="Internet Search">Internet Search</option>
<option value="Email Promotion">Email Promotion</option>
<option value="Social Media">Social Media</option>
<option value="Came Across Your Website">Came Across Your Website</option>
<option value="Friend Or Relative">Friend Or Relative</option>
</select>
</div>
</div>
<div class="col-xl-2">
<div class="form-group" style="padding-top:25px">													
<img src="/img/forms/security-question.jpg" style="width:120px; height:auto" />
</div>
</div>	

<div class="col-xl-10">
<div class="form-group">													
<label>Security Question <span class="text-danger">*</span></label><br>
<input class="form-control form-control-lg" type="number" maxlength="5" value="" id="question" name="question" placeholder="Answer" required />
</div>
</div>
											
</div>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementByI
		 d("userForm").submit();
       }
     </script>

<!--end::Items--><!-- data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'-->		

<!--begin::Action-->
<div class="pt-10 pb-5 text-center">
<input type="submit" class="g-recaptcha btn btn-lg btn-warning text-uppercase font-weight-bolder px-7 py-5" value="Submit Inquiry" name="post" id="post">
</div>
<!--end::Action-->
</form>

										  </div>											
                                          <!--end::Body-->
			</div>
            <?php ob_flush() ?>