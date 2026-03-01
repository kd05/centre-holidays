<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Manage Email Forms - Agent Portal | Centre Holidays</title>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?> 	
		
	<style>
    .manage-results { display:none; }
    </style>  

 
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
    	<!--begin::Main-->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header-mobile.php');?>
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside-manage-email-forms.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
<!--START Search------------------------------------------------------------------------->
<?php
$managesearch=trim(str_replace( array( '\'', '"', ',' , ';', '<', '>', '!', '&', '|', '/'), ' ',  $_GET['managesearch']));
$pieces = explode(" ", $managesearch);
?>

<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/img/agents/faqs-c01.jpg')">
<div class="container">

<div class="d-flex align-items-stretch text-center flex-column py-40">
<!--begin::Form-->
<form class="d-flex position-relative w-75 px-lg-40 m-auto" action="<?php echo $_SERVER['PHP_SELF'] ?>#email-forms-list" method="get" enctype="multipart/form-data">
<div class="input-group">
<!--begin::Input-->
<input type="text" id="managesearch" value="<?php echo $managesearch; ?>" maxlength="100" required name="managesearch" class="form-control h-auto border-0 py-7 px-7 font-size-h6" placeholder="Search Within This Page">
<div class="input-group-append">
<button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
</div>
<!--end::Input-->
</div>
</form>
<!--end::Form-->
</div>
</div>
</div>
<!--END Search------------------------------------------------------------------------->
<!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
<div class=" container ">
<!--begin::title-->
<div class="row justify-content-center pl-10 pr-10">
<div class="text-center pt-11 col-xl-12">
<h1 class="font-weight-boldest text-uppercase text-dark display-3">Manage Email Forms</h1>
<h2 class="text-dark-65 font-weight-bolder">Access and manage all of your email forms including tracking their status.</h2>				
</div>
</div>
<!--end::title-->
</div>

</div>
<!--end::Hero-->
<!--begin::Section-->
<div class="container mt-10">
<!--begin::Modules-->
<div class="row mb-15">
<!--begin::Item-->
	<div class="col-xl-12 col-md-12 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-danger.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Important Details" data-toggle="modal" data-target="#important-details-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Important Details</h2>
<h6>Review First Before Proceeding</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="important-details-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-danger">Important Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Email forms that you have sent to your client(s) or received from them are displayed below. Each email form will have a status label and depending on where it is in the pipeline, the status label will update accordingly.</p>
<h3 class="mt-10 font-weight-bolder">Status Labels</h3>
<ul>
<li><b>Sent:</b> Your email form has been sent to your client(s).</li>
<li><b>Viewed:</b> Your client(s) have viewed the email form.</li>
<li><b>Approved:</b> Your client(s) have approved all of the provided details.</li>
<li><b>Please Review:</b> Your client(s) have not approved all of the provided details or have requested. You may need to edit the form and re-send it to them.</li>
<li><b>Expired:</b> Your client(s) have not viewed the email form and it has expired as it has gone past the form's expiry date. You may need to re-send it to them.</li>
</ul>
<h3 class="mt-10 font-weight-bolder">Settings (Icons)</h3>
<p>Depending on the status of an email form, you will have various settings made available to you.</p>
<!--begin::Settings Description-->
<div class="d-flex align-items-center mb-5">
<!--begin::Symbol-->
<div class="symbol symbol-40 symbol-light mr-5">
<span class="symbol-label">
<span>
<i class="fas fa-users text-warning"></i>															
</span>
</span>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span>Access email forms sent to multiple clients (eg: group trip).</span>
</div>
<!--end::Text-->
</div>
<!--end::Settings Description-->
<!--begin::Settings Description-->
<div class="d-flex align-items-center mb-5">
<!--begin::Symbol-->
<div class="symbol symbol-40 symbol-light mr-5">
<span class="symbol-label">
<span>
<i class="fas fa-eye text-warning"></i>															
</span>
</span>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span>Preview an email form once it has been viewed or sent back to you.</span>
</div>
<!--end::Text-->
</div>
<!--end::Settings Description-->
<!--begin::Settings Description-->
<div class="d-flex align-items-center mb-5">
<!--begin::Symbol-->
<div class="symbol symbol-40 symbol-light mr-5">
<span class="symbol-label">
<span>
<i class="fas fa-edit text-warning"></i>															
</span>
</span>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span>Edit an email form.</span>
</div>
<!--end::Text-->
</div>
<!--end::Settings Description-->
<!--begin::Settings Description-->
<div class="d-flex align-items-center mb-5">
<!--begin::Symbol-->
<div class="symbol symbol-40 symbol-light mr-5">
<span class="symbol-label">
<span>
<i class="fas fa-clone text-warning"></i>															
</span>
</span>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span>Duplicate an email form you have already created.</span>
</div>
<!--end::Text-->
</div>
<!--end::Settings Description-->
<!--begin::Settings Description-->
<div class="d-flex align-items-center mb-5">
<!--begin::Symbol-->
<div class="symbol symbol-40 symbol-light mr-5">
<span class="symbol-label">
<span>
<i class="fas fa-trash text-warning"></i>															
</span>
</span>
</div>
<!--end::Symbol-->
<!--begin::Text-->
<div class="d-flex flex-column font-weight-bold">
<span>Delete an email form.</span>
</div>
<!--end::Text-->
</div>
<!--end::Settings Description-->
<div class="alert alert-custom alert-danger mb-5 mt-10" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
If you require assistance or experience any issues, please email <b>support@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>
<!--end::Modules-->
<!--begin::Manage Email Forms-->
<div id="email-forms-list">
<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-3x justify-content-center">
<li class="nav-item">
<a class="nav-link active font-weight-bolder font-size-lg text-dark text-uppercase" data-toggle="tab" href="#email-forms-tab">Email Forms</a>
</li>
</ul>
<div class="tab-content mt-10" id="contact-content">
<div class="tab-pane fade active show" id="email-forms-tab-tab" role="tabpanel" aria-labelledby="email-forms-tab">
<div class="row mb-20">
<!--begin::Item-->
<?php
$ptime=time()-(60*60*24*7);
//=================================================================================================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "SELECT * FROM booking_1, booking_2 WHERE booking_1.AgentID='$AgentID' AND booking_2.BookID2=booking_1.BookID ";

if (!empty($managesearch))
$sql .= " AND (booking_1.PricingDescription1 LIKE '%".$managesearch."%' 
|| booking_1.PricingDescription2 LIKE '%".$managesearch."%' 
|| booking_1.PricingDescription3 LIKE '%".$managesearch."%' 
|| booking_1.PricingDescription4 LIKE '%".$managesearch."%' 
|| booking_1.PricingDescription5 LIKE '%".$managesearch."%' 
|| booking_1.TripDetails LIKE '%".$managesearch."%' 
|| booking_1.BookingNumber LIKE '%".$managesearch."%' 
|| booking_1.Supplier LIKE '%".$managesearch."%' 
|| booking_1.GroupName LIKE '%".$managesearch."%' 
|| booking_1.EmaiToFullName LIKE '%".$managesearch."%' 
|| booking_1.EmaiToEmail LIKE '%".$managesearch."%' 
|| booking_1.EmaiToSubject LIKE '%".$managesearch."%')";


$sql .= " ORDER BY booking_1.BookID DESC";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {

$counter=$counter+1;

if (!empty($row['BookID']))
$BookID=$row['BookID'];
else
$BookID=$row['BookID2'];

$PtravellerEmail=$row["PtravellerEmail"];
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
$BookingFeeTotal=$row['BookingFeeTotal'];
$TripGrandTotal=$row['TripGrandTotal'];
$InsuranceGrandTotal=$row['InsuranceGrandTotal'];
$PTravellerParty=$row['PTravellerParty'];
$BookingTimeRep=$row['BookingTimeRep'];
$BookingTime=$row["BookingTime"];
$BookingStatus=$row['BookingStatus'];

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

if ($QuoteTotalFee !='0' || $BookingFeeTotal !='0' || $TripGrandTotal !='0' || $InsuranceGrandTotal !='0') //---------
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
if ($ServiceAccepted=='Yes' && ($appr1 !=0 || !empty($appr1))) $qappr1=1; else $qappr1=0;
if ($CovidAccepted=='Yes' && ($appr2 !=0 || !empty($appr2))) $qappr2=1; else $qappr2=0;
if ($TripAccepted=='Yes' && ($appr3 !=0 || !empty($appr3))) $qappr3=1; else $qappr3=0;
if ($TermAccepted=='Yes' && ($appr4 !=0 || !empty($appr4))) $qappr4=1; else $qappr4=0;
//if ($CancelAccepted=='Yes' && ($appr5 !=0 || !empty($appr5))) $qappr5=1; else $qappr5=0;
if ($TripPricingAccepted=='Yes' && ($appr6 !=0 || !empty($appr6))) $qappr6=1; else $qappr6=0;
//if ($AdditionalConsent=='Yes' && ($appr7 !=0 || !empty($appr7))) $qappr7=1; else $qappr7=0;
if ($DetailsCorrectConsent=='Yes' && ($appr8 !=0 || !empty($appr8))) $qappr8=1; else $qappr8=0;
if (($InsuranceAccepted=='Yes' || $PurchaseInsurance=='No')  && ($appr9 !=0 || !empty($appr9))) $qappr9=1; else $qappr9=0;
if ($PTravellerConsent1=='Yes' && $PTravellerConsent2=='Yes'  && ($appr10 !=0 || !empty($appr10))) $qappr10=1; else $qappr10=0;
//if ($AddTravelConsent1=='Yes' || $AddTravelConsent2=='Yes'  && ($appr11 !=0 || !empty($appr11))) $qappr11=1; else $qappr11=0;

//================================================================================
$Totalsections=$appr1+$appr2+$appr3+$appr4+$appr6+$appr8+$appr9+$appr10;//
$Totalapproved=$qappr1+$qappr2+$qappr3+$qappr4+$qappr6+$qappr8+$qappr9+$qappr10;//
//=================================================================================

$TOutsec=$appr1+$appr7+$appr9+$appr5;// not included sections
$TOutapproved=$qappr1+$qappr7+$qappr9+$qappr5;// not included sections

if (($BookingTime < $ptime) && (!empty($row["BookUnique"])))
$BookingStatus=99;
elseif ($Totalapproved >= $Totalsections)
$BookingStatus=4;
elseif ($ServiceAccepted=='No' || $AdditionalConsent=='No' || ($InsuranceAccepted=='No' || $PurchaseInsurance=='Yes'))
$BookingStatus=3;


//===============status================================================
    if ($BookingStatus == 1) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-dark label-inline">Sent</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique='.$BookUnique;
	} elseif ($BookingStatus == 2) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-warning label-inline">Viewed</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique='.$BookUnique;
	} elseif ($BookingStatus == 3) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-danger label-inline">Please Review</span>';
	$AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique='.$BookUnique;
	} elseif ($BookingStatus == 4) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-success label-inline">Approved</span>';
    $AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique='.$BookUnique;
	} elseif ($BookingStatus == 99 && ($BookingStatus !=4 || $BookingStatus !=3)) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-default label-inline">Expired</span>';
    $AssignedBookID=$row['BookID'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique='.$BookUnique.'&access='.time();
	} elseif ($BookingStatus == 0) {
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light label-inline">Single Draft</span>';
	$AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form.php?BookID='.$AssignedBookID.'&AgentID='.$AgentID;
	}			


//=============================================FILTER================================================
$searchFilter=$_GET['searchFilter'];

$searchFilter2=$_GET['searchFilter2'];

if (empty($_GET['searchFilter2']) && empty($_GET['searchFilter']))
$searchFilter3='All';

//echo $searchFilter[0];
//echo $BookingStatus;

//$BookingStatus = 1;// sent
//$BookingStatus = 2;// viewed
//$BookingStatus = 3;//please review
//$BookingStatus = 4;// aproved
//$BookingStatus = 99;//expierd
//$BookingStatus = 0;//draft

if ($searchFilter[0]==$BookingStatus || $searchFilter[1]==$BookingStatus || $searchFilter[2]==$BookingStatus || $searchFilter[3]==$BookingStatus || $searchFilter[4]==$BookingStatus || $searchFilter[5]==$BookingStatus || !empty($searchFilter2[0]) || !empty($managesearch) || !empty($searchFilter3))
{
$displayfilter=1;
$filtercount=$filtercount+1;

//===================================================================================================

if ($EmailToType=='Shareable Link')
{
$DBookingStatus='<span class="label font-weight-bolder label-lg label-light label-inline">Shareable Link Draft</span>';
}

if ($EmailToType=='Multiple')
{
$DBookingStatus='<span class="label font-weight-bolder label-lg label-light label-inline">Group Draft</span>';
}

if ($FormCancelled=='Yes')
{
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-light-danger label-inline text-uppercase">Cancelled</span>';
	$AssignedBookID=$row['BookID'];	
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique'.$BookUnique.'&access='.time();
}

if (!empty($BookingTimeRep) && $BookingStatus !=1)
{
    $DBookingStatus='<span class="label font-weight-bolder label-lg label-dark label-inline">Sent</span>';
    $AssignedBookID=$row['BookID2'];
	$pagelink='booking-authorization-email-form-preview.php?BookID='.$AssignedBookID.'&agentcron=0&BookUnique'.$BookUnique.'&access='.time();	
}

//===========================================================================================================

if (($GroupName !=$GroupName1 && !empty($GroupName)) || (empty($GroupName)))
{
	
?>
<div class="col-xxl-4 col-xl-6 col-md-6 manage-results">
            <!--begin::Mixed Widget 11-->
            <div class="card card-custom card-border gutter-b card-stretch text-dark">
            <div class="card-header justify-content-center bg-dark" style="min-height:30px;">
            <div class="card-title text-white">
            
            <!--FORM TYPE IN BLUE BACKGORIND-->
            <p class="font-weight-bolder small text-uppercase mb-0"><?php echo $formtype; ?> (ID <?php echo $BookID; ?>)</p>
            
            </div>
            </div>			
            <!--begin::Body-->
            <div class="card-body d-flex flex-column">
            <div class="flex-grow-1 pb-5">
            <!--begin::Info-->
            <div class="d-flex align-items-center pr-2 mb-6">
            <span class="flex-grow-1">
            <?php if (!empty($BookingTime) && $EmailToType !='Multiple' && $EmailToType !='Shareable Link') { ?>
            <span class="label label-lg label-left label-inline font-weight-bolder text-dark text-uppercase">Email Sent <?php echo trim(date('m/d/Y', $BookingTime)); ?></span><?php } ?>
            </span>
            
            <?php if (!empty($BookUnique) && ($EmailToType=='Multiple' || $EmailToType=='Shareable Link')) {  
			echo '<span class="label font-weight-bolder label-lg label-light-danger label-inline">Access The Group To Review Each Email Form</span>';
			
				//===============================LOOP the valuse get the PRIMARY CLIENT's EMAIL===========
				$sql44 = "SELECT * FROM booking_1 WHERE GroupName='".$GroupName."' LIMIT 1";
				$result44 = mysqli_query($conn, $sql44);
				if (mysqli_num_rows($result44) > 0) {
				while($row44 = mysqli_fetch_assoc($result44)) {
					$GEmaiToEmail=$row44['EmaiToEmail'];
					}
				}
				
			}
			else
			{
			echo trim($DBookingStatus); 
			$GEmaiToEmail=$EmaiToEmail;
			}
			?>
            </div>
            <!--end::Info-->
            <h4 class="text-dark font-weight-bolder mb-1 mt-10"><?php echo $EmaiToFullName ; ?></h4>											
            
            <!--EMAIL-->
            <p><?php echo $GEmaiToEmail ?></p>
            
            
            <!--begin::Desc-->
            <p class="mt-8 mb-1 font-weight-bolder">Email Subject</p>												
            <p class="lead"><?php echo $EmaiToSubject; ?></p>
            <!--end::Desc-->
            </div>
            <!--begin::Team-->
            <div class="d-flex justify-content-center">
													<!--begin::Pic-->
  <?php if ($EmailToType=='Single') { ?>
  
  <?php if (($BookingStatus==99 || $BookingStatus==2 || $BookingStatus==3 || $BookingStatus==4) && !empty($BookUnique) && !empty($BookingCIP)) { ?>
  <a href="booking-authorization-email-form-preview.php?BookID=<?php echo $AssignedBookID ?>&allow=no&access=<?php echo time(); ?>&agentcron=0" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Preview">	                            
  <span>	                                
  <i class="fas fa-eye text-warning"></i>                           
  </span>	
  </a>
  <?php if (($BookingStatus !=4 || $Totalsections !=7) && $FormCancelled !='Yes') { ?>

<!--Hide edit icons for now-->
  <?php if (0) { ?>
  <a href="<?php echo $pagelink ?>" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>
  <?php } ?>
  					
  <?php }} ?>
  
  <?php if ($BookingStatus==2 && !empty($BookUnique)) { ?>
<!--  <a href="duplicate-booking-authorization.php?AgentID=<?php //echo $AgentID ?>&BookID=<?php //echo $AssignedBookID ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>-->
  <?php } ?> 
  

   <?php if (!empty($BookUnique) &&$BookingStatus==0) { ?>

<!--Hide edit icons for now-->
<?php if (0) { ?>
  <a href="<?php echo $pagelink ?>" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>
<?php } ?>

  <?php } ?>
  
  <?php if (empty($BookUnique) && $BookingStatus==0) { ?>

 <!--Hide edit icons for now-->
  <?php if (0) { ?>
  <a href="booking-authorization-email-form-preview.php?BookID=<?php echo $AssignedBookID ?>&AgentID=<?php echo $AgentID ?>" target="_new" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>
  <?php } ?>

  <?php } ?>
  
  
  <?php if (!empty($BookUnique) && $BookingStatus !=0 && $BookingStatus !=1 && $BookingStatus !=2) { ?>
  
  
  <?php if ($FormCancelled !='Yes') {} ?>
  
  <?php } elseif ($BookingStatus !=1 && $BookingStatus !=2) { ?>

  <?php } ?>
  
  
  
  <?php if (($BookingStatus==3 || $BookingStatus==99) && !empty($BookUnique)) { ?>

  <?php } ?>    
  
  <?php if (!empty($BookUnique)) { ?>


        <!--Hide DUPLICATE icon for now-->
        <?php if (0) { ?>
  <a href="duplicate-booking-authorization.php?AgentID=<?php echo $AgentID ?>&BookID=<?php echo $row['BookID2'] ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>
          <?php } ?>

  <?php } ?>
  
  <a href="delete-booking-duplicate.php?BookID=<?php echo $row['BookID2'] ?>" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-lg btn-clean btn-icon" title="Delete">	                            
  <span>	                                
  <i class="fas fa-trash text-warning"></i>	                            
  </span>							
  </a>
  
  <?php } if ($EmailToType=='Multiple' || $EmailToType=='Shareable Link') { ?>
  
  <?php if (empty($BookUnique)) { ?>
  <a href="booking-authorization-email-form.php?BookUnique=<?php echo $BookUnique?>&BookID=<?php echo $BookID ?>&AgentID=<?php echo $AgentID ?>&EmailToType=<?php echo $row['EmailToType'] ?>&GroupName=<?php echo $GroupName ?>&UGroupName=<?php echo $UGroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Edit">	                            
  <span>	                                
  <i class="fas fa-edit text-warning"></i>	                            
  </span>							
  </a>
  <?php } ?>
  
  <?php if (!empty($BookUnique)) { ?>
  <a href="manage-email-forms-groups.php?GroupName=<?php echo $GroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="<?php echo $EmaiToFullName ?> Group">	                            
  <span>	                                
  <i class="fas fa-users text-warning"></i>                           
  </span>							
  </a> 
  
  
  <a href="duplicate-booking-authorization.php?AgentID=<?php echo $AgentID ?>&BookID=<?php echo $AssignedBookID ?>&EmailToType=<?php echo $EmailToType ?>&GroupName=<?php echo $GroupName ?>" class="btn btn-lg btn-clean btn-icon mr-2" title="Duplicate Group">	                            
  <span>	                                
  <i class="fas fa-clone text-warning"></i>	                            
  </span>							
  </a>
  <?php } ?>
  
  <?php if ($BookingStatus==0) { ?>
  <a href="delete-booking-duplicate-group.php?UGroupName=<?php echo $UGroupName ?>" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-lg btn-clean btn-icon" title="Delete">	                            
  <span>	                                
  <i class="fas fa-trash text-warning"></i>	                            
  </span>							
  </a>
  <?php } else { ?>
  <a href="delete-booking-duplicate-group.php?GroupName=<?php echo $GroupName ?>" onclick="return confirm('Are you sure you want to delete this form?');" class="btn btn-lg btn-clean btn-icon" title="Delete">	                            
  <span>	                                
  <i class="fas fa-trash text-warning"></i>	                            
  </span>							
  </a>
  
  <?php } } ?>												<!--end::Pic-->
													
												</div>
												<!--end::Team-->
											</div>
											<!--end::Body-->

										</div>
										<!--end::Mixed Widget 11-->
									</div>
<?php
if (!empty($BookUnique))
$GroupName1=$GroupName;

			}
  		}
	}

}

mysqli_close($conn);


if ($displayfilter !=1)
{
?>
<div class="col-xl-12">
<div class="alert alert-custom alert-danger mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
There are no email forms to display based on your search results or filter selection.
</div>
</div>
</div>
<?php
}


?>                                    
<!--end::Item-->
<?php if ($counter > 9 && $filtercount > 9) { ?>
<!--begin::load more-->

<div class="col-xl-12 d-flex flex-center">
<button type="button" class="loadmanage btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="loadmanage" title="See More Email Forms"><span><i class="fas fa-angle-double-down"></i></span>See More Email Forms</button>
</div>
<!--end::load more-->
<?php } ?>
                                    </div>
  </div>
</div>
</div>
<!--end::Manage Email Forms-->
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer.php');?>
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->

<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->

    	    	   <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-scripts.php');?>
                                 
				<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>