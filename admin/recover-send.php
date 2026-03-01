<?php ob_start(); ?>

<?php
		
		if (!empty($_POST['adminsemail']))
		
		{
		$adminsemail=trim(strtolower($_POST['adminsemail']));
						
		if(isset($_POST['g-recaptcha-response'])){
         $captcha=$_POST['g-recaptcha-response'];
        }
		
		if(!$captcha)
		{

?>
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error! No Captcha!</strong>
</div>          
<?php
}
else
{

$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeAWzMUAAAAAGZNsOzHKfyqyD_HghRQxUvNNDad&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
if($response.success==false)
{
?>
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Hummm!</strong> This looks like a spam!
</div>   
<?php
}
else
{								
													
include ($_SERVER['DOCUMENT_ROOT'].'/library/opendbi.php');							
							
$sql = "SELECT * FROM admins WHERE adminsemail='".$adminsemail."' LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

 		while($row = mysqli_fetch_assoc($result)) { 
		 $adminsid=$row['adminsid']; 
		 $adminsemaildb=$row['adminsemail']; 
 		}

		// insert a tempreset value =======================================
		
		$temp=time();
		$IP = $_SERVER['REMOTE_ADDR'];
		
		$sql2 = "UPDATE admins SET temp='$temp', IP='$IP' WHERE adminsid='$adminsid'";
		
		if (mysqli_query($conn, $sql2)) {
			//echo "Record updated successfully";
		} else {
			//echo "Error updating record: " . mysqli_error($conn);
		}		

		mysqli_close($conn);
							
						 if (empty($adminsid)) // all fields needed
						 {							
						 
		?>
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Hummm!</strong> We searched the database and this email does not exist, are you sure?
        </div>   
        <?php

}
else
	{
		
		?>
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Perfect!</strong> We sent a recovery link for <?php echo $adminsemaildb ?> password to the main admin's email, if you are the main admin check your email for the link.<br />If you are not the main admin, contact your main admin for details.
        </div>   
        <?php	
		

		//======================send the reset link============================================

					$to = 'andre@centreholidays.com';//				
					$message = '<html>
					<body style="padding:10px; background:#fff; width:100%; max-width:800px; color:#000; font-family:Arial, Helvetica, sans-serif;">
					<div style="white-space:pre-wrap;">
					<img src="https://www.epikescapes.com/img/epik-escapes-logo-xl.png" style="width:150px; height:auto" />
					<hr />
					<h4 style="text-decoration:underline">Recovery Link</h4>';
					$message .= "<p>";
					$message .= 'https://www.epikescapes.com/admin/recover-reset.php?cat='.$adminsid.'&temp='.$temp;
					$message .= '</p></div></body></html>';
					
					$subject = 'Admin Recovery Link';
					$from =	"info@epikescapes.com";
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
					$headers .= 'Reply-To:'.$email. "\r\n" .
								'X-Mailer: PHP/' . phpversion();
																	
					mail($to,$subject,$message,$headers);


		//=============below if set then hide the input form======================================		
		
		$wassent='wassent';
		
	}
}
							}
		}
?>


<? ob_flush(); ?>