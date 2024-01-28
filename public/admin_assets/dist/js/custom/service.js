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
        order:[[
            3,
            'desc'
        ]],
    });
}

function getTableColumns() {
    return [{
        data: 'name',
        name: 'name',
        searchable: true,
        orderable: false,
    },
    {
        data: 'category',
        name: 'category',
        searchable: true,
        orderable: false,
    },
    {
        data: 'status',
        name: 'status',
        searchable: true,
        orderable: false,
    },
    {
        data: 'created_at',
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

$('#service-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var service = btn.getAttribute('data-service');
    if (service != null) {
        service = JSON.parse(service);
    }
    var imagePath = btn.getAttribute('data-image');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        document.getElementById('image-input-wrapper').style.backgroundImage = "url(" + globals.placeholder_image + ")";
        $(this).find('button[type="reset"]').click();
        $(this).find('textarea').text('');
    } else {
        document.getElementById('image-input-wrapper').style.backgroundImage = "url(" + imagePath + ")";
        $('#name_ar').val(btn.getAttribute('data-name-ar'));
        $('#name_en').val(btn.getAttribute('data-name-en'));
        $('#category_id').val(btn.getAttribute('data-category-id'));
        $('#status').val(btn.getAttribute('data-status'));
        $('#details_ar').text(btn.getAttribute('data-details-ar'));
        $('#details_en').text(btn.getAttribute('data-details-en'));
    }

});

