<!--This is for all the pages before signing in-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/agent-db-details.php');?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META NAME="GOOGLEBOT" CONTENT="NOSNIPPET">
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