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

Route::get('/', [App\Http\Controllers\UrlController::class, 'index']);
Route::get('shorturl', [App\Http\Controllers\UrlController::class, 'add']);
Route::post('shorturl/add', [App\Http\Controllers\UrlController::class, 'store'])->name('shorturl.store');