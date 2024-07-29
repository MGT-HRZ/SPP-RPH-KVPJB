<form action="dashboard/user-profile/user-profile-query.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="user-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content" id="modal-form">
                <div class="modal-header bg-light z-1">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Your Profile Details</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 p-4" tabindex="0">
                    <div class="col-md-12">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="d-none" name="id_pensyarah" value="<?= $row['id_pensyarah'] ?>">
                        <input type="text" class="d-none" name="name" value="<?= $row['nama_pensyarah'] ?>">
                        <input type="text" class="form-control rounded-pill" value="<?= $row['nama_pensyarah'] ?>" disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Your IC</label>
                        <input type="number" class="d-none" name="noic" value="<?= $row['username'] ?>">
                        <input type="number" class="form-control rounded-pill" value="<?= $row['username'] ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Session</label>
                        <select class="form-select rounded-pill" name="session">
                            <option id="block" value="<?= $row['sesi'] ?>"><?= $row['sesi'] ?></option>
                            <option value="SVM">SVM</option>
                            <option value="DVM">DVM</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>

                    <?php
                        $sql_dep_prog = "SELECT pensyarah.nama_pensyarah, 
                            jabatan.nama_jabatan, program.nama_program
                            FROM pensyarah
                            INNER JOIN jabatan ON pensyarah.kod_jabatan = jabatan.kod_jabatan
                            INNER JOIN program ON pensyarah.kod_program = program.kod_program
                            WHERE pensyarah.id_pensyarah = '$id_pensyarah'
                        ;";

                        $result_dep_prog = mysqli_query($connect, $sql_dep_prog);

                        $row_dep_prog = mysqli_fetch_assoc($result_dep_prog);
                    ?>

                    <div class="col-12">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control rounded-pill" value="<?= $row_dep_prog['nama_jabatan'] ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Program</label>
                        <input type="text" class="form-control rounded-pill" value="<?= $row_dep_prog['nama_program'] ?>" disabled>
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
                        <input type="text" class="d-none" name="pro_image" value="<?= $row['pro_image'] ?>">
                        <input type="text" class="form-control rounded-pill mb-2" value="<?= $row['pro_image'] ?>" disabled>

                        <input type="file" class="form-control rounded-pill" name="file" id="inputGroupFile02" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Your Email</label>
                        <input type="email" class="form-control rounded-pill" name="email" value="<?= $row['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Your No.Tel</label>
                        <input type="number" class="form-control rounded-pill" name="notel" value="<?= $row['no_tel'] ?>">
                    </div>

                    <?php
                        $sql_roles = "SELECT pensyarah.nama_pensyarah, 
                            pensyarah.id_roles, roles.roles
                            FROM pensyarah
                            INNER JOIN roles ON pensyarah.id_roles = roles.id_roles
                            WHERE pensyarah.id_pensyarah = '$id_pensyarah'
                        ;";

                        $result_roles = mysqli_query($connect, $sql_roles);

                        $row_roles = mysqli_fetch_assoc($result_roles);
                    ?>

                    <div class="col-12">
                        <label class="form-label">Current Role</label>
                        <input type="text" class="form-control rounded-pill" value="<?= $row_roles['roles'] ?>" disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-primary btn-block rounded-pill"><b>Save</b></button>
                    <button type="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>