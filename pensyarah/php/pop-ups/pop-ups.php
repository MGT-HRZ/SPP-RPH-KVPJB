<?php

    //  This file connects with login.php, feedback.php & dashboard.php

    if (isset($_GET['ADD-SUCCESS'])) {
        $input_success = $_GET['ADD-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Thank you! For your RPH Submission.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['NOT-COMPLETED'])) {
        $wrong_not_complete = $_GET['NOT-COMPLETED'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>The form isn\'t complete.</strong> Please check again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['FAIL!'])) {
        $wrong_fail = $_GET['FAIL!'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div>Check your <strong>no. ic</strong> & <strong>password </strong>again.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['DUPLICATE-KEY'])) {
        $wrong_duplicatekey = $_GET['DUPLICATE-KEY'];

        echo '
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div>Their maybe a <strong>duplicate key</strong>. Please check again.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['FEEDBACK-SUCCESS'])) {
        $input_fb_success = $_GET['FEEDBACK-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Thank you! For your feedback.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['FEEDBACK-FAIL'])) {
        $wrong_fb_fail = $_GET['FEEDBACK-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong with your feedback</strong>. Please check again.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }