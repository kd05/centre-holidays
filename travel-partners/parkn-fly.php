<?php session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Park'N Fly | <?php echo $TagTitle ?></title>
        <meta name="description" content="Park’N Fly offers several options to park your vehicle. Park your vehicle in one of our secure lots and hop on our shuttle for a short ride to the terminal.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/travel-partners/parkn-fly-h01.jpg" />
<meta property="og:description" content="Park’N Fly offers several options to park your vehicle. Park your vehicle in one of our secure lots and hop on our shuttle for a short ride to the terminal.">
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
  <div class="img"><img class="d-block w-100" src="/img/travel-partners/parkn-fly-c01.jpg" alt="Park'N Fly Airport Parking"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Park Happy</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Park'N Fly</h1>
									<h2 class="text-dark-65 font-weight-bolder">Park’N Fly offers several options to park your vehicle. Park your vehicle in one of our secure lots and hop on our shuttle for a short ride to the terminal.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<!--begin::Section-->
<div class="container mt-10">
<div class="row mb-20">
<!--begin::Item-->
	<div class="col-xl-4 col-md-12 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/module-bg-warning.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="https://www.parknfly.ca/location/toronto-airport-parking.aspx?referralid=10118&coupon=201741" title="Book Online" target="_blank" class="text-white flex-grow-1"><div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
  <div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Book Online</h2>
<h6>Plan Ahead And Save</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Park Happy" data-toggle="modal" data-target="#park-happy-modal" class="text-white flex-grow-1"><div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
  <div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Park Happy</h2>
<h6>The Park'N Fly Experience</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="park-happy-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Park Happy</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <p>Park’N Fly is Canada’s largest off-airport parking provider, serving happy travellers for over 45 years.<br>
<br>
The Park’N Fly experience is driven by our “Park Happy” promise. We are committed to a fast, easy and delightful experience, from the beginning to the end of your journey. We operate in seven locations across Canada: Vancouver, Edmonton, Winnipeg, Toronto, Ottawa, Montreal and Halifax.</p>
<h3 class="mt-10 font-weight-bolder">Service Excellence</h3>
<p>We are proud to offer an unparalleled parking experience at our Valet and Self-Park locations, including complimentary 24/7 shuttles and a wide range of value-added services and features including recharging, exterior washes, interior detailing, and oil changes at select locations.</p>
<h3 class="mt-10 font-weight-bolder">Convenience</h3>
<p>Located minutes from Canada’s major airports, Park’N Fly locations are convenient and easy to get to. Our 24/7 complimentary shuttles offer you a quick, comfortable ride to the terminal.</p>
<h3 class="mt-10 font-weight-bolder">Security</h3>
<p>With Park’N Fly you can travel with fewer worries, knowing that your vehicle is safe in our well-lit, gated and monitored facility.</p>
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
<a href="#" title="Park'N Fly Options" data-toggle="modal" data-target="#parkn-fly-options-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div class="mt-2">
<h2 class="font-weight-boldest text-uppercase">Park'N Fly Options</h2>
<h6>Parking Made Easy</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="parkn-fly-options-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Park'N Fly Options</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Park’N Fly offers several options to park your vehicle. Choose from valet or self-park options. Park your vehicle in one of our secure lots and hop on our free shuttle for a short ride to the terminal, 24/7.</p>
<h3 class="mt-10 font-weight-bolder">Valet Airport Parking</h3>
<p>Let us handle the parking while you enjoy a comfortable ride to the terminal. It’s fast, easy and affordable.
</p>
<h3 class="mt-10 font-weight-bolder">Self Park Airport Parking</h3>
<p>You do the parking and we will take you to the terminal and back in our comfortable shuttle, 24/7.</p>
<h3 class="mt-10 font-weight-bolder">Economy Airport Parking</h3>
<p>Our most economical self-parking option. You do the parking and we will take you to the terminal and back in our comfortable shuttle, 24/7. Perfect for long-term stays.</p>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

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