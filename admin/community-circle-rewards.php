<?php ob_start(); ?>
<?php
include 'geoplugin.class/index.php';
//----------------------------Connect to database-------------------------

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========



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
            <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-header.php');?>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-sidebar.php');?>
                <!--end::Sidebar-->



                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php');//GP Added
                $conn = db_conn();


//                $limit = 50;
                $limit = 25;
                // update the active page number
                $current_page= isset($_GET["page"]) ? $_GET["page"] : 1;
                // get the initial page number
                $initial_page = ($current_page-1) * $limit;

                $status = isset($_GET['status']) ? $_GET['status'] : 'active';
                $sort_order = isset($_GET['sort-order']) ? $_GET['sort-order'] : 'desc';

                //This is used in both the places
                $where_condition = "";

                if($status == 'active'){
                    $where_condition = " ch_agents_1.active=1 ";
                } elseif ($status == 'suspended') {
                    $where_condition = " (ch_agents_1.active=0 AND ch_agents_1.CloseDate ='') ";
                }elseif ($status == 'terminated'){
                    $where_condition = " ch_agents_1.active !=1 AND ch_agents_1.CloseDate !='' ";
                }


                $ord='ch_agents_1.CommunityCircleRewards';
                $count_query = "SELECT count(*) FROM ch_agents_1, ch_agents_2 
                                    WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND 
                                    $where_condition ORDER BY  $ord  $sort_order";
                $result_count_query = mysqli_query($conn, $count_query);
                $row_count_query = mysqli_fetch_row($result_count_query);
                $total_rows = $row_count_query[0];
                $total_pages = ceil ($total_rows / $limit);


                $sql = "SELECT * FROM ch_agents_1, ch_agents_2 
                                WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND 
                                $where_condition ORDER BY  $ord  $sort_order, ch_agents_1.AgentID ASC LIMIT $initial_page, $limit";
                $result = mysqli_query($conn, $sql);


                ?>

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->


                        <?php
                        //---------------display results in case of unpdate--------------
                        if (isset($_GET['results']))
                        {
                            $display_message = isset($_GET['message']) ? $_GET['message'] : "The Users list has been updated.";

                            if ($_GET['results']=='success')
                            {
                                ?>
                                <div class="app-container container-xxl ">
                                    <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                                            <h4 class="mb-1 text-success">Success</h4>
                                            <span><?php echo $display_message; ?></span>
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


                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
<!--                                        --><?php //echo strtoupper($status . " Users")?><!-- - -->
                                        COMMUNITY CIRCLES REWARDS
                                    </h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">


                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-xxl ">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Add user-->
                                            <button type="button" class="btn btn-primary reset-reward-points"
                                                    action-url="reset-community-circle-rewards.php?reset=1">
                                                Reset Points
                                            </button>

                                            <!--end::Add user-->
                                        </div>
                                        <!--begin::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Filter-->
                                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>        Filter
                                                </button>
                                                <!--begin::Menu 1-->
                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"  id="agent_menu_gp123456">
                                                    <!--begin::Header-->
                                                    <div class="px-7 py-5">
                                                        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                    </div>
                                                    <!--end::Header-->

                                                    <!--begin::Separator-->
                                                    <div class="separator border-gray-200"></div>
                                                    <!--end::Separator-->

                                                    <!--begin::Content-->
                                                    <div class="px-7 py-5" data-kt-user-table-filter="form">

                                                        <form action="">

                                                            <?php
                                                                $sort_filters = [
                                                                        'asc' => 'Low to High',
                                                                        'desc' => 'High to Low'
                                                                ];
                                                            ?>

                                                            <!--begin::Input group-->
<!--                                                            <div class="mb-5">-->
<!--                                                                <label class="form-label fs-6 fw-semibold">Filter Your Search:</label>-->
<!--                                                                <select class="form-select form-select-solid" name="sort-order"  data-kt-select2="true" data-close-on-select="false"-->
<!--                                                                        data-placeholder="Select option" data-dropdown-parent="#agent_menu_gp123456" data-allow-clear="true">-->
<!---->
<!--                                                                    <option value="">Filter Your Search</option>-->
<!--                                                                    --><?php // foreach ($sort_filters as $sort_key => $sort_filter){ ?>
<!--                                                                        <option value="--><?php //echo $sort_key ?><!--" --><?php // if($sort_order == $sort_key) echo "selected"; ?><!-- >--><?php //echo $sort_filter ?><!--</option>-->
<!--                                                                    --><?php // } ?>
<!--                                                                </select>-->
<!---->
<!--                                                            </div>-->
                                                            <!--end::Input group-->


                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <!--begin::Label-->
                                                                <label class="form-label fs-5 fw-semibold mb-3">Filter Options:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">

<!--                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">-->
<!--                                                                        <input class="form-check-input" type="radio" name="status" value="active" --><?php //if($status == 'active') echo 'checked="checked"'; ?>
<!--                                                                        <span class="form-check-label text-gray-600">Low To High</span>-->
<!--                                                                    </label>-->
<!--                                                                    -->
<!--                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">-->
<!--                                                                        <input class="form-check-input" type="radio" name="status" value="suspended"  --><?php //if($status == 'suspended') echo 'checked="checked"'; ?>
<!--                                                                        <span class="form-check-label text-gray-600">High To Low</span>-->
<!--                                                                    </label>-->



                                                                    <?php  foreach ($sort_filters as $sort_key => $sort_filter){ ?>

                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                            <input class="form-check-input" type="radio" name="sort-order" value="<?php echo $sort_key ?>" <?php  if($sort_order == $sort_key) echo "checked"; ?>>
                                                                            <span class="form-check-label text-gray-600"><?php echo $sort_filter ?></span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    <?php  } ?>


                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->


                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <a href="community-circle-rewards.php" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6">Reset</a>
                                                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->

                                                        </form>


                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Menu 1-->    <!--end::Filter-->



                                                <!--begin::Export-->
<!--                                                <a href="export-terminated.php">-->
<!--                                                    <button type="button" class="btn btn-light-primary me-3">-->
<!--                                                        <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export Terminated Agents-->
<!--                                                    </button>-->
<!--                                                </a>-->
                                                <!--end::Export-->


                                            </div>
                                            <!--end::Toolbar-->

                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-4">

                                        <!--begin::Table-->
                                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                                                    <thead>
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 50px;">ID</th>
                                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 276.609px;">User</th>
                                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 161.922px;">Points</th>
                                                        <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 130.109px;">Actions</th></tr>
                                                    </thead>
                                                    <tbody class="text-gray-600 fw-semibold">
                                                    <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($result)) {

//                                                        echo "<pre>"; print_r($row); echo "</pre>";

                                                        $cls = $i % 2 == 0 ? 'even' : 'odd';
                                                    ?>
                                                        <tr class="<?php  echo $cls; ?>">
                                                            <td><?php echo $row['AgentID']; ?></td>
                                                            <td class="d-flex align-items-center">
                                                                <!--begin:: Avatar -->
                                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                    <a href="javascript:void(0)">
                                                                        <div class="symbol-label">
                                                                            <img src="/img/agents/<?php echo $row['AgentID']; ?>/profile.jpg" class="w-100">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <!--end::Avatar-->
                                                                <!--begin::User details-->
                                                                <div class="d-flex flex-column text-gray-800">
                                                                    <?php echo $row['FirstName'].' '.$row['LastName']; ?>
                                                                    <span class="text-gray-600"><?php echo $row['AgentType']; ?></span>
                                                                </div>
                                                                <!--begin::User details-->
                                                            </td>
                                                            <td><?php echo $row['CommunityCircleRewards']; ?></td>
                                                            <td class="text-start">



                                                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                                    <!--begin::Filter-->
                                                                    <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Add Points</button>
                                                                    <!--begin::Menu 1-->
                                                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"  id="agent_menu_gp123456">
                                                                        <!--begin::Header-->
                                                                        <div class="px-7 py-5">
                                                                            <div class="fs-5 text-gray-900 fw-bold">Add Points for <?php echo $row['FirstName'].' '.$row['LastName']; ?></div>
                                                                        </div>
                                                                        <!--end::Header-->

                                                                        <!--begin::Separator-->
                                                                        <div class="separator border-gray-200"></div>
                                                                        <!--end::Separator-->

                                                                        <!--begin::Content-->
                                                                        <div class="px-7 py-5" data-kt-user-table-filter="form">

                                                                            <form action="community-circle-add-points.php?agent_id=<?php echo $row['AgentID']; ?>" method="post">
                                                                                <div class="mb-5">
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="points" placeholder="Add Points" value="">
                                                                                </div>
                                                                                <!--end::Input group-->

                                                                                <!--begin::Actions-->
                                                                                <div class="d-flex justify-content-end">
                                                                                    <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                                                </div>
                                                                                <!--end::Actions-->
                                                                            </form>


                                                                        </div>
                                                                        <!--end::Content-->
                                                                    </div>
                                                                    <!--end::Menu 1-->

                                                                </div>


                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                                                <?php
                                                    if($total_pages > 1){
                                                        ?>

                                                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                            <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate" >
                                                                <ul class="pagination">
                                                                    <?php
                                                                    $get_param_string = "";
                                                                    $sortorder_param_string = isset($_GET['sort-order']) ? 'sort-order='.$_GET['sort-order'].'&' : '';
                                                                    $status_param_string = isset($_GET['status']) ? 'status='.$_GET['status'].'&' : '';

                                                                    $get_param_string = $sortorder_param_string .  $status_param_string;

                                                                    for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                                                    ?>
                                                                        <li class="paginate_button page-item <?php if($current_page == $page_number) echo "active"; ?>">
                                                                           <?php echo '<a href = "?' . $get_param_string . 'page=' . $page_number . '"  class="page-link">' . $page_number . ' </a>'; ?>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    }
                                                ?>
                                            </div>


                                        </div>
                                        <!--end::Table-->    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->        </div>
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


    <?php include($_SERVER['DOCUMENT_ROOT'].'/admin/ssi/global-footer-scripts.php');?>
    </body>
    <!--end::Body-->

    <script>
        $(document).ready(function(){
            $('.delete-agent').on('click', function(){
                if(confirm("Are you sure you want to delete this agent?")) {
                    const actionUrl = $(this).attr('action-url');
                    window.location.href = actionUrl;
                }
            });


            $('.reset-reward-points').on('click', function(){
                if(confirm("Are you sure you want to reset points?")) {
                    const actionUrl = $(this).attr('action-url');
                    window.location.href = actionUrl;
                }
            });

        });
    </script>

    </html>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>