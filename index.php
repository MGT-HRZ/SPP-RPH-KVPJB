<?php

/** 
 *  Connects with js/to_main.js & js/dashboard.js
 *  Also connects with the css & bootstarp
 *  The variable determines the js files directory location
 */

$num_of_dir = 0;
$page_dir = "Main";

require_once 'penyemak/php/imports.php';
require_once 'penyemak/php/import-cdn.php';
require_once 'penyemak/php/images.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="penyemak/css/style-log.css?<?php echo time() ?>">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #spp-rph-ico {
            width: 130px;

            /* Cannot drag image */
            -webkit-user-drag: none;
            -khtml-user-drag: none;
            -moz-user-drag: none;
            user-select: none;
        }

        #login-title {
            margin-top: 1%;
        }

        .image-bckgrd {
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://meimluonline.github.io/images.meimlu.github.io/back-image/kvpjb_edit_1.jpg);
            background-position: center;
            background-size: 1850px;
            position: absolute;
        }

        #place0 {
            margin-top: 5%;
            overflow: hidden;
        }

        .place-btn {
            margin-top: 5%;
            padding-bottom: 50px;
        }

        #btn-page {
            width: 75%;
            transition: 0.5s ease-in-out;
        }

        #btn-page:hover {
            transform: scale(1.05);
        }

        #footer {
            margin-top: 4%;
        }

        @media only screen and (max-width: 768px) {

            /* MOBILE VIEW */
            #place0 {
                margin-top: 25%;
            }
            
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {

            /* IPAD, TABLET VIEW */
            #place0 {
                margin-top: 30%;
            }

            #spp-rph-ico {

                transform: scale(1.2);
            }

            #login-title {
                margin-top: 2%;
            }

            .place-btn {
                transform: scale(1.3);
            }

            #btn-page {
                width: 100%;
            }

            #footer {
                margin-top: 15%;
            }
        }
    </style>

    <?php importCDN_css();
    importCDN_font();
    importCDN_headerICON(); ?>
    <link rel="shortcut icon" href="<?php icon_site($num_of_dir, $page_dir); ?>" type="image/x-icon">
    <title>Welcome | SPP-RPH | KVPJB</title>
</head>

<body class="image-bckgrd">

    <div id="adjt-navbar">
        <nav class="navbar " id="nav-corner" style="background-color: #12102f;">
            <div class="container-fluid">

                <div id="logo-align">
                    <div id="show1">
                        <img src="https://meimluonline.github.io/images.meimlu.github.io/kv-logo/logo-kvpjb-2021%20glow.png" alt="Logo" class="d-inline-block align-text-top" id="kvperd-log">
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <div id="place0">
        <div>
            <div class="text-center">
                <img src="https://meimluonline.github.io/images.meimlu.github.io/icon/e-RPH%20Traker%20Logo.png" id="spp-rph-ico" alt="icon">
            </div>

            <center>
                <p id="login-title" class="fw-semibold text-white">SPP-RPH KVPJB</p>
            </center>

            <center>
                <div class="place-btn">
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-4">
                            <button class="btn btn-primary mt-1 p-3 rounded-pill" id="btn-page" onclick="lecturer_page()"><strong>LECTURER</strong></button>
                        </div>
                    </div>
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-4">
                            <button class="btn btn-primary p-3 rounded-pill" id="btn-page" onclick="reviewer_page()"><strong>REVIEWER</strong></button>
                        </div>
                    </div>
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-4">
                            <button class="btn btn-primary p-3 rounded-pill" id="btn-page" data-bs-toggle="modal" data-bs-target="#adlog"><strong>ADMIN</strong></button>
                        </div>
                    </div>
                </div>
            </center>

            <div>
                <?php include_once 'penyemak/php/ad-login.php'; ?>
            </div>

        </div>

        <div id="footer">
            <footer class="text-center text-white">

                <!-- Copyright -->
                <div class="text-center p-3">
                    <a class="text-white" href="#">MEIMLU</a><label>&nbsp;<i class="fa-regular fa-handshake"></i> KVPJB</label>
                    &copy; 2023/2024
                    <p id="memory">Will Be Always Remembered <i class="fa-solid fa-heart"></i> <a class="text-white" href="#">LUKMAN HAKIM</a></p>
                </div>
                <!-- Copyright -->

            </footer>
        </div>
    </div>

</body>
<script>
    function lecturer_page() {
        var lecturer_page = 'pensyarah/index.php';

        window.location.assign(lecturer_page);
    }

    function reviewer_page() {
        var reviewer_page = 'penyemak/index.php';

        window.location.assign(reviewer_page);
    }
</script>

<?php importCDN_js(); ?>

</html>