<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\DashboardController;use App\Http\Controllers\AuthController;

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/instansi', [InstansiController::class, 'index'])->name('instansi.index');
Route::post('/instansi', [InstansiController::class, 'store'])->name('instansi.store');
Route::get('/instansi/{id}/edit', [InstansiController::class, 'edit'])->name('instansi.edit');
Route::put('/instansi/{id}', [InstansiController::class, 'update'])->name('instansi.update');
Route::delete('/instansi/{id}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('login');
})->name('login');

