<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return redirect()->route('choose-login');
});

Route::get('/choose-login', [LoginController::class, 'showChooseLogin'])->name('choose-login');

Route::get('/login/visitor', [LoginController::class, 'showVisitorLoginForm'])->name('login.visitor');
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route::get('/login', function () {
//     return redirect()->route('login');
// });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::middleware(RoleMiddleware::class . ':visitor')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
