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
Route::post('/register', [CompanyController::class, 'store'])->name('register');


// Admin Panel Route
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('is_admin');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware('is_admin');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    $companies = Company::all();
    return view('admin.dashboard', compact('companies'));
})->name('admin.dashboard')->middleware('is_admin');

Route::put('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.accept')->middleware('is_admin');
