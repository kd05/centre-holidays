<?php 
ob_start();

// Start the session
session_start();
 
//=========================================================================

$AgentID=$_GET['AgentID'];
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/ch-agent-db-details.php');

?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>
<style>
table {width:97% !important}
table th {text-align:center !important; padding-left:0px; max-width:100px}
textarea {white-space:pre-wrap !important}
</style>
<script src="../sweetalert/sweetalert-dev.js"></script>
</head>

<body class="fix-header">

<?php
if (!isset($_SESSION["adminvisit"]))// check if session is set, if set do not allow this function once again
{
?>

<!-------------Sweet Alert--------------------->

<div class="info"></div>
<script>
swal("Agent Details", "The Agent's personal info is on Tab 1 (Internal). If you require their business info (Phone, email, etc), to provide to suppliers or clients, please refer to the 2nd tab (Website).", "info");
</script>

<?php
// Set session variables
$_SESSION["adminvisit"] = 'adminvisit';
}
?>

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/top-navigation.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/side-panel.php');?>
  <!-- Page Content -->
  <div id="page-wrapper" style="overflow-y:scroll; overflow-x:hidden; max-height: 100vh;">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
                    

<?php
//---------------display results in case of unpdate--------------
if (isset($_GET['results']))
{
	if ($_GET['results']=='success')
	{
	?>
    <div class="alert alert-success">
  	<strong>Success!</strong>
	</div>
	<?
	}
	elseif ($_GET['results']=='error')
	{
	?>
    <div class="alert alert-danger">
  	<strong>Warning, Error!</strong>
	</div>
	<?php	
	}
}
?>

<h3>Edit a Centre Holidays Agent Details (<?php echo $WebName; ?>)</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<hr />
<!--Below javascrip to hide the update button when you select the partners tab-->
<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
<!--Below javascrip to disply the update button when you select other than the partners tab-->
<script>
function myFunction1() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'block') {
        x.style.display = 'block';
    } else {
        x.style.display = 'block';
    }
}
</script>
<section style="overflow-x:hidden">
<form action="ch-agents/update-internal.php" method="post" enctype="multipart/form-data">

<div class="sttabs tabs-style-bar">
<nav>
<ul>
<li><a href="#section-bar-1" class="sticon ti-lock" onclick="myFunction1()"><span>Internal</span></a></li>
<li><a href="#section-bar-2" class="sticon ti-link" onclick="myFunction1()"><span>Business</span></a></li>
<li><a href="#section-bar-3" class="sticon ti-user" onclick="myFunction1()"><span>Account</span></a></li>
<li><a href="#section-bar-4" class="sticon ti-file" onclick="myFunction1()"><span>Notes</span></a></li>

<!-- ##########  GP EDIT. REPORTS IS HIDDEN    ##########-->
<!--<li><a href="#section-bar-5" class="sticon ti-settings" onclick="myFunction1()"><span>Reports</span></a></li>-->

<li><a href="#section-bar-6" class="sticon ti-settings" onclick="myFunction1()"><span>Partners</span></a></li>
</ul>
</nav>
<div class="content-wrap">
<section id="section-bar-1"><?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-internal.php'); ?></section>
<section id="section-bar-2"><?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-website.php'); ?></section>
<section id="section-bar-3"><?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-accounts.php'); ?></section>
<section id="section-bar-4"><?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-notes.php'); ?></section>

    <!-- ##########  GP EDIT. REPORTS IS HIDDEN    ##########-->
<!--<section id="section-bar-5">--><?php //include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-reports.php'); ?><!--</section>-->

<section id="section-bar-6"><?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/agent-partners.php'); ?></section>
</div><!-- /content -->
</div><!-- /tabs -->
                

<div class="col-sm-12">
<?php if ($userprev=='edit' || $userprev=='partedit') { ?>
<input type="submit" value="UPDATE" class="btn btn-primary" style="width:100%"  id="myDIV" />
<?php } ?>
</div>


</form>
</section>


</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/right-panel.php');?>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>
</body>
</html>


<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>