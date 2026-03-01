<?php
// Start a new session
session_start();  
?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Media Centre | <?php echo $TagTitle ?></title>
        <meta name="description" content="Get the inside scoop on Centre Holidays with the latest news and press releases, and learn what's happening at one of Canada's leading host travel agencies.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/company/media-centre-h01.jpg" />
<meta property="og:description" content="Get the inside scoop on Centre Holidays with the latest news and press releases, and learn what's happening at one of Canada's leading host travel agencies.">
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
  <div class="img"><img class="d-block w-100" src="/img/company/media-centre-c01.jpg" alt="Centre Holidays Media Centre"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Latest News And Press Releases</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Media Centre</h1>
									<h2 class="text-dark-65 font-weight-bolder">Get the inside scoop on Centre Holidays with the latest news and press releases, and learn what's happening at one of Canada's leading host travel agencies.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlightscounter.php');?>
<div class="container mt-6">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<?php if ($highlitscount !=0) { ?>
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#news-tab">Latest News (<?php echo $highlitscount ?>)</a>
</li>
<?php } ?>
</ul>
<div class="tab-content mt-10" id="contact-content">
<div class="tab-pane fade active show" id="news-tab" role="tabpanel" aria-labelledby="news-tab">
<!--begin::Highlights-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlights.php');?>
<!--end::Highlights-->
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