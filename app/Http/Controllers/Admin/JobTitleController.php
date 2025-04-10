<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateJobTitleRequest;

use App\Services\Admin\JobTitleService;


class JobTitleController extends Controller
{
    private $jobTitleService;

    public function __construct(JobTitleService $jobTitleService)
    {
        $this->jobTitleService = $jobTitleService;
    }
    public function index()
    {
        $data['table_data_url'] = route('admin.job-title.table_data');
        return view('admin.job_title.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(CreateJobTitleRequest $request)
    {
        $data = $this->jobTitleService->store($request);
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

    public function update(CreateJobTitleRequest $request, $id)
    {
        $data = $this->jobTitleService->update($request, $id);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function destroy($id)
    {
        $data = $this->jobTitleService->destroy($id);
        return response()->json($data['response_data'], $data['error_no']);
    }



    public function getTableData()
    {
        return $this->jobTitleService->getTableData();
    }
}
