<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAboutPageRequest;
use App\Http\Requests\Admin\UpdateBranhesPageRequest;
use App\Http\Requests\Admin\UpdateContactPageRequest;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PageController extends Controller
{
    public function aboutPage()
    {
        $data['page_settings'] =  BusinessSetting::query()->wherePage('about')->pluck('value' , 'key');
        return view('admin.pages.about' , $data);
    }

    /**
     * Update The business Ssttings of the about page.
     * @return \response
     */
    public function updateAboutPageSettings(UpdateAboutPageRequest $request)
    {
        try{
            $data = $request->toArray();
            $data['about_us_features'] = $request->has('about_us_features') ? $request->about_us_features : [];
            $about_image_1_content = $request->file('about_image_1');
            $about_image_2_content = $request->file('about_image_2');
            if($about_image_1_content)
            {
                $data['about_image_1'] = encrypt(time()) . '.' . $about_image_1_content->getClientOriginalExtension();
                $about_image_1_content->storeAs('public/site/about/', $data['about_image_1']);
                $old_image_1 = BusinessSetting::query()->wherePage('about')->whereKey('about_image_1')->first()?->value;
                if($old_image_1)
                {
                    Storage::disk('public')->delete('public/site/about/', $old_image_1);
                }
            }
            if($about_image_2_content)
            {
                $data['about_image_2'] = encrypt(time()+1) . '.' . $about_image_2_content->getClientOriginalExtension();
                $about_image_2_content->storeAs('public/site/about/', $data['about_image_2']);
                $old_image_2 = BusinessSetting::query()->wherePage('about')->whereKey('about_image_2')->first()?->value;
                if($old_image_2)
                {
                    Storage::disk('public')->delete('public/site/about/',   $old_image_2 );
                }
            }
            $this->saveSetting($data , 'about');
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data , $error_no);
    }

    public function contactPage()
    {
        try{

            $data['page_settings'] =  BusinessSetting::query()->wherePage('contact')->pluck('value' , 'key');
            $addres_titles =    json_decode( @$data['page_settings']['address_titles'] , true) ?? [];
            $addres_values = json_decode(@$data['page_settings']['address_values'] , true) ?? [];
            $data['addresses'] =    [];
            $i = 0;
            foreach($addres_titles as $address)
            {
                array_push($data['addresses'], ['title' => $address, 'value' => @$addres_values[$i++]]);
            }
            return view('admin.pages.contact' , $data);
        }catch(Throwable $e)
        {
            dd($e);
        }
    }



    public function updateContactPage(UpdateContactPageRequest $request)
    {
        try{
            $data = $request->toArray();
            $data['address_titles'] = $request->has('address_titles') ? $request->address_titles : [];
            $data['address_values'] = $request->has('address_values') ? $request->address_values : [];
            $this->saveSetting($data , 'contact');
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data , $error_no);
    }





    public function branchesPage()
    {
        try{

            $data['page_settings'] =  BusinessSetting::query()->wherePage('branches')->pluck('value' , 'key');
            $addres_titles =    json_decode( @$data['page_settings']['address_titles'] , true) ?? [];
            $addres_values = json_decode(@$data['page_settings']['address_values'] , true) ?? [];
            $data['addresses'] =    [];
            $i = 0;
            foreach($addres_titles as $address)
            {
                array_push($data['addresses'], ['title' => $address, 'value' => @$addres_values[$i++]]);
            }
            return view('admin.pages.branches' , $data);
        }catch(Throwable $e)
        {
            dd($e);
        }
    }

    public function updatebranchesPage(UpdateBranhesPageRequest $request)
    {
        try{
            $data = $request->toArray();
            $data['address_titles'] = $request->has('address_titles') ? $request->address_titles : [];
            $data['address_values'] = $request->has('address_values') ? $request->address_values : [];
            $this->saveSetting($data , 'branches');
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($response_data , $error_no);
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
