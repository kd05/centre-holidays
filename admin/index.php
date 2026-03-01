<? ob_start(); 

session_start();

if (isset($_COOKIE['admin']))
header('Location: home.php');


//========= kill al sessions =========================
setcookie (session_id(), "", time() - 90000000000000000);
session_destroy();
session_write_close();

//============= unset cookies all ====================
if (isset($_SERVER['HTTP_COOKIE'])) {
    $ccookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($ccookies as $ccookie) {
        $cparts = explode('=', $ccookie);
        $cname = trim($parts[0]);
        setcookie($cname, '', time()-90000000000000000);
        setcookie($cname, '', time()-90000000000000000, '/');
    }
}

//===============re-inforce==========================
setcookie("admin", "", time() - 90000000000000000);
$_COOKIE['admin']='';


setcookie("admin_id", "", time() - 90000000000000000);
$_COOKIE['admin_id']='';

//===================================================
//include 'geoplugin.class/index.php'; 

//===============collect information like IP and timestamp====================

if (empty($_GET['att']))
$logatt='';
elseif (!empty($_GET['att']))
$logatt=$_GET['att'];

$IP = $_SERVER['REMOTE_ADDR'];



//====================Using Geo Check if this agent on leave or in CA or US================

include ($_SERVER['DOCUMENT_ROOT'].'/library/geo/index.php');

?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

<title>Sign In | CH Admin</title>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/index-head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic8-head-scripts.php');?>

<?php
$IP = $_SERVER['REMOTE_ADDR'];
$today = time(); 
?>

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
<style>body { background-image: url('/img/admin/index-bg.jpg'); }</style>
<!--end::Page bg image-->
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
<!--begin::Aside-->
<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
<!--begin::Aside-->
<div class="d-flex flex-center flex-lg-start flex-column">
<!--begin::Logo-->
<a href="/admin/index.php" class="mb-7" title="Centre Holidays Admin Portal">
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
							<div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                            
                                                      
                            
<?php

if (isset($_SERVER['REMOTE_ADDR']))// check if the IP is not hidden===================== 1
{



//=================================insert visitor ip and date information=============== 2
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

$today = time(); 

$sql="INSERT INTO admin_log (adminlogid, adminlogip, adminlogdate, logatt) VALUES ('', '$IP', '$today', '$logatt')";

if (!mysqli_query($conn,$sql))
die('Error: ' . mysqli_error($conn));

// check how many attempts to login ====================================================  WHERE adminlogip='$IP' and logatt=1 

$sql2 = "SELECT * FROM admin_log";
$result2 = mysqli_query($conn, $sql2);
$attempts=mysqli_num_rows($result2);
mysqli_close($conn);

//if ($attempts <= 20 && ($country_name=='Canada' || $country_name=='Mauritius'))
{	
	
?>



		<!--begin::Form-->
        <form class="form w-100" method="post" novalidate action="authenticate.php" enctype="multipart/form-data">
        <!--begin::Heading-->
        <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Admin Sign In</h1>
                           
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-700 fw-semibold fs-6">Sign in to Centre Holidays' Admin Portal.</div>                           
        <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
 		<input type="hidden" id="login" name="login" value="login">
        <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <!--end::Input group=-->
        <div class="fv-row mb-8">
        <!--begin::Password-->
        <input type="text" placeholder="Centre Holidays Email" id="email" name="email" class="form-control bg-transparent" />
        <!--end::Password-->
        </div>
        <div class="fv-row mb-3">
        <!--begin::Password-->
        <input type="password" placeholder="Password" id="mypassword" name="mypassword" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Password-->
        </div>
        <!--end::Input group=-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10 mt-8">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
        function onSubmit(token) {
        document.getElementById("kt_sign_in_form").submit();
        }
        </script>
        <button type="submit" id="kt_sign_in_submit-" class="btn btn-warning" data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>
        <span class="indicator-label fw-bold">Sign In</span>
        
        </button>
        <p class="fs-7 text-gray-700 text-center mt-5">IP <?php echo $_SERVER['REMOTE_ADDR'] ?></p>
        </div>
        
        </form>


<?php
	}
}
?>


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
                        <sub><?php echo $IP ?></sub>-->
                        
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
		<script src="/library/metronic/v817/assets/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->


<?php if ($_GET['code']=='0' && $_GET['captcha']=='okay') { ?> 
<script>
    Swal.fire({
        text: "Verification code is not correct, please try again.",
        icon: "error",
		confirmButtonText: "Close",
		        customClass: {
            confirmButton: "btn btn-danger fw-bold"
        }
});
</script> 
<?php } ?>


<?php if ($_GET['att']=='1' && $_GET['captcha']=='okay') { ?> 
<script>
    Swal.fire({
        text: "Wrong login information, please try again.",
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