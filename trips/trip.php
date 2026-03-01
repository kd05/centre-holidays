<?php 
ob_start();
session_start();  #start a session ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/trips/ssi/trips-db-details.php');?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>

<title><?php echo $ttitle888 ?> | <?php echo $TagTitle ?></title>
<meta name="description" content="<?php echo $tmeta888 ?>">

<!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/trips/<?php echo $thorizontalimage888 ?>" />
<meta property="og:description" content="<?php echo $tmeta888 ?>">
<!-- end:: Facebook Sharing -->
        
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
        
</head>
    <!--end::Head-->
<?php    

$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS

//======================Check if this IP already in the black list=========================
include($_SERVER['DOCUMENT_ROOT'].'/library/chck_blacklist.php');


$trp=$_GET['trp'];
$tid=$_GET['tid'];

if (isset($_GET['resp']) && $_GET['resp']==1)
{
?>
<!--begin::Modal-->

<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-success">
                <h2 class="mb-0 font-weight-boldest text-uppercase text-white">Trip Inquiry Submitted</h2>
                <a href="<?php echo $Link ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
            <p class="lead">Thank you for taking the time to submit an inquiry. We will be in touch with you once your inquiry is reviewed.
            <br /><br />
            A copy of your inquiry has also been emailed to you. Please check your spam folder if you do not see the email in your inbox.</p>
            </div>
            <div class="modal-footer bg-light">
                <a href="<?php echo $_SERVER['PHP_SELF'].'?trp='.$trp.'&tid='.$tid ?>" type="button" class="btn btn-warning text-uppercase font-weight-bolder px-5 py-3" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php
	}

if (isset($_GET['resp']) && $_GET['resp']==0)
	{
	?>
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="mb-0 font-weight-boldest text-uppercase text-danger">Error!</h2>
                <a href="<?php echo $Link  ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
               <p class="lead mb-0">Please complete the  fields.</p>
            </div>
            <div class="modal-footer bg-light">
                <a href="<?php echo $_SERVER['PHP_SELF'].'?trp='.$trp.'&tid='.$tid ?>" type="button" class="btn btn-warning text-uppercase font-weight-bolder px-5 py-3" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>	
	<?php
	}
	
?>    
    
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
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $timage888 ?>" alt="<?php echo $tcoverimgalt ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tcoverimgalt888 ?></button></a> 
  </div>
</div>
  </div>
</div>
  <!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class="container">
        <!--begin::title-->
        <div class="row pl-10 pr-10">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $ttitle888 ?></h1>
									<h2 class="text-dark-65 font-weight-bolder"><?php echo $tmeta888 ?></h2>				
            </div>
            </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Documents-->
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#trip-details-tab">Trip Details</a>
</li>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#quote-tab">Get A Quote</a>
</li>
</ul>
<div class="tab-content mt-10">
<div class="tab-pane fade active show" id="trip-details-tab" role="tabpanel" aria-labelledby="trip-details-tab">
<div class="row mb-20">
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Overview" data-toggle="modal" data-target="#overview-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-info fa-2x text-white"></i>												
</div>													
<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Overview</h2>
<h6>Inclusions, Exclusions And More</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="overview-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
              <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Overview</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<div class="row">
               <!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="far fa-handshake fa-3x"></i>						
</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Travel Partner</a>
<?php $toperators888=rtrim($toperators888, ', ') ?>
<div class="text-dark lead"><?php echo $toperators888 ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">

<span>

<?php echo $signfa3x ?>

					

</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Starts At</a>
<div class="text-dark lead"><?php echo $tcurrency888 ?><?php echo $tprice888 ?> Per Person</div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
               <!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-globe-americas fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Regions</a>
<div class="text-dark lead"><?php if (!empty($tothercontinents888)) $tothercontinents888=', '.$tothercontinents888?><?php echo rtrim($tcontinent888.$tothercontinents888 ,", "); ?>
</div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-globe-americas fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Places</a>
<div class="text-dark lead"><?php if (!empty($tothercountries888)) $tothercountries888=', '.$tothercountries888?><?php echo rtrim($tcountry888.$tothercountries888 ,", "); ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-map-marker-alt fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Starts In</a>
<div class="text-dark lead"><?php echo $tstartarea888 ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-map-marker-alt fa-3x"></i>						
</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Ends In</a>
<div class="text-dark lead"><?php echo $tendarea888 ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<?php if (!empty($tstartdate888)) {?>
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-calendar-alt fa-3x"></i>						
</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Start Date</a>
<div class="text-dark lead"><?php echo date("F j, Y", strtotime($tstartdate888)) ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($tenddate888)) {?>
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-calendar-alt fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">End Date</a>
<div class="text-dark lead"><?php echo date("F j, Y", strtotime($tenddate888)) ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<?php } ?>
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-route fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Trip Length</a>
<div class="text-dark lead"><?php echo $tdays888 ?> Days</div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-heartbeat fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Activity Level</a>
<div class="text-dark lead"><?php echo rtrim($activitylevel888, ', ') ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-gem fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Style</a>
<div class="text-dark lead"><?php echo rtrim($tstyle888, ', ') ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="fas fa-asterisk fa-3x"></i>						</span>
</div>
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bolder font-size-h3">Trip Code</a>
<div class="text-dark lead"><?php echo rtrim($tcode888, ', ') ?></div>
</div>
</div>
</div>
</div>
</div>
<!--end::Item-->
</div>
<div class="mt-10">
<?php echo $tinclusions888 ?>
<?php echo $texclusions888 ?>
<?php echo $tadditionalnotes888 ?>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Map" data-toggle="modal" data-target="#map-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-map fa-2x text-white"></i>												</div>													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Map</h2>
<h6>Trip At A Glance</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Map</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body">
<img class="img-responsive img-border" alt="Route Map" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $troutmap888 ?>">
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Itinerary" data-toggle="modal" data-target="#itinerary-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-map-marker-alt fa-2x text-white"></i>												</div>													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Itinerary</h2>
<h6>Day-By-Day</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="itinerary-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Itinerary</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#main-tour" title="Main Tour">Main Tour</a>
</li>
<?php if (!empty($extension1888)) {?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#extension-1" title="Extension 1">Extension<?php if (!empty($extension2888)) {?> 1<?php } ?></a>
</li>
<?php } ?>
<?php if (!empty($extension2888)) {?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#extension-2" title="Extension 2">Extension 2</a>
</li>
<?php } ?>
</ul>
<div class="tab-content mt-10" id="itinerary-content">
<div class="tab-pane fade active show table-responsive" id="main-tour" role="tabpanel" aria-labelledby="main-tour">
  <?php echo $tbody888 ?></div>
  <?php if (!empty($extension1888)) {?>
<div class="tab-pane fade table-responsive" id="extension-1" role="tabpanel" aria-labelledby="extension-1">
  <?php echo $extension1888 ?></div>
  <?php } ?> 
  <?php if (!empty($extension2888)) {?>
<div class="tab-pane fade table-responsive" id="extension-2" role="tabpanel" aria-labelledby="extension-2"><?php echo $extension2888 ?></div>
<?php } ?> 
</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Stay & Explore" data-toggle="modal" data-target="#stay-explore-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-grin-stars fa-2x text-white"></i>												</div>
<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
  <div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Stay &amp; Explore</h2>
<h6>Accommodation And Experiences</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="stay-explore-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Stay &amp; Explore</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#accommodation" title="Accommodation">Accommodation</a>
</li>
<?php if (!empty($texperiences888)) {?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#experiences" title="Experiences">Experiences</a>
</li>
<?php } ?>
</ul>
<div class="tab-content mt-10" id="stay-play-content">
<div class="tab-pane fade active show table-responsive" id="accommodation" role="tabpanel" aria-labelledby="accommodation">
  <?php echo $accommodation888 ?></div>
  <?php if (!empty($texperiences888)) {?>
<div class="tab-pane fade table-responsive" id="experiences" role="tabpanel" aria-labelledby="experiences">
  <?php echo $texperiences888 ?></div>
  <?php } ?>
</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Left Ribbon-->
<div class="ribbon ribbon-top">	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 20px;">Finance This Trip</div>
</div>
<!--end::Left Ribbon-->
    <!--begin::Body-->
<a href="#" title="Rates & Dates" data-toggle="modal" data-target="#rates-dates-modal" class="text-white flex-grow-1">
<!--begin::Right Ribbon-->
<div class="ribbon ribbon-clip ribbon-right">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-dollar-sign fa-2x text-white"></i>												</div>
</div>
<!--end::Right Ribbon-->													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Rates &amp; Dates</h2>
<h6><?php echo $tratesdatesyear1888 ?> <?php if (!empty($tratesdatesyear2888)) { ?>/ <?php echo $tratesdatesyear2888 ?> <?php } ?><?php if (!empty($tratesdatesyear3888)) { ?>/ <?php echo $tratesdatesyear3888 ?><?php } ?> Season</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="rates-dates-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Rates &amp; Dates</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-h5 text-dark" data-toggle="tab" href="#rates-dates-1"><?php echo $tratesdatesyear1888 ?></a>
</li>
<?php if (!empty($tratesdatesyear2888)) { ?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-h5 text-dark" data-toggle="tab" href="#rates-dates-2"><?php echo $tratesdatesyear2888 ?></a>
</li>
<?php } ?>
<?php if (!empty($tratesdatesyear3888)) { ?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-h5 text-dark" data-toggle="tab" href="#rates-dates-3"><?php echo $tratesdatesyear3888 ?></a>
</li>
<?php } ?>
</ul>
<div class="tab-content mt-10" id="rates-dates-content">
<div class="tab-pane fade active show table-responsive" id="rates-dates-1" role="tabpanel" aria-labelledby="rates-dates-1">
  <?php echo $tratesdates888 ?>
  <div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Finance this trip through <b>Uplift</b> to help make it more affordable. For more information, please contact us.</div>
</div>
  </div>  
<?php if (!empty($tratesdatesyear2888)) { ?>
<div class="tab-pane fade table-responsive" id="rates-dates-2" role="tabpanel" aria-labelledby="rates-dates-2"><?php echo $tratesdates2888 ?>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Finance this trip through <b>Uplift</b> to help make it more affordable. For more information, please contact us.</div>
</div></div>
  <?php } ?>
  <?php if (!empty($tratesdatesyear3888)) { ?>
  <div class="tab-pane fade table-responsive" id="rates-dates-3" role="tabpanel" aria-labelledby="rates-dates-3">
  <?php echo $tratesdates3888 ?>
  <div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Finance this trip through <b>Uplift</b> to help make it more affordable. For more information, please contact us.</div>
</div>
  </div>
    <?php } ?>
</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Media Gallery" data-toggle="modal" data-target="#media-gallery-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-photo-video fa-2x text-white"></i>												</div>													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Media Gallery</h2>
<h6>Photos And Videos</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="media-gallery-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
              <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Media Gallery</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body">
<!--begin::Carousel-->
<div id="media-gallery-carousel" class="carousel slide carousel-fade mb-1" data-interval="0" data-ride="carousel">
  <div class="carousel-inner">
<!--begin::Media-->
    <div class="carousel-item active">
    <?php
if (!empty($tvideo888))
{
?>
<iframe width="100%" height="450" src="<?php echo $tvideo888 ?>" frameborder="0" allowfullscreen> </iframe>
<?php
}
elseif (empty($tvideo888))
{
?> 
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider1888 ?>" alt="<?php echo $tslidercap1888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap1888 ?></button></a> 
  </div>
  <?php } ?>
</div>
<!--end::Media-->
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider2888 ?>" alt="<?php echo $tslidercap2888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap2888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider3888 ?>" alt="<?php echo $tslidercap3888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap3888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php if (!empty($tslider4888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider4888 ?>" alt="<?php echo $tslidercap4888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap4888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider5888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider5888 ?>" alt="<?php echo $tslidercap5888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap5888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider6888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider6888 ?>" alt="<?php echo $tslidercap6888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap6888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider7888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider7888 ?>" alt="<?php echo $tslidercap7888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap7888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider8888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider8888 ?>" alt="<?php echo $tslidercap8888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap8888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider9888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider9888 ?>" alt="<?php echo $tslidercap9888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap9888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider10888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider10888 ?>" alt="<?php echo $tslidercap10888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap10888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider11888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider11888 ?>" alt="<?php echo $tslidercap11888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap11888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
<?php if (!empty($tslider12888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider12888 ?>" alt="<?php echo $tslidercap12888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $tslidercap12888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php } ?>
  </div>
  <a class="carousel-control-prev" href="#media-gallery-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#media-gallery-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!--end::Carousel-->
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php if (!empty($tfilech888)) { ?>
<div class="col-xl-12 mb-20 d-flex flex-center">
<a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" download><span><i class="fas fa-download"></i></span>Download Itinerary</a>
</div>
<?php } ?>
<!--begin::Item-->
	<div class="col-xl-6 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-danger.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Trip Financing" data-toggle="modal" data-target="#trip-financing-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-credit-card fa-2x text-white"></i>												</div>													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Trip Financing</h2>
<h6>Buy Now And Pay Later</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="trip-financing-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-danger">Trip Financing With Uplift</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <p>Financing your trip with Uplift can help make your travel more affordable.</p>
<ul>
<li>Lock in trip prices when they're at their lowest.</li>
<li>Enhance your trip with room upgrades, tours, attraction tickets, and more.</li>
<li>Put your payments on autopilot, relax, and enjoy your vacation.</li>
</ul>
<div class="row mt-10">
 <div class="col-xl-12 mb-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
											<div class="card-body">
												<div class="d-flex align-items-center p-0">
													<div class="symbol symbol-circle symbol-success mr-5">
																	<span class="symbol-label">1</span>
																</div>
													<div class="d-flex flex-column">					<div class="mt-4">
													  <p>When requesting a quote for this trip, ask for trip financing with Uplift.</p></div>
													</div>
												</div>
											</div>
</div>
</div>
<div class="col-xl-12 mb-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
											<div class="card-body">
												<div class="d-flex align-items-center p-0">
													<div class="symbol symbol-circle symbol-success mr-5">
																	<span class="symbol-label">2</span>
																</div>
													<div class="d-flex flex-column">					<div class="mt-4">
													  <p>Complete an easy, commitment-free application and receive your loan decision in seconds.</p></div>
													</div>
												</div>
											</div>
</div>
</div>
<div class="col-xl-12 mb-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
											<div class="card-body">
												<div class="d-flex align-items-center p-0">
													<div class="symbol symbol-circle symbol-success mr-5">
																	<span class="symbol-label">3</span>
																</div>
													<div class="d-flex flex-column">					<div class="mt-4">
													  <p>Pay over time with fixed monthly installments. There are no late fees or pre-payment penalties and you can travel before paying off your trip.</p></div>
													</div>
												</div>
											</div>
</div>
</div>

</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-6 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-clip ribbon-right" style="background:url(/img/agents/module-bg-danger.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Book With Confidence" data-toggle="modal" data-target="#book-with-confidence-modal" class="text-white flex-grow-1">
<div class="ribbon-target" style="top: 15px; height: 50px;">
<span class="ribbon-inner bg-primary"></span>
<i class="fas fa-thumbs-up fa-2x text-white"></i>												</div>													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Book With Confidence</h2>
<h6>Travel Better</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="book-with-confidence-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-danger">Book With Confidence</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Travel better with a travel advisor. We are committed to you and you can rely on us to:</p>
<h3 class="mt-10 font-weight-bolder">Provide Destination COVID-19 Status And Entry Requirement Details</h3>
<p>Countries and localities may have different policies around COVID-19, which may include vaccination requirements, testing or mandatory quarantines, denying entry to travellers from certain countries and more. Destinations may be open, but attractions may be closed. Hotels may be open, but services may be reduced. We'll work with you every step of the way to take care of details and coordinate all of the components of your trip.</p>
<h3 class="mt-10 font-weight-bolder">Share Health & Safety Information</h3>
<p>We can share specific measures properties and other travel providers are taking ensure safety while you travel.</p>
<h3 class="mt-10 font-weight-bolder">Understand Cancellation Policies</h3>
<p>Airline, hotel and other travel provider cancellation policies are changing as the situation evolves. We can provide information on those policies and recommend the best options in light of those policies.</p>
<h3 class="mt-10 font-weight-bolder">Rebook Cancelled Trips</h3>
<p>We are here to help you through the rebooking or refund process. We can help you decide what options are available to you.</p>
<h3 class="mt-10 font-weight-bolder">Recommend A Travel Insurance Plan</h3>
<p>Travel insurance is more important than ever as it can provide an  extra level of protection in an uncertain environment. We can recommend a plan that's best suited to your individual needs.</p>
<h3 class="mt-10 font-weight-bolder">Assist When You Need Us Most</h3>
<p>We're here for you before, during and after your trip as your personal advocate to ensure all goes smoothly and safely, and we're ready to jump in to help when needed.</p>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>
</div>
<div class="tab-pane fade" id="quote-tab" role="tabpanel" aria-labelledby="quote-tab">
<?php include($_SERVER['DOCUMENT_ROOT'].'/forms/ssi/trip-offer-inquiry.php');?>
  </div>
</div>
</div>
<!--end::Trip Details And Form-->
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
<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>
				<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>
<?php ob_flush(); ?>