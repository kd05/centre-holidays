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
        <title>Suppliers | CH Admin</title>
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

                $limit = 25;
                $current_page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                $initial_page = ($current_page - 1) * $limit;

                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'SupplierID';
                $searchBusinessName = isset($_GET['search-business']) ? $_GET['search-business'] : '';

                $where_condition = "";

                // --- SEARCH by Business Name ---
                if (!empty($searchBusinessName)) {
                    $safeSearch = mysqli_real_escape_string($conn, $searchBusinessName);
                    $where_condition = "WHERE affiliatename LIKE '%$safeSearch%'";
                }
                // --- SORT HANDLING ---
                $order_by = "afid DESC";
                if ($sort === 'BusinessName') {
                    $order_by = "affiliatename ASC, afid DESC";
                } elseif ($sort === 'Preferred') {
                    $order_by = "preferred DESC, afid DESC";
                } elseif ($sort === 'NotPreferred') {
                    $order_by = "preferred ASC, afid DESC";
                }


                // Get total row count
                $count_query = "SELECT COUNT(*) as total FROM affiliates $where_condition";
                $result_count = mysqli_query($conn, $count_query);
                $row_count = mysqli_fetch_assoc($result_count);
                $total_rows = $row_count['total'];
                $total_pages = ceil($total_rows / $limit);

                // Fetch only current page rows
//                $sql = "SELECT * FROM affiliates ORDER BY afid DESC LIMIT $initial_page, $limit";
                $sql = "SELECT * FROM affiliates $where_condition ORDER BY $order_by LIMIT $initial_page, $limit";
                $result = mysqli_query($conn, $sql);
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
                                        Suppliers
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
                                            <a href="suppliers-add.php">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="ki-duotone ki-plus fs-2"></i> Add Supplier
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


                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <label class="form-label fs-6 fw-semibold">Search:</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="search-business" placeholder="Business Name" value="<?php echo $searchBusinessName; ?>">
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <label class="form-label fs-5 fw-semibold mb-3">Sort By:</label>

                                                                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">

                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="SupplierID"  <?php if($sort == 'SupplierID') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">ID</span>
                                                                    </label>

                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="BusinessName" <?php if($sort == 'BusinessName') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Business Name</span>
                                                                    </label>

                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="Preferred" <?php if($sort == 'Preferred') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Preferred</span>
                                                                    </label>

                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                                        <input class="form-check-input" type="radio" name="sort" value="NotPreferred" <?php if($sort == 'NotPreferred') echo 'checked="checked"'; ?>>
                                                                        <span class="form-check-label text-gray-600">Not Preferred</span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->




                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <a href="suppliers.php" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6">Reset</a>
                                                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->

                                                        </form>


                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Menu 1-->    <!--end::Filter-->


                                            </div>
                                            <!--end::Toolbar-->

                                        </div>
                                        <!--end::Card toolbar-->


                                    </div>
                                    <!--end::Card header-->


                                    <!--begin::Card body-->
                                    <div class="card-body py-4">

                                        <!--begin::Table-->

                                        <div id="kt_table_suppliers_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">

                                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_suppliers">
                                                    <thead>
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-50px " style="width: 50px;">ID</th>
                                                        <th class="min-w-125px " >Thumbnail</th>
                                                        <th class="min-w-125px " >SUPPLIER</th>
                                                        <th class="min-w-125px " >PREFERRED</th>
                                                        <th class="min-w-75px " >Edit</th>
                                                        <th class="min-w-75px " >Status</th>
                                                        <th class="min-w-75px " >Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-gray-600 fw-semibold">
                                                    <?php
                                                    while($row = mysqli_fetch_assoc($result)) {

                                                            $row_bg='';
                                                            $affiliateactive = $row['affiliateactive'];
                                                            if ($affiliateactive==0)
                                                                $row_bg='style="background:#c7c7c7 !important"';

                                                            ?>
                                                            <tr <?php echo $row_bg ?>>
                                                                <td><?php echo $row['afid']; ?></td>
                                                                <td>
                                                                    <?php if (!empty($row['affiliatesqimage'])){ ?>
                                                                        <img src="<?php echo "https://centreholidays.com/img/agents/suppliers/".$row['affiliatesqimage']; ?>" style="max-width:80px; height:80px; max-height:80px; margin:5px" />
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?php echo $row['affiliatename']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row['preferred']==1) echo $preferred='Yes';
                                                                    else echo $preferred='No';
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="suppliers-edit.php?affiliatetime=<?php echo $row['affiliatetime'] ?>" class="btn btn-primary" title="Click her to Edit">Edit</a>
                                                                </td>
                                                                <td>
                                                                    <?php if ($affiliateactive==1){ ?>
                                                                        <a href="supplier/deactive-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=0" class="btn btn-warning" title="Click her to Deactivate">Deactivate</a>
                                                                    <?php } elseif ($affiliateactive==0){ ?>
                                                                        <a href="supplier/active-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=0" class="btn btn-success" title="Click her to Deactivate">Activate</a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td><a href="supplier/delete-affiliate.php?afid=<?php echo $row['afid']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>
                                                            </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>




                                            <div class="row mt-5">
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    <?php if($total_pages > 1): ?>

                                                        <?php
                                                                $get_param_string = "";
                                                                $search_business_param_string = isset($_GET['search-business']) ? 'search-business='.$_GET['search-business'].'&' : '';
                                                                $sort_param_string = isset($_GET['sort']) ? 'sort='.$_GET['sort'].'&' : '';

                                                                $get_param_string = $search_business_param_string . $sort_param_string;
                                                        ?>
                                                        <ul class="pagination">
                                                            <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                                                                <li class="paginate_button page-item <?= ($current_page == $page_number) ? 'active' : '' ?>">
                                                                    <?php echo '<a href = "?' . $get_param_string . 'page=' . $page_number . '"  class="page-link">' . $page_number . ' </a>'; ?>
                                                                </li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
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

    <?php  /* ?>
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
    <?php */  ?>


    </html>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>