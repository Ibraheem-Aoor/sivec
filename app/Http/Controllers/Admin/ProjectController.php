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
        $data['categories'] = ProjectCategory::query()->get();
        $data['clients'] = Client::query()->get();
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
            $home_image_file_content = $request->file('home_image');
            $project = Project::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                    'basic_info' => $data['basic_info_ar']
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'basic_info' => $data['basic_info_en']
                ],
                'status' => $data['status'],
                'achieve_date' => $data['achieve_date'],
                'budget' => $data['budget'],
                'category_id' => $data['category_id'],
                'client_id' => $data['client_id'],
            ]);
            $image_data['image'] = saveImage('projects/' . $project->id . '/main' . '/' , $image_file_content);
            $image_data['home_image'] = saveImage('projects/' . $project->id . '/home' . '/' , $home_image_file_content);
            $project->update($image_data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
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
            $home_image_file_content = $request->file('home_image');
            if ($image_file_content) {
                deleteImage($project->image);
                $data['image'] = saveImage('projects/' . $project->id . '/main' . '/', $image_file_content);
            }
            if ($home_image_file_content) {
                deleteImage($project->home_image);
                $data['home_image'] = saveImage('projects/' . $project->id . '/home' . '/', $home_image_file_content);
            }
            $project->update([
                'ar' => [
                    'name' => $data['name_ar'],
                    'basic_info' => $data['basic_info_ar']
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'basic_info' => $data['basic_info_en']
                ],
                'status' => $data['status'],
                'achieve_date' => $data['achieve_date'],
                'budget' => $data['budget'],
                'category_id' => $data['category_id'],
                'client_id' => $data['client_id'],
                'image' =>  @$data['image'] ?? $project->image,
                'home_image' =>  @$data['home_image'] ?? $project->home_image,
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = false;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
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
            })->filterColumn('client', function ($query, $keyword) {
                $query->whereHas('client', function ($client) use ($keyword) {
                    $client->where('name', 'like', "%$keyword%");
                });
            })
            ->make(true);
    }
}
