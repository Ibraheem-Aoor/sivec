<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;

class ProjectStyleAndTypeTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform($model): array
    {
        return [
            'name' => $model->name,
            'created_at' => date($model->created_at),
            'actions' => $this->getActionButtons($model),
        ];
    }

    public function getActionButtons($model)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#project-style-type-create-update-modal'
        data-action='" . route('admin.project-style-type.custom_update', ['id' => $model->id, 'model' => request()->query('model')]) . "' data-method='POST' data-name-ar='" . ($model->translate('ar')->name) . "'data-name-en='" . ($model->translate('en')->name) .
            "'data-status='" . ($model->status) . "' data-is-create='false'><i class='fa fa-edit'></i></button> &nbsp;
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='" . route('admin.project-style-type.destroy', ['id' => $model->id, 'model' => request()->query('model')]) . "' data-message='" . __('custom.confirm_delete') . "' data-name='" . $model->name . "' id='row-" . $model->id . "'><i class='fa fa-trash'></i></button>
        ";
    }
}
