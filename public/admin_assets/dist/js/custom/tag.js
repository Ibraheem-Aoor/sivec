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
        data: 'title',
        name: 'title',
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

$(document).ajaxSuccess(function(event, xhr, settings) {
    $('[id^="exampleModalDestroy"]').modal('hide');
    $('#title_ar').val('');
    $('#title_en').val('');
    if (settings.type === 'POST') {
        try {
            $('#myTable').DataTable().ajax.reload();
        } catch (error) {
            console.error('Error reloading DataTable:', error);
        }
    }
});