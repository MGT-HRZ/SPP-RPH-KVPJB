<?php

    require_once '../../config.php';

    if (isset($_POST['send'])) {
        
        $idpensyarah = $_POST['idpensyarah'];
        $category = $_POST['category'];
        $post = 1;

        //  Insert all data to the database
        $sql_report = "INSERT INTO cases (
            id_pensyarah,
            kategori,
            tarikh_kes,
            uptime_post,
            post
        ) 
        
        VALUES (
            '$idpensyarah',
            '$category',
            CURRENT_DATE(),
            CURRENT_TIMESTAMP(),
            '$post'
        );";

        try {

            $result_report = mysqli_query($connect, $sql_report);

            if ($result_report) {
                header('Location: ../../dashboard.php?REPORTCASE-SUCCESS');
            }

            else {
                header('Location: ../../dashboard.php?REPORTCASE-FAIL');
            }

        } 

        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../../dashboard.php?REPORTCASE-FAIL');
            }

        }
    }