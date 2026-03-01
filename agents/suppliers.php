<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Suppliers - Agent Portal | Centre Holidays</title>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside-suppliers.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
                <!--begin::Carousel-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/img/agents/suppliers-c01.jpg')">
							<div class="container">

								<div class="d-flex align-items-stretch text-center flex-column py-40">
<!--begin::Form-->
<form class="d-flex position-relative w-75 px-lg-40 m-auto" action="<?php echo $_SERVER['PHP_SELF'] ?>#supplier-list" method="get" enctype="multipart/form-data">
<div class="input-group">
<!--begin::Input-->
<input type="text" id="searchaffilter" value="<?php echo str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&'), ' ',  $_GET['searchaffilter']); ?>" maxlength="100" required name="searchaffilter" class="form-control h-auto border-0 py-7 px-7 font-size-h6" placeholder="Search Within This Page">
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Suppliers</h1>
									<h2 class="text-dark-65 font-weight-bolder">With over a 100 suppliers to choose from, finding the right one for booking travel products, digital marketing, online courses and more has never been easier.</h2>				
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
	<div class="col-xl-4 col-md-12 mb-10">
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
<p>All of our suppliers are categorized to help make locating them easy for you. Use the search at the top of this page or the panel on the left to help filter them.</p>
<h3 class="mt-10 font-weight-bolder">Preferred Suppliers</h3>
<p>When you use the filter in the left panel or the search at the top of the page, the results will always showcase our preferred suppliers first and then everything else.</p>
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
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Claim My Files" data-toggle="modal" data-target="#claim-my-files-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Claim My Files</h2>
<h6>E-Docs And Booking Related Files</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="claim-my-files-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Claim My Files</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Some suppliers send e-documents and booking related files directly to head office. If you have not received your files from a supplier, follow these steps to see if they were sent to head office so that you can claim them:</p>
<ul>
<li>Click on <b>Claim My Files</b> and a new window will open displaying all the files head office has received.</li>
<li>Email <b>Michele Montgomery</b> at <b>michele@centreholidays.com</b> and let her know which file(s) belong to you.</li>
<li>Once Michele receives your request, she will email your file(s) to you.</li>
</ul>
<div class="pt-10 pb-5 mb-5 d-flex flex-center">
<a href="https://groups.google.com/a/centreholidays.com/forum/?hl=en#!forum/unclaimedfiles" title="Claim My Files" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Claim My Files</a>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
It can take up to 24 hours from the time of booking for suppliers to issue documents and invoices.</div>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you experience an issue accessing the e-documents and booking related files, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
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
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Supplier Updates" data-toggle="modal" data-target="#supplier-updates-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Supplier Updates</h2>
<h6>News, Promotions, Incentives, Etc.</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="supplier-updates-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Supplier Updates</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Our agency is registered with various suppliers and from time to time, these suppliers may send us various email updates which may include newsletters, promotions, incentives, upcoming FAM trips, etc.<br>
  <br>
  Our goal is too keep you up-to-date but at the same time not bombard you with emails especially when you could be registered with some of these suppliers, and may be receiving the same emails.<br>
  <br>
  All the email updates we receive from our suppliers will be posted in our Google Group and we are going to leave it up to you to access whatever updates you wish to read.</p>
<div class="pt-10 pb-5 mb-5 d-flex flex-center">
<a href="https://groups.google.com/a/centreholidays.com/g/supplierupdates" title="See Supplier Updates" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Supplier Updates</a>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you experience an issue accessing the supplier updates, sign out of your Google Account. Sign back in to your Centre Holidays Google Account first which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
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
<!--begin::Suppliers-->
<div id="supplier-list">
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder text-uppercase font-size-lg text-dark" data-toggle="tab" href="#suppliers-tab">Suppliers</a>
</li>
</ul>
<div class="tab-content mt-10">
<div class="tab-pane fade active show" id="suppliers-tab" role="tabpanel" aria-labelledby="suppliers-tab">
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/suppliers.php');?>
  </div>
</div>
</div>
<!--end::Suppliers-->
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