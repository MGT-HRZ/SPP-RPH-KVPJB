<?php

    require_once '../../config.php';

    $action = $_GET['action'];

    $sql_attend_case = "UPDATE cases SET
        uptime_post = CURRENT_TIMESTAMP(),
        post = 2
        WHERE id_case = '$action'
    ;";

    $result_attend_case = mysqli_query($connect, $sql_attend_case);

    if ($result_attend_case) {
        header('Location: ../../dashboard.php');
    }
