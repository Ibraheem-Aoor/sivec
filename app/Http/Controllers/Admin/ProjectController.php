<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectRequest;
use App\Http\Requests\Admin\CreateServiceRequest;
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
        return view('admin.project.index' , $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        try{
            $data = $request->toArray();
            $image_file_content =   $request->file('image');
            $home_image_file_content = $request->file('home_image');
            $data['image'] = encrypt(time()) . '.' . $image_file_content->getClientOriginalExtension();
            $data['home_image']    =   encrypt(time()).'.'.$home_image_file_content->getClientOriginalExtension();
            $project = Project::query()->create($data);
            $image_file_content->storeAs('public/projects/'.$project->id.'/main'.'/' , $data['image']);
            $home_image_file_content->storeAs('public/projects/'.$project->id.'/home'.'/' , $data['home_image']);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data , $error_no);
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
        try{
            $project = Project::query()->find($id);
            $data = $request->toArray();
            $image_file_content =   $request->file('image');
            $home_image_file_content = $request->file('home_image');
            if($image_file_content)
            {
                $data['image'] = encrypt(time()) . '.' . $image_file_content->getClientOriginalExtension();
                $image_file_content->storeAs('public/projects/'.$project->id.'/main'.'/' , $data['image']);
            }
            if($home_image_file_content)
            {
                $data['home_image']    =   encrypt(time()).'.'.$home_image_file_content->getClientOriginalExtension();
                $home_image_file_content->storeAs('public/projects/'.$project->id.'/home'.'/' , $data['home_image']);
            }
            Storage::disk('public')->delete("projects/{$project->id}/home/{$project->home_image}");
            Storage::disk('public')->delete("projects/{$project->id}/main/{$project->image}");
            $project->update($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = false;
            $response_data['modal_to_hiode'] = '#project-create-update-modal';
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data , $error_no);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $project  =   Project::query()->find($id);
            Storage::disk('public')->deleteDirectory('projects/'.$project->id.'/');
            $project->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    public function getTableData()
    {
        return DataTables::of(Project::query()->with(['category' , 'client'])->orderByDesc('projects.created_at'))
                    ->setTransformer(ProjectTransformer::class)
                    ->make(true);
    }
}
