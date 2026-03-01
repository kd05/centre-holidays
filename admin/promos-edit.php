<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
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
  	<strong>Success! Please re-activate your edited promo</strong>
    <a href="promos/activate-promos.php?promiid=<?php echo $_GET['promiid']; ?>" class="btn btn-danger" title="Click here to Activate">Activate</a>
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

<h3>Edit Promos</h3>
<div>
<?php

//===============================list promos==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM promos WHERE promiid='".$_GET['promiid']."'";
		
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
	if ($row['promowebsites']=='2')
	{
		$url='https://www.centreholidays.com/';
	}
	else
	{
		$url='https://'.$_SERVER[HTTP_HOST];
	}


$promoactive=$row['promoactive'];
if ($promoactive==0)
$mybakg='style="background:#666 !important"';
elseif ($promoactive==1)
$mybakg='style="background:#fff !important"';

	// Ssign color to each website
	$website=$row['promowebsites'];
	//include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/websites-color-code.php');

?>
<form action="promos/update-promos.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="promiid" name="promiid" value="<?php echo $row['promiid']; ?>"/>

<tr>
<th>Promo Code</th>
<td <?php echo $webbakg ?>><input type="text" id="promocode" name="promocode" value="<?php echo $row['promocode']; ?>" class="form-control" placeholder="Promo Code" /></td>
</tr>

<tr>
<th>Main Continent</th>

<td>
<select id="promocontinent" name="promocontinent" class="form-control">
<option value="<?php echo $row['promocontinent']; ?>"><?php echo $row['promocontinent']; ?></option>
<?php
	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['promocontinent']."' ORDER BY continent ASC";	  
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
<select id="promocountry" name="promocountry" class="form-control">
<option value="<?php echo $row['promocountry']; ?>"><?php echo $row['promocountry']; ?></option>
<?php
	$sql3 = "SELECT * FROM countries WHERE countries !='".$row['promocountry']."' ORDER BY countries ASC";	  
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

<tr>
<th>Other Continents</th>

<td style="text-align:left !important">

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Other Continents
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php

	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['promocontinent']."' ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['promoothercontinents'], $row3['continent']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="promoothercontinents[]" value="<?php echo $row3['continent']; ?>" />&nbsp;<?php echo $row3['continent']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>

</td>
</tr>
<tr>
<th>Other Countries</th>

<td style="text-align:left !important">

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Other Countries
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql3 = "SELECT * FROM countries WHERE countries !='".$row['promocountry']."' ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['promoothercountries'], $row3['countries']) !== false) {
			$stylecheck4='checked';
			}
			else
			$stylecheck4='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck4 ?> name="promoothercountries[]" value="<?php echo $row3['countries']; ?>" />&nbsp;<?php echo $row3['countries']; ?></li>
	<?php
			
		}
	}
?>


</ul>
</div>

</td>
</tr>



<tr>
<th>Title</th>
<td><input type="text" id="promotitle" name="promotitle" value="<?php echo $row['promotitle']; ?>" class="form-control" placeholder="Title"/></td>
</tr>

<tr>
<th>Details</th>
<td><textarea name="promodetails" id="promodetails" class='scrollable form-control' placeholder="Details"><?php echo $row['promodetails']; ?></textarea></td>
</tr>

<tr>
<th>Tags</th>
<td><textarea name="promotags" id="promotags" class='scrollable form-control' placeholder="Tags"><?php echo $row['promotags']; ?></textarea></td>
</tr>

<tr>
<th>
Interests
</th>
<td>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Interests
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql3 = "SELECT * FROM interests WHERE interests !='".$row['promosinterests']."' AND (interestspromos=1 || interestspromos2=1) ORDER BY interests ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['promosinterests'], $row3['interests']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="promosinterests[]" value="<?php echo $row3['interests']; ?>" />&nbsp;<?php echo $row3['interests']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>
</td>
</tr>




<tr>
<th>Expiry Date MM/DD/YEAR</th>
<td>
<div class="input-group">
<input type="text" name="promoexpirydate" value="<?php echo $row['promoexpirydate'] ; ?>" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy"/>
<span class="input-group-addon"><i class="icon-calender"></i></span></div>
</td>
</tr>

<tr>
<th>Departure From</th>
<td>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Departure From Location
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql3119 = "SELECT * FROM promodepartfrom WHERE promodepartfrom !='".$row['promodepartfrom']."' ORDER BY promodepartfrom ASC";	  
	$result3119 = mysqli_query($conn, $sql3119);	
	if (mysqli_num_rows($result3119) > 0) {
		// output data of each row
		while($row3119 = mysqli_fetch_assoc($result3119)) {
			
			if (strpos($row['promodepartfrom'], $row3119['promodepartfrom']) !== false) {
			$stylecheck69='checked';
			}
			else
			$stylecheck69='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck69 ?> name="promodepartfrom[]" value="<?php echo $row3119['promodepartfrom']; ?>" />&nbsp;<?php echo $row3119['promodepartfrom']; ?></li>
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
	$sql311 = "SELECT * FROM departuregateways WHERE departuregateways !='".$row['departuregateways	']."' ORDER BY departuregateways ASC";	  
	$result311 = mysqli_query($conn, $sql311);	
	if (mysqli_num_rows($result311) > 0) {
		// output data of each row
		while($row311 = mysqli_fetch_assoc($result311)) {
			
			if (strpos($row['departuregateways'], $row311['departuregateways']) !== false) {
			$stylecheck6='checked';
			}
			else
			$stylecheck6='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck6 ?> name="departuregateways[]" value="<?php echo $row311['departuregateways']; ?>" />&nbsp;<?php echo $row311['departuregateways']; ?></li>
	<?php
			
		}
	}
?>


</ul>

</div>

</td>





</td>
</tr>




<tr>
<th>Durations (If you have no durations leave it blank / uncheck all boxes)</th>

<td style="text-align:left !important">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Duration 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql3 = "SELECT * FROM duration WHERE duration !='".$row['promoduration']."' ORDER BY duration ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['promoduration'], $row3['duration']) !== false) {
			$stylecheck5='checked';
			}
			else
			$stylecheck5='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck5 ?> name="promoduration[]" value="<?php echo $row3['duration']; ?>" />&nbsp;<?php echo $row3['duration']; ?></li>
	<?php
			
		}
	}
?>

</ul>
</div>

</td>
</tr>

<tr>
<th>Cover Image</th>
<td>
<input type="text" id="promocoverimage" name="promocoverimage" value="<?php echo $row['promocoverimage']; ?>" class="form-control" placeholder="Cover Image" />
<?php
if (!empty($row['promocoverimage']))
{
?>
<br />
<a href="<?php echo $url ?>/img/special-offers/<?php echo $row['promocoverimage']; ?>">
<img src="<?php echo $url ?>/img/special-offers/<?php echo $row['promocoverimage']; ?>" style="max-width:300px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<tr>
<th>Horizontal Thumbnail</th>
<td>
<input type="text" id="promohorizontalimage" name="promohorizontalimage" value="<?php echo $row['promohorizontalimage']; ?>" class="form-control" placeholder="Horizontal Thumbnail" />
<?php
if (!empty($row['promohorizontalimage']))
{
?>
<br />
<a href="<?php echo $url ?>img/special-offers/<?php echo $row['promohorizontalimage']; ?>">
<img src="<?php echo $url ?>img/special-offers/<?php echo $row['promohorizontalimage']; ?>" style="max-width:300px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<tr>
<th>Square Thumbnail</th>
<td>
<input type="text" id="promosquarethumb" name="promosquarethumb" value="<?php echo $row['promosquarethumb']; ?>" class="form-control" placeholder="Square image"/>
<?php
if (!empty($row['promosquarethumb']))
{
?>
<br />
<a href="<?php echo $url ?>img/special-offers/<?php echo $row['promosquarethumb']; ?>">
<img src="<?php echo $url ?>img/special-offers/<?php echo $row['promosquarethumb']; ?>" style="max-width:100px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>


<tr>
<th>Image Flyer</th>
<td>
<input type="text" id="promoimageflyer" name="promoimageflyer" value="<?php echo $row['promoimageflyer']; ?>" class="form-control" placeholder="Image Flyer"/>
<?php
if (!empty($row['promoimageflyer']))
{
?>
<br />
<a href="<?php echo $url ?>img/special-offers/<?php echo $row['promoimageflyer']; ?>">
<img src="<?php echo $url ?>img/special-offers/<?php echo $row['promoimageflyer']; ?>" style="max-width:100px; max-height:100px; margin-bottom:10px" />
</a>
<?php
}
?>
</td>
</tr>

<tr>
<th>Internal URL</th>
<td>
<input type="text" id="promosinturl" name="promosinturl" value="<?php echo $row['promosinturl']; ?>" class="form-control" placeholder="Interal URL"/>
</td>
</tr>

<tr>
<th>External URL</th>
<td>
<input type="text" id="promosexturl" name="promosexturl" value="<?php echo $row['promosexturl']; ?>" class="form-control" placeholder="External URL"/>
</td>
</tr>

<tr>
<th>Promo Url</th>
<td><input type="text" id="promourl" name="promourl" value="<?php echo $row['promourl']; ?>" class="form-control" placeholder="Promo Url"/></td>
</tr>

<tr>
<th>Associated Websites</th>

<td style="text-align:left !important">

<?php 
if ($row['promowebsites']==1) 
$website1='checked';
elseif ($row['promowebsites']==2) 
$website2='checked';
elseif ($row['promowebsites']==3) 
$website3='checked';

?>

<input type="radio" name="promowebsites" value="1" <?php echo $website1 ?> />&nbsp;Epik
<br />
<input type="radio" name="promowebsites" value="2" <?php echo $website2 ?> />&nbsp;Centre Holidays
<br />
<input type="radio" name="promowebsites" value="3" <?php echo $website3 ?> />&nbsp;Epik & Centre Holidays
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

	$sql355 = "SELECT * FROM operators WHERE operators !='".$row['promooperators']."' ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
			
			if (strpos($row['promooperators'], $row355['operators']) !== false) {
			$stylecheck355='checked';
			}
			else
			$stylecheck355='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck355 ?> name="promooperators[]" value="<?php echo $row355['operators']; ?>" />&nbsp;<?php echo $row355['operators']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>




</td>
</tr>

<!--<tr>
<th>Assigned Centre Holidays Agent</th>
<td>
<select id="AgentID" name="AgentID" class="form-control">

<?php

	$sql11 = "SELECT * FROM ch_agents WHERE AgentID=".$row['AgentID']." LIMIT 1";	  
	$result11 = mysqli_query($conn, $sql11);	
	if (mysqli_num_rows($result11) > 0) {
		// output data of each row
		while($row11 = mysqli_fetch_assoc($result11)) {
		?>
    <option value="<?php echo $row11['AgentID']?>"><?php echo $row11['AgentID'].' - '.$row11['FirstName'].' '.$row11['LastName'].' - '.$row11['BusinessName']; ?></option>
    <option value="">--------------------</option>	
    <option value="">Remove Agent/Default</option>		
		<?php
			
		}
	}
	else
	{
	?>
    <option value="">Currently none, Choose an Agent</option>  
    <?php	
	}

//===================continue looping to cover rest of the options

	$sql13 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
	$result13 = mysqli_query($conn, $sql13);	
	if (mysqli_num_rows($result13) > 0) {
		// output data of each row
		while($row13 = mysqli_fetch_assoc($result13)) {
	
	?>
    <option value="<?php echo $row13['AgentID']?>"><?php echo $row13['AgentID'].' - '.$row13['FirstName'].' '.$row13['LastName'].' - '.$row13['BusinessName']; ?></option>
    <?php
			
		}
	}
?>
</select>
</td>
</tr>-->


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

<?php
/*	$sql2213 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
	$result2213 = mysqli_query($conn, $sql2213);	
	if (mysqli_num_rows($result2213) > 0) {
		while($row2213 = mysqli_fetch_assoc($result2213)) {
		
		if (strpos($row['AgentID'], $row2213['AgentID']) !== false) {
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

</ul></div>-->


</td>
</tr>



<tr>
<th>Show on Site Index Page</th>

<td>
<select id="promoshow" name="promoshow" class="form-control">
<?php if (!empty($row['promoshow'])) {?>
<option value="<?php echo $row['promoshow']; ?>"><?php echo $row['promoshow'] ?></option>
<?php }?>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>


<tr>
<th>Show on Corporate Website</th>

<td>
<select id="promoshowcor" name="promoshowcor" class="form-control">
<?php if (!empty($row['promoshowcor'])) {?>
<option value="<?php echo $row['promoshowcor']; ?>"><?php echo $row['promoshowcor'] ?></option>
<?php }?>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr>
<th>Internal Notes</th>
<td><textarea name="promointnotes" id="promointnotes" class='scrollable form-control' placeholder="Internal Notes"><?php echo $row['promointnotes']; ?></textarea></td>
</tr>


<tr>
<th>Submit</th>

<td><input type="submit" value="Update" class="btn btn-primary" style="width:100%" /></td>
</tr>
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