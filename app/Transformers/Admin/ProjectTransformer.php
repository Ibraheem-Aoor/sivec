<?php

namespace App\Transformers\Admin;

use App\Models\Project;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;


class ProjectTransformer extends TransformerAbstract
{
    /**
     * @param \App\Admin/TeamMember $admin/TeamMember
     * @return array
     */
    public function transform(Project $project): array
    {
        return [
            'name' => $project->name,
            'category' => $project->category->name,
            'type' => $project->type?->name,
            'style' => $project->style?->name,
            'actions' => $this->getActionButtons($project),
        ];
    }


    public function getActionButtons($project)
    {
        $main_image = getImageUrl($project->image);
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#project-create-update-modal'
        data-action='" . route('admin.project.custom_update', $project->id) . "' data-method='POST'    data-main-image='" . $main_image . "'   data-name-ar='" . $project->translate('ar')->name . "'
        data-name-en='" . $project->translate('en')->name . "'  data-basic-info-ar='" . $project->translate('ar')->basic_info . "' data-basic-info-en='" . $project->translate('en')->basic_info . "' data-project='" . json_encode($project) . "'  data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='" . route('admin.project.destroy', $project->id) . "' data-message='" . __('custom.confirm_delete') . "' data-name='" . $project->name . "' id='row-" . $project->id . "'><i class='fa fa-trash'></i></button>
        ";
    }

}
