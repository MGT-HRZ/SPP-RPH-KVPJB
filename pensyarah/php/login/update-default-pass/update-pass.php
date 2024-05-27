<?php

    include_once '../../config.php';

    if (isset($_POST['update-pass'])) {
        if (!empty($_POST['password'])) {
        
            $id_pensyarah = $_POST['id_pensyarah'];
            $up_pass = $_POST['password'];

            //  Prevent SQL Injections

            //  Remove slash from input
            $up_pass = stripcslashes($up_pass);

            //  Remove escape string from input
            $up_pass = mysqli_real_escape_string($connect, $up_pass);

            //  Encrypt password 
            $up_encrypt_pass = md5(md5($up_pass));

            $sql = "UPDATE pensyarah 
                    SET password = '$up_pass', pass_encrypt = '$up_encrypt_pass'
                    WHERE id_pensyarah = '$id_pensyarah';
            ";

            $result = mysqli_query($connect, $sql);

            if ($result) {
                header('Location: ../../dashboard.php?welcome&UPDATE-SUCCESS');
            }

            else {
                header('Location: update-default-pass.php?UPDATE-FAIL');
            }

        }

        //  If password is empty 
        elseif (empty($_POST['password'])) {
            header("Location: update-default-pass.php?NOT-COMPLETED");
        }
    }

