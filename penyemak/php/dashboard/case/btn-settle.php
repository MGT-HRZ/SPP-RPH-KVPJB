<?php

    require_once '../../config.php';

    $action = $_GET['action'];

    $sql_settle_case = "UPDATE cases SET
        uptime_post = CURRENT_TIMESTAMP(),
        post = 3
        WHERE id_case = '$action'
    ;";

    $result_settle_case = mysqli_query($connect, $sql_settle_case);

    if ($result_settle_case) {
        header('Location: ../../dashboard.php');
    }
