<?php ob_start(); ?>
<meta name="robots" content="noindex">
<?php
session_start();

$IPaddress=$_SERVER['REMOTE_ADDR'];
$two_letter_country_code=iptocountry($IPaddress);
include("ip_files/countries.php");
$country_name=$countries[$two_letter_country_code][1];

function iptocountry($ip) {
    $numbers = preg_split( "/\./", $ip);
    include("../../agents/ssi/geo/ip_files".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    $two_letter_country_code;
}


//file_get_contents("http://api.ipstack.com/99.243.196.239?access_key=028f581a6aab00002a639c1166842784");bce50d39e9c3cca345ecd8d339d54046

	// set IP address and API access key 

	$ip = $_SERVER['REMOTE_ADDR'];
	
	if ($ip =="" || $ip =="unknown")
	{
		header('Location:https://www.google.com');	
	}
	else
	{
	
	
		if(!isset($_COOKIE['country_name'])) {
		$access_key = '4de1556ac8836be8901e83066bf7ec2a';
		//echo "not set";

		$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);
		
		// Decode JSON response:
		$api_result = json_decode($json, true);
		
		// Output the "capital" object inside "location"
		
/*		$_SESSION["country_code"]=$api_result['country_code']; 
		$_SESSION["region_name"]=$api_result['region_name'];
		$_SESSION["city_name"]=$api_result['city'];
		$_SESSION["country_name"]=$api_result['country_name'];
		$_SESSION["capital_name"]=$api_result['location']['capital'];
		$_SESSION["latitude"]=$api_result['latitude'];		
		$_SESSION["longitude"]=$api_result['longitude'];
		$country_flag=$api_result['location']['country_flag'];
		$country_flag=str_replace('http', 'https', $country_flag);	
		$_SESSION["country_flag"]='<img src="'.$country_flag.'" class="img-fluid" style="max-width:32px" />';	
		$_SESSION["country_code"]=$api_result['currency']['code'];	
		$_SESSION["currency_sympol"]=$api_result['currency']['symbol'];				
		$_SESSION["zip"]=$api_result['zip'];*/
	
		$countryname=$api_result['country_name']; 
		
		$cookie_name = "countryname";
		$cookie_value = $countryname;
		setcookie($cookie_name, $cookie_value, time() + (43200 * 1), "/");		
		
		}
		else
		{
			//echo $_COOKIE['countryname'];
			//echo 'already set';
		}
	}
?>

<?php ob_flush(); ?>