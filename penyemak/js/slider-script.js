// Initialize the Swiper slider
var TrandingSlider = new Swiper('.tranding-slider', {
    // Enable infinite loop to create a continuous carousel effect
    loop: true,

    // Enable autoplay to automatically transition between slides
    autoplay: {
        // Set the delay between slide transitions to 2000 milliseconds (2 seconds)
        delay: 2000, 

        // Allow autoplay to continue even after user interactions
        disableOnInteraction: false, 
    },

    // Set the slide transition effect to 'coverflow'
    effect: 'coverflow',

    // Enable a grab cursor to indicate that the slider is interactive
    grabCursor: true,

    // Center the slides in the slider container
    centeredSlides: true, 

    // Responsive breakpoints to adjust slidesPerView on different devices
    breakpoints: {
        // When window width is 1200 pixels or larger (larger desktops)
        1200: {
            // Display 4 slides at a time
            // Put 3 because for some reason the slides is working as it should
            slidesPerView: 3, 
        },

        // When window width is 768 pixels or larger (desktop and tablets)
        768: {
            // Automatically adjust the number of slides displayed based on the container width
            slidesPerView: 'auto',
        },

        // When window width is 425 pixels or smaller (phones)
        425: {
            // Automatically adjust the number of slides displayed based on the container width
            slidesPerView: 'auto',
        },

        // When window width is 375 pixels or smaller (phones)
        375: {
            // Automatically adjust the number of slides displayed based on the container width
            slidesPerView: 'auto',
        },

        // When window width is 320 pixels or smaller (phones)
        320: {
            // Automatically adjust the number of slides displayed based on the container width
            slidesPerView: 'auto',
        },
        // Add more breakpoints and corresponding slidesPerView values as needed
    },

    // Set the options for the coverflow effect
    coverflowEffect: {
        // Set the rotation angle of the slides in coverflow mode
        rotate: 0, 

        // Set the amount of stretching applied to the slides
        stretch: 5, 

        // Set the depth of the 3D effect
        depth: 150, 

        // Set the scale factor of the slides
        modifier: 2.5, 

        // Disable shadows on the slides in coverflow mode
        slideShadows: false, 
    },

    // Enable pagination dots for navigation
    pagination: {
        // Set the HTML element to render the pagination dots
        el: '.swiper-pagination', 

        // Allow clicking on the pagination dots to navigate to the corresponding slide
        clickable: true, 
    },

    // Enable navigation buttons (prev/next) for navigation
    navigation: {
        // Set the HTML element for the "next" button
        nextEl: '.swiper-button-next', 

        // Set the HTML element for the "previous" button
        prevEl: '.swiper-button-prev', 
    }
});

// Get the "next" button element and add an event listener to restart autoplay when clicked
var nextButton = document.querySelector('.swiper-button-next');

nextButton.addEventListener('click', function () {
    // Restart the autoplay when the "next" button is clicked
    TrandingSlider.autoplay.start(); 
});

// Get the "prev" button element and add an event listener to restart autoplay when clicked
var prevButton = document.querySelector('.swiper-button-prev');

prevButton.addEventListener('click', function () {
    // Restart the autoplay when the "prev" button is clicked
    TrandingSlider.autoplay.start(); 
});
