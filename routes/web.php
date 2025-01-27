<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Models\Company;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
})->name('register');



// Admin Panel Routes
Route::prefix('admin')->group(function () {
    // Guest Routes for Admin
    Route::middleware('is_admin')->group(function () {
        Route::get('/login', function () {
            return view('admin.login');
        })->name('admin.login');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });

    // Authenticated Routes for Admin
    Route::middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::put('/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
        Route::put('/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');
    });
});

// Unauthenticated Company Routes
Route::middleware('is_company')->group(function () {
    Route::get('/company/register', [CompanyController::class, 'register'])->name('company.register');
    Route::post('/company/register', [CompanyController::class, 'store'])->name('company.register');

    Route::get('/company/login', [CompanyController::class, 'login'])->name('company.login');
    Route::post('/company/login', [CompanyController::class, 'loginForm'])->name('company.login');
});

// Authenticated Company Routes
Route::middleware('is_company')->group(function () {
    Route::get('/company/dashboard', function () {
        return view('company.dashboard');
    })->name('company.dashboard');

    Route::get('/company/logout', [CompanyController::class, 'logout'])->name('company.logout');
});
