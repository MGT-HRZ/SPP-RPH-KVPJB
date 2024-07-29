<div class="card shadow mb-4" id="modal-form">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Overview RPH Link Delivery Status</h6>
        <!-- <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div> -->
    </div>
    <!-- Card Body -->
    <?php
        //  Count Sent & Not Send Status
        $sql_pie_chart = "SELECT
            COUNT(CASE WHEN status = 'HANTAR' THEN 1 END) AS sent_count,
            COUNT(CASE WHEN status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count  
            FROM rph 
            WHERE id_penyemak = '$id_pensyarah'
        ;";

        $result_pie_chart = mysqli_query($connect, $sql_pie_chart);

        $row_pie_chart = mysqli_fetch_assoc($result_pie_chart);
    
    ?>
    <div class="card-body">

        <center>
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
        </center>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle" style="color: #198754;"></i> Sent : <?= $row_pie_chart['sent_count'] ?>
            </span>

            <span class="mr-2">
                <i class="fas fa-circle" style="color: #dc3545;"></i> Not Send : <?= $row_pie_chart['not_sent_count'] ?>
            </span>

            <?php 
                $send = $row_pie_chart['sent_count'];
                $notsend = $row_pie_chart['not_sent_count'];
                
                //  Sends the data to chart-pie.js
                echo "<script>
                    var send = '$send';
                    var notsend = '$notsend';
                </script>";
            ?>
        </div>

    </div>
</div>