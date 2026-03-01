<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>FAQ Answer - Agent Portal | Centre Holidays</title>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside-frequently-asked-questions.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
<!--begin::Content-->
<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
<!--begin::Carousel-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/img/agents/faq-answer-c01.jpg')">
							<div class="container">

								<div class="d-flex align-items-stretch text-center flex-column py-40">
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
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Answer To Your FAQ</h1>
									<h2 class="text-dark-65 font-weight-bolder">Review. Learn. Grow.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->
<?php
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
$sql = "SELECT * FROM faq WHERE faqActive=1 AND faqID='".$_GET['faqID']."' LIMIT 1";		
$result = mysqli_query($conn, $sql);
$offerscount=mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)) {
	$faqFilter=$row['faqFilter'];// filter
	$faqTitle=$row['faqTitle'];// title
	$faqContent=trim($row['faqContent']);// Content / answer
	$faqVideoUrl=trim($row['faqVideoUrl']); // VideoUrl
	$faqTags=$row['faqTags']; // Tags
	$faqTime=$row['faqTime'];//  time posted
}
?>
<!--begin::Section-->
<div class="container mt-10">
<div class="row justify-content-center mb-30">
<div class="col-xl-9">
<!--begin::Card-->
<div class="card card-custom">
<div class="card-header text-dark bg-light lead pb-0">
												<div class="card-title">
													<h2 class="font-weight-boldest mt-5" style="line-height:1.5;"><?php echo $faqTitle ?></h2>
												</div>
											</div>
<div class="card-body text-dark pb-5 lead">
<?php if (!empty($faqContent)) { ?>
<?php echo $faqContent ?>
<?php } ?>
<?php if (!empty($faqVideoUrl)) { ?>
<!--begin::Video-->  
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item rounded border" src="<?php echo $faqVideoUrl ?>" allowfullscreen></iframe>
</div>
<!--end::Video-->
<div class="alert alert-custom alert-danger mb-5 mt-10" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you experience an issue watching the video, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
</div>
<?php } ?>
</div>
<div class="card-footer pb-0 pt-5">
<p class="text-dark-65">Last Updated: <b><?php echo date('m/d/Y', $faqTime); ?></b></p>
												
											</div>
</div>
<!--end::Card-->
</div>
</div>
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