<?php
$LBpath = '/library/lightbox/';
?>
<!-- Add jQuery library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo $LBpath;?>jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo $LBpath;?>jquery.fancybox.css?v=2.0.6" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $LBpath;?>jquery.fancybox.pack.js?v=2.0.6"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?php echo $LBpath;?>/jquery.fancybox-buttons.css?v=1.0.2" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $LBpath;?>jquery.fancybox-buttons.js?v=1.0.2"></script>
<script type="text/javascript" src="<?php echo $LBpath;?>jquery.fancybox-media.js?v=1.0.0"></script>
<link rel="stylesheet" href="<?php echo $LBpath;?>jquery.fancybox-thumbs.css?v=2.0.6" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $LBpath;?>jquery.fancybox-thumbs.js?v=2.0.6"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

