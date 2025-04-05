<?php

namespace App\Transformers\Admin;

use App\Models\TeamMember;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;


class TeamMemberTransformer extends TransformerAbstract
{
    /**
     * @param \App\Admin/TeamMember $admin/TeamMember
     * @return array
     */
    public function transform(TeamMember $team_meber): array
    {
        $avatar_path = Storage::url($team_meber->avatar);
        // dd($team_meber);
        return [
            'avatar' => "<img src='{$avatar_path}' width='100' height='100' id='{$team_meber->id}' />",
            'name' => $team_meber->name,
            'title_position' => $team_meber->translate()->title_position,
            'email' => $team_meber->email,
            'phone' => $team_meber->phone,
            'status' => $team_meber->status,
            'actions' => $this->getActionButtons($team_meber, $avatar_path),
        ];
    }


    public function getActionButtons($team_meber, $avatar_path)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#team-create-update-modal' data-avatar='" . $avatar_path . "'
        data-action='" . route('admin.team-members.custom_update', $team_meber->id) . "' data-method='POST' data-member='" . json_encode($team_meber) . "'
        data-name-ar='" . $team_meber->translate('ar')->name . "' data-name-en='" . $team_meber->translate('en')->name . "'
         data-title-position-ar='" . $team_meber->translate('ar')->title_position . "' data-title-position-en='" . $team_meber->translate('en')->title_position . "' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='" . route('admin.team-members.destroy', $team_meber->id) . "' data-message='" . __('custom.confirm_delete') . "' data-name='" . $team_meber->name . "' id='row-" . $team_meber->id . "'><i class='fa fa-trash'></i></button>";
    }

}
