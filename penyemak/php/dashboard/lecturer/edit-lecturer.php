<?php

$sql_edit_lecturer = "SELECT pensyarah.*, 
        jabatan.nama_jabatan, program.nama_program
        FROM pensyarah
        INNER JOIN jabatan ON pensyarah.kod_jabatan = jabatan.kod_jabatan
        LEFT JOIN program ON pensyarah.kod_program = program.kod_program
        WHERE pensyarah.id_pensyarah <> '$id_pensyarah' && pensyarah.id_roles <> 1
        ORDER BY pensyarah.nama_pensyarah ASC
    ;";

$result_edit_lecturer = mysqli_query($connect, $sql_edit_lecturer);

$row_edit_lecturer = mysqli_num_rows($result_edit_lecturer);

$numid_edit_lecturer = 1;

$lecturer_data = [];

while ($row_edit_lecturer = mysqli_fetch_assoc($result_edit_lecturer)) {
    $lecturer_data[] = $row_edit_lecturer;
}

?>

<div class="modal fade" id="editlecturer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Edit Lecturer Profile</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-lecturer">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 48%;" id="">Lecturer's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Username</th>
                            <th scope="col" class="text-center align-middle" id="">Email</th>
                            <th scope="col" class="text-center align-middle" id="">No.Tel</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-lec-name-lecturer">
                        <?php

                        //  Continue looping to display data from the database
                        foreach ($lecturer_data as $row_edit_lecturer) {

                        ?>
                            <tr>
                                <th class="align-middle" id="row-content" scope="row"><?php echo $numid_edit_lecturer++; ?></th>

                                <td class="align-middle" id="">
                                    <?= $row_edit_lecturer['nama_pensyarah'] ?>
                                </td>

                                <td class="align-middle text-center">
                                    <?= $row_edit_lecturer['username'] ?>
                                </td>

                                <td class="align-middle text-center">
                                    <?= $row_edit_lecturer['email'] ?>
                                </td>

                                <td class="align-middle text-center">
                                    <?= $row_edit_lecturer['no_tel'] ?>
                                </td>

                                <td class="align-middle" id="row-content">
                                    <button class="btn btn-success btn-block rounded-pill pl-4 pr-4" data-bs-toggle="modal" data-bs-target="#editlec<?= $row_edit_lecturer['id_pensyarah'] ?>">Edit</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?php
//  Show second modal
foreach ($lecturer_data as $row_edit_lecturer) {
?>

    <form action="dashboard/lecturer/edit-query.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editlec<?= $row_edit_lecturer['id_pensyarah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content" id="modal-form">
                    <div class="modal-header bg-light z-1">
                        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Edit Lecturer Profile</h1>
                        <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3 p-4" tabindex="0">
                        <div>

                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Lecturer's Name</label>
                            <input type="text" name="id_pensyarah" class="d-none" value="<?= $row_edit_lecturer['id_pensyarah'] ?>" required>
                            <input type="text" class="form-control rounded-pill text-dark" name="name" value="<?= $row_edit_lecturer['nama_pensyarah'] ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Lecturer's IC</label>
                            <input type="number" class="form-control rounded-pill text-dark" name="noic" value="<?= $row_edit_lecturer['username'] ?>" required>
                        </div>
                        <div class="col-9">
                            <label class="form-label">Session</label>
                            <select class="form-select rounded-pill" name="session">
                                <option id="block" value="<?= $row_edit_lecturer['sesi'] ?>"><?= $row_edit_lecturer['sesi'] ?></option>
                                <option value="SVM">SVM</option>
                                <option value="DIPLOMA">DIPLOMA</option>
                                <option value="BOTH">BOTH</option>
                            </select>
                        </div>
                        <div class="col-9">
                            <label class="form-label">Department</label>
                            <select class="form-select rounded-pill" name="department_code">
                                <option id="block" value="<?= $row_edit_lecturer['kod_jabatan'] ?>"><?= $row_edit_lecturer['nama_jabatan'] ?></option>
                                <?php
                                $sql_option_department = "SELECT * 
                                FROM jabatan
                                ORDER BY nama_jabatan ASC
                            ;";

                                $result_option_department = mysqli_query($connect, $sql_option_department);

                                $row_option_department = mysqli_num_rows($result_option_department);

                                while ($row_option_department = mysqli_fetch_assoc($result_option_department)) { ?>
                                    <option value="<?= $row_option_department['kod_jabatan'] ?>"><?= $row_option_department['nama_jabatan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-9">
                            <label class="form-label">Program</label>
                            <select class="form-select rounded-pill" name="program_code">
                                <option id="block" value="<?= $row_edit_lecturer['kod_program'] ?>"><?= $row_edit_lecturer['nama_program'] ?></option>
                                <?php
                                $sql_option_program = "SELECT * 
                                FROM program
                                ORDER BY nama_program ASC
                            ;";

                                $result_option_program = mysqli_query($connect, $sql_option_program);

                                $row_option_program = mysqli_num_rows($result_option_program);

                                while ($row_option_program = mysqli_fetch_assoc($result_option_program)) { ?>
                                    <option value="<?= $row_option_program['kod_program'] ?>"><?= $row_option_program['nama_program'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 ">
                            <label class="form-label">Upload Your Picture Profile</label>
                            <ul class="text-dark mb-3" style="font-size: small; list-style-type: disc;">
                                <li><span class="text-danger">Please follow the <b>current lecturer's picture profile</b> format before updating profile</span></li>
                                <li><span class="text-danger">Make sure image is JPG, JPEG or PNG</span></li>
                                <li>
                                    <span class="text-danger">Named the file image with simple names (Example: <b>Adam.jpg</b>)</span>
                                </li>
                                <li><span class="text-danger">The file image must be less than 300kb</span></li>
                            </ul>

                            <label class="form-label text-dark" style="font-size: 90%; font-weight: bold;">Your Current Picture Profile Format</label>
                            <input type="text" class="d-none" name="pro_image" value="<?= $row_edit_lecturer['pro_image'] ?>">
                            <input type="text" class="form-control rounded-pill mb-2" value="<?= $row_edit_lecturer['pro_image'] ?>" disabled>

                            <input type="file" class="form-control rounded-pill" name="file" id="inputGroupFile02" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lecturer's Email</label>
                            <input type="email" class="form-control rounded-pill text-dark" name="email" value="<?= $row_edit_lecturer['email'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lecturer's No.Tel</label>
                            <input type="number" class="form-control rounded-pill text-dark" name="notel" value="<?= $row_edit_lecturer['no_tel'] ?>">
                        </div>
                        <div class="mt-5">
                            <a class="btn btn-danger btn-block rounded-pill pl-4 pr-4" data-bs-toggle="modal" data-bs-target="#dellec<?= $row_edit_lecturer['id_pensyarah'] ?>"><strong>Delete</strong></a>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary rounded-pill pl-5 pr-5" data-bs-target="#editlecturer" data-bs-toggle="modal">Back</a>
                        <button type="reset" class="btn btn-danger rounded-pill pl-5 pr-5">Reset</button>
                        <button type="submit" class="btn btn-primary rounded-pill pl-5 pr-5" name="update"><b>Update</b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="dellec<?= $row_edit_lecturer['id_pensyarah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Data Deletion</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="dashboard/lecturer/delete-query.php" method="post">
                    <div class="modal-body row g-3 p-4">
                        <input type="text" name="id_pensyarah" class="d-none" value="<?= $row_edit_lecturer['id_pensyarah'] ?>" required>
                        <p class="text-dark text-center" style="text-wrap: balance;">
                            Are you sure you want to delete <strong>"<?= $row_edit_lecturer['nama_pensyarah'] ?>"</strong> from the system ?
                        </p>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary btn-block rounded-pill" data-bs-target="#editlec<?= $row_edit_lecturer['id_pensyarah'] ?>" data-bs-toggle="modal">
                            Back
                        </a>
                        <button type="submit" name="dellec" class="btn btn-danger btn-block rounded-pill"><strong>Confirm Deletion</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-lecturer.js"></script>