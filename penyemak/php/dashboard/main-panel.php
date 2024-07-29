<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #cfdeef;">

                <!-- Topbar -->
                <?php include_once 'topbar.php'; ?>
                <!-- End of Topbar -->

                <div class="pop-ups">
        <?php 
            //  If their is any pop ups important or needed
            require_once 'pop-ups/pop-ups.php'; 
        ?>
    </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading 1 -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-dark fw-semibold">Dashboard</h1>
                        <!-- <a href="dashboard/print-report.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary rounded-pill shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php include_once 'top-main-content.php'; ?>

                    </div>

                    <?php if ($id_roles == 1 || $id_roles == 2) { ?>
                        <!-- Page Heading 2 -->
                        <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                            <h1 class="h3 mb-0 text-dark fw-semibold">Active Cases</h1>
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
                            <h1 class="h3 mb-0 text-dark fw-semibold">Lecturer's Delivery Status</h1>
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
                            <h1 class="h3 mb-0 text-dark fw-semibold">Overall Delivery Status</h1>
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

                    <!-- Page Heading 5 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-dark fw-semibold">About</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->

                        <!-- Box 4 -->
                        <div class="col-lg-8 mb-4">
                            <?php include_once 'box4.php'; ?>
                        </div>
                        <!-- Box 4 -->

                        <!-- Box 5 -->
                        <div class="col-xl-4 col-lg-5">
                            <?php include_once 'box5.php'; ?>
                        </div>
                        <!-- Box 5 -->

                        <!-- Box 1 -->
                        <!-- <div class="col-xl-8 col-lg-7">
                            <?php //include_once 'box1.php'; ?>
                        </div> -->
                        <!-- Box 1 -->

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" id="btn-to-top" href="#" onclick="scrollToTop()">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

</body>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/all-js/jquery/jquery.min.js"></script>
    <script src="../js/extra/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/extra/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/all-js/chart.js/Chart.min.js"></script>
    <?php importCDN_chart_js(); ?>

    <!-- Page level custom scripts -->
    <script src="../js/extra/charts/chart-area.js"></script>
    <script src="../js/extra/charts/chart-pie.js"></script>
    <script src="../js/extra/charts/chart-pie-overall.js"></script>
    <script src="https://meimluonline.github.io/meimlu-cdn-chart-js/chart-pie.js"></script>
    <script src="https://meimluonline.github.io/meimlu-cdn-chart-js/chart-pie-overall.js"></script>

</html>