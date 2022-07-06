<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/player/{id}', [App\Http\Controllers\PlayerController::class, 'show'])->name('player');

Route::get('/bookings', [App\Http\Controllers\BookingsController::class, 'bookings'])->name('bookings');
Route::post('/bookings/add-booking', [App\Http\Controllers\BookingsController::class, 'addBooking']);
Route::get('/bookings/new-player', [App\Http\Controllers\BookingsController::class, 'newPlayer']);
Route::get('/bookings/remove-player', [App\Http\Controllers\BookingsController::class, 'removePlayer']);
Route::get('/bookings/new-game', [App\Http\Controllers\BookingsController::class, 'newGame']);

Auth::routes();
