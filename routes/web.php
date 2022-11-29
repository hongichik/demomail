<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('homeUser');

Auth::routes();
Route::get('email-verification/error', 'App\Http\Controllers\Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'App\Http\Controllers\Auth\RegisterController@getVerification')->name('email-verification.check');
Route::group(
    ['middleware' => ['isVerified']],
    function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    });


