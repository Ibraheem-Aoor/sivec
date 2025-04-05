<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{

    const MODEL = ProjectCategory::class;

    public function show($id)
    {
        $data['category'] = self::MODEL::query()->with(['subCategories'])->find(decrypt($id));
        $data['category']->subCategories->count() == 0 ? $data['category']->load('projects') : null; #loading projects when the category is sub.
        $data['page_title'] = __('custom.site.sivec') . ' - ' . strtoupper($data['category']->parentCategory?->name) . ' - ' . strtoupper($data['category']->name);
        return view('site.project_category.index', $data);
    }
}
