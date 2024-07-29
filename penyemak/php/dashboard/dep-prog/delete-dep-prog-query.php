<?php

    require_once '../../config.php';

    if (isset($_POST['deldep'])) {

        $id_jabatan = $_POST['idjabatan'];

        $sql_del_dep = "DELETE 
            FROM jabatan WHERE kod_jabatan = '$id_jabatan'
        ;";

        $result_del_dep = mysqli_query($connect, $sql_del_dep);

        if ($result_del_dep) {
            header('Location: ../../dashboard.php?DELETED');
        }

        else {
            header('Location: ../../dashboard.php?FAIL');
        }

    }

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['delprog'])) {

        $kod_program = $_POST['kodprogram'];

        $sql_del_prog = "DELETE 
            FROM program WHERE kod_program = '$kod_program'
        ;";

        $result_del_prog = mysqli_query($connect, $sql_del_prog);

        if ($result_del_prog) {
            header('Location: ../../dashboard.php?DELETED');
        }

        else {
            header('Location: ../../dashboard.php?FAIL');
        }

    }

?>
