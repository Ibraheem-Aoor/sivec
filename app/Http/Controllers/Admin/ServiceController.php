<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ArtisanService;
use App\Transformers\Admin\ServiceTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\DataTables;
use Str;

class ServiceController extends Controller
{
    protected $artisan_service;
    public function __construct()
    {
        $this->artisan_service  = new ArtisanService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.service.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['categories'] = ServiceCategory::query()->get();
        return view('admin.service.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        try {
            $data = $request->toArray();
            $image_file_content = $request->file('image');
            $pdf_file_content = $request->file('pdf');
            $data['image'] = Str::limit(encrypt(time()), 40, 'abc') . '.' . $image_file_content->getClientOriginalExtension();
            if ($pdf_file_content) {
                $data['pdf'] = Str::limit(encrypt(time()), 40, 'abc') . '.' . $pdf_file_content->getClientOriginalExtension();
            }
            $service = Service::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                    'details' => $data['details_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'details' => $data['details_en'],
                ],
                'image' => $data['image'],
                'pdf' => @$data['pdf'],
                'category_id' => $data['category_id'],
                'status' => $data['status'],
            ]);
            $image_file_content->storeAs('public/services/' . $service->id . '/main' . '/', $data['image']);
            if (@$data['pdf']) {
                $pdf_file_content->storeAs('public/services/' . $service->id . '/pdf' . '/', $data['pdf']);
            }
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-create-update-modal';
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
    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            $service = Service::query()->find($id);
            $data = $request->toArray();
            $image_file_content = $request->file('image');
            $pdf_file_content = $request->file('pdf');
            if ($image_file_content) {
                $data['image'] = Str::limit(encrypt(time()), 40, 'abc') . '.' . $image_file_content->getClientOriginalExtension();
                $image_file_content->storeAs('public/services/' . $service->id . '/main' . '/', $data['image']);
                Storage::disk('public')->delete('services/' . $service->id . '/main' . '/', $service->image);
            }
            if ($pdf_file_content) {
                $data['pdf'] = Str::limit(encrypt(time()), 40, 'abc') . '.' . $pdf_file_content->getClientOriginalExtension();
                $pdf_file_content->storeAs('public/services/' . $service->id . '/pdf' . '/', $data['pdf']);
                if ($service->pdf) {
                    Storage::disk('public')->delete('services/' . $service->id . '/pdf' . '/', $service->pdf);
                }
            }
            $service->update([
                'ar' => [
                    'name' => $data['name_ar'],
                    'details' => $data['details_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'details' => $data['details_en'],
                ],
                'image' => $data['image'],
                'pdf' => @$data['pdf'],
                'category_id' => $data['category_id'],
                'status' => $data['status'],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-create-update-modal';
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
            $service = Service::query()->find($id);
            Storage::disk('public')->deleteDirectory('services/' . $service->id . '/');
            $service->delete();
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
        return DataTables::of(Service::query()->with('category')->orderByDesc('services.created_at'))
            ->setTransformer(ServiceTransformer::class)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })
            ->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('category', function ($category) use ($keyword) {
                    $category->whereHas('translations', function ($category_translations) use ($keyword) {
                        $category_translations->where('name', 'like', '%' . $keyword . '%');
                    });
                });
            })
            ->make(true);
    }
}
