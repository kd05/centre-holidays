<? ob_start(); 

session_start();
//===============================================================================
//==========================Redirect to home if already logged in===================================
//===============================================================================
if (!empty($_COOKIE['AgentUniqID']) && !empty($_COOKIE['VerifyID']))
header('Location: home.php');

$bemail=trim($_GET['bemail']);

$time=time();


//====================Using Geo Check if this agent on leave or in CA or US================

include ($_SERVER['DOCUMENT_ROOT'].'/library/geo/index.php');

?>

<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

<title>Sign In | CHAP</title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/index-head-scripts.php');?>
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
							<div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                            
                                                      
                            
                            <?php	
// check how many attempts to login ==================================================== 

$sql2 = "SELECT * FROM ch_agents_log WHERE agentlogip='$IP' and logatt=1";
$result2 = mysqli_query($conn, $sql2);
$attempts=mysqli_num_rows($result2);


//=======================================================================================
if ($attempts < 6)
{
?>

		<!--begin::Form-->
        <form class="form w-100" method="post" novalidate id="kt_sign_in_form" data-kt-redirect-url="#" action="index-authenticate.php">
        <!--begin::Heading-->
        <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Sign In To CHAP</h1>
                           
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-700 fw-semibold fs-6">Sign in to Centre Holidays' Agent Portal (CHAP).</div>                           
        <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
        <input type="hidden" value="<?php echo  $_SESSION["currentpage2"] ?>" name="currentpage2" id="currentpage2" />
        <input type="hidden" value="<?php echo $_GET['actual_link'] ?>" name="actual_link" />										<!--begin::Email-->
        <input type="email" placeholder="Centre Holidays Email" id="BusinessEmail" name="BusinessEmail" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
        <!--begin::Password-->
        <input type="password" placeholder="Password" id="LogPassword" name="LogPassword" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <!--begin::Link-->
        <a href="reset-password.php" class="link-warning">Reset Password</a>
        <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
        function onSubmit(token) {
        document.getElementById("kt_sign_in_form").submit();
        }
        </script>
        <button type="submit" id="kt_sign_in_submit-" class="btn btn-warning g-recaptcha" data-sitekey="6LddJc8ZAAAAAMd-S9vjpAm-Ycj1G7_jodCR-zmq" data-callback='onSubmit'>
        <!--begin::Indicator label-->
        <span class="indicator-label fw-bold">Sign In</span>
        </button>
        </div>
        <!--end::Submit button-->
        </form>
<?php
}
elseif ($attempts > 5)
{
$sql77="INSERT INTO blacklist (blid, blip, bltime, bemail) VALUES ('','$IP','$time', '$bemail')";	
if (!mysqli_query($conn,$sql77))
die('Error: ' . mysqli_error($conn));
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
        
                          


<?php if (!empty($_GET['errortype'])) { ?> 
<script>
    Swal.fire({
        text: "<?php echo $_GET['errortype']; ?>",
        icon: "error",
		confirmButtonText: "Close",
		        customClass: {
            confirmButton: "btn btn-danger fw-bold"
        }
});
</script>  
         
<?php } if($attempts > 5) { ?>  

<script>
    Swal.fire({
        text: "Your IP has been blocked due to multiple failed attempts. Please email support@centreholidays.com for assistance.",
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