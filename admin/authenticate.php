<?php ob_start(); ?>

<?php

		if (isset($_POST['login']))
		{

		//if(isset($_POST['g-recaptcha-response'])){
         //$captcha=$_POST['g-recaptcha-response'];
        //}
		
        //if(!$captcha){
			
			?>
<!--  <div class="alert alert-danger">
  		<strong>Error! No Captcha!</strong>
  </div> -->          
          <?php
//		  header('Location: https://www.centreholidays.com/admin/index.php?captcha=wrong&att=1');
//          exit;
//        }
//        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeAWzMUAAAAAGZNsOzHKfyqyD_HghRQxUvNNDad&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
//        if($response.success==false)
//        {
//          ?>
<!--			<div class="alert alert-danger">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         	<strong>Hummm!</strong> This looks like a spam!
	 		</div>  --> 
		  <?php
//		  header('Location: https://www.centreholidays.com/admin/index.php?captcha=wrong&att=1');	
//		  exit;
//        }
//		else
        {								
								
							 $email = strtolower(trim(($_POST['email'])));
							 $email = str_replace("'","", $email);
							 $email = str_replace('"','', $email);			 
							 
							 $mypassword=md5(trim($_POST['mypassword']).'Q1!W2@e3r4t5');
						 	 $mypassword;
							 
							 $keyword=trim($_POST['keyword']);
						 	 $keyword;
							 
							
							$IP = $_SERVER['REMOTE_ADDR'];	
							$today = date("l - F.d.Y - h.i A"); 				
							//password B1$$shgh58 and user Andre@centreholidays.com
			
							
//=====================recall information from database and compare to input							
							
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
													
$sql = "SELECT * FROM admins WHERE adminsemail='$email' AND adminspassword='$mypassword' ";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

// output data of each row
 while($row = mysqli_fetch_assoc($result)) { 
		 echo $adminsemail=$row['adminsemail']; 
		 echo $adminspassword=$row['adminspassword'];
		 echo $adminsid=$row['adminsid']; 
 }

							
						 if ($row_cnt  == 1) // all fields needed
						 {							


$IP = $_SERVER['REMOTE_ADDR'];


//==========================================================================================
//==========================================================================================
//========================ANDRE CHANGE THE COUNTRY NAME BELOW===============================
//==========================================================================================

$lcountryname1='Canada';
$lcountryname2='Canada';
$lcountryname3='Canada';
$lcountryname4='Canada';
$lcountryname5='Canada';

//==========================================================================================
//==========================================================================================
//==========================================================================================
//==========================================================================================

//if ($_COOKIE['countryname']=='Canada' || $_COOKIE['countryname']=='United States' || $_COOKIE['countryname']==$lcountryname5 || $_COOKIE['countryname']==$lcountryname4 || $_COOKIE['countryname']==$lcountryname3 || $_COOKIE['countryname']==$lcountryname2 || $_COOKIE['countryname']==$lcountryname1) {
	

//=============================================insert CODE=========================

		//$code=rand();
		//$code=substr($code, 0, 6);
		$code=(rand(10,999999));//substr($code, 0, 6);
		
		$tm=time();	
		$ran=$code.'_'.$tm;	


$sql5432="UPDATE admins SET admincode='".$code."' WHERE adminsid='".$adminsid."'";

if (!mysqli_query($conn,$sql5432))
die('Error: ' . mysqli_error($conn));

mysqli_close($conn);

//=================================End of reset visitor ip and date information if log in is a success======== 
// ADMIN COOKIE NAME IS admin========================

//		if ($adminstype==1)
//		$userid='edit7016c5fa02a3deaf0478a095d0165c04'; // full edit
//		elseif ($adminstype==2)
//		$userid='read7016c5fa02a3deaf0478a095d0165c04';	// read only
//		elseif ($adminstype==3)
//		$userid='partedit7016c5fa02a3deaf0478a095d0165c04';	// read and only edit agents		
//
//		$cookie_name = "admin";
//		$cookie_value = $userid;
//		setcookie($cookie_name, $cookie_value, time() + (86400 * 120), "/"); // 86400 = 1 day
//		
//		session_start();
//		$_SESSION["visitor"] = $userid;
//
//		header('Location: https://www.centreholidays.com/admin/home.php');	



		$to = $adminsemail;
		$subject = "Admin Verification Code";
		
		$message = file_get_contents($_SERVER['DOCUMENT_ROOT']."/admin/email/admin-portal-verification.php");
		$message  = str_replace("_code_", $code, $message);  					
				                  		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: donotreply@centreholidays.com' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";
		
		mail($to,$subject,$message,$headers);

		header('Location: two-step-verification.php');



		//}
		//else
		//{
		//header("location: https://www.google.com");// in case outside CA or US or assigned country
		//}



}
else
	{
		header('Location: https://www.centreholidays.com/admin/index.php?captcha=okay&att=1');
	}
}
							}
?>


<? ob_flush(); ?>