<?php

    require_once '../../config.php';

    if (isset($_POST['update-dep-data'])) {
        $kod_jabatan = $_POST['kodjabatan'];
        $id_jabatan = strtoupper($_POST['idjabatan']); // Convert to uppercase
        $nama_jabatan = strtoupper($_POST['namajabatan']); // Convert to uppercase

        try {
            // Prepare the SQL statement
            $sql_upt_dep = "UPDATE jabatan SET 
                kod_jabatan = ?, 
                nama_jabatan = ? 
                WHERE kod_jabatan = ?
            ;";

            // Prepare the statement
            $stmt = mysqli_prepare($connect, $sql_upt_dep);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $id_jabatan, $nama_jabatan, $kod_jabatan);

            // Execute the statement
            $result_upt_dep = mysqli_stmt_execute($stmt);

            if ($result_upt_dep) {
                header('Location: ../../dashboard.php?UPDATED');
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

    if (isset($_POST['update-prog-data'])) {
        $idnamajabatan = $_POST['idnamajabatan'];
        $kod_program = $_POST['kodprogram'];
        $id_program = strtoupper($_POST['idprogram']); // Convert to uppercase
        $nama_program = strtoupper($_POST['namaprogram']); // Convert to uppercase

        try {
            // Prepare the SQL statement
            $sql_upt_prog = "UPDATE program SET 
                kod_jabatan = ?, 
                kod_program = ?, 
                nama_program = ? 
                WHERE kod_program = ?
            ;";

            // Prepare the statement
            $stmt = mysqli_prepare($connect, $sql_upt_prog);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssss", $idnamajabatan, $id_program, $nama_program, $kod_program);

            // Execute the statement
            $result_upt_prog = mysqli_stmt_execute($stmt);

            if ($result_upt_prog) {
                header('Location: ../../dashboard.php?UPDATED');
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
