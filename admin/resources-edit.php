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
    <title>Edit Resource | CH Admin</title>
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


                if (!empty($_GET['inchTime']))
                    $inchTime=trim($_GET['inchTime']);
                else
                    $inchTime=trim($_POST['inchTime']);
                
                $sql = "SELECT * FROM resource WHERE inchTime=" . $inchTime . " LIMIT 1";

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
                                        Edit Resource
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
                                                if ($row_cnt > 0) // display results in case the feedback table is not empty
                                                {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $inchID = $row['inchID'];

                                                        
                                                ?>

                                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">

                                                            <form action="resource/update-resource.php" method="post" enctype="multipart/form-data">

                                                                <input type="hidden" id="inchTime" name="inchTime" value="<?php echo $inchTime; ?>" />
                                                                <input type="hidden" id="inchID" name="inchID" value="<?php echo $row['inchID']; ?>" />


                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td colspan="4">
                                                                        <input type="text" class="form-control" id="inchTitle" name="inchTitle" value="<?php echo $row['inchTitle']; ?>" placeholder="Title" />
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Meta Description</th>
<!--                                                                    <td colspan="4">-->
<!--                                                                        <input type="text" class="form-control" id="inchMetaDescription" name="inchMetaDescription" value="--><?php //echo $row['inchMetaDescription']; ?><!--" placeholder="Meta Description" />-->
<!--                                                                    </td>-->
                                                                    <td colspan="4">
                                                                        <textarea name="inchMetaDescription" id="inchMetaDescription" class='form-control scrollable h-150' placeholder="Meta Description"><?php echo trim($row['inchMetaDescription']); ?></textarea>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Filter</th>
                                                                    <td colspan="4">


                                                                        <div class="dropdown">
                                                                            <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
                                                                                <span class="caret"></span></button>
                                                                            <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

                                                                                <?php

                                                                                $sql3 = "SELECT * FROM resourcefilter ORDER BY inchFilter ASC";
                                                                                $result3 = mysqli_query($conn, $sql3);
                                                                                if (mysqli_num_rows($result3) > 0) {
                                                                                    // output data of each row
                                                                                    while ($row3 = mysqli_fetch_assoc($result3)) {

                                                                                        if (strpos($row['inchFilter'], $row3['inchFilter']) !== false) {
                                                                                            $stylecheck3 = 'checked';
                                                                                        } else
                                                                                            $stylecheck3 = '';

                                                                                ?>
                                                                                        <li><input style="width:auto !important" type="checkbox" <?php echo $stylecheck3 ?> name="inchFilter[]" value="<?php echo $row3['inchFilter']; ?>">&nbsp;<strong><?php echo $row3['inchFilter']; ?></strong> </li>
                                                                                <?php

                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </ul>

                                                                        </div>


                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Horizontal Image</th>
                                                                    <td colspan="4">
                                                                        <input type="text" class="form-control"  id="inchHorizontalImage" name="inchHorizontalImage" value="<?php echo $row['inchHorizontalImage']; ?>" placeholder="Horizontal Image" />
                                                                        <?php
                                                                        if (!empty($row['inchHorizontalImage'])) {
                                                                        ?>
                                                                            <br />
                                                                            <img src="https://centreholidays.com/img/agents/resources/<?php echo $row['inchHorizontalImage']; ?>" style="max-width:400px; max-height:400px;" />
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>URL</th>
                                                                    <td colspan="4">
                                                                        <textarea name="inchExternalURL" id="inchExternalURL" class='form-control scrollable h-150' 
                                                                            placeholder="URL"><?php echo $row['inchExternalURL']; ?></textarea>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Learn more</th>
                                                                    <td colspan="4">
                                                                        <textarea name="inchLearnMore" id="inchLearnMore" class='form-control scrollable h-150' placeholder="Learn more"><?php echo trim($row['inchLearnMore']); ?></textarea>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Tags</th>
                                                                    <td colspan="4">
                                                                        <textarea name="inchTags" id="inchTags" class='form-control scrollable h-150' 
                                                                        placeholder="Tags"><?php echo $row['inchTags']; ?></textarea>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Internal Notes</th>
                                                                    <td colspan="4">
                                                                        <textarea name="inchInternalNotes" id="inchInternalNotes" class='form-control scrollable h-150' 
                                                                        placeholder="Internal Notes"><?php echo trim($row['inchInternalNotes']); ?></textarea>
                                                                    </td>
                                                                </tr>





                                                                <tr>
                                                                    <th>Suppliers</th>
                                                                    <td colspan="4">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-primary dropdown-toggle" style="width:100%; padding:10px; text-align:left" type="button" data-toggle="dropdown">Select
                                                                                <span class="caret"></span></button>
                                                                            <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

                                                                                <?php
                                                                                // Fetch the stored suppliers for the specific record (assuming $row contains the record data)
                                                                                $storedInchSuppliers = isset($row['inchSuppliers']) ? $row['inchSuppliers'] : '';

                                                                                // Fetch affiliates
                                                                                $sql4 = "SELECT * FROM affiliates ORDER BY afid DESC";
                                                                                $result_suppliers = mysqli_query($conn, $sql4);

                                                                                if (mysqli_num_rows($result_suppliers) > 0) {
                                                                                    // Output data of each row
                                                                                    while ($row3 = mysqli_fetch_assoc($result_suppliers)) {
                                                                                        // Check if the current supplier's ID is stored in inchSuppliers
                                                                                        $stylecheck3 = (strpos($storedInchSuppliers, ',' . $row3['afid'] . ',') !== false) ? 'checked' : '';
                                                                                ?>
                                                                                        <li>
                                                                                            <input style="width:auto !important" type="checkbox" <?php echo $stylecheck3; ?> name="inchSuppliers[]"
                                                                                                value="<?php echo $row3['afid']; ?>">&nbsp;
                                                                                            <strong><?php echo $row3['affiliatename']; ?></strong>
                                                                                        </li>
                                                                                <?php
                                                                                    }
                                                                                }
                                                                                ?>


                                                                            </ul>

                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Expiry Date</th>
                                                                    <td colspan="4">
                                                                        <div class="input-group">
                                                                            <input type="date" name="inchEXPTime" value="<?php echo date('Y-m-d', ($row['inchEXPTime'])); ?>" class="form-control" placeholder="mm/dd/yyyy" />
                                                                            <!-- <span class="input-group-addon"><i class="icon-calender"></i></span> -->
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                

                                                                <tr>
                                                                    <th></th>

                                                                    <td><input type="submit" value="Update" class="btn btn-primary" style="width:100%" /></td>

                                                                    <?php
                                                                    if ($row['inchActive'] == 0) {
                                                                    ?>
                                                                        <td><a href="resource/activate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-success" style="width:100%" title="Activate" onclick="return confirm_delete()">Activate</a></td>
                                                                    <?php
                                                                    } elseif ($row['inchActive'] == 1) {
                                                                    ?>
                                                                        <td><a href="resource/deactivate-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-warning" style="width:100%" title="Deactivate" onclick="return confirm_delete()">Deactivate</a></td>
                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <td><a href="resource/delete-resource.php?inchID=<?php echo $row['inchID']; ?>" class="btn btn-danger" style="width:100%" title="Delete" onclick="return confirm_delete()">Delete</a></td>


                                                                </tr>

                                                            </form>


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