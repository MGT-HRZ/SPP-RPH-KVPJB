<?php

$sql_manage_prog = "SELECT program.kod_jabatan, jabatan.nama_jabatan, 
        program.kod_program, program.nama_program
        FROM program
        LEFT JOIN jabatan ON program.kod_jabatan = jabatan.kod_jabatan
        ORDER BY nama_program ASC
    ;";

$result_manage_prog = mysqli_query($connect, $sql_manage_prog);

$row_manage_prog = mysqli_num_rows($result_manage_prog);

$numid_manage_prog = 1;

$program_data = [];

    while ($row_manage_prog = mysqli_fetch_assoc($result_manage_prog)) {
        $program_data[] = $row_manage_prog;
    }

?>

<div class="modal fade" id="manageprog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Manage Programs</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
            <form>
                <div class="row">
                    <div class="col">
                        <select class="form-control mb-3 form-select text-dark fw-semibold rounded-pill" id="search-prog">

                            <option id="block">Select Program</option>
                                
                            <?php 
                                foreach($program_data as $row_prog_list) {
                                    echo '<option value="'.$row_prog_list['nama_program'].'">'.$row_prog_list['nama_program'].'</option>';
                                } 
                            ?>  

                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                    </div>
                </div>
            </form>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Bil.</th>
                            <th scope="col" class="text-center align-middle" style="width: 10%;">Department Code</th>
                            <th scope="col" class="text-center align-middle" style="width: 20%;">Department's Name</th>
                            <th scope="col" class="text-center align-middle" style="width: 10%;">Program Code</th>
                            <th scope="col" class="text-center align-middle" id="">Program's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-prog">
                        <?php

                        //  Continue looping to display data from the database
                        foreach($program_data as $row_manage_prog) {

                        ?>
                            <form action="dashboard/dep-prog/update-dep-prog-query.php" method="post">
                                <tr>
                                    <th class="align-middle" id="row-content" scope="row"><?php echo $numid_manage_prog++; ?></th>

                                    <td class="align-middle" id="">
                                        <input type="text" class="form-control rounded-pill text-dark" name="kodjabatan" value="<?= $row_manage_prog['kod_jabatan'] ?>" disabled>
                                    </td>

                                    <td class="align-middle" id="">
                                        <select class="form-select rounded-pill" name="idnamajabatan">

                                        <option id="block" value="<?= $row_manage_prog['kod_jabatan'] ?>"><?= $row_manage_prog['nama_jabatan'] ?></option>
                                            
                                        <?php 

                                            $sql_upt_dep_id = "SELECT kod_jabatan, nama_jabatan
                                                FROM jabatan 
                                                ORDER BY nama_jabatan ASC
                                            ;";

                                            $result_upt_dep_id = mysqli_query($connect, $sql_upt_dep_id);

                                            $row_upt_dep_id = mysqli_num_rows($result_upt_dep_id);
                                        
                                            while($row_upt_dep_id = mysqli_fetch_assoc($result_upt_dep_id)) {

                                                echo '
                                                    <option value="'.$row_upt_dep_id['kod_jabatan'].'">
                                                    '.$row_upt_dep_id['nama_jabatan'].'
                                                    </option>
                                                ';

                                            } 

                                        ?>  
                                        </select>
                                    </td>

                                    <td class="align-middle" id="">
                                        <input type="hidden" name="kodprogram" value="<?= $row_manage_prog['kod_program'] ?>">
                                        <input type="text" class="form-control rounded-pill text-dark" name="idprogram" value="<?= $row_manage_prog['kod_program'] ?>">
                                    </td>

                                    <td class="align-middle" id="">
                                        <input type="text" class="form-control rounded-pill text-dark" name="namaprogram" value="<?= $row_manage_prog['nama_program'] ?>">

                                        <!-- Filter search is use with this label -->
                                        <label class="d-none"><?= $row_manage_prog['nama_program'] ?></label>
                                    </td>

                                    <td class="align-middle" id="row-content">
                                        <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                                        <a class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#delprog<?= $row_manage_prog['kod_program'] ?>"><strong>Delete</strong></a>
                                        <button type="submit" class="btn btn-warning rounded-pill" name="update-prog-data">Update</button>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#newprog" data-bs-toggle="modal">
                    Add New Program
                </button>
            </div>
        </div>
    </div>
</div>

<?php foreach($program_data as $row_manage_prog) { ?>

<div class="modal fade" id="delprog<?= $row_manage_prog['kod_program'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Data Deletion</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="dashboard/dep-prog/delete-dep-prog-query.php" method="post">
            <div class="modal-body row g-3 p-4">
                <input type="text" name="kodprogram" class="d-none" value="<?= $row_manage_prog['kod_program'] ?>" required>
                <p class="text-dark text-center" style="text-wrap: balance;">
                    Are you sure you want to delete Program <strong>"<?= $row_manage_prog['nama_program'] ?>"</strong> from the system ?
                </p>
            </div>
            
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary btn-block rounded-pill" data-bs-target="#manageprog" data-bs-toggle="modal">
                    Back
                </a>
                <button type="submit" name="delprog" class="btn btn-danger btn-block rounded-pill"><strong>Confirm Deletion</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>

<div class="modal fade" id="newprog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Add New Program</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="dashboard/dep-prog/add-dep-prog-query.php" method="post">
            <div class="modal-body row g-3 p-4">
                <div class="col-12">
                    <label class="form-label">Set Department</label>
                    <select class="form-select rounded-pill" name="setdepcode">
                        <option id="block" value="">Select Department</option>
                            
                        <?php 

                            $sql_add_dep_id = "SELECT kod_jabatan, nama_jabatan
                                FROM jabatan 
                                ORDER BY nama_jabatan ASC
                            ;";

                            $result_add_dep_id = mysqli_query($connect, $sql_add_dep_id);

                            $row_add_dep_id = mysqli_num_rows($result_add_dep_id);
                        
                            while($row_add_dep_id = mysqli_fetch_assoc($result_add_dep_id)) {

                                echo '
                                    <option value="'.$row_add_dep_id['kod_jabatan'].'">
                                    '.$row_add_dep_id['nama_jabatan'].'
                                    </option>
                                ';

                            } 

                        ?>  
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Add Program Code</label>
                    <input type="text" class="form-control rounded-pill text-dark" name="addprogcode" placeholder="Add Code" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Add Program Name</label>
                    <input type="text" class="form-control rounded-pill text-dark" name="addprogname" placeholder="Add Name" required>   
                </div>

                <div class="col-12">
                    <label class="form-label">Add Head Program</label>
                    <select class="form-select rounded-pill" name="setheadprog" required>
                        <option id="block" value="">Select Head Program</option>
                        <?php
                        
                            if ($id_roles == 1) {

                                $sql_set_head_prog = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    WHERE id_roles IN(1, 2, 3, 4)
                                    ORDER BY nama_pensyarah ASC
                                ;";
                                
                                $result_set_head_prog = mysqli_query($connect, $sql_set_head_prog);
                                
                                $row_set_head_prog = mysqli_num_rows($result_set_head_prog);  

                                while ($row_set_head_prog = mysqli_fetch_assoc($result_set_head_prog)) {
                                        
                                    echo '<option value="'.$row_set_head_prog['id_pensyarah'].'">
                                        '.$row_set_head_prog['nama_pensyarah'].'
                                    </option>';
                                }
                            }
                        ?>           
                    </select>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#manageprog" data-bs-toggle="modal">
                    Back
                </button>
                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                <button type="submit" name="add-new-prog" class="btn btn-primary rounded-pill">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/filter/filter-in-tbl-prog.js"></script>