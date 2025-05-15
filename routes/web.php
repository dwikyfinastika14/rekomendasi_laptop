<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RamController;

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

// Halaman utama (Welcome page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('user.index', ['title' => 'Dashboard']);
})->name('dashboard');

// Manajemen RAM (resource controller)
Route::resource('/rams', RamController::class);

// Manajemen User (resource controller tanpa show route, dengan custom names)
Route::resource('/admin/users', UserController::class)->except(['show'])->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
]);
