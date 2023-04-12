<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MerchandiserController;
use App\Http\Controllers\Api\ReportTypeController;
use App\Http\Controllers\Api\Product\ProductApiController;
use App\Http\Controllers\Api\GondolorTypeController;
use App\Http\Controllers\Api\TripTypeController;
use App\Http\Controllers\Api\OutskirtTypeController;
use App\Http\Controllers\Api\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api.token')->group(function () {
    Route::prefix('merchandiser')->group(function () {
        // auth
        Route::post('login', [AuthApiController::class, 'login']);
        // checking for bearer token
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('assignCustomerLists',  [MerchandiserController::class, 'assignCustomerLists']);
            Route::get('gondolorTypeLists',  [GondolorTypeController::class, 'index']);
            Route::get('tripTypeLists',  [TripTypeController::class, 'index']);
            Route::get('outskirtTypeLists',  [OutskirtTypeController::class, 'index']);
            Route::post('storeMerchandiseReport', [ReportController::class,'storeMerchandiseReport']);
        });
    });

    Route::prefix('bastaff')->group(function () {
        // auth
        Route::post('login', [AuthApiController::class, 'login']);
        // checking for bearer token
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('report_type',[ReportTypeController::class, 'index']);
            Route::prefix('product')->group(function() {

                // Get Product Based on Filter(s)
                Route::get('/products', [ProductApiController::class, 'index']);
                // Get All Product Brands
                Route::get('/products/product_brands', [ProductApiController::class, 'getAllProductBrands']);
            });
        });
    });

    

});
