<?php

//===================CONNECT TO EPIK ESCAPE DATABSE=========================================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
?>

<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper" style="border-right:4px solid #113c64;">

		<!--begin::Menu Container-->
		<div
			id="kt_aside_menu"
			class="aside-menu"
			data-menu-vertical="1"
			 data-menu-scroll="1" data-menu-dropdown-timeout="500">
			<!--begin::Menu Nav-->
			<ul class="menu-nav pt-0">
<li class="menu-item menu-item-submenu menu-item-here menu-item-open" aria-haspopup="true" data-menu-toggle="hover">
<a href="javascript:;" class="menu-link menu-toggle mb-5">
<span class="svg-icon menu-icon">
<i class="fas fa-sliders-h text-warning"></i>
</span>
<span class="menu-text text-warning font-weight-bolder">Filter Email Form</span>
<i class="menu-arrow text-warning"></i>
</a>

<div class="menu-submenu" kt-hidden-height="400" style="">
<i class="menu-arrow"></i>
<ul class="menu-subnav">
<form action="https://centreholidays.com/agents/manage-email-forms.php#email-forms-list" method="get" enctype="multipart/form-data">											
									
<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('Booking Authorization Email', $_GET['searchFilter2'], true)) {$chek11='checked';} else $chek11=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Booking Authorization Email" title="Booking Authorization Email">
<input onchange="this.form.submit()" <?php echo $chek11 ?> type="checkbox" id="Booking Authorization Email" name="searchFilter2[]" value="Booking Authorization Email"> 					
<span class="mr-2"></span>Booking Authorization Email Form<!--<small class="ml-2">(<?php ///echo $numappear ?>)</small>--></label>
</li>

</form>
</ul>

</div>

</li></ul>
        

<ul class="menu-nav pt-0">
<li class="menu-item menu-item-submenu menu-item-here menu-item-open" aria-haspopup="true" data-menu-toggle="hover">

<a href="javascript:;" class="menu-link menu-toggle mb-5">
<span class="svg-icon menu-icon">
<i class="fas fa-sliders-h text-warning"></i>
</span>
<span class="menu-text text-warning font-weight-bolder">Filter By Status</span>
<i class="menu-arrow text-warning"></i>
</a>
                                


<div class="menu-submenu" kt-hidden-height="400" style="">
<i class="menu-arrow"></i>
<ul class="menu-subnav">
<form action="https://centreholidays.com/agents/manage-email-forms.php#email-forms-list" method="get" enctype="multipart/form-data">											
											
<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('0', $_GET['searchFilter'], true)) {$chek1='checked';} else $chek1=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Draft" title="Draft">
<input onchange="this.form.submit()" <?php echo $chek1 ?> type="checkbox" id="Draft" name="searchFilter[]" value="0"> 					
<span class="mr-2"></span>Draft<!--<small class="ml-2">(<?php ///echo $numappear ?>)</small>--></label>
</li>

<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('1', $_GET['searchFilter'], true)) {$chek2='checked';} else $chek2=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Sent" title="Sent">
<input onchange="this.form.submit()" <?php echo $chek2 ?> type="checkbox" id="Sent" name="searchFilter[]" value="1"> 					
<span class="mr-2"></span>Sent</label>
</li>

<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('3', $_GET['searchFilter'], true)) {$chek3='checked';} else $chek3=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Please Review" title="Please Review">
<input onchange="this.form.submit()" <?php echo $chek3 ?> type="checkbox" id="Please Review" name="searchFilter[]" value="3"> 					
<span class="mr-2"></span>Please Review</label>
</li>

<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('4', $_GET['searchFilter'], true)) {$chek4='checked';} else $chek4=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Approved" title="Approved">
<input onchange="this.form.submit()" <?php echo $chek4 ?> type="checkbox" id="Approved" name="searchFilter[]" value="4"> 					
<span class="mr-2"></span>Approved</label>
</li>

<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('2', $_GET['searchFilter'], true)) {$chek5='checked';} else $chek5=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Viewed" title="Viewed">
<input onchange="this.form.submit()" <?php echo $chek5 ?> type="checkbox" id="Viewed" name="searchFilter[]" value="2"> 					
<span class="mr-2"></span>Viewed</label>
</li>

<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array('99', $_GET['searchFilter'], true)) {$chek6='checked';} else $chek6=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="Expired" title="Expired">
<input onchange="this.form.submit()" <?php echo $chek6 ?> type="checkbox" id="Expired" name="searchFilter[]" value="99"> 					
<span class="mr-2"></span>Expired</label>
</li>


</form>
										
</ul>                                        

</div>
</li>


                                                                
		  </ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
   
    