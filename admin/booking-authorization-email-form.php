<?php ob_start(); ?>
<?php
$outh='P8ez7FHxJcy0hwMnd9HEv8CgWM29x';
$masttime=time();
$mastpass=substr(md5(rand().$masttime), 0, 20);
$mastip=$_SERVER['REMOTE_ADDR'];
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 


$sql = "INSERT INTO master_pass (mastid, mastpass, masttime, mastip) 
VALUES ('', '$mastpass', '$masttime', '$mastip')";

if (mysqli_query($conn, $sql)) {
	//echo "<h4>Success</h4>";
} else {
	//echo "Error updating record: " . mysqli_error($conn);
} 


?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>

<style>
table th, td {text-align:left !important; padding:5px;}
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
                    
<h3>Booking Authorization Email Form</h3>
<p>Scroll left/right to see the full table</p>

<div style="width:100%; overflow-x:scroll; background:none !important; margin-bottom:100px">

<table>
<thead>
<tr>
<th>BookID</th>
<th>Agent</th>
<th>Sender</th>
<th>Sent To</th>
<th>Subject</th>
<th>Group</th>
<th>Sent</th>
<th>Seen</th>
<th>Reviewed</th>
<th>Edit</th>
<th>Client Reply</th>
<th>Status</th>
<th>Shareable Link</th>
<th>Permanent Link</th>
<th>Master Password Link</th>
<th>Delete</th>
</tr>
</thead>

<tbody>
<?php

$ptime=time()-(60*60*24*7);

$sql = "SELECT * FROM booking_1, booking_2 WHERE booking_1.BookID=booking_2.BookID2 ORDER BY booking_1.BookID DESC";
$result = mysqli_query($conn, $sql);
	
$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt > 0)
{
	
while($row = mysqli_fetch_assoc($result)) {

$counter=$counter+1;

if (!empty($row['BookID']))
$BookID=$row['BookID'];
else
$BookID=$row['BookID2'];

$AgentID=$row["AgentID"];

$BookingIP=$row["BookingIP"];
$BookingCIP=$row["BookingCIP"];
$BookingTime2=$row["BookingTime2"];
$BookingTime3=$row["BookingTime3"];
$BookingTime4=$row["BookingTime4"];
$BookingTime5=$row["BookingTime5"];
$BookingTime6=$row["BookingTime6"];


$EmaiToEmail=$row["EmaiToEmail"];
$FormCancelled=$row["FormCancelled"];
$CovidAccepted=$row['CovidAccepted'];//2/////////////////////////////////
$TripAccepted=$row['TripAccepted'];//3///////////////////////////////////
$TermAccepted=$row['TermAccepted'];//4///////////////////////////////////
$CancelAccepted=$row['CancelAccepted'];//5///////////////////////////////
$TripPricingAccepted=$row['TripPricingAccepted'];//6 /////////////////////
$AdditionalConsent=$row['AdditionalConsent']; //7////////////////////////
$DetailsCorrectConsent=$row['DetailsCorrectConsent'];//8/////////////////
$InsuranceAccepted=$row['InsuranceAccepted']; //===========9//////////////////////////
$PurchaseInsurance=$row['PurchaseInsurance'];//No================================10/////////////
$PTravellerConsent1=$row['PTravellerConsent1']; //11////////////////////
$PTravellerConsent2=$row['PTravellerConsent2']; //12////////////////////
$AddTravelConsent1=$row['AddTravelConsent1']; //13/////////////////////////
$AddTravelConsent2=$row['AddTravelConsent2'];//14/////////////////////////
$InsuranceNoReason =$row['InsuranceNoReason'];
$InsuranceProvider=$row['InsuranceProvider'];
$sigdataUrl1=$row['sigdataUrl1'];
$EmaiToSubject=$row['EmaiToSubject'];
$EmaiToFullName=$row['EmaiToFullName'];
$BusinessEmail=$row['BusinessEmail'];
$ServiceAccepted=$row["ServiceAccepted"];
$BookingCIP=$row["BookingCIP"];
$GroupName=$row["GroupName"];
$UGroupName=$row["UGroupName"];
$EmailToType=$row["EmailToType"];
$TripDetails=$row['TripDetails'];
$TripDetailsPDF=$row['TripDetailsPDF'];
$BookingNumber=$row['BookingNumber'];
$Supplier=$row['Supplier'];
$BookUnique=$row["BookUnique"];
$TermsType=$row['TermsType'];
$TermsAndConditionsPDF=$row['TermsAndConditionsPDF'];
$TermsAndConditions=$row['TermsAndConditions'];
$CancellationPolicy=$row['CancellationPolicy'];
$CancellationPolicyPDF=$row['CancellationPolicyPDF'];
$AdditionalTitle1=$row['AdditionalTitle1'];
$AdditionalTitle2=$row['AdditionalTitle2'];
$AdditionalTitle3=$row['AdditionalTitle3'];
$QuoteTotalFee=$row['QuoteTotalFee']; 
$BookingTotalFee=$row['BookingTotalFee'];
$TripGrandTotal=$row['TripGrandTotal'];
$InsuranceGrandTotal=$row['InsuranceGrandTotal'];
$PTravellerParty=$row['PTravellerParty'];
$BookingTimeRep=$row['BookingTimeRep'];
$BookingTime=$row["BookingTime"];
$BookingStatus=$row['BookingStatus'];

$BusinessFullName=$row['BusinessFullName'];
$PTravellerFName=$row['PTravellerFName'];
$AgentPrevIP=$row['AgentPrevIP'];

if (!empty($row['BookingFeePerPerson']))
$formtype='Booking Authorization Email Form';

//=====================count how many fileds their=========================
if (!empty($ServiceAccepted)) $appr1=1; else $appr1=0;//------------------

if (!empty($CovidAccepted)) $appr2=1; else $appr2=0;

if (!empty($TripDetails) || !empty($TripDetailsPDF) || !empty($BookingNumber) || !empty($Supplier)) //-------
$appr3=1; else $appr3=0;

if (!empty($TermsType) || !empty($TermsAndConditionsPDF) || !empty($TermsAndConditions))//-------------------
$appr4=1; else $appr4=0;

if (!empty($CancellationPolicy) || !empty($CancellationPolicyPDF))//---------------
$appr5=1; else $appr5=0;

if (!empty($TripPricingAccepted)) //----------------------------
$appr6=1; else $appr6=0;

if (!empty($AdditionalTitle1) || !empty($AdditionalTitle2) || !empty($AdditionalTitle3))//----------------
$appr7=1; else $appr7=0;

if ($QuoteTotalFee !='0' || $BookingTotalFee !='0' || $TripGrandTotal !='0' || $InsuranceGrandTotal !='0') //---------
$appr8=1; else $appr8=0;

if (!empty($PurchaseInsurance) || !empty($InsuranceNoReason) || !empty($InsuranceProvider) || $PurchaseInsurance=='Yes' || (!empty($sigdataUrl1)))
$appr9=1; else $appr9=0;

if ($PTravellerConsent1=='Yes' && $PTravellerConsent2=='Yes') 
$appr10=1; else $appr10=0; 

//if (!empty($PTravellerParty))
//$appr11=1; 
//else 
//$appr11=0;

//========================count how many approved===========================
//if ($ServiceAccepted=='Yes' && ($appr1 !=0 || !empty($appr1))) $qappr1=1; else $qappr1=0;
if ($CovidAccepted=='Yes' && ($appr2 !=0 || !empty($appr2))) $qappr2=1; else $qappr2=0;
if ($TripAccepted=='Yes' && ($appr3 !=0 || !empty($appr3))) $qappr3=1; else $qappr3=0;
if ($TermAccepted=='Yes' && ($appr4 !=0 || !empty($appr4))) $qappr4=1; else $qappr4=0;
//if ($CancelAccepted=='Yes' && ($appr5 !=0 || !empty($appr5))) $qappr5=1; else $qappr5=0;
if ($TripPricingAccepted=='Yes' && ($appr6 !=0 || !empty($appr6))) $qappr6=1; else $qappr6=0;
//if ($AdditionalConsent=='Yes' && ($appr7 !=0 || !empty($appr7))) $qappr7=1; else $qappr7=0;
if ($DetailsCorrectConsent=='Yes' && ($appr8 !=0 || !empty($appr8))) $qappr8=1; else $qappr8=0;
//if (($InsuranceAccepted=='Yes' || $PurchaseInsurance=='No')  && ($appr9 !=0 || !empty($appr9))) $qappr9=1; else $qappr9=0;
if ($PTravellerConsent1=='Yes' && $PTravellerConsent2=='Yes'  && ($appr10 !=0 || !empty($appr10))) $qappr10=1; else $qappr10=0;
//if ($AddTravelConsent1=='Yes' || $AddTravelConsent2=='Yes'  && ($appr11 !=0 || !empty($appr11))) $qappr11=1; else $qappr11=0;

$Totalsections=$appr2+$appr3+$appr4+$appr6+$appr8+$appr10;
$Totalapproved=$qappr2+$qappr3+$qappr4+$qappr6+$qappr8+$qappr10;
$TOutsec=$appr1+$appr7+$appr9+$appr5;// not included sections
$TOutapproved=$qappr1+$qappr7+$qappr9+$qappr5;// not included sections

if (($BookingTime < $ptime) && (!empty($row["BookUnique"])))
$BookingStatus=99;
elseif ($Totalapproved >= $Totalsections)
$BookingStatus=4;
elseif ($ServiceAccepted=='No' || $AdditionalConsent=='No' || ($InsuranceAccepted=='No' || $PurchaseInsurance=='Yes'))
$BookingStatus=3;

//=====================================================================

$backgr='#fff !important';

//===============status================================================
switch ($BookingStatus) {
  case "1":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-primary label-inline">Sent</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique='.$BookUnique;
    break;
  case "2":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-warning label-inline">Viewed</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique='.$BookUnique;
	break;
  case "3":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-danger label-inline">Reviewing</span>';
	$AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique='.$BookUnique;
	break;
  case "4":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-success label-inline">Approved</span>';
    $AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique='.$BookUnique;
	break;	
  case "99":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-default label-inline" style="color:#000">Expired</span>';
    $AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique='.$BookUnique;
	$backgr='#666 !important';
	break;	
  case "0":
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-default label-inline" style="color:#000">Draft</span>';
	$AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form.php?BookID='.$AssignedBookID;
    break;				
}

//==========================in case $EmailToType=='Shareable Link'======================
if ($EmailToType=='Shareable Link')
$backgr='#DBDBDB !important';


//======================================================================================
if ($FormCancelled=='Yes')
{
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-danger label-inline text-uppercase">Cancelled</span>';
	$AssignedBookID=$row['BookID'];	
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique'.$BookUnique;
}

if (!empty($BookingTimeRep) && $BookingStatus !=1)
{
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-primary label-inline">Sent</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&BookUnique'.$BookUnique;	
}

if ((!empty($GroupName)) || (empty($GroupName)))//$GroupName !=$GroupName1 && 
{
?>
<tr style="background:<?php echo $backgr ?>">
<td><strong><?php echo $BookID ?></strong></td>
<td><?php echo $AgentID ?></td>
<td><?php echo $EmaiToFullName; ?></td>
<td><?php echo $EmaiToEmail ?></td>
<td><?php echo $EmaiToSubject; ?></td>
<td><strong><?php echo $GroupName ?></strong></td>
<td><?php if ($BookingStatus !=0) {echo $BusinessFullName ?> (IP: <?php echo $BookingIP;  ?>) created and sent a booking authorization email form to <?php echo $EmaiToFullName ?> on <?php echo date('M d, Y @  h:i:s a',$BookingTime) ?>.<?php } ?></td>
<td><?php if (!empty($BookingTime2) && $BookingStatus !=0) { ?>Booking authorization email form seen by <?php echo $EmaiToFullName ?> on <?php echo  date('M d, Y @  h:i:s a',$BookingTime2) ?>.<?php } ?></td>
<td><?php if (!empty($PTravellerFName) && $BookingStatus !=0) { ?>Booking authorization email form sent by <?php echo $PTravellerFName.' '.$PTravellerLName; ?> (IP: <?php echo $BookingCIP ?>) Reviewed by <?php echo $BusinessFullName ?> on <?php echo date('M d, Y @  h:i:s a',$BookingTime5) ?>.<?php } ?></td>
<td><?php if (!empty($BookingTime5) && $BookingStatus !=0) { ?>Booking authorization edited by the agent <?php echo $BusinessFullName ?> (IP: <?php echo $AgentPrevIP ?>) <?php echo ' in '.date('M d, Y @  h:i:s a',$BookingTime5) ?>.<?php } ?></td>
<td><?php if (!empty($BookingTime6) && $BookingStatus !=0) { ?>Client replied after review <?php echo $BusinessFullName ?> (IP: <?php echo $AgentPrevIP ?>) <?php echo ' in '.date('M d, Y @  h:i:s a',$BookingTime6) ?>.<?php } ?></td>
<td><?php echo trim($DBookingStatus); ?></td>
<td>
<?php if ($EmailToType=='Shareable Link') { ?>
<textarea readonly="1" rows="10" spellcheck="false" onclick="this.focus(); this.select()" style="width:100%; height:90px; background:#EEE; color:#000">
https://centreholidays.com/clients/booking-authorization-email-form-shareable-link.php?bq=<?php echo $BookUnique ?>&outh=<?php echo $outh ?>&BookID=<?php echo $BookID ?>&shatim=<?php echo time(); ?>
</textarea>
<?php } ?>
</td>
<td>
<?php if ($EmailToType !='Shareable Link') { ?>
<textarea readonly="1" rows="10" spellcheck="false" onclick="this.focus(); this.select()" style="width:100%; height:90px; background:#EEE; color:#000">
https://centreholidays.com/clients/booking-authorization-email-form.php?bq=<?php echo $BookUnique ?>&outh=<?php echo $outh ?>&BookID=<?php echo $BookID ?>
</textarea>
<?php } ?>
</td>
<td>
<?php if ($EmailToType !='Shareable Link') { ?>
<a href="<?php echo 'https://centreholidays.com/agents/booking-authorization-email-form-preview.php?BookID='.$BookID.'&allow=no&bq='.$BookUnique.'&outh='.$outh.'&mastpass='.$mastpass.'&agid='.$AgentID; ?>" target="_new" class="btn btn-primary">Preview</a></td>
<?php } ?>
<td>

<?php
if (empty($AssignedBookID))
$AssignedBookID=$BookID;
else
$AssignedBookID=$AssignedBookID;
?>


  <?php if ($EmailToType=='Single') { ?>
  
  <?php if (($BookingStatus==99 || $BookingStatus==2 || $BookingStatus==3 || $BookingStatus==4) && !empty($BookUnique) && !empty($BookingCIP)) { ?>
<!--  <a href="booking-authorization-email-form-preview.php?BookID=<?php //echo $AssignedBookID ?>&allow=no" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Preview">	                            
  <span>	                                
  <i class="fas fa-eye text-warning"></i>                           
  </span>	
  </a>-->
  <?php if (($BookingStatus !=4 || $Totalsections !=7) && $FormCancelled !='Yes') { ?>
<!--  <a href="<?php //echo $pagelink ?>" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>	
  		-->			
  <?php }} ?>
  
  <?php if ($BookingStatus==2 && !empty($BookUnique)) { ?>
<!--  <a href="duplicate-booking-authorization.php?AgentID=<?php //echo $AgentID ?>&BookID=<?php //echo $AssignedBookID ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?> 
  

   <?php if ($BookingStatus==0) { ?>
<!--  <a href="<?php //echo $pagelink ?>" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>	-->
  <?php } ?>
  
  
  <?php if (!empty($BookUnique) && $BookingStatus !=0 && $BookingStatus !=1 && $BookingStatus !=2) { ?>
  
  
  <?php if ($FormCancelled !='Yes') { ?>
<!--  <a href="duplicate-booking-authorization.php?AgentID=<?php //echo $AgentID ?>&BookID=<?php //echo $AssignedBookID ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?>
  
  <?php } elseif ($BookingStatus !=1 && $BookingStatus !=2) { ?>
<!--  <a href="delete-booking-duplicate.php?BookID=<?php //echo $AssignedBookID ?>" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-lg btn-clean btn-icon mr-2" title="Delete">	                            
  <span>	                                
  <i class="fas fa-trash text-danger"></i>	                            
  </span>							
  </a> -->
  <?php } ?>
  
  
  
  <?php if (($BookingStatus==3 || $BookingStatus==99) && !empty($BookUnique)) { ?>
<!--  <a href="delete-booking-duplicate.php?BookID=<?php //echo $AssignedBookID ?>" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-lg btn-clean btn-icon mr-2" title="Delete">	                            
  <span>	                                
  <i class="fas fa-trash text-danger"></i>	                            
  </span>							
  </a>-->
  <?php } ?>    
  
  <?php if (!empty($BookUnique)) { ?>
<!--  <a href="duplicate-booking-authorization.php?AgentID=<?php //echo $AgentID ?>&BookID=<?php// echo $AssignedBookID ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?>
  
  <a href="https://centreholidays.com/agents/delete-booking-duplicate.php?BookID=<?php echo $AssignedBookID ?>&source=admin" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-danger" title="Delete">	                            
  Delete						
  </a>
  
  <?php } if ($EmailToType=='Multiple' || $EmailToType=='Shareable Link') { ?>
  
  <?php if (empty($BookUnique)) { ?>
<!--  <a href="booking-authorization-email-form.php?BookUnique=<?php //echo $BookUnique?>&BookID=<?php //echo $BookID ?>&EmailToType=<?php //echo $row['EmailToType'] ?>&GroupName=<?php //echo $GroupName ?>&UGroupName=<?php //echo $UGroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?>
  
  <?php if (!empty($BookUnique)) { ?>
<!--  <a href="manage-email-forms-groups.php?GroupName=<?php //echo $GroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="<?php //echo $EmaiToFullName ?> Group">	                            
  <span>	                                
  <i class="fas fa-users text-warning"></i>                           
  </span>							
  </a> 
  
  
  <a href="duplicate-booking-authorization.php?AgentID=<?php //echo $AgentID ?>&BookID=<?php //echo $AssignedBookID ?>&EmailToType=<?php //echo $EmailToType ?>&GroupName=<?php //echo $GroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate Group">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?>
  
  <?php if ($BookingStatus==0) { ?>
  <a href="https://centreholidays.com/agents/delete-booking-duplicate-group.php?UGroupName=<?php echo $UGroupName ?>&source=admin" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-danger" title="Delete">	                            
  Delete							
  </a>
  <?php } else { ?>
  <a href="https://centreholidays.com/agents/delete-booking-duplicate-group.php?GroupName=<?php echo $GroupName ?>&source=admin" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-danger" title="Delete">	                            
  Delete						
  </a>
  
<?php } } ?>

</td>


</tr>
                                 
<?php
if (!empty($BookUnique))
$GroupName1=$GroupName;

	}

  }
}

mysqli_close($conn);
?> 

</table>

</div>





</div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/right-panel.php');?>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>


</div>
</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>