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
Route::get('/', [App\Http\Controllers\UserController::class, 'mainhome'])->name('user.home');

Route::get('user/register/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.register.create');
Route::post('user/register/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.register.store');
Route::get('user/register/success', [App\Http\Controllers\UserController::class, 'success'])->name('user.register.success');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('home');

    //Update User Details
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    //Language Translation
    Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

    Route::get('user/register', [App\Http\Controllers\UserController::class, 'server_side'])->name('user.register.server_side');
    Route::any('user/register/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.register.index');
    Route::get('user/change_status/{id}', [App\Http\Controllers\UserController::class, 'changeStatus'])->name('user.change_status');
    Route::post('user/change_photo', [App\Http\Controllers\UserController::class, 'changePhoto'])->name('user.photo.edit');

    Route::get('/test/test',  function () {
        return  phpinfo();
    });
});
