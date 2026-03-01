<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


if (!empty($_GET['affiliatetime']))
    $affiliatetime=trim($_GET['affiliatetime']);
else
    $affiliatetime=trim($_POST['affiliatetime']);

?>
    <!DOCTYPE html>
    <html lang="en">
    <!--begin::Head-->
    <head>
        <base href="" />
        <title>Edit Supplier | CH Admin</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, nofollow">

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/ssi/global-head-scripts.php'); ?>

        <style>
            /* Keep your existing table/form behavior, but within the new theme */
            table { width:100% !important; }
            table td { text-align:left !important; padding-left:20px; }
            table th { text-align:left !important; padding-left:20px; max-width:200px; }
            textarea { white-space:pre-wrap !important; }
            input, select { width:100%; }
        </style>
    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body id="kt_app_body"
          data-kt-app-layout="dark-sidebar"
          data-kt-app-header-fixed="true"
          data-kt-app-sidebar-enabled="true"
          data-kt-app-sidebar-fixed="true"
          data-kt-app-sidebar-hoverable="true"
          data-kt-app-sidebar-push-header="true"
          data-kt-app-sidebar-push-toolbar="true"
          data-kt-app-sidebar-push-footer="true"
          data-kt-app-toolbar-enabled="true"
          class="app-default">

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
                                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
                                        <div class="d-flex flex-column">
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
                                        <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
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
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Edit Supplier
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-xxl">

                                <!--begin::Card-->
                                <div class="card">
                                    <div class="card-body py-4">
                                        <div class="table-responsive">

                                            <?php
                                            //---------------display results in case of unpdate--------------
                                            // NOTE: Keeping your original logic block exactly as it was (even though it uses "=")
                                            if (isset($_GET['results']))
                                            {
                                                if ($_GET['results']='success')
                                                    echo "<h4>Success, changes done</h4>";
                                                elseif ($_GET['results']='error')
                                                    echo "<h4>Error, could not make changes</h4>";
                                            }

                                            $sql = "SELECT * FROM affiliates WHERE affiliatetime=".$affiliatetime." LIMIT 1";

                                            $result = mysqli_query($conn, $sql);
                                            $row_cnt = mysqli_num_rows($result);

                                            if ($row_cnt > 0)// display results in case the feedback table is not empty
                                            {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $afid=$row['afid'];
                                                    ?>

                                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                        <form action="supplier/update-affiliate.php" method="post" enctype="multipart/form-data">

                                                            <input type="hidden" id="affiliatetime" name="affiliatetime"
                                                                   value="<?php echo $affiliatetime; ?>" />
                                                            <input type="hidden" id="afid" name="afid" value="<?php echo $afid; ?>" />

                                                            <tr>
                                                                <th>Supplier Name</th>
                                                                <td colspan="4">
                                                                    <input type="text" class="form-control" id="affiliatename" name="affiliatename"
                                                                           value="<?php echo $row['affiliatename']; ?>" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Supplier Description</th>
                                                                <td colspan="4">
                                                        <textarea name="affiliatedescreption" id="affiliatedescreption"
                                                                  class="form-control scrollable h-150"><?php echo $row['affiliatedescreption']; ?></textarea>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Cover Image (Supplier Details)</th>
                                                                <td colspan="4">
                                                                    <input type="text" class="form-control" id="cafhimage" name="cafhimage"
                                                                           value="<?php echo $row['cafhimage']; ?>"/>
                                                                    <?php if (!empty($row['cafhimage'])) { ?>
                                                                        <br /><br />
                                                                        <img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['cafhimage']; ?>"
                                                                             style="max-width:300px; max-height:80px; margin-bottom:10px" />
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Horizontal Image (Supplier List)</th>
                                                                <td colspan="4">
                                                                    <input type="text" class="form-control" id="afhimage" name="afhimage"
                                                                           value="<?php echo $row['afhimage']; ?>"/>
                                                                    <?php if (!empty($row['afhimage'])) { ?>
                                                                        <br /><br />
                                                                        <img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['afhimage']; ?>"
                                                                             style="max-width:300px; max-height:80px; margin-bottom:10px" />
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Square Image (Admin List)</th>
                                                                <td colspan="4">
                                                                    <input type="text" class="form-control" id="affiliatesqimage" name="affiliatesqimage"
                                                                           value="<?php echo $row['affiliatesqimage']; ?>"/>
                                                                    <?php if (!empty($row['affiliatesqimage'])) { ?>
                                                                        <br /><br />
                                                                        <img src="<?php echo "https://centreholidays.com/img/agents/supplier-details/".$row['affiliatesqimage']; ?>"
                                                                             style="max-width:80px; height:80px; max-height:80px; margin-bottom:10px" />
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Preferred Supplier</th>
                                                                <td colspan="4">
                                                                    <select class="form-select" id="preferred" name="preferred">
                                                                        <?php
                                                                        if ($row['preferred']==1)
                                                                            $preferred='Yes';
                                                                        elseif ($row['preferred']==0)
                                                                            $preferred='No';
                                                                        ?>
                                                                        <option value="<?php echo $row['preferred']; ?>"><?php echo $preferred; ?></option>
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Important Details (HTML Code)</th>
                                                                <td colspan="4">
                                                        <textarea name="affiliatdetails" id="affiliatdetails"
                                                                  class="form-control scrollable h-150"><?php echo $row['affiliatdetails']; ?></textarea>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Filter</th>
                                                                <td colspan="4">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle"
                                                                                style="width:100%; padding:10px; text-align:left"
                                                                                type="button" data-toggle="dropdown">
                                                                            Select <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu" style="width:100%; padding:10px; z-index:9999 !important">

                                                                            <?php
                                                                            $sql3 = "SELECT * FROM affiliatefilter ORDER BY affilter ASC";
                                                                            $result3 = mysqli_query($conn, $sql3);
                                                                            if (mysqli_num_rows($result3) > 0) {
                                                                                while($row3 = mysqli_fetch_assoc($result3)) {

                                                                                    if (strpos($row['affilter'], $row3['affilter']) !== false) {
                                                                                        $stylecheck3='checked';
                                                                                    }
                                                                                    else
                                                                                        $stylecheck3='';
                                                                                    ?>
                                                                                    <li>
                                                                                        <input style="width:auto !important" type="checkbox" <?php echo $stylecheck3 ?>
                                                                                               name="affilter[]" value="<?php echo $row3['affilter']; ?>">
                                                                                        &nbsp;<strong><?php echo $row3['affilter']; ?></strong>
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
                                                                <th>TAGS</th>
                                                                <td colspan="4">
                                                        <textarea name="affiliattags" id="affiliattags"
                                                                  class="form-control scrollable h-150"><?php echo $row['affiliattags']; ?></textarea>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>INTERNAL NOTES</th>
                                                                <td colspan="4">
                                                        <textarea name="affnotes" id="affnotes"
                                                                  class="form-control scrollable h-150"
                                                                  rows="10" placeholder="Notes"><?php echo $row['affnotes'] ?></textarea>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th></th>
                                                                <td>
                                                                    <input type="submit" value="Update" class="btn btn-primary" style="width:100%"/>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    $affiliateactive=$row['affiliateactive'];
                                                                    if ($affiliateactive==1)
                                                                    {
                                                                        ?>
                                                                        <a href="supplier/deactive-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=1"
                                                                           class="btn btn-warning" title="Click her to Deactivate" style="width:100%">
                                                                            Deactivate
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    elseif ($affiliateactive==0)
                                                                    {
                                                                        ?>
                                                                        <a href="supplier/active-affiliate.php?afid=<?php echo $row['afid']; ?>&affiliatetime=<?php echo $row['affiliatetime']; ?>&page=1"
                                                                           class="btn btn-success" title="Click her to Deactivate" style="width:100%">
                                                                            Activate
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>

                                                                <td>
                                                                    <a href="supplier/delete-affiliate.php?afid=<?php echo $afid; ?>"
                                                                       class="btn btn-danger" style="width:100%"
                                                                       title="Delete" onclick="return confirm_delete()">
                                                                        Delete
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    <a href="add-modal.php?afid=<?php echo $afid; ?>&affiliatetime=<?php echo $affiliatetime ?>"
                                                                       class="btn btn-secondary" style="width:100%"
                                                                       title="Add Modal" onclick="return confirm_delete()">
                                                                        Add Modal
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        </form>
                                                    </table>

                                                    <div class="separator my-10"></div>

                                                    <?php
                                                }
                                            }

                                            //=========================MODALS======================================================

                                            $sql1 = "SELECT * FROM affiliatemodals WHERE afid='".$afid."' ORDER BY modalid DESC";

                                            $result1 = mysqli_query($conn, $sql1);
                                            $row_cnt1 = mysqli_num_rows($result1);

                                            echo '<h3>Number of modals: '.$row_cnt1.'</h3><hr />' ;

                                            if ($row_cnt1 > 0)// display results in case the feedback table is not empty
                                            {
                                                $accordionId = "accordionEx";

                                                ?>

                                                <div class="accordion" id="<?php echo $accordionId; ?>">

                                                    <?php
                                                    while($row1 = mysqli_fetch_assoc($result1)) {

                                                        $modalid=$row1['modalid'];
                                                        ?>
                                                        <div class="accordion-item mb-3">
                                                            <h2 class="accordion-header" id="heading<?php echo $row1['modalid']; ?>">
                                                                <button class="accordion-button collapsed fw-bold" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse<?php echo $row1['modalid']; ?>"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapse<?php echo $row1['modalid']; ?>">
                                                                    Modal <?php echo $row_cnt1--.' - '.$row1['modaletitle']; ?>
                                                                </button>
                                                            </h2>

                                                            <div id="collapse<?php echo $row1['modalid']; ?>"
                                                                 class="collapse"
                                                                 aria-labelledby="heading<?php echo $row1['modalid']; ?>"
                                                                 data-bs-parent="#<?php echo $accordionId; ?>">
                                                                <div class="accordion-body">

                                                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                                        <form action="supplier/update-modal.php" method="post" enctype="multipart/form-data">

                                                                            <input type="hidden" id="affiliatetime" name="affiliatetime" value="<?php echo $affiliatetime; ?>" />
                                                                            <input type="hidden" id="afid" name="afid" value="<?php echo $afid; ?>" />
                                                                            <input type="hidden" id="modalid" name="modalid" value="<?php echo $row1['modalid']; ?>" />

                                                                            <tr>
                                                                                <th>Title</th>
                                                                                <td colspan="4">
                                                                                    <input type="text" class="form-control" id="modaletitle" name="modaletitle"
                                                                                           value="<?php echo $row1['modaletitle']; ?>"  />
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Modal Description</th>
                                                                                <td colspan="4">
                                                                                    <input type="text" class="form-control" id="modaldescription" name="modaldescription"
                                                                                           value="<?php echo $row1['modaldescription']; ?>"  />
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Size</th>
                                                                                <td colspan="4">
                                                                                    <select class="form-select" id="modalsize" name="modalsize">
                                                                                        <?php if (!empty($row1['modalsize'])) { ?>
                                                                                            <?php
                                                                                            if ($row1['modalsize']=='modal-md')
                                                                                                $displayit1='Medium (Default)';
                                                                                            elseif ($row1['modalsize']=='modal-ms')
                                                                                                $displayit1='Small';
                                                                                            elseif ($row1['modalsize']=='modal-lg')
                                                                                                $displayit1='Large';
                                                                                            elseif ($row1['modalsize']=='modal-xl')
                                                                                                $displayit1='XL';
                                                                                            ?>
                                                                                            <option value="<?php echo $row1['modalsize']; ?>"><?php echo $displayit1 ?></option>
                                                                                        <?php } ?>
                                                                                        <option value="modal-md">Medium (Default)</option>
                                                                                        <option value="modal-sm">Small</option>
                                                                                        <option value="modal-lg">Large</option>
                                                                                        <option value="modal-xl">XL</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Header Colour</th>
                                                                                <td colspan="4">
                                                                                    <select class="form-select" id="modalheadercolour" name="modalheadercolour">
                                                                                        <?php if (!empty($row1['modalheadercolour'])) { ?>
                                                                                            <?php
                                                                                            if ($row1['modalheadercolour']=='bg-danger')
                                                                                                $displayit='Red (Important Details)';
                                                                                            elseif ($row1['modalheadercolour']=='bg-dark')
                                                                                                $displayit='Dark (Default)';
                                                                                            ?>
                                                                                            <option value="<?php echo $row1['modalheadercolour'] ?>"><?php echo $displayit; ?></option>
                                                                                        <?php } ?>
                                                                                        <option value="bg-dark">Dark (Default)</option>
                                                                                        <option value="bg-danger">Red (Important Details)</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Contents (HTML Code)</th>
                                                                                <td colspan="4">
                                                                            <textarea name="modalhtmlcontents" id="modalhtmlcontents"
                                                                                      class="form-control scrollable h-150"><?php echo $row1['modalhtmlcontents']; ?></textarea>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th></th>
                                                                                <td colspan="2">
                                                                                    <input type="submit" value="Update Modal" class="btn btn-primary" style="width:100%"/>
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <a href="supplier/delete-modal.php?modalid=<?php echo $modalid; ?>&affiliatetime=<?php echo $affiliatetime ?>"
                                                                                       class="btn btn-danger" style="width:100%"
                                                                                       title="Delete" onclick="return confirm_delete()">
                                                                                        Delete Modal
                                                                                    </a>
                                                                                </td>
                                                                            </tr>

                                                                        </form>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>

                                            <?php } // end modals block ?>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
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

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>