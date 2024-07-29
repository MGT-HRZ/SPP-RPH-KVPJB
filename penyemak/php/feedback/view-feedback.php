<?php

    $sql_view_feedback = "SELECT *
        FROM feedback
        ORDER BY timestamp DESC
        LIMIT 10
    ;";

    $result_view_feedback = mysqli_query($connect, $sql_view_feedback);

    $row_view_feedback = mysqli_num_rows($result_view_feedback);

    $numid_view_feedback = 1;

    $feedback_data = [];

    while ($row_view_feedback = mysqli_fetch_assoc($result_view_feedback)) {
        $feedback_data[] = $row_view_feedback;
    }

?>

<div class="modal fade" id="viewfeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Feedbacks</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" tabindex="0">
                <div>
                    <input type="text" class="form-control bg-light border-1 rounded-pill mb-3" placeholder="Search by Name" id="name-filter-feedbacks">
                </div>

                <table class="table table-striped table-hover" id="submit_history">
                    <thead>
                        <tr>
                            <th scope="col" class="" id="tbl-header">No.</th>
                            <th scope="col" class="" style="width: 45%;" id="">User Name</th>
                            <th scope="col" class="text-center" id="">IC Number</th>
                            <th scope="col" class="text-center" id="">Feedback</th>
                            <th scope="col" class="text-center" id="">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="list-feedbacks">
                    <?php 

                        //  Continue looping to display data from the database
                        foreach($feedback_data as $row_view_feedback) { 
                            
                    ?>
                        <tr>
                            <th class="align-middle" id="row-content" scope="row"><?php echo $numid_view_feedback++; ?></th>
                            
                            <td class="align-middle" id="">
                                <?= $row_view_feedback['user_name'] ?>
                            </td>

                            <td class="align-middle" id="row-content">
                                <?= $row_view_feedback['user_noic'] ?>
                            </td>

                            <td class="align-middle text-wrap">
                                <a href="#" class="btn btn-primary btn-block rounded-pill" data-bs-target="#showfeedback<?= $row_view_feedback['id_feedback'] ?>" data-bs-toggle="modal">
                                    View
                                </a>
                            </td>
                            
                            <td class="align-middle" id="row-content">
                                <?= $row_view_feedback['timestamp'] ?>
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

<?php

    foreach ($feedback_data as $row_view_feedback) {

?>

<div class="modal fade" id="showfeedback<?= $row_view_feedback['id_feedback'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content" id="modal-form">
            <div class="modal-header bg-light z-1">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Feedbacks</h1>
                <button type="button" class="btn-close rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row g-3 p-4" tabindex="0">
                <div class="col-md-12">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control rounded-pill text-dark" value="<?= $row_view_feedback['user_name'] ?>" disabled>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Timestamp</label>
                    <input type="text" class="form-control rounded-pill text-dark" value="<?= $row_view_feedback['timestamp'] ?>" disabled>
                </div>
                <div class="col-12">
                    <label for="textInput" class="form-label">User Feedback</label>
                    <textarea rows="10" id="textInput" name="feedback" class="form-control" style="border-radius: 20px;" placeholder="<?= $row_view_feedback['user_feedback'] ?>" disabled></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-secondary btn-block rounded-pill" data-bs-target="#viewfeedback" data-bs-toggle="modal">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<!-- Connects links to the about filter table function -->
<script src="../js/filter/filter-in-tbl-feedback.js"></script>