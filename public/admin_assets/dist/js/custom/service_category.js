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
        data: 'name_ar',
        name: 'name_ar',
        searchable: true,
        orderable: true,
    },
    {
        data: 'name_en',
        name: 'name_en',
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

$('#service-category-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var serviceCategory = btn.getAttribute('data-service-category');
    if (serviceCategory != null) {
        serviceCategory = JSON.parse(serviceCategory);
    }
    var avatarPath = btn.getAttribute('data-avatar');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        $(this).find('button[type="reset"]').click();
    } else {
        console.log(serviceCategory);
        $('#name_ar').val(serviceCategory.translations[0].name);
        $('#name_en').val(serviceCategory.translations[1].name);
        $('#status').val(serviceCategory.status);
    }

});

