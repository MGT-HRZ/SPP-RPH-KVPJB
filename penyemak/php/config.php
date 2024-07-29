<?php

    //  Database Section

    $server = 'localhost';

    try {
        //  Set mysql credentials
        $dbname = 'u365436325_spp_rph';
        $usrnme = 'u365436325_meimlu';
        $pass = 'Meimlu@123';

        $connect = mysqli_connect($server, $usrnme, $pass, $dbname);

        //  Check for connection errors
        if (!$connect) {
            throw new mysqli_sql_exception(mysqli_connect_error(), mysqli_connect_errno());
        }
    }

    catch (mysqli_sql_exception $e) {

        //  This code checks if there's a duplicate key
        $error_code = $e -> getCode();

        if ($error_code === 502) {
            //  Check for connection errors after retry
            if (!$connect) {
                //  Handle the error after the retry, if needed
                echo "Connection failed after retry: ".mysqli_connect_error();
            }
        } else {
            //  Handle other types of errors, if needed

            /* echo '
                <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center z-1" role="alert">

                    <svg class="bi flex-shrink-0 me-2" width="24" height="30" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
        
                    <div><strong>Unhandled exception: </strong>'.$e->getMessage().'</div>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            '; */

            //  Default mysql credentials
            $dbname = 'spp_rph';
            $usrnme = 'root';
            $pass = '';

            $connect = mysqli_connect($server, $usrnme, $pass, $dbname);
        }
    }

    //  Website Header Section

    $title = ' | SPP-RPH | KVPJB';
    //$title = ' | DLP-DMS | KVPJB';