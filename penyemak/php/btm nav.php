<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CDN icon types https://themesbrand.com/skote/layouts/icons-boxicons.html -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div id="main-btm-nav">

    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav__btm container">

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#dashboard" class="nav__link" onclick="dashboard(<?php echo $num_of_dir; ?>)">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </li>
                        
                    <li class="nav__item">
                        <div class="dropup-center dropup">
                            <a href="#sendlink" class="nav__link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bxs-plus-circle nav__icon'></i>
                                <span class="nav__name" >Send RPH</span>
                            </a>
                            <ul class="dropdown-menu animate rounded-4" id="dropup-menu">
                                <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#sendlinksvm" aria-expanded="false">
                                    SVM e-RPH
                                </a></li>
                                <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#sendlinkdvm" aria-expanded="false">
                                    DVM e-RPH
                                </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link" data-bs-toggle="modal" data-bs-target="#notsendlecturer">
                            <i class='bx bxs-user-x nav__icon fa-xl'></i>
                            <span class="nav__name">DNS</span>
                        </a>
                    </li>
                </ul>
            </div>
                
        </nav>
    </header>
    </div>

</body>
</html>