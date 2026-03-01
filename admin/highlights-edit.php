<?php ob_start(); ?>
<?php
$highlightsid=$_GET['highlightsid'];
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

?>
<!DOCTYPE html>  
<html lang="en"> 
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<style>
.table-condensed {width:97% !important}
</style>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>

<script src="js/jscolor.js"></script>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    
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
                    

<?php
//---------------display results in case of unpdate--------------
if (isset($_GET['results']))
{
	if ($_GET['results']=='success')
	{
	?>
    <div class="alert alert-success">
  	<strong>Success! Please re-activate your edited trip</strong>
    <a href="highlights/activate-highlights.php?highlightsid=<?php echo $_GET['highlightsid']; ?>" class="btn btn-danger" title="Click here to Activate">Activate</a>
	</div>
	<?
	}
	elseif ($_GET['results']=='error')
	{
	?>
    <div class="alert alert-danger">
  	<strong>Warning, Error!</strong>
	</div>
	<?php	
	} 
}
?>

<h3>Edit Highlights</h3>


<hr />
<div style="max-width:100%; overflow-x:auto; background:none !important; margin-bottom:100px">
    <div class="choose box"><strong>You must select a highlight type (Eg: Information)</strong></div>
    <div class="red box">You have selected <strong>Information</strong></div>
    <div class="green box">You have selected <strong>VR Travel and YouTube URL</strong></div>
    <div class="blue box">You have selected <strong>Link to an external or internal url</strong></div>
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM highlights WHERE highlightsid=$highlightsid";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);
			
	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	$active=$row['active'];
	if ($active==0)
	$mybakg='style="background:#666 !important"';
	elseif ($active==1)
	$mybakg='style="background:#fff !important"';
	
		
	// identify the website and properly display the images.
	if ($row['highlightswebsite']==1)
	{		
		$thumb='/img/epik-escapes-logo.png';		
		$bginverse='bg-inverse';
		$url='https://'.$_SERVER[HTTP_HOST];

	}
	else
	{
		$thumb='https://www.centreholidays.com/img/centre-holidays-logo-lg.png';
		$bginverse='';
		$url='https://www.centreholidays.com/';
	}
	
?>

<br />
<form action="highlights/update-highlights.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="highlightsid" name="highlightsid" value="<?php echo $row['highlightsid']; ?>" placeholder="#"/>


<label>Type</label>        
<select id="highlightstype" name="highlightstype" class="form-control">
<?php if (!empty($row['highlightstype'])) { 

if ($row['highlightstype']==1)
$highlightstype='Information';
elseif ($row['highlightstype']==2)
$highlightstype='VR Travel and YouTube URL';
elseif ($row['highlightstype']==3)
$highlightstype='Link to an external or internal url';

?>
<option value="<?php echo $row['highlightstype']; ?>"><?php echo $highlightstype ?></option>
<?php } else { ?>
<option value="choose">Type of Highlight (Eg: Information)</option>
<?php } 
//===========================================================================================
if ($row['highlightstype'] !=1) { ?>
<option value="1">Information</option>
<?php } if ($row['highlightstype'] !=2) { ?>
<option value="2">VR Travel and YouTube URL</option>
<?php } if ($row['highlightstype'] !=3) { ?>
<option value="3">Link to an external or internal url</option>
<?php } ?>
</select>

<hr />


<label>Label</label>        
<select id="highlightslabel" name="highlightslabel" class="form-control">
<?php if (!empty($row['highlightslabel'])) 
{
	if ($row['highlightslabel']=='bg-dark') 
	$highlightslabelfor='Book Online';
	elseif ($row['highlightslabel']=='bg-info') 
	$highlightslabelfor='Travel Partner';
	elseif ($row['highlightslabel']=='bg-primary') 
	$highlightslabelfor='News';
	elseif ($row['highlightslabel']=='bg-danger') 
	$highlightslabelfor='Trip';
	elseif ($row['highlightslabel']=='bg-success')
	$highlightslabelfor='Special Offer';
	elseif ($row['highlightslabel']=='bg-secondary')
	$highlightslabelfor='Media Centre';
	elseif ($row['highlightslabel']=='bg-warning')
	$highlightslabelfor='Press Release';		
	elseif ($row['highlightslabel']=='')
	$highlightslabelfor='None';
	
?>
<option value="<?php echo $row['highlightslabel']; ?>"><?php echo $highlightslabelfor ?></option>
<?php } ?>

<option value="">None</option>
<option value="bg-dark">Book Online</option>
<option value="bg-secondary">Media Centre</option>
<option value="bg-primary">News</option>
<option value="bg-warning">Press Release</option>
<option value="bg-success">Special Offer</option>
<option value="bg-info">Travel Partner</option>
<option value="bg-danger">Trip</option>


</select>

<hr />






<label>Title</label>  
<input type="text" id="highlightstitle" name="highlightstitle" value="<?php echo $row['highlightstitle']; ?>" class="form-control" placeholder="Title"/>


<hr />

<label>Meta Description</label>  
<input type="text" id="highlightsmeta" name="highlightsmeta" value="<?php echo $row['highlightsmeta']; ?>" class="form-control" placeholder="Meta Description"/>

<hr />

<label>Author</label>  
<input type="text" id="highlightsauthor" name="highlightsauthor" value="<?php echo $row['highlightsauthor']; ?>" class="form-control" placeholder="Author"/>

<hr />

<label>Cover Image Alt (Description)</label>  
<input type="text" id="highlightscoverimagealt" name="highlightscoverimagealt" value="<?php echo $row['highlightscoverimagealt']; ?>" class="form-control" placeholder="Cover Image Alt"/>

<hr />


<label>Cover Image</label>  
<input type="text" id="highlightscoverimage" name="highlightscoverimage" value="<?php echo $row['highlightscoverimage']; ?>" class="form-control" placeholder="Cover Image" />
<?php
if (!empty($row['highlightscoverimage']))
{
?>
<br /><!--<?php //echo $url ?>/img/highlights/-->
<img src="https://centreholidays.com/img/highlights/<?php echo $row['highlightscoverimage']; ?>" style="width:auto; max-height:300px;" />
<?php
}
?>

<hr />

<label>Horizontal Image</label>  
<input type="text" id="highlightshorizimage" name="highlightshorizimage" value="<?php echo $row['highlightshorizimage']; ?>" class="form-control" placeholder="Horizontal Image" />
<?php
if (!empty($row['highlightshorizimage']))
{
?>
<br /><!--<?php //echo $url ?>/img/highlights/-->
<img src="https://centreholidays.com/img/highlights/<?php echo $row['highlightshorizimage']; ?>" style="max-width:400px; max-height:400px;" />
<?php
}
?>


<hr />





<label>Preview Image</label>  
<input type="text" id="highlightspreviewimage" name="highlightspreviewimage" value="<?php echo $row['highlightspreviewimage']; ?>" class="form-control" placeholder="Square Image" />
<?php
if (!empty($row['highlightspreviewimage']))
{
?>
<br /><!--<?php //echo $url ?>/img/highlights/-->
<img src="https://centreholidays.com/img/highlights/<?php echo $row['highlightspreviewimage']; ?>" style="max-width:400px; max-height:400px;" />
<?php
}
?>


<hr />

<?php 
if (!empty($row['highlightscolor'])) 
$highlightscolor=$row['highlightscolor'];
else
$highlightscolor='c0984b';

if (!empty($row['highlightshovercolor'])) 
$highlightshovercolor=$row['highlightshovercolor'];
else
$highlightshovercolor='866a34';

?>
<label>Back Color</label> 
<input id="highlightscolor" name="highlightscolor" value="<?php echo $highlightscolor; ?>" class="form-control jscolor" placeholder="Highlights Color. This is defaulted to Gold. If Gold, leave field empty. If another colour, fill in the hex code."/>

<hr /> 
<label>Hover Color</label> 
<input id="highlightshovercolor" name="highlightshovercolor" value="<?php echo $highlightshovercolor; ?>" class="form-control jscolor" placeholder="Highlights Hover Color. This is defaulted to Dark Gold. If Dark Gold, leave field empty. If another colour, fill in the hex code."/>

<script>
	initSample();
</script>

<div class="red box"><!---->
<hr />
<label>Content (HTML code)</label>
<textarea name="highlightsdetails" style="min-height:200px; width:100%" placeholder="Content (HTML code)"><?php echo $row['highlightsdetails']; ?></textarea>

</div><!--id="editor" id="mymce" -->

<hr />
<label>Source</label>
<input id="highlightssource" name="highlightssource" value="<?php echo $row['highlightssource']; ?>" class="form-control" placeholder="Source"/>


<div class="blue box"><!---->
<hr />
<label>Internal URL</label>
<input id="highlightsinternalurl" name="highlightsinternalurl" value="<?php echo $row['highlightsinternalurl']; ?>" class="form-control" placeholder="Internal URL"/>
<hr />
<label>External URL</label>
<input id="highlightsexternalurl" name="highlightsexternalurl" value="<?php echo $row['highlightsexternalurl']; ?>" class="form-control" placeholder="External URL"/>

</div>

<div class="green box"><!---->
<hr />
<label>VR Travel and YouTube URL (ie. https://www.xplorit.com/orlando-florida/international-drive/icon-park-attractions-the-wheel)</label>
<input id="highlightsvrtravel" name="highlightsvrtravel" value="<?php echo $row['highlightsvrtravel']; ?>" class="form-control" placeholder="VR Travel and YouTube URL "/>

</div>


<div><!---->
<hr />

<label>HS URL</label>
<input id="hpageurl" name="hpageurl" value="<?php echo $row['hpageurl']; ?>" class="form-control" placeholder="Highlights URL"/>

</div>

<hr />

<label>Continents</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Continents
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['highlightscontinent']."' ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['highlightscontinent'], $row3['continent']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="highlightscontinent[]" value="<?php echo $row3['continent']; ?>" />&nbsp;<?php echo $row3['continent']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>



<hr />

<label>Countries</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Countries
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql4 = "SELECT * FROM countries WHERE countries !='".$row['highlightscountry']."' ORDER BY countries ASC";	  
	$result4 = mysqli_query($conn, $sql4);	
	if (mysqli_num_rows($result4) > 0) {
		// output data of each row
		while($row4 = mysqli_fetch_assoc($result4)) {
			
			if (strpos($row['highlightscountry'], $row4['countries']) !== false) {
			$stylecheck4='checked';
			}
			else
			$stylecheck4='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck4 ?> name="highlightscountry[]" value="<?php echo $row4['countries']; ?>" />&nbsp;<?php echo $row4['countries']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>


<hr />
<label>Interests</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Interests
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql3 = "SELECT * FROM interests WHERE interests !='".$row['highlightsinterests']."' AND interestshighlights=1 ORDER BY interests ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['highlightsinterests'], $row3['interests']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="highlightsinterests[]" value="<?php echo $row3['interests']; ?>" />&nbsp;<?php echo $row3['interests']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>

<hr />


<label>Agents</label>


<input type="number" id="AgentID" name="AgentID" value="<?php echo $row['AgentID']; ?>" class="form-control" placeholder="Agent ID" />

<?php
if (!empty($row['AgentID']))
{
$sql2213 = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID='".$row['AgentID']."' AND ch_agents_1.AgentID=ch_agents_2.AgentID";	  
	$result2213 = mysqli_query($conn, $sql2213);	
	if (mysqli_num_rows($result2213) > 0) {
		while($row2213 = mysqli_fetch_assoc($result2213)) {
	echo 'Assigned Agent: <strong>'.$row2213['FirstName'].' '.$row2213['LastName'].' '.$row2213['BusinessName'].'</strong>';		
		}
	}
}
?>









	<!--<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Agents
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
	
    <?php
//	$CAgentID=str_replace( ',', '', $row['AgentID'] );
//	if (!empty($CAgentID))
//	$CAgentIDcheck='';
//	else
//	$CAgentIDcheck='checked';
//	?>
//    <li><input type="radio" name="AgentID" id="AgentID" <?php echo $CAgentIDcheck ?> value="" > None</li>
//	<?php
//	$sql2213 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
//	$result2213 = mysqli_query($conn, $sql2213);	
//	if (mysqli_num_rows($result2213) > 0) {
//
//		while($row2213 = mysqli_fetch_assoc($result2213)) {
//		
//		if (strpos($row['AgentID'], $row2213['AgentID']) !== false) {
//    	$AgentIDcheck='checked';
//		}
//		else
//		$AgentIDcheck='';
//
//		?>
//        <li>        
//        <input type="radio" name="AgentID" id="AgentID" value="<?php //echo $row2213['AgentID'] ?>" <?php //echo $AgentIDcheck ?> > 
//		<?php //echo $row2213['AgentID'].' - <strong>'.$row2213['FirstName'].' '.$row2213['LastName'].'</strong> - '.$row2213['BusinessName']; ?>
//        </li>
//
//		<?php
//	
//			} 
//	}
?>

</ul>
</div>-->


<hr />
<label>Operators</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Operators
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql355 = "SELECT * FROM operators WHERE operators !='".$row['highlightsoperators']."' ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
			
			if (strpos($row['highlightsoperators'], $row355['operators']) !== false) {
			$stylecheck355='checked';
			}
			else
			$stylecheck355='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck355 ?> name="highlightsoperators[]" value="<?php echo $row355['operators']; ?>" />&nbsp;<?php echo $row355['operators']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>


<hr />


<label>Show on Site Index Page</label>        
<select id="highlightsshow" name="highlightsshow" class="form-control">
<?php if (!empty($row['highlightsshow'])) {?>
<option value="<?php echo $row['highlightsshow']; ?>"><?php echo $row['highlightsshow'] ?></option>
<?php }?>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>

<hr />


<label>CORPORATE: Show on Corporate Website Only</label>        
<select id="chighlightsshowcor" name="chighlightsshowcor" class="form-control">
<?php if (!empty($row['chighlightsshowcor'])) {?>
<option value="<?php echo $row['chighlightsshowcor']; ?>"><?php echo $row['chighlightsshowcor'] ?>
</option>
<?php }?>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>


<hr />


<label>AGENTS: Show on Corporate Website</label>        
<select id="highlightsshowcor" name="highlightsshowcor" class="form-control">
<?php if (!empty($row['highlightsshowcor'])) {?>
<option value="<?php echo $row['highlightsshowcor']; ?>"><?php echo $row['highlightsshowcor'] ?></option>
<?php }?>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>


<hr />


<label>Associated website</label>
<div style="text-align:left; background:#FFF; padding:10px" class="colspan12">

<?php 
if ($row['highlightswebsite']==1) 
$website1='checked';
elseif ($row['highlightswebsite']==2) 
$website2='checked';
elseif ($row['highlightswebsite']==3) 
$website3='checked';

?>

<input type="radio" name="highlightswebsite" value="1" <?php echo $website1 ?> />&nbsp;Epik
<br />
<input type="radio" name="highlightswebsite" value="2" <?php echo $website2 ?> />&nbsp;Centre Holidays
<br />
<input type="radio" name="highlightswebsite" value="3" <?php echo $website3 ?> />&nbsp;Epik & Centre Holidays
<br />

</div>

<hr />


<label>Expiry Date MM/DD/YEAR</label>
<br />
<div class="input-group">
<input type="text" name="highlightsexpirydate" value="<?php echo date('m/d/Y', ($row['highlightsexpirydate'])); ?>" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>

<hr />

<label>Tags</label>
<br />
<textarea name="highlightstags" id="highlightstags" placeholder="Tags" class="form-control"><?php echo $row['highlightstags']; ?></textarea>

<hr />

<label>Internal Notes</label>
<br />
<textarea name="highlightsinternotes" id="highlightsinternotes" placeholder="Internal Notes" class="form-control"><?php echo $row['highlightsinternotes']; ?></textarea>


<hr />
<input type="submit" value="Update" class="btn btn-primary"  style="width:100%" />

</form>
</div>


<?php

		}
?>

</div>

<?php
	}
?>


<script>

$(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="1"){
                    $(".box").hide();
                    $(".red").show();
					$(".Yellow").show();
                }
                if($(this).attr("value")=="2"){
                    $(".box").hide();
                    $(".green").show();
					$(".Yellow").show();
                }
                if($(this).attr("value")=="3"){
                    $(".box").hide();
                    $(".blue").show();
					$(".Yellow").hide();
					
                }
                if($(this).attr("value")=="choose"){
                    $(".box").hide();
                    $(".choose").show();
                }
            });
        }).change();
    });

</script>


</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer.php');?> 
</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/right-panel.php');?>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/footer-scripts.php');?>
</body>
</html>

</body>
</html>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>