<?php 

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

//=======================CH number customer reviews=======================
$sql2626= "SELECT * FROM ch_feedback WHERE FeedStatus=1 ";	
$result2626 = mysqli_query($conn, $sql2626);
$ttcount2626=mysqli_num_rows($result2626);

if ($ttcount2626 > 0)
$numbeofreviews=$ttcount2626;
else
$numbeofreviews=0;

//=======================CH number of awards=======================
$sql25 = "SELECT * FROM ch_awards WHERE active=1 "; 
$result25 = mysqli_query($conn, $sql25);
$numawards=mysqli_num_rows($result25);	


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
			  <li class="menu-section ">
                <h4 class="menu-text text-dark">Quick Links</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item" aria-haspopup="true" ><a href="/agents/resources.php" class="menu-link" title="Resources"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-bullhorn text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Resources</span></a></li>          
            <li class="menu-item" aria-haspopup="true" ><a href="/agents/profile.php" class="menu-link" title="Company Profile"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-check text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Company Profile</span></a></li>
<li class="menu-item" aria-haspopup="true" ><a href="/agents/awards.php" class="menu-link" title="Awards & Accolades"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-trophy text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Awards</span><span class="menu-label"><span class="label label-rounded label-warning label-inline"><?php echo $numawards ?></span></span></a></li>
<li class="menu-section ">
                <h4 class="menu-text text-dark">Our Brands</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item" aria-haspopup="true" ><a href="/agents/epik-escapes.php" title="Epik Escapes" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-shield-alt text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Epik Escapes</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="/agents/kwik-print.php" title="Kwik Print" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fas fa-feather-alt text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Kwik Print</span></a></li>
<li class="menu-section ">
                <h4 class="menu-text text-dark">Stay Connected</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item" aria-haspopup="true" ><a href="https://www.facebook.com/centreholidays" title="Follow On Facebook" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-facebook text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Facebook</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="https://www.instagram.com/centreholidays/" title="Follow On Instagram" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-instagram text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Instagram</span></a></li>            
            <li class="menu-item" aria-haspopup="true" ><a href="https://twitter.com/centreholidays" title="Follow On Twitter" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-twitter text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Twitter</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="https://www.pinterest.com/centreholidays/" title="Follow On Pinterest" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-pinterest text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">Pinterest</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="https://www.linkedin.com/company/centreholidays/" title="Follow On LinkedIn" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-linkedin-in text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">LinkedIn</span></a></li>
            <li class="menu-item" aria-haspopup="true" ><a href="https://www.youtube.com/c/centreholidays" title="Follow On YouTube" target="_blank" class="menu-link"><span class="svg-icon menu-icon"><!--begin::Icon--><i class="fab fa-youtube text-warning"></i><!--end::Icon--></span><span class="menu-text text-warning font-weight-bolder">YouTube</span></a></li>
		  </ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>