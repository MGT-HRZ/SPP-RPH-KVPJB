//  The main directory
let lecpro_page = "php/lecturer profile/lecturer-profile.php";

function lecpro(num_dir, page) {

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
    let lecpro;

    if (page == "Main") {
        /**
         * Set directory for main.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }
    
    else if (page == "Login") {
        /**
         * Set directory for login.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }

    else if (page == "About us") {
        /**
         * Set directory for feedback.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }

    else if (page == "Feedback") {
        /**
         * Set directory for feedback.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }

    else if (page == "Dashboard") {
        /**
         * Set directory for dashboard.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }

    else if (page == "Profile") {
        /**
         * Set directory for porfile.php
         */

        lecpro = bck_dir[dir] + lecpro_page;

        //  Assign the directory
        window.location.assign(lecpro);
    }

    


}