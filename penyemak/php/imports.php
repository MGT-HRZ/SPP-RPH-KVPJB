<?php

    /* CSS */

    function conn_css($num_dir) {

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
        $stylecss = $bck_dir[$dir]."css/style.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $stylecss;

    }

    function conn_css_log($num_dir) {

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
        $stylecss = $bck_dir[$dir]."css/style-log.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $stylecss;

    }

    function conn_bootstrap($num_dir) {

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
        $bootstrap = $bck_dir[$dir]."../vendor/bootstrap/Bootstrap v5.3.0/bootstrap-css/bootstrap.min.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $bootstrap;

    }

    function conn_btm_nav_css($num_dir) {

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
        $btmnavcss = $bck_dir[$dir]."css/style-btm-nav.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $btmnavcss;

    }

    function conn_fontawesome_css($num_dir) {

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
        $btmnavcss = $bck_dir[$dir]."../vendor/Font-Awesome-6.x/css/all.min.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $btmnavcss;

    }

    function conn_other_css1($num_dir) {

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
        $btmnavcss1 = $bck_dir[$dir]."../vendor/extra/fontawesome-free/css/all.min.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $btmnavcss1;

    }

    function conn_other_css2($num_dir) {

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
        $btmnavcss2 = $bck_dir[$dir]."../vendor/extra/sb-admin-2.min.css?v=<?php echo time();?>";

        //  Output assign the directory
        echo $btmnavcss2;

    }


    /* JAVASCRIPT */

    function conn_bootstrap_js($num_dir) {

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
        $bootstrap_js = $bck_dir[$dir]."../vendor/bootstrap/Bootstrap v5.3.0/bootstrap-js/bootstrap.bundle.min.js";

        //  Output assign the directory
        echo $bootstrap_js;

    }

    function conn_jquery($num_dir) {

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
        $jquery = $bck_dir[$dir]."../vendor/all-js/jquery/jquery-3.7.1.min.js";

        //  Output assign the directory
        echo $jquery;

    }

    function conn_popper_js($num_dir) {

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
        $popper_js = $bck_dir[$dir]."../vendor/all-js/popper/2.11.8/popper.min.js";

        //  Output assign the directory
        echo $popper_js;

    }