<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    // If the user is authenticated (logged in), send them to the dashboard.
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    // If the user is a guest (not logged in), send them to the login page.
    return redirect('/login');
});

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

// Route::middleware(['auth'])->group(function () {
//     Route::resource('employees', EmployeeController::class);
// });

require __DIR__.'/auth.php';
