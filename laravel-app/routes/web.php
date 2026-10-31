<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MbgDistributionController;
use App\Http\Controllers\ReportController;

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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});