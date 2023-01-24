<?php

namespace App\Transformers;

use App\Models\JobPosition;
use League\Fractal\TransformerAbstract;
use Str;
class JobTitleTransformer extends TransformerAbstract
{
    /**
     * @param \App\JobTitle $JobTitle
     * @return array
     */
    public function transform(JobPosition $position): array
    {
        return [
            'title'  =>  $position->title->name,
            'vacancy'   =>  $position->vacancy,
            'description'   =>  Str::limit( $position->description , 25 , '...'),
            'status'   =>  $position->salary,
            'actions'   =>  $this->getActionButtons($position),
        ];
    }

    public function getActionButtons($position)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#job-positon-create-update-modal'
        data-action='".route('admin.job-positon.custom_update' , $position->id)."' data-method='POST' data-job-positon='".json_encode($position)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.job-positon.destroy' , $position->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$position->name."' id='row-".$position->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
