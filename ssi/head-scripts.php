<?php
include($_SERVER['DOCUMENT_ROOT'].'/trips/ssi/trips-db-details.php');
include($_SERVER['DOCUMENT_ROOT'].'/highlights/ssi/highlights-db-details.php');
include($_SERVER['DOCUMENT_ROOT'].'/special-offers/ssi/offers-db-details.php');
include($_SERVER['DOCUMENT_ROOT'].'/ssi/new-ch-agents-db-details.php')
?>
<!--begin::Template Scripts-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/ssi/metronic-head-scripts.php');?>
<!--end::Template Scripts-->
<!--begin::Global Custom CSS-->
<link href="/library/css/custom.css" rel="stylesheet" type="text/css"/>
<!--end::Global Custom CSS-->
        <!--end::Layout Themes-->
<link rel="shortcut icon" href="/img/favicon.png" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $AgentAnalyticsHeader ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo $AgentAnalyticsHeader ?>');
</script>
<!-- end:: Google Analytics -->
<!-- begin:: Google Adsense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7370037641851577" crossorigin="anonymous"></script>
<!-- end:: Google Adsense -->