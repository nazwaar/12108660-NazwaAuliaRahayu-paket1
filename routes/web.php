<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use app\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksipribadiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/auth', [LoginController::class, 'auth'])->name('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login') ;
Route::post('/loginAuth', [LoginController::class, 'auth'])->name('auth');
Route::get('/register', [LoginController::class, 'regis'])->name('register')  ;
Route::post('/actionregister', [LoginController::class, 'actionregister'])->name('actionregister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin-page', [UserController::class, 'adminPage'])->name('admin');
Route::get('/petugas-page', [UserController::class, 'petugas'])->name('petugas');
Route::get('/peminjam-page', [UserController::class, 'peminjam'])->name('peminjam');


