$(document).ready(function () {


    /* ##############  START DELETE FORM  ##########*/
    $('#delete-modal').on('show.bs.modal', function (e) {
        var btn = e.relatedTarget;
        var deleteUrl = btn.getAttribute('data-delete-url');
        var message = btn.getAttribute('data-message');
        var name = btn.getAttribute('data-name');
        var modalForm = $(this).find('form[name="confirm-delete-form"]');
        modalForm.attr('action', deleteUrl);
        modalForm.attr('method', 'DELETE');
        $(this).find('.modal-body p').text(message + "\t" + name);
    });
    //Handle delete confirmation form
    $(document).on('submit', 'form[name="confirm-delete-form"]', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {},
            success: function (response) {
                if (response.is_deleted) {
                    toastr.success(response.message);
                    $('#row-' + response.row).parent().parent().remove();
                    $('#delete-modal').modal('hide');
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (response) {
                toastr.error(response.message);
            }
        });
    });
    /* ##############  END DELETE FORM  ##########*/




    $(document).on('submit', 'form:not(#confirm-delete-form)', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            processData: false,
            contentType: false,
            data: formData,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                if (response.reset_form) {
                    $('button[type="reset"]').click();
                }
                if (response.refresh_table) {
                    $('#myTable').DataTable().ajax.reload();
                }
                if(response.modal_to_hiode)
                {
                    $(response.modal_to_hiode).modal('hide');
                }
            }, error: function (response) {
                console.log(response);
                if (response.status == 422) {
                    $.each(response.responseJSON.errors, function (key, errorsArray) {
                        $.each(errorsArray, function (item, error) {
                            toastr.error(error);
                        });
                    });
                } else if (response.responseJSON && response.responseJSON.message) {
                    toastr.error(response.responseJSON.message);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });


});
