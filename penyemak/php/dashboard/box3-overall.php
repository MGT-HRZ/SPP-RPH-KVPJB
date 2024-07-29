<?php

    if ($id_roles == 1) {

        $sql_list_record = "SELECT pensyarah.nama_pensyarah,
            COUNT(CASE WHEN rph.status = 'HANTAR' THEN 1 END) AS sent_count,
            COUNT(CASE WHEN rph.status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count   
            FROM penyemak
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
            GROUP BY pensyarah.nama_pensyarah
            ORDER BY pensyarah.nama_pensyarah ASC     
        ;";

        $result_list_record = mysqli_query($connect, $sql_list_record);

        $row_list_record = mysqli_num_rows($result_list_record);

        $numid_list_record = 1;

    }

    elseif ($id_roles == 2) {

        $sql_list_record = "SELECT pensyarah.nama_pensyarah,
            COUNT(CASE WHEN rph.status = 'HANTAR' THEN 1 END) AS sent_count,
            COUNT(CASE WHEN rph.status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count   
            FROM penyemak
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
            WHERE pensyarah.nama_pensyarah <> 'DEMO'
            GROUP BY pensyarah.nama_pensyarah
            ORDER BY pensyarah.nama_pensyarah ASC     
        ;";

        $result_list_record = mysqli_query($connect, $sql_list_record);

        $row_list_record = mysqli_num_rows($result_list_record);

        $numid_list_record = 1;

    }

?>

<div class="card shadow overflow-hidden mb-4" id="modal-form">
    <div class="card-header py-3" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Overall Lecturer's Sent & Not Send Records</h6>
    </div>
    <div class="card-body overflow-x-auto overflow-y-hidden">
        <div>
            <center><input type="text" class="form-control w-75 bg-light text-dark fw-semibold border-1 rounded-pill mb-3" placeholder="Search by Name" id="lec-name-filter-count-overall-dash"></center>
        </div>
        <table class="table table-striped table-hover" id="submit_history">
            <thead>
                <tr>
                    <th scope="col" class="align-middle" id="tbl-header">No.</th>
                    <th scope="col" class="text-center align-middle" style="width: 60%;" id="">Lecturer's Name</th>
                    <th scope="col" class="text-center align-middle" id="">Sent <span class="text-success"><i class="fa-solid fa-circle-check fa-sm"></i></span></th>
                    <th scope="col" class="text-center align-middle" id="">Not Send <span class="text-danger"><i class="fa-solid fa-circle-xmark fa-sm"></i></span></th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="list-lec-name-count-overall-dash">
            <?php 

                //  Continue looping to display data from the database
                while($row_list_record = mysqli_fetch_assoc($result_list_record)) { 
                    
            ?>
                <tr>
                    <th id="row-content" scope="row"><?php echo $numid_list_record++; ?></th>

                    <td id=""><?= $row_list_record['nama_pensyarah'] ?></td>
                    <td id="row-content"><?= $row_list_record['sent_count'] ?></td>
                    <td id="row-content"><?= $row_list_record['not_sent_count'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-count-overall-dash.js"></script>