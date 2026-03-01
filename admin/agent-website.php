<div id="mytable">
<br />
<label>Business Name</label>
<input type="text" id="BusinessName" name="BusinessName" value="<?php echo $BusinessName; ?>" class="form-control" placeholder="BusinessName"/>

<br /><label>Displayed Name</label>
<input type="text" id="DisplayName" name="DisplayName" value="<?php echo $DisplayName; ?>" class="form-control" placeholder="Displayed Name"/>


<br /><label>Agent Title</label>
<input type="text" id="AgentPositionTitle" name="AgentPositionTitle" value="<?php echo $AgentPositionTitle; ?>" class="form-control" placeholder="Agent Title"/>


<br /><label>Business Number</label>
<label class="custom-control custom-radio" style="margin-left:20px">
<input id="mainnumber"  name="mainnumber" type="radio" value="1" class="custom-control-input" <?php echo $che1 ?>>
<span class="custom-control-description">Default!</span>
</label>
<input type="text" id="BusinessNum" name="BusinessNum" value="<?php echo $BusinessNum; ?>" class="form-control" placeholder="BusinessNum" />



<br /><label>Displayed Mobile Number</label>
<label class="custom-control custom-radio" style="margin-left:20px">
<input id="mainnumber" name="mainnumber" type="radio" value="2" class="custom-control-input" <?php echo $che2 ?> >
<span class="custom-control-description">Default!</span>
</label>
<input type="text" value="<?php echo $DisplayUseCell ?>" name="DisplayUseCell" id="DisplayUseCell" placeholder="Displayed User Mobile" class="form-control"/>



<br /><label>Toll Free Number</label>
<label class="custom-control custom-radio" style="margin-left:20px">
<input id="mainnumber"  name="mainnumber" type="radio" value="3" class="custom-control-input" <?php echo $che3 ?>>
<span class="custom-control-description">Default!</span>
</label>
<input type="text" id="TollFreeNum" name="TollFreeNum" value="<?php echo $TollFreeNum; ?>" class="form-control" placeholder="TollFreeNum" />





<br /><label>Fax Number</label>
<input type="text" id="FaxNum" name="FaxNum" value="<?php echo $FaxNum; ?>" class="form-control" placeholder="FaxNum" />

<br /><label>Business Email</label>
<input type="text" id="BusinessEmail" name="BusinessEmail" value="<?php echo $BusinessEmail; ?>" class="form-control" placeholder="Email" />

<br /><label>Other Email</label>
<input type="text" id="OtherEmail" name="OtherEmail" value="<?php echo $OtherEmail; ?>" class="form-control" placeholder="Other Email" />

<br /><label>Skype</label>
<input type="text" id="SkypeID" name="SkypeID" value="<?php echo $SkypeID; ?>" class="form-control" placeholder="SkypeID" />

<br /><label>Website</label>
<input type="text" id="Website" name="Website" value="<?php echo $Website; ?>" class="form-control" placeholder="Website" />

<br /><label>Other Website</label>
<input type="text" id="OtherWebsite" name="OtherWebsite" value="<?php echo $OtherWebsite; ?>" class="form-control" placeholder="Other Website" />

<br /><label>YouTube</label>
<input type="text" id="YouTube" name="YouTube" value="<?php echo $YouTube; ?>" class="form-control" placeholder="YouTube" />
<br /><label>Facebook</label>
<input type="text" id="FaceBook" name="FaceBook" value="<?php echo $FaceBook; ?>" class="form-control" placeholder="FaceBook" />
<br /><label>Twitter</label>
<input type="text" id="Twitter" name="Twitter" value="<?php echo $Twitter; ?>" class="form-control" placeholder="Twitter" />
<br /><label>LinkedIn</label>
<input type="text" id="LinkedIn" name="LinkedIn" value="<?php echo $LinkedIn; ?>" class="form-control" placeholder="LinkedIn" />
<br /><label>Pinterest</label>
<input type="text" id="Pinterest" name="Pinterest" value="<?php echo $Pinterest; ?>" class="form-control" placeholder="Pinterest" />

<br /><label>Instagram</label>
<input type="text" id="Instagram" name="Instagram" value="<?php echo $Instagram; ?>" class="form-control" placeholder="Instagram" />



<br /><label>TikTok</label>
<input type="text" id="TikTok" name="TikTok" value="<?php echo $TikTok; ?>" class="form-control" placeholder="TikTok" />


<br /><label>Blog</label>
<input type="text" id="Blog" name="Blog" value="<?php echo $Blog; ?>" class="form-control" placeholder="Blog" />

<br /><label style="color:#00C">Agents Chat. Please enter this part of the code ie. ozcvetuaub0waxmnb3b2luuhl3tnqv9y.js</label>
<textarea name="AgentChat" id="AgentChat" class='scrollable form-control' placeholder="Agent Chat"><?php echo $AgentChat; ?></textarea>
</div>


<br /><label>Agent Google Analytics</label>
<input type="text" id="AgentAnalytics" name="AgentAnalytics" value="<?php echo $AgentAnalytics; ?>" class="form-control" placeholder="Agent Analytics" />

<br /><label>Emal Marketing URL</label>
<textarea name="EmalMarketingURL" id="EmalMarketingURL" class='scrollable form-control' placeholder="Emal Marketing URL"><?php echo $EmalMarketingURL; ?></textarea>


<!--<br /><label>Mail Chimp User</label>
<input type="text" id="mailchimpuser" name="mailchimpuser" value="<?php //echo $mailchimpuser; ?>" class="form-control" placeholder="Mail Chimp User" />
<br /><label>Mail Chimp ID</label>
<input type="text" id="mailchimpid" name="mailchimpid" value="<?php //echo $mailchimpid; ?>" class="form-control" placeholder="Mail Chimp iID" />-->

<br /><label>MAILCHIMP (Form Action URL)</label>
<input type="text" id="mailchimp" name="mailchimp" value="<?php echo $mailchimp; ?>" class="form-control" placeholder="MailChimp" />
<br /><label>MAILCHIMP (Name ie. b_88e8236bb378bb68c4e74eeca_2ee4c3bcc9)</label>
<input type="text" id="mailchimpname" name="mailchimpname" value="<?php echo $mailchimpname; ?>" class="form-control" placeholder="MailChimp Name" />

<br /><label>Index Page Title</label>
<input type="text" id="IndexPageTitle" name="IndexPageTitle" value="<?php echo $IndexPageTitle; ?>" class="form-control" placeholder="Index Page Title" />
<br /><label>Index H1</label>
<input type="text" id="IndexH1" name="IndexH1" value="<?php echo $IndexH1; ?>" class="form-control" placeholder="Index H1" />
<br /><label>Index Meta Description</label>
<textarea id="IndexMetaDescription" name="IndexMetaDescription" class="form-control" placeholder="Index Meta Description"><?php echo $IndexMetaDescription; ?></textarea>
<!--<br /><label>Index Cover Image (Main image on the index page)</label>
<input type="text" id="IndexCoverImage" name="IndexCoverImage" value="<?php //echo $IndexCoverImage; ?>" class="form-control" placeholder="Index Cover Image" />-->
<br /><label>Index Horizontal Image</label>
<input type="text" id="IndexHorizontalImage" name="IndexHorizontalImage" value="<?php echo $IndexHorizontalImage; ?>" class="form-control" placeholder="Index Horizontal Image" />


<fieldset style="border:1px solid #666; padding:10px; margin:20px 0 0 0;"><legend>Slider</legend>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>Index Cover Image</strong></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
<label>Slider 1 Image</label>
<input type="text" id="IndexCoverImage" name="IndexCoverImage" value="<?php echo $IndexCoverImage; ?>" class="form-control" placeholder="Slider 1 Image" />
<br /><label>Index Cover Image Alt (Description)</label>
<input type="text" id="IndexImageDescription" name="IndexImageDescription" value="<?php echo $IndexImageDescription; ?>" class="form-control" placeholder="Index Cover Image Alt (Description)" />
<br /><label>Slider 1 Title</label>
<input type="text" id="Slider1Title" name="Slider1Title" value="<?php echo $Slider1Title; ?>" class="form-control" placeholder="Slider 1 Title" />

<br /><label>Slider 1 Description</label>
<input type="text" id="Slider1Description" name="Slider1Description" value="<?php echo $Slider1Description; ?>" class="form-control" placeholder="Slider 1 Description" />

<br /><label>Slider 1 Button (URL)</label>
<input type="text" id="Slider1Button" name="Slider1Button" value="<?php echo $Slider1Button; ?>" class="form-control" placeholder="Slider 1 Button" />

		</div>        
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>Slider 2</strong></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
<label>Slider 2 Image</label>
<input type="text" id="Slider2Image" name="Slider2Image" value="<?php echo $Slider2Image; ?>" class="form-control" placeholder="Slider 2 Image" />

<br /><label>Slider 2 Title</label>
<input type="text" id="Slider2Title" name="Slider2Title" value="<?php echo $Slider2Title; ?>" class="form-control" placeholder="Slider 2 Title" />

<br /><label>Slider 2 Description</label>
<input type="text" id="Slider2Description" name="Slider2Description" value="<?php echo $Slider2Description; ?>" class="form-control" placeholder="Slider 2 Description" />

<br /><label>Slider 2 Button (URL)</label>
<input type="text" id="Slider2Button" name="Slider2Button" value="<?php echo $Slider2Button; ?>" class="form-control" placeholder="Slider 2 Button" />

		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><strong>Slider 3</strong></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
<label>Slider 3 Image</label>
<input type="text" id="Slider3Image" name="Slider3Image" value="<?php echo $Slider3Image; ?>" class="form-control" placeholder="Slider 3 Image" />

<br /><label>Slider 3 Title</label>
<input type="text" id="Slider3Title" name="Slider3Title" value="<?php echo $Slider3Title; ?>" class="form-control" placeholder="Slider 3 Title" />

<br /><label>Slider 3 Description</label>
<input type="text" id="Slider3Description" name="Slider3Description" value="<?php echo $Slider3Description; ?>" class="form-control" placeholder="Slider 3 Description" />

<br /><label>Slider 3 Button (URL)</label>
<input type="text" id="Slider3Button" name="Slider3Button" value="<?php echo $Slider3Button; ?>" class="form-control" placeholder="Slider 3 Button" />

		</div>
      </div>
    </div>
  </div> 



</fieldset>



<fieldset style="border:1px solid #666; padding:5px; margin:20px 0 0 0"><legend>Agent Profile</legend>


<br />
<label>Profile Page Title</label>
<input type="text" id="AboutPageTitle" name="AboutPageTitle" value="<?php echo $AboutPageTitle; ?>" class="form-control" placeholder="Profile Page Title" />

<br /><label>Profile H1</label>
<input type="text" id="AboutH1" name="AboutH1" value="<?php echo $AboutH1; ?>" class="form-control" placeholder="Profile H1" />

<br /><label>Profile Meta Description</label>
<textarea id="AboutMetaDescription" name="AboutMetaDescription" class="form-control" placeholder="Profile Meta Description"><?php echo $AboutMetaDescription; ?></textarea>

<br /><label>Profile Cover Image</label>
<input type="text" id="AboutCoverImage" name="AboutCoverImage" value="<?php echo $AboutCoverImage; ?>" class="form-control" placeholder="Profile Cover Image" />

<br /><label>Profile Cover Image Alt (Description)</label>
<input type="text" id="AboutImageDescription" name="AboutImageDescription" class="form-control" placeholder="Profile Image Alt Description" value="<?php echo $AboutImageDescription; ?>" />

<br /><label>Profile Horizontal Image</label>
<input type="text" id="AboutHorizontalImage" name="AboutHorizontalImage" value="<?php echo $AboutHorizontalImage; ?>" class="form-control" placeholder="Profile Horizontal Image" />


<br /><label>Agent Profile</label>
<?php
if (empty($AgentProfile))
$AgentProfile='<p>When it comes to planning your trip, you want everything to go smoothly every step of the way. In case there is an issue while on your trip, you want to be able to deal with a person directly on the other end of the phone instead of an automated voice or a call centre somewhere in the world.
<br />
<br />
This is where I come in. I can assist you from start to finish with the planning of your trip, offer you insight on hotels, destinations, excursions and more. I can provide you with competitive pricing while keeping your needs in mind.<br>
<br />
Whatever your interests or needs, let me know and I will be happy to work with you. To setup a free travel consultation, please feel free to contact me.</p>';
?>

<textarea id="AgentProfile" name="AgentProfile"  class="form-control"><?php echo $AgentProfile; ?></textarea>


<br /><label>Languages</label>
<?php
if (empty($AgentLanguage))
$AgentLanguage='English';
?>
<textarea id="AgentLanguage" name="AgentLanguage" placeholder="Agent Language"  class="form-control"/><?php echo $AgentLanguage; ?></textarea>



<br /><label>Places Travelled - Google Map URL)</label>
<textarea id="AgentPlacesTravelled" name="AgentPlacesTravelled" placeholder="Places Travelled" class="form-control"/><?php echo $AgentPlacesTravelled; ?></textarea>

</fieldset>


<br /><label>Profile Image</label>
<input type="text" id="Image" name="Image" value="<?php echo $Image; ?>" class="form-control" placeholder="Image" />


<br /><label>Logo Image</label>
<input type="text" id="LogoImage" name="LogoImage" value="<?php echo $LogoImage; ?>" class="form-control" placeholder="Logo Image" />


<br /><label>Logo Icon (Favicon)</label>
<input type="text" id="LogoIcon" name="LogoIcon" value="<?php echo $LogoIcon; ?>" class="form-control" placeholder="Logo Icon (Favicon)" />


<br /><label>Displayed City and Province</label>
<input type="text" value="<?php echo $WebCity ?>" name="DisplayUseCity" id="DisplayUseCity" placeholder="Displayed User City and Province" class="form-control"/>

<br /><label>Home Office Google Map URL, copy <strong style="color:#F00">src</strong> part from the Google embed iframe code</label>
<input type="text" value="<?php echo $HOGMap ?>" name="HOGMap" id="HOGMap" placeholder="Home Office Google Map URL" class="form-control"/>

<br /><label>Branch Office Google Map URL, copy <strong style="color:#F00">src</strong> part from the Google embed iframe code</label>
<input type="text" value="<?php echo $BOGMap ?>" name="BOGMap" id="BOGMap" placeholder="Branch Office Google Map URL" class="form-control"/>




<br />
<fieldset style="border:1px solid #666; padding:10px; margin:20px 0 0 0;"><legend>Hours of operation</legend>
<label>Time Zone (Note: when ETD is 3:30 PM >> PDT 12:30 PM, MDT 1:30 PM, CDT 2:30 PM, ADT 4:30 PM, NDT 5:00 PM)</label>
<select name="TimeZone" id="TimeZone" class="form-control" >
<?php if (!empty($TimeZone)) { ?>
<option value="<?php echo $TimeZone; ?>"><?php echo $TimeZone; ?></option>
<option>-----------------------------------</option>
<?php } ?>
<option value="PDT (Pacific)">PDT (Pacific)</option>
<option value="MDT (Mountain)">MDT (Mountain)</option>
<option value="CDT (Central)">CDT (Central)</option>
<option value="EDT (Eastern)">EDT (Eastern)</option>
<option value="ADT (Atlantic)">ADT (Atlantic)</option>
<option value="NDT (newfoundland)">NDT (newfoundland)</option>
</select>
<input type="text" id="MondayToFriday" name="MondayToFriday" value="<?php echo $MondayToFriday; ?>" class="form-control" placeholder="Monday To Friday" />
<input type="text" id="Saturday" name="Saturday" value="<?php echo $Saturday; ?>" class="form-control" placeholder="Saturday" />
<input type="text" id="Sunday" name="Sunday" value="<?php echo $Sunday; ?>" class="form-control" placeholder="Sunday" />
<input type="text" id="Holidays" name="Holidays" value="<?php echo $Holidays; ?>" class="form-control" placeholder="Holidays" />


</fieldset>



<br />



<fieldset style="border:1px solid #666; padding:10px; margin:20px 0 0 0;"><legend>Agent's Index Page</legend>

<strong>Current Selection Order From Left to Right. </strong>
<strong>To remove a certain input make the input box blank, then click update. </strong>
<h4>
<ol>
<li><input type="text" value="<?php echo $AgentInterest1 ?>" name="AgentInterest1" />
</li><li><input type="text" value="<?php echo $AgentInterest2 ?>" name="AgentInterest2" />
</li><li><input type="text" value="<?php echo $AgentInterest3 ?>" name="AgentInterest3" />
</li><li><input type="text" value="<?php echo $AgentInterest4 ?>" name="AgentInterest4" />
</li><li><input type="text" value="<?php echo $AgentInterest5 ?>" name="AgentInterest5" />
</li><li><input type="text" value="<?php echo $AgentInterest6 ?>" name="AgentInterest6" />
</li><li><input type="text" value="<?php echo $AgentInterest7 ?>" name="AgentInterest7" />
</li><li><input type="text" value="<?php echo $AgentInterest8 ?>" name="AgentInterest8" />
</li><li><input type="text" value="<?php echo $AgentInterest9 ?>" name="AgentInterest9" />
</li><li><input type="text" value="<?php echo $AgentInterest10 ?>" name="AgentInterest10" />
</li><li><input type="text" value="<?php echo $AgentInterest11 ?>" name="AgentInterest11" />
</li><li><input type="text" value="<?php echo $AgentInterest12 ?>" name="AgentInterest12" />
</li>
</ol>
</h4>

<br />
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="margin-left:40px">To Edit the Order Click Here</button>
<div id="demo" class="collapse">

<br />
<select id="continent1" name="continent1" class="form-control" style="width:80%; float:left">
<option value="">Select a Continent 1</option>
<?php
	$sql3 = "SELECT * FROM continent ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['continent']; ?>"><?php echo $row3['continent']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order1" name="order1" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="continent2" name="continent2" class="form-control" style="width:80%; float:left">
<option value="">Select a Continent 2</option>
<?php
	$sql3 = "SELECT * FROM continent ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['continent']; ?>"><?php echo $row3['continent']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order2" name="order2" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="continent3" name="continent3" class="form-control" style="width:80%; float:left">
<option value="">Select a Continent 3</option>
<?php
	$sql3 = "SELECT * FROM continent ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['continent']; ?>"><?php echo $row3['continent']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order3" name="order3" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />




<select id="country1" name="country1" class="form-control" style="width:80%; float:left">
<option value="">Select a Country 1</option>
<?php
	$sql3 = "SELECT * FROM countries ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['countries']; ?>"><?php echo $row3['countries']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order4" name="order4" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="country2" name="country2" class="form-control" style="width:80%; float:left">
<option value="">Select a Country 2</option>
<?php
	$sql3 = "SELECT * FROM countries ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['countries']; ?>"><?php echo $row3['countries']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order5" name="order5" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="country3" name="country3" class="form-control" style="width:80%; float:left">
<option value="">Select a Country 3</option>
<?php
	$sql3 = "SELECT * FROM countries ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['countries']; ?>"><?php echo $row3['countries']; ?></option>
    <?php
			
		}
	}
?>
</select>

<select id="order6" name="order6" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />




<select id="interests1" name="interests1" class="form-control" style="width:80%; float:left">
<option value="">Select an Interest 1</option>
<?php
	$sql311xs = "SELECT * FROM interests ORDER BY interests ASC";	  
	$result311xs = mysqli_query($conn, $sql311xs);	
	if (mysqli_num_rows($result311xs) > 0) {
		// output data of each row
		while($row311xs = mysqli_fetch_assoc($result311xs)) {
	
	?>
    <option value="<?php echo $row311xs['interests']; ?>"><?php echo $row311xs['interests']; ?></option>
	<?php
			
		}
	}
?>

</select>

<select id="order7" name="order7" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="interests2" name="interests2" class="form-control" style="width:80%; float:left">
<option value="">Select an Interest 2</option>
<?php
	$sql311xs = "SELECT * FROM interests ORDER BY interests ASC";	  
	$result311xs = mysqli_query($conn, $sql311xs);	
	if (mysqli_num_rows($result311xs) > 0) {
		// output data of each row
		while($row311xs = mysqli_fetch_assoc($result311xs)) {
	
	?>
    <option value="<?php echo $row311xs['interests']; ?>"><?php echo $row311xs['interests']; ?></option>
	<?php
			
		}
	}
?>

</select>

<select id="order8" name="order8" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />
<select id="interests3" name="interests3" class="form-control" style="width:80%; float:left">
<option value="">Select an Interest 3</option>
<?php
	$sql311xs = "SELECT * FROM interests ORDER BY interests ASC";	  
	$result311xs = mysqli_query($conn, $sql311xs);	
	if (mysqli_num_rows($result311xs) > 0) {
		// output data of each row
		while($row311xs = mysqli_fetch_assoc($result311xs)) {
	
	?>
    <option value="<?php echo $row311xs['interests']; ?>"><?php echo $row311xs['interests']; ?></option>
	<?php
			
		}
	}
?>

</select>

<select id="order9" name="order9" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<br />





<select id="operators1" name="operators1" class="form-control" style="width:80%; float:left">
<option value="">Select an Operator 1</option>
<?php

	$sql355 = "SELECT * FROM operators ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
	
	?>
    <option value="<?php echo $row355['operators']; ?>"><?php echo $row355['operators']; ?></option>
    <?php
			
		}
	}
?>

</select>

<select id="order10" name="order10" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>


<br />
<select id="operators2" name="operators2" class="form-control" style="width:80%; float:left">
<option value="">Select an Operator 2</option>
<?php

	$sql355 = "SELECT * FROM operators ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
	
	?>
    <option value="<?php echo $row355['operators']; ?>"><?php echo $row355['operators']; ?></option>
    <?php
			
		}
	}
?>

</select>

<select id="order11" name="order11" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>


<br />
<select id="operators3" name="operators3" class="form-control" style="width:80%; float:left">
<option value="">Select an Operator 3</option>
<?php

	$sql355 = "SELECT * FROM operators ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
	
	?>
    <option value="<?php echo $row355['operators']; ?>"><?php echo $row355['operators']; ?></option>
    <?php
			
		}
	}
?>

</select>

<select id="order12" name="order12" class="form-control" style="width:10%; float:left">
<option value="none">Order</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

</div>

</fieldset>

<fieldset style="border:1px solid #666; padding:10px; margin:20px 0 0 0;"><legend>Departure Gatways</legend>

<script src="//geodata.solutions/includes/countrystatecity.js"></script>


<label>Confirm Country Selection<sup>*</sup></label>

<select name="AgentGateCountry" class="countries form-control" id="countryId" size="2" style="overflow:hidden">
<option value="Canada" countryid="CA">Canada</option>
<option value="Canada" countryid="CA">Canada</option>
<option value="Canada" countryid="CA">_</option>
<option value="Canada" countryid="CA">_</option>
<option value="Canada" countryid="CA">_</option>

</select>


<br />
<label>Province <sup>*</sup></label>
<select name="AgentGateProvince" class="states form-control" id="stateId">
<?php if (!empty($AgentGateProvince)) { ?>
<option value="<?php echo $AgentGateProvince ?>"><?php echo $AgentGateProvince ?></option>
<?php } ?>
<option value="">Select State</option>
</select>

<br />
<label>City <sup>*</sup></label>
<select name="AgentGateCity" class="cities form-control" id="cityId" >
<?php if (!empty($AgentGateCity)) { ?>
<option value="<?php echo $AgentGateCity ?>"><?php echo $AgentGateCity ?></option>
<?php } ?>
<option value="">Select City</option>
</select>

</fieldset>


<?php 

if ($AgentType !='Commission Agent' && $AgentType !='Non-Paying Partner' && $AgentType !='Non-Paying Sub-Agent') { ?>

<br />
<?php

$checked0='';
$checked1='';
$checked2='';
$checked3='';

switch ($showsubagents) {
  case "1":
   $checked1='checked';
    break;
  case "2":
   $checked2='checked';
    break;
  case "3":
   $checked3='checked';
    break;
  default:
    $checked0='checked';
}
?>

<input type="radio" <?php echo $checked0 ?> id="0" name="showsubagents" value="0" />&nbsp;&nbsp;<label>Hide From All Websites</label>
<br />
<input type="radio" <?php echo $checked1 ?>  id="1" name="showsubagents" value="1"/>&nbsp;&nbsp;<label>Show On Commission Agent Website</label>

<?php if ($AgentType !='Sub-Agent') { ?>
<br />
<input type="radio" <?php echo $checked2 ?> id="2" name="showsubagents" value="2"/>&nbsp;&nbsp;<label>Show On Sub Agent Website</label>
<br />
<input type="radio" <?php echo $checked3 ?> id="3" name="showsubagents" value="3"/>&nbsp;&nbsp;<label>Show On All Websites</label>
<?php
	}
}
?>

