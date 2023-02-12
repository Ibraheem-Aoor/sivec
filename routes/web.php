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


Route::get('set-icon', [HomeController::class , 'setIcons']);

