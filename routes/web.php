<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemController;
use App\Http\Controllers\KategorijaController; 
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UnverificationController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;

// Upload routes
Route::get('/upload', [MemController::class, 'upload'])->name('upload');
Route::post('/upload', [MemController::class, 'uploadPost'])->name('upload.post');

// Category routes
Route::get('/categories', function () {
    return Inertia::render('categories/Categories');
})->name('categories.index');

Route::get('/categories/create', function () {
    return Inertia::render('categories/CreateCategory');
})->name('categories.create');

Route::post('/categories', [KategorijaController::class, 'store'])->name('categories.store');

Route::get('/categories/{kategorija}', function ($kategorija) {
    return Inertia::render('categories/ShowCategory', ['kategorija' => $kategorija]);
})->name('categories.show');

Route::get('/categories/{kategorija}/edit', function ($kategorija) {
    return Inertia::render('categories/EditCategory', ['kategorija' => $kategorija]);
})->name('categories.edit');

Route::put('/categories/{kategorija}', [KategorijaController::class, 'update'])->name('categories.update');
Route::delete('/categories/{kategorija}', [KategorijaController::class, 'destroy'])->name('categories.destroy');

// Verification routes
Route::get('/verify', function () {
    return Inertia::render('verification/VerificationPage');
})->name('verification.index');

Route::post('/verify/{mem}', [VerificationController::class, 'verify'])->name('verification.verify');

// Unverification routes
Route::get('/unverify', function () {
    return Inertia::render('unverification/UnverificationPage');
})->name('unverification.index');

Route::post('/unverify/{mem}', [UnverificationController::class, 'unverify'])->name('unverification.unverify');

// Picture routes
Route::get('/pictures', function () {
    return Inertia::render('pictures/Gallery');
})->name('pictures.index');

Route::get('/pictures/{mem}', function ($mem) {
    return Inertia::render('pictures/PictureShow', ['mem' => $mem]);
})->name('pictures.show');

Route::get('/pictures/download/{mem}', [PictureController::class, 'download'])->name('pictures.download');
Route::post('/download/save', [DownloadController::class, 'saveDownload'])->name('download.save');
Route::get('/pictures/search', [PictureController::class, 'search'])->name('pictures.search');

// Subcategory routes
Route::get('/subcategories', function () {
    return Inertia::render('subCategories/Subcategory');
})->name('subcategories.index');

Route::get('/subcategories/create', function () {
    return Inertia::render('subCategories/Create');
})->name('subcategories.create');

Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');

Route::get('/subcategories/{subcategory}', function ($subcategory) {
    return Inertia::render('subCategories/Show', ['subcategory' => $subcategory]);
})->name('subcategories.show');

Route::get('/subcategories/{subcategory}/edit', function ($subcategory) {
    return Inertia::render('subCategories/Edit', ['subcategory' => $subcategory]);
})->name('subcategories.edit');

Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');

Route::get('/fetch-subcategories/{categoryId}', [SubCategoryController::class, 'getSubcategories'])->name('fetch.subcategories');

// Redirect to test route
Route::get('/test', function () {
    return 'This is a test route!';
});

// Mem route
Route::get('/', function () {    
    return Inertia::render('html5up-spectral/Home');
})->name('home');

// Registration and login pages
Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

// After login, users are redirected to the welcome page
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return Inertia::render('welcomePage');
    })->name('welcome');

    // Access to the dashboard is restricted to authenticated users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Access to the home page is restricted to admin users
Route::get('/home', [AdminController::class, 'index']);
