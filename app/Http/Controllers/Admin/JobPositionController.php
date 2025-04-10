<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateJobPositionRequest;
use App\Services\Admin\JobPositionService;


class JobPositionController extends Controller
{
    private $jobPositionService;

    public function __construct(JobPositionService $jobPositionService)
    {
        $this->jobPositionService = $jobPositionService;
    }
    public function index()
    {
        $data = $this->jobPositionService->index();
        return view('admin.job_position.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(CreateJobPositionRequest $request)
    {
        $data = $this->jobPositionService->store($request);
        return response()->json(
            $data['response_data'],
            $data['error_no']
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(CreateJobPositionRequest $request, $id)
    {
        $data = $this->jobPositionService->update($request, $id);
        return response()->json(
            $data['response_data'],
            $data['error_no']
        );
    }

    public function destroy($id)
    {
        $data = $this->jobPositionService->destroy($id);
        return response()->json(
            $data['response_data'],
            $data['error_no']
        );
    }



    public function getTableData()
    {
        return $this->jobPositionService->getTableData();
    }
}
