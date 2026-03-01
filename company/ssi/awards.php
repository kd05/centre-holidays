<style>
.load-more-items-awards { display:none; }
</style>

<?php session_start();  #start a session 

    /*
    AwardsWebsite
    If empty all websites.............
    
	1 Commission Agent and Corporate Website.............
    
	2 Commission Agent Website...........................  
	4 Sub-Agent Website.  
	
	3 Corporate Website..................................
	5 Commission Agent, Sub-Agent (All) and Corporate Website. (if there are 10 partners, it needs to appear on all 10 partners)
    6 Sub-Agent (One), Commission Agent and Corporate Website (only one partner's website, the primary agent website and corporate website)
    7 Sub-Agent (One) and Corporate Website.
    
	*/
	  
	
/*    echo 'COMMISSION AGENT '.$AgentID;
      echo "<br />";
      echo 'SUB AGENT '.$PartnerID;
      echo "<hr />";*/
	 
	 
	 //===============================================================================================
	//echo $AgentID;
	//echo ' is a ';
	//echo $AgentType;
	if ($AgentType=='Sub-Agent' || $AgentType=='Sub-Agent Modified')
	{	 
	 $PartnerID=$AgentID;
		$sql23 = "SELECT * FROM ch_partner_connections WHERE (PartnerID='$PartnerID') AND active=1";		
		$result23 = mysqli_query($conn, $sql23);
		if (mysqli_num_rows($result23) > 0) {
		while($row23 = mysqli_fetch_assoc($result23)) {
			$CAgentID=$row23['AgentID'];	
			}
		}
	}
	
	if ($AgentType=='Commission Agent')
	{	 		
		$sql23 = "SELECT * FROM ch_partner_connections WHERE (AgentID='$AgentID') AND active=1";		
		$result23 = mysqli_query($conn, $sql23);
		if (mysqli_num_rows($result23) > 0) {
		while($row23 = mysqli_fetch_assoc($result23)) {
			$CPartnerID=$row23['PartnerID'];	
			$TCPartnerID=$TCPartnerID.' '.$CPartnerID;
			}
		}
	}	
	//==================================================================================================
	//echo "<hr /> Commision Agent: ";
	//echo $CAgentID;// commision agent in case the page for a partner
	//echo "<br />Partners: ";
	//echo $TCPartnerID;
	
	if (!empty($TCPartnerID))
	{
		
	$strr= (explode(" ",$TCPartnerID));
	$strr0=$strr[0];	
	$strr1=$strr[1];
	$strr2=$strr[2];
	$strr3=$strr[3];
	$strr4=$strr[4];
	$strr5=$strr[5];
	$strr6=$strr[6];
	$strr7=$strr[7];
	$strr8=$strr[8];
	$strr9=$strr[9];
	$strr10=$strr[10];
	$strr11=$strr[11];
	$strr12=$strr[12];
	$strr13=$strr[13];
	$strr14=$strr[14];		
	}
	
	
	
	
	
	
	if (!empty($PartnerID))
    $sql = "SELECT * FROM ch_awards WHERE active=1 AND (AgentID='$CAgentID' || AgentID='' || AgentID='$PartnerID') ";
	elseif (!empty($AgentID))
    {
		$sql = "SELECT * FROM ch_awards WHERE active=1 AND (AgentID='$AgentID' || AgentID='' ";

		if (!empty($strr0))
		$sql .= "  || AgentID='$strr0' ";	
		if (!empty($strr1))
		$sql .= "  || AgentID='$strr1' ";	
		if (!empty($strr2))
		$sql .= "  || AgentID='$strr2' ";	
		if (!empty($strr3))
		$sql .= "  || AgentID='$strr3' ";	
		if (!empty($strr4))
		$sql .= "  || AgentID='$strr4' ";	
		if (!empty($strr5))
		$sql .= "  || AgentID='$strr5' ";
		if (!empty($strr6))
		$sql .= "  || AgentID='$strr6' ";	
		if (!empty($strr7))
		$sql .= "  || AgentID='$strr7' ";
		if (!empty($strr8))
		$sql .= "  || AgentID='$strr8' ";	
		if (!empty($strr9))
		$sql .= "  || AgentID='$strr9' ";
		if (!empty($strr10))
		$sql .= "  || AgentID='$strr10' ";	
		if (!empty($strr11))
		$sql .= "  || AgentID='$strr11' ";
		if (!empty($strr12))
		$sql .= "  || AgentID='$strr12' ";	
		if (!empty($strr13))
		$sql .= "  || AgentID='$strr13' ";	
		if (!empty($strr14))
		$sql .= "  || AgentID='$strr14' ";							
		
		$sql .= " )";
	}
	else
	$sql = "SELECT * FROM ch_awards WHERE active=1 AND (AwardsWebsite='' || AwardsWebsite=3 || AwardsWebsite=1 || AwardsWebsite=5 || AwardsWebsite=6 || AwardsWebsite=7)";
	
	if (!empty($PartnerID))// that's sub agent
	$sql .= " AND (AwardsWebsite='' || AwardsWebsite=4 || AwardsWebsite=5 || AwardsWebsite=6 || AwardsWebsite=7) ";
	elseif (!empty($AgentID))
	$sql .= " AND (AwardsWebsite='' || AwardsWebsite=2 || AwardsWebsite=1 || AwardsWebsite=5 || AwardsWebsite=6) ";
	
	$sql .= " ORDER BY ";
	
	//if (!empty($AgentID) || !empty($CAgentID))
	//$sql .= " AgentID DESC, ";
	
	$sql .= " AwardsYear DESC, AwardsID DESC ";
	
	
	$result = mysqli_query($conn, $sql);
	$ttcount = mysqli_num_rows($result);
		
	?>	
	<div class="row mb-20">
	<?php	

	if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

	$counting5++;	
	
	$AgentsID2=$row['AgentID'];
	

	//===================AGENT DETAILS============================================
	if (!empty($AgentsID2))
	{
		$sql2 = "SELECT * FROM ch_agents_2 WHERE (AgentID='$AgentsID2') LIMIT 1";		
		$result2 = mysqli_query($conn, $sql2);
		if (mysqli_num_rows($result2) > 0) {
		while($row2 = mysqli_fetch_assoc($result2)) {
				
				
		if (!empty($row2['BusinessName']))
		$Awardedto=$row2['BusinessName'];
		else
		$Awardedto=$row2['DisplayName'];
						
		
		if (!empty($row2['Website']) && empty($AgentID))
		$Website='<a href="https://'.$row2['Website'].'" target="_new" class="text-warning">'.$Awardedto.'</a>'; 
		elseif (empty($row2['Website']) && empty($AgentID))
		$Website='<a href="http://'.$row2['OtherWebsite'].'" target="_new" class="text-warning">'.$Awardedto.'</a>';
	
		if (!empty($row2['Website']) && !empty($AgentID))
		$Website=$Awardedto; 
		elseif (empty($row2['Website']) && !empty($AgentID))
		$Website=$Awardedto;
				
				
		
			}
		}
	}
	else
	{
	$Website='Centre Holidays';
	}
	//=========================================================================================
	
	
	?>
<!--begin::Item-->
<div class="col-xl-6 col-sm-6 mb-10 load-more-items-awards">
<!--begin::Award-->
<div class="card card-custom card-border card-stretch text-dark ribbon ribbon-top">
<!--begin::Label-->
<div class="ribbon-target bg-primary font-weight-bolder text-uppercase" style="top: -2px; right: 20px;">
<?php echo $row['AwardsYear']; ?></div>
<!--end::Label-->
<!--begin::Body-->
<div class="card-body lead d-flex flex-column mt-3">
<h2 class="font-weight-boldest text-uppercase"><?php echo $row['AwardsTitle'] ?></h2>
<p class="mb-0">Awarded to <b><?php echo $Website ?></b> 
by <b><?php echo  $row['RecognizedBy'] ?></b></p>
<div class="separator separator-solid separator-border-1 mb-5 mt-4"></div>
<p class="mb-0"><?php echo  $row['AwardsDescription'] ?></p>								
</div>
<!--end::Body-->
</div>
<!--end::Award-->
</div>
<!--end::Item-->
<?php
		}
	}

?>
<?php
if ($ttcount > 6) {
?>
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-lg btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 loadbutton" id="load-more-button-awards" title="See More Awards"><span><i class="fas fa-angle-double-down"></i></span>See More Awards</button>
</div>
<?php } ?> 
</div>