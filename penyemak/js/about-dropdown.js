// Add JavaScript to handle the icon rotation on click

$(document).ready(function(){
    $('.card-header').on('click', function(){
        $(this).find('.rotate-icon').toggleClass('collapsed');
    });
});