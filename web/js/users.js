let dataTable;
let myData;
$(document).ready(function () {
    console.log("reade");
    dataTable = $("#example");
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
            dataTable.DataTable({
                "data": myData,
                "bProcessing": true,
                "destroy": true,
                "columns": [
                    {"data": "user.name"},
                    {"data": "city.name"},
                    {
                        "mData": null,
                        "bSortable": false,
                        "mRender": function (data, type, full) {
                            let string = "";
                            let arraySkills = data.skills;
                            let count = 0;
                            arraySkills.forEach(function (item) {
                                count++;
                                if (item.name != "undefined") {
                                    string += item.name;
                                    if (count < arraySkills.length) {
                                        string += ", ";
                                    }
                                }
                            });
                            return string;
                        }
                    },
                    {
                        "mData": null,
                        "bSortable": false,
                        "mRender": function (data, type, full) {
                            return '<a class="btn btn-danger" href=#/' + data.user.id + ' onclick=deleteUser(' + data.user.id + ')>' + 'Удалить' + '</a>';
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
    let confirm_var = confirm("Удалить пользователя?");
    if (confirm_var) {
        $.ajax({
            type: "GET",
            url: 'api/delete',
            data: {
                id: user_id
            },
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                getData()
            },
            fail: function (data) {
                getData()
            }

        })
    }
}