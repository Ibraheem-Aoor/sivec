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
        orderable: false,
    },
    {
        data: 'status',
        name: 'status',
        searchable: false,
        orderable: false,
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

$('#project-category-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var projectCategory = btn.getAttribute('data-project-category');
    if (projectCategory != null) {
        projectCategory = JSON.parse(projectCategory);
    }
    var avatarPath = btn.getAttribute('data-avatar');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        document.getElementById('image-input-wrapper-1').style.backgroundImage = "url(" + globals.placeholder_image + ")";
        $(this).find('button[type="reset"]').click();
    } else {
        document.getElementById('image-input-wrapper-1').style.backgroundImage = "url(" + btn.getAttribute('data-image') + ")";
        $('#name_ar').val(btn.getAttribute('data-name-ar'));
        $('#name_en').val(btn.getAttribute('data-name-en'));
        $('#project_category_id').val(btn.getAttribute('data-category-id'));
    }

});

