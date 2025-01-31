<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $jobPosts = JobPost::where('status', 'active')->latest()->paginate(4);
    $categories = Category::all();
    return view('home', [
        'jobPosts' => $jobPosts,
        'categories' => $categories,
    ]);
})->name('home');


Route::get('/job-listing', function () {
    $jobPosts = JobPost::where('status', 'active')->paginate(2);
    return view('job-listing', compact('jobPosts'));
})->name('job-listing');

Route::get('category/{id}/job-listing', function ($id) {
    // $category = Category::find($id);
    $jobPosts = JobPost::where([
        'category_id' => $id,
        'status' => 'active',
    ])->get();
    return view('category-job-listing', compact('jobPosts'));
})->name('category.job-listing');

Route::get('/job-details/{id}', [JobPostController::class, 'show'])->name('job-details.show');

Route::get('/job-listing/search', [JobPostController::class, 'search'])->name('job-posts.search');

Route::middleware('guest')->group(function ()  {

    

// User Routes 

    Route::get('/user/register', [UserController::class, 'create'])->name('user.register');
    Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
    Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/user/login', [UserController::class, 'loginForm'])->name('user.login');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    

});

    // for user login 
Route::middleware('auth:web')->group(function ()  {
    Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('/category/{id}/subscribe', [SubscriptionController::class, 'subscribe'])->name('category.subscribe');
});




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

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');


        
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

    // Route::get('/job-posts/create', [JobPostController::class, 'create'])->name('job_posts.create');
    Route::resource('/company/job-posts', JobPostController::class);

    Route::put('/company/job-posts/{id}/activate', [JobPostController::class, 'activatePost'])->name('job-posts.activate');
    Route::put('/company/job-posts/{id}/deactivate', [JobPostController::class, 'deactivatePost'])->name('job-posts.deactivate');
});


