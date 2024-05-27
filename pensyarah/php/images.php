<?php

    //  Icon Section

    function icon_site($num_dir, $page) {

        /**
         * Can make new variables if new images needed
         */

        $icon = "../images/kv-logo/logo-kvpjb-icon.png";
        $icon_jtm = "../images/kv-logo/Logo JTM glow.png";

        /** 
         * Make it easier to use the array
         * -    It's starts with 1 instead of 0
         */ 

        $dir = ($num_dir - 1);

        /**
         * Change directory path
         */

        $bck_dir = array(
            /* 0 */    "./",
            /* 1 */    "../",
            /* 2 */    "../../",
            /* 3 */    "../../../",
            /* 4 */    "../../../../",
            /* 5 */    "../../../../../",
        );

        if ($page == "Main") {
            /**
             * Set icons for main.php
             */

            $icon_main = $bck_dir[$dir].$icon;
            echo $icon_main;
        }

        elseif ($page == "About us") {
            /**
             * Set icons for about us.php
             */

            $icon_main = $bck_dir[$dir].$icon;
            echo $icon_main;
        }
        
        elseif ($page == "Login") {
            /**
             * Set icons for login.php
             */

            $icon_login = $bck_dir[$dir].$icon;
            echo $icon_login;
        }

        elseif ($page == "lecturer-profile") {
            /**
             * Set images for lecturer-profile.php
             */

            $icon_lecpro = $bck_dir[$dir].$icon;
            echo $icon_lecpro;
        }

        elseif ($page == "Feedback") {
            /**
             * Set images for feedback.php
             */

            $icon_feedback = $bck_dir[$dir].$icon;
            echo $icon_feedback;
        }

        elseif ($page == "Dashboard") {
            /**
             * Set icons for dashboard.php
             */

            $icon_dashboard = $bck_dir[$dir].$icon;
            echo $icon_dashboard;
        }

        elseif ($page == "Update Default Password") {
            /**
             * Set icons for update-default-pass.php
             */

            $icon_update_df_pass = $bck_dir[$dir].$icon;
            echo $icon_update_df_pass;
        }
        
    }

    //  Nav Logo Section

    function nav_logo_main($num_dir, $page, $logo) {

        /**
         * Can make new variables if new images needed
         */

         $nav_logo = "../images/kv-logo/logo-kvpjb-2021 glow.png";
         $nav_logo_jtm = "../images/kv-logo/Logo JTM glow.png";

         /** 
         * Make it easier to use the array
         * -    It's starts with 1 instead of 0
         */ 

        $dir = ($num_dir - 1);

        /**
         * Change directory path
         */

        $bck_dir = array(
            /* 0 */    "./",
            /* 1 */    "../",
            /* 2 */    "../../",
            /* 3 */    "../../../",
            /* 4 */    "../../../../",
            /* 5 */    "../../../../../",
        );

        if ($page == "Main") {
            /**
             * Set images for main.php
             */

            if ($logo == "kvperd") {
                $nav_logo_main = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_main;
            }
            
            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "About us") {
            /**
             * Set icons for about us.php
             */

            if ($logo == "kvperd") {
                $nav_logo_abtus = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_abtus;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "Login") {
            /**
             * Set images for login.php
             */

            if ($logo == "kvperd") {
                $nav_logo_login = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_login;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "lecturer-profile") {
            /**
             * Set images for lecturer-profile.php
             */

            if ($logo == "kvperd") {
                $nav_logo_lecpro = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_lecpro;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "Feedback") {
            /**
             * Set images for feedback.php
             */

            if ($logo == "kvperd") {
                $nav_logo_feedback = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_feedback;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "Home") {
            /**
             * Set images for home.php
             */

            if ($logo == "kvperd") {
                $nav_logo_home = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_home;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "Dashboard") {
            /**
             * Set images for dashboard.php
             */

            if ($logo == "kvperd") {
                $nav_logo_profile = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_profile;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }

        elseif ($page == "Update Default Password") {
            /**
             * Set images for update-default-pass.php
             */

            if ($logo == "kvperd") {
                $nav_logo_profile = $bck_dir[$dir].$nav_logo;
                echo $nav_logo_profile;
            }

            elseif ($logo == "jtm") {
                $nav_sub1 = $bck_dir[$dir].$nav_logo_jtm;
                echo $nav_sub1;
            }
        }
        
    }