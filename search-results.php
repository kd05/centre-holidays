<?php session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Search Results | <?php echo $TagTitle ?></title>
<meta name="description" content="">
<!-- begin:: Facebook Sharing -->
<meta property="og:image" content="<?php echo $FacebookImage; ?>" />
<meta property="og:description" content="Search Results">
<!-- end:: Facebook Sharing -->  
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading subheader-enabled subheader-fixed">
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
<!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid mb-0" id="kt_subheader" style="border-bottom:4px solid #003565;">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h2 class="text-dark font-weight-boldest text-uppercase mt-2 mb-2"><?php echo $term=ucwords($_GET['term']) ?></h2>
    <!--end::Page Title-->    
    </div>
    <!--end::Info-->
    </div>
    </div>
    <!--end::Subheader-->
<!--begin::Section-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlightscounter.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/trips/ssi/tripscounter.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/special-offers/ssi/offerscounter.php');?>
<div class="container mt-20">
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