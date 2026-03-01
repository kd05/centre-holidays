<? ob_start(); ?>

<?php
echo $actual_link=$_GET['actual_link'];

// unset cookies
/*if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}*/

setcookie("AgentUniqID", "", time()-36000000000000000000000);

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

header('Location:https://centreholidays.com/agents/index2.php?actual_link='.$actual_link);
?>

<? ob_flush(); ?>