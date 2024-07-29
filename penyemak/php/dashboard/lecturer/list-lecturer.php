<?php

    $sql_list = "SELECT pensyarah.nama_pensyarah
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            WHERE penyemak.penyemak = '$id_pensyarah' ORDER BY pensyarah.nama_pensyarah ASC;
    ";

    $result_list = mysqli_query($connect, $sql_list);

    $row_list = mysqli_num_rows($result_list);

    $numid_list = 1;

?>

<div class="modal fade" id="listlecturer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Lecturer's Under You</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" style="width: 10%;" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" style="width: 90%;" id="">Lecturer's Name</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_list = mysqli_fetch_assoc($result_list)) { 
                            
                    ?>
                        <tr>
                            <th id="row-content" scope="row"><?php echo $numid_list++; ?></th>

                            <td id=""><?= $row_list['nama_pensyarah'] ?></td>
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