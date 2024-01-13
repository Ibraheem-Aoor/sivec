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
   


    /**
     * Save Business Setting
     * @param array $data
     * @return void
     */
    public function saveSetting(array $data, $page = null, $lang = 'en')
    {
        foreach ($data as $key => $value) {
            BusinessSetting::query()->updateOrCreate(
                [
                    'key' => $key,
                    'page' => $page,
                    'lang' => $lang
                ],
                [
                    'value' => is_array($value) ? json_encode($value) : $value,
                    'lang' => $lang
                ]
            );
        }
        Artisan::call('optimize:clear');
    }
}
