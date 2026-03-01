<form id="userForm" action="<?php echo $_SERVER['PHP_SELF'] ?>#contactform" method="post" enctype="multipart/form-data">
<?php
			  if (!empty($BusinessEmail))
			  $agentemail=$BusinessEmail;
			  else
			  $agentemail='inquire@centreholidays.com';
			  
			  if (!empty($titlename))
			  $agentname=$titlename;
			  else
			  $agentname='Centre Holidays';
			  ?>
            <input type="hidden" id="agentemail" name="agentemail" value="<?php echo $agentemail ?>" />
              <input type="hidden" id="agentname" name="agentname" value="<?php echo $agentname ?>" />
              <input type="hidden" id="AgentID" name="AgentID" value="<?php echo $AgentID ?>" />
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
<div class="col-xl-8">														
<div class="form-group">
<label>Email <span class="text-danger">*</span></label>
<input type="email" class="form-control form-control-lg" placeholder="Email" name="travemail" id="travemail" required>
</div>
</div>
<div class="col-xl-4">														
<div class="form-group">
<label>Travel Interest <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" name="interests" id="interests" required>
<option value="">Select</option>
<option value="Car Rentals">Car Rentals</option>
<option value="Cruises">Cruises</option>
<option value="Flights">Flights</option>
<option value="Hotels">Hotels</option>
<option value="Train Journeys">Train Journeys</option>
<option value="Vacations">Vacations</option>
<option value="Weddings And Honeymoons">Weddings And Honeymoons</option>
<option value="Tailor Made Travel">Tailor Made Travel</option>
<option disabled="disabled">----------</option>
<option value="Accessible Travel">Accessible Travel</option>
<option value="Adventure Travel">Adventure Travel</option>
<option value="Corporate Travel">Corporate Travel</option>
<option value="Cultural Travel">Cultural Travel</option>
<option value="Luxury Travel">Luxury Travel</option>
<option value="Safari And Wildlife">Safari And Wildlife</option>
<option value="Sports Travel">Sports Travel</option>
<option value="Vacation Rentals">Vacation Rentals</option>
</select>
</div>
</div>
<div class="col-xl-8">														
<div class="form-group">
<label>Destination(s) <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" placeholder="List All Destinations" name="destination" id="destination" required>
</div>
</div>
<div class="col-xl-4">
<div class="form-group">
<label>Departing From <span class="text-danger">*</span></label>													
<input type="text" class="form-control form-control-lg" placeholder="Departing From" name="departfrom" id="departfrom" required>
</div>
</div>
<div class="col-xl-4">
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
<div class="col-xl-4">	
<div class="form-group">
<label>Number Of Days <span class="text-danger">*</span></label>													
<input type="text" class="form-control form-control-lg" placeholder="Number Of Days" name="triplength" id="triplength" required>
</div>
</div>
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Adults <span class="text-danger">*</span></label>													
<select class="form-control form-control-lg" id="numadults" name="numadults" required>
<option value="">Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
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
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10 - 20">10 - 20</option>
<option value="20+">20+</option>
</select>
</div>
</div>	
<div class="col-xl-3">
<div class="form-group">
<label>Budget Per Person <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" id="budget" name="budget" required>
<option value="">Select</option>
<option value="Less Than $2,000">Less Than $2,000</option>
<option value="$2,000 - $4,000">$2,000 - $4,000</option>
<option value="$4,000 - $6,000">$4,000 - $6,000</option>
<option value="$6,000 - $8,000">$6,000 - $8,000</option>
<option value="$8,000 - $10,000">$8,000 - $10,000</option>
<option value="$10,000 - $15,000">$10,000 - $15,000</option>
<option value="$15,000 - $20,000">$15,000 - $20,000</option>
<option value="$20,000+">$20,000+</option>
</select>
</div>
</div>
<div class="col-xl-3">
<div class="form-group">														
<label>Uplift Trip Financing <span class="text-danger">*</span></label>
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

<?php if ($flcount2 < 1) { ?>
<div class="col-xl-10">
<div class="form-group">													
<label>Security Question <span class="text-danger">*</span></label><br>
<input class="form-control form-control-lg" type="number" value="" id="qanswer" name="qanswer" placeholder="Answer" required />
</div>
</div>	
<?php } ?>

										
</div>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementById("userForm").submit();
       }
     </script>

<?php if ($flcount2 < 1) { ?>
<!--end::Items-->								<!--begin::Action-->
<div class="pt-10 pb-5 text-center">
<input type="submit" class="g-recaptcha btn btn-lg btn-warning text-uppercase font-weight-bolder px-7 py-5" value="Submit Inquiry" name="post" id="post" data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>
</div>
<!--end::Action-->
<?php } ?>

</form>