<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'login'])->name('v1.auth.login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthenticationController::class, 'logout'])->name('v1.auth.logout');

        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('v1.user.profile');

        Route::get('/products/search/{code}', [ProductController::class, 'search'])->name('v1.products.search');

        Route::apiResource('products', ProductController::class, [
            'names' => 'v1.products',
        ]);
    });
});
