<button class='btn-xs btn-success' data-bs-toggle='modal' data-bs-target='#team-create-update-modal'
    data-avatar=' {{ asset('uploads/team_members/'.$member->avatar) }} '
    data-action=' {{ route('admin.team-members.custom_update', $member->id) }}' data-method='POST'
    data-member=' {{ json_encode($member) }} ' data-name-ar=' {{ $member->translate('ar')->name }} '
    data-name-en='{{ $member->translate('en')->name }}'
    data-title-position-ar='{{ $member->translate('ar')->title_position }}'
    data-title-position-en='{{ $member->translate('en')->title_position }}' data-is-create='false'><i
        class='fa fa-edit'></i></button>
<button type='button' data-bs-toggle='modal' data-bs-target='#delete-modal' class='btn-xs btn-danger'
    data-delete-url='{{ route('admin.team-members.destroy', $member->id) }} '
    data-message=' {{ __('custom.confirm_delete') }} ' data-name=' {{ $member->name }} '
    id='row-{{ $member->id }} '><i class='fa fa-trash'></i></button>
