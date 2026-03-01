<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Media Library - Agent Portal | Centre Holidays</title>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
                <!--begin::Carousel-->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  <div class="img"><img class="d-block w-100" src="/img/agents/media-library-c01.jpg" alt="Media Library"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide">Audio, Photos & Videos</button></a> 
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
			<div class="text-center pt-11 col-xl-10">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Media Library</h1>
									<h2 class="text-dark-65 font-weight-bolder">Access and download 1000's of premium high resolution stock media which can be used for personal, commercial or editorial projects.</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<div class="row mb-15">
<!--begin::Item-->
	<div class="col-xl-6 col-md-6 mb-10">
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
<p>We purchase various audio files, high resolution photos and videos for various projects on a frequent basis. This media is available for you to download and use for <b>FREE</b>.
<br>
<br>
On this page, you can access our media library as well as a few stock media websites where you can download more photos and videos. All of our media is sorted into folders in Google Drive so all you have to do is navigate yourself accordingly and download the appropriate files to your computer.
<br>
<br>
When it comes to using audio, photos and videos, it is best to either refer to our media library or the listed stock media websites rather than trying to get them from Google Images as they can be copyrighted and you could run into legal issues with the copyright holder.</p>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you experience an issue accessing the media library in Google Drive, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Item-->
	<div class="col-xl-6 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Stock Media Websites" data-toggle="modal" data-target="#stock-media-websites-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Stock Media Websites</h2>
<h6>More Photos And Videos</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="stock-media-websites-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Stock Media Websites</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>If you cannot find what you are looking for from our media library, you can refer to any of the following websites as an alternative. With some of these websites, you can download the media for free while others, you will need to contact us to download the media on your behalf as we already have an account with them.</p>
<div class="table-responsive">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-uppercase text-center align-middle">
<tr>
  <th class="lead" style="min-width: 200px" scope="col"> Website</th>
  <th class="lead" scope="col" style="min-width: 250px">Details</th>
  <th class="lead" style="min-width: 150px" scope="col">Access</th>
</tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">BigStock</td>
  <td class="align-middle">Place a request by emailing <b>support@centreholidays.com</b>.</td>
  <td class="text-center align-middle"><a href="https://www.bigstockphoto.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Envato Elements</td>
  <td class="align-middle">Place a request by emailing <b>support@centreholidays.com</b>. Some restrictions will apply as some media are not approved for commercial usage.</td>
  <td class="text-center align-middle"><a href="https://elements.envato.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Unsplash</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://unsplash.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
  </tr>
<tr>
  <td class="align-middle">Pexels</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://www.pexels.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
  </tr>
<tr>
  <td class="align-middle">Negative Space</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://negativespace.co/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Kaboompics</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://kaboompics.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Life Of Pix</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://www.lifeofpix.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Barnimages</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://barnimages.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
<tr>
  <td class="align-middle">Pixabay</td>
  <td class="align-middle">Download media for free.</td>
  <td class="text-center align-middle"><a href="https://pixabay.com/" title="Go" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Go</a></td>
</tr>
</tbody>
</table>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>
<!--begin::Media Library-->
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder text-uppercase font-size-lg text-dark" data-toggle="tab" href="#media-library-tab">Media Library</a>
</li>
</ul>
<div class="tab-content mt-10">
<div class="tab-pane fade active show" id="media-library-tab" role="tabpanel" aria-labelledby="media-library-tab">
<div class="row mb-20">
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h02-collections.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18xyMiGlz4MMH-90IJg3eEyvK6hiY7zSP?usp=sharing" title="Collections" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Collections</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h03-africa-middle-east.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/182u7W0heenpOO4F-8p6JJc-EBTj6TOgU?usp=sharing" title="Africa & Middle East" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Africa & Middle East</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h04-asia.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18_K6GJd70_iGTV20rBK8ybg0fqA9AN62?usp=sharing" title="Asia" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Asia</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h05-australia-pacific.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18bT-LvaR04t5dy74px3E91ebC-IzOnQv?usp=sharing" title="Australia & Pacific" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Australia & Pacific</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h06-central-america-caribbean.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18bfxFllLZ9HMUntu3j8sZCPJ5nyLycYF?usp=sharing" title="Central America & Caribbean" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">Central America & Caribbean</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h07-north-america.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18dwP9AMbsLaa2T4_C1iGtxbdmnN1xxjG?usp=sharing" title="North America" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">North America</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h08-south-america-antarctica.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18hUKrYMtXAJsSWrd_pby45e5Sad-Kfxh?usp=sharing" title="South America & Antarctica" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">South America & Antarctica</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
<!--begin::Item-->
	<div class="col-xl-3 col-md-6 mb-10">
    <!--begin::Destination-->
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/media-library-h09-uk-europe.jpg) no-repeat center center /cover; height:175px;">
<!--begin::Body-->
<a href="https://drive.google.com/drive/folders/18mMLgwX_87aPNP8E4wAU_DOrkdanCeQf?usp=sharing" title="UK & Europe" target="_blank" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center">									<h2 class="font-weight-boldest text-uppercase text-white mb-0">UK & Europe</h2>											
</div>
</a>
<!--end::Body-->
</div>
<!--end::Destination-->
</div>
<!--end::Item-->
</div>
  </div>
</div>
</div>
<!--end::Media Library-->
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