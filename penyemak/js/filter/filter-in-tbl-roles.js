$(document).ready(function() {
    $("#lec-name-filter-roles").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_Roles(value);
    });
});

function filterListNameInTable_Roles(filterValue) {
    $("#list-lec-name-roles tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
