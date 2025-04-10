<?php

namespace App\Services\Admin;

use App\Repositories\Admin\AboutPageRepository;
use App\Repositories\Admin\TeamMemberRepository;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class AboutPageService
{
    protected $aboutPageRepository;
    public function __construct(AboutPageRepository $aboutPageRepository)
    {
        $this->aboutPageRepository = $aboutPageRepository;
    }

    public function aboutPage()
    {
        $data['page_settings_ar'] = $this->aboutPageRepository->getSettings('about', 'ar', ['value', 'key']);
        $data['page_settings_en'] = $this->aboutPageRepository->getSettings('about', 'en', ['value', 'key']);
        return  $data;
    }

    public function update($request)
    {
        try {
            $settings = $this->aboutPageRepository->updateSettings($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] =$e->getMessage();
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function updateBranchesPage($request)
    {
        try {
            $settings = $this->aboutPageRepository->updateBranchesPage($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function updateGeneralSettings($request)
    {
        try{
            $setting = $this->aboutPageRepository->updateGeneralSettings($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.smthing_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }
}
