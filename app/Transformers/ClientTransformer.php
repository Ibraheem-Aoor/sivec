<?php

namespace App\Transformers;

use App\Models\Client;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    /**
     * @param \App\ServiceCategory $serviceCategory
     * @return array
     */
    public function transform(Client $client): array
    {
        $image_path = Storage::url($client->image);
        return [
            'image' => '<img src="'.$image_path.'" width="80" height="80" />',
            'name'  =>  $client->name,
            'email' =>  $client->email,
            'phone' =>  $client->phone,
            'actions'   =>  $this->getActionButtons($client , $image_path),
        ];
    }

    public function getActionButtons($client , $image_path)
    {
        return "<div class='d-flex'><button class='btn-xs btn-success'  data-toggle='modal' data-target='#client-create-update-modal'
        data-action='".route('admin.client.custom_update' , $client->id)."' data-method='POST' data-client='".json_encode($client)."' data-is-create='false' data-image='".$image_path."'><i class='fa fa-edit'></i></button> &nbsp;
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.client.destroy' , $client->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$client->name."' id='row-".$client->id."'><i class='fa fa-trash'></i></button>
        </div>";
    }
}
