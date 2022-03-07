<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
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

Route::get('/login', [SessionController::class, 'index'])->name('login.page');

Route::get('/home', [HomeController::class, 'index'])->name('main.page');

Route::post('/login', [SessionController::class, 'attempt'])->name('login.attempt');

Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');