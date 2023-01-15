$(document).ready(function () {

    // if we the talbe_data_url exists this means we are at a table page.
    if (typeof table_data_url !== 'undefined') {
        renderDataTable();
    }

    $(document).on('submit', 'form[name="create-member"]', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                if (response.reset_form) {
                    $('button[type="reset"]').click();
                }
            }, error: function (response) {
                if (response.status == 422) {
                    $.each(response.responseJSON.errors, function (key, errorsArray) {
                        $.each(errorsArray, function (item, error) {
                            toastr.error(error);
                        });
                    });
                } else {
                    toastr.error(response.responseJSON.message);
                }
            }
        });
    });

});

/**
    * render Datatable
    */
function renderDataTable() {
    $('#myTable').DataTable({
        language: language,
        processing: true,
        serverSide: true,
        ajax: table_data_url,
        columns: getTableColumns(),
    });
}

function getTableColumns() {
    return [{
        data: 'image',
        name: 'image',
        searchable: true,
        orderable: true,
    }, {
        data: 'name',
        name: 'name',
        searchable: true,
        orderable: true,
    }, {
        data: 'title_position',
        name: 'title_position',
        searchable: true,
        orderable: true,
    },
    {
        data: 'email',
        name: 'email',
        searchable: true,
        orderable: true,
    },
    {
        data: 'phone',
        name: 'phone',
        searchable: true,
        orderable: true,
    },
    {
        data: 'show_in_home',
        name: 'show_in_home',
        searchable: true,
        orderable: true,
    },
    {
        data: 'status',
        name: 'status',
        searchable: true,
        orderable: true,
    },
    {
        data: 'actions',
        name: 'actions',
        searchable: false,
        orderable: false,
    },
    ];
}


/**
 * Project Info modal
 */

$('#show-phase-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var phase = JSON.parse(btn.getAttribute('data-phase'));
    var phasePaymentStatus = btn.getAttribute('data-payment-status');
    var phaseProgressStatus = btn.getAttribute('data-progress-status');
    console.log(phasePaymentStatus, phaseProgressStatus);
    var subPhases = JSON.parse(btn.getAttribute('data-sub-phases'));
    $(this).find('#modal-phase-title').text(phase.title);
    $(this).find('#modal-project-no').text(phase.project.no);
    $(this).find('#modal-project-name').text(phase.project.name);
    $(this).find('#modal-project-budget').text(phase.project.budget);
    $(this).find('#modal-phase-budget').text(phase.budget);
    $(this).find('#modal-phase-budget-rate').text(phase.budget_rate);
    $(this).find('#modal-phase-payment-status').text(phasePaymentStatus);
    $(this).find('#modal-phase-progress-status').text(phaseProgressStatus);

    subPhasesForHtml = getSubPhasesForTable(subPhases);
    $(this).find('table .new-recored').remove();
    $(this).find('table').append(subPhasesForHtml);

});

