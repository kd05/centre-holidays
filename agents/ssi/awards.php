<?php session_start();  #start a session 

//====================================================
//===================CONNECT TO EPIK DATABSE=========================================
//====================================================

	include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
	$sql = "SELECT * FROM ch_awards ";	
	
	$sql .=" WHERE active=1 ";
	
	//if (!empty($AgentID))
	//$sql .=" AND (AgentID='$AgentID' || AgentID='')";

	$sql .= " ORDER BY ";
	
	//if (!empty($AgentID))
	//$sql .= " AgentID DESC, ";
	//else
	//$sql .= " AgentID ASC, ";

	$sql .= " AwardsID DESC";	
	
	$result = mysqli_query($conn, $sql);
	
		$ttcount = mysqli_num_rows($result);
		
		?>
<style>
.load-more-items-awards { display:none; }
</style>
<div class="row mb-20">
<?php	

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	$counting5++;	
	
	$AgentsID2=$row['AgentID'];
//===================AGENT DETAILS if exists==================

	if (!empty($AgentsID2))
	{
		$sql2 = "SELECT * FROM ch_agents WHERE (AgentID='$AgentsID2') LIMIT 1";		
		$result2 = mysqli_query($conn, $sql2);
			if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
				$Awardedto=$row2['DisplayName'];
			}
		}
	}
	else
	{
	$Awardedto='Centre Holidays';
	}

	?>
<!--begin::Item-->
<div class="col-xl-6 col-sm-6 mb-10 load-more-items-awards">
<!--begin::Award-->
<div class="card card-custom card-border card-stretch text-dark ribbon ribbon-top">
<!--begin::Label-->
<div class="ribbon-target bg-primary font-weight-bolder text-uppercase" style="top: -2px; right: 20px;"><?php echo $row['AwardsYear']; ?></div>
<!--end::Label-->
<!--begin::Body-->
<div class="card-body lead d-flex flex-column mt-3">
<h2 class="font-weight-boldest text-uppercase">
<?php echo $row['AwardsTitle'] ?></h2>
<p class="mb-0">Awarded to <b><?php echo $Awardedto ?></b> by <b><?php echo  $row['RecognizedBy'] ?></b></p>
<div class="separator separator-solid separator-border-1 mb-5 mt-5"></div>
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
<button type="button" class="btn btn-lg btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-awards" title="See More Awards"><span><i class="fas fa-angle-double-down"></i></span>See More Awards</button>
</div>
<?php } ?> 
</div>