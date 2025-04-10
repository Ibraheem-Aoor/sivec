<div class='d-flex'><button class='btn-xs btn-success' data-toggle='modal' data-target='#client-create-update-modal'
        data-action='{{ route('admin.client.custom_update', $client->id) }}' data-method='POST'
        data-client='{{ json_encode($client) }}' data-is-create='false' data-image='{{ $client->image }}'><i
            class='fa fa-edit'></i></button> &nbsp;
    <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='{{ route('admin.client.destroy', $client->id) }}'
        data-message='{{ __('custom.confirm_delete') }}' data-name='{{ $client->name }}' id='row-{{ $client->id }}'><i
            class='fa fa-trash'></i></button>
</div>
