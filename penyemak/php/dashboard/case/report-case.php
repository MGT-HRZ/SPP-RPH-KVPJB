<?php

    if ($id_roles == 1) {
            $sql_report_case = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, penyemak.penyemak
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            WHERE pensyarah.id_pensyarah <> '$id_pensyarah' AND pensyarah.id_roles <> 1
            ORDER BY pensyarah.nama_pensyarah ASC
        ;";
    }

    else {
        $sql_report_case = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, penyemak.penyemak
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            WHERE penyemak.penyemak = '$id_pensyarah' ORDER BY pensyarah.nama_pensyarah ASC
        ;";
    }

    $result_report_case = mysqli_query($connect, $sql_report_case);

    $row_report_case = mysqli_num_rows($result_report_case);

?>

<form action="dashboard/case/report-case-query.php" method="post">
    <div class="modal fade" id="reportcase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="modal-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Report Cases</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 p-4">
                    <div class="col-12">
                        <label class="form-label">Select Lecturer</label>
                        <select class="form-select rounded-pill" name="idpensyarah" required>
                            <option id="block" value="">Select Lecturer</option>
                            <?php while ($row_report_case = mysqli_fetch_assoc($result_report_case)) { ?>
                                
                                <option value="<?= $row_report_case['id_pensyarah'] ?>"><?= $row_report_case['nama_pensyarah'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Category</label>
                        <select class="form-select rounded-pill" name="category" required>
                            <option id="block" value="">Select Category</option>
                            <option value="Late Submission">Late Submission</option>
                        </select>
                    </div>
    
                </div>
                
                <div class="modal-footer">
                    <button type="submit" name="send" class="btn btn-primary btn-block rounded-pill">Send</button>
                    <button type="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>