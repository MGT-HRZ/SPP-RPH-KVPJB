<?php

    // Specify the date
    $set_time_zone = new DateTimeZone('Asia/Kuala_Lumpur');
    $set_date = new DateTime(date("Y-m-d"), $set_time_zone); // Replace with your desired date

    // Get the year and month of the specified date
    $year = $set_date->format('Y');
    $month = $set_date->format('m');

    // Get the day of the month
    $day = $set_date->format('d');

    // Calculate the week of the month
    $week_of_month = ceil($day / 7);

    // Print the result
    // echo "Date: " . $set_date->format('Y-m-d') . " is in week $week_of_month of the month ($year-$month) in Malaysia time.";

    //  echo $week_of_month;

?>