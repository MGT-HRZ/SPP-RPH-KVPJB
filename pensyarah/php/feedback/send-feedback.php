<?php

    require_once '../config.php';

    if (isset($_POST['send-feedback'])) {

        //  Gets the values from text field
        $name = $_POST['name'];
        $noic = $_POST['noic'];
        $feedback = $_POST['feedback'];

        //  Insert all data to the database
        $sql = "INSERT INTO feedback (
            user_name,
            user_noic,
            user_feedback
        ) 
        
        VALUES ( 
            ?, ?, ?
        );";
 
        try {

            $stmt = mysqli_prepare($connect, $sql);

            if ($stmt) {

                //  Bind parameters - "MUST FOLLOW THE EXACT TOTAL DATA IN THE SQL VALUES"
                mysqli_stmt_bind_param($stmt, "sss", $name, $noic, $feedback);

                //  Execute the statement
                $result = mysqli_stmt_execute($stmt);

                //  Close the statement
                mysqli_stmt_close($stmt);
            
                if ($result) {
                    header('Location: ./feedback.php?FEEDBACK-SUCCESS');
                }
        
                else {
                    header('Location: ./feedback.php?FEEDBACK-FAIL');
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
                header('Location: ./feedback.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ./feedback.php?ADD-FAIL');
            }

        }

    }