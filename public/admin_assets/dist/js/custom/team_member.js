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
        data: 'avatar',
        name: 'avatar',
        searchable: false,
        orderable: false,
    }, {
        data: 'name',
        name: 'name',
        searchable: true,
        orderable: false,
    }, {
        data: 'title_position',
        name: 'title_position',
        searchable: true,
        orderable: false,
    },
    {
        data: 'email',
        name: 'email',
        searchable: true,
        orderable: false,
    },
    {
        data: 'phone',
        name: 'phone',
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

$('#team-create-update-modal').on('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var action = btn.getAttribute('data-action');
    var method = btn.getAttribute('data-method');
    var is_create = btn.getAttribute('data-is-create');
    var member = btn.getAttribute('data-member');
    if (member != null) {
        member = JSON.parse(member);
    }
    var avatarPath = btn.getAttribute('data-avatar');
    $(this).find('form').attr('action', action);
    $(this).find('form').attr('method', method);
    if (is_create == 1) {
        $(this).find('button[type="reset"]').click();
        document.getElementById('image-input-wrapper').style.backgroundImage =  "url(" + globals.placeholder_image + ")";
    } else {
        document.getElementById('image-input-wrapper').style.backgroundImage =  "url(" + avatarPath + ")";
        $('#name_ar').val(btn.getAttribute('data-name-ar'));
        $('#name_en').val(btn.getAttribute('data-name-en'));
        $('#title_position_ar').val(btn.getAttribute('data-title-position-ar'));
        $('#title_position_en').val(btn.getAttribute('data-title-position-en'));
        $('#email').val(member.email);
        $('#phone').val(member.phone);
        $('#status').val(member.status);
        $('#address').val(member.address);
        $('#instagram').val(member.instagram);
        $('#twitter').val(member.twitter);
        $('#facebook').val(member.facebook);
        $('#linked_in').val(member.linked_in);
        // $('#cover_letter').text(member.cover_letter);
        // $('#personal_details').text(member.personal_details);
    }

});

$(document).ajaxSuccess(function(event, xhr, settings) {
    if(settings.type === 'DELETE'){
        $('#myTable').DataTable().ajax.reload();
    }
});