<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::post('/login', [LoginController::class, 'handleLogin'])->name('login')->middleware('guest');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //master-data.kategori.index
    //master-data.kategori/index

    Route::prefix('master-data')->as('master-data.')->group(function(){
        Route::prefix('master-data')->as('kategori.')->controller(KategoriController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });
    });
});
