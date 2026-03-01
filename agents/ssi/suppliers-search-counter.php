<?php include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');?>

<?php

$sql = "SELECT * FROM affiliates WHERE affiliateactive=1 AND (affiliatename LIKE '%".$_GET['term']."%' || affiliattags LIKE '%".$_GET['term']."%') ORDER BY preferred DESC, affiliatetime DESC"; // WHERE afid='".$afid."'
$result = mysqli_query($conn, $sql);

$numberresults=mysqli_num_rows($result);// number of results

?>

