<!--begin::Template Scripts-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic-footer-scripts.php');?>
<!--end::Template Scripts-->
<!--begin::Load More Awards-->
<script>
$(function(){
    $(".load-more-items-awards").slice(0,6).show(); // select the first ten
    $("#load-more-button-awards").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-awards:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-awards:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-awards").hide();
        }
    });
});
</script>
<!--end::Load More Awards-->
<!--begin::Load More Trips-->
<script>
$(function(){
    $(".load-more-items-trips").slice(0,6).show(); // select the first ten
    $("#load-more-button-trips").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-trips:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-trips:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-trips").hide();
        }
    });
});
</script>
<!--end::Load More Trips-->
<!--begin::Load More Suppliers-->
<script>
$(function(){
    $(".load-more-items-suppliers").slice(0,6).show(); // select the first ten
    $("#load-more-button-suppliers").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-suppliers:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-suppliers:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-suppliers").hide();
        }
    });
});
</script>
<!--end::Load More Suppliers-->
<!--begin::Load More Recordings-->
<script>
$(function(){
    $(".load-more-items-recordings").slice(0,6).show(); // select the first ten
    $("#load-more-button-recordings").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-recordings:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-recordings:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-recordings").hide();
        }
    });
});
</script>
<!--end::Load More Recordings-->
<!--begin::Load More FAQs-->
<script>
$(function(){
    $(".load-more-items-faq").slice(0,6).show(); // select the first ten
    $("#load-more-button-faq").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-faq:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-faq:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-faq").hide();
        }
    });
});
</script>
<!--end::Load More FAQs-->
<!--begin::Load More Inside CH-->
<script>
$(function(){
    $(".load-more-items-inside-ch").slice(0,9).show(); // select the first ten
    $("#load-more-button-inside-ch").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-inside-ch:hidden").slice(0, 9).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-inside-ch:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-inside-ch").hide();
        }
    });
});
</script>
<!--end::Load More Inside CH-->
<!--begin::Load More KwikPrint Products-->
<script>
$(function(){
    $(".load-more-items-kwikprint").slice(0,6).show(); // select the first ten
    $("#load-more-button-kwikprint").click(function(e){ // click event for load more
        e.preventDefault();
        $(".load-more-items-kwikprint:hidden").slice(0, 6).show(); // select next 10 hidden divs and show them
        if($(".load-more-items-kwikprint:hidden").length == 0){ // check if any hidden divs still exist
          //  alert("No More Promos");  //alert if there are none left
		  $("#load-more-button-kwikprint").hide();
        }
    });
});
</script>
<!--end::Load More KwikPrint Products-->

<!--start::Manage Emails-->
<script>
$(function(){
    $(".manage-results").slice(0, 9).show(); // select the first ten
    $("#loadmanage").click(function(e){ // click event for load more
        e.preventDefault();
        $(".manage-results:hidden").slice(0, 9).show(); // select next 10 hidden divs and show them
        if($(".manage-results:hidden").length == 0){ // check if any hidden divs still exist
            $(".loadmanage").hide();
        }
    });
});
</script> 
<!--end::Manage Emails-->