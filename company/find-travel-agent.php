<?php session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Find A Travel Agent Close To You | Centre Holidays</title>
        <meta name="description" content="Centre Holidays consists of over 250 TICO certified home based travel agents across Canada, all of whom are fully equipped to assist you with your travel needs.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/company/find-travel-agent-h01.jpg" />
<meta property="og:description" content="Centre Holidays consists of over 250 TICO certified home based travel agents across Canada, all of whom are fully equipped to assist you with your travel needs.">
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
  <div class="img"><img class="d-block w-100" src="/img/company/find-travel-agent-c01.jpg" alt="Geiranger Fjord, Norway"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Geiranger Fjord, Norway</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Find A Travel Agent</h1>
									<h2 class="text-dark-65 font-weight-bolder">Centre Holidays consists of over 250 TICO certified home based travel agents across Canada, all of whom are fully equipped to assist you with your travel needs.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Card-->
<div class="card card-custom mb-30">
<div class="card-body text-dark pb-3 lead">
<h2 class="mb-8 font-weight-boldest text-uppercase text-center">Search For A Travel Agent Using Your Postal Code Or Their Name</h2>
<iframe src="https://batchgeo.com/map/a5cbc21565be1cacc5dee1ae7762c870" frameborder="0" width="100%" height="450" style="border:0;"></iframe>
<h5 class="text-dark-65 mt-8 font-weight-bolder text-center">Do You Require Additional Assistance?</h5>
<div class="d-flex flex-center mt-5 mb-8"><a href="/company/contact.php" title="Contact Centre Holidays" class="btn btn-lg btn-warning text-uppercase font-weight-bolder px-7 py-5">Contact Us</a></div>
</div>
											</div>
<!--end::Card-->
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->                <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer.php');?>
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