<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\ProsesorController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login'); // Login page
    Route::post('/login', 'login'); // Login action
    Route::post('/logout', 'logout')->name('logout'); // Logout action
});

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index'); // Home page
});

// Dashboard Routes (Protected by 'auth' middleware)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    // Dashboard Home
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Routes
    Route::resource('/rams', RamController::class); // CRUD for RAM
    Route::resource('/prosesors', ProsesorController::class); // CRUD for Processors
    Route::resource('/laptops', LaptopController::class); // CRUD for Laptops
});
