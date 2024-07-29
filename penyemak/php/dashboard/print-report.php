<?php 

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 3;
    $page_dir = "Print Report";

    //  Connects with php/logout/to_logout.php
    $num_of_dir_logout = 2;
    
    require_once '../config.php';
    require_once '../imports.php';
    require_once '../import-cdn.php';
    require_once '../images.php';
    require_once '../date/date.php';
    require_once '../date/count-num-week.php';
    require_once '../date/yearDropdown.php';
    require_once '../func/list_week.php';
    require_once '../logout/logout.php';
    require_once '../logout/logout-verify.php';


    //  Check if either 'id_roles', 'id_pensyarah', 'kod_jabatan', or 'kod_program' is set in the session
    if (isset($_SESSION['id_roles']) 
        || isset($_SESSION['id_pensyarah'])
        || isset($_SESSION['kod_jabatan'])
        || isset($_SESSION['kod_program'])
    ) {
        //  Assign values to variables $id_roles, $id_pensyarah, $kod_jabatan, and $kod_program from session
        $id_roles = $_SESSION['id_roles'];
        $id_pensyarah = $_SESSION['id_pensyarah'];
        $kod_jabatan = $_SESSION['kod_jabatan'];
        $kod_program = $_SESSION['kod_program'];
    } 

    //  Save the values of $id_roles, $id_pensyarah, $kod_jabatan, and $kod_program back to the session
    $_SESSION['id_roles'] = $id_roles;
    $_SESSION['id_pensyarah'] = $id_pensyarah;
    $_SESSION['kod_jabatan'] = $kod_jabatan;
    $_SESSION['kod_program'] = $kod_program;


    $sql = "SELECT * 
            FROM pensyarah
            WHERE id_pensyarah = '$id_pensyarah';
        ";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php conn_css($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_bootstrap($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_other_css1($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_other_css2($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_fontawesome_css($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_btm_nav_css($num_of_dir); ?>">
    <?php importCDN_css(); importCDN_font(); importCDN_headerICON(); importCDN_js(); ?>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?php icon_site($num_of_dir, $page_dir); ?>" type="image/x-icon">
    <title><?php echo $page_dir.$title; ?></title>
</head>
    <body id="page-top">

    <!-- <div id="adjt-navbar">
        <?php //require_once '../header.php'; ?>
    </div> -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php //include_once 'topbar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="mt-5 text-center">
                    <style>
                        #spp-rph-ico {
                            width: 150px;

                            /* Cannot drag image */
                            -webkit-user-drag: none;
                            -khtml-user-drag: none;
                            -moz-user-drag: none;
                            user-select: none;
                        }
                    </style>

                    <img src="https://meimluonline.github.io/images.meimlu.github.io/icon/e-RPH%20Traker%20Logo.png" id="spp-rph-ico" alt="icon">
                </div>

                <!-- Page Heading 0 -->
                <h1 class="h2 mt-5 mb-5 text-center text-gray-800">
                    <p><?= $row['nama_pensyarah'] ?>'s</p>
                    <p>SPP-RPH Report </p>
                    <p>
                        <a href="#" class="btn btn-sm btn-primary rounded-pill shadow-sm" onclick="window.print()"><i
                        class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
                    </p>
                </h1>

                <h1 class="h5 mb-5">
                    <p>Report Generate On :</p>
                    <?php echo $date_typ3;?>
                </h1>
                
                <!-- Page Heading 1 -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <?php include_once 'top-main-content.php'; ?>

                </div>
                <!-- Content Row -->

                <?php if ($id_roles == 1 || $id_roles == 2) { ?>
                    <!-- Page Heading 2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Active Cases</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row" id="active-cases">

                        <?php require_once 'case/box-case.php'; ?>  

                        <!-- 1. New Case -->
                        <div class="col-xl-4 col-lg-5">
                            <?php include_once 'case/1.new-case.php'; ?>
                        </div>
                        <!-- 1. New Case -->

                        <!-- 2. Ongoing Case -->
                        <div class="col-xl-4 col-lg-5">
                            <?php include_once 'case/2.ongoing-case.php'; ?>
                        </div>
                        <!-- 2. Ongoing Case -->

                        <!-- 3. Done Case -->
                        <div class="col-xl-4 col-lg-5">
                            <?php include_once 'case/3.done-case.php'; ?>
                        </div>
                        <!-- 3. Done Case -->

                    </div>
                <?php } ?>

                <div class="row" id="lecturers-delivery-status">

                    <!-- Page Heading 3 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lecturer's Delivery Status</h1>
                    </div>

                    <!-- Lecturer e-RPH Delivery Status -->
                    <div class="col-xl-12 col-lg-13">
                        <?php include_once 'list-delivery-status/list_delry_status.php'; ?>
                    </div>
                    <!-- Lecturer e-RPH Delivery Status -->

                    <!-- Box -->
                    <!-- Box -->

                </div>

                <div class="row">

                    <!-- Box 3 -->
                    <div class="col-lg-8 mb-4">
                        <?php include_once 'box3.php'; ?>
                    </div>
                    <!-- Box 3 -->

                    <!-- Box 2 -->
                    <div class="col-xl-4 col-lg-5">
                        <?php include_once 'box2.php'; ?>
                    </div>
                    <!-- Box 2 -->

                    <!-- Box -->
                    <!-- Box -->

                </div>


                <?php if ($id_roles == 1 || $id_roles == 2) { ?>
                    <!-- Page Heading 4 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Overall Delivery Status</h1>
                    </div>

                    <div class="row" id="overall-delivery-status">

                        <div class="col-xl-12 col-lg-13">
                            <?php include_once 'list-delivery-status/overall_delry_status.php'; ?>
                        </div>

                        <!-- Box -->
                        <!-- Box -->

                    </div>

                    <div class="row">

                        <!-- Box 3 -->
                        <div class="col-lg-8 mb-4">
                            <?php include_once 'box3-overall.php'; ?>
                        </div>
                        <!-- Box 3 -->

                        <!-- Box 2 -->
                        <div class="col-xl-4 col-lg-5">
                            <?php include_once 'box2-overall.php'; ?>
                        </div>
                        <!-- Box 2 -->

                        <!-- Box -->
                        <!-- Box -->

                    </div>
                <?php } ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded-circle" id="btn-to-top" href="#">
    <i class="fas fa-angle-up"></i>
</a>

</body>
    <!-- Connects links to the dashboard page -->
    <script src="../../js/to_dashboard.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/extra/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../vendor/all-js/chart.js/Chart.min.js"></script>
    <?php importCDN_chart_js(); importCDN_js(); ?>

    <script src="../../js/filter/filter-in-tbl-count-overall-dash.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/extra/charts/chart-area.js"></script>
    <script src="../../js/extra/charts/chart-pie.js"></script>
    <script src="https://meimluonline.github.io/meimlu-cdn-chart-js/chart-pie.js"></script>
    <script src="../../js/extra/charts/chart-pie-overall.js"></script>
    <script src="https://meimluonline.github.io/meimlu-cdn-chart-js/chart-pie-overall.js"></script>

</html>