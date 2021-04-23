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
    return redirect()->route('user.show.by.query');
});

Route::get('users', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show.by.query');
Route::get('users/{userID}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show.by.params');
Route::post('users', [\App\Http\Controllers\UserController::class, 'storeComments'])->name('user.comment.store');
