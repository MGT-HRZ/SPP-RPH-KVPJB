function realDay() {

	/**
	 *  starting for Day() function
	 */
    
    let day_ref = document.getElementById("day");

    let day_ref_mobile = document.getElementById("day-mobile");

    let days_of_week = [
        //  "AHAD", "ISNIN", "SELASA", "RABU", "KHAMIS", "JUMAAT", "SABTU"

        "SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"
    ];

    let date_today = new Date();

    let day_today = date_today.getDay();

	//	Main view Day
	day_ref.innerHTML = days_of_week[day_today];

	//	Mobile view Day
	day_ref_mobile.innerHTML = days_of_week[day_today];

}