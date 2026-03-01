<?php ob_start();
session_start();
$actual_link=$_GET['actual_link'];
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

<title>2-Step Verification | CHAP</title>
<?php $ran='ionhrinhc0q40v'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/index-head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic8-head-scripts.php');?>

<style>
.grecaptcha-badge { visibility: hidden; }

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

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

<form class="form w-100" action="verify.php" method="post" enctype="multipart/form-data">
<!--begin::Heading-->
<div class="text-center mb-10">
<!--begin::Title-->
<h1 class="text-dark fw-bolder mb-3">CHAP Verification</h1>
<!--end::Title-->
<!--begin::Link-->
<div class="text-gray-700 fw-semibold fs-6">Check your inbox or spam folder for the verification code.</div>
<!--end::Link-->
</div>
<!--begin::Heading-->
<!--begin::Input group=-->
<div class="fv-row mb-8">
<!--begin::Email-->
<input type="number" required placeholder="Verification Code" name="code" autocomplete="off" class="form-control bg-transparent fs-2 fw-bolder" style="text-align:center;" />
<!--end::Email-->
</div>
<!--begin::Actions-->
<div class="d-flex flex-wrap justify-content-center pb-lg-0">
<input type="hidden" value="<?php echo $_GET['actual_link']; ?>" name="actual_link" />
<button type="submit" class="btn btn-warning fw-bold">Verify</button>

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
        text: "Your verification code is incorrect. Please check your email for the vertification code. For further assistance, please email support@centreholidays.com.",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Go To Gmail",
        customClass: {
            confirmButton: "btn fw-bold btn-danger"
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
        text: "Wrong email address, please try again.",
        icon: "error",
		        customClass: {
            confirmButton: "btn btn-danger"
        }
});

</script>       
<?php } ?>  



</body>
	<!--end::Body-->
</html>