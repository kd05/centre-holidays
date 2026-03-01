<?php session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Bucket List Destinations | <?php echo $TagTitle ?></title>
        <meta name="description" content="What's next on your travel bucket list? With a wide variety of destinations to choose from, planning a trip has never been easier.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/destinations/index-h01.jpg" />
<meta property="og:description" content="What's next on your travel bucket list? With a wide variety of destinations to choose from, planning a trip has never been easier.">
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
  <div class="img"><img class="d-block w-100" src="/img/destinations/index-c01.jpg" alt="Atlantis Resort In Dubai, UAE"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Atlantis Resort In Dubai, UAE</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Destinations</h1>
									<h2 class="text-dark-65 font-weight-bolder">What's next on your travel bucket list? With a wide variety of destinations to choose from, planning a trip has never been easier.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Destinations-->
<div class="row mb-20">
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/africa-middle-east-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/africa-middle-east.php" title="Africa & Middle East">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Africa & Middle East</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/asia-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/asia.php" title="Asia">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Asia</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-12 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/australia-pacific-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/australia-pacific.php" title="Australia & Pacific">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Australia & Pacific</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/central-america-caribbean-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/central-america-caribbean.php" title="Central America & Caribbean">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">Central America & Caribbean</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/north-america-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/north-america.php" title="North America">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">North America</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/south-america-antarctica-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/south-america-antarctica.php" title="South America & Antarctica">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">South America & Antarctica</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/destinations/uk-europe-h01.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a class="text-white flex-grow-1" href="/destinations/uk-europe.php" title="UK & Europe">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-white text-uppercase mb-0">UK & Europe</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
</div>
<!--end::Destinations-->
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