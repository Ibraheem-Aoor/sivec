<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    const MODEL = Project::class;

    public function show($id)
    {
        $data['project'] = self::MODEL::query()->find(decrypt($id));
        $data['page_title'] = __('custom.site.sivec') . ' - ' . strtoupper($data['project']->category?->name) . ' - ' . strtoupper($data['project']->name);
        return view('site.project.show', $data);
    }
}
