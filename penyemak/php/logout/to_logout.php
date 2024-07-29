<?php

    function logout($num_dir) {

        //  The main directory
        //$logout_func = "logout/logout.php?out";

        /** 
         * Make it easier to use the array
         * -    It's starts with 1 instead of 0
         */ 

        $dir = ($num_dir - 1);

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
        $logout_dir = $bck_dir[$dir];

        //  Assign the directory to logout and outputs the button
        echo "<a href='".$logout_dir."logout/logout.php?out' class='btn btn-danger btn-block rounded-pill' id='logout'><b>Log Out</b></a>";
        
    }