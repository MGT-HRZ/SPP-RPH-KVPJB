//	random characters
let comer = ", ";

let dash = " - ";

let divider = " | ";

let space = "&nbsp;";

/**
 *  starting for Date() function
 */

//  import date from PHP to JS
let date = document.querySelector('meta[name="date"]').content;

	
/* ================================================================================== */


function realtimeClockDateDay() {

	/**
	 *  starting for Clock() function
	 */

	let rtclock = new Date();

	let hours = rtclock.getHours();
	let minutes = rtclock.getMinutes();
	let seconds = rtclock.getSeconds();
	let ampm;

	/**
	 *  if the hourformat variable = 24, the clock will be come 24-hours
	 * 	if the hourformat variable = 12, the clock will be come 12-hours
	 */
	let hourformat = 12;

	/* 24-HOURS FORMAT */
	if (hourformat == 24) {
		// add AM and PM system
		ampm = (hours < 12) ? "AM" : "PM";
	}

	/* 12-HOURS FORMAT */
	else if (hourformat == 12) {
		/**
		 *  add AM and PM system
		 * 	use ">= 12" to correctly identify afternoon hours.
		 */
		ampm = (hours >= 12) ? "PM" : "AM";

		/**
		 *  convert to 12 hours format
		 * 	use modulus operator to convert to 12-hour format.
		 * 
		 * 	If the expression on the left side of || is false 
		 * 	(evaluates to false, 0, an empty string, null, undefined, or NaN), 
		 * 	it will return the value on the right side. 
		 * 
		 *  Otherwise, it will return the value on the left side.
		 */	
		hours = (hours % 12) || 12;

		//	also convert to 24 hours format
		//	hours = ( hours > 12 ) ? hours - 12 : hours;
	}

	//	pad the hours, minutes and seconds with leading zeros
	hours = ("0" + hours).slice(-2);
	minutes = ("0" + minutes).slice(-2);
	seconds = ("0" + seconds).slice(-2);


	/* ================================================================================== */


	/**
	 *  starting for Day() function
	 */
    
    let day_ref = document.getElementById("day");

    let day_ref_mobile = document.getElementById("day-mobile");

    let days_of_week = [
        //	"AHAD", "ISNIN", "SELASA", "RABU", "KHAMIS", "JUMAAT", "SABTU"

        "SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"
    ];

    let date_today = new Date();

    let day_today = date_today.getDay();


	/* ================================================================================== */


	/**
	 *  display for Clock, Date & Day output
	 */

	//	Main view Day
	day_ref.innerHTML = days_of_week[day_today];

	//	Mobile view Day
	day_ref_mobile.innerHTML = days_of_week[day_today];

	//	Main view Clock & Date
	document.getElementById('clockdate').innerHTML = 
	//	hours + " : " + minutes + " : " + seconds + "\t" + ampm;
		hours + " : " + minutes + "\t" + ampm + divider + date;

	//	Mobile view Clock & Date
	document.getElementById('clockdate-mobile').innerHTML = 
	//	hours + " : " + minutes + " : " + seconds + "\t" + ampm;
		hours + " : " + minutes + "\t" + ampm + comer + date;

	//	Make clock run in real-time
	let t = setTimeout(realtimeClockDateDay, 500);

}