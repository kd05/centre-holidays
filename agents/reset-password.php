<? ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

<title>Reset Password | CHAP</title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/index-head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic8-head-scripts.php');?>

<style>
.grecaptcha-badge { visibility: hidden; }
</style>		

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
<!--begin::Page bg image-->
<style>body { background-image: url('/img/agents/index-bg.jpg'); }</style>
<!--end::Page bg image-->
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
<!--begin::Aside-->
<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
<!--begin::Aside-->
<div class="d-flex flex-center flex-lg-start flex-column">
<!--begin::Logo-->
<a href="/agents/index.php" class="mb-7" title="Centre Holidays Agent Portal">
<img alt="Centre Holidays" class="w-275px w-xl-400px" src="/img/centre-holidays-logo-lg.png" />
</a>
<!--end::Logo-->
</div>
<!--begin::Aside-->
</div>
<!--begin::Aside-->
<!--begin::Body-->
<div class="d-flex flex-center w-lg-50 p-10">
<!--begin::Card-->
<div class="card rounded-3 w-md-550px">
<!--begin::Card body-->
<div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
<!--begin::Wrapper-->
<div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20"><!--begin::Form-->

<form class="form w-100" action="email/insert-reset-password.php" method="post" enctype="multipart/form-data">
<!--begin::Heading-->
<div class="text-center mb-10">
<!--begin::Title-->
<h1 class="text-dark fw-bolder mb-3">Reset CHAP Password</h1>
<!--end::Title-->
<!--begin::Link-->
<div class="text-gray-700 fw-semibold fs-6">Enter your Centre Holidays email and then check your inbox or spam folder for the password reset link.</div>
<!--end::Link-->
</div>
<!--begin::Heading-->
<!--begin::Input group=-->
<div class="fv-row mb-8">
<!--begin::Email-->
<input type="email" required placeholder="Centre Holidays Email" id="RBusinessEmail" name="RBusinessEmail" autocomplete="off" class="form-control bg-transparent" />
<!--end::Email-->
</div>
<!--begin::Actions-->
<div class="d-flex flex-wrap justify-content-center pb-lg-0">
<button type="submit" id="kt_login_forgot_submit" class="btn btn-warning me-5 fw-bold">Submit</button>
<button type="reset" id="kt_login_forgot_cancel" class="btn btn-warning fw-bold">Cancel</button>

</div>
<!--end::Actions-->
</form>
<!--end::Form-->
</div>
<!--end::Wrapper-->
<!--begin::Footer-->
<div class=" text-center">

<div class="text-gray-700 fw-semibold fs-6">© 2003 - <?php echo date("Y");?> Centre Holidays Inc.<br>
TICO 50018114</div>


</div>
<!--end::Footer-->



</div>
<!--end::Card body
<sub></sub> -->

</div>
<!--end::Card-->

</div>
<!--end::Body-->
</div>
<!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic8-footer-scripts.php');?>		
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="/library/metronic/v817/assets/js/custom/authentication/reset-password/reset-password.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->


<?php 
$reset=$_GET['reset'];


//================================================================
if ($reset==1) {
?>     
 <script>
    Swal.fire({
        text: "Please check your inbox or spam folder for instructions on resetting your password.",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Go To Gmail",
        customClass: {
            confirmButton: "btn fw-bold btn-success"
        }
    }).then(function() {
    window.location = "https://www.gmail.com/";
});

</script>       
<?php } ?>  


<?php 
//================================================================
if ($reset==2) {
?>     
 <script>
    Swal.fire({
        text: "Incorrect email address. Please enter your Centre Holidays email address.",
        icon: "error",
		confirmButtonText: "Close",
		        customClass: {
            confirmButton: "btn btn-danger fw-bold"
        }
});

</script>       
<?php } ?>  



</body>
	<!--end::Body-->
</html>