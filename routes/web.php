<?php

use App\Http\Controllers\HomeController;
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




});



