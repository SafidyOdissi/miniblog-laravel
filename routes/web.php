<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BlogController::class, 'list'])->name('route.home');
Route::get('/blog/{id}', [BlogController::class, 'one'])->where('id', '[1-9]+')->name('route.single');
Route::get('/add', [BlogController::class, 'add'])->name('blog.add');
Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/delete/{id}', [BlogController::class, 'remove'])->where('id', '[1-9]+')->name('blog.delete');
