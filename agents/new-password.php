<? ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

<title>Create A New Password | CHAP</title>

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

<?php
if (isset($_SERVER['REMOTE_ADDR']))// check if the IP is not hidden====== Jx7qw7bd! c692e853e85cd73bc4b5671f935bee1a =============== 1
{

$resetok=$_GET['resetok'];

?>


<form class="form w-100" name="loginform" data-kt-redirect-url="#" enctype="multipart/form-data" action="email/insert-new-password.php" method="post">

<input type="hidden" id="login" name="login" value="login">
<!--begin::Heading-->
<div class="text-center mb-10">
<!--begin::Title-->
<h1 class="text-dark fw-bolder mb-3">New CHAP Password</h1>
<!--end::Title-->
<!--begin::Link-->
<div class="text-gray-700 fw-semibold fs-6">Create a new password.</div>
<!--end::Link-->
</div>
<!--begin::Heading-->
<!--begin::Input group=-->
<div class="fv-row mb-8">
<!--begin::Email-->
		
		<script>
        function myFunction() {
          var x = document.getElementById("LogPassword1");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>   


<input type="password" required placeholder="New Password" id="LogPassword1" name="LogPassword1" autocomplete="off" class="form-control bg-transparent" />
        
<br />
<!--<input type="password" required placeholder="Confirm New Password" id="LogPassword2" name="LogPassword2" autocomplete="off" class="form-control bg-transparent" />
<br />-->
<input type="checkbox" onclick="myFunction()">&nbsp;Show Password

<!--end::Email-->
</div>
<!--begin::Actions-->
<div class="d-flex flex-wrap justify-content-center pb-lg-0">
<input type="hidden" value="<?php echo $_GET['iq'] ?>" name="iq" id="iq" />
<input type="hidden" value="<?php echo $_GET['ti'] ?>" name="ti" id="ti" />	

<button type="submit" id="kt_login_forgot_submit" onclick="return Validate()" class="btn btn-warning me-5 fw-bold">Submit</button>
<button class="btn btn-warning fw-bold" type="reset">Cancel</button>


<script type="text/javascript">
function Validate() {
var password = document.getElementById("LogPassword1").value;
var confirmPassword = document.getElementById("LogPassword2").value;
if (password != confirmPassword) {
alert("Passwords do not match.");
return false;
}
return true;
}
</script>

</div>
<!--end::Actions-->
</form>
<!--end::Form-->

<?php

}

?>

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
//================================================================
 
if ($resetok==1) {
?>     
 <script>
    Swal.fire({
        text: "Your new password has been successfully created. Please sign in to CHAP using your new password.",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Go",
        customClass: {
            confirmButton: "btn btn-success fw-bold"
        }
    }).then(function() {
    window.location = "index.php";
});

</script>       
<?php } ?>  
 
        
	</body>
	<!--end::Body-->
</html>