<?php session_start();  #start a session ?>
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
<meta property="og:image" content="https://<?php echo $imagesource ?>/img/trips/<?php echo $thorizontalimage888 ?>" />
<meta property="og:description" content="<?php echo $tmeta888 ?>">
<!-- end:: Facebook Sharing -->
        
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
        
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
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $timage888 ?>" alt="<?php echo $tcoverimgalt ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tcoverimgalt888 ?></button></a> 
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
        <div class="col-xl-1"></div>
			<div class="text-center pt-11 col-xl-10">
									<h1 class="font-weight-bolder text-dark display-3"><?php echo $ttitle888 ?></h1>
									<h2 class="text-dark-65"><?php echo $tmeta888 ?></h2>				
            </div>
                                    <div class="col-xl-1"></div>
            </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<div class="separator separator-solid separator-border-1 mt-30"></div>

<!--begin::Section-->
<div class="container mt-n20">
<ul class="mb-10 dashboard-tabs nav nav-pills nav-warning row row-paddingless m-0 p-0 flex-column flex-sm-row">
<?php if (!empty($troutmap888)) {?>
<!--begin::Item-->
<li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 bg-white">
<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="#" data-toggle="modal" data-target="#route-map" title="Route Map">
<span class="nav-icon py-2 w-auto">
<span>
<!--begin::Icon-->
<i class="fas fa-map fa-2x"></i>																	<!--end::Icon-->
</span>
</span>
<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Map</span>
</a>
</li>
<!--end::Item-->
<?php } ?>
<!--begin::Item-->
<li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 bg-white">
<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="#" data-toggle="modal" data-target="#overview" title="Overview">
<span class="nav-icon py-2 w-auto">
<span>
<!--begin::Icon-->
<i class="fas fa-info fa-2x"></i>																	<!--end::Icon-->
</span>
</span>
<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Overview</span>
</a>
</li>
<!--end::Item-->
<?php if (!empty($activities888)) {?>
<!--begin::Item-->
<li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 bg-white">
<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="#" data-toggle="modal" data-target="#activities" title="Activities">
<span class="nav-icon py-2 w-auto">
<span>
<!--begin::Icon-->
<i class="fas fa-hiking fa-2x"></i>																	<!--end::Icon-->
</span>
</span>
<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Activities</span>
</a>
</li>
<!--end::Item-->
<?php } ?>
<!--begin::Item-->
<li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 bg-white">
<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="#" data-toggle="modal" data-target="#media-gallery" title="Media Gallery">
<span class="nav-icon py-2 w-auto">
<span>
<!--begin::Icon-->
<i class="fas fa-photo-video fa-2x"></i>																	<!--end::Icon-->
</span>
</span>
<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Media Gallery</span>
</a>
</li>
<!--end::Item-->
<!--begin::Item-->
<li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0 bg-white">
<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="#" data-toggle="modal" data-target="#rates-dates" title="Rates & Dates">
<span class="nav-icon py-2 w-auto">
<span>
<!--begin::Icon-->

<?php echo $signfa2x ?>	
																
<!--end::Icon-->
</span>
</span>
<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Rates & Dates</span>
</a>
</li>
<!--end::Item-->
</ul>
<?php if (!empty($troutmap888)) {?>
<!--begin::Modal-->
<div class="modal fade" id="route-map" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Route Map</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body">
               <img class="img-responsive img-border" alt="Route Map" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $troutmap888 ?>">
            </div>
            <div class="modal-footer">
                <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php } ?>
<!--begin::Modal-->
<div class="modal fade" id="overview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Overview</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body pb-3">
               <div class="row">
               <!--begin::Item-->
<div class="col-xl-6 mb-5 mt-5">
<div class="card card-custom card-border mb-8 mb-lg-0 card-stretch">
<div class="card-body">						
<div class="d-flex align-items-center p-5">
<div class="mr-6">
<span>
<i class="far fa-handshake fa-3x"></i>						</span>
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
<a href="#" class="text-dark font-weight-bolder font-size-h3">Service Level</a>
<div class="text-dark lead"><?php echo rtrim($servicelevel888, ', ') ?></div>
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
<div class="text-dark lead mt-10">
<?php echo $thlights888 ?>
<?php echo $tinclusions888 ?>
<?php echo $texclusions888 ?>
<?php echo $tadditionalnotes888 ?>
</div>
            </div>
            <div class="modal-footer">
            <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php if (!empty($activities888)) {?>
<!--begin::Modal-->
<div class="modal fade" id="activities" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Activities</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body text-dark pb-3">
<?php echo $activities888 ?>
            </div>
            <div class="modal-footer">
            <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php } ?>
<!--begin::Modal-->
<div class="modal fade" id="media-gallery" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Media Gallery</h3>
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap1888 ?></button></a> 
  </div>
  <?php } ?>
</div>
<!--end::Media-->
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider2888 ?>" alt="<?php echo $tslidercap2888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap2888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider3888 ?>" alt="<?php echo $tslidercap3888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap3888 ?></button></a> 
  </div>
</div>
<!--end::Media-->
<?php if (!empty($tslider4888)) { ?>
<!--begin::Media-->
<div class="carousel-item">
  <div class="img"><img class="d-block w-100" src="https://<?php echo $imagesource ?>/img/trips/<?php echo $tslider4888 ?>" alt="<?php echo $tslidercap4888 ?>"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap4888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap5888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap6888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap7888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap8888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap9888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap10888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap11888 ?></button></a> 
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
      <button type="button" class="btn btn-dark btn-square btn-wide"><?php echo $tslidercap12888 ?></button></a> 
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
            <div class="modal-footer">
                <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="rates-dates" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Rates & Dates</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body text-dark pb-3">
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
  <?php echo $tratesdates888 ?></div>
<?php if (!empty($tratesdatesyear2888)) { ?>
<div class="tab-pane fade table-responsive" id="rates-dates-2" role="tabpanel" aria-labelledby="rates-dates-2"><?php echo $tratesdates2888 ?></div>
  <?php } ?>
  <?php if (!empty($tratesdatesyear3888)) { ?>
  <div class="tab-pane fade table-responsive" id="rates-dates-3" role="tabpanel" aria-labelledby="rates-dates-3">
  <?php echo $tratesdates3888 ?></div>
  <?php } ?>
</div>
</div>
            </div>
            <div class="modal-footer">
                <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<div class="mb-20">
<?php echo $tbody888 ?>
<?php if (!empty($extension1888)) {?>
<!--begin::Extensions-->
<div class="mb-30">
<div class="card card-custom card-border p-2 mb-20 mb-lg-0 mt-5 bg-info text-light">
    <div class="card-body d-flex align-items-center justify-content-between">
    <!--begin::Content-->
    <div class="mr-4">
    <h3 class="font-weight-bolder">Extend Your Trip!</h3>
    <p class="lead mb-0">Are you looking to extend your trip? Review our available trip extension options.</p>
    </div>
    <!--end::Content-->
    <!--begin::Button-->
    <a href="#" data-toggle="modal" data-target="#trip-extension" title="Trip Extension Options" class="btn font-weight-bolder text-uppercase font-size-lg btn-warning py-3 px-6">See Details</a>
    <!--end::Button-->
    </div>
    </div>
    </div> 
<!--end::Extensions-->
<!--begin::Modal-->
<div class="modal fade" id="trip-extension" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder mb-0 text-dark">Trip Extension Options</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body text-dark">
<div>
<ul class="nav nav-tabs nav-tabs-line">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-h5 text-dark" data-toggle="tab" href="#extension-option1" title="Trip Extension 1">Extension 1</a>
</li>
<?php if (!empty($extension2888)) {?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-h5 text-dark" data-toggle="tab" href="#extension-option2" title="Trip Extension 2">Extension 2</a>
</li>
<?php } ?> 
</ul>
<div class="tab-content mt-10" id="trip-extension-content">
<div class="tab-pane fade active show" id="extension-option1" role="tabpanel" aria-labelledby="extension-option1">
<?php echo $extension1888 ?>
  </div>
<?php if (!empty($extension2888)) {?>  
<div class="tab-pane fade" id="extension-option2" role="tabpanel" aria-labelledby="extension-option2">
<?php echo $extension2888 ?>
  </div>
  <?php } ?> 
</div>
</div>
            </div>
            <div class="modal-footer">
                <?php if (!empty($tfilech888)) { ?>
            <a href="<?php echo 'https://'.$_SERVER[HTTP_HOST] ?>/img/trips/<?php echo $tfilech888; ?>" title="Download Itinerary" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5">Download Itinerary</a>
            <?php } ?>
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php } ?>       
</div>
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer.php');?>
                <?php include($_SERVER['DOCUMENT_ROOT'].'/forms/ssi/make-a-reservation-panel.php');?>
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/sticky-toolbar-offers-trips.php');?>
<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-scripts.php');?>
				<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>