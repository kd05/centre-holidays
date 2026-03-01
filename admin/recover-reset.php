<?php ob_start(); 

$IP = $_SERVER['REMOTE_ADDR'];
//186f9fe312ee5365f0e96b77d5c3e781
?>

<!DOCTYPE html>  
<html lang="en">
<head>
<title>Admin Login - Epik Escapes</title>
<meta name="description" content="Login to Epik Escapes' Admin Panel">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>

<script>
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
</script>

</head>
<body class="fix-header">
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<?php
	
if (!empty($_GET['cat']))
$adminsid=trim($_GET['cat']);
else
$adminsid=trim($_POST['adminsid']);
									
if (!empty($_GET['temp']))
$temp=trim($_GET['temp']);
else
$temp=trim($_POST['temp']);


													
include ($_SERVER['DOCUMENT_ROOT'].'/library/opendbi.php');							
							
$sql = "SELECT * FROM admins WHERE adminsid='".$adminsid."' AND temp='".$temp."' LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

 		while($row = mysqli_fetch_assoc($result)) { 
		 $adminsiddb=$row['adminsid']; 
		 $adminsemaildb=$row['adminsemail']; 
 		}
		

if (!empty($adminsemaildb)) { 

?>


<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
        <a href="/admin/index.php" class="text-center db"><img src="/img/epik-escapes-logo-xl.png" alt="Epik Escapes" /><br/><img src="/img/epik-escapes-logo-text.png" alt="Epik Escapes" /></a> 

    <div class="white-box">
	

<?php

		$pass1=trim($_POST['pass1']);
		$pass1=md5(trim($pass1).'Q1!W2@e3r4t5');
		
		$pass2=trim($_POST['pass2']);
		$pass2=md5(trim($pass2).'Q1!W2@e3r4t5');

		if (!empty($_POST['pass1']) && !empty($_POST['pass2']))
		{

		if ($pass1==$pass2)
		{
		$sql2 = "UPDATE admins SET temp='', adminspassword='$pass2' WHERE adminsid='$adminsiddb'";
		
		if (mysqli_query($conn, $sql2)) {
			?>
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Great!</strong> Record updated successfully.
            </div>   
            <?php
			
		//======================send email notification that the password was reset================================

					$to = 'andre@centreholidays.com';//				
					$message = '<html>
					<body style="padding:10px; background:#fff; width:100%; max-width:800px; color:#000; font-family:Arial, Helvetica, sans-serif;">
					<div style="white-space:pre-wrap;">
					<img src="https://www.epikescapes.com/img/epik-escapes-logo-xl.png" style="width:150px; height:auto" />
					<hr />
					<h4 style="text-decoration:underline">Password for '.$adminsemaildb.' was reset successfully.</h4>';
					$message .= "<p>";
					$message .= 'Click here to login https://www.epikescapes.com/admin/index.php';
					$message .= '</p></div></body></html>';
					
					$subject = 'Admin password was reset successfully';
					$from =	"info@epikescapes.com";
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
					$headers .= 'Reply-To:'.$email. "\r\n" .
								'X-Mailer: PHP/' . phpversion();
																	
					mail($to,$subject,$message,$headers);			
			
			
			$wassent='wassent';
			
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}		
		}
		else
		{
			?>
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> Passwords do not match.
            </div>   
            <?php
		}
		
		}
		
		mysqli_close($conn);

?>    
    
      
    <?php if ($wassent !='wassent') { ?>
    
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter the new password for <strong><?php echo $adminsemaildb ?></strong></p>
            <strong style="color:#F00">This link is valid for one attempt!</strong>
          </div>
        </div>
        
		<div class="form-group ">
          <div class="col-xs-12">

          <input type="hidden" name="adminsid" id="adminsid" value="<?php echo $adminsid ?>" />
          <input type="hidden" name="temp" id="temp" value="<?php echo $temp ?>" />

          <input class="form-control" type="password" name="pass1" id="pass1" required placeholder="Password" />
           <input  class="form-control" type="password" name="pass2" id="pass2" onkeyup="checkPass(); return false;" required placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login" id="login">Reset</button>
          </div>
          
          
      </form>
      
    <?php } ?>
      
    </div>

</div>
</section>


<?php
}
else
{
?>	
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error! This link is no longer valid.</strong>
</div>  	
<?php    	
}

?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>

</body>
</html>
<? ob_flush(); ?>