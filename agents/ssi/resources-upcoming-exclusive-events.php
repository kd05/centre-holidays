<style>
.load-more-items-inside-ch {display:none; }
</style>
<?

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$basename=strtolower(basename ($actual_link));

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
$sql = "SELECT * FROM resource WHERE inchActive=1 AND inchEXPTime > $currenttime AND (inchFilter LIKE '%$pagename%')";

$sql .= " ORDER BY inchTime DESC";

$result = mysqli_query($conn, $sql);
$offerscount=mysqli_num_rows($result);
			
?>
<div class="row mb-20">
<!--begin::Item-->
<?php

while($row = mysqli_fetch_assoc($result)) {

$counter44++;
	
//===================================================================================
//===================the COL-SIZE 3, 6 or 12=========================================
//===================================================================================
switch ($offerscount) {
  case "1":
    $pdiv='col-xl-12 col-md-12';
    break;
  case "2":
    $pdiv='col-xl-6 and col-md-6';
    break;
  default:
    $pdiv='col-xl-4 and col-md-6';
}	

?>

<div class="<?php echo $pdiv ?> load-more-items-inside-ch mb-10"><!--begin::Inside CH-->

<?php 

//====================set up background based on horizontal image=================

if (!empty($row['inchHorizontalImage']))
{
?>
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch ribbon ribbon-top" style="background:url(https://centreholidays.com/img/agents/resources/<?php echo $row['inchHorizontalImage'] ?>) no-repeat center center /cover; min-height:225px;">
<?php
}
elseif (empty($row['inchHorizontalImage']))
{
?>
<div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-warning.jpg) no-repeat center center /cover; min-height:225px;">
<?php
}


//====================set up target based on exernal url============================

if (!empty($_GET['inchFilter']))
$link=trim(str_replace( array('/agents/resources.php?'), '&',  $_SERVER['REQUEST_URI']));


if (!empty($row['inchExternalURL']))	
{
$target='_new';
$tarlink=$row['inchExternalURL'];
}

if (empty($row['inchExternalURL']))
{
$target='_parent';	
$tarlink='https://centreholidays.com/agents/resources-centre-holidays-details.php?inchID='.$row['inchID'].$link; 
}

?>

<!--begin::Ribbon-->
<div class="ribbon ribbon-top">	
<div class="ribbon-target bg-success font-weight-bolder" style="top: -2px; right: 20px;"><?php echo date('m/d/Y', $row['inchTime']); ?></div>
</div>
<!--end::Ribbon-->
<!--begin::Body-->

<a target="<?php echo $target ?>" class="text-white flex-grow-1" href="<?php echo $tarlink ?>" title="Go">	
												
<div class="card-body custom-overlay d-flex flex-column align-items-start justify-content-start">								
<div class="flex-grow-1 mt-3">									
<h2 class="font-weight-boldest mb-5 text-white text-uppercase"><?php echo $row['inchTitle']; ?></h2>
</div>
<span class="label label-outline-light label-inline label-xl font-weight-bolder text-white text-uppercase px-5 py-3" style="background-color: rgba(0, 0, 0, 0.4);">Go</span>													
</div>
</a>
<!--end::Body-->
</div>
<!--end::Inside CH-->
</div>

<?php } if ($counter44 > 9 && $basename !='home.php') { ?> 

<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-inside-ch" title="See More"><span><i class="fas fa-angle-double-down"></i></span>See More Resources</button>
</div>

<?php } if ($basename=='home.php') { ?>

<div class="col-xl-12 d-flex flex-center">
<a href="/agents/resources.php" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" title="Go"><span><i class="fas fa-angle-double-right"></i></span>More Resources</a>
</div>

<?php }  ?>

</div>
