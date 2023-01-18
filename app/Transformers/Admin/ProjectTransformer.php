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
            'name'  =>      $project->name,
            'category'       =>    $project->category->name,
            'client'       =>    $project->client->name,
            'budget'       =>    $project->budget,
            'achieve_date'       =>    $project->achieve_date,
            'status'      =>    $project->status,
            'actions'       => $this->getActionButtons($project),
        ];
    }


    public function getActionButtons($project)
    {
        $home_image = Storage::url("projects/{$project->id}/home/{$project->home_image}");
        $main_image = Storage::url("projects/{$project->id}/main/{$project->image}");
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#project-create-update-modal'
        data-action='".route('admin.project.custom_update' , $project->id)."' data-method='POST' data-home-image='".$home_image."'   data-main-image='".$main_image."'   data-project='".json_encode($project)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.project.destroy' , $project->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$project->name."' id='row-".$project->id."'><i class='fa fa-trash'></i></button>
        ";
    }

}
