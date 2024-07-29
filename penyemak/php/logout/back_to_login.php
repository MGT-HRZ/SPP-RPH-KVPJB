<?php

    function back_to_login($num_dir) {

        $file_name = 'login.php';

        /** 
         * Make it easier to use the array
         * -    It's starts with 1 instead of 0
         */ 

        $dir = (($num_dir + 2) - 1);

        /** 
         * List of different back directories
         */

        $bck_dir = array(
            /* 0 */    "./",
            /* 1 */    "../",
            /* 2 */    "../../",
            /* 3 */    "../../../",
            /* 4 */    "../../../../",
            /* 5 */    "../../../../../",
        );

        //  Redirect the choosen directory
        $back_to_main = header("Location: ".$bck_dir[$dir].$file_name."?cannot");
        
        //  Output assign the directory
        echo $back_to_main;

    }

?>


