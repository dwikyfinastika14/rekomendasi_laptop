<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// // Halaman utama
// Route::get('/', function () {
//     return view('welcome');
// });

// // Dashboard (contoh)
// Route::get('/admin', function () {
//     return view('user.index', ['title' => 'admin']);
// })->middleware(['auth'])->name('admin');

// // Manajemen User
// Route::middleware(['auth'])->group(function () {
//     Route::resource('/admin/users', UserController::class)->except(['show']);
// });

// // // Autentikasi Laravel Breeze (atau Jetstream jika dipasang)
// // require __DIR__ . '/auth.php';
