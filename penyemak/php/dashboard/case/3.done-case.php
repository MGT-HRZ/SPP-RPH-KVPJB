<?php
    
    // SQL query to fetch the latest 5 cases with associated lecturer information
    $sql_new_case = "SELECT pensyarah.nama_pensyarah, cases.*
        FROM cases
        INNER JOIN pensyarah ON cases.id_pensyarah = pensyarah.id_pensyarah
        WHERE cases.post = 3
        ORDER BY cases.uptime_post DESC LIMIT 5
    ;";

    // Execute the SQL query
    $result_new_case = mysqli_query($connect, $sql_new_case);

    // Get the number of rows in the result set
    $row_new_case = mysqli_num_rows($result_new_case);

?>

<!-- New Case -->
<div class="card shadow border-success mb-4" id="modal-form">
    <div class="card-header bg-success border-success py-3" id="modal-form">
        <h6 class="m-0 mt-2 mb-3 font-weight-bold text-center">
            <span class="text-success bg-white rounded-circle" style="font-size: medium; padding: 6px 12px 6px 12px;">3</span>
        </h6>
        <h6 class="m-0 font-weight-bold text-white text-center">
            Done
        </h6>
    </div>
    <div class="card-body">
        <?php 
            // Loop through each row in the result set
            while ($row_new_case = mysqli_fetch_assoc($result_new_case)) {

                // Get the lecturer ID for the current case
                $id_case_pensyarah = $row_new_case['id_pensyarah'];

                // SQL query to count the number of records where status is 'TIDAK HANTAR' for the current lecturer
                $sql_all_list_record = "SELECT pensyarah.nama_pensyarah,
                    COUNT(CASE WHEN rph.status = 'TIDAK HANTAR' THEN 1 END) AS not_sent_count   
                    FROM rph
                    INNER JOIN pensyarah ON rph.id_pensyarah = pensyarah.id_pensyarah
                    WHERE rph.id_pensyarah = '$id_case_pensyarah'
                ;";
            
                // Execute the query
                $result_all_list_record = mysqli_query($connect, $sql_all_list_record);
            
                // Fetch the result as an associative array
                $row_all_list_record = mysqli_fetch_assoc($result_all_list_record);

                // Extract relevant information for display
                $id_case = $row_new_case['id_case'];
                $name = $row_new_case['nama_pensyarah'];
                $cate = $row_new_case['kategori'];
                $case_date = date_format(date_create($row_new_case['tarikh_kes']), "d/m/Y");
                $descpt = $row_all_list_record['not_sent_count'];
                $post = $row_new_case['post'];

                // Call a function to display the new case information
                if ($post == 3) {
                    DoneCase($id_case, $name, $cate, $case_date, $descpt);
                }
            }
         ?>
    </div>
</div>