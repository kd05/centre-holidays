<?php ob_start(); ?>
<?php 
$pagename = 'Contests And Sweepstakes'; 
$currenttime=time();
?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Contests & Sweepstakes - Agent Portal | Centre Holidays</title>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?>
            </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
    	<!--begin::Main-->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header-mobile.php');?>
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
                <!--begin::Carousel-->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  <div class="img"><img class="d-block w-100" src="/img/agents/contests-sweepstakes-c01.jpg" alt="Contests & Sweepstakes"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide text-uppercase font-weight-bolder">For You And Your Clients</button></a> 
  </div>
</div>
  </div>
</div>
  <!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row pl-10 pr-10 justify-content-center">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-dark display-3 text-uppercase">Contests &amp; Sweepstakes</h1>
									<h2 class="text-dark-65 font-weight-bolder">From gift cards to exciting getaways and more, enter our latest contests & sweepstakes for a chance for either you or your clients to win awesome prizes!</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<div class="row mb-15">
<!--begin::Item-->
	<div class="col-xl-12 col-md-12 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-danger.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Important Details" data-toggle="modal" data-target="#important-details-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Important Details</h2>
<h6>Review First Before Proceeding</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="important-details-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-danger">Important Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>On this page you can access and participate in various contests & sweepstakes (see <b>Open Contests</b> tab); some you may have the chance of winning while others, your clients may have a chance of winning. We ask that you take advantage of these contests & sweepstakes as it can help grow your business from a marketing standpoint and you or your client could be the next lucky winner (see <b>Closed Contests</b> tab)! </p>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>
<!--begin::Inside Centre Holidays-->
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder text-uppercase font-size-lg text-dark" data-toggle="tab" href="#open-contests-tab">Open Contests</a>
</li>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#closed-contests-tab">Closed Contests</a>
</li>
</ul>
<div class="tab-content mt-10">
<div class="tab-pane fade active show" id="open-contests-tab" role="tabpanel" aria-labelledby="closed-contests-tab">
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/inside-centre-holidays4.php');?>
  </div>
  <div class="tab-pane fade" id="closed-contests-tab" role="tabpanel" aria-labelledby="closed-contests-tab">
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/inside-centre-holidays3.php');?>
  </div>
</div>
</div>
<!--end::Inside Centre Holidays-->
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer.php');?>
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->

<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-scripts.php');?>
				<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>