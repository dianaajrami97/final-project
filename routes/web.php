<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


Route::group(['prefix' => 'control', 'middleware' => 'auth'], function() {
	Route::group(['prefix' => 'category'], function() {
		Route::get('all', [CategoriesController::class, 'index'])->name('category.all');
		Route::get('create', [CategoriesController::class, 'create'])->name('category.create');
		Route::post('store', [CategoriesController::class, 'store'])->name('category.store');
		Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
		Route::put('update/{id}', [CategoriesController::class, 'update'])->name('category.update');
		Route::get('delete/{id}', [CategoriesController::class, 'destroy'])->name('category.delete');
	});

	Route::group(['prefix' => 'book'], function() {
		Route::get('all', [BooksController::class, 'index'])->name('book.all');
		Route::get('create', [BooksController::class, 'create'])->name('book.create');
		Route::post('store', [BooksController::class, 'store'])->name('book.store');
		Route::get('edit/{id}', [BooksController::class, 'edit'])->name('book.edit');
		Route::put('update/{id}', [BooksController::class, 'update'])->name('book.update');
		Route::get('delete/{id}', [BooksController::class, 'destroy'])->name('book.delete');
	});
});

Route::get('/dashboard', function () {
    return view('control.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
