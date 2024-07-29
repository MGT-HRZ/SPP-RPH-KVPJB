<?php

    /* ===================================================================
        STILL A WORKING PROGRESS (Cannot proceed cause of automation)
    =================================================================== */


    //  Set the time zone to your local time zone (e.g., 'Asia/Kuala_Lumpur')
    date_default_timezone_set('Asia/Kuala_Lumpur');

    //  Define the schedule for online periods
    $onlineDays_notsend = [1, 2, 3, 4, 7]; // Monday, Tuesday, Wednesday, Sunday
    $onlineStartTime_notsend = "08:00"; // Start Time

    //  Define the schedule for offline periods
    $offlineDays_notsend = [4, 5, 6]; // Thursday, Friday, Saturday
    $offlineStartTime_notsend = "19:00"; // (7:00 PM, 24-hour format)

    $autonotsendDay = [5];
    $autonotsendStartTime = "06:00";

    //  Get the current day and time
    $currentDay_notsend = date('N'); // 1 (Monday) to 7 (Sunday)
    $currentTime_notsend = date('H:i');

    //  Check if the current day is in the list of offline days and the current time is within the scheduled offline period
    // if (in_array($currentDay_notsend, $offlineDays) && ($currentTime_notsend >= $offlineStartTime_notsend)) {
    //     //  Put your code to make the system offline here
    // }

    // elseif (in_array($currentDay_notsend, $onlineDays_notsend) && ($currentTime_notsend >= $onlineStartTime_notsend)) {

    // }

    if (in_array($currentDay_notsend, $autonotsendDay) && ($currentTime_notsend == $autonotsendStartTime)) {

        //  Calls the id's for the lecturers and it's reviewer from function-query.php
        
        //  Gets the values from text field
        //  id_rph is auto_increment in database

        $id_pensyarah = $row_link_rph['pensyarah'];
        $id_penyemak  = $row_link_rph['penyemak'];
        $link_rph = "TIADA";
        $sesi = "";
        $tahun = "";
        $minggu = "";
        $status = "TIDAK HANTAR";

        //  Insert all data to the database
        $sql_auto_notsend = "INSERT INTO rph (
            id_pensyarah,
            id_penyemak,
            link_rph,
            sesi,
            tahun,
            minggu,
            tarikh_hantar,
            masa_hantar,
            status
        ) 
        
        VALUES (
            '$id_pensyarah',
            '$id_penyemak',
            '$link_rph',
            '$sesi',
            '$tahun',
            '$minggu',
            CURRENT_DATE(),
            CURRENT_TIME(),
            '$status'
        );";

        mysqli_query($connect, $sql_auto_notsend);

        // echo '<script>
        //     location.reload();
        // </script>'; 
    }
    
    else {
        echo '<script>
            console.log("All Clear!");
        </script>';
    }

?>