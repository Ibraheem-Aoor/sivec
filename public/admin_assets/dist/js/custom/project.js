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
        data: 'category',
        name: 'category.name',
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

$('#service-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var service = btn.getAttribute('data-service');
    if (service != null) {
        service = JSON.parse(service);
    }
    var avatarPath = btn.getAttribute('data-avatar');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        $(this).find('button[type="reset"]').click();
    } else {
        console.log(service);
        $('#name').val(service.name);
        $('#status').val(service.status);
    }

});

