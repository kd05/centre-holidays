<?php ob_start(); ?>
<?php
$AgentID=$_GET['AgentID'];
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/ch-agent-db-details.php');
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
			
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
table th {text-align:left !important; padding-left:20px; max-width:100px}
textarea {white-space:pre-wrap !important}
</style>
</head>

<body class="fix-header">

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/top-navigation.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/side-panel.php');?>
  <!-- Page Content -->
  <div id="page-wrapper" style="overflow-y:scroll; max-height: 100vh;">
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

<h3>Add a New Centre Holidays Agent</h3>
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
<hr />

<section>
                  <div class="sttabs tabs-style-bar">
                    <nav>
                      <ul>
                        <li><a href="#section-bar-1" class="sticon ti-user"><span>New Agent </span></a></li>
                      </ul>
                    </nav>
                    <div class="content-wrap">
                      <section id="section-bar-1">
					  
					  
<?php

//=================add a new record=============================================
//Generate a new unique id =====================================================
$string=md5(time().rand(1000000,999999));
$AgentUniqID=substr($string, 0, 8); 		

$PasswordHashed=md5($AgentUniqID.'Q1!W2@e3r4t5');// generate a password


//=================to agents information table 

$sql1 = "INSERT INTO ch_agents_1 (AgentID, AgentUniqID, Password, PasswordHashed, active) VALUES ('', '$AgentUniqID', '$AgentUniqID', '$PasswordHashed', '0')";

if (mysqli_query($conn, $sql1)) {
echo "";
} else {
echo "";
}

//====================to business tab table

$sql2 = "INSERT INTO ch_agents_2 (AgentID, AgentUniqID) VALUES ('', '$AgentUniqID')";

if (mysqli_query($conn, $sql2)) {
	header('Location: ch-agents.php?results=success');
?>
<h4>Success, a new Agent recored opened, to complete the details</h4>
<a href="ch-agents.php" class="btn btn-lg btn-primary" title="Edit Details">Click Here</a>
<?php
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: ch-agents.php?results=error');
}

?>
                      
                      
                      
                      
                      </section>
                    </div><!-- /content -->
                  </div><!-- /tabs -->
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

</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>