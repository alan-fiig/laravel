<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;

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

Route::apiResource('products', ProductController::class);

// Route::get('/generate-signed-url/{id}', 'ProductController@generarUrlFirmada');

// Route::get('/products/{id}', ProductController::class)->name('products.show.signed');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['throttle:minute'])->group(function () {
//     Route::get('/products', [ProductController::class, 'getProducts']);
// });

// Route::middleware(['throttle:5,1'])->group(function () {
//     Route::patch('/products', [ProductController::class, 'updateProducts']);
// });
