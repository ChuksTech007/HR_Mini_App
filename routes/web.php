<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// ---------------------------
// Default route
// ---------------------------
Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect('/login');
});

// ---------------------------
// Dashboard (for all logged in users)
// ---------------------------
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ---------------------------
// Profile routes (for any logged in user)
// ---------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ---------------------------
// Employee Management (Admin only)
// ---------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

// ---------------------------
// Reports (Admin only)
// ---------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('reports/salary-by-department', [ReportController::class, 'salaryByDepartment'])
        ->name('reports.salary-by-department');
});

// ---------------------------
// Authentication routes (login, register, logout, etc.)
// ---------------------------
require __DIR__.'/auth.php';
