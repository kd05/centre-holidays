<?php 
$mrandom=$_COOKIE['user'];

include "conn.php";

$sql = "SELECT * FROM members where mrandom='$mrandom' LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	
    while($row = mysqli_fetch_assoc($result)) {

			$mid=$row['mid']; 
			$mname=$row['mname'];
			$memail=$row['memail'];			
			$mpassword=$row['mpassword'];
			$mphone=$row['mphone'];
			$maddress=$row['maddress']; 					
			$mcity=$row['mcity']; 
			$mcountry=$row['mcountry']; 			
			$mprovince=$row['mprovince'];
			$mpostal=$row['mpostal'];
			$mphoto=$row['mphoto'];
			$mdate=$row['mdate'];
			$mstatus=$row['mstatus'];	
			$upgradetime=$row['upgradetime'];
			$webtop=$row['webtop'];
			$newstop=$row['newstop'];
			$promotop=$row['promotop'];
			$webtoptime=$row['webtoptime'];
			$newstoptime=$row['newstoptime'];
			$promotoptime=$row['promotoptime'];			
			$bonus=$row['bonus'];
			$bonustime=$row['bonustime'];																				     
    }

mysqli_close($conn);

}

if ($mstatus==0)
header('Location: logout.php');



if ($mstatus==1 && empty($promotop) && empty($webtop) && empty($newstop))
$memberstatus="<a href='members.php'><strong class='btn btn-info' style='border:none !important'>Standard Membership Status</strong></a>";
elseif ($mstatus==2 || !empty($promotop) || !empty($webtop) || !empty($newstop))
$memberstatus="<a href='members.php'><strong class='btn btn-warning' style='text-shadow:1px 1px 1px #fff; color:#000; border:none !important'>Featured Membershop</strong></a>";


$webtopexp=$webtoptime+(86400*30*$webtop);
$newstopexp=$newstoptime+(86400*30*$newstop);
$promotopexp=$promotoptime+(86400*30*$promotop);
$bonusexp=$bonustime+(86400*30*1);


?>