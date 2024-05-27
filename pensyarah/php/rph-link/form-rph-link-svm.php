<?php

    require_once 'rph-link/function-query.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <div class="place2">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="card-title text-dark text-wrap" id="sec_card_title">
                <label>SVM RPH Submission Confirmation</label>
            </h2>
            <div class="card" id="modal-form">
                <div class="card-body">
                <form action="rph-link/add.php" method="post">
                    <fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lecturer's Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control rounded-pill" value="<?= $row_link_rph['nama_pensyarah'] ?>" id="" disabled>
                                <input type="text" class="d-none" name="id_pensyarah" value="<?= $row_link_rph['pensyarah'] ?>" id="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">e-RPH Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control text-dark rounded-pill" name="link_rph" id="" placeholder="Insert link here" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Year</label>
                            <div class="col-sm-3">
                                <select class="form-control text-dark rounded-pill" name="tahun" id="year" required>
                                    <option value="" disabled selected>Select Year</option>
                                    <!-- Adjust the range of years as needed -->
                                    <?php
                                        yearDropdown();
                                    ?>
                                </select>
                            </div>
                        </div>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Session</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sesi" id="gridRadios1" value="Session 1" required>
                                    <label class="form-check-label" for="gridRadios1">
                                    Session 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sesi" id="gridRadios2" value="Session 2" required>
                                    <label class="form-check-label" for="gridRadios2">
                                    Session 2
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Week</label>
                            <div class="col-sm-3">
                                <select class="form-select rounded-pill" name="minggu" required>
                                    <?php svmListWeek(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lecturer's Reviewer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control rounded-pill" value="<?= $row_link_rph['nama_penyemak'] ?>" id="" disabled>
                                <input type="text" class="d-none" name="id_penyemak" value="<?= $row_link_rph['penyemak'] ?>" id="">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mx-auto mt-5">
                            <button type="submit" name="add" class="btn btn-success btn-block mr-3 p-3 rounded-pill">Submit</button>
                            <br>
                            <button type="reset" name="reset" class="btn btn-danger btn-block p-3 rounded-pill">Reset</button>
                        </div>
                    </fieldset>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>