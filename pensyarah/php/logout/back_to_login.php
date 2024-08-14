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

        // Determine the protocol (HTTP/HTTPS)
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';

        // Construct the base URL
        $base_url = $protocol.$_SERVER['HTTP_HOST'];

        // Handle redirection based on environment
        if ($base_url === 'http://localhost') {
            header("Location: {$base_url}/pensyarah/index.php?not-allowed");
        } elseif ($base_url === 'http://localhost:3000') {
            header("Location: {$base_url}/pensyarah/index.php?not-allowed");
        } elseif ($base_url === 'http://localhost') {
            header("Location: {$base_url}/SPP-RPH-KVPJB/pensyarah/index.php?not-allowed");
        } elseif ($base_url === 'http://localhost:3000') {
            header("Location: {$base_url}/SPP-RPH-KVPJB/pensyarah/index.php?not-allowed");
        } elseif ($base_url === 'https://') {
            header("Location: https://");
        } else {
            // Handle other general local web servers or production environments
            // For example, redirect to a default or relative path
            header("Location: /pensyarah/index.php");
        }

        // Terminate the script after redirection
        exit;

    }

?>