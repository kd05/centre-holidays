<meta name="robots" content="noindex">
<?php
ob_start();
session_start();

if (!isset($_SESSION["flcountry"]))
{
//$access_key = '964dabd8efd833fbb87df21507d1cc33';//ch@widewebvision.ca//1be405384ca8864f0984b775668d3b55//5c36d311533cc22c9cab9d89226fbcf7 // d6a5f398035e2e90f474d5d3595503a2
$ch = curl_init('http://api.ipstack.com/'.$_SERVER['REMOTE_ADDR'].'?access_key='.$access_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);
$api_result = json_decode($json, true);
}

$_SESSION["flarea"] =$api_result['region_name'];
$_SESSION["flcity"] = $api_result['city'];
$_SESSION["flcountry"] = $api_result['country_name'];
$flcookie=$_COOKIE['flcookie'];
$flarea = $_SESSION["flarea"];
$flcity = $_SESSION["flcity"];
$flcountry = $_SESSION["flcountry"];

//if ($flcountry =='Canada' || $flcountry =='Kazakhstan')
//if ($flcountry=='United Arab Emirates' || $flcountry=='France' || $flcountry=='United States' || $flcountry=='Poland' || $flcountry=='India' || $flcountry=='Thailand' || $flcountry=='Belgium' || $flcountry=='Germany' || $flcountry=='Switzerland' || $flcountry=='Russia' || $flcountry=='Bulgaria' || $flcountry=='Ukraine' || $flcountry=='Taiwan' || $flcountry=='China' || $flcountry=='Netherlands' || $flcountry=='Brazil' || $flcountry=='Vietnam'  || $flcountry=='Hong Kong')
//header('Location: http://www.google.com/');

//if ($flcountry !='Canada')
//header('Location: http://www.google.com/');


ob_flush();
?>