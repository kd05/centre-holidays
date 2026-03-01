<div id="mytable">
<input type="hidden" id="AgentUniqID" name="AgentUniqID" value="<?php echo $AgentUniqID; ?>" readonly/>
<input type="hidden" id="AgentID" name="AgentID" value="<?php echo $AgentID; ?>" readonly/>
<input type="hidden" id="active" name="active" value="<?php echo $active; ?>" readonly/>
<br /><label>ID</label>
<input type="text" id="none" name="none" value="<?php echo $AgentID ?>" class="form-control" placeholder="AgentID" readonly/>

<br /><label>Title</label>
<select name="AgentTitle" id="AgentTitle" class="form-control">
<?php if (!empty($AgentTitle)) { ?>
<option value="<?php echo $AgentTitle; ?>"><?php echo $AgentTitle; ?></option>
<option>-----------------------------------</option>
<?php } ?>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>


<br /><label>First Name</label>
<input type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName; ?>" class="form-control" placeholder="First Name" />
<br /><label>Last Name</label>
<input type="text" id="LastName" name="LastName" value="<?php echo $LastName; ?>" placeholder="Last Name" class="form-control" />

<br /><label>Nick Name</label>
<input type="text" id="NickName" name="NickName" value="<?php echo $NickName; ?>" placeholder="Nick Name" class="form-control" />

<br /><label>Home Number</label>
<input type="text" id="HomeNum" name="HomeNum" value="<?php echo $HomeNum; ?>" class="form-control" placeholder="HomeNum" />
<br /><label>Mobile Number</label>
<input type="text" id="CellNum" name="CellNum" value="<?php echo $CellNum; ?>" class="form-control" placeholder="CellNum" />
<br /><label>Personal Email</label>
<input type="text" id="PersonalEmail" name="PersonalEmail" value="<?php echo $PersonalEmail; ?>" class="form-control" placeholder="PersonalEmail" />




<br /><label>Street</label>
<input type="text" id="Street" name="Street" value="<?php echo $Street; ?>" class="form-control" placeholder="Street" />

<br /><label>Unit Number</label>
<input type="text" id="Unit" name="Unit" value="<?php echo $Unit; ?>" class="form-control" placeholder="Unit" />

<br /><label>City</label>
<input type="text" id="City" name="City" value="<?php echo $City; ?>" class="form-control" placeholder="City" />
<br /><label>Province</label>
<input type="text" id="Province" name="Province" value="<?php echo $Province; ?>" class="form-control" placeholder="Province" />
<br /><label>Postal Code</label>
<input type="text" id="PostalCode" name="PostalCode" value="<?php echo $PostalCode; ?>" class="form-control" placeholder="Postal Code" />

<br /><label>Other Address</label>
<textarea name="OtherAddress" id="OtherAddress" class='scrollable form-control' placeholder="Other Address"><?php echo $OtherAddress; ?></textarea>


<br /><label>Shipping Notes</label>
<textarea name="ShippingNotes" id="ShippingNotes" class='scrollable form-control' placeholder="Shipping Notes"><?php echo $ShippingNotes; ?></textarea>


<br /><label>Agent Type</label>
<select name="AgentType" id="AgentType" class="form-control" >
<?php if (!empty($AgentType)) { ?>
<option value="<?php echo $AgentType; ?>"><?php echo $AgentType; ?></option>
<option>-----------------------------------</option>
<?php } ?>
<option value="Commission Agent Partner">Commission Agent Partner</option>
<option value="Sub-Agent Partner">Sub-Agent Partner</option>
<option value="Executive">Executive</option>
<option value="Administrative">Administrative</option>
<option value="Commission Agent">Commission Agent</option>
<option value="Sub-Agent">Sub-Agent</option>
<option value="Epik Escapes Staff">Epik Escapes Staff</option>
</select>

<br />
<label>Date Of Birth (MM/DD/YYYY)</label><!-- Calendar-->
<div class="input-group">
<input type="text" name="BirthDate" value="<?php echo $BirthDate; ?>" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>

<br /><label>Join Date (MM/DD/YYYY)</label><!-- Calendar-->
<div class="input-group">
<input type="text" name="JoinDate" value="<?php echo $JoinDate; ?>" class="form-control" id="datepicker-autoclose1" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
<!-- Account closed date -->

<br /><label>Account closed Date (MM/DD/YYYY)</label><!-- Calendar-->
<div class="input-group">
<input type="text" name="CloseDate" value="<?php echo $CloseDate; ?>" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
<br /><label>Registered Business Name</label>
<input type="text" id="RegisteredBusinessName" name="RegisteredBusinessName" value="<?php echo $RegisteredBusinessName; ?>" class="form-control" placeholder="Registered Business Name" />
<br />

<label>Plan</label>
<select name="AgentPlan" id="AgentPlan" class="form-control">
<?php if (!empty($AgentPlan)) { ?>
<option value="<?php echo $AgentPlan; ?>"><?php echo $AgentPlan; ?></option>
<option>-----------------------------------</option>
<?php } ?>
<option value="">Select A Plan</option>
<option value="Enterprise Plan">Enterprise Plan</option>
<option value="Starter Plan">Starter Plan</option>
<option value="Starter Plus Plan">Starter Plus Plan</option>
<option value="Value Plan">Value Plan</option>
<option value="Value Plus Plan">Value Plus Plan</option>
<option value="Premium Plan">Premium Plan</option>
<option value="Premium Plus Plan">Premium Plus Plan</option>
<option value="Professional Plan">Professional Plan</option>
<option value="Professional Plus Plan">Professional Plus Plan</option>
<option value="Sub-Agent Plan">Sub-Agent Plan</option>
</select>


<br /><label>Commission Percentage</label>
<input type="text" id="Commission" name="Commission" value="<?php echo $Commission; ?>" class="form-control" placeholder="Commission" max="50" maxlength="50" />

<br /><label>Monthly Recurring Fee</label>
<input type="text" id="MonthlyRecurringFee" name="MonthlyRecurringFee" value="<?php echo $MonthlyRecurringFee; ?>" class="form-control" placeholder="Monthly Recurring Fee" />


<br /><label>TICO License Number</label>
<input type="text" id="License" name="License" value="<?php echo $License; ?>" class="form-control" placeholder="TICO License Number" />
<br /><label>TICO Manager's License Number</label>
<input type="text" id="TICOcert" name="TICOcert" value="<?php echo $TICOcert; ?>" class="form-control" placeholder="TICO Manager's License Number" />

<br /><label>ACTA Saskatchewan Licence</label>
<select name="ACTASaskatchewanLicence" id="ACTASaskatchewanLicence" class="form-control">
<?php if (!empty($ACTASaskatchewanLicence)) { ?>
<option value="<?php echo $ACTASaskatchewanLicence; ?>"><?php echo $ACTASaskatchewanLicence; ?></option>
<option>-----------------------------------</option>
<?php } ?>
<option value="">Select</option>
<option value="Certified">Certified</option>
<option value="Not Certified">Not Certified</option>
</select>

<br /><label>BC License Number</label>
<input type="text" id="BCNumber" name="BCNumber" value="<?php echo $BCNumber; ?>" class="form-control" placeholder="BC License Number" />

<br /><label>Branch Office Licence Number</label>
<input type="text" id="BOLNumber" name="BOLNumber" value="<?php echo $BOLNumber; ?>" class="form-control" placeholder="Branch Office Licence Number" />

<br /><label>Branch Office Street, Unit Number</label>
<input type="text" id="BOStreet" name="BOStreet" value="<?php echo $BOStreet; ?>" class="form-control" placeholder="Branch Office Street, Unit Number" />

<br /><label>Branch Office City</label>
<input type="text" id="BOCity" name="BOCity" value="<?php echo $BOCity; ?>" class="form-control" placeholder="Branch Office City" />

<br /><label>Branch Office Province</label>
<input type="text" id="BOProvince" name="BOProvince" value="<?php echo $BOProvince; ?>" class="form-control" placeholder="Branch Office Province" />

<br /><label>Branch Office Postal Code</label>
<input type="text" id="BOPostalcode" name="BOPostalcode" value="<?php echo $BOPostalcode; ?>" class="form-control" placeholder="Branch Office Postal Code" />

<!--<br /><label>Community POD</label>-->
<!--<input type="text" id="PODLeader" name="PODLeader" value="--><?php //echo $PODLeader; ?><!--" class="form-control" placeholder="Community POD" />-->


<!--<input type="hidden" id="PODLeader" name="PODLeader" value="0"/>-->


<br /><label>Community Circle Rewards</label>
<input type="number" id="CommunityCircleRewards" name="CommunityCircleRewards" value="<?php echo $CommunityCircleRewards; ?>" class="form-control" placeholder="Community Circle Rewards" />



    <br /><label>Recruiter</label>
<input type="text" id="Recruiter" name="Recruiter" value="<?php echo $Recruiter; ?>" class="form-control" placeholder="Recruiter" />

<br /><label>Google Drive URL</label>
<input type="text" id="GoogleDriveURL" name="GoogleDriveURL" value="<?php echo $GoogleDriveURL; ?>" class="form-control" placeholder="Google Drive URL" />
<br />
</div>



<label>Google Drive Folder View</label>
<?php if (empty($GoogleDriveURL)) {$disabled='disabled'; $classe='btn-default'; $messa='Currently no Drive assigned';} else { $classe='btn-info'; $messa='Click here to view Google Drive Folder &raquo;'; } ?>
<a href="<?php echo $GoogleDriveURL; ?>" class="btn  <?php echo $classe.' '.$disabled ?>" title="Google Drive" style="width:100%; text-align:left" target="_new"><?php echo $messa ?></a>

<div class="row" style="margin-top:15px;">
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>
</div>


