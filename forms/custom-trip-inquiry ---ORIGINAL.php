<?php 
ob_start();
session_start();  #start a session ?>
<style>
.grecaptcha-badge { visibility: hidden; }
</style>
<?php
$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS

//======================Check if this IP already in the black list=========================
include($_SERVER['DOCUMENT_ROOT'].'/library/chck_blacklist.php');

//===================sanitize injection====================================================
include($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');

$interests=trim($_POST['interests']);
$interests=sanitize_system_string($interests);
$interests=str_replace ('"',"",$interests);
$interests=str_replace ("'","",$interests);

$destination=trim($_POST['destination']);
$destination=sanitize_system_string($destination);
$destination=str_replace ('"',"",$destination);
$destination=str_replace ("'","",$destination);

$departfrom=trim($_POST['departfrom']);
$departfrom=sanitize_system_string($departfrom);
$departfrom=str_replace ('"',"",$departfrom);
$departfrom=str_replace ("'","",$departfrom);

$departuredate=trim($_POST['departuredate']);
$departuredate=sanitize_system_string($departuredate);
$departuredate=str_replace ('"',"",$departuredate);
$departuredate=str_replace ("'","",$departuredate);

$triplength=trim($_POST['triplength']);
$triplength=sanitize_system_string($triplength);
$triplength=str_replace ('"',"",$triplength);
$triplength=str_replace ("'","",$triplength);

$numadults=trim($_POST['numadults']);
$numadults=sanitize_system_string($numadults);
$numadults=str_replace ('"',"",$numadults);
$numadults=str_replace ("'","",$numadults);

$numchildren=trim($_POST['numchildren']);
$numchildren=sanitize_system_string($numchildren);
$numchildren=str_replace ('"',"",$numchildren);
$numchildren=str_replace ("'","",$numchildren);

$budget=trim($_POST['budget']);
//$budget=sanitize_system_string($budget);
$budget=str_replace ('"',"",$budget);
$budget=str_replace ("'","",$budget);

$tripfinancing=trim($_POST['tripfinancing']);
$tripfinancing=sanitize_system_string($tripfinancing);
$tripfinancing=str_replace ('"',"",$tripfinancing);
$tripfinancing=str_replace ("'","",$tripfinancing);

$salutation=trim($_POST['salutation']);
$salutation=sanitize_system_string($salutation);
$salutation=str_replace ('"',"",$salutation);
$salutation=str_replace ("'","",$salutation);

$travfname=trim($_POST['travfname']);
$travfname=sanitize_system_string($travfname);
$travfname=str_replace ('"',"",$travfname);
$travfname=str_replace ("'","",$travfname);

$travlname=trim($_POST['travlname']);
$travlname=sanitize_system_string($travlname);
$travlname=str_replace ('"',"",$travlname);
$travlname=str_replace ("'","",$travlname);

$ftravlname=$travfname.' '.$travlname;
	
$qanswer=trim($_POST['qanswer']);
//$qanswer=sanitize_system_string($qanswer);
$qanswer=str_replace ('"',"",$qanswer);
$qanswer=str_replace ("'","",$qanswer);

$agentname=trim($_POST['agentname']);
$agentname=sanitize_system_string($agentname);
$agentname=str_replace ('"',"",$agentname);
$agentname=str_replace ("'","",$agentname);

$agentemail=trim($_POST['agentemail']);
$agentemail=sanitize_system_string($agentemail);
$agentemail=str_replace ('"',"",$agentemail);
$agentemail=str_replace ("'","",$agentemail);

$departcountry=trim($_POST['departcountry']);
$departcountry=sanitize_system_string($departcountry);
$departcountry=str_replace ('"',"",$departcountry);
$departcountry=str_replace ("'","",$departcountry);

$addnotes=trim($_POST['addnotes']);
$addnotes=sanitize_system_string($addnotes);
$addnotes=str_replace ('"',"",$addnotes);
$addnotes=str_replace ("'","",$addnotes);

$triptype=trim($_POST['triptype']);
$triptype=sanitize_system_string($triptype);
$triptype=str_replace ('"',"",$triptype);
$triptype=str_replace ("'","",$triptype);

$travphone=trim($_POST['travphone']);
$travphone=sanitize_system_string($travphone);
$travphone=str_replace ('"',"",$travphone);
$travphone=str_replace ("'","",$travphone);

$travemail=trim($_POST['travemail']);
$travemail=sanitize_system_string($travemail);
$travemail=str_replace ('"',"",$travemail);
$travemail=str_replace ("'","",$travemail);

$hearaboutus=trim($_POST['hearaboutus']);
$hearaboutus=sanitize_system_string($hearaboutus);
$hearaboutus=str_replace ('"',"",$hearaboutus);
$hearaboutus=str_replace ("'","",$hearaboutus);
	
$AgentID=trim($_POST['AgentID']);

if($qanswer==21) {

include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo.php');
		
if (!empty($travfname) && !empty($travlname) && ($travfname != $travlname)) {	

include($_SERVER['DOCUMENT_ROOT'].'/forms/email/insert-custom-trip-inquiry.php');

?>
<!--begin::Modal-->
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h2 class="mb-0 font-weight-boldest text-uppercase text-light">Custom Trip Inquiry Submitted</h2>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
               <p class="lead">Thank you for taking the time to submit an inquiry. We will be in touch with you once your inquiry is reviewed.<br>
<br>
A copy of your inquiry has also been emailed to you. Please check your spam folder if you do not see the email in your inbox.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php
}
else
{
?>
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 class="mb-0 font-weight-bolder text-light">Error!</h3>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
               <p class="lead mb-0">Please complete the required fields.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>	
<?php	
}
}
?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Custom Trip Inquiry | Centre Holidays</title>
        <meta name="description" content="Start planning your perfect getaway. For an unforgettable trip full of unique experiences, let's work together to help make it a reality.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/forms/custom-trip-inquiry-h01.jpg" />
<meta property="og:description" content="Start planning your perfect getaway. For an unforgettable trip full of unique experiences, let's work together to help make it a reality.">
<!-- end:: Facebook Sharing -->
        <?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>
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
  <div class="img"><img class="d-block w-100" src="/img/forms/custom-trip-inquiry-c01.jpg" alt="Santorini, Greece"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Santorini, Greece</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Custom Trip Inquiry</h1>
									<h2 class="text-dark-65 font-weight-bolder">Start planning your perfect getaway. For an unforgettable trip full of unique experiences, let's work together to help make it a reality.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<div class="card card-custom card-border mb-30">							<!--begin::Header--><!--end::Header-->
											<!--begin::Body-->
<div class="card-body d-flex flex-column">
<?php include($_SERVER['DOCUMENT_ROOT'].'/forms/ssi/custom-trip-inquiry.php');?>								  
</div>
											<!--end::Body-->
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
<?php ob_flush() ?>