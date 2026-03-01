<?php
ob_start();
if (!isset($_COOKIE['admin']))
    header('Location: index.php');

if (!empty($_GET['agent_id']))
{

    include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

    $points = $_POST['points'];
    $agent_id = $_GET['agent_id'];

//    $sql = "UPDATE ch_agents_1 SET CommunityCircleRewards = CommunityCircleRewards + $points WHERE AgentID = $agent_id";
    $sql = "UPDATE ch_agents_1 SET CommunityCircleRewards = CommunityCircleRewards + '$points' WHERE AgentID = '$agent_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<h4>Success</h4>";
        header('Location: community-circle-rewards.php?results=success&message=Points successfully updated.');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
//        header('Location: community-circle-rewards.php?results=error');
    }

    mysqli_close($conn);
} else {
    header('Location: community-circle-rewards.php?results=error');
}
ob_flush();
?>