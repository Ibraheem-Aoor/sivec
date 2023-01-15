<?php

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

Route::get('/', function () {
    return view('site.home');
})->name('site.home');

Route::get('about', function () {
    return view('site.about');

})->name('site.about');

Route::get('contact', function () {
    return view('site.contact');

})->name('site.contact');


Route::get('services', function () {
    return view('site.services');

})->name('site.services');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
