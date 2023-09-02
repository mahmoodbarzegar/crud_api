<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::get('/v1/products', [ProductController::class, 'list']);
    Route::post('/v1/products/create', [ProductController::class, 'create']);
});

Route::post('/v1/register', [AuthController::class, 'createUser']);
Route::post('/v1/login', [AuthController::class, 'loginUser']);
