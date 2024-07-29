<form action="dashboard/lecturer/add-query.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addlecturer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content" id="modal-form">
                <div class="modal-header bg-light z-1">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Add New Lecturer</h1>
                    <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 p-4" tabindex="0">
                    <div class="col-md-12">
                        <label class="form-label">Lecturer's Name</label>
                        <input type="text" class="form-control text-dark rounded-pill" name="name" placeholder="Fill..." required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Lecturer's IC</label>
                        <input type="number" class="form-control text-dark rounded-pill" name="noic" placeholder="Fill..." required>
                    </div>
                    <div class="col-9">
                        <label class="form-label">Session</label>
                        <select class="form-select rounded-pill" name="session">
                            <option id="block" value="">-- Select --</option>
                            <option value="SVM">SVM</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="BOTH">BOTH</option>
                        </select>
                    </div>
                    <div class="col-9">
                        <label class="form-label">Department</label>
                        <select class="form-select rounded-pill" name="department_code">
                            <option id="block" value="">-- Select --</option>
                            <?php 

                                if ($id_roles == 1) {

                                    $sql_option_department = "SELECT * 
                                        FROM jabatan
                                        ORDER BY nama_jabatan ASC
                                    ;";

                                    $result_option_department = mysqli_query($connect, $sql_option_department);
                                
                                    $row_option_department = mysqli_num_rows($result_option_department);
                                    
                                    while ($row_option_department = mysqli_fetch_assoc($result_option_department)) {
                                        echo '<option value="'.$row_option_department['kod_jabatan'].'">'.$row_option_department['nama_jabatan'].'</option>';
                                    }

                                }

                                else {

                                    $sql_option_department = "SELECT * 
                                        FROM jabatan 
                                        WHERE kod_jabatan = '$kod_jabatan'
                                        ORDER BY nama_jabatan ASC
                                    ;";

                                    $result_option_department = mysqli_query($connect, $sql_option_department);
                                
                                    $row_option_department = mysqli_num_rows($result_option_department);
                                    
                                    while ($row_option_department = mysqli_fetch_assoc($result_option_department)) { ?>
                                        <option value="<?= $row_option_department['kod_jabatan'] ?>"><?= $row_option_department['nama_jabatan'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-9">
                        <label class="form-label">Program</label>
                        <select class="form-select rounded-pill" name="program_code">
                            <option id="block" value="">-- Select --</option>
                            <?php 

                                if ($id_roles == 1) {

                                    $sql_option_program = "SELECT * 
                                        FROM program
                                        ORDER BY nama_program ASC
                                    ;";

                                    $result_option_program = mysqli_query($connect, $sql_option_program);
                                
                                    $row_option_program = mysqli_num_rows($result_option_program);
                                    
                                    while ($row_option_program = mysqli_fetch_assoc($result_option_program)) {
                                        echo '<option value="'.$row_option_program['kod_program'].'">'.$row_option_program['nama_program'].'</option>';
                                    }
                                    
                                }

                                else {

                                    $sql_option_program = "SELECT * 
                                        FROM program 
                                        WHERE kod_jabatan = '$kod_jabatan'
                                        ORDER BY nama_program ASC
                                    ;";

                                    $result_option_program = mysqli_query($connect, $sql_option_program);
                                
                                    $row_option_program = mysqli_num_rows($result_option_program);
                                    
                                    while ($row_option_program = mysqli_fetch_assoc($result_option_program)) { ?>
                                        <option value="<?= $row_option_program['kod_program'] ?>"><?= $row_option_program['nama_program'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 ">
                        <label class="form-label">Upload Lecturer's Picture Profile</label>
                        <ul class="text-dark mb-3" style="font-size: small; list-style-type: disc;">
                            <li><span class="text-danger">Make sure image is JPG, JPEG or PNG</span></li>
                            <li>
                                <span class="text-danger">Named the file image with simple names (Example: <b>Adam.jpg</b>)</span>
                            </li>
                            <li><span class="text-danger">The file image must be less than 300kb</span></li>
                        </ul>
                        <input type="file" class="form-control rounded-pill" name="file" id="inputGroupFile02" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lecturer's Email</label>
                        <input type="email" class="form-control text-dark rounded-pill" name="email" placeholder="Fill..." required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lecturer's No.Tel</label>
                        <input type="number" class="form-control text-dark rounded-pill" name="notel" placeholder="Fill..." required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-primary btn-block rounded-pill">Add New Lecturer</button>
                    <button type="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>