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
            'name' => $service->name,
            'category' => $service->category->name,
            'status' => $service->status,
            'created_at'    =>  date($service->created_at),
            'actions' => $this->getActionButtons($service),
        ];
    }


    public function getActionButtons($service)
    {
        $image = Storage::url("services/{$service->id}/main/{$service->image}");
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#service-create-update-modal'
        data-action='" . route('admin.service.custom_update', $service->id) . "' data-method='POST' data-name-ar='" . ($service->translate('ar')->name) ."' data-name-en='" . ($service->translate('en')->name) . "' data-details-ar='" . ($service->translate('ar')->details) . "'data-details-en='" . ($service->translate('en')->details) .
            "'data-category-id='" . ($service->category_id) ."'data-status='" . ($service->status) . "' data-is-create='false' data-image='" . $image . "'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='" . route('admin.service.destroy', $service->id) . "' data-message='" . __('custom.confirm_delete') . "' data-name='" . $service->name . "' id='row-" . $service->id . "'><i class='fa fa-trash'></i></button>
        ";
    }

}
