<? ob_start(); 
echo $currenttime=time();
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


//SHOULD BE A SEPRATE CROM JOB


		$sql1 = "SELECT * FROM ch_agents_log_in ORDER BY agentlogid DESC LIMIT 50";
		$result1 = mysqli_query($conn, $sql1);		

		// output data of each row
		while($row1 = mysqli_fetch_assoc($result1)) {
			
			$BusinessEmail1=$row1['BusinessEmail'];
			$agentlogip1=$row1['agentlogip'];
			$agentlogdate1=$row1['agentlogdate'];
			$country_name1=$row1['country_name'];
			$AgentUniqID1=$row1['AgentUniqID'];	
			$FirstName=$row1['FirstName'];	
			$LastName=$row1['LastName'];	
			
		$lasttime=$currenttime-$agentlogdate1;		
											
			
		$sql2 = "SELECT * FROM ch_agents_log_in WHERE BusinessEmail='$BusinessEmail1' ORDER BY agentlogid DESC LIMIT 1";		
		$result2 = mysqli_query($conn, $sql2);
		
				// output data of each row 
		while($row2 = mysqli_fetch_assoc($result2)) {
			
			$agentlogip2=$row2['agentlogip'];
			$agentlogdate2=$row2['agentlogdate'];
			
			$diflogdate=$agentlogdate2-$agentlogdate1;
			
			if (($agentlogip2 != $agentlogip1) && ($BusinessEmail1 !='andre@centreholidays.com') && ($diflogdate < 60) && ($lasttime < 3600))
			{
				
			$SuspectiedBusinessEmail1=$BusinessEmail1;
			if (!empty($SuspectiedBusinessEmail1))
		{
		echo "<strong style='color:#F00'>This email is associated with several IP locations (".$SuspectiedBusinessEmail1.', '.$agentlogip1.', '.$diflogdate.")</strong><br />";
		

		$sql = "INSERT INTO ch_agents_log_in_suspicious 
		(agentlogid, agentlogip, country_name, agentlogdate, AgentUniqID, BusinessEmail, FirstName, LastName) 
		VALUES ('', '$agentlogip1', '$country_name1', '$agentlogdate1', '$AgentUniqID1', '$BusinessEmail1', '$FirstName', '$LastName')";

		if (mysqli_query($conn, $sql)) {
    		//echo "<h4>Success</h4>";
			//header('Location: ../articles-add.php?results=success');
		} else {
			//echo "Error updating record: " . mysqli_error($conn);
			//header('Location: ../articles-add.php?results=error');
		}		
		
			
		$to = 'a.nas.mailing@gmail.com, andre@centreholidays.com';
		$subject = '(Notification) Email associated with several IP locations';
		$message = "<p>The below attempted to access the agents portal from different IP locations in 
		a very short time (60 seconds or less)</p>
		<hr />
		<strong style='color:#F00'>Business Email :".$SuspectiedBusinessEmail1.'
		<br /><br />IP :'.$agentlogip1.'
		<br /><br />Country :'.$country_name1.'
		<br /><br />Agent ID :'.$AgentUniqID1.'
		<br /><br />FirstName :'.$FirstName.'
		<br /><br />LastName:'.$LastName.'				
		<br /><br />Timestamp :'.$agentlogdate1."
		</strong>
		<br />";
		$from =	'noreply@epikescapes.com';
		$headers = "From: " . strip_tags($from) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
		$headers .= 'Reply-To:'.$from. "\r\n" .
					'X-Mailer: PHP/' . phpversion();	
				
			mail($to,$subject,$message,$headers);

			
		}			
			}
			else
			echo "";
			
			}
				
		}
		
 include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); 
 
ob_flush(); 

?>