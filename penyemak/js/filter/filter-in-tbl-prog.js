$(document).ready(function() {
    $("#search-prog").on("change", function() {
        var value = $(this).val().toLowerCase();
        filterSearchProgTable(value);
    });
});

function filterSearchProgTable(filterValue) {
    $("#list-prog tr").filter(function() {
        // Get the text of the third <td> (Department's Name column)
        var progName = $(this).find("td:nth-child(5)").text().toLowerCase().trim();
        // Toggle the row based on whether the department name matches the filter value
        $(this).toggle(progName.indexOf(filterValue) > -1);
    });
}