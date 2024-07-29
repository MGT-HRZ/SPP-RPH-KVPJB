<?php

    $sql_manage_roles = "SELECT pensyarah.id_pensyarah, pensyarah.nama_pensyarah, 
        roles.*
        FROM pensyarah
        INNER JOIN roles ON pensyarah.id_roles = roles.id_roles
        WHERE pensyarah.id_pensyarah <> '$id_pensyarah' && pensyarah.id_roles <> 1
        ORDER BY pensyarah.nama_pensyarah ASC
    ;";

    $result_manage_roles = mysqli_query($connect, $sql_manage_roles);

    $row_manage_roles = mysqli_num_rows($result_manage_roles);

    $numid_manage_roles = 1;

?>

<div class="modal fade" id="manageroles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Manage Roles</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-roles">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 45%;" id="">Lecturer's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Roles</th>
                            <th scope="col" class="text-center align-middle" id="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-lec-name-roles">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_manage_roles = mysqli_fetch_assoc($result_manage_roles)) { 
                            
                    ?>
                    <form action="dashboard/roles/manage-roles-query.php" method="post">
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_manage_roles++; ?></th>
                            
                            <td class="align-middle" id="">
                                <input type="text" class="d-none" name="id_pensyarah" value="<?= $row_manage_roles['id_pensyarah'] ?>">
                                <?= $row_manage_roles['nama_pensyarah'] ?>
                            </td>

                            <td class="align-middle">
                                <select class="form-select rounded-pill" name="select_manage_roles" required>

                                <option id="block" value=""><?= $row_manage_roles['roles'] ?></option>
                                    
                                <?php 

                                    $sql_select_manage_roles = "SELECT *
                                        FROM roles 
                                        ORDER BY id_roles ASC
                                    ;";

                                    $result_select_manage_roles = mysqli_query($connect, $sql_select_manage_roles);

                                    $row_select_manage_roles = mysqli_num_rows($result_select_manage_roles);
                                
                                    while($row_select_manage_roles = mysqli_fetch_assoc($result_select_manage_roles)) {

                                        echo '
                                            <option value="'.$row_select_manage_roles['id_roles'].'">
                                            '.$row_select_manage_roles['roles'].'
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
                
            </div>
        </div>
    </div>
</div>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-roles.js"></script>