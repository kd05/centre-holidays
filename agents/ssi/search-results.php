<style>
.load-more-items-suppliers { display:none; }
.load-more-items-faq {display:none; }
</style>
<!--begin::Search Results-->
<div>
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<?php

if ($suppliersnum > 0) {
$active1='active';	
$show1='show';
?>
<li class="nav-item">
<a class="nav-link <?php echo $active1 ?> font-weight-bolder text-uppercase font-size-lg text-dark" data-toggle="tab" href="#suppliers-tab">Suppliers (<?php echo $suppliersnum ?>)</a>
</li>
<?php
}
?>
<?php
if ($faqsnum > 0) {

if ($suppliersnum ==0)
{	
$active2='active';
$show2='show';
}
?>
<li class="nav-item">
<a class="nav-link <?php echo $active2 ?>  font-weight-bolder font-size-lg text-dark" data-toggle="tab" href="#faq-tab">FAQ (<?php echo $faqsnum ?>)</a>
</li>
<?php
}
?>
</ul>
<div class="tab-content mt-10">
<?php
if ($suppliersnum > 0) {
?>
<div class="tab-pane fade <?php echo $active1 ?> <?php echo $show1 ?>" id="suppliers-tab" role="tabpanel" aria-labelledby="suppliers-tab">
<div class="row mb-20">
<?php

//=================================RESULTS FOR SUPPLIERS=============================

$sql = "SELECT * FROM affiliates WHERE affiliateactive=1 "; // WHERE afid='".$afid."'

if (!empty($searchaffilter))	
$sql .= " AND (affiliatename = '$searchaffilter' || affilter LIKE '%$searchaffilter%' || affiliattags LIKE '%$searchaffilter%')";

$sql .= " ORDER BY ";

$sql .= " preferred DESC, "; // WHERE afid='".$afid."'

$sql .= " affiliatetime DESC"; 

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
		
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
 	$numbers=$numbers+1;
?>
<!--begin::Item-->
<div class="col-xl-4 col-md-6 mb-10 load-more-items-suppliers">
    <!--begin::Tiles Widget 15-->
    <div class="card card-custom card-border card-stretch">
<!--begin::Body-->
<div class="card-body p-0 d-flex flex-column">
<img class="img-responsive card-rounded-top" src="/img/agents/supplier-details/<?php echo $row['afhimage']; ?>" alt="<?php echo $row['affiliatename']; ?>">
<div class="row">
<!--begin::Label-->
<div class="col-xl-12 d-flex flex-center mt-n6"><span class="label label-xl font-weight-boldest label-inline label-white px-5 py-3 text-uppercase font-weight-bolder text-danger"><?php if ($row['preferred']=='1')  { ?>Preferred <?php } ?>Supplier</span>
</div>
<!--end::Label-->
</div>												
<div class="flex-grow-1 card-spacer mt-n5">
<div>
<!--begin::Title-->
<h2 class="font-weight-boldest text-uppercase text-dark"><?php echo $row['affiliatename']; ?></h2>
<p class="lead"><?php echo $row['affiliatedescreption']; ?></p>
<!--end::Title-->
</div>
</div>								
<!--begin::Action-->
<div class="d-flex flex-center card-spacer mt-n5">

<?php
if (!empty($_GET['searchaffilter']))
$link=trim(str_replace( array('/agents/search-results.php?'), '&',  $_SERVER['REQUEST_URI']));
?>
<a href="https://centreholidays.com/agents/supplier-details.php?afid=<?php echo $row['afid'].$link; ?>" title="Supplier's Details" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100" onclick="ChangeUrl('', '?tid=<?php echo $row['tid'] ?>&trp=<?php echo $row['trp'] ?>');">See Supplier's Details</a>


</div>
<!--end::Action-->
</div>
<!--end::Body-->
</div>
<!--end::Tiles Widget 15-->
			</div>
<!--end::Item-->
<?php
	}
}
if ($numbers > 6)
{
?>
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-suppliers" title="See More Suppliers"><span><i class="fas fa-angle-double-down"></i></span>See More Suppliers</button>
</div>
<?php
}
?>                                  
</div>
  </div>
  <?php
}
?>
<?php
if ($faqsnum > 0) {
?>
<div class="tab-pane fade <?php echo $active2 ?> <?php echo $show2 ?>" id="faq-tab" role="tabpanel" aria-labelledby="faqs-tab">
<div class="row mb-20">
<?php
//=================================RESULTS FOR FAQ=============================
$searchaffilter=trim(str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&', '@', '|', '/'), ' ',  $_GET['searchaffilter']));
$pieces = explode(" ", $searchaffilter);

$sql = "SELECT * FROM faq WHERE faqActive=1";	
if (!empty($searchaffilter))	
$sql .= " AND (faqTags LIKE '%$searchaffilter%' || faqTitle LIKE '%$searchaffilter%' || faqContent LIKE '%$searchaffilter%' || faqFilter LIKE '%$searchaffilter%' || affiliatename LIKE '%$searchaffilter%')";
$sql .= " ORDER BY faqTime DESC";
$result = mysqli_query($conn, $sql);
$offerscount=mysqli_num_rows($result);


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
<!--begin::Item-->
<div class="<?php echo $pdiv ?> load-more-items-faq mb-10">
<!--begin::FAQ-->
<div class="card card-border card-custom mb-8 mb-lg-0 card-stretch bg-dark" style="background:url(/img/agents/module-bg-dark.jpg) no-repeat center center /cover;">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top">	
<div class="ribbon-target bg-success font-weight-bolder" style="top: -2px; left: 20px;"><?php echo date('m/d/Y', $row['faqTime']); ?></div>
</div>
<!--end::Ribbon-->
<!--begin::Ribbon-->
<div class="ribbon ribbon-clip ribbon-right">	
<div class="ribbon-target" style="top: 15px; height: 45px;">
<span class="ribbon-inner bg-success"></span>
<i class="fa fa-question text-white"></i>
</div>
</div>
<!--end::Ribbon-->
<div class="card-body d-flex flex-column">
<div class="flex-grow-1 text-white font-weight-bold lead mt-4">			
<p><?php echo $row['faqTitle']; ?></p>
</div>
<div class="mt-10 d-flex">
<?php
if (!empty($_GET['searchaffilter']))
$link=trim(str_replace( array('/agents/search-results.php?'), '&',  $_SERVER['REQUEST_URI']));
?>
<a href="https://centreholidays.com/agents/faq-answer.php?faqID=<?php echo $row['faqID'].$link; ?>" title="See Answer" class="btn btn-warning px-5 py-3 text-uppercase font-weight-bolder">
See Answer</a>
</div>
</div>
</div>
<!--end::FAQ-->
</div>
<?php } if ($counter44 > 6) { ?> 
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-faq" title="See More"><span><i class="fas fa-angle-double-down"></i></span>See More FAQ</button>
</div>
<?php } ?>
</div>
  </div>
  <?php
}
?>
</div>
</div>
<!--end::Search Results-->
<?php mysqli_close($conn); ?>