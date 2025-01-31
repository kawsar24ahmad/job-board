<?php

use App\Http\Controllers\{
    AdminController, CategoryController, CompanyController, JobPostController, paymentController, SubscriptionController, UserController
};
use App\Models\{Category, JobPost};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;

// Home Route
Route::get('/', function () {
    return view('home', [
        'jobPosts' => JobPost::where('status', 'active')->latest()->paginate(4),
        'categories' => Category::all(),
    ]);
})->name('home');

// Job Listing Routes
Route::get('/job-listing', function () {
    return view('job-listing', [
        'jobPosts' => JobPost::where('status', 'active')->paginate(5)
    ]);
})->name('job-listing');

Route::get('category/{id}/job-listing', function ($id) {
    return view('category-job-listing', [
        'jobPosts' => JobPost::where('category_id', $id)->where('status', 'active')->get()
    ]);
})->name('category.job-listing');

Route::get('/job-details/{id}', [JobPostController::class, 'show'])->name('job-details.show');
Route::get('/job-listing/search', [JobPostController::class, 'search'])->name('job-posts.search');

// Guest Routes
Route::middleware('guest')->group(function () {
    // User Authentication Routes
    Route::prefix('user')->group(function () {
        Route::get('/register', [UserController::class, 'create'])->name('user.register');
        Route::post('/register', [UserController::class, 'register']);
        Route::get('/login', [UserController::class, 'login'])->name('user.login');
        Route::post('/login', [UserController::class, 'loginForm']);
    });

    // General Authentication Views
    Route::view('/register', 'register')->name('register');
    Route::view('/login', 'login')->name('login');
    Route::view('/register/price-plan', 'company.pricing-plan')->name('pricing-plan');
});

// Authenticated User Routes
Route::middleware('auth:web')->group(function () {
    Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('/category/{id}/subscribe', [SubscriptionController::class, 'subscribe'])->name('category.subscribe');
});

// Admin Panel Routes
Route::prefix('admin')->group(function () {
    // Guest Routes for Admin
    Route::middleware('guest:admin')->group(function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'login']);
    });

    // Authenticated Routes for Admin
    Route::middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Job Post Approval
        Route::put('/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
        Route::put('/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');

        // Category Management
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
            Route::delete('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
        });
    });
});
Route::get('/company/premium-register',[CompanyController::class, 'premiumRegister'])->name('company.premium-register')->middleware('guest:company');

// Company Authentication Routes
Route::middleware('guest:company')->group(function () {
    Route::prefix('company')->group(function () {
        Route::get('/register', [CompanyController::class, 'register'])->name('company.register');
        Route::post('/register', [CompanyController::class, 'store']);

        Route::get('/login', [CompanyController::class, 'login'])->name('company.login');
        Route::post('/login', [CompanyController::class, 'loginForm']);
    });
});

// Authenticated Company Routes
Route::middleware('is_company')->prefix('company')->group(function () {
    Route::view('/dashboard', 'company.dashboard')->name('company.dashboard');
    Route::get('/logout', [CompanyController::class, 'logout'])->name('company.logout');

    // Job Posts Management
    Route::resource('/job-posts', JobPostController::class);
    Route::put('/job-posts/{id}/activate', [JobPostController::class, 'activatePost'])->name('job-posts.activate');
    Route::put('/job-posts/{id}/deactivate', [JobPostController::class, 'deactivatePost'])->name('job-posts.deactivate');
});





// SSLCOMMERZ Start
// Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout');
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('checkout');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);

Route::get('/success', function()  {
    return redirect(route('company.login'));
});
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END