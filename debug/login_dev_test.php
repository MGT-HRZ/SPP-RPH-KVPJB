<?php

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 1;
    $page_dir = "Login";

    require_once '../pensyarah/php/config.php';
    require_once '../pensyarah/php/date/date.php';
    require_once '../pensyarah/php/imports.php';
    require_once '../pensyarah/php/import-cdn.php';
    require_once '../pensyarah/php/logout/logout.php';
    require_once '../pensyarah/php/images.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php conn_css_log($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_bootstrap($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_fontawesome_css($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_btm_nav_css($num_of_dir); ?>">
    <?php importCDN_css(); importCDN_font(); importCDN_headerICON(); ?>
    <link rel="shortcut icon" href="<?php icon_site($num_of_dir, $page_dir); ?>" type="image/x-icon">
    <title><?php echo $page_dir.$title; ?></title>
</head>

<body onload="realtimeClockDateDay()">

    <div id="adjt-navbar">
        <?php include_once '../pensyarah/php/header-log.php'; ?>
    </div>

    <!-- Grabs date() from PHP to be use in JS -->
    <meta name="date" content="<?= htmlspecialchars($date); ?>">

    <!-- Date, Time, Day section -->
    <div class="date-time-day_slot">
        <nav class="navbar navbar-expand-md">
            <ul class="navbar-nav ms-auto space">
                <li class="nav-item">
                    <span id="date-time-day"><a id="day" class="nav-link"></a></span>
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="btn ">
                <ul class="navbar-nav ms-auto space">
                    <li class="nav-item">
                        <span id="date-time-day"><a id="clockdate" class="nav-link"></a></span>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Date, Time, Day section -->

    <!-- Mobile Date, Time, Day section -->
    <div class="date-time-day_slot-mobile">
        <center>
            <nav class="p-3">
                <span id="date-time-day"><a id="day-mobile" class="nav-link"></a></span>
                <span id="date-time-day"><a id="clockdate-mobile" class="nav-link"></a></span>
            </nav>
        </center>
    </div>
    <!-- Mobile Date, Time, Day section -->

    <center>
        <p id="login-title">SPP-RPH LECTURER</p>
    </center>

        <div class="place1">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mb-4" id="login_card">
                        <div class="card-header text-center">
                            <b>Lecturer Verification</b>
                        </div>
                        <div class="card-body">
                            <form action="../pensyarah/php/log.php" method="post" class="needs-validation" novalidate>

                                <?php
                                    /**
                                     * - If input is enter incorrectly
                                     * - Gets the "FAIL!" from log.php file
                                     */

                                    //  If their is any pop ups important or needed
                                    require_once '../pensyarah/php/pop-ups/pop-ups.php';
                                ?>

                                <div class="form-group form-floating mb-3">
                                    <input type="number" name="user" class="form-control" id="floatingInput validationCustomUsername" placeholder="Username" required>
                                    <label for="floatingInput validationCustomUsername">No. IC</label>
                                    <div class="valid-feedback">Looks Good !</div>
                                    <div class="invalid-feedback">Please insert your username !</div>
                                </div>

                                <div class="form-group mb-3" id="pass-field">
                                    <div class="row">
                                        <div class="form-floating col">
                                            <input type="password" name="pass" class="form-control" id="password" placeholder="Password" required>
                                            <label id="pass-label" for="floatingPassword validationCustom01">Password</label>
                                            <div class="valid-feedback">Looks Good !</div>
                                            <div class="invalid-feedback">Please insert your password !</div>
                                        </div>
                                        <div class="col-auto">
                                            <span onclick="password_show_hide()">
                                                <i class="fa-solid fa-eye-slash btn btn-secondary" id="show-eye"></i>
                                                <i class="fa-solid fa-eye d-none btn btn-secondary" id="hide-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showPasswordCheckbox">
                                <label class="form-check-label" for="showPasswordCheckbox">
                                    Show password
                                </label>
                            </div> -->

                                <br>

                                <div class="d-grid mx-auto">
                                    <button type="submit" name="login" class="btn btn-primary btn-block"><b>Enter</b></button>
                                    <button type="reset" name="reset" class="btn btn-danger btn-block">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Feedback Form</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <a class="btn btn-success mb-4" href="#" onclick='feedback(<?php echo $num_of_dir; ?>, "<?php echo $page_dir; ?>")'>CLICK !</a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
    </div>
    <!-- Grid container -->

    <?php include_once '../pensyarah/php/footer.php'; ?>

</body>
    <!-- Connects links to the main page -->
    <script src="../pensyarah/js/to_main.js"></script>
    <!-- Connects links to the about us page -->
    <script src="../pensyarah/js/to_about us.js"></script>
    <!-- Connects links to the dashboard page -->
    <script src="../pensyarah/js/to_dashboard.js"></script>
    <!-- Connects links to the lecturer's profile page -->
    <script src="../pensyarah/js/to_lec-pro.js"></script>
    <!-- Connects links to the feedback page -->
    <script src="../pensyarah/js/to_feedback.js"></script>
    <!-- Connects links to the route menu page -->
    <script src="../pensyarah/js/to_route-menu.js"></script>

    <!-- Connects links to js peak password -->
    <script src="../pensyarah/js/security/log-pass-peak.js"></script>
    <script src="../pensyarah/js/security/log-validation.js"></script>
    <script>
        let none = "none";

        document.getElementById("show2").style.display = none;
        document.getElementById("show3").style.display = none;
        document.getElementById("show4").style.display = none;
        document.getElementById("show5").style.display = none;
        document.getElementById("login").style.display = none;
    </script>

    <script src="../pensyarah/js/clock-date-day.js"></script>

</html>