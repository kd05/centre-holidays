<? ob_start(); ?>
<?php

if (!empty($_GET['promocode']))
$promocode = trim($_GET['promocode']); // get the full url
elseif (!empty($_POST['tcode']))
$promocode = trim($_POST['tcode']); // get the full url

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "SELECT * FROM promos WHERE promocode='".$promocode."' LIMIT 1";

		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) {

	$promiid=$row['promiid']; //
	$promocode=$row['promocode']; //	
	$promotitle=$row['promotitle'];	//
	$promodetails=$row['promodetails']; //
	$promodepartfrom=$row['promodepartfrom']; //
	$promocoverimage=$row['promocoverimage']; //
	$promohorizontalimage=$row['promohorizontalimage']; //		
	$promosquarethumb=$row['promosquarethumb'];	//	
	$promoimageflyer=$row['promoimageflyer']; //	
	$promoimageurl=$row['promoimageurl'];//
	$promoimage=$row['promoimage'];//
	$promotags=$row['promotags'];//			
	$promowebsites=$row['promowebsites'];//
	$promooperators=$row['promooperators'];//		
	$promoexpirydate=$row['promoexpirydate'];	//	
	$promoexptime=$row['promoexptime'];	//	
	$promoactive=$row['promoactive'];	//	
	$promotitle=$row['promotitle'];	//
	$promourl=$row['promourl'];	//	
	$promoduration=$row['promoduration'];	//
	$promosinturl=$row['promosinturl'];	//
	$promosexturl=$row['promosexturl'];	//													
}

mysqli_close($conn);

//======================get the current timestamp and compare to expiry date timestamp
$timecurrently=time();
if ($timecurrently  > $promoexptime)// if the current timestamp is larger than the expiry one then send visitor to 
//header('Location: index.php');



ob_flush(); 
?>