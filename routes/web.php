<?php

use App\Http\Controllers\BaAssignController;
use App\Http\Controllers\BaAttendanceController;
use App\Http\Controllers\BaDailyReportController;
use App\Http\Controllers\BaStaffController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\VideoController;
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
use App\Http\Controllers\BaSupervisorController;
use App\Http\Controllers\MrSupervisorController;
use App\Http\Controllers\MrLeaderController;
use App\Http\Controllers\MrInputFieldController;

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
    Route::resource('ba_supervisors', BaSupervisorController::class);
    Route::resource('mr_supervisors', MrSupervisorController::class);
    Route::resource('mr_leaders', MrLeaderController::class);
    Route::resource('merchandiser', MerchandiserController::class);
    Route::resource('product_brands', ProductBrandController::class);
    Route::resource('product_categories', ProductCategoryController::class);
    Route::resource('product_sub_cateogories', ProductSubCategoryController::class);
    Route::resource('product_key_cateogories', ProductKeyCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('assignMerchandiser', MerchandiserAssignController::class);
    Route::resource('assignBa', BaAssignController::class);
    Route::resource('mr_input_fields', MrInputFieldController::class);
    Route::post('ba-assign-filter', [App\Http\Controllers\BaAssignController::class, 'showFilterBaAssign'])->name('assignBa.showFilterBaAssign');
    Route::resource('ba_daily_reports', BaDailyReportController::class);
    Route::resource('mr_daily_reports', MerchandiserDailyReportController::class);
    Route::get('getCityByDivision', [App\Http\Controllers\CityController::class, 'getCityByDivision'])->name('getCityByDivision');
    Route::get('getTownshipByCity', [App\Http\Controllers\TownshipController::class, 'getTownshipByCity'])->name('getTownshipByCity');
    Route::get('merchandiserReportExport/{startDate}/{endDate}/{report_type}', [App\Http\Controllers\MerchandiserDailyReportController::class, 'merchandiserReportExport'])->name('merchandiserReportExport');
    Route::post('baDAilyReportExport', [App\Http\Controllers\BaDailyReportController::class, 'baDailyReportExport'])->name('baDAilyReportExport');
    Route::post('ba-daily-reports-filter', [App\Http\Controllers\BaDailyReportController::class, 'showFilterBaDailyReports'])->name('ba_daily_reports.showFilterBaDailyReports');
    Route::post('/baStaffImport', [App\Http\Controllers\BaStaffController::class, 'baStaffImport'])->name('baStaffImport');
    Route::post('/mrStaffImport', [App\Http\Controllers\MerchandiserController::class, 'mrStaffImport'])->name('mrStaffImport');
    Route::post('/customerImport', [App\Http\Controllers\CustomerController::class, 'customerImport'])->name('customerImport');
    Route::post('/productImport', [App\Http\Controllers\ProductController::class, 'productImport'])->name('productImport');
    Route::post('/baAssignImport', [App\Http\Controllers\BaAssignController::class, 'baAssignImport'])->name('baAssignImport');
    Route::post('/assignMerchandiserImport', [App\Http\Controllers\MerchandiserAssignController::class, 'assignMerchandiserImport'])->name('assignMerchandiserImport');
    Route::get('getMerchandiserReport', [App\Http\Controllers\MerchandiserDailyReportController::class, 'getMerchandiserReport'])->name('getMerchandiserReport');
    Route::resource('ba_attandence', BaAttendanceController::class);
    Route::post('ba-attendance-filter', [App\Http\Controllers\BaAttendanceController::class, 'showFilterAttendance'])->name('ba_attandence.showFilterAttendance');
    Route::resource('merchandiser_attandence', MerchandiserAttendanceController::class);
    Route::post('merchandiser-attendance-filter', [App\Http\Controllers\MerchandiserAttendanceController::class, 'showFilterMerchandiserAttendance'])->name('merchandiser_attandence.showFilterMerchandiserAttendance');

    // Email
    Route::get('/email', 'App\Http\Controllers\EmailController@showEmailForm')->name('email.form');
    Route::post('/preview-email', 'App\Http\Controllers\EmailController@previewEmail')->name('email.preview');
    Route::post('/confirm-send-email', 'App\Http\Controllers\EmailController@confirmSendEmail')->name('email.confirm-send');
    // Route::get('/php-info', 'App\Http\Controllers\EmailController@showPhpInfo')->name('php-info');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
