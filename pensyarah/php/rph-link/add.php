<?php 

    //  Will send an email to reciever that the data has successfully recorded in the database
    require_once '../send-email/add-data/send-email.php';

?>

<?php

    require_once '../config.php';

    if (isset($_POST['add'])) {

        //  Gets the values from text field
        //  id_rph is auto_increment in database

        $id_pensyarah = $_POST['id_pensyarah'];
        $id_penyemak  = $_POST['id_penyemak'];
        $link_rph = $_POST['link_rph'];
        $sesi = $_POST['sesi'];
        $tahun = $_POST['tahun'];
        $minggu = $_POST['minggu'];
        $status = "HANTAR";

        //  Insert all data to the database
        $sql = "INSERT INTO rph (
            id_pensyarah,
            id_penyemak,
            link_rph,
            sesi,
            tahun,
            minggu,
            tarikh_hantar,
            masa_hantar,
            status
        ) 
        
        VALUES (
            '$id_pensyarah',
            '$id_penyemak',
            '$link_rph',
            '$sesi',
            '$tahun',
            '$minggu',
            CURRENT_DATE(),
            CURRENT_TIME(),
            '$status'
        );";
 
        try {

            $result = mysqli_query($connect, $sql);

            if ($result) {
                header('Location: ../dashboard.php?ADD-SUCCESS');
            }
    
            else {
                header('Location: ../dashboard.php?ADD-FAIL');
            }

        } 
        
        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../dashboard.php?ADD-FAIL');
            }

        }

    }

?>