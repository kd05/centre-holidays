<?php include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');?>

<?php

$afid=$_GET['afid'];

$sql1 = "SELECT * FROM affiliates WHERE afid='".$afid."'"; // WHERE afid='".$afid."'
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
 
$affiliatesqimage=$row1['affiliatesqimage'];
$affiliatename=$row1['affiliatename']; 
$afhimage=$row1['afhimage'];
$affiliatename=$row1['affiliatename']; 
$affiliatedescreption=$row1['affiliatedescreption']; 
$preferred=$row1['preferred'];  
$affiliatdetails=$row1['affiliatdetails']; 
$affiliateactive=$row1['affiliateactive']; 
$affiliattags=$row1['affiliattags']; 
$affiliatetime=$row1['affiliatetime']; 
$cafhimage=$row1['cafhimage']; 

	}}
?>