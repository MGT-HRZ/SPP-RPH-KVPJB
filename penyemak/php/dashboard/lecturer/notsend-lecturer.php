<?php

    if ($num_of_dir == 3) {
        $url_0 = '../dashboard/lecturer/';
        
        $url_dns = $url_0.'notsend-query.php';

    }

    else {
        $url_0 = 'dashboard/lecturer/';
        
        $url_dns = $url_0.'notsend-query.php';

    }

    if ($id_roles == 1) {

        $sql_notsend = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, penyemak.penyemak
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            WHERE pensyarah.id_pensyarah <> '$id_pensyarah' AND pensyarah.id_roles <> 1
            ORDER BY pensyarah.nama_pensyarah ASC
        ;";

    }

    else {

        $sql_notsend = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, penyemak.penyemak
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            WHERE penyemak.penyemak = '$id_pensyarah'
            ORDER BY pensyarah.nama_pensyarah ASC
        ;";

    }

    $result_notsend = mysqli_query($connect, $sql_notsend);

    $row_notsend = mysqli_num_rows($result_notsend);

    $lecturer_data = [];

    while ($row_notsend = mysqli_fetch_assoc($result_notsend)) {
        $lecturer_data[] = $row_notsend;
    }

?>

<form action="<?php echo $url_dns ?>" method="post">
    <div class="modal fade" id="notsendlecturer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="modal-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Set DNS Lecturer (Did Not Send)</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 p-4">
                    <div class="col-12">
                        <label class="form-label">Select Lecturer</label>
                        <select class="form-select rounded-pill" name="idpensyarah" required>
                            <option id="block" value="">Select Lecturer</option>
                            <?php foreach ($lecturer_data as $row_notsend) { ?>
                                
                                <option value="<?= $row_notsend['id_pensyarah'] ?>"><?= $row_notsend['nama_pensyarah'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <?php 
                    
                    if ($id_roles == 1) {
                        echo '<div class="col-12">
                            <label class="form-label">Select Reviewer</label>
                            <select class="form-select rounded-pill" name="idpenyemak" required>
                                <option id="block" value="">Select Reviewer</option>';

                                foreach ($lecturer_data as $row_notsend) {
                                    echo '<option value="'.$row_notsend['id_pensyarah'].'">'. $row_notsend['nama_pensyarah'].'</option>';
                                }

                        echo ' </select>
                        </div>';
                    } 

                    elseif ($id_roles == 2 || $id_roles == 3 || $id_roles == 4) {
                        echo '<div class="col-md-6 d-none">
                            <input type="text" class=" d-none" name="idpenyemak" value="'.$id_pensyarah.'" id="">
                        </div>';
                    }

                    ?>

                    <div class="col-6">
                        <label class="form-label">Year</label>
                        <select class="form-control text-dark rounded-pill" name="tahun" id="year" required>
                            <option value="" disabled selected>Select Year</option>
                            <!-- Adjust the range of years as needed --> 
                            <?php
                                yearDropdown();
                            ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Session</label>
                        <select class="form-select rounded-pill" name="sesi" required>
                            <option id="block" value="">Select Session</option>
                            <option value="Session 1">Session 1</option>
                            <option value="Session 2">Session 2</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Week</label>
                        <select class="form-select rounded-pill" name="minggu">
                            <?php svmListWeek(); diplomaListWeek(); ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Exact Date Submission</label>
                        <input type="date" class="form-control text-dark rounded-pill" name="tarikh_sebenar" id="" required>
                    </div>

                    <!-- <div class="col-12">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control text-center rounded-pill" value="DID NOT SEND" id="" disabled>
                    </div> -->

                    <div class="col-md-12">
                        <label class="form-label">Your Comment</label>
                        <textarea rows="3" name="comment" class="form-control text-dark" style="border-radius: 20px;" placeholder="State your comments here..." required></textarea>
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