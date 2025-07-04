<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get("/", [DashboardController::class, 'home'])
            ->name('home');

        Route::get("/profile", [DashboardController::class, 'profile'])
            ->name('profile');
    });

Route::resource("projects", ProjectController::class)
    ->middleware(['auth', 'verified']);

Route::resource("types", TypeController::class)
    ->middleware(['auth', 'verified']);

Route::resource("technologies", TechnologyController::class)
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
