<?php

namespace App\Transformers;

use App\Models\JobTitle;
use League\Fractal\TransformerAbstract;

class JobTitleTransformer extends TransformerAbstract
{
    /**
     * @param \App\JobTitle $JobTitle
     * @return array
     */
    public function transform(JobTitle $job_title): array
    {
        return [
            'name'  =>  $job_title->name,

            'actions'   =>  $this->getActionButtons($job_title),
        ];
    }

    public function getActionButtons($job_title)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#job-title-create-update-modal'
        data-action='".route('admin.job-title.custom_update' , $job_title->id)."' data-method='POST' data-job-title='".json_encode($job_title)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.job-title.destroy' , $job_title->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$job_title->name."' id='row-".$job_title->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
