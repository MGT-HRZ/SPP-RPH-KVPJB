<?php

    $sql_submit_history = "SELECT tarikh_hantar, link_rph, tahun, minggu, status, comment
        FROM rph
        WHERE id_pensyarah = '$id_pensyarah'
        ORDER BY tarikh_hantar DESC
    ;";

    $result_submit_history = mysqli_query($connect, $sql_submit_history);

    $row_submit_history = mysqli_num_rows($result_submit_history);

    $numid_submit_history = 1;

    $numid = 1;

?>

<div class="modal fade" id="archiverph" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Archive e-RPH</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
            <form>
                <div class="row">
                    <div class="col-3">
                        <input type="hidden" value="<?php echo $id_pensyarah; ?>" id="his-idpensyarah">
                        <input type="date" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" id="his-sub-date">
                    </div>

                    <div class="col-3">
                        <select class="form-select bg-light text-dark fw-semibold rounded-pill" name="" id="his-status-filter">
                            <option id="block" value="">Select Status</option>
                            <option value="HANTAR">SENT</option>
                            <option value="TIDAK HANTAR">DIDN'T SEND</option>
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
                        <th scope="col" class="text-center align-middle" id="tbl-header">No.</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Date Send</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Your e-RPH Link</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Year Selected</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Week Selected</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Status</th>
                            <th scope="col" class="text-center align-middle" id="tbl-header">Comment</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-his-sub">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_submit_history = mysqli_fetch_assoc($result_submit_history)) { 
                            
                    ?>
                        <tr>
                            <th id="row-content" class="align-middle" scope="row"><?php echo $numid++; ?></th>

                            <td id="row-content" class="align-middle">
                                <?php
                                    echo date_format(date_create($row_submit_history['tarikh_hantar']), "d/m/Y");  
                                ?>
                            </td>

                            <?php 
                    
                                if ($row_submit_history['link_rph'] == 'TIADA') {
                                    echo '
                                        <td class="text-center align-middle" id=""><a href="#" class="btn btn-danger rounded-pill pl-5 pr-5">DID NOT SEND</a></td>
                                    ';
                                }

                                else {
                                    echo '
                                        <td class="text-center align-middle" id=""><a class="btn btn-primary rounded-pill pl-5 pr-5" target="_blank" href="'.$row_submit_history['link_rph'].'">View</a></td>
                                    ';
                                }
                            
                            ?>

                            <td id="row-content" class="align-middle"><?= $row_submit_history['tahun'] ?></td>

                            <td id="row-content" class="align-middle"><?= $row_submit_history['minggu'] ?></td>

                            <?php 
                    
                                if ($row_submit_history['status'] == 'HANTAR') {
                                    echo '
                                        <td id="row-content" class="align-middle"><span class="text-success"><i class="fa-solid fa-circle-check fa-2xl"></i></span></td>
                                    ';
                                }

                                else {
                                    echo '
                                        <td id="row-content" class="align-middle"><span class="text-danger"><i class="fa-solid fa-circle-xmark fa-fade fa-2xl"></i></span></td>
                                    ';
                                }
                            
                            ?>

                            <td id="row-content" class="align-middle"><?= $row_submit_history['comment'] ?></td>
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

<script>

    $(document).ready(function() {
        var path_overall = null;

        var num_path_overall = $("#num_of_dir").val();
        if (num_path_overall == 2) {
            path_overall = "dashboard/list-delivery-status/submit-history-filter.php";
        } else if (num_path_overall == 3) {
            path_overall = "list-delivery-status/submit-history-filter.php";
        }

        // When any of the specified elements change
        $("#his-sub-date, #his-idpensyarah, #his-status-filter").on('change', function() {
            // Get values from input fields
            var his_sub_date = $("#his-sub-date").val();
            var his_idpensyarah = $("#his-idpensyarah").val();
            var his_status = $("#his-status-filter").val();

            // Make an AJAX request only if both fields have values
            if (his_sub_date || his_idpensyarah || his_status) {
                // Make an AJAX request to the specified URL
                $.ajax({
                    url: path_overall,
                    method: "POST",
                    // Send data to the server
                    data: {
                        his_sub_date: his_sub_date,
                        his_idpensyarah: his_idpensyarah,
                        his_status : his_status
                    },
                    // Handle the successful response from the server
                    success: function(data) {
                        // Update the content of the element with id "list-his-sub"
                        $("#list-his-sub").html(data);
                    }
                });
            } else {
                // If any of the input fields are empty, hide the specified element
                $("#list-his-sub").html(""); // Clear the table
            }
        });
    });

</script>