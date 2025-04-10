<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ServiceRepository;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

use Throwable;

use App\Services\ArtisanService;
use App\Enums\BaseShowStatusEnum;
use App\Models\Service;
use App\Transformers\Admin\ServiceTransformer;

class ServiceService
{
    protected $artisan_service, $serviceRepository;
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->artisan_service = new ArtisanService();
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $data['table_data_url'] = route('admin.service.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['categories'] = $this->serviceRepository->getAllServicesCategory();
        return $data;
    }

    public function store($request)
    {
        try {
            $this->serviceRepository->store($request);
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
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function update($request, $id)
    {
        try {
            $service = $this->serviceRepository->getService($id);
            $service = $this->serviceRepository->update($service, $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
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
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function destroy($id)
    {
        try {
            $service = $this->serviceRepository->getService($id);
            $service = $this->serviceRepository->destroy($service);
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
        return DataTables::of(Service::query())
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
