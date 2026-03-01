<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Search Results - Agent Portal | Centre Holidays</title>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?>
            </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading subheader-enabled subheader-fixed"  >
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/search-results-number.php');?>
<!--end::Header-->
    <!--begin::Content-->
    <div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
<!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid mb-0" id="kt_subheader" style="border-bottom:4px solid #003565;">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h2 class="text-dark font-weight-boldest text-uppercase mt-2 mb-2"><?php echo $searchaffilter; ?></h2>
    <!--end::Page Title-->    
    </div>
    <!--end::Info-->
    </div>
    </div>
    <!--end::Subheader-->  

<!--begin::Section-->
<div class="container mt-20">
<!--begin::search results-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/search-results.php');?>
<!--end::search results-->
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