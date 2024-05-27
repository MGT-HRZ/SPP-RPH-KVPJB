<?php

    function yearDropdown() {
        $currentYear = date('Y');
        $startYear = 2000;

        //  Adjust the range of years as needed
        for ($year = $currentYear; $year >= $startYear; $year--) {
            echo "<option value=\"$year\">$year</option>";
        }
    }

?>