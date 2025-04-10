<?php

namespace App\Services\Admin;

use App\Repositories\Admin\JobTitleRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Transformers\JobTitleTransformer;
use Throwable;

class JobTitleService
{
    protected $jobTitleRepository;
    public function __construct(JobTitleRepository $jobTitleRepository)
    {
        $this->jobTitleRepository = $jobTitleRepository;
    }

    public function store($request)
    {
        try {
            $title = $this->jobTitleRepository->store($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#job-title-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function update($request, $id)
    {
        try{
            $job_title = $this->jobTitleRepository->getJobTitle($id);
            $job_title = $this->jobTitleRepository->update($job_title , $request);
            
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#job-title-create-update-modal';
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function destroy($id)
    {
        try{
            $job_title = $this->jobTitleRepository->getJobTitle($id);
            $job_title = $this->jobTitleRepository->destroy($job_title);
            
            $response_data['status'] = true;
            $response_data['message'] =  __('custom.deleted_successflly');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#delete-modal';
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function getTableData()
    {
        $job_titles = $this->jobTitleRepository->getAllJobTitles();
        return DataTables::of($job_titles)
                    ->setTransformer(JobTitleTransformer::class)
                    ->make(true);
    }
}
