<?php
if (!isset($_COOKIE['admin']))
header('Location: index.php');

$link = $_SERVER['PHP_SELF'];// get the url value
$link_array = explode('/',$link);//expolsion
$page = end($link_array);//get url page names
	
// assign classes accordignly	
if ($page=='continent.php' || $page=='countries.php' || $page=='styles.php'|| $page=='substyles.php' || $page=='duration.php')	
$parametersclass='selected';
elseif ($page=='trips1.php' || $page=='trips.php')	
$tripsclass='selected';
elseif ($page=='inquiries.php' || $page=='inquiries-search.php')	
$inquiriesclass='selected';
elseif ($page=='agents.php' || $page=='consumers.php' || $page=='clients-search.php')	
$contactclass='selected';
elseif ($page=='articles1.php' || $page=='articles.php' || $page=='edit-articles.php')	
$artclass='selected';

?>
  <!-- .Side panel -->
  <div class="side-mini-panel" style="top:0; position:fixed">
       <ul class="mini-nav">
       <li><img src="/img/epik-escapes-logo.png" alt="Epik Escapes" /></li>
       
                     <!-- .multi -->
<li class="<?php echo $parametersclass ?>">
<a href="javascript:void(0)" data-toggle="tooltip" title="Filter" data-placement="right"><i class="fa fa-tasks"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">Filter Parameters</h3>
        <ul class="sidebar-menu">
          <li><a href="continent.php">Continents/Regions</a></li>
          <li><a href="countries.php">Countries</a></li>
          <li><a href="styles.php">Styles</a></li>
          <li><a href="substyles.php">Sub-Styles</a></li>          
          <li><a href="duration.php">Durations</a></li> 
        </ul>
        <!-- Left navbar-header end -->
    </div>
</li>
              
<!-- .Dashboard -->
<li class="<?php echo $tripsclass ?>">
<a href="javascript:void(0)" data-toggle="tooltip" title="Trips" data-placement="right"><i class="fa fa-compass"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
          <h3 class="menu-title">Trips</h3>
          <ul class="sidebar-menu">
              <li><a href="trips-add.php">Add Trip</a></li>                          
              <li><a href="trips-edit.php">Edit/Delete Trips</a></li>
          </ul>
          <!-- Left navbar-header end -->
    </div>
</li>
<!-- /.Dashboard -->
             
<!-- .Dashboard -->
<li class="<?php echo $contactclass ?>">
<a href="javascript:void(0)" data-toggle="tooltip" title="Clients" data-placement="right"><i class="fa fa-users"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
          <h3 class="menu-title">Clients</h3>
          <ul class="sidebar-menu">
              <li><a href="agents.php">Agents</a></li>
              <li><a href="consumers.php">Consumers</a></li>
              <li><a href="clients-search.php">Search (Agents & Clients)</a></li>                                                                                      
          </ul>
          <!-- Left navbar-header end -->
    </div>
</li>
                                      
<!-- .Dashboard -->
<li class="<?php echo $inquiriesclass ?>">
<a href="javascript:void(0)" data-toggle="tooltip" title="Inquiries" data-placement="right"><i class="fa fa-bell"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
          <h3 class="menu-title">Inquiries</h3>
          <ul class="sidebar-menu">
              <li><a href="inquiries.php">List of Inquiries</a></li>
              <li><a href="inquiries-search.php">Search for an Inquiry</a></li>                                                        
          </ul>
          <!-- Left navbar-header end -->
    </div>
</li>


<!-- .Dashboard -->

<li class="<?php echo $artclass ?>">
<a href="javascript:void(0)" data-toggle="tooltip" title="Articles" data-placement="right"><i class="fa fa-pencil"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
          <h3 class="menu-title">Articles</h3>
          <ul class="sidebar-menu">
              <li><a href="articles-add.php">Add Articles</a></li>
              <li><a href="articles-edit.php">Edit/Delete Articles</a></li> 
          </ul>
          <!-- Left navbar-header end -->
    </div>
</li>

 <li class=""><a href="signout.php" data-toggle="tooltip" title="Logout" data-placement="right"><i class="fa fa-sign-out"></i></a>

</li>
           
</ul>
</div>
  <!-- /.Side panel -->




