<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MovieController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/search', [MovieController::class, 'search'])
    ->middleware(['auth'])
    ->name('movie.search');

Route::get('/movie/{id}', [MovieController::class, 'show'])
    ->middleware(['auth'])
    ->name('movie.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';