<?php ob_start(); ?>
<?php
include 'geoplugin.class/index.php';
//----------------------------Connect to database-------------------------

include($_SERVER['DOCUMENT_ROOT'] . '/library/open_dbi_ch_new.php'); // NEW CH DATABASE SAME NAMING===========



?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>View Travel Advisor Application | CH Admin</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-head-scripts.php'); ?>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-header.php'); ?>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-sidebar.php'); ?>
                <!--end::Sidebar-->





                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php'); //GP Added
                $conn = db_conn();


                $formid=trim($_GET['formid']);
                $sql = "SELECT * FROM forms WHERE formtype='home-based-travel-agent-canada' AND formid=".$formid." LIMIT 1";

                $result = mysqli_query($conn, $sql);
                $row_cnt = mysqli_num_rows($result);


                ?>

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">


                        <?php
                        //---------------display results in case of unpdate--------------
                        if (isset($_GET['results'])) {
                            if ($_GET['results'] == 'success') {
                        ?>
                                <div class="app-container container-xxl ">
                                    <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                                        <div class="d-flex flex-column">
                                            <h4 class="mb-1 text-success">Success</h4>
                                        </div>
                                    </div>
                                </div>
                            <?
                            } elseif ($_GET['results'] == 'error') {
                            ?>
                                <div class="app-container container-xxl ">
                                    <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                                        <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                                        <div class="d-flex flex-column">
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
                                        Travel Advisor Application Details
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


                                    <!--begin::Card body-->
                                    <div class="card-body py-4">

                                        <!--begin::Table-->

                                        <div id="kt_table_resource_filters_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">



                                                <?php
                                                if ($row_cnt > 0)// display results in case the feedback table is not empty
                                                {

                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $formtime=$row['formtime'];
                                                        ?>

                                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">

                                                            <tr>
                                                                <th>Application Date</th>
                                                                <td colspan="4">
                                                                    <?php echo date('F d, Y',$row['formtime']); ?>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <th>Title and Full Name</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['sendertitle'].' '.$row['senderfname'].' '.$row['senderlname']; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Phone</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['senderphone']; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Email</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['senderemail']; ?>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <th>Location (City and Province)</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['sendercity'].', '.$row['senderprovince'].', '.$row['sendercountry']; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Plan</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['plan']; ?>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <th>TICO Certified</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['sendertico']; ?>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <th>Message</th>
                                                                <td colspan="4">
                                                                    <textarea readonly name="sendermessage" id="sendermessage" class='form-control scrollable h-150'
                                                                              placeholder="Message"><?php echo $row['sendermessage']; ?></textarea>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Referred By</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['senderreferd']; ?>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <th>Centre Holidays Travel Agent's Full Name</th>
                                                                <td colspan="4">
                                                                    <?php echo $row['chagent']; ?>
                                                                </td>
                                                            </tr>


                                                        </table>


                                                        <?php
                                                    }
                                                }
                                                ?>




                                            </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-footer.php'); ?>
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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-scrolltop.php'); ?>
    <!--end::Scrolltop-->


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-footer-scripts.php'); ?>
</body>
<!--end::Body-->




</html>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/library/closebi.php'); ?>
<? ob_flush(); ?>