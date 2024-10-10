<?php

use App\Support\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\RegisteredController;
use App\Http\Controllers\User\NewPasswordController;
use App\Http\Controllers\User\PasswordResetLinkController;


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/register', [RegisteredController::class, 'create'])->name('register');
Route::post('/register', [RegisteredController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar/update', [ProfileController::class, 'updateAvatar'])->name('avatar.update');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show');

    Route::get('/searches/user-search', [SearchController::class, 'userSearch'])->name('searches.user');

    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('reset-password-by-token', [NewPasswordController::class, 'create'])
    ->name('password.reset');
Route::patch('reset-password-by-token', [NewPasswordController::class, 'updateByToken'])
    ->name('password.updatebytoken');
Route::patch('reset-password', [NewPasswordController::class, 'update'])
    ->name('password.update');

Route::get('/test-email', function () {
    return Mail::testMail();
})->name(name: 'mail.test');
