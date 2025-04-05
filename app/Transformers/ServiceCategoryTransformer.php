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
            'name_ar'  =>  $service_category->translate('ar')->name,
            'name_en'  =>  $service_category->translate('en')->name,
            'status'    =>  $service_category->status,
            'created_at'    =>  date($service_category->created_at),
            'actions'   =>  $this->getActionButtons($service_category),
        ];
    }

    public function getActionButtons($service_category)
    {
        return "<div class='d-flex'> <button class='btn-xs btn-success'  data-toggle='modal' data-target='#service-category-create-update-modal'
        data-action='".route('admin.service-category.custom_update' , $service_category->id)."' data-method='POST' data-service-category='".json_encode($service_category)."' data-is-create='false'><i class='fa fa-edit'></i></button> &nbsp;
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.service-category.destroy' , $service_category->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$service_category->name."' id='row-".$service_category->id."'><i class='fa fa-trash'></i></button>
        </div>";
    }
}
