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
        data: 'category',
        name: 'category',
        searchable: true,
        orderable: false,
    },
    {
        data: 'type',
        name: 'type',
        searchable: true,
        orderable: false,
    },
    {
        data: 'style',
        name: 'style',
        searchable: true,
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

$('#project-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var project = btn.getAttribute('data-project');
    var mainImagePath = btn.getAttribute('data-main-image');
    if (project != null) {
        project = JSON.parse(project);
    }
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        document.getElementById('image-input-wrapper-1').style.backgroundImage = "url(" + globals.placeholder_image + ")";
        $('textarea').text('');
        $(this).find('button[type="reset"]').click();
    } else {
        document.getElementById('image-input-wrapper-1').style.backgroundImage = "url(" + mainImagePath + ")";
        $('#name_ar').val(btn.getAttribute('data-name-ar'));
        $('#name_en').val(btn.getAttribute('data-name-en'));
        $('#category_id').val(project.category_id);
        $('#project_type_id').val(project.project_type_id);
        $('#project_style_id').val(project.project_style_id);
        // $('#client_id').val(project.client_id);
        // $('#budget').val(project.budget);
        // $('#achieve_date').val(project.achieve_date);
        // $('#basic_info').text(project.basic_info);
        // $('#status').val(project.status);
        // $('#basic_info_ar').text(btn.getAttribute('data-basic-info-ar'));
        // $('#basic_info_en').text(btn.getAttribute('data-basic-info-en'));
    }

});

