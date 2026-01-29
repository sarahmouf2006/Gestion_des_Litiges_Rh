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
Route::get('/profile/change-password', [ProfileController::class, 'showChangePassword'])->name('profile.change-password');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password.post');
Route::get('/profile/two-factor', [ProfileController::class, 'showTwoFactor'])->name('profile.two-factor');
Route::post('/profile/two-factor', [ProfileController::class, 'toggleTwoFactor'])->name('profile.two-factor.post');
Route::get('/profile/connection-history', [ProfileController::class, 'showConnectionHistory'])->name('profile.connection-history');

// Support
Route::get('/support', function () {
    return view('support');
})->name('support');

// Litiges
Route::get('/litiges', [LitigeController::class, 'index'])->name('litiges.index');
Route::get('/litiges/create', [LitigeController::class, 'create'])->name('litiges.create');
Route::post('/litiges', [LitigeController::class, 'store'])->name('litiges.store');
Route::get('/litiges/{id}/edit', [LitigeController::class, 'edit'])->name('litiges.edit');
Route::put('/litiges/{id}', [LitigeController::class, 'update'])->name('litiges.update');
Route::delete('/litiges/{id}', [LitigeController::class, 'destroy'])->name('litiges.destroy');
Route::get('/litiges/export', [LitigeController::class, 'export'])->name('litiges.export');

// Jugements
Route::get('/jugements', [JugementController::class, 'index'])->name('jugements.index');
Route::get('/jugements/create', [JugementController::class, 'create'])->name('jugements.create');
Route::post('/jugements', [JugementController::class, 'store'])->name('jugements.store');
Route::get('/jugements/{id}/edit', [JugementController::class, 'edit'])->name('jugements.edit');
Route::put('/jugements/{id}', [JugementController::class, 'update'])->name('jugements.update');
Route::delete('/jugements/{id}', [JugementController::class, 'destroy'])->name('jugements.destroy');
Route::get('/jugements/export', [JugementController::class, 'export'])->name('jugements.export');
