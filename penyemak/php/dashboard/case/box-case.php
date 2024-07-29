<?php

    function NewCase($id_case, $name, $cate, $case_date, $descpt) {
        if ($cate == 'Late Submission') {
            $cate_output = '
                <p class="card-text">Number of Late Submissions : <strong>'.$descpt.'</strong></p>
            ';
        }

        /* else {
            $cate_output = '
                <p class="card-text">'.$descpt.'</p>
            '; 
        } */

        $tag = '
            <div class="card mb-3 rounded-4" id="box-case">
                <div class="card-body">
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Type : '.$cate.'
                    </p>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Date : '.$case_date.'
                    </p>
                        '.$cate_output.'
                    <a href="dashboard/case/btn-attend.php?action='.$id_case.'" class="btn btn-primary rounded-pill float-end">Attend</a>
                    <a href="dashboard/case/btn-reject.php?action='.$id_case.'" class="btn btn-danger rounded-pill mr-2 float-end">Reject</a>
                </div>
            </div>
        ';

        echo $tag;
    }

    function OngoingCase($id_case, $name, $cate, $case_date, $descpt) {
        if ($cate == 'Late Submission') {
            $cate_output = '
                <p class="card-text">Number of Late Submissions : <strong>'.$descpt.'</strong></p>
            ';
        }

        /* else {
            $cate_output = '
                <p class="card-text">'.$descpt.'</p>
            '; 
        } */

        $tag = '
            <div class="card mb-3 rounded-4" id="box-case">
                <div class="card-body">
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Type : '.$cate.'
                    </p>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Date : '.$case_date.'
                    </p>
                        '.$cate_output.'
                    <a href="dashboard/case/btn-settle.php?action='.$id_case.'" class="btn btn-success rounded-pill float-end">Settle</a>
                </div>
            </div>
        ';

        echo $tag;
    }

    function DoneCase($id_case, $name, $cate, $case_date, $descpt) {
        if ($cate == 'Late Submission') {
            $cate_output = '
                <p class="card-text">Number of Late Submissions : <strong>'.$descpt.'</strong></p>
            ';
        }

        /* else {
            $cate_output = '
                <p class="card-text">'.$descpt.'</p>
            '; 
        } */

        $tag = '
            <div class="card mb-3 rounded-4" id="box-case">
                <div class="card-body">
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Type : '.$cate.'
                    </p>
                    <p class="card-subtitle mb-2 text-body-secondary" style="font-size: small;">
                        Case Date : '.$case_date.'
                    </p>
                        '.$cate_output.'
                    <a href="dashboard/case/btn-close.php?action='.$id_case.'" class="btn btn-block rounded-pill">Case Closed</a>
                </div>
            </div>
        ';

        echo $tag;
    }
