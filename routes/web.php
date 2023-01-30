<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\LandController;
use App\Http\Controllers\Dashboard\LandDirectionsController;
use App\Http\Controllers\Dashboard\LandscapeController;
use App\Http\Controllers\Dashboard\OfficeController;
use App\Http\Controllers\Dashboard\SiteDescriptionController;
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
Auth::routes(['verify' => true]);
Route::get('logout', [LoginController::class, 'logout'])->name('social.redirect');
Route::get('login/{provider}/callback', [RegisterController::class, 'handleProviderCallback'])->name('social.handle');
Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('offices', OfficeController::class);
    Route::resource('lands', LandController::class);
    Route::resource('landscapes', LandscapeController::class);
    Route::resource('directions', LandDirectionsController::class);
    Route::resource('land-descriptions', SiteDescriptionController::class);
});


