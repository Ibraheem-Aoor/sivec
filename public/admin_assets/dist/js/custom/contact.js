$(document).ready(function () {

    // render The datatable if we are at a table page
    if (table_data_url !== 'undefined') {
        renderDataTable();
    }

});

/**
    * render Datatable
    */
function renderDataTable() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: table_data_url,
        columns: getTableColumns(),
    });
}

function getTableColumns() {
    return [{
        data: 'name',
        name: 'name',
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
        data: 'email',
        name: 'email',
        searchable: true,
        orderable: true,
    },
    {
        data: 'message',
        name: 'message',
        searchable: true,
        orderable: true,
    },
    {
        data: 'date',
        name: 'created_at',
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

$('#contact-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var message = btn.getAttribute('data-message');
    $(this).find('#message').text(message);

});

