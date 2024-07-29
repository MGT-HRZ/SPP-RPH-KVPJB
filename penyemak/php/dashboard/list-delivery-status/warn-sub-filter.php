<?php

    include_once '../../config.php';

    $numid_filter = 1;

    $warn_sub_date = $_POST['warn_sub_date'];
    $warn_idpensyarah = $_POST['warn_idpensyarah'];

    $sql_filter = "SELECT tarikh_hantar, link_rph, tahun, minggu, status, comment
        FROM rph
        WHERE id_pensyarah = ? AND status = 'TIDAK HANTAR'
        AND tarikh_hantar LIKE ?
        ORDER BY tarikh_hantar DESC
    ;";

    $warn_sub_date = '%' . $warn_sub_date . '%';

    $stmt = mysqli_prepare($connect, $sql_filter);

    mysqli_stmt_bind_param($stmt, "ss", $warn_idpensyarah, $warn_sub_date);

    mysqli_stmt_execute($stmt);

    $result_filter = mysqli_stmt_get_result($stmt);

    $row_filter = mysqli_num_rows($result_filter);

    while ($row = mysqli_fetch_assoc($result_filter)) {

        $row_filter_date = date_format(date_create($row['tarikh_hantar']), "d/m/Y");

        if ($row_filter > 0) {
            if ($row['status'] == 'HANTAR') {
                $output_status = '
                    <td class="align-middle text-center" id=""><span class="text-success"><i class="fa-solid fa-circle-check fa-2xl"></i></span></td>
                ';
            } else {
                $output_status = '
                    <td class="align-middle text-center" id=""><span class="text-danger"><i class="fa-solid fa-circle-xmark fa-fade fa-2xl"></i></span></td>
                ';
            }

            if ($row['link_rph'] == 'TIADA') {
                $output_link_rph = '
                    <td class="align-middle text-center" id=""><a href="#" class="btn btn-danger rounded-pill pl-5 pr-5">DIDN\'T SEND</a></td>
                ';
            } else {
                $output_link_rph = '
                    <td class="align-middle text-center" id=""><a class="btn btn-primary rounded-pill pl-5 pr-5" target="_blank" href="' . $row['link_rph'] . '">View</a></td>
                ';
            }

            $output = '
                <tr>
                    <th class="align-middle" id="row-content" scope="row">' . $numid_filter++ . '</th>
                    <td class="align-middle text-center" id="">' . $row_filter_date . '</td>
                    ' . $output_link_rph . '
                    <td class="align-middle text-center" id="">' . $row['tahun'] . '</td>
                    <td class="align-middle text-center" id="">' . $row['minggu'] . '</td>
                    ' . $output_status . '
                    <td class="align-middle text-center" id="">' . $row['comment'] . '</td>
                </tr>
            ';

            echo $output;
        } else {
            echo '<h5 class="text-danger text-center mt-3">No Data Found</h5>';
        }
    }

?>