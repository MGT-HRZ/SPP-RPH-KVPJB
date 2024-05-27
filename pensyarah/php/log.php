<?php

    include_once 'config.php';

    if (isset($_POST['login'])) {

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        //  Prevent SQL Injections

        //  Remove slash from input
        $user = stripcslashes($user);
        $pass = stripcslashes($pass);

        //  Remove escape string from input
        $user = mysqli_real_escape_string($connect, $user);
        $pass = mysqli_real_escape_string($connect, $pass);

        //  Encrypt password 
        $pass = md5(md5($pass));
        
        if (!empty($_POST['user'] && $_POST['pass'])) {

            $sql = "SELECT id_pensyarah, username, pass_encrypt, id_roles FROM pensyarah WHERE username = '$user' && pass_encrypt = '$pass' && id_roles = 5;";

            $result = mysqli_query($connect, $sql);

            $total = mysqli_fetch_assoc($result);

            $id_pensyarah = $total['id_pensyarah'];

            if ($total) {
                session_start();

                $_SESSION['user'] = $_POST['user'];

                $_SESSION['id_pensyarah'] = $total['id_pensyarah'];

                //  Encrypt username for GET method
                $encrypt_user = md5(md5($user));

                /**
                 *  If password is not change and remain as default
                 *  user will be redirect to update password page
                 */ 
                
                if ($pass == md5(md5('password'))) {
                    header("Location: login/update-default-pass/update-default-pass.php?key=".$encrypt_user);
                }

                /**
                 *  If password is change, user will be redirect to the dashboard
                 */ 

                else {
                    header("Location: dashboard.php?welcome&key=".$encrypt_user);
                }

                exit();
            }

            elseif (!($total)) {
                header("Location: ../login.php?FAIL!");
            }

            else {
                header("Location: 404.php?Something-Wrong!");
            }

        }

        //  If input and password is empty 
        elseif (empty($_POST['user'] && $_POST['pass'])) {
            header("Location: ../login.php?NOT-COMPLETED");
        }
    }
