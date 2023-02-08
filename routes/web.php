<?php

use App\Http\Controllers\HomeController;
use App\Models\BusinessSetting;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\Service;
use Google\Service\MyBusinessLodging\Business;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

    Route::group(['controller' => HomeController::class , 'as' => 'site.'] , function () {

        Route::get('/' , 'home')->name('home');

        Route::get('about', 'about')->name('about');

        Route::get('contact' , 'contact')->name('contact');
        Route::post('contact/submit', 'submitContact')->name('contact.submit');

        //Servicses Routes
        Route::get('services'  , 'services')->name('services');
        Route::get('service/{id}', 'serviceDetails')->name('service.details');
        Route::get('service/{id}/pdf', 'servicePdf')->name('service.pdf');

        // Proeject Routes
        Route::get('projecst', 'projects')->name('projects');
        Route::get('project/{id}', 'projectDetails')->name('project.details');

        // Jobs
        Route::get('jobs', 'jobs')->name('jobs');
        Route::get('job/{id}', 'jobDetails')->name('job_details');
        Route::post('job/apply', 'submitJobApplication')->name('job.apply');

        Route::get('branches', 'branches')->name('branches');
        Route::get('gallery/{id}', 'gallery')->name('gallery');

    });
});



Route::get('fill-about-data', function () {
    // BusinessSetting::query()->create([
    //     'lang' => 'ar',
    //     'key' => 'about_us_text',
    //     'page'  =>  'about',
    //     'value' => 'يعتبر مكتب الرؤية المتكاملة من المكاتب الرائدة بالإمارات العربية المتحدة في مجال الاستشارات الهندسية وإدارة المشروعات حيث برزت الفكرة لتأسيس هذا المكتب وفقا لرؤية محددة تتطلع الى افاق عريضة وطموحات عالية لا سقف لها فعملنا جاهدين للوصول الى هذه الرؤية المتكاملة والتي تؤكد على ضرورة تطوير واتقان العمل المهني واستخدام الخدمات المتكاملة والحلول المبتكرة  في مجال الاستشارات الهندسية  وإدارة المشروعات والاشراف على المواقع (السكنية - التجارية - الصناعية - الحكومية - والمساجد)',
    // ]);
    // BusinessSetting::query()->create([
    //     'lang' => 'ar',
    //     'key' => 'exclusive_design_description',
    //     'page'  =>  'about',
    //     'value' => 'نؤمن أن التصميم الرائع يجب ألا يبدو جميلًا فحسب ، بل يجب أن يلبي أيضًا المتطلبات الوظيفية للعميل. يأخذ فريقنا الوقت الكافي لفهم احتياجاتك وأسلوبك وتفضيلاتك ، مما يضمن أن النتيجة النهائية لا تبدو مذهلة فحسب ، بل تخدم أيضًا الغرض المقصود منها.'
    // ]);
    // BusinessSetting::query()->create([
    //     'lang' => 'ar',
    //     'key' => 'pro_team_description',
    //     'page'  =>  'about',
    //     'value' =>  'فريقنا من المهندسين ذوي الخبرة والمهارة العالية مكرس لتقديم حلول مخصصة وشخصية لتلبية الاحتياجات والتفضيلات الخاصة لعملائنا.',
    // ]);
    $settings   =   BusinessSetting::whereLang('en') ->get();
    foreach($settings as $setting)
    {
        BusinessSetting::query()->create([
            'lang' => 'ar',
            'key' => $setting->key,
            'value' => $setting->value,
            'page' => $setting->page,
        ]);
    }
    dd('Done');
});


Route::get('trans-test', function () {
    $service = Service::find(5);
    dd($service);
    $service->translateOrNew('ar')->name    =  'االتصميم';
    $service->translateOrNew('ar')->details    =  ' لعبتنااالتصميم';
    $service->save();
    dd('DONE');
});
