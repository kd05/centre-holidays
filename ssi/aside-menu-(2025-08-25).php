<?php 
include($_SERVER['DOCUMENT_ROOT'].'/company/ssi/number-of-customer-reviews.php');
if ($ttcount2626 > 0)
$numbeofreviews=$ttcount2626;
else
$numbeofreviews=0;


//=======================awards=======================

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

if ($AgentType=='Sub-Agent' || $AgentType=='Sub-Agent Modified')
{	 
$PartnerID=$AgentID;
$sql2523 = "SELECT * FROM ch_partner_connections WHERE (PartnerID='$PartnerID') AND active=1";		
$result23 = mysqli_query($conn, $sql2523);
if (mysqli_num_rows($result23) > 0) {
while($row23 = mysqli_fetch_assoc($result23)) {
$CAgentID=$row23['AgentID'];	
}
}
}

if ($AgentType=='Commission Agent')
{	 		
$sql2523 = "SELECT * FROM ch_partner_connections WHERE (AgentID='$AgentID') AND active=1";		
$result23 = mysqli_query($conn, $sql2523);
if (mysqli_num_rows($result23) > 0) {
while($row23 = mysqli_fetch_assoc($result23)) {
$CPartnerID=$row23['PartnerID'];	
$TCPartnerID=$TCPartnerID.' '.$CPartnerID;
}
}
}	

if (!empty($TCPartnerID))
{

$strr= (explode(" ",$TCPartnerID));
$strr0=$strr[0];	
$strr1=$strr[1];
$strr2=$strr[2];
$strr3=$strr[3];
$strr4=$strr[4];
$strr5=$strr[5];
$strr6=$strr[6];
$strr7=$strr[7];
$strr8=$strr[8];
$strr9=$strr[9];
$strr10=$strr[10];
$strr11=$strr[11];
$strr12=$strr[12];
$strr13=$strr[13];
$strr14=$strr[14];		
}

if (!empty($PartnerID))
$sql25 = "SELECT * FROM ch_awards WHERE active=1 AND (AgentID='$CAgentID' || AgentID='' || AgentID='$PartnerID') ";
elseif (!empty($AgentID))
{
$sql25 = "SELECT * FROM ch_awards WHERE active=1 AND (AgentID='$AgentID' || AgentID='' ";

if (!empty($strr0))
$sql25 .= "  || AgentID='$strr0' ";	
if (!empty($strr1))
$sql25 .= "  || AgentID='$strr1' ";	
if (!empty($strr2))
$sql25 .= "  || AgentID='$strr2' ";	
if (!empty($strr3))
$sql25 .= "  || AgentID='$strr3' ";	
if (!empty($strr4))
$sql25 .= "  || AgentID='$strr4' ";	
if (!empty($strr5))
$sql25 .= "  || AgentID='$strr5' ";
if (!empty($strr6))
$sql25 .= "  || AgentID='$strr6' ";	
if (!empty($strr7))
$sql25 .= "  || AgentID='$strr7' ";
if (!empty($strr8))
$sql25 .= "  || AgentID='$strr8' ";	
if (!empty($strr9))
$sql25 .= "  || AgentID='$strr9' ";
if (!empty($strr10))
$sql25 .= "  || AgentID='$strr10' ";	
if (!empty($strr11))
$sql25 .= "  || AgentID='$strr11' ";
if (!empty($strr12))
$sql25 .= "  || AgentID='$strr12' ";	
if (!empty($strr13))
$sql25 .= "  || AgentID='$strr13' ";	
if (!empty($strr14))
$sql25 .= "  || AgentID='$strr14' ";							

$sql25 .= " )";
}
else
$sql25 = "SELECT * FROM ch_awards WHERE active=1 AND (AwardsWebsite='' || AwardsWebsite=3 || AwardsWebsite=1 || AwardsWebsite=5 || AwardsWebsite=6 || AwardsWebsite=7)";

if (!empty($PartnerID))// that's sub agent
$sql25 .= " AND (AwardsWebsite='' || AwardsWebsite=4 || AwardsWebsite=5 || AwardsWebsite=6 || AwardsWebsite=7) ";
elseif (!empty($AgentID))
$sql25 .= " AND (AwardsWebsite='' || AwardsWebsite=2 || AwardsWebsite=1 || AwardsWebsite=5 || AwardsWebsite=6) ";

$sql25 .= " ORDER BY ";
$sql25 .= " AwardsYear DESC, AwardsID DESC ";		

$result25 = mysqli_query($conn, $sql25);
$numawards=mysqli_num_rows($result25);	

//=======================================end of awards====================================
?>
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper" style="border-right:4px solid #113c64;">

		<!--begin::Menu Container-->
		<div
			id="kt_aside_menu"
			class="aside-menu"
			data-menu-vertical="1"
			 data-menu-scroll="1" data-menu-dropdown-timeout="500">
			<!--begin::Menu Nav-->
			<ul class="menu-nav ">
            <?php if (!empty($AgentID)) { ?>
            
            <li class="menu-item d-flex flex-center">
            <?php if (empty($LogoImage)) { ?>
            <a href="/index.php" title="<?php echo $titlename ?>"><img class="img-responsive symbol mt-5 img-border" alt="<?php echo $titlename ?>" src="<?php echo $FrontLogoImageNew ?>" style="max-height:175px;"></a>
            <?php } else { ?>
            <a href="/index.php" title="<?php echo $titlename ?>"><img class="img-responsive mt-2 pt-5 pr-7 pl-7" alt="<?php echo $titlename ?>" src="<?php echo $FrontLogoImageNew ?>" style="max-height:175px"></a>
            <?php } ?>
 			</li>
            <?php } ?>
            
			  <li class="menu-section ">
                <?php if (empty($AgentID)) { ?>
                <h4 class="menu-text text-dark">Discover Centre Holidays</h4>
                <?php } ?>
                <?php if (!empty($AgentID)) { ?>
                <h4 class="menu-text text-dark">Discover <?php echo $titlename ?></h4>
                <?php } ?>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <?php if (!empty($AgentID)) { ?>
<li class="menu-item" aria-haspopup="true" >
<a href="/company/profile.php" class="menu-link" title="About <?php echo $titlename ?>"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-users text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Profile</span></a>
</li>
 <?php } ?>           
            <li class="menu-item" aria-haspopup="true" ><a href="/company/experience-the-difference.php" class="menu-link" title="Experience The Difference"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-check text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Experience The Difference</span></a></li>
<li class="menu-item" aria-haspopup="true" ><a href="/company/customer-reviews.php" class="menu-link" title="Customer Reviews"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-comments text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Customer Reviews</span><span class="menu-label"><span class="label label-rounded label-warning label-inline"><?php echo $numbeofreviews ?></span></span></a></li>
<li class="menu-item" aria-haspopup="true" ><a href="/company/awards.php" class="menu-link" title="Awards & Accolades"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-trophy text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Awards</span><span class="menu-label"><span class="label label-rounded label-warning label-inline"><?php echo $numawards ?></span></span></a></li>
<?php if (empty($AgentID)) { ?>
<li class="menu-item" aria-haspopup="true" >
<a href="/company/profile.php" class="menu-link" title="About Centre Holidays"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-users text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Company Profile</span></a>
</li>
<?php } ?>
<?php if (!empty($AgentID)) { ?>
<li class="menu-item" aria-haspopup="true" ><a href="/company/contact.php" class="menu-link" title="Contact <?php echo $titlename ?>"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-phone-alt text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Contact</span></a></li>
<?php } ?>
<?php if (empty($AgentID)) { ?>            
            <li class="menu-section ">
                <h4 class="menu-text text-dark">Work From Home In Canada As A Home Based Travel Agent</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item" aria-haspopup="true" ><a href="/work-from-home/home-based-travel-agent-canada.php" title="Work From Home In Canada As A Home Based Travel Agent" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-canadian-maple-leaf text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Become A Home Based Travel Agent</span></a></li>
              <?php } ?>
<li class="menu-section ">
                <h4 class="menu-text text-dark">Stay Connected</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontFaceBook ?>" title="Follow On Facebook" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-facebook text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Facebook</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontInstagram ?>" title="Follow On Instagram" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-instagram text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Instagram</span></a></li>            
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontTwitter ?>" title="Follow On Twitter" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-twitter text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Twitter</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontPinterest ?>" title="Follow On Pinterest" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-pinterest text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Pinterest</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontLinkedIn ?>" title="Follow On LinkedIn" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-linkedin-in text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">LinkedIn</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontYouTube ?>" title="Follow On YouTube" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-youtube text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">YouTube</span></a></li>
             <?php 
										if (!empty($FrontBlog)) { 
										?>
            <li class="menu-item" aria-haspopup="true" ><a href="<?php echo $FrontBlog ?>" title="Follow Via Blog" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-blog text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Blog</span></a></li>
<?php } ?>
		  </ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>