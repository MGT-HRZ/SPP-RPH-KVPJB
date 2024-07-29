$(document).ready(function() {
    $("#lec-name-filter-dep-prog").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_DepProg(value);
    });
});

function filterListNameInTable_DepProg(filterValue) {
    $("#list-lec-name-dep-prog tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
