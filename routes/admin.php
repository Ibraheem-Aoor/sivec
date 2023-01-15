<?php

use App\Http\Controllers\Admin\TeamMemmberController;
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


Route::group(['prefix' => 'backoffice'], function () {
    Auth::routes(['login']);

    //Auth Admin
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', function () {
            return view('welcome');
        });

        // Team Members
        Route::resource('team-members', TeamMemmberController::class);

    });
});
