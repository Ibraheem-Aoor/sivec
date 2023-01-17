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
        data: 'image',
        name: 'image',
        searchable: false,
        orderable: false,
    },
    {
        data: 'name',
        name: 'name',
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

$('#client-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    var client = btn.getAttribute('data-client');
    if (client != null) {
        client = JSON.parse(client);
    }
    var imagePath = btn.getAttribute('data-image');
    if (isCreate == 1) {
        $(this).find('button[type="reset"]').click();
    } else {
        console.log(client);
        $('#name').val(client.name);
        $('#email').val(client.email);
        $('#phone').val(client.phone);
    }

});

