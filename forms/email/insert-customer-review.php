<?php 
ob_start();


//============================sanitize input========================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize inputs

$title = sanitize_sql_string(ucwords(trim(($_POST['title']))));//=====================0000000 1

$FeedFName = sanitize_sql_string(ucwords(trim(($_POST['FeedFName']))));//=====================0000000002
$FeedLName = sanitize_sql_string(ucwords(trim(($_POST['FeedLName']))));//=====================000000000003
$FeedName=$FeedFName.' '.$FeedLName;

$FeedTitle=sanitize_sql_string(trim($_POST['FeedTitle']));// =======================000000000000004

$AgentEmail=trim($_POST['AgentEmail']);// =======================00000000000005

$FeedEmail=trim($_POST['FeedEmail']);// =======================00000000000005
$AgentName=ucwords(trim($_POST['AgentName']));// =======================0000000006
$AgentID=trim($_POST['AgentID']);// =======================00000000000000007

$Agency=sanitize_sql_string(trim($_POST['Agency']));// =======================0000000000000008

$FeedMessage=sanitize_sql_string(strip_tags($_POST['FeedMessage']));// =======================00000000000011

$FeedLocation=sanitize_sql_string(trim($_POST['FeedLocation']));// =======================00000000000011

$FeedPhone = (trim(($_POST['FeedPhone'])));//=====================000000000000000012

$FeedEmail = (trim(($_POST['FeedEmail'])));//=====================00000000000000014
$FeedEmail = strtolower(trim(($_POST['FeedEmail'])));//=================000
$FeedEmail = str_replace ("'","",$FeedEmail);
$FeedEmail = str_replace ('"','',$FeedEmail);

$FeedExperience=$_POST['FeedExperience'];

//$license=trim($_POST['license']);// =======================
//$plan = (trim(($_POST['plan'])));//=====================
//$referraFeedLName = ucwords(trim(($_POST['referraFeedLName'])));//=====================
//$referral = ucwords(trim(($_POST['referral'])));//=====================
//$FeedMessage = ucwords(trim(($_POST['FeedMessage'])));//=====================
//$directste = ucwords(trim(($_POST['directste'])));//=====================
//$directposl = ucwords(trim(($_POST['directposl'])));//=====================
//$ste = ucwords(trim(($_POST['ste'])));//=====================
//$posl = (trim(($_POST['posl'])));//=====================
//$package=trim($_POST['package']);// =======================
//$province=trim($_POST['province']);// =======================
//$businessname=trim($_POST['businessname']);// =======================
//$hosgency=trim($_POST['hosgency']);// =======================
//$consortia=trim($_POST['consortia']);// =======================


$pieces = explode(",", $AgentEmail);//$agentemail=$BusinessEmail.', inquire@centreholidays.com';
$AgentEmailOnly=$pieces[0];





//New code for recaptcha
if (!empty($FeedEmail))
{


    if (isset($_POST['recaptcha_response'])) {

        $recaptcha_secret = '6LcKZvMpAAAAAGeJQq1kvzBTCHHW2Ya399qr-tzB';
        $recaptcha_response = $_POST['recaptcha_response'];

        // Make the request to the Google reCAPTCHA API using cURL
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        ];

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data)
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

//        echo "<pre>"; print_r($response); echo "</pre>"; exit;
        $responseData = json_decode($response, true);

        if ($responseData['success'] && $responseData['score'] >= 0.5 && $responseData['action'] === 'submit') {



//============================GEOLOCATION===========================================
            $FeedIP = $_SERVER['REMOTE_ADDR'];
//include($_SERVER['DOCUMENT_ROOT'].'/geolocation/geolocation.php');
//$FeedLocation=$FeedTitle.' '.$Region;

            $FeedDate = date("F d,Y");
            $time=time();

//===========================connect to epik dabase and insert==============================

            include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

            $sql = "INSERT INTO ch_feedback 
(FeedID, FeedTitle, FeedProduct, FeedDeparture, FeedAgent, AgentID, FeedExperience, FeedMessage, FeedName, FeedPhone, FeedEmail, FeedIP, FeedLocation, FeedDate, feedrand, FeedStatus, title) VALUES 
('', '$FeedTitle', '', '', '$Agency', '$AgentID', '$FeedExperience', '$FeedMessage', '$FeedName', '$FeedPhone', '$FeedEmail', '$FeedIP', '$FeedLocation', '$FeedDate', '', '0', '$title')";


            if (mysqli_query($conn, $sql)) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysql_close($conn);



//===============send agent/center holidays to customer======================================
            $subject  = "Centre Holidays - Customer Review";
            $from     = "donotreply@centreholidays.com";
//=======================message to center holidays==========================================
            $message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/customer-review.php");// embed php values in HTML file

            $message1  = str_replace("_FeedTitle_", $FeedTitle, $message1);
            $message1  = str_replace("_FeedPhone_", $FeedPhone, $message1);
            $message1  = str_replace("_FeedEmail_", $FeedEmail, $message1);
            $message1  = str_replace("_title_", $title, $message1);
            $message1  = str_replace("_FeedFName_", $FeedFName, $message1);
            $message1  = str_replace("_FeedLName_", $FeedLName, $message1);
            $message1  = str_replace("_Agency_", $Agency, $message1);
            $message1  = str_replace("_AgentName_", $AgentName, $message1);
            $message1  = str_replace("_AgentEmail_", $AgentEmailOnly, $message1);
            $message1  = str_replace("_FeedMessage_", $FeedMessage, $message1);
            $message1  = str_replace("_FeedExperience_", $FeedExperience, $message1);

            $headers1  = "From: $from\r\n";
            $headers1 .= "Content-type: text/html\r\n";
            $to1 = $AgentEmail;
            mail($to1, $subject, $message1, $headers1);

//=======================message to consumer================================================

            $message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/customer-review-user-copy.php");// embed php values in HTML file

            $message2  = str_replace("_FeedTitle_", $FeedTitle, $message2);
            $message2  = str_replace("_FeedPhone_", $FeedPhone, $message2);
            $message2  = str_replace("_FeedEmail_", $FeedEmail, $message2);
            $message2  = str_replace("_title_", $title, $message2);
            $message2  = str_replace("_FeedFName_", $FeedFName, $message2);
            $message2  = str_replace("_FeedLName_", $FeedLName, $message2);
            $message2  = str_replace("_Agency_", $Agency, $message2);
            $message2  = str_replace("_AgentName_", $AgentName, $message2);
            $message2  = str_replace("_AgentEmail_", $AgentEmail, $message2);
            $message2  = str_replace("_FeedMessage_", $FeedMessage, $message2);
            $message2  = str_replace("_FeedExperience_", $FeedExperience, $message2);

            $headers2  = "From: $from\r\n";
            $headers2 .= "Content-type: text/html\r\n";
            $to2 = $FeedEmail;
            mail($to2, $subject, $message2, $headers2);

//======================Display success message===========================================



        } else {
            echo 'Verification failed';
            //proceed with form values
            ?>
            <script>
                swal({
                    title: 'ERROR!',
                    text: 'Human Verification',
                    footer: 'Please make sure you provide the right answers to the last question (Human Verification)'
                })
            </script>
            <?php
        }


    }

}





/*

//============================ORIGINAL CODE========================================


if (!empty($FeedEmail))
{	



if (isset($_POST['g-recaptcha-response'])) {
    //get verify response data
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddJc8ZAAAAAHjejXQZeelaBNj8v1TDS8zivMxL&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);        
    if($response.success==false) {
	echo 'Verification failed';
	//proceed with form values	
	?>
    <script>
	swal({
	  title: 'ERROR!',
	  text: 'Human Verification',
	  footer: 'Please make sure you provide the right answers to the last question (Human Verification)'
	})
	</script>
    <?php

    } else {


//============================GEOLOCATION===========================================
$FeedIP = $_SERVER['REMOTE_ADDR'];	
//include($_SERVER['DOCUMENT_ROOT'].'/geolocation/geolocation.php');	
//$FeedLocation=$FeedTitle.' '.$Region;

$FeedDate = date("F d,Y"); 
$time=time();

//===========================connect to epik dabase and insert==============================

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "INSERT INTO ch_feedback 
(FeedID, FeedTitle, FeedProduct, FeedDeparture, FeedAgent, AgentID, FeedExperience, FeedMessage, FeedName, FeedPhone, FeedEmail, FeedIP, FeedLocation, FeedDate, feedrand, FeedStatus, title) VALUES 
('', '$FeedTitle', '', '', '$Agency', '$AgentID', '$FeedExperience', '$FeedMessage', '$FeedName', '$FeedPhone', '$FeedEmail', '$FeedIP', '$FeedLocation', '$FeedDate', '', '0', '$title')";
	  
      
if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
   
mysql_close($conn);



//===============send agent/center holidays to customer======================================
	$subject  = "Centre Holidays - Customer Review";	
	$from     = "donotreply@centreholidays.com";	
//=======================message to center holidays==========================================	
$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/customer-review.php");// embed php values in HTML file
									                  		
$message1  = str_replace("_FeedTitle_", $FeedTitle, $message1);
$message1  = str_replace("_FeedPhone_", $FeedPhone, $message1);
$message1  = str_replace("_FeedEmail_", $FeedEmail, $message1);
$message1  = str_replace("_title_", $title, $message1);
$message1  = str_replace("_FeedFName_", $FeedFName, $message1);
$message1  = str_replace("_FeedLName_", $FeedLName, $message1);
$message1  = str_replace("_Agency_", $Agency, $message1);
$message1  = str_replace("_AgentName_", $AgentName, $message1);
$message1  = str_replace("_AgentEmail_", $AgentEmailOnly, $message1);
$message1  = str_replace("_FeedMessage_", $FeedMessage, $message1);	
$message1  = str_replace("_FeedExperience_", $FeedExperience, $message1);			
								
					$headers1  = "From: $from\r\n";
                    $headers1 .= "Content-type: text/html\r\n";
					$to1 = $AgentEmail;
					mail($to1, $subject, $message1, $headers1);                   

//=======================message to consumer================================================
	
$message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/customer-review-user-copy.php");// embed php values in HTML file

$message2  = str_replace("_FeedTitle_", $FeedTitle, $message2);
$message2  = str_replace("_FeedPhone_", $FeedPhone, $message2);
$message2  = str_replace("_FeedEmail_", $FeedEmail, $message2);
$message2  = str_replace("_title_", $title, $message2);
$message2  = str_replace("_FeedFName_", $FeedFName, $message2);
$message2  = str_replace("_FeedLName_", $FeedLName, $message2);
$message2  = str_replace("_Agency_", $Agency, $message2);
$message2  = str_replace("_AgentName_", $AgentName, $message2);
$message2  = str_replace("_AgentEmail_", $AgentEmail, $message2);
$message2  = str_replace("_FeedMessage_", $FeedMessage, $message2);		
$message2  = str_replace("_FeedExperience_", $FeedExperience, $message2);	
								
					$headers2  = "From: $from\r\n";
                    $headers2 .= "Content-type: text/html\r\n";
					$to2 = $FeedEmail;
					mail($to2, $subject, $message2, $headers2);  

//======================Display success message===========================================
?>

<?php	
		}
	}
}
*/


ob_flush();
?>
