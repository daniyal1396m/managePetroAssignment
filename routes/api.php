<?php

    use App\Http\Controllers\Admin\OrderController as OrderAdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Client\OrderController as OrderClientController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */

    Route::group(['middleware' => ['cors', 'json.response']], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::group(['prefix' => 'orders', 'middleware' => ['auth:api', 'admin']], function () {
                Route::get('/', [OrderAdminController::class, 'index']);
                Route::post('/store', [OrderAdminController::class, 'store']);
                Route::delete('/{id}', [OrderAdminController::class, 'destroy']);
            });
        });
        Route::group(['prefix' => 'client'], function () {
            Route::group(['prefix' => 'orders', 'middleware' => ['auth:api', 'client']], function () {
                Route::get('/', [OrderClientController::class, 'index']);
            });
        });
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    });

