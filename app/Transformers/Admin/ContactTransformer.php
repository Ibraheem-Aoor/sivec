<?php

namespace App\Transformers\Admin;

use App\Models\Contact;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;


class ContactTransformer extends TransformerAbstract
{
    /**
     * @param \App\Admin/TeamMember $admin/TeamMember
     * @return array
     */
    public function transform(Contact $project): array
    {
        return [
            'name'  =>      $project->name,
            'phone'       =>    $project->phone,
            'email'       =>    $project->email,
            'message'       =>    Str::limit($project->message , 30 , '...'),
            'date'       =>    Carbon::parse($project->created_at)->toDateString(),
            'actions'       => $this->getActionButtons($project),
        ];
    }


    public function getActionButtons($contact)
    {
        return "<button class='btn-xs btn-info'  data-toggle='modal' data-target='#contact-modal'
        data-message='".$contact->message."'><i class='fa fa-eye'></i></button>
        ";
    }

}
