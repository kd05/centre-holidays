<?php ob_start(); ?>
<?php
$currenttime=time();
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>

<style>
table {width:97% !important}
table th {text-align:center !important; padding-left:0px; max-width:100px}
textarea {white-space:pre-wrap !important}
</style>

</head>

<body class="fix-header">

<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">

<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/top-navigation.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/side-panel.php');?>
  <!-- Page Content -->
  <div id="page-wrapper" style="overflow-y:scroll; max-height: 100vh;">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
                    
<h3>Email Schedule</h3>
<p>Gray background means that the secured link has expired and/or the customer already replied.</p>
<p>White background means that the secured link has not expired and the customer did not reply yet.</p>
<p><strong>You can re-schedule to a different date if it's still active ie. white background and the scheduled date is not in the past.</strong></p>

<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">

<?php

//===============================list==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	 
		$sql = "SELECT * FROM email_schedule ORDER BY MID DESC LIMIT $offset, 300";
		
		//==========custom paginatnion===================
		
		$ttcount = mysqli_num_rows($result);
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		$Tsql = $sql = "SELECT * FROM email_schedule";
		$Tresult  = mysqli_query($conn, $Tsql);
		$Trow_cnt = mysqli_num_rows($Tresult);		
	
		if (isset($_GET['pages']))
		$pages=$_GET['pages'];
		else
		$pages=ceil($Trow_cnt/$row_cnt);
  
		$Net_cnt=$Trow_cnt-$offset;
	
	?>
	   <ul class="pagination">
        <?php 
        $x = 1; 
        $y = 0;
        do {
			?>
            <li style="list-style:none; float:left; margin-left:5px">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?offset=<?php echo $y ?>&pages=<?php echo $pages ?>&pagenumber=<?php echo $x ?>&ord=<?php echo $_GET['ord'] ?>"><?php echo $x ?></a>
            </li>     
            
            <?php
            $y=$y+300;
            $x++;
        } while ($x <= $pages);
        ?>
        </ul> 


		<?php
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>

<hr />
            
<table style="margin-top:10px">
<tr>
<th>ID</th>
<th>Agent</th>
<th>Operator</th>
<th>To</th>
<th>Replied?</th>
<th>Scheduled</th>
<th>Expiry</th>
<th>Permanent Link</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php

// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$MID=$row['MID'];
$AgentName=$row['AgentName'];
$AgentEmail=$row['AgentEmail'];
$AgentNumber=$row['AgentNumber'];
$Operator=$row['Operator'];
$BCNumber=$row['BCNumber'];
$ToName=$row['ToName'];
$ToMail=$row['ToMail'];
$Subject=$row['Subject'];
$ToMailBCC=$row['ToMailBCC'];
$schedule=$row['schedule'];
$BookingReference=$row['BookingReference'];
$AdditionalNotes=$row['AdditionalNotes'];
$FirstTravellerType=$row['FirstTravellerType'];
$FirstNumberOfTravellers=$row['FirstNumberOfTravellers'];
$FirstAmountPerPerson=$row['FirstAmountPerPerson'];
$SeconedTravellerType=$row['SeconedTravellerType'];
$SeconedNumberOfTravellers=$row['SeconedNumberOfTravellers'];
$SeconedAmountPerPerson=$row['SeconedAmountPerPerson'];
$ThirdTravellerType=$row['ThirdTravellerType'];
$ThirdNumberOfTravellers=$row['ThirdNumberOfTravellers'];
$ThirdAmountPerPerson=$row['ThirdAmountPerPerson'];
$CurrencyType=$row['CurrencyType'];
$ServiceFee=$row['ServiceFee'];
$TotalAmount=$row['TotalAmount'];
$PaymentOptions=$row['PaymentOptions'];
$FirstPaymentType=$row['FirstPaymentType'];
$MultiFirstAmount=$row['MultiFirstAmount'];
$datepickerautoclose2=$row['datepickerautoclose2'];
$SeconedPaymentType=$row['SeconedPaymentType'];
$MultiSeconedAmount=$row['MultiSeconedAmount'];
$datepickerautoclose3=$row['datepickerautoclose3'];
$ThirdPaymentType=$row['ThirdPaymentType'];
$MultiThirdAmount=$row['MultiThirdAmount'];
$datepickerautoclose4=$row['datepickerautoclose4'];
$FourthPaymentType=$row['FourthPaymentType'];
$MultiFourthAmount=$row['MultiFourthAmount'];
$datepickerautoclose5=$row['datepickerautoclose5'];
$FifthPaymentType=$row['FifthPaymentType'];
$MultiFifthAmount=$row['MultiFifthAmount'];
$datepickerautoclose6=$row['NumberOfMonths'];
$NumberOfMonths=$row['NumberOfMonths'];
$deposit=$row['deposit'];
$MonthlyPlanInstallments=$row['MonthlyPlanInstallments'];
$exptime=$row['exptime'];
$schedulestatus=$row['schedulestatus'];
$IP=$row['IP'];	
$customerreplied=$row['customerreplied'];

//=============================================================

$difference=$exptime-$currenttime;
$active=$row['customerreplied'];

if ($difference < 0 || $active==1)
{
$mybakg='style="background:#666 !important"';
$dis='disabled';
}
elseif ($difference > 0 || $active==0)
{
$mybakg='style="background:#fff !important"';
$dis='';
}
//========================
if ($active==0)
$customer='No';
elseif ($active==1)
$customer='<strong>Yes</strong>';
//=======================
$difference2=$schedule-$currenttime;
if ($difference2 < 0)
$dis='disabled';
elseif ($difference2 > 0)
$dis='';


$counter=$counter+1;

?>
<form action="ch-email/update-email.php" method="post" enctype="multipart/form-data">
<tr class="selectedtr" <?php echo $mybakg ?>>
<td><input type="hidden" value="<?php echo $MID ?>" name="MID" id="MID"/><?php echo $counter; ?></td>
<td><?php echo $row['AgentName']; ?></td>
<td><?php echo $row['Operator']; ?></td>
<td><?php echo $row['ToName']; ?> </td>
<td><?php echo $customer; ?> </td>
<td><input type="text" name="schedule" <?php echo $dis ?> value="<?php echo date('m/d/Y', $row['schedule']); ?>" class="form-control datepicker-autoclose" id="schedule" placeholder="mm/dd/yyyy"/></td>
<td><?php echo date('m/d/Y', $exptime); ?></td>
<td>
<textarea onclick="this.focus(); this.select()" readonly style="background:#CCC"><?php echo "https://www.centreholidaysagents.com/email/customer-cc-auth-form.php?tme=".$exptime.'&bref='.$BookingReference.'&exp='.$MID ?></textarea>
</td>
<td><input type="submit" value="Update" class="btn btn-primary" <?php echo $dis ?> /></td>
<td><a href="ch-email/delete-email.php?MID=<?php echo $row['MID']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()">Delete</a></td>
</tr>
</form>
<?php

		}
?>

</table>
</div>

<?php
	}
?>



</div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/right-panel.php');?>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>

</body>
</html>

</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>