<?php ob_start(); ?>

<?php
// unset cookies
/*if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);// get the cookie name
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

    unset($_COOKIE['user']);
    unset($_COOKIE['consumers']);
    setcookie('user', null, -1, '/');
    setcookie('consumers', null, -1, '/');*/


        setcookie('admin', '', time()-1000);
        setcookie('admin', '', time()-1000, '/');


        setcookie('admin_id', '', time()-1000);
        setcookie('admin_id', '', time()-1000, '/');


// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

header('Location:index.php');
?>

<? ob_flush(); ?>
