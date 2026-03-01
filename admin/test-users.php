<?php

die("Bye !!!");


include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

$sql = "SELECT * FROM admins ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo $adminsemail=$row['adminsemail'];
    echo "<hr>";
}