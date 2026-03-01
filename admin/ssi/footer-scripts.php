<!-- jQuery  -->
<script src="/elite/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script type='text/javascript'>  
var $jQuery = jquery_min.noConflict();  
</script>
<!-- Bootstrap Core JavaScript -->
<script src="/elite/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery for carousel -->
<script src="/elite/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
<script src="/elite/plugins/bower_components/owl.carousel/owl.custom.js"></script>
<!--slimscroll JavaScript -->
<script src="/elite/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/elite/js/waves.js"></script>
<!--Counter js -->
<script src="/elite/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/elite/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="/elite/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/elite/plugins/bower_components/morrisjs/morris.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/elite/js/custom.min.js"></script>
<script src="/elite/js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="/elite/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="/elite/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="/elite/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="/elite/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="/elite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!-- Horizontal-timeline JavaScript -->
<script src="/elite/plugins/bower_components/horizontal-timeline/js/horizontal-timeline.js"></script>
<!-- Magnific popup JavaScript -->
<script src="/elite/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="/elite/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Print JavaScript -->
<script src="/elite/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<!-- Typehead Plugin JavaScript -->
<!--<script src="/elite/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js"></script>
<script src="/elite/plugins/bower_components/typeahead.js-master/dist/typeahead-init.js"></script>-->

<!-- Three steps JavaScript -->
<script src="/elite/plugins/bower_components/register-steps/jquery.easing.min.js"></script>
<script src="/elite/plugins/bower_components/register-steps/register-init.js"></script>

<!-- Sweet-Alert  -->
<script src="/elite/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/elite/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>

<!-- TINYMCE WYSIHTML5 JavaScript -->
<script src="/elite/plugins/bower_components/tinymce/tinymce.min.js"></script>



<script>
$(document).ready(function () {
  
if($("#mymce").length > 0){
 tinymce.init({
   selector: "textarea#mymce",
   theme: "modern",
   height:300,
   plugins: [
   "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
   "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
   "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 

 });    
}  
});
</script>

<!--DATE PICKER-->
<script src="/elite/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="/elite/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="/elite/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script>
// Clock pickers
$('#single-input').clockpicker({
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  'default': 'now'

});

$('.clockpicker').clockpicker({
    donetext: 'Done',
    
})
  .find('input').change(function(){
    console.log(this.value);
});

$('#check-minutes').click(function(e){
  // Have to stop propagation here
  e.stopPropagation();
  input.clockpicker('show')
      .clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
  $('input').prop('readOnly', false);
}
// Colorpicker

$(".colorpicker").asColorPicker();
$(".complex-colorpicker").asColorPicker({
    mode: 'complex'
});
$(".gradient-colorpicker").asColorPicker({
    mode: 'gradient'
});
// Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
      });

	    jQuery('#datepicker-autoclose1').datepicker({
        autoclose: true,
        todayHighlight: true
      });
      
	    jQuery('#datepicker-autoclose2').datepicker({
        autoclose: true,
        todayHighlight: true
      });

	    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
      });	    
	  
    jQuery('#date-range').datepicker({
        toggleActive: true
      });
    jQuery('#datepicker-inline').datepicker({
        
        todayHighlight: true
      });

// Daterange picker

$('.input-daterange-datepicker').daterangepicker({
          buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse'
        });
            $('.input-daterange-timepicker').daterangepicker({
                timePicker: true,
                format: 'MM/DD/YYYY h:mm A',
                timePickerIncrement: 30,
                timePicker12Hour: true,
                timePickerSeconds: false,
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse'
            });
            $('.input-limit-datepicker').daterangepicker({
                format: 'MM/DD/YYYY',
                minDate: '06/01/2015',
                maxDate: '06/30/2015',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse',
                dateLimit: {
                    days: 6
                }
            });
</script>
<!-- printableArea JavaScript -->
<script>
    $(document).ready(function(){
        $("#print").click(function(){
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.printableArea").printArea( options );
        });
    });
</script>

<!-- form validator -->
<script src="/elite/js/validator.js"></script>

<!-- display when agent option selected -->
<script>
$(document).ready(function() {
$('input[type="radio"]').click(function() {
   if($(this).attr('id') == 'agent') {
        $('#show-me').show();  
		$('#show-me2').hide();         
   }
   
   if($(this).attr('id') == 'agent2') {
        $('#show-me2').show();  
		$('#show-me').hide();         
   }
   
   if($(this).attr('id') == 'consumer') {
		$('#show-me2').hide();
		$('#show-me').hide();
   }
});
});
</script>

<!-- recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>

    <script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '6LeAWzMUAAAAAHtwP91VelOIY4PYPABhWEdWXTJr',//6Ld3EBYUAAAAAFTrKikuaNLnBiUvh29ykmr-VAN3
          'theme' : 'light'
        });
        widgetId2 = grecaptcha.render(document.getElementById('example2'), {
          'sitekey' : '6Ld3EBYUAAAAAFTrKikuaNLnBiUvh29ykmr-VAN3',
          'theme' : 'light'		  
        });
        grecaptcha.render('example3', {
          'sitekey' : '6Ld3EBYUAAAAAFTrKikuaNLnBiUvh29ykmr-VAN3',
          'callback' : verifyCallback,
          'theme' : 'dark'
        });
      };
    </script>

<?php 

$link = $_SERVER['PHP_SELF'];// get the url value

if (isset($_COOKIE['admin']) || ($link=='/admin/index.php')) 
echo "";
else { ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58af7f0a45d61cb6"></script> 
<?php } ?>

<!-- Tabs -->
<script type="text/javascript" src="/elite/js/cbpFWTabs.js"></script>
<script type="text/javascript">
      (function() {

                [].slice.call( document.querySelectorAll( '.sttabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
</script>

<!-- wysuhtml5 Plugin JavaScript -->
<script src="/elite/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="/elite/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
<script>
$(document).ready(function () {

  $('.textarea_editor').wysihtml5();


});
</script> 
