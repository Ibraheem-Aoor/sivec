<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectCategoryRequest;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateProjectCategoryRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Transformers\Admin\TeamMemberTransformer;
use App\Transformers\ProjectCategoryTransformer;
use App\Transformers\ServiceCategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.project-category.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        return view('admin.project_category.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectCategoryRequest $request)
    {
        try{
            $data = $request->toArray();
            ProjectCategory::query()->create($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-category-create-update-modal';
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage();
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
    public function update(UpdateProjectCategoryRequest $request, $id)
    {
        try{
            $service_cateogry = ProjectCategory::query()->find($id);
            $data = $request->toArray();
            $service_cateogry->update($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-category-create-update-modal';
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
            $service_category  =   ProjectCategory::query()->find($id);
            $service_category->delete();
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
        return DataTables::of(ProjectCategory::query()->orderByDesc('created_at'))
                    ->setTransformer(ProjectCategoryTransformer::class)
                    ->make(true);
    }

}
