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
    require_once 'date/yearDropdown.php';
    require_once 'func/list_week.php';
    require_once 'func/warn_sub_count.php';
    require_once 'logout/logout.php';
    require_once 'logout/logout-verify.php';

    if (isset($_SESSION['id_pensyarah'])) {
        $id_pensyarah = $_SESSION['id_pensyarah'];
    } 

    $_SESSION['id_pensyarah'] = $id_pensyarah;

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
<body onload="AutoReloadOut(<?php echo $num_of_dir; ?>, 1)" style="background-color: #cfdeef;">

    <div id="adjt-navbar">
        <?php require_once 'header.php'; ?>
    </div>

    <div class="pop-ups">
        <?php 
            //  If their is any pop ups important or needed
            require_once 'pop-ups/pop-ups.php'; 
        ?>
    </div>

    <div class="welcome-log">
        <?php 
            //  Welcome pop up
            require_once 'login/welcome-log.php'; 
        ?>
    </div>

    <ul class="mt-1 nav nav-tabs" id="myTab" role="tablist" style="background-color: #cfdeef;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="send-rph-link-svm" data-bs-toggle="tab" data-bs-target="#send-rph-link-svm-pane" type="button" role="tab" aria-controls="send-rph-link-svm-pane" aria-selected="false">SVM RPH Submission Confirmation</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="send-rph-link-dvm" data-bs-toggle="tab" data-bs-target="#send-rph-link-dvm-pane" type="button" role="tab" aria-controls="send-rph-link-dvm-pane" aria-selected="false">DIPLOMA RPH Submission Confirmation</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="warn-sub" data-bs-toggle="tab" data-bs-target="#warn-sub-pane" type="button" role="tab" aria-controls="warn-sub-pane" aria-selected="false">Warning Submissions <span class="badge badge-danger badge-counter"><?php warnsubCount($id_pensyarah) ?></span></button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="history" data-bs-toggle="tab" data-bs-target="#history-pane" type="button" role="tab" aria-controls="history-pane" aria-selected="true">History</button>
        </li>

        <!-- <li class="nav-item disable" role="presentation">
            <button class="nav-link" id="-tab" data-bs-toggle="tab" data-bs-target="#-tab-pane" type="button" role="tab" aria-controls="-tab-pane" aria-selected="false">...</button>
        </li> -->
    </ul>

    <div class="tab-content" id="myTabContent" style="background-color: #cfdeef;">
        <div class="tab-pane fade show active" id="send-rph-link-svm-pane" role="tabpanel" aria-labelledby="send-rph-link-svm" tabindex="0">
            <?php require_once 'rph-link/form-rph-link-svm.php'; ?>
        </div>

        <div class="tab-pane fade" id="send-rph-link-dvm-pane" role="tabpanel" aria-labelledby="send-rph-link-dvm" tabindex="0">
            <?php require_once 'rph-link/form-rph-link-dvm.php'; ?>
        </div>

        <div class="tab-pane fade" id="warn-sub-pane" role="tabpanel" aria-labelledby="warn-sub" tabindex="0">
            <?php require_once 'rph-link/warn-sub.php'; ?>
        </div>

        <div class="tab-pane fade" id="history-pane" role="tabpanel" aria-labelledby="history" tabindex="0">
            <?php require_once 'rph-link/submit-history.php'; ?>
        </div>

        <!-- <div class="tab-pane fade" id="-tab-pane" role="tabpanel" aria-labelledby="-tab" tabindex="0">
            <?php //require_once ''; ?>
        </div> -->
    </div>

    <?php //require_once 'rph-link/notsend-auto.php'; ?>

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

    <script src="../js/security/auto-reload-out.js"></script>

    <script>
        let none = "none";

        //  Hides other button
        document.getElementById("show1").style.display = none;
        document.getElementById("show2").style.display = none;
        document.getElementById("show4").style.display = none;
        document.getElementById("show5").style.display = none;
    </script>
</html>