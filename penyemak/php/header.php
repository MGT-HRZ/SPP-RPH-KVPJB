<?php
    //  IMPORTANT don't remove
    require_once 'imports.php';
    require_once 'images.php';
    require_once 'logout/to_logout.php';
?>

<style>
    body, #nav-corner {
        background-color: #12102f;
    }

    .contain-nav {
        border-bottom: 3px solid #2196f3;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div class="contain-nav" id="nav-corner">
    <nav class="navbar" id="nav-corner">
    <div class="container-fluid">

        <!-- HAMBURGER NAVBAR -->

        <?php include_once 'login/hamburger.php'; ?>
          
        <!-- HAMBURGER NAVBAR -->

        <!-- <a class="navbar-brand" href="#"> -->

        <!-- <div id="logo-align">
            <div id="show1">
                <img src="<?php //nav_logo_main(1, "Main", "kvperd"); ?>" alt="Logo" class="d-inline-block align-text-top" id="kvperd">
            </div>

            <div id="show2">
                <img src="<?php //nav_logo_main(1, "Login", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" id="kvperd">
            </div>

            <div id="show3">
                <img src="<?php //nav_logo_main(2, "Dashboard", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" onclick="dashboard(<?php //echo $num_of_dir; ?>)" id="kvperd">
            </div>

            <div id="show4">
                <img src="<?php //nav_logo_main(3, "Feedback", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" onclick="dashboard(<?php //echo $num_of_dir; ?>)" id="kvperd">
            </div>

            <div id="show5">
                <img src="<?php //nav_logo_main(4, "Update Default Password", "kvperd"); ?>" alt="Logo" class="d-inline-block align-text-top" id="kvperd">
            </div>
        </div> -->

        <div id="logo-align">
            <div id="show-logo">
                <img src="https://meimluonline.github.io/images.meimlu.github.io/kv-logo/logo-kvpjb-2021%20glow.png" alt="Logo"  class="d-inline-block align-text-top" onclick="dashboard(<?php echo $num_of_dir; ?>)" id="kvperd">
            </div>
        </div>

            <label class=""></label>
        <!-- </a> -->

        

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" id="navbarScroll">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><b>SPP-RPH</b></h5>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="Nav-align-sec1">

                <div class="text-center mb-5">
                    <?php
                        $sql_name_lec = "SELECT nama_pensyarah 
                            FROM pensyarah
                            WHERE id_pensyarah = '$id_pensyarah'
                        ;";

                        $result_name_lec = mysqli_query($connect, $sql_name_lec);

                        $row_name_lec = mysqli_fetch_assoc($result_name_lec);

                        echo '<p style="text-wrap: balance;"><b>'.$row_name_lec['nama_pensyarah'].'</b></p>';
                    ?>
                </div>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <!-- If what to the scroll function add -> style="--bs-scroll-height: 100px;"> -->

                    <!-- <li class="nav-item" id="nav-home">
                        <a class="nav-link active" aria-current="page" href="#" onclick="dashboard(<?php echo $num_of_dir; ?>)"><b>Home</b></a>
                    </li>
                    
                    <li class="nav-item" id="nav-abtus">
                        <a class="nav-link active" href="#" onclick='about_us(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>About Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More...
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick='lecpro(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>Lecturer's Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick='feedback(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>Feedback</a></li>
                        </ul>
                    </li>

                    <li class="nav-item" id="nav-dashboard">
                        <a class="nav-link active" href="#" onclick="dashboard(<?php echo $num_of_dir; ?>)">Dashboard</a>
                    </li> -->

                    <li class="nav-item">
                        <form class="d-flex" role="search">
                            <a class="btn btn-success btn-block mb-3 rounded-pill" id="feedback" href="#" onclick='feedback(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>Feedback</a>
                        </form>
                    </li>

                    <li class="nav-item">
                        <form class="d-flex" role="search">

                            <?php
                                require_once 'config.php';
                                require_once 'log.php';

                                //  This function will check whether the user is logged in or not
                                
                                if (isset($_SESSION)) {
                                    if (isLoggedIn()) {

                                        //  echo "<a href='logout/logout.php?out' class='btn btn-danger' id='logout'>Logout</a>";

                                        //  Alternative way to navigate logout button 
                                        logout($num_of_dir_logout);

                                        echo "<script>document.getElementById('show1').style.display = 'none';</script>";

                                        echo "<script>document.getElementById('show2').style.display = 'none';</script>";

                                        echo "<script>document.getElementById('login').style.display = 'none';</script>";

                                    }
                                }

                            ?>

                        </form>
                    </li>
                </ul>
            </div>    

            <div id="Nav-align-sec2"></div>
        </div>
            <div>
                <!-- BOTTOM NAVBAR SECTION  -->
                <?php 

                    if (isset($_SESSION)) {
                        if (isLoggedIn()) {

                            include_once 'btm nav.php'; 
                            
                        }
                    }
                    
                ?>
            </div>
    </div>
    </nav>
</div>
</body>
    <!-- IMPORTANT don't remove  -->
    
    <!-- Connects bootstrap to all files  -->
    <script src="<?php //conn_bootstrap_js($num_of_dir) ?>"></script>
    <script src="<?php conn_jquery($num_of_dir); ?>"></script>
    <script src="<?php conn_popper_js($num_of_dir); ?>"></script>

    <?php importCDN_js() ?>
</html>