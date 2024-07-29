$(document).ready(function() {
    $("#lec-name-filter-count-overall-dash").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_CountOverallDash(value);
    });
});

function filterListNameInTable_CountOverallDash(filterValue) {
    $("#list-lec-name-count-overall-dash tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
