<?php ob_start(); ?>
<?php
include 'geoplugin.class/index.php';
//----------------------------Connect to database-------------------------

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
include($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php');//GP Added


$agent_counts = get_dashboard_agent_counts();

//echo "<pre>"; print_r($_COOKIE); echo "</pre>";
//exit;


?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Dashboard | CH Admin</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-head-scripts.php');?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-header.php');?>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-sidebar.php');?>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">


                            <?php
                            //---------------display results in case of unpdate--------------
                            if (isset($_GET['results']))
                            {
                                if ($_GET['results']=='success')
                                {
                                    ?>
                                    <div class="app-container container-xxl ">
                                        <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-success">Success</h4>
<!--                                                <span>The Users list has been updated.</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <?
                                }
                                elseif ($_GET['results']=='error')
                                {
                                    ?>
                                    <div class="app-container container-xxl ">
                                        <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                                            <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-danger">Warning, Error!</h4>
                                                <!--                                            <span>The Users list has been updated.</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>



                            <!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
										<!--end::Title-->
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Row-->
<div class="row g-6 g-xl-9">
										<!--begin::Col-->
                                        <div class="col-md-12 col-xl-4">
        <!--begin::Card-->
<div class="card card-stretch">

    <!--begin:: Card body-->
    <div class="card-body flex-column flex-centerp-9">
        <!--begin::Name-->
        <div class="mb-7">
            <!--begin::Title-->
        <div class="fs-2qx fw-bold text-dark">
            Travel Advisors</div>
            <!--end::Title-->
            <!--begin::Description-->
        <p class="fw-semibold text-gray-600 fs-5 mt-1 mb-7">
            View travel advisors that fall under the three listed categories.</p>
        <!--end::Description-->
        <!--begin::Info-->
        
                <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="users.php" target="_blank"
                   class="text-warning fw-semibold fs-6 me-2">Active (<?php echo $agent_counts['active']; ?>)</a>
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://centreholidays.com/work-from-home/home-based-travel-agent-canada.php#pricing" target="_blank" title="See Plans & Pricing">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="users.php?status=suspended"
                   target="_blank" class="text-warning fw-semibold fs-6 me-2">Suspended (<?php echo $agent_counts['suspended']; ?>)</a>
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://pay.google.com/gp/w/u/0/home/accountdetail?ebaid=AJ9oCCzZWCO1hSqlPFzCJGZDVttJdPXZ6G2lowLqk5pcQoxbY11KI8%2FDkIAtgGfMpVrrsJvD8f0Y" target="_blank" title="Access Google Ads Billing">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="users.php?status=terminated"
                   target="_blank" class="text-warning fw-semibold fs-6 me-2">Terminated (<?php echo $agent_counts['terminated']; ?>)</a>
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://pay.google.com/gp/w/u/0/home/accountdetail?ebaid=AJ9oCCzZWCO1hSqlPFzCJGZDVttJdPXZ6G2lowLqk5pcQoxbY11KI8%2FDkIAtgGfMpVrrsJvD8f0Y" target="_blank" title="Access Google Ads Billing">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->
        <!--end::Info-->
        </div>
        <!--end::Name-->
            </div>
    <!--end:: Card body--></div>
<!--end::Card-->    </div>
                                  
<!--end::Col-->
<!--begin::Col-->
	<div class="col-md-6 col-xl-4">
        <!--begin::Card-->
<div class="card card-stretch">

    <!--begin:: Card body-->
    <div class="card-body flex-column flex-centerp-9">
        <!--begin::Name-->
        <div class="mb-7">
            <!--begin::Title-->
        <div class="fs-2qx fw-bold text-dark">
            Recruitment</div>
            <!--end::Title-->
            <!--begin::Description-->
        <p class="fw-semibold text-gray-600 fs-5 mt-1 mb-7">
            View all plans & pricing, applications and Google Ads billing.</p>
        <!--end::Description-->
        <!--begin::Info-->
        
                <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="https://centreholidays.com/work-from-home/home-based-travel-agent-canada.php#pricing" title="See Plans & Pricing" target="_blank" class="text-warning fw-semibold fs-6 me-2">Plans & Pricing</a>
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://centreholidays.com/work-from-home/home-based-travel-agent-canada.php#pricing" target="_blank" title="See Plans & Pricing">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="#" class="text-primary fw-semibold fs-6 me-2">Applications</a>                   
                <!--end::Section--> 
                
                <!--begin::Action-->
                <button type="button" class="btn btn-icon btn-sm h-auto btn-color-gray-400 btn-active-color-primary justify-content-end">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </button>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="https://pay.google.com/gp/w/u/0/home/accountdetail?ebaid=AJ9oCCzZWCO1hSqlPFzCJGZDVttJdPXZ6G2lowLqk5pcQoxbY11KI8%2FDkIAtgGfMpVrrsJvD8f0Y" title="Access Google Ads Billing" target="_blank" class="text-warning fw-semibold fs-6 me-2">Google Ads Billing</a>                   
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://pay.google.com/gp/w/u/0/home/accountdetail?ebaid=AJ9oCCzZWCO1hSqlPFzCJGZDVttJdPXZ6G2lowLqk5pcQoxbY11KI8%2FDkIAtgGfMpVrrsJvD8f0Y" target="_blank" title="Access Google Ads Billing">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->
        <!--end::Info-->
        </div>
        <!--end::Name-->
            </div>
    <!--end:: Card body--></div>
<!--end::Card-->    </div>
<!--end::Col-->
<!--begin::Col-->
	<div class="col-md-6 col-xl-4">
        <!--begin::Card-->
<div class="card card-stretch">

    <!--begin:: Card body-->
    <div class="card-body flex-column flex-centerp-9">
        <!--begin::Name-->
        <div class="mb-7">
            <!--begin::Title-->
        <div class="fs-2qx fw-bold text-dark">
            Google</div>
            <!--end::Title-->
            <!--begin::Description-->
        <p class="fw-semibold text-gray-600 fs-5 mt-1 mb-7">
            Access the Corporate folder in drive, head office calendar and Google Admin.</p>
        <!--end::Description-->
        <!--begin::Info-->
        
                <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="https://drive.google.com/drive/folders/0B7lw4iKw7JnkX3VoNUxtZ19HcUU?resourcekey=0-8CQZ_KMhkn4I0RwgT2UUKw&usp=sharing" title="Access Google Drive" target="_blank" class="text-warning fw-semibold fs-6 me-2">Corporate Folder (Drive)</a>                   
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://drive.google.com/drive/folders/0B7lw4iKw7JnkX3VoNUxtZ19HcUU?resourcekey=0-8CQZ_KMhkn4I0RwgT2UUKw&usp=sharing" target="_blank" title="Access Google Drive">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="#" class="text-primary fw-semibold fs-6 me-2">Head Office Calendar</a>                   
                <!--end::Section--> 
                
                <!--begin::Action-->
                <button type="button" class="btn btn-icon btn-sm h-auto btn-color-gray-400 btn-active-color-primary justify-content-end">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </button>                
                <!--end::Action-->
            </div>
            <!--end::Item-->

        <div class="separator separator-dashed"></div>

        <!--begin::Item-->
            <div class="d-flex flex-stack justify-content-between my-4">
                <!--begin::Section-->
                <a href="https://admin.google.com/" title="Access Google Admin" target="_blank" class="text-warning fw-semibold fs-6 me-2">Google Admin</a>                   
                <!--end::Section--> 
                
                <!--begin::Action-->
                <a type="button" class="btn btn-icon btn-sm h-auto btn-color-warning btn-active-color-warning justify-content-end" href="https://admin.google.com/" target="_blank" title="Access Google Admin">
                    <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>                </a>                
                <!--end::Action-->
            </div>
            <!--end::Item-->
        <!--end::Info-->
        </div>
        <!--end::Name-->
            </div>
    <!--end:: Card body--></div>
<!--end::Card-->    </div>
<!--end::Col-->


                    <?php
                    $sql = "SELECT * FROM blacklist 
                        WHERE `bemail` IS NOT NULL AND `bemail` != ''
                        ORDER BY bltime DESC, blcountry ASC, blarea ASC, blcity ASC";
                    //$ttcount = mysqli_num_rows($result);
                    $result = mysqli_query($conn, $sql);
                    $row_cnt = $result->num_rows;

                    if($row_cnt > 0){
                    ?>

                            <div class="col-xxl-12 mb-5 mb-xl-10">
                                 <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Title-->
                                            <div class="fs-2qx fw-bold text-dark">
                                                Blocked Travel Advisors
                                            </div>
                                                <!--end::Title-->
                                        </div>


                                        <a href="black-list.php">
                                            <button type="button" class="btn btn-light-primary me-3">
                                                <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Black List
                                            </button>
                                        </a>

                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">

                                        <!--begin::Table-->
                                        <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                            <div class="table-responsive">

                                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_customers_table">
                                                    <thead>
                                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                          <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 223.531px;">IP</th>
                                                          <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 223.531px;">TA ID</th>
                                                          <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 172.094px;">Travel Advisor</th>
                                                          <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 223.531px;">Email</th>
                                                          <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 223.531px;">Timestamp</th><th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 132.203px;">Action</th></tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">


                                                        <?php while($row = mysqli_fetch_assoc($result)) {

                                                            $blid = $row['blid'];
                                                            $ip = $row['blip'];
                                                            $bltime = $row['bltime'];
                                                            $bemail = $row['bemail'];
                                                            $date = date('d/m/Y H:i:s',$row['bltime']);

                                                            //Get Agent Info from Email
                                                            $agent_sql="SELECT * FROM ch_agents_1, ch_agents_2
                                                                        WHERE
                                                                              ch_agents_2.BusinessEmail = '$bemail' AND
                                                                              ch_agents_2.AgentID=ch_agents_1.AgentID limit 1";

                                                            $agent_row = [];

//                                                            if($result_agent_sql = mysqli_query($conn, $agent_sql)){
//                                                                $agent_row = mysqli_fetch_assoc($result_agent_sql);
//                                                            }

                                                            if ($result_agent_sql = mysqli_query($conn, $agent_sql)) {
                                                                $agent_row = mysqli_fetch_assoc($result_agent_sql);
                                                                if (!$agent_row) {
                                                                    continue; // Skip to the next iteration if no agent is found
                                                                }
                                                            } else {
                                                                continue; // Skip to the next iteration if query fails
                                                            }


                                                            $agent_id = $agent_row['AgentID'];
                                                            $agent_fullname = $agent_row['FirstName']." ".$agent_row['LastName'];

                                                            ?>

                                                                <tr class="odd">
                                                                    <td data-order="<?php echo $ip; ?>"><?php echo $ip; ?></td>
                                                                    <td>
                                                                        <a href="/metronic8/demo1/../demo1/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1"><?php echo $agent_id; ?></a>
                                                                    </td>
                                                                    <td>
                                                                      <a href="/metronic8/demo1/../demo1/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1"><?php echo $agent_fullname; ?></a>
                                                                    </td>
                                                                    <td data-order="<?php echo $bemail; ?>"><?php echo $bemail; ?></td>
                                                                    <td data-order="<?php echo $date; ?>"><?php echo $date; ?></td>
<!--                                                                    <td class="text-end">-->
<!--                                                                        <a href="unblock.php?blip=--><?php //echo $row['blip'] ?><!--&redirect_page=dashboard.php" class="btn btn-sm fw-bold btn-warning">Unblock IP</a>-->
<!--                                                                    </td>-->

                                                                    <td class="text-end">
                                                                        <a href="unblock.php?blip=<?php echo $row['blip'] ?>&redirect_page=dashboard.php"
                                                                           class="btn btn-sm fw-bold btn-warning"
                                                                           onclick="return confirm('Are you sure?');">
                                                                            Unblock IP
                                                                        </a>
                                                                    </td>

                                                                </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>

<!--                                            <div class="row">-->
<!--                                                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">-->
<!--                                                    <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">-->
<!--                                                        <ul class="pagination">-->
<!--                                                            <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="0" class="page-link">-->
<!--                                                                    <i class="previous"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li class="paginate_button page-item active">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>-->
<!--                                                            </li>-->
<!--                                                            <li class="paginate_button page-item ">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="2" tabindex="0" class="page-link">2</a>-->
<!--                                                            </li>-->
<!--                                                            <li class="paginate_button page-item ">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="3" tabindex="0" class="page-link">3</a>-->
<!--                                                            </li>-->
<!--                                                            <li class="paginate_button page-item ">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="4" tabindex="0" class="page-link">4</a>-->
<!--                                                            </li>-->
<!--                                                            <li class="paginate_button page-item next" id="kt_customers_table_next">-->
<!--                                                                <a href="#" aria-controls="kt_customers_table" data-dt-idx="5" tabindex="0" class="page-link">-->
<!--                                                                    <i class="next"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->

                                        </div>
                                        <!--end::Table-->

                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>

                    <?php  } ?>

									</div>
									<!--end::Row-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-footer.php');?>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Scrolltop-->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-scrolltop.php');?>
		<!--end::Scrolltop-->
		<!--begin::Modals-->

	<!--end::Modals-->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-footer-scripts.php');?>
	</body>
	<!--end::Body-->
</html>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>