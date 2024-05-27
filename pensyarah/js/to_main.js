//  The main directory
let main_page = "login.php";

function logo_main(num_dir) {

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
    let main = bck_dir[dir] + main_page;

    //  Assign the directory
    window.location.assign(main);
}

function main(num_dir) {

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
    let main = bck_dir[dir] + main_page;

    //  Assign the directory
    window.location.assign(main);
}