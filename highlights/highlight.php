<?php session_start();  #start a session ?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
<title><?php echo $highlightsPageTitle ?></title>
<meta name="description" content="<?php echo $highlightsmeta ?>">
<!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/highlights/<?php echo($highlightshorizimage) ?>" />
<meta property="og:description" content="<?php echo $highlightsmeta ?>">
<!-- end:: Facebook Sharing -->

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
  <div class="img"><img class="d-block w-100" src="/img/highlights/<?php echo($highlightscoverimage) ?>" alt="<?php echo $highlightscoverimagealt ?>"></div>
  <?php
if (!empty($highlightscoverimagealt))
{
?>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase"><?php echo $highlightscoverimagealt ?></button></a> 
  </div>
  <?php
}
?>
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $highlightstitle ?></h1>
									<h2 class="text-dark-65 font-weight-bolder"><?php echo $highlightsmeta ?></h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<?php
if (!empty($highlightsvrtravel))
{
?>
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Card-->
<div class="card card-custom mb-30">
<div class="card-body text-dark pb-7">
<iframe width="100%" height="450" src="<?php echo $highlightsvrtravel ?>" frameborder="0" allowfullscreen> </iframe>
</div>
<div class="card-footer pb-0 pt-5">
<p class="text-dark-65">By: <span class="font-weight-bolder"><?php echo $highlightsauthor ?></span><?php
if (!empty($highlightssource))
{
?> &nbsp;•&nbsp; Source: <span class="font-weight-bolder"><?php echo $highlightssource ?></span><?php } ?></span></p>				
</div>
</div>
<!--end::Card-->
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<?php
}
elseif (empty($highlightsvrtravel))
{
?>  
<!--begin::Section-->
<div class="container mt-10">
<div class="row justify-content-center mb-30">
<div class="col-xl-9">
<!--begin::Card-->
<div class="card card-custom">
<div class="card-body text-dark pb-3 lead">
<?php echo $highlightsdetails ?></div>
<div class="card-footer pb-0 pt-5">
<p class="text-dark-65">By: <span class="font-weight-bolder"><?php echo $highlightsauthor ?></span><?php
if (!empty($highlightssource))
{
?> &nbsp;•&nbsp; Source: <span class="font-weight-bolder"><?php echo $highlightssource ?></span><?php } ?></span></p>
												
											</div>
											</div>
<!--end::Card-->
</div>
</div>
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
<?php
}
?>
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