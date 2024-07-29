//  The main directory
let fdbck_page = "php/feedback/feedback.php";

function feedback(num_dir, page) {

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
    let fdbck;

    if (page == "Main") {
        /**
         * Set directory for main.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }
    
    else if (page == "Login") {
        /**
         * Set directory for login.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }

    else if (page == "About us") {
        /**
         * Set directory for feedback.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }

    else if (page == "Dashboard") {
        /**
         * Set directory for dashboard.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }

    else if (page == "lecturer-profile") {
        /**
         * Set directory for lecturer-profile.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }

    else if (page == "Profile") {
        /**
         * Set directory for porfile.php
         */

        fdbck = bck_dir[dir] + fdbck_page;

        //  Assign the directory
        window.location.assign(fdbck);
    }

    


}