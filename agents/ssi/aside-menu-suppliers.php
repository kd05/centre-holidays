<?php

//===================CONNECT TO EPIK ESCAPE DATABSE=========================================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
	
?>
<form action="https://centreholidays.com/agents/suppliers.php#supplier-list" method="get" enctype="multipart/form-data">
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
										<span class="menu-text text-warning font-weight-bolder">Filter Suppliers</span>
										<i class="menu-arrow text-warning"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="400" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											
<?php

$sql1 = "SELECT * FROM affiliatefilter ORDER BY affilter ASC";
$result1 = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {


//======================counting number of appearance
$sql2 = "SELECT * FROM affiliates WHERE affiliateactive=1 AND affilter LIKE '%".$row1['affilter']."%' ";
$result2 = mysqli_query($conn, $sql2);
$numappear=mysqli_num_rows($result2);

if ($numappear > 0)
{
?>											
<li class="menu-item pb-5 pl-8" aria-haspopup="true" ><?php if (in_array($row1["affilter"], $_GET['affilter'], true)) {$chek1='checked';} else $chek1=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="<?php echo $row1["affilter"] ?>" title="<?php echo $row1["affilter"] ?>">
<input onchange="this.form.submit()" <?php echo $chek1 ?> type="checkbox" id="<?php echo $row1['affilter']; ?>" name="affilter[]" value="<?php echo $row1["affilter"] ?>"> 					<span class="mr-2"></span><?php echo $row1['affilter']; ?><small class="ml-2">(<?php echo $numappear ?>)</small></label></li>
<?Php
}
}
}
?>
										</ul>
									</div>
								</li>
      
            
                                                                
		  </ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
    </form>