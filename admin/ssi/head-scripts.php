<meta name="author" content="">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon.png">
<!-- Bootstrap Core CSS -->
<link href="/elite/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/elite/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="/elite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="/elite/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="/elite/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!--Owl Carousel -->
<link href="/elite/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="/elite/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
<!-- Timeline CSS -->
<link href="/elite/plugins/bower_components/horizontal-timeline/css/horizontal-timeline.css" rel="stylesheet">
<!-- Popup CSS -->
<link href="/elite/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!-- animation CSS -->
<link href="/elite/css/animate.css" rel="stylesheet">
<!-- Custom CSS ---------------------------------------------------------->
<link href="/elite/css/style1.css" rel="stylesheet"> 
<!-- color CSS 
<link href="/elite/css/colors/default.css" id="theme"  rel="stylesheet"> ------------------>
<!-- Typehead CSS -->
<link href="/elite/plugins/bower_components/typeahead.js-master/dist/typehead-min.css" rel="stylesheet">
<!-- Three steps CSS -->
<link href="/elite/plugins/bower_components/register-steps/steps.css" rel="stylesheet">
<!--alerts CSS -->
<link href="/elite/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

<!-- Page plugins css -->
<link href="/elite/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
<!-- Color picker plugins css -->
<link href="/elite/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
<!-- Date Picker Plugin css -->
<link href="/elite/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- TINYMCE WYSIHTML5 css -->
<link rel="stylesheet" href="/elite/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />


<!-- customised CSS  screen resolution MORE than 1920 x 1080 can you make the description for the trip appear. If 1920 x 1080 or less, make it disappear.-->
<style>
@media screen and (min-width: 1921px) {
.tdetails {
display:block !important;
}
}
@media screen and (max-width: 1920px) {
.tdetails {
display:none !important;
}
}	

.message-center {float:left !important; width:100% !important; max-width:400px !important} <!--This class is in the top-navigation.php to display the featured-->						

/*This class for the recaptcha sizing and need to be insiude this page to take effect*/
#rc-imageselect, .g-recaptcha { width:240px !important;}
@media screen and (max-width: 575px){
	 #rc-imageselect, .g-recaptcha {transform:scale(0.77) !important;-webkit-transform:scale(0.77) !important;transform-origin:0 0 !important;-webkit-transform-origin:0 0 !important;} 
	 }
/*hide the number input wheel*/	 
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -o-appearance: none !important;	
    appearance: none !important;
    margin: 0; 
}  


	/*------------------------------ SCROLL BAR -------------------------------------*/
	
		::-webkit-scrollbar {	
		width: 5px;
		}
		 
		::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		}
		 
		::-webkit-scrollbar-thumb {
		  background-color:#999;/*#d0d0d0*/
		  outline: 1px solid slategrey;
		}

</style>

<!-- Slider -->
<style>
.embed-responsive-16by9 {
  height: 75vh !important;
  margin:0 !important;
  padding:0 !important;
  overflow:hidden !important
}


@media screen and (max-width: 600px) {
	
.embed-responsive-16by9 {
  height: 83vh !important;
  margin:0 !important;
  padding:0 !important 
}	
	
}
</style>
<!-- End Slider -->