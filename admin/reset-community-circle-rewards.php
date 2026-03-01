<?php
ob_start();
if (!isset($_COOKIE['admin']))
    header('Location: index.php');

if (!empty($_GET['reset']))
{

    include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


    $sql = "UPDATE ch_agents_1 SET CommunityCircleRewards = 0; ";

    if (mysqli_query($conn, $sql)) {
        echo "<h4>Success</h4>";
        header('Location: community-circle-rewards.php?results=success');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
//        header('Location: community-circle-rewards.php?results=error');
    }

    mysqli_close($conn);
}
ob_flush();
?>