<!--begin::Template Scripts-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic-footer-scripts.php');?>
<!--end::Template Scripts-->
<!--begin:: Load More -->

<?php
/*if ($_SERVER['PHP_SELF'] !='/index.php')
$limit=6;
else
$limit=6;*/
?>

<script>
$(function(){
    $(".load-more-items-highlights").slice(0,9).show(); // select the first ten
    $("#load-more-button-highlights").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-highlights:hidden").slice(0, 9).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-highlights:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton-highlights").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items-reviews").slice(0,6).show(); // select the first ten
    $("#load-more-button-reviews").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-reviews:hidden").slice(0,6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-reviews:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton-reviews").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items-trips").slice(0,6).show(); // select the first ten
    $("#load-more-button-trips").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-trips:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-trips:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton-trips").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items-offers").slice(0,6).show(); // select the first ten
    $("#load-more-button-offers").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-offers:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-offers:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton-offers").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items").slice(0,6).show(); // select the first ten
    $("#load-more-button").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items-certificates").slice(0,6).show(); // select the first ten
    $("#load-more-button-certificates").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-certificates:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-certificates:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbuttoncert").hide();
        }
    });
});
</script>

<script>
$(function(){
    $(".load-more-items-awards").slice(0,6).show(); // select the first ten
    $("#load-more-button-awards").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-awards:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-awards:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $(".loadbutton").hide();
        }
    });
});
</script>


<script>
$(function(){
    $(".manage-results").slice(0, 10).show(); // select the first ten
    $("#loadmanage").click(function(e){ // click event for load more
        e.preventDefault();
        $(".manage-results:hidden").slice(0, 10).show(); // select next 10 hidden divs and show them
        if($(".manage-results:hidden").length == 0){ // check if any hidden divs still exist
            $(".loadmanage").hide();
        }
    });
});
</script>


<!--end:: Carousel With Autoscroll On -->
<!--begin:: Temporary Solution For Aside Menu Scroll For Touch Laptops -->
<script>
if (typeof window['DocumentTouch'] === 'undefined') {
  window['DocumentTouch'] = HTMLDocument
}
</script>
<!--end:: Temporary Solution For Aside Menu Scroll For Touch Laptops -->

<!-- begin:: Scroll Down Page 
<script>
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } 
  });
});
</script>
<!--end:: Scroll Down Page -->
<!--begin:: Sub Nav (Trips) 
<script>
$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 650) {
      $('#sub-nav-bar').addClass('sub-nav-bar-fixed');
    }
    if ($(window).scrollTop() < 651) {
      $('#sub-nav-bar').removeClass('sub-nav-bar-fixed');
    }
  });
});
</script>
<!--end:: Sub Nav (Trips) -->
<!--end:: Custom Scripts(used by this page) -->
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58af7f0a45d61cb6"></script>
<!-- begin:: Event Tracking Code --> 
<script>
jQuery('form').submit(function( event ) {
gtag('event', 'Submission', {
'event_category': 'Form',
'event_label': window.document.location.pathname
});
});
</script>
<!-- end:: Event Tracking Code --> 