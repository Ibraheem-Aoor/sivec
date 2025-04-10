<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Services\Admin\ServiceService;

class ServiceController extends Controller
{
    protected $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $data = $this->serviceService->index();
        return view('admin.service.index', $data);
    }


    public function store(CreateServiceRequest $request)
    {
        $data = $this->serviceService->store($request);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data , $error_no);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        $data = $this->serviceService->update( $request , $id);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data, $error_no);
    }

    public function destroy($id)
    {
        $data = $this->serviceService->destroy( $id);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data, $error_no);
    }



    public function getTableData()
    {
        return $this->serviceService->getTableData();
    }
}
