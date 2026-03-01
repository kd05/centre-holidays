<style>
    .load-more-items-inside-ch {
        display: none;
    }

    .load-more-items-suppliers {
        display: none;
    }
</style>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$basename = strtolower(basename($actual_link));

session_start();  #start a session  

$inchsearch = trim(str_replace(array('\'', '"', ',', ';', '<', '>', '!', '&', '@', '|', '/'), ' ',  $_GET['inchsearch']));
$pieces = explode(" ", $inchsearch);

if (isset($_GET['inchFilter'])) {
    $tinchFilter = $_GET['inchFilter'];
    for ($ii = 0; $ii <= 20; $ii++) {
        ${'cooooooo' . $ii} = $tinchFilter[$ii];
        $values6 = ${'cooooooo' . $ii} . $values6;
        $tinchFilters = str_replace($values6, "", $tinchFilters);
        if (!empty($tinchFilter[$ii])) {
            $counter6 = $counter6 + 1;
            $tinchFilterpag = '&inchFilter%5B%5D=' . ${'cooooooo' . $ii} . $tinchFilterpag; //------------value for pagination url------------
            $tinchFilters16 = " OR inchTitle LIKE '%" . ${'cooooooo' . $ii} . "%' OR inchFilter LIKE '%" . ${'cooooooo' . $ii} . "%'" . $tinchFilters16; //-------------------values for database-----------------
            $tinchFilters26 = " inchTitle LIKE '%" . ${'cooooooo' . $ii} . "%' OR inchFilter LIKE '%" . ${'cooooooo' . $ii} . "%'";
        }
    }

    if ($counter6 < 2)
        $tinchFilters = $tinchFilters26;
    else
        $tinchFilters = preg_replace('/OR/', '', $tinchFilters16, 1);
}


$currenttime = time();

include($_SERVER['DOCUMENT_ROOT'] . '/library/open_dbi_epik.php');

$currentTime = time();
$sql = "SELECT * FROM resource WHERE inchActive=1";

// Exclude expired records if inchEXPTime is not empty and less than current time
$sql .= " AND (inchEXPTime = '' OR inchEXPTime IS NULL OR inchEXPTime > $currentTime) ";

if (!empty($_GET['inchFilter']))
    $sql .= " AND ($tinchFilters) ";
elseif (!empty($pagename))
    $sql .= " AND (inchFilter LIKE '%$pagename%') ";

if (!empty($inchsearch))
    $sql .= " AND (inchTags LIKE '%$inchsearch%' || inchTitle LIKE '%$inchsearch%' || inchFilter LIKE '%$inchsearch%' || inchDescription LIKE '%$inchsearch%')";
//$sql .= " AND (inchTitle LIKE '%$pieces[0]%' || inchContent LIKE '%$pieces[0]%' || inchTitle LIKE '%$pieces[1]%' || inchContent LIKE '%$pieces[1]%' || inchTitle LIKE '%$inchsearch%' || inchContent LIKE '%$inchsearch%' || inchFilter LIKE '%$inchsearch%' || inchTitle LIKE '%$inchsearch%')";

$sql .= " ORDER BY inchTime DESC";

$result = mysqli_query($conn, $sql);
$offerscount = mysqli_num_rows($result);

?>
<div class="row mb-20">
    <!--begin::Item-->
    <?php



    if (mysqli_num_rows($result) > 0) {

        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $numbers = $numbers + 1;
    ?>
            <!--begin::Item-->
            <div class="col-xl-4 col-md-6 mb-10 load-more-items-suppliers">
                <!--begin::Tiles Widget 15-->
                <div class="card card-custom card-border card-stretch">

                    <!--begin::Body-->
                    <div class="card-body p-0 d-flex flex-column">

                        <?php
                        //====================set up background based on horizontal image=================

                        $horizontal_image = trim($row['inchHorizontalImage']);
                        $horizontal_image_path = !empty($horizontal_image) ?

                            'https://centreholidays.com/img/agents/resources/' . $horizontal_image :
                            '/img/agents/module-bg-warning.jpg';

                        ?>
                        <img class="img-responsive card-rounded-top" src="<?php echo $horizontal_image_path; ?>">

                        <div class="row">
                            <div class="col-xl-12 d-flex flex-center mt-n6">
                                <span class="label label-xl font-weight-boldest label-inline label-white px-5 py-3 text-uppercase font-weight-bolder text-danger">
                                    <?php echo date('m/d/Y', $row['inchTime']); ?>
                                </span>
                            </div>
                        </div>

                        <?php

                        //====================set up target based on exernal url============================

                        if (!empty($_GET['inchFilter']))
                            $link = trim(str_replace(array('/agents/resources.php?'), '&',  $_SERVER['REQUEST_URI']));


                        if (!empty($row['inchExternalURL'])) {
                            $target = '_blank';
                            $tarlink = $row['inchExternalURL'];
                        }

//                        if (empty($row['inchExternalURL'])) {
//                           $target = '_parent';
//                           $tarlink = 'https://centreholidays.com/agents/resource-details.php?inchID=' . $row['inchID'] . $link;
//                        }

                        ?>

                        <div class="flex-grow-1 card-spacer mt-n5">
                            <div>
                                <!--begin::Title-->
                                <h2 class="font-weight-boldest text-uppercase text-dark"><?php echo $row['inchTitle']; ?></h2>
                                <p class="lead"><?php echo $row['inchMetaDescription']; ?></p>
                                <!--end::Title-->
                            </div>
                        </div>

                        <!--begin::Action-->
                        <?php if (empty($row['inchLearnMore'])) { ?>

                            <?php if (!empty($row['inchExternalURL'])) { ?>
                            <div class="d-flex flex-center card-spacer mt-n5">
                                <a href="<?php echo $tarlink ?>" target="_blank"
                                    class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase w-100">Go</a>
                            </div>
                            <?php } ?>

                        <?php } else { ?>
                            <div class="d-flex flex-center card-spacer mt-n5">

                                <?php if (!empty($row['inchExternalURL'])) { ?>
                                <a href="<?php echo $tarlink ?>" target="_blank"
                                    class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-2 w-50">Go</a>
                                <?php } ?>

                                <a href="javascript:void(0);"
                                    data-toggle="modal" data-target="#learn-more-modal-<?php echo $row['inchID']; ?>"
                                    class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase mr-2 w-50">Learn More</a>
                            </div>


                            <!--begin::Modal-->
                            <div class="modal fade" id="learn-more-modal-<?php echo $row['inchID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content border border-4">
                                        <div class="modal-header bg-light">
                                            <h2 class="font-weight-boldest text-uppercase mb-0 text-dark"><?php echo $row['inchTitle']; ?></h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body lead text-dark pb-3">
                                            <?php echo $row['inchLearnMore']; ?>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->



                        <?php } ?>
                        <!--end::Action-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 15-->
            </div>
            <!--end::Item-->
        <?php
        }
    }

    if ($numbers > 6 && $basename != 'home.php') {
        ?>
        <div class="col-xl-12 d-flex flex-center">
            <button type="button" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" id="load-more-button-suppliers" title="See More Suppliers"><span><i class="fas fa-angle-double-down"></i></span>See More Resources</button>
        </div>
    <?php
    }

    if ($basename == 'home.php') { ?>

        <div class="col-xl-12 d-flex flex-center">
            <a href="/agents/resources.php" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mb-10 mt-5" title="Go"><span><i class="fas fa-angle-double-right"></i></span>More Resources</a>
        </div>

    <?php }  ?>


</div>

<?php
mysqli_close($conn);

?>