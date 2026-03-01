<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php');?>
<!--begin::Travel Advisor Quick Nav-->
<div id="kt_quick_user" class="offcanvas offcanvas-right text-dark p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-boldest text-uppercase m-0">
        <?php if (empty($AgentID)) { ?>
			Centre Holidays
        <?php } ?>
        <?php if (!empty($AgentID)) { ?>
            <?php echo $BusinessName ?>
            <?php if (empty($BusinessName)) { ?>
            Centre Holidays
        <?php } ?>
        <?php } ?>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
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
                <div class="symbol-label border" style="background-image:url('/img/contact-s01.jpg')"></div>
            </div>
            <?php } ?>
            <?php if (!empty($AgentID)) {

if (!empty($Image))
$PhotoIcon="/img/agents/".$AgentID."/".$Image;
else
$PhotoIcon="/img/contact-s01.jpg";
?>
                <div class="symbol-label border" style="background-image:url('<?php echo $PhotoIcon ?>')"></div>
            </div>
            <?php } ?>
            <div class="d-flex flex-column">
                <a href="/company/contact.php" title="Contact Details" class="font-weight-bolder font-size-h5 text-dark text-hover-warning">
					<?php if (empty($AgentID)) { ?>
					<span class="text-dark-65 h6">Get In Touch</span>
                    <?php } ?>
   <?php if (!empty($AgentID)) { ?>
            <?php echo $DisplayName ?>
            <?php if (empty($DisplayName)) { ?>
            <span class="text-dark-65 h6">Get In Touch</span>
        <?php } ?>
        <?php } ?>
                    
				</a>
                <?php if (!empty($AgentID)) { ?>
                <?php if (!empty($DisplayName)) { ?>
                <div class="text-dark-65 mb-5">
                    <?php echo $AgentPositionTitle ?>
                </div>
                <?php } ?>
                <?php } ?>
                <div class="navi">
                <?php if (empty($AgentID)) { ?>
                    <a href="tel:18888238801" class="navi-item" title="Call Us">
                        <span class="navi-link p-0 pb-2"><span class="navi-text text-dark text-hover-warning font-weight-bolder h4">1-888-823-8801</span>
                        </span>
                    </a>
<?php } ?>
<?php if (!empty($AgentID)) { ?>
                    <a href="tel:<?php echo $TopNumber ?>" class="navi-item" title="Call <?php echo $TopNumber ?>">
                        <span class="navi-link p-0 pb-2"><span class="navi-text text-dark text-hover-warning font-weight-bold <?php if (empty($DisplayName)) { ?>h4 font-weight-bolder<?php } ?>"><?php echo $TopNumber ?></span>
                        </span>
                    </a>
<?php } ?>
					
                </div>
            </div>
        </div>
		<!--end::Header-->

		<!--begin::Separator-->
		<div class="separator separator-dashed mt-8 mb-5"></div>
		<!--end::Separator-->
		<!--begin::Nav-->
		<div class="navi navi-spacer-x-0 p-0">
<?php if (empty($AgentID)) { ?>
		    <!--begin::Item-->
		    <a href="/company/find-travel-agent.php" class="navi-item" title="Find A Travel Agent">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-search text-warning"></i><!--end::Icon--></span>						</div>
				   	</div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Travel Agent Locator
		                </div>
		                
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
            <?php } ?>		    
<!--begin::Item-->
		    <a href="/forms/custom-trip-inquiry.php" class="navi-item" title="Get A Custom Quote">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-envelope text-warning"></i><!--end::Icon--></span>						</div>
				   	</div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Get A Custom Quote
		                </div>
		                
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->            
            <!--begin::Item-->
		    <a href="/company/contact.php" class="navi-item" title="Contact">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-phone-alt text-warning"></i><!--end::Icon--></span>						</div>
				   	</div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Contact Details
		                </div>
		                
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
		</div>
		<!--end::Nav-->
<?php if (empty($AgentID)) { ?>
<!--begin::Separator-->
		<div class="separator separator-dashed my-7"></div>
		<!--end::Separator-->
		<div>
			<!--begin:Heading-->
        	<h5 class="mb-5 font-weight-bolder">
            	Work From Home
        	</h5>
			<!--end:Heading-->

			<!--begin::Item-->
	        <div class="navi navi-spacer-x-0 p-0">
		    <!--begin::Item-->
		    <a href="/work-from-home/home-based-travel-agent-canada.php" title="Beome A Home Based Travel Agent" target="_blank" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-user-plus text-warning"></i><!--end::Icon--></span>						</div>
		            </div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Become A Travel Agent
		                </div>
                        <div class="text-dark-65">
		                    Join Centre Holidays
		                </div>
		            </div>
		        </div>
		    </a>
		    <!--end:Item-->
		</div>
	        <!--end::Item-->
		</div>
<?php } ?>
		<!--begin::Separator-->
		<div class="separator separator-dashed my-7"></div>
		<!--end::Separator-->
		<div>
			<!--begin:Heading-->
        	<h5 class="mb-5 font-weight-bolder">
            	Centre Holidays Travel Agents
        	</h5>
			<!--end:Heading-->

			<!--begin::Item-->
	        <div class="navi navi-spacer-x-0 p-0">
		    <!--begin::Item-->
		    <a href="/agents/index.php" title="Centre Holidays' Travel Agent Portal" target="_blank" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							<span><!--begin::Icon--><i class="fas fa-sign-in-alt text-warning"></i><!--end::Icon--></span>						</div>
		            </div>
		            <div class="navi-text text-dark">
		                <div class="font-weight-bolder">
		                    Travel Agent Portal
		                </div>
                        <div class="text-dark-65">
		                    Sign In
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