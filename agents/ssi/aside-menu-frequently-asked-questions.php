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
<span class="menu-text text-warning font-weight-bolder">Filter FAQ</span>
<i class="menu-arrow text-warning"></i>
</a>

<div class="menu-submenu" kt-hidden-height="400" style="">
<i class="menu-arrow"></i>
<ul class="menu-subnav">
<form action="https://centreholidays.com/agents/frequently-asked-questions.php#faq-list" method="get" enctype="multipart/form-data">											
<?php

$sql1 = "SELECT * FROM faqfilter ORDER BY faqFilter ASC";
$result1 = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result1) > 0) {
// output data of each row
while($row1 = mysqli_fetch_assoc($result1)) {


//======================counting number of appearance
$sql2 = "SELECT * FROM faq WHERE faqActive=1 AND faqFilter LIKE '".$row1['faqFilter']."%' ";
$result2 = mysqli_query($conn, $sql2);
$numappear=mysqli_num_rows($result2);

if ($numappear > 0)
{
?>										
<li class="menu-item pb-5 pl-8" aria-haspopup="true" ><?php if (in_array($row1["faqFilter"], $_GET['faqFilter'], true)) {$chek1='checked';} else $chek1=''; ?>
<label class="checkbox checkbox-outline checkbox-warning" for="<?php echo $row1["faqFilter"] ?>" title="<?php echo $row1["faqFilter"] ?>">
<input onchange="this.form.submit()" <?php echo $chek1 ?> type="checkbox" id="<?php echo $row1['faqFilter']; ?>" name="faqFilter[]" value="<?php echo $row1["faqFilter"] ?>"> 					
<span class="mr-2"></span><?php echo $row1['faqFilter']; ?><small class="ml-2">(<?php echo $numappear ?>)</small></label></li>
<?Php
}
}
}
?>
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
<span class="menu-text text-warning font-weight-bolder">Filter By Supplier</span>
<i class="menu-arrow text-warning"></i>
</a>
                                


<div class="menu-submenu" kt-hidden-height="400" style="">
<i class="menu-arrow"></i>
<ul class="menu-subnav">
<form action="https://centreholidays.com/agents/frequently-asked-questions.php#faq-list" method="get" enctype="multipart/form-data">											
<?php

$sql1 = "SELECT * FROM affiliates ORDER BY affiliatename ASC";
$result1 = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {


//======================counting number of appearance
$sql2 = "SELECT * FROM faq WHERE faqActive=1 AND affiliatename LIKE '%".$row1['affiliatename']."%' ";
$result2 = mysqli_query($conn, $sql2);
$numappear=mysqli_num_rows($result2);
if ($numappear > 0)
{
?>											
<li class="menu-item pb-5 pl-8" aria-haspopup="true" >
<?php if (in_array($row1["affiliatename"], $_GET['faqFilter'], true)) {$chek1='checked';} else $chek1=''; ?>
<label class="radio radio-outline radio-warning" for="<?php echo $row1["affiliatename"] ?>" title="<?php echo $row1["affiliatename"] ?>">
<input onchange="this.form.submit()" <?php echo $chek1 ?> type="radio" id="<?php echo $row1['affiliatename']; ?>" name="faqFilter[]" value="<?php echo $row1["affiliatename"] ?>"> 					
<span class="mr-2"></span><?php echo $row1['affiliatename']; ?><small class="ml-2">(<?php echo $numappear ?>)</small></label></li>
<?php
}

		}
	}
?>
</form>
										
</ul>                                        

</div>
</li>


                                                                
		  </ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
   
    