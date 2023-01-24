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
        name: 'title.name',
        searchable: true,
        orderable: true,
    },
    {
        data: 'vacnacy',
        name: 'vacnacy',
        searchable: true,
        orderable: true,
    },
    {
        data: 'description',
        name: 'description',
        searchable: true,
        orderable: true,
    },
    {
        data: 'salary',
        name: 'salary',
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

$('#job-position-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var isCreate = btn.getAttribute('data-is-create');
    var position = btn.getAttribute('data-job-position');
    if (position != null) {
        position = JSON.parse(position);
    }
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (isCreate == 1) {
        $(this).find('button[type="reset"]').click();
    } else {
        $('#title_id').val(position.title_id);
        $('#vacancy').val(position.vacancy);
        $('#description').text(title.description);
    }
});



/**
 * Dynamic add delete buttons
 */
function addNewRequirmeent(btn)
{
        var html = `<div class="col-sm-12">
                    <div class="form-group d-flex">
                        ✔️ &nbsp; &nbsp;
                        <input type="text" name="requirements[]" class="form-control d-flex"> &nbsp;
                        <button type="button" class="add_feature btn-xs btn-primary" onclick="addNewRequirmeent($(this));"><i
                                class="fa fa-plus"></i></button>&nbsp;
                        <button type="button" class="deleteRequirment btn-xs btn-danger" onclick="deleteRequirment($(this));"><i class="fa fa-trash"></i></button>
                    </div>
                </div>`;
        btn.parent().parent().after(html);

}

function deleteRequirment(btn) {
    btn.parent().parent().remove();
};
