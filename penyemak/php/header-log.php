<?php
    //  IMPORTANT don't remove
    require_once 'imports.php';
    require_once 'images.php';
    require_once 'logout/to_logout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <nav class="navbar" id="nav-corner" style="background-color: #12102f;">
    <div class="container-fluid">

        <!-- <a class="navbar-brand" href="#"> -->

        <!-- <div id="logo-align">
            <div id="show1">
                <img src="<?php //nav_logo_main(1, "Main", "kvperd"); ?>" alt="Logo" class="d-inline-block align-text-top" id="kvperd-log">
            </div>

            <div id="show2">
                <img src="<?php //nav_logo_main(1, "Login", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" id="kvperd-log">
            </div>

            <div id="show3">
                <img src="<?php //nav_logo_main(2, "Dashboard", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" onclick="dashboard(<?php //echo $num_of_dir; ?>)" id="kvperd-log">
            </div>

            <div id="show4">
                <img src="<?php //nav_logo_main(3, "Feedback", "kvperd"); ?>" alt="Logo"  class="d-inline-block align-text-top" onclick="logo_main(3)" id="kvperd-log">
            </div>
        </div> -->

        <div id="logo-align">
            <div id="show1">
                <img src="https://meimluonline.github.io/images.meimlu.github.io/kv-logo/logo-kvpjb-2021%20glow.png" alt="Logo" class="d-inline-block align-text-top" onclick="route_menu(<?php echo $num_of_dir; ?>)" id="kvperd-log">
            </div>

            <div id="show2">
                <img src="https://meimluonline.github.io/images.meimlu.github.io/kv-logo/logo-kvpjb-2021%20glow.png" alt="Logo"  class="d-inline-block align-text-top" onclick="dashboard(<?php echo $num_of_dir; ?>)" id="kvperd-log">
            </div>
        </div>

            <label class=""></label>
        <!-- </a> -->

    </div>
    </nav>
</body>
    <!-- IMPORTANT don't remove  -->
    
    <!-- Connects bootstrap to all files  -->
    <script src="<?php conn_bootstrap_js($num_of_dir) ?>"></script>
    <script src="<?php conn_jquery($num_of_dir); ?>"></script>
    <script src="<?php conn_popper_js($num_of_dir); ?>"></script>

    <?php importCDN_js() ?>
</html>