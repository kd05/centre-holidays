<? ob_start(); ?>

<?php
echo $actual_link=$_GET['actual_link'];

// unset cookies
/*if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);*/
/*        setcookie('AgentUniqID', '', time()-864000);
        setcookie('AgentUniqID', '', time()-864000, '/');*/
/*    }
}*/


// unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

if (!empty($actual_link))
header('Location:https://centreholidays.com/agents/index.php?actual_link='.$actual_link);
else
header('Location:https://centreholidays.com/agents/index.php');

?>

<? ob_flush(); ?>