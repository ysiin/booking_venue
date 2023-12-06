<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\rombonganController;
use App\Http\Controllers\userController;
use App\Http\Controllers\venueController;
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

Route::get('/signup', [registerController::class, 'create']);

Route::post('/register', [registerController::class, 'store'])->name('register');

Route::get('/signin', [loginController::class, 'index']);

Route::post('/check', [loginController::class, 'check'])->name('check');

Route::get('/logout', [loginController::class, 'logout']);



Route::middleware(['admin'])->group(function () {
    Route::resource('user', userController::class);
    Route::put('/pemesanan/status/{id}', [pemesananController::class, 'updateStatus'])->name('updateStatus');
    Route::put('/pemesanan/statusBack/{id}', [pemesananController::class, 'updateStatusBack'])->name('updateStatusBack');
    Route::get('/pemesanan/pending', [pemesananController::class, 'pending']);
    Route::delete('/pemesanan/destroyPending/{id}', [pemesananController::class, 'destroyPending']);
});


Route::get('/datacalendar', [dashboardController::class, 'listEvent'])->name('home');


Route::resource('/', dashboardController::class);
Route::resource('rombongan', rombonganController::class);
Route::resource('venue', venueController::class);
Route::resource('pemesanan', pemesananController::class);
Route::resource('item', itemController::class);
