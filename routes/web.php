<?php

use App\Http\Controllers\BaAttendanceController;
use App\Http\Controllers\BaDailyReportController;
use App\Http\Controllers\BaStaffController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiserController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\MerchandiserAssignController;
use App\Http\Controllers\MerchandiserAttendanceController;
use App\Http\Controllers\ProductKeyCategoryController;
use App\Http\Controllers\MerchandiserDailyReportController;

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
    Route::resource('product_key_cateogories', ProductKeyCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('assignMerchandiser', MerchandiserAssignController::class);
    Route::resource('ba_daily_reports', BaDailyReportController::class);
    Route::resource('mr_daily_reports', MerchandiserDailyReportController::class);
    Route::get('getCityByDivision', [App\Http\Controllers\CityController::class, 'getCityByDivision'])->name('getCityByDivision');
    Route::get('getTownshipByCity', [App\Http\Controllers\TownshipController::class, 'getTownshipByCity'])->name('getTownshipByCity');
    Route::post('merchandiserReportExport', [App\Http\Controllers\MerchandiserDailyReportController::class, 'merchandiserReportExport'])->name('merchandiserReportExport');
    Route::post('baDAilyReportExport', [App\Http\Controllers\BaDailyReportController::class, 'baDailyReportExport'])->name('baDAilyReportExport');
    Route::post('ba-daily-reports-filter', [App\Http\Controllers\BaDailyReportController::class, 'showFilterBaDailyReports'])->name('ba_daily_reports.showFilterBaDailyReports');
    Route::post('/baStaffImport', [App\Http\Controllers\MerchandiserDailyReportController::class, 'baStaffImport'])->name('baStaffImport');
    Route::get('getMerchandiserReport', [App\Http\Controllers\MerchandiserDailyReportController::class, 'getMerchandiserReport'])->name('getMerchandiserReport');
    Route::resource('ba_attandence', BaAttendanceController::class);
    Route::post('ba-attendance-filter', [App\Http\Controllers\BaAttendanceController::class, 'showFilterAttendance'])->name('ba_attandence.showFilterAttendance');
    Route::resource('merchandiser_attandence', MerchandiserAttendanceController::class);
    Route::post('merchandiser-attendance-filter', [App\Http\Controllers\MerchandiserAttendanceController::class, 'showFilterMerchandiserAttendance'])->name('merchandiser_attandence.showFilterMerchandiserAttendance');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
