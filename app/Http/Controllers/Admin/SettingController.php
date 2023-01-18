<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateGeneralSerttingsRequest;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SettingController extends Controller
{
    public function generalSettings()
    {
        $data['general_settings'] = BusinessSetting::query()->wherePage('site')->pluck('value', 'key');
        return view('admin.settings.general' , $data);
    }


    public function updateGeneralSettings(UpdateGeneralSerttingsRequest $request)
    {
        try{
            $data = $request->toArray();
            $this->saveSetting($data, 'site');
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }



    /**
     * Save Business Setting
     * @param array $data
     * @return void
     */
    public function saveSetting(array $data , $page = null)
    {
        foreach($data as $key => $value)
        {
            BusinessSetting::query()->updateOrCreate(
                ['key'  =>  $key] , [
                'value' =>  is_array($value) ? json_encode($value) : $value,
                'page'  =>  $page,
            ]);
        }
        Artisan::call('optimize:clear');
    }
}
