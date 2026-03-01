<?php ob_start(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/suppliers-db.php');?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $affiliatename ?> - Agent Portal | Centre Holidays</title>
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
<?php if (!empty($cafhimage)) { ?>
<!--begin::Carousel-->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  <div class="img"><img class="d-block w-100" src="/img/agents/supplier-details/<?php echo $cafhimage ?>" alt="<?php echo $affiliatename ?>"></div>
</div>
  </div>
</div>
  <!--end::Carousel-->
<?php } ?>
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row pl-10 pr-10 justify-content-center">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $affiliatename ?></h1>
									<h2 class="text-dark-65 font-weight-bolder"><?php echo $affiliatedescreption ?></h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Supplier Modals-->
<div class="row mb-20">
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
<p>The modules listed on this page contain various details about <?php echo $affiliatename ?>. Please ensure you review everything including any important details listed below.</p>
<div class="alert alert-custom alert-danger mt-5 mb-15" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you notice any errors or have any information that you do not see listed here, please email <b>support@centreholidays.com</b>.</div>
</div>
<?php if ($preferred=='1') { ?>
<h3 class="font-weight-bolder">Preferred Supplier</h3>
<p class="mb-10"><?php echo $affiliatename ?> is considered a preferred supplier.</p>
<?php } ?>
<?php echo $affiliatdetails ?>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php
$afid=$_GET['afid'];;
include "../library/open_dbi_epik.php";
$sql = "SELECT * FROM affiliatemodals WHERE afid='".$_GET['afid']."' ORDER BY modaltime ASC"; // WHERE afid='".$afid."'
$result = mysqli_query($conn, $sql);

$counter=mysqli_num_rows($result);

if ($counter < 3)
$size='col-xl-6';
else
$size='col-xl-4';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
<!--begin::Item-->
	<div class="<?php echo $size ?> col-md-6 mb-10">
    <div class="card card-custom card-border bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
<?php
$modalidactive=$row['modalidactive'];
//if (!empty($modalidactive)) {
?>
<!--begin::Body-->
<a href="#" title="<?php echo $row['modaletitle']; ?>" data-toggle="modal" data-target="#modal-<?php echo $row['modalid']; ?>" class="text-white flex-grow-1">
<?php
//}
?>													<div class="card-body custom-overlay d-flex flex-center text-center text-white text-hover-warning">	
<div>								<h2 class="font-weight-boldest text-uppercase"><?php echo $row['modaletitle']; ?></h2>
<h6><?php echo $row['modaldescription']; ?></h6>
</div>										
</div>
<?php
$modalidactive=$row['modalidactive'];
//if (!empty($modalidactive)) {
?>
</a>
<?php
//}
?>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="modal-<?php echo $row['modalid']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable <?php echo $row['modalsize']; ?>" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $row['modaletitle']; ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<?php echo $row["modalhtmlcontents"] ?>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php

    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
</div>
<!--end::Supplier Modals-->
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