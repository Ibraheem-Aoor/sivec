<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Services\ArtisanService;
use App\Transformers\Admin\TeamMemberTransformer;
use App\Transformers\ServiceCategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ServiceCategoryController extends Controller
{

    protected $artisan_service;
    public function __construct()
    {
        // $this->artisan_service  = new ArtisanService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.service-category.table_data');
        return view('admin.service_category.index', $data);
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
    public function store(CreateServiceCategoryRequest $request)
    {
        try {
            $data = $request->toArray();
            ServiceCategory::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-category-create-update-modal';
            $error_no = 200;
            $this->artisan_service->call('optimize:clear');
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
    public function update(UpdateServiceCategoryRequest $request, $id)
    {
        try {
            $service_cateogry = ServiceCategory::query()->find($id);
            $data = $request->toArray();
            $service_cateogry->update([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-category-create-update-modal';
            $error_no = 200;
            $this->artisan_service->call('optimize:clear');

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
            $service_category = ServiceCategory::query()->find($id);
            $service_category->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
            $this->artisan_service->call('optimize:clear');
        } catch (Throwable $e) {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    public function getTableData()
    {
        return DataTables::of(ServiceCategory::query())
            ->setTransformer(ServiceCategoryTransformer::class)
            ->orderColumn('name_ar', function ($query, $order) {
                $query->whereHas('translations', function ($q) use ($order) {
                    $q->where('locale', 'ar')->orderBy('name', $order);
                });
            })
            ->orderColumn('name_en', function ($query, $order) {
                $query->whereHas('translations', function ($q) use ($order) {
                    return $q->where('locale', 'en')->orderBy('name', $order);
                });
            })
            ->filterColumn('name_ar', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->where('locale', 'ar');
                });
            })
            ->filterColumn('name_en', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->where('locale', 'en');
                });
            })->orderColumn('status' , function($query , $order){
                $query->orderBy('status' , $order);
            })
            ->make(true);
    }

}
