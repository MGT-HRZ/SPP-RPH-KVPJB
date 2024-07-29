<?php

    $gmail_Usr = '';
    $gmail_Pass = '';

    function mailCred($pick) {
        global $gmail_Usr, $gmail_Pass;
        
        if ($pick === 'pensyarah') {
            include_once '../../../env.php';

            //  Gmail address and gmail app password
            $gmail_Usr = $MAIL_USER;
            $gmail_Pass = $MAIL_PASS;
        }

        elseif ($pick === 'penyemak') {
            include_once '../../../../env.php';

            //  Gmail address and gmail app password
            $gmail_Usr = $MAIL_USER;
            $gmail_Pass = $MAIL_PASS;
        }
    }
    
?>