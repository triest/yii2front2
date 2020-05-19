$(document).ready(function () {
    console.log("reade");
    $.ajax({
        type: "GET",
        url: '/api',
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            var myData = data;
            console.log(myData)
            $('#example').DataTable({
                "data": myData,
                "columns": [
                    { "data": "user.name"},
                    { "data": "city.name"},

                ]
            });

        }
    });
});