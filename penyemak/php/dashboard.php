<?php 

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 2;
    $page_dir = "Dashboard";

    //  Connects with php/logout/to_logout.php
    $num_of_dir_logout = 1;
    
    require_once 'config.php';
    require_once 'imports.php';
    require_once 'import-cdn.php';
    require_once 'images.php';
    require_once 'date/date.php';
    require_once 'date/count-num-week.php';
    require_once 'date/yearDropdown.php';
    require_once 'func/list_week.php';
    require_once 'func/warn_sub_count.php';
    require_once 'logout/logout.php';
    require_once 'logout/logout-verify.php';


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
    <?php importCDN_css(); importCDN_font(); importCDN_headerICON(); ?>
    <link rel="shortcut icon" href="<?php icon_site($num_of_dir, $page_dir); ?>" type="image/x-icon">
    <title><?php echo $page_dir.$title; ?></title>
</head>
<body onload="AutoReloadOut(<?php echo $num_of_dir; ?>, 2)">

    <div id="adjt-navbar">
        <?php require_once 'header.php'; ?>
    </div>

    <div class="welcome-log">
        <?php 
            //  Welcome pop up
            require_once 'login/welcome-log.php'; 
        ?>
    </div>

    <div id="main-panel">
        <?php require_once 'dashboard/main-panel.php'; ?>
    </div>

    <?php include_once 'footer.php'; ?>
    
</body>
    <!-- Connects links to the main page -->
    <script src="../js/to_main.js"></script>
    <!-- Connects links to the about us page -->
    <script src="../js/to_about us.js"></script>
    <!-- Connects links to the dashboard page -->
    <script src="../js/to_dashboard.js"></script>
    <!-- Connects links to the lecturer's profile page -->
    <script src="../js/to_lec-pro.js"></script>
    <!-- Connects links to the feedback page -->
    <script src="../js/to_feedback.js"></script>

    <!-- Connects links to the about dropdown function -->
    <script src="../js/about-dropdown.js"></script>

    <!-- Adjust button scroll for top margin -->
    <script src="../js/scroll-space.js"></script>

    <!-- Adjust button scroll to the top -->
    <script src="../js/scroll-to-top.js"></script>

    <?php

        if ($id_roles == 2 || $id_roles == 3 || $id_roles == 4) {
            echo '<script src="../js/security/auto-reload-out.js"></script>';
        }

    ?>
</html>