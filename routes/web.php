<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RegisteredUserController;


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
    return view('welcome');
});

Route::get('/appointments', [AppointmentController::class,'index'])->name('appointments.index')->middleware('auth');
Route::get('/appointments/create', [AppointmentController::class,'create'])->name('appointments.create')->middleware('auth');
Route::post('/appointments', [AppointmentController::class,'store'])->name('appointments.store')->middleware('auth');
Route::get('/appointments/{id}', [AppointmentController::class,'show'])->name('appointments.show')->middleware('auth');
Route::get('/edit_appointments/{id}/edit', [AppointmentController::class,'edit'])->name('appointments.edit')->middleware('auth');
Route::put('/apppointments/{appointment}/update', [AppointmentController::class,'update'])->name('appointments.update')->middleware('auth');
Route::delete('/appointments/{appointment}/destroy', [AppointmentController::class,'destroy'])->name('appointments.destroy')->middleware('auth');

Route::middleware('guest')->group(function () {
Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);

Route::get('/login', [SessionController::class,'create']);
Route::post('/login', [SessionController::class,'store']);
});

Route::delete('/logout', [SessionController::class,'destroy'])->middleware('auth');