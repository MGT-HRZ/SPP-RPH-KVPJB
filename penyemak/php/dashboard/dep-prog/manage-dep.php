<?php

    $sql_manage_dep = "SELECT kod_jabatan, nama_jabatan
        FROM jabatan
        ORDER BY nama_jabatan ASC
    ;";

    $result_manage_dep = mysqli_query($connect, $sql_manage_dep);

    $row_manage_dep = mysqli_num_rows($result_manage_dep);

    $numid_manage_dep = 1;

    $department_data = [];

    while ($row_manage_dep = mysqli_fetch_assoc($result_manage_dep)) {
        $department_data[] = $row_manage_dep;
    }

?>

<div class="modal fade" id="managedep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Manage Departments</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
            <form>
                <div class="row">
                    <div class="col">
                        <select class="form-control mb-3 form-select text-dark fw-semibold rounded-pill" id="search-dep">

                            <option id="block">Select Department</option>
                                
                            <?php 
                                foreach($department_data as $row_dep_list) {
                                    echo '<option value="'.$row_dep_list['nama_jabatan'].'">'.$row_dep_list['nama_jabatan'].'</option>';
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
                            <th scope="col" class="text-center align-middle" style="width: 15%;">Department Code</th>
                            <th scope="col" class="text-center align-middle"  id="">Department's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-dep">
                    <?php 

                        //  Continue looping to display data from the database
                        foreach($department_data as $row_manage_dep) { 
                            
                    ?>
                    <form action="dashboard/dep-prog/update-dep-prog-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_manage_dep++; ?></th>
                            
                            <td class="align-middle" id="">
                                <input type="hidden" name="kodjabatan" value="<?= $row_manage_dep['kod_jabatan'] ?>">
                                <input type="text" class="form-control rounded-pill text-dark" name="idjabatan" value="<?= $row_manage_dep['kod_jabatan'] ?>">
                            </td>

                            <td class="align-middle" id="">
                                <input type="text" class="form-control rounded-pill text-dark" name="namajabatan" value="<?= $row_manage_dep['nama_jabatan'] ?>">

                                <!-- Filter search is use with this label -->
                                <label class="d-none"><?= $row_manage_dep['nama_jabatan'] ?></label>
                            </td>

                            <td class="align-middle" id="row-content">
                                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                                <a class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deldep<?= $row_manage_dep['kod_jabatan'] ?>"><strong>Delete</strong></a>
                                <button type="submit" class="btn btn-warning rounded-pill" name="update-dep-data">Update</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#newdep" data-bs-toggle="modal">
                    Add New Department
                </button>
            </div>
        </div>
    </div>
</div>

<?php foreach($department_data as $row_manage_dep) { ?>

<div class="modal fade" id="deldep<?= $row_manage_dep['kod_jabatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Data Deletion</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="dashboard/dep-prog/delete-dep-prog-query.php" method="post">
            <div class="modal-body row g-3 p-4">
                <input type="text" name="idjabatan" class="d-none" value="<?= $row_manage_dep['kod_jabatan'] ?>" required>
                <p class="text-dark text-center" style="text-wrap: balance;">
                    Are you sure you want to delete Department <strong>"<?= $row_manage_dep['nama_jabatan'] ?>"</strong> from the system ?
                </p>
            </div>
            
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary btn-block rounded-pill" data-bs-target="#managedep" data-bs-toggle="modal">
                    Back
                </a>
                <button type="submit" name="deldep" class="btn btn-danger btn-block rounded-pill"><strong>Confirm Deletion</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>

<div class="modal fade" id="newdep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Add New Department</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="dashboard/dep-prog/add-dep-prog-query.php" method="post">
            <div class="modal-body row g-3 p-4">
                <div class="col-12">
                    <label class="form-label">Add Department Code</label>
                    <input type="text" class="form-control rounded-pill text-dark" name="adddepcode" placeholder="Add Code" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Add Department Name</label>
                    <input type="text" class="form-control rounded-pill text-dark" name="adddepname" placeholder="Add Name" required>   
                </div>

                <div class="col-12">
                    <label class="form-label">Add Head Department</label>
                    <select class="form-select rounded-pill" name="setheaddep" required>
                        <option id="block" value="">Select Head Department</option>
                        <?php
                        
                            if ($id_roles == 1) {

                                $sql_set_head_dep = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    WHERE id_roles IN(1, 2, 3, 4)
                                    ORDER BY nama_pensyarah ASC
                                ;";
                                
                                $result_set_head_dep = mysqli_query($connect, $sql_set_head_dep);
                                
                                $row_set_head_dep = mysqli_num_rows($result_set_head_dep);  

                                while ($row_set_head_dep = mysqli_fetch_assoc($result_set_head_dep)) {
                                        
                                    echo '<option value="'.$row_set_head_dep['id_pensyarah'].'">
                                        '.$row_set_head_dep['nama_pensyarah'].'
                                    </option>';
                                }
                            }
                        ?>           
                    </select>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#managedep" data-bs-toggle="modal">
                    Back
                </button>
                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                <button type="submit" name="add-new-dep" class="btn btn-primary rounded-pill">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/filter/filter-in-tbl-dep.js"></script>