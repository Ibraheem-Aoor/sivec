<?php

namespace App\Services\Admin;

use App\Repositories\Admin\JobPositionRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Transformers\JobPositionTransformer;
use App\Enums\BaseShowStatusEnum;

use Throwable;

class JobPositionService
{
    protected $jobPositionRepository;
    public function __construct(JobPositionRepository $jobPositionRepository)
    {
        $this->jobPositionRepository = $jobPositionRepository;
    }

    public function index()
    {
        $data['table_data_url'] = route('admin.job-position.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['job_titles']    =   $this->jobPositionRepository->getAllJobTitles();
        return $data;
    }

    public function store($request)
    {
        try{
            $jobPosition = $this->jobPositionRepository->store($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#job-position-create-update-modal';
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

    public function update($request, $id)
    {
        try {
            $job_position = $this->jobPositionRepository->getJobPosition( $id);
            $job_position = $this->jobPositionRepository->update($job_position, $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#job-position-create-update-modal';
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

    public function destroy($id)
    {
        try {
            $job_position  = $this->jobPositionRepository->getJobPosition($id);
            
            $job_position  = $this->jobPositionRepository->destroy($job_position);
            $response_data['status'] = true;
            $response_data['is_deleted'] = true;
            $response_data['message'] = __('custom.deleted_successflly');
            $response_data['row'] = $id;
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function getTableData()
    {
        $job_Positions = $this->jobPositionRepository->getAllJobPositions();
        return DataTables::of($job_Positions)
                    ->setTransformer(JobPositionTransformer::class)
                    ->make(true);
    }
}
