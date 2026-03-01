<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta name="description" content="">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/head-scripts.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/css/admin-custom-header.php'); ?>  


<style>
table {width:97% !important}
table th {text-align:left !important; padding-left:20px; max-width:100px}
</style>


<script>
function myFunction() {
    var checkBox = document.getElementById("myCheck2");
    var text = document.getElementById("text2");
    if (checkBox.checked == true){
        text2.style.display = "none";
    } else {
       text2.style.display = "block";
    }

    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text1");
    if (checkBox.checked == true){
        text1.style.display = "none";
    } else {
       text1.style.display = "block";
    }		
	
} 
</script>


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
    <a href="trips/activate-trip.php?tid=<?php echo $_GET['tid']; ?>" class="btn btn-danger" title="Click here to Activate">Activate</a>
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

<h3>Edit/Delete/Activate/Deactivate Trips</h3>
<div>
<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM trips WHERE tid='".sanitize_sql_string($_GET['tid'])."'";
		
		//==========custom paginatnion===================
		
		$result = mysqli_query($conn, $sql);
		$row_cnt = mysqli_num_rows($result);

	
	if ($row_cnt > 0)// display results in case the feedback table is not empty
	{

?>
            
<table style="margin-top:10px">
<?php

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	// identify the website and properly display the images.
	if ($row['twebsite']=='1' || $row['twebsite']=='2' || $row['twebsite']=='3')
	{
		$url='https://www.centreholidays.com/';
	}
/*	else
	{
		$url='https://www.epikescapes.com/';
	}*/



$active=$row['active'];
if ($active==0)
$mybakg='style="background:#666 !important"';
elseif ($active==1)
$mybakg='style="background:#fff !important"';

	// Ssign color to each website
	$website=$row['twebsite'];
	include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');

?>
<form action="trips/update-trips.php" method="post" enctype="multipart/form-data">

<tr class="selectedtr" <?php echo $mybakg ?> >
<th>ID</th><td><?php echo $row['tid']; ?><input type="hidden" id="tid" name="tid" value="<?php echo $row['tid']; ?>" placeholder="#"/></td>
</tr>


<tr>
<th>Main Continent</th>

<td>
<select id="tcontinent" name="tcontinent" class="form-control">
<option value="<?php echo $row['tcontinent']; ?>"><?php echo $row['tcontinent']; ?></option>
<?php
	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['tcontinent']."' ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['continent']; ?>"><?php echo $row3['continent']; ?></option>
    <?php
			
		}
	}
?>
</select>
</td>
</tr>

<tr>
<th>Main Country</th>
<td>
<select id="tcountry" name="tcountry" class="form-control">
<option value="<?php echo $row['tcountry']; ?>"><?php echo $row['tcountry']; ?></option>
<?php
	$sql3 = "SELECT * FROM countries WHERE countries !='".$row['tcountry']."' ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
	
	?>
    <option value="<?php echo $row3['countries']; ?>"><?php echo $row3['countries']; ?></option>
    <?php
			
		}
	}
?>
</select>
</td>
</tr>

<?php if (!empty($row['tothercontinents'])) { ?>

<tr>
<th>Other Continents Sort Order &nbsp;&nbsp;

<input type="checkbox" value="yes" name="changecontinentsorder" id="myCheck2"  onclick="myFunction()" />
</th>

<td style="text-align:left !important;">

<?php

$tags11 = explode(',' , $row['tothercontinents'] );
foreach($tags11 as $xxx11 => $key11) {
	$xxx11;
}
//==================================================
$tags11 = explode(',' , $row['tothercontinents'] );
foreach($tags11 as $i11 => $key11) {
	if ($i11 < $xxx11 ){
	?>	 
<input type="text" name="newtothercontinents[]" style="height:27px; margin-top:5px; width:150px; background-color:#ccc; border:1px solid #ccc; padding:5px;" 
value="<?php echo $key11 ?>" readonly />
<input type="text" name="tothercontinentsorder[]" style="height:27px; margin-top:5px; width:30px; background-color:#fff; border:1px solid #fff; padding:5px; margin-left:-5px" value="<?php echo $i11+1 ?>" max="2" maxlength="2">&nbsp;&nbsp;
	<?php
    }
	else
	echo '';
}
?>

</td>
</tr>

<?php } ?>



<tr>
<th>Other Continents</th>

<td style="text-align:left !important; display:block" id="text2">

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Other Continents 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php

	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['tcontinent']."' ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['tothercontinents'], $row3['continent']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="tothercontinents[]" value="<?php echo $row3['continent']; ?>" />&nbsp;<?php echo $row3['continent']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>

</td>


</tr>

<?php if (!empty($row['tothercountries'])) { ?>

<tr>
<th>Other Countries Sort Order &nbsp;&nbsp;

<input type="checkbox" checked value="yes" name="changecountriesorder" id="myCheck"  onclick="myFunction()" />
</th>

<td style="text-align:left !important;">

<?php

$tags = explode(',' , $row['tothercountries'] );
foreach($tags as $xxx => $key) {
	$xxx;
}
//==================================================
$tags = explode(',' , $row['tothercountries'] );
foreach($tags as $i => $key) {
	if ($i < $xxx ){
	?>	 
<input type="text" name="newtothercountries[]" style="height:27px; margin-top:5px; width:150px; background-color:#ccc; border:1px solid #ccc; padding:5px;" 
value="<?php echo $key ?>" readonly />
<input type="text" name="tothercountriesorder[]" style="height:27px; margin-top:5px; width:30px; background-color:#fff; border:1px solid #fff; padding:5px; margin-left:-5px" value="<?php echo $i+1 ?>" max="2" maxlength="2">&nbsp;&nbsp;
	<?php
    }
	else
	echo '';
}
?>

</td>
</tr>

<?php } ?>


<tr>
<th>Other Countries</th>

<td style="text-align:left !important; display:block" id="text1">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Other Countries 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php
	$sql3 = "SELECT * FROM countries WHERE countries !='".$row['tcountry']."' ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['tothercountries'], $row3['countries']) !== false) {
			$stylecheck4='checked';
			}
			else
			$stylecheck4='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck4 ?> name="tothercountries[]" value="<?php echo $row3['countries']; ?>" />&nbsp;<?php echo $row3['countries']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>
</tr>


<tr>
<th>Trip Code</th>
<td <?php echo $webbakg ?>><input type="text" id="tcode" name="tcode" value="<?php echo $row['tcode']; ?>" class="form-control" placeholder="Trip Code" /></td>
</tr><tr>
<th>Title</th>
<td><input type="text" id="ttitle" name="ttitle" value="<?php echo $row['ttitle']; ?>" class="form-control" placeholder="Title"/></td>
</tr>

<tr>
<th>Meta</th>
<td><input type="text" id="tmeta" name="tmeta" value="<?php echo $row['tmeta']; ?>" class="form-control" placeholder="Meta"/></td>
</tr>

<tr>
<th>Number of Passengers ie. 2-16</th>

<td>
<input type="text" id="tgroup" name="tgroup" value="<?php echo $row['tgroup']; ?>" placeholder="Number of Passengers" class="form-control" /></td>
</tr>

<tr>
<th>Commission</th>
<td><input type="text" id="tcommission" name="tcommission" value="<?php echo $row['tcommission']; ?>" class="form-control" placeholder="Commission"/></td>
</tr><tr>
<th>Prices</th>
<td><input type="text" id="tprice" name="tprice" value="<?php echo $row['tprice']; ?>" class="form-control" placeholder="Cost"/></td>
</tr><tr>
<th>Currency</th>
<td>
<select id="tcurrency" name="tcurrency"  class="form-control">
<option value="<?php echo $row['tcurrency']; ?>"><?php echo $row['tcurrency']; ?></option>
<option value="">Currency</option>
<option value="$">$</option>
<option value="&euro;">&euro;</option>
<option value="&pound;">&pound;</option>
<option value="&yen;">&yen;</option>
</select>
</td>
</tr>

<tr>
<th>Departing From
</th>

<td>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Departure From Location
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql3119 = "SELECT * FROM promodepartfrom WHERE promodepartfrom !='".$row['tdepartfrom']."' ORDER BY promodepartfrom ASC";	  
	$result3119 = mysqli_query($conn, $sql3119);	
	if (mysqli_num_rows($result3119) > 0) {
		// output data of each row
		while($row3119 = mysqli_fetch_assoc($result3119)) {
			
			if (strpos($row['tdepartfrom'], $row3119['promodepartfrom']) !== false) {
			$stylecheck69='checked';
			}
			else
			$stylecheck69='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck69 ?> name="tdepartfrom[]" value="<?php echo $row3119['promodepartfrom']; ?>" />&nbsp;<?php echo $row3119['promodepartfrom']; ?></li>
	<?php
			
		}
	}
?>


</ul>

</div>

</td>
</tr>


<tr>
<th>Departure Gateways list of Canadian Cities (Toronto, Calgary.....)</th>

<td style="text-align:left !important">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Departure Gateways 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<li><input type="checkbox" id="selectall" value="All Canadian Gateways" onclick="checkedAll();" name="departuregateways[]" > 
&nbsp;Select All/Unselect All</li>

<script>   
var checked=false;
function checkedAll () {
var aa =  document.getElementsByName("departuregateways[]");
checked = document.getElementById('selectall').checked;

for (var i =0; i < aa.length; i++) 
{
aa[i].checked = checked;
}
}
</script>  

<?php
	$sql311 = "SELECT * FROM departuregateways WHERE departuregateways !='".$row['tdeparturegateways']."' ORDER BY departuregateways ASC";	  
	$result311 = mysqli_query($conn, $sql311);	
	if (mysqli_num_rows($result311) > 0) {
		// output data of each row
		while($row311 = mysqli_fetch_assoc($result311)) {
			
			if (strpos($row['tdeparturegateways'], $row311['departuregateways']) !== false) {
			$stylecheck66='checked';
			}
			else
			$stylecheck66='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck66 ?> name="departuregateways[]" value="<?php echo $row311['departuregateways']; ?>" />&nbsp;<?php echo $row311['departuregateways']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>

</tr>






<tr>
<th>Trip Types (EE)</th>

<td style="text-align:left !important">

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Trip Types (EE) 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql311x = "SELECT * FROM types ORDER BY types ASC";	  
	$result311x = mysqli_query($conn, $sql311x);	
	if (mysqli_num_rows($result311x) > 0) {
		// output data of each row
		while($row311x = mysqli_fetch_assoc($result311x)) {
			
			if (strpos($row['types'], $row311x['types']) !== false) {
			$stylecheck66x='checked';
			}
			else
			$stylecheck66x='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck66x ?> name="types[]" value="<?php echo $row311x['types']; ?>" />&nbsp;<?php echo $row311x['types']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>

</tr>



<tr>
<th>Travel Interests (CH)</th>

<td style="text-align:left !important">

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Travel Interests (CH) 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql311xs = "SELECT * FROM interests WHERE (intereststrips=1 || intereststrips2=1) ORDER BY interests ASC";	  
	$result311xs = mysqli_query($conn, $sql311xs);	
	if (mysqli_num_rows($result311xs) > 0) {
		// output data of each row
		while($row311xs = mysqli_fetch_assoc($result311xs)) {
			
			if (strpos($row['interests'], $row311xs['interests']) !== false) {
			$stylecheck66xs='checked';
			}
			else
			$stylecheck66xs='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck66xs ?> name="interests[]" value="<?php echo $row311xs['interests']; ?>" />&nbsp;<?php echo $row311xs['interests']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>

</tr>




<tr>
<th>Activity Level</th>

<td style="text-align:left !important">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Activity Level 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php

$str=explode(',',$row['activitylevel']);
	$sql311xsr = "SELECT * FROM activitylevel ORDER BY activitylevel ASC";	  
	$result311xsr = mysqli_query($conn, $sql311xsr);	
	if (mysqli_num_rows($result311xsr) > 0) {

		while($row311xsr = mysqli_fetch_assoc($result311xsr)) {
			
			if (($str[0]== $row311xsr['activitylevel']) || ($str[1] == $row311xsr['activitylevel']) 
			|| ($str[2] == $row311xsr['activitylevel']) || ($str[3] == $row311xsr['activitylevel']) 
			|| ($str[4] == $row311xsr['activitylevel']) || ($str[5] == $row311xsr['activitylevel']))
			$stylecheck66xsr='checked';
			else
			$stylecheck66xsr='';
			
	
	?>
    <li><input type="radio" <?php echo $stylecheck66xsr ?> name="activitylevel" value="<?php echo $row311xsr['activitylevel']; ?>" />&nbsp;<?php echo $row311xsr['activitylevel']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>

</tr>




<tr>
<th>Styles</th>

<td style="text-align:left !important">

<?php
	$sql311xsry = "SELECT * FROM styles WHERE stylesactive=1 ORDER BY styles ASC"; // AND (stylestrips=1 AND stylestrips2=1)  
	$result311xsry = mysqli_query($conn, $sql311xsry);	
	if (mysqli_num_rows($result311xsry) > 0) {
		// output data of each row
		while($row311xsry = mysqli_fetch_assoc($result311xsry)) {
			
			if (strpos($row['tstyle'], $row311xsry['styles']) !== false) {
			$stylecheck66xsry='checked';
			}
			else
			$stylecheck66xsry='';	
	
	?>
    <input type="radio" <?php echo $stylecheck66xsry ?> name="styles[]" value="<?php echo $row311xsry['styles']; ?>" />&nbsp;<?php echo $row311xsry['styles']; ?>
    <br />
	<?php
			
		}
	}
?>


</td>

</tr>






<tr>
<th>Cruise Ships</th>

<td style="text-align:left !important">
<?php
	$sql313 = "SELECT * FROM cruiseships WHERE cruiseships !='".$row['cruiseships']."' ORDER BY cruiseships ASC";	  
	$result313 = mysqli_query($conn, $sql313);	
	if (mysqli_num_rows($result313) > 0) {
		// output data of each row
		while($row313 = mysqli_fetch_assoc($result313)) {
			
			if (strpos($row['tcruiseships'], $row313['cruiseships']) !== false) {
			$stylecheck99='checked';
			}
			else
			$stylecheck99='';	
	
	?>
    <input type="checkbox" <?php echo $stylecheck99 ?> name="cruiseships[]" value="<?php echo $row313['cruiseships']; ?>" />&nbsp;<?php echo $row313['cruiseships']; ?>
    <br />
	<?php
			
		}
	}
?>


</td>

</tr>


<tr>
<th>Start City</th>
<td><input id="tstartarea" name="tstartarea" value="<?php echo $row['tstartarea']; ?>" placeholder="Start City" class="form-control"/></td>
</tr><tr>
<th>Finish City</th>
<td><input id="tendarea" name="tendarea" value="<?php echo $row['tendarea']; ?>" placeholder="Finish City" class="form-control"/></td>
</tr><tr>
<th>Number of countries</th>
<td><input placeholder="No. of countries" id="numcountries" name="numcountries" value="<?php echo $row['numcountries']; ?>" max="3" maxlength="3" class="form-control" /></td>
</tr>

<tr>
<th>Durations (If you have no durations leave it blank / uncheck all boxes)</th>

<td style="text-align:left !important">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Durations 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql3 = "SELECT * FROM duration WHERE duration !='".$row['promoduration']."' ORDER BY duration ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['tduration'], $row3['duration']) !== false) {
			$stylecheck15='checked';
			}
			else
			$stylecheck15='';	
	
	?>
    <li><input type="radio" <?php echo $stylecheck15 ?> name="duration" value="<?php echo $row3['duration']; ?>" />&nbsp;<?php echo $row3['duration']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>
</tr>


<tr>
<th>Number of days</th>


<td><input id="tdays" name="tdays" value="<?php echo $row['tdays']; ?>" max="3" maxlength="3" class="form-control"/></td>
</tr>

<tr>
<th>Trip Start Date (MM/DD/YYYY)</th>
<td>
<div class="input-group">
<input type="text" name="tstartdate" value="<?php echo $row['tstartdate'] ?>" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
</td>
</tr>

<tr>
<th>Trip End Date (MM/DD/YYYY)</th>
<td>
<div class="input-group">
<input type="text" name="tenddate" value="<?php echo $row['tenddate'] ?>" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div></td>
</tr>

<?php
if ($row['twebsite'] == 1)
{
echo '<strong>Epik</strong>';
$mainlink='https://www.epikescapes.com/';
}
elseif ($row['twebsite'] == 2)
{
echo '<strong>CH</strong>';
$mainlink='https://www.centreholidays.com/';

}
elseif ($row['twebsite'] == 3)
{
echo '<strong>Epik & CH</strong>';
$mainlink='https://www.epikescapes.com/'; 
}
?>


<tr>
<th>Cover Image Alt (Description)</th>

<td>
<input type="text" name="tcoverimgalt" id="tcoverimgalt" class='form-control' placeholder="Cover Image Alt (Description)" value="<?php echo $row['tcoverimgalt']; ?>" />
</td>

</tr>


<tr>
<th>Cover Image</th>

<td>
<input type="text" id="timage" name="timage" value="<?php echo $row['timage']; ?>" class="form-control" placeholder="Image" />
<?php
if (!empty($row['timage']))
{
?>
<br />
<a href="<?php echo $mainlink."/img/trips/".$row['timage']; ?>">
<img src="<?php echo $mainlink."/img/trips/".$row['timage']; ?>" style="max-width:300px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<tr>
<th>Horizontal Thumbnail</th>

<td>
<input type="text" id="thorizontalimage" name="thorizontalimage" value="<?php echo $row['thorizontalimage']; ?>" class="form-control" placeholder="Horizontal Thumbnail" />
<?php
if (!empty($row['thorizontalimage']))
{
?>
<br />
<a href="<?php echo $mainlink."/img/trips/".$row['thorizontalimage']; ?>">
<img src="<?php echo $mainlink."/img/trips/".$row['thorizontalimage']; ?>" style="max-width:300px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<tr>
<th>Square Thumbnail</th>

<td>
<input type="text" id="squarethumb" name="squarethumb" value="<?php echo $row['squarethumb']; ?>" class="form-control" placeholder="Square image"/>
<?php
if (!empty($row['squarethumb']))
{
?>
<br />
<a href="<?php echo $mainlink."/img/trips/".$row['squarethumb']; ?>">
<img src="<?php echo $mainlink."/img/trips/".$row['squarethumb']; ?>" style="max-width:100px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>



<tr>
<th>Route Map</th>

<td>
<input type="text" id="troutmap" name="troutmap" value="<?php echo $row['troutmap']; ?>" class="form-control" placeholder="Route Map"/>
<?php
if (!empty($row['troutmap']))
{
?>
<br />
<a href="<?php echo $mainlink."/img/trips/".$row['troutmap']; ?>">
<img src="<?php echo $mainlink."/img/trips/".$row['troutmap']; ?>" style=" width:auto; max-height:400px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<!--<tr>
<th>Itinerary page URL</th>

<td><input id="turl" name="turl" value="<?php //echo $row['turl']; ?>" class="form-control" placeholder="Itinerary URL"/></td>
</tr>-->

<tr>
<th>Itinerary PDF URL CH</th>

<td><input id="tfilech" name="tfilech" value="<?php echo $row['tfilech']; ?>" placeholder="Itinerary PDF URL CH" class="form-control"/></td>
</tr>

<tr>
<th>Google Drive URL (Agent Portal)</th>

<td><input id="tfilechagents" name="tfilechagents" value="<?php echo $row['tfilechagents']; ?>" placeholder="Google Drive URL (Agent Portal)" class="form-control"/></td>
</tr>

<tr>
<th>Itinerary PDF URL EPIK</th>

<td><input id="tfileepik" name="tfileepik" value="<?php echo $row['tfileepik']; ?>" placeholder="Itinerary PDF URL EPIK" class="form-control"/></td>
</tr>

<tr>
<th>VIDEO URL</th>

<td><input id="tvideo" name="tvideo" value="<?php echo $row['tvideo']; ?>" placeholder="Video URL" class="form-control"/></td>
</tr>

<tr>
<th>
<label>Trip Url</label>
</th>

<td>
<input id="trp" name="trp" value="<?php echo $row['trp']; ?>" class="form-control" placeholder="Trip URL"/>
</td>

</tr>

<tr>
<th>
<label>External Trip Url</label>
</th>

<td>
<input id="exttrp" name="exttrp" value="<?php echo $row['exttrp']; ?>" class="form-control" placeholder="External Trip Url ie. https://www.booking.com"/>
</td>

</tr>

<tr>
<th>Trip Snippet (Trips Index)</th>

<td><textarea name="thlights" id="thlights" class='scrollable form-control' placeholder="Trip Snippet (Trips Index)"><?php echo $row['thlights']; ?></textarea></td>
</tr>


<tr>
<th>Trip Itinerary</th>

<td><textarea name="tbody" id="tbody" class='scrollable form-control' placeholder="Trip Details (please copy past)"><?php echo $row['tbody']; ?></textarea></td>
</tr>

<tr>
<th>Extension 1</th>

<td><textarea name="extension1" id="extension1" class='scrollable form-control' placeholder="Extension 1 (please copy past)"><?php echo $row['extension1']; ?></textarea></td>
</tr>

<tr>
<th>Extension 2</th>

<td><textarea name="extension2" id="extension2" class='scrollable form-control' placeholder="Extension 2 (please copy past)"><?php echo $row['extension2']; ?></textarea></td>
</tr>

<tr>
<th>Activities</th>

<td><textarea name="activities" id="activities" class='scrollable form-control' placeholder="Activities"><?php echo $row['activities']; ?></textarea></td>
</tr>

<tr>
<th>Accommodation</th>

<td><textarea name="accommodation" id="accommodation" class='scrollable form-control' placeholder="Accommodation"><?php echo $row['accommodation']; ?></textarea></td>
</tr>

<tr>
<th>Experiences</th>

<td><textarea name="texperiences" id="texperiences" class='scrollable form-control' placeholder="texperiences"><?php echo $row['texperiences']; ?></textarea></td>
</tr>


<tr>
<th>Inclusions</th>

<td><textarea name="tinclusions" id="tinclusions" class='scrollable form-control' placeholder="Inclusions"><?php echo $row['tinclusions']; ?></textarea></td>
</tr>

<tr>
<th>Exclusions</th>

<td><textarea name="texclusions" id="texclusions" class='scrollable form-control' placeholder="Exclusions"><?php echo $row['texclusions']; ?></textarea></td>
</tr>


<tr>
<th>Additional Notes</th>

<td><textarea name="tadditionalnotes" id="tadditionalnotes" class='scrollable form-control' placeholder="Additional Notes"><?php echo $row['tadditionalnotes']; ?></textarea></td>
</tr>


<tr>
<th>Rates And Dates Year 1</th>

<td>
<input type="text" value="<?php echo $row['tratesdatesyear1']; ?>" id="tratesdatesyear1" name="tratesdatesyear1" class="form-control" placeholder="Year 1" />
<textarea name="tratesdates" id="tratesdates" class='scrollable form-control' placeholder="Rates And Dates (please copy past) Year 1"><?php echo $row['tratesdates']; ?></textarea></td>
</tr>

<tr>
<th>Rates And Dates Year 2</th>

<td>
<input type="text" value="<?php echo $row['tratesdatesyear2']; ?>" id="tratesdatesyear2" name="tratesdatesyear2" class="form-control" placeholder="Year 2" />
<textarea name="tratesdates2" id="tratesdates2" class='scrollable form-control' placeholder="Rates And Dates (please copy past) 2"><?php echo $row['tratesdates2']; ?></textarea></td>
</tr>

<tr>
<th>Rates And Dates Year 3</th>

<td>
<input type="text" value="<?php echo $row['tratesdatesyear3']; ?>" id="tratesdatesyear3" name="tratesdatesyear3" class="form-control" placeholder="Year 3" />
<textarea name="tratesdates3" id="tratesdates3" class='scrollable form-control' placeholder="Rates And Dates (please copy past) 3"><?php echo $row['tratesdates3']; ?></textarea>
</td>
</tr>




<tr>
<th>Tags</th>
<td><textarea name="tags" id="tags" class='scrollable form-control' placeholder="EpikeEscape tags separated with commas"><?php echo $row['tags']; ?></textarea></td>
</tr><tr>
<th>Associated Website</th>

<td style="text-align:left !important">

<?php 
if ($row['twebsite']==1) 
$website1='checked';
elseif ($row['twebsite']==2) 
$website2='checked';
elseif ($row['twebsite']==3) 
$website3='checked';
?>

<input type="radio" name="twebsite" value="1" <?php echo $website1 ?> />&nbsp;Epik
<br />
<input type="radio" name="twebsite" value="2" <?php echo $website2 ?> />&nbsp;Centre Holidays
<br />
<input type="radio" name="twebsite" value="3" <?php echo $website3 ?> />&nbsp;Epik & Centre Holidays
<br />
    


</td>
</tr>

<tr>
<th>Operators</th>

<td>
	
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Operators
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql355 = "SELECT * FROM operators ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
			
			if (strpos($row['toperators'], $row355['operators']) !== false) {
			$stylecheck355='checked';
			}
			else
			$stylecheck355='';	
	
	?>
    <li><input type="radio" <?php echo $stylecheck355 ?> name="toperators" value="<?php echo $row355['operators']; ?>" />&nbsp;<?php echo $row355['operators']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>





	
</td>
</tr><tr>
<th>Internal Notes</th>

<td><textarea name="tnotes" id="tnotes" placeholder="Internal Notes" class="scrollable form-control"><?php echo $row['tnotes']; ?></textarea></td></td>
</tr><tr>
<th>Expiry Date</th>
<td>
<div class="input-group">
<input type="text" class="form-control" name="texpiry" id="datepicker-autoclose1" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y', $row['texpiry']); ?>">
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
</td>
</tr>



<tr>
<th>Agents</th>

<td style="text-align:left !important; padding-left:20px;">
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

/*	$sql2213 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
	$result2213 = mysqli_query($conn, $sql2213);	
	if (mysqli_num_rows($result2213) > 0) {
		while($row2213 = mysqli_fetch_assoc($result2213)) {
		
		if (strpos($row['AgentID'], trim($row2213['AgentID'])) !== false) {
    	$AgentIDcheck='checked';
		}
		else
		$AgentIDcheck='';*/

		?>
        <li>        
        <input type="radio" name="AgentID[]" id="AgentID[]" value="<?php //echo $row2213['AgentID'] ?>" <?php //echo $AgentIDcheck ?> > 
		<?php //echo $row2213['AgentID'].' - <strong>'.$row2213['FirstName'].' '.$row2213['LastName'].'</strong> - '.$row2213['BusinessName']; ?>
        </li>
        
		<?php
	
			//} 
	//}
?>

</ul>
</div>-->

</td>
</tr>


<tr>
<th>Show on Site Index Page</th>
<td>      
<select id="tshow" name="tshow" class="form-control">
<?php if (!empty($row['tshow'])) {?>
<option value="<?php echo $row['tshow']; ?>"><?php echo $row['tshow'] ?></option>
<?php }?>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>


<tr>
<th>Show on Corporate Website</th>
<td>        
<select id="tshowcor" name="tshowcor" class="form-control">
<?php if (!empty($row['tshowcor'])) {?>
<option value="<?php echo $row['tshowcor']; ?>"><?php echo $row['tshowcor'] ?></option>
<?php }?>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr>
<th>
Image
</th>

<td>

<div class="panel-group" id="accordion" style="text-align:left">
    
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>Image 1</strong></a>
</h4>
</div>
<div id="collapse1" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 1 Image</label>
<input type="text" id="tslider1" name="tslider1" value="<?php echo $row['tslider1']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 1 Title</label>
<input type="text" id="tslidercap1" name="tslidercap1" value="<?php echo $row['tslidercap1']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>
    
    
    
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>Image 2</strong></a>
</h4>
</div>
<div id="collapse2" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 2 Image</label>
<input type="text" id="tslider2" name="tslider2" value="<?php echo $row['tslider2']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 2 Title</label>
<input type="text" id="tslidercap2" name="tslidercap2" value="<?php echo $row['tslidercap2']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><strong>Image 3</strong></a>
</h4>
</div>
<div id="collapse3" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 3 Image</label>
<input type="text" id="tslider3" name="tslider3" value="<?php echo $row['tslider3']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 3 Title</label>
<input type="text" id="tslidercap3" name="tslidercap3" value="<?php echo $row['tslidercap3']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><strong>Image 4</strong></a>
</h4>
</div>
<div id="collapse4" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 4 Image</label>
<input type="text" id="tslider4" name="tslider4" value="<?php echo $row['tslider4']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 4 Title</label>
<input type="text" id="tslidercap4" name="tslidercap4" value="<?php echo $row['tslidercap4']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><strong>Image 5</strong></a>
</h4>
</div>
<div id="collapse5" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 5 Image</label>
<input type="text" id="tslider5" name="tslider5" value="<?php echo $row['tslider5']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 5 Title</label>
<input type="text" id="tslidercap5" name="tslidercap5" value="<?php echo $row['tslidercap5']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><strong>Image 6</strong></a>
</h4>
</div>
<div id="collapse6" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 6 Image</label>
<input type="text" id="tslider6" name="tslider6" value="<?php echo $row['tslider6']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 6 Title</label>
<input type="text" id="tslidercap6" name="tslidercap6" value="<?php echo $row['tslidercap6']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><strong>Image 7</strong></a>
</h4>
</div>
<div id="collapse7" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 7 Image</label>
<input type="text" id="tslider7" name="tslider7" value="<?php echo $row['tslider7']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 7 Title</label>
<input type="text" id="tslidercap7" name="tslidercap7" value="<?php echo $row['tslidercap7']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse8"><strong>Image 8</strong></a>
</h4>
</div>
<div id="collapse8" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 8 Image</label>
<input type="text" id="tslider8" name="tslider8" value="<?php echo $row['tslider8']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 8 Title</label>
<input type="text" id="tslidercap8" name="tslidercap8" value="<?php echo $row['tslidercap8']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse9"><strong>Image 9</strong></a>
</h4>
</div>
<div id="collapse9" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 9 Image</label>
<input type="text" id="tslider9" name="tslider9" value="<?php echo $row['tslider9']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 9 Title</label>
<input type="text" id="tslidercap9" name="tslidercap9" value="<?php echo $row['tslidercap9']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse10"><strong>Image 10</strong></a>
</h4>
</div>
<div id="collapse10" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 10 Image</label>
<input type="text" id="tslider10" name="tslider10" value="<?php echo $row['tslider10']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 10 Title</label>
<input type="text" id="tslidercap10" name="tslidercap10" value="<?php echo$row['tslidercap10']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse11"><strong>Image 11</strong></a>
</h4>
</div>
<div id="collapse11" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 11 Image</label>
<input type="text" id="tslider11" name="tslider11" value="<?php echo $row['tslider11']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 11 Title</label>
<input type="text" id="tslidercap11" name="tslidercap11" value="<?php echo $row['tslidercap11']; ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse12"><strong>Image 12</strong></a>
</h4>
</div>
<div id="collapse12" class="panel-collapse collapse">
<div class="panel-body">
<label>Image 12 Image</label>
<input type="text" id="tslider12" name="tslider12" value="<?php echo $row['tslider12']; ?>" class="form-control" placeholder="Image" />

<br /><label>Image 12 Title</label>
<input type="text" id="tslidercap12" name="tslidercap12" value="<?php echo $row['tslidercap12'];  ?>" class="form-control" placeholder="Title" />
</div>        
</div>
</div>
    
   
    
  </div> 



</td>
</tr>




<tr>
<th>Submit</th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%" /></td>
</tr>


<!--<tr>
<th>Status</th>
<td>
<?php
//$active=$row['active'];
//if ($active==1)
//{
?>
<a href="trips/deactivate-trip.php?tid=<?php //echo $row['tid']; ?>" class="btn btn-warning" title="Click her to Deactivate" style="width:100%">Deactivate</a>
<?php
//}
//elseif ($active==0)
//{
?>
<a href="trips/activate-trip.php?tid=<?php //echo $row['tid']; ?>" class="btn btn-success" title="Click here to Activate" style="width:100%">Activate</a>
<?php
//}
?>
</td>
</tr>


<tr>
<th>Delete</th>
<td><a href="trips/delete-trip.php?tid=<?php //echo $row['tid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm_delete()" style="width:100%">Delete</a></td>
</tr>

-->
</form>
<?php

		}
?>

</table>
</div>

<?php
	}
?>

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