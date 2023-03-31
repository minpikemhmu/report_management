<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\Product\ProductApiController;

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
        });
    });

    Route::prefix('bastaff')->group(function () {
        // auth
        Route::post('login', [AuthApiController::class, 'login']);
        // checking for bearer token
        Route::middleware('auth:sanctum')->group(function () {
            Route::prefix('product')->group(function() {

                // Get Product Based on Filter(s)
                Route::get('/products', [ProductApiController::class, 'index']);
                // Get All Product Brands
                Route::get('/products/product_brands', [ProductApiController::class, 'getAllProductBrands']);
            });
        });
    });

    

});
