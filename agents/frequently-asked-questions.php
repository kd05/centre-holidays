<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Frequently Asked Questions - Agent Portal | Centre Holidays</title>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside-frequently-asked-questions.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
                <!--begin::Carousel-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/img/agents/faqs-c01.jpg')">
							<div class="container">

								<div class="d-flex align-items-stretch text-center flex-column py-40">
<!--begin::Form-->
<form class="d-flex position-relative w-75 px-lg-40 m-auto" action="<?php echo $_SERVER['PHP_SELF'] ?>#faq-list" method="get" enctype="multipart/form-data">
<div class="input-group">
<!--begin::Input-->
<input type="text" id="faqsearch" value="<?php echo str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&'), ' ',  $_GET['faqsearch']); ?>" maxlength="100" required name="faqsearch" class="form-control h-auto border-0 py-7 px-7 font-size-h6" placeholder="Search Within This Page">
<div class="input-group-append">
<button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
</div>
<!--end::Input-->
</div>
</form>
<!--end::Form-->
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Frequently Asked Questions</h1>
									<h2 class="text-dark-65 font-weight-bolder">Our FAQs are a key part of our knowledge base as they address some of the most common questions you or your clients may have.</h2>				
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
<p>On this page you will find frequently asked questions (FAQs) by our travel advisors on various topics all of which have been answered by the various staff at head office. These FAQs are for your reference in case you are faced with a similar question.<br>
  <br>
  All of our FAQs are categorized to help make locating them easy for you. Use the search at the top of this page or the panel on the left to help filter them.</p>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Do you have a question that you would like answered? Email it to <b>support@centreholidays.com</b> with <b>FAQ</b> in the subject line.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>
<!--begin::FAQs-->
<div id="faq-list">
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark" data-toggle="tab" href="#faqs-tab">FAQs</a>
</li>
</ul>
<div class="tab-content mt-10">
<div class="tab-pane fade active show" id="faqs-tab" role="tabpanel" aria-labelledby="faqs-tab">
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/frequently-asked-questions.php');?>
  </div>
</div>
</div>
<!--end::FAQs-->
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