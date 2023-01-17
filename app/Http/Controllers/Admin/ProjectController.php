<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Transformers\Admin\ServiceTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.service.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['categories'] = ProjectCategory::query()->get();
        return view('admin.project.index' , $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        try{
            $data = $request->toArray();
            $image_file_content =   $request->file('image');
            $pdf_file_content = $request->file('pdf');
            $data['image'] = encrypt(time()) . '.' . $image_file_content->getClientOriginalExtension();
            if($pdf_file_content)
            {
                $data['pdf']    =   encrypt(time()).'.'.$pdf_file_content->getClientOriginalExtension();
            }
            $service = Project::query()->create($data);
            $image_file_content->storeAs('public/services/'.$service->id.'/main'.'/' , $data['image']);
            if(@$data['pdf'])
            {
                $pdf_file_content->storeAs('public/services/'.$service->id.'/pdf'.'/' , $data['pdf']);
            }
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-category-create-update-modal';
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
    public function update(CreateServiceRequest $request, $id)
    {
        try{
            $service_cateogry = Project::query()->find($id);
            $data = $request->toArray();
            $service_cateogry->update($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-category-create-update-modal';
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
            $service  =   Project::query()->find($id);
            Storage::disk('public')->deleteDirectory('services/'.$service->id.'/');
            Storage::disk('public')->deleteDirectory('services/'.$service->id.'/');

            $service->delete();
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
        return DataTables::of(Project::query()->with('category')->orderByDesc('services.created_at'))
                    ->setTransformer(ServiceTransformer::class)
                    ->make(true);
    }
}
