<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;

use App\Http\Requests\Admin\UpdateServiceCategoryRequest;

use App\Models\ServiceCategory;

use App\Services\Admin\ServiceCategoryService;



class ServiceCategoryController extends Controller
{

    protected $serviceCategoryRepository;
    public function __construct(ServiceCategoryService $serviceCategoryRepository)
    {
        $this->serviceCategoryRepository  = $serviceCategoryRepository;
    }

    public function index()
    {
        $data['table_data_url'] = $this->serviceCategoryRepository->getDataTableRoute();
        return view('admin.service_category.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(CreateServiceCategoryRequest $request)
    {
        $data = $this->serviceCategoryRepository->store($request);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateServiceCategoryRequest $request, $id)
    {
        $data = $this->serviceCategoryRepository->update($request, $id);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function destroy($id)
    {
        $data = $this->serviceCategoryRepository->destroy($id);
        return response()->json($data['response_data'], $data['error_no']);
    }



    public function getTableData()
    {
        return $this->serviceCategoryRepository->getTableData();
    }
}
