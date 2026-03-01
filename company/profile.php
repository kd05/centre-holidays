<?php session_start();  #start a session ?>

<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title><?php echo $AboutPageTitle ?></title>
<meta name="description" content="<?php echo $NewAboutMetaDescription ?>">
<!-- begin:: Facebook Sharing -->
<meta property="og:image" content="<?php echo $AboutFacebookImage; ?>" />
<meta property="og:description" content="<?php echo $NewAboutMetaDescription ?>">
<!-- end:: Facebook Sharing -->  

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>


<?php
//AboutH1, BusinessName, DisplayName======================================================
if (!empty($AboutH1))
$ProfileH1=$AboutH1;
elseif (!empty($BusinessName))
$ProfileH1='About '.$BusinessName;
elseif (!empty($DisplayName))
$ProfileH1='About '.$DisplayName;
else
$ProfileH1='About Centre Holidays';

?>  

        
            </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
    	<!--begin::Main-->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/header-mobile.php');?>
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/aside.php');?>
<!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/header.php');?>
<!--end::Header-->


<!--begin::Content-->
<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
<!--begin::Carousel-->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<div class="img"><img class="d-block w-100" src="<?php echo $NewAboutCoverImage ?>" alt="<?php echo $AboutImageDescription ?>"></div>
<div class="carousel-caption d-none d-md-block">
<a href="#">
<button type="button" class="btn btn-dark btn-square btn-wide text-uppercase font-weight-bolder"><?php echo $AboutImageDescription ?></button>
</a> 
</div>
</div>
</div>
</div>
<!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row justify-content-center pl-10 pr-10">
			<div class="text-center pt-11 col-xl-12">
			<?php if (empty($AgentID)) { ?>
                                    <h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $ProfileH1 ?></h1>
									<h2 class="text-dark-65 font-weight-bolder">Centre Holidays is a host travel agency consisting of over 250 home based travel agents who help travellers on a daily basis get away on their dream trip.</h2>
                                    <?php } ?>
                                    <?php if (!empty($AgentID)) { ?>
                                    <h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $ProfileH1 ?></h1>
									<h2 class="text-dark-65 font-weight-bolder"><?php echo $NewAboutMetaDescription ?></h2>
                                    <?php } ?>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<!--begin::Section-->
<div class="container mt-10">
<div class="row mb-20">
<?php
if (empty($AgentPlacesTravelled))
$size='col-xl-6';
else
$size='col-xl-4';
{
?>
<!--begin::Item-->
	<div class="<?php echo $size ?> col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Profile" data-toggle="modal" data-target="#profile-modal" class="text-white flex-grow-1"><div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
  <div class="mt-2">
<h2 class="font-weight-boldest text-uppercase"><?php if (!empty($AgentID)) { ?>Profile<?php } ?><?php if (empty($AgentID)) { ?>Company Profile<?php } ?></h2>
<h6>About <?php echo $titlename ?></h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php if (!empty($AgentID)) { ?>Profile<?php } ?><?php if (empty($AgentID)) { ?>Company Profile<?php } ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <?php echo $NewAgentProfile ?>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php if (empty($AgentID)) { ?>
<!--begin::Item-->
	<div class="col-xl-6 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Become A Home Based Travel Agent With Centre Holidays" data-toggle="modal" data-target="#become-a-travel-agent-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Become A Travel Agent</h2>
<h6>Join Centre Holidays</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="become-a-travel-agent-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Become A Travel Agent</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Learn more of how you can work from home as a licenced travel agent.</p>
<div class="d-flex flex-center mt-10 mb-8"><a href="/work-from-home/home-based-travel-agent-canada.php" title="Work From Home As A Home Based Travel Agent" target="_blank" class="btn btn-warning px-5 py-3 text-uppercase font-weight-bolder">More Information</a></div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php } ?>
<?php if (!empty($AgentID)) { ?>
<!--begin::Item-->
	<div class="<?php echo $size ?> col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Certifications" data-toggle="modal" data-target="#certifications-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Certifications</h2>
<h6>Certified Specialist</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="certifications-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Certifications</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-0">
<?php include($_SERVER['DOCUMENT_ROOT'].'/company/ssi/certifications.php');?>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php if (!empty($AgentPlacesTravelled)) { ?>
<!--begin::Item-->
	<div class="<?php echo $size ?> col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Destinations Visited" data-toggle="modal" data-target="#destinations-visited-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Destinations Visited</h2>
<h6>Cities And Countries</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="destinations-visited-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Destinations Visited</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body">
<iframe src="<?php echo $AgentPlacesTravelled ?>&z=2" width="100%" height="600" frameborder="0" style="border:0;"></iframe>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php } ?>
<?php } ?>
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Type-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/company/centre-holidays-difference-h01.jpg) no-repeat center center /cover; min-height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/company/experience-the-difference.php" title="Experience The Difference">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Experience The Difference</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Type-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Type-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/company/customer-reviews-h01.jpg) no-repeat center center /cover; min-height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/company/customer-reviews.php" title="Customer Reviews">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Customer Reviews</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Type-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Type-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/company/awards-h01.jpg) no-repeat center center /cover; min-height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/company/awards.php" title="Awards & Accolades">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Awards &amp; Accolades</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Type-->
</div>
<!--end::Item-->
<?php if (!empty($AgentID)) { ?>
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Type-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/company/contact-h01.jpg) no-repeat center center /cover; min-height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/company/contact.php" title="Contact Details">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Contact Details</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Type-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (empty($AgentID)) { ?>
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Type-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/company/media-centre-h01.jpg) no-repeat center center /cover; min-height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/company/media-centre.php" title="Media Centre">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Media Centre</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Type-->
</div>
<!--end::Item-->
<?php } ?>
<?php } ?>
<!--begin:Sub-Agent-->
<?php

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql0900 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 and ch_agents_1.AgentType !='Non-Paying Sub-Agent'";
$result0900 = mysqli_query($conn, $sql0900);
$counter0900=mysqli_num_rows($result0900);// number of results

if ($counter0900 > 0) {

while($row0900 = mysqli_fetch_assoc($result0900)) {
	
$PartnerID0900=$row0900['AgentID']; //
$PartnerType0900=$row0900['AgentType']; //

$sql99999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID ='".$PartnerID0900."' AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result99999 = mysqli_query($conn, $sql99999);
}

if (mysqli_num_rows($result99999) > 0) {	
	
$sql22139 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 AND ch_agents_1.AgentType !='Non-Paying Sub-Agent' LIMIT 1";
$result22139 = mysqli_query($conn, $sql22139);

while($row22139 = mysqli_fetch_assoc($result22139)) {
$PartnerID22139=$row22139['PartnerID']; //

if ($PartnerType0900=='Commission Agent')
$sql99900 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID22139."' AND (ch_agents_2.showsubagents=1 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

if ($PartnerType0900=='Sub-Agent')
$sql99900 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID22139."' AND (ch_agents_2.showsubagents=2 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result99900 = mysqli_query($conn, $sql99900);

$counter00099=mysqli_num_rows($result99900);

}


if ($counter00099 > 0 )
{
	
?>

<?php
if ($counter0900 > 1) {
?>
<style>
.modal-backdrop {
     background-color: rgba(0,0,0,.20) !important;
}
</style>
<?php
}
?>
<div class="col-xl-12 mt-20 mb-10">
<div class="card card-custom card-border">
 
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
    <div class="card-title">
    <div class="card-label">
    <h2 class="text-dark font-weight-boldest text-uppercase">Travel Advisor Partners</h2>											
    </div>
    </div>
    </div>
    <!--end::Header-->				
 
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
    <div class="tab-content">
    <!--begin::Table-->
    <div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center text-dark">
    <thead>
    <tr class="text-left text-uppercase">
    <th style="min-width: 250px" class="pl-7">
    <span class="text-dark-65">Travel Advisor</span>
    </th>
    <th style="min-width: 100px"><span class="text-dark-65">Based In</span></th>
    <th style="min-width: 80px"></th>
    </tr>
    </thead>
	<tbody>   
    
<?php
$sql090 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";
$result090 = mysqli_query($conn, $sql090);
while($row090 = mysqli_fetch_assoc($result090)) {
$PartnerID=$row090['PartnerID']; //

$x=$x+1;
$y=$y+1;
$z=$z+1;


//==================partner================================================
if ($PartnerType0900=='Commission Agent')
$sql9999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID."' AND (ch_agents_2.showsubagents=1 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

if ($PartnerType0900=='Sub-Agent')
$sql9999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID."' AND (ch_agents_2.showsubagents=2 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result9999 = mysqli_query($conn, $sql9999);
// output data of each row
 while($row9999= mysqli_fetch_assoc($result9999)) {
	 $FirstName999=$row9999['FirstName'];
	 $LastName9999=$row9999['LastName'];
	 $AgentPositionTitle9999=$row9999['AgentPositionTitle'];
	 $City9999=$row9999['City'];
	 $Province9999=$row9999['Province'];
	 $DisplayName9999=$row9999['DisplayName'];
	 
	 //====================================================================
	 $DisplayUseCity9999=$row9999['DisplayUseCity'];
	 $DisplayUseCity9999=trim(str_replace(",","",$DisplayUseCity9999));
	 
	 if (!empty($DisplayUseCity9999))
	 $DisplayUseCity9999=$row9999['DisplayUseCity'];
	 else
	 $DisplayUseCity9999='-';
	 //=====================================================================
	 
	 $BusinessNum9999=$row9999['BusinessNum'];
	 
	 if (!empty($BusinessNum9999))
	 $BusinessNum9999=$row9999['BusinessNum'];
	 else
	 $BusinessNum9999='-';
	 
	 //=====================================================================
	 $DisplayUseCell9999=$row9999['DisplayUseCell'];
	 
	 if (!empty($DisplayUseCell9999))
	 $DisplayUseCell9999=$row9999['DisplayUseCell'];
	 else
	 $DisplayUseCell9999='-';
	 //=====================================================================	 
	 $TollFreeNum9999=$row9999['TollFreeNum'];
	 
	 if (!empty($TollFreeNum9999))
	 $TollFreeNum9999=$row9999['TollFreeNum'];
	 else
	 $TollFreeNum9999='-';	 
	 //=====================================================================
	 
	 $Image9999=$row9999['Image'];
	 
	 if (empty($Image9999))
	 $Image9999='https://centreholidays.com/img/profile-s01.jpg';
	 else
	 $Image9999='https://centreholidays.com/img/agents/'.$PartnerID.'/profile.jpg';
	//====================================================================================
	
	$HOGMap9999=$row9999['HOGMap'];
	
	if (!empty($row9999['AgentProfile']))
	$AgentProfile9999=$row9999['AgentProfile'];
	else
	{
	$AgentProfile9999='<p>When it comes to planning your trip, you want everything to go smoothly every step of the way. In case there is an issue while on your trip, you want to be able to deal with a person directly on the other end of the phone instead of an automated voice or a call centre somewhere in the world.
<br>
<br>
This is where I come in. I can assist you from start to finish with the planning of your trip, offer you insight on hotels, destinations, excursions and more. I can provide you with competitive pricing while keeping your needs in mind.<br>
<br>
Whatever your interests or needs, let me know and I will be happy to work with you. To setup a free travel consultation, please feel free to contact me.</p>';
	}
	?>    
    <tr>
    <td class="pl-0 py-8">
    <div class="d-flex align-items-center">
    <div class="mr-4">
    <span class="symbol symbol-55">
	<img class="img-border" src="<?php echo $Image9999 ?>" alt="<?php echo $DisplayName9999 ?>" />
    </span>
    </div>
    <div>
    <span class="font-weight-bolder d-block font-size-lg"><?php echo $DisplayName9999 ?></span>
    <span class="font-size-sm text-dark-65 font-weight-bold d-block"><?php echo $AgentPositionTitle9999 ?></span>
    </div>
    </div>
    </td>
    <td>
    <span class="font-weight-bolder d-block font-size-lg"><?php echo $DisplayUseCity9999 ?></span>
    </td>
    <td class="pr-0 text-right"><a href="#" class="btn btn-warning font-weight-bolder font-size-sm text-uppercase mr-5" data-toggle="modal" data-target="#sub-agent-profile-modal<?php echo $PartnerID.$x ?>" title="Profile">Profile</a><a href="#" class="btn btn-warning font-weight-bolder font-size-sm text-uppercase mr-5" data-toggle="modal" data-target="#sub-agent-certifications-modal<?php echo $PartnerID.$y ?>" title="Certifications">Certifications</a><a href="#" class="btn btn-warning font-weight-bolder font-size-sm text-uppercase" data-toggle="modal" data-target="#sub-agent-awards-modal<?php echo $PartnerID.$z ?>" title="Awards & Accolades">Awards</a></td>
    </tr>
    <!--begin::Sub-Agent Profile Modal-->
    <div class="modal fade" id="sub-agent-profile-modal<?php echo $PartnerID.$x ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content border border-4">
    <div class="modal-header bg-light">
    <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $DisplayName9999 ?> - Profile</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="ki ki-close"></i>
    </button>
    </div>
    <div class="modal-body lead pb-3">
    <?php echo $AgentProfile9999 ?>
    </div>
    <div class="modal-footer bg-light">
    <button type="button" class="btn btn-warning font-weight-bolder text-uppercase" data-dismiss="modal">Close</button>
    </div>
        </div>
    </div>
    </div>
    <!--end::Sub-Agent Profile Modal-->
    <!--begin::Sub-Agent Awards Modal-->
    <div class="modal fade" id="sub-agent-awards-modal<?php echo $PartnerID.$y ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content border border-4">
    <div class="modal-header bg-light">
    <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $DisplayName9999 ?> - Awards & Accolades</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="ki ki-close"></i>
    </button>
    </div>
    <div class="modal-body">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/company/ssi/sub-awards.php');?>
    </div>
    <div class="modal-footer bg-light">
    <button type="button" class="btn btn-warning font-weight-bolder text-uppercase" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <!--end::Sub-Agent Awards Modal-->
    <!--begin::Certifications Modal-->
    <div class="modal fade" id="sub-agent-certifications-modal<?php echo $PartnerID.$z ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content border border-4">
    <div class="modal-header bg-light">
    <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $DisplayName9999 ?> - Certifications</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="ki ki-close"></i>
    </button>
    </div>
    <div class="modal-body pb-0">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/company/ssi/sub-certifications.php');?>
    </div>
    <div class="modal-footer bg-light">
    <button type="button" class="btn btn-warning font-weight-bolder text-uppercase" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <!--end::Certifications Modal-->
    <?php

 }
	}
?>
    </tbody>
    </table>
    </div>
    <!--end::Table-->
        </div>
    </div>
    <!--end::Body-->
    </div>
    </div>
    <?php
	}
}
?> 
<?php 
}
?> 
<!--end:Sub-Agent-->
</div>

<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer.php');?>
                
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->
<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>
				<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>