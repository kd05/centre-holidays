<?php
// Start a new session
session_start();  
$highlightsinterests='Cultural Travel'; // Highlights
$interests='Cultural Travel'; // Trips
$offersinterests='Cultural Travel'; // Offers
?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Cultural Travel | <?php echo $TagTitle ?></title>
        <meta name="description" content="Explore fascinating destinations rich in history, culture and traditions. Connect with locals, discover hidden gems and widen your perspective of the world.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/travel-interests/cultural-travel-h01.jpg" />
<meta property="og:description" content="Explore fascinating destinations rich in history, culture and traditions. Connect with locals, discover hidden gems and widen your perspective of the world.">
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
  <div class="img"><img class="d-block w-100" src="/img/travel-interests/cultural-travel-c01.jpg" alt="Treasury At Petra, Jordan"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Treasury At Petra, Jordan</button></a> 
  </div>
</div>
  </div>
</div>
  <!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class="container">
        <!--begin::title-->
        <div class="row justify-content-center pl-10 pr-10">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Cultural Travel</h1>
									<h2 class="text-dark-65 font-weight-bolder">Explore fascinating destinations rich in history, culture and traditions. Connect with locals, discover hidden gems and widen your perspective of the world.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlightscounter.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/trips/ssi/tripscounter.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/special-offers/ssi/offerscounter.php');?>
<div class="container mt-6">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<?php if ($highlitscount !=0) { ?>
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#highlights-tab">Highlights (<?php echo $highlitscount ?>)</a>
</li>
<?php } if ($tripscount !=0) { ?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#trips-tab">Trips (<?php echo $tripscount ?>)</a>
</li>
<?php } if ($offerscount !=0) { ?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#offers-tab">Offers (<?php echo $offerscount ?>)</a>
</li>
<?php } ?>
</ul>
<div class="tab-content mt-10" id="contact-content">
<div class="tab-pane fade active show" id="highlights-tab" role="tabpanel" aria-labelledby="highlights-tab">
<!--begin::Highlights-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlights.php');?>
<!--end::Highlights-->
  </div>
  <div class="tab-pane fade" id="trips-tab" role="tabpanel" aria-labelledby="trips-tab">
<!--begin::Trips-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/trips/ssi/trips.php');?>
<!--end::Trips-->
</div>
<div class="tab-pane fade" id="offers-tab" role="tabpanel" aria-labelledby="offers-tab">
<!--begin::Special Offers-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/special-offers/ssi/offers.php');?>
<!--end::Special Offers-->
</div>
</div>
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