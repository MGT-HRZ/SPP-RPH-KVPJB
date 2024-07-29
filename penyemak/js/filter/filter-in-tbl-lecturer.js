$(document).ready(function() {
    $("#lec-name-filter-lecturer").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        filterListNameInTable_Lecturer(value);
    });
});

function filterListNameInTable_Lecturer(filterValue) {
    $("#list-lec-name-lecturer tr").filter(function() {
        // Get the text of the first <td> (name column)
        var name = $(this).find("td:first").text().toLowerCase();
        $(this).toggle(name.indexOf(filterValue) > -1);
    });
}
