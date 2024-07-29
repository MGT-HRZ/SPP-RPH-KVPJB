<?php

    include_once '../../config.php';

    if (isset($_POST['update-comment'])) {

        $id_rph = $_POST['idrph'];
        $newcomment = $_POST['newcomment'];

        $sql_upt_comment = "UPDATE rph SET
            comment = ?
            WHERE id_rph = ?
        ;";
 
        try {

            $stmt = mysqli_prepare($connect, $sql_upt_comment);

            if ($stmt) {

                //  Bind parameters - "MUST FOLLOW THE EXACT TOTAL DATA IN THE SQL VALUES"
                mysqli_stmt_bind_param($stmt, "ss", $newcomment, $id_rph);

                //  Execute the statement
                $result = mysqli_stmt_execute($stmt);

                //  Close the statement
                mysqli_stmt_close($stmt);
            
                if ($result) {
                    header('Location: ../../dashboard.php?ADD-COMM-SUCCESS');
                }
        
                else {
                    header('Location: ../../dashboard.php?ADD-COMM-FAIL');
                }
            }

            else {
                // Handle the error more gracefully (log it or display a user-friendly message)
                echo "Error: Unable to prepare the statement.";
            }

        } 
        
        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../../dashboard.php?ADD-COMM-FAIL');
            }

        }

    }

?>