<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAboutPageRequest;
use App\Http\Requests\Admin\UpdateBranhesPageRequest;
use App\Http\Requests\Admin\UpdateContactPageRequest;
use App\Http\Requests\Admin\UpdateGeneralSerttingsRequest;
use App\Models\BusinessSetting;
use App\Services\Admin\AboutPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PageController extends Controller
{
    private $aboutPageService;
    public function __construct(AboutPageService $aboutPageService){
        $this->aboutPageService = $aboutPageService;
    }
    public function aboutPage()
    {
        $data = $this->aboutPageService->aboutPage();
        return view('admin.pages.about', $data);
    }

    public function updateAboutPageSettings(UpdateAboutPageRequest $request)
    {
        $data = $this->aboutPageService->update($request);
        return response()->json($data['response_data'], $data['error_no']);
    }




    public function updateContactPage(UpdateContactPageRequest $request)
    {
        try {
            $data = $request->toArray();
            $data['address_titles'] = $request->has('address_titles') ? $request->address_titles : [];
            $data['address_values'] = $request->has('address_values') ? $request->address_values : [];
            $this->saveSetting($data, 'contact');
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }





    public function branchesPage()
    {
        try {

            $data['page_settings_ar'] = BusinessSetting::query()->wherePage('branches')->whereLang('ar')->pluck('value', 'key');
            $data['page_settings_en'] = BusinessSetting::query()->wherePage('branches')->whereLang('en')->pluck('value', 'key');
            $addres_titles_ar = json_decode(@$data['page_settings_ar']['address_titles'], true) ?? [];
            $addres_titles_en = json_decode(@$data['page_settings_en']['address_titles'], true) ?? [];
            $addres_values = json_decode(@$data['page_settings_ar']['address_values'], true) ?? [];
            $data['addresses'] = [];
            $i = 0;
            foreach ($addres_titles_ar as $address_ar) {
                array_push($data['addresses'], ['title_ar' => $address_ar, 'title_en' => $addres_titles_en[$i], 'value' => @$addres_values[$i++]]);
            }
            return view('admin.pages.branches', $data);
        } catch (Throwable $e) {
            dd($e);
        }
    }

    public function updatebranchesPage(UpdateBranhesPageRequest $request)
    {
        $data = $this->aboutPageService->updateBranchesPage($request);
        return response()->json($data['response_data'], $data['error_no']);
    }



    public function generalSettings()
    {
        $data['general_settings'] = BusinessSetting::query()->wherePage('site')->pluck('value', 'key');
        return view('admin.settings.general' , $data);
    }


    public function updateGeneralSettings(UpdateGeneralSerttingsRequest $request)
    {
        $data = $this->aboutPageService->updateGeneralSettings($request);
        return response()->json($data['response_data'], $data['error_no']);
    }


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
