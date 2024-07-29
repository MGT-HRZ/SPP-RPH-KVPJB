<?php

    require_once '../../config.php';

    $action = $_GET['action'];

    $sql_delete_case = "DELETE FROM cases
        WHERE id_case = '$action'
    ;";

    $result_delete_case = mysqli_query($connect, $sql_delete_case);

    if ($result_delete_case) {
        header('Location: ../../dashboard.php');
    }
