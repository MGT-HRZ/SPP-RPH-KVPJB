<?php

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 4;
    $page_dir = "Update Default Password";

    //  Connects with php/logout/to_logout.php
    $num_of_dir_logout = 3;
    
    require_once '../../config.php';
    require_once '../../imports.php';
    require_once '../../import-cdn.php';
    require_once '../../images.php';
    require_once '../../logout/logout.php';
    require_once '../../logout/logout-verify.php';

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
<body>

    <div id="adjt-navbar">
        <?php require_once '../../header.php'; ?>
    </div>

    <div class="pop-ups">
        <?php 
            //  If their is any pop ups important or needed
            require_once '../../pop-ups/pop-ups.php'; 
        ?>
    </div>

    <div class="place1">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-4" id="update_def_pass_card">
                    <div class="card-header text-center" id="update_def_pass_card_head">
                        <b>Update Default Password</b>
                    </div>
                    <div class="card-body">
                        <form action="update-pass.php" method="post" class="needs-validation" novalidate>

                            <?php
                                /**
                                 * - If input is enter incorrectly
                                 * - Gets the "FAIL!" from log.php file
                                 */

                                //  If their is any pop ups important or needed
                                require_once '../../pop-ups/pop-ups.php';
                            ?>

                            <?php

                                if (isset($_SESSION['id_pensyarah'])) {
                                    $id_pensyarah = $_SESSION['id_pensyarah'];
                                } 

                                $_SESSION['id_pensyarah'] = $id_pensyarah;

                                $sql = "SELECT id_pensyarah, nama_pensyarah FROM pensyarah
                                    WHERE id_pensyarah = '$id_pensyarah';
                                ";

                                $result = mysqli_query($connect, $sql);

                                $row = mysqli_num_rows($result);

                                $row = mysqli_fetch_assoc($result);

                            ?>

                            <div class="form-group form-floating mb-3">
                                <input type="text" name="username" class="form-control bg-white rounded-pill" id="floatingInput" value="<?= $row['nama_pensyarah'] ?>" disabled>
                                <input type="text" class="d-none" name="id_pensyarah" value="<?= $row['id_pensyarah'] ?>">
                                <label>Reviewer's Name</label>
                            </div>

                            <div class="form-group form-floating mb-3">
                                <input type="text" name="password" class="form-control rounded-pill" id="floatingInput validationPassword" placeholder="New Password" required>
                                <label for="floatingInput validationPassword">New Password</label>
                                <div class="valid-feedback">Looks Good !</div>
                                <div class="invalid-feedback">Please insert your new password !</div>
                            </div>

                            <br>

                            <div class="d-grid mx-auto">
                                <button type="submit" name="update-pass" class="btn btn-primary btn-block rounded-pill"><b>Update</b></button>
                                <button type="reset" name="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../../footer.php'; ?>
    
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
    
</html>