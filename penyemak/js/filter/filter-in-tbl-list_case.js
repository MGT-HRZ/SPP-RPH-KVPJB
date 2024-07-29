$(document).ready(function() {
    $("#lec-name-filter-list-case").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_ListCase(value);
    });
});

function filterListNameInTable_ListCase(filterValue) {
    $("#list-lec-name-list-case tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
