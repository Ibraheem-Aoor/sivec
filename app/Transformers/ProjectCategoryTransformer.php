<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ProjectCategory;

class ProjectCategoryTransformer extends TransformerAbstract
{
    /**
     * @param \App\ServiceCategory $serviceCategory
     * @return array
     */
    public function transform(ProjectCategory $project_category): array
    {
        return [
            'name'  =>  $project_category->name,
            'status'    =>  $project_category->status,
            'actions'   =>  $this->getActionButtons($project_category),
        ];
    }

    public function getActionButtons($project_category)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#project-category-create-update-modal'
        data-action='".route('admin.project-category.custom_update' , $project_category->id)."' data-method='POST' data-project-category='".json_encode($project_category)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.project-category.destroy' , $project_category->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$project_category->name."' id='row-".$project_category->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
