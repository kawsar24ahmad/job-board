<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [CompanyController::class, 'store'])->name('register');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('is_admin');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware('is_admin');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('is_admin');
