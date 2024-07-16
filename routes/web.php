<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('events', EventController::class)->names([
    'index' => 'events.index',
    'update' => 'events.update',
    'destroy' => 'events.destroy',
])->middleware(['auth', 'verified']);
Route::resource('venues', VenueController::class)->names([
    'index' => 'venues.index',
    'update' => 'venues.update',
    'destroy' => 'venues.destroy',
])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
