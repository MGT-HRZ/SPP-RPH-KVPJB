<?php 

    //  Start the session
    session_start();

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 3;
    $page_dir = "Feedback";

    //  Connects with php/logout/to_logout.php
    $num_of_dir_logout = 2;

    require_once '../config.php';
    require_once '../imports.php';
    require_once '../import-cdn.php';
    require_once '../images.php';
    require_once '../date/yearDropdown.php';
    require_once '../func/list_week.php';
    require_once '../logout/logout.php';
    require_once '../logout/logout-verify.php';

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
<body onload="AutoReloadOut(<?php echo $num_of_dir; ?>, 2)" style="background-color: #cfdeef;">

    <div id="adjt-navbar">
        <?php 
            
            if (isset($_SESSION)) {
                if (isLoggedIn()) {
                    // Check if 'id_pensyarah' & 'id_roles' is set in the session
                    if (isset($_SESSION['id_roles']) || isset($_SESSION['id_pensyarah'])) {
                        // Assign values to variable $id_pensyarah & $id_roles from session
                        $id_roles = $_SESSION['id_roles'];
                        $id_pensyarah = $_SESSION['id_pensyarah'];
                    } 

                    // Save the values of $id_pensyarah & $id_roles back to the session
                    $_SESSION['id_pensyarah'] = $id_pensyarah;
                    $_SESSION['id_roles'] = $id_roles;

                    require_once '../header.php'; 
                }

                else {
                    echo "<link rel='stylesheet' href='../../css/style-log.css?v=".time()."'>";

                    require_once '../header-log.php'; 
                }  
            }
  
        ?>
    </div>

    <div class="pop-ups">
        <?php 
            //  If their is any pop ups important or needed
            require_once '../pop-ups/pop-ups.php'; 
        ?>
    </div>

    <div>
        <?php 

            if (isset($_SESSION)) {
                if (isLoggedIn()) {
                    // Check if 'id_pensyarah' is set in the session
                    if (isset($_SESSION['id_pensyarah'])) {
                        // Assign values to variable $id_pensyarah from session
                        $id_pensyarah = $_SESSION['id_pensyarah'];
                    } 

                    // Save the values of $id_pensyarah back to the session
                    $_SESSION['id_pensyarah'] = $id_pensyarah;

                    //  Requirement for bottom navbar
                    require_once '../dashboard/rph-link/form-rph-link-svm.php'; 
                    require_once '../dashboard/rph-link/form-rph-link-dvm.php'; 
                    require_once '../dashboard/lecturer/notsend-lecturer.php'; 
                }
            }
      
        ?>
    </div>
    
    <div class="place2">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="card-title text-dark" id="sec_card_title">
                <label>Feedback Form</label>
            </h2>
            <div class="card" id="feedback_form">
                <div class="card-body">
                <form action="send-feedback.php" method="post">
                <fieldset>
                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Name</label>
                        <input type="text" id="textInput" name="name" class="form-control rounded-pill" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">No. IC</label>
                        <input type="number" id="textInput" name="noic" class="form-control rounded-pill" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Your Feedback</label>
                        <textarea rows="10" id="textInput" name="feedback" class="form-control" style="border-radius: 20px;" placeholder="State your feedbacks here..." required></textarea>
                    </div>

                    <div class="d-grid mx-auto">
                        <br>
                        <button type="submit" name="send-feedback" class="btn btn-success btn-block rounded-pill"><b>Submit</b></button>
                        <button type="reset" name="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                    </div>
                </fieldset>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <?php 
            
        if (isset($_SESSION)) {
            if (isLoggedIn()) {
                require_once '../footer.php'; 
            }//?v=<?php echo time();

            else {
                echo "<link rel='stylesheet' href='../../css/style-log.css?v=".time()."'>";

                require_once '../footer-log.php'; 
            }  
        }

    ?>

</body>
    <!-- Connects links to the main page -->
    <script src="../../js/to_main.js"></script>
    <!-- Connects links to the login page -->
    <script src="../../js/to_login.js"></script>
    <!-- Connects links to the about us page -->
    <script src="../../js/to_about us.js"></script>
    <!-- Connects links to the dashboard page -->
    <script src="../../js/to_dashboard.js"></script>
    <!-- Connects links to the lecturer's profile page -->
    <script src="../../js/to_lec-pro.js"></script>
    <!-- Connects links to the feedback page -->
    <script src="../../js/to_feedback.js"></script>

    <script src="../../js/to_logout.js"></script>

    <?php 

        if (isset($_SESSION)) {
            if (isLoggedIn()) {
                if (isset($_SESSION['id_roles'])) {
                    $id_roles = $_SESSION['id_roles'];
                }

                $_SESSION['id_roles'] = $id_roles;
                
                if ($id_roles == 2 || $id_roles == 3 || $id_roles == 4) {
                    echo '<script src="../../js/security/auto-reload-out.js"></script>';
                }
            }
        }

    ?>

    <script>
        let none = "none";

        document.getElementById("show1").style.display = none;
    </script>
</html>