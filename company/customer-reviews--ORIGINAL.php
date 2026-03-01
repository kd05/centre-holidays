<?php 
ob_start();
if (!isset($_SESSION)){
  session_start();

$_SESSION['FeedFName']=$_POST['FeedFName'];
$_SESSION['FeedLName']=$_POST['FeedLName'];
$_SESSION['FeedExperience']=$_POST['FeedExperience'];
$_SESSION['FeedPhone']=$_POST['FeedPhone'];
$_SESSION['FeedMessage']=$_POST['FeedMessage'];
$_SESSION['FeedFName']=$_POST['FeedEmail'];
$_SESSION['FeedTitle']=$_POST['FeedTitle'];
$_SESSION['title']=$_POST['title'];

}
?>
<style>
.grecaptcha-badge { visibility: hidden; }
</style>
<?php

//if(!isset($_POST['customerreviews'])) {
include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo-geo.php');// check if country blacklisted
//}

if (isset($_POST['customerreviews'])) {

if (($_POST['question']==21) && ($_POST['FeedFName'] != $_POST['FeedLName']) && !empty($_POST['FeedFName']) && !empty($_POST['FeedLName'])) {
		
$flname=$_POST['FeedFName'].' '.$_POST['FeedLName'];	
include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo.php');
	
include($_SERVER['DOCUMENT_ROOT'].'/forms/email/insert-customer-review.php');
?>
<!--begin::Modal-->
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 class="mb-0 font-weight-bolder text-white">Review Submitted</h3>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
<p class="lead">Thank you for taking the time to write a review. Your feedback is appreciated and important in helping us improve.<br>
<br>
A copy of your review has also been emailed to you. If you do not see the email in your inbox, please check your spam folder.</p>
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
<!--begin::Modal-->
<div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 class="mb-0 font-weight-bolder text-light">Error</h3>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close text-light"></i>
                </a>
            </div>
            <div class="modal-body">
<p class="lead">Please fill in all the required fields</p>
            </div>
            <div class="modal-footer bg-danger">
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<title>Customer Reviews | <?php echo $TagTitle ?></title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/head-scripts.php');?>


<meta name="description" content="Read reviews or submit a review of your latest trip and the service you received. Your feedback is appreciated and important in helping us improve our services.">
        <!-- begin:: Facebook Sharing -->
<meta property="og:image" content="https://centreholidays.com/img/company/customer-reviews-h01.jpg" />
<meta property="og:description" content="Read reviews or submit a review of your latest trip and the service you received. Your feedback is appreciated and important in helping us improve our services.">
<!-- end:: Facebook Sharing -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

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
  <div class="img"><img class="d-block w-100" src="/img/company/customer-reviews-c01.jpg" alt="Cycling Near Ayers Rock, Australia"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">We'd Love To Hear From You</button></a> 
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Customer Reviews</h1>
									<h2 class="text-dark-65 font-weight-bolder">Read reviews or submit a review of your latest trip and the service you received. Your feedback is appreciated and important in helping us improve our services.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->


<?php

switch ($ttcount2626) {

  case "0":
  $writeactive='active';
  $writeshow='show';
    break;

  default:
  $writeactive='';
  $writeshow='';

}

?>

<!--begin::Section-->
<div class="container mt-6">
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<?php if ($ttcount2626 !=0) { ?>
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#read-reviews-tab">Reviews (<?php echo $ttcount2626 ?>)</a>
</li>
<?php } ?>
<li class="nav-item">
<a class="nav-link font-weight-bolder font-size-lg text-dark <?php echo $writeactive ?> text-uppercase" data-toggle="tab" href="#write-reviews-tab">Write A Review</a>
</li>
</ul>
<div class="tab-content mt-10" id="contact-content">
<?php if ($ttcount2626 !=0) { ?>
<div class="tab-pane fade active show" id="read-reviews-tab" role="tabpanel" aria-labelledby="read-reviews-tab">
<!--begin::Reviews-->
<div class="row mb-20">
<?php include($_SERVER['DOCUMENT_ROOT'].'/company/ssi/customer-reviews.php');?>
</div>
<!--end::Reviews-->
  </div>
  <?php } ?>
  <div class="tab-pane fade <?php echo $writeactive ?> <?php echo $writeshow ?>" id="write-reviews-tab" role="tabpanel" aria-labelledby="write-reviews-tab">
<!--begin::Write A Review-->
<div class="row mb-30">
<div class="col-xl-12">
    <!--begin::Tiles Widget 15-->
    <div class="card card-custom card-border card-stretch">
        <!--begin::Body-->
        <div class="card-body d-flex flex-column" id="thisform">


<form id='userForm' action="<?php echo $_SERVER['PHP_SELF'] ?>#thisform" method="post" enctype="multipart/form-data">

<?php
			  if (!empty($BusinessEmail))
			  $agentemail=$BusinessEmail.', inquire@centreholidays.com';
			  else
			  $agentemail='inquire@centreholidays.com';
			  
			  if (!empty($titlename))
			  $agentname=$titlename;
			  else
			  $agentname='Centre Holidays';
			  ?>
<input type="hidden" id="FeedLocation" name="FeedLocation" value="<?php echo $City.', '.strtoupper(substr($Region, 0, 2)) ?>" />              
<input type="hidden" id="AgentEmail" name="AgentEmail" value="<?php echo $agentemail ?>" />
<input type="hidden" id="AgentName" name="AgentName" value="<?php echo $agentname ?>" />
<input type="hidden" id="AgentID" name="AgentID" value="<?php echo $AgentID ?>" />

<div class="row">
<div class="col-xl-4">
<div class="form-group">													
<label>Title <span class="text-danger">*</span></label>
<select class="form-control form-control-lg" id="title" name="title" required>
<option value="">Select</option>
<option value="Dr.">Dr.</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>
</div>
</div>	
<div class="col-xl-4">
<div class="form-group">													
<label>First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" value="<?php echo $_SESSION['FeedFName'] ?>" placeholder="First Name" name="FeedFName" id="FeedFName" required>
</div>
</div>	
<div class="col-xl-4">														
<div class="form-group">													
<label>Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" value="<?php echo $_SESSION['FeedLName'] ?>" placeholder="Last Name" name="FeedLName" id="FeedLName" required>
</div>
</div>
<div class="col-xl-6">														
<div class="form-group">													
<label>Phone</label>
<input type="text" class="form-control form-control-lg" value="<?php echo $_SESSION['Phone'] ?>" placeholder="Phone" name="FeedPhone" id="FeedPhone">
</div>
</div>
<div class="col-xl-6">														
<div class="form-group">													
<label>Email <span class="text-danger">*</span></label>
<input type="email" class="form-control form-control-lg" value="<?php echo $_SESSION['FeedEmail'] ?>" placeholder="Email" name="FeedEmail" id="FeedEmail" required>
</div>
</div>
<div class="col-xl-6">
<div class="form-group">														
<label>Travel Advisor / Agency</label>
<input type="email" class="form-control form-control-lg bg-light" placeholder="" name="Agency" id="Agency" value="<?php echo $agentname ?>" required readonly>
</div>
</div>
<div class="col-xl-6">
<div class="form-group">													
<label>Rating <span class="text-danger">*</span></label>
<div class="star-rating">
<fieldset>
    <input type="radio" id="star5" name="FeedExperience" value="5" required />
    <label for="star5" title="">5 stars</label>
    <input type="radio" id="star4" name="FeedExperience" value="4" /><label for="star4" title="">4 stars</label>
    <input type="radio" id="star3" name="FeedExperience" value="3" /><label for="star3" title="">3 stars</label>
    <input type="radio" id="star2" name="FeedExperience" value="2" /><label for="star2" title="">2 stars</label>
    <input type="radio" id="star1" name="FeedExperience" value="1" /><label for="star1" title="">1 star</label>
  </fieldset>
  </div>
  </div>
</div>
<div class="col-xl-12">
<div class="form-group">													
<label>Title Of Review <span class="text-danger">*</span></label>
<input type="text" class="form-control form-control-lg" value="<?php echo $_SESSION['FeedTitle'] ?>" placeholder="*Title" name="FeedTitle" id="FeedTitle" required>
</div>
</div>
<div class="col-xl-12">														
<div class="form-group">													
<label>Write Your Review <span class="text-danger">*</span></label>
<textarea class="form-control form-control-lg" id="FeedMessage" name="FeedMessage" rows="5" placeholder="Write Your Review" required><?php echo $_SESSION['FeedMessage'] ?></textarea>
</div>
</div>
<div class="col-xl-3">
<div class="form-group">	
<label>Security Question <span class="text-danger">*</span></label><br>
<img src="/img/forms/security-question.jpg" style="width:120px; height:auto" />
<input class="form-control form-control-lg" type="text" value="" id="question" name="question" placeholder="Answer" />
</div>
</div>
</div>
<!--end::Items-->								<!--begin::Action-->
<div class="pt-10 pb-5 text-center">

     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementById("userForm").submit();
       }
     </script>
     
<input type="hidden" value="customerreviews" id="customerreviews" name="customerreviews" />
<input type="submit" class="g-recaptcha btn btn-lg btn-warning text-uppercase font-weight-bolder px-7 py-5" value="Submit Review" name="post" id="post" data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>


</div>
<!--end::Action-->

</form>

											</div>
											<!--end::Body-->
										</div>
										<!--end::Tiles Widget 15-->
									</div>
                                    </div>
<!--end::Write A Review-->
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
<?php ob_flush() ?>