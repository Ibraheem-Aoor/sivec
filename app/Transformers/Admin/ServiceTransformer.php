<?php

namespace App\Transformers\Admin;

use App\Models\Service;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;


class ServiceTransformer extends TransformerAbstract
{
    /**
     * @param \App\Admin/TeamMember $admin/TeamMember
     * @return array
     */
    public function transform(Service $service): array
    {
        return [
            'name'  =>      $service->name,
            'category'       =>    $service->category->name,
            'status'      =>    $service->status,
            'actions'       => $this->getActionButtons($service),
        ];
    }


    public function getActionButtons($service_category)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#service-create-update-modal'
        data-action='".route('admin.service.custom_update' , $service_category->id)."' data-method='POST' data-service='".json_encode($service_category)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.service.destroy' , $service_category->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$service_category->name."' id='row-".$service_category->id."'><i class='fa fa-trash'></i></button>
        ";
    }

}
