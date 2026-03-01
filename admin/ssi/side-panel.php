<?php
ob_start();

//=================FORCE LOGOUT IF NO COOKIE================
if (!isset($_COOKIE['admin']))
header('Location: index.php');

//========= full day sessions ==============================
$seuserid=$_SESSION["visitor"];

//=============set cookies all full day ====================
if (!isset($_SERVER['HTTP_COOKIE'])) {
setcookie('admin', '', time()+86400);

}

//==========================================================

$link = $_SERVER['PHP_SELF'];// get the url value
$link_array = explode('/',$link);//expolsion
$page = end($link_array);//get url page names
	
// assign classes accordignly	

if ($page=='servicelevel.php' ||$page=='activitylevel.php' || $page=='interests.php' || $page=='continent.php' ||  $page=='edit-filter.php' || $page=='countries.php' || $page=='substylesrename.php'|| $page=='styles.php'|| $page=='substyles.php' || $page=='duration.php' || $page=='operators.php' || $page=='departuregateways.php' || $page=='cruiseships.php' || $page=='types.php')	
$parametersclass='selected';
elseif ($page=='highlights.php' || $page=='highlights-edit.php' || $page=='highlights-search.php')	
$highlights='selected';
elseif ($page=='trips-editdetails.php' || $page=='trips-add.php' ||$page=='trips-edit.php' ||  $page=='trips-search.php')	
$tripsclass='selected';
elseif ($page=='promos.php' || $page=='promos-add.php' ||$page=='promos-edit.php' ||  $page=='promos-search.php')	
$promosclass='selected';
elseif ($page=='article_styles.php' || $page=='articles-add.php' || $page=='articles-edit.php'  || $page=='articles-editdetails.php')	
$artclass='selected';
elseif ($page=='travel-agents.php' || $page=='travel-agents-search.php' || $page=='collections.php' || $page=='inquiries.php' || $page=='agents.php' || $page=='consumers.php' || $page=='inquiries-search.php')	
$epikescapes='selected';
elseif ($page=='home-based-travel-agent-canada-list-details.php' || $page=='home-based-travel-agent-canada-list.php' || $page=='black-list.php' || $page=='custom-trip-inquiries.php' || $page=='custom-trip-inquiries-details.php' ||  $page=='online-inquiries.php' || $page=='unpaid-partners-editdetails.php' || $page=='unpaid-partners.php' || $page=='ch-agents-terminated.php' || $page=='ch-agents.php'  || $page=='ch-agent-details.php'  || $page=='ch-agent-reports.php' || $page=='ch-agent-add.php' || $page=='ch-agents-search.php' || $page=='feedback.php' || $page=='feedback-details.php' || $page=='awards.php' || $page=='awards-details.php' || $page=='certificates.php' || $page=='certificates-details.php' || $page=='agents-certs.php' || $page=='ch-collections.php' || $page=='partners.php' || $page=='agents-certs-search.php' || $page=='search-certs.php' || $page=='home.php' )	
$cenreholidays='selected';
elseif (
//    $page=='resources-filter.php' || $page=='resources-add.php' || $page=='resources.php' || $page=='faq-filter.php' || $page=='faq-add.php' || $page=='faq-list.php' || $page=='webinar-add.php' || $page=='webinar-list.php' || $page=='notifications-add.php' || $page=='notifications-list.php' || $page=='agentportaltypes.php' || $page=='agentportaloperators.php' || $page=='apoperators.php' || $page=='portal-categories.php'  || $page=='ch_agent_unlock.php' || $page=='portal-sub-categories.php' || $page=='portal-library.php' || $page=='portal-list-library.php'  || $page=='email-schedules.php'  || $page=='booking-authorization-email-form.php' || $page=='leaving-schedules.php' || $page=='portal-library-edit.php' || $page=='ch-agents-collections.php'  || $page=='affiliate-edit.php'  || $page=='affiliate-search.php' || 'affiliate-list.php' || 'affiliate-filter.php'
    $page=='resources-filter.php' || $page=='resources-add.php' || $page=='resources.php' || $page=='faq-filter.php' || $page=='faq-add.php' || $page=='faq-list.php' || $page=='webinar-add.php' || $page=='webinar-list.php' || $page=='notifications-add.php' || $page=='notifications-list.php' || $page=='agentportaltypes.php' || $page=='agentportaloperators.php' || $page=='apoperators.php' || $page=='portal-categories.php'  || $page=='ch_agent_unlock.php' || $page=='portal-sub-categories.php' || $page=='portal-library.php' || $page=='portal-list-library.php'  || $page=='email-schedules.php'  || $page=='booking-authorization-email-form.php' || $page=='leaving-schedules.php' || $page=='portal-library-edit.php' || $page=='ch-agents-collections.php'  || $page=='suppliers-edit.php'  || $page=='affiliate-search.php' || $page=='suppliers.php' || $page =='suppliers-filter.php'
)
$thisportals='selected';



//==================check the admin type

if ($_COOKIE['admin']=='edit7016c5fa02a3deaf0478a095d0165c04') // read and edit everything
{
$userprev='edit';
}
elseif ($_COOKIE['admin']=='read7016c5fa02a3deaf0478a095d0165c04') // read only
{
$userprev='read';
?>
<style>
#mytable {
    /*position: relative;*/
}
#mytable:after {
/*    bottom: 0;
    content: '';
    left: 0;
    position: absolute;
    right: 0;
    top: 0;*/
}
</style> 
<?php
}
elseif ($_COOKIE['admin']=='partedit7016c5fa02a3deaf0478a095d0165c04')	// read and only edit agents
{
$userprev='partedit';
}
?>


<style>
.menu-title {text-transform:uppercase !important}
</style>

  <!-- .Side panel -->
  <div class="side-mini-panel">
       <ul class="mini-nav">
              <div class="togglediv">
              <a href="javascript:void(0)" id="togglebtn">
              <i class="ti-menu"></i>
              </a>
              </div>
              <!-- Filter Parameters -->
              <?php if ($userprev=='edit') { ?>
              <li class="<?php echo $parametersclass ?>">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Filter" data-placement="right"><i class="fa fa-tasks"></i></a>
                    <div class="sidebarmenu">
                       <!-- Left navbar-header-->
                          <h3 class="menu-title">Filter Parameters</h3>
                            <ul class="sidebar-menu">
                            <li><a href="continent.php">Continents/Regions</a></li>
                            <li><a href="countries.php">Countries</a></li>
                            <li><a href="types.php">Types</a></li>
                            <li><a href="interests.php">Interests</a></li>
                            <li><a href="activitylevel.php">Activity Level</a></li>
                             <li><a href="servicelevel.php">Service Level</a></li>           
                            <li><a href="duration.php">Trip Length</a></li> 
                            <li><a href="operators.php">Suppliers</a></li>
                            <li><a href="departuregateways.php">Departure Gateways</a></li>  
                            <li><a href="cruiseships.php">Cruise Ships</a></li>                                         
                            </ul>
                          <!-- Left navbar-header end -->
                    	</div>
              		</li>
              
              <!-- End Filter Parameters -->


              <!-- Promos -->
		<li class="<?php echo $highlights ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Highlights" data-placement="right"><i class="fa fa-star" aria-hidden="true"></i></a>
    <div class="sidebarmenu">
         <!--Left navbar-header -->
        <h3 class="menu-title">Highlights</h3>
          <ul class="sidebar-menu">
              <li><a href="highlights-add.php" onclick="return confirm_delete()">Add highlights</a></li>                          
              <li><a href="highlights.php">Edit/Delete highlights</a></li>
              <li><a href="highlights-search.php">Search between highlights</a></li>           
          </ul>
        <!-- Left navbar-header end--> 
    </div>
</li>




              <!-- Trips-->
<li class="<?php echo $tripsclass ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Trips" data-placement="right"><i class="fa fa-compass"></i></a>
    <div class="sidebarmenu"> 
        <!-- Left navbar-header -->
        <h3 class="menu-title">Trips</h3>
          <ul class="sidebar-menu">
              <li><a href="trips-add.php"  onclick="return confirm_delete()">Add Trip </a></li>                          
              <li><a href="trips-edit.php">Edit/Delete Trips</a></li>
              <li><a href="trips-search.php">Search by Trip Code/Title/Tags</a></li>                           
          </ul>
        <!-- Left navbar-header end -->
    </div>
</li>


              <!-- Promos -->
<li class="<?php echo $promosclass ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Promos" data-placement="right"><i class="fa fa-tag" aria-hidden="true"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">Promos</h3>
          <ul class="sidebar-menu">
              <li><a href="promos-add.php" onclick="return confirm_delete()">Add Promos</a></li>                          
              <li><a href="promos.php">Edit/Delete Promos</a></li>
              <li><a href="promos-search.php">Search between Promos</a></li>           
          </ul>
        <!-- Left navbar-header end -->
    </div>
</li>


              <!-- Articles -->
             <!-- <li class="<?php echo $artclass ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Articles" data-placement="right"><i class="fa fa-pencil"></i></a>
                    <div class="sidebarmenu">
                          Left navbar-header 
                         <h3 class="menu-title">Articles</h3>
          <ul class="sidebar-menu">
          	  <li><a href="article_styles.php">Articles Styles</a></li>
              <li><a href="articles-add.php" onclick="return confirm_delete()">Add Articles</a></li>
              <li><a href="articles-edit.php">Edit/Delete Articles</a></li> 
          </ul>

                    </div> 
              </li>-->
              <!-- End Articles --> 
              <?php } ?>
               <!-- Epik Escape -->
<!--<li class="<?php echo $epikescapes?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Epik Escapes" data-placement="right">
<img src="/admin/img/epik-escapes-icon-xl.png" style="width:36px; height:36px" /></a>
    <div class="sidebarmenu">
         <!-- Left navbar-header -->
<!--        <h3 class="menu-title">Epik EscapeS</h3>
          <ul class="sidebar-menu">
          <?php //if ($userprev=='edit') { ?>
			<li><a href="collections.php">Epik Escapes Collections</a></li>   
            <li><hr /></li>
            <?php //} ?>
              <li><a href="inquiries.php">Epik Escape Inquiries List</a></li>        
              <li><a href="agents.php">Epik Agent Inquiries</a></li>
              <li><a href="consumers.php">Epik Consumer Inquiries</a></li>
              <li><a href="inquiries-search.php">Search an Epik Inquiry</a></li>  
              <li><hr /></li>
              <li><a href="travel-agents.php">Travel Agency</a></li>
              <li><a href="travel-agents-search.php">Search for a Travel Agency</a></li>                                                          
          </ul>-->
        <!-- Left navbar-header end 
    </div>
</li>    -->             
              
              
               <!-- Centre Holidays -->
<li class="<?php echo $cenreholidays ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="Centre Holidays" data-placement="right">
<img src="/admin/img/centre-holidays-icon-xl.png" style="width:36px; height:36px" /></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">Centre Holidays</h3>
          <ul class="sidebar-menu"> 
          	<?php if ($userprev=='edit') { ?>
              <li><a href="home-based-travel-agent-canada-list.php">Home Based Travel Agent Applications</a></li>
              <li><hr /></li>   
              <li><a href="ch-agent-add.php" onclick="return confirm_delete()">Add a New Agent</a></li>     
			  <?php } ?>        
              <li><a href="ch-agents.php">CH Agents (Active)</a></li>
              <li><a href="ch-agents-terminated.php">CH Agents (Terminated)</a></li> 
              <?php if ($userprev=='edit') { ?>     
              <li><a href="partners.php"><i class="fa fa-users" aria-hidden="true"></i> Assign a Sub-Agent or Partner</a></li>            
              <?php } ?>              
              <li><a href="ch-agent-reports.php">Annual Report</a></li>
              <li><a href="ch-agents-search.php">Search for Agents</a></li>  
              <li><hr /></li>                                      
			  <?php if ($userprev=='edit') { ?>              
              <li><a href="feedback.php">Customer Reviews</a></li>   
              <li><a href="custom-trip-inquiries.php">Custom Trip Inquiries</a></li>
			  <li><hr /></li>
             <li><a href="awards-add.php" onclick="return confirm_delete()">Add Awards</a></li>  
             <li><a href="awards.php">Awards List</a></li>
             <li><hr /></li>  
             <li><a href="agents-certs-search.php">Search Certificate based on Agent ID</a></li>
             <li><a href="search-certs.php">Search/Add a New Certificate</a></li>  
             <li><a href="certificates.php">Certificate List</a></li>  
             <li><a href="agents-certs.php">Assign Certificates to Agents</a></li> 
			 <?php } ?>                                   
          </ul>
        <!-- Left navbar-header end -->
    </div>
</li>    

<!-- -->	
<?php if ($userprev=='edit') { ?>			  

<li class="<?php echo $thisportals ?>"><a href="javascript:void(0)" data-toggle="tooltip" title="PORTAL" data-placement="right"><img src="/admin/img/centre-holidays-agents-icon-xl.png" style="width:36px; height:36px" /></a>
    <div class="sidebarmenu" style="overflow:scroll;">
        <!-- Left navbar-header -->
        <h3 class="menu-title">AGENT PORTAL</h3>
        <ul class="sidebar-menu">
                <li><a href="booking-authorization-email-form.php">Booking Authorization Email Form</a></li>                         
                <li><hr /></li>
                
<!--                <li><a href="inside-add.php" onclick="return confirm_delete()">Add new Inside CH</a></li>                         -->
<!--                <li><a href="inside-list.php">Inside CH List</a></li>-->
<!--                <li><a href="inside-filter.php">Inside CH Filter</a></li>-->


                <li><a href="resources-add.php" onclick="return confirm_delete()">Add new Resource CH</a></li>
                <li><a href="resources.php">Resource CH List</a></li>
                <li><a href="resources-filter.php">Resource CH Filter</a></li>


              <li><hr /></li>                                    
              <li><a href="faq-add.php" onclick="return confirm_delete()">Add new FAQ</a></li>                         
              <li><a href="faq-list.php">FAQ List</a></li>
              <li><a href="faq-filter.php">FAQ Filter</a></li>
              <li><hr /></li>
                         
<!--              <li><a href="affiliate-filter.php">Supplier Filter</a></li>  -->
<!--              <li><a href="affiliate-add.php" onclick="return confirm_delete()">Add Supplier</a></li>-->
<!--              <li><a href="affiliate-list.php">Supplier List</a></li>-->
<!--              <li><a href="affiliate-search.php">Supplier Search</a></li>-->

                <li><a href="suppliers-filter.php">Supplier Filter</a></li>
                <li><a href="suppliers-add.php" onclick="return confirm_delete()">Add Supplier</a></li>
                <li><a href="suppliers.php">Supplier List</a></li>
                <li><a href="affiliate-search.php">Supplier Search</a></li>

              <li><hr /></li>
              <li><a href="webinar-add.php" onclick="return confirm_delete()">Add Webinar</a></li>                         
              <li><a href="webinar-list.php">Webinar List</a></li>
              <li><hr /></li> 
              <li><a href="notifications-add.php" onclick="return confirm_delete()">Add Notifications</a></li>                         
              <li><a href="notifications-list.php">Notifications List</a></li>
              
              <li><a href="portal-library.php">Library (Add)</a></li>
			  <li><a href="portal-list-library.php">Library (List and Edit)</a></li>              
			  <li><hr /></li>
              <li><a href="email-schedules.php">Email Schedule</a></li>  
              <li><hr /></li>
              <li><a href="leaving-schedules.php">Leaving Schedule</a></li> 
              <li><hr /></li>
              <li><a href="ch_agent_unlock.php"><i class="fa fa-unlock" aria-hidden="true"></i> Agent Unlock</a></li>                  
			  <li><hr /></li>
              <li><a href="reset-admin-password.php" target="_new">Reset Admin Password</a></li> 
              <li><hr /></li>    
              <li><a href="logout.php" target="_new">Logout</a></li> 
              <li><hr /></li>                                                                               
          </ul>
        <!-- Left navbar-header end -->
    </div>
</li>			  
			  

			  <?php } ?>
              <!-- Log Out --> 
              <li class=""><a href="signout.php" data-toggle="tooltip" title="Logout" data-placement="right" onclick="return confirm_delete()"><i class="fa fa-sign-out"></i></a></li>
              <!-- End Log Out --> 
                            
           </ul>
  </div>
  <!-- /.Side panel -->
  

<?php ob_flush(); ?>