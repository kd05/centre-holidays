<?php
//$urlend[0]='beach';
//echo $urlend[0]; 
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
$sql100 = "SELECT * FROM trips WHERE tid='".$_GET['tid']."'";
$result100 = mysqli_query($conn, $sql100);
// output data of each row
 while($row = mysqli_fetch_assoc($result100)) {
	$tcode888=$row['tcode'];	
	$ttitle888=$row['ttitle'];
	$tsubtitle888=$row['tsubtitle'];	
	$tprice888=$row['tprice'];
	$tcurrency888=$row['tcurrency'];	
	
	switch ($tcurrency888) {
	  case "¥":
		$signfa2x="<i class='fas fa-yen-sign fa-2x'></i>";
		break;
	  case "€":
		$signfa2x="<i class='fas fa-euro-sign fa-2x'></i>";
		break;
	  case "£":
		$signfa2x="<i class='fas fa-pound-sign fa-2x'></i>";
		break;
	  default:
		$signfa2x="<i class='fas fa-dollar-sign fa-2x'></i>";
	}

	switch ($tcurrency888) {
	  case "¥":
		$signfa3x="<i class='fas fa-yen-sign fa-3x'></i>";
		break;
	  case "€":
		$signfa3x="<i class='fas fa-euro-sign fa-3x'></i>";
		break;
	  case "£":
		$signfa3x="<i class='fas fa-pound-sign fa-3x'></i>";
		break;
	  default:
		$signfa3x="<i class='fas fa-dollar-sign fa-3x'></i>";
	}

					
	$tpace888=$row['tpace'];
	$tcontinent888=$row['tcontinent'];
	$tcountry888=$row['tcountry'];
	$tstartarea888=$row['tstartarea'];
	$tendarea888=$row['tendarea'];
	$numcountries888=$row['numcountries'];
	$tduration888=$row['tduration'];
	$toperators888=$row['toperators'];	
	$timage888=$row['timage'];	
	$tcoverimgalt888=$row['tcoverimgalt'];
	$squarethumb888=$row['squarethumb'];
	$thorizontalimage888=$row['thorizontalimage'];	
	$tfilech888=$row['tfilech'];						
	$turl888=$row['turl'];	
	$tags888=$row['tags'];
	$tothercountries888=$row['tothercountries'];
	$tothercontinents888=$row['tothercontinents'];
	$active888=$row['active'];
	$tdays888=$row['tdays'];					
	$tnotes888=$row['tnotes'];
	$twebsite888=$row['twebsite'];
	$ch_agent=$row['ch_agent'];
	$texpiry888=$row['texpiry'];
	$tgroup888=$row['tgroup'];
	$AgentID=$row['AgentID'];
	$tstartdate888=$row['tstartdate'];
	$tenddate888=$row['tenddate'];
	$tdeparturegateways888=$row['tdeparturegateways'];
	$tcruiseships888=$row['tcruiseships'];
	$troutmap888=$row['troutmap'];	
	$trp888=$row['trp'];
	$tmeta888=$row['tmeta'];	
	$tvideo888=$row['tvideo'];
	$tbody888=$row['tbody'];
	$texperiences888=$row['texperiences'];
	$accommodation888=$row['accommodation'];
	$thlights888=$row['thlights'];
	$extension1888=$row['extension1'];
	$extension2888=$row['extension2'];
	$tinclusions888=$row['tinclusions'];
	$texclusions888=$row['texclusions'];
	$tadditionalnotes888=$row['tadditionalnotes'];
	$tratesdates888=$row['tratesdates'];
	$tslider1888=$row['tslider1'];
	$tslidercap1888=$row['tslidercap1'];
	$tslider2888=$row['tslider2'];
	$tslidercap2888=$row['tslidercap2'];
	$tslider3888=$row['tslider3'];
	$tslidercap3888=$row['tslidercap3'];
	$tslider4888=$row['tslider4'];
	$tslidercap4888=$row['tslidercap4'];
	$tslider5888=$row['tslider5'];
	$tslidercap5888=$row['tslidercap5'];
	$tslider6888=$row['tslider6'];
	$tslidercap6888=$row['tslidercap6'];
	$tslider7888=$row['tslider7'];
	$tslidercap7888=$row['tslidercap7'];
	$tslider8888=$row['tslider8'];
	$tslidercap8888=$row['tslidercap8'];
	$tslider9888=$row['tslider9'];
	$tslidercap9888=$row['tslidercap9'];
	$tslider10888=$row['tslider10'];
	$tslidercap10888=$row['tslidercap10'];
	$tslider11888=$row['tslider11'];
	$tslidercap11888=$row['tslidercap11'];
	$tslider12888=$row['tslider12'];
	$tslidercap12888=$row['tslidercap12'];
	$activitylevel888=$row['activitylevel'];
	$tstyle888=$row['tstyle'];
	$activities888=$row['activities'];
	$tratesdatesyear1888=$row['tratesdatesyear1'];
	$tratesdatesyear2888=$row['tratesdatesyear2'];
	$tratesdatesyear3888=$row['tratesdatesyear3'];
	$tratesdates2888=$row['tratesdates2'];
	$tratesdates3888=$row['tratesdates3'];
	$tfilechagents3888=$row['tfilechagents'];
	$exttrp3888=$row['exttrp'];
 }
//mysqli_close($conn);
switch ($twebsite888) {
   	case "2":
        $imagesource='www.centreholidays.com';
       break;							
    	default:
        $imagesource='www.epikescapes.com';
}
// Note for image source
//1 ==> Epik
//2 ==> Centre Holidays
//3 ==> Epik & Centre Holidays


?>