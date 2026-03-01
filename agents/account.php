<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>Account - Agent Portal | Centre Holidays</title>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->
				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">
                <!--begin::Carousel-->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  <div class="img"><img class="d-block w-100" src="/img/agents/account-c01.jpg" alt="Account"></div>
  <div class="carousel-caption d-none d-md-block">
      <a href="#">
      <button type="button" class="btn btn-dark btn-square btn-wide font-weight-bolder text-uppercase">Manage Your CH Account</button></a> 
  </div>
</div>
  </div>
</div>
  <!--end::Carousel-->
  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
    <div class=" container ">
        <!--begin::title-->
        <div class="row pl-10 pr-10 justify-content-center">
			<div class="text-center pt-11 col-xl-12">
									<h1 class="font-weight-boldest text-uppercase text-dark display-3">Account</h1>
									<h2 class="text-dark-65 font-weight-bolder">Access and manage various areas of your Centre Holidays account. Increase security, manage your supplier login credentials, upgrade your plan and more!</h2>				
            </div>
                                    </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<div class="row mb-20">
<!--begin::Item-->
	<div class="col-xl-12 col-md-6 mb-10">
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
<p>On this page you will find that you can secure your CH Google Account, access your Vault, view your personal and business details that you provided us when signing up, view billing details, upgrade or downgrade your plan, learn how you can recruit individuals and access frequently asked questions about your account. Please ensure you go over all of the details provided in each module.</p>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Security" data-toggle="modal" data-target="#security-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Security</h2>
<h6>Secure CH Google Account</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="security-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Security</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>On a daily basis, you are dealing with your client's personal details. It is important that you secure your Centre Holidays Google account to ensure that no one tries to access it other than yourself. Please do the following to keep your account secure.</p>
<h3 class="mt-10 font-weight-bolder">2-Step Verification</h3>
<p>Turn on 2-step verification to add another layer of security when signing in. This will make it hard for anyone to access your account as you will get a prompt on your phone which you can then choose to allow or block.</p>
<h3 class="mt-10 font-weight-bolder">Recovery Phone And Email</h3>
<p>Add a recovery phone and email as it will be a way for Google to ensure it's really you that is signing in or to reach you if there's suspicious activity in your account.</p>
<div class="pt-10 pb-5 mb-5 d-flex flex-center">
<a href="https://myaccount.google.com/security" title="Secure Google Account" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Secure Google Account</a>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
If you experience an issue accessing your Centre Holidays Google account, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Vault" data-toggle="modal" data-target="#vault-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Vault</h2>
<h6>Logins, Commission And T4A Statements</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="vault-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Vault</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Your Vault is a private folder we have created just for you in Google Drive. Within your Vault, you will see three folders:</p>
<h3 class="mt-10 font-weight-bolder">Commission Statements</h3>
<p>Commission payouts are made on the 15th of each month. If a payout is made to you, we will leave a commission statement (PDF) for you to access in your Commission Statements folder.</p>
<h3 class="mt-10 font-weight-bolder">Income Tax</h3>
<p>We will place your T4A statement (PDF) in your Income Tax folder around February 15 each year.</p>
<h3 class="mt-10 font-weight-bolder">Logins</h3>
<p>Your Logins folder contains a  Logins Google Sheet (Excel file) that you can use to manage all of your login credentials. As you sign up with suppliers, add those login credentials to your Logins Google Sheet.</p>
<div class="pt-10 pb-5 mb-5 d-flex flex-center">
<a href="<?php echo $MyAccount ?>" title="Access Vault" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">Access Vault</a>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
If you experience an issue accessing your Vault in Google Drive, sign out of your personal Google Account and then sign in to your Centre Holidays Google Account which will then grant you access. If you still experience an issue, please email <b>support@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Account Details" data-toggle="modal" data-target="#account-details-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Account Details</h2>
<h6>Personal And Business</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="account-details-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Account Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<div class="table-responsive">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 200px" scope="col"> Title</th>
  <th class="lead" scope="col" style="min-width: 250px">Personal Details</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Full Name</td>
  <td class="align-middle"><?php echo $AgentTitle ?> <?php echo $FirstName ?> <?php echo $LastName ?></td>
  </tr>
  <?php if (!empty($NickName)) { ?>
<tr>
  <td class="align-middle">Nickname</td>
  <td class="align-middle"><?php echo $NickName ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($HomeNum)) { ?>
<tr>
  <td class="align-middle">Home Phone</td>
  <td class="align-middle"><?php echo $HomeNum ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($CellNum)) { ?>
<tr>
  <td class="align-middle">Mobile</td>
  <td class="align-middle"><?php echo $CellNum ?></td>
  </tr>
  <?php } ?>
<tr>
  <td class="align-middle">Email</td>
  <td class="align-middle"><?php echo $PersonalEmail ?></td>
  </tr>
<tr>
  <td class="align-middle">Home Address</td>
  <td class="align-middle"><?php echo $Street ?><?php if (!empty($Unit)) { ?>, <?php echo $Unit ?><?php } ?><br>
<?php echo $City ?>, <?php echo $Province ?>, <?php echo $PostalCode ?></td>
  </tr>
  <?php if (!empty($OtherAddress)) { ?>
<tr>
  <td class="align-middle">Other Address</td>
  <td class="align-middle"><?php echo $OtherAddress ?></td>
  </tr>
  <?php } ?>
<tr>
  <td class="align-middle">Date Of Birth (M/D/Y)</td>
  <td class="align-middle"><?php echo $BirthDate ?></td>
</tr>
</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table table-bordered mt-1 mb-5 text-dark mt-5">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 200px" scope="col"> Title</th>
  <th class="lead" scope="col" style="min-width: 250px">Business Details</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Join Date (M/D/Y)</td>
  <td class="align-middle"><?php echo $JoinDate ?></td>
</tr>
<?php if (!empty($AgentPlan)) { ?>
<tr>
  <td class="align-middle">Plan</td>
  <td class="align-middle"><?php echo $AgentPlan ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($Commission)) { ?>
<tr>
  <td class="align-middle">Commission</td>
  <td class="align-middle"><?php echo $Commission ?></td>
</tr>
<?php } ?>
<?php if (!empty($MonthlyRecurringFee)) { ?>
<tr>
  <td class="align-middle">Monthly Recurring Fee</td>
  <td class="align-middle"><?php echo $MonthlyRecurringFee ?></td>
  </tr>
  <?php } ?>
<tr>
  <td class="align-middle">Travel Advisor Type</td>
  <td class="align-middle"><?php echo $AgentType ?></td>
  </tr>
  <?php if (!empty($License)) { ?>
<tr>
  <td class="align-middle">TICO Licence</td>
  <td class="align-middle"><?php echo $License ?></td>
</tr>
<?php } ?>
<?php if (!empty($TICOcert)) { ?>
<tr>
  <td class="align-middle">TICO Manager's Licence</td>
  <td class="align-middle"><?php echo $TICOcert ?></td>
</tr>
<?php } ?>
<?php if (!empty($ACTASaskatchewanLicence)) { ?>
<tr>
  <td class="align-middle">ACTA Saskatchewan Licence</td>
  <td class="align-middle"><?php echo $ACTASaskatchewanLicence ?></td>
</tr>
<?php } ?>
<?php if (!empty($BCNumber)) { ?>
<tr>
  <td class="align-middle">BC Licence</td>
  <td class="align-middle"><?php echo $BCNumber ?></td>
</tr>
<?php } ?>
<?php if (!empty($BOLNumber)) { ?>
<tr>
  <td class="align-middle">Branch Office Licence</td>
  <td class="align-middle"><?php echo $BOLNumber ?></td>
</tr>
<?php } ?>
<?php if (!empty($RegisteredBusinessName)) { ?>
<tr>
  <td class="align-middle">Registered Business Name</td>
  <td class="align-middle"><?php echo $RegisteredBusinessName ?></td>
</tr>
<?php } ?>
<?php if (!empty($BusinessName)) { ?>
<tr>
  <td class="align-middle">Doing Business As</td>
  <td class="align-middle"><?php echo $BusinessName ?></td>
  </tr>
<tr>
<?php } ?>
<?php if (!empty($BOStreet)) { ?>
  <td class="align-middle">Branch Office Address</td>
  <td class="align-middle"><?php echo $BOStreet ?><br>
<?php echo $BOCity ?>, <?php echo $BOProvince ?>, <?php echo $BOPostalcode ?></td>
</tr>
<?php } ?>
<?php if (!empty($BusinessNum)) { ?>
<tr>
  <td class="align-middle">Business Phone</td>
  <td class="align-middle"><?php echo $BusinessNum ?></td>
</tr>
<?php } ?>
<?php if (!empty($DisplayUseCell)) { ?>
<tr>
  <td class="align-middle">Mobile</td>
  <td class="align-middle"><?php echo $DisplayUseCell ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($TollFreeNum)) { ?>
<tr>
  <td class="align-middle">Toll Free</td>
  <td class="align-middle"><?php echo $TollFreeNum ?></td>
  </tr>
  <?php } ?>
<tr>
  <td class="align-middle">Centre Holidays Email</td>
  <td class="align-middle"><?php echo $BusinessEmail ?></td>
  </tr>
  <?php if (!empty($OtherEmail)) { ?>
<tr>
  <td class="align-middle">Other Email</td>
  <td class="align-middle"><?php echo $OtherEmail ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($Website)) { ?>
<tr>
  <td class="align-middle">Centre Holidays Website</td>
  <td class="align-middle"><?php echo $Website ?></td>
  </tr>
  <?php } ?>
  <?php if (!empty($OtherWebsite)) { ?>
<tr>
  <td class="align-middle">Other Website</td>
  <td class="align-middle"><?php echo $OtherWebsite ?></td>
</tr>
<?php } ?>
<?php if (!empty($PODLeader)) { ?>
<tr>
  <td class="align-middle">Pod Leader</td>
  <td class="align-middle"><?php echo $PODLeader ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="alert alert-custom alert-danger mb-5 mt-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">
If any of the details listed are incorrect or if there is a change in any of your details, please email <b>support@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Billing" data-toggle="modal" data-target="#billing-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Billing</h2>
<h6>Setup And Monthly Recurring Fees</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="billing-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Billing</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <?php if (!empty($AgentPlan)) { ?>
            <div class="table-responsive">
<table class="table table-bordered mt-1 mb-10 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 200px" scope="col"> Title</th>
  <th class="lead" scope="col" style="min-width: 250px">Plan Details</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Plan</td>
  <td class="align-middle"><?php echo $AgentPlan ?></td>
  </tr>
  <?php if (!empty($MonthlyRecurringFee)) { ?>
<tr>
  <td class="align-middle">Monthly Recurring Fee</td>
  <td class="align-middle"><?php echo $MonthlyRecurringFee ?></td>
  </tr>
  <?php } ?>
</tbody>
</table>
</div>
<?php } ?>
<p>Centre Holidays uses FreshBooks to manage its travel advisors' one-time setup fees and monthly recurring fees. One-time setup fees are paid upon registration while monthly recurring fees can be paid between 15th and 22nd of each month.
<br>
<br>
When an invoice is created, you will have 7 days to pay that invoice in full before it gets marked as overdue and your Centre Holidays account gets suspended. If for whatever reason you cannot make a payment on time, please email <b>support@centreholidays.com</b> to avoid getting your Centre Holidays account suspended.
<br>
<br>
Once your account is suspended, you will have 30 days to bring it up to date. If the account is not brought up to date within the 30 day period, your contract with Centre Holidays will be cancelled.</p>
<h3 class="mt-10 font-weight-bolder">Three Ways To Pay An Invoice</h3>
<p>When an invoice is created, there are three ways the invoice can be paid.<br>
<br>
<b>Automatic Credit Card Payment:</b> Your credit card is saved in FreshBooks and when an invoice is created, the credit card is automatically charged.<br>
<br>
<b>Manual Credit Card Payment:</b> Once an invoice is created, it will be emailed to you. You can then make the payment manually through FreshBooks.<br>
<br>
<b>Email Transfer Sent To Head Office:</b> Once an invoice is created, it will be emailed to you. You can then send an email transfer to <b>payments@centreholidays.com</b> which head office will deposit. The answer to the security question will also need to be emailed to the mentioned email address.</p>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If your credit card details change, please email <b>support@centreholidays.com</b> or call <b>1-888-823-8801 x 105</b>. Mastercard debit cards are not supported.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Modify Plan" data-toggle="modal" data-target="#modify-plan-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Modify Plan</h2>
<h6>Upgrade Or Downgrade</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="modify-plan-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Modify Plan</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <?php if (!empty($AgentPlan)) { ?>
            <h3 class="font-weight-bolder">Current Plan</h3>
            <div class="table-responsive">
<table class="table table-bordered mt-1 mb-15 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 200px" scope="col"> Title</th>
  <th class="lead" scope="col" style="min-width: 250px">Plan Details</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Plan</td>
  <td class="align-middle"><?php echo $AgentPlan ?></td>
</tr>
<?php if (!empty($Commission)) { ?>
<tr>
  <td class="align-middle">Commission Percentage</td>
  <td class="align-middle"><?php echo $Commission ?></td>
</tr>
<?php } ?>
<?php if (!empty($MonthlyRecurringFee)) { ?>
<tr>
  <td class="align-middle">Monthly Recurring Fee</td>
  <td class="align-middle"><?php echo $MonthlyRecurringFee ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>
<h3 class="font-weight-bolder">Upgrade / Downgrade Plan</h3>
<p>In order to upgrade or downgrade your plan, you are required to be a Commission Agent (Primary) and not a Sub-Agent (Partner). You have two options to choose from to upgrade your plan.<br>
  <br>
<b>Fast Track:</b> Choose whatever plan you want and pay that monthly recurring fee to earn that respective commission percentage.<br>
<br>
<b>Slow Burn:</b> When we review your account in February, if your commission income for the year hits any of the mentioned targets, your plan will be upgraded accordingly. Your monthly recurring fee will not be affected.</p>
            <div class="table-responsive">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 150px" scope="col"> Plan</th>
  <th class="lead" scope="col" style="min-width: 150px">Commission %</th>
  <th class="lead" scope="col" style="min-width: 150px">Fast Track</th>
  <th class="lead" scope="col" style="min-width: 200px">Slow Burn</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Starter Plan</td>
  <td align="center" class="align-middle">60%</td>
  <td align="center" class="align-middle">$115 Per Month</td>
  <td align="center" class="align-middle">-</td>
</tr>
<tr>
  <td class="align-middle">Starter Plus Plan</td>
  <td align="center" class="align-middle">65%</td>
  <td align="center" class="align-middle">$125 Per Month</td>
  <td align="center" class="align-middle">$20K Yearly Commission Income</td>
</tr>
<tr>
  <td class="align-middle">Value Plan</td>
  <td align="center" class="align-middle">70%</td>
  <td align="center" class="align-middle">$135 Per Month</td>
  <td align="center" class="align-middle">$30K Yearly Commission Income</td>
  </tr>
<tr>
  <td class="align-middle">Value Plus Plan</td>
  <td align="center" class="align-middle">75%</td>
  <td align="center" class="align-middle">$145 Per Month</td>
  <td align="center" class="align-middle">$40K Yearly Commission Income</td>
  </tr>
<tr>
  <td class="align-middle">Premium Plan</td>
  <td align="center" class="align-middle">80%</td>
  <td align="center" class="align-middle">$155 Per Month</td>
  <td align="center" class="align-middle">$50K Yearly Commission Income</td>
</tr>
<tr>
  <td class="align-middle">Premium Plus Plan</td>
  <td align="center" class="align-middle">80%</td>
  <td align="center" class="align-middle">-</td>
  <td align="center" class="align-middle">-</td>
</tr>
<tr>
  <td colspan="4" class="align-middle"><small><b>Premium Plus Plan:</b> When your account is reviewed in February and if you have a yearly commission income of above 50K but are still short of the Professional Plan's target of $60K, your monthly recurring fee will then be reduced one level at a time till you reach the minimum monthly recurring fee of $115.</small></td>
</tr>
<tr>
  <td colspan="4" class="align-middle bg-light">&nbsp;</td>
</tr>
<tr>
  <td class="align-middle">Professional Plan</td>
  <td align="center" class="align-middle">80%</td>
  <td align="center" class="align-middle">-</td>
  <td align="center" class="align-middle">$60K Yearly Commission Income</td>
  </tr>
<tr>
  <td colspan="4" class="align-middle"><small><b>Professional Plan:</b> This plan is for experienced travel advisors only. When your account is reviewed in February, head office will determine whether you are eligible for this plan. To be eligible, your income has to reflect $60K or more in commission earnings for the year or you have to be a member of Centre Holidays for 3 or more years with a yearly commission income of $30K consecutively. Your monthly recurring fee will also be reduced to $95.</small></td>
  </tr>
</tbody>
</table>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Monthly recurring fees are subject to change with a minimum of 60 days notice. Yearly commission income targets are subject to change at any time without notice.</div>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">To upgrade or downgrade your plan, please contact <b>Jillian</b> at <b>1-888-823-8801 x 111</b> or <b>jillian@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Business Registration" data-toggle="modal" data-target="#business-registration-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Business Registration</h2>
<h6>Operate As A Business</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="business-registration-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Business Registration</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
<p>Operating as a business (eg: Sunshine Travel) has its benefits. Some of them include:</p>
<ul class="mb-5"> 
<li>Operating under a business name instead of your own name.</li>
<li>Creating your own logo and customized marketing material.</li>
<li>Recruiting additional partners (sub-agents) to work with.</li>
<li>Opening a physical branch office (additional terms and fees).</li>
</ul>
<p>There are additional fees involved as we have to register the business under our incorporation. Your business name will also be provided to TICO to have it connected to Centre Holidays' TICO licence.</p>
<div class="table-responsive">
<table class="table table-bordered mt-1 mb-5 text-dark">
<thead class="thead-dark text-center align-middle text-uppercase">
<tr>
  <th class="lead" style="min-width: 150px" scope="col"> Title</th>
  <th class="lead" scope="col" style="min-width: 150px">Pricing (Tax Included)</th>
  </tr>
</thead>
<tbody>
<tr>
  <td class="align-middle">Business Name Registration</td>
  <td align="center" class="align-middle">$60</td>
</tr>
<tr>
  <td colspan="2" class="align-middle"><small>Once your business name is registered, your master business licence will be sent to you. If you happen to leave Centre Holidays, your business name will be released to you.</small></td>
  </tr>
</tbody>
</table>
</div>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">For more information, please contact <b>Jillian</b> at <b>1-888-823-8801 x 111</b> or <b>jillian@centreholidays.com</b>.</div>
</div>
            </div>
            <div class="modal-footer bg-light">
<button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<!--begin::Item-->
	<div class="col-xl-4 col-md-6 mb-10">
    <div class="card card-custom card-border  bgi-no-repeat bgi-size-cover card-stretch" style="background:url(/img/agents/module-bg-primary.jpg) no-repeat center center /cover; min-height:175px;">
    <!--begin::Body-->
<a href="#" title="Referrals" data-toggle="modal" data-target="#referral-modal" class="text-white flex-grow-1">													<div class="card-body custom-overlay d-flex flex-center text-center text-hover-warning text-white text-capitalize">	
<div>								<h2 class="font-weight-boldest text-uppercase">Referrals</h2>
<h6>Refer An Individual</h6>
</div>										
</div>
</a>
<!--end::Body-->
</div>
</div>
<!--end::Item-->
<!--begin::Modal-->
<div class="modal fade" id="referral-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border border-4">
            <div class="modal-header bg-light">
                <h2 class="font-weight-boldest text-uppercase mb-0 text-dark">Referrals</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            
            <div class="modal-body lead text-dark pb-3">
            <h3 class="font-weight-bolder">Refer An Individual</h3>
<p>If you know an individual that is interested in becoming a home based travel advisor or is already a travel advisor looking to make a change, you can ask them to visit <b>JoinCentreHolidays.com</b> and fill out an application form. <b>For every referral that joins us, you will earn $100.</b></p>
<div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Your primary goal is to sell travel. Referring an individual should be secondary.</div>
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