<? ob_start(); 

$IP = $_SERVER['REMOTE_ADDR'];

if (!isset($_COOKIE['admin']))
header('Location: index.php');


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



		<!--begin::Form-->
        <form class="form w-100" method="post" novalidate action="admin-password-reset.php" enctype="multipart/form-data">
        <!--begin::Heading-->
        <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Reset Admin Password</h1>
                           
        <!--end::Title-->

        </div>

        <!--end::Input group=-->
        <div class="fv-row mb-8">
        <!--begin::Password-->
  
<select required placeholder="Centre Holidays Email" id="adminsid" name="adminsid" class="form-control bg-transparent">        
<option value="">Select Admin</option>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
													
$sql = "SELECT * FROM admins ORDER BY adminsid";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) { 

?>
<option value="<?php echo $row['adminsid'] ?>"><?php echo $row['adminsid'] ?> - <?php echo $row['adminsemail'] ?></option>
<?php

 }
?>        
</select>        
        
        <!--end::Password-->
        </div>
        
        <div class="fv-row mb-3">
        
		<script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>        
        
        <!--begin::Password-->
        <input type="password" required placeholder="Password" id="myInput" name="mypassword" autocomplete="off" class="form-control bg-transparent" />
        <br />
        <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
        <!--end::Password-->
        </div>
        <!--end::Input group=-->
      

        <!--begin::Submit button-->
        <div class="d-grid mb-10 mt-8">

        <button type="submit" id="kt_sign_in_submit-" class="btn btn-warning" data-callback='onSubmit'>
        <span class="indicator-label fw-bold">Submit</span>
        
        </button>
        </div>
        
        </form>


							<!--end::Form-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Footer-->
							<div class=" text-center">
								
                            &nbsp;
                                                       
							</div>
							<!--end::Footer-->
                            
                           
                            
						</div>
						<!--end::Card body 
                        
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


<?php if ($_GET['code']=='0') { ?> 
<script>
    Swal.fire({
        text: "This email does not exist, try again using the correct admin email.",
        icon: "error",
		confirmButtonText: "Close",
		        customClass: {
            confirmButton: "btn btn-danger fw-bold"
        }
});
</script> 
<?php } ?>


<?php if ($_GET['code']=='1') { ?> 
<script>
    Swal.fire({
        text: "Success, password was reset.",
        icon: "success",
		confirmButtonText: "Close",
		        customClass: {
            confirmButton: "btn btn-success fw-bold"
        }
});
</script> 
<?php } ?>      
        
</body>
	<!--end::Body-->
</html>