<?php

    require_once '../../config.php';

    $action = $_GET['action'];

    $sql_close_case = "UPDATE cases SET
        uptime_post = CURRENT_TIMESTAMP(),
        post = 4
        WHERE id_case = '$action'
    ;";

    $result_close_case = mysqli_query($connect, $sql_close_case);

    if ($result_close_case) {
        header('Location: ../../dashboard.php');
    }
