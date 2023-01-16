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
    }, {
        data: 'name',
        name: 'name',
        searchable: true,
        orderable: true,
    }, {
        data: 'title_position',
        name: 'title_position',
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
    } else {
        $('#name').val(member.name);
        $('#email').val(member.email);
        $('#phone').val(member.phone);
        $('#title_position').val(member.title_position);
        $('#status').val(member.status);
        $('#address').val(member.address);
        $('#instagram').val(member.instagram);
        $('#twitter').val(member.twitter);
        $('#facebook').val(member.facebook);
        $('#linked_in').val(member.linked_in);
        $('#cover_letter').text(member.cover_letter);
        $('#personal_details').text(member.personal_details);
    }

});

