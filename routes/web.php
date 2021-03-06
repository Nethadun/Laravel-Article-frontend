<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/create_article', [App\Http\Controllers\ArticleController::class, 'index'])->name('create_article');
Route::POST('/post_article', [App\Http\Controllers\ArticleController::class, 'create'])->name('post_article');
//Route::get('/create_article', function () {
//    return view('article.create');
//});
