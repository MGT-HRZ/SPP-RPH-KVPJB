$(document).ready(function() {
    $("#search-dep").on("change", function() {
        var value = $(this).val().toLowerCase();
        filterSearchDepTable(value);
    });
});

function filterSearchDepTable(filterValue) {
    $("#list-dep tr").filter(function() {
        // Get the text of the third <td> (Department's Name column)
        var departmentName = $(this).find("td:nth-child(3)").text().toLowerCase().trim();
        // Toggle the row based on whether the department name matches the filter value
        $(this).toggle(departmentName.indexOf(filterValue) > -1);
    });
}
