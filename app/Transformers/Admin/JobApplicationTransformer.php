<?php

namespace App\Transformers\Admin;

use App\Models\Contact;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;


class JobApplicationTransformer extends TransformerAbstract
{
    /**
     * @param \App\Admin/TeamMember $admin/TeamMember
     * @return array
     */
    public function transform($application): array
    {
        return [
            'name'  =>      $application->name,
            'phone'       =>    $application->phone,
            'email'       =>    $application->email,
            'date'       =>    Carbon::parse($application->created_at)->toDateString(),
            'actions'       => $this->getActionButtons($application),
        ];
    }


    public function getActionButtons($application)
    {
        return "
        <a class='btn-xs btn-info' href='".route('admin.job_application.cv' , $application->id)."'><i class='fa fa-file'></i></a>
        ";
    }

}
