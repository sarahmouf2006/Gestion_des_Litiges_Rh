<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LitigeController;
use App\Http\Controllers\ProfileController;

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

Route::get('/litiges/fetch-by-name/{name}', [LitigeController::class, 'fetchByName']);
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
Route::get('/litiges/fetch-by-rental-number/{rentalNumber}', [LitigeController::class, 'fetchByRentalNumber'])->name('litiges.fetch-by-rental-number');
Route::post('/litiges/fetch-by-name', [LitigeController::class, 'fetchByName'])->name('litiges.fetch-by-name');


// Auto-fill data endpoint - fetches real employee data from database
Route::get('/load-data/{rentalNumber}', function($rentalNumber) {
    $litige = \Illuminate\Support\Facades\DB::table('jugement')
        ->where('رقم تأجير', $rentalNumber)
        ->orderBy('id', 'desc')
        ->first();
    
    if ($litige) {
        return response()->json([
            'success' => true,
            'data' => [
                'الاسم_و_النسب' => $litige->{'الاسم و النسب'} ?? '',
                'الإطار' => $litige->{'الإطار'} ?? '',
                'المديرية_الإقليمية' => $litige->{'المديرية الإقليمية'} ?? '',
                'الاكاديمية' => $litige->{'الاكاديمية'} ?? '',
                'ملاحظات' => $litige->{'ملاحظات'} ?? ''
            ]
        ]);
    }
    
    return response()->json([
        'success' => false,
        'message' => 'No data found for this rental number'
    ]);
});

// Jugement routes
use App\Http\Controllers\JugementController;
Route::get('/jugement', [JugementController::class, 'index'])->name('jugement.index');
Route::get('/jugement/create', [JugementController::class, 'create'])->name('jugement.create');
Route::post('/jugement', [JugementController::class, 'store'])->name('jugement.store');
Route::get('/jugement/{id}/edit', [JugementController::class, 'edit'])->name('jugement.edit');
Route::put('/jugement/{id}', [JugementController::class, 'update'])->name('jugement.update');
Route::delete('/jugement/{id}', [JugementController::class, 'destroy'])->name('jugement.destroy');


Route::get('/get-data/{rentalId}', [LitigeController::class, 'getByRental']);

Route::get('/reports', function () {
    return view('reports');
})->name('reports');