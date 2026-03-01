<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Vault - Agent Portal | Centre Holidays</title>
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
  <div class="img"><img class="d-block w-100" src="/img/agents/vault-c01.jpg" alt="Vault"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide">Access Your Files Online</button></a> 
  </div>
</div>
  </div>
</div>
  <!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row pl-10 pr-10">
        <div class="col-xl-1"></div>
			<div class="text-center pt-11 col-xl-10">
									<h1 class="font-weight-bolder text-dark display-3">Vault</h1>
									<h2 class="text-dark-65">Access your login credentials, commission statements and T4A statements easily in Google Drive.</h2>				
            </div>
                                    <div class="col-xl-1"></div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<div class="separator separator-solid separator-border-1 mt-30"></div>

<!--begin::Section-->
<div class="container mt-n20">
<div class="row mb-20">
<div class="col-xl-12">
<!--begin::Vault Accordion-->
<div class="accordion accordion-solid accordion-panel accordion-toggle-plus text-dark pb-10" id="vault">				<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="vault-heading1">
<div class="card-title font-size-h2 font-weight-bolder text-warning" data-toggle="collapse" data-target="#vault1" aria-expanded="true" aria-controls="vault1" role="button">
<div class="card-label">About Your Vault And How To Access It</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="vault1" class="collapse show" aria-labelledby="vault-heading1" data-parent="#vault">
<div class="card-body lead pb-0 pt-3">
<p>Your Vault is a specific folder we have created just for you in Google Drive. Within your Vault, you will see three folders:</p>
<ul>
<li>Commission Statements</li>
<li>Income Tax</li>
<li>Logins</li>
</ul>
<h3 class="mt-10 font-weight-bolder">Commission Statements</h3>
<p>As your commission comes in based on the bookings you complete (including invoicing), a payout will be made to you on the 15th. If a payout was made to you, then we will leave a commission statement (PDF) for you to access in your Commission Statements folder.</p>
<h3 class="mt-10 font-weight-bolder">Income Tax</h3>
<p>Around the 15th of February each year, we will place your T4A statement (PDF) in your Income Tax folder.</p>
<h3 class="mt-10 font-weight-bolder">Logins</h3>
<p>One of the first things we do as part of your setup process is register you with some of the top suppliers we deal with. During this process, we create a Logins Google Sheet (Excel file) that contains all your login credentials and it is saved in your Logins folder. This makes it easy for you to manage your login credentials and us at head office to do so as well in case you run into any issues. As you sign up with more suppliers, please ensure to add those login credentials to your Logins Google Sheet.</p>
<div class="pt-10 pb-5 mb-5 d-flex flex-center">
<a href="<?php echo $MyAccount ?>" title="Access Vault" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Access Vault</a>
</div>
<div class="alert alert-custom alert-danger mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
If you experience an issue accessing your Vault in Google Drive, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
</div>
<div class="alert alert-custom alert-primary mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-info"></i>							</div>
<div class="alert-text lead">
Bypass this page and access your Vault directly by clicking on the <b>G</b> icon (Google) at the top of the agent portal and then on <b>Vault</b>.</div>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
			</div>
<!--end::Vault Accordion-->
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