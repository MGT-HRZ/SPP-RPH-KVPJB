<?php

    include_once '../../config.php';

    $numid_filter = 1;

    $filter1 = $_POST['input_filter1'];
    $id_pensyarah = $_POST['input_id_pensyarah'];
    $filter_dropdown1 = $_POST['dropdown_filter1'];
    $filter_status = $_POST['status_filter'];
    $filter_date = $_POST['date_filter'];
    $filter_year = $_POST['year_filter'];

    $sql_filter = "SELECT pensyarah.nama_pensyarah, rph.id_rph, rph.link_rph, 
        rph.minggu, rph.tarikh_hantar, rph.status, rph.comment
        FROM penyemak 
        INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
        INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
        WHERE penyemak.penyemak = ?
        AND pensyarah.nama_pensyarah LIKE ?
        AND rph.minggu LIKE ?
        AND rph.status LIKE ?
        AND rph.tarikh_hantar LIKE ?
        AND rph.tahun LIKE ?
        ORDER BY rph.tarikh_hantar DESC, rph.masa_hantar DESC
    ;";

    $filter1 = '%' . $filter1 . '%';
    
    if ($filter_dropdown1) {
        $filter_dropdown1 = $filter_dropdown1;
    }

    else {
        $filter_dropdown1 = '%' . $filter_dropdown1 . '%';
    }

    if ($filter_status == 'HANTAR') {
        $filter_status = 'HANTAR';
    }

    elseif ($filter_status == 'TIDAK HANTAR') {
        $filter_status = 'TIDAK HANTAR';
    }

    else {
        $filter_status = '%' . $filter_status . '%';
    }

    $filter_date = '%' . $filter_date . '%';
    $filter_year = '%' . $filter_year . '%';

    $stmt = mysqli_prepare($connect, $sql_filter);

    mysqli_stmt_bind_param($stmt, "isssss", $id_pensyarah, $filter1, $filter_dropdown1, $filter_status, $filter_date, $filter_year);

    mysqli_stmt_execute($stmt);

    $result_filter = mysqli_stmt_get_result($stmt);

    $row_filter = mysqli_num_rows($result_filter);

    while ($row_filter = mysqli_fetch_assoc($result_filter)) {

        $row_filter_date = date_format(date_create($row_filter['tarikh_hantar']), "d/m/Y");

        if ($row_filter > 0) {
            if ($row_filter['status'] == 'HANTAR') {
                $output_status = '
                    <td class="align-middle text-center" id=""><span class="text-success"><i class="fa-solid fa-circle-check fa-2xl"></i></span></td>
                ';
            }
    
            else {
                $output_status = '
                    <td class="align-middle text-center" id=""><span class="text-danger"><i class="fa-solid fa-circle-xmark fa-fade fa-2xl"></i></span></td>
                ';
            }

            if ($row_filter['link_rph'] == 'TIADA') {
                $output_link_rph = '
                    <td class="align-middle text-center" id=""><button class="btn btn-danger rounded-pill pl-5 pr-5">DIDN\'T SEND</button></td>
                ';
            }

            else {
                $output_link_rph = '
                    <td class="align-middle text-center" id=""><a class="btn btn-primary rounded-pill pl-5 pr-5" target="_blank" href="'.$row_filter['link_rph'].'">View</a></td>
                ';
            }
                    
            /* if ($row_filter['comment'] == null) {
                $output_comment = '
                    <td class="align-middle text-center" id=""></td>
                ';
            }

            else {
                $output_comment = '
                    <td class="align-middle text-center" data-bs-toggle="modal" data-bs-target="#dnscomment'.$row_filter['id_rph'].'" id=""><button class="btn btn-info btn-block rounded-pill pl-5 pr-5"><i class="fa-regular fa-clipboard fa-xl" ></i></button></td>

                    <div class="modal fade" id="dnscomment'.$row_filter['id_rph'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-4">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">DNS Comment</h1>
                                    <button type="button" class="btn-close rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row g-3 p-4">
                                    <div class="col-md-12">
                                        <label class="form-label text-dark">Lecturer\'s Name</label>
                                        <input type="text" class="form-control rounded-pill" value="'.$row_filter['nama_pensyarah'].'" disabled>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label text-dark">Week</label>
                                        <input type="text" class="form-control rounded-pill" value="'.$row_filter['minggu'].'" disabled>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label text-dark">Send Date</label>
                                        <input type="text" class="form-control rounded-pill" value="'.$row_filter_date.'" disabled>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Your Comment</label>
                                        <textarea rows="3" name="comment" class="form-control text-dark" style="border-radius: 20px;" placeholder="'.$row_filter['comment'].'" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            } */

            $output_comment = '
                <td class="align-middle text-center" data-bs-toggle="modal" data-bs-target="#dnscomment'.$row_filter['id_rph'].'" id=""><button class="btn btn-info btn-block rounded-pill pl-5 pr-5"><i class="fa-regular fa-clipboard fa-xl" ></i></button></td>

                <div class="modal fade" id="dnscomment'.$row_filter['id_rph'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content rounded-4">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">DNS Comment</h1>
                                <button type="button" class="btn-close rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body row g-3 p-4">
                                <div class="col-md-12">
                                    <label class="form-label text-dark">Lecturer\'s Name</label>
                                    <input type="text" class="form-control rounded-pill" value="'.$row_filter['nama_pensyarah'].'" disabled>
                                </div>

                                <div class="col-6">
                                    <label class="form-label text-dark">Week</label>
                                    <input type="text" class="form-control rounded-pill" value="'.$row_filter['minggu'].'" disabled>
                                </div>

                                <div class="col-6">
                                    <label class="form-label text-dark">Send Date</label>
                                    <input type="text" class="form-control rounded-pill" value="'.$row_filter_date.'" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Your Comment</label>
                                    <textarea rows="3" name="comment" class="form-control text-dark" style="border-radius: 20px;" placeholder="'.$row_filter['comment'].'" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
   
            $output = '
                <tr>
                    <th class="align-middle" id="row-content" scope="row">'.$numid_filter++.'</th>
                    <td class="align-middle" id="">'.$row_filter['nama_pensyarah'].'</td>
                    '.$output_link_rph.'
                    <td class="align-middle text-center" id="">'.$row_filter['minggu'].'</td>
                    <td class="align-middle text-center" id="">'.$row_filter_date.'</td>
                    '.$output_comment.'
                    '.$output_status.'
                </tr>
            ';

            echo $output;
        }

        else {
            echo '<h5 class="text-danger text-center mt-3">No Data Found</h5>';
        }
        

    }