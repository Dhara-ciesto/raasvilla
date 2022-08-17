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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'mainhome'])->name('mainhome');
//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);


Route::get('user/register/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.register.create');
Route::post('user/register/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.register.store');
Route::get('user/register', [App\Http\Controllers\UserController::class, 'server_side'])->name('user.register.server_side');
Route::get('user/register/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.register.index');
Route::get('user/change_status/{id}', [App\Http\Controllers\UserController::class, 'changeStatus'])->name('user.change_status');
Route::post('user/change_photo', [App\Http\Controllers\UserController::class, 'changePhoto'])->name('user.photo.edit');

Route::get('/test/test',  function() {
    return  phpinfo();
});