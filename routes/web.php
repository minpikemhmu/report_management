<?php

use App\Http\Controllers\BaStaffController;
use App\Http\Controllers\OutletController;
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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('outlets', OutletController::class);
    Route::resource('bastaffs', BaStaffController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
