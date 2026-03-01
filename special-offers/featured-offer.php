<?php ob_start();

session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
<title><?php echo $SpecialOffersPageTitle ?></title>
<meta name="description" content="<?php echo $promodetails ?>">
<!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com<?php echo '/img/special-offers/'.$promohorizontalimage; ?>" />
<meta property="og:description" content="<?php echo $promodetails ?>">
<!-- end:: Facebook Sharing -->

</head>
<!--end::Head-->

<?php    

$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS
//======================Check if this IP already in the black list=========================
include($_SERVER['DOCUMENT_ROOT'].'/library/chck_blacklist.php');

$promocode=$_GET['promocode'];
$pro=$_GET['pro'];

if (isset($_GET['resp']) && $_GET['resp']==1)
{
?>
<!--begin::Modal-->

<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-success">
                <h2 class="mb-0 font-weight-boldest text-uppercase text-white">Trip Inquiry Submitted</h2>
                <a href="<?php echo $Link ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
            <p class="lead">Thank you for taking the time to submit an inquiry. We will be in touch with you once your inquiry is reviewed.
            <br /><br />
            A copy of your inquiry has also been emailed to you. Please check your spam folder if you do not see the email in your inbox.</p>
            </div>
            <div class="modal-footer bg-light">
                <a href="<?php echo $_SERVER['PHP_SELF'].'?pro='.$pro.'&promocode='.$promocode ?>" type="button" class="btn btn-warning text-uppercase font-weight-bolder px-5 py-3" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php
	}

if (isset($_GET['resp']) && $_GET['resp']==0)
	{
	?>
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="mb-0 font-weight-boldest text-uppercase text-danger">Error!</h2>
                <a href="<?php echo $Link  ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
               <p class="lead mb-0">Please complete the  fields.</p>
            </div>
            <div class="modal-footer bg-light">
                <a href="<?php echo $_SERVER['PHP_SELF'].'?pro='.$pro.'&promocode='.$promocode ?>" type="button" class="btn btn-warning text-uppercase font-weight-bolder px-5 py-3" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>	
	<?php
	}
	
?> 





    <!--begin::Body-->
    <body  id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
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
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row justify-content-center pl-10 pr-10">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $promotitle ?></h1>
									<h2 class="text-dark-65 font-weight-bolder"><?php echo $promodetails ?></h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<!--begin::Section-->
<div class="container mt-6">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-uppercase text-dark" data-toggle="tab" href="#overview-tab">Special Offer</a>
</li>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#custom-quote-tab">Get A Quote</a>
</li>
</ul>
<div class="tab-content mt-10" id="contact-content">
<div class="tab-pane fade active show" id="overview-tab" role="tabpanel" aria-labelledby="overview-tab">
<!--begin::Overview-->
<div class="row justify-content-center mb-30">
<div class="col-xl-10">
<!--begin::Card-->
<div class="card card-custom">
<div class="card-body">
<?php
$promoimageflyer='/img/special-offers/'.$promoimageflyer;

if (!empty($promosinturl))
{
	$pagetarget='_parent';
	$theflyerlink='https://centreholidays.com/'.$promosinturl;
}
if (!empty($promosexturl))
{
	$pagetarget='_blank';
	$theflyerlink=$promosexturl;
}
elseif (empty($promosinturl) && empty($promosexturl))
{
	$pagetarget='';
	$theflyerlink='#';
}


?>
<a href="<?php echo $theflyerlink ?>" target="<?php echo $pagetarget ?>">
<img class="img-responsive img-border" src="<?php echo $promoimageflyer ?>" alt="<?php echo $promotitle ?>">
</a>

</div>
</div>
<!--end::Card-->
</div>
</div>
<!--end::Overview-->
  </div>
  <div class="tab-pane fade mb-25" id="custom-quote-tab" role="tabpanel" aria-labelledby="custom-quote-tab">
<!--begin::Custom Quote-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/forms/ssi/trip-offer-inquiry.php');?>
<!--end::Cusom Quote-->
</div>
</div>
</div>
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
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
<?php ob_flush(); ?>