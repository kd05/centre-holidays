<?php  ob_start(); ?>
<?php 
if (!isset($_COOKIE['user']))
header('Location: login.php');
else
include "user-info.php";

//=================================================================================
$quantity=trim($_GET['quantity']);

?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Greek Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */	body {
	padding: 0px !important;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
	
    @media (min-width: 980px) {
	  
	 .navbar-wrapper {
      margin-top: 0px !important;
    }
		
	 .showsublink {display:none !important}
	 .showmainlink {display:block !important}
	 
	 }
	
	@media (max-width: 979px) {
	  
	 .navbar-wrapper {
      margin-top: 20px !important;
    }
	 .showsublink {display:block !important}
	 .showmainlink {display:none !important}
	 		
	}	
	
	h5 {text-transform:uppercase !important}

	.displayer ul li {margin-left:-20px !important}
	.ulheight li {margin-bottom:10px !important}
	.ulheight li a {width:100% !important; text-align:left !important; max-width:220px !important}
	
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
                    
 	<link rel="apple-touch-icon" sizes="57x57" href="imags/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="imags/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="imags/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="imags/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="imags/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="imags/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="imags/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="imags/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="imags/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="imags/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="imags/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="imags/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="imags/icons/favicon-16x16.png">
<link rel="manifest" href="imags/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="imags/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff"> 
  <style id="holderjs-style" type="text/css">
  .holderjs-fluid {font-size:13px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}
  </style>
<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">    


	<script src="ckeditor/ckeditor.js"></script>
	<script>

// The instanceReady event is fired, when an instance of CKEditor has finished
// its initialization.
CKEDITOR.on( 'instanceReady', function( ev ) {
	// Show the editor name and description in the browser status bar.
	document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

	// Show this sample buttons.
	document.getElementById( 'eButtons' ).style.display = 'block';
});

function InsertHTML() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'htmlArea' ).value;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Insert HTML code.
		// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
		editor.insertHtml( value );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function InsertText() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'txtArea' ).value;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Insert as plain text.
		// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
		editor.insertText( value );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function SetContents() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'htmlArea' ).value;

	// Set editor contents (replace current contents).
	// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
	editor.setData( value );
}

function GetContents() {
	// Get the editor instance that you want to interact with.
	var editor = CKEDITOR.instances.editor1;

	// Get editor contents
	// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
	alert( editor.getData() );
}

function ExecuteCommand( commandName ) {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Execute the command.
		// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
		editor.execCommand( commandName );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function CheckDirty() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	// Checks whether the current editor contents present changes when compared
	// to the contents loaded into the editor at startup
	// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
	alert( editor.checkDirty() );
}

function ResetDirty() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	// Resets the "dirty state" of the editor (see CheckDirty())
	// https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
	editor.resetDirty();
	alert( 'The "IsDirty" status has been reset' );
}

function Focus() {
	CKEDITOR.instances.editor1.focus();
}

function onFocus() {
	document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
}

function onBlur() {
	document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
}

	</script>
    
  </head>

  <body>



    <!-- NAVBAR
    ================================================== -->
    <?php  include "nav-main.php"; ?>
    <!-- /.navbar-wrapper -->
    

<div class="container marketing">

<div class="row" style="margin-top:120px; margin-bottom:40px; background:#FFF">
<div class="span12">

<h2><?php  echo $mname ?></h2>
<h5><?php  echo $memberstatus ?></h5>

<?php  
if ($_GET['results1']=='success')
{
?>
  <div class="alert alert-success" style="margin:0 auto">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong>
  </div>
<?php 	
} 
elseif($_GET['results1']=='fail')
{
?>
  <div class="alert alert-danger" style="margin:0 auto">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong>
  </div> 
<?php 	
}
?>



<!--display reuslts for event posting and changes bellow-->
<?php 
if ($_GET['results']=='success')
{
?>
  <div class="alert alert-success" style="margin:0 auto">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Your event is currently wating for approval. We will contact you in case your event is rejected, <strong>otherwise</strong>, your event should be live within 24-72 hours
  </div>
<?php 	
} 
elseif($_GET['results']=='fail')
{
?>
  <div class="alert alert-warning" style="margin:0 auto">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Important!</strong> All fields are required
  </div> 
<?php 	
}
?>

</div>
</div>

<div class="row" style="text-align:center;">

<div class="span12 displayer" style="text-align:center; border:1px solid #CCC; padding:10px; font-size:11px !important; background:#FFF"> 

<h2>Get your Paid Promo of your Event through Facebook</h2>

<hr />
<h4>How does it work</h4><hr />
<div style="margin-left:10%; text-align:left">
<menue>
<li>From the dropdown list associated with each option select the number of months (1 upto 12 months).</li>
<li>You do not need to have a PayPal account to make the payment.</li>
<li>We accept all types of payments listed below (PayPal, Credit Cards, Visa Debit)</li>
</menue><br />
<img src="imags/paypal.jpg" class="img-responsive" />

<?php   if (empty($promotop)) { ?>

<!--Promo-->
<hr />

<form method="post" action="https://www.paypal.com/cgi-bin/webscr" target="_self" class="hoveringsection" style="padding:7px">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="add" value="1">
<input type="hidden" name="business" value="info@greekevents.ca">
<input type="hidden" name="item_name" value="Top Listing on the Website">
<input type="hidden" name="item_number" value="<?php  echo 'promotop' ?>">
<input type="hidden" name="shipping" value="0">
<input type="hidden" name="amount" value="200">
<input type="hidden" name="currency_code" value="CAD">
<input type="hidden" name="return" value="https://www.greekevents.ca">
<input type="hidden" name="cancel_return" value="https://www.greekevents.ca">
<input type="hidden" name="notify_url" value="https://www.greekevents.ca/notify.php">
<input type="hidden" name="custom" value="<?php  echo $mrandom.'-promotop' ?>">
<input type="hidden" name="rm" value="2">
<input onclick="return confirm('This option will cost you ($200/Month) add to your cart?');" type="submit" border="0" name="submit" alt="Paid Promo of your Event through Facebook " value="Promo through Facebook ($200/Month)" class="btn btn-info" style="width:100%; margin-top:-10px">
<select name="quantity" style="width:100%; max-width:120px">
<?php  
for ($x = 1 ; $x <= 12; $x++) {
?>
<option value="<?php  echo $x ?>"><?php  echo $x ?> Months</option>
<?php 
} 
?>
</select>
</form>

<?php   }  ?>

<!--<hr />

Checkout
<form name="_xclick" target="_self" action="https://www.paypal.com/cgi-bin/webscr" method="post" class="hoveringsection" style="padding:7px">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="info@greekevents.ca">
<input type="submit" border="0" name="submit" alt="View Cart" value="View Cart or Check Out" class="btn btn-warning">
<input type="hidden" name="display" value="1">
</form>
-->
<a href="members.php" style="margin-left:20px">Cancel and Return to account?</a>
</div>


</div><!-- /.span12 -->
</div>

</div>

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

<div style="background:url(imags/bluegreekkeywithlines.png) repeat-x; background-size:contain; width:100%; height:50px">
</div>

       
<!-- /.container -->
<!--footer-->
<?php  include "footer.php" ?>
<!--/footer-->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/bootstrap-transition.js"></script>
    <script src="bootstrap/bootstrap-alert.js"></script>
    <script src="bootstrap/bootstrap-modal.js"></script>
    <script src="bootstrap/bootstrap-dropdown.js"></script>
    <script src="bootstrap/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/bootstrap-tab.js"></script>
    <script src="bootstrap/bootstrap-tooltip.js"></script>
    <script src="bootstrap/bootstrap-popover.js"></script>
    <script src="bootstrap/bootstrap-button.js"></script>
    <script src="bootstrap/bootstrap-collapse.js"></script>
    <script src="bootstrap/bootstrap-carousel.js"></script>
    <script src="bootstrap/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="bootstrap/holder.js"></script>
  

</body></html>
<?php  ob_flush(); ?>