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
Route::view('/multi-step', 'multi-step');
Route::view('/dynamic-form', 'dynamic-form');

Route::get('/dashboard/qc', \App\Livewire\Dashboard::class)
    ->middleware(['auth'])
    ->name('dashboard.qc');
Route::get('/dashboard/qc/detail/{caleg}', \App\Livewire\Detail::class)
    ->middleware(['auth'])
    ->name('dashboard.qc.detail');
Route::get('/dashboard/qc/detail/{caleg}/dd/{detail_2}', \App\Livewire\DetailDua::class)
    ->middleware(['auth'])
    ->name('dashboard.qc.detail.2');
Route::get('/dashboard/qc/detail/{caleg}/dd/{detail_2}/ddd/{detail_3}', \App\Livewire\DetailTiga::class)
    ->middleware(['auth'])
    ->name('dashboard.qc.detail.3');

Route::get('/qc/input-suara', \App\Livewire\QuickCount\InputSuara::class)
    ->middleware(['auth'])
    ->name('qc.input-suara');

Route::get('/timses/dashboard', \App\Livewire\Timses\Dashboard::class)
    ->middleware(['auth'])
    ->name('timses.dashboard');
Route::get('/timses/input-timses', \App\Livewire\Timses\InputTimses::class)
    ->middleware(['auth'])
    ->name('timses.input-timses');
Route::get('/timses/input-relawan', \App\Livewire\Timses\InputRelawan::class)
    ->middleware(['auth'])
    ->name('timses.input-relawan');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';
