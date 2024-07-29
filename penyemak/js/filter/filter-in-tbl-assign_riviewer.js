$(document).ready(function() {
    $("#lec-name-filter-assign-reviewer").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_AssignReviewer(value);
    });
});

function filterListNameInTable_AssignReviewer(filterValue) {
    $("#list-lec-name-assign-reviewer tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
