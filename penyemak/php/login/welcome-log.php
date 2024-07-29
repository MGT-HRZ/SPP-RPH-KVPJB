<?php

    //  This file will pop up welcome 

    if (isset($_GET['welcome'])) {
        $input_success = $_GET['welcome'];

        $pro_image = $row['pro_image'];

        if ($pro_image == 'default.png') {
            $image_path = '../../images/icon/'.$pro_image;
            $image_path_online = 'https://meimluonline.github.io/images.meimlu.github.io/icon/'.$pro_image;

            $style_pro_img = '<style>
                #pro-image {
                    width: 150px;
                    height: 150px;

                    /* Cannot drag image */
                    -webkit-user-drag: none;
                    -khtml-user-drag: none;
                    -moz-user-drag: none;
                    user-select: none;
                }
            </style>';

            $img = '<img class="img-profile rounded-circle mt-3 mb-3" id="pro-image" src="'.$image_path.'">';

            //  If internet is available
            $img_online = '<img class="img-profile rounded-circle mt-3 mb-3" id="pro-image" src="'.$image_path_online.'">';
        }

        else {
            $image_path = '../../images/lecturer-profile/'.$pro_image;
            $image_path_online = 'https://meimluonline.github.io/images.meimlu.github.io/lecturer-profile/'.$pro_image;

            $style_pro_img = '<style>
                #pro-image {
                    width: 150px;
                    height: 175px;

                    /* Cannot drag image */
                    -webkit-user-drag: none;
                    -khtml-user-drag: none;
                    -moz-user-drag: none;
                    user-select: none;
                }
            </style>';
            
            $img = '<img class="img-profile rounded-circle mt-3 mb-3" id="pro-image" src="'.$image_path.'">';

            //  If internet is available
            $img_online = '<img class="img-profile rounded-circle mt-3 mb-3" id="pro-image" src="'.$image_path_online.'">';
        }

        echo '
            <!-- Modal -->
            <div class="modal fade" id="welcome" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" id="modal-welcome-dialog">

                        <div class="modal-body text-dark">
                            <center>
                                <h1 class="mt-3">Welcome!</h1>
                                '.$style_pro_img.'
                                '.$img_online.'
                                <p><h3>'.$row['nama_pensyarah'].'</h3></p>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <a href="dashboard.php" class="btn btn-secondary btn-block text-white rounded-pill" style="background-color: #12102f">Close</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $("#welcome").modal("show");
                });
            </script>
        ';

    }
