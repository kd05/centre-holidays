<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
SESSION_START();
// Unset all of the session variables.
unset($_SESSION['M_FirstName']);
unset($_SESSION['M_LastName']);
unset($_SESSION['M_Email']);
if(isset($_SESSION['id'])) $AID = '?id=' . $_SESSION['id'];
header('Location: https://www.centreholidays.com/index.php' . $AID);
?>
