<?php

if ($id_roles == 1) {
    
    $sql_name_filter = "SELECT t1.nama_pensyarah AS nama_pensyarah, 
        t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t1.id_pensyarah <> '$id_pensyarah'
        && t1.id_roles <> 1               
        ORDER BY nama_pensyarah ASC        
    ;";

}

elseif ($id_roles == 2) {
    
    $sql_name_filter = "SELECT t1.nama_pensyarah AS nama_pensyarah, 
        t2.nama_pensyarah AS nama_penyemak
        FROM penyemak
        INNER JOIN pensyarah AS t1 ON penyemak.pensyarah = t1.id_pensyarah
        INNER JOIN pensyarah AS t2 ON penyemak.penyemak = t2.id_pensyarah
        WHERE t1.nama_pensyarah <> 'DEMO'
        && t1.id_pensyarah <> '$id_pensyarah'
        && t1.id_roles <> 1      
        ORDER BY nama_pensyarah ASC        
    ;";

}

    $result_name_filter = mysqli_query($connect, $sql_name_filter);

    $row_name_filter = mysqli_num_rows($result_name_filter);

    $numid_name_filter = 1;

?>

<input type="number" class="d-none" value="<?php echo $num_of_dir; ?>" id="num_of_dir">

<!-- Area Chart -->
<div class="card shadow mb-4 overflow-hidden" id="modal-form">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Overall Lecturer's e-RPH Delivery Status</h6>
        <div class="dropdown no-arrow">
            <button type="button" class="btn btn-secondary dropdown-toggle rounded-pill" data-bs-toggle="modal" data-bs-target="#overallfilter" aria-expanded="false">
                Filter
                <i class="fa-solid fa-angle-down fa-xs"></i>
            </button>
            <button type="button" class="btn btn-primary dropdown-toggle rounded-circle"  onclick="location.reload()">
                <i class="fa-solid fa-rotate"></i>
            </button>
            
            <!-- Modal -->
            <form action="" method="">
                <div class="modal fade" id="overallfilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="modal-form">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Overall Filter</h1>
                                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body row g-3 p-4">
                                <div class="col-md-12">
                                    <label class="form-label">Lecturer's Name</label>
                                    <select class="form-select rounded-pill" id="text-filter1_overall" name="">
                                        <option id="block" value="">Select a Lecturer</option>
                                        <?php while($row_name_filter = mysqli_fetch_assoc($result_name_filter)) { ?>

                                            <option value="<?= $row_name_filter['nama_pensyarah'] ?>">
                                            <?= $row_name_filter['nama_pensyarah'] ?>
                                            </option>

                                        <?php } ?>
                                    </select>

                                    <input type="text" class="d-none" value="<?php echo $id_pensyarah; ?>" id="id-pensyarah_overall" placeholder="">
                                    <input type="text" class="d-none" value="<?php echo $id_roles; ?>" id="id-roles_overall">
                                </div>
                                
                                <!-- <div class="col-9">
                                    <label class="form-label">Session</label>
                                    <select class="form-select rounded-pill" name="">
                                        <option id="block" value="">Select Session</option>
                                        <option value="">Session 1</option>
                                        <option value="">Session 2</option>
                                    </select>
                                </div> -->

                                <div class="col-6">
                                    <label class="form-label">SVM or Diploma Week</label>
                                    <select class="form-select rounded-pill" id="dropdown-filter1_overall">
                                        <?php svmListWeek(); diplomaListWeek(); ?>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select rounded-pill" name="" id="status-filter_overall">
                                        <option id="block" value="">Select Status</option>
                                        <option value="HANTAR">SENT</option>
                                        <option value="TIDAK HANTAR">DIDN'T SEND</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control text-dark rounded-pill" name="tarikh_sebenar" id="date-filter_overall">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Year</label>
                                    <select class="form-select rounded-pill" id="year-filter_overall">
                                        <option id="block" value="">Select Year</option>
                                        <?php yearDropdown() ?>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="submit" class="btn btn-primary btn-block">Set</button> -->
                                <button type="reset" class="btn btn-danger btn-block rounded-pill">Reset</button>
                            </div>   
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body overflow-x-auto overflow-y-hidden">
    <?php

    if ($id_roles == 1) {

        $sql_rph_status_overall = "SELECT pensyarah.nama_pensyarah, rph.id_rph, rph.link_rph, 
            rph.minggu, rph.tarikh_hantar, rph.masa_hantar, rph.status, rph.comment
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
            ORDER BY rph.tarikh_hantar DESC, rph.masa_hantar DESC
            LIMIT 10
        ;";

        $result_rph_status_overall = mysqli_query($connect, $sql_rph_status_overall);

        $row_rph_status_overall = mysqli_num_rows($result_rph_status_overall);

        $numid_rph_status_overall = 1;

    }

    elseif ($id_roles == 2) {

        $sql_rph_status_overall = "SELECT pensyarah.nama_pensyarah, rph.id_rph, rph.link_rph, 
            rph.minggu, rph.tarikh_hantar, rph.masa_hantar, rph.status, rph.comment
            FROM penyemak 
            INNER JOIN pensyarah ON penyemak.pensyarah = pensyarah.id_pensyarah
            INNER JOIN rph ON penyemak.pensyarah = rph.id_pensyarah
            WHERE pensyarah.nama_pensyarah <> 'DEMO'
            ORDER BY rph.tarikh_hantar DESC, rph.masa_hantar DESC
            LIMIT 10
        ;";

        $result_rph_status_overall = mysqli_query($connect, $sql_rph_status_overall);

        $row_rph_status_overall = mysqli_num_rows($result_rph_status_overall);

        $numid_rph_status_overall = 1;

    }

    ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="align-middle" style="width: 10%;" id="tbl-header">No.</th>
                    <th scope="col" class="text-center align-middle" id="">Lecturer's Name</th>
                    <th scope="col" class="text-center align-middle" id="">e-RPH Link</th>
                    <th scope="col" class="text-center align-middle" id="">Week</th>
                    <th scope="col" class="text-center align-middle" id="">Send Date</th>
                    <th scope="col" class="text-center align-middle" id="">Comment</th>
                    <th scope="col" class="text-center align-middle" id="">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="overallDeliveryStatus">
            <?php 

                //  Continue looping to display data from the database
                while($row_rph_status_overall = mysqli_fetch_assoc($result_rph_status_overall)) {
                    
                    $row_rph_status_overall_date = date_format(date_create($row_rph_status_overall['tarikh_hantar']), "d/m/Y");
                    
            ?>
                <tr>
                    <th class="align-middle" id="row-content" scope="row"><?php echo $numid_rph_status_overall++; ?></th>

                    <td class="align-middle" id=""><?= $row_rph_status_overall['nama_pensyarah'] ?></td>

                    <?php 
                    
                        if ($row_rph_status_overall['link_rph'] == 'TIADA') {
                            echo '
                                <td class="align-middle text-center" id=""><button class="btn btn-danger rounded-pill pl-5 pr-5">DIDN\'T SEND</button></td>
                            ';
                        }

                        else {
                            echo '
                                <td class="align-middle text-center" id=""><a class="btn btn-primary rounded-pill pl-5 pr-5" target="_blank" href="'.$row_rph_status_overall['link_rph'].'">View</a></td>
                            ';
                        }
                    
                    ?>
                    
                    <td class="align-middle text-center" id=""><?= $row_rph_status_overall['minggu'] ?></td>
                    <td class="align-middle text-center" id=""><?php echo $row_rph_status_overall_date ?></td>

                    <?php 
                    
                        /* if ($row_rph_status_overall['comment'] == null) {
                            echo '
                                <td class="align-middle text-center" id=""></td>
                            ';
                        }

                        else {
                            echo '
                                <td class="align-middle text-center" data-bs-toggle="modal" data-bs-target="#dnscomment'.$row_rph_status_overall['id_rph'].'" id=""><button class="btn btn-info btn-block rounded-pill pl-5 pr-5"><i class="fa-regular fa-clipboard fa-xl" ></i></button></td>
                            ';
                        } */

                        echo '
                            <td class="align-middle text-center" data-bs-toggle="modal" data-bs-target="#dnscomment'.$row_rph_status_overall['id_rph'].'" id=""><button class="btn btn-info btn-block rounded-pill pl-5 pr-5"><i class="fa-regular fa-clipboard fa-xl" ></i></button></td>
                        ';
                    
                    ?>

                    <?php 
                    
                        if ($row_rph_status_overall['status'] == 'HANTAR') {
                            echo '
                                <td class="align-middle text-center" id=""><span class="text-success"><i class="fa-solid fa-circle-check fa-2xl"></i></span></td>
                            ';
                        }

                        else {
                            echo '
                                <td class="align-middle text-center" id=""><span class="text-danger"><i class="fa-solid fa-circle-xmark fa-fade fa-2xl"></i></span></td>
                            ';
                        }
                    
                    ?>
                    
                </tr>

                <form action="dashboard/list-delivery-status/upt_comment.php" method="post">
                <div class="modal fade" id="dnscomment<?= $row_rph_status_overall['id_rph'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content rounded-4">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-semibold">DNS Comment</h1>
                                <button type="button" class="btn-close rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body row g-3 p-4">
                                <div class="col-md-12">
                                    <label class="form-label text-dark">Lecturer's Name</label>
                                    <input type="text" class="form-control rounded-pill" value="<?= $row_rph_status_overall['nama_pensyarah'] ?>" disabled>
                                    <input type="text" class="d-none" name="idrph" value="<?= $row_rph_status_overall['id_rph'] ?>">
                                </div>

                                <div class="col-6">
                                    <label class="form-label text-dark">Week</label>
                                    <input type="text" class="form-control rounded-pill" value="<?= $row_rph_status_overall['minggu'] ?>" disabled>
                                </div>

                                <div class="col-6">
                                    <label class="form-label text-dark">Send Date</label>
                                    <input type="text" class="form-control rounded-pill" value="<?php echo $row_rph_status_overall_date ?>" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Your Current Comment</label>
                                    <textarea rows="3" name="comment" class="form-control text-dark" style="border-radius: 20px;" placeholder="<?= $row_rph_status_overall['comment'] ?>" disabled></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Update Comment</label>
                                    <textarea rows="3" name="newcomment" class="form-control text-dark" style="border-radius: 20px;" placeholder="Update Comment Here..."></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block rounded-pill" name="update-comment"><strong>Save</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<script>

    var num_path_overall = document.getElementById("num_of_dir").value;
    var path_overall = null;

    if (num_path_overall == 2) {
        path_overall = "dashboard/list-delivery-status/overall_filter.php";
    }

    else if (num_path_overall == 3) {
        path_overall = "list-delivery-status/overall_filter.php";
    }

    $(document).ready(function() {

        // When any of the specified elements change
        $("#text-filter1_overall, #id-pensyarah_overall, #dropdown-filter1_overall, #status-filter_overall, #date-filter_overall, #year-filter_overall, #id-roles_overall").on('change', function() {
            // Get values from input fields
            var input_filter1_overall = $("#text-filter1_overall").val();
            var input_id_pensyarah_overall = $("#id-pensyarah_overall").val();
            var dropdown_filter1_overall = $("#dropdown-filter1_overall").val();
            var status_filter_overall = $("#status-filter_overall").val();
            var date_filter_overall = $("#date-filter_overall").val();
            var year_filter_overall = $("#year-filter_overall").val();
            var input_roles_overall = $("#id-roles_overall").val();

            // Check if any of the input fields have a value
            if (
                input_filter1_overall != "" 
                || input_id_pensyarah_overall != "" 
                || dropdown_filter1_overall != ""
                || status_filter_overall != ""
                || date_filter_overall != ""
                || year_filter_overall != ""
                || input_roles_overall != ""
            ) {
                // Make an AJAX request to the specified URL
                $.ajax({
                    url: path_overall,
                    method: "POST",
                    // Send data to the server
                    data: {
                        input_filter1_overall: input_filter1_overall,
                        input_id_pensyarah: input_id_pensyarah_overall,
                        dropdown_filter1_overall: dropdown_filter1_overall,
                        status_filter_overall: status_filter_overall,
                        date_filter_overall: date_filter_overall,
                        year_filter_overall: year_filter_overall,
                        input_roles_overall: input_roles_overall
                    },
                    // Handle the successful response from the server
                    success:function(data) {
                        // Update the content of the element with id "overallDeliveryStatus"
                        $("#overallDeliveryStatus").html(data);
                    }
                });
            } 
            // If none of the input fields have a value, hide the specified element
            else {
                $("#overallDeliveryStatus").css("display", "none");
            }
        });
    });

</script>