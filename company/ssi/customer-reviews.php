<style>
.load-more-items-reviews { display:none; }
</style>    
<!--begin::Item-->

<?php session_start();  #start a session 

	include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
	$sql = "SELECT * FROM ch_feedback ";	
	
	$sql .=" WHERE FeedStatus=1 ";
	
	if (!empty($AgentID))
	$sql .=" AND AgentID='$AgentID' ";
	
	$sql .= " ORDER BY FeedID DESC";	

	$result = mysqli_query($conn, $sql);
	
	$ttcount = mysqli_num_rows($result);
	
	//====================================change the size of the div
	switch ($ttcount) {
	case 1:
	$divsize='col-xl-12';
	break;
	case 2:
	$divsize='col-xl-6';
	break;
	default:
	$divsize='col-xl-4';
	}
	
    
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
	$counting4++;	
	
	$AgentsID2=$row['AgentID'];
	?>

<div class="<?php echo $divsize ?> col-sm-6 mb-10 load-more-items-reviews">
<!--begin::Customer Review-->
<div class="card card-custom card-border card-stretch text-dark ribbon ribbon-top">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">	
<div class="ribbon-target bg-success font-weight-bolder py-3" style="top: -2px; right: 20px;"><?php  
	$fas=$row['FeedExperience']-1; 
	$far=5-$row['FeedExperience']-1;
	for ($x = 0; $x <= $fas; $x++) {
    ?>
<i class="ml-1 fas fa-star text-warning mr-1"></i>
<?php
	}
	for ($y = 0; $y <= $far; $y++) {
    ?>
<i class="far fa-star text-warning ml-1 mr-1"></i>
<?php
	}
?></div>
</div>
<!--end::Ribbon-->
<!--begin::Body-->
<div class="card-body d-flex flex-column">
<div class="flex-grow-1 mt-3 lead">
<h2 class="font-weight-boldest mb-4 text-uppercase"><?php echo $row['FeedTitle']; ?></h2>
<p>
<?php

	$sql2 = "SELECT * FROM ch_agents_2 WHERE (AgentID='$AgentsID2') LIMIT 1";		
	$result2 = mysqli_query($conn, $sql2);
	if (mysqli_num_rows($result2) > 0) {
	while($row2 = mysqli_fetch_assoc($result2)) {
			
	
	if (!empty($row2['BusinessName']))
	$Feedto=$row2['BusinessName'];
	else
	$Feedto=$row2['DisplayName'];
					
	
	if (!empty($row2['Website']) && empty($AgentID))
	$Website='<a href="https://'.$row2['Website'].'" target="_new" class="text-warning">'.$Feedto.'</a>'; 
	elseif (empty($row2['Website']) && empty($AgentID))
	$Website='<a href="http://'.$row2['OtherWebsite'].'" target="_new" class="text-warning">'.$Feedto.'</a>';

	if (!empty($row2['Website']) && !empty($AgentID))
	$Website=$Feedto; 
	elseif (empty($row2['Website']) && !empty($AgentID))
	$Website=$Feedto;
		}
	}



if (empty($AgentID))
{
?>Review Of <b><?php echo $Website; ?></b><br /><?php
}
?> 
By <b><?php echo ucwords($row['FeedName']); ?></b></p>
<small><?php echo date('F j, Y',strtotime($row['FeedDate'])); ?></small>



</div>

<a href="#" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mt-10" id="load-more-items" title="Read Customer Review" data-toggle="modal" data-target="#m<?php echo $row['FeedID'] ?>">Read Review</a>								

</div>
<!--end::Body-->
</div>
<!--end::Customer Review-->
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="m<?php echo $row['FeedID'] ?>">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content text-dark border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0">Customer Review <?php

if (empty($AgentID))
{
?>Of <?php echo $Website; ?><?php
}
?></h2>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i aria-hidden="true" class="ki ki-close"></i>
</button>
</div>
<div class="modal-body lead">
<h3 class="font-weight-bolder text-capitalize"><?php echo $row['FeedTitle']; ?></h3>
<p><?php echo $row['FeedMessage']; ?></p>
<p class="mt-10 mb-0"><b><?php echo ucwords($row['FeedName']); ?></b><br>
<?php echo date('F j, Y',strtotime($row['FeedDate'])); ?></p>
            </div>
            <div class="modal-footer bg-light">
            <div class="flex-grow-1">
            <?php  
	$fas=$row['FeedExperience']-1; 
	$far=5-$row['FeedExperience']-1;
	for ($x = 0; $x <= $fas; $x++) {
    ?>
    <i class="fas fa-star fa-2x text-warning mr-3"></i>
    <?php
	}
	for ($y = 0; $y <= $far; $y++) {
    ?>
    <i class="far fa-star fa-2x text-warning"></i>
    <?php
	}
	?>
    </div>
                <button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php 

				}	
		}

	if ($ttcount > 6) {
	?> 
<div class="col-xl-12 d-flex flex-center">
  <button type="button" class="btn btn-lg btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mt-5 mb-10 loadbutton-reviews" id="load-more-button-reviews" title="See More Customer Reviews"><span><i class="fas fa-angle-double-down"></i></span>See More Customer Reviews</button>
</div>
<?php
	}
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closedb.php');
?>