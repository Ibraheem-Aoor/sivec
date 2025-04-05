<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectRequest;
use App\Http\Requests\Admin\CreateServiceRequest;
use App\Jobs\Admin\SaveFilesJob;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectStyle;
use App\Models\ProjectType;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Transformers\Admin\ProjectTransformer;
use App\Transformers\Admin\ServiceTransformer;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\DataTables;
use Str;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.project.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['categories'] = ProjectCategory::query()->sub()->get();
        $data['project_types'] = ProjectType::query()->get();
        $data['project_styles'] = ProjectStyle::query()->get();
        return view('admin.project.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        try {
            $data = $request->toArray();
            $image_file_content = $request->file('image');
            $project = Project::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
                'category_id' => @$data['category_id'],
                'project_type_id' => @$data['project_type_id'],
                'project_style_id' => @$data['project_style_id'],
            ]);
            $image_data['image'] = $image_file_content ? saveImage('projects/' . $project->id . '/main' . '/', $image_file_content) : null;
            $project->update($image_data);
            $project->saveGalleryImages(@$data['gallery_images']);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
            $this->cache_service->forget('project_parent_categories');
            $this->cache_service->forget('projects');
        } catch (Throwable $e) {
            dd($e);
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
            info($e);
        }
        return response()->json($response_data, $error_no);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProjectRequest $request, $id)
    {
        try {
            $project = Project::query()->find($id);
            $data = $request->toArray();
            $image_file_content = $request->file('image');
            if ($image_file_content) {
                deleteImage($project->image);
                $data['image'] = saveImage('projects/' . $project->id . '/main' . '/', $image_file_content);
            }
            $project->update([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
                'category_id' => @$data['category_id'],
                'project_type_id' => @$data['project_type_id'],
                'project_style_id' => @$data['project_style_id'],
                'image' => @$data['image'] ?? $project->image,
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = false;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
            $this->cache_service->forget('home_projects');
            $this->cache_service->forget('projects');
        } catch (Throwable $e) {
            dd($e);
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
            info($e);
        }
        return response()->json($response_data, $error_no);
    }


    /**
     * Uploading one image at a time.
     */
    public function uploadGallery(Request $request)
    {
        try {
            $image =  saveImage('tmp/projects' , $request->gallery_images[0]);
            return response()->json(last(explode('/' , $image)));
        } catch (Throwable $e) {
            dd($e);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = Project::query()->find($id);
            Storage::disk('public')->deleteDirectory('projects/' . $project->id . '/');
            $project->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        } catch (Throwable $e) {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    public function getTableData()
    {
        return DataTables::of(Project::query()->with(['category', 'client'])->orderByDesc('projects.created_at'))
            ->setTransformer(ProjectTransformer::class)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('category', function ($category) use ($keyword) {
                    $category->whereHas('translations', function ($category_translations) use ($keyword) {
                        $category_translations->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                    });
                });
            })->filterColumn('type', function ($query, $keyword) {
                $query->whereHas('type', function ($type) use ($keyword) {
                    $type->where('name', 'like', "%$keyword%");
                });
            })
            ->filterColumn('style', function ($query, $keyword) {
                $query->whereHas('style', function ($style) use ($keyword) {
                    $style->where('name', 'like', "%$keyword%");
                });
            })
            ->make(true);
    }
}
