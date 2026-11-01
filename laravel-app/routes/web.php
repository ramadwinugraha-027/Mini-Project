<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MbgDistributionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RekapController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');

    Route::get('/schools/{school}/mbg-distributions', [MbgDistributionController::class, 'getBySchool'])
        ->name('schools.distributions');

    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');

    Route::post('/reports/{report}/review', [ReportController::class, 'review'])->name('reports.review');
    Route::post('/reports/{report}/forward', [ReportController::class, 'forward'])->name('reports.forward');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
});