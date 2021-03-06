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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/load', [App\Http\Controllers\HomeController::class, 'load']);
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.user');
Route::resource('/replies', [App\Http\Controllers\ReplyController::class, 'store']);