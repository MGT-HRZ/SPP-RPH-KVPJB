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
                        <a href="#about" class="nav__link" onclick='about_us(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name" >About Us</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link" onclick="main(<?php echo $num_of_dir; ?>)">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name" >Home</span>
                        </a>
                    </li>
                </ul>
            </div>
                
        </nav>
    </header>
    </div>

</body>
</html>