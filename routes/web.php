<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\ProsesorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan route web untuk aplikasi.
| Routes ini otomatis menggunakan middleware "web" yang berisi sesi, CSRF, dll.
|
*/

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('user.index', ['title' => 'Dashboard']);
})->name('dashboard');

// Resource routes untuk manajemen RAM
Route::resource('rams', RamController::class);

// Resource routes untuk manajemen user admin, tanpa route show, dan dengan custom name
Route::resource('admin/users', UserController::class)
    ->except(['show'])
    ->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);

// Resource routes untuk manajemen prosesor
Route::resource('prosesors', ProsesorController::class);
