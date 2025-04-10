<?php

namespace App\Services\Admin;
use App\Repositories\Admin\ServiceCategoryRepository;
use App\Services\ArtisanService;
use Throwable;
use App\Models\ServiceCategory;
use App\Transformers\ServiceCategoryTransformer;
use Yajra\DataTables\Facades\DataTables;


class ServiceCategoryService
{
    protected $artisan_service, $serviceCategoryRepository;
    public function __construct(ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->artisan_service = new ArtisanService();
        $this->serviceCategoryRepository = $serviceCategoryRepository;
    }

    public function getDataTableRoute()
    {
        $table_data_url = route('admin.service-category.table_data');
        return $table_data_url;
    }

    public function store($request)
    {
        try {
            $service = $this->serviceCategoryRepository->store($request);
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
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function update($request, $id)
    {
        try {
            $service_category = $this->serviceCategoryRepository->getServiceCategory($id);
            $service_category = $this->serviceCategoryRepository->update($service_category, $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
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
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function destroy($id)
    {
        try {
            $service_category = $this->serviceCategoryRepository->getServiceCategory($id);
            $service_category = $this->serviceCategoryRepository->destroy($service_category);
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
        return [
            'response_data'=>$respnse_data, 
            'error_no'=>$error_no
        ];
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
