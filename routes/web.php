<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualController;
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
    return view('landingpage');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
// Route::get('/motor', [HomeController::class, 'beranda'])->middleware(['auth:sanctum', 'verified']);
Route::resource('motor', MotorController::class);
Route::resource('penjual', PenjualController::class);