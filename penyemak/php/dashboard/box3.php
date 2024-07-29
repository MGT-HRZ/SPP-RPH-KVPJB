<?php

    $sql_list_record = "SELECT pensyarah.nama_pensyarah,
        COUNT(CASE WHEN rph.status = 'HANTAR' THEN 1 END) AS sent_count,
        COUNT(CASE WHEN rph.status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count   
        FROM penyemak
        INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
        INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
        WHERE penyemak.penyemak = '$id_pensyarah'
        GROUP BY pensyarah.nama_pensyarah
        ORDER BY pensyarah.nama_pensyarah ASC     
    ;";

    $result_list_record = mysqli_query($connect, $sql_list_record);

    $row_list_record = mysqli_num_rows($result_list_record);

    $numid_list_record = 1;

?>

<div class="card shadow overflow-hidden mb-4" id="modal-form">
    <div class="card-header py-3" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Lecturer's Sent & Not Send Records</h6>
    </div>
    <div class="card-body overflow-x-auto overflow-y-hidden">
        <table class="table table-striped table-hover" id="submit_history">
            <thead>
                <tr>
                    <th scope="col" class="align-middle" id="tbl-header">No.</th>
                    <th scope="col" class="text-center align-middle" style="width: 60%;" id="">Lecturer's Name</th>
                    <th scope="col" class="text-center align-middle" id="">Sent <span class="text-success"><i class="fa-solid fa-circle-check fa-sm"></i></span></th>
                    <th scope="col" class="text-center align-middle" id="">Not Send <span class="text-danger"><i class="fa-solid fa-circle-xmark fa-sm"></i></span></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
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

<!-- Project Card Example -->
<!-- <div class="card shadow mb-4" id="modal-form">
    <div class="card-header py-3" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
    </div>
    <div class="card-body">
        <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div> -->

<!-- Color System -->
<!-- <div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card bg-primary text-white shadow rounded-pill">
            <div class="card-body">
                Primary
                <div class="text-white-50 small">#4e73df</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-success text-white shadow rounded-pill">
            <div class="card-body">
                Success
                <div class="text-white-50 small">#1cc88a</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-info text-white shadow rounded-pill">
            <div class="card-body">
                Info
                <div class="text-white-50 small">#36b9cc</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-warning text-white shadow rounded-pill">
            <div class="card-body">
                Warning
                <div class="text-white-50 small">#f6c23e</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-danger text-white shadow rounded-pill">
            <div class="card-body">
                Danger
                <div class="text-white-50 small">#e74a3b</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-secondary text-white shadow rounded-pill">
            <div class="card-body">
                Secondary
                <div class="text-white-50 small">#858796</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-light text-black shadow rounded-pill">
            <div class="card-body">
                Light
                <div class="text-black-50 small">#f8f9fc</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-dark text-white shadow rounded-pill">
            <div class="card-body">
                Dark
                <div class="text-white-50 small">#5a5c69</div>
            </div>
        </div>
    </div>
</div> -->