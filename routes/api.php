<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/product/create', [ProductController::class, 'createProduct']);
Route::get('/product/{productId}', [ProductController::class, 'getProduct']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::put('/product/update/{productId}', [ProductController::class, 'updateProduct']);
Route::delete('/product/delete/{productId}', [ProductController::class, 'deleteProduct']);



