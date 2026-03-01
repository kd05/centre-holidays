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
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'AgentID';

                $favcolor = isset($_GET['favcolor']) ? $_GET['favcolor'] : '';
                $codelook = isset($_GET['codelook']) ? $_GET['codelook'] : '';

                //This is used in both the places
                $where_condition = "";

                if($status == 'active'){
                    $where_condition = " ch_agents_1.active=1 ";
                } elseif ($status == 'suspended') {
                    $where_condition = " (ch_agents_1.active=0 AND ch_agents_1.CloseDate ='') ";
                }elseif ($status == 'terminated'){
                    $where_condition = " ch_agents_1.active !=1 AND ch_agents_1.CloseDate !='' ";
                }

                $ord="ch_agents_1.$sort";

                //Wen only Status is selected / Default page (Active status)
                if( empty($favcolor) || empty($codelook) ){

                    $count_query = "SELECT count(*) FROM ch_agents_1, ch_agents_2 
WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND $where_condition ORDER BY  ".$ord."  ASC";
                    $result_count_query = mysqli_query($conn, $count_query);
                    $row_count_query = mysqli_fetch_row($result_count_query);
                    $total_rows = $row_count_query[0];
                    $total_pages = ceil ($total_rows / $limit);


//                    $sql = "SELECT * FROM ch_agents_1 WHERE 1 AND $where_condition ORDER BY ".$ord." ASC LIMIT $initial_page, $limit";
                    $sql = "SELECT * FROM ch_agents_1, ch_agents_2 
WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND $where_condition ORDER BY ".$ord." ASC LIMIT $initial_page, $limit";
                    $result = mysqli_query($conn, $sql);

                } else {

                    //jeez like WTF.. why old site devs (centre holidays devs) are using such a weird names everywhere. Keeping it same for now as we have limited hours
                    $pizza=str_replace("'", '', $codelook);
                    $pieces = explode(" ", $pizza);



                    $count_sql = "SELECT count(*) FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND $where_condition AND ( ";

                    $sql = "SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_1.AgentID = ch_agents_2.AgentID AND $where_condition AND ( ";
                    $sql_append_string = "";

                    switch ($favcolor) {

                        case "1":
                            $sql_append_string .= " (ch_agents_1.FirstName) LIKE '%".$codelook."%' || (ch_agents_1.LastName) LIKE '%".$codelook."%'";
                            break;

                        case "2":
                            $sql_append_string .= " (ch_agents_1.FirstName) LIKE '%".$pieces[0]."%' AND (ch_agents_1.LastName) LIKE '%".$pieces[1]."%' ";
                            break;

                        case "3":

                            if (isset($pieces[1]))
                                $sql_append_string .= " (ch_agents_1.NickName) LIKE '%".$pieces[0]."%' || (ch_agents_1.NickName) LIKE '%".$pieces[1]."%' ";
                            else
                                $sql_append_string .= " ch_agents_1.NickName LIKE '%".$codelook."%' ";

                            $sql_append_string .= " AND ch_agents_1.NickName !=''";
                            break;

                        case "4":
                            $sql_append_string .= " (ch_agents_2.BusinessName) LIKE '%".$codelook."%' AND ch_agents_2.BusinessName !=''";
                            break;

                        case "5":
                            $sql_append_string .= " (ch_agents_2.DisplayName) LIKE '%".$codelook."%' AND ch_agents_2.DisplayName !=''";
                            break;

                        case "6":
                            $sql_append_string .= " (ch_agents_2.BusinessEmail) LIKE '%".$codelook."%' AND ch_agents_2.BusinessEmail !=''";
                            break;

                        case "7":
                            $sql_append_string .= " (ch_agents_2.BusinessNum) LIKE '%".$codelook."%' AND ch_agents_2.BusinessNum !=''";
                            break;

                        case "8":
                            $sql_append_string .= " ch_agents_1.CellNum LIKE '%".$codelook."%' || (ch_agents_2.DisplayUseCell) LIKE '%".$codelook."%' AND ch_agents_2.DisplayUseCell !=''";
                            break;

                        case "9":
                            $sql_append_string .= " (ch_agents_2.TollFreeNum) LIKE '%".$codelook."%' AND ch_agents_2.TollFreeNum !=''";
                            break;

                        case "10":
                            $sql_append_string .= " (ch_agents_2.SkypeID) LIKE '%".$codelook."%' AND ch_agents_2.SkypeID !=''";
                            break;

                        case "11":
                            $sql_append_string .= " (ch_agents_2.Website) LIKE '%".$codelook."%' AND ch_agents_2.Website !=''";
                            break;

                        case "12":
                            $sql_append_string .= " ch_agents_1.AgentID LIKE '%".$codelook."%' ";
                            break;

                        case "13":
                            $sql_append_string .= " ch_agents_1.PersonalEmail LIKE '%".$codelook."%' AND ch_agents_1.PersonalEmail !=''";
                            break;

                        case "14":
                            $sql_append_string .= " ch_agents_1.Commission LIKE '%".$codelook."%' AND ch_agents_1.Commission !=''";
                            break;

                        case "15":
                            $sql_append_string .= " (ch_agents_1.City) LIKE '%".$codelook."%' AND ch_agents_1.City !=''";
                            break;

                        case "16":
                            $sql_append_string .= " (ch_agents_1.Province) LIKE '%".$codelook."%'";
                            break;

                        case "17":
                            $sql_append_string .= " (ch_agents_1.AgentType) LIKE '%".$codelook."%' ";
                            break;


                        case "18":
                            $sql_append_string .= " ((ch_agents_1.Notes) LIKE '%".$codelook."%' || (ch_agents_1.ShippingNotes) LIKE '%".$codelook."%') ";
                            break;

                        case "19":
                            $sql_append_string .= " ((ch_agents_1.License) LIKE '%".$codelook."%' || (ch_agents_1.TICOcert) LIKE '%".$codelook."%' 
                                        || (ch_agents_1.BCNumber) LIKE '%".$codelook."%') ";
                            break;

//==================================================================================
                        case "20":
                            $yearstart=$pieces[0];
                            $yeramax=$pieces[1];

                            $sql_append_string .= " ch_agents_1.JoinDate LIKE '%".$codelook."%' || ";
                            $sql_append_string .= " ch_agents_1.JoinDate LIKE '%".$yearstart."%' ||";
                            for ($x = $yearstart; $x <= $yeramax; $x++) {
                                $sql_append_string .= " ch_agents_1.JoinDate LIKE '%".$x."%' ||";
                            }
                            $sql_append_string .= " ch_agents_1.JoinDate LIKE '%".$yeramax."%'";


                            /*$sql_append_string .= " ch_agents_1.JoinDate LIKE '%".$codelook."%' ||
                            ch_agents_1.JoinDate LIKE '%".$yearstart."%' ||
                            ch_agents_1.JoinDate LIKE '%".$yeramax."%'
                            "*/;
                            break;


                        case "21":
                            $sql_append_string .= " ch_agents_1.BirthDate LIKE '%".$codelook."%' ";
                            break;

                        case "22":
//                            $sql_append_string .= " ch_agents_1.PODLeader LIKE '%".$codelook."%' ";
                            $sql_append_string .= " ";
                            break;


                        case "30":
                            $sql_append_string .= " ch_agents_1.AgentPlan LIKE '%".$_GET['AgentPlan']."%' ";
                            break;

                        case "31":
                            $sql_append_string .= " ch_agents_1.MonthlyRecurringFee LIKE '%".$codelook."%' ";
                            break;

                    }


                    $count_sql .= $sql_append_string;
                    $count_sql .= " )  ORDER BY ".$ord." ASC";
                    $result_count_query = mysqli_query($conn, $count_sql);
                    $row_count_query = mysqli_fetch_row($result_count_query);
                    $total_rows = $row_count_query[0];
                    $total_pages = ceil ($total_rows / $limit);


                    $sql .= $sql_append_string;
                    $sql .= " ) ORDER BY ".$ord." ASC LIMIT $initial_page, $limit";
                    $result = mysqli_query($conn, $sql);

                }

                ?>

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
                                            <span>The Users list has been updated.</span>
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
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        <?php echo strtoupper($status . " Users")?>
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
                                            <a href="ch-agent-add.php">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="ki-duotone ki-plus fs-2"></i> Add User
                                                </button>
                                            </a>

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
                                                            $search_filters = [
                                                                '12' => 'AgentID',
                                                                '1' => 'First Name',
                                                                '1' => 'Last Name',
                                                                '2' => 'First Name and Last Name',
                                                                '3' => 'Nick Name',
                                                                '4' => 'Business Name',
                                                                '5' => 'Display Name',
                                                                '6' => 'Business Email',
                                                                '7' => 'Business Number',
                                                                '8' => 'Cell Number',
                                                                '9' => 'Toll Free Number',
                                                                '10' => 'SkypeID',
                                                                '11' => 'Website',
                                                                '13' => 'Personal Email',
                                                                '14' => 'Commission',
                                                                '15' => 'City',
                                                                '16' => 'Province',
                                                                '17' => 'Agent Type',
                                                                '18' => 'Notes and Shipping Notes',
                                                                '19' => 'License / Tico / BC Number',
                                                                '20' => 'Join Date Range',
                                                                '21' => 'Birth Year',
                                                                '27' => 'Birth Month',
                                                                '22' => 'Community Pod',
                                                                '30' => 'Agent Plan',
                                                                '31' => 'Monthly Recurring Fee',
                                                            ]

                                                            ?>

                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <label class="form-label fs-6 fw-semibold">Filter Your Search:</label>
                                                                <select class="form-select form-select-solid" name="favcolor" data-close-on-select="false"
                                                                        data-placeholder="Select option" data-dropdown-parent="#agent_menu_gp123456" data-allow-clear="true">
                                                                    <!--                                                                    <option></option>-->
                                                                    <option value="">Filter Your Search</option>
                                                                    <?php  foreach ($search_filters as $search_key => $search_filter){ ?>
                                                                        <option value="<?php echo $search_key ?>" <?php  if($favcolor == $search_key) echo "selected"; ?> ><?php echo $search_filter ?></option>
                                                                    <?php  } ?>
                                                                </select>

                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <label class="form-label fs-6 fw-semibold">Search:</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="codelook" placeholder="Search" value="<?php echo $codelook ?>">
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <!--begin::Label-->
                                                                <label class="form-label fs-5 fw-semibold mb-3">Travel Advisor Status:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                                                                    <!--begin::Option-->
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="status" value="active" <?php if($status == 'active') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Active</span>
                                                                    </label>
                                                                    <!--end::Option-->

                                                                    <!--begin::Option-->
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="status" value="suspended"  <?php if($status == 'suspended') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Suspended</span>
                                                                    </label>
                                                                    <!--end::Option-->

                                                                    <!--begin::Option-->
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                                                        <input class="form-check-input" type="radio" name="status" value="terminated"  <?php if($status == 'terminated') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Terminated</span>
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->




                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <label class="form-label fs-5 fw-semibold mb-3">Sort Travel Advisor:</label>

                                                                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="FirstName" <?php if($sort == 'FirstName') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">First Name</span>
                                                                    </label>

                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="AgentID"  <?php if($sort == 'AgentID') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">ID</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->




                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <a href="users.php" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6">Reset</a>
                                                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->

                                                        </form>


                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Menu 1-->    <!--end::Filter-->

                                                <!--begin::Export-->
                                                <!--                                                <a href="users.php">-->
                                                <!--                                                    <button type="button" class="btn btn-light-primary me-3">Reset</button>-->
                                                <!--                                                </a>-->
                                                <!--end::Export-->

                                                <!--begin::Export-->
                                                <a href="export.php">
                                                    <button type="button" class="btn btn-light-primary me-3">
                                                        <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export Users
                                                    </button>
                                                </a>
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
<!--                                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 161.922px;">Join Date</th>-->
                                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 161.922px;">ADDRESS </th>
                                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 161.922px;">Location</th>
                                                        <th class="min-w-75px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Two-step : activate to sort column ascending" style="width: 75px;">Status</th><th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 130.109px;">Actions</th></tr>
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
<!--                                                            <td>--><?php //echo $row['JoinDate']; ?><!--</td>-->

                                                            <td >
                                                                <?php echo $row['Street'];  ?>
                                                                <?php if(!empty($row['Unit'])) { echo "<br>".$row['Unit']; } ?>
                                                            </td>

                                                            <td>
                                                                <!--                                                                --><?php //echo $row['Unit']; if(!empty($row['Unit'])) echo ","; ?>
                                                                <!--                                                                --><?php //echo $row['Street']; if(!empty($row['Street'])) echo ","; ?>
                                                                <!--                                                                --><?php //echo $row['City']; if(!empty($row['City'])) echo ","; ?>
                                                                <!--                                                                --><?php //echo trim($row['Province']); if(!empty($row['PostalCode'])) echo ", ";  echo $row['PostalCode']; ?>


                                                                <?php echo $row['City']; if(!empty($row['City'])) echo ","; ?>
                                                                <?php echo trim($row['Province']); ?><br>
                                                                <?php echo trim($row['PostalCode']); ?>


                                                            </td>
                                                            <td>
                                                                <?php
                                                                if($status == 'active'){
                                                                    echo '<div class="badge badge-light-success fw-bold">Active</div>';
                                                                } elseif ($status == 'suspended') {
                                                                    echo '<div class="badge badge-light-warning fw-bold">Suspended</div>';
                                                                }elseif ($status == 'terminated'){
                                                                    echo '<div class="badge badge-light-danger fw-bold">Terminated</div>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">


                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_contact_card-<?php echo $row['AgentID']; ?>">
                                                                            Profile Card
                                                                        </a>
                                                                    </div>
                                                                    <!--end::Menu item-->


                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="menu-link px-3">Edit</a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <?php  if($status == 'active'){ ?>
                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
                                                                            <a href="ch-agents/deactivate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="menu-link px-3">Suspend</a>
                                                                        </div>
                                                                        <!--end::Menu item-->
                                                                    <?php  } ?>

                                                                    <?php  if($status == 'suspended' || $status == 'terminated'){ ?>
                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
                                                                            <a href="ch-agents/activate-agent.php?AgentID=<?php echo $row['AgentID']; ?>" class="menu-link px-3">Activate</a>
                                                                        </div>
                                                                        <!--end::Menu item-->
                                                                    <?php  } ?>

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="javascript:void(0)"
                                                                           action-url="ch-agents/delete-agent.php?AgentID=<?php echo $row['AgentID']; ?>"
                                                                           class="menu-link px-3 delete-agent">Delete</a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                </div>



                                                                <!--begin::Modals-->
                                                                <div class="modal fade" id="kt_modal_contact_card-<?php echo $row['AgentID']; ?>" tabindex="-1" aria-hidden="true">
                                                                    <!--begin::Modal dialog-->
                                                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                                                        <!--begin::Modal content-->
                                                                        <div class="modal-content">
                                                                            <!--begin::Modal header-->
                                                                            <div class="modal-header" id="kt_modal_new_address_header">
                                                                                <!--begin::Modal title-->
                                                                                <h2>PROFILE CARD</h2>
                                                                                <!--end::Modal title-->

                                                                                <!--begin::Close-->
                                                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                    </div>
                                                                                <!--end::Close-->
                                                                            </div>
                                                                            <!--end::Modal header-->

                                                                            <!--begin::Modal body-->
                                                                            <div class="modal-body py-10 px-lg-17">
                                                                                <!--begin::Scroll-->
                                                                                <div
                                                                                        class="scroll-y me-n7 pe-7"
                                                                                        id="kt_modal_new_address_scroll"

                                                                                        data-kt-scroll="true"
                                                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                                                        data-kt-scroll-max-height="auto"
                                                                                        data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                                                                        data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                                                                        data-kt-scroll-offset="300px">
                                                                                    <!--begin::Input group-->
                                                                                    <div class="card mb-5 mb-xl-8">
                                                                                        <!--begin::Card body-->
                                                                                        <div class="card-body pt-15">
                                                                                            <!--begin::Summary-->
                                                                                            <div class="d-flex flex-center flex-column mb-5">
                                                                                                <!--begin::Avatar-->
                                                                                                <div class="symbol symbol-100px symbol-circle mb-7">
                                                                                                    <img src="/img/agents/<?php echo $row['AgentID']; ?>/profile.jpg" alt="image">
                                                                                                </div>
                                                                                                <!--end::Avatar-->

                                                                                                <!--begin::Name-->
                                                                                                <a href="javascript:void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                                                                                    <?php echo $row['FirstName'].' '.$row['LastName']; ?>
                                                                                                </a>
                                                                                                <!--end::Name-->

                                                                                                <!--begin::Position-->
                                                                                                <div class="fs-5 fw-semibold text-muted mb-6"><?php echo $row['AgentType']; ?></div>
                                                                                                <!--end::Position-->
                                                                                            </div>
                                                                                            <!--end::Summary-->

                                                                                            <!--begin::Details toggle-->
                                                                                            <div class="d-flex flex-stack fs-4 py-3">
                                                                                                <div class="fw-bold rotate collapsible active" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="true" aria-controls="kt_customer_view_details">
                                                                                                    Details
                                                                                                    <span class="ms-2 rotate-180"><i class="ki-duotone ki-down fs-3"></i></span>
                                                                                                </div>

                                                                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Edit customer details" data-kt-initialized="1">
                                                                                                    <a href="ch-agent-details.php?AgentID=<?php echo $row['AgentID']; ?>" class="btn btn-sm btn-light-primary">
                                                                                                        Edit
                                                                                                    </a>
                                                                                                </span>
                                                                                            </div>
                                                                                            <!--end::Details toggle-->

                                                                                            <div class="separator separator-dashed my-3"></div>

                                                                                            <!--begin::Details content-->
                                                                                            <div id="kt_customer_view_details" class="collapse show" style="text-align:left;">
                                                                                                <div class="py-5 fs-6">                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">User ID</div>
                                                                                                    <div class="text-gray-600"><?php echo $row['AgentID']; ?></div>
                                                                                                    <!--end::Details item-->

                                                                                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">User Type</div>
                                                                                                    <div class="text-gray-600"><?php echo $row['AgentType']; ?></div>
                                                                                                    <!--end::Details item-->

                                                                                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">Phone</div>
                                                                                                    <div class="text-gray-600">
                                                                                                        <a href="javascript:void(0)" class="text-gray-600 text-hover-warning">

                                                                                                            <?php
                                                                                                            if($row['mainnumber'] == 1) {
                                                                                                                echo $row['BusinessNum'];
                                                                                                            } elseif ($row['mainnumber'] == 2){
                                                                                                                echo $row['DisplayUseCell'];
                                                                                                            } else {
                                                                                                                echo $row['TollFreeNum'];
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <!--end::Details item-->
                                                                                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">CH EMAIL</div>
                                                                                                    <div class="text-gray-600"><a href="javascript:void(0)" class="text-gray-600 text-hover-warning"><?php echo $row['BusinessEmail']; ?></a></div>
                                                                                                    <!--end::Details item-->

                                                                                                    <!--begin::Details item-->
                                                                                                    <!--   POD REMOVED-->
<!--                                                                                                    <div class="fw-bold mt-5">Pod</div>-->
<!--                                                                                                    <div class="text-gray-600">--><?php //echo $row['PODLeader']; ?><!--</div>-->
                                                                                                    <!--end::Details item-->


                                                                                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">Join Date</div>
                                                                                                    <div class="text-gray-600"><?php echo $row['JoinDate']; ?></div>
                                                                                                    <!--end::Details item-->


                                                                                                    <!--begin::Details item-->
                                                                                                    <div class="fw-bold mt-5">Plan</div>
                                                                                                    <div class="text-gray-600">
                                                                                                        <!-- Professional Plus Plan<br>85% Commission<br>$75 Monthly Recurring Fee-->
                                                                                                        <?php echo $row['AgentPlan']; ?><br>
                                                                                                        <?php echo $row['Commission']; ?> Commission<br>
                                                                                                        <?php echo $row['MonthlyRecurringFee']; ?>  Monthly Recurring Fee
                                                                                                    </div>
                                                                                                    <!--end::Details item-->
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--end::Details content-->
                                                                                        </div>
                                                                                        <!--end::Card body-->
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Scroll-->
                                                                            </div>
                                                                            <!--end::Modal body-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Modals-->


                                                                <!--end::Menu-->
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
                                                                $favcolor_param_string = isset($_GET['favcolor']) ? 'favcolor='.$_GET['favcolor'].'&' : '';
                                                                $codelook_param_string = isset($_GET['codelook']) ? 'codelook='.$_GET['codelook'].'&' : '';
                                                                $status_param_string = isset($_GET['status']) ? 'status='.$_GET['status'].'&' : '';
                                                                $sort_param_string = isset($_GET['sort']) ? 'sort='.$_GET['sort'].'&' : '';

                                                                $get_param_string = $favcolor_param_string . $codelook_param_string . $status_param_string . $sort_param_string;

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

                                            <!--                                            <div class="row">-->
                                            <!--                                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>-->
                                            <!--                                                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">-->
                                            <!--                                                    <div class="dataTables_paginate paging_simple_numbers"-->
                                            <!--                                                         id="kt_table_users_paginate">-->
                                            <!--                                                        <ul class="pagination">-->
                                            <!--                                                            <li class="paginate_button page-item previous disabled" id="kt_table_users_previous">-->
                                            <!--                                                                <a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link">-->
                                            <!--                                                                    <i class="previous"></i>-->
                                            <!--                                                                </a>-->
                                            <!--                                                            </li>-->
                                            <!--                                                            <li class="paginate_button page-item active">-->
                                            <!--                                                                <a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">1</a>-->
                                            <!--                                                            </li>-->
                                            <!--                                                            <li class="paginate_button page-item ">-->
                                            <!--                                                                <a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a>-->
                                            <!--                                                            </li>-->
                                            <!--                                                            <li class="paginate_button page-item ">-->
                                            <!--                                                                <a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a>-->
                                            <!--                                                            </li>-->
                                            <!--                                                            <li class="paginate_button page-item next" id="kt_table_users_next">-->
                                            <!--                                                                <a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link">-->
                                            <!--                                                                    <i class="next"></i>-->
                                            <!--                                                                </a>-->
                                            <!--                                                            </li>-->
                                            <!--                                                        </ul>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->



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
        });
    </script>


    </html>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>