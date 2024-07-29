<?php

    require_once 'back_to_login.php';

    if (!isset($_SESSION)) {
        session_start();

        /**
         * -    If the user login successfully
         */

        if ($_SESSION['user']) {
            //  echo "<script>console.log('Login Successful!');</script>";
        }

        /**
         * -    If the user did not login or just type their registry in the URL,
         *      the system will relocate them back to the login page
         * 
         * Files that relates with this statement :
         * -    dashboard.php
         */

        elseif ($end_session == "logout") {
            session_destroy();
            back_to_login($num_dir);
        }

        /**
         * -    If the user did not login or just type their registry in the URL,
         *      the system will relocate them back to the login page
         */

        else {
            session_destroy();
            back_to_login($num_dir);
        }
    }