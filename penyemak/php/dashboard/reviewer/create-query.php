<?php

    require_once '../../config.php';

    if (isset($_POST['create'])) {
        $idpensyarah = $_POST['idpensyarah'];
        $idpenyemak = $_POST['idpenyemak'];

        $sql_create_assign = "INSERT INTO penyemak
            (pensyarah, penyemak)
            VALUES ('$idpensyarah', '$idpenyemak')
        ;";

        try {

            $result_create_assign = mysqli_query($connect, $sql_create_assign);

            if ($result_create_assign) {
                header('Location: ../../dashboard.php?UPDATED');
            }

            else {
                header('Location: ../../dashboard.php?FAIL');
            }

        } 
        
        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../../dashboard.php');
            }

        }

    }

?>