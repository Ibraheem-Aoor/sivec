<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAboutPageRequest;
use App\Http\Requests\Admin\UpdateBranhesPageRequest;
use App\Http\Requests\Admin\UpdateContactPageRequest;
use App\Http\Requests\Admin\UpdateGeneralSerttingsRequest;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PageController extends Controller
{
    public function aboutPage()
    {
        $data['page_settings_ar'] = BusinessSetting::query()
            ->wherePage('about')
            ->whereLang('ar')
            ->pluck('value', 'key');
        $data['page_settings_en'] = BusinessSetting::query()
            ->wherePage('about')
            ->whereLang('en')
            ->pluck('value', 'key');

        return view('admin.pages.about', $data);
    }

    /**
     * Update The business Ssttings of the about page.
     * @return \response
     */
    public function updateAboutPageSettings(UpdateAboutPageRequest $request)
    {
        try {
            $data = $request->toArray();
            $about_image_1_content = $request->file('about_image_1');
            $about_image_2_content = $request->file('about_image_2');
            if ($about_image_1_content) {
                $data['about_image_1'] = saveImage('site/about/', $about_image_1_content);
                $old_image_1 = BusinessSetting::query()->wherePage('about')->whereKey('about_image_1')->first()?->value;
                deleteImage($old_image_1);
                $data['settings_ar']['about_image_1'] = $data['about_image_1'];
                $data['settings_en']['about_image_1'] = $data['about_image_1'];
            }
            if ($about_image_2_content) {
                $data['about_image_2'] = saveImage('site/about/', $about_image_2_content);
                $old_image_2 = BusinessSetting::query()->wherePage('about')->whereKey('about_image_2')->first()?->value;
                deleteImage($old_image_2);
                $data['settings_ar']['about_image_2'] = $data['about_image_2'];
                $data['settings_en']['about_image_2'] = $data['about_image_2'];
            }
            $this->saveSetting($data['settings_ar'], 'about', 'ar');
            $this->saveSetting($data['settings_en'], 'about', 'en');
            $response_data['status'] = true;
            $response_data['message'] = __('response.update_success');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
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
        try {
            $data = $request->toArray();
            $this->saveSetting($data['ar'], 'branches' , 'ar');
            $this->saveSetting($data['en'], 'branches', 'en');
            $this->saveSetting(['address_values' => $data['address_values']], 'branches', 'ar');
            $this->saveSetting(['address_values' => $data['address_values']], 'branches', 'en');
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



    public function generalSettings()
    {
        $data['general_settings'] = BusinessSetting::query()->wherePage('site')->pluck('value', 'key');
        return view('admin.settings.general' , $data);
    }


    public function updateGeneralSettings(UpdateGeneralSerttingsRequest $request)
    {
        try{
            $data = $request->toArray();
            $this->saveSetting($data, 'site' , 'ar');
            $this->saveSetting($data, 'site' , 'en');
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
