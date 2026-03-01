<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>

<div class="row mt-3">
<?php

	$sql540 = "SELECT * FROM ch_certifications";	
	
	if (!empty($PartnerID))
	$sql540 .=" , ch_agents_certs WHERE (ch_certifications.Title=ch_agents_certs.Certification) AND (ch_agents_certs.AgentID=$PartnerID) AND (ch_agents_certs.active=1 || ch_agents_certs.active='') ";
	else
	$sql540 .= " WHERE ch_certifications.active=1";
	
	$sql540 .= " ORDER BY ch_certifications.Title ASC";	


	$result540 = mysqli_query($conn, $sql540);
	
	$ttcount540=mysqli_num_rows($result540);
	
	if (mysqli_num_rows($result540) > 0) {
  	// output data of each row
  	while($row540 = mysqli_fetch_assoc($result540)) {
	
	?>

<script>
$(function(){
    $(".load-more-items-sub-certificates<?php echo $PartnerID ?>").slice(0,6).show(); // select the first ten
    $("#load-more-button-sub-certificates<?php echo $PartnerID ?>").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-sub-certificates<?php echo $PartnerID ?>:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-sub-certificates<?php echo $PartnerID ?>:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-sub-certificates<?php echo $PartnerID ?>").hide();
        }
    });
});
</script>
<style>
.load-more-items-sub-certificates<?php echo $PartnerID ?> {display:none;}
</style>


<!--begin::Certification-->
<div class="col-xl-4 col-sm-6 mb-10 load-more-items-sub-certificates<?php echo $PartnerID ?>">
<?php 

$ThumbImageURL540=$row540['ThumbImageURL']; 

$certimage540='https://'.$_SERVER[HTTP_HOST].'/'.$ThumbImageURL540; 

$newcertimage540='https://www.centreholidays.com/img/agents/certifications/'.$row540['ThumbImageURL'];

?>
<!--begin::Card-->
<div class="card card-custom card-shadowless">
<div class="card-body p-0">
<!--begin::Image-->
<div class="overlay">
<div class="overlay-wrapper text-center">
<img src="<?php echo $newcertimage540 ?>" alt="<?php echo $row540['Title']; ?> - <?php echo $row540['SubTitle']; ?>" class="mw-100 w-200px img-border">
</div>
</div>
<!--end::Image-->												
</div>
</div>
<!--end::Card-->
</div>
<!--end::Certification-->
<?php 

	}	
}

?>
<?php
if ($ttcount540 > 6) {
?>
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-sub-certificates<?php echo $PartnerID ?>" title="See More certificates"><span><i class="fas fa-angle-double-down"></i></span>See More certifications</button>
</div>
<?php } ?> 
</div>
