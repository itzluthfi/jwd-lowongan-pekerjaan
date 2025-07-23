<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// ================= PUBLIC ROUTES =================
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{id}', [LowonganController::class, 'show'])->name('lowongan.show');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/informasi-umum', [UserController::class, 'informasiUmum'])->name('informasi-umum');

// ================= GUEST ROUTES =================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// ================= AUTH ROUTES =================
Route::middleware('auth')->group(function () {
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::post('/profil/edit', [UserController::class, 'updateProfil'])->name('profil.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ================= ADMIN ROUTES =================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/lowongan', [AdminController::class, 'lowonganIndex'])->name('admin.lowongan.index');
    Route::get('/lowongan/create', [AdminController::class, 'lowonganCreate'])->name('admin.lowongan.create');
    Route::post('/lowongan', [AdminController::class, 'lowonganStore'])->name('admin.lowongan.store');
    Route::get('/lowongan/{id}/edit', [AdminController::class, 'lowonganEdit'])->name('admin.lowongan.edit');
    Route::put('/lowongan/{id}', [AdminController::class, 'lowonganUpdate'])->name('admin.lowongan.update');
    Route::delete('/lowongan/{id}', [AdminController::class, 'lowonganDestroy'])->name('admin.lowongan.destroy');

    Route::get('/user', [AdminController::class, 'userIndex'])->name('admin.user.index');
    Route::get('/user/create', [AdminController::class, 'userCreate'])->name('admin.user.create');
    Route::post('/user', [AdminController::class, 'userStore'])->name('admin.user.store');
    Route::get('/user/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.user.edit');
    Route::put('/user/{id}', [AdminController::class, 'userUpdate'])->name('admin.user.update');
    Route::delete('/user/{id}', [AdminController::class, 'userDestroy'])->name('admin.user.destroy');
});
