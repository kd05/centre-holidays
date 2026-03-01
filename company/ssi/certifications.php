<div class="row mt-3">
<style>
.load-more-items-certificates { display:none; }
</style>

<?php
//if (empty($AgentID))
//{
//====================================================
//===================CONNECT TO EPIK DATABSE=========================================
//====================================================

	include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
	$sql = "SELECT * FROM ch_certifications";	
	
	if (!empty($AgentID))
	$sql .=" , ch_agents_certs WHERE (ch_certifications.Title=ch_agents_certs.Certification) AND (ch_agents_certs.AgentID=$AgentID) AND (ch_agents_certs.active=1 || ch_agents_certs.active='') ";
	else
	$sql .= " WHERE ch_certifications.active=1";
	
	$sql .= " ORDER BY ch_certifications.Title ASC";	


	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
  	// output data of each row
  	while($row = mysqli_fetch_assoc($result)) {
	  
	 $certcount++;
	?>
<!--begin::Certification-->
<div class="col-xl-4 col-sm-6 load-more-items-certificates mb-10">
<?php 
								
								$ThumbImageURL=$row['ThumbImageURL']; 

								$certimage='https://'.$_SERVER[HTTP_HOST].'/'.$ThumbImageURL; 
								
								$newcertimage='https://www.centreholidays.com/img/agents/certifications/'.$row['ThumbImageURL'];
								
								?>
<!--begin::Card-->
<div class="card card-custom card-shadowless">
<div class="card-body p-0">
<!--begin::Image-->
<div class="overlay">
<div class="overlay-wrapper text-center">
<img src="<?php echo $newcertimage ?>" alt="<?php echo $row['Title']; ?> - <?php echo $row['SubTitle']; ?>" class="mw-100 w-200px img-border">
</div>
</div>
<!--end::Image-->												</div>
</div>
<!--end::Card-->
</div>
<!--end::Certification-->
<?php 

				}	
}

mysqli_close($conn);


				//}
?>

<?php if ($certcount > 6) { ?>
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5 loadbuttoncert" id="load-more-button-certificates" title="See More Certifications"><span><i class="fas fa-angle-double-down"></i></span>See More Certifications</button>
</div>
<?php } ?>    

</div>
