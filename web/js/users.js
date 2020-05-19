let dataTable;
let myData;
$(document).ready(function () {
    console.log("reade");
    dataTable = $('#example');
    getData();
});

function getData() {
    $.ajax({
        type: "GET",
        url: '/api',
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            myData = data;
            console.log(myData)
            dataTable.DataTable({
                "data": myData,
                "bProcessing": true,
                "columns": [
                    {"data": "user.name"},
                    {"data": "city.name"},
                    {
                        "mData": null,
                        "bSortable": false,
                        "mRender": function (data, type, full) {
                            return '<a class="btn btn-info btn-sm" href=#/' + data.user.id + ' onclick=deleteUser(' + data.user.id + ')>' + 'Удалить' + '</a>';
                        }
                    }
                ]
            });

        }
    });
}


function addNewUser() {
    $.ajax({
        type: "GET",
        url: '/api/add-rand-user',
        success: function (data) {
            getData()
        }

    })
}

function deleteUser(user_id) {
    console.log(user_id)
    var confirm_var = confirm("Удалить пользователя?");
    if (confirm_var) {
        $.ajax({
            type: "GET",
            url: 'api/delete',
            data: {
                id: user_id
            },
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                this.getData();
            },

        })
    }
}