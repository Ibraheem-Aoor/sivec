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
        data: 'client',
        name: 'client.name',
        searchable: true,
        orderable: true,
    },
    {
        data: 'budget',
        name: 'budget',
        searchable: true,
        orderable: true,
    },
    {
        data: 'achieve_date',
        name: 'achieve_date',
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

$('#project-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var project = btn.getAttribute('data-project');
    var homeImagePath = btn.getAttribute('data-home-image');
    var mainImagePath = btn.getAttribute('data-main-image');
    if (project != null) {
        project = JSON.parse(project);
    }
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        $(this).find('button[type="reset"]').click();
    } else {
        document.getElementById('image-input-wrapper-1').style.backgroundImage =  "url(" + homeImagePath + ")";
        document.getElementById('image-input-wrapper-2').style.backgroundImage =  "url(" +  mainImagePath + ")";
        $('#name').val(project.name);
        $('#category_id').val(project.category_id);
        $('#client_id').val(project.client_id);
        $('#budget').val(project.budget);
        $('#achieve_date').val(project.achieve_date);
        $('#basic_info').text(project.basic_info);
        $('#status').val(project.status);
    }

});

