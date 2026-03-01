<?php
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$searchaffilter=trim(str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&', '@', '|', '/'), ' ',  $_GET['searchaffilter']));
$pieces = explode(" ", $searchaffilter);

//=================================RESULTS FOR SUPPLIERS=============================

$sql = "SELECT * FROM affiliates WHERE affiliateactive=1 "; // WHERE afid='".$afid."'
$sql .= " AND (affiliatename = '$searchaffilter' || affilter LIKE '%$searchaffilter%' || affiliattags LIKE '%$searchaffilter%')";
$result = mysqli_query($conn, $sql);
$suppliersnum=mysqli_num_rows($result); // number of suppliers

//=================================RESULTS FOR FAQs=============================

$sql = "SELECT * FROM faq WHERE faqActive=1";		
$sql .= " AND (faqTags LIKE '%$searchaffilter%' || faqTitle LIKE '%$searchaffilter%' || faqContent LIKE '%$searchaffilter%' || faqFilter LIKE '%$searchaffilter%' || affiliatename LIKE '%$searchaffilter%')";
$result = mysqli_query($conn, $sql);
$faqsnum=mysqli_num_rows($result);// number of FAQs

?>
