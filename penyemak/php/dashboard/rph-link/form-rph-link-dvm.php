<?php

    if ($num_of_dir == 3) {
        $url_0 = '../dashboard/rph-link/';
        
        $url_fq = $url_0.'function-query.php';
        $url_add = $url_0.'add.php';

        require_once $url_fq;
    }

    else {
        $url_0 = 'dashboard/rph-link/';
        
        $url_fq = $url_0.'function-query.php';
        $url_add = $url_0.'add.php';

        require_once $url_fq;
    }
    
?>

<form action="<?php echo $url_add ?>" method="post">
    <div class="modal fade" id="sendlinkdvm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="modal-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Diploma RPH Link</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 p-4">
                    <div class="col-md-12">
                        <!-- id_pensyarah  -->
                        <input type="text" class="d-none" name="id_pensyarah" value="<?= $row_link_rph['pensyarah'] ?>" id="">

                        <label class="form-label">e-RPH Link</label>
                        <input type="url" class="form-control text-dark rounded-pill" name="link_rph" placeholder="Insert link here" required>
                    </div>

                    <div class="col-9">
                        <label class="form-label">Session</label>
                        <select class="form-select rounded-pill" name="sesi" required>
                            <option id="block" value="">Select Session</option>
                            <option value="Session 1">Session 1</option>
                            <option value="Session 2">Session 2</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Week</label>
                        <select class="form-select rounded-pill" name="minggu" required>
                            <?php diplomaListWeek(); ?>
                        </select>
                    </div>

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
                    
                    <div class="col-md-12">
                        <label class="form-label">Lecturer's Reviewer</label>
                        <input type="text" value="<?= $row_link_rph['nama_penyemak'] ?>" class="form-control rounded-pill" disabled>
                        <input type="text" class="d-none" name="id_penyemak" value="<?= $row_link_rph['penyemak'] ?>" id="">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-primary btn-block rounded-pill">Send</button>
                    <button type="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>