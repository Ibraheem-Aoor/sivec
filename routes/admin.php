<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobPositionController;
use App\Http\Controllers\Admin\JobTitleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemmberController;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::group(['prefix' => 'backoffice' ], function () {
    Auth::routes(['login']);

    ########## START AUTH ADMIN #############
    Route::group(['middleware' => 'auth' , 'as' => 'admin.'], function () {
        Route::get('/',  [DashboardController::class , 'index'])->name('dashboard');
        Route::get('contacts' , [DashboardController::class , 'contacts'])->name('contact.index');
        Route::get('contact-table-data', [DashboardController::class, 'getContactTableData'])->name('contact.table_data');

        // Team Members
        Route::resource('team-members', TeamMemmberController::class);
        Route::post('team-members/{id}/update', [TeamMemmberController::class , 'update'])->name('team-members.custom_update');
        Route::get('team-members-table-data', [TeamMemmberController::class, 'getTableData'])->name('team-members.table_data');


        // Service Category
        Route::resource('service-category', ServiceCategoryController::class);
        Route::post('service-category/{id}/update', [ServiceCategoryController::class , 'update'])->name('service-category.custom_update');
        Route::get('service-category-table-data', [ServiceCategoryController::class, 'getTableData'])->name('service-category.table_data');

        // Services
        Route::resource('service', ServiceController::class);
        Route::post('service/{id}/update', [ServiceController::class , 'update'])->name('service.custom_update');
        Route::get('service-table-data', [ServiceController::class, 'getTableData'])->name('service.table_data');


        // Clients
        Route::resource('client', ClientController::class);
        Route::post('client/{id}/update', [ClientController::class , 'update'])->name('client.custom_update');
        Route::get('client-table-data', [ClientController::class, 'getTableData'])->name('client.table_data');


           // Proejct Category
        Route::resource('project-category', ProjectCategoryController::class);
        Route::post('project-category/{id}/update', [ProjectCategoryController::class , 'update'])->name('project-category.custom_update');
        Route::get('project-category-table-data', [ProjectCategoryController::class, 'getTableData'])->name('project-category.table_data');


          // Project
          Route::resource('project', ProjectController::class);
          Route::post('project/{id}/update', [ProjectController::class , 'update'])->name('project.custom_update');
          Route::get('project-table-data', [ProjectController::class, 'getTableData'])->name('project.table_data');


        Route::group(['controller' =>  PageController::class , 'prefix' => 'page',  'as' => 'page.' ], function () {
            Route::get('about' ,    'aboutPage')->name('about');
            Route::post('about/update' ,    'updateAboutPageSettings')->name('about.update');
            Route::get('contact' ,    'contactPage')->name('contact');
            Route::post('contact/update' ,    'updateContactPage')->name('contact.update');
        });
        Route::group(['controller' =>  SettingController::class , 'prefix' => 'settings',  'as' => 'settings.' ], function () {
            Route::get('general' ,    'generalSettings')->name('general');
            Route::post('general' ,    'updateGeneralSettings')->name('general.update');
        });


        // Job Titles
        Route::resource('job-title', JobTitleController::class);
        Route::post('job-title/{id}/update', [JobTitleController::class , 'update'])->name('job-title.custom_update');
        Route::get('job-title-table-data', [JobTitleController::class, 'getTableData'])->name('job-title.table_data');

        // Job Positions
        Route::resource('job-position', JobPositionController::class);
        Route::post('job-position/{id}/update', [JobPositionController::class , 'update'])->name('job-position.custom_update');
        Route::get('job-position-table-data', [JobPositionController::class, 'getTableData'])->name('job-position.table_data');
    });
    ########## END  AUTH ADMIN #############
});
