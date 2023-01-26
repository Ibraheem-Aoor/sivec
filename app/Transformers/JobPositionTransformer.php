<?php

namespace App\Transformers;

use App\Models\JobPosition;
use League\Fractal\TransformerAbstract;
use Str;
class JobPositionTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform($position): array
    {
        return [
            'title'  =>  $position->title->name,
            'vacancy'   =>  $position->vacancy,
            'description'   =>  Str::limit( $position->description , 25 , '...'),
            'salary'   =>  $position->salary,
            'status'   =>  $position->status,
            'actions'   =>  $this->getActionButtons($position),
        ];
    }

    public function getActionButtons($position)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#job-position-create-update-modal'
        data-action='".route('admin.job-position.custom_update' , $position->id)."' data-method='POST' data-job-position='".json_encode($position)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.job-position.destroy' , $position->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$position->name."' id='row-".$position->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}

