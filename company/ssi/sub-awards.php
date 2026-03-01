<?php session_start(); ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>

    <style>
    .load-more-items-sub-awards<?php echo $PartnerID ?> {display:none; }
    </style>
    
    
    <script>
    $(function(){
    $(".load-more-items-sub-awards<?php echo $PartnerID ?>").slice(0,6).show(); // select the first ten
    $("#load-more-button-sub-awards<?php echo $PartnerID ?>").click(function(e){ // click event for load more
    e.preventDefault();
    $(".load-more-items-sub-awards<?php echo $PartnerID ?>:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
    if($(".load-more-items-sub-awards<?php echo $PartnerID ?>:hidden").length == 0){ // check if any hidden divs still exist
    //  alert("No More Promos");  //alert if there are none left
    $(".subawards<?php echo $PartnerID ?>").hide();
    }
    });
    });
    </script>

	<?php 
    
    /*
    AwardsWebsite
    If empty all websites.............
    1 Commission Agent and Corporate Website.............
    2 Commission Agent Website...........................    
	3 Corporate Website..................................
    4 Sub-Agent Website.
    5 Commission Agent, Sub-Agent (All) and Corporate Website. (if there are 10 partners, it needs to appear on all 10 partners)
    6 Sub-Agent (One), Commission Agent and Corporate Website (only one partner's website, the primary agent website and corporate website)
    7 Sub-Agent (One) and Corporate Website.
    */
	  
/*      echo 'COMMISSION AGENT '.$AgentID;
      echo "<br />";
      echo 'SUB AGENT '.$PartnerID;
      echo "<hr />";*/
	  

	//==============================================check awards========================================  	

	$sql6666 = "SELECT * FROM ch_awards WHERE active=1 ";
	
	$sql6666 .=" AND (AwardsWebsite='' || AwardsWebsite=4 || AwardsWebsite=5 || AwardsWebsite=6 || AwardsWebsite=7)"; 

	$sql6666 .=" AND (AgentID='$AgentID' || AgentID='$PartnerID' || AgentID='')";
	
	$sql6666 .= " ORDER BY AwardsYear DESC, AwardsID DESC";	//AgentID DESC,
	
	$result6666 = mysqli_query($conn, $sql6666);
	
	$ttcount6666 = mysqli_num_rows($result6666);
	
	?>

    <div class="row">
    
    <?php	
    
    mysqli_num_rows($result6666);
    
    if (mysqli_num_rows($result6666) > 0) {
		
    while($row6666 = mysqli_fetch_assoc($result6666)) {
		
	$AgentsID2=$row6666['AgentID'];	
    
    if (!empty($AgentsID2))
	{
	$sql2 = "SELECT * FROM ch_agents_2 WHERE AgentID='$AgentsID2' LIMIT 1";		
	$result2 = mysqli_query($conn, $sql2);
	if (mysqli_num_rows($result2) > 0) {
		while($row2 = mysqli_fetch_assoc($result2)) {
		
		if (!empty($row2['BusinessName']))
		$Awardedto6666=$row2['BusinessName'];
		else
		$Awardedto6666=$row2['DisplayName'];
			}
		}
	}
	else
    $Awardedto6666='Centre Holidays';
	
    ?>
    
    <!--begin::Item-->
    <div class="col-xl-6 col-sm-6 mb-10 load-more-items-sub-awards<?php echo $PartnerID ?>">
    <!--begin::Award-->
    <div class="card card-custom card-border card-stretch text-dark ribbon ribbon-top">
    <!--begin::Label-->
<div class="ribbon-target bg-primary font-weight-bolder text-uppercase" style="top: -2px; right: 20px;">
<?php echo $row6666['AwardsYear']; ?></div>
<!--end::Label-->    
    <!--begin::Body-->
    <div class="card-body lead d-flex flex-column mt-3">
    <h2 class="font-weight-boldest text-uppercase"><?php echo $row6666['AwardsTitle'] ?></h2>
    <p class="mb-0">Awarded to <b><?php echo $Awardedto6666 ?></b> by <b><?php echo  $row6666['RecognizedBy'] ?></b></p>
    <div class="separator separator-solid separator-border-1 mb-5 mt-4"></div>
    <p class="mb-0"><?php echo $row6666['AwardsDescription'] ?></p>								
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
    if ($ttcount6666 > 6) {
    ?>
    <div class="col-xl-12 d-flex flex-center">
    <button type="button" class="btn btn-lg btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 subawards<?php echo $PartnerID ?>" id="load-more-button-sub-awards<?php echo $PartnerID ?>" title="See More Awards"><span><i class="fas fa-angle-double-down"></i></span>See More Awards</button>
    </div>
    <?php } ?> 
    </div>
