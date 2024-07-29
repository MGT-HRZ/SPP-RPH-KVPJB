<?php

    require_once '../../config.php';

    if (isset($_POST['send'])) {
        
        $idpensyarah = $_POST['idpensyarah'];
        $idpenyemak = $_POST['idpenyemak'];
        $link_rph = 'TIADA';
        $tahun = $_POST['tahun'];
        $sesi = $_POST['sesi'];
        $minggu = $_POST['minggu'];
        $tarikh_sebenar = $_POST['tarikh_sebenar'];
        $status = 'TIDAK HANTAR';
        $comment = $_POST['comment'];

        //  Insert all data to the database
        $sql_dns = "INSERT INTO rph (
            id_pensyarah,
            id_penyemak,
            link_rph,
            sesi,
            tahun,
            minggu,
            tarikh_hantar,
            masa_hantar,
            status,
            comment
        ) 
        
        VALUES (
            '$idpensyarah',
            '$idpenyemak',
            '$link_rph',
            '$sesi',
            '$tahun',
            '$minggu',
            '$tarikh_sebenar',
            CURRENT_TIME(),
            '$status',
            '$comment'
        );";

        try {

            $result_dns = mysqli_query($connect, $sql_dns);

            if ($result_dns) {
                header('Location: ../../dashboard.php?NOTSEND-SUCCESS');
            }

            else {
                header('Location: ../../dashboard.php?NOTSEND-FAIL');
            }

        } 

        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../../dashboard.php?NOTSEND-FAIL');
            }

        }
    }