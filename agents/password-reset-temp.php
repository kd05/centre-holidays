<? ob_start(); 
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->
<head>
<meta charset="utf-8"/>
<title>Agent Portal | Centre Holidays</title>
<meta name="description" content="">
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts-index.php');?>

</head>
<!--end::Head-->
<!--begin::Body-->
<body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
   
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
<!--begin::Login-->
<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('/img/generic-page-bg.jpg');">
<div class="login-form text-center p-7 position-relative overflow-hidden">
<!--begin::Login Header-->
<div class="d-flex flex-center mb-15">
<a href="#" title="Centre Holidays">
<img src="/img/centre-holidays-logo-footer.png" alt="Centre Holidays" />
</a>
</div>
<!--end::Login Header-->
			
<!--begin::Sign In Form-->
<div class="login-signin">



<div class="mb-20">
<?php
if ($_GET['res']==1) {
?>
<div class="alert alert-success" role="alert">
<h3>Success Password was set <br />click here to <a href="index.php"><button class="g-recaptcha btn btn-warning font-weight-bolder text-uppercase px-9 py-4 my-3 mx-4">login in</button></a></h3>
</div>
<hr />
<?php	
}
?>
<h3 class="font-weight-bolder text-dark">Agent Password Reset</h3>
<div class="font-weight-bold text-dark">Please enter your email and your new password.</div>
</div>


<form class="form" enctype="multipart/form-data" action="reset-password-process.php" method="post">

<div class="form-group mb-5">
<input class="form-control h-auto form-control-solid py-4 px-8" type="email" placeholder="Centre Holidays Email" id="BusinessEmail" name="BusinessEmail" autocomplete="off" />
</div>
<div class="form-group mb-5">
<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Password" id="LogPassword" name="LogPassword" />
</div>
<input class="btn btn-warning font-weight-bolder text-uppercase px-9 py-4 my-3 mx-4" value="Reset Password" type="submit" />

</form>

</div>
</div>
</div>
<!--end::Login-->
</div>
<!--end::Main-->

<!--begin::Global Theme Bundle(used by all pages)-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-scripts.php');?>
<!--end::Global Theme Bundle-->
</body>
<!--end::Body-->
</html>
<? ob_flush(); ?>