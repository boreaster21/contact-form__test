<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/admin', [ContactController::class, 'admin']);

Route::get('/search', [ContactController::class, 'search']);

Route::get('/modal', [ContactController::class, 'modal']);
Route::delete('/delete', [ContactController::class, 'destroy']);

Route::get('/register', [ContactController::class, 'register']);
Route::get('/login', [ContactController::class, 'login']);
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/admin', [ContactController::class, 'index'])->name('admin');
//     Route::resource('/admin', ContactController::class);
// });