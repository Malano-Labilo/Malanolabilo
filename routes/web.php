<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardWorkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;

//Halaman Home
Route::get('/', function () {
    return view('pages.home',[
        'title' => 'Home',
    ]);
})->name('home');

//Halaman About
// Route::get('/about', function(){
//     return view('pages.about',[
//         'title' => 'About',
//     ]);
// })->name('about');

Route::get('/works', [WorkController::class, 'index'])->name('works');

Route::get('/all-works', [WorkController::class, 'works'])->name('works.all');
Route::get('/works/{work:slug}', [WorkController::class, 'work'])->name('works.work');

//Halaman Contact
// Route::get('/contact', function(){
//     return view('pages.contact',[
//         'title' => 'Contact',
//     ]);
// })->name('contact');

    Route::get(env('SECRET_LOGIN_PATH', 'login-dimension-admin'), [AuthenticatedSessionController::class, 'create'])->middleware(['guest', 'secret.login.access'])->name('login');
    Route::post(env('SECRET_LOGIN_PATH', 'login-dimension-admin'), [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardWorkController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardWorkController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/create', [DashboardWorkController::class, 'create'])->name('dashboard.work.create');
    Route::delete('/dashboard/{work:slug}', [DashboardWorkController::class, 'destroy'])->name('dashboard.work.destroy');
    Route::get('/dashboard/{work:slug}/edit', [DashboardWorkController::class, 'edit'])->name('dashboard.work.edit');
    Route::patch('/dashboard/{work:slug}', [DashboardWorkController::class, 'update'])->name('dashboard.work.update');
    Route::post('/dashboard/{work:slug}/upload-thumbnail', [DashboardWorkController::class, 'uploadThumbnail'])->name('dashboard.work.upload-thumbnail');
    Route::get('/dashboard/{work:slug}', [DashboardWorkController::class, 'show'])->name('dashboard.work');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.upload-avatar');
});

require __DIR__.'/auth.php';
