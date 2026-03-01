<?php if (isset($_SESSION['MetaDescription']) && !empty($_SESSION['MetaDescription']) && isset($_SESSION['MetaKeyWords']) && !empty($_SESSION['MetaKeyWords'])) { ?>
<meta name="description" content="<?php echo $_SESSION['MetaDescription'];?>">
<meta name="keywords" content="<?php echo $_SESSION['MetaKeyWords'];?>">
<?php
 	}else{?>
<meta name="description" content="Provider of travel insurance, vacations, flights, charters, car rentals, cruises, tours and other travel related services online or over the phone.">
<meta name="keywords" content="Centre Holidays, hotels, pre packaged vacations, discounted airfares, home based travel agent jobs, canada flights, mississauga travel agency, group holidays">
<?php } ?>
