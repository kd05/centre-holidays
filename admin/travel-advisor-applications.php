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
        <title>Travel Advisor Applications | CH Admin</title>
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

                // Count total rows
                $count_query = "SELECT COUNT(*) as total FROM forms WHERE formtype='home-based-travel-agent-canada'";
                $result_count = mysqli_query($conn, $count_query);
                $row_count = mysqli_fetch_assoc($result_count);
                $total_rows = $row_count['total'];
                $total_pages = ceil($total_rows / $limit);



                // Main query with LIMIT
                $sql = "SELECT * FROM forms WHERE formtype='home-based-travel-agent-canada' ORDER BY formid DESC LIMIT $initial_page, $limit";
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
                                    <h1 class=" page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Travel Advisor Applications
                                    </h1>
<!--                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">-->
<!--                                        --><?php //echo '<h3>Number of Applications: '.$total_rows.'</h3>' ; ?>
<!--                                    </h1>-->
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





                                    <!--begin::Card body-->
                                    <div class="card-body py-4">

                                        <!--begin::Table-->

                                        <div id="kt_table_resources_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_resources">
                                                    <thead>
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-50px " style="width: 50px;">ID</th>
                                                        <th class="min-w-125px " >Date</th>
                                                        <th class="min-w-125px " >Full Name</th>
                                                        <th class="min-w-125px " >Location</th>
                                                        <th class="min-w-125px " >Preview</th>
                                                        <th class="min-w-125px " >Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-gray-600 fw-semibold">
                                                    <?php
                                                    $todaystimestamp=time();// current timestamp
                                                    while($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                        <tr>

                                                            <td>
                                                                <?php echo $row['formid'] ?>
                                                            </td>

                                                            <td style="text-align:left !important">
                                                                <?php echo date('F d, Y', $row['formtime']); ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['senderfname'].' '.$row['senderlname']; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['sendercity'].', '.$row['senderprovince'] ?>
                                                            </td>
                                                            <td>
                                                                <a href="travel-advisor-application-details.php?formid=<?php echo $row['formid']; ?>" class="btn btn-primary" style="width:100%" title="Preview">Preview</a>
                                                            </td>
                                                            <td>
                                                                <a href="ch-agents/travel-advisor-application-delete.php?formid=<?php echo $row['formid']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a>
                                                            </td>

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
                                                        <ul class="pagination">
                                                            <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                                                                <li class="paginate_button page-item <?= ($current_page == $page_number) ? 'active' : '' ?>">
                                                                    <a class="page-link" href="?page=<?= $page_number ?>"><?= $page_number ?></a>
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