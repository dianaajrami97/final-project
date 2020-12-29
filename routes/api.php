<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\BooksController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::group(['prefix' => 'control', 'middleware' => 'auth:api'], function() {
	Route::group(['prefix' => 'category'], function() {
		Route::get('all', [CategoriesController::class, 'index']);
		Route::post('store', [CategoriesController::class, 'store']);
		Route::put('update/{id}', [CategoriesController::class, 'update']);
		Route::get('delete/{id}', [CategoriesController::class, 'destroy']);
	});

	Route::group(['prefix' => 'book'], function() {
		Route::get('all', [BooksController::class, 'index']);
		Route::post('store', [BooksController::class, 'store']);
		Route::put('update/{id}', [BooksController::class, 'update']);
		Route::get('delete/{id}', [BooksController::class, 'destroy']);
	});
});
