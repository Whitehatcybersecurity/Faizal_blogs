document.addEventListener("DOMContentLoaded", function () {
    $("#tblDestination").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: 'getdestinationdata',
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            {
                data: "destination_image",
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        data +
                        '" class="avatar" width="50" height="50"/>'
                    );
                },
            },
            { data: "destination_name" },
            { data: "destination_vlog" },
            { data: "action", orderable: false, searchable: false }
        ],
        error: function (xhr, error, thrown) {
            console.error("DataTables AJAX error:", xhr.responseText);
        }
    });
});

function serialNoCount(nRow, aData, iDisplayIndex) {
    var api = this.api();
    var currentPage = api.page.info().page;
    var index = currentPage * api.page.info().length + (iDisplayIndex + 1);
    $("td:first", nRow).html(index);
    return nRow;
}


$(function () {
    $("form[name='destination']").validate({
        rules: {
            txtMainposterName: "required",
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents(".form-group"));
            } else {
                // This is the default behavior
                // error.insertAfter(element);
                if (element.siblings(".error").html() == undefined) {
                    error.appendTo(element.parent().next(".error"));
                } else {
                    error.appendTo(element.siblings(".error"));
                }
            }
        },
    });
});


//Image Showing
const inputFiles = document.querySelectorAll('input[type="file"]');
const previewImages = document.querySelectorAll('img[id^="previewImage"]');

inputFiles.forEach(function (inputFile, index) {
    inputFile.addEventListener("change", function () {
        const file = this.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            previewImages[index].setAttribute("src", this.result);
        });

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});

function doEdit(id) {
    $("#hdDestinationId").val(id);
    $("#txtDestinationName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Brand");
    getDestinationById(id);
}

function getDestinationById(id) {
    $.ajax({
        type: "GET",
        url: "getdestination/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtDestinationName").val(data.destination.destination_name);
            $("#txtDestinationVlog").val(data.destination.destination_vlog);
            $("#hdDestinationImage").val(data.destination.destination_image);
            $("#previewImage").attr("src", data.destination.destination_image);
            $("#fileDestinationImage").removeAttr("required");
        },
    });
}

function showDelete(id) { 
    confirmDelete(id, "destination/", "tblDestination");
}

//Check Confirmation Before Delete
function confirmDelete(id, url, tblId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "error",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-success me-3",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            doDelete(id, url, tblId);
        }
    });
}

//Delete Data
function doDelete(id, url, tblId) {
    $.ajax({
        type: "GET",
        url: url + id,
        dataType: "json",
        success: function (data) {
            if (data.responseData.alert == "error") {
                Swal.fire({
                    title: "You won't be able to delete this!",
                    text: "This is referred in some other instance!",
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
            } else {
                Swal.fire({
                    icon: "success",
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                });
            }
            refreshDatatable(tblId);
        },
    });
}

//Refresh DataTable After Actions/Functions Called
function refreshDatatable(tblId) {
    $("#" + tblId)
        .DataTable()
        .ajax.reload();
}