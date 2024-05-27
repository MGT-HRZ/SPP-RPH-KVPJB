function AutoReloadOut(num_dir, timelimit) {
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

    // URL to logout to after inactivity
    const redirectUrl = bck_dir[dir] + '/php/logout/logout.php?out';

    // Set the delay time to 5 seconds (5 * 1000 milliseconds)
    const delayTime = 5 * 1000; // 5 seconds

    // Set the inactivity time limit
    const inactivityTimeLimit = timelimit * 60 * 1000; // in minutes

    let delayTimer;
    let inactivityTimer;

    function startInactivityTimer() {
        inactivityTimer = setTimeout(refreshPage, inactivityTimeLimit);
    }

    function resetTimers() {
        clearTimeout(delayTimer);
        clearTimeout(inactivityTimer);
        delayTimer = setTimeout(startInactivityTimer, delayTime);
    }

    function refreshPage() {
        // You can customize this part to reload the page or perform other actions
        // location.reload();
        window.location.href = redirectUrl;
    }

    // Event listeners to reset the timers on user interaction
    document.addEventListener('mousemove', resetTimers);
    document.addEventListener('keydown', resetTimers);

    // Initial setup
    resetTimers();
}




