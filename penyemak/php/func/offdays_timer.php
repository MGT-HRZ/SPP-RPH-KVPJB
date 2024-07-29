<?php

    //  Set the time zone to your local time zone (e.g., 'Asia/Kuala_Lumpur')
    date_default_timezone_set('Asia/Kuala_Lumpur');

    //  Define the schedule for online periods
    $onlineDays = [1, 2, 3, 4, 7]; // Monday, Tuesday, Wednesday, Sunday
    $onlineStartTime = "08:00"; // Start Time

    //  Define the schedule for offline periods
    $offlineDays = [4, 5, 6]; // Thursday, Friday, Saturday
    $offlineStartTime = "19:00"; // (7:00 PM, 24-hour format)

    //  Get the current day and time
    $currentDay = date('N'); // 1 (Monday) to 7 (Sunday)
    $currentTime = date('H:i');

?>