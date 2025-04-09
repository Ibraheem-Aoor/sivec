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
        data: 'num_of_views',
        name: 'num_of_views',
        searchable: true,
        orderable: true,
    },
    {
        data: 'category',
        name: 'category',
        searchable: false,
        orderable: false,
    },
    {
        data: 'tags',
        name: 'tags',
        searchable: false,
        orderable: false,
    },
    {
        data: 'is_available',
        name: 'is_available',
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

$(document).ajaxSuccess(function(event, xhr, settings) {
    console.log(settings.type);
    $('[id^="exampleModalDestroy"]').modal('hide');
    if(settings.type === 'POST'){
        $('#myTable').DataTable().ajax.reload();
    }
});

