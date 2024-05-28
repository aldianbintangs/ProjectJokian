<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectAfterLogout;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return view('auth.login-preference');
})->name('home');

Route::get('/login-preference', [AuthController::class, 'showLoginPreference'])->name('login.preference');
Route::get('/login/visitor', [AuthController::class, 'showVisitorLoginForm'])->name('login.visitor');
Route::get('/login/admin', [AuthController::class, 'showAdminLoginForm'])->name('login.admin');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/login/visitor', [AuthController::class, 'loginVisitor']);
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth.visitor')->group(function () {
    Route::get('/home/visitor', function () {
        return view('home');
    })->name('home.visitor');
    Route::get('/event', function () {
        return view('event');
    })->name('event');
    Route::get('/profile/edit', [EditProfileController::class, 'showEditProfileForm'])->name('profile.edit');
    Route::post('/profile/update', [EditProfileController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard.admin');
    Route::resource('admin/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});
