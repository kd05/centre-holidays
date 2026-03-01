<?php
ob_start();
session_start();
#start a session ?>

<style>
.grecaptcha-badge { z-index: 9999999 !important; }
</style>

<?php
$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS

//======================Check if this IP already in the black list=========================
//include($_SERVER['DOCUMENT_ROOT'].'/library/chck_blacklist.php');


//include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo.php');

if($_GET['results']==1) {

    ?>
    <!--begin::Modal-->
    <div class="modal fade show" tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h3 class="font-weight-bolder fs-2 text-white">Application Submitted</h3>
                    <!--begin::Close-->
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span><i class="fas fa-times fs-2"></i></span>
                        </div>
                    </a>
                    <!--end::Close-->
                </div>

                <div class="modal-body lead text-dark pb-3">
                    <p>Thank you for taking the time to fill in our application. An email confirmation has been emailed to you. Please check your spam folder in case you do not see the confirmation email in your inbox.</p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
    <?php

}




if(isset($_GET['results']) && $_GET['results']==0) {

    ?>
    <!--begin::Modal-->
    <div class="modal fade show" tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="font-weight-bolder fs-2 text-white"><?php echo $_GET['msg'] ?></h3>
                    <!--begin::Close-->
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span><i class="fas fa-times fs-2"></i></span>
                        </div>
                    </a>
                    <!--end::Close-->
                </div>

                <div class="modal-footer">
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
    <?php

}


?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Home Based Travel Agent Business In Canada | Centre Holidays</title>
    <meta name="description" content="Centre Holidays provides you with the opportunity to start your own home based travel business in Canada where you can work as a licenced travel agent." />
    <!-- begin:: Facebook Sharing -->
    <meta property="og:image" content="https://centreholidays.com/img/work-from-home/home-based-travel-agent-canada-h01.jpg" />
    <meta property="og:description" content="Centre Holidays provides you with the opportunity to start your own home based travel business in Canada where you can work as a licenced travel agent.">
    <!-- end:: Facebook Sharing -->
    <meta name="keywords" content="Home Based Travel Agents, Host Travel Agency, Centre Holidays, Work From Home, Travel Agency Canada" />
    <link rel="canonical" href="https://centreholidays.com/work-from-home/home-based-travel-agent-canada.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/img/favicon.png">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="/library/fonts/fontawesome/v5153/css/all.css" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/metronic/v8015/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/v8015/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!-- begin:: Custom CSS -->
    <link href="/library/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- end:: Custom CSS -->
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WBB9NJJ');</script>
<!-- End Google Tag Manager -->

    <script src="https://www.google.com/recaptcha/api.js?render=6LcKZvMpAAAAAN8NpLLdkXss1Q2gyndA7U9s4jka"></script>

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="home" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBB9NJJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(/img/work-from-home/home-based-travel-agent-canada-bg.svg)">
            <!--begin::Header-->
            <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center justify-content-between">
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center flex-equal">
                            <!--begin::Mobile menu toggle-->
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                                <span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
													<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Mobile menu toggle-->
                            <!--begin::Logo image-->
                            <a href="#home" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                <img alt="Centre Holidays - Host Travel Agency" src="/img/centre-holidays-logo-nav.png" class="logo-default" />
                                <img alt="Centre Holidays - Host Travel Agency" src="/img/centre-holidays-logo-nav.png" class="logo-sticky" />
                            </a>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Logo-->
                        <!--begin::Menu wrapper-->
                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                <!--begin::Menu-->
                                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#how-it-works" title="3 Easy Steps To Join Centre Holidays" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How It Works</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#discover" title="Discover Centre Holidays" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Discover</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#team" title="Centre Holidays Team" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Team</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#media-gallery" title="Home Based Travel Agent Photo Gallery" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Gallery</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#pricing" title="Home Based Travel Agent Plans &amp; Pricing" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Plans & Pricing</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a href="#testimonials" title="Home Based Travel Agent Testimonials" class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Testimonials</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Toolbar-->
                        <div class="flex-equal text-end ms-1">
                            <a href="tel:18888238801" title="Call Centre Holidays" class="btn btn-warning fw-bolder">1-888-823-8801</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Landing hero-->
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                <!--begin::Heading-->
                <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20 col-md-6 col-lg-6 col-xxl-4">
                    <!--begin::Title-->
                    <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Become A Home Based Travel Agent In Canada Today!</h1>
                    <!--end::Title-->
                    <!--begin::Action-->
                    <a href="#pricing" title="Home Based Travel Agent Plans &amp; Pricing" class="btn btn-warning" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Plans & Pricing</a>
                    <!--end::Action-->
                </div>
                <!--end::Heading-->
                <!--begin::Registrations-->
                <div class="d-flex flex-center flex-wrap position-relative px-5">
                    <!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="TICO Registered Agency">
                        <img src="/img/work-from-home/tico.svg" class="mh-30px mh-lg-40px" alt="TICO Registered Agency" />
                    </div>
                    <!--end::Registration-->					<!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="IATA Registered Agency">
                        <img src="/img/work-from-home/iata.svg" class="mh-30px mh-lg-40px" alt="IATA Registered Agency" />
                    </div>
                    <!--end::Registration-->												<!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="CLIA Registered Agency">
                        <img src="/img/work-from-home/clia.svg" class="mh-30px mh-lg-40px" alt="CLIA Registered Agency" />
                    </div>
                    <!--end::Registration-->			<!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Consumer Protection BC Registered Agency">
                        <img src="/img/work-from-home/cpbc.svg" class="mh-30px mh-lg-40px" alt="Consumer Protection BC Registered Agency" />
                    </div>
                    <!--end::Registration-->
                    <!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="ACTA Member">
                        <img src="/img/work-from-home/acta.svg" class="mh-30px mh-lg-40px" alt="ACTA Member" />
                    </div>
                    <!--begin::Registration-->
                    <!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Travel Leaders Network Member">
                        <img src="/img/work-from-home/tln.svg" class="mh-30px mh-lg-40px" alt="Travel Leaders Network Member" />
                    </div>
                    <!--end::Registration-->
                    <!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="BBB Accredited Business">
                        <img src="/img/work-from-home/bbb.svg" class="mh-30px mh-lg-40px" alt="BBB Accredited Business" />
                    </div>
                    <!--end::Registration-->
                    <!--begin::Registration-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Canadian Owned Agency">
                        <img src="/img/work-from-home/proudly-canadian.svg" class="mh-30px mh-lg-40px" alt="Canadian Owned Agency" />
                    </div>
                    <!--end::Registration-->
                </div>						<!--end::Registrations-->
            </div>
            <!--end::Landing hero-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Header Section-->
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How It Works</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-5 text-muted fw-bold mb-5">In three easy steps you can be on your way						<br />to being a full-fledged home based travel agent.</div>
                <!--end::Text-->
                <!--begin::Action-->
                <a href="#" title="Why Join Centre Holidays, Host Travel Agency?" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#why-join-ch-modal">Why Join Centre Holidays?</a>
                <!--end::Action-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/img/work-from-home/process-h01.png" class="mh-125px mb-9" alt="Step 1: Sign Up" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Sign Up</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">Start by seeing what we offer and sign up for one of our incredible plans.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/img/work-from-home/process-h02.png" class="mh-125px mb-9" alt="Step 2: Setup & Training" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Setup &amp; Training</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">We set you up and train you on a one-on-one basis (no group training).</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/img/work-from-home/process-h03.png" class="mh-125px mb-9" alt="Step 3: Start Selling!" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Start Selling!</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">You start selling travel and growing your home based travel business.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/img/work-from-home/how-it-works-h01.jpg" class="card-rounded shadow mw-100" alt="Centre Holidays Website" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/img/work-from-home/how-it-works-h02.jpg" class="card-rounded shadow mw-100" alt="Sirev Booking System" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/img/work-from-home/how-it-works-h03.jpg" class="card-rounded shadow mw-100" alt="Travel Agent Locator - Travel Leaders Network - Canadian Travel Agents" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/img/work-from-home/how-it-works-h04.jpg" class="card-rounded shadow mw-100" alt="IATA ID Card" />
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-left.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)" />
									</g>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
									</g>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm-n10">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="pb-15 pt-18 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-18" id="discover" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-white fw-bolder mb-5">Discover Centre Holidays</h3>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-5 text-gray-600 fw-bold mb-5">Our mission is to make all our home based travel agents successful.
                        <br />
                        We work with them to ensure they have everything to grow a profitable business.</div>
                    <!--end::Description-->
                    <!--begin::Action-->
                    <a href="#" title="About Centre Holidays, Host Travel Agency" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#about-ch-modal">About Centre Holidays</a>
                    <!--end::Action-->
                </div>
                <!--end::Heading-->
                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/img/work-from-home/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotone/Interface/Grid.svg-->
                            <span class="mb-3">
										<i class="fas fa-users fa-3x"></i>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="250+" data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Travel Agents</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/img/work-from-home/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotone/Interface/Pie-04.svg-->
                            <span class="mb-3">
										<i class="fas fa-award fa-3x"></i>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px text-center" data-kt-countup="true" data-kt-countup-value="30+" data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Industry Awards</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/img/work-from-home/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
                            <span class="mb-3">
										<i class="fab fa-canadian-maple-leaf fa-3x"></i>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px text-center" data-kt-countup="true" data-kt-countup-value="100%" data-kt-countup-suffix="%">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Canadian Owned</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
                <!--begin::Testimonial-->
                <div class="fs-2 fw-bold text-muted text-center mb-3">
                    <span class="fs-1 lh-1 text-gray-700">“</span>Three things that have brought about success for myself and my agents:
                    <br />
                    Passion, Dedication and Support
                    <span class="fs-1 lh-1 text-gray-700">“</span></div>
                <!--end::Testimonial-->
                <!--begin::Author-->
                <div class="fs-2 fw-bold text-muted text-center">
                    <a href="#" title="Message From Carlton Montaut, CEO" class="link-white fs-4 fw-bolder" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Carlton Montaut,</a>
                    <span class="fs-4 fw-bolder text-gray-600">CEO</span>
                </div>
                <!--end::Author-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Statistics Section-->
    <!--begin::Team Section-->
    <div class="py-10 py-lg-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-12">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">11 Amazing Team Members</h3>
                <!--end::Title-->
                <!--begin::Sub-title-->
                <div class="fs-5 text-muted fw-bold mb-5">The team behind Centre Holidays is spread across Canada but come together for one purpose:
                    <br />
                    to provide on-going support to help your home based travel business succeed.</div>
                <!--end::Sub-title=-->

            </div>
            <!--end::Heading-->
            <!--begin::Slider-->
            <div class="tns tns-default">
                <!--begin::Wrapper-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/458/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Carlton Montaut, Chief Executive Officer" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Carlton Montaut</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">CEO</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/230/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Barbara Sasiadek, Chief Financial Officer" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Barbara Sasiadek</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">CFO</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/152/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Michele Montgomery, Manager" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Michele Montgomery</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Manager, Operations</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/484/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Jillian Montaut, Manager" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Jillian Montaut</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Manager, Administration & Recruitment</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/206/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Janine Kasuya, Manager" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Janine Kasuya</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Manager, BC &amp; Community Pod Leader</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/457/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Andre Montaut, Manager" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Andre Montaut</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Manager, Marketing &amp; Technical Support</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/463/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Dustin Shaw, Administrator" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Dustin Shaw</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Administrator, General Support</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/466/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Kristen Montaut, Administrator" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Kristen Montaut</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Administrator, Accounting</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/148/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Marnie Butler, Home Based Travel Agent" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Marnie Butler</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Trainer</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/268/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Cara Fahlman, Home Based Travel Agent" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Cara Fahlman</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Representative, Saskatchewan</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('/img/agents/232/profile.jpg')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" title="Jay Stoller, Home Based Travel Agent" class="text-dark fw-bolder text-hover-dark fs-3" data-bs-toggle="modal" data-bs-target="#about-ch-modal">Jay Stoller</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Representative, Manitoba</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->                    
                </div>
                <!--end::Wrapper-->
                <!--begin::Button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-left.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)" />
									</g>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
                <!--begin::Button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
									</g>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
            </div>
            <!--end::Slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Team Section-->
    <!--begin::Projects Section-->
    <div class="mb-lg-n15 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <!--begin::Card body-->
                <div class="card-body p-lg-20">
                    <!--begin::Heading-->
                    <div class="text-center mb-5 mb-lg-10">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="media-gallery" data-kt-scroll-offset="{default: 100, lg: 150}">Our Home Based Travel Agents</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Tabs wrapper-->
                    <div class="d-flex flex-center mb-5 mb-lg-15">
                        <!--begin::Tabs-->
                        <ul class="nav border-transparent flex-center fs-5 fw-bold">
                            <li class="nav-item">
                                <a href="#" title="Home Based Travel Agents On FAM Trips" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_fam-trips">FAM Trips</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" title="Home Based Travel Agents At Conferences" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_conferences">Conferences</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" title="Home Based Travel Agents At Trade Shows" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_trade-shows">Trade Shows</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" title="Home Based Travel Agent Awards" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_awards">Awards</a>
                            </li>
                        </ul>
                        <!--end::Tabs-->
                    </div>
                    <!--end::Tabs wrapper-->
                    <!--begin::Tabs content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_landing_projects_fam-trips">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h01.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('/img/work-from-home/media-gallery-h01.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Row-->
                                    <div class="row g-10 mb-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h02.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h02.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h03.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h03.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h04.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h04.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_conferences">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h05.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('/img/work-from-home/media-gallery-h05.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Row-->
                                    <div class="row g-10 mb-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h06.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h06.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h07.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h07.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h08.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h08.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_trade-shows">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Row-->
                                    <div class="row g-10 mb-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h09.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h09.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h10.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h10.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h11.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h11.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h12.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('/img/work-from-home/media-gallery-h12.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_awards">
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h13.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('/img/work-from-home/media-gallery-h13.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Row-->
                                    <div class="row g-10 mb-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h14.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h14.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Item-->
                                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h15.jpg">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h15.jpg')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                                    <i class="fas fa-eye fs-3x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Item-->
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="/img/work-from-home/media-gallery-h16.jpg">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('/img/work-from-home/media-gallery-h16.jpg')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-gallery bg-opacity-25">
                                            <i class="fas fa-eye fs-3x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tabs content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Projects Section-->
    <!--begin::Pricing Section-->
    <div class="mt-sm-n20">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bolder text-white mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">Plans &amp; Pricing</h1>
                        <div class="text-gray-600 fw-bold fs-5 mb-10">No Hidden Fees. No Contract Renewal Fees. No Non-Compete Clauses.</div>

                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-center" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-white py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark fw-boldest">Starter</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold mb-5">New To Travel</div>
                                            <!--end::Description-->
                                            <!--begin::Commission-->
                                            <div class="text-center">

                                                <span class="fs-3x fw-bolder text-success" data-kt-plan-price-month="60" data-kt-plan-price-annual="60">60</span>
                                                <span class="mb-2 text-success">%</span>
                                            </div>
                                            <div class="text-gray-400 fw-bold mb-5">Commission Earnings</div>
                                            <!--end::Commission-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-dark">$</span><b class="fs-1">995</b> Setup Fee</span>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-10">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-dark">$</span><b class="fs-1">115</b> Monthly Fee</span>
                                            </div>
                                            <!--end::Item-->												<!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Email + Website</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Stationery</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Marketing Material</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Training + Support</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->

                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" title="Starter Plan Home Based Travel Agent Application" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#agent-application-modal">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-white py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark fw-boldest">Value</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-danger fw-bolder mb-5">Our Most Popular Plan</div>
                                            <!--end::Description-->
                                            <!--begin::Commission-->
                                            <div class="text-center">

                                                <span class="fs-3x fw-bolder text-success" data-kt-plan-price-month="60" data-kt-plan-price-annual="60">70</span>
                                                <span class="mb-2 text-success">%</span>
                                            </div>
                                            <div class="text-gray-400 fw-bold mb-5">Commission Earnings</div>
                                            <!--end::Commission-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-dark">$</span><b class="fs-1">995</b> Setup Fee</span>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-10">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-dark">$</span><b class="fs-1">135</b> Monthly Fee</span>
                                            </div>
                                            <!--end::Item-->												<!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Email + Website</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Stationery</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Marketing Material</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Training + Support</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
														</svg>
													  </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->

                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" title="Value Plan Home Based Travel Agent Application" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#agent-application-modal">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-white py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark fw-boldest">Premium</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold mb-5">Earn The Maximum</div>
                                            <!--end::Description-->
                                            <!--begin::Commission-->
                                            <div class="text-center">

                                                <span class="fs-3x fw-bolder text-success" data-kt-plan-price-month="80" data-kt-plan-price-annual="80">80</span>
                                                <span class="mb-2 text-success">%</span>
                                            </div>
                                            <div class="text-gray-400 fw-bold mb-5">Commission Earnings</div>
                                            <!--end::Commission-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-gray-800">$</span><b class="fs-1">995</b> Setup Fee</span>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-10">
                                                <span class="fw-bolder fs-5 text-gray-800 text-start pe-3"><span class="mb-2 text-text-gray-800">$</span><b class="fs-1">155</b> Monthly Fee</span>
                                            </div>
                                            <!--end::Item-->												<!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Email + Website</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Stationery</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Marketing Material</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Training + Support</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->

                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" title="Premium Plan Home Based Travel Agent Application" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#agent-application-modal">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-danger py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-white fw-boldest">Professional</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-white opacity-75 fw-bold mb-5">Travel Agents Only</div>
                                            <!--end::Description-->
                                            <!--begin::Commission-->
                                            <div class="text-center">

                                                <span class="fs-3x fw-bolder text-white" data-kt-plan-price-month="80" data-kt-plan-price-annual="80">TBD</span>
                                            </div>
                                            <div class="text-white opacity-75 fw-bold mb-5">Commission Earnings</div>
                                            <!--end::Commission-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-9">
                                                <span class="fw-bolder fs-5 text-white opacity-75 text-start pe-3">Commission Percentage and Fees will be decided after the individual has been interviewed.</span>
                                            </div>
                                            <!--end::Item-->											<!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Email + Website</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Stationery</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Marketing Material</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Training + Support</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->

                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" title="Professional Plan Home Based Travel Agent Application" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#agent-application-modal">Select</a>												<!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Pricing-->
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <div class="text-white fw-bold fs-5 mt-20">If you plan on bringing on additional partners, contact us for more details.</div>

                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Pricing Section-->
    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-n20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="testimonials" data-kt-scroll-offset="{default: 125, lg: 150}">What Our Agents Say</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="fs-5 text-muted fw-bold mb-5">We do everything we can to support our home based travel agents.
                    <br />Here's what they have to say about their experience working with us.</div>
                <!--end::Description-->
                <!--begin::Action-->
                <a href="#" title="Home Based Travel Agent Testimonials" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#agent-testimonials-modal">Read More Testimonials</a>
                <!--end::Action-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row g-lg-10 mb-10 mb-lg-20">
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <div class="fs-2 fw-bolder text-dark mb-3">Centre Holidays is the best choice I have made!</div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-bold fs-4">Centre Holidays has certainly proven its worth in its professional approach along with a personalized support system all year round. T​he ​continued and consistent​ ​help from head office ​has been incredible.</div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="/img/agents/276/profile.jpg" class="" alt="Shoba Subrahmanyam, Centre Holidays" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="https://shoba.centreholidays.com" title="Shoba Subrahmanyam, Home Based Travel Agent" target="_blank" class="text-dark fw-bolder text-hover-primary fs-6">Shoba Subrahmanyam</a>
                                <span class="text-muted d-block fw-bold">Brampton, ON</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <div class="fs-2 fw-bolder text-dark mb-3">I'm so happy with my choice to join Centre Holidays.</div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-bold fs-4">I joined Centre Holidays in 2015! I have a young family and a full time job but I love travelling and wanted to try out being a travel agent. The head office team is awesome, really helpful and supportive!</div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="/img/agents/385/profile.jpg" class="" alt="Gill Rirao, Centre Holidays" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="https://leconte.centreholidays.com" title="Fabiola Leconte, Home Based Travel Agent" target="_blank" class="text-dark fw-bolder text-hover-primary fs-6">Gill Rirao</a>
                                <span class="text-muted d-block fw-bold">Toronto, ON</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <div class="fs-2 fw-bolder text-dark mb-3">A wealth of knowledge and truly professional in everything they do.</div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-bold fs-4">Centre Holidays has provided me the flexibility to pursue my passion for travel and has also given me guidance and support throughout the years. I am glad to be part of this extended family.</div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="/img/agents/127/profile.jpg" class="" alt="Jit Nanua, Centre Holidays" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="https://justintimetravel.centreholidays.com" title="Jit Nanua, Home Based Travel Agent" target="_blank" class="text-dark fw-bolder text-hover-primary fs-6">Jit Nanua</a>
                                <span class="text-muted d-block fw-bold">Mississauga, ON</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Highlight-->
            <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13 bg-success" id="contact" data-kt-scroll-offset="{default: 125, lg: 150}">
                <!--begin::Content-->
                <div class="my-2 me-5">
                    <!--begin::Title-->
                    <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2"><span class="fw-normal"></span>4 Amazing Plans To Choose From.
                    </div>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Join over 250 home based travel agents in Canada today!</div>
                    <!--end::Description-->
                </div>
                <!--end::Content-->
                <!--begin::Link-->
                <a href="#pricing" title="Work From Home Plans &amp; Pricing" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Plans & Pricing</a>
                <!--end::Link-->
            </div>
            <!--end::Highlight-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->
    <!--begin::Footer Section-->
    <div class="mb-0">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="landing-dark-bg pt-20">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row py-10 py-lg-20">
                    <!--begin::Col-->
                    <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9 mb-10">
                            <!--begin::Title-->
                            <h2 class="text-white">Contact Us</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-600">Call 									<a href="tel:18888238801" title="Call Centre Holidays" class="text-warning text-hover-white fw-bolder">1-888-823-8801</a> and let's continue the conversation.</span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9">
                            <!--begin::Title-->
                            <h2 class="text-white">Head Office</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-600">221-2155 Leanne Boulevard, Mississauga, ON L5K 2K8</span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-6 ps-lg-16">
                        <!--begin::Navs-->
                        <div class="d-flex justify-content-center">
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column me-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-white mb-6">Discover</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="#" title="Why Join Centre Holidays?" class="text-white opacity-50 text-hover-warning fs-5 mb-6" data-bs-toggle="modal" data-bs-target="#why-join-ch-modal">Why Join Us?</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" title="About Centre Holidays, Host Travel Agency" class="text-white opacity-50 text-hover-warning fs-5 mb-6" data-bs-toggle="modal" data-bs-target="#about-ch-modal">About Us</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" title="Home Based Travel Agent Testimonials" class="text-white opacity-50 text-hover-warning fs-5 mb-6" data-bs-toggle="modal" data-bs-target="#agent-testimonials-modal">Testimonials</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" title="Centre Holidays' Awards &amp; Accolades" class="text-white opacity-50 text-hover-warning fs-5 mb-6" data-bs-toggle="modal" data-bs-target="#awards-modal">Awards</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column ms-lg-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-white mb-6">Stay Connected</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="https://www.facebook.com/centreholidays" title="Follow Centre Holidays On Facebook" target="_blank" class="mb-6">

                                    <span class="text-white opacity-50 text-hover-warning fs-5 mb-6"><i class="fab fa-facebook fa-lg me-2"></i>Facebook</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="https://www.instagram.com/centreholidays/" title="Follow Centre Holidays On Instagram" target="_blank" class="mb-6">					<span class="text-white opacity-50 text-hover-warning fs-5 mb-6"><i class="fab fa-instagram fa-lg me-2"></i>Instagram</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="https://twitter.com/centreholidays" title="Follow Centre Holidays On Twitter" target="_blank" class="mb-6">

                                    <span class="text-white opacity-50 text-hover-warning fs-5 mb-6"><i class="fab fa-twitter fa-lg me-2"></i>Twitter</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="https://www.youtube.com/centreholidays" title="Follow Centre Holidays On YouTube" target="_blank" class="mb-6">
                                    <span class="text-white opacity-50 text-hover-warning fs-5 mb-6"><i class="fab fa-youtube fa-lg me-2"></i>YouTube</span>
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Navs-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
            <!--begin::Separator-->
            <div class="landing-dark-separator"></div>
            <!--end::Separator-->
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <!--begin::Copyright-->
                    <div class="d-flex align-items-center order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="#home" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                            <img alt="Centre Holidays - Host Travel Agency" src="/img/centre-holidays-logo-nav.png" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo image-->
                        <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">© <?php echo date("Y");?> Centre Holidays Inc.</span>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-warning fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a href="https://tico.ca/" title="TICO Registered Agency" target="_blank" class="menu-link px-2">TICO 50018114</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a href="https://www.consumerprotectionbc.ca/" title="Consumer Protection BC Registered Agency" target="_blank" class="menu-link px-2">BC 64453</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
							<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
				</span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
</div>
<!--end::Main-->
<!--begin::Awards Modal-->
<div class="modal fade" tabindex="-1" id="awards-modal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder fs-2 text-dark">Awards</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fas fa-times fs-2"></i></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body lead text-dark pb-3">
                <p>You will be redirected to Centre Holidays' consumer website in a new tab to see all the company awards.</p>
                <!--begin::Action-->
                <div class="text-center">
                    <a href="https://centreholidays.com/company/awards.php" title="Proceed To CentreHolidays.com" target="_blank" class="btn btn-warning mb-5 mt-5">Proceed</a>
                </div>                         <!--end::Action-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Awards Modal-->
<!--begin::About Centre Holidays Modal-->
<div class="modal fade" tabindex="-1" id="about-ch-modal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder fs-2 text-dark">About Centre Holidays</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fas fa-times fs-2"></i></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body lead text-dark pb-3">
                <!--begin::Accordion-->
                <div class="accordion mb-5" id="about-ch-accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="about-ch-accordion_header_1">
                            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#about-ch-accordion_body_1" aria-expanded="true" aria-controls="about-ch-accordion_body_1">
                                Company Profile
                            </button>
                        </h2>
                        <div id="about-ch-accordion_body_1" class="accordion-collapse collapse show" aria-labelledby="about-ch-accordion_header_1" data-bs-parent="#about-ch-accordion">
                            <div class="accordion-body">
                                Centre Holidays was established in March 2003 by Carlton Montaut and Barbara Sasiadek and has been a retail travel agency since its inception. In 2009, Centre Holidays established itself as a host travel agency for home based travel agents across Canada.
                                <br>
                                <br>
                                We are proud to say that we have overcome some of the most turbulent times in the travel industry and not just survived, but grown. During the economic recession in 2009, many travel agencies "closed their doors" whereas we grew from a 2-agent organization to roughly having over 250 home based travel agents associated with us since January 2010. We also increased our administration staff from two to nine.
                                <br>
                                <br>
                                The proof of our success stems from the dedication of our team and all our home based travel agents. Our gross sales have increased by over 500% in most areas.
                                <br>
                                <br>
                                We give our home based travel agents priority on all educational and ‘FAM’ trips because we feel that the more educated they are, the easier and more effective they will be at selling.
                                <br>
                                <br>
                                We have regular in-house webinars, one-on-one training sessions and presentations by various travel suppliers and more.
                                <br>
                                <br>
                                We strive to constantly provide all our home based travel agents with quality customer service and support so that they can concentrate on their customers.
                                <br>
                                <br>
                                We can only be successful if our home based travel agents are. We will do whatever we can to ensure that they have all the tools and support they require to grow a profitable and rewarding home based travel business.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="about-ch-accordion_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#about-ch-accordion_body_2" aria-expanded="false" aria-controls="about-ch-accordion_body_2">
                                Message From The CEO
                            </button>
                        </h2>
                        <div id="about-ch-accordion_body_2" class="accordion-collapse collapse" aria-labelledby="about-ch-accordion_header_2" data-bs-parent="#about-ch-accordion">
                            <div class="accordion-body">
                                <img class="img-responsive img-border mb-4" src="/img/work-from-home/message-from-the-ceo-h01.jpg" alt="Message From The CEO">
                                Travel has been my only career and I joined the travel industry in 1979. I have been in various positions since then, but marketing and management have been my forte. Of course, during these years I have travelled the world extensively for leisure and business. Another important aspect of myself is in all these years of travel I have only helped to grow various travel businesses. I have never been the cause of any closure. Now that’s what I call 42 years of success in the travel industry.
                                <br>
                                <br>
                                I am a firm believer in the importance of travel professionals and that they do make a difference handling customer travel requirements. I have strong leadership skills and a very good understanding of the Canadian and American markets. My extensive years in travel have helped me to build contacts and relationships within the industry across Canada, the USA and many other countries worldwide. As the founder of Centre Holidays, there are three words that have brought about success for myself and my agents: Passion, Dedication and Support. Of course, all of this has been possible because of the wonderful team I have at head office:
                                <ul class="mb-5 mt-5">
                                    <li><b>Barbara Sasiadek</b>, Chief Financial Officer</li>
                                    <li><b>Michele Montgomery</b>, Manager, Operations</li>
                                    <li><b>Jillian Montaut</b>, Manager, Administration &amp; Recruitment</li>
                                    <li><b>Janine Kasuya</b>, Manager, BC & Community Pod Leader</li>
                                    <li><b>Andre Montaut</b>, Manager, Marketing &amp; Technical Support</li>
                                    <li><b>Dustin Shaw</b>, Administrator, General Support</li>
                                    <li><b>Kristen Montaut</b>, Administrator, Accounting</li>
                                    <li><b>Marnie Butler</b>, Trainer</li>
                                    <li><b>Cara Fahlman</b>, Representative, Saskatchewan</li>
                                    <li><b>Jay Stoller</b>, Representative, Manitoba</li> 
                                </ul>
                                Centre Holidays was established in March 2003. Barbara Sasiadek and I started this as a partnership. I am proud to say that we have overcome some of the most turbulent times in the travel industry. During the economic recession many travel agencies closed their doors whereas we expanded. In October 2009, our Home Based Travel Agent business was launched and since then we have grown from two agents to over 250 across Canada. How was this possible? I mentioned previously, three words.
                                <br>
                                <br>
                                <b>Passion:</b> My passion for travel is and was so great that in spite of financial difficulties at the start, I overcame all obstacles.
                                <br>
                                <br>
                                <b>Dedication:</b> Passion just proves my dedication to make this program successful.
                                <br>
                                <br>
                                <b>Support:</b> In any business, if you do not provide support you will not get results. My agents get the best of everything. This is a family business with the phrase "We care for our staff and agents." Hence, this would not be possible without the support of my family who support my travel venture.
                                <br>
                                <br>
                                A special thank you to my wife Jillian of 44 years.<br>
                                <br>
                                Thank you to my children, Jermaine and Kristen, who support me and presently play a role in my operations.<br>
                                <br>
                                However, nothing would have been possible to date without the tireless effort of my eldest son Andre who heads IT and Marketing and is continuously thinking of ways to improve the business and make it easy for our home based travel agents to market themselves.
                                <br>
                                <br>
                                As for our home based travel agents, I thank them for being a part of our ever growing family and wish them all the best.
                                <br>
                                <br>
                                If you wish to share this experience with us, join us.
                                <br>
                                <br>
                                Sincerely,
                                <br>
                                <br>
                                <b>Carlton Montaut</b><br>
                                Chief Executive Officer
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::About Centre Holidays Modal-->
<!--begin::Home Based Travel Agent Testimonials Modal-->
<div class="modal fade" tabindex="-1" id="agent-testimonials-modal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder fs-2 text-dark">Home Based Travel Agent Testimonials</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fas fa-times fs-2"></i></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body lead text-dark pb-3">
                <!--begin::Accordion-->
                <div class="accordion mb-5" id="agent-testimonials-accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_1">
                            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_1" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_1">
                                Anna Aitchison - Elora, ON
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_1" class="accordion-collapse collapse show" aria-labelledby="agent-testimonials-accordion_header_1" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                After making the decision to return to the travel industry, I started looking for options to be able to work from home to fit my family's schedule. After doing some homework and research, Centre Holidays was at the top of my list. They checked off everything on my list that I was looking for. They provided me with everything I need to get started from a laptop and stationery to training and on-going support. Whenever I have had a question or needed help, it has been there in an instant. The other agents with Centre Holidays are also willing to help and are very knowledgeable, it is like one big family that I'm very proud to be a part of and hope to continue my learning and growth with this company for many years :)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_2" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_2">
                                Marnie Butler - St. Catharines, ON
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_2" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_2" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                My business has grown by leaps and bounds since joining Centre Holidays in 2009. Centre Holidays' team has proven to me that I made the right choice to join this awesome company.
                                <br>
                                <br>
                                The support from head office has been incredible over the years.
                                <br>
                                <br>
                                Our travel advisor community is one of the best! We all help each other to succeed and never feel we are in competition with each other.<br>
                                <br>
                                As of 2023, I am now part of the head office team as the trainer for all new travel advisors. I always make sure that each new travel advisor benefits from my expertise and knowledge as this is one of the first steps in helping them get started on the path to becoming a successful travel advisor.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_3">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_3" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_3">
                                Ami Jagger - Coquitlam, BC
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_3" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_3" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                Centre Holidays has been an exceptional host agency. They truly care about their travel advisors and ensure they do all they can to provide their support. I believe that Centre Holidays stands out as a host agency as they embrace the feeling of community.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_4">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_4" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_4">
                                Vanessa Leduc - South Glengarry, ON
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_4" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_4" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                Centre Holidays is the best travel agency I've worked with! I've been with them since 2010 and the training, and services they provide are over and above anywhere else. The start-up fees were minimal and the monthly management fees are very manageable with the services they provide (including: website and email maintenance, invoicing system, and a great agent resource for training and vendor directory). Best of all, the management team is always available and are a great resource with the experience and connections they have and are always looking to grow the business of each of their agents.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_5">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_5" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_5">
                                Jay Stoller - Winnipeg, MB
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_5" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_5" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                I have been a home based travel agent with Centre Holidays for over 7 years. I started with no experience in the industry, just the desire to become a certified travel consultant. Centre Holidays provided the training I required to get my certification and then further training was done one on one to enable me to become knowledgeable about providing quality travel products for my clients.
                                <br>
                                <br>
                                Even though I am working from home, there is excellent support available if needed, both from the head office and from an ever-increasing pool of fellow agents located across the country.
                                <br>
                                <br>
                                As far as costs go for starting your own business, I found Centre Holidays to be very reasonable and have easily made back my initial investment.
                                <br>
                                <br>
                                I am enjoying the freedom of working from home and can put in as little or as much time as I have.
                                <br>
                                <br>
                                For anyone considering entering this business, I would say that my experiences have been very positive and would not hesitate to recommend Centre Holidays.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_6">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_6" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_6">
                                Valentine Skeels - Red Deer, AB
                            </button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_6" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_6" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                I joined Centre Holidays in October 2011 and it has been a great adventure!
                                <br>
                                <br>
                                They offer a turn key opportunity and give you all the tools to be successful in the travel industry. Carlton and his team at head office are phenomenal. You can always count on their ongoing training and support. They will answer any question you have. Centre Holidays gives you the freedom to focus on your Niche.
                                <br>
                                <br>
                                Being a Home-Based Agent, I don't feel like I am alone. I have this amazing group of fellow Centre Holidays agents all over the country I can rely on! We all have our area of specialty and we are all willing to help each other with tips and ideas.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_7">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_7" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_7">
                                Mandana Etemadi - King City, ON</button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_7" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_7" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                When I approached Centre Holidays to explore my options in becoming a home-based travel consultant after being employed with a few other travel agencies, I instantly knew this is where I need to be.
                                <br>
                                <br>
                                I appreciate the well thought out marketing strategies, on-going trainings, and real support from the management. They are so easy to communicate with and responsive if there is an issue or a question arises.
                                <br>
                                <br>
                                I am particularly pleased with all the support I get to add more value to service my clients such as promotional flyers, exclusive wedding invitations for my wedding groups and my bride and groom’s very own mini website. The devil is all in details.
                                <br>
                                <br>
                                I found my experience with Centre Holidays rewarding as my client list has increased dramatically. It is fantastic working with them and I can’t rate them highly enough.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_8">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_8" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_8">
                                Janice Romano - Cambridge, ON</button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_8" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_8" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                My wholehearted appreciation to Centre Holidays for giving me the opportunity to sell travel. Head office has always been there for me any time I need them, yet they have never interfered with anything I am doing. It is gratifying to know that I can depend on my manager for her invaluable assistance with any questions that I may have. Furthermore, my manager went out of her way to book travel for my clients when I was unable to do so during my recent operation.
                                <br>
                                <br>
                                Because of Centre Holidays' knowledge in the travel industry they have consistently made extra efforts to help me in completing and making sure my bookings go smoothly, and for that I am truly grateful.
                                <br>
                                <br>
                                Though, I am relevantly new at being a home based agent my commissions have been wonderful. As an example, two clients of mine went on a safari to South Africa. My commission for just that one booking was over $800. Not bad for a home based agent – eh? Therefore, because of all of the above, I look forward to many more years with Centre Holidays.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="agent-testimonials-accordion_header_9">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agent-testimonials-accordion_body_9" aria-expanded="false" aria-controls="agent-testimonials-accordion_body_9">
                                Michele Montgomery - Simcoe, ON</button>
                        </h2>
                        <div id="agent-testimonials-accordion_body_9" class="accordion-collapse collapse" aria-labelledby="agent-testimonials-accordion_header_9" data-bs-parent="#agent-testimonials-accordion">
                            <div class="accordion-body">
                                My Husband and I joined Centre Holidays in 2009 when they started their home based travel program. In February 2010, I joined the management staff as a trainer, to train and support agents.
                                <br>
                                <br>
                                Recently I have stepped into the role of manager. Our head office staff is always there to answer questions and guide the agents whether they are new to the industry or have years of experience.
                                <br>
                                <br>
                                As a home based travel agent, you develop a very different relationship with your co-workers than you would in an office setting. Networking is very important and Centre Holidays' agents help each other with tips and ideas.
                                <br>
                                <br>
                                Centre Holidays gives you the freedom to focus on whatever market you have an interest in. If you want to focus mainly on cruises, air, groups, weddings or a particular destination, you will get the support, training and guidance to be successful!
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Home Based Travel Agent Testimonials Modal-->
<!--begin::Why Join CH Modal-->
<div class="modal fade" tabindex="-1" id="why-join-ch-modal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="font-weight-bolder fs-2 text-dark">Why Join Centre Holidays?</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fas fa-times fs-2"></i></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body lead text-dark pb-3">
                <!--begin::Accordion-->
                <div class="accordion mb-5" id="why-join-ch-accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_1">
                            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_1" aria-expanded="true" aria-controls="why-join-ch-accordion_body_1">
                                The Benefits Of Joining A Host Travel Agency</button>
                        </h2>
                        <div id="why-join-ch-accordion_body_1" class="accordion-collapse collapse show" aria-labelledby="why-join-ch-accordion_header_1" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                When it comes to starting your own travel business, there are a lot of benefits to joining a host travel agency like Centre Holidays. These benefits include:
                                <ul class="mt-5">
                                    <li>Start-Up Cost</li>
                                    <li>Training And Education</li>
                                    <li>Technology</li>
                                    <li>Licenses And Accreditations</li>
                                    <li>Accounting</li>
                                    <li>Commission</li>
                                    <li>Support</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_2" aria-expanded="false" aria-controls="why-join-ch-accordion_body_2">
                                Start-Up Cost
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_2" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_2" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                If you plan on opening a travel agency, it can be expensive. You have to consider the cost of an office space, phone line, internet, agency licences and accreditations, etc.
                                <br>
                                <br>
                                By joining Centre Holidays, you can work right from you home and all you have to pay is an initial setup fee and a monthly recurring fee, both of which are relatively inexpensive. Your training, support and a few other aspects of your business are covered under these fees.<br>
                                <br>
                                <small>*Individuals from British Columbia will have additional fees which have to be made payable to their government.
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_3">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_3" aria-expanded="false" aria-controls="why-join-ch-accordion_body_3">
                                Training And Education
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_3" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_3" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                Once you join Centre Holidays and get set up, you are initially trained on a one-on-one basis over multiple sessions. This helps ensure that you become competent and comfortable as a travel agent. Centre Holidays also offers on-going one-on-one and group training sessions as it is covered in your monthly recurring fee.
                                <br>
                                <br>
                                On top of the training that we provide, you will have access to hundreds of online courses which can help you become a specialist (eg: destination weddings, river cruises, luxury travel, etc. ).
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_4">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_4" aria-expanded="false" aria-controls="why-join-ch-accordion_body_4">
                                Technology
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_4" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_4" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                Today, technology is a key factor to running a business. From your email to your website to networking with colleagues, some sort of application is required.
                                <br>
                                <br>
                                Once you are a part of our company, you don't have to worry about what is required as we provide you with all the essential applications to run your business.
                                <br>
                                <br>
                                Your website is maintained by us so that you don't have to worry about updating it yourself.
                                <br>
                                <br>
                                You will also be given access to our agent portal, a backend system that contains various resources, marketing material and information about the suppliers we deal with.
                                <br>
                                <br>
                                As for networking with our family of home based travel agents across Canada, you will have access to our communities where you will be able to share ideas, ask for assistance and get to know each other on a personal level.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_5">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_5" aria-expanded="false" aria-controls="why-join-ch-accordion_body_5">
                                Licences And Accreditations
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_5" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_5" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                If you choose to open a travel agency, applying for licences and accreditations takes time and money. One benefit to joining a host travel agency like ours is that you can use our licences and accreditations when contacting our suppliers to book trips, registering yourself for rewards programs, educational courses, advertising, etc. Basically from the minute you join, your travel business can start operating.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_6">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_6" aria-expanded="false" aria-controls="why-join-ch-accordion_body_6">
                                Accounting
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_6" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_6" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                With selling comes making and receiving payments. This can range from credit card payments, wire transfers, cheque payments, etc. Our accounting team handles the majority of this on your behalf so that you can focus on operating your business.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_7">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_7" aria-expanded="false" aria-controls="why-join-ch-accordion_body_7">
                                Commission
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_7" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_7" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                We offer a wide range of commission levels for you to choose from (60% - 80%). You can choose to start at any of these levels or work your way up to the maximum that we offer. If you choose to work your way up, you will never be downgraded for a lack of sales.
                                <br>
                                <br>
                                Commission payouts are made once a month. As commission is received from our suppliers, we release them to you. We <b>Do Not</b> hold your commission until your clients return from their trip.
                                <br>
                                <br>
                                <small>*If you have any questions on how commission works, feel free to give us a call and we can discuss it in detail with you.</small>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="why-join-ch-accordion_header_8">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#why-join-ch-accordion_body_8" aria-expanded="false" aria-controls="why-join-ch-accordion_body_8">
                                Support
                            </button>
                        </h2>
                        <div id="why-join-ch-accordion_body_8" class="accordion-collapse collapse" aria-labelledby="why-join-ch-accordion_header_8" data-bs-parent="#why-join-ch-accordion">
                            <div class="accordion-body">
                                All our home based travel agents receive extensive and on-going support. Whether it's a technical issue, booking emergency, training or marketing request, etc., we have someone in place to help assist you. There is no additional cost to this as it is all covered in your monthly recurring fee.
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Why Join CH Modal-->




<!--begin::Sign Up Form Modal-->
<div class="modal bg-white fade" id="agent-application-modal" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen">
        <!--begin::Modal content-->
        <div class="modal-content shadow-none">
            <!--begin::Modal header-->
            <div class="modal-header bg-dark">
                <!--begin::Modal title-->
                <h2 class="font-weight-bolder text-white">Home Based Travel Agent Application</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-warning ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fas fa-times fs-2"></i></span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="userForm" class="form" action="email/insert-home-based-travel-agent-application.php" method="post">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Title</span>
                                </label>
                                <!--end::Label-->
                                <select id="title" name="title" class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select" required>
                                    <option></option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">First Name</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="First Name" name="fName"
                                       id="fName" required/>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Last Name</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Last Name" name="lName"
                                       id="lName" required/>
                            </div>
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span>Phone</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Phone" name="phone"
                                       id="phone"/>
                            </div>
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Email" name="email"
                                       id="email" required/>
                            </div>
                        </div>                                                    <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">City</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="City" name="city" id="city"
                                       required/>
                            </div>
                        </div>                                                    <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="col-md-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Province</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Province" name="province"
                                       id="province" required/>
                            </div>
                        </div>
                        <!--end::Input group--></div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-md-8">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Plan</span>
                                </label>
                                <!--end::Label-->
                                <select id="plan" name="plan" class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select" required>
                                    <option></option>
                                    <option value="Starter Plan (60% Commission)">Starter Plan (60% Commission)</option>
                                    <option value="Value Plan (70% Commission)">Value Plan (70% Commission)</option>
                                    <option value="Premium Plan (80% Commission)">Premium Plan (80% Commission)</option>
                                    <option value="Professional Plan (Travel Agents Only)">Professional Plan (Travel Agents Only)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="col-md-4">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">TICO Certified</span>
                                </label>
                                <!--end::Label-->
                                <select id="tico" name="tico" class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select" required>
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>                                                <!--end::Input group-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-md-12">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span>Message</span>
                                </label>
                                <!--end::Label-->
                                <textarea name="yourmessage" rows="3" class="form-control form-control-solid" id="yourmessage"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Referred By</span>
                                </label>
                                <!--end::Label-->
                                <select id="tihearaboutus" name="tihearaboutus" class="form-select form-select-solid"
                                        data-control="select2" data-hide-search="true" data-placeholder="Select" required>
                                    <option></option>
                                    <option value="Event / Trade Show">Event / Trade Show</option>
                                    <option value="Web Search">Web Search</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Friend / Relative">Friend / Relative</option>
                                    <option value="Centre Holidays Travel Agent">Centre Holidays Travel Agent</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span>Centre Holidays Travel Agent's Full Name</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Travel Agent's Full Name"
                                       name="referralname" id="referralname"/>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Row-->

                    <!--        <div class="row">-->
                    <!--            <div class="col-md-2">-->
                    <!--                <div class="d-flex flex-column mb-7 fv-row" style="padding-top:20px">-->
                    <!--                    <img src="../img/forms/security-question.jpg" style="width:149px;"/>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!---->
                    <!--            <div class="col-md-10">-->
                    <!--                <div class="d-flex flex-column mb-7 fv-row">-->
                    <!--                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">-->
                    <!--                        <span>Answer this question?</span>-->
                    <!--                    </label>-->
                    <!--                    <input type="number" required name="qanswer" maxlength="6" class="form-control form-control-solid"-->
                    <!--                           placeholder="Your Answer" id="qanswer" value=""/>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->


                    <!--begin::Actions-->
                    <!--        <div class="text-center pt-15">-->
                    <!--            <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
                    <!--            <script>-->
                    <!--                function onSubmit(token) {-->
                    <!--                    document.getElementById("userForm").submit();-->
                    <!--                }-->
                    <!--            </script>-->
                    <!--            <button type="submit" id="post" class="btn btn-warning g-recaptcha" value="Submit Application" name="post"-->
                    <!--                    data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>Submit Application-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--end::Actions-->



                    <div class="pt-10 pb-5 text-center">

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                        <input type="submit" class="g-recaptcha btn btn-lg btn-warning text-uppercase font-weight-bolder px-7 py-5" value="Submit Inquiry" name="post" id="post" data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>
                    </div>


                    <script>
                        document.getElementById('userForm').addEventListener('submit', function(e) {
                            e.preventDefault(); // Stop form submission initially

                            // Refresh the reCAPTCHA token just before submission
                            grecaptcha.ready(function() {
                                console.log("Ready grecaptcha...");
                                grecaptcha.execute('6LcKZvMpAAAAAN8NpLLdkXss1Q2gyndA7U9s4jka', {action: 'submit'}).then(function(token) {
                                    console.log("execute grecaptcha...");
                                    console.log(token);

                                    // Set the token in the hidden input
                                    document.getElementById('recaptchaResponse').value = token;

                                    // Now submit the form once the token is set
                                    document.getElementById('userForm').submit(); // Submit the form
                                });
                            });
                        });
                    </script>


                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>




<!--end::Sign Up Form Modal-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/metronic/v8015/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="/metronic/v8015/demo1/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/metronic/v8015/demo1/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<script src="/metronic/v8015/demo1/assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/metronic/v8015/demo1/assets/js/custom/landing.js"></script>
<script src="/metronic/v8015/demo1/assets/js/custom/pages/company/pricing.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>