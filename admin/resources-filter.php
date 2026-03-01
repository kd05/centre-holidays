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
        <title>Resources Filter | CH Admin</title>
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



                <div class="app-content  flex-column-fluid ">

                    <!--begin::Content container-->
                    <div class="app-container  container-xxl ">

                    <h3>Resource Centre Holidays Filter</h3>
                    <div class="card">

                        <!--begin::Card body-->
                        <div class="card-body py-4">


                            <form action="resource/add-filter.php" method="post" enctype="multipart/form-data" >
                                <input type="text" value="" id="inchFilter" name="inchFilter" placeholder="Add Resource CH filter" class="form-control" />

                                <br /><br />
                                <input type="submit" class="btn-primary btn-lg btn" style="width:100%" />
                                </form>
                            </div>
                        </div>

                    </div>
                </div>






                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php');//GP Added
                $conn = db_conn();


                $sql = "SELECT * FROM resourcefilter ORDER BY inchFilter ASC";
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
                                        Resources Filter
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
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_resource_filters">
                                                    
                                                    <tbody class="text-gray-600 fw-semibold">
                                                    <?php
                                                    while($row = mysqli_fetch_assoc($result)) {

                                                        $row_bg='';
                                                        $inchActive=$row['inchActive'];
                                                        if ($inchActive==0)
                                                            $row_bg='style="background:#c7c7c7 !important"';

//                                                        echo "<pre>"; print_r($row); echo "</pre>";
                                                        ?>
                                                       
                                                            	<form action="resource/set-resource.php" method="post" enctype="multipart/form-data" style="background:#FFF; text-align:center; padding:10px">
                                                                    <input type="hidden" value="<?php echo $row['inFilterid']; ?>" id="inFilterid" name="inFilterid" />
                                                                    <tr>
                                                                        <td>
                                                                            <?php
                                                                            if ($row['inFilteractive']=='1') echo $status='<strong>ACTIVE</strong>';
                                                                            else  echo $status='NOT ACTIVE';
                                                                            ?>
                                                                        </td> 

                                                                        <td>
                                                                            <input type="text" value="<?php echo $row['inchFilter']; ?>" id="inchFilter" name="inchFilter" style="width:100%; min-height:34px" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="submit" class="btn btn-warning" value="Change" style="width:100%" />  
                                                                        </td> 
                                                                        <td>
                                                                            <a href="resource/delete-filter.php?inFilterid=<?php echo $row['inFilterid']; ?>" class="btn btn-danger" style="width:100%" >Delete</a>
                                                                        </td>         

                                                                    </tr> 
                                                                </form>

                                                        <?php
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
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