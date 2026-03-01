<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
		
		if (!empty($_GET['blip']))
		{
            $blip=trim($_GET['blip']);

            include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========



            $sql22 = "Delete from ch_agents_log WHERE agentlogip='$blip' ";

            if (mysqli_query($conn, $sql22)) {
                echo "<h4>Success</h4>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }


            $sql2 = "Delete from blacklist WHERE blip='$blip' ";



            if(isset($_GET['redirect_page']) && !empty($_GET['redirect_page'])){

                $redirect_page = $_GET['redirect_page'];
                if (mysqli_query($conn, $sql2)) {
                    echo "<h4>Success</h4>";
                    header('Location: '.$redirect_page.'?results=success');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                    header('Location: '.$redirect_page.'?results=error');
                }


            } else {
                if (mysqli_query($conn, $sql2)) {
                    echo "<h4>Success</h4>";
                    header('Location: black-list.php?results=success');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                    header('Location: black-list.php?results=error');
                }
            }


        mysqli_close($conn);
		}
ob_flush();
?>