<?php

use App\Http\Controllers\Admin\HarvestController;
use App\Http\Controllers\PublicHarvestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('nagari');
})->name('home');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pertanian', function () {
    return view('pertanian');
})->name('pertanian');

Route::get('/Sejarah', function () {
    return view('Sejarah');
})->name('Sejarah');

Route::get('/Peternakan', function () {
    return view('Peternakan');
})->name('Peternakan');

Route::get('/harvest/{public_code}', [PublicHarvestController::class, 'show'])
    ->name('harvest.public');
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/harvests/uml', 'admin.harvests.uml')
            ->name('harvests.uml');
    Route::resource('harvests', HarvestController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';