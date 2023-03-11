<?php

use App\Http\Controllers\BaStaffController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiserController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSubCategoryController;


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
    Route::resource('customers', CustomerController::class);
    Route::resource('merchandiser', MerchandiserController::class);
    Route::resource('product_brands', ProductBrandController::class);
    Route::resource('product_categories', ProductCategoryController::class);
    Route::resource('product_sub_cateogories', ProductSubCategoryController::class);
    Route::resource('products', ProductController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
