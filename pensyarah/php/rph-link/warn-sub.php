<?php

    // Set the number of records per page
    $records_per_page = 10; // You can change this value as needed

    // Determine the current page
    if (isset($_GET['warn_sub_page']) && is_numeric($_GET['warn_sub_page'])) {
        $warn_current_page = $_GET['warn_sub_page'];
    } else {
        $warn_current_page = 1;
    }

    // Calculate the limit clause for the SQL query
    $offset = ($warn_current_page - 1) * $records_per_page;
    $limit_clause = "LIMIT $offset, $records_per_page";

    //  Select all data from the database with the limit clause
    $sql_warn_sub = "SELECT tarikh_hantar, link_rph, tahun, minggu, status, comment
            FROM rph
            WHERE id_pensyarah = '$id_pensyarah' AND status = 'TIDAK HANTAR'
            ORDER BY tarikh_hantar DESC
            $limit_clause";

    $result_warn_sub = mysqli_query($connect, $sql_warn_sub);

    // Count the total number of rows in the result set
    $total_rows = mysqli_num_rows($result);

    $numid = ($warn_current_page - 1) * $records_per_page + 1;

    // $total_warning = $total_rows['total_warning'];

    // echo $total_warning;

?>
    
<div class="place2">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="card-title text-dark text-wrap" id="sec_card_title">
            <label>Your Warning Submissions</label>
        </h2>
        <div class="card" id="entire-tbl">
            <div class="card-body overflow-x-auto overflow-y-hidden">
                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Date Send</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Your e-RPH Link</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Year Selected</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Week Selected</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Status</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Comment</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_warn_sub = mysqli_fetch_assoc($result_warn_sub)) {
                            
                    ?>
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid++; ?></th>

                            <td class="align-middle" id="row-content">
                                <?php
                                    echo date_format(date_create($row_warn_sub['tarikh_hantar']), "d/m/Y");  
                                ?>
                            </td>

                            <?php 
                    
                                if ($row_warn_sub['link_rph'] == 'TIADA') {
                                    echo '
                                        <td class="text-center align-middle" id=""><button class="btn btn-danger rounded-pill pl-5 pr-5">DIDN\'T SEND</button></td>
                                    ';
                                }
                            
                            ?>

                            <td class="align-middle" id="row-content"><?= $row_warn_sub['tahun'] ?></td>

                            <td class="align-middle" id="row-content"><?= $row_warn_sub['minggu'] ?></td>

                            <?php 
                    
                                if ($row_warn_sub['status'] == 'HANTAR') {
                                    echo '
                                        <td class="align-middle" id="row-content"><span class="text-success"><i class="fa-solid fa-circle-check fa-2xl"></i></span></td>
                                    ';
                                }

                                else {
                                    echo '
                                        <td class="align-middle" id="row-content"><span class="text-danger"><i class="fa-solid fa-circle-xmark fa-fade fa-2xl"></i></span></td>
                                    ';
                                }
                            
                            ?>

                            <td class="align-middle" id="row-content"><?= $row_warn_sub['comment'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <?php
                // Previous button
                if ($warn_current_page > 1) {
                    echo '<li class="page-item"><a class="page-link rounded-pill" href="?warn_sub_page='.($warn_current_page - 1).'">Previous</a></li>';
                }

                // Previous button
                    echo '<li class="page-item"><label class="page-link border-0">'.$warn_current_page.'</label></li>';

                // Next button
                    echo '<li class="page-item"><a class="page-link rounded-pill" href="?warn_sub_page='.($warn_current_page + 1).'">Next</a></li>';

                ?>
            </ul>
        </nav>
    </div>
</div>