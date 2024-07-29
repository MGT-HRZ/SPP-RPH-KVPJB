<?php

    $sql_warn_sub = "SELECT tarikh_hantar, link_rph, tahun, minggu, status, comment
        FROM rph
        WHERE id_pensyarah = '$id_pensyarah' AND status = 'TIDAK HANTAR'
        ORDER BY tarikh_hantar DESC
    ;";

    $result_warn_sub = mysqli_query($connect, $sql_warn_sub);

    $row_warn_sub = mysqli_num_rows($result_warn_sub);

    $numid_warn_sub = 1;

    $numid = 1;

?>

<div class="modal fade" id="archivewarnsub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Your Warning Submissions</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
            <form>
                <div class="row">
                    <div class="col">
                        <input type="hidden" value="<?php echo $id_pensyarah; ?>" id="warn-idpensyarah">
                        <input type="date" class="form-control bg-light text-dark fw-semibold border-1 rounded-pill mb-3" id="warn-sub-date">
                    </div>
                    <div class="col-auto">
                        <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                    </div>
                </div>
            </form>

                <table class="table table-striped table-hover" id="warn_sub">
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
                    <tbody class="table-group-divider" id="list-warn-sub">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row_warn_sub = mysqli_fetch_assoc($result_warn_sub)) { 
                            
                    ?>
                        <tr>
                            <th id="row-content" class="align-middle" scope="row"><?php echo $numid++; ?></th>

                            <td id="row-content" class="align-middle">
                                <?php
                                    echo date_format(date_create($row_warn_sub['tarikh_hantar']), "d/m/Y");  
                                ?>
                            </td>

                            <?php 
                    
                                if ($row_warn_sub['link_rph'] == 'TIADA') {
                                    echo '
                                        <td class="text-center align-middle" id=""><a href="#" class="btn btn-danger rounded-pill pl-5 pr-5">DID NOT SEND</a></td>
                                    ';
                                }

                                else {
                                    echo '
                                        <td class="text-center align-middle" id=""><a class="btn btn-primary rounded-pill pl-5 pr-5" target="_blank" href="'.$row_warn_sub['link_rph'].'">View</a></td>
                                    ';
                                }
                            
                            ?>

                            <td id="row-content" class="align-middle"><?= $row_warn_sub['tahun'] ?></td>

                            <td id="row-content" class="align-middle"><?= $row_warn_sub['minggu'] ?></td>

                            <?php 
                    
                                if ($row_warn_sub['status'] == 'HANTAR') {
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

                            <td id="row-content" class="align-middle"><?= $row_warn_sub['comment'] ?></td>
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
            path_overall = "dashboard/list-delivery-status/warn-sub-filter.php";
        } else if (num_path_overall == 3) {
            path_overall = "list-delivery-status/warn-sub-filter.php";
        }

        // When any of the specified elements change
        $("#warn-sub-date, #warn-idpensyarah").on('change', function() {
            // Get values from input fields
            var warn_sub_date = $("#warn-sub-date").val();
            var warn_idpensyarah = $("#warn-idpensyarah").val();

            // Make an AJAX request only if both fields have values
            if (warn_sub_date && warn_idpensyarah) {
                // Make an AJAX request to the specified URL
                $.ajax({
                    url: path_overall,
                    method: "POST",
                    // Send data to the server
                    data: {
                        warn_sub_date: warn_sub_date,
                        warn_idpensyarah: warn_idpensyarah
                    },
                    // Handle the successful response from the server
                    success: function(data) {
                        // Update the content of the element with id "list-warn-sub"
                        $("#list-warn-sub").html(data);
                    }
                });
            } else {
                // If any of the input fields are empty, hide the specified element
                $("#list-warn-sub").html(""); // Clear the table
            }
        });
    });

</script>