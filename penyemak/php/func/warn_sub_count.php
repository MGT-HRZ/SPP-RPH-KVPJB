<?php 

    require_once 'config.php';

    function warnsubCount($id_pensyarah) {
        global $connect;

        $sql_warn_sub = "SELECT COUNT(status) AS 'total_warning'
            FROM rph
            WHERE id_pensyarah = '$id_pensyarah' AND status = 'TIDAK HANTAR';";

        $result_warn_sub = mysqli_query($connect, $sql_warn_sub);

        $row_warn_sub = mysqli_fetch_assoc($result_warn_sub);

        echo $row_warn_sub['total_warning'];
    }

?>