<?php 
    //  Detect user login
    function isLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    if (isset($_GET['out'])) {
        session_start();
        unset($_SESSION['user']);

        header("Location: ../../../index.php?logout");
    }

    