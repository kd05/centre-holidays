<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Contact Us To Plan And Book Your Trip | <?php echo $TagTitle ?></title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>




        <meta name="description" content="Let's plan your next trip together and help make it a reality. Please don't hesitate to call or email using the information provided below.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/company/contact-h01.jpg" />
<meta property="og:description" content="Let's plan your next trip together and help make it a reality. Please don't hesitate to call or email using the information provided below.">
<!-- end:: Facebook Sharing -->


<?php
//BusinessName, DisplayName======================================================

if (!empty($BusinessName))
$ContactH1='Contact '.$BusinessName;
elseif (!empty($DisplayName))
$ContactH1='Contact '.$DisplayName;
else
$ContactH1='Contact Centre Holidays';

$_SESSION['ContactH1']=$ContactH1;
?>          
        
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
  <div class="img"><img class="d-block w-100" src="/img/company/contact-c01.jpg" alt="Get In Touch"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Get In Touch</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $ContactH1 ?></h1>
									<h2 class="text-dark-65 font-weight-bolder">Let's plan your next trip together and help make it a reality. Please don't hesitate to get in touch using the information provided below.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  

<!--begin::Section-->
<div class="container mt-10">
<!--begin::Contact Details-->
<div class="row mb-20">
<?php if (empty($AgentID)) { ?>
<div class="col-xl-4 mb-10">
										<!--begin::Tiles Widget 15-->
										<div class="card card-custom card-border card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Head Office</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
										  <div class="card-body d-flex flex-column">
												<!--begin::Items-->
												<div class="flex-grow-1">
													<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Host Travel Agency</span>														
<p class="text-dark mb-1 lead font-weight-bold">Centre Holidays Inc.</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Toll Free</span>														
<p class="text-dark mb-1 lead font-weight-bold">1-888-823-8801</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Address</span>
<p class="text-dark mb-1 lead font-weight-bold">221-2155 Leanne Boulevard<br>
Mississauga, ON L5K 2K8
</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">TICO</span>														
<p class="text-dark mb-1 lead font-weight-bold">50018114</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
</div>										<!--end::Items-->								<!--begin::Action-->
											<div class="pt-10 pb-5 d-flex flex-center">
<a href="#" title="Centre Holidays' Head Office" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5" data-toggle="modal" data-target="#ch-head-office">Google Map</a> <a href="/forms/custom-trip-inquiry.php" title="Get A Custom Quote" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Get A Quote</a>
										    </div>
										<!--end::Action-->
										  </div>
											<!--end::Body-->
										</div>
										<!--end::Tiles Widget 15-->
			</div>
                                    <div class="col-xl-4 mb-10">
				<!--begin::Tiles Widget 15-->
				<div class="card card-custom card-border card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Hours Of Operation</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
												<div class="flex-grow-1">
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Time Zone</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $WebTimeZone ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Monday - Friday</span>
<p class="text-dark mb-1 lead font-weight-bold">09:00 am - 05:00 pm</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Saturday</span>														
<p class="text-dark mb-1 lead font-weight-bold">10:00 am - 02:00 pm</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Sunday</span>														
<p class="text-dark mb-1 lead font-weight-bold">Closed (Online Inquiries Only)</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Holidays</span>														
<p class="text-dark mb-1 lead font-weight-bold">Closed (Online Inquiries Only)</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
</div>										<!--end::Items-->								
											</div>
											<!--end::Body-->
			  </div>
										<!--end::Tiles Widget 15-->
			</div>
            <div class="col-xl-4 mb-10">
				<!--begin::Tiles Widget 15-->
			  <div class="card card-custom card-border card-stretch card-stretch-half gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Find A Travel Agent</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
											  <div class="flex-grow-1">
<!--begin::Item-->												
<p>Centre Holidays consists of over 300 TICO certified travel agents across Canada, all of whom are fully equipped to assist you with your travel needs.</p>
<!--end::Item-->
</div>						<!--end::Items-->
<div class="pt-5 pb-5 d-flex flex-center">
<a href="/company/find-travel-agent.php" title="Find A Travel Agent" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Travel Agent Locator</a>
</div>							
											</div>
											<!--end::Body-->
			  </div>					<!--end::Tiles Widget 15-->
              <!--begin::Tiles Widget 15-->
				<div class="card card-custom card-border card-stretch card-stretch-half">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Join Centre Holidays</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
											  <div class="flex-grow-1">
<!--begin::Item-->												
<p>Become a home based travel agent in Canada and work from home. At Centre Holidays, we make it easy for you to start your own home based travel business.</p>
<!--end::Item-->
</div>						<!--end::Items-->
<div class="pt-5 pb-5 d-flex flex-center">
<a href="/work-from-home/home-based-travel-agent-canada.php" title="Work From Home As A Travel Agent" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">More Information</a>
</div>							
											</div>
											<!--end::Body-->
			  </div>					<!--end::Tiles Widget 15-->
			</div>
<?php } ?>
<?php if (!empty($AgentID)) { ?>
			<div class="col-xl-4 mb-10">
				<!--begin::Tiles Widget 15-->
				<div class="card card-custom card-border card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
<?php if (empty($BOStreet)) { ?>														<h2 class="text-dark font-weight-boldest text-uppercase">Contact Details</h2>
<?php } ?>	
<?php if (!empty($BOStreet)) { ?>														<h2 class="text-dark font-weight-boldest text-uppercase">Branch Office</h2>
<?php } ?>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
												<div class="flex-grow-1">
<?php if (!empty($BusinessName)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Business Name</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $BusinessName ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($BOStreet)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Address</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $BOStreet ?><br>
<?php echo $BOCity ?>, <?php echo $BOProvince ?> <?php echo $BOPostalcode ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($DisplayName)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65"><?php echo $AgentPositionTitle ?></span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $DisplayName ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($BCNumber)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">BC Licence</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $BCNumber ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (empty($BOStreet)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Based In</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $DisplayUseCity ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($BusinessNum)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Business</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $BusinessNum ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($DisplayUseCell)) { ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Mobile</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $DisplayUseCell ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($TollFreeNum)){ ?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Toll Free</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $TollFreeNum ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<?php if (!empty($FaxNum)){?>
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Fax</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $FaxNum ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<?php } ?>
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Services Offered In</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $AgentLanguage ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<div class="pt-10 pb-5 d-flex flex-center">
<?php 
if (!empty($HOGMap)) 
{ 
?>
<!--begin::Home Office Google Map-->
<a href="#" title="Google Map" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5" data-toggle="modal" data-target="#home-office<?php echo $AgentID ?>">Google Map</a>
<!--end::Home Office Google Map-->
<?php } ?>
<?php 
if (!empty($BOGMap)) 
{ 
?>
<!--begin::Branch Office Google Map-->
<a href="#" title="Google Map" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-5" data-toggle="modal" data-target="#branch-office<?php echo $AgentID ?>">Google Map</a>
<!--end::Branch Office Google Map-->
<?php } ?>
<a href="/forms/custom-trip-inquiry.php" title="Get A Custom Quote" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Get A Quote</a>
</div>
<div class="modal fade" id="home-office<?php echo $AgentID ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
<div class="modal-content border border-4">
<div class="modal-header bg-light">
<h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Google Map</h2>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i aria-hidden="true" class="ki ki-close"></i>
</button>
</div>

<div class="modal-body">
<iframe src="<?php echo $HOGMap ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
<div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!--begin::Home Office Google Map Modal-->
<div class="modal fade" id="branch-office<?php echo $AgentID ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
<div class="modal-content border border-4">
<div class="modal-header bg-light">
<h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $BusinessName ?></h2>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i aria-hidden="true" class="ki ki-close"></i>
</button>
</div>
<div class="modal-body">
<iframe src="<?php echo $BOGMap ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
<div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!--end::Head Office Google Map Modal-->
</div>										
<!--end::Items-->								
</div>
<!--end::Body-->
</div>
<!--end::Tiles Widget 15-->
			</div>
			<div class="col-xl-4 mb-10">
				<!--begin::Tiles Widget 15-->
				<div class="card card-custom card-border card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Hours Of Operation</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
												<div class="flex-grow-1">
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Time Zone</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $WebTimeZone ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Monday - Friday</span>
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $MondayToFriday ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Saturday</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $Saturday ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Sunday</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $Sunday ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Holidays</span>														
<p class="text-dark mb-1 lead font-weight-bold"><?php echo $Holidays ?></p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
</div>										<!--end::Items-->								
											</div>
											<!--end::Body-->
			  </div>
										<!--end::Tiles Widget 15-->
			</div>
                                    <div class="col-xl-4 mb-10">
										<!--begin::Tiles Widget 15-->
										<div class="card card-custom card-border card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title">
													<div class="card-label">
														<h2 class="text-dark font-weight-boldest text-uppercase">Head Office</h2>											
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<!--begin::Items-->
												<div class="flex-grow-1">
													<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Host Travel Agency</span>														
<p class="text-dark mb-1 lead font-weight-bold">Centre Holidays Inc.</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Toll Free</span>														
<p class="text-dark mb-1 lead font-weight-bold">1-888-823-8801</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center mb-10">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">Address</span>
<p class="text-dark mb-1 lead font-weight-bold">221-2155 Leanne Boulevard<br>
Mississauga, ON L5K 2K8
</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
<!--begin::Item-->												
<div class="d-flex align-items-center">
<!--begin::Symbol-->
<span class="bullet bullet-bar bg-dark align-self-stretch mr-3"></span>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span class="text-dark-65">TICO</span>														
<p class="text-dark mb-1 lead font-weight-bold">50018114</p>
</div>
<!--end::Text-->
</div>
<!--end::Item-->
</div>										<!--end::Items-->								<!--begin::Action-->
												<div class="pt-10 pb-5 d-flex flex-center">
<a href="#" title="Centre Holidays' Head Office" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-toggle="modal" data-target="#ch-head-office">Google Map</a>
												</div>
                                                
										<!--end::Action-->
											</div>
											<!--end::Body-->
									  </div>
										<!--end::Tiles Widget 15-->
			</div>
                                    <?php } ?>

<div class="modal fade" id="ch-head-office" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Centre Holidays' Head Office</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11571.505621962024!2d-79.65298!3d43.52577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8f0af7feb31e8da4!2sCentre%20Holidays!5e0!3m2!1sen!2sca!4v1575300549005!5m2!1sen!2sca" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql0900 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 and ch_agents_1.AgentType !='Non-Paying Sub-Agent'";
$result0900 = mysqli_query($conn, $sql0900);
$counter0900=mysqli_num_rows($result0900);// number of results

if ($counter0900 > 0) {

while($row0900 = mysqli_fetch_assoc($result0900)) {
	
$PartnerID0900=$row0900['AgentID']; //
$PartnerType0900=$row0900['AgentType']; //

$sql99999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID ='".$PartnerID0900."' AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result99999 = mysqli_query($conn, $sql99999);
}


if (mysqli_num_rows($result99999) > 0) {	
	
$sql22139 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 AND ch_agents_1.AgentType !='Non-Paying Sub-Agent' LIMIT 1";
$result22139 = mysqli_query($conn, $sql22139);

while($row22139 = mysqli_fetch_assoc($result22139)) {
$PartnerID22139=$row22139['PartnerID']; //

if ($PartnerType0900=='Commission Agent')
$sql99900 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID22139."' AND (ch_agents_2.showsubagents=1 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

if ($PartnerType0900=='Sub-Agent')
$sql99900 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID22139."' AND (ch_agents_2.showsubagents=2 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result99900 = mysqli_query($conn, $sql99900);

$counter00099=mysqli_num_rows($result99900);

}


if ($counter00099 > 0 )
{
?>

<!--begin::Additional Contact Details-->
<div class="col-xl-12 mb-10">
<div class="card card-custom card-border">
<!--begin::Header-->
<!--begin::Header-->
<div class="card-header border-0 pt-5">
<div class="card-title">
<div class="card-label">
<h2 class="text-dark font-weight-boldest text-uppercase">Additional Contact Details</h2>											
</div>
</div>
</div>
<!--end::Header-->
<!--end::Header-->
<!--begin::Body-->
<div class="card-body pt-0 pb-3">
<div class="tab-content">
<!--begin::Table-->
<div class="table-responsive">
<table class="table table-head-custom table-head-bg table-borderless table-vertical-center text-dark">
<thead>
<tr class="text-left text-uppercase">
<th style="min-width: 250px" class="pl-7">
<span class="text-dark-65">Travel Advisor Partner</span>
</th>
<th style="min-width: 130px"><span class="text-dark-65">Based In</span></th>
<th style="min-width: 130px"><span class="text-dark-65">Business</span></th>
<th style="min-width: 130px"><span class="text-dark-65">Mobile</span></th>
<th style="min-width: 180px"><span class="text-dark-65">Toll Free</span></th>
</tr>
</thead>
<tbody>

<?php
$sql090 = "SELECT * FROM ch_agents_1, ch_partner_connections WHERE ch_agents_1.AgentID='".$AgentID."' and ch_agents_1.AgentID=ch_partner_connections.AgentID and ch_partner_connections.active=1 AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";
$result090 = mysqli_query($conn, $sql090);
while($row090 = mysqli_fetch_assoc($result090)) {
$PartnerID=$row090['PartnerID']; //

$x=$x+1;
$y=$y+1;
$z=$z+1;

//==================partner================================================
if ($PartnerType0900=='Commission Agent')
$sql9999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID."' AND (ch_agents_2.showsubagents=1 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

if ($PartnerType0900=='Sub-Agent')
$sql9999 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID =ch_agents_2.AgentID AND ch_agents_1.AgentID ='".$PartnerID."' AND (ch_agents_2.showsubagents=2 || ch_agents_2.showsubagents=3) AND ch_agents_1.AgentType !='Non-Paying Sub-Agent'";

$result9999 = mysqli_query($conn, $sql9999);

while($row9999= mysqli_fetch_assoc($result9999)) {
	 
	 $FirstName999=$row9999['FirstName'];
	 $LastName9999=$row9999['LastName'];
	 $AgentPositionTitle9999=$row9999['AgentPositionTitle'];
	 $City9999=$row9999['City'];
	 $Province9999=$row9999['Province'];
	 $DisplayName9999=$row9999['DisplayName'];
	 
	 //====================================================================
	 $DisplayUseCity9999=$row9999['DisplayUseCity'];
	 $DisplayUseCity9999=trim(str_replace(",","",$DisplayUseCity9999));
	 
	 if (!empty($DisplayUseCity9999))
	 $DisplayUseCity9999=$row9999['DisplayUseCity'];
	 else
	 $DisplayUseCity9999='-';
	 //=====================================================================
	 
	 $BusinessNum9999=$row9999['BusinessNum'];
	 
	 if (!empty($BusinessNum9999))
	 $BusinessNum9999=$row9999['BusinessNum'];
	 else
	 $BusinessNum9999='-';
	 
	 //=====================================================================
	 $DisplayUseCell9999=$row9999['DisplayUseCell'];
	 
	 if (!empty($DisplayUseCell9999))
	 $DisplayUseCell9999=$row9999['DisplayUseCell'];
	 else
	 $DisplayUseCell9999='-';
	 //=====================================================================	 
	 $TollFreeNum9999=$row9999['TollFreeNum'];
	 
	 if (!empty($TollFreeNum9999))
	 $TollFreeNum9999=$row9999['TollFreeNum'];
	 else
	 $TollFreeNum9999='-';	 
	 //=====================================================================
	 
	 $Image9999=$row9999['Image'];
	 
	 if (empty($Image9999))
	 $Image9999='https://centreholidays.com/img/profile-s01.jpg';
	 else
	 $Image9999='https://centreholidays.com/img/agents/'.$PartnerID.'/profile.jpg';
	//====================================================================================
	
	$HOGMap9999=$row9999['HOGMap'];
	 
?>

<tr>
<td class="pl-0 py-8">
<div class="d-flex align-items-center">
<div class="mr-4">
<span class="symbol symbol-55">
<img class="img-border" src="<?php echo $Image9999 ?>" alt="<?php echo $DisplayName9999 ?>" />
</span>
</div>
<div>
<span class="font-weight-bolder d-block font-size-lg"><?php echo $DisplayName9999 ?></span>
<span class="font-size-sm text-dark-65 font-weight-bold d-block"><?php echo $AgentPositionTitle9999 ?></span>
</div>
</div>
</td>
<td>
<span class="font-weight-bolder d-block font-size-lg"><?php echo $DisplayUseCity9999 ?></span>
<?php
if (!empty($HOGMap9999))
{
?>
<span class="font-size-sm  font-weight-bold d-block"><a class="text-warning" href="#" data-toggle="modal" data-target="#home-office1<?php echo $PartnerID ?>">See Google Map</a></span>
<?php
}
?>
</td>
<td><span class="font-weight-bolder d-block font-size-lg"><?php echo $BusinessNum9999 ?></span></td>
<td><span class="font-weight-bolder d-block font-size-lg"><?php echo $DisplayUseCell9999 ?></span></td>
<td><span class="font-weight-bolder d-block font-size-lg"><?php echo $TollFreeNum9999 ?></span></td>
</tr>

<?php
 }
?>

<!--begin::Branch Office Google Map Modal-->
<div class="modal fade" id="home-office1<?php echo $PartnerID ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
<div class="modal-content">
<div class="modal-header">
<h3 class="font-weight-bolder mb-0 text-dark"><?php echo $FirstName999.' '.$LastName9999 ?></h3>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i aria-hidden="true" class="ki ki-close"></i>
</button>
</div>

<div class="modal-body">
<iframe src="<?php echo $HOGMap9999 ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!--end::Branch Office Google Map Modal-->


<?php
	}
?>


</tbody>
</table>
</div>
<!--end::Table-->
</div>
</div>
<!--end::Body-->
</div>
</div>
<?php

	}

 }
}
?>
<!--end::Additional Contact Details-->
 		  </div>

<!--end::Contact Details-->
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