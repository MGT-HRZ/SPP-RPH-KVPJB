<?php

    /* ===================================================================
        STILL A WORKING PROGRESS (Cannot proceed cause of automation)
    =================================================================== */


    date_default_timezone_set('Asia/Kuala_Lumpur');

    class CronExpression {

        protected $expression;

        public function __construct($expression)
        {
            $this->expression = $expression;
        }

        public function isDue($currentTime = 'now')
        {
            // Parse the cron expression
            $fields = explode(' ', $this->expression);

            // Check if the current time matches the expression
            list($minute, $hour, $day) = explode(' ', $currentTime);

            return $this->matchField($fields[0], $minute)
                && $this->matchField($fields[1], $hour)
                && $this->matchField($fields[2], $day);
        }

        protected function matchField($expression, $value)
        {
            // Handle wildcard
            if ($expression === '*') {
                return true;
            }

            // Handle single value or range
            if (strpos($expression, '-') !== false) {
                list($start, $end) = explode('-', $expression);
                return $value >= $start && $value <= $end;
            }

            // Handle list of values
            $values = explode(',', $expression);
            return in_array($value, $values);
        }
    }

    // Example usage
    $cron = new CronExpression('52 23 * * 5'); // Run every Friday at 10 PM

    // Loop indefinitely
    while (true) {
        // Check if the cron expression is due
        if ($cron->isDue(date('i H d'))) {
            // Execute the task
            require_once '../../config.php';

            // Define the schedule for not sending
            // $autonotsendDay = [5]; // Friday
            // $autonotsendStartTime = "06:00";
        
            // // Get the current day and time
            // $currentDay_notsend = date('N'); // 1 (Monday) to 7 (Sunday)
            // $currentTime_notsend = date('H:i');
        
            // if (in_array($currentDay_notsend, $autonotsendDay) && ($currentTime_notsend == $autonotsendStartTime)) {
                // Insert data into the database
                $id_pensyarah = 75;
                $id_penyemak = 76;
                $link_rph = "TIADA";
                $sesi = "";
                $tahun = "";
                $minggu = "";
                $status = "TIDAK HANTAR";
        
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
        
                if (mysqli_query($connect, $sql_auto_notsend)) {
                    echo "Record inserted successfully.\n";
                } else {
                    echo "Error inserting record: " . mysqli_error($connect) . "\n";
                }
            //}
        
            mysqli_close($connect);
            break;
        } else {
            // Wait for some time before checking again
            sleep(60); // Sleep for 60 seconds (1 minute)
        }
    }

?>

<?php

//  OLD CODE

// date_default_timezone_set('Asia/Kuala_Lumpur'); // Set the time zone to Malaysia

// class CronExpression
// {
//     protected $expression;

//     public function __construct($expression)
//     {
//         $this->expression = $expression;
//     }

//     public function isDue($currentTime = 'now')
//     {
//         // Parse the cron expression
//         $fields = explode(' ', $this->expression);

//         // Check if the current time matches the expression
//         list($minute, $hour, $day) = explode(' ', $currentTime);

//         return $this->matchField($fields[0], $minute)
//             && $this->matchField($fields[1], $hour)
//             && $this->matchField($fields[2], $day);
//     }

//     protected function matchField($expression, $value)
//     {
//         // Handle wildcard
//         if ($expression === '*') {
//             return true;
//         }

//         // Handle single value or range
//         if (strpos($expression, '-') !== false) {
//             list($start, $end) = explode('-', $expression);
//             return $value >= $start && $value <= $end;
//         }

//         // Handle list of values
//         $values = explode(',', $expression);
//         return in_array($value, $values);
//     }
// }

// // Example usage
// $cron = new CronExpression('41 11 * * 5'); // Run every Friday at 10 PM (in Malaysia time zone)
// $currentDateTime = date('i H d'); // Get the current minute, hour, and day
// if ($cron->isDue($currentDateTime)) {
    
//     require_once '../../config.php';

//     // Define the schedule for not sending
//     // $autonotsendDay = [5]; // Friday
//     // $autonotsendStartTime = "06:00";

//     // // Get the current day and time
//     // $currentDay_notsend = date('N'); // 1 (Monday) to 7 (Sunday)
//     // $currentTime_notsend = date('H:i');

//     // if (in_array($currentDay_notsend, $autonotsendDay) && ($currentTime_notsend == $autonotsendStartTime)) {
//         // Insert data into the database
//         $id_pensyarah = 75;
//         $id_penyemak = 76;
//         $link_rph = "TIADA";
//         $sesi = "";
//         $tahun = "";
//         $minggu = "";
//         $status = "TIDAK HANTAR";

//         $sql_auto_notsend = "INSERT INTO rph (
//             id_pensyarah,
//             id_penyemak,
//             link_rph,
//             sesi,
//             tahun,
//             minggu,
//             tarikh_hantar,
//             masa_hantar,
//             status
//         ) 
        
//         VALUES (
//             '$id_pensyarah',
//             '$id_penyemak',
//             '$link_rph',
//             '$sesi',
//             '$tahun',
//             '$minggu',
//             CURRENT_DATE(),
//             CURRENT_TIME(),
//             '$status'
//         );";

//         if (mysqli_query($connect, $sql_auto_notsend)) {
//             echo "Record inserted successfully.\n";
//         } else {
//             echo "Error inserting record: " . mysqli_error($connect) . "\n";
//         }
//     //}

//     mysqli_close($connect);
// } else {
//     echo "Task is not due.\n";
// }
?>