<?php

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
use App\Http\Controllers\apiProductsController as ProductController;
use App\Http\Controllers\apiCategoriesController as CategoriesController;

// Route::get('testapi', [ProductController::class, 'testapi']);
// Route::get('testapi/{id}', [ProductController::class, 'show']);
// Route::post('testapi', [ProductController::class, 'store']);
// Route::detete('testapi/{id}', [ProductController::class, 'delete']);
// Route::put('testapi/{id}', [ProductController::class, 'update']);
Route::get('detail', [ProductController::class, 'index']);
Route::get('product', [ProductController::class, 'product']);
Route::get('home', [ProductController::class, 'home']);
Route::get('dataproduct', [ProductController::class, 'dataproduct']);
Route::get('datahome', [ProductController::class, 'data_home_page']);
Route::get('datadetail', [ProductController::class, 'datadetail']);


Route::get('createfilecategories', [CategoriesController::class, 'create_file']);
Route::get('createfileproducts', [ProductController::class, 'create_file_detail']);

Route::get('products_lasted', [ProductController::class, 'products_lasted']);
Route::get('products_bestseller', [ProductController::class, 'products_bestseller']);

Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'delete']);

Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store']);
Route::put('categories/{id}', [CategoriesController::class, 'update']);
Route::delete('categories/{id}', [CategoriesController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
