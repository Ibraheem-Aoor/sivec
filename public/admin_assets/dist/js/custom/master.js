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
        var submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true);
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            processData: false,
            contentType: false,
            data: formData,
            enctype: "multipart/form-data",
            success: function (response) {
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
                if (response.modal_to_hiode) {
                    $(response.modal_to_hiode).modal('hide');
                }
                if (response.html_element_to_change_content) {
                    $(response.html_element_to_change_content).html('');
                    $(response.html_element_to_change_content).html(response.html_element_new_content);
                }
                submitBtn.prop('disabled', false);
            }, error: function (response) {
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
                submitBtn.prop('disabled', false);
            }
        });
    });



    // English Inputs
    // Get all input elements with the specified class
    const inputs = document.querySelectorAll('.en-only');

    // Iterate over each input and attach event listeners
    inputs.forEach((input) => {
        input.addEventListener('input', (event) => {
            const inputValue = event.target.value;
            const englishCharsRegex = /^[a-zA-Z0-9 -]*$/;

            if (!englishCharsRegex.test(inputValue)) {
                const englishCharsOnly = inputValue.replace(/[^a-zA-Z0-9 -]/g, '');
                event.target.value = englishCharsOnly;
            }
        });
    });


    // Arabic Inputs
    // Get all input elements with the specified class
    const arabicInputs = document.querySelectorAll('.ar-only');

    // Iterate over each input and attach event listeners
    arabicInputs.forEach((input) => {
        input.addEventListener('input', (event) => {
            const arabicInputValue = event.target.value;
            const arabicCharsRegex = /^[\u0600-\u06FF0-9 -]*$/;

            if (!arabicCharsRegex.test(arabicInputValue)) {
                const arabicCharsOnly = arabicInputValue.replace(/[^\u0600-\u06FF0-9 -]/g, '');
                event.target.value = arabicCharsOnly;
            }
        });
    });






    /**
         * Master Checkbox trigger
         * */
    $(document).on('change', '#master-checkbox', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#master_checkbox)');
        const isChecked = this.checked;
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
        });
    });

});
