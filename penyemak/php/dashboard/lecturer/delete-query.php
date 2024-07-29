<?php

    require_once '../../config.php';

    if (isset($_POST['dellec'])) {

        $id_pensyarah = $_POST['id_pensyarah'];

        $sql_del_fr_lec = "DELETE 
            FROM pensyarah WHERE id_pensyarah = '$id_pensyarah'
        ;";

        $result_del_fr_lec = mysqli_query($connect, $sql_del_fr_lec);

        if ($result_del_fr_lec) {
            header('Location: ../../dashboard.php?DEL-LEC-SUCCESS');
        }

        else {
            header('Location: ../../dashboard.php?DEL-LEC-FAIL');
        }

    }

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['dellec'])) {

        $id_pensyarah = $_POST['id_pensyarah'];

        $sql_del_fr_rev = "DELETE 
            FROM penyemak WHERE pensyarah = '$id_pensyarah'
        ;";

        $result_del_fr_rev = mysqli_query($connect, $sql_del_fr_rev);

        if ($result_del_fr_rev) {
            header('Location: ../../dashboard.php?DEL-LEC-SUCCESS');
        }

        else {
            header('Location: ../../dashboard.php?DEL-LEC-FAIL');
        }

    }

?>