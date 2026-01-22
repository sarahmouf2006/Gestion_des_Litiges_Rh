<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LitigeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JugementController;  // هنا نضيف JugementController مرة وحدة

// صفحة login
Route::get('/', function () {
    return view('index');
})->name('login');

// إرسال معلومات login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// صفحة register
Route::get('/register', function () {
    return view('register');
})->name('register');

// استقبال معلومات التسجيل
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Dashboard (باستعمال controller فقط)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profil (باستعمال controller)
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// Support
Route::get('/support', function () {
    return view('support');
})->name('support');

// Litiges
Route::get('/litiges/create', [LitigeController::class, 'create'])->name('litiges.create');
Route::post('/litiges', [LitigeController::class, 'store'])->name('litiges.store');

// Jugement routes
Route::get('/jugement', [JugementController::class, 'index'])->name('jugement.index');
Route::get('/jugement/create', [JugementController::class, 'create'])->name('jugement.create');
Route::post('/jugement', [JugementController::class, 'store'])->name('jugement.store');
Route::get('/jugement/{id}/edit', [JugementController::class, 'edit'])->name('jugement.edit');
Route::put('/jugement/{id}', [JugementController::class, 'update'])->name('jugement.update');
Route::delete('/jugement/{id}', [JugementController::class, 'destroy'])->name('jugement.destroy');
