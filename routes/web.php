<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('/dashboard/qc', \App\Livewire\Dashboard::class)
    ->middleware(['auth'])
    ->name('dashboard.qc');
Route::get('/dashboard/qc/detail/{caleg}', \App\Livewire\Dashboard::class)
    ->middleware(['auth'])
    ->name('dashboard.qc.detail');

Route::get('/qc/input-suara', \App\Livewire\QuickCount\InputSuara::class)
    ->middleware(['auth'])
    ->name('qc.input-suara');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
