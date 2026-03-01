<?php 
session_start();
//=====AGENT INFORMATION=====
include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/agent-db-details.php');


$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = basename ($actual_link);

//=======================Page name ie index.php============================================
$_SESSION["currentpage2"]=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


//==========================Redirect to index if not logged in===

if ((empty($_COOKIE['AgentUniqID']) || empty($_COOKIE['VerifyID'])) && ($ran !='ionhrinhc0q40v')) //
header('Location:https://centreholidays.com/agents/ssi/sign-out.php?actual_link='.$actual_link);


//if ($ran !='ionhrinhc0q40v'))
//header('Location:https://centreholidays.com/agentssign-out.php');

?>

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