<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemmberController;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        Route::get('/', function () {
            return view('welcome');

        });
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
        Route::post('service/{id}/update', [ServiceCategoryController::class , 'update'])->name('service.custom_update');
        Route::get('service-table-data', [ServiceController::class, 'getTableData'])->name('service.table_data');


        // Clients
        Route::resource('client', ClientController::class);
        Route::post('client/{id}/update', [ClientController::class , 'update'])->name('client.custom_update');
        Route::get('client-table-data', [ClientController::class, 'getTableData'])->name('client.table_data');


           // Service Category
        Route::resource('project-category', ProjectCategoryController::class);
        Route::post('project-category/{id}/update', [ProjectCategoryController::class , 'update'])->name('project-category.custom_update');
        Route::get('project-category-table-data', [ProjectCategoryController::class, 'getTableData'])->name('project-category.table_data');


    });
    ########## END  AUTH ADMIN #############
});
