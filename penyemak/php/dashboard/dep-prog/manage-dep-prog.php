<?php

    $sql_manage_dep_prog = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, 
        jabatan.kod_jabatan, jabatan.nama_jabatan, program.kod_program, program.nama_program
        FROM pensyarah
        INNER JOIN jabatan ON pensyarah.kod_jabatan = jabatan.kod_jabatan
        INNER JOIN program ON pensyarah.kod_program = program.kod_program
        WHERE pensyarah.id_pensyarah <> '$id_pensyarah'
        ORDER BY pensyarah.nama_pensyarah ASC
    ;";

    $result_manage_dep_prog = mysqli_query($connect, $sql_manage_dep_prog);

    $row_manage_dep_prog = mysqli_num_rows($result_manage_dep_prog);

    $numid_manage_dep_prog = 1;

?>

<div class="modal fade" id="managedepprog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Manage Departments & Programs</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-dep-prog">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 35%;" id="">Lecturer's Name</th>
                            <th scope="col" class="text-center align-middle" style="width: 25%;" id="">Department</th>
                            <th scope="col" class="text-center align-middle" style="width: 25%;" id="">Program</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-lec-name-dep-prog">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_manage_dep_prog = mysqli_fetch_assoc($result_manage_dep_prog)) { 
                            
                    ?>
                    <form action="dashboard/dep-prog/manage-dep-prog-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_manage_dep_prog++; ?></th>
                            
                            <td class="align-middle" id="">
                                <input type="text" class="d-none" name="id_pensyarah" value="<?= $row_manage_dep_prog['id_pensyarah'] ?>">
                                <?= $row_manage_dep_prog['nama_pensyarah'] ?>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_manage_dep" required>

                                <option id="block" value=""><?= $row_manage_dep_prog['nama_jabatan'] ?></option>
                                    
                                <?php 

                                    $sql_select_manage_dep = "SELECT *
                                        FROM jabatan 
                                        ORDER BY nama_jabatan ASC
                                    ;";

                                    $result_select_manage_dep = mysqli_query($connect, $sql_select_manage_dep);

                                    $row_select_manage_dep = mysqli_num_rows($result_select_manage_dep);
                                
                                    while($row_select_manage_dep = mysqli_fetch_assoc($result_select_manage_dep)) {

                                        echo '
                                            <option value="'.$row_select_manage_dep['kod_jabatan'].'">
                                            '.$row_select_manage_dep['nama_jabatan'].'
                                            </option>
                                        ';

                                    } 

                                ?>  
                                </select>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_manage_prog" required>

                                <option id="block" value=""><?= $row_manage_dep_prog['nama_program'] ?></option>
                                    
                                <?php 

                                    $sql_select_manage_prog = "SELECT *
                                        FROM program 
                                        ORDER BY nama_program ASC
                                    ;";

                                    $result_select_manage_prog = mysqli_query($connect, $sql_select_manage_prog);

                                    $row_select_manage_prog = mysqli_num_rows($result_select_manage_prog);
                                
                                    while($row_select_manage_prog = mysqli_fetch_assoc($result_select_manage_prog)) {

                                        echo '
                                            <option value="'.$row_select_manage_prog['kod_program'].'">
                                            '.$row_select_manage_prog['nama_program'].'
                                            </option>
                                        ';

                                    } 

                                ?>  
                                </select>
                            </td>
                            
                            <td class="align-middle" id="row-content">
                                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                                <button type="submit" class="btn btn-primary rounded-pill" name="update" value="">Change</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#chgheaddep" data-bs-toggle="modal">
                    Change Head Departments
                </button>
                <button class="btn btn-secondary rounded-pill" data-bs-target="#chgheadprog" data-bs-toggle="modal">
                    Change Head Programs
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-dep_prog.js"></script>

<?php

    $sql_chg_dep = "SELECT jabatan.*,
        pensyarah.nama_pensyarah
        FROM jabatan
        INNER JOIN pensyarah ON jabatan.ketua_jabatan = pensyarah.id_pensyarah
    ;";

    $result_chg_dep = mysqli_query($connect, $sql_chg_dep);

    $row_chg_dep = mysqli_num_rows($result_chg_dep);

    $numid_chg_dep = 1;
    
?>

<div class="modal fade" id="chgheaddep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Change Head Departments</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="" id="tbl-header">No.</th>
                            <th scope="col" class="" style="width: 45%;" id="">Departments</th>
                            <th scope="col" class="text-center" style="width: 25%;" id="">Current Lecturer</th>
                            <th scope="col" class="text-center" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_chg_dep = mysqli_fetch_assoc($result_chg_dep)) { 
                            
                    ?>
                    <form action="dashboard/dep-prog/manage-dep-prog-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_chg_dep++; ?></th>
                            
                            <td class="align-middle" id="">
                                <input type="text" class="d-none" name="kod_jabatan" value="<?= $row_chg_dep['kod_jabatan'] ?>">
                                <?= $row_chg_dep['nama_jabatan'] ?>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_list_dep" required>

                                <option id="block" value=""><?= $row_chg_dep['nama_pensyarah'] ?></option>
                                    
                                <?php 

                                    $sql_select_list_dep = "SELECT id_pensyarah, nama_pensyarah
                                        FROM pensyarah
                                        WHERE id_pensyarah <> '$id_pensyarah'
                                        && id_roles IN(2, 3)
                                        ORDER BY nama_pensyarah ASC
                                    ;";

                                    $result_select_list_dep = mysqli_query($connect, $sql_select_list_dep);

                                    $row_select_list_dep = mysqli_num_rows($result_select_list_dep);

                                    while ($row_select_list_dep = mysqli_fetch_assoc($result_select_list_dep)) {
                                        echo '
                                            <option value="'.$row_select_list_dep['id_pensyarah'].'">
                                            '.$row_select_list_dep['nama_pensyarah'].'
                                            </option>
                                        ';
                                    }
                                    
                                ?>  
                                </select>
                            </td>
                            
                            <td class="align-middle" id="row-content">
                                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                                <button type="submit" class="btn btn-primary rounded-pill" name="update-dep" value="">Change</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
                
            <div class="modal-footer">
                <button class="btn btn-primary rounded-pill" data-bs-target="#managedepprog" data-bs-toggle="modal">
                    Back
                </button>
                <button class="btn btn-secondary rounded-pill" data-bs-target="#chgheadprog" data-bs-toggle="modal">
                    Change Head Programs
                </button>
            </div>
        </div>
    </div>
</div>

<?php

    $sql_chg_prog = "SELECT program.*,
        pensyarah.nama_pensyarah
        FROM program
        INNER JOIN pensyarah ON program.id_pensyarah = pensyarah.id_pensyarah
    ;";

    $result_chg_prog = mysqli_query($connect, $sql_chg_prog);

    $row_chg_prog = mysqli_num_rows($result_chg_prog);

    $numid_chg_prog = 1;
    
?>

<div class="modal fade" id="chgheadprog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Change Head Programs</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="" id="tbl-header">No.</th>
                            <th scope="col" class="" style="width: 45%;" id="">Programs</th>
                            <th scope="col" class="text-center" style="width: 25%;" id="">Current Lecturer</th>
                            <th scope="col" class="text-center" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_chg_prog = mysqli_fetch_assoc($result_chg_prog)) { 
                            
                    ?>
                    <form action="dashboard/dep-prog/manage-dep-prog-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_chg_prog++; ?></th>
                            
                            <td class="align-middle" id="">
                                <input type="text" class="d-none" name="kod_program" value="<?= $row_chg_prog['kod_program'] ?>">
                                <?= $row_chg_prog['nama_program'] ?>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_list_prog" required>

                                <option id="block" value=""><?= $row_chg_prog['nama_pensyarah'] ?></option>
                                    
                                <?php
                                
                                    $sql_select_list_prog = "SELECT id_pensyarah, nama_pensyarah
                                        FROM pensyarah
                                        WHERE id_pensyarah <> '$id_pensyarah'
                                        && id_roles IN(2, 3, 4)
                                        ORDER BY nama_pensyarah ASC
                                    ;";

                                    $result_select_list_prog = mysqli_query($connect, $sql_select_list_prog);

                                    $row_select_list_prog = mysqli_num_rows($result_select_list_prog);

                                    while ($row_select_list_prog = mysqli_fetch_assoc($result_select_list_prog)) {
                                        echo '
                                            <option value="'.$row_select_list_prog['id_pensyarah'].'">
                                            '.$row_select_list_prog['nama_pensyarah'].'
                                            </option>
                                        ';
                                    }
                                    
                                ?>  
                                </select>
                            </td>
                            
                            <td class="align-middle" id="row-content">
                                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                                <button type="submit" class="btn btn-primary rounded-pill" name="update-prog" value="">Change</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-primary rounded-pill" data-bs-target="#managedepprog" data-bs-toggle="modal">
                    Back
                </button>
                <button class="btn btn-secondary rounded-pill" data-bs-target="#chgheaddep" data-bs-toggle="modal">
                    Change Head Departments
                </button>
            </div>
        </div>
    </div>
</div>
