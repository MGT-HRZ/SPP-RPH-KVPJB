<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #12102f;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="https://meimluonline.github.io/images.meimlu.github.io/icon/e-RPH%20Traker%20Logo.png" width="50" alt="icon">
        </div>
        <div class="sidebar-brand-text mx-3">SPP-RPH</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" onclick="dashboard(<?php echo $num_of_dir; ?>)">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-white">
        Activities
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSendlink" aria-expanded="true" aria-controls="collapseSendlink">
            <i class="fa-solid fa-paper-plane"></i>
            <span>Send RPH Link</span>
        </a>
        <div id="collapseSendlink" class="collapse" aria-labelledby="headingSendlink" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded-4">
                <h6 class="collapse-header">Types of RPH:</h6>

                <?php if ($id_roles == 2 || $id_roles == 3 || $id_roles == 4) { ?>

                <?php require_once 'func/offdays_timer.php'; ?>

                <?php

                    $offdays_output1 = '<a class="collapse-item bg-warning text-dark text-wrap fw-semibold" href="#">Sorry! This Part is Now Offline. The system will be back starting on SUNDAY (8:00 AM)</a>';

                    $offdays_output2 = '<a class="collapse-item bg-warning text-dark text-wrap fw-semibold" href="#">Sorry! This Part is Now Offline. The system will be back at 8:00 AM.</a>';

                    //  Check if the current day is in the list of offline days and the current time is within the scheduled offline period
                    if (in_array($currentDay, $offlineDays) && ($currentTime >= $offlineStartTime)) {
                        //  Put your code to make the system offline here

                        echo $offdays_output1;
                    } elseif (in_array($currentDay, $onlineDays) && ($currentTime >= $onlineStartTime)) {
                        //  System is online.
                    ?>

                        <!-- Main Function -->
                        <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#sendlinksvm" aria-expanded="false">
                            SVM e-RPH
                        </a>
                        <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#sendlinkdvm" aria-expanded="false">
                            Diploma e-RPH
                        </a>

                <?php

                    } elseif (in_array($currentDay, $onlineDays) && ($currentTime < $onlineStartTime)) {
                        echo $offdays_output2;
                    } else {
                        echo $offdays_output1;
                    }

                ?>

                <?php } ?>

                <?php if ($id_roles == 1) { ?>

                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#sendlinksvm" aria-expanded="false">
                            SVM e-RPH
                    </a>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#sendlinkdvm" aria-expanded="false">
                        Diploma e-RPH
                    </a>

                <?php } ?>

            </div>
        </div>

        <?php if ($id_roles == 1 || $id_roles == 2) { ?>
            <a class="nav-link collapsed" href="#active-cases">
                <i class="fa-solid fa-file-circle-exclamation"></i>
                <span>Active Cases</span>
            </a>
        <?php } ?>

        <a class="nav-link collapsed" href="#lecturers-delivery-status">
            <i class="fa-solid fa-square-poll-vertical"></i>
            <span>Lecturer's Status</span>
        </a>

        <?php if ($id_roles == 1 || $id_roles == 2) { ?>
            <a class="nav-link collapsed" href="#overall-delivery-status">
                <i class="fa-solid fa-square-poll-vertical"></i>
                <span>Overall Status</span>
            </a>
        <?php } ?>

        <div>

            <!-- Includes rph link form for SVM -->
            <?php include_once 'rph-link/form-rph-link-svm.php'; ?>

            <!-- Includes rph link form for DVM -->
            <?php include_once 'rph-link/form-rph-link-dvm.php'; ?>

        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-white">
        Tools
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded-4">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <?php if ($id_roles == 1 || $id_roles == 2 || $id_roles == 3) { ?>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#addlecturer" aria-expanded="false">
                        Add New Lecturer
                    </a>
                <?php } ?>

                <?php if ($id_roles == 1) { ?>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#editlecturer" aria-expanded="false">
                        Edit Lecturer Profile
                    </a>
                <?php } ?>

                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#assignreviewer" aria-expanded="false">
                    Assign Reviewer
                </a>

                <?php if ($id_roles == 1) { ?>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#manageroles" aria-expanded="false">
                        Manage Roles
                    </a>
                <?php } ?>

                <?php if ($id_roles == 1) { ?>
                    <a class="collapse-item text-wrap" href="#" data-bs-toggle="modal" data-bs-target="#managedepprog" aria-expanded="false">
                        Manage Departments & Programs
                    </a>
                <?php } ?>

                <?php if ($id_roles == 1) { ?>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#managedep" aria-expanded="false">
                        Edit Departments
                    </a>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#manageprog" aria-expanded="false">
                        Edit Programs
                    </a>
                <?php } ?>

                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#notsendlecturer" aria-expanded="false">
                    Set DNS Lecturer
                </a>
                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#reportcase" aria-expanded="false">
                    Report Cases
                </a>
                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#listlecturer" aria-expanded="false">
                    All Lecturer's Data
                </a>
            </div>
        </div>

        <div>

            <?php

            //  Add new lecturer form
            include_once 'lecturer/add-lecturer.php';

            //  Edit lecturer profile
            include_once 'lecturer/edit-lecturer.php';

            //  Assign a reviewer to a lecturer
            include_once 'reviewer/assign-reviewer.php';

            //  Manages everyone roles in the system
            include_once 'roles/manage-roles.php';

            //  Manages everyone department & program in the system
            include_once 'dep-prog/manage-dep-prog.php';

            //  Manages department in the system
            include_once 'dep-prog/manage-dep.php';

            //  Manages program in the system
            include_once 'dep-prog/manage-prog.php';

            //  Set not send lecturer's
            include_once 'lecturer/notsend-lecturer.php';

            //  Add a new case
            include_once 'case/report-case.php';

            //  Display list of lecturer's
            include_once 'lecturer/list-lecturer.php';

            ?>

        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-box-archive"></i>
            <span>Archives</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded-4">
                <h6 class="collapse-header">Archive Moduls:</h6>
                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#archiverph" aria-expanded="false">
                    Archive e-RPH
                </a>

                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#archivewarnsub" aria-expanded="false">
                    <span class="text-wrap">Archive Warning Submissions</span>
                </a>

                <?php if ($id_roles == 1 || $id_roles == 2) { ?>
                    <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#archivecase" aria-expanded="false">
                        Archive Cases List
                    </a>
                <?php } ?>
            </div>
        </div>

        <div>

            <?php

            //  List archive submit history
            include_once 'list-delivery-status/submit-history.php';
            //  List archive warning submissions
            include_once 'list-delivery-status/warn-sub.php';
            //  List archive case
            include_once 'case/list-archive-case.php';

            ?>

        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <center>
        <li class="nav-item">
            <a class="nav-link collapsed btn btn-primary btn-block rounded-5" target="_blank" style="width: 80%;" href="dashboard/print-report.php">
                <i class="fas fa-download fa-sm text-white-50"></i>
                <span>Generate Report</span>
            </a>
        </li>
    </center>

    <hr class="sidebar-divider">

    <!-- Heading 
    <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu 
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts 
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables 
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider 
    <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message 
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>
    -->
</ul>