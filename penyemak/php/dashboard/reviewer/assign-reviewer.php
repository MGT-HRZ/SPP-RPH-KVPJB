<?php

if ($id_roles == 1) {

    $sql_assign_reviewer = "SELECT penyemak.pensyarah, t1.nama_pensyarah AS nama_pensyarah, 
        penyemak.penyemak, t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t1.id_pensyarah <> '$id_pensyarah' && t1.id_roles <> 1
        ORDER BY t1.nama_pensyarah ASC
    ;";

    $result_assign_reviewer = mysqli_query($connect, $sql_assign_reviewer);

    $row_assign_reviewer = mysqli_num_rows($result_assign_reviewer);

    $numid_assign_reviewer = 1;

}

elseif ($id_roles == 2) {
    
    $sql_assign_reviewer = "SELECT penyemak.pensyarah, t1.nama_pensyarah AS nama_pensyarah, 
        penyemak.penyemak, t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t2.id_pensyarah = '$id_pensyarah'
        && t1.id_roles <> 1       
        ORDER BY t1.nama_pensyarah ASC
    ;";

    $result_assign_reviewer = mysqli_query($connect, $sql_assign_reviewer);

    $row_assign_reviewer = mysqli_num_rows($result_assign_reviewer);

    $numid_assign_reviewer = 1;

}

elseif ($id_roles == 3) {
    
    $sql_assign_reviewer = "SELECT penyemak.pensyarah, t1.nama_pensyarah AS nama_pensyarah, 
        penyemak.penyemak, t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t1.kod_jabatan = '$kod_jabatan'
        && t1.id_pensyarah <> '$id_pensyarah'
        && t1.id_roles <> 1        
        && t1.id_roles <> 2
        ORDER BY t1.nama_pensyarah ASC        
    ;";

    $result_assign_reviewer = mysqli_query($connect, $sql_assign_reviewer);

    $row_assign_reviewer = mysqli_num_rows($result_assign_reviewer);

    $numid_assign_reviewer = 1;

}

else {
    
    $sql_assign_reviewer = "SELECT penyemak.pensyarah, t1.nama_pensyarah AS nama_pensyarah, 
        penyemak.penyemak, t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t2.id_pensyarah = '$id_pensyarah'
        && t1.id_pensyarah <> '$id_pensyarah'
        && t1.id_roles <> 1
        && t1.id_roles <> 2
        && t1.id_roles <> 3
        ORDER BY t1.nama_pensyarah ASC
    ;";

    $result_assign_reviewer = mysqli_query($connect, $sql_assign_reviewer);

    $row_assign_reviewer = mysqli_num_rows($result_assign_reviewer);

    $numid_assign_reviewer = 1;

}

?>

<div class="modal fade" id="assignreviewer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Assign Reviewer</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-assign-reviewer">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 45%;" id="">Lecturer's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Reviewer</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-lec-name-assign-reviewer">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_assign_reviewer = mysqli_fetch_assoc($result_assign_reviewer)) { 
                            
                    ?>
                    <form action="dashboard/reviewer/assign-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_assign_reviewer++; ?></th>
                            
                            <td class="align-middle">
                                <input type="text" class="d-none" name="id_pensyarah" value="<?= $row_assign_reviewer['pensyarah'] ?>" id="lec-name">
                                <?= $row_assign_reviewer['nama_pensyarah'] ?>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_reviewer" required>
                                    <option id="block" value=""><?= $row_assign_reviewer['nama_penyemak'] ?></option>
                                    
                                    <?php 

                                        if ($id_roles == 1) {
                                            $sql_select_reviewer = "SELECT id_pensyarah AS          select_penyemak, nama_pensyarah AS nama_select_penyemak, id_roles AS select_id_roles
                                                FROM pensyarah
                                                WHERE id_roles IN(1, 2, 3, 4)
                                                ORDER BY nama_pensyarah ASC
                                            ;";

                                            $result_select_reviewer = mysqli_query($connect, $sql_select_reviewer);

                                            $row_select_reviewer = mysqli_num_rows($result_select_reviewer);
                                        
                                            while($row_select_reviewer = mysqli_fetch_assoc($result_select_reviewer)) {

                                                echo '
                                                    <option value="'.$row_select_reviewer['select_penyemak'].'">
                                                    '.$row_select_reviewer['nama_select_penyemak'].'
                                                    </option>
                                                ';

                                            } 
                                        }

                                        elseif ($id_roles == 2) {
                                            $sql_select_reviewer = "SELECT id_pensyarah AS          select_penyemak, nama_pensyarah AS nama_select_penyemak, id_roles AS select_id_roles
                                                FROM pensyarah
                                                WHERE kod_jabatan = '$kod_jabatan' && kod_program = '$kod_program' && id_roles IN(2)
                                                ORDER BY nama_pensyarah ASC
                                            ;";

                                            $result_select_reviewer = mysqli_query($connect, $sql_select_reviewer);

                                            $row_select_reviewer = mysqli_num_rows($result_select_reviewer);
                                        
                                            while($row_select_reviewer = mysqli_fetch_assoc($result_select_reviewer)) {

                                                echo '
                                                    <option value="'.$row_select_reviewer['select_penyemak'].'">
                                                    '.$row_select_reviewer['nama_select_penyemak'].'
                                                    </option>
                                                ';

                                            } 
                                        }

                                        elseif ($id_roles == 3) {
                                            $sql_select_reviewer = "SELECT id_pensyarah AS          select_penyemak, nama_pensyarah AS nama_select_penyemak, id_roles AS select_id_roles
                                                FROM pensyarah
                                                WHERE kod_jabatan = '$kod_jabatan' && id_roles IN(3, 4)
                                                ORDER BY nama_pensyarah ASC
                                            ;";

                                            $result_select_reviewer = mysqli_query($connect, $sql_select_reviewer);

                                            $row_select_reviewer = mysqli_num_rows($result_select_reviewer);
                                        
                                            while($row_select_reviewer = mysqli_fetch_assoc($result_select_reviewer)) {

                                                echo '
                                                    <option value="'.$row_select_reviewer['select_penyemak'].'">
                                                    '.$row_select_reviewer['nama_select_penyemak'].'
                                                    </option>
                                                ';

                                            } 
                                        }

                                        else {
                                            $sql_select_reviewer = "SELECT id_pensyarah AS          select_penyemak, nama_pensyarah AS nama_select_penyemak, id_roles AS select_id_roles
                                                FROM pensyarah
                                                WHERE kod_jabatan = '$kod_jabatan' && id_roles IN(3, 4)
                                                ORDER BY nama_pensyarah ASC
                                            ;";

                                            $result_select_reviewer = mysqli_query($connect, $sql_select_reviewer);

                                            $row_select_reviewer = mysqli_num_rows($result_select_reviewer);
                                        
                                            while($row_select_reviewer = mysqli_fetch_assoc($result_select_reviewer)) {

                                                echo '
                                                    <option value="'.$row_select_reviewer['select_penyemak'].'">
                                                    '.$row_select_reviewer['nama_select_penyemak'].'
                                                    </option>
                                                ';

                                            } 
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
                <button class="btn btn-secondary rounded-pill" data-bs-target="#newassign" data-bs-toggle="modal">
                    Create New Assigns
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-assign_riviewer.js"></script>

<div class="modal fade" id="newassign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">New Assign</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="dashboard/reviewer/create-query.php" method="post">
            <div class="modal-body row g-3 p-4">
                <div class="col-12">
                    <label class="form-label">Select Lecturer</label>
                    <select class="form-select rounded-pill" name="idpensyarah" required>
                        <option id="block" value="">Select Lecturer</option>
                        <?php 

                            if ($id_roles == 1) {

                                $sql_new_assign = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    ORDER BY nama_pensyarah ASC
                                ;";
                            
                                $result_new_assign = mysqli_query($connect, $sql_new_assign);
                            
                                $row_new_assign = mysqli_num_rows($result_new_assign);
                                
                                while ($row_new_assign = mysqli_fetch_assoc($result_new_assign)) {
                                        
                                    echo '<option value="'.$row_new_assign['id_pensyarah'].'">
                                        '.$row_new_assign['nama_pensyarah'].'
                                    </option>';
                                }

                            }

                            else {

                                $sql_new_assign = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    WHERE id_pensyarah <> '$id_pensyarah' && kod_jabatan = '$kod_jabatan'
                                    ORDER BY nama_pensyarah ASC
                                ;";
                            
                                $result_new_assign = mysqli_query($connect, $sql_new_assign);
                            
                                $row_new_assign = mysqli_num_rows($result_new_assign);
                                
                                while ($row_new_assign = mysqli_fetch_assoc($result_new_assign)) { ?>
                                        
                                    <option value="<?=$row_new_assign['id_pensyarah'] ?>">
                                        <?=$row_new_assign['nama_pensyarah'] ?>
                                    </option>

                        <?php 
                                } 
                            }
                        ?>           
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Select Reviewer</label>
                    <select class="form-select rounded-pill" name="idpenyemak" required>
                        <option id="block" value="">Select Reviewer</option>
                        <?php
                        
                            if ($id_roles == 1) {

                                $sql_set_reviewer = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    WHERE id_roles IN(1, 2, 3, 4)
                                    ORDER BY nama_pensyarah ASC
                                ;";
                                
                                $result_set_reviewer = mysqli_query($connect, $sql_set_reviewer);
                                
                                $row_set_reviewer = mysqli_num_rows($result_set_reviewer);  

                                while ($row_set_reviewer = mysqli_fetch_assoc($result_set_reviewer)) {
                                        
                                    echo '<option value="'.$row_set_reviewer['id_pensyarah'].'">
                                        '.$row_set_reviewer['nama_pensyarah'].'
                                    </option>';
                                }

                            }

                            else {

                                $sql_set_reviewer = "SELECT id_pensyarah, nama_pensyarah
                                    FROM pensyarah
                                    WHERE id_roles IN(3, 4) && kod_jabatan = '$kod_jabatan'
                                    ORDER BY nama_pensyarah ASC
                                ;";
                                
                                $result_set_reviewer = mysqli_query($connect, $sql_set_reviewer);
                                
                                $row_set_reviewer = mysqli_num_rows($result_set_reviewer);  

                                while ($row_set_reviewer = mysqli_fetch_assoc($result_set_reviewer)) { ?>
                                        
                                    <option value="<?=$row_set_reviewer['id_pensyarah'] ?>">
                                        <?=$row_set_reviewer['nama_pensyarah'] ?>
                                    </option>

                        <?php 
                                } 
                            }
                        ?>           
                    </select>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-secondary rounded-pill" data-bs-target="#assignreviewer" data-bs-toggle="modal">
                    Back
                </button>
                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                <button type="submit" name="create" class="btn btn-primary rounded-pill">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
