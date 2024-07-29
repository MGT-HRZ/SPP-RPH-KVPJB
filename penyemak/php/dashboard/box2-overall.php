<div class="card shadow mb-4" id="modal-form">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Overall RPH Link Delivery Status</h6>
    </div>
    <!-- Card Body -->
    <?php
        
        if ($id_roles == 1) {
            //  Count Sent & Not Send Status
            $sql_pie_chart_overall = "SELECT
                COUNT(CASE WHEN status = 'HANTAR' THEN 1 END) AS sent_count,
                COUNT(CASE WHEN status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count  
                FROM rph
            ;";
        }

        if ($id_roles == 2) {
            //  Count Sent & Not Send Status
            $sql_pie_chart_overall = "SELECT
                COUNT(CASE WHEN rph.status = 'HANTAR' THEN 1 END) AS sent_count,
                COUNT(CASE WHEN rph.status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count  
                FROM rph
                INNER JOIN pensyarah ON rph.id_pensyarah = pensyarah.id_pensyarah
                WHERE pensyarah.nama_pensyarah <> 'DEMO' 
            ;";
        }

        $result_pie_chart_overall = mysqli_query($connect, $sql_pie_chart_overall);

        $row_pie_chart_overall = mysqli_fetch_assoc($result_pie_chart_overall);
    
    ?>
    <div class="card-body">

        <center>
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChartOverall"></canvas>
            </div>
        </center>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle" style="color: #198754;"></i> Sent : <?= $row_pie_chart_overall['sent_count'] ?>
            </span>

            <span class="mr-2">
                <i class="fas fa-circle" style="color: #dc3545;"></i> Not Send : <?= $row_pie_chart_overall['not_sent_count'] ?>
            </span>

            <?php 
                $send_overall = $row_pie_chart_overall['sent_count'];
                $notsend_overall = $row_pie_chart_overall['not_sent_count'];
                
                //  Sends the data to chart-pie.js
                echo "<script>
                    var send_overall = '$send_overall';
                    var notsend_overall = '$notsend_overall';
                </script>";
            ?>
        </div>

    </div>
</div>