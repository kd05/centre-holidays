<?php ob_start(); 

$IP = $_SERVER['REMOTE_ADDR'];

?>

<!DOCTYPE html>  
<html lang="en">
<head>
<title>Admin Login - Epik Escapes</title>
<meta name="description" content="Login to Epik Escapes' Admin Panel">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
</head>
<body class="fix-header">
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<?php

if (isset($_SERVER['REMOTE_ADDR']))// check if the IP is not hidden===================== 1
{

?>

<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
        <a href="/admin/index.php" class="text-center db"><img src="/img/epik-escapes-logo-xl.png" alt="Epik Escapes" /><br/><img src="/img/epik-escapes-logo-text.png" alt="Epik Escapes" /></a> 

    <div class="white-box">
	<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/recover-send.php');?>
    
    <?php if ($wassent !='wassent') { ?>
    
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter the email you want to recover the passowrd for and a set of instructions with a reset link will be send to the main admin! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required placeholder="Email" name="adminsemail" id="adminsemail" />
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
          <div id="example1"></div>
          <br />
            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login" id="login">Reset</button>
          </div>
        </div>
      </form>
      
      <?php } ?>
      
    </div>



</div>
</section>

<?php
}
?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>

</body>
</html>
<? ob_flush(); ?>