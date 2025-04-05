<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\LanguageController;
use App\Models\BusinessSetting;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\Service;
use Google\Service\MyBusinessLodging\Business;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Site\ProjectCategoryController;
use App\Http\Controllers\Site\ProjectController;

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


Route::get('change-lang/{locale}', [LanguageController::class, 'changeLanguage'])->middleware('locale')->name('change_language');

Route::group(['as' => 'site.'], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('about', [HomeController::class, 'about'])->name('about');

    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact/submit', [HomeController::class, 'submitContact'])->name('contact.submit');

    //Servicses Routes
    Route::get('services', [HomeController::class, 'services'])->name('services');
    Route::get('service/{id}', [HomeController::class, 'serviceDetails'])->name('service.details');
    Route::get('service/{id}/pdf', [HomeController::class, 'servicePdf'])->name('service.pdf');

    // ProjectCategories Routes
    Route::get('project-category/{id}', [ProjectCategoryController::class, 'show'])->name('project_category');

    // Proeject Routes
    Route::get('project/{id}', [ProjectController::class, 'show'])->name('project_details');

    // Jobs
    Route::get('jobs', [HomeController::class, 'jobs'])->name('jobs');
    Route::get('job/{id}', [HomeController::class, 'jobDetails'])->name('job_details');
    Route::post('job/apply', [HomeController::class, 'submitJobApplication'])->name('job.apply');

    Route::get('branches', [HomeController::class, 'branches'])->name('branches');
    Route::get('gallery/{id}', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('save-images-to-db/{id}', [HomeController::class, 'saveImagesToDB']);

});




// Route::get('set-icon', [HomeController::class , 'setIcons']);
Route::get('clear-cache', function () {
    Artisan::call('optimize:clear');
    return back();
});

