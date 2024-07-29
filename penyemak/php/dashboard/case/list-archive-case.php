<?php

    $sql_list_archive = "SELECT pensyarah.nama_pensyarah, 
        cases.kategori,
        cases.tarikh_kes,
        cases.uptime_post,
        cases.post
        FROM cases 
        INNER JOIN pensyarah ON cases.id_pensyarah = pensyarah.id_pensyarah
        WHERE cases.post = 4
        ORDER BY cases.uptime_post DESC;
    ";

    $result_list_archive = mysqli_query($connect, $sql_list_archive);

    $row_list_archive = mysqli_num_rows($result_list_archive);

    $numid_list_archive = 1;

?>

<div class="modal fade" id="archivecase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Archive Cases</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-list-case">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 45%;" id="">Lecturer's Name</th>
                            <th scope="col" class="text-center align-middle" id="">Category</th>
                            <th scope="col" class="text-center align-middle" id="">Case Date</th>
                            <th scope="col" class="text-center align-middle" id="">Closed Date</th>
                            <th scope="col" class="text-center align-middle" id="">Case Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-lec-name-list-case">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_list_archive = mysqli_fetch_assoc($result_list_archive)) { 
                            
                    ?>
                        <tr>
                            <th class="align-middle" id="row-content" scope="row">
                                <?php echo $numid_list_archive++; ?>
                            </th>

                            <td class="align-middle" id="">
                                <?= $row_list_archive['nama_pensyarah'] ?>
                            </td>

                            <td class="align-middle" id="row-content">
                                <?= $row_list_archive['kategori'] ?>
                            </td>

                            <td class="align-middle" id="row-content">
                                <?= $row_list_archive['tarikh_kes'] ?>
                            </td>

                            <td class="align-middle" id="row-content">
                                <?= $row_list_archive['uptime_post'] ?>
                            </td>
                            
                            <td class="align-middle" id="row-content">
                                Closed
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

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-list_case.js"></script>