<?php

function db_conn(){
    $servername = "localhost";
    $username = "epikesca_admin";
    $password = "Q1!W2@e3r4t5";
    $dbname = "epikesca_epiktour";

    // Create connection
    $db_conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$db_conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $db_conn;
}


function get_dashboard_agent_counts(){

    $db_conn = db_conn();

    $active_sql = "SELECT * FROM ch_agents_1 WHERE active=1";
    $active_result = mysqli_query($db_conn, $active_sql);
    $row_cnt_active = mysqli_num_rows($active_result);

    $suspended_sql = "SELECT * FROM ch_agents_1 WHERE active=0 AND CloseDate ='' ";
    $suspended_result = mysqli_query($db_conn, $suspended_sql);
    $row_cnt_suspended = mysqli_num_rows($suspended_result);

    $terminated_sql = "SELECT * FROM ch_agents_1 WHERE active !=1 AND CloseDate !=''";
    $terminated_result = mysqli_query($db_conn, $terminated_sql);
    $row_cnt_terminated = mysqli_num_rows($terminated_result);


    return [
        'active' => $row_cnt_active,
        'suspended' => $row_cnt_suspended,
        'terminated' => $row_cnt_terminated,
    ];
}



function get_admin_name(){
    if (isset($_COOKIE['admin']) && isset($_COOKIE['admin_id'])){
        $db_conn = db_conn();
        $agent_id = get_mapped_agent_id();

        $name = "---";

        $sql = "SELECT FirstName, LastName FROM ch_agents_1 WHERE AgentID = $agent_id  LIMIT 1";
        $result = mysqli_query($db_conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Output data of the first row
            $row = mysqli_fetch_assoc($result);
            $name = $row['FirstName']. " ". $row['LastName'];
        }
        return $name;
    }
}




function get_mapped_agent_id(){

    $agent_id = "AGENT-ID-NOT-SET";

    if (isset($_COOKIE['admin']) && isset($_COOKIE['admin_id'])){
        $admin_id = $_COOKIE['admin_id'];

        switch ($admin_id) {
            case "1": //Andre --
                $agent_id = 457;
                break;
            case "2": //Michele --
                $agent_id = 152;
                break;
            case "3": //Dustin--
                $agent_id = 463;
                break;
            case "4": //Kristen--
                $agent_id = 466;
                break;
            case "5": //Carlton--
                $agent_id = 458;
                break;
            case "6": //Barbara --
                $agent_id = 230;
                break;
            case "7": //Jillian --
                $agent_id = 484;
                break;
            case "8": //Krunal 897 --
                $agent_id = 897;
                break;
        }
    }
    return $agent_id;
}


function get_admin_image_from_agent(){
    $agent_id = get_mapped_agent_id();
    return "/img/agents/$agent_id/profile.jpg";
}





function encryptData($data) {
    $encryptionKey = hex2bin(get_encryp_key()); // Convert from hex to binary
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return base64_encode($iv . $encryptedData);
}


function decryptData($encryptedData) {
    // Check if the data looks like it's base64 encoded
    if (is_base64_gp($encryptedData)) {
        $data = base64_decode($encryptedData);

        // Ensure the data length is greater than the IV length
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        if (strlen($data) > $ivLength) {
            $encryptionKey = hex2bin(get_encryp_key()); // Get and convert key
            $iv = substr($data, 0, $ivLength);
            $encryptedData = substr($data, $ivLength);
            $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);

            // If decryption was successful, return the decrypted data
            if ($decryptedData !== false) {
                return $decryptedData;
            }
        }
    }

    // If data is not encrypted or decryption failed, return the original data
    return $encryptedData;
}



function is_base64_gp($string) {
    // Check if the string is base64 encoded
    if (base64_encode(base64_decode($string, true)) === $string) {
        return true;
    }
    return false;
}








//Don't update this.
function get_encryp_key(){
    return 'ec3e99cdf7d6de4bca418cc352554d3162410431c88a19ec44764ca6cb4960f8';
}