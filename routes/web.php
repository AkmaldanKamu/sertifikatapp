<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/check-sertifikat', [SertifikatController::class, 'checkSertifikat'])->name('sertifikat.check');
Route::get('/download-sertifikat/{noSertifikat}', [SertifikatController::class, 'downloadSertifikat'])->name('sertifikat.download');

// Auth routes (provided by Breeze)
require __DIR__.'/auth.php';

// Admin routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // Profile routes (provided by Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin peserta routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Peserta routes
        Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
        Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
        Route::post('/peserta', [PesertaController::class, 'store'])->name('peserta.store');
        Route::get('/peserta/{peserta}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
        Route::put('/peserta/{peserta}', [PesertaController::class, 'update'])->name('peserta.update');
        Route::delete('/peserta/{peserta}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
        
        // Settings routes
        Route::get('/admin/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/admin/settings/update', [SettingController::class, 'updateSettings'])->name('settings.update');
        Route::post('/settings/tema', [SettingController::class, 'updateTemaSertifikat'])->name('settings.tema.update');
        Route::get('/admin//settings/tema/create', [SettingController::class, 'createTema'])->name('settings.tema.create');
        Route::post('/admin//settings/tema', [SettingController::class, 'storeTema'])->name('settings.tema.store');

    });
});

