<?php

use App\Http\Controllers\Auth\TimsesAuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

// add timses auth
Route::get('/timses/login', [TimsesAuthController::class, 'login'])->name('timses.login');
Route::post('/timses/login', [TimsesAuthController::class, 'store'])->name('timses.login.store');
Route::post('/timses/logout', [TimsesAuthController::class, 'timses'])->name('timses.logout');

Route::get('/panel', [TimsesPagesController::class, 'panel_home'])->name('panel')->middleware('auth:timses');