<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');


Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('events', EventController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'create' => 'events.create',
            'store' => 'events.store',
            'edit' => 'events.edit',
            'update' => 'events.update',
            'destroy' => 'events.destroy',
        ]);
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::resource('venues', VenueController::class)
        ->except(['index', 'show'])
        ->names([
            'create' => 'venues.create',
            'store' => 'venues.store',
            'edit' => 'venues.edit',
            'update' => 'venues.update',
            'destroy' => 'venues.destroy',
        ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('events', EventController::class)
        ->only(['index', 'show'])
        ->names([
            'index' => 'events.index',
            'show' => 'events.show',
        ]);

    Route::resource('venues', VenueController::class)
        ->only(['index', 'show'])
        ->names([
            'index' => 'venues.index',
            'show' => 'venues.show',
        ]);
});

/*
Route::resource('events', EventController::class)->names([
    'index' => 'events.index',
    'update' => 'events.update',
    'show' => 'events.show',
    'destroy' => 'events.destroy',
])->middleware(['auth', 'verified']);
Route::resource('venues', VenueController::class)->names([
    'index' => 'venues.index',
    'update' => 'venues.update',
    'show' => 'venues.show',
    'destroy' => 'venues.destroy',
])->middleware(['auth', 'verified']);
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
