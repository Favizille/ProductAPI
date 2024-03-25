<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/product/create', [ProductController::class, 'createProduct']);
Route::get('/product/{productId}', [ProductController::class, 'getProduct']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::put('/product/update/{productId}', [ProductController::class, 'updateProduct']);
Route::delete('/product/delete/{$productId}', [ProductController::class, 'deleteProduct']);