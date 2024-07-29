<?php

    require_once '../../config.php';

    if (isset($_POST['update'])) {
        $id_pensyarah = $_POST['id_pensyarah'];
        $select_manage_dep = $_POST['select_manage_dep'];
        $select_manage_prog = $_POST['select_manage_prog'];

        $sql_upt_dep_prog= "UPDATE pensyarah SET
            kod_jabatan = '$select_manage_dep',
            kod_program = '$select_manage_prog'
            WHERE id_pensyarah = '$id_pensyarah'
        ;";

        $result_upt_dep_prog = mysqli_query($connect, $sql_upt_dep_prog);

        if ($result_upt_dep_prog) {
            header('Location: ../../dashboard.php');
        }
    }

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['update-dep'])) {
        $kod_jabatan = $_POST['kod_jabatan'];
        $select_list_dep = $_POST['select_list_dep'];

        $sql_upt_list_dep = "UPDATE jabatan SET
            ketua_jabatan = '$select_list_dep'
            WHERE kod_jabatan = '$kod_jabatan'
        ;";

        $result_upt_list_dep = mysqli_query($connect, $sql_upt_list_dep);

        if ($result_upt_list_dep) {
            header('Location: ../../dashboard.php');
        }
    }

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['update-prog'])) {
        $kod_program = $_POST['kod_program'];
        $select_list_prog = $_POST['select_list_prog'];

        $sql_upt_list_prog = "UPDATE program SET
            id_pensyarah = '$select_list_prog'
            WHERE kod_program = '$kod_program'
        ;";

        $result_upt_list_prog = mysqli_query($connect, $sql_upt_list_prog);

        if ($result_upt_list_prog) {
            header('Location: ../../dashboard.php');
        }
    }

?>