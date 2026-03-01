<style>
.load-more-items-suppliers { display:none; }
</style>
<div class="row mb-20">
<?php include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');?>
<?php


$searchaffilter=trim(str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&', '@', '|', '/'), ' ',  $_GET['searchaffilter']));
$pieces = explode(" ", $searchaffilter);

if (isset($_GET['affilter']))
{
$taffilter=$_GET['affilter'];
for($ii=0; $ii <= 20; $ii++) {
	${'cooooooo' . $ii}=$taffilter[$ii];
	$values6=${'cooooooo' . $ii}.$values6;
	$taffilters=str_replace($values6,"",$taffilters);	
	if (!empty($taffilter[$ii]))
		{
	$counter6=$counter6+1;		
	$taffilterpag='&affilter%5B%5D='.${'cooooooo' . $ii}.$taffilterpag;//------------value for pagination url------------
	$taffilters16=" OR affilter LIKE '%".${'cooooooo' . $ii}."%'".$taffilters16;//-------------------values for database-----------------
	$taffilters26=" affilter LIKE '%".${'cooooooo' . $ii}."%'";
		}
	}

if ($counter6 < 2)
$taffilters=$taffilters26;
else	
$taffilters=preg_replace('/OR/', '', $taffilters16, 1);

}

//echo  $taffilters  affilter;
//==========================================================================


$sql = "SELECT * FROM affiliates WHERE affiliateactive=1 "; // WHERE afid='".$afid."'

if (!empty($_GET['affilter']))
$sql .=" AND ($taffilters) ";
elseif (!empty($pagename))	
$sql .=" AND (affilter LIKE '%$pagename%') ";

if (!empty($searchaffilter))	
$sql .= " AND (affiliatename = '$searchaffilter' || affilter LIKE '%$searchaffilter%' || affiliattags LIKE '%$searchaffilter%')";

$sql .= " ORDER BY "; // WHERE afid='".$afid."'	

if (!empty($searchaffilter) || (!empty($_GET['affilter'])))	
$sql .= " preferred DESC, affiliatetime DESC "; // WHERE afid='".$afid."'
else
$sql .= " affiliatetime DESC "; // WHERE afid='".$afid."'	


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
<img class="img-responsive card-rounded-top" src="/img/agents/suppliers/<?php echo $row['afhimage']; ?>" alt="<?php echo $row['affiliatename']; ?>">
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
if (!empty($_GET['affilter']) || !empty($_GET['searchaffilter']))
$link=trim(str_replace( array('/agents/suppliers.php?'), '&',  $_SERVER['REQUEST_URI']));
?>
<a href="https://centreholidays.com/agents/supplier-details.php?afid=<?php echo $row['afid'].$link; ?>" title="Supplier's Details" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100" onclick="ChangeUrl('', '?tid=<?php echo $row['tid'] ?>&trp=<?php echo $row['trp'] ?>');">Supplier's Details</a>


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