//  The main directory
let aboutus_page = "about us.php";

function about_us(num_dir, page) {

    /** 
     * Make it easier to use the array
     * -    It's starts with 1 instead of 0
     */ 

    let dir = (num_dir - 1);

    /** 
     * List of different back directories
     */

    const bck_dir = [
        /* 0 */    "./",
        /* 1 */    "../",
        /* 2 */    "../../",
        /* 3 */    "../../../",
        /* 4 */    "../../../../",
        /* 5 */    "../../../../../",
    ];

    //  Redirect the choosen directory
    let aboutus;

    if (page == "Main") {
        /**
         * Set directory for main.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }
    
    else if (page == "Login") {
        /**
         * Set directory for login.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }

    else if (page == "lecturer-profile") {
        /**
         * Set directory for lecturer-profile.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }

    else if (page == "Feedback") {
        /**
         * Set directory for feedback.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }

    else if (page == "Dashboard") {
        /**
         * Set directory for dashboard.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }

    else if (page == "Profile") {
        /**
         * Set directory for porfile.php
         */

        aboutus = bck_dir[dir] + aboutus_page;

        //  Assign the directory
        window.location.assign(aboutus);
    }

    


}