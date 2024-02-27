<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use App\Models\User;



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

// Route::apiResource('products', ProductController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/cursos', [CursoController::class, 'index']);

    Route::apiResource('products', ProductController::class);
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products/signed/{id}', 'App\Http\Controllers\api\ProductController@generarUrlFirmada');
    Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show.signed')->middleware('signed', 'throttle:5,1');
    Route::get('/products/description-length/{length}', [ProductController::class, 'getProductsByDescriptionLength']);
});

Route::post("/login", [UserController::class, 'index']);


// Route::middleware(['throttle:5,1'])->group(function () {
//     Route::get('/products', [ProductController::class, 'index']);
//     Route::get('/cursos', [CursoController::class, 'index']);
// });

Route::get('/users', function () {
    $users = User::all();
    return response()->json(['users' => $users]);
})->name('users.index')->middleware('custom.restrict');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
