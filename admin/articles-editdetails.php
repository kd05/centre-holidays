<?php ob_start(); ?>
<?php
$artid=$_GET['artid'];
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
    <a href="articles/activate-articles.php?artid=<?php echo $_GET['artid']; ?>" class="btn btn-danger" title="Click here to Activate">Activate</a>
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

<h3>Edit Articles</h3>

<hr />
<div style="max-width:100%; overflow-x:hidden; background:none !important; margin-bottom:100px">

<?php

//===============================list trips==================================
	
		if (isset($_GET['offset']))
		$offset=trim($_GET['offset']);
		else
		$offset=0;	
	
		$sql = "SELECT * FROM articles WHERE artid=$artid";
		
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
	if ($row['artwebsite']==1)
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
<?php echo date("F d, Y") ?><br />

<form action="articles/update-articles.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="artid" name="artid" value="<?php echo $row['artid']; ?>" placeholder="#"/>
<hr />
<label>Content (HTML code)</label>
<textarea name="artdetails" style="height:300px; width:100%" placeholder="Content (HTML code)">
<?php echo $row['artdetails']; ?></textarea>
<!--id="editor" id="mymce" -->

<script>
	initSample();
</script>

<hr />
<label>Author</label>
<input type="text" id="artauthor" name="artauthor" value="<?php echo $row['artauthor']; ?>" class="form-control" placeholder="Author"/>
<hr />
<label>Title</label>
<input type="text" id="arttitle" name="arttitle" value="<?php echo $row['arttitle']; ?>" class="form-control" placeholder="Title"/>
<hr />
<label>META Description</label>

<textarea name="artdescription" id="artdescription" class='scrollable form-control' placeholder="META description">
<?php echo $row['artdescription']; ?></textarea>

<hr />
<label>Read time</label>
<input type="text" id="readtime" name="readtime" value="<?php echo $row['readtime']; ?>" class="form-control" placeholder="Read time"/>


<input type="hidden" id="artsubtitle" name="artsubtitle" value="<?php echo $row['artsubtitle']; ?>" class="form-control" placeholder="SubTitle"/>


<hr />
<label>Continents</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Continents
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql3 = "SELECT * FROM continent WHERE continent !='".$row['artcontinent']."' ORDER BY continent ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['artcontinent'], $row3['continent']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="artcontinent[]" value="<?php echo $row3['continent']; ?>" />&nbsp;<?php echo $row3['continent']; ?> </li>
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

	$sql3 = "SELECT * FROM countries WHERE countries !='".$row['artcountry']."' ORDER BY countries ASC";	  
	$result3 = mysqli_query($conn, $sql3);	
	if (mysqli_num_rows($result3) > 0) {
		// output data of each row
		while($row3 = mysqli_fetch_assoc($result3)) {
			
			if (strpos($row['artcountry'], $row3['countries']) !== false) {
			$stylecheck3='checked';
			}
			else
			$stylecheck3='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck3 ?> name="artcountry[]" value="<?php echo $row3['countries']; ?>" />&nbsp;<?php echo $row3['countries']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>

<hr />

<label>Sub Styles</label>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">SubStyles
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql33 = "SELECT * FROM substyles WHERE substyles !='".$row['artssubstyle']."' ORDER BY substyles ASC";	  
	$result33 = mysqli_query($conn, $sql33);	
	if (mysqli_num_rows($result33) > 0) {
		// output data of each row
		while($row33 = mysqli_fetch_assoc($result33)) {
			
			if (strpos($row['artssubstyle'], $row33['substyles']) !== false) {
			$stylecheck33='checked';
			}
			else
			$stylecheck33='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck33 ?> name="artssubstyle[]" value="<?php echo $row33['substyles']; ?>" />&nbsp;<?php echo $row33['substyles']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>


<hr />

<div class="row">


<div class="col-md-12">
<label>Cover Image</label>
<input type="text" id="artcoverimage" name="artcoverimage" value="<?php echo $row['artcoverimage']; ?>" class="form-control" placeholder="Image" />
<?php
if (!empty($row['artcoverimage']))
{
?>
<br />
<a href="<?php echo $url ?>/articles/img/<?php echo $row['artcoverimage']; ?>">
<img src="<?php echo $url ?>/articles/img/<?php echo $row['artcoverimage']; ?>" style="max-width:300px; max-height:100px" />
</a>
<?php
}
?>
</div>



<div class="col-md-12">
<hr />
<label>Horizontal Image (Facebook Sharing)</label>
<input type="text" id="arthorizontalimage" name="arthorizontalimage" value="<?php echo $row['arthorizontalimage']; ?>" class="form-control" placeholder="Horizontal Thumbnail (Preview Image)" />
<?php
if (!empty($row['arthorizontalimage']))
{
?>
<br />
<a href="<?php echo $url ?>/articles/img/<?php echo $row['arthorizontalimage']; ?>">
<img src="<?php echo $url ?>/articles/img/<?php echo $row['arthorizontalimage']; ?>" style="max-width:300px; max-height:100px" />
</a>
<?php
}
?>
</div>



<div class="col-md-12">
<hr />
<label>Square Thumb (Preview Image)</label>
<input type="text" id="artsquarethumb" name="artsquarethumb" value="<?php echo $row['artsquarethumb']; ?>" class="form-control" placeholder="Square image"/>
<?php
if (!empty($row['artsquarethumb']))
{
?>
<br />
<a href="<?php echo $url ?>/articles/img/<?php echo $row['artsquarethumb']; ?>">
<img src="<?php echo $url ?>/articles/img/<?php echo $row['artsquarethumb']; ?>" style="max-width:100px; max-height:100px" />
</a>
<?php
}
?>

</div>
</div>

<hr />
<label>URL (URL should match te title for example cruise-lines-that-offer-culinary-voyages-a61)</label>
<input id="artpageurl" name="artpageurl" value="<?php echo $row['artpageurl']; ?>" class="form-control" placeholder="Itinerary URL"/>

<hr />
<label>Tags</label>
<textarea name="arttags" id="arttags" class='scrollable form-control' placeholder="arttags separated with commas"><?php echo $row['arttags']; ?></textarea>




<hr />
<label>Operators</label>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Operators
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">
<?php

	$sql355 = "SELECT * FROM operators WHERE operators !='".$row['artoperators']."' ORDER BY operators ASC";	  
	$result355 = mysqli_query($conn, $sql355);	
	if (mysqli_num_rows($result355) > 0) {
		// output data of each row
		while($row355 = mysqli_fetch_assoc($result355)) {
			
			if (strpos($row['artoperators'], $row355['operators']) !== false) {
			$stylecheck355='checked';
			}
			else
			$stylecheck355='';	
	
	?>
    <li><input type="checkbox" <?php echo $stylecheck355 ?> name="artoperators[]" value="<?php echo $row355['operators']; ?>" />&nbsp;<?php echo $row355['operators']; ?> </li>
    <?php
			
		}
	}
?>

</ul>
</div>


<hr />
<label>Associated website</label>
<fieldset style="background:#FFF; padding:10px">
<?php 
if ($row['artwebsite']==1) 
$website1='checked';
elseif ($row['artwebsite']==2) 
$website2='checked';
elseif ($row['artwebsite']==3) 
$website3='checked';

?>

<input type="radio" name="artwebsite" value="1" <?php echo $website1 ?> />&nbsp;Epik
<br />
<input type="radio" name="artwebsite" value="2" <?php echo $website2 ?> />&nbsp;Centre Holidays
<br />
<input type="radio" name="artwebsite" value="3" <?php echo $website3 ?> />&nbsp;Epik & Centre Holidays
<br />

</fieldset>

<hr />


<!--<label>Agents</label>
select id="AgentID" name="AgentID" class="form-control">

<?php

	$sql11 = "SELECT * FROM ch_agents WHERE AgentID=".$row['AgentID']." LIMIT 1";	  
	$result11 = mysqli_query($conn, $sql11);	
	if (mysqli_num_rows($result11) > 0) {
		// output data of each row
		while($row11 = mysqli_fetch_assoc($result11)) {
		?>
    <option value="<?php echo $row11['AgentID']?>"><?php echo $row11['AgentID'].' - '.$row11['FirstName'].' '.$row11['LastName'].' - '.$row13['BusinessName']; ?></option>
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
</select>-->


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle"  style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Agents
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width:100%; padding:10px">

<?php
	$sql2213 = "SELECT * FROM ch_agents ORDER BY AgentID ASC";	  
	$result2213 = mysqli_query($conn, $sql2213);	
	if (mysqli_num_rows($result2213) > 0) {
		// output data of each row
		while($row2213 = mysqli_fetch_assoc($result2213)) {
		
		if (strpos($row['AgentID'], $row2213['AgentID']) !== false) {
    	$AgentIDcheck='checked';
		}
		else
		$AgentIDcheck='';

		?>
                
        <li><input type="checkbox" name="AgentID[]" id="AgentID[]" value="<?php echo $row2213['AgentID'] ?>" <?php echo $AgentIDcheck ?> > 
		<?php echo $row2213['AgentID'].' - <strong>'.$row2213['FirstName'].' '.$row2213['LastName'].'</strong> - '.$row2213['BusinessName']; ?>
        </li>
		<?php
	
			} 
	}
?>

</ul></div>

<hr />

<input type="submit" value="Update" class="btn btn-primary"  style="width:100%" />

</form>

<?php

		}
?>

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