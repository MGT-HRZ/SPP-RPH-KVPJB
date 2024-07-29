<?php

    require_once '../../config.php';

    if (isset($_POST['add-new-dep'])) {
        $add_dep_code = strtoupper($_POST['adddepcode']);
        $add_dep_name = strtoupper($_POST['adddepname']);
        $set_head_dep = $_POST['setheaddep'];

        try {
            // Prepare the SQL statement
            $sql_add_new_dep = "INSERT INTO jabatan (kod_jabatan, nama_jabatan, ketua_jabatan) VALUES (?, ?, ?)";

            // Prepare the statement
            $stmt = mysqli_prepare($connect, $sql_add_new_dep);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $add_dep_code, $add_dep_name, $set_head_dep);

            // Execute the statement
            $result_add_new_dep = mysqli_stmt_execute($stmt);

            if ($result_add_new_dep) {
                header('Location: ../../dashboard.php?ADDED');
            } else {
                header('Location: ../../dashboard.php?FAIL');
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } catch (mysqli_sql_exception $e) {
            // Check if the error code is for duplicate entry
            if ($e->getCode() == 1062) {
                // Handle the duplicate key error
                header('Location: ../../dashboard.php?DUPLICATE-KEY');
            } else {
                // Handle other errors
                header('Location: ../../dashboard.php?ERROR');
            }
        }
    }

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['add-new-prog'])) {
        $set_dep_code = $_POST['setdepcode'];
        $add_prog_code = strtoupper($_POST['addprogcode']);
        $add_prog_name = strtoupper($_POST['addprogname']);
        $set_head_prog = $_POST['setheadprog'];

        try {
            // Prepare the SQL statement
            $sql_add_new_prog = "INSERT INTO program (kod_jabatan, kod_program, nama_program, id_pensyarah) VALUES (?, ?, ?, ?)";

            // Prepare the statement
            $stmt = mysqli_prepare($connect, $sql_add_new_prog);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssss", $set_dep_code, $add_prog_code, $add_prog_name, $set_head_prog);

            // Execute the statement
            $result_add_new_prog = mysqli_stmt_execute($stmt);

            if ($result_add_new_prog) {
                header('Location: ../../dashboard.php?ADDED');
            } else {
                header('Location: ../../dashboard.php?FAIL');
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } catch (mysqli_sql_exception $e) {
            // Check if the error code is for duplicate entry
            if ($e->getCode() == 1062) {
                // Handle the duplicate key error
                header('Location: ../../dashboard.php?DUPLICATE-KEY');
            } else {
                // Handle other errors
                header('Location: ../../dashboard.php?ERROR');
            }
        }
    }

?>
