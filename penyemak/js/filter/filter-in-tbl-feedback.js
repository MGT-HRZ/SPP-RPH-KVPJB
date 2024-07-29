$(document).ready(function() {
    $("#name-filter-feedbacks").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterNameInTable_Feedback(value);
    });
});

function filterNameInTable_Feedback(filterValue) {
    $("#list-feedbacks tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
