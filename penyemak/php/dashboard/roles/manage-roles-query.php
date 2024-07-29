<?php

    require_once '../../config.php';

    if (isset($_POST['update'])) {
        $id_pensyarah = $_POST['id_pensyarah'];
        $select_manage_roles = $_POST['select_manage_roles'];

        $sql_upt_roles= "UPDATE pensyarah SET
            id_roles = '$select_manage_roles'
            WHERE id_pensyarah = '$id_pensyarah'
        ;";

        $result_upt_roles = mysqli_query($connect, $sql_upt_roles);

        if ($result_upt_roles) {
            header('Location: ../../dashboard.php');
        }
    }

?>