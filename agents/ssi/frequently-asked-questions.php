<style>
.load-more-items-faq {display:none; }
</style>
<?php 
session_start();  #start a session 
$faqsearch=trim(str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&', '@', '|', '/'), ' ',  $_GET['faqsearch']));
$pieces = explode(" ", $faqsearch);

if (isset($_GET['faqFilter']))
{
$tfaqFilter=$_GET['faqFilter'];
for($ii=0; $ii <= 20; $ii++) {
	${'cooooooo' . $ii}=$tfaqFilter[$ii];
	$values6=${'cooooooo' . $ii}.$values6;
	$tfaqFilters=str_replace($values6,"",$tfaqFilters);	
	if (!empty($tfaqFilter[$ii]))
		{
	$counter6=$counter6+1;		
	$tfaqFilterpag='&faqFilter%5B%5D='.${'cooooooo' . $ii}.$tfaqFilterpag;//------------value for pagination url------------
	$tfaqFilters16=" OR affiliatename LIKE '%".${'cooooooo' . $ii}."%' OR faqFilter LIKE '".${'cooooooo' . $ii}."%'".$tfaqFilters16;//-------------------values for database-----------------
	$tfaqFilters26=" affiliatename LIKE '%".${'cooooooo' . $ii}."%' OR faqFilter LIKE '".${'cooooooo' . $ii}."%'";
		}
	}
if ($counter6 < 2)
$tfaqFilters=$tfaqFilters26;
else	
$tfaqFilters=preg_replace('/OR/', '', $tfaqFilters16, 1);
}
$currenttime=time();
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
$sql = "SELECT * FROM faq WHERE faqActive=1";	
if (!empty($_GET['faqFilter']))
$sql .=" AND ($tfaqFilters) ";
elseif (!empty($pagename))	
$sql .=" AND (faqFilter LIKE '%$pagename%') ";
if (!empty($faqsearch))	
$sql .= " AND (faqTags LIKE '%$faqsearch%' || faqTitle LIKE '%$faqsearch%' || faqContent LIKE '%$faqsearch%' || faqFilter = '%$faqsearch%' || affiliatename LIKE '%$faqsearch%')";
//$sql .= " AND (faqTitle LIKE '%$pieces[0]%' || faqContent LIKE '%$pieces[0]%' || faqTitle LIKE '%$pieces[1]%' || faqContent LIKE '%$pieces[1]%' || faqTitle LIKE '%$faqsearch%' || faqContent LIKE '%$faqsearch%' || faqFilter LIKE '%$faqsearch%' || affiliatename LIKE '%$faqsearch%')";
$sql .= " ORDER BY faqTime DESC";
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
if (!empty($_GET['faqFilter']))
$link=trim(str_replace( array('/agents/frequently-asked-questions.php?'), '&',  $_SERVER['REQUEST_URI']));
?>
<!--<a href="https://centreholidays.com/agents/faq-answer.php?faqID=--><?php //echo $row['faqID'].$link; ?><!--" title="See Answer" class="btn btn-warning px-5 py-3 text-uppercase font-weight-bolder">-->
<!--See Answer-->
<!--</a>-->

    <?php if (!empty($row['faqContentUrl'])){ ?>
    <a href="<?php echo $row['faqContentUrl']; ?>" title="See More" target="_blank" class="btn btn-warning px-5 py-3 text-uppercase font-weight-bolder">
        See Answer
    </a>
    <?php }   ?>


</div>
</div>
</div>
<!--end::FAQ-->
</div>
<?php } if ($counter44 > 6) { ?> 
<div class="col-xl-12 d-flex flex-center">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-faq" title="See More"><span><i class="fas fa-angle-double-down"></i></span>See More FAQs</button>
</div>
<?php } ?>
</div>
<?php
mysqli_close($conn);
?>