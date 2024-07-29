<?php

    require_once '../../config.php';

    if (isset($_POST['update'])) {
        $id_pensyarah = $_POST['id_pensyarah'];
        $select_reviewer = $_POST['select_reviewer'];

        //  Testing Purpose
        /* echo "ID Pensyarah: $id_pensyarah<br>";
        echo "Selected Reviewer: $select_reviewer<br>"; */

        $sql_upt_reviewer = "UPDATE penyemak SET
            penyemak = '$select_reviewer'
            WHERE pensyarah = '$id_pensyarah'
        ;";

        $result_upt_reviewer = mysqli_query($connect, $sql_upt_reviewer);

        if ($result_upt_reviewer) {
            header('Location: ../../dashboard.php?UPDATED');
        }

        else {
            header('Location: ../../dashboard.php?FAIL');
        }
    }

?>