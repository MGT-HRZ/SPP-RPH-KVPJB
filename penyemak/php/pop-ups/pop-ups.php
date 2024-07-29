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

    if (isset($_GET['ADD-FAIL'])) {
        $wrong_not_complete = $_GET['ADD-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong RPH Submission.</strong> Please do it again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['ADD-LEC-SUCCESS'])) {
        $input_success = $_GET['ADD-LEC-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>New Lecturer Has Been Added.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['ADD-LEC-FAIL'])) {
        $wrong_not_complete = $_GET['ADD-LEC-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong.</strong> Please do it again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['DEL-LEC-SUCCESS'])) {
        $input_success = $_GET['DEL-LEC-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>The Lecturer Has Been Deleted.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['DEL-LEC-FAIL'])) {
        $wrong_not_complete = $_GET['DEL-LEC-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong.</strong> Please do it again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['UPT-PRO-LEC-SUCCESS'])) {
        $input_success = $_GET['UPT-PRO-LEC-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Lecturer Profile Has Been Updated.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['UPT-PRO-LEC-FAIL'])) {
        $wrong_not_complete = $_GET['UPT-PRO-LEC-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong when updating lecturer profile.</strong> Please do it again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['UPT-YR-PRO-SUCCESS'])) {
        $input_success = $_GET['UPT-YR-PRO-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Your Profile Has Been Updated.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['UPT-YR-PRO-FAIL'])) {
        $wrong_not_complete = $_GET['UPT-YR-PRO-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong when updating your profile.</strong> Please do it again !</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['UPDATED'])) {
        $input_success = $_GET['UPDATED'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Data Has Been Updated.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['FAIL'])) {
        //  This is for Data
        $wrong_not_complete = $_GET['FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong with the action.</strong> Please do it again !</div>
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

    if (isset($_GET['NOTSEND-SUCCESS'])) {
        $input_success = $_GET['NOTSEND-SUCCESS'];

        echo '
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Thank you! DNS is send.</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (isset($_GET['NOTSEND-FAIL'])) {
        $wrong_not_complete = $_GET['NOTSEND-FAIL'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">';  

        echo '
            <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>';

        echo '<div><strong>Something when wrong with DNS request.</strong> Please do it again !</div>
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