<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/agent-db-details.php');?>
<!--begin::Travel Advisor Quick Nav-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10 text-dark">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-boldest text-uppercase m-0">
		User Panel
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-warning" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
		<!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-circle symbol-100 mr-5">
            <?php if (empty($AgentID)) { ?>
                <div class="symbol-label border" style="background-image:url('<?php echo $PhotoIcon ?>')"></div>
            </div>
            <?php } ?>
            <?php if (!empty($AgentID)) {

$PhotoIcon="/img/agents/".$AgentID."/".$Image;
?>
                <div class="symbol-label border" style="background-image:url('<?php echo $PhotoIcon ?>')"></div>
            </div>
            <?php } ?>
            <div class="d-flex flex-column">
                <a href="/agents/account.php" title="Account" class="font-weight-bolder font-size-h5 text-dark text-hover-warning">
				<?php echo $NickName ?><?php if (empty($NickName)) { ?><?php echo $FirstName ?> <?php echo $LastName ?><?php } ?>
				</a>
                <?php if (!empty($AgentPositionTitle)) { ?>
                <div class="text-dark-65 mb-5">
                 <?php echo $AgentPositionTitle ?>
                </div>
                <?php } ?>
                <div class="navi">
                   <span class="navi-link p-0 pb-2"><span class="navi-text text-dark text-hover-warning font-weight-bold">User ID: <?php echo $AgentID ?></span>
                        </span>
                </div>
            </div>
        </div>
		<!--end::Header-->

		<!--begin::Separator-->
		<div class="separator separator-dashed mt-8 mb-5"></div>
		<!--end::Separator-->
		<!--begin::Nav-->
		<div class="navi navi-spacer-x-0 p-0">
		    <!--begin::Item-->
		    <a href="/agents/account.php"  class="navi-item" title="Account">
		        <div class="navi-link">
					<div class="symbol symbol-circle symbol-40 bg-light mr-3">
						<div class="symbol-label">
 						   <span><!--begin::Icon--><i class="fas fa-user text-warning"></i><!--end::Icon--></span> 					   </div>
				   	</div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Account
	                  </div>
		                <div class="text-dark-65">
		                Billing, Modify Plan & More
	                  </div>
	              </div>
		        </div>
		    </a>
		    <!--end:Item-->
            <!--begin::Item-->
		    <a href="<?php echo $MyAccount ?>" title="Vault" target="_blank"  class="navi-item">
		        <div class="navi-link">
					<div class="symbol symbol-circle symbol-40 bg-light mr-3">
						<div class="symbol-label">
 						   <span><!--begin::Icon--><i class="fas fa-lock text-warning"></i><!--end::Icon--></span> 					   </div>
				   	</div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Vault
	                  </div>
		                <div class="text-dark-65">
		                Logins, Commission & T4A  Statements
		                </div>
	              </div>
		        </div>
		    </a>
		    <!--end:Item-->
            		</div>
		<!--end::Nav-->
        <!--begin::Separator-->
  <div class="separator separator-dashed my-7"></div>
		<!--end::Separator-->
		<div>
		  <!--begin::Item-->
	        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
		    <a href="tel:18888238801" title="Call Head Office" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-circle symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-phone-alt text-warning"></i><!--end::Icon--></span>						</div>
		            </div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    1-888-823-8801
		                </div>
                        <div class="text-dark-65">
		               Call Head Office
		                </div>
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
            <!--begin::Item-->
		    <a href="/agents/contact.php" title="Contact Details" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-circle symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-info text-warning"></i><!--end::Icon--></span>						</div>
		            </div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Contact Details
		                </div>
                        <div class="text-dark-65">
		               Head Office & Staff Details
		                </div>
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
		</div>
	        <!--end::Item-->
        <!--begin::Separator-->
  <div class="separator separator-dashed my-7"></div>
		<!--end::Separator-->
		<div>
		  <!--begin::Item-->
	        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
		    <a href="ssi/sign-out.php" title="Sign Out Of The Agent Portal" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-circle symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-sign-in-alt text-warning"></i><!--end::Icon--></span>						</div>
		            </div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Sign Out
		                </div>
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
		</div>
	        <!--end::Item-->
		</div>
    </div>
    <!--end::Travel Advisor Quick Nav-->