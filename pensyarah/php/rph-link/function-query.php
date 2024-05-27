<?php

    $sql_link_rph = "SELECT penyemak.pensyarah, t1.nama_pensyarah AS nama_pensyarah, penyemak.penyemak, t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE penyemak.pensyarah = '$id_pensyarah';
    ";

    $result_link_rph = mysqli_query($connect, $sql_link_rph);

    $row_link_rph = mysqli_num_rows($result_link_rph);

    $row_link_rph = mysqli_fetch_assoc($result_link_rph);

?>