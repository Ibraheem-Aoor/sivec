<?php

namespace App\Transformers;

use App\Models\ServiceCategory;
use League\Fractal\TransformerAbstract;

class ServiceCategoryTransformer extends TransformerAbstract
{
    /**
     * @param \App\ServiceCategory $serviceCategory
     * @return array
     */
    public function transform(ServiceCategory $service_category): array
    {
        return [
            'name'  =>  $service_category->name,
            'status'    =>  $service_category->status,
            'actions'   =>  $this->getActionButtons($service_category),
        ];
    }

    public function getActionButtons($service_category)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#service-category-create-update-modal'
        data-action='".route('admin.service-category.custom_update' , $service_category->id)."' data-method='POST' data-service-category='".json_encode($service_category)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.service-category.destroy' , $service_category->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$service_category->name."' id='row-".$service_category->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
